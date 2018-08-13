<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Users;

class UsersinfoController extends Controller
{
	//修改密码页
    public function pass($id)
    {
    	$res = Users::where('id',$id)->first();
    	
    	return view('admin/users/users_pass',['title'=>'修改密码','res'=>$res]);
    
    }

    //验证密码
    public function dopass(Request $req,$id)
    {	

    	$oldpass = $req->input('oldpass');

    	$res = Users::where(['id'=>$id,'upwd'=>md5($oldpass)])->first();

    	//dd($res);

    	if($res){

    		$newpass = $req->input('newpass');

    		$row = Users::find($id)->update(['upwd'=>md5($newpass)]);

    	}else{

    		return back()->with('error','密码有误!');
    	}

    		return redirect('/users')->with('success','修改成功!');
    	
    	
    }

    public function show($id)
    {
        $res = Users::with('info')->where('id',$id)->first();

        return view('/admin.users.users_show',['res'=>$res]);
    }
}
