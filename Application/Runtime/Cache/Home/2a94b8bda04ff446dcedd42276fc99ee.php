<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="/wei/Application/Home/Common/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="/wei/Application/Home/Common/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="/wei/Application/Home/Common/css/owl.carousel.css">
<link rel="stylesheet" href="/wei/Application/Home/Common/css/style.css">
<link rel="stylesheet" href="/wei/Application/Home/Common/css/responsive.css">
</head>
<body>

<div class="header-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="user-menu">
					<ul>
						<li><a href="<?php echo U('User/index');?>"><i class="fa fa-user"></i> 我的账户</a></li>
						<li><a href="<?php echo U('User/index');?>"><i class="fa fa-heart"></i> 收藏</a></li>
						<li><a href="<?php echo U('Gwc/gwc');?>"><i class="fa fa-user"></i> 我的车</a></li>
						<li><a href="<?php echo U('User/index');?>"><i class="fa fa-user"></i> 个人</a></li>
						<?php if(empty($uname)): ?><li><a  class="" data-toggle='modal' data-target='#mymodal'><i class="fa fa-user"></i>登录</a></li><?php endif; ?>
					</ul>
				</div>
			</div>

			<!-- 模态框内容 -->

		<div class="modal fade in" id='mymodal'>
				<div class="modal-dialog">
				<div class="modal-content center-block">
					<div class="modal-header">
						<button class="close" data-dismiss='modal' >&times;</button>
						<h3 class='modal-title'>Welcome</h3>	
					</div>

					<div class="modal-body">
						
                <!-- 	<form class="form-horizontal"> -->

              			<ul class="nav nav-tabs" id="a">
						  <li class="active" ><a href="#tab1" data-toggle="tab">登录</a></li>
						  <li><a href="#tab2" data-toggle="tab">注册</a></li>
						</ul>


						<div class="tab-content">
						  <div class="active tab-pane" id="tab1">
						  	<form class="form-horizontal" action="<?php echo U('User/login');?>" method="post" >
						    <fieldset>
						      <legend>用户登录</legend>
						      <div class="control-group">
						        <label class="control-label" for="usernames">用户名</label>
						        <div class="controls">
						          <input id="username" type="text" name="usernames">
						          
						        </div>
						      </div>
						      <div class="control-group">
						        <label class="control-label" for="password">密码</label>
						        <div class="controls">
						          <input id="password" type="password" name="password">
						         
						        </div>
						      </div>						      
						      <div class="control-group">
						        <label class="control-label" for="password">验证码</label>
						        <div class="controls">
						          <input type="text" class="code" name="captcha"/>
						          <img src="<?php echo U('verifyImg');?>" alt="" onclick="this.src='/wei/index.php/Home/Index/verifyImg/'+Math.random()">
						        
						        </div>
						      </div>
						    </fieldset>
						    <div class="form-actions">
						      <button type="submit" class="btn btn-primary">登录</button>
						    </div>
						  </form>
						  </div>


						  <div class="tab-pane" id="tab2">
								
							<form class="form-horizontal"  action="<?php echo U('User/register');?>" method="post" onsubmit="checkForm()">
						    <fieldset>
						      <legend>用户注册</legend>
						      <div class="control-group">
						        <label class="control-label" for="username">用户名</label>
						        <div class="controls">
						          <input type="text"  placeholder="username"  id="c1" name="username"  oninput="checkname()" onblur="ch()"><span style="color:red;" id="c2"></span>
						          <p class="help-block">请输入您想要注册的用户名</p>
						        </div>
						      </div>
						      <div class="control-group">
						        <label class="control-label" for="password" >密码</label>
						        <div class="controls">
						          <input  type="password"  id="b1"  oninput="checkpass()" name="password">
						          <span style="color:red;" id="b2"></span>
						           <p class="help-block">请输入您想要注册的密码</p>
						        </div>
						      </div>
						      	<div class="control-group">
						        <label class="control-label" for="password">确认密码</label>
						        <div class="controls">
						          <input  type="password" id="d1" name="pass2" oninput="recheckpass()">
						          <span style="color:red;"  id="d2"></span>
						          <p class="help-block">请再次输入您想要注册的密码</p>
						        </div>
						    </div>

						      <div  class="control-group">
						        <label class="control-label" >邮箱</label>
						        <div class="controls">
						          <input  type="text"  name="user_email"  id="email" >
						          </span>
						          <p class="help-block">请输入您想要注册的邮箱，例如123@qq.com</p>
						        </div>
						   	 </div>
						 
						      
						    </fieldset>
							    <div class="form-actions">
							      <button type="submit" class="btn btn-primary">注册</button>
							    </div>
						  </form>

						  </div>
						
						</div>

						
					</div>
