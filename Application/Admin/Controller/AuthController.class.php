<?php
namespace Admin\Controller;
use Tools\AdminController;

class AuthController extends AdminController{

     //列表展示
	function showlist(){
		 //按照"auth_path"排序获得数据，以便信息按照“上下级”关系输出
        $info = D('Auth')->order('auth_path')->select();
 
  
        $this -> assign('info',$info);
        $this -> display();
	}

	//权限添加
	function  tianjia(){
		$auth=new \Model\AuthModel();
		//两个逻辑，收集和展示
		if (!empty($_POST)) {
			$z=$auth->saveData($_POST);//通过算法制作auth_path和auth_level字段，并实现填充
			if($z){
                $this -> redirect('showlist',array(),2,'添加权限success!');
            }else {
                $this -> redirect('tianjia',array(),2,'添加权限error!');
            }
		}else{
			
			$auth_infoA = $auth->order('auth_path')->select();
			$this -> assign('auth_infoA',$auth_infoA);
            $this -> display();
		}

	}

		//删除

	function delete(){
		$id=$_GET['id'];
		$ar=D('auth')->select();
		$arr=get_all_child($ar,$id); 
		D('auth')->where("auth_id=$id")->delete();
		
		foreach ($arr as $k => $v) {
			D('auth')->where("auth_id=$v")->delete();
		}
		$this->redirect('showlist',array(),2,"删除成功");
	}

	//修改
	function update(){
		if (!empty($_POST)) {
			$s=D('auth')->save($_POST);
			if ($s) {
				 $this -> redirect('showlist',array(),2,'修改success!');
			}else{
				$this -> redirect('update',array(),2,'修改error!');
			}

		}else{
			$id=$_GET['id'];
			$info=D('auth')->where("auth_id=$id")->find();
			$this->assign('info',$info);
			$this->display();
		}

	}




}