<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Dispute;

class DisputeStatus extends Model
{
	protected $table = 'dispute_status';
	protected $fillable = ['status'];

	public function dispute(){
		return $this -> hasMany(Dispute::class, '_status', 'id');
	}

}
