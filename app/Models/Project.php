<?php

namespace App\Models;

use App\Filters\ProductFilter;
use App\Http\Filters\Filterable;
use App\Libs\Convert;
use App\Libs\Generate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

//s2nhomau--filter
//use Illuminate\Database\Eloquent\Model;
//end

class Project extends Model
{
    use Filterable;

    public $question_packs;
    public $meta;
    public $category;
    public $tag;
    public $mile;
    public $location;
    public $project_status;
    public $max_shortlist;
    protected $table = 'project';
    protected $fillable = ["name", "short_description", "detail_description", "budget", "deadline", "bid_start", "bid_end", "_employer"];
    protected $filter_rules = ['date', 'budget', 'deadline', 'active'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->question_packs = new QuestionPack();
        $this->category = new ProjectCategory();
        $this->meta = new ProjectMeta();
        $this->tag = new Tag();
        $this->mile = new Milestone();
        $this->location = new Location();
        $this->project_status = new ProjectStatus();

        $this->max_shortlist = 10;
    }
    /* Scope */
    //get project without completed

    public static function recent_jobs()
    {
        return static::orderBy('id', 'desc')->take(5)->get();
    }

    //get project user posted

    public function scopeIncompleted($query)
    {
        $project_status = ProjectStatus::firstOrCreate(['status' => 'completed']);
        return $query->whereNotIn('_status', [$project_status->id])->orderBy('id', 'desc')->get();
    }

    public function scopeWithStatus($query, $status)
    {
        $project_status = ProjectStatus::firstOrCreate(['status' => $status]);
        return $query->where('_status', $project_status->id)->orderBy('id', 'desc')->get();
    }

    //get project user bided

    public function scopeOpening($query)
    {
        $exclude_status = ProjectStatus::whereIn('status', ['completed', 'processing', 'Waiting Accept', 'Failed'])->pluck('id')->toArray();
        return $query->whereNotIn('_status', $exclude_status)->orderBy('id', 'desc')->get();
    }

    public function scopeWithBidStatus($query, $status)
    {
        $bid_status = BidStatus::firstOrCreate(['status' => $status]);
        return $this->select('project.*')
            ->join('bid', function ($join) {
                $join->on('project.id', '=', 'bid._project');
            })
            ->join('bid_status', function ($join) {
                $join->on('bid_status.id', '=', 'bid._status');
            })
            ->where(function ($query) use ($bid_status) {
                $query->where('bid_status.status', '=', $bid_status->id);
            })
            ->get();
    }

    /**
     * @return Project Object
     * @time 12/21/2018
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc get once project with id passing
     */

    public function project($id)
    {
        $project = $this->where('project.id', $id)->first();
        $project->categories = $this->category->categories($id);
        $project->questions = $this->question_packs->question_packs($id);
        $project->metas = $this->meta->metas($id);
        $project->miles = $this->mile->miles($id);
        $project->tags = $this->tag->tags($id);

        $project->locations = $this->location->locations($project->_location);

        return $project;
    }

    /**
     * @return Project
     * @time 12/21/2018
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc get list project
     */
    public function projects($query = null, $page = null)
    {
        $paging = Generate::gen_skip_take($page);
        $res = $this->select("project.id", "project.name", "project.short_description", "project.budget", "project.deadline", "project._employer", "users.email", 'project_status.status')
            ->leftJoin("users", "users.id", "=", "project._employer")
            ->leftJoin("project_status", 'project_status.id', '=', 'project._status');
        if ($query and in_array($query['cmd'], $this->filter_rules)) {
            $res = $res->orderBy($query["cmd"], $query["val"])->skip($paging["skip"])->take($paging["take"])->get();
        } else {
            $res = $res->orderBy('project.created_at', 'desc')->skip($paging["skip"])->take($paging["take"])->get();
        }
        return $res;
    }

    /**
     * @return Bool
     * @time 12/21/2018
     * @status Finish
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc Delete project with id passing
     */
    public function _delete($data)
    {
        $res = $this->where("id", $data['id'])->first();
        if ($res)
            return $res->delete();
        return $res;
    }

    /**
     * @return Project []
     * @time 12/21/2018
     * @status Updating
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc update|insert new project, update when $data contain id
     */
    public function _update($data)
    {
        if (array_key_exists('id', $data) && $data['id']) {
            $_status = $this->project_status->where('default', 1)->first();
            $res = $this->where("id", $data["id"])->update(
                [
                    'name' => $data["name"],
                    'short_description' => $data["short_description"],
                    'detail_description' => $data["detail_description"],
                    'budget' => $data["budget"],
                    'deadline' => $data["deadline"],
                    'bid_start' => $data["bid_start"],
                    'bid_end' => $data["bid_end"],
                    'medias' => $data["file_attached"],
                    '_location' => $data["address_city"],
                    '_status' => $_status->id
                ]
            );
            if ($res) {
                return $this->id;
            }
            return false;
        } else {
            $_employer = Auth::user()->id;
            $this->name = $data["name"];
            $this->short_description = $data["short_description"];
            $this->detail_description = $data["detail_description"];
            $this->budget = $data["budget"];
            $this->deadline = $data["deadline"];
            $this->bid_start = $data["bid_start"];
            $this->bid_end = $data["bid_end"];
            $this->medias = $data["file_attached"];
            $this->_location = $data["address_city"];
            $this->_employer = $_employer;
            $this->_status = 1;
            $status = $this->save();
            if ($status) {
                return $this->id;
            }
        }
        return 0;
    }

