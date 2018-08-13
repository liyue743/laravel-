@extends('/admin/index')

<style type="text/css" media="screen">
    #orders-list th,#orders-list td{padding: 0px 0.3%}  
    #i{margin-left:80%}
	 .paginatin ul{display: inline;}
</style>
<link rel="stylesheet" type="text/css" href="/houtai/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/houtai/css/sweetalert.css">
@section('content')
<script src="/houtai/js/bootstrap.min.js"></script>
<script src="/houtai/js/sweetalert.min.js"></script>
<script src="/houtai/js/sweetalert-dev.js"></script>
<div class="page-content">
<!-- 修改删除成功跳转弹框 -->
@if( session('session') )
    <script>
        var session =' {{ session('session') }}' ;

        swal(session);
    </script>
@endif
    <div class="content">
      <legend style="color:#f9f9f9; font-size: 40px;text-align: center;">订单信息</legend>
            <!-- 搜索框 -->
            <form class="layui-form xbs" action="/admin/orders" >
                <div class="layui-form-pane" style="text-align: center;">        
                  <div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="oid"  placeholder="请输入订单号" autocomplete="off" class="layui-input" value="{{$request->input("oid")}}" >
                    </div>                    
                    <div class="layui-input-inline">
                      <input type="text" name="otel"  placeholder="收货电话" autocomplete="off" class="layui-input" value="{{$request->input("otel")}}" >
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" id="but" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <!-- 按钮介绍开始 -->
                <i id="i" class="layui-icon">&#xe609;发货</i>
                <i class="layui-icon">&#xe642;修改</i>
                <i class="layui-icon">&#xe640;删除</i>
                <i class="layui-icon">&#xe63c;详情</i>
            <!-- 订单显示框开始 -->
            <table class="layui-table" id="orders-list">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>收货人</th>
                        <th>收货地址</th>
                        <th>收货电话</th>
                        <th>邮编</th>
                        <th>商品数量</th>
                        <th>订单总价</th>
                        <th>下单时间</th>
                        <th>订单状态</th> 
                        <th>买家留言</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($orders as $k => $v)	
                    <tr>
                     	<td class="td-oid">{{ $v->oid }}</td>
                     	<td>{{ $v->link_man }}</td>
                     	<td>{{ $v->addr }}</td>
                     	<td>{{ $v->otel }}</td>
                     	<td>{{ $v->mail }}</td>
                     	<td>{{ $v->sum }}</td>
                     	<td>{{ $v->total }}</td>
                     	<td>{{ date('Y-m-d H:i:s',$v->create_at) }}</td>
                     	<td class="td-status">@if( $v->status == 0 )未发货@elseif( $v->status == 1 )待收货@elseif( $v->status == 2 )交易完成@elseif( $v->status == 3 )订单取消@endif</td>
                     	<td><!-- <div style="overflow-y:scroll;height:50px;width: 90px;"> -->{{ $v->msg }}<!-- </div> --></td>
                        <td class="td-manage">
                          	<a style="text-decoration:none" id="fahuo" onmouseover="bj(this)" onclick="fahuo(this)" href="javascript:;" title="发货">
                                <i class="layui-icon">&#xe609;</i>
                            </a>
                            <a title="编辑" onmouseover="bj(this)" href="/admin/orders/{{$v->oid}}/edit?page={{$page}}" class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <form  action="/admin/orders/{{$v->oid}}" method='post' style='display:inline'>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                               	<a title="删除" href="javascript:;" class="ml-5" style="text-decoration:none">
                               		<button type="" style="border: 0px;background-color:transparent;">
                               			<i class="layui-icon">&#xe640;</i>
                               		</button>
                               	</a>
                            </form>
                         	  <a title="详情" href="/orders/info/{{$v->oid}}?t={{$v->create_at}}&s={{$v->status}}" class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe63c;</i>
                            </a>
                        </td>
                    </tr>
				@endforeach
                </tbody>
            </table>     	
        	<!-- 分页 -->
			<div class="paginatin" style="position: absolute;">{{ $orders->links() }}</div>
			<!-- 跳转 -->
			<div style=" margin-left: 65%;position: absolute;">
		        <span style="font-size: 17px">跳转到第</span>
    				<form style="display: inline;" action="/admin/orders" method="get" accept-charset="utf-8">
    		            <input style="width: 30px; height: 25px; display: inline;" type="text" value="{{$page}}" name="page" autocomplete="off" class="layui-input">
    		            <span style="font-size: 17px">页</span> 
    		            <button style="display: inline;" class="layui-btn layui-btn-normal layui-btn-radius">GO</button>    
    				</form>
	    </div>	
  </div>
</div>  
<script> 
        //鼠标移入发货及编辑按钮
        function bj(obj){
            var zt = $(obj).parents('td').siblings('.td-status').html();
            //判断是否发货,除未发货其余状态不可操作
            if(zt != '未发货'){
                $(obj).css({cursor: 'no-drop'});
                //阻止默认行为
                $(obj).click(function() {
                  // swal("已发货不可操作");
                  return false;
                });
            }
        }
        /*用户-发货*/
        function fahuo(obj){
        	//获取状态
          var status =  $(obj).parents('td').siblings('.td-status').html();
        	//去掉空白
        	// status = status.replace(/\s*/g,"");
        	//判断状态
        	if( status == '未发货' ){
                swal({
                        title: "您确定要发货吗？",
                        text: "您确定已经发出物品吗？",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        confirmButtonText: "是的，我要发货",
                        cancelButtonText: "NO",
                        confirmButtonColor: "#ec6c62",
                        closeOnCancel: false,
                }, function(isConfirm) {
                        if(isConfirm){
                            //获取当前订单号
                            var oid =  $(obj).parents('td').siblings('.td-oid').html();
                            //发送AJAX  
                            $.ajax({ 
                                type: 'get',  
                                data: 'id=' + oid,
                                url:"/fahuo",
                                success:function(data){
                                       if(data == 1){
                                         //修改订单状态栏提示
                                        $(obj).parents('td').siblings('.td-status').html('待收货');
                                        swal("发货成功");
                                       };  
                                }
                            });
                        }else{
                            swal("已取消发货");
                        }
                });
	        }
        }
</script>


@endsection
