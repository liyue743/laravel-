@extends('home/myself/self_index')
@section('form')
					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<form action="/selfinfo/update/{{$user->id}}" method="post" class="am-form am-form-horizontal" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="user-infoPic">
							<div class="filePic">								
								@if($user['info']->profile)
								<img  src="{{$user['info']->profile}}" width="100px" style="border-radius:50%;" alt="" >
								<input type="file" name="profile" >
								@else
								<input type="file" class="inputPic" name="profile" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img  class="am-circle am-img-thumbnail" src="/home/images/getAvatar.do.jpg" alt="" >
								@endif
							</div>
							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{$user->uname}}</i></b></div>
								<div class="vip">
                                      <span></span><a href="#">会员专享</a>
								</div>
							</div>
						</div>
						<!--个人信息 -->
						<div class="info-main">
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="nickname" value="{{$user['info']->nickname}}" placeholder="nickname">
                                          <small>昵称长度不能超过40个汉字</small>
									</div>
								</div>


								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
									
										<label class="am-radio-inline">								
											<input type="radio" name="sex" @if($user['info']->sex == 'm') checked @endif value="m" data-am-ucheck> 男
										</label>
										
										<label class="am-radio-inline">									<input type="radio" name="sex" @if($user['info']->sex == 'w') checked @endif value="w" data-am-ucheck> 女
										</label>
										
										<label class="am-radio-inline">
											<input type="radio" name="sex" @if($user['info']->sex == 'x') checked @endif value="x" data-am-ucheck> 保密
										</label>
										
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="utel" readonly	placeholder="telephonenumber" type="tel" value="{{$user->utel}}">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" name="email" placeholder="Email" value="{{$user['info']->email}}" type="email">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">签名</label>
									<div class="am-form-content">
										<textarea id="user-sign" name="sign">{{$user['info']->sign}}</textarea>
									</div>
								</div>
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">
											<span class="am-icon-angle-right"></span>
										</a>

									</div>
								</div>
								<div class="info-btn">
									<button class="am-btn am-btn-danger">提交修改</button>
								</div>

							</form>
						</div>
					</div>

@endsection