<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(Auth::check()){
        // dd(Auth::user()->roles->first()->name);
        // dd(Auth::user()->role->first()->name);
            // if(Auth::user()->user_role->role->name == "Admin"){
            if(Auth::user()->is_admin()){
                /*if( Auth::user()->email_verified_at == null){
                    // Auth::logout();
                    return redirect() -> route('admin.login') -> with('error', 'Please active your account');
                }else{
                    return $next($request);
                }*/
                    return $next($request);
            }else{
                // Auth::logout();
                return redirect() -> route('home') -> with('result', 'You do not have permision');
            }
        }else{
            return redirect() -> route('adminlogin') -> with('result', 'Login to manage');
        }
    }
}
