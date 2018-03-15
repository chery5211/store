<?php
namespace Admin\Controller;
use Tools\AdminController;
class CateController extends AdminController{

     //列表展示
	function showlist(){
		 //按照"cate_path"排序获得数据，以便信息按照“上下级”关系输出
        $info = D('Cate')->order('cate_path')->select();


        $this -> assign('info',$info);
        $this -> display();
	}

	function  tianjia(){
		$cate=new \Model\CateModel();
		//两个逻辑，收集和展示
		if (!empty($_POST)) {
			$z=$cate->saveData($_POST);//通过算法制作cate_path和cate_level字段，并实现填充
			if($z){
                $this -> redirect('showlist',array(),2,'添加分类success!');
            }else {
                $this -> redirect('tianjia',array(),2,'添加分类error!');
            }
		}else{
			
			$cate_infoA = $cate->order('cate_path')->select();
			$this -> assign('cate_infoA',$cate_infoA);
            $this -> display();
		}

	}

	//删除分类

	function delete(){
		$id=$_GET['id'];

		$id=$_GET['id'];
		$ar=D('cate')->select();
		$arr=get_all_child($ar,$id); 
		D('cate')->where("cate_id=$id")->delete();
		
		foreach ($arr as $k => $v) {
			D('cate')->where("cate_id=$v")->delete();
		}
	
		$this->redirect('showlist',array(),2,"删除成功");
	}

	//修改分类
	function update(){
		if (!empty($_POST)) {
			$s=D('cate')->save($_POST);
			if ($s) {
				 $this -> redirect('showlist',array(),2,'修改分类success!');
			}else{
				$this -> redirect('update',array(),2,'修改分类error!');
			}

		}else{
			$id=$_GET['id'];
			$info=D('cate')->where("cate_id=$id")->find();
			$this->assign('info',$info);
			$this->display();
		}

	}



}