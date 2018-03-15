<?php

	namespace Model;
	use Think\Model;
	//为sw_user数据表创建一个Model模型类
	//父类Model:ThinkPHP/Library/Think/Model.class.php

	class UserModel extends Model{

		//可以自定义方法

		//是否批处理验证

		// protected $patchValidate =true;
		//自动验证定义  这是通过子类给父类model设置参数，   父类已经写好
		// protected  $_validate= array(
		// 	// array(字段，验证规则，错误提示，验证条件，附加规则，验证时间)，

		// 	//1用户名验证     不能为空require  唯一
		// 	array('username','require','用户名不能为空'),
		// 	array('username','','用户名已经存在',0,'unique'),
		// 	//2密码验证，   不能为空
		// 	array('password','require','密码 不能为空'),
		// 	//3确认密码   不能为空，并且与密码一致
		// 	array('password2','require','确认密码 不能为空'),
		// 	array('password2','password','密码必须保持一致','0','confirm'),
		// 	//4邮箱验证 
		// 	array('user_email','email','邮箱格式不正确'),

		// 	// 5QQ号码验证   纯数字  5--10位
		// 	array('user_tel','number','QQ号码必须为纯数字',2),
		// 	// array('user_qq','5,12','QQ号码必须在5--12位',2,'length'),
		// 	//6学历  必须选择
		// 	// array('user_xueli','2,5','学历必须选择一项',0,'between'),
		// 	//7爱好   必选   或两个以上

		// 	// array('user_hobby','check_hobby','爱好必选或 俩个以上',1,'callback'),

		//  );

		//验证爱好

		// function  check_hobby($arg){
		// 	if(count($arg)<2){
		// 		return false;
		// 	}
		// 	return true;
		// }	


		//用户名和密码校验

		function checkNamePwd($nm,$pwd){
			// $sql="select *from sw_manager where name=$nm and pwd= $pwd";一般这样容易产生sql注入问题  ，不推荐


			//1 根据$nm判断名字是否存在
			$info =$this->where("username='$nm'")->find();//find方法  有结果就返回结果信息保存在数组  没有就返回null
			//2 如果存在，就然记录的密码和$pwd比较
			
			if($info){
				if ($info['password']===$pwd) {
					return $info;
				}
				return null;
			}
		}
	}