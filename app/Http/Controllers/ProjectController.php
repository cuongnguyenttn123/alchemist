<?php

namespace App\Http\Controllers;

use App\Libs\Calculator;
use Auth;
use View;
use Event;
use Response;
use App\Models\Bid;
use App\Models\Tag;
use App\Libs\Convert;
use App\Events\NewBid;
use App\Libs\Generate;

use App\Models\Review;
use App\Models\Payment;

use App\Models\Project;
use App\Events\AwardBid;
use App\Models\BidSkill;
use App\Models\Category;
use App\Models\Location;
use App\Models\Question;
use App\Models\BidStatus;
use App\Models\Milestone;
use App\Events\NewMessage;
use App\Models\BidMessage;
use App\Events\Shortlisted;
use App\Models\QuestionPack;

use Illuminate\Http\Request;
use App\Events\AcceptProject;
use App\Events\CancelProject;
use App\Models\PaymentStatus;
use App\Models\ProjectStatus;
use App\Models\ProjectMessage;

use App\Models\MilestoneStatus;
use App\Models\ProjectCategory;

use App\Events\RequestMilestone;
use App\Models\MilestoneRequest;
use App\Mail\Project\WriteReview;
use App\Models\ProjectAttachments;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ReleaseNotification;
use App\Notifications\CompleteNotification;
use App\Mail\Project\Alchemist\MilestonePaid;
use App\Notifications\TrackingUploadNotification;
use App\Mail\Project\Seeker\MilestonePaymentRequest;

class ProjectController extends Controller
{

    protected $metas = [];
    protected $filters = [
        "date" => "project.created_at",
        "desc" => "desc",
        "asc" => "asc",
        "deadline" => "project.deadline",
        "budget" => "project.budget",
    ];
    protected $category;
    protected $project;
    protected $tag;
    protected $location;
    protected $question;
    protected $question_pack;
    protected $pcat;
    protected $mile;
    protected $meta;

