<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;

class UserSkillVote extends Model
{
  	protected $table = 'user_skill_vote';
  	public $timestamps = false;
    
    public function scopeWithId($query, $id)
    {
        return $query->where('_skill', $id)->get();
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class, '_skill', 'id');
    }
}
