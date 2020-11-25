<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Milestone;

class MilestoneStatus extends Model
{
	protected $table = 'milestone_status';
  	protected $fillable = ['id', 'status'];

	public function milestone(){
		return $this -> hasMany(Milestone::class, '_status', 'id');
	}

}
