<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use Validator;
use Auth;
use Input;

use App\Models\User;
use App\Models\UserFavorite;
use App\Models\UserTitle;
use App\Models\Role;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\PackageMembership;
use App\Models\PackageMembershipMeta;

use App\Models\Post;
use App\Models\Bid;
use App\Models\BidStatus;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Review;
use App\Myconst;
use App\Models\User_Status;
//s2nhomau
use App\Models\UserPoint;
use App\Libs\Calculator;
use App\Models\Rating;
use App\Models\ListType;
use App\Models\Language;
use App\Models\Location;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

//end
class HomeController extends Controller
{
    const alchemist_role_name = 'Alchemist';
    const seeker_role_name = 'Seeker';
    const default_bid_status = 'Pending';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $user = Auth::user();
        View::share('user', $user);

        $this->alchemist_role_name = $this::alchemist_role_name;
        $this->seeker_role_name = $this::seeker_role_name;

        $this->default_bid_status = $this::default_bid_status;
        $this->middleware(function ($request, $next) {
            //not login redirect to maintenance mode
            /*if(!Auth::user()) {
                return abort(503);
            }*/
            $this->user = Auth::user();
            return $next($request);
        });
        $alchemist_title = UserTitle::list_title('alchemist');
        $seeker_title = UserTitle::list_title('seeker');

        $all_categorys = Category::All();
        View::share('categorys', $all_categorys);

        //list type
        $list_type = ListType::Available();
        //list language
        $list_language = Language::All();
        //list location
        $list_location = Location::All();

        $review = new Review();
        $criteria_rating = $review->criteria;

        $post = new Post();
        $list_hashtag = $post->list_hashtag;
//        $arraytus = [];
//        $stttus = Post::all();
////        $desjon = json_decode($stttus);
//        foreach ($stttus as $ts){
//          if(isset($ts)){
//            $arraytus[] = $ts->caption;
//          }
//        }


        $skills = Skill::all();
        view()->share([
            'alchemist_title' => $alchemist_title,
            'seeker_title' => $seeker_title,
            'cats' => $all_categorys,
            'list_type' => $list_type,
            'list_language' => $list_language,
            'list_location' => $list_location,
            'skills' => $skills,
            'criteria_rating' => $criteria_rating,
            'list_hashtag' => $list_hashtag,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return view('index', compact('user'));
        } else {
            return redirect()->route('profile.index');
        }
    }
    public function logout(Request $request)
    {
        //return $user = Auth::user();
        Auth::logout();
        return redirect()->back();
    }

    public function ajaxNewsfeed(Request $request)
    {
      $user = Auth::user();

        $posts = Post::where(function ($query) use ($request, $user) {
            if ($request->hashtag != null) {
                $query->where('hashtag', 'LIKE', '%' . $request->hashtag . '%');
            }
          if ($request->caption !=null ) {
            $query->where('caption', 'LIKE', '%' . $request->caption . '%');
          }
            if ($user){
              if ($request->type) {
                switch ($request->type){
                  case 'following':
                    $listUserFW = $user->list_follow_newsfeed;
                    foreach($listUserFW as $object)
                    {
                      $listId[] = $object->id;
                    }
                    $query->whereIn('_user', $listId);
                    break;
                  case 'my-posts':
                    $query->where('_user', $user->id);
                    break;
                  case 'replies':
                    $query->whereHas('comments', function ($query) use ($user) {
                      $query->where('_user', $user->id);
                    });
                    break;
                  case 'portfolio':
                    $query->whereNotNull('_album');
                    break;
                  case 'medias':
                    $query->where('hashtag', 'LIKE', '%media%')
                      ->orWhereNotNull('external_link')
                      ->orWhereNotNull('list_file')
                      ->orWhereNotNull('_video');
                    break;
                }
              }
            }
        })
            ->where('status', 0)
            ->skip($request->length)
            ->take(5)
            ->get();

        $data = '';
        foreach ($posts as $post) {
          if ($post->user){
            $data .= View::make('template_part.content-post', ['post' => $post]);
          }

        }

        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }

