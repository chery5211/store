<?php

	namespace Home\Controller;
	use Think\Controller;
class OrderController extends CommonController {
       
    public function order(){


       $user_id=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];
       $gwc=D('gwc');
       $user=D('user');
       if ($user_id==null) {
        $this->redirect('User/login');
       }
       $info=$gwc->where("gwc_user_id=$user_id")->select();
       $total=0; //总计
       //增加一个临时小计字段
        foreach ($info as $k => $v) {
        $info[$k]['xiaoji'] =$v['gwc_goods_num']*$v['gwc_goods_price'];
        $total = $total+$info[$k]['xiaoji'];
                    
       	}

       	$userinfo=$user->where("user_id= $user_id")->find();


       	$this->assign('userinfo',$userinfo);
        $this->assign('total',$total);
        $this->assign('info',$info);
             $infoA = D('Cate')->where("cate_level=0")->select();
      $this -> assign('infoA',$infoA);
             //判断登录按钮是否显示
      $uname=$_SESSION['user_name'];
      $this->assign('uname',$uname);

       $this->display();
    }

    public function add(){
    	 $user_id=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];


	   	$data=array(
        "order_id "=>"",
        "order_usrid"=>$user_id,
	   		"order_name"=>$_POST['order_name'],
	   		"order_email"=>$_POST['order_email'],
	   		"order_tel"=>$_POST['order_tel'],
        "order_addr"=>$_POST['order_addr'],
        "order_total"=>$_POST['total'],
	   		"order_time"=>date('Y-m-d H:i:s',time()),
	   		);
	   	$order=D('order');
	   	$r=$order->add($data);


      $info=D('gwc')->where("gwc_user_id=$user_id")->select();
      foreach ($info as $k => $v) {
        $info[$k]['time']=date('Y-m-d H:i:s',time());
      }
      
      $s=D('detailorder')->addAll($info);


    	   	if ($r && $s) {
	   			 $gwc=D('gwc');
	   			 $gwc->where("gwc_user_id = $user_id  ")->delete();
	   			$this->redirect('User/index',5,"下单成功，正在跳转...");
	   	}else{
	   		$this->redirect('order',3,"下单失败，正在跳转...");
	   	}

 
    }
}