<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Libs\Calculator;
use App\Mail\Site\VerifyAccount;
use App\Notifications\ResetPasswordNotification;
use Auth;
use Carbon\Carbon;
use Config;
use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Mail;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, Notifiable, EntrustUserTrait, Filterable;

  public $medias = null;
  public $limit_skill;
  public $max_albumfeed;
  public $max_videofeed;
  public $max_featuredimage;
  public $max_featuredvideo;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'username', 'email', 'password', 'first_name', 'last_name', 'is_activated', 'credit', 'credit_lock', 'complete_profile', 'blockchain_id'
  ];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];
  protected $default_img;
  protected $default_banner;
  protected $appends = ['level', 'next_level_point', 'rp_level', 'rp_next_level_point', 'rating', 'ratingDetail', 'user_detail'];

  public function __construct()
  {
    $this->default_img = asset('public/frontend/img/author-page.jpg');
    $this->default_banner = asset('public/frontend/img/mybanner.jpg');
    $this->limit_skill = 20;
    $this->max_albumfeed = 1;
    $this->max_videofeed = 1;
    $this->max_featuredimage = 9;
    $this->max_featuredvideo = 3;
  }

  public static function getListUserByTitle($list_title, $exclude)
  {

    $arr = [];
    $collection = Calculator::collection();
    $list_t = $collection->whereIn('name', $list_title)->pluck('min_level', 'max_level')->toArray();
    foreach ($list_t as $max => $min) {
      $pp = Calculator::levelToPointMin($min, $max);
      $arr[] = [$pp['min'], $pp['max']];
    }
    // return $arr;
    $whereRaw = '(';
    $i = 0;
    foreach ($arr as $item) {
      if ($i > 0) {
        $whereRaw .= " OR ";
      }
      $whereRaw .= "`SBP` BETWEEN " . $item[0] . " AND " . $item[1];
      $i++;
    }
    $whereRaw .= ')';
    $d = static::select('users.*')
      ->whereRaw($whereRaw)
      ->whereNotIn('id', [$exclude])
      ->where('is_activated', 1)
      // ->skip(40)->take(10) //test
      ->get();
    return $d;
  }

  public function getSkillsLeftAttribute()
  {
    return $this->limit_skill - $this->skills->count();
  }


  public function scopeHasRole($query, $roleName)
  {
    $query->whereHas('role', function ($roleQuery) use ($roleName) {
      return $roleQuery->hasRole($roleName);
    });
  }

  public function scopeAlchemist($query)
  {
    return $query->hasRole('Alchemist');

  }

  public function scopeSeeker($query)
  {
    return $query->hasRole('Seeker');
  }

  public function is_admin()
  {
    return $this->isAdmin();
  }

  public function is_alchemist()
  {
    return $this->isAlchemist();
  }

  public function isAlchemist()
  {
    return $this->role_name == "Alchemist";
  }

  public function isAdmin()
  {
    return !!$this->roles()->where('name', 'Admin')->count();
  }

  public function scopeWithRole($query, $roleId)
  {
    return $query->whereHas('role', function ($roleQuery) use ($roleId) {
      return $roleQuery->where('role_id', $roleId);
    });
  }

  public function scopeDesc($query)
  {
    return $query->orderBy('created_at', 'DESC');
  }

  public function getUserTypeAttribute()
  {
    return $this->roles->pluck('name')->first();
  }

  //check social login
  public function addNew($input)
  {
    $check = static::where('email', $input['email'])->first();

    if (is_null($check)) {
      return static::create($input);
    }
    return $check;
  }

  public function getJoinedAttribute()
  {
    if ($this->created_at)
      return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("M jS, Y");
    return false;
  }

  public function getFullNameAttribute()
  {
    return "{$this->first_name} {$this->last_name}";
  }

  public function getAvatarImgAttribute($size)
  {
    $size = $size ?? '36';
    $img_url = ($this->avatar != '') ? $this->avatar : $this->default_img;
    return '<img width="' . $size . '" height="' . $size . '" alt="author" src="' . $img_url . '" class="avatar">';

  }

  public function getAvatarImgAttributeDefault()
  {
    $img_url = ($this->avatar != '') ? $this->avatar : $this->default_img;
    return $img_url;

  }

