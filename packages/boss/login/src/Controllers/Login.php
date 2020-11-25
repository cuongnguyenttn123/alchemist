<?php

namespace Boss\Login\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index(){
        $this->authorize('view-post');
        return view("login::index");
    }

    public function register(){

    }

}
