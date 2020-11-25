<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')-> fields(['name', 'first_name', 'last_name', 'email', 'gender', 'verified'])->user();
            $username = strstr($user->email, '@', true);
            $create['username'] = $username;
            $create['email'] = $user->email;
            // $create['facebook_id'] = $user->id;
            $create['first_name'] = $user->user['first_name'];
            $create['last_name'] = $user->user['last_name'];
            // dump($create);
            // dd($user);

            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            // dd($createdUser->id);
            Auth::loginUsingId($createdUser->id);
            return redirect()->back();
        } catch (Exception $e) {
            return redirect('/');
        }
    }

    public function handleTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $user_fullname = explode(' ',$user->name);

            $username = strstr($user->email, '@', true);
            $create['username'] = $username;
            $create['email'] = $user->email;
            // $create['facebook_id'] = $user->id;
            $create['first_name'] = isset($user_fullname[0])?$user_fullname[0]:'';
            $create['last_name'] = isset($user_fullname[1])?$user_fullname[1]:'';
            // dump($create);

            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            // dd($createdUser->id);
            Auth::loginUsingId($createdUser->id);
            return redirect('/search');
        } catch (Exception $e) {
            return redirect('/');
        }
    }
}
