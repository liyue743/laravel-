<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goods;

class GoodsController extends Controller
{
	//商品详情展示页
    public function player($id)
    {
    	$goodsinfos = DB::table('goods')->where('gid',$id)->first();
    	$goodsimg = Goods::with('goodstospic')->where('gid',$id)->first();
    	dd($goodsimg);
    	return view('home/goods/player',['goodsinfos'=>$goodsinfos]);
    }
}
