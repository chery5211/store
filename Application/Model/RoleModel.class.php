<?php

	namespace Model;
	use Think\Model;
	//为sw_role数据表创建一个Model模型类
	//父类Model:ThinkPHP/Library/Think/Model.class.php

	class RoleModel extends Model{

		//制作数据（role_auth_ids   和 role_auth_ac）, 兵存储
		//$authid  是一个数组,由复选框提交过来的
		function saveAuth($roleid,$authid){
			//制作role_auth_ids  数组变字符串  
			$authids=implode(',',$authid);


			//制作role_auth_ac（控制器和操作方法的字符串） 根据id去查控制器和方法

			$authinfo=D('auth')->select($authids);

			$s="";
			foreach ($authinfo as $k => $v) {
				if (!empty($v['auth_c'])&&!empty($v['auth_a'])) {
					 $s.=$v['auth_c']."-".$v['auth_a'].",";

				}
				// $s = rtrim($s,',');
				// echo $s;

			}

			$sql="update sw_role set role_auth_ids='$authids',role_auth_ac='$s' where role_id='$roleid'";
			//$this  代表当前对面roleModel
			return $this->execute($sql);

		}
	} 