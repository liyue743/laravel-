<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = DB::table('admins')->get();
        return view('admin.admins.index',['title'=>'管理员列表','res'=>$res]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.add',['title'=>'管理员添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //接收表单提交的信息
        $res = $request->except('_token','repass');



        //hash加密
        $res['password'] = Hash::make($request->input('password'));

        //保存到数据表中
        $data = DB::table('admins')->insert($res);

        if($data){
            return redirect('/admins');
        }else{
            return redirect('/admins/create');
        }
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
        
      
        $res = DB::table('admins')->where('id',$id)->first();


        return view('admin.admins.edit',['title'=>'用户的修改页面','res'=>$res]);
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
        $res = $request-> except('_token','_method');

        $data = DB::table('admins')->where('id',$id)->update($res);

        if($data){
            return redirect('/admins')->with('success','修改成功');
        }else{
            return back ()->with('error','修改失败');
        }
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
        $res = DB::table('admins')->where('id',$id)->delete();
        if($res){
            return redirect('/admins');
        }else{
            return redirect('/admins');
        }
    }
}
