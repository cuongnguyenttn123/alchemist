<?php

namespace App\Http\Controllers;

use App\Events\NewReportStatus;
use App\Events\NewsStatus;
use App\Mail\Project\Alchemist\BidAwardedAction;
use App\Mail\Project\ReceivedReview;
use App\Models\NewsFeedFavorite;
use App\Models\PostLikeStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;
use PhpParser\Comment;
use View;
use File;
use FFMpeg;

use App\Libs\Convert;
use App\Libs\Calculator;
use Validator;
use Auth;
use Illuminate\Auth\Passwords\PasswordBroker;

use App\Models\Bid;
use App\Models\BidMessage;
use App\Models\BidStatus;
use App\Models\BidSkill;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Milestone;
use App\Models\MilestoneRequest;
use App\Models\MilestoneStatus;
use App\Models\ProjectAttachments;
use App\Models\PostLikeCmt;

use App\Models\Category;
use App\Models\Skill;

use App\Models\User;
use App\Models\UserFavorite;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User_Status;
use App\Models\UserPoint;
use App\Models\UserSkillVote;
use App\Models\UserRp;
use App\Models\UserTitle;
use App\Models\UserMeta;

use App\Models\Rating;
use App\Models\Review;

use App\Models\Album;
use App\Models\Media;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\Video;

use App\Models\Payment;
use App\Models\PaymentStatus;

use App\Models\Favorite;

use MustVerifyEmail;
use DB;

use Event;
use App\Events\NewBid;
use App\Events\AwardBid;
use App\Events\AcceptProject;
use App\Events\CancelProject;
use App\Events\RequestMilestone;

