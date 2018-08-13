<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //通过模型查询类别数据，where条件中是输入的类别名称匹配，
        $data = Cate::select(DB::raw('*,concat(path,cid) as paths'))
        ->where('cname','like','%'.$request->input('cname').'%')
        ->orderBy('paths')
        ->paginate($request->input('num',10));//分页显示数据

        foreach ($data as $k => $v) {
            //定义缩进的变量，分级别使用
            $len = substr_count($v->path,',')-1;
            //根据不同级别选择缩进不同的空格
            $v->cname=str_repeat('&nbsp;',$len*5).$v->cname;
        }
        //返回视图页面并分配数据
        return view('admin.cate.cate_list',['data'=>$data,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询数据库中的所有类别，展示在页面上
        $data = Cate::select(DB::raw('*,concat(path,cid) as paths'))
        ->orderBy('paths')->
        get();

        foreach ($data as $k => $v) {
            //同上
            $len = substr_count($v->path,',')-1;
            //同上
            $v->cname=str_repeat('&nbsp;',$len*5).$v->cname;
        }
        //将数据分配给视图页面
        return view('admin.cate.cate_add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接受创建商品类别数据，去除掉crsf的验证
        $res = $request->except('_token');
        //判断如果商品类别的等级为0, 该等级为最高级
        if($request->input('pid') == '0'){
            $res['path'] = '0,';
        } else {
            //不是顶级分类，查询一条数据，是为了获得类别的cid和path数据，
            $data = Cate::where('cid',$request->input('pid'))->first();
            //将非顶级分类的类别名称的存储方式拼接好，比如是第五个数据，path就是0,5,
            $res['path'] = $data->path.$data->cid.',';
        }
        try{
            //将$res的数据写入数据库存储
            $rs = Cate::create($res);
            if($rs){
                return redirect('/cate');
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
        $res = Cate::where('cid',$id)->first();
        // dd($res);
        $info = Cate::select(DB::raw('*,concat(path,cid) as paths'))
        ->orderBy('paths')->
        get();

        foreach ($info as $k => $v) {
            // dump($value->catename);
            $len = substr_count($v->path,',')-1;
        //     //根据path
            $v->cname=str_repeat('&nbsp;',$len*4).$v->cname;
        }

        return view('admin.cate.cate_edit',['res'=>$res,'info'=>$info]);
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
        $data = $request->except('_method','_token');
        
        try{
            $res = Cate::where('cid',$id)->update($data);
            if($res){
                return redirect('/cate');
            }
        } catch(\Exception $e){
            return back();
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
         //根据id 查找自己底下有没有其他的类别
        $res = Cate::where('cid',$id)->first();
        $path = $res->path.$res->cid.',';  //0,1,5,
        //如果找到底下有其他的类别 删除
        $data = Cate::where('path','like','%'.$path.'%')->delete();

         try{ 
            //还要根据id删除自己
            $rs = Cate::where('cid',$id)->delete();
            if($rs){
                return redirect('/cate');
            }
        }catch(\Exception $e){
            return back();
        }
    }

}
