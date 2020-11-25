<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LanguageProject extends Model
{
	protected $table = "language_project";
	
	public $timestamps = false;
	
    public function project(){
		return $this -> belongsTo('App\Model\Project', 'project_id', 'id');
	}
	
	public function language(){
		return $this -> belongsTo('App\Model\Language', 'language_id', 'id');
	}
}
