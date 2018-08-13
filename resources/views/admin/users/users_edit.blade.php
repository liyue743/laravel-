@extends('admin/index')
@section('content')
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="/users/{{$res->id}}" method="post" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        头像
                    </label>
                    <div class="layui-input-inline">

                        <img src="{{$res['info']->profile}}" width="100px">

                        <input type="file" name="profile" >
                    </div>
                </div>
                <label for="L_username" class="layui-form-label">
                        用户名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="uname" value="{{$res->uname}}"
                         value="zhibinm" disabled class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        昵称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="nickname" value="{{$res['info']->nickname}}" 
                        autocomplete="off" maxlength="18" class="layui-input">
                    </div>

                </div>
                <div class="layui-form-item">
                <label  class="layui-form-label">
                       性别
                    </label>
                    <div class="layui-inline">
                        <div class="layui-input-inline" style="width:300px;">
                            <input type="radio" name="sex" value="m" title="男" @if($res['info']->sex == 'm') checked @endif>
                            <input type="radio" name="sex" value="w" title="女" @if($res['info']->sex == 'w') checked @endif>
                            <input type="radio" name="sex" value="x" title="保密" @if($res['info']->sex =='x') checked @endif>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_city" class="layui-form-label">
                        电话
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_phone" name="utel" autocomplete="off" value="{{$res->utel}}"
                        class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" autocomplete="on" value="{{ $res['info']->email }}" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        如果您在邮箱已激活的情况下，变更了邮箱，需
                        <a href="/user/activate/" style="font-size: 12px; color: #4f99cf;">
                            重新验证邮箱
                        </a>
                        。
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_city" class="layui-form-label">
                        地址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_city" name="addr" autocomplete="off" value="{{$res['info']->addr}}"
                        class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="L_sign" class="layui-form-label">
                        签名
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="用户签名" id="L_sign" disabled name="sign" autocomplete="off"
                        class="layui-textarea" style="height: 80px;"></textarea>
                    </div>
                </div>
                    {{csrf_field()}}

                    {{method_field('PUT')}}
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit>
                                          
                        保存
                    
                    </button>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
     
@endsection
    </div>
    <!-- 中部结束 -->

</body>
</html>