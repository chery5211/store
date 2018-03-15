<?php
  //命名空间
namespace Home\Controller;
// use Think\Controller;
// use Tools\AdminController;
use Think\Controller;

class CateController extends Controller{

     //列表展示
	function showlist(){
		 //按照"auth_path"排序获得数据，以便信息按照“上下级”关系输出
       $infoA = D('Cate')->where("cate_level=0")->select();

       $infoB = D('Cate')->where("cate_level=1")->select();

       $goods= D('goods');

           //实现分页效果
      $total=$goods->count();
      $per=5;//每页显示7条记录
      $page_obj= new \Tools\Page($total,$per);
      $sql="select *from sw_goods order by goods_id desc ".$page_obj->limit;
      $info=$goods->query($sql);
      //获得页码列表
      $pagelist=$page_obj->fpage();
      $this->assign('pagelist',$pagelist);
      $this->assign('info',$info);

             //判断登录按钮是否显示
      $uname=$_SESSION['user_name'];
      $this->assign('uname',$uname);

  	
        $this -> assign('infoA',$infoA);
        $this -> assign('infoB',$infoB);
        $this -> display();
	}

	//单个分类详情展示
	function cates(){
		$id=$_GET['id'];
		$name=D('Cate')->where("cate_id=$id")->getField('cate_name');


	   $infoA = D('Cate')->where("cate_level=0")->select();

       $infoB = D('Cate')->where("cate_level=1")->select();

       $goods= D('goods');


           //实现分页效果
      $total=$goods->count();
      $per=3;//每页显示7条记录
      $page_obj= new \Tools\Page($total,$per);
      $sql="select *from sw_goods  where goods_category_id=$id order by goods_id desc ".$page_obj->limit;
      $info=$goods->query($sql);

      //获得页码列表
      $pagelist=$page_obj->fpage();
      $this->assign('pagelist',$pagelist);
      $this->assign('info',$info);
  	
           //判断登录按钮是否显示
      $uname=$_SESSION['user_name'];
      $this->assign('uname',$uname);
      
        $this -> assign('name',$name);
        $this -> assign('infoA',$infoA);
        $this -> assign('infoB',$infoB);
        $this -> display();


	}
	function ca(){
		$id=$_GET['id'];
		$name=D('Cate')->where("cate_id=$id")->getField('cate_name');
		$path=D('Cate')->where("cate_pid=$id")->select();

		$arr=array();
		foreach ($path as $key => $v) {
			$arr[]=$v['cate_id'];
		}
		$str=implode(",", $arr);

		  $infoA = D('Cate')->where("cate_level=0")->select();

       $infoB = D('Cate')->where("cate_level=1")->select();

       $goods= D('goods');


        //实现分页效果
      $total=$goods->count();
      $per=3;//每页显示7条记录
      $page_obj= new \Tools\Page($total,$per);
      $sql="select *from sw_goods  where goods_category_id in($str) order by goods_id desc ".$page_obj->limit;
      $info=$goods->query($sql);
 

      //获得页码列表
      $pagelist=$page_obj->fpage();
      $this->assign('pagelist',$pagelist);
      $this->assign('info',$info);
  	
        $this -> assign('name',$name);
        $this -> assign('infoA',$infoA);
        $this -> assign('infoB',$infoB);
        $this -> display();
	}



}