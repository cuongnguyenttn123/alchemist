<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectLocation extends Model
{
	protected $table = "project_location";
	
	public $timestamps = false;
	
    public function project(){
		return $this -> belongsTo('App\Models\Project', 'project_id', 'id');
	}
	
	public function location(){
		return $this -> belongsTo('App\Models\location', 'location_id', 'id');
	}
}
