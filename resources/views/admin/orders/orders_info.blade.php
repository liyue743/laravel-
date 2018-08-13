@extends('/admin/index')
<link rel="stylesheet" type="text/css" href="/houtai/css/sweetalert.css">
<style>
    img{
        height: 100px;
    }
</style>
@section('content')
<script src="/houtai/js/sweetalert.min.js"></script>
<script src="/houtai/js/sweetalert-dev.js"></script>
	   	<legend style="font-size: 40px;text-align: center;">订单详情信息</legend>
	    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;"></fieldset>
<table class="layui-table">
        <thead>
                    <tr>
                        <th>订单号：</th> 
                        <td>{{ $tsd["oid"] }}</td>
                        <th>订单时间：</th>
                        <td>{{ date('Y-m-d H:i:s',$tsd["t"] )}}</td> 
                        <th>订单状态：</th>
                        <td>@if( $tsd["s"] == 0 )未发货
                          @elseif( $tsd["s"] == 1 )待收货
                          @elseif( $tsd["s"] == 2 )交易完成
                          @elseif( $tsd["s"] == 3 )订单取消
                                    @endif</td>
                    </tr>        
        </thead>
</table>
<table class="layui-table">
        <!-- 列表开始 -->
                <thead>
                    <tr>
                        <th>商品名称</th>
                        <th>商品单价</th>
                        <th>商品颜色</th>                  
                        <th>商品尺寸</th> 
                        <th>商品数量</th>      
                        <th>总价</th>      
                        <th>商品图片</th>                  
                        <!-- <th>操作</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $v)
                    <tr>
                        <td>{{$v[0]->gname}}</td>
                        <td>{{$v[0]->price}}</td>             
                        <td>{{$v[0]->color}}</td>
                        <td>{{$v[0]->size}}</td>
                        <td>{{$sum[$k]}}</td>
                        <td>{{$sum[$k] * $v[0]->price}}</td>
                        <td>{!!$v[0]->gdesc!!}</td>
                       <!--  <td class="td-manage">
                            <a title="删除" href="javascript:;" onclick="view_del(this,'1')" 
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>

@endsection