<!-- 					<div class="modal-footer">
						<button class="btn btn-primary">Ok</button>
						<button class="btn btn-default" data-dismiss='modal'>Cancel</button>	
						</div> -->
				</div>
			</div>
		</div>
			
			 <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                        	<?php if(!empty($uname)): ?><li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">欢迎--:</span><span class="value"><?php echo (session('user_name')); ?> </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">设置</a></li>
                                    <li><a href="<?php echo U('User/out');?>">退出</a></li>

                                </ul>
                            </li><?php endif; ?>
 
                        </ul>
                    </div>
                </div>
		</div>
	</div>
</div> <!-- End header area -->

<div class="site-branding-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="logo">
					<h1><a href="<?php echo U('Index/index');?>">wei<span>商城</span></a></h1>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="shopping-item">
					<a href="<?php echo U('Gwc/gwc');?>">Cart <i class="fa fa-shopping-cart"></i></a>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
	<div class="container">
		<div class="row">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div> 
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo U('Index/index');?>">主页</a></li>
					<li><a href="<?php echo U('Goods/showlist');?>">商品列表</a></li>

					<li><a href="<?php echo U('Gwc/gwc');?>">购物车</a></li>
					<li><a href="<?php echo U('Cate/showlist');?>">分类</a></li>

				</ul>
			</div>  
		</div>
	</div>
</div> <!-- End mainmenu area -->

<div class="slider-area">
	<div class="zigzag-bottom"></div>
	<div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
		
		<div class="slide-bulletz">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ol class="carousel-indicators slide-indicators">
							<li data-target="#slide-list" data-slide-to="0" class="active"></li>
							<li data-target="#slide-list" data-slide-to="1"></li>
							<li data-target="#slide-list" data-slide-to="2"></li>
						</ol>                            
					</div>
				</div>
			</div>
		</div>

		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="single-slide">
					<div class="slide-bg slide-one"></div>
					<div class="slide-text-wrapper">
						<div class="slide-text">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-md-offset-6">
										<div class="slide-content">
											<h2>We are a family</h2>
											<p>Maybe it is fate, we gather together. This acquaintance, mutual help, efforts to move on. Go to bad this step today. Very happy, very satisfied. Feeling life I have not lived in vain, I hope that you can join. Good?!</p>
										
											<a href="#" class="readmore">Learn more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="single-slide">
					<div class="slide-bg slide-two"></div>
					<div class="slide-text-wrapper">
						<div class="slide-text">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-md-offset-6">
										<div class="slide-content">
											<h2>We are a family</h2>
											<p>Maybe it is fate, we gather together. This acquaintance, mutual help, efforts to move on. Go to bad this step today. Very happy, very satisfied. Feeling life I have not lived in vain, I hope that you can join. Good?!</p>
											<a href="#" class="readmore">Learn more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="single-slide">
					<div class="slide-bg slide-three"></div>
					<div class="slide-text-wrapper">
						<div class="slide-text">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-md-offset-6">
										<div class="slide-content">
											<h2>We are a family</h2>
											<p>Maybe it is fate, we gather together. This acquaintance, mutual help, efforts to move on. Go to bad this step today. Very happy, very satisfied. Feeling life I have not lived in vain, I hope that you can join. Good?!</p>
											<a href="#" class="readmore">Learn more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>        
