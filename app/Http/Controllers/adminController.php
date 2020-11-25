<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\User;

class adminController extends Controller
{

	public function getLogin(){
		if(Auth::check()){
			return redirect() -> route('getDashboard');
		}else{
			return view('admin.login');
		}
	}
	public function getDashboard(){
		return view('admin.settings');
	}

	public function postLogin(Request $request){
		if(Auth::attempt(['email' => $request -> email, 'password' => $request -> password])){
			return redirect() -> route('admin.index');
		}else{
			return redirect() -> back() -> with('result', 'User name or password incorrect');
		}
	}
	
	public function getForgotPassword(){
		return view('admin.forgot_password');
	}
	
	public function getLogout(){
		Auth::logout();
		return redirect() -> route('admin.login') -> with('result', 'You have been logged out');
	}
}
