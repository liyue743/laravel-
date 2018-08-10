<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Users;
use Session;

class SelfController extends Controller
{
    public function index()
    {

    	return view('home.myself.self_index');
    }
     /*
    	用户个人信息页
     */
    public function info()
    {
    	$id = Session::get('user')->id;
    	$user = Users::with('info')->where('id',$id)->first();
    	return view('home.myself.self_info',['user'=>$user]);
    }
      /*
    	安全中心
     */
    public function safe()
    {

    	return view('home.myself.self_safe');
    }
    public function addr()
    {

    	return view('home.myself.self_addr');
    }

}
