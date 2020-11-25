<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

use App\Models\User;

class Deposit extends Model
{
	protected $table = 'deposit';

	public function user(){
		return $this->belongsTo(User::class, '_user', 'id');
	}

	public function updateUserWallet($value){
		// $this->user->decrement('wallet', $value);
		$this->user->increment('wallet', $value);
		return $this->user->wallet;
	}

}