    //update status

    public function change_project_status($data = ["_project" => 0, "_status" => 0])
    {
        if ($data["_project"] && $data["_status"]) {
            if ($this->project_status->find($data["_status"]))
                return $this->where("id", $data["_project"])->update(['_status' => $data["_status"]]);
            return false;
        }
        return false;
    }

    public function updateStatus($status_name)
    {
        $status = ProjectStatus::firstOrCreate(['status' => $status_name]);
        $this->_status = $status->id;
        return $this->save();
    }

    public function updateDateAccept()
    {
      $this->accept_time = date("Y-m-d h:i");
      return $this->save();
    }

    public function project_status()
    {
        return $this->belongsTo(ProjectStatus::class, '_status', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class, '_status', 'id')->pluck('status')->first();
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_project', 'project_id', 'language_id');
    }

    public function listtype()
    {
        return $this->belongsToMany(ListType::class, 'project_list_type', 'project_id');
    }

    public function bid_milestones()
    {
        return $this->hasManyThrough(Milestone::class, Bid::class, '_project', '_bid', 'id', 'id');
    }

    //milestone of seeker

    public function agreed_ms()
    {
        $id = $this->id;
        $res = Milestone::select('milestone.*')
            ->join('bid', function ($join) {
                $join->on('bid.id', '=', 'milestone._bid');
            })
            ->join('bid_status', function ($join) {
                $join->on('bid_status.id', '=', 'bid._status');
            })
            ->where(function ($query) use ($id) {
                $query->where('bid._project', '=', $id)
                    ->where('bid_status.status', '=', 'accepted');
            })
            ->get();
        return $res;
    }

    //milestone accept bid

    public function isCompleted()
    {
        $ms_status = MilestoneStatus::firstOrCreate(['status' => 'Completed']);
        $total_ms = $this->accepted_milestones()->count();
        $total_ms_completed = $this->accepted_milestones()->where('_status', $ms_status->id)->count();
        if ($total_ms == $total_ms_completed) {
            return true;
        }
        return false;
    }

    public function accepted_milestones()
    {
        return $this->milestone()->WhereNotNull('_bid');
    }

    //not use this replace by accepted_milestones

    public function milestone()
    {
        return $this->hasMany(Milestone::class, '_project', 'id');
    }

    public function is_author()
    {
        return !!Auth::check() && $this->_employer === Auth::user()->id;
    }

    //check current user author

    public function user_bided()
    {
        return !!Auth::check() && $this->bids->where('_freelancer', Auth::user()->id)->count();
    }

    //check current user bidded

    public function your_bid()
    {
        return $this->bids->where('_freelancer', Auth::user()->id)->first();
    }

    public function getTotalShortlistAttribute()
    {
        return $this->shortlist_bids()->count();
    }

    //get current user bidded

    public function shortlist_bids()
    {
        return $this->bids->where('shortlist', 1);
    }

    public function getAverageBidpriceAttribute()
    {
        return '$' . number_format($this->bids->avg('price'));
    }

    public function takeBids($num)
    {
        return $this->bids()->take($num)->get();
    }

    public function bids()
    {
        return $this->hasMany(Bid::class, '_project', 'id')->groupBy('_freelancer');
    }

    public function user()
    {
        return $this->belongsTo(User::class, '_employer', 'id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'project_category', '_project', '_category')->groupBy('project_category._category');
    }

  public function categoriesProject()
  {
      return $this->belongsToMany(Category::class, 'project_category', '_project', '_category');
  }

    public function user_title()
    {
        return $this->belongsToMany(UserTitle::class, 'project_user_title', '_project', '_user_title');
    }

    public function require_title()
    {
        return $this->user_title->pluck('id')->toArray();
    }

    public function check_title($id)
    {
        return !!$this->user_title->where('id', $id)->count();
    }

    public function all_tag()
    {
        return $this->hasMany(Tag::class, '_project', 'id')->select('name')->pluck('name')->toArray();
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, '_project', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(ProjectAttachments::class, '_project', 'id');
    }

    public function users_bidding()
    {
        return Bid::where('_project', $this->id)->pluck('_freelancer')->toArray();
    }

      /*public function user_attachments(){
        return $this->attachments->where('_user', $this->_employer);
      }*/

    public function messages()
    {
        return $this->hasMany(ProjectMessage::class, '_project', 'id')->with('user');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, '_project', 'id');
    }

