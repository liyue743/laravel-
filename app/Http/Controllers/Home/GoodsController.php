<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
	//商品详情展示页
    public function player($id)
    {
    	$goodsinfos = DB::table('goods')->where('gid',$id)->first();
    	return view('home/goods/player',['goodsinfos'=>$goodsinfos]);
    }
}
