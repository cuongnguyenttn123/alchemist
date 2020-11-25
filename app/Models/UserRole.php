<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Permission;

class UserRole extends Model
{
	protected $table = 'role_user';

	protected $fillable = [
		'role_id', 'user_id',
	];

	public $timestamps = false;

	public function role(){
		return $this -> belongsTo('App\Models\Role', 'role_id', 'id');
	}

	public function user(){
		return $this -> belongsTo('App\Models\User', 'user_id', 'id');
	}
}