    public function deadline()
    {
        return Convert::int_to_date($this->deadline);
    }

    public function getStartBidAttribute()
    {
        return Convert::int_to_date($this->bid_start);
    }

    // public function getBidStartAttribute($date)
    // {
    //   return Carbon::parse(date('d M Y', $date))->format("m/d/Y");
    // }

    public function getEndBidAttribute()
    {
        return Convert::int_to_date($this->bid_end);
    }

    public function getDayLeftAttribute()
    {
        $bid_end = $this->bid_end;
        return Carbon::parse(date('d M Y', $this->bid_end))->diffInDays();
    }

    public function getDeadlineLeftAttribute()
    {
        return Carbon::parse(date('d M Y', $this->deadline))->diffInDays();
    }

    public function getreyAttribute()
    {
        if ($this->my_milestone()->count() > 0) {
            return $this->my_milestone()->sum('workday');
        }
        $day = round(abs($this->deadline - $this->bid_start) / 24 / 60 / 60);
        return $day;
    }

    public function my_milestone()
    {
        return $this->milestone()->WhereNull('_bid');
    }

    public function getPostedAgoAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getPostedAtAttribute()
    {
        $bid_end = $this->bid_end;
        return Carbon::parse($this->created_at)->diffInDays();
    }

    public function available_bid()
    {
        $current_time = strtotime(date("Y-m-d"));
        $project_status = $this->belongsTo(ProjectStatus::class, '_status', 'id')->first()->status;
        if ($this->bid_start <= $current_time && $this->bid_end >= $current_time) {
            return true;
        }
        /*if ($project_status == "created") {
      return true;
    }*/
        return false;
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\Favorite', 'favoritable');
    }

    public function is_saved()
    {
        return !!Auth::user() && $this->favorites->where('user_id', Auth::user()->id)->count();
    }

    public function permalink()
    {
        return route('jobdetail', $this->id);
    }

    public function is_reviewed($user_from)
    {
        $rv = Review::where('_project', $this->id)->where('_from', $user_from)->count();
        if ($rv) return true;
        return false;
    }

    public function getBidwonAttribute()
    {

        $id = $this->id;
        $bid = Bid::select('bid.*')
            ->join('project', function ($join) {
                $join->on('bid._project', '=', 'project.id');
            })
            ->join('bid_status', function ($join) {
                $join->on('bid_status.id', '=', 'bid._status');
            })
            ->where(function ($query) use ($id) {
                $query->where('bid._project', '=', $id)
                    ->where('bid_status.status', '=', 'completed')
                    ->OrWhere('bid_status.status', '=', 'accepted')
                    ->where('bid._project', '=', $id);
            })
            ->first();
        return $bid;
    }

    public function getUserwonAttribute()
    {

        $id = $this->id;
        $user = User::select('users.*')
            ->join('bid', function ($join) {
                $join->on('bid._freelancer', '=', 'users.id');
            })
            ->join('bid_status', function ($join) {
                $join->on('bid_status.id', '=', 'bid._status');
            })
            ->where(function ($query) use ($id) {
                $query->where('bid._project', '=', $id)
                    ->where('bid_status.status', '=', 'completed')
                    ->OrWhere('bid_status.status', '=', 'accepted')
                    ->where('bid._project', '=', $id);
            })
            ->first();
        return $user;
    }

  public function getStatusManagerAttribute()
  {
    $mileton = $this->bidwon->milestones;
  }

    public function getCatnameAttribute()
    {

        return implode(', ', $this->categories->pluck('name')->toArray());
    }

    public function getSkillnameAttribute()
    {

        return implode(', ', $this->skills->pluck('name')->toArray());
    }

    //s2nhomau--filter
    //  public function scopeFilter(Builder $builder, $request)
    //  {
    //    return (new ProductFilter($request))->filter($builder);
    //  }

    public function urlProjectBids()
    {
        return route('profile.projectBids', [str_slug($this->name), $this->id]);
    }

    public function urlTracking()
    {
        return route('profile.tracking', [str_slug($this->name), $this->id]);
    }

    //saved project
    public function users_saved()
    {
        return $this->belongsToMany('App\Models\User', 'user_favorite', '_project', '_user')->orderby('id', 'desc');
    }

    /*public function is_saved(){
      return !! $this->users_saved->contains(Auth::user());
  }*/

    public function disputing()
    {
        return $this->disputes()->WithStatus('Pending')->first();
    }

    public function disputes()
    {
        return $this->hasMany(Dispute::class, '_project', 'id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'project_location');
    }
}
