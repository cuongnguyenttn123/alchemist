<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Validator;
use Auth;
use App\Http\Requests\createUserRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User_Status;
use App\Models\Category;
use App\Models\Skill;
use App\Models\skill_user;
use App\Myconst;

class userController extends Controller
{
	public function __construct(){
        $this->user = new User();
	}
	public function getListUser(Request $request){

		$status = $request->status ? $request->status : '';
		$keyword = $request->keyword ? $request->keyword : '';
		$role_id = $request->role ? $request ->role : '';
		$list_user = User::select('users.*', 'user_status.status')
		->join('role_user', function ($join) use ($role_id){
			if($role_id != ''){
				$join->on('users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', $role_id);
			}
		})
		->join('user_status', function($join) use ($status) {
			if($status != ''){
				$join->on('users._status', '=', 'user_status.id')->where('_status', '=', $status);
			}
		})
		->where(function($query) use ($keyword){
			$query->where('email', 'LIKE', '%'.$keyword.'%')->orWhere('username', 'LIKE', '%'.$keyword.'%');
		})
		->groupBy('users.id')
		->orderBy('id', 'desc')
		->paginate(Myconst::PAGINATE_ADMIN);
		$total_record = $list_user->total();
		$count_record = count($list_user);
		if(isset($request -> page)){
			if($request -> page < 2){
				$start = 1;
				$record = $count_record;
			}else{
				$start = ($request -> page * Myconst::PAGINATE_ADMIN - Myconst::PAGINATE_ADMIN) + 1;
				$record = ($request -> page * Myconst::PAGINATE_ADMIN - Myconst::PAGINATE_ADMIN) + $count_record;
			}
		}else{
			$start = 1;
			$record = $count_record;
		}
		$total_user = User::count();
		$list_status = User_Status::all();
	    return view('admin.users', compact(['total_user','list_user', 'keyword', 'total_record', 'start', 'record', 'count_record','list_status']));
	}
	//get user
	public function getCreateUser(){
        $list_role = Role::pluck('display_name', 'id');
        $list_status = User_Status::pluck('status', 'id');
		return view('admin.user.add_user', compact('list_role','list_status'));
	}
	//post user
	public function postCreateUser(createUserRequest $request){
		$check = count(User::where('email', $request -> email)->get());
		if($check < 1){
			$user = new User;
			$user -> username = $request -> username;
			$user -> first_name = $request -> first_name;
			$user -> last_name = $request -> last_name;
			$user -> password =  bcrypt($request -> password);
			$user -> email = $request -> email;
			$user -> _status = $request -> status;
			$user -> is_activated = 1;
			if($user -> save()) {
				$user_role_new = new UserRole;
				$user_role_new -> user_id = $user->id;
				$user_role_new -> role_id = $request -> role;
				$user_role_new -> save();
				return redirect()->route('getListUser')->with('add','Added User');
			}
		}else{
			return redirect()->route('getListUser')->with('add','Email already exists');
		}
		
	}
	public function getEditUser($id){
		$info_user = User::findOrFail($id);
        $list_role = Role::pluck('display_name', 'id');
        $list_status = User_Status::pluck('status', 'id');
        $skills = Skill::pluck('name', 'id');
        $user_skills = $info_user->skills()->get()->pluck('id')->toArray();
		return view('admin.user.edit_user', compact(['info_user', 'list_role', 'list_status', 'skills','user_skills']));
	}

	public function postEditUser(Request $request, $id){
		$id_user = $id;
		$edit_info_user = User::find($id);

		$edit_info_user -> first_name = $request -> first_name;
		$edit_info_user -> last_name = $request -> last_name;
		$edit_info_user -> _status = $request -> status;

		if($edit_info_user -> save()) {
			$user_role = UserRole::where('user_id', $id)->first();
			if(count((array)($user_role)) > 0){
				if($request->role ==null){
					$role = 2;
				}else{
					$role=$request->role;
				}
				UserRole::where('user_id', $id)->delete();
				$edit_info_user->attachRole($role);

			}else{
				$user_role_new = new UserRole;
				$user_role_new -> user_id = $id;
				$user_role_new -> role_id = $request -> role;
				$user_role_new -> save();

			}
			if($request->userskill) {
				$edit_info_user->skills()->detach();
				foreach ($request->userskill as $key => $value) {
					// $role->attachPermission($value);
					$edit_info_user->skills()->attach($value);
				}
			}
			return redirect()-> back();
		}else{
			echo "err";
		}

	}

	public function deleteUser($id){
		return $this->user->_deleteUser($id);
		$value = $id;
	    $info_user_del = User::find($value);
		if(count((array)($info_user_del)) > 0){
			if(isset($info_user_del->user_role) && $info_user_del->user_role->role->name == "Admin"){
				return redirect()->back()->with('add','Cannot delete admin');
			}
			//delete skill_user
			$del_skill_user = skill_user::where('_user',$value) -> delete();
			//delete user
			$info_user_del->delete();
			return redirect()->route('getListUser')->with('add','Deleted User');
		}else{
			$info_user_del->delete();
				return redirect()->route('getListUser')->with('add','Deleted User');
		}
	}

	public function reg(){
		if(Auth::user()){
			return redirect() -> route('getDashboard');
		}else{
			return view('admin.register');
		}
	}

	public function postReg(Request $request){
		$this-> Validate($request,[
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6|max:32',
            're_password' => 'same:password',
			'username' => 'required|unique:users,username',
			'first_name' => 'required',
			'last_name' => 'required'
		]);
		return redirect() -> back() -> with('err', 'User name or password incorrect');
	}

	public function postLogin(Request $request){
		$this-> Validate($request,[
			'username' => 'required',
			'password' => 'required'
		]);
		if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
			return redirect()->back();
		}else{
			return redirect()->back()->with('err', 'Username or password incorrect');
		}
	}
	public function logout(Request $request){
		Auth::logout();
		return redirect()->back();
	}


}
