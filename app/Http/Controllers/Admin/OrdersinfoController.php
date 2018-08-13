<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use App\Model\Admin\Goods;
use DB;

class OrdersinfoController extends Controller
{

    //===================订单详情===================
    public function index(Request $request,$id)
    {       
        //接收订单ID,时间,状态
            $orders = $request -> input();
            $orders['oid'] = $id;
        //查询订单中的商品ID
            $res = DB::table('details')->where('oid',$id)->get();
        //判断订单是否有效
            if( count($res) ){
                //查询商品信息   
                    foreach($res as $k => $v){
                        $data[] = DB::table('goods')->where('gid',$v->gid)->get();
                        $sum[] = $v->sum;
                    }
                //二维数组改成一位数组
                    foreach ($data as $key =>$v){
                        $new_data[]=$v[0];
                    }
            // dd($data);

                //发送至页面
                return view('/admin/orders/orders_info',[
                                    'title'=>'订单详情',
                                    'data' => $data,
                                    'tsd' =>$orders,
                                    'sum' => $sum,
                                ]);
            }else{
                return redirect('/admin/orders')->with('session','无效订单');
            }
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
