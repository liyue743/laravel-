<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use App\Model\Admin\orders\Orders;
use App\Model\Admin\orders\Details;

//============张大仙公共控制器==========
class PublicController extends Controller
{
  	//=============发货============ 
    public function fahuo(Request $request)
    {		//接收
    		$oid = $request -> input('id');
    		//修改数据库数据
    		$res = DB::table('orders')->where('oid', $oid)->update(['status' => 1]);
    		return $res;   	
    }
}
