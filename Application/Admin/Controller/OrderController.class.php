<?php

	namespace Admin\Controller;
	use Think\Controller;
class OrderController extends CommonController {
    public function addorder(){
       $this->display();
    }
    function showlist(){
    	$info=D('order')->select();
    	$this->assign('info',$info);
    	$this->display();
    }
}