</div> <!-- End slider area -->

<div class="promo-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-refresh"></i>
					<p>30 Days return</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-truck"></i>
					<p>Free shipping</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-lock"></i>
					<p>Secure payments</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-gift"></i>
					<p>New products</p>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End promo area -->

<div class="maincontent-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="latest-product">
					<h2 class="section-title">最新产品</h2>
					<div class="product-carousel">
						<?php if(is_array($new)): foreach($new as $k=>$v): ?><div class="single-product">
							<div class="product-f-image">
								<img src="/wei/<?php echo ($new[$k]['goods_big_img']); ?>" alt="">
								<div class="product-hover">
									<a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>" class="view-details-link"><i class="fa fa-link"></i>See details </a>
								</div>
							</div>
							
							<h2><a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>"><?php echo ($new[$k]['goods_name']); ?></a></h2>
							
							<div class="product-carousel-price">
								<ins>$<?php echo ($new[$k]['goods_price']); ?></ins> <del>$<?php echo ($new[$k]['goods_price2']); ?></del>
							</div> 
						</div><?php endforeach; endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End main content area -->

<div class="brands-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="brand-wrapper">
					<h2 class="section-title">品牌</h2>
					<div class="brand-list">
						<img src="/wei/Application/Home/Common/img/services_logo__1.jpg" alt="">
						<img src="/wei/Application/Home/Common/img/services_logo__2.jpg" alt="">
						<img src="/wei/Application/Home/Common/img/services_logo__3.jpg" alt="">
						<img src="/wei/Application/Home/Common/img/services_logo__4.jpg" alt="">
						<img src="/wei/Application/Home/Common/img/services_logo__1.jpg" alt="">
						<img src="/wei/Application/Home/Common/img/services_logo__2.jpg" alt="">
						<img src="/wei/Application/Home/Common/img/services_logo__3.jpg" alt="">
						<img src="/wei/Application/Home/Common/img/services_logo__4.jpg" alt="">                            
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End brands area -->

<div class="product-widget-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="single-product-widget">
					<h2 class="product-wid-title">畅销</h2>
					<a href="<?php echo U('Goods/showlist');?>" class="wid-view-more">View All</a>
					<?php if(is_array($re)): foreach($re as $k=>$v): ?><div class="single-wid-product">
						<a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>"><img src="/wei/<?php echo ($new[$k]['goods_big_img']); ?>" alt="" class="product-thumb"></a>
						<h2><a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>"><?php echo ($new[$k]['goods_name']); ?></a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$<?php echo ($new[$k]['goods_price']); ?></ins> <del>$<?php echo ($new[$k]['goods_price2']); ?></del>
						</div>                            
					</div><?php endforeach; endif; ?>


				</div>
			</div>
			<div class="col-md-4">
				<div class="single-product-widget">
					<h2 class="product-wid-title">特价</h2>
					<a href="<?php echo U('Goods/showlist');?>" class="wid-view-more">View All</a>
					<?php if(is_array($t)): foreach($t as $k=>$v): ?><div class="single-wid-product">
						<a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>"><img src="/wei/<?php echo ($t[$k]['goods_big_img']); ?>" alt="" class="product-thumb"></a>
						<h2><a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>"><?php echo ($t[$k]['goods_name']); ?></a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$<?php echo ($t[$k]['goods_price']); ?></ins> <del>$<?php echo ($t[$k]['goods_price2']); ?></del>
						</div>                            
					</div><?php endforeach; endif; ?>

				</div>
			</div>
			<div class="col-md-4">
				<div class="single-product-widget">
					<h2 class="product-wid-title">新品</h2>
					<a href="<?php echo U('Goods/showlist');?>" class="wid-view-more">View All</a>
					<?php if(is_array($new1)): foreach($new1 as $k=>$v): ?><div class="single-wid-product">
						<a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>"><img src="/wei/<?php echo ($new1[$k]['goods_big_img']); ?>" alt="" class="product-thumb"></a>
						<h2><a href="<?php echo U('Goods/detail',array('goods_id'=>$v['goods_id']));?>"><?php echo ($new1[$k]['goods_name']); ?></a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$<?php echo ($new1[$k]['goods_price']); ?></ins> <del>$<?php echo ($new1[$k]['goods_price2']); ?></del>
						</div>                            
					</div><?php endforeach; endif; ?>


				</div>
			</div>
		</div>
	</div>
