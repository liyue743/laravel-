@extends('home/commom/frame')
@section('content')
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
				  @section('form')
					<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="/home/images/getAvatar.do.jpg">
										</a>
										<em class="s-name">(小叮当)<span class="vip1"></em>
										<div class="s-prestige am-btn am-round">
											</span>会员福利</div>
									</div>
									<div class="m-right">
										<div class="m-new">
											<a href="news.html"><i class="am-icon-bell-o"></i>消息</a>
										</div>
										<div class="m-address">
											<a href="address.html" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

								<!--个人资产-->
								<div class="m-userproperty">
									<div class="s-bar">
										<i class="s-icon"></i>个人资产
									</div>
									<p class="m-bonus">
										<a href="bonus.html">
											<i><img src="/home/images/bonus.png"/></i>
											<span class="m-title">红包</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-coupon">
										<a href="coupon.html">
											<i><img src="/home/images/coupon.png"/></i>
											<span class="m-title">优惠券</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-bill">
										<a href="bill.html">
											<i><img src="/home/images/wallet.png"/></i>
											<span class="m-title">钱包</span>
											<em class="m-num">2</em>
										</a>
									</p>
									<p class="m-big">
										<a href="#">
											<i><img src="/home/images/day-to.png"/></i>
											<span class="m-title">签到有礼</span>
										</a>
									</p>
									<p class="m-big">
										<a href="#">
											<i><img src="/home/images/72h.png"/></i>
											<span class="m-title">72小时发货</span>
										</a>
									</p>
								</div>
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="/home/orders">全部订单</a>
								</div>
								<ul>
									<li><a href="order.html"><i><img src="/home/images/pay.png"/></i><span>待付款</span></a></li>
									<li><a href="order.html"><i><img src="/home/images/send.png"/></i><span>待发货<em class="m-num">1</em></span></a></li>
									<li><a href="order.html"><i><img src="/home/images/receive.png"/></i><span>待收货</span></a></li>
									<li><a href="order.html"><i><img src="/home/images/comment.png"/></i><span>待评价<em class="m-num">3</em></span></a></li>
									<li><a href="change.html"><i><img src="/home/images/refund.png"/></i><span>退换货</span></a></li>
								</ul>
							</div>
							<!--九宫格-->
							<!--物流 -->
							<div class="m-logistics">

								<div class="s-bar">
									<i class="s-icon"></i>我的物流
								</div>
								<div class="s-content">
									<ul class="lg-list">

										<li class="lg-item">
											<div class="item-info">
												<a href="#">
													<img src="/home/images/65.jpg_120x120xz.jpg" alt="抗严寒冬天保暖隔凉羊毛毡底鞋垫超薄0.35厘米厚吸汗排湿气舒适">
												</a>

											</div>
											<div class="lg-info">

												<p>快件已从 义乌 发出</p>
												<time>2015-12-20 17:58:05</time>

												<div class="lg-detail-wrap">
													<a class="lg-detail i-tip-trigger" href="logistics.html">查看物流明细</a>
													<div class="J_TipsCon hide">
														<div class="s-tip-bar">中通快递&nbsp;&nbsp;&nbsp;&nbsp;运单号：373269427686</div>
														<div class="s-tip-content">
															<ul>
																<li>快件已从 义乌 发出2015-12-20 17:58:05</li>
																<li>义乌 的 义乌总部直发车 已揽件2015-12-20 17:54:49</li>
																<li class="s-omit"><a data-spm-anchor-id="a1z02.1.1998049142.3" target="_blank" href="#">··· 查看全部</a></li>
																<li>您的订单开始处理2015-12-20 08:13:48</li>

															</ul>
														</div>
													</div>
												</div>

											</div>
											<div class="lg-confirm">
												<a class="i-btn-typical" href="#">确认收货</a>
											</div>
										</li>
										<div class="clear"></div>

										<li class="lg-item">
											<div class="item-info">
												<a href="#">
													<img src="/home/images/88.jpg_120x120xz.jpg" alt="礼盒袜子女秋冬 纯棉袜加厚 女式中筒袜子 韩国可爱 女袜 女棉袜">
												</a>

											</div>
											<div class="lg-info">

												<p>已签收,签收人是青年城签收</p>
												<time>2015-12-19 15:35:42</time>

												<div class="lg-detail-wrap">
													<a class="lg-detail i-tip-trigger" href="logistics.html">查看物流明细</a>
													<div class="J_TipsCon hide">
														<div class="s-tip-bar">天天快递&nbsp;&nbsp;&nbsp;&nbsp;运单号：666287461069</div>
														<div class="s-tip-content">
															<ul>

																<li>已签收,签收人是青年城签收2015-12-19 15:35:42</li>
																<li>【光谷关山分部】的派件员【关山代派】正在派件 电话:*2015-12-19 14:27:28</li>
																<li class="s-omit"><a data-spm-anchor-id="a1z02.1.1998049142.7" target="_blank" href="//wuliu.taobao.com/user/order_detail_new.htm?spm=a1z02.1.1998049142.7.8BJBiJ&amp;trade_id=1479374251166800&amp;seller_id=1651462988&amp;tracelog=yimaidaologistics">··· 查看全部</a></li>
																<li>您的订单开始处理2015-12-17 14:27:50</li>

															</ul>
														</div>
													</div>
												</div>

											</div>
											<div class="lg-confirm">
												<a class="i-btn-typical" href="#">确认收货</a>
											</div>
										</li>

									</ul>

								</div>
							</div>
							<!--收藏夹 -->
						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
						<div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
								<a class="i-setting-trigger s-icon" href="#"></a>
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em>21</em>
									<span>星期一</span>
									<span>2015.12</span>
								</div>
							</div>
						</div>
						<!--新品 -->
						<div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>今日新品
								<a class="i-load-more-item-shadow">15款新品</a>
							</div>
							<div class="new-goods-info">
								<a class="shop-info" href="#" target="_blank">
									<div class="face-img-panel">
										<img src="/home/images/imgsearch1.jpg" alt="">
									</div>
									<span class="new-goods-num ">4</span>
									<span class="shop-title">剥壳松子</span>
								</a>
								<a class="follow " target="_blank">关注</a>
							</div>
						</div>

						<!--热卖推荐 -->
						<div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>热卖推荐
							</div>
							<div class="new-goods-info">
								<a class="shop-info" href="#" target="_blank">
									<div >
										<img src="/home/images/imgsearch1.jpg" alt="">
									</div>
                                    <span class="one-hot-goods">￥9.20</span>
								</a>
							</div>
						</div>

					</div>
				@show
				</div>
				<!--底部-->
			</div>
			<aside class="menu">
				<ul>
					<li class="person active">
						<a href="/myself"><i class="am-icon-user"></i>个人中心</a>
					</li>
					<li class="person">
						<p><i class="am-icon-newspaper-o" style="color:red;"></i> 个人资料</p>
						<ul>
							<li> <a href="/selfinfo">个人信息</a></li>
							<li> <a href="/safety">安全设置</a></li>
							<li> <a href="/addr">地址管理</a></li>				
						</ul>
					</li>
					<li class="person">
						<p><i class="am-icon-balance-scale" style="color:red;"></i> 我的交易</p>
						<ul>
							<li><a href="/home/orders">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
							<li> <a href="comment.html">评价商品</a></li>
						</ul>
					</li>

					<li class="person">
						<p><i class="am-icon-tags" style="color:red;"></i> 我的收藏</p>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>														
						</ul>
					</li>
					<li class="person">
						<p><i class="am-icon-qq" style="color:red;"></i> 在线客服</p>
						<ul>
							<li> <a href="consultation.html">商品咨询</a></li>
							<li> <a href="suggest.html">意见反馈</a></li>							
							
							<li> <a href="news.html">我的消息</a></li>
						</ul>
					</li>
				</ul>

			</aside>
		</div> 
@endsection
