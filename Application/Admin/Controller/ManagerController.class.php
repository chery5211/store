<?php

	namespace Admin\Controller;
	use Think\Controller;
class ManagerController extends CommonController {
   //管理员登录系统
	function login(){
		//两个逻辑：展示表单，收集表单

		if (!empty($_POST)) {
			//对验证码的校验
		
			$vry=new \Think\Verify();
			if ($vry->check($_POST['captcha'])) {
				//用户名和密码校验

				$manager= new \Model\ManagerModel();

				//在ManagerModel 里边丰富一个checkNamePwd方法，校验用户名和密码
				//校验成功后 把当前管理员的一条记录信息都返回
				//校验失败返回null
				$info=$manager->checkNamePwd($_POST['admin_user'],$_POST['admin_psd']);
				if ($info) {
					//session持久化用户信息，页面跳转到后台
					session('admin_id',$info['mg_id']);
					session('admin_name',$info['mg_name']);

					$this->redirect('Index/index');

				}else{
					$this->msg="用户名或密码错误";
				
				}


			}else{
				$this->msg="验证码错误";
			}
		}

		$this->display();

	}

	//管理员列表
	function showlist(){
		$info=D('manager')->select();
		$this->assign('info',$info);
		$this->display();
	}

	//添加管理员
	function tianjia(){
		if (!empty($_POST)) {
			$time=time();
			$_POST['mg_time']=$time;
			$s=D('manager')->add($_POST);
			if ($s) {
				$this->redirect('showlist',array(),2,"success");
			}else{
				$this->redirect('tianjia',array(),2,"error");
			}
		}else{
			$info=D('role')->select();
			$this->assign('info',$info);
			$this->display();
		}
	}

		function delete(){
		$id=$_GET['id'];

		D('manager')->where("mg_id=$id")->delete();

		$this->redirect('showlist',array(),2,"删除成功");
	}

	//输出验证码
	function verifyImg(){
		//给验证码配置
			ob_clean();
		$cfg=array(
			'imageH'=> 30 ,   //验证码高度 
			'imageW'=> 80 ,
			'fontSize'=>12 , //字体大小
			'length'=>4,   //验证码位数
			'fontttf'=>'4.ttf',
			);
		//实例化Verify类
		$very=new \Think\Verify($cfg);//  new \Think\Verify();
		$very->entry();//输出验证码


	}

	//退出系统
	function logout(){
		//清楚session，同时跳转到登录页面

		session(null);
		$this->redirect('login');
	}


}