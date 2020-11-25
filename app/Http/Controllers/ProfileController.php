<?php

namespace App\Http\Controllers;

use App\Libs\Convert;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Storage;
use URL;
use File;
use Event;
use Carbon\Carbon;
use App\Events\NewProject;

use Input;
use Validator;
use Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User_Status;
use App\Models\UserMeta;
use App\Models\UserTitle;
use App\Models\Skill;

use App\Models\ProjectMessage;
use App\Models\ProjectStatus;
use App\Models\Project;
use App\Models\ProjectAttachments;
use App\Models\ProjectUserTitle;
use App\Models\Category;
use App\Models\Location;
use App\Models\Tag;
use App\Models\Milestone;
use App\Models\MilestoneStatus;
use App\Models\Bid;
use App\Models\BidStatus;
use App\Models\Media;
use App\Models\ListType;
use App\Models\Language;
use App\Models\Review;

//s2nhomau
use App\Myconst;
use App\Models\UserPoint;
use App\Models\Rating;
//end
use App\Http\Controllers\NotificationController;

use App\Libs\Calculator;
use App\Libs\Generate;

class ProfileController extends Controller
{
    public $currencies;
	public function __construct(){
        $UserPoint = new UserPoint;
        $this->middleware(['frontendLogin']);
        $this->middleware(function ($request, $next) {
            $this->notif = new NotificationController();
	        $this->user = Auth::user();
	        return $next($request);
	    });
        $cats = Category::all();
        $list_type = ListType::Available();
        $skills = Skill::all();
        $alchemist_title = UserTitle::list_title('alchemist');

        // Sharing is caring
        View::share('cats', $cats);
        View::share('skills', $skills);
        View::share('alchemist_title', $alchemist_title);
        View::share('list_type', $list_type);
        //list language
        $list_language = Language::All();
        //list location
        $list_location = Location::orderby('country', 'ASC')->get();

        $skills = Skill::all();

        $review = new Review();
        $criteria_rating = $review->criteria;

        $this->currencies = ['AUD', 'CAD', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF', 'ILS', 'JPY', 'MYR', 'MXN', 'NOK', 'NZD', 'PHP', 'PLN', 'GBP', 'RUB', 'SGD', 'SEK', 'CHF', 'TWD', 'THB', 'USD'];

        view()->share([
            'list_language'=>$list_language,
            'list_location'=> $list_location,
            'currencies'=> $this->currencies,
            'criteria_rating'=> $criteria_rating
        ]);

	}
    function about() {
        $user = $this->user;
        $target_user = $this->user;
        $alchemist = $user;
        if ($alchemist) {
            $all_meta = $alchemist->user_meta();
            $meta = array();
            foreach ($all_meta as $mt) {
                $meta[$mt['meta_key']] = $mt['meta_value'];
            }
            // dd($meta);
            return view('user', compact('user','target_user', 'alchemist', 'meta'));
        }
    }
    function timeline() {
        $listTopUser = User::
        whereHas('roles',function($q){
          $q->where('name','Alchemist');
        })->
        orderBy('SBP', 'DESC')->get();
        $user = $this->user;
        $target_user = $user;
        $files = [];
        if($user) $files = $user->media->whereIn('extension', ['jpg', 'png']);
        return view('myprofile.timeline', compact('user', 'target_user', 'files','listTopUser'));
    }
    function portfolio() {
        $user = $this->user;
        $target_user = $user;
        $files = [];
        if($user) $files = $user->media->whereIn('extension', ['jpg', 'png']);
        $albums = $user->albums;
        return view('myprofile.portfolio', compact('user', 'target_user', 'files', 'albums'));
    }
    function stats() {
        $user = $this->user;
        $target_user = $user;
        $files = [];
        if($user) {
          $files = $user->media->whereIn('extension', ['jpg', 'png']);
        }
        return view('myprofile.stats', compact('user', 'target_user', 'files'));
    }
    function index() {
        $user = $this->user;
        $target_user = $user;
        return view('myprofile.info', compact('user', 'target_user'));
    }
    function mywallet() {
        $user = $this->user;
        $target_user = $user;
        return view('myprofile.wallet', compact('user', 'target_user'));
    }
    function change_pass() {
        $user = $this->user;
        $target_user = $user;
        return view('myprofile.change_pass', compact('user', 'target_user'));
    }
    function saveChange_pass(Request $request) {
        $user = $this->user;
        $target_user = $user;
        // dd(Hash::check($request->current_password, $user->password));
		$this-> Validate($request,[
			'current_password' => 'required',
			'new_password' => 'required',
			'renew_password' => 'required|same:new_password'
		]);
		// dd($request->all());
		if (Hash::check($request->current_password, $user->password)) {
			$user->password = bcrypt($request->new_password);
			$user->save();
        	return redirect()->back()->with('success','Password changed');
		}else {
        	return redirect()->back()->with('error','Password not match');
		}
    }
  function info() {

    $user = $this->user;
    $target_user = $user;
    $all_meta = $user->user_meta();
    $language = $user->language()->get()->toArray();
    $languageUser = array();
    foreach ($language as $val){
      $languageUser[] = $val['language_name'];
    }
    $meta = array();
    if ($all_meta) {
      foreach ($all_meta as $mt) {
        $meta[$mt['meta_key']] = $mt['meta_value'];
      }
    }

    return view('myprofile.info', compact('user', 'target_user', 'meta', 'languageUser'));
  }
    function saveInfo(Request $request) {
        $user = $this->user;
        $target_user = $user;

		$this-> Validate($request,[
			'email' => 'required|email|unique:users,email,' . $user->id,
			'first_name' => 'required',
			'last_name' => 'required',
			'phone' => 'required|numeric'
		]);
        if($request->has('meta')){
            foreach ($request->meta as $key => $value) {
                if($value != ''){
                    $meta =  UserMeta::firstOrNew(['meta_key' => $key]);
                    $meta->meta_value = $value;
                    $meta->_user = $user->id;
                    $meta->save();
                }
            }
        }
        if($request->has('birthday')){
            $meta =  UserMeta::firstOrNew(['meta_key' => 'birthday']);
            $meta->meta_value = $request->birthday;
            $meta->_user = $user->id;
            $meta->save();
        }
		// dd($request->meta);
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->phone = $request->phone;
		$user->sex = $request->sex;
        $user->_location = $request->country;
		$user->save();
        return redirect()->back()->with('success','Save changed');
    }
    function savePrice(Request $request) {
        $user = $this->user;
        foreach ($request->toArray() as $key => $value) {
            if($key != '_token') {
                $meta =  UserMeta::firstOrNew(['meta_key' => $key, '_user' => $user->id]);
                $meta->meta_value = $value;
                $meta->_user = $user->id;
                $meta->save();
            }
        }
        return redirect()->back()->with('success_price','Save changed');
    }
    function settings() {
        $user = $this->user;
        $target_user = $user;
        return view('myprofile.settings', compact('user', 'target_user'));
    }
    function saveSettings(Request $request) {
        $user = $this->user;
		$this-> Validate($request,[

		]);
        return redirect()->back()->with('success','Save changed');
    }
    function hnb() {
        $user = $this->user;
        $target_user = $user;
        $all_meta = $user->user_meta();
        $meta = array();
        if ($all_meta) {
            foreach ($all_meta as $mt) {
                $meta[$mt['meta_key']] = $mt['meta_value'];
            }
        }
        return view('myprofile.hnb', compact('user', 'target_user', 'meta'));
    }
    function savehnb(Request $request) {
        $user = $this->user;
        // dd($request->toArray());
        foreach ($request->toArray() as $key => $value) {
            if($key != '_token') {
                $meta =  UserMeta::firstOrNew(['meta_key' => $key, '_user' => $user->id]);
                if($value == ''){
                    $meta->delete();
                }else {
                    $meta->meta_value = $value;
                    $meta->_user = $user->id;
                    $meta->save();
                }
            }
        }
        return redirect()->back()->with('success','Save changed');
    }
    function ene() {
        $user = $this->user;
        $target_user = $user;
        $edu = json_decode($user->get_usermeta('edu'));
        $emp = json_decode($user->get_usermeta('emp'));
        return view('myprofile.yeh', compact('user','target_user', 'edu', 'emp'));
    }
    function saveene(Request $request) {
        $user = $this->user;
        $target_user = $user;
        if ($request->has('edu')) {
            $data = json_decode($request->edu, true);
            $key = 'edu';
        }
        if ($request->has('emp')) {
            $data = json_decode($request->emp, true);
            $key = 'emp';
        }
        // dd($request->toArray());
        $meta =  UserMeta::firstOrNew(['meta_key' => $key, '_user' => $user->id]);
        $meta->meta_value = json_encode($data);
        $meta->_user = $user->id;
        $meta->save();
        return redirect()->back()->with($key,'Save changed');
    }
    function myskills() {
        // dd($cat);
        /*dd($cat->skills()->get());
        foreach ($cat->skills() as $key => $value) {
            dd($value);
        }*/
        $user = $this->user;
        $target_user = $user;
        return view('myprofile.myskills', compact('user', 'target_user'));
    }
    function saveMyskills(Request $request) {
        $user = $this->user;
        $target_user = $user;
		$this-> Validate($request,[

		]);
        return redirect()->back()->with('success','Save changed');
    }
    //get project by user id
    public function getprojectopen($user_id = 0){
        $exclude_status = ProjectStatus::whereIn('status', ['completed','processing','Waiting Accept'])->pluck('id')->toArray();
        $res = Project::select('project.*')
            ->where(function($query) use ($user_id){
                $query->where('project._employer', '=', $user_id);
            })
            ->whereNotIn('_status',$exclude_status)
            ->orderBy('id', 'desc')
            ->paginate(5);
        return $res;
    }
    //get project by user id
    public function getproject_user($user_id = 0, $status = false){
        $res = Project::select('project.*')
                ->join('bid', function ($join){
                    $join->on('project.id', '=', 'bid._project');
                })
                ->join('bid_status', function ($join){
                    $join->on('bid_status.id', '=', 'bid._status');
                })
                ->where(function($query) use ($user_id, $status){
                    $query->where('project._employer', '=', $user_id)
                    ->where('bid_status.status', '=', $status);
                })
            ->orderBy('id', 'desc')
            ->paginate(5);
        return $res;
    }
    //get project user bid by status
    public function getproject_userbid($user_id = 0, $status = "pending"){
        $res = Project::select('bid_status.status','project.*')
                ->join('bid', function ($join){
                    $join->on('project.id', '=', 'bid._project');
                })
                ->join('bid_status', function ($join){
                    $join->on('bid_status.id', '=', 'bid._status');
                })
                ->where(function($query) use ($user_id, $status){
                    $query->where('bid._freelancer', '=', $user_id)
                    ->where('bid_status.status', '=', $status);
                })
            ->orderBy('id', 'desc')
            ->paginate(5);
        return $res;
    }
    function myprojects() {
        $user = $this->user;
        $user_id = $user->id;
        $target_user = $user;

        if ($user->isSeeker()) {
            $awarding = $user->projects()->Opening();
            $current_project = $this->getproject_user($user_id, "accepted");
            $completed_project = $this->getproject_user($user_id, "completed");
        }else {
            $awarding = $this->getproject_userbid($user_id, "awarding");
            $current_project = $this->getproject_userbid($user_id, "accepted");
            $completed_project = $this->getproject_userbid($user_id, "completed");
        }

        $projects = $user->projects()->orderBy('id', 'desc')->paginate(5);

        return view('myprofile.myprojects', compact('user', 'target_user', 'awarding', 'completed_project', 'current_project'));
    }
    function manageJobs() {
        $user = $this->user;
        $user_id = $user->id;
        $target_user = $user;

        if ($user->isSeeker()) {
            //tab project
            $savedProjects = [];
            $activeBids = [];
            $awarding = $user->projects()->Opening();
            $current_project = $user->projects()->WithStatus('processing');
            $completed_project = $user->projects()->WithStatus('completed');

            //tab contest
            $saved_contests = $user->saved_contests();
            $post_contests = $user->post_contests();
            $joined_contest = $user->joined_contest();
            $past_contests = $user->past_contests();

            //tab dispute
            $list_dispute = $user->list_dispute();
            $invitedDispute = $user->invitedDispute();
            $acceptedDispute = $user->acceptedDispute();
        }else {
            //tab project
            $savedProjects = $user->saved_projects()->where('bid_end','>=',(time()-86400));
            $activeBids = $user->projectsBidded();
            $awarding = $user->projectsBidded('awarding');
            $current_project = $user->projectsBidded('accepted');
            $completed_project = $user->projectsBidded('completed');

            //tab contest
            $saved_contests = $user->saved_contests();
            $post_contests = $user->post_contests();
            $joined_contest = $user->joined_contest();
            $past_contests = $user->past_contests();

            //tab dispute
            $list_dispute = $user->list_dispute();
            $invitedDispute = $user->invitedDispute();
            $acceptedDispute = $user->acceptedDispute();
        }
        $job_counter = [
            'savedprojects' => (is_object($savedProjects)) ? $savedProjects->count() : 0,
            'activebids' => (is_object($activeBids)) ? $activeBids->count() : 0,
            'openjobs' => $awarding->count(),
            'currentjobs' => $current_project->count(),
            'archivejobs' => $completed_project->count(),
        ];
        $contest_counter = [
            'saved_contests' => (is_object($saved_contests)) ? $saved_contests->count() : 0,
            'post_contests' => (is_object($post_contests)) ? $post_contests->count() : 0,
            'joined_contest' => (is_object($joined_contest)) ? $joined_contest->count() : 0,
            'past_contests' => (is_object($past_contests)) ? $past_contests->count() : 0,
        ];
        $dispute_counter = [
            'mydisputes' => $list_dispute->count(),
            'disputeinvite' => $invitedDispute->count(),
            'acceptedisputes' => $acceptedDispute->count(),
        ];
        // dd($current_project );

        return view('myprofile.manage-jobs', compact('user', 'target_user', 'job_counter', 'contest_counter', 'dispute_counter'));
    }
    function loadMoreManage(Request $request){
        $user = $this->user;
        $user_id = $user->id;
        $type = $request->type;
        if($type == 'savedprojects'){
            $jobs = $user->saved_projects()->where('bid_end','>=',(time()-86400));
            $template = 'content-jobsaved';
        }
        if($type == 'activebids'){
            $jobs = $user->projectsBidded();
            $template = 'content-jobbidded';
        }
        if($type == 'openjobs'){
            if ($user->isSeeker()) {
                $jobs = $user->projects()->Opening();
            }else {
                $jobs = $user->projectsBidded('awarding');
            }
            $template = 'content-jobopen';
        }
        if($type == 'currentjobs'){
            if ($user->isSeeker()) {
                $jobs = $user->projects()->WithStatus('processing');
            }else {
                $jobs = $user->projectsBidded('accepted');
            }
            $template = 'content-jobcurrent';
        }
        if($type == 'archivejobs'){
            if ($user->isSeeker()) {
                $jobs = $user->projects()->WithStatus('completed');
            }else {
                $jobs = $user->projectsBidded('completed');
            }
            $template = 'content-jobarchive';
        }
        $accept = false;
        if($type == 'mydisputes'){
            $disputes = $user->list_dispute();
            $template = 'content-mydispute';
        }
        if($type == 'disputeinvite'){
            $disputes = $user->invitedDispute();
            $template = 'content-disputeinvite';
        }
        if($type == 'acceptedisputes'){
            $disputes = $user->acceptedDispute();
            $template = 'content-disputeinvite';
            $accept = true;
        }
        if($type == 'saved_contests'){
            $contest = $user->saved_contests();
            $template = 'content-contestsaved';
        }
        if($type == 'post_contests'){
            $contest = $user->post_contests();
            $template = 'content-contestposted';
        }
        if($type == 'joined_contest'){
            $contest = $user->joined_contest();
            $template = 'content-contestjoined';
        }
        if($type == 'past_contest'){
            $contest = $user->past_contests();
            $template = 'content-contestpast';
        }
        $data = '';
        if($type == 'savedprojects' || $type == 'activebids' || $type == 'openjobs' || $type == 'currentjobs' || $type == 'archivejobs'){
            foreach ($jobs as $project) {
                $view = View::make("template_part.$template",
                    ['project' => $project, 'user' => $user]);
                $data .= $view;
            }
        }
        if($type == 'mydisputes' || $type == 'disputeinvite' || $type == 'acceptedisputes'){
        foreach ($disputes as $dispute) {
                $view = View::make("template_part.$template",
                    ['dispute' => $dispute, 'user' => $user, 'accept' => $accept]);
                $data .= $view;
            }
        }
        if($type == 'saved_contests' ||$type == 'post_contests' || $type == 'joined_contest' || $type == 'past_contest'){
            foreach ($contest as $contest) {
                $view = View::make("template_part.$template",
                    ['contest' => $contest, 'user' => $user]);
                $data .= $view;
            }
        }

        return response()->json([
                    'error' => false,
                    'data' => $data,
                    'message' => 'success'
                ], 200);
    }
    function projectTracking($slug, $id) {
        $user = $this->user;
        $ex = explode('-',$id);
        $last = end($ex);

        $target_user = $this->user;
        $project = Project::find($last);

        if($project && ($project->is_author() || $project->bidwon->user->id == $user->id)){
            return view('myprofile.project-tracking', compact('user','target_user', 'project'));
        }
        return abort(404);
    }
    function projectBids($slug, $id) {
        $user = $this->user;
        $ex = explode('-',$id);
        $last = end($ex);

        $target_user = $this->user;
        $project = Project::find($last);
        $bids = $project->bids->take(5);
        if($project){
            if($project->user_bided()){
                return view('myprofile.project-bids-alchemist', compact('user','target_user', 'project'));
            }elseif($project->is_author()) {
                return view('myprofile.project-bids', compact('user','target_user', 'project', 'bids'));
            }else {
                return abort(404);
            }
        }else {
            return abort(404);
        }
    }

    // hungpro

    function finance() {
        $user = $this->user;
        $target_user = $this->user;
        $deposits = Deposit::where('_user', $user->id)->orderBy('created_at', 'desc')->paginate(15);
        //dd($deposits);

        return view('myprofile.thefinancemanager', compact('user','target_user', 'deposits'));

    }
    function newcontest() {
        $user = $this->user;
        $target_user = $this->user;
        $list_title = UserTitle::list_title('alchemist');
        return view('myprofile.newcontest', compact('user','target_user','list_title'));

    }
    function contesttracking() {
        $user = $this->user;
        $target_user = $this->user;

        return view('contesttracking', compact('user','target_user'));

    }
    // end hungpro
    function singleproject($id) {
        $user = $this->user;
        $target_user = $this->user;
        $project = Project::with('attachments')->find($id);
        if($project){
            return view('myprofile.singleproject', compact('user','target_user', 'project'));
        }else {
            return abort(404);
        }
    }
    function newproject() {
        // $project = Project::find(48);
        // event(new NewProject($project));
        $user = $this->user;
        $target_user = $user;
        $list_title = UserTitle::list_title('alchemist');

        $files = Auth::user()->medias();
        foreach($files as &$file)
          $file->time = Convert::int_to_date($file->time);

        $location = new Location();
        $countries = $location->countries();

        return view('myprofile.newproject', compact('user', 'target_user', 'countries', 'files', 'list_title'));
    }
    public function ajaxPostFile(Request $request)
    {

      $idFile = [];
      $listFile = [];
      $user = $this->user;
      $now = getdate();
      $currentDate = $now["mday"];
      $id_project = $user->id.$currentDate;
      $files = $request->file('file_attached');
      if ($files) {
        foreach ($files as $key => $file) {
          $fc = new FileController();
          $store_info = $fc->store_attachment($file);
          $attachment = $store_info['attachment'];
          $upload_path = $store_info['upload_path'];
          $pj_attachment = new ProjectAttachments();
          $pj_attachment->_project = $id_project;
          $pj_attachment->_user = $user->id;
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
    function postjob(Request $request) {
        $user = $this->user;
        $bonusOld = Calculator::calculationBasedOnProjectAcceptAwardBid($user);

        $wallet = $user->wallet;
        $credit_total = $user->credit+$user->credit_lock;
        $now = getdate();
        $currentDate = $now["mday"];
        $id_project = $user->id.$currentDate;
        $link= '<a href="'.route('profile.thefinancemanager').'">LINK</a>';
        $rules = [
            'budget' => "required|numeric|max:$wallet",
            'credit' => "numeric|max:$credit_total"
        ];
        $message = [
            'budget.max' => "Your wallet is not enough. Please go to $link and add credit before posting a job",
            'credit.max' => "Your Credit allowance is not enough. Please go to $link and add credit before posting a job",
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // dd($request->toArray());
        $now = Carbon::now();

        $project_status = ProjectStatus::firstOrCreate(['status' => 'created']);
        $ms_status = MilestoneStatus::firstOrCreate(['status' => 'created']);

        $project = new Project;
        $project->name = $request->name;
        $project->short_description = '';
        $project->detail_description = $request->detail_description;
        $project->budget = str_replace(',','',$request->budget);
        $project->bid_start = Convert::date_convert($now);
        $project->bid_end = Convert::date_convert($now->addWeeks($request->week));
        $project->deadline = Convert::date_convert($request->deadline);
        $project->_status = $project_status->id;
        $project->_employer = $user->id;
        // dd($project);
        if($project->save()){
            $project->categories()->sync($request->cats);
            if($request->has('user_title'))
                $project->user_title()->sync($request->user_title);
            if($request->has('skill'))
                $project->skills()->sync($request->skill);
            if($request->has('list_type'))
                $project->listtype()->sync($request->list_type);
            if($request->has('language'))
                $project->languages()->sync($request->language);

            /*$tags = explode(',', $request->tags);
            foreach ($tags as $tag_name) {
                $tag = new Tag;
                $tag->name = $tag_name;
                $project->tags()->save($tag);
            }*/
            if($request->mile){
                foreach ($request->mile as $milestone) {
                    if(!empty(array_filter($milestone))){
                        $ms = new Milestone;
                        $ms->title = $milestone['title'];
                        $ms->description = $milestone['description'];
                        $ms->workday = $milestone['workday'];
                        $ms->percent_payment = $milestone['percent_payment'];
                        $ms->_bid = null;
                        // $ms->content = $milestone['content'];
                        $ms->_status = $ms_status->id;
                        $project->milestone()->save($ms);
                    }
                }
            }

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
                  }
                }
            }
            //spend credit
            $user->spendCredit($request->credit);
        }
        if (isset($request->file_attached_delete_drag)){
          $fruits_ar_drag = explode(',', $request->file_attached_delete_drag);
          foreach ($fruits_ar_drag as $value){
            ProjectAttachments::destroy($value);
          }
        }
        ProjectAttachments::where('_user', $user->id)
        ->where('_project', $id_project)
        ->update(['_project' => $project->id]);
        $bonusNew = Calculator::calculationBasedOnProjectAcceptAwardBid($user);
        $total_point = $bonusNew - $bonusOld;
        $user->increment('SP', $total_point);
        $user->save();
        //check if send mail and notification
        if($request->has('user_title')){
            event(new NewProject($project));
        }
        return redirect()->route('profile.myprojects')->with('SweetAlert', 'Post job successfully');
    }
    function editproject($id) {
        $user = $this->user;
        $target_user = $this->user;
        $project = Project::find($id);
        if($project == false) return abort(404);
        $files = Auth::user()->medias();
        foreach($files as $file)
          $file->time = Convert::int_to_date($file->time);
        //redirect if not auth project
        if($project->_employer != $user->id){
            return redirect()->route('profile.index');
        }
        $location = new Location();
        $countries = $location->countries();
        $pj_cats = $project->categories()->get()->pluck('id')->toArray();
        $pj_user_title = $project->user_title()->get()->pluck('id')->toArray();
        $ml = new Milestone;
        $ml->title = 'XXXXXXXXXalooooo';
        $ml->_project = 24;
        $ml->_status = 2;
        // $project->milestone()->save($ml);
        // dd($project->milestone()->get()->toArray());
        $list_title = UserTitle::list_title('alchemist');
        return view('myprofile.newproject', compact('user','target_user', 'countries', 'project', 'pj_cats', 'pj_user_title', 'files', 'list_title'));
    }
    function posteditproject(Request $request, $id) {
        $project_status = ProjectStatus::firstOrCreate(['status' => 'created']);
        $ms_status = MilestoneStatus::firstOrCreate(['status' => 'created']);
        $user = $this->user;
        $project = Project::find($id);
        //redirect if not auth project
        if($project->_employer != $user->id){
            return redirect()->route('profile.index');
        }
        $all_cats = Category::get()->pluck('id')->toArray();
        $project->categories()->sync($request->cats);
        $project->user_title()->sync($request->user_title);
        $tags = explode(',', $request->tags);
        $project->tags()->delete();
        foreach ($tags as $tag_name) {
            $tag = new Tag;
            $tag->name = $tag_name;
            $project->tags()->save($tag);
        }
        // dd($tags);
        if($request->mile){
            $project->milestone()->delete();
            foreach ($request->mile as $milestone) {
                $ms = new Milestone;
                $ms->title = $milestone['title'];
                $ms->description = $milestone['description'];
                $ms->workday = $milestone['workday'];
                $ms->percent_payment = $milestone['percent_payment'];
                // $ms->content = $milestone['content'];
                $ms->_status = $ms_status->id;
                $project->milestone()->save($ms);
            }
        }
        $project->name = $request->name;
        $project->short_description = $request->short_description;
        $project->detail_description = $request->detail_description;
        $project->budget = $request->budget;
        $project->bid_start = Convert::date_convert($request->bid_start);
        $project->bid_end = Convert::date_convert($request->bid_end);
        $project->deadline = Convert::date_convert($request->deadline);
        $project->_status = $project_status->id;
        $project->save();
        // dd($request->toArray());
        return redirect()->route('profile.myjobpostings');
    }
    function deleteproject(Request $request, $id) {
        $user = $this->user;
        $project = Project::find($id);
        //redirect if not auth project
        if(!isset($project) || $project->_employer != $user->id){
            return redirect()->route('profile.index');
        }
        // $project->_delete($id);
        $project->categories()->detach();
        $project->user_title()->detach();
        $project->milestone()->delete();
        $project->tags()->delete();
        $project->bids()->delete();
          //delete attach file
          /*foreach ($project->attachments as $file) {
            File::delete('public/'.$file->url);
            $file->delete();
          }*/
        $project->attachments()->delete();
        $project->delete();
        return redirect()->back();
    }
    function myjobpostings(Request $request) {
        $sidebar = 'left';
        $user = $this->user;
        $target_user = $this->user;
        $orderBy = 'id,desc';
        if (request('filter')) {
            $orderBy = request('filter');
        }
        $orderBy = explode(',', $orderBy);
        $projects = Project::select('project.*')
            // ->join('project_skill', 'project.id', '=', 'project_skill.project_id')
            // ->join('skill','project_skill.skill_id' , '=', 'skill.id')
            ->join('project_category','project.id', '=', 'project_category._project')
            ->join('category','project_category._category', '=', 'category.id')
            ->where(function($query) use ($request, $target_user){
                $query->where('_employer', $target_user->id);
                if($request->has('price_min') || $request->has('price_max')){
                    $query->where('budget', '>=', $request->price_min)->where('budget', '<=',$request->price_max);
                }
                if($request->category){
                    $query->where('category.name', $request->category);
                }
                /*if($request->filter_skill){
                    $query->whereIn('skill.name',$request->filter_skill);
                }*/
            })
            ->orderBy($orderBy[0], $orderBy[1])
            ->groupBy('project.id')
            ->paginate(Myconst::PAGINATE_SEARCH);
        return view('myprofile.myjobpostings', compact('user','target_user', 'projects', 'sidebar'));
    }
    function notifications() {
        $user = $this->user;
        $target_user = $user;
        return view('myprofile.notifications', compact('user', 'target_user'));
    }
    function saveUsers(Request $request) {
	    $user = $this->user->load('followings');
      $inputs = $request->all([
        'order_value',
        'keyword',
        'role',
        'order_by'
      ]);
      $target_user = $user;
      $userFollowing = $target_user->followings;
      $idUser = [];
      $keyword = $inputs['keyword'] ?? '';
      if (isset($inputs['keyword'])){
        foreach ($userFollowing as $user){
          if (stripos($user->full_name, $inputs['keyword']) !== false) {
            $idUser[] = $user->id;
          }
        }

        $userBid = SearchController::sortBidByUser($idUser, $inputs);
        $listUserFollowing = $userBid;

      }else{
        foreach ($userFollowing as $user){
          $idUser[] = $user->id;
        }
        $userBid = SearchController::sortBidByUser($idUser, $inputs);
        $listUserFollowing = $userBid;
      }
      $target_user->followings = $listUserFollowing;
        return view('myprofile.saveusers', compact('keyword','user', 'target_user'));
    }
    function saveUsersSeeker(Request $request) {
      $user = $this->user->load('followings');
      $inputs = $request->all([
        'order_value',
        'keyword',
        'role',
        'order_by'
      ]);
      $target_user = $user;
      $userFollowing = $target_user->followings;
      $idUser = [];
      $keyword = $inputs['keyword'] ?? '';
      if (isset($inputs['keyword'])){
        foreach ($userFollowing as $user){
          if (stripos($user->full_name, $inputs['keyword']) !== false) {
            $idUser[] = $user->id;
          }
        }

        $userBid = SearchController::sortBidByUser($idUser, $inputs);
        $listUserFollowing = $userBid;

      }else{
        foreach ($userFollowing as $user){
          $idUser[] = $user->id;
        }
        $userBid = SearchController::sortBidByUser($idUser, $inputs);
        $listUserFollowing = $userBid;
      }
      $target_user->followings = $listUserFollowing;
      $userSeeker = [];
      foreach($target_user->followings as $key => $mem){
        if(!$mem->isAlchemist()){
          $userSeeker[]= $mem;
        }
      }
      $user_row1=[];
      $user_row2=[];
      $user_row3=[] ;
      $j = 1;
      foreach($userSeeker as $key => $mem){
        if($j%3==1){
          $user_row1[]= $mem;
        }
        if($j%3==2){
          $user_row2[]= $mem;
        }
        if($j%3==0){
          $user_row3[]= $mem;
        }
        $j = $j+1;
      }
      $data1 = '';
      $data2 = '';
      $data3 = '';
      $user_row = $user_row1;
      $view1 = view('template_part.list-content-usepool', compact('keyword','user', 'target_user','user_row'));
      $user_row = $user_row2;
      $view2 = view('template_part.list-content-usepool', compact('keyword','user', 'target_user','user_row'));
      $user_row = $user_row3;
      $view3 = view('template_part.list-content-usepool', compact('keyword','user', 'target_user','user_row'));
      $data1 .=$view1;
      $data2 .=$view2;
      $data3 .=$view3;
      return response()->json([
        'error' => false,
        'data1' => $data1,
        'data2' => $data2,
        'data3' => $data3,
        'message' => 'success',
      ], 200);
    }

    //s2nhomau function filter user-profile
    function filterSearchUser($orderBy,$type,$keyword,$status){
        $list_users = User::select('users.*')
            ->join('role_user', function ($join) use ($type){
                if($type){
                    $join->on('users.id', '=', 'role_user.user_id')
                          ->where('role_user.role_id', $type);
                }else if($type == null || $type == ""){
                    $join->on('users.id', '=', 'role_user.user_id');
                }
            })
            ->join('favorites', function ($join) {
                $join->on('users.id', '=', 'favorites.favoritable_id')
                        ->where('favorites.favoritable_type', 'App\Models\User')
                        ->where('favorites.user_id', Auth::user()->id);
            })
            ->where(function($query) use ($keyword,$status){
                if($keyword){
                     $query->where('email', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('username', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('first_name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$keyword.'%');
                }

            })
            ->where(function($query) use ($status){
                if($status){
                    // $query->whereIn('_status',$status);
                }
            })
            ->orderBy($orderBy[0], $orderBy[1])
            ->groupBy('users.id')
            ->paginate(Myconst::PAGINATE_SEARCH);
        return $list_users;
    }
    //end
    function saveJobs() {
        $user = $this->user;
        $target_user = $user;
        return view('myprofile.savejobs', compact('user', 'target_user'));
    }
    function postProjectMessage(Request $request) {
        $user = $this->user;
        // dd($request->toArray());
        $ps = new ProjectMessage();
        // $ps->update($request->pj_id, $user->id, $request->message, $_parent = false, $_id = false);
        $ps->_project = $request->pj_id;
        $ps->_user = $user->id;
        $ps->message = $request->message;
        $ps->save();
        return redirect()->back();
    }
}

