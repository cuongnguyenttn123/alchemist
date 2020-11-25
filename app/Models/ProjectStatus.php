<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Project;

class ProjectStatus extends Model
{
	protected $table = 'project_status';
  	protected $fillable = ['id', 'status'];

	public function project(){
		return $this -> hasMany(Project::class, '_status', 'id');
	}

}
