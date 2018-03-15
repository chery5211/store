<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
      // public function _initialize(){
      //   if(!isset($_SESSION['user_id'])) {
      //        header('Content-Type:text/html;charset=utf8');
      //        redirect(U('User/login'),3,"请登录，正在跳转...");
      //   }
      // }

    public function index(){


    	$goods=D('goods');
    	//最新
    	$new=$goods->order('goods_create_time desc')->limit(7)->select();
    	//最热 
    	$re=$goods->order('goods_view desc')->limit(3)->select();
    	//特价
    	$t=$goods->where('goods_price < 400 ')->order('goods_price asc')->limit(3)->select();
    	//新品三个
    	$new1=$goods->order('goods_create_time desc')->limit(3)->select();
      $infoA = D('Cate')->where("cate_level=0")->select();
      $this -> assign('infoA',$infoA);
     
      $uname=$_SESSION['user_name'];
      $this->assign('uname',$uname);
    	$this->assign('new',$new);
    	$this->assign('re',$re);
    	$this->assign('t',$t);
    	$this->assign('new1',$new1);
      $this->display();
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

   // 异步校验用户名是否存在

   function ckname(){
    $name=$_POST['name'];
    $re=M('user')->where("username = '$name'")->find();
    
    if ($re) {
       $response = array(
                  'errno'=>1,
                  'errmsg'=>'用户名已存在',
                  'data'=>false
                  );
      }else{
         $response = array(
                  'errno'=>0,
                  'errmsg'=>'用户名可用',
                  'data'=>true
                  );
      }

      echo json_encode($response);
   }


}