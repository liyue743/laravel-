<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function regist()
    {
    	return view('home.register.regist',['title'=>'前台的注册页面']);
    }
}