//  public function getAvatarAttribute()
//  {
//    return $this->avatar;//($this->avatar != '') ? $this->avatar : $this->default_img;
//  }

  public function getBannerImgAttribute($size)
  {
    $size = $size ?? '900';
    $img_url = ($this->profile_banner != '') ? $this->profile_banner : $this->default_banner;
    return '<img alt="author" src="' . $img_url . '" class="profile_banner">';

  }

  public function skillvoteby($id)
  {
    return $this->skillvote()->withId($id)->count();
  }

  public function skillvote()
  {
    return $this->hasMany(UserSkillVote::class, '_user');
  }

  public function role()
  {
    return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
  }

  public function language()
  {
    return $this->belongsToMany('App\Models\Language', 'language_user', 'user_id', 'language_id');
  }

  public function user_role()
  {
    return $this->hasOne('App\Models\UserRole', 'user_id', 'id');
  }

  public function getRolenameAttribute()
  {
    return ucfirst($this->role->pluck('name')->first());
  }

  public function user_status()
  {
    return $this->belongsTo('App\Models\User_Status', '_status', 'id');
  }

  public function skills()
  {
    return $this->belongsToMany('App\Models\Skill', 'skill_user', '_user', '_skill');
  }

  public function languages()
  {
    return $this->belongsToMany('App\Models\Language', 'language_user', 'user_id', 'language_id');
  }

  public function getMySkillsAttribute()
  {
    return implode(', ', $this->skills->pluck('name')->toArray());
  }

  public function usermeta()
  {
    return $this->hasMany('App\Models\UserMeta', '_user', 'id');
  }

  public function user_meta()
  {
    return $this->hasMany('App\Models\UserMeta', '_user', 'id')->get()->toArray();
  }

  public function delete_usermeta($key)
  {
    return $this->usermeta->where('meta_key', $key)->delete();
  }

  public function set_usermeta($key, $value)
  {
    return UserMeta::set($key, $value, $this->id);
  }

  public function projects()
  {
    return $this->hasMany('App\Models\Project', '_employer', 'id');
  }

  public function bids()
  {
    return $this->hasMany('App\Models\Bid', '_freelancer', 'id');
  }

  public function projects_joined()
  {
    return $this->bids->groupBy('_project');
  }

  public function projectsBidded($status = null)
  {
    $bid_status = (isset($status)) ? BidStatus::firstOrCreate(['status' => $status]) : null;
    $status_in = ProjectStatus::whereIn('status', ['processing', 'Waiting Accept', 'completed'])->pluck('id')->toArray();
    return Project::select('project.*')
      ->join('bid', function ($join) {
        $join->on('project.id', '=', 'bid._project');
      })
      ->where(function ($query) use ($bid_status, $status_in) {
        $query->where('bid._freelancer', '=', $this->id);
        if ($bid_status) {
          $query->where('bid._status', '=', $bid_status->id);
        } else {
          $query->whereNotIn('project._status', $status_in);
        }
      })
      ->orderBy('id', 'desc')
      ->get();
  }

  //get projects user bided

  public function milestone_requests()
  {
    return $this->hasMany(MilestoneRequest::class, '_user', 'id')->where('status', 'pending');
  }

  public function payment_receipts()
  {
    return Payment::select('*')
      ->join('milestone', function ($join) {
        $join->on('payment._milestone', '=', 'milestone.id');
      })
      ->join('bid', function ($join) {
        $join->on('bid.id', '=', 'milestone._bid');
      })
      ->where(function ($query) {
        $query->where('bid._freelancer', '=', $this->id);
      })
      ->orderBy('payment.id', 'desc')
      ->get();
  }

  public function total_jobs()
  {
    return $this->projects->count();
  }

  public function userpoint()
  {
    return $this->hasMany(UserPoint::class, '_user', 'id');
  }

  public function disputes()
  {
    return $this->user_from_dispute->merge($this->user_to_dispute);
  }

  //s2nhomau

  public function getTotalDisputesAttribute()
  {
    return $this->list_dispute()->count();
  }

  //dispute

  public function list_dispute()
  {
    return Dispute::WithUser($this->id);
  }

  public function getDisputesWinAttribute()
  {
    return $this->user_from_dispute()->PlaintiffWin()->count() + $this->user_to_dispute()->DefendentWin()->count();
  }

  public function user_from_dispute()
  {
    return $this->hasMany('App\Models\Dispute', '_user_from', 'id');
  }

  public function user_to_dispute()
  {
    return $this->hasMany('App\Models\Dispute', '_user_to', 'id');
  }

  public function getDisputesLoseAttribute()
  {
    return $this->total_disputes - $this->disputes_win;
  }

  public function arbiters()
  {
    return $this->hasMany('App\Models\arbiter', 'user_arbiter_id', 'id');
  }

  public function arbiter()
  {
    return $this->hasMany('App\Models\arbiter', 'user_arbiter_id', 'id')->where('status', 0)->get();
  }

  //arbiter

  public function dispute_attachment()
  {
    return $this->hasMany('App\Models\DisputeAttachments', 'id_user', 'id');
  }

  public function disputes_case()
  {
    return $this->hasMany('App\Models\DisputeCase', 'user_id', 'id');
  }

  //dispute_attachments

  public function charge_credit()
  {
    return $this->hasMany('App\Models\ChargeCredit', '_user', 'id');
  }

  //disputes_case

  public function invitedDispute()
  {
    return Dispute::select('dispute.*')
      ->leftJoin('arbiters', 'arbiters.id_dispute', '=', 'dispute.id')
      ->leftJoin('users', 'users.id', '=', 'arbiters.user_arbiter_id')
      ->where('arbiters.user_arbiter_id', '=', $this->id)
      ->where('arbiters.status', '=', 0)
      ->get();
  }

  //charge credit

  public function acceptedDispute()
  {
    return Dispute::select('dispute.*')
      ->leftJoin('arbiters', 'arbiters.id_dispute', '=', 'dispute.id')
      ->leftJoin('users', 'users.id', '=', 'arbiters.user_arbiter_id')
      ->where('arbiters.user_arbiter_id', '=', $this->id)
      ->where('arbiters.status', '=', 1)
      ->get();
  }

  //end s2nhomau

  public function user_rp()
  {
    return $this->hasMany(UserRp::class, '_user', 'id');
  }

  public function total_rp()
  {
    return $this->user_rp->sum('point');
  }

  public function total_point_table()
  {
    return $this->userpoint->sum('point');
  }

  public function getPointsAttribute()
  {
    if ($this->is_seeker()) {
      return $this->SP;
    }
    return $this->SBP;
  }

  public function is_seeker()
  {
    if ($this->role_name == "Seeker") {
      return true;
    }
    return false;
  }

  public function getPointnameAttribute()
  {
    $txt = 'SBP';
    if ($this->isSeeker()) $txt = 'SP';
    return $txt;
  }

  public function isSeeker()
  {
    return $this->role_name == "Seeker";
  }

  public function getPointTextAttribute()
  {
    $txt = 'Skill Based';
    if ($this->isSeeker()) $txt = 'Seeker';
    return $txt;
  }

  public function getPercentNextAttribute()
  {
    $percent = $this->points / $this->next_level_point * 100;
    return number_format($percent, 2);
  }

  public function getPercentNextRpAttribute()
  {
    $percent = $this->RP / $this->rp_next_level_point * 100;
    return number_format($percent, 2);
  }

  public function getLevelAttribute()
  {
    return Calculator::pointToLevel($this->points);
  }

  public function getNextLevelPointAttribute()
  {
    return Calculator::pointToLevel($this->RP, 15);
  }

  public function getRplevelAttribute()
  {
    return Calculator::pointToLevel($this->RP, 15);
  }

  public function getRpNextLevelPointAttribute()
  {
    return Calculator::pointToLevel($this->RP, 15);
  }

  public function getPercentToNextLevelAttribute()
  {
    $my_level = $this->level;
    return number_format((5 - abs($my_level - roundUpToAny($my_level))) / 5, 2);
  }
