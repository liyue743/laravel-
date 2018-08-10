<!DOCTYPE html>
<html lang="en">
@extends('admin/index')
@section('content')

    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form action="/users" method="POST" class="layui-form"> 
            {{ csrf_field()}}
             <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>用户名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_uname" name="uname" required="" lay-verify="nikename"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux" style="font-size:10px;font-weight:20px;">
                        * 将会成为您唯一的登入名
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_phone" class="layui-form-label">
                        <span class="x-red">*手机号</span>
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_phone" name="utel" required=""   class="layui-input">
                    </div>
   
                </div>
             
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="upwd" required="" 
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>确认密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="repwd" required="" 
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
 
                    </div>

                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button class="layui-btn" lay-filter="add" lay-submit="">
                        添加
                    </button>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <script>

        $('#L_uname').blur(function(){

            var uname = $(this).val();

            var reg = /^\w{4,16}$/;

            var inps = $(this);

            if(!reg.test(uname)){

                $(this).parent().next().text(' *用户名格式不正确').css('color','red');

                
            } else {

                //发送ajax
                $.get('/checkuname',{uname:uname},function(data){

                        

                    if(data == '1'){

                        inps.parent().next().html(' *用户名已存在').css({color:'red'});


                    } else {

                        inps.parent().next().html('√  可以使用!').css('color','greenyellow');

                     
                    }


                })

            }
         //密码
            


        $('input[name=upwd]').blur(function(){

         

            var pass = $(this).val();

            var reg = /^\S{6,16}$/;

            if(!reg.test(pass)){

                $(this).parent().next().text(' *密码格式不正确').css('color','red');

  

            } else {

                $(this).parent().next().text(' √ ').css('color','greenyellow');


            }
        })


        $('#L_repass').blur(function(){

            var repass = $(this).val();

            var pass = $('#L_pass').val();

            if(repass != pass ){

                $(this).parent().next().text(' *两次密码不一致').css('color','red');



            } else {

                $(this).parent().next().text(' √').css('color','greenyellow');

            }

        })

        //手机号
        $('#L_phone').blur(function(){

            var phone = $(this).val();

            var reg = /^1[3456789]\d{9}$/;

            if(!reg.test(phone)){

                $(this).parent().next().text(' *手机号不正确').css('color','red');


            } else {

                $(this).parent().next().text(' √').css('color','greenyellow');

            }

        })
                     
    });
        
    </script>
@endsection
