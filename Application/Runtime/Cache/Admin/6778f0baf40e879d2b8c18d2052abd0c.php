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
		<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <?php if(is_array($auth_infoA)): foreach($auth_infoA as $k=>$v): ?><li>
                <h3><i class="fa fa-fw fa-clipboard"></i><?php echo ($v["auth_name"]); ?></h3>

                <ul class="sub_menu">
                    <?php if(is_array($auth_infoB)): foreach($auth_infoB as $kk=>$vv): if($vv['auth_pid'] == $v['auth_id']): ?><li><a href="/wei/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>" target="right"><i class="fa fa-fw fa-plus-square"></i><?php echo ($vv["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
                </ul>
            </li><?php endforeach; endif; ?>
           <!--  <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>商品管理</h3>
                <ul class="sub_menu">
                    <li><a href="<?php echo U('Goods/add');?>" target="right"><i class="fa fa-fw fa-plus-square"></i>增加商品</a></li>
                    <li><a href="<?php echo U('Goods/showlist');?>" target="right"><i class="fa fa-fw fa-list-ul"></i>商品列表</a></li>
 
                    <li><a href="<?php echo U('Goods/showlist');?>" target="right"><i class="fa fa-fw fa-image"></i>修改列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>订单管理</h3>
                <ul class="sub_menu">
                    <li><a href="add.html" target="right"><i class="fa fa-fw fa-plus-square"></i>添加页</a></li>
                </ul>
            </li>

              <li>
                <h3><i class="fa fa-fw fa-clipboard"></i>用户管理</h3>
                <ul class="sub_menu">
                    <li><a href="add.html" target="right"><i class="fa fa-fw fa-plus-square"></i>添加页</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>权限管理</h3>
                <ul class="sub_menu">
                    <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>管理员列表</a></li>
                    <li><a href="<?php echo U('Role/showlist');?>" target="right"><i class="fa fa-fw fa-database"></i>角色管理</a></li>     <li><a href="<?php echo U('Auth/showlist');?>" target="right"><i class="fa fa-fw fa-database"></i>权限管理</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件 	</a></li>
                </ul>
            </li> -->
        </ul>
	</div>


	</body>
</html>