@extends('/admin/index')
<link rel="stylesheet" type="text/css" href="/houtai/css/sweetalert.css">

@section('content')
<script src="/houtai/js/sweetalert.min.js"></script>
<script src="/houtai/js/sweetalert-dev.js"></script>
    <legend style="font-size: 40px;text-align: center;">修改订单信息</legend>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;"></fieldset>
    @if( session('session') )
        <script>
            var session =' {{ session('session') }}' ;

            swal(session);
        </script>
    @endif
    <!-- 表单开始 -->
    <form class="layui-form" action="/admin/orders/{{$orders[0]->oid}}?page={{$page}}" method="post" style="padding-left:35%;">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="layui-form-item">
            <label for="level-id" class="layui-form-label">订单号</label>
            <div class="layui-input-inline">
                <input disabled type="text" id="level-id" name="oid" value="{{$orders[0]->oid}}" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux" style="color: red;">
                <span class="x-red">*</span>订单号不可修改
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-name" class="layui-form-label">收货人</label>
            <div class="layui-input-inline">
                <input type="text" id="level-name" name="link_man" lay-verify="required"
                autocomplete="off" value="{{$orders[0]->link_man}}" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">收货地址</label>
            <div class="layui-input-inline">
                <input type="text" id="level-kiss" name="addr" value="{{$orders[0]->addr}}" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">收货人电话</label>
            <div class="layui-input-inline">
                <input type="text" id="level-kiss" name="otel" value="{{$orders[0]->otel}}" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">邮编</label>
            <div class="layui-input-inline">
                <input type="text" id="level-kiss" name="mail" value="{{$orders[0]->mail}}" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">订单状态</label>
            <div class="layui-input-inline">
                <input disabled type="text" id="level-kiss" name="status" value="@if( $orders[0]->status == 0 )待发货@elseif( $orders[0]->status == 1 )代收货@elseif( $orders[0]->status == 2 )交易完成@elseif( $orders[0]->status == 3 )订单取消@endif"
                lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux" style="color: red;">
                <span class="x-red">*</span>订单状态不可修改
            </div>
        </div>
        <div class="layui-form-item">
            <label for="level-kiss" class="layui-form-label">买家留言</label>
            <div class="layui-input-inline">
                <input type="text" id="level-kiss" name="msg" value="{{$orders[0]->msg}}" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-filter="save" lay-submit="">
                提交修改
            </button>
        </div>
    </form>

@endsection