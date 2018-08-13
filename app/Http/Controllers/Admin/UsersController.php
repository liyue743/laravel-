<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Users;
use App\Model\Admin\Usersinfo;
use DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
         
        $res = Users::with('info')->orderby('status','id')->where(function($query) use ($req){

            $status = $req->input('status');

            $uname = $req->input('uname');

            if(!empty($uname)){

                $query->where('uname','like','%'.$uname.'%');
            }

            if($status=='0'){

                $query->where('status',0);

            }
            if($status=='1'){

                $query->where('status',1);
            }


        })->paginate(10);
    
                
        return view('admin/users/users_list',['res'=>$res,'title'=>'用户展示页']);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/users_add',['title'=>'创建用户页']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {     
        //保存用户数据
        $data = $req->except('_token','repwd');

        $data['upwd'] = md5($req->get('upwd'));

        $data['create_at'] = time();          
                     
         try{

            //保存数据到主表返回存入的ID
           $id = DB::table('users')->insertGetId($data);

           //把关联ID存入副表
           $res = DB::table('users_info')->insert(['users_id'=>$id]);

           if($res){

            return redirect('/users')->with('success','创建用户成功!');

            }
        }catch(\Exception $e){

            return back();
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
        //修改页面
        $res = Users::with('info')->where('id',$id)->first();

        return view('admin/users/users_edit',['res'=>$res,'title'=>'用户编辑页']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,$id)
    {
        //修改状态
        
        //接收ajax传值       
            $status = $req->get('status');

        
            if($status == 1){
            
                 $res = Users::where('id',$id)->update(['status'=>0]);

            }elseif($status == 0){

                $res = Users::where('id',$id)->update(['status'=>1]);
            }

           
           return $status;
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = $req->except('_token','_method','uname','utel');
      
        //用户头像上传
        if($req->hasFile('profile')){
            //修改名字
            $name =date('Ymd',time()).rand(1111,9999);
            //获取后缀名
            $profix = $req->file('profile')->getClientOriginalExtension();
            //移动
            $req->file('profile')->move('./uploads/users/',$name.'.'.$profix);
            
            $data['profile'] = '/uploads/users/'.$name.'.'.$profix;
        }

       
        try{
        
            $msg= Users::where('id',$id)->update(['utel'=>$req->input('utel')]);

           $res = Usersinfo::where('users_id',$id)->update($data);

           if($res){

            return redirect('/users')->with('success','修改成功!');

           }else{

            return redirect('/users')->with('success','修改成功!');
           }
       
        }catch (\Exception $e){

            return  back()->with('error','修改失败!');
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

        try{

            $re = Users::where('id',$id)->delete();

            $res =Usersinfo::where('users_id',$id)->delete();
            
            //dd($res);

            if($re && $res){

                return  redirect('/users')->with('success','删除成功!');
            }
        }catch(\Exception $e){

                return  back()->with('error','删除失败!');
        }
        
       
    }

}