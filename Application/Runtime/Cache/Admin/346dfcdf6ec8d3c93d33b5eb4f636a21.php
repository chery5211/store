<?php if (!defined('THINK_PATH')) exit();?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/wei/Application/Admin/Common/style/css/ch-ui.admin.css">
  <link rel="stylesheet" href="/wei/Application/Admin/Common/style/font/css/font-awesome.min.css">
  <script type="text/javascript" src="/wei/Application/Admin/Common/style/js/jquery.js"></script>
    <script type="text/javascript" src="/wei/Application/Admin/Common/style/js/ch-ui.admin.js"></script>
</head>
  <body>

 

  


<div class="main_box">
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="<?php echo U('Goods/add');?>" method="post" enctype="multipart/form-data">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="goods_category_id">
                                <?php if(is_array($info)): foreach($info as $k=>$v): ?><option value="<?php echo ($v["cate_id"]); ?>"><?php echo str_repeat('---', $v['cate_level']); echo ($v["cate_name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>商品名称：</th>
                        <td>
                            <input type="text" class="lg" name="goods_name">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th>库存：</th>
                        <td>
                            <input type="text" name="goods_number">
                           
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>原价格：</th>
                        <td>
                            <input type="text" class="sm" name="goods_price2">元
                        </td>
                    </tr>                    
                    <tr>
                        <th><i class="require">*</i>现价格：</th>
                        <td>
                            <input type="text" class="sm" name="goods_price">元
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>图片：</th>
                        <td><input type="file" name="goods_image"></td>
                    </tr>
                    <tr>
                        <th>详细内容：</th>
                        <td>
                            <textarea class="lg" name="goods_introduce"></textarea>

                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
</body>
<html>