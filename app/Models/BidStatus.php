<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bid;

class BidStatus extends Model
{
	protected $table = 'bid_status';
  	protected $fillable = ['id', 'status'];

	public function bid(){
		return $this -> hasMany(Bid::class, '_status', 'id');
	}

}
