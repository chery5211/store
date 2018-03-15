<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends CommonController {
    //自动加载方法  防止非法登录
      //也可以写到构造方法里面, 要注意不要覆盖掉父类的构造方法  记得加 parent::__construct();

      // public function _initialize(){
      //   if(!isset($_SESSION['user_id'])) {
      //        header('Content-Type:text/html;charset=utf8');
      //        redirect(U('User/login'),3,"正在跳转...");
      //   }
      // }

   		//商品列表
   		public function showlist(){
            $goods= D('goods');

           //实现分页效果
      $total=$goods->count();
      $per=5;//每页显示7条记录
      $page_obj= new \Tools\Page($total,$per);
      $sql="select *from sw_goods order by goods_id desc ".$page_obj->limit;
      $info=$goods->query($sql);
      //获得页码列表
      $pagelist=$page_obj->fpage();
      $this->assign('pagelist',$pagelist);
      $this->assign('info',$info);
      $infoA = D('Cate')->where("cate_level=0")->select();
       $this -> assign('infoA',$infoA);
       //判断登录按钮是否显示
      $uname=$_SESSION['user_name'];
      $this->assign('uname',$uname);

      $this->display();
   		}
       //商品详情
         public function detail($goods_id){
            $goods=D('goods');

            $goods-> where("goods_id=$goods_id")->setInc('goods_view');
            $info=$goods->find($goods_id);
            // $info['goods_number']++; 
            $this->assign('info',$info);
            $infoA = D('Cate')->where("cate_level=0")->select();
            $this -> assign('infoA',$infoA);

            //获取左边四哥商品
            $info4=$goods->order('goods_view DESC')->limit(4)->select();
           
            //获取下面五个最近
             $info5=$goods->order('goods_create_time DESC')->limit(5)->select();
             $this->assign('info4',$info4);
             $this->assign('info5',$info5);
            //判断登录按钮是否显示
            $uname=$_SESSION['user_name'];
            $this->assign('uname',$uname);
            $this->display();
         }

     //商品收藏
     function collect(){
        if (!session('user_id')) {
             $response = array(
                  'errno'=>2,
                  'errmsg'=>'请先登录',
                  'data'=>false
                  );
             echo json_encode($response);
             return false;
        }
        $uid=session('user_id');
        $id=$_POST['id'];
         $data=array(
              'uid' =>session('user_id'),
              'gid' =>$id

          );

         $q=M('collect')->where("gid = $id AND uid = $uid")->find();
         if ($q) {
            $response = array(
                  'errno'=>3,
                  'errmsg'=>'已收藏',
                  'data'=>false
                  );
             echo json_encode($response);
             return false;
         }else{
              $s=M('collect')->data($data)->add();
              if ($s) {
                $response = array(
                  'errno'=>1,
                  'errmsg'=>'收藏成功',
                  'data'=>false
                  );
              }else{
                $response = array(
                  'errno'=>-1,
                  'errmsg'=>'失败收藏',
                  'data'=>false
                  );
              }
               echo json_encode($response);
         }

     

     }  


}