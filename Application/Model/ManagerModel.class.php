<?php

	namespace Model;
	use Think\Model;

	class ManagerModel extends Model{
		//用户名和密码校验

		function checkNamePwd($nm,$pwd){
			// $sql="select *from sw_manager where name=$nm and pwd= $pwd";一般这样容易产生sql注入问题  ，不推荐


			//1 根据$nm判断名字是否存在
			$info =$this->where("mg_name='$nm'")->find();//find方法  有结果就返回结果信息保存在数组  没有就返回null
			//2 如果存在，就然记录的密码和$pwd比较
			
			if($info){
				if ($info['mg_pwd']===$pwd) {
					return $info;
				}
				return null;
			}
		}
	}