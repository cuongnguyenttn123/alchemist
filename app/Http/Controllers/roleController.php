<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createRoleRequest;
use App\Http\Requests\editRoleRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\PermissionRole;
use App\Models\UserRole;
use Auth;

class roleController extends Controller
{
	public function getListRole(){
		$list_role = Role::all();
		return view('admin.role.list_role', compact('list_role'));
	}

	public function getCreateRole(){
        $list_permission = Permission::pluck('display_name', 'id');
		return view('admin.role.create_role', compact('list_permission'));
	}

	public function postCreateRole(createRoleRequest $request){
		$role = new Role();
		$role -> name = $request -> name;
		$role -> display_name = $request -> display_name;
		$role -> description = $request -> description;
		$role -> save();

		if($request -> permission != null || $request -> permission = ''){
			foreach ($request -> permission as $key => $value) {
				$role->attachPermission($value);
			}
		}
		return redirect()->route('role.list')->with('success', 'Role created successfully');
	}

	public function getEditRole($id){
		$role = Role::findOrFail($id);
        $list_permission = Permission::pluck('display_name', 'id');
        $role_permission = $role->permissions()->pluck('id')->toArray();
		return view('admin.role.edit_role', compact('role', 'list_permission', 'role_permission'));
	}

	public function postEditRole(editRoleRequest $request, $id){
		$role_edit = Role::findOrFail($id);
		$role_edit -> name = $request -> name;
		$role_edit -> display_name = $request -> display_name;
		$role_edit -> description = $request -> description;
		$role_edit -> save();

		PermissionRole::where('role_id', $id)->delete();
		if(is_array($request -> permission)){
			foreach ($request -> permission as $key => $value) {
				$role_edit->attachPermission($value);
			}
		}
		return redirect()->route('role.list')->with('success', 'Edit role successfully');
	}

	public function getDeleteRole($id){
		$user_role = UserRole::where('role_id', $id)->get();
		if(count($user_role) > 0){
			return redirect() -> back() -> with('error', 'This role has user, Please change role for user');
		}else{
			$role_del = Role::where('id', $id) -> delete();
			if($role_del){
				return redirect() -> back() -> with('success', 'Delete role successfully');
			}else{
				return redirect() -> back() -> with('success', 'Delete role error');
			}
		}
	}
}