  public function newsfeed(Request $request)
  {
    // dd($request->toArray());
    $listTopUser = User::
    whereHas('roles',function($q){
      $q->where('name','Alchemist');
    })->
    orderBy('SBP', 'DESC')->get();
    $user = Auth::user();
    $target_user = Auth::user();
    // $newsfeed = Post::orderBy('id', 'DESC')->get();
    $newsfeed = Post::where(function ($query) use ($request, $user) {
      if ($request->hashtag) {
        $query->where('hashtag', 'LIKE', '%' . $request->hashtag . '%');
      }
      if ($request->caption) {
        $query->where('caption', 'LIKE', '%' . $request->caption . '%');
      }
      if ($user) {
        if ($request->type) {
          switch ($request->type) {
            case 'showall':
              $newsfeed = Post::where('status', 0)->orderBy('id', 'DESC')->take(5)->get();
              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $output .= View::make('template_part.content-post', ['post' => $post]);
                }
              }
              echo $output;
              exit();
            case 'following':
              $newsfeed = Post::where(function ($query) use ($request, $user) {
                $listUserFW = $user->list_follow_newsfeed;
                foreach ($listUserFW as $object) {
                  $listId[] = $object->id;
                }
                $query->whereIn('_user', $listId);
              })->where('status', 0)->orderBy('id', 'DESC')->take(5)->get();
              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $output .= View::make('template_part.content-post', ['post' => $post]);
                }
              }
              echo $output;
              exit();
            case 'my-posts':
//                  $query->where('_user', $user->id);
              $newsfeed = Post::where(function ($query) use ($request, $user) {
                $query->where('_user', $user->id);
              })->where('status', 0)->orderBy('id', 'DESC')->take(5)->get();
              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $output .= View::make('template_part.content-post', ['post' => $post]);
                }
              }
              echo $output;
              exit();
            case 'replies':
              $newsfeed = Post::where(function ($query) use ($request, $user) {
                $query->whereHas('comments', function ($query) use ($user) {
                  $query->where('_user', $user->id);
                });})->where('status', 0)->orderBy('id', 'DESC')->take(5)->get();
              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $output .= View::make('template_part.content-post', ['post' => $post]);
                }
              }
              echo $output;
              exit();
            case 'portfolio':
              $newsfeed = Post::whereNotNull('_album')->where('status', 0)->orderBy('id', 'DESC')->take(5)->get();
              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $output .= View::make('template_part.content-post', ['post' => $post]);
                }
              }
              echo $output;
              exit();
            case 'medias':
              $newsfeed = Post::where(function ($query) use ($request, $user) {
                $query->where('hashtag', 'LIKE', '%media%')
                  ->orWhereNotNull('external_link')
                  ->orWhereNotNull('list_file')
                  ->orWhereNotNull('_video');
              })->where('status', 0)->orderBy('id', 'DESC')->take(5)->get();

              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $checkMedia = 0;
                  if ($post->external_link){
                    $checkMedia = 1;
                  }
                  if ($post->video){
                    $checkMedia = 1;
                  }
                  if ($post->list_media){
                    $checkMedia = 1;
                  }
                  if ($checkMedia){
                    $output .= View::make('template_part.content-post', ['post' => $post]);
                  }
                }
              }
              echo $output;
              exit();
          }
        }
      }else{
        if ($request->type) {
          switch ($request->type) {
            case 'medias':
              $newsfeed = Post::where(function ($query) use ($request) {
                $query->where('hashtag', 'LIKE', '%media%')
                  ->orWhereNotNull('external_link')
                  ->orWhereNotNull('list_file')
                  ->orWhereNotNull('_video');
              })->where('status', 0)->orderBy('id', 'DESC')->take(5)->get();
              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $output .= View::make('template_part.content-post', ['post' => $post]);
                }
              }
              echo $output;
              exit();
            default:
              $newsfeed = Post::where('status', 0)->orderBy('id', 'DESC')->take(5)->get();
              $output = '';
              foreach($newsfeed as $post) {
                if ($post->user != null){
                  $output .= View::make('template_part.content-post', ['post' => $post]);
                }
              }
              echo $output;
              exit();
          }
        }
      }
    })
      ->where('status', 0)
      ->orderBy('id', 'DESC')
      ->take(5)
      ->get();

    //dd("vào");
    return view('newsfeed', compact('user','target_user', 'newsfeed', 'listTopUser'));
  }

  public function newsFeedDetail (Request $request)
  {
    // dd($request->toArray());
    $listTopUser = User::orderBy('SBP', 'DESC')->take(5)->get();
    $user = Auth::user();
    // $newsfeed = Post::orderBy('id', 'DESC')->get();
    $newsfeed = Post::where('id', $request->id)->get();
    return view('newsfeed', compact('user', 'newsfeed', 'listTopUser'));
  }

    public function search(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->keyword ? $request->keyword : '';
        $exclude_status = ProjectStatus::whereIn('status', ['block', 'inactive', 'completed', 'processing', 'Waiting Accept'])->pluck('id')->toArray();
        $current_time = strtotime(date("Y-m-d 23:59"));
        $minprice = $request->minprice ?? 0;
        $maxprice = $request->maxprice ?? 100000;
        $minmax = [$minprice, $maxprice];
        $orderBy = 'id,desc';
        if (request('orderby')) {
            $orderBy = request('orderby');
        }
        $orderBy = explode(',', $orderBy);
        $projects = Project::select('project.*', 'skill.name as name_skill', 'category.name as name_category', 'location.country', 'location.country_code', 'language.language_name', 'list_type.type_name')
            ->leftJoin('users', 'users.id', '=', 'project._employer')
            ->leftJoin('location', 'users._location', '=', 'location.id')
            ->leftJoin('project_skill', 'project.id', '=', 'project_skill.project_id')
            ->leftJoin('skill', 'project_skill.skill_id', '=', 'skill.id')
            ->leftJoin('project_category', 'project.id', '=', 'project_category._project')
            ->leftJoin('category', 'project_category._category', '=', 'category.id')
            //->leftJoin('project_user_title','project.id', '=', 'project_user_title._project')
            //->leftJoin('user_title','project_user_title._user_title','=','user_title.id')
            //->leftJoin('project_location','project_location.project_id','=','project.id')
            //->leftJoin('location','location.id','=','project_location.location_id')
            ->leftJoin('language_project', 'language_project.project_id', '=', 'project.id')
            ->leftJoin('language', 'language.id', '=', 'language_project.language_id')
            ->leftJoin('project_list_type', 'project_list_type.project_id', '=', 'project.id')
            ->leftJoin('list_type', 'list_type.id', '=', 'project_list_type.list_type_id')
            ->where(function ($query) use ($exclude_status, $current_time, $request, $minmax) {
                //filter price
                $query->whereBetween('budget', $minmax);

                //filter time
                if ($current_time) {
                    $query->where('bid_start', '<=', $current_time)->where('bid_end', '>=', $current_time);
                }
                //filter listing type
                if ($request->list_type) {
                    $query->whereIn('list_type.type_name', $request->list_type);
                }
                //filter language
                if ($request->language) {
                    $query->whereIn('language.language_name', $request->language);
                }
                //filter location of project
                if ($request->location) {
                    $query->whereIn('location.country', $request->location)->orwhereIn('location.country_code', $request->location);
                }
                //filter skill
                if ($request->filter_skill) {
                    $query->whereIn('skill.name', $request->filter_skill);
                }
                //filter status
                if ($exclude_status) {
                    $query->whereNotIn('project._status', $exclude_status);
                }
                //filter category
                if ($request->category) {
                    $query->where('category.name', $request->category);
                }
                //filter title
                //if($request->user_title){
                //    $query->whereIn('user_title.name', $request->user_title);
                //}

            })
            ->where(function ($query) use ($keyword) {
                if ($keyword) {
                    $query->where('project.name', 'LIKE', '%' . $keyword . '%');
                    //->orWhere('project.short_description', 'LIKE', '%'.$keyword.'%')
                    //->orWhere('project.detail_description', 'LIKE', '%'.$keyword.'%')
                    //->orWhere('project.budget', 'LIKE', '%'.$keyword.'%');
                }
            })
            ->orderBy($orderBy[0], $orderBy[1])
            ->groupBy('project.id')
            ->paginate(Myconst::PAGINATE_SEARCH);
        //return $projects;
        $files = [];
        if ($user) $files = Auth::user()->medias();
        return view('search_project', compact('user', 'projects', 'files'));
    }
    public function searchCat(Request $request, $slug, $id)
    {
        $user = Auth::user();
        $a_id = explode('-', $id);
        $id = end($a_id);
        $cat_id = '';
        $cat = Category::find($id);
        if ($cat) $cat_id = $cat->id;
        else return abort(404);
        $orderBy = 'id,desc';
        if (request('filter')) {
            $orderBy = request('filter');
        }
        $orderBy = explode(',', $orderBy);
        // dd($orderBy);
        $user = Auth::user();
        $projects = Project::select('project.*')
            ->join('project_category', function ($join) use ($cat_id) {
                $join->on('project.id', '=', 'project_category._project');
                if ($cat_id != '') {
                    $join->where('project_category._category', '=', $cat_id);
                }
            })
            /*->where(function($query){
            $query->where('budget', '<=', '950')->where('budget', '>=', '800');
        })*/
            ->orderBy($orderBy[0], $orderBy[1])
            ->paginate(5);
        $total_projects = $projects->total();
        $number = 321535325;
        $total_projects = number_format($total_projects);
        $categorys = Category::All();
        $files = [];
        if ($user) $files = Auth::user()->medias();
        return view('search_project', compact('user', 'total_projects', 'projects', 'categorys', 'files'));
    }
    public function jobdetail(Request $request, $id)
    {
        $user = Auth::user();
        $project = Project::find($id);
        $skills = Skill::all();
        $files = [];
        if ($user) $files = Auth::user()->medias();

        if ($project) {
            $auth_pj = $project->user;
            $target_user = $project->user;

            $orderBy = 'id,desc';
            if (request('filter')) {
                $orderBy = request('filter');
            }
            $orderBy = explode(',', $orderBy);
            // dd($orderBy);
            $bids = $project->bids()
                ->orderBy($orderBy[0], $orderBy[1])
                ->paginate(5);
            // dd($project->users_bidding());
            return view('jobdetail', compact('user', 'project', 'auth_pj', 'bids', 'skills', 'files', 'target_user'));
        }
    }
    public function postbid(Request $request, $id)
    {
        if (!$this->user) {
            session()->put('showmodal', 'registration-login-form-popup');
            return redirect()->back();
        }
        $this->Validate($request, [
            'price' => 'required|numeric',
            'worktime' => 'required|numeric',
            'title' => 'required',
            'description' => 'required'
        ]);

        $bid_status_id = BidStatus::where('status', $this->default_bid_status)->first()->id;
        // dd($bid_status_id);
        $bid = new Bid();
        $bid->title = $request->title;
        $bid->work_time = $request->worktime;
        $bid->price = $request->price;
        $bid->description = $request->description;
        $bid->_status = $bid_status_id;
        $bid->_project = $id;
        $bid->_freelancer = $this->user->id;
        $bid->save();
        session()->put('success', 'Bid Success');
        return redirect()->back();
        // dd($bid->toArray());
    }
    public function userInfo($id)
    {
        $user = Auth::user();
        $target_user = User::find($id);
        if ($target_user) {
            $all_meta = $target_user->user_meta();
            $meta = array();
            foreach ($all_meta as $mt) {
                $meta[$mt['meta_key']] = $mt['meta_value'];
            }
            // dd($meta);
            return view('myprofile.timeline', compact('user', 'target_user', 'meta'));
        } else {
            return abort(404);
        }
    }
    public function userTimeline($id)
    {
        $user = Auth::user();
        $target_user = User::find($id);
        $listTopUser = User::
        whereHas('roles',function($q){
          $q->where('name','Alchemist');
        })->
        orderBy('SBP', 'DESC')->get();
        if ($target_user) {
            $all_meta = $target_user->user_meta();
            $meta = array();
            foreach ($all_meta as $mt) {
                $meta[$mt['meta_key']] = $mt['meta_value'];
            }
            // dd($meta);
            return view('myprofile.timeline', compact('user', 'target_user', 'meta','listTopUser'));
        } else {
            return abort(404);
        }
    }
    public function userStats($id)
    {
        $user = Auth::user();
        $target_user = User::find($id);
        if ($target_user) {
            $all_meta = $target_user->user_meta();
            $meta = array();
            foreach ($all_meta as $mt) {
                $meta[$mt['meta_key']] = $mt['meta_value'];
            }
            // dd($meta);
            return view('myprofile.stats', compact('user', 'target_user', 'meta'));
        } else {
            return abort(404);
        }
    }

    public function userSave($id, Request $request)
    {
        $user = Auth::user();
        $target_user = User::find($id);
        // dd($user);

        $keyword = $request->keyword ? $request->keyword : '';
        // dd($target_user->rolename);
        //orderBy
        $orderBy = 'id,desc';
        if (request('filter')) {
            $orderBy = request('filter');
        }
        $orderBy = explode(',', $orderBy);
        //end orderby
        if ($target_user) {

            // $target_user = $user;
            return view('myprofile.saveusers', compact('user', 'target_user'));
        } else {
            return abort(404);
        }
    }

    public function userPortfolio($id)
    {
        $user = Auth::user();
        $target_user = User::find($id);
        if ($target_user) {
            $files = [];
            $all_meta = $target_user->user_meta();
            $meta = array();
            foreach ($all_meta as $mt) {
                $meta[$mt['meta_key']] = $mt['meta_value'];
            }
            if ($user) $files = $user->media->whereIn('extension', ['jpg', 'png']);
            $albums = $target_user->albums;
            return view('myprofile.portfolio', compact('user', 'target_user', 'meta', 'files', 'albums'));
        } else {
            return abort(404);
        }
    }

    public function upgrade()
    {
        $user = Auth::user();
        if (!$user)
            return redirect()->route('profile.index');
        $paypal_conf = \Config::get('paypal');
        // dd($paypal_conf);
        $_role = $user->user_role->role->id;
        $all_packs = new PackageMembership();
        $all_packs = $all_packs->get_packs($_role);
        return view('upgrade', compact('user', 'all_packs'));
    }

    public function find_alchemist(Request $request)
    {
        //return $request;
        $user = Auth::user();
        $keyword = $request->keyword ? $request->keyword : '';
        $minprice = $request->minprice ?? 0;
        $maxprice = $request->maxprice ?? 100000;
        $minmax = [$minprice, $maxprice];
        //orderBy
        $orderBy = 'id,desc';
        if (request('filter')) {
            $orderBy = request('filter');
        }
        $orderBy = explode(',', $orderBy);
        $whereRaw = '';
        if ($request->has('level')) {
            $collection = Calculator::collection();
            $list_t = $collection->whereIn('name', $request->level)->pluck('min_level', 'max_level')->toArray();
            // dump($list_t);
            foreach ($list_t as $max => $min) {
                $pp = Calculator::levelToPointMin($min, $max);
                $arr[] = [$pp['min'], $pp['max']];
            }
            // dd($arr);
            $i = 0;
            foreach ($arr as $item) {
                if ($i > 0) {
                    $whereRaw .= " OR ";
                }
                $whereRaw .= "`SBP` BETWEEN " . $item[0] . " AND " . $item[1];
                $i++;
            }
            // dd($whereRaw);
        }

        $status = User_Status::whereIn('status', ['active'])->pluck('id')->toArray();
        $users = $this->filterSearchAlchemist($orderBy, $request->keyword, $status, $request, $whereRaw, $minmax);
        // return $users->count();
        return view('find_user', compact('user', 'users'));
    }
    public function find_seeker(Request $request)
    {
        $data = [];
        $inputs = $request->all([
            'orderby',
            'keyword',
            'filter_skill',
            'level',
            'location',
            'language',
            'order_by',
            'order_value',
        ]);

        $data['inputs'] = $inputs;
        $data['user'] = auth()->user();
        $data['users'] = $this->filterSeeker(15, [
            'orderby' => $inputs['orderby'],
            'keyword' => $inputs['keyword'],
            'filter_skill' => $inputs['filter_skill'],
            'level' => $inputs['level'],
            'location' => $inputs['location'],
            'order_by' => $inputs['order_by'],
            'order_value' => $inputs['order_value'],
            'language' => $inputs['language'],
        ]);

        return view('find_seeker', $data);
    }

    public function filterSeeker($limit = 15, $condition = [])
    {
        $users = User::with([
            'role',
            'location',
            'usermeta',
        ])->select('users.*')
            ->whereHas('role', function ($q) {
                $q->where('role_id', 4);
            });

        if (isset($condition['keyword'])) {
            $keyword = '%' . $this->escape_like($condition['keyword']) . '%';
            $users = $users->where(function ($q) use ($keyword) {
                $q->orWhere('email', 'LIKE', $keyword)
                    ->orWhere('username', 'LIKE', $keyword)
                    ->orWhereRaw('CONCAT(first_name," ",last_name) LIKE "'.addslashes($keyword).'"');
            });
        }

        if (isset($condition['filter_skill'])) {
            $skillIds = [];
            foreach ($condition['filter_skill'] as $skill) {
                if ($skill) {
                    $skillModel = Skill::where('id', $skill)->first();
                    if ($skillModel) {
                        $skillIds[] = $skillModel->id;
                    }
                }
            }
            $users = $users->whereHas('skills', function ($q) use ($skillIds) {
                $q->whereIn('_skill', $skillIds);
            });
        }

        if (isset($condition['location'])) {
            $users = $users->whereIn('_location', $condition['location']);
        }

        if (isset($condition['language'])) {
            $users = $users->whereHas('languages', function ($q) use ($condition) {
                $q->whereIn('language_id', $condition['language']);
            });
        }

        if (isset($condition['order_by']) && isset($condition['order_value'])) {
            switch ($condition['order_by']) {
                case 'total_points':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return ($user->SP + $user->RP);
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return ($user->SP + $user->RP);
                        });
                    }

                    return $this->paginate($users, $limit);
                    break;
                case 'SP':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->SP;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->SP;
                        });
                    }

                    return $this->paginate($users, $limit);
                    break;
                case 'RP':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->RP;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->RP;
                        });
                    }

                    return $this->paginate($users, $limit);
                    break;
                case 'rate':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->average_score;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->average_score;
                        });
                    }

                    return $this->paginate($users, $limit);
                    break;
                case 'projects_posted':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->projects()->count();
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->projects()->count();
                        });
                    }

                    break;
                case 'contests_posted':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->contests()->count();
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->contests()->count();
                        });
                    }

                    break;
                case 'completed_jobs':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->reviews()->count();
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->reviews()->count();
                        });
                    }
