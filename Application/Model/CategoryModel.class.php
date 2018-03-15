<?php

  namespace Model;
  use \Think\Model;

  class CategoryModel extends Model{

  			public function getCate($id,&$result=array()){
	 		
  				header('Content-Type:text/html;charset=utf8');
	 			$where=array('cat_pid'=>$id);
  				$re=$this->where($where)->find();;
	 			// if ($re) {
	 			// 	$result[]=$re;

	 			// 	// foreach ($re as $k => $v) {
	 			// 		$this->getCate($re[0]['cat_pid'],$result);
	 			// 	// }
	 			
	 			// }
	
	 		
	 		
	
	 	
	 		return $result;
	 				

	 			
	 	}
  }