    public function __construct()
    {
        // $this->middleware("auth");
        $this->category = new Category();
        $this->project = new Project();
        $this->tag = new Tag();
        $this->location = new Location();
        $this->question = new Question();
        $this->question_pack = new QuestionPack();
        $this->pcat = new ProjectCategory();
        $this->mile = new Milestone();

        $review = new Review();
        $criteria_rating = $review->criteria;
        view()->share([
            'criteria_rating' => $criteria_rating
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->categories();

        return view('admin.project.index', compact(['categories']));
    }
    public function modify(Request $req)
    {

        $id = $req->id;
        if ($id) {
            $project = $this->project->project($id);
            $project->deadline = Convert::int_to_date($project->deadline);
            $project->bid_start = Convert::int_to_date($project->bid_start);
            $project->bid_end = Convert::int_to_date($project->bid_end);
            $project->categories = Generate::gen_array($project->categories, "_category");
            $project->metas = Generate::gen_array_contain_object($project->metas, "meta_key");
            $categories = $this->category->categories();
            $countries = $this->location->countries();
            $files = Auth::user()->medias();
            return view("admin.project.update", compact(["project", "files", "countries", "categories"]))->with('metas', $this->metas);
        }
    }

    /**
     * @author khaihoangdev@gmail.com
     * @desc show list project
     * @return View
     * @time 08h:21/12/2018
     */
    public function projects(Request $req)
    {
        #region init
        $query = [];
        $skip = null;
        $limit = null;
        $sum_projects = null;
        $today_projects = null;
        $pages = Generate::paging($this->project, 10)->toArray();
        #endregion init
        #region query manage
        if ($req->query("action") == 'filter') {
            $this->filters[$req->query("cmd")] = isset($this->filters[$req->query("cmd")]) ? $this->filters[$req->query("cmd")] : '';
            $this->filters[$req->query("val")] = isset($this->filters[$req->query("val")]) ? $this->filters[$req->query("val")] : '';
            $query = ['cmd' => $this->filters[$req->query("cmd")], 'val' => $this->filters[$req->query("val")]];
        }
        $page = is_numeric($req->query("page")) && $req->query("page") > 0 ? $req->query("page") : 0;
        #endregion query manage
        $projects = $this->project->projects($query, $page);
        foreach ($projects as &$project) {
            $project->deadline = Convert::int_to_date($project->deadline);
        }
        return view('admin.project.projects', compact(["projects", "pages"]));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        //return $categories;
        $countries = $this->location->countries();
        $files = Auth::user()->medias();
        foreach ($files as &$file)
            $file->time = Convert::int_to_date($file->time);

        return view('admin.project.create', compact(['categories', "countries", "files"]))->with("metas", $this->metas);
    }
    /**
     * @author khaihoangdev@gmail.com
     * @desc this func was not validated
     * @return
     * @time 10h:06/12/2018
     */
    public function update(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|max:255',
            'short_description' => 'required',
            'detail_description' => 'required',
            'budget' => 'required|min:0',
            'deadline' => 'required|date',
            'bid_start' => 'required|date',
            'bid_end' => 'required|date',
            'milestones' => 'required',
            'categories' => 'required',
            'address_country' => 'required',
            'address_city' => 'required',
        ], [
            // set message
        ]);

        $data = $req->toArray();
        $data["deadline"] = Convert::date_convert($data["deadline"]);
        $data["bid_start"] = Convert::date_convert($data["bid_start"]);
        $data["bid_end"] = Convert::date_convert($data["bid_end"]);
        // project
        //  dd($data);
        $_project = $this->project->_update($data);
        if ($_project) {
            // Category
            $categories = $data["categories"];
            $this->pcat->_delete_all($_project);
            foreach ($categories as $category) {
                $pcat = new ProjectCategory();
                $pcat->_update($category, $_project);
            }
            // tag
            $tags = explode(",", $data["tags"]);
            $this->tag->_delete_all($_project);
            foreach ($tags as $t) {
                $tag = new Tag();
                $tag->_update($t, $_project);
            }

            // question pack
            $_old_pack = $this->question_pack->_delete_all($_project);
            $_question_pack = $this->question_pack->_update($_project);

            // question
            $questions = json_decode($data["questions"]);
            if ($_old_pack)
                $this->question->_delete_all($_old_pack);
            foreach ($questions as $question) {
                $ques = new Question();
                $ques->_update($question, $_question_pack);
            }
            // mile
            $miles = json_decode($data["milestones"]);
            $this->mile->_delete_all($_project);
            foreach ($miles as $mile) {
                // $mile->mile_time_start = Convert::date_convert($mile->mile_time_start);
                // $mile->mile_time_end = Convert::date_convert($mile->mile_time_end);
                $mil = new Milestone();
                $mil->_update($mile, $_project);
            }
            // meta
            $metas = get_object_vars(json_decode($data["metas"]));
            $this->meta->_delete_all($_project);
            foreach ($metas as $key => $value) {
                $pmet = new ProjectMeta();
                $pmet->_update(["key" => $key, "value" => $value], $_project);
            }
        }
        return view("admin.project.index");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $res = $this->project->_delete($request->toArray());
        return Response::json(["status" => $res]);
    }
    public function getBids(Request $request)
    {
        $skip = $request->length ?? 0;
        $orderBy = $request->filter ?? 'id,desc';
        $orderBy = explode(',', $orderBy);
        $template = 'template_part.content-bid';
        $bids = Bid::where('_project', $request->id)->orderBy($orderBy[0], $orderBy[1])->skip($skip)->limit(5)->get();
        if (isset($request->shortlist)) {
            $template = 'template_part.content-bidshortlist';
            $bids = Bid::where('_project', $request->id)
                ->where('shortlist', 1)
                ->orderBy($orderBy[0], $orderBy[1])
                ->skip($skip)->limit(5)->get();
        }


        $data = '';
        foreach ($bids as $bid) {
            $view = View::make($template, ['bid' => $bid]);
            $data .= (string) $view;
        }

        return response()->json([
            'error' => false,
            'data' => $data
        ], 200);
    }
    public function changeShortlist(Request $request)
    {
        $bid = Bid::find($request->id);
        // dd($bid->siblings()->Shortlisted());
        $project = $bid->project;
        if ($request->type == 'remove') {
            $bid->update(['shortlist' => null]);
        } else {
            if ($project->shortlist_bids()->count() >= $project->max_shortlist) {
                return response()->json([
                    'error' => true,
                    'message' => 'Max shortlist'
                ], 200);
            }
            $bid->update(['shortlist' => 1]);
            event(new Shortlisted($bid));
        }

        $data1 = '';
        $data2 = '';
        foreach ($bid->siblings()->Shortlisted() as $bid) {
            $view = View::make('template_part.content-usershortlist', ['bid' => $bid]);
            $data1 .= (string) $view;
        }
        foreach ($bid->siblings()->Shortlisted()->take(1) as $bid) {
            $view = View::make('template_part.content-divbidmessage', ['bid' => $bid]);
            $data2 .= (string) $view;
        }

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data1' => $data1,
            'data2' => $data2
        ], 200);
    }
    public function postMessage(Request $request)
    {
        $user = Auth::user();

        $project = Project::find($request->pj_id);
        $arr_files = [];
        $files = $request->file('files');
        if ($files) {
            foreach ($files as $file) {
                $fc = new FileController();
                $store_info = $fc->store_attachment($file);
                $attachment = $store_info['attachment'];
                $upload_path = $store_info['upload_path'];
                // @dd($upload_path);
                $pj_attachment = new ProjectAttachments();
                $pj_attachment->_project = $project->id;
                $pj_attachment->_user = $user->id;
                $pj_attachment->url = $upload_path;
                $pj_attachment->name = $attachment->name;
                $pj_attachment->ori_name = $attachment->ori_name;
                $pj_attachment->extension = $attachment->extension;
                $pj_attachment->size = $attachment->size;
                $pj_attachment->save();
                $arr_files[] = $pj_attachment->id;
            }
        }

        $data = [
            'user' => $user->id,
            'project' => $request->pj_id,
            'files' => $arr_files,
            'message' => $request->message
        ];
        $mess = new ProjectMessage();
        $pjmess_id = $mess->_update($data);
        $view = View::make('template_part.content-projectmessage', ['ps' => $mess]);
        $data = (string) $view;
        //call event
        event(new NewMessage($mess, $type = 'project'));
        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }
    public function trackingUpload(Request $request)
    {
        $user = Auth::user();
        $type = $request->type;
        $ms = Milestone::find($request->ms_id);
        $list_files = $ms->$type ?? [];
        $project = $ms->project;
        $files = $request->file('files');
        $new_files = [];
        if ($files) {
          foreach ($files as $key => $file) {
            $value_file = true;
            if (isset($request->file_attached_delete)) {
              $fruits_ar = explode(',', $request->file_attached_delete);
              foreach ($fruits_ar as $value) {
                if ($value == $key) {
                  $value_file = false;
                }
              }
            }
            if ($value_file) {
              $fc = new FileController();
              $store_info = $fc->store_attachment($file);
              $attachment = $store_info['attachment'];
              $upload_path = $store_info['upload_path'];
              // @dd($upload_path);
              $pj_attachment = new ProjectAttachments();
              $pj_attachment->_project = $project->id;
              $pj_attachment->_user = $user->id;
              $pj_attachment->url = $upload_path;
              $pj_attachment->name = $attachment->name;
              $pj_attachment->ori_name = $attachment->ori_name;
              $pj_attachment->extension = $attachment->extension;
              $pj_attachment->size = $attachment->size;
              $pj_attachment->save();
              $list_files[] = $pj_attachment->id;
              $new_files[] = $pj_attachment->id;
            }
          }
        }
        if (isset($request->file_attached_delete_cosan)) {
          $fruits_ar = explode(',', $request->file_attached_delete_cosan);
          ProjectAttachments::destroy($fruits_ar);
        }
        $ms->$type = $list_files;
        $ms->save();

        $files = ProjectAttachments::whereIn('id', $new_files)->get();
        $data = '';
        foreach ($files as $key => $file) {
            $view = View::make('template_part.content-attachdeliveryAlchemist', ['file' => $file, 'key'=> $request->key, 'show_key'=> $request->show_key]);
            $data .= (string) $view;
        }
        //call event
        $seeker = $project->user;
        $seeker->notify((new TrackingUploadNotification($ms)));

        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }
    //alchemist request milestone
    public function milestoneRequest(Request $request)
    {
        $current_user = Auth::user();

        $id = $request->id;
        $ms = Milestone::find($id);
        // $ms->waitingPaymentMilestone(); //change status milestone
        $date = date('Y-m-d');
        $start_work = $ms['start_work'];
        $workday = $ms['workday'];
        $done_work = date('Y-m-d', strtotime($start_work. ' + '.$workday.' days'));
        if ($date < $done_work){
          $ms->changeStatus('Early Release');
        }else{
          $ms->changeStatus('Payment Due');
        }

        $ms_request = new MilestoneRequest;
        $ms_request->createNew([
            'milestone' => $id,
            'user' => $ms->project->user->id,
            'value' => $ms->price_bid
        ]);
        $ms->updateDonework();
        event(new RequestMilestone($ms->project));

        Mail::to($ms->project->user->email)->send(new MilestonePaymentRequest($current_user, $ms->project->user, $ms->project, $ms_request));

        $message = 'Success';

        return response()->json([
            'error' => false,
            'message' => $message,
        ], 200);
    }

  public function getTotalJob(Request $request)
  {
    $current_user = Auth::user();

    $acceptAwardBid = Calculator::acceptAwardBid($current_user->id);
    $totalAcceptAwardBid = Calculator::totalAcceptAwardBid($current_user->id);
    $message = 'Success';
    return response()->json([
      'error' => false,
      'message' => $message,
      'acceptAwardBid' => $acceptAwardBid,
      'totalAcceptAwardBid' => $totalAcceptAwardBid,
    ], 200);
  }

  public function milestoneStart(Request $request)
  {
    $current_user = Auth::user();

    $id = $request->id;
    $ms = Milestone::find($id);
    // $ms->waitingPaymentMilestone(); //change status milestone
    $ms->changeStatusProcessing('Underway');
    //chang status

    $message = 'Success';

    return response()->json([
      'error' => false,
      'message' => $message,
    ], 200);
  }
    //seeker do it
    public function releasePayment(Request $request)
    {
        $current_user = Auth::user();

        $id = $request->id;
        $ms = Milestone::find($id);
        if ($current_user->wallet <= $ms->price_bid) {
            return response()->json([
                'error' => true,
                'message' => 'Your wallet is not enough',
            ], 200);
        }
        $ms->completeMilestone();
        //update request milestone
        $milestone_request = MilestoneRequest::where('_milestone', $ms->id)->first();
        $milestone_request->update(['status' => 'completed']);

        $pm = new Payment();
        $pm->createMilestonePayment([
            '_milestone' => $ms->id,
            'price' => $ms->price_bid
        ]);
        //decrement user wallet
        $current_user->decrement('wallet', $ms->price_bid);
        $message = 'Success';

        //notification
        $alchemist = $ms->user;
        $alchemist->notify((new ReleaseNotification($ms)));

        Mail::to($alchemist->email)->send(new MilestonePaid($alchemist, $current_user, $ms->project, $ms));

        return response()->json([
            'error' => false,
            'message' => $message,
        ], 200);
    }
    public function completeProject(Request $request)
    {
        $current_user = Auth::user();
        $new_ms = ProjectStatus::firstOrCreate(['status' => 'completed']);
        $bid_status = BidStatus::firstOrCreate(['status' => 'accepted']);
        $new_bid_status = BidStatus::firstOrCreate(['status' => 'completed']);
        $id = $request->id;
        $pj = Project::find($id);
        $bid_accepted = $pj->bids()->where('_status', $bid_status->id)->first();
        $bid_accepted->_status = $new_bid_status->id;
        $bid_accepted->save();
        // dd($bid_accepted->id);
        $pj->_status = $new_ms->id;
        $pj->save();
        $message = 'Success';

        $pj->userwon->notify((new CompleteNotification($pj)));

        Mail::to($current_user)->send(new WriteReview($current_user, $pj->userwon, $pj, $pj->updated_at, false));
        Mail::to($pj->userwon)->send(new WriteReview($pj->userwon, $current_user, $pj, $pj->updated_at, true));

        return response()->json([
            'error' => false,
            'message' => $message,
        ], 200);
    }
}
