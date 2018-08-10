@extends('/common/admin/header')

@section('title','-商品信息修改')

<script type="text/javascript" charset="utf-8" src="/houtai/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/houtai/ueditor/ueditor.all.min.js"> </script>

@section('content')

<div class="page-content" style="">
          <div class="content">
           <div class="layui-form-item" style="font-size:30px;text-align:center;">修改商品信息</div>
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="/goods/{{$res->gid}}" method="post" enctype='multipart/form-data'>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>类别
                    </label>
                    <div class="layui-input-inline">
                        <select name="cate_cid" class="layui-input">
                            <option value="0">--顶级分类--</option>
                            @foreach($info as $k => $v)
                            <option value="{{$v->cid}}" @if($v->cid == $res->cate_cid) selected @endif>{{$v->cname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="gname" required="" lay-verify="nikename" autocomplete="off" class="layui-input" value="{{$res->gname}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品库存
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="stock" required="" lay-verify="nikename" autocomplete="off" class="layui-input" value="{{$res->stock}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品定价
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="price" required="" lay-verify="nikename" autocomplete="off" class="layui-input" value="{{$res->price}}">
                    </div>
                </div><div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品颜色
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="color" required="" lay-verify="nikename" autocomplete="off" class="layui-input" value="{{$res->color}}">
                    </div>
                </div><div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>生产厂家
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="company" required="" lay-verify="nikename" autocomplete="off" class="layui-input" value="{{$res->company}}">
                    </div>
                </div><div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>尺码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="size" required="" lay-verify="nikename" autocomplete="off" class="layui-input" value="{{$res->size}}">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品描述
                    </label>
                    <div class="layui-input-inline">
                        <script id="editor" name="gdesc" type="text/plain" style="width:900px;height:500px;">{!!$res->gdesc!!}</script>
                    </div>
                </div>
                <script>   
                    var ue = UE.getEditor('editor');   
                </script>
                
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品副图
                    </label>
                        @foreach($smgpics as $k => $v)
                            <img src="{{$v->smgpic}}" alt="" gid='{{$v->s_gid}}' class='dimgs' width='160px'>
                        @endforeach
                    <div class="layui-input-inline">
                        <input id="file" name="smgpic[]" type="file" multiple style="width:150px;">
                    </div>
                </div>
                <script>  
  
                    $('.dimgs').click(function(){
                        //获取id
                        var gid = $(this).attr('gid');
                        var igs = $(this);
                        $.get('/goods/'+gid,{},function(data){
                            if(data == '1'){
                                igs.remove();
                            } 
                        })

                    })
                </script>
               
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        确认修改
                    </button>
            <!-- <input  class="layui-btn" onclick="history.go(-1)" value="返回" type="button"> -->
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
</div>

@endsection

@section('js')



@endsection

