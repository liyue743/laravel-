<link rel="stylesheet" href="/houtai/css/bootstrap.min.css">   
@extends('/admin/index')
@section('content')




@if(session('success'))

<script>
layui.use('layer', function(){
  var layer = layui.layer;
  
  layer.msg('{{session('success')}}',{icon:1,time:1000});

});
    

</script>

@elseif(session('error'))
<script>

        layui.use('layer', function(){
          var layer = layui.layer;
          
          layer.msg('{{session('error')}}',{icon:1,time:1000});
          
        });       

</script> 
@endif


        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="/users" method="get">
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                  
                   <div class="layui-input-inline">
                      <select type="text" name="status"  placeholder="" autocomplete="off" class="layui-input">

                        <option value="" selected >用户状态</option>
                        <option value="0">禁用</option>
                        <option value="1">启用</option>
                      </select>
                    </div>                                  
                    <div class="layui-input-inline">
                      <input type="text" name="uname"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick=" location.replace('/users/create'); "><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">本页共有数据 &nbsp;<i style="font-size:20px;color:red;">{{count($res)}}</i> &nbsp;条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input id='all' type="checkbox" name="ids[]" value="">
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            用户名
                        </th> 
                        <th>
                            昵称
                        </th>
                        <th>
                            性别
                        </th>
                        <th>
                            手机
                        </th>
                        <th>
                            邮箱
                        </th>
                        <th>
                            地址
                        </th>
                        <th>
                            注册时间
                        </th>
                        <th>
                            状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($res as $k=>$v)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{$v->id}}" name="id">
                        </td>
                        <td>
                            {{ $v->id }}
                        </td>
                        <td>
                            <u style="cursor:pointer" onclick="member_show('{{$v->uname}}','/users/show/{{$v->id}}','','600','500')">
                                {{$v->uname}}
                            </u>
                        </td>
                        <td>
                            {{$v['info']->nickname}}
                        </td>
                        <td >

                            @if ($v['info']->sex == 'x') 
                                保密 
                            @elseif ($v['info']->sex == 'm') 
                                男
                            @elseif ($v['info']->sex == 'w')
                                女
                            @endif
                            
                        </td>
                        <td >
                            {{$v->utel}}
                        </td>
                        <td >
                            {{$v['info']->email}}
                        </td>
                        <td >
                           {{$v['info']->addr}}
                        </td>
                        <td>
                          {{date('Y年m月d日',$v->create_at)}}
                        </td>
                        <td class="td-status">
                        @if($v->status)
                            <span class="layui-btn layui-btn-normal layui-btn-mini">
                                已启用
                            </span>
                        @else
                             <span class="layui-btn layui-btn-disabled layui-btn-mini">
                                已禁用
                            </span>
                        @endif
                        </td>

                        <td class="td-manage">

                        @if ($v->status == 1)
                            <a style="text-decoration:none" onclick="member_stop(this,{{$v->id}})" href="javascript:;" title="停用">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                        @else
                            <a style="text-decoration:none" onclick="member_start(this,{{$v->id}})" href="javascript:;" title="启用">
                                <i class="layui-icon">&#xe62f;</i>
                            </a>
                        @endif

                            <a title="修改信息" href="javascript:;" onclick=" location.replace('/users/{{$v->id}}');"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a style="text-decoration:none" onclick="location.replace('/users/pass/{{$v->id}}')"
                            href="javascript:;" title="修改密码">
                                <i class="layui-icon">&#xe631;</i>
                            </a>
                        <form id='fm' action="/users/{{$v->id}}" method="post" style="display:inline;">    
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <a title="删除" href="javascript:;" onclick="del()" >
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </form>
                      </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
           
        </div> 

            <div class="pagination" style="margin-left:40%">
                
                {{ $res->links() }} 
            
            </div>

                  
          
        </div>
        <!-- 右侧主体结束 -->

                    
         <script>
            
            $('#all').click(function(){

                if($(this).attr('checked')){
            
                    //全选
                    $(':checkbox').attr('checked',true);
                             
    
              }else{
                 //全不选 
                 $(':checkbox').attr('checked',false); 
              }
            
            })

        //批量删除提交
         function delAll () {


            layer.confirm('确认要删除吗？',function(index){

                //捉到所有被选中的，发异步进行删除
                var ids = new Array();
                
                $('input[name="id"]').each(function(){
                       
                       if($(this).attr('checked')){
                        
                        ids.push($(this).val());
                    
                    }
                })
               // console.log(ids);
                //发送Ajax
               $.get('/users/dels',{ids:ids},function(data){

                    if(data){

                        layer.msg('删除成功!', {icon: 1});
                        setTimeout(function(){ 

                            location.reload();

                        },1000);
                        
                    }else{

                        layer.msg('删除失败!',{icon: 2});
                    }
                })

                
            })
         }
         /*用户-添加*/
        function member_add(title,url,w,h){
            x_admin_show(title,url,w,h);
        }
        /*用户-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }

         /*用户-停用*/
        function member_stop(obj,id){

            layer.confirm('确认要禁用吗？',function(index){
                //发异步把用户状态进行更改
              
              $.get('/users/'+id+'/edit',{'status':1}, function(data){
                      console.log(data); 
                        if(data){   
                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onclick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');           
                            $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已禁用</span>');
                            $(obj).remove();
                            layer.msg('已禁用!',{icon: 5,time:1000});
                        }
                });  
             
                             
           
            });
        }
        /*用户-启用*/
        function member_start(obj,id){

            layer.confirm('确认要启用吗？',function(index){
                    //发异步把用户状态进行更改
                $.get('/users/'+id+'/edit',{'status':0}, function(data){ 
                    console.log(data);                 
                        if(data){

                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onclick="member_stop(this,'+id+')" href="javascript:;" title="禁用"><i class="layui-icon">&#xe601;</i></a>');
                            $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                            $(obj).remove(); 
                            layer.msg('已启用!',{icon: 6,time:1000});
                        }
                });
                
            });
        }


        /*用户-删除*/
        function del(){

            var fm =document.getElementById('fm');

            layer.confirm('确认要删除吗？',function(index){           

            fm.submit();
                          
         
            });
        
        }
      
        
</script>

@endsection

