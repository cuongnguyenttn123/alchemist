<?php

namespace App\Http\Controllers;

use Event;
use Auth;
use Validator;
use App\Myconst;
use App\Libs\Convert;
use App\Models\Prize;
use App\Models\Skill;
use App\Models\Entrie;
use App\Models\Contest;
use App\Models\Project;
use App\Libs\Calculator;
use App\Models\Category;
use App\Models\Language;
use App\Models\ListType;
use App\Models\Location;
use App\Models\User_test;
use App\Models\UserTitle;
use App\Events\NewContest;
use Illuminate\Http\Request;
use App\Events\ShortlistedEntry;
use Illuminate\Support\Collection;
use App\Models\Contest_attachments;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Notifications\Contest\NewEntry;

use App\Notifications\Contest\SendResult;

use App\Mail\Contest\Seeker\NewContestEntry;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Mail\Contest\Seeker\ContestPaymentAndResults;
use App\Mail\Contest\Alchemist\RunnerUpContestResults;
use App\Mail\Contest\Alchemist\WinnerContestPaymentAndResults;

class ContestController extends Controller
{
    public static $title = 'Category';
    protected $category;
    public function __construct()
    {
        $this->middleware(
            ['frontendLogin'],
            ['only' => ['getListContest', 'get_new_contest']]
        );
        $this->middleware(function ($request, $next) {
            $this->notif = new NotificationController();
            $this->user = Auth::user();
            return $next($request);
        });
        $cats = Category::all();
        $skills = Skill::pluck('name', 'id');
        $alchemist_title = UserTitle::list_title('alchemist');

        $recent_jobs = Project::recent_jobs();
        View::share('recent_jobs', $recent_jobs);
        // Sharing is caring
        View::share('cats', $cats);
        View::share('skills', $skills);
        View::share('alchemist_title', $alchemist_title);
        $recent_jobs = Project::recent_jobs();
        View::share('recent_jobs', $recent_jobs);

        $all_categorys = Category::All();
        //list type
        $list_type = ListType::All();
        //list language
        $list_language = Language::All();
        //list location
        $list_location = Location::All();

        $skills = Skill::all();
        view()->share(['categorys' => $all_categorys, 'list_type' => $list_type, 'list_language' => $list_language, 'list_location' => $list_location, 'skills' => $skills]);
    }

