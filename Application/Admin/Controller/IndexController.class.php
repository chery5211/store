<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
       $this->display();
    }
    //右部
	function left(){
		//根据管理员获得其角色，进而获得绝色对应的权限
		//根据管理员id信息获得	其本身记录信息
		$admin_id=session('admin_id');
		// $admin_name=seesion('admin_name');
		$manager_info=D('Manager')->find($admin_id);
		$role_id=$manager_info['mg_role_id'];

		//2根据$role_id获得本身记录信息

		$role_info=D('role')->find($role_id);
		$auth_ids=$role_info['role_auth_ids'];

		//3根据  $auth_ids  获得具体权限
		//为了在后面模版页面中遍历数据库中的信息，这里将父级和子级信息分开获取
		//将select方法中的条件  放入where方法中   要不然后面会覆盖前面 导致sql语句不完整

		if ($admin_name==='admin') {
			$auth_infoA=D('auth')->where("auth_level=0 ")->select();//父级
			$auth_infoB=D('auth')->where("auth_level=1 ")->select();//子级
		}else{
			$auth_infoA=D('auth')->where("auth_level=0 and auth_id in($auth_ids)")->select();//父级
			$auth_infoB=D('auth')->where("auth_level=1 and auth_id in($auth_ids)")->select();//子级
		}
		$this->assign('auth_infoA',$auth_infoA);
		$this->assign('auth_infoB',$auth_infoB);


		$this->display();

	}
    //右部
	function right(){
		$this->display();
	}
}