use App\Notifications\ReleaseNotification;
use App\Notifications\ReviewNotification;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->user = Auth::user();

        $this->userinfo = new User;
        $this->post = new Post;
        $this->album = new Album;
        $this->video = new Video;
        $this->media = new Media;
        $this->rating = new Rating;

        // Sharing is caring
        View::share('user', $this->user);
        $cats = Category::all();
        $skills = Skill::pluck('name', 'id');
        $alchemist_title = UserTitle::list_title('alchemist');

        // Sharing is caring
        View::share('cats', $cats);
        View::share('skills', $skills);
        View::share('alchemist_title', $alchemist_title);
    }
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        $req = $request->toArray();
        $remember = (isset($req['remember'])) ? true : false;
        // dd($remember);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        } else {

            if (!Auth::attempt([
                'username' => $request->username,
                'password' => $request->password
            ], $remember)) {
                return response()->json([
                    'error' => true,
                    'message' => 'User name or password incorrect'
                ], 200);
            } else {
                if (Auth::user()->is_activated == 0) {
                    Auth::logout();
                    return response()->json([
                        'error' => true,
                        'message' => 'Please activate email'
                    ], 200);
                } else {
                    return response()->json([
                        'error' => false,
                        'message' => 'Success',
                        'success' => true
                    ], 200);
                }
            }
        }
    }
    public function register(Request $request)
    {
        $rules = [
            'user_type' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32',
            're_password' => 'same:password',
            'username' => 'required|unique:users,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'accept_term' => 'required',
            'country' => 'required'
        ];
        $message = [
            'accept_term.required' => 'You must agree before submitting.'
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ], 200);
            // return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user_status = User_Status::where('status', 'active')->first();
            $default_status = 'Pending';
            $user_type = $request->user_type;
            $role = Role::where('name', $user_type)->first();
            $user = new User;
            $user->username = $request->username;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->_location  = $request->country;
            $user->password =  bcrypt($request->password);
            $user->email = $request->email;
            $user->_status = $user_status->id;
            if ($user->save()) {
                $user_role_new = new UserRole;
                $user_role_new->user_id = $user->id;
                $user_role_new->role_id = $role->id;
                $user_role_new->save();
            }
            //sent mail
            $user->sendMailRegister();
            //end send mail
            return response()->json(array('message' => 'Register successfully,Please check your email to active account'), 200);
        }
    }

  public function reportNewsFeed(Request $request)
  {
    $current_user = Auth::user();
    $post = $this->post->find($request->id);
    $url = asset('newsfeed');
    $url = $url.'/'.$post->id;
    $text = array('title' => "Report status", "link" => $url, 'type'=>'reportStatus', 'description'=> 'Report status');
    if ($post == false) {
      return response()->json([
        'error' => true,
        'message' => 'Error',
      ], 200);
    }
    event(new NewReportStatus($post, $current_user, $text));

    return response()->json([
      'error' => false,
      'message' => 'Success'
    ], 200);
  }

    // forgot password
    public function forgot(Request $request, PasswordBroker $password)
    {
        $response = $password->sendResetLink($request->only('email'));
        switch ($response) {
            case PasswordBroker::RESET_LINK_SENT:
                return response()->json([
                    'error' => false,
                    'message' => 'A password link has been sent to your email address'
                ]);

            case PasswordBroker::INVALID_USER:
                return response()->json([
                    'error' => true,
                    'message' => "We can't find a user with that email address"
                ]);
        }
    }

    //active email
    public function userActivation($token)
    {
        $check = DB::table('user_activations')->where('token', $token)->first();
        if (!is_null($check)) {
            $user = User::find($check->id_user);
            if ($user->is_activated == 1) {
                Auth::loginUsingId($user->id);
                return redirect('profile')->with('SweetAlert', "Your account activate successfully.");
            }
            $user->update(['is_activated' => 1]);
            DB::table('user_activations')->where('token', $token)->delete();
            Auth::loginUsingId($user->id);
            return redirect('profile')->with('SweetAlert', "Your account activate successfully.");
        }
        // return response()->json(array('message'=> 'Error'), 200);
        return redirect('/')->with('SweetAlert', "Link activate account is expired");
    }
    //
    public function saveskill(Request $request)
    {
        $user = Auth::user();
        $list_skill = array_filter(explode(',', $request->skill));
        $list_detach = array_filter(explode(',', $request->detach_skill));
        $arr_skills = $user->skills->pluck('id')->toArray();
        $so_tang = count(array_diff($list_skill, $arr_skills));
        $so_giam = count(array_intersect($arr_skills, $list_detach));
        $tong_moi = $user->skills->count() + $so_tang - $so_giam;
        // dump($tong_moi);
        if ($tong_moi > $user->limit_skill) {
            return response()->json([
                'error' => true,
                'message' => 'Your skills is limited'
            ], 200);
        }
        if (!empty($list_skill)) {
            foreach ($list_skill as $skill) {
                $user->skills()->detach($skill);
                $user->skills()->attach($skill);
            }
        }
        if (!empty($list_detach)) {
            foreach ($list_detach as $skill) {
                $user->skills()->detach($skill);
            }
        }
        $user->load('skills');
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'skills_left' => $user->skills_left
        ], 200);
    }
    public function saveInfo(Request $request)
  {
    $user = Auth::user();
    if($request->has('current_password')){
      $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:6',
        'renew_password' => 'required|same:new_password'
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'error' => true,
          'validator' => true,
          'message' => $validator->errors()->first()
        ], 200);
      }
      if (!Hash::check($request->current_password, $user->password)) {
        return response()->json([
          'error' => true,
          'validator' => true,
          'message' => 'Current password not match'
        ], 200);
      }
    }
    if($request->has('meta')){
      foreach ($request->meta as $key => $value) {
        if($value != '')
          $user->set_usermeta($key, $value);
      }
    }
    if($request->has('first_name')){
      $user->first_name = $request->first_name;
    }
    if($request->has('last_name')){
      $user->last_name = $request->last_name;
    }
    if($request->has('phone')){
      $user->phone = $request->phone;
    }
    if($request->has('sex')){
      $user->sex = $request->sex;
    }
    if($request->has('iban')){
      $user->iban = $request->iban;
    }
    if($request->has('country')){
      $user->_location = $request->country;
    }
    if($request->has('hourlyRate')){
      $userMeta = UserMeta::where('meta_key', 'hourly_hire')->where('_user', Auth::user()->id);
      $userMeta->update(['meta_value'=> $request->hourlyRate]);
    }
    if($request->has('language')){
      $idLanguage = array_map('intval', $request->language);
      $user->language()->sync($idLanguage);
    }else{
      $user->language()->sync([]);
    }
    $user->save();
    return response()->json([
      'error' => false,
      'message' => 'Save Success'
    ], 200);
  }
    public function getskills(Request $request)
    {
        $sk = new Skill();
        $skills = $sk->getSkillsByCat($request->cat_id);
        // dd($skill);
        $user = Auth::user();
        $cat = Category::find($request->cat_id);
        $catname = $cat->name;
        // $skills = $cat->skills()->get();
        $user_skills = $user->skills()->get()->pluck('id')->toArray();
        $output = '';
        foreach ($skills as $skill) {
            if (in_array($skill->id, $user_skills)) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            $view = View::make(
                'template_part.content-skill',
                ['skill' => $skill, 'name' => 'userskill', 'checked' => $checked]
            );
            $output .= (string) $view;
            $output .= '<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="userskill[]" value="' . $skill->id . '" ' . $checked . '>
                                <span class="checkbox-material"><span class="check"></span></span>
                                ' . $skill->name . '
                            </label>
                        </div>
                    </div>';
        }
        // dd($skills);
        return response()->json([
            'error' => false,
            'title' => $catname,
            'skills' => $skills,
            'output' => $output,
            'message' => 'Success'
        ], 200);
    }
    public function searchskill(Request $request)
    {
        $user = Auth::user();
        $user_skills = $user->skills()->get()->pluck('id')->toArray();
        $cat_id = $request->cat_id;
        $title = 'Search Result';
        if ($cat_id != '') {
            $sk = new Skill();
            $skills = $sk->where('_category', $cat_id)->get();
            $cat = Category::find($cat_id);
            $title = $cat->name;
        }
        if ($request->search_string != '') {
            $search_string = $request->search_string;
            $skills = Skill::where(function ($query) use ($search_string, $cat_id) {
                $query->where('name', 'LIKE', '%' . $search_string . '%');
                if ($cat_id != '') {
                    $query->where('_category', '=', $cat_id);
                }
            })->get();
        }
        $output = '';
        foreach ($skills as $skill) {
            if (in_array($skill->id, $user_skills)) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $view = View::make(
                'template_part.content-skill',
                ['skill' => $skill, 'name' => 'userskill', 'checked' => $checked]
            );
            $output .= '<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">';
            $output .= $view;
            $output .= '</div>';
        }
        if ($output == '') {
            $output = '<div class="col col-xl-12">Not found</div>';
        }
        // dd($skills);
        return response()->json([
            'error' => false,
            'title' => $title,
            'skills' => $skills,
            'output' => $output,
            'message' => 'Success'
        ], 200);
    }

    public function award_bid(Request $request)
    {
        $current_user_id = Auth::id();

        $id_bid = $request->id;
        //$id_bid = Project::find(165)->bids->first()->id;
        $bid = Bid::find($id_bid);

        $user_of_project = $bid->project->user->id;
        if ($bid == null || $current_user_id != $user_of_project) {
            return response()->json([
                'error' => true,
                'message' => 'Don\'t kidding me'
            ], 200);
        }

        $bid_status = BidStatus::firstOrCreate(['status' => 'awarding']);
        $project_status = ProjectStatus::firstOrCreate(['status' => 'Waiting Accept']);

        $project_id = $bid->project->id;
        //change bid status
        $bid->change_bid_status(["_bid" => $bid->id, "_status" => $bid_status->id]);
        $pj = new Project();
        $pj->change_project_status(["_project" => $project_id, "_status" => $project_status->id]);

        event(new AwardBid($bid));

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }
    public function acceptawardbid(Request $request)
    {
        $current_user_id = Auth::id();
        $project_id = $request->id;
        $project = Project::find($project_id);
        // get Bid winner
        $bid_win = $project->bids()->win();
        if ($bid_win == false || !$bid_win->author) {
            return response()->json([
                'error' => true,
                'message' => 'Don\'t kidding me',
            ], 200);
        }
        // update column project and status of milestone
        $bonusOld = Calculator::calculationBasedOnProjectAcceptAwardBid($project->user);
        $new_ms_status = MilestoneStatus::firstOrCreate(['status' => 'Locked']);
        $bid_win->milestones()->update(['_project' => $project_id, '_status' => $new_ms_status->id]);
        //update bid status
        //$bid_win->milestones->first()->updateStartwork();
        $vl = $bid_win->updateStatus('accepted');

        //change project status
        $project->updateStatus('processing');
        $project->updateDateAccept();
        $project->save();
        $url_redirect = $project->urlTracking();
        $bonusNew = Calculator::calculationBasedOnProjectAcceptAwardBid($project->user);
        $bonusUsePlatformAlchemist = Calculator::calPlatform($project->user);
        $user_to = $project->user;
        $total_point = $bonusUsePlatformAlchemist + $bonusNew - $bonusOld;
        $user_to->increment('SP', $total_point);
        // $project = $bid_win->project;
        $user_to->save();
        event(new AcceptProject($project));

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'redirect' => $url_redirect,
        ], 200);
    }
    public function cancelawardbid(Request $request)
    {
        $current_user_id = Auth::id();
        $bid_status = BidStatus::firstOrCreate(['status' => 'awarding']);
        $project_id = $request->id;
        $project = Project::find($project_id);
        // get Bid winner
        $bid_win = $project->bids()->win();

        if ($bid_win == false || !$bid_win->author) {
            return response()->json([
                'error' => true,
                'message' => 'Don\'t kidding me',
            ], 200);
        }

        $bid_status_back = BidStatus::firstOrCreate(['status' => 'rejected']);
        $project_status_back = ProjectStatus::firstOrCreate(['status' => 'created']);
        //change bid status
        $bid_win->change_bid_status(["_bid" => $bid_win->id, "_status" => $bid_status_back->id]);
        $project->change_project_status(["_project" => $project_id, "_status" => $project_status_back->id]);
        // dd($bid->user->id);

        /*foreach ($bid->milestones as $bid_ms) {
            $bid_ms->payment->delete();
        }*/
        //return money to user wallet
        // $bid->project->user->increment('wallet', $bid->price);

        $project = $bid_win->project;
        event(new CancelProject($project));

        return response()->json([
            'error' => false,
            'message' => 'Success',
        ], 200);
    }

    public function loadmedia(Request $request)
    {
        // $current_user_id = Auth::id();
        $user = Auth::user();
        // dd($user->media->whereIn('extension', ['jpg', 'png']));
        // $files = Auth::user()->medias();
        $files = $user->media->whereIn('extension', ['jpg', 'png']);
        foreach ($files as &$file)
            $file->time = Convert::int_to_date($file->time);
        $data = '';
        // dd($files);
        if (!empty($files)) {
            foreach ($files as $file) {
                $view = View::make('template_part.content-file', ['file' => $file]);
                $contents = (string) $view;
                // or
                $contents = $view->render();
                $data .= (string) $view;
            }
        }
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $data
        ], 200);
    }

    public function loadinfo(Request $request)
    {
        $cats = Category::all();
        $user = $this->userinfo->find($request->id);
        $view = View::make('template_part.content-ajax_info', ['mem' => $user, 'cats'=> $cats]);
        $data = (string) $view;

        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $data
        ], 200);
    }

  public function getallskills()
  {
    $user = $this->userinfo->find(Auth::id());
    $view = View::make('myprofile.ajax_load_skills', ['user' => $user]);
    $data = (string) $view;

    return response()->json([
      'error' => false,
      'message' => 'Success',
      'data' => $data
    ], 200);
  }
    public function updateUserPhoto(Request $request)
    {
        $current_user = Auth::user();
        $req = $request->toArray();
        $ava_path = 'public/avatars/';
        if (!File::exists($ava_path)) File::makeDirectory($ava_path);
        $name_img = $current_user->username;
        // $img = Image::make(file_get_contents($req['url']));
        $img = Image::make($request->file);
        if ($req['type'] == "header") {
            $img->fit(1200, 400);
            $path = $ava_path . $name_img . '_profilebanner.jpg';
            $img->save($path);
            $current_user->profile_banner = asset($path);
        } else {
            $img->fit(300, 300);
            $path = $ava_path . $name_img . '_avatar.jpg';
            $img->save($path);
            $current_user->avatar = asset($path);
        }
        $current_user->save();

        return response()->json([
            'error' => false,
            'url' => asset($path) . '?' . time(),
            'message' => 'Success',
        ], 200);
    }

    public function addRemoveFavorite(Request $request)
    {
        $current_user = Auth::user();
        $f = new Favorite();
        $data = [
            'user_id' => $current_user->id,
            'id' => $request->id,
            'type' => $request->type,
        ];
        $exist = $f->check_exist($data);
        // dd($exist);
        if ($exist) {
            $f->_delete($data);
            $action = 'remove';
            $message = 'Removed';
        } else {
            $f->addNew($data);
            $action = 'add';
            $message = 'Saved';
        }

        return response()->json([
            'error' => false,
            'action' => $action,
            'message' => $message,
        ], 200);
    }

    public function addFavoriteSave(Request $request)
    {
        $current_user = Auth::user();
        $f = new NewsFeedFavorite();
        $data = [
            'user_id' => $current_user->id,
            'id' => $request->id,
            'type' => $request->type,
        ];
        $exist = $f->check_exist($data);
        // dd($exist);
        if ($exist) {
            $f->_delete($data);
            $action = 'remove';
            $message = 'Removed';
        } else {
            $f->addNew($data);
            $action = 'add';
            $message = 'Saved';
        }

        return response()->json([
            'error' => false,
            'action' => $action,
            'message' => $message,
        ], 200);
    }

    public function addUserFavorite(Request $request)
    {
        $current_user = Auth::user();
        $uf = new UserFavorite();
        $id_favorite = $uf->where('_profile', $request->id)->pluck('id')->first();
        // dd($id_favorite);
        if ($id_favorite != null) {
            $uf->_delete($id_favorite);
            $action = 'remove';
            $message = 'Removed';
        } else {
            $uf->_update('profile', $request->id);
            $action = 'add';
            $message = 'Saved';
        }

        return response()->json([
            'error' => false,
            'action' => $action,
            'message' => $message,
        ], 200);
    }

    public function addJobFavorite(Request $request)
    {
        $current_user = Auth::user();
        $project = Project::find($request->id); //is_saved
        if (!$project) {
            return abort(403);
        }
        $uf = new UserFavorite();
        $id_favorite = $uf->where(['_project' => $request->id, '_user' => $current_user->id])->pluck('id')->first();
        // dd($id_favorite);
        if ($project->is_saved()) {
            $uf->_delete($id_favorite);
            $action = 'remove';
            $message = 'Removed';
        } else {
            $uf->_update('project', $request->id);
            $action = 'add';
            $message = 'Saved';
        }

        return response()->json([
            'error' => false,
            'action' => $action,
            'message' => $message,
        ], 200);
    }

    public function postReview(Request $request)
    {

        $current_user = Auth::user();
        $req = $request->toArray();

        // dd($req);
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => 'Please fill all field'
            ], 200);
        }
         $review_late = Review::where('_to' ,$req['user_to'])->orderBy('created_at', 'DESC')->take(1)->get();

        $rating_value = [0,0,0,0,0];
        if (count($review_late) == 1){
          $review_late = $review_late[0];
          $rating_late = Rating::where('_to' ,$review_late['_to'])->where('_project' ,$review_late['_project'])->get();
          $rating_value = AjaxController::converterPoint($rating_late);
        }
        $project = Project::find($req['project']);
        $project_duration = $project->bidwon->total_workdays;
        $user_to = User::find($req['user_to']);
        if (!$project || !$user_to) {
            return response()->json([
                'error' => true,
                'message' => 'Error',
            ], 200);
        }
        $user_title = $user_to->user_title;
        $rv_data = [
            'title' => $req['title'],
            'content' => $req['content'],
            '_from' => $current_user->id,
            '_to' => $req['user_to'],
            '_project' => $req['project'],
        ];
        $review = new Review;
        $bonus = $review->checkSecond($req['user_to']);
        $review->store($rv_data);
        $i = 0;
        $criteria_point = [];
        foreach ($req['rating'] as $key => $value) {
            $criteriaPoint = Calculator::criteriaPointEarn($user_title, $value, $project_duration, $bonus, $rating_value, $key);
            $rt_data = [
                'rating_type' => $key,
                'value' => $value,
                '_from' => $current_user->id,
                '_to' => $req['user_to'],
                '_project' => $req['project'],
                'point' => $criteriaPoint,
            ];
            $rating = new Rating;
            $rating->store($rt_data);
            $criteria_point[] = Calculator::criteriaPointEarn($user_title, $value, $project_duration, $bonus, $rating_value, $key);
        }
        $average_point = array_sum($criteria_point) / count($criteria_point);

        $total_point = array_sum($criteria_point);

        // $total_point = $total_rating*10 + $i*5;

        $type_point = 'SBP';
        if ($user_to->id == $project->_employer) $type_point = 'SP';
        //update user point
        $user_to->increment($type_point, $total_point);

        $data_point = [
            'user_id' => $req['user_to'],
            'type_point' => $type_point,
            'point' => $total_point,
        ];
        $new_point = new UserPoint();
        $new_point->_update($data_point);

        //skill vote
        if ($request->has('skill')) {
            foreach ($req['skill'] as $skill) {
                $skill_vote = new UserSkillVote();
                $skill_vote->_user = $req['user_to'];
                $skill_vote->_skill = $skill;
                // $skill_vote->save();
            }
        }

        $user_to->notify((new ReviewNotification($project, $current_user)));
        Mail::to($user_to)->send(new ReceivedReview($current_user, $user_to, $review, $project));
        // dd($req);
        $message = 'review complete';

        return response()->json([
            'error' => false,
            'message' => $message,
        ], 200);
    }

    public function bidjob(Request $request)
    {
        $user = Auth::user();
        $current_user_id = Auth::id();

        $req = $request->toArray();

        $project = Project::find($req['_project']);

        if ($project == false) {
            return response()->json([
                'error' => true,
                'message' => 'Don\'t kidding me',
            ], 200);
        }
        $min_val = (int) $project->budget;

        $rules = [
            'price' => "required|numeric|min:$min_val",
            // 'worktime' => 'required|numeric',
            'title' => 'required',
            'description' => 'required',
            'miles' => 'required'
        ];
        $message = ['miles.required' => 'Milestone required'];
        if ($request->has('miles') && is_array($req['miles'])) {
            foreach ($req['miles'] as $key => $val) {
                $rules['miles.' . $key . '.title'] = 'required';
                $message['miles.' . $key . '.title.required'] = 'Milestone title is require';
            }
            // dd($rules);
        }

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validator' => true,
                'message' => $validator->errors()
            ], 200);
        }

        $total_workday = array_sum(array_column($req['miles'], 'workday'));
        $total_percent = array_sum(array_column($req['miles'], 'percent_payment'));

        if ($total_percent != 100) {
            return response()->json([
                'error' => true,
                'message' => 'Total task must be 100%',
            ], 200);
        }
        // dd($req['miles'],$total_workday, $total_percent);


        // check if edit bid
        if ($request->has('bid_id') && $request->bid_id != null) {
            $bid = Bid::find($request->bid_id);
            $bid->milestones()->delete();
            $data = [
                'user' => $current_user_id,
                'bid' => $bid->id,
                'files' => [],
                'message' => 'I just edited my bid'
            ];
            $bid_status = $bid->bid_status;
            if ($bid_status->status == 'awarding'){
              return response()->json([
                'error' => true,
                'message' => 'You cannot perform an update once seeker has awarded it.',
              ], 200);
            }
            $bidmes = new BidMessage();
            $bides_id = $bidmes->_update($data);
        } else {
            $bid_status = BidStatus::firstOrCreate(['status' => 'pending']);
            $bid = new Bid();
            if ($project->user_bided()) {
                return response()->json([
                    'error' => true,
                    'message' => 'You submitted',
                ], 200);
            }
        }

        $bid_status_id = $bid_status->id;
        $fruits_ar = [];
        $count = 0;
        $bid->title = $request->title;
        $bid->work_time = $total_workday;
        $bid->price = $request->price;
        $bid->description = $request->description;
        $bid->medias = $request->file;
        $bid->_status = $bid_status_id;
        $bid->_project = $project->id;
        $bid->_freelancer = $current_user_id;
        if ($bid->save()) {
            $files = $request->file('files');
            $arr_files = [];
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
                    $arr_files[] = $pj_attachment->id;
                  }
                }
            }
            $bid->files = $arr_files;
            $bid->save();
        }

        foreach ($req['miles'] as $mile) {
            $ms = new Milestone();
            $ms->_update_mile_bid($mile, $bid->id);
        }
        if (isset($req['skill'])) {
            $bid->skills()->sync($request->skill);
        }

      $url_redirect = $project->urlProjectBids();

        event(new NewBid($project));

        Mail::send(new \App\Mail\Project\Seeker\NewBid($project->user, $user, $project, $bid));

        return response()->json([
            'error' => false,
            'redirect' => $url_redirect,
            'message' => 'Success'
        ], 200);
    }
    public function bidProject(Request $request)
    {

        $project = Project::find($request->id);
        $skills = Skill::all();
        $data = '';
        $view = View::make(
            'template_part.content-modalbid',
            ['project' => $project, 'bid' => false, 'skills' => $skills]
        );
        $data .= (string) $view;

        $message = 'success';

        return response()->json([
            'error' => false,
            'data'  => $data,
            'message' => $message,
        ], 200);
    }
    public function getBidEdit(Request $request)
    {

        $bid = Bid::find($request->id);
        $skills = Skill::all();
        $data = '';
        $view = View::make(
            'template_part.content-modalbid',
            ['project' => $bid->project, 'bid' => $bid, 'skills' => $skills]
        );
        $data .= (string) $view;

        $message = 'success';

        return response()->json([
            'error' => false,
            'data'  => $data,
            'message' => $message,
        ], 200);
    }
    public function getBidinfo(Request $request)
    {

        $bid = Bid::find($request->id);
        $full_name = $bid->user->full_name;
        $bid_skill_html = '';
        foreach ($bid->skills as $skill) {
            $view = View::make(
                'template_part.content-skill',
                ['skill' => $skill, 'name' => 'skill', 'checked' => '']
            );

            $bid_skill_html .= '<div class="col col-lg-6 col-md-6 col-sm-12 no-padding">';
            $bid_skill_html .= (string) $view;
            $bid_skill_html .= '</div>';
        }
        $data = $bid->toArray();
        $data['full_name'] = $full_name;
        $data['bid_skill_html'] = $bid_skill_html;

        $message = 'success';

        return response()->json([
            'error' => false,
            'data'  => $data,
            'message' => $message,
        ], 200);
    }
    public function postAlbum(Request $request)
    {
        $current_user = Auth::user();
        $rules = [
            'media' => 'required',
            'description' => 'required',
            'album_name' => 'required',
        ];

        $message = ['media.required' => 'Image required'];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }

        if (empty($request->media)) {
            $message = 'please select image';
            return response()->json([
                'error' => true,
                'message' => $message,
            ], 200);
        }
        $media = array_unique($request->media);

        $featured = $request->featured ?? [];
        $out_featured = array_diff($media, $featured);

        $this->media->doFeatured($featured, $out_featured);

        $result = array_combine($media, $request->content);
        if ($request->has('id_album')) {
            $new_album = Album::find($request->id_album);
        } else {
            $new_album = new Album();
        }
        $new_album->_user = $current_user->id;
        $new_album->album = $request->album_name;
        $new_album->description = $request->description;
        $new_album->data = $result;
        $new_album->save();
        $new_album->media()->sync($media);

        if (!$new_album->post) {
            $post = new Post();
            $post->_user = $current_user->id;
            $post->_album = $new_album->id;
            $post->hashtag = $post->gethashtags($request->description);
            $post->status = 1;
            $post->save();
        }
        $new_album->refresh();

        $view = View::make('template_part.content-album', ['album' => $new_album, 'target_user' => $current_user]);

        $data = (string) $view;
        $message = 'success';

        return response()->json([
            'error' => false,
            'data' => $data,
            'curent_fi' => $current_user->total_featured_images,
            'message' => $message,
        ], 200);
    }
    public function getPostAlbum(Request $request)
    {
        $current_user = Auth::user();
        $post = new Post();
        $post = $post->where('_album', $request->id)->first();
        // dd($post->id);

        $view = View::make('template_part.content-postpopup', ['post' => $post]);

        $data = (string) $view;
        $message = 'success';

        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => $message,
        ], 200);
    }
    public function deleteAlbum(Request $request)
    {
        $current_user = Auth::user();
        $album = $this->album->find($request->id);
        if ($album->_delete()) {
            $message = 'success';
            return response()->json([
                'error' => false,
                'message' => $message,
            ], 200);
        }
    }
    public function getEditAlbum(Request $request)
    {
        $current_user = Auth::user();
        $album = new Album();
        $album = $album->find($request->id);

        $view = View::make('template_part.content-modal-album', ['album' => $album, 'target_user' => $current_user]);

        $data = (string) $view;
        $message = 'success';

        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => $message,
        ], 200);
    }

    public function ajaxEditPost(Request $request)
    {
        $current_user = Auth::user();
        $album = new Album();
        $album = $album->find($request->id);

        $view = View::make('template_part.content-modal-album', ['album' => $album, 'target_user' => $current_user]);

        $data = (string) $view;
        $message = 'success';

        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => $message,
        ], 200);
    }
    public function albumToFeed(Request $request)
    {
        $current_user = Auth::user();
        $album_feed = $current_user->postsAlbumFeed->count();
        $left = $current_user->max_albumfeed - $album_feed;
        if ($request->type == "add" && $left < 1) {
            return response()->json([
                'error' => true,
                'message' => 'No feed left, please remove other album to add',
            ], 200);
        }
        /*$user_albums = $current_user->albums;
        foreach ($user_albums as $key => $album) {
            $album->postToPrivate();
        }*/
        $album = new Album();
        $album = $album->find($request->id);
        if ($request->type == "add") {
            $album->postToFeed();
        } else {
            $album->postToPrivate();
        }
        $album_feed = $current_user->postsAlbumFeed->count();
        $left = $current_user->max_albumfeed - $album_feed;
        $message = 'success';
        return response()->json([
            'error' => false,
            'album_feed' => $album_feed,
            'album_left' => $left,
            'message' => $message,
        ], 200);
    }
    public function postVideo(Request $request)
    {
        $current_user = Auth::user();
        /*if(class_exists('FFMpeg')){
            dd('ok');
        }else {
            dd("eo co");
        }*/
        $max_size = ini_get('post_max_size');
        $upload_max_filesize = ini_get('upload_max_filesize');
        $rules = [
            //"files.*" => "max:$max_size",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }

        foreach ($request->file('files') as $key => $file) {
            if (!$file->isValid()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Error file',
                ], 200);
            }
        }
        $data = '';
        foreach ($request->file('files') as $file) {
            $fc = new FileController();
            $store_info = $fc->store_file($file);

            $new_video = new Video();
            $new_video->_user = $current_user->id;
            $new_video->_media = $store_info->id;
            $new_video->name = '';
            $new_video->description = '';
            $new_video->duration = $request->duration;
            $new_video->save();

            if (!$new_video->post) {
                $post = new Post();
                $post->_user = $current_user->id;
                $post->_video = $new_video->id;
                $post->hashtag = $post->gethashtags($request->description);
                $post->status = 1;
                $post->save();
            }
            $data .= View::make('template_part.content-video', ['video' => $new_video, 'target_user' => $current_user]);
        }
        $data = (string) $data;

        $message = 'success';
        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => $message,
        ], 200);
    }
    public function updateVideo(Request $request)
    {
        $current_user = Auth::user();
        $rules = [
            'description' => 'required',
            'video_name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }

        $video = $this->video->find($request->id);
        if ($video) {
            if (class_exists('FFMpeg')) {
                $url_public = url("/public");
                $video_url = $video->media->url;
                $video_path = str_replace($url_public, "", $video_url);
                $ffprobe = FFMpeg\FFProbe::create();
                $file_duration = $ffprobe
                    ->format(public_path() . $video_path) // extracts file informations
                    ->get('duration');             // returns the duration property
                $duration = str_replace(".", ":", number_format($file_duration, 2));
            }

            if ($request->featured) {
                $video->media->updateFeature(1);
            } else {
                $video->media->updateFeature(0);
            }
            $video->name = $request->video_name;
            $video->description = $request->description;
            $video->duration = $duration ?? "";
            $video->save();
        }

        $message = 'success';
        return response()->json([
            'error' => false,
            'message' => $message,
        ], 200);
    }
    public function updateImageVideo(Request $request)
    {
        $current_user = Auth::user();
        $rules = [
            "file" => "required|max:1000",
            "id" => "required",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }
        $video = $this->video->find($request->id);
        if ($request->has("file")) {
            $fc = new FileController();
            $store_info = $fc->store_file($request->file);
            if ($store_info) {
                $video->_thumbnail = $store_info->id;
                $video->save();
                $message = 'success';
                return response()->json([
                    'error' => false,
                    'url' => $store_info->url,
                    'message' => $message,
                ], 200);
            }
        }
    }
    public function deleteVideo(Request $request)
    {
        $current_user = Auth::user();

        $video = $this->video->find($request->id);
        if ($video->_delete()) {
            $message = 'success';
            return response()->json([
                'error' => false,
                'message' => $message,
            ], 200);
        }
    }
    public function postComment(Request $request)
    {
      $totalcmt = PostComment::where('_post',$request->id)->get();
      $totalstcmt = count($totalcmt)+1;
        $current_user = Auth::user();

        if ($request->has('list_media')) {
          $list_media = array_unique(array_values(array_filter(explode(",", $request->list_media), 'strlen')));
        }
        if ($request->has('list_file')) {
          $list_file = array_unique(array_values(array_filter(explode(",", $request->list_file), 'strlen')));
        }
        if (isset($request->list_video)) {
          $list_video = array_unique(array_values(array_filter(explode(",", $request->list_video), 'strlen')));
          $list_video = $list_video[0];
        }
        if ($request->has('comment_id')) {
          $comment_id = $request->comment_id;
          $url = asset('newsfeed');
          $url = $url.'/'.$request->id;
          $text = array('title' => "Reply comment", "link" => $url, 'type'=>'replyComment', 'description'=> 'Reply comment status');
          $post = Post::find($request->id);
          event(new NewReportStatus($post, $current_user, $text));
        }else{
          $url = asset('newsfeed');
          $url = $url.'/'.$request->id;
          $text = array('title' => "Comment status", "link" => $url, 'type'=>'commentStatus', 'description'=> 'Comment status' );
          $post = Post::find($request->id);
//          dd($request->id);

          event(new NewReportStatus($post, $current_user, $text));
        }
//        $ar = explode(' ',$request->content);
//        for($i = 0;$i<count($ar);$i++){
//          $check = substr( $ar[$i],  0, 7);
//          $checks = substr( $ar[$i],  0, 8);
//          if($check == 'http://' || $checks == 'https://'){
//            $ar[$i] = '<a target="_blank" href="'.$ar[$i].'">'.$ar[$i].'</a>';
//          }
//        }
//        $content = implode(' ',$ar);
        $data = [
          'user' => $current_user->id,
          'post' => $request->id,
          'content' => $request->content,
          'external_link' => $request->external_link ?? '',
          'list_media' => $list_media ?? '',
          'list_file' => $list_file ?? '',
          '_video' => $list_video ?? '',
          'comment_id' => $comment_id ?? '',
        ];
        $comment = new PostComment();
        $comment->addNew($data);
        $comment->refresh();
        $comment->save();
        // dd($comment);
        $post = Post::find($request->id);
        $countComment = $post->total_comments;
        if ($request->has('comment_id')) {
          $countComment = $post->countCommentComments($comment_id);
        }
        $viewPopup = View::make('template_part.content-comment-popup', ['comment' => $comment,'post'=>$post,'stcmt'=>$totalstcmt]);
        $view = View::make('template_part.content-comment', ['comment' => $comment,'stcmt'=>$totalstcmt]);
        $data = (string) $view;
        $dataPopup = (string) $viewPopup;
        $message = 'success';
        return response()->json([
            'error' => false,
            'data' => $data,
            'dataPopup' => $dataPopup,
            'countComment' => $countComment,
            'message' => $message,
        ], 200);
    }
    public function likePost(Request $request)
    {
        $current_user = Auth::user();
        if (!$current_user)  return false;
        $post = Post::find($request->id);
        //check if liked or disliked
        if ($post->is_target()) return false;
        $data = [
            '_user' => $current_user->id,
            '_post' => $post->id
        ];
        if ($post->user_liked()) {
            $data['like'] = 0;
            $action = 'remove';
            $message = 'Disliked';
        } else {
            $data['like'] = (int)$request->checkLike;
            $action = 'add';
            $message = 'Liked';
        }
        $postlike = new PostLike();
        $postlike->_update($data);

        $dayPost = $post->created_at;
        // tính toán bonus
        $check_day = Calculator::calculateDayPost($dayPost);
        if ($check_day != 0){
          $bonus_rp = $post->bonusRP($check_day, $post->_user);
          //dd($bonus_rp);
          UserRp::updateOrCreate(
            ['_user' => $post->_user, '_post' => $post->id],
            ['_user' => $post->_user, '_post' => $post->id, 'point' => $bonus_rp]
          );
          $rp = UserRp::where('_user', $post->_user)->sum('point');
          $userPost = User::where('id', $post->_user)->update(['RP'=> $rp]);
          $client = new \App\Services\SmartContract\Client();

        }
        return response()->json([
            'error' => false,
            'action' => $action,
            'message' => $message,
        ], 200);
    }

  public function  testApiBlockChain(){
    $current_user = Auth::user();
    $client = new \App\Services\SmartContract\Client();
    $a1 = $client->awardRP(20, 152, 'alchemist');



    //$a2 = $client->awardRP(1, 80, 'seeker');
    $userTest = $client->awardSBP(15, 23, 'seeker');


    $client12 = new \App\Services\SmartContract\Client();
    $a3 = $client12->awardRP(25, 80, 'seeker');
    if (!$current_user->is_alchemist()){
      $userBlockChain = $client->getAlchemistById(20);
    }else{
      $userBlockChain = $client->getSeekerById(20);
    }
    $userBlockChain = $client->getSeekerById(1);
    dd($userBlockChain );
    return "Cường nguyễn";
  }

  public function likeStatus(Request $request)
  {
    $current_user = Auth::user();
    if (!$current_user)  return false;
    $post = Post::find($request->id);
    //check if liked or disliked
    $data = [
      '_user' => $current_user->id,
      '_post' => $post->id
    ];
    if ($post->is_like()) {
      $action = 'remove';
      $message = 'Disliked';
      $post->like_status_value($data);
    } else {
      $data['like'] = (int)$request->checkLike;
      $action = 'add';
      $message = 'Liked';
      $postlike = new PostLikeStatus();
      $postlike->_update($data);
      $url = asset('newsfeed');
      $url = $url.'/'.$request->id;
      $text = array('title' => "Like post", "link" => $url, 'type'=>'likePost', 'description'=> 'Like status');
      event(new NewReportStatus($post, $current_user, $text));
    }



    return response()->json([
      'error' => false,
      'action' => $action,
      'message' => $message,
    ], 200);
  }


  public function likeCmt(Request $request){
    $check = PostLikeCmt::where([
      ['_user',$request->user],
      ['_post',$request->post],
      ['_comment',$request->stcmt],
      ['userlike',Auth::id()],
      ['likecm',1],
    ])->orWhere([
      ['_user',$request->user],
      ['_post',$request->post],
      ['_comment',$request->stcmt],
      ['userlike',Auth::id()],
      ['dislikecmt',1]
    ])->get();
    $checkArr = json_decode($check);
    if(empty($checkArr)){
    $likecmtt = new PostLikeCmt();
    $likecmtt->likecm = $request->like;
    $likecmtt->_post = $request->post;
    $likecmtt->_user = $request->user;
    $likecmtt->_comment = $request->stcmt;
    $likecmtt->userlike = Auth::id();
    $likecmtt->save();
    return response()->json([
        'error'=>false,
        'data'=> 'ok',
      ],200);
    }
  }
  public function disLikeCmt(Request $request){
    $check = PostLikeCmt::where([
      ['_user',$request->user],
      ['_post',$request->post],
      ['_comment',$request->stcmt],
      ['userlike',Auth::id()],
      ['dislikecmt',1],
    ])->orWhere([
      ['_user',$request->user],
      ['_post',$request->post],
      ['_comment',$request->stcmt],
      ['userlike',Auth::id()],
      ['likecm',1],
    ])->get();
    $checkArr = json_decode($check);
    if(empty($checkArr)) {
      $dislikecmtt = new PostLikeCmt();
      $dislikecmtt->dislikecmt = $request->dislike;
      $dislikecmtt->_post = $request->post;
      $dislikecmtt->_user = $request->user;
      $dislikecmtt->_comment = $request->stcmt;
      $dislikecmtt->userlike = Auth::id();
      $dislikecmtt->save();
      return response()->json([
        'error'=>false,
        'data'=> 'ok',
      ],200);
    }
  }
  public function heart(Request $request){
    $current_user = Auth::user();
    $check = PostLikeCmt::where([
      ['_user',$request->user],
      ['_post',$request->post],
      ['_comment',$request->stcmt],
      ['userlike',$current_user->id],
      ['heart',1],
    ])->get();
    $checkArr = json_decode($check);
    if(empty($checkArr)) {
      $heart = new PostLikeCmt();
      $heart->heart = $request->heart;
      $heart->_post = $request->post;
      $heart->_user = $request->user;
      $heart->_comment = $request->stcmt;
      $heart->userlike = $current_user->id;
      $heart->save();
      $url = asset('newsfeed');
      $post = Post::find($request->post);
      $url = $url.'/'.$request->post;
      $text = array('title' => "Like comment", "link" => $url, 'type'=>'likePost', 'description'=> 'Like comment status');
      event(new NewReportStatus($post, $current_user, $text));

      return response()->json([
        'error'=>false,
        'data'=> 'ok',
      ],200);
    }else{
      foreach ($check as $item){
        $item->heart = 0;
        $item->save();
      }
      return response()->json([
        'error'=>false,
        'data'=> 'exist',
      ],200);
    }
  }
  public function postStatus(Request $request)
    {
        $current_user = Auth::user();

        if ($request->has('list_media')) {
          $list_media = array_unique(array_values(array_filter(explode(",", $request->list_media), 'strlen')));
        }
        if ($request->has('list_file')) {
          $list_file = array_unique(array_values(array_filter(explode(",", $request->list_file), 'strlen')));
        }
        $video = '';
        if (isset($request->list_video)) {
            $list_video = array_unique(array_values(array_filter(explode(",", $request->list_video), 'strlen')));
            if(!empty($list_video)){
              $video = $list_video[0];
            }else{
              if(!$request->has('idPost')){
                $video = '';
              }else{
                $video = null;
              }
            }
        }
        $data = [
            'user' => $current_user->id,
            'caption' => $request->caption,
            'external_link' => $request->external_link ?? '',
            'list_media' => $list_media ?? '',
            'list_file' => $list_file ?? '',
            '_video' => $video ,
        ];
        if($request->has('idPost')){
          $post = Post::find($request->idPost);
          $post->edit($data);
          $post->refresh();
        }else{
          $post = new Post();
          $post->addNew($data);
          $post->refresh();
        }

        $view = View::make('template_part.content-post', ['post' => $post]);

        $data = (string) $view;

      if(1){
        event(new NewsStatus($post));
      }
        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }
  public function posteditComment(Request $request)
  {
//    dd($request->all());
    $current_user = Auth::user();

    if ($request->has('list_media')) {
      $list_media = array_unique(array_values(array_filter(explode(",", $request->list_media), 'strlen')));
    }
    if ($request->has('list_file')) {
      $list_file = array_unique(array_values(array_filter(explode(",", $request->list_file), 'strlen')));
    }
    $video = '';
    if (isset($request->list_video)) {
      $list_video = array_unique(array_values(array_filter(explode(",", $request->list_video), 'strlen')));
      if(!empty($list_video)){
        $video = $list_video[0];
      }else{
        if(!$request->has('idPost')){
          $video = '';
        }else{
          $video = null;
        }
      }
    }
    $data = [
      '_user' => $current_user->id,
      'content' => $request->caption,
      'external_link' => $request->external_link ?? '',
      'list_media' => $list_media ?? '',
      'list_file' => $list_file ?? '',
      '_video' => $video ,
    ];
    if($request->has('idPost')){
      $post = PostComment::find($request->idPost);
      $post->edit($data);
      $post->refresh();
    }else{
      $post = new PostComment();
      $post->addNew($data);
      $post->refresh();
    }

    $view = View::make('template_part.content-comment', ['comment' => $post]);

    $data = (string) $view;

//    if(1){
//      event(new NewsStatus($post));
//    }
    return response()->json([
      'error' => false,
      'data' => $data,
      'message' => 'success'
    ], 200);
  }
    public function postVideoLink(Request $request)
    {
      $current_user = Auth::user();
      $rules = [
        //'url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json([
          'error' => true,
          'validate' => true,
          'message' => $validator->errors()
        ], 200);
      }

      $datas = (object) getInfoUrl($request->url);
      $media = new Media();
      $media->url = $datas->url ?? "";
      $media->name = $datas->title;
      $media->ori_name = $datas->title;
      $media->_user = $current_user->id;
      $media->extension = "mp4";
      $media->save();
      $new_video = new Video();
      $new_video->_user = $current_user->id;
      $new_video->external_link = $request->url;
      $new_video->name = $datas->title ?? "";
      $new_video->description = $datas->desc ?? "";
      $new_video->_media= $media->id;
      $new_video->save();