    public function getListContest()
    {
        $sidebar = 'left';
        $user = $this->user;
        $target_user = $this->user;
        $contests = Contest::where('id_user_create', $user->id)->paginate(5);
        return view('contest.ListContest', compact('user', 'target_user', 'contests', 'sidebar'));
    }
    public function get_new_contest()
    {
        $user = $this->user;
        $target_user = $user;
        return view('contest.new_contest', compact('user', 'target_user'));
    }
    public function post_new_contest(Request $request)
    {

        $user = $this->user;
        $now = getdate();
        $currentDate = $now["mday"];
        $id_contest = $user->id.$currentDate;
        $wallet = $user->wallet;
        $credit_total = $user->credit + $user->credit_lock;

        $link = '<a href="' . route('profile.thefinancemanager') . '">LINK</a>';
        $rules = [
            'total_prize' => "required|numeric|max:$wallet",
            // 'credit' => "numeric|max:$credit_total"
        ];
        $message = [
            'total_prize.max' => "Your wallet is not enough. Please go to $link and add credit before posting a job",
            // 'credit.max' => "Your Credit allowance is not enough. Please go to $link and add credit before posting a job",
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //Convert time start
        $time_start = $request->time_start;
        $date_create_start = date_create($time_start);
        $contest_date_start = date_format($date_create_start, "Y-m-d H:i:s");
        //Convert time end
        $time_end = $request->time_end;
        $date_create_end = date_create($time_end);
        $contest_date_end = date_format($date_create_end, "Y-m-d H:i:s");
        //
        $fruits_ar = [];
        $new_contest = new Contest;
        $new_contest->name_contest = $request->name_contest;
        $new_contest->id_user_create = $user->id;
        $new_contest->rules = $request->rules;
        $new_contest->total_prize = $request->total_prize;
        $new_contest->time_start = $contest_date_start;
        $new_contest->time_end = $contest_date_end;
        $count = 0;

        if ($new_contest->save()) {
            $files = $request->file('file_attached');
            if ($files) {
                foreach ($files as $key => $file) {
                  $value_file = true;
                    if (isset($request->file_attached_delete)){
                      $fruits_ar = explode(',', $request->file_attached_delete);
                        foreach ($fruits_ar as $value){
                          if ($value == $key ){
                            $value_file = false;
                          }
                      }
                    }
                    if ($value_file){
                      $fc = new FileController();
                      $store_info = $fc->store_attachment($file);
                      $attachment = $store_info['attachment'];
                      $upload_path = $store_info['upload_path'];
                      $pj_attachment = new Contest_attachments();
                      $pj_attachment->id_contest = $new_contest->id;
                      $pj_attachment->id_user = $user->id;
                      $pj_attachment->url = $upload_path;
                      $pj_attachment->name = $attachment->name;
                      $pj_attachment->ori_name = $attachment->ori_name;
                      $pj_attachment->extension = $attachment->extension;
                      $pj_attachment->size = $attachment->size;
                      $pj_attachment->save();
                    }

                }
            }
            $new_contest->categories()->sync($request->cats);
            $new_contest->skill()->sync($request->skill);
            $new_contest->user_title()->sync($request->user_title);
            $new_contest->list_type()->sync($request->list_type);
        }
      if (isset($request->file_attached_delete_drag)){
        $fruits_ar_drag = explode(',', $request->file_attached_delete_drag);
        foreach ($fruits_ar_drag as $value){
          Contest_attachments::destroy($value);
        }
      }
      Contest_attachments::where('id_user', $user->id)
                              ->where('id_contest', $id_contest)
                              ->update(['id_contest' => $new_contest->id]);
      event(new NewContest($new_contest));
        return redirect()->route('profile.myprojects')->with('SweetAlert', 'Post Contest successfully');
    }
    public function getEditContest($id)
    {
        $user = $this->user;
        $target_user = $this->user;
        $contest = Contest::find($id);
        return view('contest.new_contest', compact('user', 'target_user', 'contest'));
    }
    public function postEditContest(Request $request)
    {
        /*$user = $this->user;
        $target_user = $user;*/
        //Convert time start
        $time_start = $request->time_start;
        $date_create_start = date_create($time_start);
        $contest_date_start = date_format($date_create_start, "Y-m-d");
        //Convert time end
        $time_end = $request->time_end;
        $date_create_end = date_create($time_end);
        $contest_date_end = date_format($date_create_end, "Y-m-d");
        //
        $edit_contest = Contest::find($request->id);
        $edit_contest->name_contest = $request->name_contest;
        $edit_contest->id_user_create = $user->id;
        $edit_contest->rules = $request->rules;
        $edit_contest->total_prize = $request->total_prize;
        $edit_contest->time_start = $contest_date_start;
        $edit_contest->time_end = $contest_date_end;
        if ($edit_contest->save()) {
            $files = $request->file('file_attached');
            if ($files) {
                $find_file_contest = Contest_attachments::where('id_contest', $request->id)->get();
                if ($find_file_contest) {
                    foreach ($files as $file) {
                        $fc = new FileController();
                        $store_info = $fc->store_attachment($file);
                        $attachment = $store_info['attachment'];
                        $upload_path = $store_info['upload_path'];
                        $pj_attachment = Contest_attachments::where('id_contest', $request->id)->first();
                        $pj_attachment->id_contest = $request->id;
                        $pj_attachment->id_user = $user->id;
                        $pj_attachment->url = $upload_path;
                        $pj_attachment->name = $attachment->name;
                        $pj_attachment->ori_name = $attachment->ori_name;
                        $pj_attachment->extension = $attachment->extension;
                        $pj_attachment->size = $attachment->size;
                        $pj_attachment->save();
                    }
                } else {
                    foreach ($files as $file) {
                        $fc = new FileController();
                        $store_info = $fc->store_attachment($file);
                        $attachment = $store_info['attachment'];
                        $upload_path = $store_info['upload_path'];
                        $pj_attachment = new Contest_attachments();
                        $pj_attachment->id_contest = $request->id;
                        $pj_attachment->id_user = $user->id;
                        $pj_attachment->url = $upload_path;
                        $pj_attachment->name = $attachment->name;
                        $pj_attachment->ori_name = $attachment->ori_name;
                        $pj_attachment->extension = $attachment->extension;
                        $pj_attachment->size = $attachment->size;
                        $pj_attachment->save();
                    }
                }
            }
            //delete contest category
            $del_contest_cate = ContestCategory::where('contest_id', $request->id)->delete();
            $edit_contest->category()->sync($request->category);
            //delete constest skill
            $del_contest_skill = ContestSkill::where('contest_id', $request->id)->delete();
            $edit_contest->skill()->sync($request->skill);
            //delete constest user title
            $del_contest_user_title = ContestUserTitle::where('contest_id', $request->id)->delete();
            $edit_contest->user_title()->sync($request->user_title);
        }
        return redirect()->route('getListContest');
    }
    //contest detail
    public function getContestDetail($id)
    {
        $user = Auth::user();
        $contest = Contest::find($id);
        if (!$contest) return abort(404);
        $auth_ct = $contest->user;
        $files = [];
        if ($user) $files = Auth::user()->medias();
        if ($contest->is_author() || ($contest->user_posted() && $contest->is_completed)) {
            // dd('alo');
            return view('seeker-contest_detail', compact('user', 'contest', 'files'));
        }
        return view('contest_detail', compact('user', 'contest', 'files'));
    }
    public function postContestDetail(Request $request)
    {
        return $request;
    }
    //end contest detail
    public function deleteContest($id)
    {
        $del_contest = Contest::find($id);
        //delêt contests attachment
        $del_contest_attachment = Contest_attachments::where('id_contest', $id)->count();
        if ($del_contest_attachment > 0) {
            $del_contest_attachment = Contest_attachments::where('id_contest', $id)->delete();
        }
        //delete prize
        $del_prize = Prize::where('id_contest', $id)->count();
        if ($del_prize > 0) {
            $del_prize = Prize::where('id_contest', $id)->delete();
        }
        //delete users test
        $del_user_test = User_test::where('id_contest', $id)->count();
        if ($del_user_test > 0) {
            $del_user_test = User_test::where('id_contest', $id)->delete();
        }
        //delete contest
        if ($del_contest) {
            $del_contest->delete();
        }
        return redirect()->back();
    }


  public function ajaxPostFile(Request $request)
  {

    $idFile = [];
    $listFile = [];
    $user = $this->user;
    $now = getdate();
    $currentDate = $now["mday"];
    $id_contest = $user->id.$currentDate;
      $files = $request->file('file_attached');
      if ($files) {
        foreach ($files as $key => $file) {
          $fc = new FileController();
          $store_info = $fc->store_attachment($file);
          $attachment = $store_info['attachment'];
          $upload_path = $store_info['upload_path'];
          $pj_attachment = new Contest_attachments();
          $pj_attachment->id_contest = $id_contest;
          $pj_attachment->id_user = $user->id;
          $pj_attachment->url = $upload_path;
          $pj_attachment->name = $attachment->name;
          $pj_attachment->ori_name = $attachment->ori_name;
          $pj_attachment->extension = $attachment->extension;
          $pj_attachment->size = $attachment->size;
          $pj_attachment->save();
          $idFile[]= $pj_attachment->id;
          $listFile[]= $pj_attachment;
        }
      }

    return response()->json([
      'error' => false,
      'message' => 'Success',
      'idfile' => $idFile,
      'listFile' => $listFile
    ], 200);
  }
    public function ajaxPostTest(Request $request)
    {

        $current_user = Auth::user();
        $req = $request->toArray();

        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }
        $test = new Entrie();
        $test->id_user = $current_user->id;
        $test->contest_id = $request->contest_id;
        $test->title = $request->title;
        $test->description = $request->description;
        $test->save();
        //store attachments

        foreach ($request->files_preview as $file) {
            $fc = new FileController();
            $store_info = $fc->store_attachment($file);
            $attachment = $store_info['attachment'];
            $upload_path = $store_info['upload_path'];
            $pj_attachment = new Contest_attachments();
            $pj_attachment->id_contest = $request->contest_id;
            $pj_attachment->id_user = $current_user->id;
            $pj_attachment->url = $upload_path;
            $pj_attachment->name = $attachment->name;
            $pj_attachment->ori_name = $attachment->ori_name;
            $pj_attachment->extension = $attachment->extension;
            $pj_attachment->size = $attachment->size;
            $pj_attachment->preview = 1;
            $pj_attachment->save();
        }
        foreach ($request->files_de as $file) {
            $fc = new FileController();
            $store_info = $fc->store_attachment($file);
            $attachment = $store_info['attachment'];
            $upload_path = $store_info['upload_path'];
            $pj_attachment = new Contest_attachments();
            $pj_attachment->id_contest = $request->contest_id;
            $pj_attachment->id_user = $current_user->id;
            $pj_attachment->url = $upload_path;
            $pj_attachment->name = $attachment->name;
            $pj_attachment->ori_name = $attachment->ori_name;
            $pj_attachment->extension = $attachment->extension;
            $pj_attachment->size = $attachment->size;
            $pj_attachment->save();
        }


        // notification
        $contest = $test->contest;
        $contest->user->notify((new NewEntry($contest)));

        Mail::to($contest->user)->send(new NewContestEntry($contest, $contest->user, $test));

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }

    public function ajaxSetWinner(Request $request)
    {
        $current_user = Auth::user();
        $test = Entrie::find($request->id);
        $contest = $test->contest;
        $total_prize = $contest->prizes->count();
        // dd($contest->prizes->count());
        $prize = new Prize();
        $prize->test_id = $test->id;
        $prize->rank = $total_prize + 1;
        // dd($prize);
        $prize->save();

        // event(new NewPrize($test));

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }

    public function lockUnlock(Request $request)
    {
        $current_user = Auth::user();
        $rank = $request->position;
        $type = $request->type;
        $entry = Entrie::find($request->entry_id);
        if (!isset($entry)) {
            return response()->json([
                'error' => true,
                'message' => 'Error'
            ], 200);
        }
        if ($type == 'lock') {
            $entry->update(['rank' => $rank]);
            $entry->update(['shortlist' => 1]);
        } elseif ($type == 'unlock') {
            $entry->update(['rank' => null]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Error'
            ], 200);
        }

      $dataContest = '';
      $dataLock = '';
      $dataSelectRank = '';
      if(isset($request->id_contest)){
        $contest = Contest::find($request->id_contest);
        $view = View::make("template_part.contest_rank",['contest' => $contest]);
        $dataContest .= $view;


        $view1 = View::make("template_part.lock",['contest' => $contest,'entry' => $entry]);
        $dataLock .= $view1;

      }
      return response()->json([
        'error' => false,
        'dataContest' => $dataContest,
        'dataLock' => $dataLock,
        'message' => 'Success'
      ], 200);
    }
    public function changeShortlistEntry(Request $request)
    {
      $ent = Entrie::find($request->id);
      // dd($bid->siblings()->Shortlisted());
      $cont = $ent->contest;
      if ($request->type == 'remove') {
        $ent->update(['shortlist' => null]);
      } else {
        $ent->update(['shortlist' => 1]);
        event(new ShortlistedEntry($ent));
      }

      return response()->json([
        'error' => false,
        'message' => 'Success',
      ], 200);
    }
    //complete contest
    public function paymentContest(Request $request)
    {
        $current_user = Auth::user();
        $contest = Contest::find($request->contest_id);
        $amout = $contest->total_prize;
        //check wallet
        if ($current_user->wallet < $contest->total_prize) {
            return response()->json([
                'error' => true,
                'message' => 'Your wallet do not enaugh'
            ], 200);
        }
        //check 1st winner
        if (!$contest->entry_win()) {
            return response()->json([
                'error' => true,
                'message' => 'Please select 1st winner'
            ], 200);
        }

        $user_win = $contest->entry_win()->user;
        $current_user->decrement('wallet', $amout);
        $user_win->increment('wallet', $amout);
        //update point for user
        foreach ($contest->entries_rank() as $entry) {
            if ($entry->rank <= 3) {
                $point = Calculator::contestPointEarn($entry->user->user_title, $entry->rank);
                $entry->user->increment('SBP', $point);
            }
            //send notification
            $entry->user->notify((new SendResult($contest, $entry->rank)));

            if ($entry->rank == 1) {
                Mail::to($contest->user)->send(new ContestPaymentAndResults($contest, $contest->user, $entry));
                Mail::to($entry->user)->send(new WinnerContestPaymentAndResults($contest, $entry));
            } elseif ($entry->rank == 2) {
                Mail::to($entry->user)->send(new RunnerUpContestResults($contest, $entry));
            }
        }

        $contest->complete();

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }
    //get getListAllContest
    public function getListAllContest(Request $request)
    {
        $user = $this->user;
        $target_user = $this->user;
        $keyword = $request->keyword ?? '';
        $minprice = $request->minprice ?? 0;
        $maxprice = $request->maxprice ?? 100000;
        $minmax = [$minprice, $maxprice];
        $orderBy = 'id,desc';
        if (request('orderby')) {
            $orderBy = request('orderby');
        }
        $orderBy = explode(',', $orderBy);
        $current_time = now();

        $inputs = $request->all([
            'orderby',
            'keyword',
            'filter_skill',
            'location',
            'language',
            'order_by',
            'order_value',
            'minprice',
            'maxprice',
        ]);
        $contests1 = Contest::select('contests.*', 'skill.name as name_skill', 'category.name as name_category', 'list_type.type_name')
            ->leftJoin('contest_skill', 'contests.id', '=', 'contest_skill.contest_id')
            ->leftJoin('contest_list_type', 'contests.id', '=', 'contest_list_type.contest_id')
            ->leftJoin('skill', 'contest_skill.skill_id', '=', 'skill.id')
            ->leftJoin('list_type', 'contest_list_type.list_type_id', '=', 'list_type.id')
            ->leftJoin('contest_category', 'contests.id', '=', 'contest_category.contest_id')
            ->leftJoin('category', 'contest_category.category_id', '=', 'category.id')
            ->with(['entries', 'user'])
            ->where(function ($query) use ($request, $current_time, $minmax) {
                if ($request->filter_skill) {
                    return $query->whereIn('skill.name', $request->filter_skill);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->location) {
                    return $query->whereHas('user', function ($q) use ($request) {
                        return $q->whereIn('_location', $request->location);
                    });
                }
            })

            ->where(function ($query) use ($keyword) {
                if ($keyword) {
                    return $query->where('contests.status', '<>', 'completed')->orWhereNull('contests.status')->where(function ($subQuery) use ($keyword) {
                        return $subQuery->where('contests.name_contest', 'LIKE', '%' . $keyword . '%');
                    });
                } else {
                    return $query->where('contests.status', '<>', 'completed')->orWhereNull('contests.status');
                }
            });
        //        $contests= $contests->orderBy($orderBy[0], $orderBy[1]);
        $contests1 = $contests1->groupBy('contests.id')->orderBy('created_at', 'DESC');
        //        $contests= $contests->paginate(Myconst::PAGINATE_SEARCH);
        $condition = [
            'orderby' => $inputs['orderby'],
            'keyword' => $inputs['keyword'],
            'filter_skill' => $inputs['filter_skill'],
            'location' => $inputs['location'],
            'order_by' => $inputs['order_by'],
            'order_value' => $inputs['order_value'],
            'language' => $inputs['language'],
            'min_price' => $inputs['minprice'],
            'max_price' => $inputs['maxprice']
        ];
        if (isset($condition['min_price']) || isset($condition['max_price'])) {
            $dataPrice = [
                'min_price' => $condition['min_price'],
                'max_price' => $condition['max_price'],
            ];
            if ($dataPrice['min_price']) {
                $contests1 = $contests1->where('total_prize', '>', (int) $dataPrice['min_price']);
            }
            if ($dataPrice['max_price']) {
                $contests1 = $contests1->where('total_prize', '<', (int) $dataPrice['max_price']);
            }
        }
        $contests1 = $contests1->get();
        if (isset($condition['order_by']) && isset($condition['order_value'])) {

            switch ($condition['order_by']) {
                case 'date_posted':
                    if ($condition['order_value'] == 'desc') {
                        $contests1 = $contests1->sortByDesc(function ($user) {
                            return $user->created_at;
                        });
                    } else {
                        $contests1 = $contests1->sortBy(function ($user) {
                            return $user->created_at;
                        });
                    }
                    break;
                case 'by_price':
                    if ($condition['order_value'] == 'desc') {
                        $contests1 = $contests1->sortByDesc(function ($user) {
                            return $user->total_prize;
                        });
                    } else {
                        $contests1 = $contests1->sortBy(function ($user) {
                            return $user->total_prize;
                        });
                    }
                    break;
                case 'of_entries':
                    if ($condition['order_value'] == 'desc') {
                        $contests1 = $contests1->sortByDesc(function ($user) {
                            return count($user->entries);
                        });
                    } else {
                        $contests1 = $contests1->sortBy(function ($user) {
                            return count($user->entries);
                        });
                    }
                    break;
            }
        }
        $contests = $this->paginate($contests1, 9);
        return view('search_contest', compact('user', 'target_user', 'contests'));
    }
    public function test()
    {
        /* $arr= [];
        $list_title = array();
        $list_title[]='Master';
        $list_t = UserTitle::whereIn('name', $list_title)->get(['min_level','max_level']);
         foreach ($list_t as $tit) {
            $pp = Calculator::levelToPointMin($tit->min_level, $tit->max_level);
            $arr[] = [$pp['min'],$pp['max']];
        }*/
        return $test = Calculator::criteriaPointEarn('Apprentice', 2, 200);
    }
    public function paginate($items, $perPage = 15, $baseUrl = null, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        $lap->setPath(config('app.url') . '/list-contests');

        return $lap;
    }
}
