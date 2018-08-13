<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

//================张大仙订单详情控制器===============
class OrdersController extends Controller
{
    //===============订单展示==================
    public function index(Request $request)
    {   
        // 获取页码
        $page = $request->input('page');
        // 显示页码
        if(!$page){$page = 1;}
        $orders = DB::table('orders')->paginate(20);
        // dd($orders);

        return view('/admin/orders_list',['orders'=>$orders,'page'=>$page,'title'=>'订单详情']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

    //===============修改订单==================
    public function edit($id)
    {
        //获取ID
        $orders = DB::table('orders')->where('oid',$id)->get();
        //返回修改页面
        return view('/admin/orders_edit',['orders'=>$orders,'title'=>'订单修改']);
    }

    //===============发送修改数据==================
    public function update(Request $request, $id)
    {
        //获取订单数据
        $data = $request -> except('_token','_method');
        //写入数据库
             $res = DB::table('orders')->where('oid',$id)->update($data);          
        //返回提示信息
        if($res){
            return redirect('/admin/orders')->with('session','修改成功');
        }else {
            return back()->with('session','修改失败')->withInput();
        }
    }

    //===============删除订单==================
    public function destroy($id)
    {
        //获取ID,删除数据
        // $res = DB::table('orders')->where('oid',$id)->delete();
        $res = $id;
            //返回提示信息
            if($res){
                return redirect('/admin/orders')->with('session','删除成功');
            }else {
                return redirect('/admin/orders')->with('session','删除失败');
                
            }
    }


}
