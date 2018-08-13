<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Users;
use App\Model\Admin\Usersinfo;

class AjaxController extends Controller
{
	
    public function checkuname (Request $req)
    {
    	$uname = $req->get('uname');

    	$res = Users::where('uname',$uname)->first();

    	if($res){

    		return '1';
    	}
    	
    	
    }
    //批量删除
    public function delusers(Request $req)
    {
    	//获取ajax传值
    		$ids = $req->get('ids');

    		//return($ids);
    	//批量删除主表信息 	
            $re = Users::destroy($ids);

        //删除副表信息
            if($re){
 			
	    		 $res = Usersinfo::whereIn('users_id',$ids)->delete();	    		 
           }

            return $res;
            
                
          

    }
}
