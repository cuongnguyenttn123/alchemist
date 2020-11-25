<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class ChargeCredit extends Model
{
	protected $table = 'charge_credits';

    public function user(){
      return $this -> belongsTo('App\Models\User', '_user', 'id');
  	}

  	public function updateUserCredit($value){

		return  $this->user->increment('credit', $value);
	}

}
