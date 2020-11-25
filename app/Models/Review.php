<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rating;
use App\Models\Skill;
use App\Models\UserSkillVote;

class Review extends Model
{
	protected $table = 'review';
    protected $fillable = [
        '_from', '_to', '_project',
    ];

    public $criteria;

    public function __construct(){
        $this->criteria = [
                      'recommended'     => 'Recommended',
                      'work_quality'    => 'Work Quality',
                      'management'      => 'Management',
                      'attitude'        => 'Attitude',
                      'item_delivery'   => 'Item Delivery',
                    ];
    }
    public function store($data)
    {
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->_from = $data['_from'];
        $this->_to = $data['_to'];
        $this->_project = $data['_project'];
        $rv =  $this->save();
        return $rv;
    }

    public function skills()
    {
        $data = UserSkillVote::where(['_user' => $this->_to, '_project' => $this->_project ])->pluck('_skill')->toArray();
        $models = Skill::whereIn('id', $data)->pluck('name')->toArray();
        return implode(', ', $models);
    }

    public function getRatingsAttribute()
    {
        $data = Rating::where(['_to' => $this->_to, '_from' => $this->_from, '_project' => $this->_project ])->groupBy('rating_type')->get();
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, '_to', 'id');
    }

    public function user_from()
    {
        return $this->belongsTo(User::class, '_from', 'id');
    }

    public function checkSecond($id)
    {
        return !! $this->where('_to', $id)->count() > 0;
    }

}
