<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\orders\Details;

//================张大仙订单详情控制器===============
class OrdersController extends Controller
{
    //===============订单展示==================
    public function index(Request $request)
    {   
        // 获取当前页码
        $page = $request->input('page');
        // 显示页码
        if(!$page){$page = 1;}
        // 查询数据
        $orders = DB::table('orders')
        ->where(function($query) use($request){
                    //检测关键字
                    $oid = $request->input('oid');
                    $otel = $request->input('otel');
                    //如果用户名不为空
                    if(!empty($oid)) {
                        $query->where('oid','like','%'.$oid.'%');
                    }
                    //如果邮箱不为空
                    if(!empty($otel)) {
                        $query->where('otel','like','%'.$otel.'%');
                    }
                })->paginate(20);
        // 返回信息到页面
        return view('/admin/orders/orders_list',[
            'orders'=>$orders,
            'page'=>$page,
            'title'=>'订单详情',
            'request'=>$request,
        ]);      
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
    public function edit(Request $request,$id)
    {   
        //获取操作页面
        $page = $request->input('page');
        //获取ID
        $orders = DB::table('orders')->where('oid',$id)->get();
        //返回修改页面
        return view('/admin/orders/orders_edit',[
            'orders'=>$orders,
            'title'=>'订单修改',
            'page' => $page,
        ]);
    }

    //===============发送修改数据==================
    public function update(Request $request, $id)
    {      
        //获取操作页面
        $page = $request->input('page');
        //获取订单数据
        $data = $request -> except('_token','_method','page');
        //写入数据库
             $res = DB::table('orders')->where('oid',$id)->update($data);          
        //返回提示信息
        if($res){
            return redirect('/admin/orders?page='.$page)->with('session','修改成功');
        }else {
            return back()->with('session','修改失败')->withInput();
        }
    }

    //===============删除订单==================
    public function destroy($id)
    {   
        //获取ID,删除数据
        $res = DB::table('orders')->where('oid',$id)->delete();
        $res = $id;
            //返回提示信息
            if($res){
                return back()->with('session','删除成功');
            }else {
                return back()->with('session','删除失败');
                
            }
    }

    //===================订单详情===================
    public function info(Request $request,$id)
    {       
        //接收时间,状态
            $orders = $request -> input();
            $orders['oid'] = $id;
        //查询订单中的商品ID
            $res = DB::table('details')->where('orders_id',$id)->select('goods_id','dsum')->get();
        //判断订单是否有效
            if( count($res) ){
                //查询商品信息   
                    foreach($res as $k => $v){
                        $data[] = Details::find($v->goods_id)->goods()->get(['gname','price', 'gpic','color','size']);                 
                        $sum[] = $v->dsum;
                    }
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


}