//      $view = View::make('template_part.content-external_link', ['data' => $datas]);
      $view = View::make('template_part.content-video-link', ['data' => $datas, 'video' => $new_video,'target_user'=>$current_user]);
      $data = (string) $view;
      $message = 'success';
      return response()->json([
        'error' => false,
        'data' => $data,
        'message' => $message,
      ], 200);
    }
    public function previewLink(Request $request)
    {
        $current_user = Auth::user();
        $rules = [
            //'url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }

        $data = (object) getInfoUrl($request->url);
        if (!$data) {
            return response()->json([
                'error' => true,
                'message' => 'Error Url'
            ], 200);
        }
        $view = View::make('template_part.content-external_link', ['data' => $data]);

        $data = (string) $view;

        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }

    public function previewImage(Request $request)
    {
        $current_user = Auth::user();
        $rules = [
            "files.*" => "required|max:8000",
        ];
        $messages = [];
        foreach ($request->file('files') as $key => $val) {
            $messages["files.$key.max"] = "Image may not be greater than :max kb";
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }

        $urls = [];
        $data = [];

        foreach ($request->file('files') as $file) {
            $fc = new FileController();
            $store_info = $fc->store_file($file);
            if ($store_info) {
                $urls[] = $store_info->url;
                $data[] = $store_info->id;
            }
        }

        //$urls = Media::whereIn('id', [92,87,86])->pluck('url')->toArray();
        //$data = [1,2,5];

        return response()->json([
            'error' => false,
            'urls' => $urls,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }

    public function previewFile(Request $request)
  {
    $current_user = Auth::user();
    $rules = [
      "files.*" => "required|max:8000",
    ];
    $messages = [];
    foreach ($request->file('files') as $key => $val) {
      $messages["files.$key.max"] = "Image may not be greater than :max kb";
    }

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return response()->json([
        'error' => true,
        'validate' => true,
        'message' => $validator->errors()
      ], 200);
    }

    $urls = [];
    $data = [];

    foreach ($request->file('files') as $file) {
      $fc = new FileController();
      $store_info = $fc->store_file($file);
      if ($store_info) {
        $urls[] = $store_info->url;
        $data[] = $store_info->id;
      }
    }

    //$urls = Media::whereIn('id', [92,87,86])->pluck('url')->toArray();
    //$data = [1,2,5];

    return response()->json([
      'error' => false,
      'urls' => $urls,
      'data' => $data,
      'message' => 'success'
    ], 200);
  }

    public function postVideoStatus(Request $request)
  {
    $current_user = Auth::user();
    /*if(class_exists('FFMpeg')){
        dd('ok');
    }else {
        dd("eo co");
    }*/
    $max_size = ini_get('post_max_size');
    $upload_max_filesize = ini_get('upload_max_filesize');
    $rules = [
      //"files.*" => "max:$max_size",
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'error' => true,
        'validate' => true,
        'message' => $validator->errors()
      ], 200);
    }

    foreach ($request->file('files') as $key => $file) {
      if (!$file->isValid()) {
        return response()->json([
          'error' => true,
          'message' => 'Error file',
        ], 200);
      }
    }
    $data = '';
    $listid = [];
    foreach ($request->file('files') as $file) {
      $fc = new FileController();
      $store_info = $fc->store_file($file);

      $new_video = new Video();
      $new_video->_user = $current_user->id;
      $new_video->_media = $store_info->id;
      $new_video->name = '';
      $new_video->description = '';
      $new_video->save();
      $listid[]= $new_video->id;
      $data .= View::make('template_part.content-video-status', ['video' => $new_video, 'target_user' => $current_user]);
    }
    $data = (string) $data;

    $message = 'success';
    return response()->json([
      'error' => false,
      'data' => $data,
      'listid' => $listid,
      'message' => $message,
    ], 200);
  }

    public function loadTimeline(Request $request)
    {

        $posts = Post::where('_user', $request->id)->skip($request->length)->take(5)->get();

        $data = '';
        foreach ($posts as $post) {
            $data .= View::make('template_part.content-post', ['post' => $post]);
        }

        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
    }

    public function deletePost(Request $request)
    {
        $current_user = Auth::user();
        $post = $this->post->find($request->id);

        if ($post == false) {
            return response()->json([
                'error' => true,
                'message' => 'Error',
            ], 200);
        }
        $album = $post->album;
        $video = $post->video;
        $status = DB::table('post_like_status')->where('_post', $post->id)->delete();
        $post->delete();
        if ($album) {
            $album->_delete();
        }
        if ($video) {
            $video->_delete();
        }


        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }
  public function deleteCmt(Request $request)
  {
    $current_user = Auth::user();
    $cmt = PostComment::find($request->id);
    if ($cmt == false) {
      return response()->json([
        'error' => true,
        'message' => 'Error',
      ], 200);
    }
    $album = $cmt->album;
    $video = $cmt->video;
    $status = DB::table('post_like_cmt')->where('_comment', $cmt->id)->delete();
    $cmtparent = PostComment::where('comment_id',$request->id)->get();
    foreach ($cmtparent as $pr){
      $pr->delete();
    }
    $cmt->delete();
    if ($album) {
      $album->_delete();
    }
    if ($video) {
      $video->_delete();
    }


    return response()->json([
      'error' => false,
      'message' => 'Success'
    ], 200);
  }


    public function ajaxGetPost(Request $request)
    {
        $current_user = Auth::user();
        $post = $this->post->find($request->id);
        if ($post == false) {
            return response()->json([
                'error' => true,
                'message' => 'Error',
            ], 200);
        }

        $data = '';
        $media = $post->list_media ?? '';
        $file = $post->list_file ?? '';
        $video = $post->_video ?? '';
        $data .= View::make('template_part.edit-post-by-modal', ['post' => $post]);
        return response()->json([
            'error' => false,
            'data' => $data,
            'media' => $media,
            'file' => $file,
            'video' => $video,
            'message' => 'Success'
        ], 200);
    }
  public function ajaxGetCmt(Request $request)
  {
    $current_user = Auth::user();
    $cmt = PostComment::find($request->id);
    if ($cmt == false) {
      return response()->json([
        'error' => true,
        'message' => 'Error',
      ], 200);
    }

    $data = '';
    $media = $cmt->list_media ?? '';
    $file = $cmt->list_file ?? '';
    $video = $cmt->_video ?? '';
    $data .= View::make('template_part.edit-cmt-by-modal', ['post' => $cmt]);

    return response()->json([
      'error' => false,
      'data' => $data,
      'media' => $media,
      'file' => $file,
      'video' => $video,
      'message' => 'Success'
    ], 200);
  }

    public function deleteNotif(Request $request)
    {
        $current_user = Auth::user();

        $current_user->notifications()->find($request->id)->markAsRead();

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }

    public function getState(Request $request)
    {
        $current_user = Auth::user();

        $jsonString = file_get_contents(base_path('storage/countries_states.json'));

        $data = collect(json_decode($jsonString, true));
        $data = collect($data["countries"]);
        $a = $data->where('country', $request->country)->first();
        $data = '';
        if (empty($a["states"])) {
            $data .= "<option value='' selected>No State</option>";
        }
        foreach ($a["states"] as $st) {
            $data .= "<option value=$st>$st</option>";
        }
        return $data;
    }
    public static function converterPoint($rating){
      $recommended = 0;
      $work_quality = 0;
      $management = 0;
      $attitude = 0;
      $item_delivery = 0;
      foreach ($rating as $item){
          switch ($item->rating_type){
            case "item_delivery":
              $item_delivery = $item->value;
              break;
            case "work_quality":
              $work_quality = $item->value;
              break;
            case "management":
              $management = $item->value;
              break;
            case "attitude":
              $attitude = $item->value;
              break;
            case "recommended":
              $recommended = $item->value;
              break;
          }
      }
      return [$recommended, $work_quality, $management, $attitude, $item_delivery];
    }
    public function popupComment(Request $request){
      $current_user = Auth::user();
      $post = $this->post->find($request->id);
      if ($post == false) {
        return response()->json([
          'error' => true,
          'message' => 'Error',
        ], 200);
      }

      $data = '';

      $data .= View::make('modal.comment-popup-v2', ['post' => $post]);


      return response()->json([
        'error' => false,
        'data' => $data,
        'message' => 'Success'
      ], 200);
    }

  public function popupCommentcmt(Request $request){
    $current_user = Auth::user();
    $comment = PostComment::find($request->id);
//    $parent = PostComment::where('comment_id', $post->id)->get();
    if ($comment == false) {
      return response()->json([
        'error' => true,
        'message' => 'Error',
      ], 200);
    }

    $data = '';

    $data .= View::make('modal.comment-comment-popup-v2', ['post' => $comment]);

    return response()->json([
      'error' => false,
      'data' => $data,
      'message' => 'Success'
    ], 200);
  }
    public function popupCommentBack(Request $request){
      $current_user = Auth::user();
      $comment = PostComment::find($request->id);
  //    $parent = PostComment::where('comment_id', $post->id)->get();
      if($comment->comment_id!=null){
        $back_comment = PostComment::find($comment->comment_id);

        if($back_comment->comment_id!=null){
          $request->id = $back_comment->comment_id;
          return $this->popupCommentcmt($request);
        }else{
          $request['id'] = $comment->_post;
          return $this->popupComment($request);
        }
      }
      return response()->json([
        'error' => false,
        'checkfirst' => true,
      ], 200);
    }
    public function popupCommentright(Request $request){
      $current_user = Auth::user();
      $comment = PostComment::where('comment_id',$request->id)->get();
      if ($comment == false) {
        return response()->json([
          'error' => true,
          'message' => 'Error',
        ], 200);
      }
      $data = '';

      $data .= View::make('modal.content-comment-popup-right', ['comment' => $comment]);

      return response()->json([
        'error' => false,
        'data' => $data,
        'message' => 'Success'
      ], 200);
    }

    public function postAlbumVideo(){
      $user = Auth::user();
      $video = Video::all();
      $video = $video->where('_user',$user->id)->sortByDesc('created_at');
      if($video == false){
        return response()->json([
          'error' => true,
          'message' => 'Error',
        ],200);
      }

      $data = '';
      $data .= View::make('template_part.list-post-video-album',['video'=>$video]);
      return response()->json([
        'error' => false,
        'data' => $data,
        'message' => 'Success',
      ],200);
    }
}
