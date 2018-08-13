
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/houtai/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/houtai/css/font.css">
    <link rel="stylesheet" href="/houtai/css/xadmin.css">
    <link rel="stylesheet" href="/houtai/css/swiper.min.css">
    <script type="text/javascript" src="/houtai/js/jquery.min.js"></script>
    <script type="text/javascript" src="/houtai/js/swiper.jquery.min.js"></script>
    <script src="/houtai/js/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/houtai/js/xadmin.js"></script>

</head>
<body>
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form">
              <div class="layui-form-item">
					<label for="L_username" class="layui-form-label">
                        头像
                    </label>
					<img src="{{$res['info']->profile}}" width="80px">
              </div>
              <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        用户名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="username" disabled="" 
                        autocomplete="off" value="{{$res->uname}}" class="layui-input">
                    </div>
           	  </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        昵称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="username" disabled=""
                        autocomplete="off" value="{{$res['info']->nickname}}" class="layui-input">
                    </div>

                </div> 
                <div class="layui-form-item">
                 <label for="L_username" class="layui-form-label">
                        性别
                    </label>
                  <div class="layui-input-inline">
                          	
                          	@if($res['info']->sex =='x')
								<input type="text" class="layui-input" disabled="" value="保密">
							@elseif($res['info']->sex == 'm')
								<input type="text" class="layui-input" disabled="" value="男">
							@elseif($res['info']->sex == 'w')
								<input type="text" class="layui-input" disabled="" value="女">
							@endif
                          	
                        </div>
                       
                </div> 
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" disabled=""
                        autocomplete="off" value="{{$res['info']->email}}" class="layui-input">
                    </div>
                   
                </div>
                <div class="layui-form-item">
                    <label for="L_city" class="layui-form-label">
                        地址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_city" disabled="" value="{{$res['info']->addr}}"
                        class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="L_sign" class="layui-form-label">
                        签名
                    </label>
                    <div class="layui-input-block">
                        <textarea  id="L_sign" name="sign" disabled=""
                        class="layui-textarea" value="{{$res['info']->sign}}" style="height: 50px;"></textarea>
                    </div>
                </div>
            
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>

</body>
</html>