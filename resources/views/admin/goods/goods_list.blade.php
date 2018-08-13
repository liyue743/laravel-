@extends('/common/admin/header')
<link rel="stylesheet" href="/houtai/bootstarp/bootstrap.min.css">
@section('title','-商品列表')
<style type="text/css" media="screen">
    #gdesc_img img{
        width: 100px;
    }
</style>


@section('content')
<div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/goods" method="get">
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                   
                    
                    <div class="layui-input-inline">
                      <input type="text" name="gname"  placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline">
                      <input class="layui-input" name="price" placeholder="请输入商品价格" id="LAY_demorange_s">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="location.replace('/goods/create');"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">
                <div id="DataTables_Table_1_length">
                    
                    <select name="num" size="1" class="layui-input">
                        <option selected value="10" @if($request->input('num') == '10') selected="selected" @endif >
                            10
                        </option>
                        <option value="25" @if($request->input('num') == '15') selected="selected" @endif >
                            15
                        </option>
                        <option value="30" @if($request->input('num') == '30') selected="selected" @endif >
                            30
                        </option>
                    </select>
                
                </div>

            </span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" value=""></th>
                        <th>商品类别</th>
                        <th>商品名称</th>
                        <th>商品库存</th>
                        <th>商品价格</th>
                        <th>商品颜色</th>
                        <th>生产厂家</th>
                        <th>尺码</th>
                        <th>商品描述</th>
                        <th>状态</th>
                        <th style="text-align:center;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $v)
                    <tr>
                        <td><input type="checkbox" value="" name=""></td>
                        <td>{{$v['goodstocate']->cname}}</td>
                        <td style="width:120px;">{{$v->gname}}</td>
                        <td>{{$v->stock}}</td>
                        <td>{{$v->price}}</td>
                        <td style="width:120px;">{{$v->color}}</td>
                        <td style="width:120px;">{{$v->company}}</td>
                        <td>{{$v->size}}</td>
                        <td id="gdesc_img"><div style="overflow-y:scroll;height:100px;">{!!$v->gdesc!!}</div></td>
                        <td class="td-status">
                            @if($v->status==0)
                                <span class="layui-btn layui-btn-normal layui-btn-mini">
                                    上架中
                                </span>
                            @elseif($v->status==1)
                                <span class="layui-btn layui-btn-disabled layui-btn-mini">
                                    已下架
                                </span>
                            @else($v->status==2)
                                <span class="layui-btn layui-btn-normal layui-btn-mini">
                                    活动中
                                </span>
                            @endif
                        </td>
                       
                        <td class="td-manage" style="text-align:center;">
                            <button class="layui-btn" onclick="member_stop(this,'{{$v->gid}}')" title="下架" class="ml-5" style="text-decoration:none">
                                @if($v->status==0)
                                <i class="layui-icon">&#xe601;</i>
                                @else
                                <i class="layui-icon">&#xe62f;</i>
                                @endif
                            </button>
                            <button class="layui-btn" title="修改" style="text-decoration:none">
                                <a href="/goods/{{$v->gid}}/edit">
                                <i class="layui-icon">&#xe642;</i></a>
                            </button>&nbsp;&nbsp;&nbsp;
                            
                            <form action="/goods/{{$v->gid}}" method='post' style='display:inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                 <button class="layui-btn" title="删除" onclick="member_del(this)"  style="text-decoration:none"><i class="layui-icon">&#xe640;</i>
                                </button>
                            </form>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       
            <!-- 右侧内容框架，更改从这里结束 -->
            <!-- 分页 -->
            <div class="pagination" style="padding-left:50%;">
                {{$data->appends($request->all())->links()}}
            </div>
            <!-- 分页结束 -->
        </div>     
</div>
@endsection
        <script>      

        //批量删除提交
         function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
         }
         

         /*商品上架状态变成下架状态修改*/
        function member_stop(obj,id){
            
            layer.confirm('确认要下架该商品吗？',function(index){
                $.get('/admin/'+id+'/status',{'status':0},function(data){
                    console.log(data);
                //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<button class="layui-btn" style="text-decoration:none" onClick="member_start(this,'+id+')"  title="上架"><i class="layui-icon">&#xe62f;</i></button>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已下架</span>');
                    $(obj).remove();
                    layer.msg('已下架!',{icon: 5,time:1000});
                });
            });
        
        }

        /*商品下架状态变成上架状态修改*/
        function member_start(obj,id){
            layer.confirm('确认要重新上架该商品吗？',function(index){
                $.get('/admin/'+id+'/status',{'status':1},function(data){

                //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<button class="layui-btn" style="text-decoration:none" onClick="member_stop(this,'+id+')"  title="下架"><i class="layui-icon">&#xe601;</i></button>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">上架中</span>');
                    $(obj).remove();
                    layer.msg('上架中!',{icon: 6,time:1000});
                });
            });
        }

        
       
        /*商品删除的提示框，没有其他功能*/
        function member_del(obj){        
                layer.msg('已删除!',{icon:1,time:1500});      
        }
        </script>
        