//                    $users = $users->whereHas('projects', function ($q) use ($condition) {
//                        return $q->selectRaw('count(_employer) as count')
//                            ->whereHas('project_status', function ($p) {
//                                return $p->where('status', 'completed');
//                            });
//                    });
//
//                    $users = $users->addSelect(DB::raw('(select count(project.id) from project WHERE project._employer = users.id) as count_project'));
//                    $users = $users->orderBy('count_project', 'desc');

                    break;
                case 'total_disputes':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->total_disputes;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->total_disputes;
                        });
                    }

                    break;
                case 'disputes_win':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->disputes_win;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->disputes_win;
                        });
                    }

                    break;
                case 'disputes_lost':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->disputes_lose;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->disputes_lose;
                        });
                    }

                    break;
            }
        }

        if (!($users instanceof Collection)) {
            $users = $users->orderBy('created_at', 'DESC')->get();
        }

        if (isset($condition['level'])) {
            $levels = UserTitle::select('min_level', 'max_level')->whereIn('id', $condition['level'])->get()->toArray();
            $users = $users->filter(function ($user, $key) use ($condition, $levels) {
                foreach ($levels as $level) {
                    if ($user->level >= $level['min_level'] && $user->level <= $level['max_level']) {
                        return $user;
                    }
                }
            });
        }

        return $this->paginate($users, $limit);
    }

    public function paginate($items, $perPage = 15, $baseUrl = null, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        $lap->setPath(config('app.url') . '/find_seeker');

        return $lap;
    }

    function escape_like($string, $expPercent = false)
    {
        if ($expPercent) {
            $search = ['\\', '_', '&', '|'];
            $replace = ['\\\\', '\_', '\&', '\|'];
        } else {
            $search = ['\\', '%', '_', '&', '|'];
            $replace = ['\\\\', '\%', '\_', '\&', '\|'];
        }

        return str_replace($search, $replace, $string);
    }
    //s2nhomau function filter user-profile
    function filterSearchAlchemist($orderBy, $keyword, $status, $request, $whereRaw, $minmax)
    {
        $list_users = User::select('users.*', 'skill.name as name_skill', 'language.language_name', 'location.country', 'user_meta.meta_value as hourly_hire')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->leftJoin('skill_user', 'users.id', '=', 'skill_user._user')
            ->leftJoin('skill', 'skill_user._skill', '=', 'skill.id')
            ->leftJoin('language_user', 'language_user.user_id', '=', 'users.id')
            ->leftJoin('language', 'language.id', '=', 'language_user.language_id')
            ->leftJoin('location', 'location.id', '=', 'users._location')
            ->leftJoin('user_meta', function ($join) {
                $join->on('users.id', '=', 'user_meta._user')->where('meta_key', 'hourly_hire');
            })
            ->where('roles.name', 'Alchemist')
            ->where(function ($query) use ($status, $request, $whereRaw, $minmax) {
                if ($request->filter_skill) {
                    $query->whereIn('skill.name', $request->filter_skill);
                }
                //filter language
                if ($request->language) {
                    $query->whereIn('language.language_name', $request->language);
                }
                //filter location
                if ($request->location) {
                    $query->whereIn('location.country', $request->location);
                }
                //hourly_hire
                $query->whereBetween('user_meta.meta_value', $minmax);

                //level
                if ($request->level) {
                    $query->whereRaw($whereRaw);
                }
            })
            ->where(function ($query) use ($status) {
                if ($status) {
                    $query->whereIn('_status', $status)->where('is_activated', 1);
                }
            })
            ->where(function ($query) use ($keyword) {
                if ($keyword) {
                    $query->where('email', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('username', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('first_name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
                }
            })
            ->orderBy($orderBy[0], $orderBy[1])
            ->groupBy('users.id')
            ->paginate(Myconst::PAGINATE_SEARCH);
        return $list_users;
    }
    //end

    public function deposit(Request $request)
    {
        $user = Auth::user();
        return view('deposit', compact('user'));
    }

    public function postDeposit(Request $request)
    {
        $user = Auth::user();
        $pp = new PaypalController();
        $vl = $pp->postPaymentWithpaypal($request);
        dd($vl);
    }
    public function test()
    {
        return view('test');
    }
    // loadmore  right newfeed
    function loadData(Request $request){
            $listTopUser = User::
            whereHas('roles',function($q){
            $q->where('name','Alchemist');
            })->
            orderBy('SBP', 'DESC')
            ->skip($request->length)->take(5)->get();
            $output = '';
            if(!$listTopUser->isEmpty()) {
              foreach ($listTopUser as $us) {
                $save_fw = 'add-fw';
                if ($us->is_saved_newsFeed()) {
                  $save_fw = '';
                }
                $output .= View::make('template_part.content-right-ranked', ['us' => $us]);
              }
              $output .='<a href="javascript:" id="load_more_button" class="more-comments" name="load_more_button" data-id="" style="  border-top: 1px solid #e6ecf5;background-image: linear-gradient(#fefefe, #f7f6f6);">Load more <span>+</span></a>';
            }else{
                $output = ' <button type="button" name="loadmore-cmt" class="btn btn-info form-control noComment ">No Data Comment</button>';
              }
              echo $output;

    }
  //load more left newfeed
  function loadDataLeft(Request $request)
  {
        $user = Auth::user();
        $notifica = $user->notifications_newsfeed()->skip($request->length)->take(5)->unread('job');
        $output = '';

      if(!$notifica->isEmpty()) {
        foreach ($notifica as $n) {

          $output .= View::make('template_part.content-left-notification', ['n' => $n]);

        }
        $output .= '<a href="javascript:" id="load_more_button_left" class="more-comments" name="load_more_button_left" style="  border-top: 1px solid #e6ecf5;background-image: linear-gradient(#fefefe, #f7f6f6);">Load more <span>+</span></a>';
      }
      else
      {
        $output .= '
        <button type="button" name="load_more_button-left1" class="btn btn-info form-control noComment ">No Data Found</button>
        ';
      }
      echo $output;
    }

    //loadmore comment
    public function loadComment(Request $request)
    {
//        $user = Auth::user();
        $newsfeed = Post::find($request->id);
        $cmt = $newsfeed->comments
          ->slice($request->length)
          ->take(3)
        ;
      $output = '';
        if(!$cmt->isEmpty()) {
          foreach ($cmt as $comment) {
            $output .= View::make('template_part.content-comment', ['comment' => $comment]);
          }
          $output .= '
         <a href="javascript:" id="cmtID" data-id="'.$request->id.'" class="more-comments loadmore-cmt-'.$request->id.' loadmore-cmt " style="margin-left: 0px;border-left: 1px solid #e6ecf5; background-image: linear-gradient(#fefefe, #f7f6f6);">Load more thread replies <span>+</span></a>
          ';
        }else{
            $output = ' <button type="button" name="loadmore-cmt" class="btn btn-info form-control noComment ">No Data Comment</button>
        ';
        }
      echo $output;


    }
}

