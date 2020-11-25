<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectListType extends Model
{
	protected $table = "project_list_type";
	
	public $timestamps = false;
	
    public function project(){
		return $this -> belongsTo('App\Model\Project', 'project_id', 'id');
	}
	
	public function list_type(){
		return $this -> belongsTo('App\Model\ListType', 'list_type_id', 'id');
	}
}
