<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/js/jquery.js"></script>
		<style>
			.all,.unall:hover{
				cursor: pointer;
			}
		</style>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						<a href="#" target="_top" class="h">亲，请登录</a>
						<a href="#" target="_top">免费注册</a>
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/home/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/home/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<!-- <div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div> -->
							<div class="clear"></div>
							<div class="bundle-main">
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" id="J_CheckBox_170037950254" name="items[]" value="170037950254" type="checkbox">
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" data-title="美康粉黛醉美东方唇膏口红正品 持久保湿滋润防水不掉色护唇彩妆" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="/home/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="美康粉黛醉美唇膏 持久保湿滋润防水不掉色" class="item-title J_MakePoint" data-point="tbcart.8.11">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props">
											<span class="sku-line">颜色：12#川南玛瑙</span>
											<span class="sku-line">包装：裸装</span>
											
											<!-- <i class="theme-login am-icon-sort-desc"></i> -->
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<!-- <em class="price-original">78.00</em>-->					
												</div>
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">39.04</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="" type="button" value="-" />
													<input class="text_box" readonly name="" type="text" value="0" style="width:30px;" />
													<input class="add am-btn" name="" type="button" value="+" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
										<em tabindex="0" class="J_ItemSum number">0.00</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<!-- <a title="移入收藏夹" class="btn-fav" href="#">
                  								移入收藏夹</a> -->
											<a href="javascript:;" data-point-url="#" class="delete">
                  								删除</a>
										</div>
									</li>
								</ul>				
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" id="J_CheckBox_170037950254" name="items[]" value="170037950254" type="checkbox">
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" data-title="美康粉黛醉美东方唇膏口红正品 持久保湿滋润防水不掉色护唇彩妆" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="/home/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="美康粉黛醉美唇膏 持久保湿滋润防水不掉色" class="item-title J_MakePoint" data-point="tbcart.8.11">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props">
											<span class="sku-line">颜色：12#川南玛瑙</span>
											<span class="sku-line">包装：裸装</span>
											
											<!-- <i class="theme-login am-icon-sort-desc"></i> -->
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<!-- <em class="price-original">78.00</em>-->					
												</div>
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">39.04</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="" type="button" value="-" />
													<input class="text_box" readonly name="" type="text" value="0" style="width:30px;" />
													<input class="add am-btn" name="" type="button" value="+" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
										<em tabindex="0" class="J_ItemSum number">0.00</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<!-- <a title="移入收藏夹" class="btn-fav" href="#">
                  								移入收藏夹</a> -->
											<a href="javascript:;" data-point-url="#" class="delete">
                  								删除</a>
										</div>
									</li>
								</ul>				
							</div>
						</div>
					</tr>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" style="margin-right:-17px; " class="select-all J_SelectAll">
						<span class="all">全选</span>
					</div>
				<!-- 	<div id="J_SelectAll2" class="select-all J_SelectAll">
						<span class="unall">全不选</span>
					</div> -->
					<div class="operations">
						<a href="#" hidefocus="true" class="deleteAll">删除</a>
						<!-- <a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a> -->
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area">
							<a href="pay.html" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span>
							</a>
						</div>
					</div>

				</div>

					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">淘宝宝科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于淘宝宝</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2018-2025 TBB.com 版权所有</em>
							</p>
						</div>
					</div>

			</div>
			<div class="theme-popover-mask"></div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="/home/person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>

		<script>
				//全选
				$(".all").click(function(){
					$(".check:checkbox").attr("checked", true);
					tols();
				});
				// //全不选
				// $(".unall").click(function(){
				// 	$("#J_CheckBox_170037950254:checkbox").attr("checked", false);
				// });
				$('.check').click(function(){

					tols();
				})
				//加法
			        $(".add").click(function(){
			          	var num = $(this).parent().find('input[class*=text_box]').val();			          		
			          	num++;
			         	$(this).parent().find('input[class*=text_box]').val(num);
			         	var pr = $(this).parents('li').siblings().find('.price-now').text();
		         		function accMul(arg1, arg2) {
					        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
					        try { m += s1.split(".")[1].length } catch (e) { }
					        try { m += s2.split(".")[1].length } catch (e) { }
					        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
						}
						$(this).parents('li').siblings().find('.number').text(accMul(num,pr));
						tols();
			        })
			    //减法
			        $(".min").click(function(){
			          	var num = $(this).parent().find('input[class*=text_box]').val();			         		
			          	num--;
			          	if(num <= 1){
							num = 1;
						}
			         	$(this).parent().find('input[class*=text_box]').val(num);
			         	var pr = $(this).parents('li').siblings().find('.price-now').text();
	         			function accMul(arg1, arg2) {
					        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();
					        try { m += s1.split(".")[1].length } catch (e) { }
					        try { m += s2.split(".")[1].length } catch (e) { }
					        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
						}
						$(this).parents('li').siblings().find('.number').text(accMul(num,pr));
						tols();
			        }) 

			    //封装
					function tols()
					{
						var sum = 0;
						
						//判断多选框有没有选中
						$(':checkbox:checked').each(function(){
							//获取小计
							var prs = $(this).parents('li').siblings().find('.number').text();

							function accAdd(arg1,arg2){  
						    var r1,r2,m;  
						    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
						    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
						    m=Math.pow(10,Math.max(r1,r2))  
						    return (arg1*m+arg2*m)/m  
							}

							sum = accAdd(sum, prs);
						})

						$('#J_Total').text(sum);
					}
		</script>
	</body>

</html>