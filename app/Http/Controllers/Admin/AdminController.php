<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Cate;

class AdminController extends Controller
{
    public function index()
    {
        //展示后台首页的视图
    	return view('admin.index');
    }

    //商品的后台无限分类功能，前台遍历需要，用类名到前台遍历
    // static public function getCateMessage($cates=[],$pid=0)
    // {
    //     if(empty($cates)){
    //         $cates = Cate::get();
    //     }
    //     $tmp=[];
    //     foreach($cates as $k=>$v){
    //         if($v->pid == $pid){
    //             $v->sub = self::getCateMessage($cates,$v->cid);
    //             $tmp[$v->cid]=$v;
    //         }
    //     }
    //     return $tmp;
    // }
    public static function getCateMessage($pid)
    {
        $cate = Cate::where('pid',$pid)->get();
        $arr = [];
        foreach($cate as $k => $v){
            if($v->pid == $pid){
                $v->sub = self::getCateMessage($v->cid);
                $arr[] = $v;
            }
        }  
        return $arr;
    }
    //上架下架功能
    public function status(Request $request,$id)
    {
        //接收ajax发送的状态值，根据状态值，利用代码改变数据库的值
        $status = $request->get('status');
/*********************************************************************************/
        if($status=='0'){
            //将状态为0的数据更新为状态为1，然后展示页面上，用条件来判定输出状态，下同
            $result = Goods::where('gid',$id)->update(['status'=>1]);
        } else if($status=='1'){
            $result = Goods::where('gid',$id)->update(['status'=>0]);
        }
/*********************************************************************************/       
        return $status;
    }
}
