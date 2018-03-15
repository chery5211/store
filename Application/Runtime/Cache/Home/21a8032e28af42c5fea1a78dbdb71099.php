<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    
    
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
                        
                <!--    <form class="form-horizontal"> -->

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
                                <label class="control-label" for="username">用户名</label>
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
                                  <img src="<?php echo U('Index/verifyImg');?>" alt="" onclick="this.src='/wei/index.php/Home/Index/verifyImg/'+Math.random()">
                                
                                </div>
                              </div>
                            </fieldset>
                            <div class="form-actions">
                              <button type="submit" class="btn btn-primary">登录</button>
                            </div>
                          </form>
                          </div>


                          <div class="tab-pane" id="tab2">
                                
                            <form class="form-horizontal"  action="<?php echo U('User/register');?>" method="post" onsubmit="return checkForm()">
                            <fieldset>
                              <legend>用户注册</legend>
                              <div class="control-group">
                                <label class="control-label" for="username">用户名</label>
                                <div class="controls">
                                  <input type="text"  placeholder="username"  id="c1" name="username"  oninput="checkname()"  onblur="ch()" ><span style="color:red;" id="c2"></span>
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
<!--                    <div class="modal-footer">
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
                        <a href="<?php echo U('Gwc/gwc');?>">Cart -  <i class="fa fa-shopping-cart"></i></a>
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
                    <li><a href="<?php echo U('Index/index');?>">主页</a></li>
                    <li><a href="<?php echo U('Goods/showlist');?>">商品列表</a></li>
                    <li><a href="<?php echo U('Gwc/gwc');?>">购物车</a></li>
                    <li><a href="<?php echo U('Cate/showlist');?>">分类</a></li>

                </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="/wei/Application/Home/Common/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="/wei/Application/Home/Common/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="/wei/Application/Home/Common/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="/wei/Application/Home/Common/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">


                            <div class="woocommerce-info">有优惠券? <a class="showcoupon" data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false" aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                            </div>

                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                </p>

                                <p class="form-row form-row-last">
                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                </p>

                                <div class="clear"></div>
                            </form>

                            <form enctype="multipart/form-data" action="<?php echo U('Order/add');?>" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>结算明细</h3>
                                        

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">姓名<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo ($userinfo["username"]); ?>" placeholder="" id="billing_last_name" name="order_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                <label class="" for="billing_postcode">邮箱 <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo ($userinfo["user_email"]); ?>" placeholder="Postcode / Zip" id="billing_postcode" name="order_email" class="input-text ">
                                            </p>

                                            <div class="clear"></div>


                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">电话 <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo ($userinfo["user_tel"]); ?>" placeholder="" id="billing_phone" name="order_tel" class="input-text ">
                                            </p>
                                      
                                                 <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">地址<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Street address" id="billing_address_1" name="order_addr" class="input-text ">
                                            </p>

                                                   


                                        </div>
                                    </div>

        

                                    </div>

                                </div>

                                <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">商品</th>
                                                <th class="product-total">单价</th>
                                                <th class="product-total">运费和手续费</th>
                                                <th class="product-total">数量</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
                                                  <td><?php echo ($info[$k]['gwc_goods_name']); ?></td>
                                                  <td><?php echo ($info[$k]['gwc_goods_price']); ?></td>
                                                  <td>免费</td>
                                                  <td><?php echo ($info[$k]['gwc_goods_num']); ?></td>
                                            </tr><?php endforeach; endif; ?>
                                        </tbody>
                                        <tr><td colspan="4">合计&nbsp;<?php echo ($total); ?></td></tr>
                                    
                                    </table>



                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">银行卡 </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_cheque">
                                                <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_cheque">支票 </label>
                                                <div style="display:none;" class="payment_box payment_method_cheque">
                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </li>
                                           
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                                 <input type="hidden" name='total' value="<?php echo ($total); ?>">
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>


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