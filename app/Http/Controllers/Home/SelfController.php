<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Users;
use App\Model\Admin\Usersinfo;
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
    	用户修改详细信息
     */
    public function info_update(Request $req,$id)
    {
    	//接收表单传值
    	$data = $req->except('_token','profile','utel');

    	//更换头像
    	if($req->hasFile('profile')){
            //修改名字
            $name =date('Ymd',time()).rand(1111,9999);
            //获取后缀名
            $profix = $req->file('profile')->getClientOriginalExtension();
            //移动
            $req->file('profile')->move('./uploads/users/',$name.'.'.$profix);
            
            $data['profile'] = '/uploads/users/'.$name.'.'.$profix;
        }
        
        try{

        $res = Usersinfo::where('users_id',$id)->update($data);
        	
        	if($res){

        		return redirect('/myself');
        	}else{
        		return redirect('/myself');
        	}

    	}catch(\Exception $e){

    		return back();
    	}

    }
      /*
    	安全中心
     */
    public function safe()
    {

    	return view('home.myself.self_safe');

    } 
     /*
    	修改密码
     */
    public function pass()
    {

    	return view('home.myself.self_pass');
    }
    public function addr()
    {

    	return view('home.myself.self_addr');
    }


}
