<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	protected $table = 'permissions';

	public function roles(){
		return $this -> belongsToMany('App\Models\Role');
	}

	public function permission_role(){
		return $this -> hasMany('App\Models\PermissionRole', 'permission_id', 'id');
	}
}
