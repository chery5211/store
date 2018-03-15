<?php

	namespace Home\Controller;
	use Think\Controller;
class UserController extends CommonController {

      //个人中心
      function index(){

               $user_id=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];

                if ($user_id==null) {
                   echo "<script> alert('请先登录');
                    window.history.back(-1);
                   </script>";
                 
                  return false;
                }
              

        //个人信息展示
        $userinfo=D('user')->where("user_id= $user_id")->find();
        $this->assign('userinfo',$userinfo);

        $info=D('detailorder')->where("gwc_user_id=$user_id")->order('time DESC')->select();
        $total=0; //总计
        //增加一个临时小计字段
        foreach ($info as $k => $v) {
        $info[$k]['xiaoji'] =$v['gwc_goods_num']*$v['gwc_goods_price'];
        $total = $total+$info[$k]['xiaoji'];
                    
        }

        //显示收藏商品
        $s=D('collect')->where("uid=$user_id")->field('gid')->select();
        $data='';
       foreach ($s as $v) {
         $data.=$v['gid'].',';
       }
       $s=rtrim($data,',');
        $where['goods_id']=array('in',$s);
        $goodsinfo=D('goods')->where($where)->select();
         $this->assign('goodsinfo',$goodsinfo);
 
          //判断登录按钮是否显示
         $uname=$_SESSION['user_name'];
         $this->assign('uname',$uname);

         $infoA = D('Cate')->where("cate_level=0")->select();
         $this->assign('total',$total);
         $this->assign('info',$info);
         $this -> assign('infoA',$infoA);
         $this->display();
      }
      //注册功能
      public function register(){

            //俩个逻辑：展示、收集
            $user= new \Model\UserModel();
            if (!empty($_POST)) {
               $shuju=$user->create();//收集表单｛$_POST｝信息并返回，同时触发表单验证 
           

               if ($shuju) {
                  // $shuju['user_hobby']=implode(',',$shuju['user_hobby']);  //使数组变成字符串String
                  if ($user->add()) {
                     // echo "存入数据成功";
                     $this->redirect('Index/index','',3,'注册成功三秒后跳转。。。');
                  }
               
               }else{
                  // var_dump($user->getError());//输出验证的错误信息
                  // $this->assign('errorinfo',$user->getError());//传递给模版  在模版中显示错误信息
                  $this->redirect('Index/index','',3,'注册失败三秒后跳转。。。');
               }
         }

         
      }


      //登录功能
   public function login(){
             if (!empty($_POST)) {
                  //对验证码的校验
                  $vry=new \Think\Verify();
                  if ($vry->check($_POST['captcha'])) {
                  $user= new \Model\UserModel();
                  $info=$user->checkNamePwd($_POST['usernames'],$_POST['password']);

                  if ($info) {
                  //session持久化用户信息，页面跳转到后台
                  session('user_id',$info['user_id']);
                  session('user_name',$info['username']);
                  // $this->success($_SERVER['HTTP_REFERER']);
                  $this->redirect('Index/index');

                  }else{
                     echo "<script>alert('用户名或密码错误');</script>";
                    // $this->msg="用户名或密码错误";
                  }
               }else{
                   echo "<script>alert('验证码错误');</script>";
                     // $this->msg="验证码错误";
               }
      

             }

            $this->display('Index/index');//展现视图（视图文件名字与当前操作方法名一致）
         }


   //取消收藏
         function cancel(){
            $user_id=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];
            $id = $_POST['id'];

            $s=D('collect')->where("gid = $id AND uid = $user_id")->delete();
            if ($s) {
               $response = array(
                  'errno'=>1,
                  'errmsg'=>'succes',
              
                  );
            
            }else{
               $response = array(
                  'errno'=>0,
                  'errmsg'=>'err',
              
                  );
            }

             echo json_encode($response);
         }
         //修改个人资料
         function update(){
           $user_id=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];

           $data=array(
             
              'username'=>$_POST['username'],
              'password'=>$_POST['pass'],
              'user_email'=>$_POST['email']
            );
      
           $s=D('user')->where("user_id = $user_id")->save($data);
           if ($s) {
               $response = array(
                  'errno'=>1,
                  'errmsg'=>'succes'
                  );
              }else{
                 $response = array(
                  'errno'=>0,
                  'errmsg'=>'error'
                  );
              }
              echo json_encode($response);

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

   //退出
   function out(){
      // session(null);
      session_destroy();
      $this->redirect('Index/index');
   }
}