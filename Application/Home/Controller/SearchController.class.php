<?php
namespace  Home\Controller;
use  Think\Controller;

class SearchController extends Controller{

	function sear(){
		
		$goods=D('goods');
	
		$key=addslashes($_GET['key']);
		$where['goods_name']=array('like',"%$key%");

		$total=$goods->where($where)->count();
		if ($total==0) {
			$url=$_SERVER['HTTP_REFERER'];
			echo "<script>alert('查无此商品');
			window.location.href='$url';
			</script>";

			return false;
		}
		
		//实现分页效果
      $per=3;//每页显示7条记录
      $page_obj= new \Tools\Page($total,$per);
      $info=$goods->where($where)->limit($page_obj->limit)->select();

      //获得页码列表
      $pagelist=$page_obj->fpage();
      $this->assign('pagelist',$pagelist);
      $this->assign('info',$info);
      $infoA = D('Cate')->where("cate_level=0")->select();
       $this -> assign('infoA',$infoA);
       //判断登录按钮是否显示
      $uname=$_SESSION['user_name'];
      $this->assign('uname',$uname);
	 $this->display();
	  
		
	}
	
}