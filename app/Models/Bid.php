<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Carbon\Carbon;

use App\Models\User;
use App\Models\BidStatus;
use App\Models\BidMessage;
use App\Models\Project;
use App\Models\Milestone;
use App\Models\Media;

class Bid extends Model
{
    protected $table = 'bid';
    protected $fillable = ['shortlist'];
    protected $status;
    protected $time_to_edit;
    protected $casts = ['files' => 'array'];

    public function __construct()
    {
        $this->status = new BidStatus();
        $this->time_to_edit = 3000000;
    }
    /**
     * @desc update|insert bid
     * @return int
     * @status Finish
     * @requires 
     * @created 09h:26/01/2019
     * @updated 
     */
    public function _update($_project, $_freelancer, $title, $description, $medias, $price, $work_time)
    {
        $this->_project = $_project;
        $this->_freelancer = $_freelancer;
        $this->title = $title;
        $this->description = $description;
        $this->medias = $medias;
        $this->price = $price;
        $this->work_time = $work_time;
        // find status default
        $status = $this->status->where('default', 1)->first();
        if ($status) {
            $this->_status = $status->id;
        } else {
            $this->_status = 0;
        }
        // save
        if ($this->save()) {
            return $this->id;
        }
        return false;
    }
    /**
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc update status for bid
     * @return bool
     * @time 09h:03/01/2019
     * @status Finish
     */
    public function change_bid_status($data = ["_bid" => 0, "_status" => 0])
    {
        if ($data["_bid"] && $data["_status"]) {
            if ($this->status->find($data["_status"]))
                return $this->where("id", $data["_bid"])->update(['_status' => $data["_status"]]);
            return false;
        }
        return false;
    }

    public function updateStatus($status_name)
    {
        $bid_status = BidStatus::firstOrCreate(['status' => $status_name]);
        $this->_status = $bid_status->id;
        return $this->save();
    }

    //get shortlist
    public function scopeShortlisted($query)
    {
        return $query->where('shortlist', 1)->get();
    }

    public function siblings()
    {
        return $this->hasMany(Bid::class, '_project', '_project');
    }

    public function bid_status()
    {
        return $this->belongsTo(BidStatus::class, '_status', 'id');
    }

    public function messages()
    {
        return $this->hasMany(BidMessage::class, '_bid', 'id');
    }

    public function getStatus()
    {
        return $this->bid_status->status;
    }

    public function project()
    {
        return $this->belongsTo(Project::class, '_project', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, '_freelancer', 'id');
    }

    public function media()
    {
        $media = Media::find($this->medias);
        return $media;
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class, '_bid', 'id');
    }

    public function getTotalWorkdaysAttribute()
    {
        $sum = 0;
        foreach ($this->milestones as $ms) {
            $sum += $ms->total_days;
        }
        return $sum;
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'bid_skill', '_bid', '_skill');
    }

    public function getCanEditAttribute()
    {
        if (Auth::user())
            return ($this->getStatus() != "awarding" && $this->_freelancer == Auth::user()->id && $this->created_at >= Carbon::now()->subMinutes($this->time_to_edit)) ? true : false;
        return false;
    }

    public function getAuthorAttribute()
    {
        return !!Auth::check() && Auth::user()->id === $this->_freelancer;
    }

    public function getFilesCollectionAttribute()
    {
        if (!empty($this->files) && is_array($this->files)) {
            return ProjectAttachments::whereIn('id', $this->files)->get();
        }

        return collect();
    }

    public function scopeWin($query)
    {
        $bid_status = BidStatus::firstOrCreate(['status' => 'awarding']);
        return $query->where('_status', $bid_status->id)->first();
    }

    public function files()
    {
        if (!empty($this->files) && is_array($this->files))
            return ProjectAttachments::whereIn('id', $this->files)->get();
    }
}
