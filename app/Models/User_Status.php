<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Status extends Model
{
	protected $table = 'user_status';

	public function user(){
		return $this->hasMany('App\Models\User', '_status', 'id');
	}
    public function getNameAttribute() {
        return ucfirst($this->status);
    }

}
