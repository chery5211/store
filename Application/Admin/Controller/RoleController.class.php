<?php
  //命名空间
namespace Admin\Controller;
// use Think\Controller;
use Tools\AdminController;

class RoleController extends AdminController{

     //列表展示
	function showlist(){
		$info =D('role')->select();
		$this->assign('info',$info);
		$this->display();
	}

	//给角色分配权限
	function   distribute($role_id){
		$role =new \Model\RoleModel();

		if (!empty($_POST)) {
			$z=$role->saveAuth($_POST['role_id'],$_POST['auth_id']);

				if ($z) {
					$this->redirect('showlist',array(),2,'分配success');
				}else{
					$this->redirect('distribute',array('role_id'=>$role_id),2,'分配error');
				}
		}else{
					$role_info=D('role')->find($role_id);

					//查询当前角色拥有的权限
					$have_authids=$role_info['role_auth_ids'];
					$have_authids=explode(',',$have_authids);//数组使得判断更严禁


					//获得可供选取分配的权限信息
					$auth_infoA=D('Auth')->where("auth_level=0")->select();//顶级
					$auth_infoB=D('Auth')->where("auth_level=1")->select();//一级



					$this->assign('have_authids',$have_authids);
					$this->assign('auth_infoA',$auth_infoA);
					$this->assign('auth_infoB',$auth_infoB);
					$this->assign('role_info',$role_info);
					$this->display();
		}


	}	

	//添加角色

	function tianjia(){
		if (!empty($_POST)) {
			$s=D('role')->add($_POST);
			if($s){
				$this->redirect('showlist',array(),2,"success");
			}else{
				$this->redirect('tianjia',array(),2,"error");
			}
		}else{
			$this->display();
		}
	}

		//修改
	function update(){
		if (!empty($_POST)) {
			$s=D('role')->save($_POST);
			if ($s) {
				 $this -> redirect('showlist',array(),2,'修改success!');
			}else{
				$this -> redirect('update',array(),2,'修改error!');
			}

		}else{
			$id=$_GET['id'];
			$info=D('role')->where("role_id=$id")->find();
			$this->assign('info',$info);
			$this->display();
		}

	}

		function delete(){
		$id=$_GET['id'];

		D('role')->where("role_id=$id")->delete();

		$this->redirect('showlist',array(),2,"删除成功");
	}


}