</div> <!-- End product widget area -->


<!--  底部-->

	
	<div class="footer-top-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="footer-about-us">
					<h2>wei<span>商城</span></h2>
					<p>Maybe it is fate, we gather together. This acquaintance, mutual help, efforts to move on. Go to bad this step today. Very happy, very satisfied. Feeling life I have not lived in vain, I hope that you can join. Good?!</p>
					<div class="footer-social">
						<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
						<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
						<a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div>
			
			<div class="col-md-3 col-sm-6">
				<div class="footer-menu">
					<h2 class="footer-wid-title">用户导航 </h2>
					<ul>
						<li><a href="<?php echo U('Gwc/gwc');?>">购物车</a></li>
						<li><a href="<?php echo U('Goods/showlist');?>">商品列表</a></li>
						
						<li><a href="<?php echo U('User/index');?>">个人中心</a></li>
						<li><a href="<?php echo U('Index/index');?>">首页</a></li>
					</ul>                        
				</div>
			</div>
			
			<div class="col-md-3 col-sm-6">
				<div class="footer-menu">
					<h2 class="footer-wid-title">分类</h2>
					<ul>
						<?php if(is_array($infoA)): foreach($infoA as $key=>$v): ?><li><a href="/wei/index.php/Home/Cate/ca/id/<?php echo ($v["cate_id"]); ?>"><?php echo ($v["cate_name"]); ?></a></li><?php endforeach; endif; ?>

					</ul>                        
				</div>
			</div>
			
<!-- 			<div class="col-md-3 col-sm-6">
				<div class="footer-newsletter">
					<h2 class="footer-wid-title">注册</h2>
					<p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
					<div class="newsletter-form">
						<form action="#">
							<input type="submit" value="Subscribe">
						</form>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="copyright">
					<p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://www.mycodes.net/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="footer-card-icon">
					<i class="fa fa-cc-discover"></i>
					<i class="fa fa-cc-mastercard"></i>
					<i class="fa fa-cc-paypal"></i>
					<i class="fa fa-cc-visa"></i>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End footer bottom area -->

<script>
	var url="<?php echo U('Index/ckname');?>";
	var commenturl="<?php echo U('Com/comment');?>";
	var getComment="<?php echo U('Com/getComment');?>";
	var delComment="<?php echo U('Com/del');?>";
	var searchUrl="<?php echo U('Search/sear');?>";
	var cancelUrl="<?php echo U('User/cancel');?>";
	var updateUrl= "<?php echo U('User/update');?>";
</script>

<script src="/wei/Application/Home/Common/js/regist.js"></script>
<!-- Latest jQuery form server -->
<script src="/wei/Application/Home/Common/js/jquery-1.8.3.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="/wei/Application/Home/Common/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="/wei/Application/Home/Common/js/owl.carousel.min.js"></script>
<script src="/wei/Application/Home/Common/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="/wei/Application/Home/Common/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="/wei/Application/Home/Common/js/main.js"></script>
<script src="/wei/Application/Home/Common/js/comment.js"></script>
<script src="/wei/Application/Home/Common/js/search.js"></script>


</body>
</html>