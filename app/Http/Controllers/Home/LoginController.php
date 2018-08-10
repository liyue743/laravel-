<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login',['title'=>'前台的登录页面']);
    }

    public function dologin(Request $request)
    {
    
    	
    	
    	// 判断用户名
    	$uname = $request->input('uname');

    	$res = DB::table('users')->where('uname',$uname)->first();

    	if(!$res){
    		
    		return back()->with('error','用户名错误');
    	}
    	 

    	// 判断密码
    	$pass = $request->input('upwd');
    	if(!DB::table('users')->where('upwd',md5($pass))){
    		return back()->with('error','密码错误');
    	}else{
    		session(['user'=>$res]);
    		return redirect('/');
    	}	
    }


    public function loginout()
    {
    	session(['user'=>null]);
    	return redirect('/');
    }
}