//    public function level(){
//        return Calculator::pointToLevel($this->points);
//    }

//    public function nextLevelPoint(){
//        return Calculator::nextLevelPoint($this->points);
//    }

//    public function rp_level(){
//        return Calculator::pointToLevel($this->RP, 15);
//    }
//
//    public function rp_nextLevelPoint(){
//        return Calculator::nextLevelPoint($this->RP, 15);
//    }

  public function getUserTitleAttribute()
  {

    $type = 'alchemist';
    if ($this->is_seeker()) $type = 'seeker';
    return Calculator::Title($this->level, $type);

  }

  public function user_tier()
  {
    return Calculator::titleToLv($this->user_title);
  }

  public function percent_tier()
  {
    $type = 'alchemist';
    $current_level = $this->level;
    if ($this->is_seeker()) $type = 'seeker';
    $current_title = UserTitle::where('min_level', '<=', $current_level)
      ->where('max_level', '>=', $current_level)
      ->where('type', '>=', $type)->first();
    $percent = ($current_level - $current_title->min_level) / ($current_title->max_level - $current_title->min_level);

    return number_format($percent, 2);
  }

  public function getFeatureimagesAttribute()
  {
    return $this->medias()->featureimages();
  }

  //inactive
  /*public function saved_users(){
      return $this -> hasMany('App\Models\UserFavorite', '_user', 'id')->pluck('_profile')->toArray();
  }

  public function saved_jobs(){
      return $this -> hasMany('App\Models\UserFavorite', '_user', 'id')->pluck('_project')->toArray();
  }

  public function users_saved(){
      return $this -> belongsToMany('App\Models\User', 'user_favorite', '_user', '_profile')->orderby('id', 'desc');
  }

  public function projects_saved(){
      return $this -> belongsToMany('App\Models\Project', 'user_favorite', '_user', '_project')->orderby('id', 'desc');
  }*/

  public function medias()
  {
    return $this->hasMany(Media::class, '_user', 'id')->orderby('id', 'desc');
  }

  public function getFeaturevideosAttribute()
  {
    return $this->medias()->featurevideos();
  }

  public function getTotalFeaturedImagesAttribute()
  {
    return $this->medias()->totalFeaturedImages();
  }

  public function getTotalFeaturedVideosAttribute()
  {
    return $this->medias()->totalFeaturedVideos();
  }

  public function posts()
  {
    return $this->myPosts()->publish();
  }

  public function myPosts()
  {
    return $this->hasMany(Post::class, '_user', 'id');
  }

  public function postsAlbumFeed()
  {
    return $this->postsAlbum()->publish();
  }

  public function postsAlbum()
  {
    return $this->myPosts()->where('_album', '!=', null);
  }

  public function getAlbumLeftAttribute()
  {
    return $this->max_albumfeed - $this->postsAlbumFeed->count();
  }

  public function albums()
  {
    return $this->hasMany(Album::class, '_user', 'id')->orderby('id', 'desc');
  }

  public function videos()
  {
    return $this->hasMany(Video::class, '_user', 'id')->orderby('id', 'desc');
  }

  public function avatar()
  {
    return $this->avatar;
  }

  public function permalink()
  {
    return route('user.timeline', $this->id);
  }

  public function media()
  {
    return $this->hasMany(Media::class, '_user', 'id');
  }

  /**
   * @return [{Project}+status]
   * @time 16h:07/01/2019
   * @status Finish
   * @requires _status [$skip],[$take]
   * @author khaih
   * @email khaihoangdev@gmail.com
   * @desc get list frelancer's project
   */
  public function bid_projects($_status = 0, $skip = 0, $take = 5)
  {
    $res = $this->select('bid_status.status', 'project.*')
      ->leftJoin('bid', 'bid._freelancer', '=', 'users.id')
      ->leftJoin('bid_status', 'bid_status.id', '=', 'bid._status')
      ->leftJoin('project', 'project.id', '=', 'bid._project')
      ->where('users.id', $this->id)
      ->where('bid._status', $_status)
      ->skip($skip)
      ->take($take)
      ->get();
    foreach ($res as &$e) {
      $employer = $this->find($e->_employer);
      $employer->permalink = $employer->permalink();
      $employer->avatar = $employer->avatar();
      $e->employer = $employer;
    }
    return $res;
  }

  public function _deleteUser($id)
  {
    $row = $this->find($id);
    return $row;
    //delete user_skill
    $row->skills()->detach();
    //end delete user_skill
    if ($row) {
      if ($row->delete()) {
        return "success";
      } else {
        return "error";
      }
    } else {
      return "error";
    }


  }


  //s2nhomau function delete user(all)

  public function sendMailRegister()
  {
    $link = str_random(30);
    DB::table('user_activations')->insert(['id_user' => $this->id, 'token' => $link]);
    Mail::send(new VerifyAccount($this, $link));
    return "success";
  }

  //end

  public function reviews()
  {
    return $this->hasMany(Review::class, '_to', 'id')->orderby('id', 'DESC');
  }

  public function ratings()
  {
    return $this->hasMany(Rating::class, '_to', 'id');
  }

  public function type_point($type)
  {
    return number_format($this->ratings->where('rating_type', $type)->avg('value'), 1);
  }

  public function total_point($type)
  {
    return $this->ratings->where('rating_type', $type)->sum('point');
  }

  public function getAverageScoreAttribute()
  {
    return number_format($this->ratings->avg('value'), 1);
  }

  public function getTotalCreditAttribute($number)
  {
    return (int)$this->credit + $this->credit_lock;
  }

  public function spendCredit($number)
  {
    $abs = $this->credit_lock - $number;
    $new_credit_lock = ($abs <= 0) ? 0 : $abs;
    $new_credit = ($abs <= 0) ? $this->credit - abs($abs) : $this->credit;
    return $this->update([
      'credit' => $new_credit,
      'credit_lock' => $new_credit_lock
    ]);
  }

  public function refundCredit($number)
  {
    $abs = $this->credit + $number;
    return $this->update([
      'credit' => $abs
    ]);
  }

  public function update_credit($data)
  {
    switch ($data) {
      //sign up
      case 'sign_up':
        return $this->update(['credit_lock' => Calculator::results_credit('sign_up')]);
        break;
      //complete_personal_details
      case 'complete_personal_details':
        //check add_skill
        $add_skill = $this->skill_user()->count() * Calculator::results_credit('add_skill');
        //check add_education
        //check Add_work_experience
        //check upload_profile_picture
        if ($this->avatar != "") {
          $upload_profile_picture = Calculator::results_credit('upload_profile_picture');
        }

        $complete_personal_details = $add_skill + $upload_profile_picture;
        $this->update([
          'wallet' => $complete_personal_details,
        ]);
        //$this->update([' wallet' => $complete_personal_details]);
        return $this;
        break;
      case 'upload_past_work':
        return 3;
        break;
      case 'upload_articles':
        return 3;
        break;
      case 'upload_blogs':
        return 3;
        break;
      case 'upload_vlogs':
        return 3;
        break;
      case 'frequency_on_showcasing_5':
        return 5;
        break;
      case 'frequency_on_showcasing_10':
        return 10;
        break;
      case 'frequency_on_showcasing_15':
        return 15;
        break;
      default:
        # code...
        break;
    }

  }

  public function skill_user()
  {
    return $this->hasMany('App\Models\skill_user', '_user', 'id');
  }

  public function fee_post_job($status, $value)
  {
    $credit_lock = $this->credit_lock;
    $credit = $this->credit;
    $fee_post_job = Calculator::fee_post_job($status, $value);

    $value_credit_lock = $credit_lock - $fee_post_job;
    $value_credit = $credit + $value_credit_lock;

    if ($value_credit_lock < 0) {
      if ($value_credit > 0) {
        $this->update(['credit_lock' => 0]);
        $this->update(['credit' => $value_credit]);
      } else {
        $this->update(['credit' => $credit]);
        $this->update(['credit_lock' => $credit_lock]);
        return false;
      }
    } else {
      $this->update(['credit_lock' => $value_credit_lock]);
    }
    return true;
  }

  public function contests()
  {
    return $this->hasMany(Contest::class, 'id_user_create', 'id')->orderby('id', 'DESC');
  }

  //contest & entry

  public function post_contests()
  {
    return $this->contests->where('status', '!=', 'completed');
  }

  public function past_contests()
  {
    return $this->contests->where('status', '=', 'completed');
  }

  public function contests_joined()
  {
    return $this->entries->groupBy('contest_id');
  }

  public function contests_win()
  {
    return $this->entries()->where('rank', 1)->groupBy('contest_id')->get();
  }

  public function entries()
  {
    return $this->hasMany(Entrie::class, 'id_user', 'id');
  }

  public function contests_placed()
  {
    return $this->entries()->whereNotIn('rank', [1])->groupBy('contest_id')->get();
  }

  public function contestsWithSkill($id)
  {
    $q = Entrie::join('contests', 'entries.contest_id', '=', 'contests.id')
      ->join('contest_skill', 'contests.id', '=', 'contest_skill.contest_id')
      ->where('id_user', $this->id)
      ->where('skill_id', $id)
      ->count();
    return $q;
  }

  public function joined_contest($status = null)
  {
    return Contest::select('contests.*')
      ->join('entries', function ($join) {
        $join->on('contests.id', '=', 'entries.contest_id');
      })
      ->where(function ($query) {
        $query->where('entries.id_user', '=', $this->id);
      })
      ->orderBy('id', 'desc')
      ->get();
  }

  //get Contests user joined

  public function withdrawals()
  {
    return $this->hasMany(Withdrawal::class, 'user_id', 'id');
  }

  public function followers()
  {
    return $this->belongsToMany(User::class, 'favorites', 'favoritable_id', 'user_id')->where('favoritable_type', 'App\Models\User');
  }

  public function followings()
  {
    return $this->belongsToMany(User::class, 'favorites', 'user_id', 'favoritable_id')->where('favoritable_type', 'App\Models\User');
  }

  public function follow_newsfeed()
  {
    return $this->belongsToMany(User::class, 'favorite_newsfeeds', 'favoritable_id', 'user_id')->where('favoritable_type', 'App\Models\User');
  }


  public function list_follow_newsfeed()
  {
    return $this->belongsToMany(User::class, 'favorite_newsfeeds', 'user_id', 'favoritable_id')->where('favoritable_type', 'App\Models\User');
  }

  public function is_saved_newsFeed()
  {
    return !!Auth::user() && $this->follow_newsfeed->contains(Auth::user());
  }

  public function my_friend()
  {
    return $this->follow_newsfeed()->take(5);
  }

  public function saved_contests()
  {
    return $this->belongsToMany(Contest::class, 'favorites', 'user_id', 'favoritable_id')->where('favoritable_type', 'App\Models\Contest')->Opening();
  }

  public function saved_projects()
  {
    return $this->belongsToMany(Project::class, 'favorites', 'user_id', 'favoritable_id')->where('favoritable_type', 'App\Models\Project')->Opening();
  }

  public function is_saved()
  {
    return !!Auth::user() && $this->followers->contains(Auth::user());
  }

  public function favorites_type($type)
  {
    return $this->favorites()->Model($type);
  }

  public function favorites()
  {
    return $this->hasMany('App\Models\Favorite');
  }

  public function favoritable()
  {
    return $this->morphMany('App\Models\Favorite', 'favoritable');
  }

  public function notifications()
  {
    return $this->morphMany(Notification::class, 'notifiable')
      ->orderBy('created_at', 'desc');
  }

  public function notifications_newsfeed($limit = 5)
  {
    return $this->morphMany(Notification::class, 'notifiable')->where('data', 'like', '%Status%')
      ->orderBy('created_at', 'desc')->take($limit);
  }

  public function location()
  {
    return $this->belongsTo(Location::class, '_location');
  }

  //User Country

  public function getCountryAttribute()
  {
    return $this->location->country ?? "";
  }

  public function getCountryFlagAttribute()
  {
    return strtolower($this->location->country_code ?? "us");
  }

  public function getFullLocationAttribute()
  {
    $text = $this->location->country ?? "";
    if ($this->get_usermeta('state')) {
      $text .= ', ' . $this->get_usermeta('state');
    }
    if ($this->get_usermeta('city')) {
      $text .= ', ' . $this->get_usermeta('city');
    }
    return $text;
  }

  public function getRatingAttribute()
  {
    return number_format($this->ratings->avg('value'), 1);
  }

  public function getRatingDetailAttribute()
  {
    $userRatingDetail = [
      'hire_again' => $this->type_point('recommended'),
      'work_quality' => $this->type_point('work_quality'),
      'communication' => $this->type_point('item_delivery'),
      'organisation' => $this->type_point('recommended'),
      'professionalism' => $this->type_point('attitude')
    ];
    return $userRatingDetail;
  }

  public function getUserDetailAttribute()
  {
    $userDetail = [
      'hourly_hire' => $this->get_usermeta('hourly_hire'),
      'state' => $this->get_usermeta('state')
    ];
    return $userDetail;
  }

  public function get_usermeta($key)
  {
    return $this->usermeta->where('meta_key', $key)->pluck('meta_value')->first();
  }

  /**
   * Send the password reset notification.
   * @note: This override Authenticatable methodology
   *
   * @param string $token
   * @return void
   */
  public function sendPasswordResetNotification($token)
  {
    $this->notify(new ResetPasswordNotification($token));
  }

  public function likecmt()
  {
    return $this->hasMany('App\Models\PostLikeCmt', '_user', 'id');
  }
}
