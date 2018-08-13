@extends('/common/admin/header')

@section('title','-类别添加')

@section('content')

<div class="page-content">
          <div class="content">
           <div class="layui-form-item" style="font-size:30px;text-align:center;">添加商品类别</div>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="/cate" method="post">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>上级分类
                    </label>
                    <div class="layui-input-inline">
                        <select name="pid" class="layui-input">
                            <option value="0">--顶级分类--</option>
                                @foreach($data as $k=>$v)
                                <option value="{{$v->cid}}">{{$v->cname}}</option>
                                @endforeach
                            <!-- <option value="1">--子级分类--</option> -->
                        </select>
                    </div>
                   
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>类别名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="cname" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        确认添加
                    </button>  
                </div>
                {{ csrf_field() }}
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>

@endsection