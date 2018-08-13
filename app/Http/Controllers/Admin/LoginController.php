<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use DB;
use Hash;



class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('admin.login',['title'=>'后台登录']);
    }

    //	
    public function dologin(Request $request)
    {
    	// dd($request->all());测试能否接收数据
    	
    	//表单验证 
    	
    	// 判断用户名
    	$uname = $request->input('username');

    	$res = DB::table('admins')->where('username',$uname)->first();


    	 // dd($res->password);

    	if(!$res){
    		// echo 0;测试代码1
    		return back()->with('error','用户名错误');
    	}
    	 
        // 判断验证码
        
        $code = $request->input('code');
        if(strtolower($code) != session('code')){
            return back()->with('error','验证码错误');
        } 

    	// 判断密码
    	$pass = $request->input('password');

    	if(Hash::check($pass,$res->password)){

    		session(['admins'=>$res]);

            return redirect('/admin');

    	}else{

           return back()->with('error','密码错误');
        }

    
    	//存储session信息，中间件使用
    	// session(['username'=>$res->username]);
    	// return redirect('/admin');
    	
    }

    //验证码
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 36, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        // \Session::flash('code', $phrase);

        session(['code'=>$phrase]);

        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function logout()
    {
    	session(['admins'=>null]);
    	return redirect('/admin/login');
    }
    
}