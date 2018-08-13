<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Tbb-Shop后台@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/houtai/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/houtai/css/font.css">
	<link rel="stylesheet" href="/houtai/css/xadmin.css">
    <link rel="stylesheet" href="/houtai/css/swiper.min.css">

    <script type="text/javascript" src="/houtai/js/jquery.min.js"></script>
    <script type="text/javascript" src="/houtai/js/swiper.jquery.min.js"></script>
    <script src="/houtai/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/houtai/js/xadmin.js"></script>
</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">

        <div class="logo"><a href="/admin/index">Tbb 后台管理平台 V1.0</a></div>

        

        <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">
            @if(session("admins")) {{session("admins")->username}}  
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a href="">个人信息</a></dd>
              <dd><a href="/admin/logout">切换帐号</a></dd>
              <dd><a href="/admin/logout">退出</a></dd>
            </dl>   
                            

           
                           
            @endif
            </a>
      
          </li>
          <li class="layui-nav-item"><a href="/">前台首页</a></li>
        </ul>
    </div>
    <!-- 顶部结束 -->

    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
          <div id="side-nav">
            <ul id="nav">

                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        用户管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/users">
                                <i class="iconfont">&#xe6a7;</i>
                                用户管理中心
                            </a>
                        </li>   
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        管理员管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="/admins">
                                <i class="iconfont">&#xe6a7;</i>
                                管理员列表   
                            </a>
                        </li>
                        <li>
                            <a href="/admins/create">
                                <i class="iconfont">&#xe6a7;</i>
                                管理员添加
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        分类管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/cate/create">
                                <i class="iconfont">&#xe6a7;</i>
                                分类添加
                            </a>
                        </li>
                    </ul>
                    <ul class="sub-menu">
                        <li>
                            <a href="/cate">
                                <i class="iconfont">&#xe6a7;</i>
                                分类展示
                            </a>
                        </li>
                    </ul>
                </li>
                 
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        商品管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>                                                  
                            <a href="/goods/create">
                                <i class="iconfont">&#xe6a7;</i>
                                商品添加
                            </a>
                        </li>
                    </ul>
                    <ul class="sub-menu">
                        <li>
                            <a href="/goods">
                                <i class="iconfont">&#xe6a7;</i>
                                商品展示
                            </a>
                        </li>
                    </ul>
                </li>       
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        评论管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>                                                  
                            <a href="/commonts">
                                <i class="iconfont">&#xe6a7;</i>
                                评论列表
                            </a>
                        </li>
                    </ul>
                    <ul class="sub-menu">
                        <li>
                            <a href="">
                                <i class="iconfont">&#xe6a7;</i>
                                评论
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>

                        系统统计
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="./echarts1.html">
                                <i class="iconfont">&#xe6a7;</i>
                                拆线图
                            </a>
                        </li>
                        <li>
                            <a href="./echarts2.html">
                                <i class="iconfont">&#xe6a7;</i>
                                柱状图
                            </a>
                        </li>
                        <li>
                            <a href="./echarts3.html">
                                <i class="iconfont">&#xe6a7;</i>
                                地图
                            </a>
                        </li>
                        <li>
                            <a href="./echarts4.html">
                                <i class="iconfont">&#xe6a7;</i>
                                饼图
                            </a>
                        </li>
                        <li>
                            <a href="./echarts5.html">
                                <i class="iconfont">&#xe6a7;</i>
                                k线图
                            </a>
                        </li>
                        <li>
                            <a href="./echarts6.html">
                                <i class="iconfont">&#xe6a7;</i>
                                仪表图
                            </a>
                        </li>
                        <li>
                            <a href="//echarts.ba1idu.com/examples.html">
                                <i class="iconfont">&#xe6a7;</i>
                                更多案例
                            </a>
                        </li>
                    </ul>
                </li>
            
            </ul>
          </div>
        </div>
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
@section('content')
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
            公告一：
            </blockquote>
            <blockquote class="layui-elem-quote">
            公告二:
            </blockquote>
            <fieldset class="layui-elem-field layui-field-title site-title">
              <legend><a name="default">信息统计</a></legend>
            </fieldset>
           
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
@show        
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->

    <!-- 背景切换开始 -->
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
        
  
</body>
</html>