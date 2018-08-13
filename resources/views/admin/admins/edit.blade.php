@extends('admin.index')

@section('title',$title)

@section('content')
 <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

            <form  action="/admins/{{$res->id}}" method='post' enctype='multipart/form-data' class="layui-form" >
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>用户名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="username" value="{{$res->username}}"required="" lay-verify="nikename"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>将会成为您唯一的登入名
                    </div>
                </div>

            
                <div class="layui-form-item">
                    <label class="layui-form-label">*性别</label>
                    <div class="layui-input-block">
                        <input type="radio"  name="sex" value="m" title="男"  @if($res->sex == 'm') checked @endif>
                       
                        <input type="radio"  name="sex" value="w" title="女"  @if($res->sex == 'w') checked @endif>
                         
                       
                     </div>
                </div>     
        
               <!--  <div class="layui-form-item">
                    <label for="L_password" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_password" name="password" value="{{$res->password}}"required="" lay-verify="password"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div> -->
 
                <!-- <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>确认密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="repass" required="" value=""lay-verify="repass"
                        autocomplete="off" class="layui-input">
                    </div>
                </div> -->

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" required="" value="{{$res->email}}"lay-verify="email"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_phone" class="layui-form-label">
                        <span class="x-red">*</span>手机号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_phone" name="phone" required="" value="{{$res->phone}}"lay-verify="phone"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_addr" class="layui-form-label">
                        <span class="x-red">*</span>地址
                    </label>
                    <div class="layui-input-inline">
                        <input type="addr" id="L_addr" name="addr" required="" value="{{$res->addr}}"lay-verify="addr"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">

                    <label for="L_repass" class="layui-form-label">
                    </label>
                    {{csrf_field()}}

                    {{method_field('PUT')}}

                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        提交
                    </button>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->

@endsection


           
     
