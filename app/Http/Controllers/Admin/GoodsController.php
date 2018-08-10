<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use DB;
use Config;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;



class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //根据商品写入的顺序正序排列展示商品
        $data = Goods::orderBy('gid','asc')
            ->where(function($query) use($request){
                //检测商品查询的名称和商品价格
                $gname = $request->input('gname');
                $price = $request->input('price');
               
                //如果输入商品名称不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
                //如果输入商品价格不为空
                if(!empty($price)) {
                    $query->where('price','like','%'.$price.'%');
                }
            })
        //根据以上条件显示每页3调数据
        ->paginate($request->input('num', 3));
        //返回页面，分配数据到页面
        return view('admin.goods.goods_list',['data'=>$data,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询分类的数据                                  as 定义别名
        $data = Cate::select(DB::raw('*,concat(path,cid) as paths'))
        ->orderBy('paths')->
        get();
        //循环遍历分类数据
        foreach ($data as $k => $v){
            //根据path字段中的逗号，定义一个按照级别缩进的长度变量
            $len = substr_count($v->path,',')-1;
            //根据不同级别输出不同的长度的空格，以展示类别
            $v->cname=str_repeat('&nbsp;',$len*5).$v->cname;
        }
        //返回视图页面，分配数据
        return view('admin.goods.goods_add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收表单创建商品信息发送的数据
        $data = $request->except('_token','smgpic');
        //用create的方法将信息写入数据库
        $result = Goods::create($data);
        //创建的新商品数据的gid就是图片表里关联的s_gid
        $s_gid = $result->gid;
/******************************************************************************************/        
        //图片上传
        if($request->hasFile('smgpic')){
            //上传商品副图，从整个表单中获取数据
            $smgpic = $request->file('smgpic');
            //定义二维数组的外部数组（全局），商品的图片功能部分是二维数组
            $arr = [];
            foreach($smgpic as $k => $v){
                //接收商品副图数据的数组，内部的一维数组
                $gpicarr= [];
                //根据商品图片s_gid的字段关联商品主表的gid加入数组
                $gpicarr['s_gid'] = $s_gid;
//////////////////////////////////////////////////////////////////////////////////////////
                //图片上传三步骤：1 重新定义图片按名字
                $name = str_random(10).time();
                //图片上传三步骤：2 获取图片名称后缀
                $suffix = $v->getClientOriginalExtension();
                //图片上传三步骤： 移动图片到指定路径内
                $v->move(Config::get('webconfig.goodsimg'),$name.'.'.$suffix);
//////////////////////////////////////////////////////////////////////////////////////////
                //将商品副图图片放置到副图数组中
                $gpicarr['smgpic'] = '/uploads/goodsimg/'.$name.'.'.$suffix;
                //将整个商品附图数据添加至全局数组，后期遍历格式$arr[ $gpicarr[],$gpicarr[]];
                $arr[] = $gpicarr;
            }          
        }
/******************************************************************************************/
        try{  
            //添加数据的时候  //模型关系   //1对多增加数据
            $res = $result->goodstospic()->createMany($arr);
            if($res){
                return redirect('/goods');
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
        //该方法就是为了展示特殊资源的，比如图片、视频、音乐等
        //根据商品主表的gid关联图片的s_gid查询图片显示在编辑的页面上
        $smgpic = Goodsimg::where('s_gid',$id)->first();
        //删除要修改的本地存储的原图片
        $result = unlink('.'.$smgpic->smgpic);
        if(!$result){
            return back();
        }

        try{
            //根据要修改的商品主表的gid，关联图片的s_gid，删除数据库中的存储的数据路径信息
            $data = Goodsimg::where('s_gid',$id)->delete();
        }catch(\Exception $e){
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询商品分类，获取商品类别表的数据
        $info = Cate::select(DB::raw('*,concat(path,cid) as paths'))
        ->orderBy('paths')->
        get();
        //将分类美化
        foreach ($info as $k => $v) {
            //按照path字段中的逗号的个数，定义一个长度变量
            $len = substr_count($v->path,',')-1;
            //根据类名级别选择缩进的空格个数
            $v->cname=str_repeat('&nbsp;',$len*5).$v->cname;
        }

        //查询要修改的商品数据，根据传参和gid字段值匹配，展示商品的主表信息
        $res = Goods::where('gid',$id)->first();
        //查询要修改的商品图片，根据传参和s_gid字段匹配，展示商品图片的信息
        $smgpics = Goodsimg::where('s_gid',$id)->get();
        //返回视图页面，将数据发送到页面遍历，同时显示默认信息
        return view('admin.goods.goods_edit',['res'=>$res,'info'=>$info,'smgpics'=>$smgpics]);
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
        //将修改的数据发送到该方法中，去除csrf的验证字段，为了将信息分开发送，先把图片分离出来
        $res = $request->except('_token','smgpic','_method');
        //添加单纯的商品数据到goods商品表
        Goods::where('gid',$id)->update($res);
        //查询修改后新增的商品数据，根据该商品的gid匹配关联图片的关联字段，使两者相等
        $result = Goods::where('gid',$id)->first();
        $s_gid = $result->gid;
//****************************************************************************************//
        //接下来完成图片的上传功能，将图片存入图片表
        if($request->hasFile('smgpic')){
            //请求图片：获取更改后的商品图片数据
            $smgpic = $request->file('smgpic');
            //定义二维数组的外部数组（全局），商品的图片功能是使用二维数组完成前台遍历的
            $arr = [];
            foreach($smgpic as $k => $v){
                //接收商品副图数据的数组，内部的一维数组
                $gpicarr= [];
                //将商品副图关联主表id加入新数组
                $gpicarr['s_gid'] = $s_gid;
//////////////////////////////////////////////////////////////////////////////////////////
                //图片上传三步骤：1 重新定义图片按名字
                $name = str_random(10).time();
                //图片上传三步骤：2 获取图片名称后缀
                $suffix = $v->getClientOriginalExtension();
                //图片上传三步骤： 移动图片到指定路径内
                $v->move(Config::get('webconfig.goodsimg'),$name.'.'.$suffix);
//////////////////////////////////////////////////////////////////////////////////////////
                //将商品副图图片放置到副图数组中
                $gpicarr['smgpic'] = '/uploads/goodsimg/'.$name.'.'.$suffix;
                //将整个商品图片数据（关联id和图片路径）添加至全局数组，后期遍历格式$arr[ $gpicarr[],$gpicarr[]];
                $arr[] = $gpicarr;
            }          
        }
//****************************************************************************************//
        try{
            //将图片的数组数据写入数据库，因为在前台js删除原有的数据，这里等于重新写入
            $data = DB::table('gpic')->insert($arr);      
            if($data){
                return redirect('/goods');
            }
        }catch(\Exception $e){
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
        //根据传参的主表gid，查询关联的图片表数据，然后拿到所有该商品关联的图片
        $res = Goodsimg::where('s_gid',$id)->get();
        foreach($res as $k => $v){
            //循环遍历删除本地存储的关联图片，返回结果
            $rs = unlink('.'.$v->smgpic);
        }

        if($rs){
            //删除图片之后，再将传参和商品主表gid进行条件判定，删除主表的数据库商品数据
            $gs = Goods::where('gid',$id)->delete();
            //同时删除图片表的数据库路径数据
            $data =Goodsimg::where('s_gid',$id)->delete();
        }    
            if($data && $gs){
                return redirect('/goods');
            }
    }
}
