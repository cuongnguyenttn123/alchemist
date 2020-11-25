<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
	protected $table = "project_skill";
	
	public $timestamps = false;
	
    public function project(){
		return $this -> belongsTo('App\Model\Project', 'project_id', 'id');
	}
	
	public function skill(){
		return $this -> belongsTo('App\Model\Skill', 'skill_id', 'id');
	}
}
