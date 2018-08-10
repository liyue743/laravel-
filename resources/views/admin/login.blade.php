<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/houtai/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/houtai/css/font.css">
	<link rel="stylesheet" href="/houtai/css/xadmin.css">
    <link rel="stylesheet" href="/houtai/css/swiper.min.css">
    <script type="text/javascript" src="/houtai/js/jquery.min.js"></script>
    <script type="text/javascript" src="/houtai/js/swiper.jquery.min.js"></script>
    <script src="/houtai/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/houtai/js/xadmin.js"></script>

</head>
<body>
    <div class="login-logo"><h1>X-ADMIN V1.1</h1></div>
    <div class="login-box">
        <form class="layui-form layui-form-pane" action="/admin/dologin">
              
            <h3>登录你的帐号</h3>

            @if(session('error')) 
            <div class="mws-form-message warning" style='font-size:16px'>  
                                   
                    {{session('error')}}
               
            </div>
            @endif

            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <label class="login-title" for="username">帐号</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="text" name="username" lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input">
                </div>
            </div>
            <label class="login-title" for="password">密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                  <input type="password" name="password" lay-verify="required" placeholder="请输入你的密码" autocomplete="new-password" class="layui-input" >
                </div>
            </div>

            <div class="layui-form-item">
                
                <div class="layui-input-inline login-inline" style="width:300px;height: 76px;">
                    
                  <input type="text" name="code" lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input" style='width:190px;float:left;'>
                  <img src="\admin\captcha" alt="" style='float:right;' onclick="this.src = this.src +='?1'">
                </div>
            </div>

            <div class="form-actions">
                {{csrf_field()}}
                <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">登录</button> 

                <div class="forgot"><a href="#" class="forgot">忘记密码</a></div>     
            </div>
        </form>
    </div>
	<div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="/houtai/images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/houtai/images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>   
    </div>
<!--     <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form();
              //监听提交
              form.on('submit(login)', function(data){
                layer.msg(JSON.stringify(data.field),function(){
                    location.href='index.html'
                });
                return false;
              });
            });
        })
        
    </script> -->
   <!--  <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script> -->
</body>
</html>