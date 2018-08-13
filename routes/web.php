<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//前台主页
Route::get('/', function () {
    return view('home/index');
});
//前台个人信息路由组
Route::group([],function(){
	//个人中心主页
	Route::any('/myself','Home\SelfController@index');
	//个人信息表单页
	Route::any('/selfinfo','Home\SelfController@info');
	//修改个人信息
	Route::post('/selfinfo/update/{id}','Home\selfController@info_update');
	//安全中心
	Route::any('/safety','Home\SelfController@safe');
	//修改用户密码页
	Route::any('/password','Home\SelfController@pass');
	//地址管理
	Route::any('/addr','Home\SelfController@addr');

});


/**************liyue网站后台***************/
Route::group(['middleware'=>'login'],function(){

	Route::resource('/admins','Admin\AdminsController');//管理员
	Route::get('/admin','Admin\AdminController@index');//后台的首页
});

Route::any('admin/login','Admin\LoginController@login');//后台登录
Route::any('admin/dologin','Admin\LoginController@dologin');
Route::any('admin/captcha','Admin\LoginController@captcha');
Route::any('admin/loginout','Admin\LoginController@loginout');

/*******************************************/

/*************liyue网站前台*****************/

Route::any('home/login','Home\LoginController@login');//前台登录页面
Route::any('home/dologin','Home\LoginController@dologin');//前台用户登录
Route::any('home/loginout','Home\LoginController@loginout');//前台用户退出
Route::any('home/register','Home\RegisterController@regist');//前台注册

/******************************************/



/*************huanghuan   luyou******************/	
Route::group(['middleware'=>'login'],function(){
	
	Route::get('/admin/{id}/status','Admin\AdminController@status');//商品上架下架

	Route::resource('/cate','Admin\CateController');//商品类别的整体增删改查
	Route::resource('/goods','Admin\GoodsController');//商品整体的增删改查
});
/*************huanghuan   luyou******************/



/*****************何其威——用户**********************/
//用户管理理由组
Route::group(['middleware'=>'login'],function() {
	//用户停用站
	Route::get('/users/dels',function() {
		return view('admin/users/users_dels');
	});
	//用户等级路由
	Route::get('/users/level',function() {
		return view('admin/users/users_level');
	});
	//修改密码页
	Route::get('/users/pass/{id}','Admin\UsersinfoController@pass');
	//ajax验证用户名
	Route::any('/checkuname','Admin\AjaxController@checkuname');
	//验证密码
	Route::post('/users/dopass/{id}','Admin\UsersinfoController@dopass');
	//用户个人信息展示
	Route::any('/users/show/{id}','Admin\UsersinfoController@show');
	//Ajax批量删除
	Route::any('/users/dels','Admin\AjaxController@delusers');
	//用户资源路由
	Route::resource('/users','Admin\UsersController');
});

Route::group(['middleware'=>'login'],function() {
	//商品评论资源路由
	Route::resource('/commonts','Admin\CommontsController');
	

});










//=================张大仙====================//
//============后台=================
Route::resource('/admin/orders','Admin\OrdersController');				//订单资源路由	
Route::any('/orders/info/{id}','Admin\OrdersinfoController@index'); 	//订单详情路由
Route::get('/fahuo','Admin\PublicController@fahuo');					//发货AJAX传值	
//============前台=================
Route::resource('/home/orders','Home\Orders\OrdersController');		//前台订单资源路由
Route::resource('/home/orderspay','Home\Orders\PayController');		//订单结算资源路由
Route::any('/home/ordersaddr','Home\Orders\PayController@addr');		//收货地址路由
Route::any('/home/deladdr/{id}','Home\Orders\PayController@deladdr');	//删除地址路由
Route::any('home/cart','Home\Orders\PayController@cart');				//购物车地址路由
//=================张大仙====================//





