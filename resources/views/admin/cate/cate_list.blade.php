@extends('/common/admin/header')
<link rel="stylesheet" href="/houtai/bootstarp/bootstrap.min.css">
@section('title','-类别列表')

@section('content')

<script src="/houtai/bootstarp/bootstrap.min.js"></script>
<div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    
                    <div class="layui-input-inline">
                      <input type="text" name="cname"  placeholder="请输入类别名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="location.replace('/cate/create');"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">
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
                        <th>类别ID</th>
                        <th>类别名称</th>
                        <th>上级ID</th>
                        <th>参考路径</th>
                        <th style="width:200px;">操作</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $k => $v)
                    <tr>
                        <td><input type="checkbox" value="1" name=""></td>
                        <td>{{$v->cid}}</td>
                        <td>{{$v->cname}}</td>
                        <td>{{$v->pid}}</td>
                        <td>{{$v->path}}</td>
                        <td class="td-manage">
                            <button class="layui-btn" title="修改" class="ml-5" style="text-decoration:none">
                                <a href="/cate/{{$v->cid}}/edit">
                                <i class="layui-icon">&#xe642;</i></a>
                            </button>
                            <form action="/cate/{{$v->cid}}" method='post' style='display:inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                 <button class="layui-btn" title="删除" style="text-decoration:none"><i class="layui-icon">&#xe640;</i>
                                </button>
                            </form>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 分页 -->
            <div class="pagination" style="padding-left:50%;">

                {{$data->appends($request->all())->links()}}
               
            </div>
            <!-- 分页结束 -->
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
         <script>

        //批量删除提交
         function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
         }
         /*用户-添加*/
        function member_add(title,url,w,h){
            x_admin_show(title,url,w,h);
        }

        // 用户-编辑
        function member_edit (title,url,id,w,h) {
            x_admin_show(title,url,w,h); 
        }

        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            });
        }
        </script>

@endsection