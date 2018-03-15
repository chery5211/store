<?php
namespace  Home\Controller;
use Think\Controller;

class ComController extends Controller{

	//提交评论处理业务
	function comment(){
		
		$id=session('user_id');
		if (!$id) {
				echo "";
				return false;
				die;
		}
		//提取post提交的评论数据
			$data = array(
			'content' => $_POST['content'],
			'time' => date('Y-m-d H:i:s'),
			'uid' => session('user_id'),
			'uname' => session('user_name'),
			'gid' => $_POST['gid']
			);

			if( M('comment')->data($data)->add() ){
				//组合评论样式
				// $str="";
				// $str.="<div class='info'>";
				// $str.="<p>Name:{$data['uname']}</p>";
				// $str.="<p>Time:{$data['time']}</p>";
				// $str.="<p>Info:{$data['content']}</p>";
				// $str.="</div><hr/>";
				// echo $str;
			echo "1";


			}else{
				return false;
			}
	}
	//获取评论列表业务
	function getComment(){

			$id=session('user_id');
			$gid=$_POST['gid'];
			// if (!$id) {
			// 		echo "false";
			// 		return false;
			// 		die;
			// }
			$info=M('comment')->where("gid =$gid ")->order('time DESC')->select();
            
          
		  	if($info){
		  		$str="";
		  		foreach ($info as $k => $v) {
		  			
				$str.="<div class='info{$v['id']}'>";
				$str.="<p>Name:{$v['uname']}</p>";
				$str.="<p>Time:{$v['time']}</p>";
				$str.="<p>Info:{$v['content']}</p>";
				$url=U('Com/del',array('id'=>$v['id']));
				if ($id==$v['uid']) {
					$str.="<p><a href='javascript:delCom({$v['id']})'>删除</a></p>";
				}
				
				$str.="</div><hr/>";
		  		}
		  		echo $str;

		   	}

	}

	//删除评论

	function del(){
		$id=$_POST['id'];
		$re=M('comment')->delete($id);

		if ($re) {
			$response=array(
				  'errno'=>1,
                  'errmsg'=>'成功',
                  'data'=>true

				);
		}else{
				$response=array(
				  'errno'=>0,
                  'errmsg'=>'失败',
                  'data'=>false

				);
		}

		echo  json_encode($response);
	}

}