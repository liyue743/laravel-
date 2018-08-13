@extends('/common/admin/header')

@section('title','-商品添加')

<script type="text/javascript" charset="utf-8" src="/houtai/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/houtai/ueditor/ueditor.all.min.js"> </script>

@section('content')

<div class="page-content" style="">
          <div class="content">
           <div class="layui-form-item" style="font-size:30px;text-align:center;">添加商品</div>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="/goods" method="post" enctype='multipart/form-data'>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>类别
                    </label>
                    <div class="layui-input-inline">
                        <select name="cate_cid" class="layui-input">
                            <option value="0">--顶级分类--</option>
                            @foreach($data as $k => $v)
                            <option value="{{$v->cid}}">{{$v->cname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="gname" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品库存
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="stock" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品定价
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="price" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                    </div>
                </div><div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品颜色
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="color" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                    </div>
                </div><div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>生产厂家
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="company" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                    </div>
                </div><div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>尺码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="size" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                    </div>
                </div>

               
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品描述
                    </label>
                    <div class="layui-input-inline">
                        <script id="editor" name="gdesc" type="text/plain" style="width:900px;height:500px;"></script>
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品副图
                    </label>
                    <div class="layui-input-inline">
                        <input id="file" name="smgpic[]" type="file" multiple style="width:900px;">
                    </div>
                </div>
                <script>   
                    var ue = UE.getEditor('editor');   
                </script>

                <div class="">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品状态
                    </label>
                    <div class="layui-input-inline">
                        上架<input name="status" type="radio" value="0" checked style="width:900px;">
                        下架<input name="status" type="radio" value="1" style="width:900px;">
                        活动中<input name="status" type="radio" value="2" style="width:900px;">
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        {{csrf_field()}}
                        新增商品
                    </button>
            <!-- <input  class="layui-btn" onclick="history.go(-1)" value="返回" type="button"> -->
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
            <!-- 开始：判定是否删除已选定的图片 -->
            <div class="aui-mask aui-works-mask">
                <div class="aui-mask-content">
                    <p class="aui-delete-text">确定要删除你上传的资料？</p>
                    <p class="aui-check-text">
                        <span class="aui-delete aui-accept-ok">确定</span>
                        <span class="aui-accept-no">取消</span>
                    </p>
                </div>
            </div>
            <!-- 结束：判定是否删除已选定的图片 -->
          </div>
</div>

@endsection

