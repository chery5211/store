<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/wei/Application/Admin/Common/style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="/wei/Application/Admin/Common/style/font/css/font-awesome.min.css">
  <script type="text/javascript" src="/wei/Application/Admin/Common/style/js/jquery.js"></script>
    <script type="text/javascript" src="/wei/Application/Admin/Common/style/js/ch-ui.admin.js"></script>
</head>
<body>
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：<?php echo (session('admin_name')); ?></li>
				<li><a href="pass.html" target="main">修改密码</a></li>
				<li><a href="<?php echo U('Manager/logout');?>">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->
	</body>
</html>