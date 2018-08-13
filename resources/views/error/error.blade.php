@extends('layouts.admin')

@section('content')
	
    <div id="applyFor" style=" font-size: 20px; text-align: center; width: 500px; margin: 100px auto;">
        <span style="color: red;">{{$message}}</span>,将在
        <span class="loginTime" style="color: red">
            {{$jumpTime}}
        </span>秒后跳转至
        <a href="{{$url}}" style="color: red">
            {{$yemian}}
        </a>页面
    </div>
	
	 <script type="text/javascript">
        $(function(){
            var url = "{{$url}}"
            var loginTime = parseInt($('.loginTime').text());
            var time = setInterval(function(){
                loginTime = loginTime-1;
                $('.loginTime').text(loginTime);
                if(loginTime==0){
                    clearInterval(time);
                    window.location.href=url;
                }
            },1000);
        })
    </script>
 <!--             return view('/error/error')->with([
                     'title'=>'提示信息',
                     'message'=>'修改成功',
                     'url' =>'/admin/orders', 
                     'jumpTime'=>2,
                     'yemian' => '订单详情',                  
                 ]); -->
@endsection