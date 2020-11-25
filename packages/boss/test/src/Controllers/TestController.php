<?php

namespace Boss\Test\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        echo "hello";
    }
    public function haha(){
        return view("view::index");
    }
}
