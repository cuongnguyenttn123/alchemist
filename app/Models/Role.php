<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Permission;

class Role extends EntrustRole
{
	use EntrustUserTrait;

	protected $table = 'roles';

	protected $fillable = [
		'role_id', 'user_id',
	];

	public function users(){
		return $this->belongsToMany(User::class);
	}

	public function role_user(){
		return $this -> hasOne(UserRole::class, 'role_id', 'id');
	}

	public function permissions(){
		return $this -> belongsToMany(Permission::class);
	}

	public function permission_role(){
		return $this -> hasMany(PermissionRole::class, 'role_id', 'id');
	}

    public function scopeAlchemist($query)
    {
        $project_status = ProjectStatus::firstOrCreate(['status' => 'completed']);
        return $query->hasRole('Alchemist')->orderBy('id', 'desc')->get();

    }
  public function scopeHasRole($query,$roleName)
  {
    return $query->where('name', $roleName);
  }
}
