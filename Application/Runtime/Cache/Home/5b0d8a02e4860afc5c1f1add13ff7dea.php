<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cate</title>
        <style>
        .accordion{margin-bottom:18px}.accordion-group{margin-bottom:2px;border:1px solid #e5e5e5;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.accordion-heading{border-bottom:0}.accordion-heading .accordion-toggle{display:block;padding:8px 15px}.accordion-toggle{cursor:pointer}.accordion-inner{padding:9px 15px;border-top:1px solid #e5e5e5}
      
            .accordion-heading a{text-decoration: none; }
         .accordion-heading{height: 50px; }
         .accordion-inner a{color:#ccc}
         .accordion-toggle h4{ margin-top:7px;}
    </style>

<!-- 头部-->
        
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
                <div class="col-sm-3">

                          
                     <div class="accordion" id="accordion1">

                            <?php if(is_array($infoA)): foreach($infoA as $key=>$v): ?><center>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                    <a class="accordion-toggle" href="#collapse<?php echo ($v["cate_id"]); ?>" data-toggle="collapse" data-parent="#accordion1"><h4><?php echo ($v["cate_name"]); ?></h4></a>
                                    </div>
                              
                                      <div class="collapse in" id="collapse<?php echo ($v["cate_id"]); ?>">
                                      <div class="accordion-inner">
                                        <?php if(is_array($infoB)): foreach($infoB as $key=>$vv): if($vv['cate_pid'] == $v['cate_id']): ?><a href="/wei/index.php/Home/Cate/cates/id/<?php echo ($vv["cate_id"]); ?>"><?php echo ($vv["cate_name"]); ?></a>&nbsp;&nbsp;<?php endif; endforeach; endif; ?>
                                      </div>  
                                     
                                      </div>
                                </div>
                          </center><?php endforeach; endif; ?>
                                  
                        </div>
                </div>
                <div class="col-sm-9">
                    <ol class="breadcrumb">
                        <li>首页</li>
                    </ol>

             <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="/wei/<?php echo ($v["goods_big_img"]); ?>" alt="">
                        </div>
                        <h2><a href=""><?php echo ($v["goods_name"]); ?></a></h2>
                        <div class="product-carousel-price">
                            <ins>$<?php echo ($v["goods_price"]); ?></ins> <del>$<?php echo ($v["goods_price2"]); ?></del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/wei/index.php/Home/Goods/detail/goods_id/<?php echo ($v["goods_id"]); ?>">Go to Detail</a>     
                        </div>   
                                  
                    </div> 
                </div><?php endforeach; endif; ?>


                

                </div>


            </div>
                        <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                                <?php echo ($pagelist); ?>

                            </nav>                        
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