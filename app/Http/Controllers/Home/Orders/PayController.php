<?php

namespace App\Http\Controllers\Home\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('addr')->get();
        return view('home/orders/orders_pay',['data'=>$data]);
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

    //添加收货信息
    public function addr(Request $request)
    {   
        session(['hid'=>2]);
        $data = $request -> input();

        $addr = DB::table('addr')->where('hid',session('hid'))->get();

        if( count($addr) < 6 ){
                if( empty($data['aname']) ){
                return back() -> with('session','收货人不能为空');
            }   

            if( empty($data['atol']) ){
                return back() -> with('session','收货手机号不能为空');
            }  

            if( empty($data['info']) ){
                return back() -> with('session','收货地址不能为空');
            } 

            $data['addr'] = $data['sheng'].' '.$data['shi'].$data['xian'].$data['info'];
            $data['hid'] = session('hid');
            unset($data['sheng'],$data['shi'],$data['xian'],$data['info']);        
        

            $res = DB::table('addr')->insert($data);
            if($res){
                return redirect('/home/orderspay');
            }
        }else{
             return back() -> with('session','收货地址不可超过六个');
        }

       
        
    }

    //删除收货信息
    public function deladdr($id)
    {

        $res = DB::table('addr')->where('aid',$id)->delete();

        if($res){
            return redirect('home/orderspay')->with('session','删除成功');
        }else{
            return back()->with('session','删除失败');
        }


    }


    public function cart()
    {
        return view('home/orders/orders_cart');
    }
}
