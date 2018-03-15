<?php

	namespace Home\Controller;
	use Think\Controller;
class GwcController extends CommonController {




       function gwc(){

               session_start();
               $user_id=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];

                if ($user_id==null) {
                   echo "<script> alert('请先登录');
                    window.history.back(-1);
                   </script>";
                 
                  return false;
                }

               $gwc=D('gwc');
               $goods=D('goods');
              
               $info=$gwc->where("gwc_user_id=$user_id")->select();
                   
               $total=0; //总计
            

                //增加临时字段
                foreach ($info as $k => $v) {
                   //小计
                   $info[$k]['xiaoji'] =$v['gwc_goods_num']*$v['gwc_goods_price'];
                 
                   //总价
                   $total = $total+$info[$k]['xiaoji'];
                    
                }

                  //获取左边四哥商品
            $info4=$goods->order('goods_view DESC')->limit(4)->select();
           
            //获取下面五个最近
             $info5=$goods->order('goods_create_time DESC')->limit(5)->select();
             $this->assign('info4',$info4);
             $this->assign('info5',$info5);
                       //判断登录按钮是否显示
              $uname=$_SESSION['user_name'];
              $this->assign('uname',$uname);
               $infoA = D('Cate')->where("cate_level=0")->select();
               $this -> assign('infoA',$infoA);
               $this->assign('total',$total);
               $this->assign('info',$info);

               $this->display();
         }

         //加入购物车

         function  addgwc(){
          // echo "11";

           $productid = intval($_POST['productid']);
           $num = intval($_POST['num']);
          
          

          session_start();
          $userid=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];
          
          if ($userid==null) {
            $response = array(
                  'errno'=>-1,
                  'errmsg'=>'添加失败',
                  'data'=>false
                  );
            echo json_encode($response);
            return false;
          }

          $goods=D('goods');
          $info=$goods->find($productid);
          // var_dump($info);

          //往购物车中添加数据进行判断
          $gwc=D('gwc');
          $re=$gwc->where("gwc_user_id = $userid  and gwc_goods_id= $productid ")->find();

          if($re){
          

            $re['gwc_goods_num']=$re['gwc_goods_num']+$num;


            $result=$gwc->where("gwc_goods_id= $productid ")->save($re);
         
          }else{
             $data['gwc_goods_big_img']=$info['goods_big_img'];
             $data['gwc_user_id']=$userid;
             $data['gwc_goods_price']=$info['goods_price'];
             $data['gwc_goods_price2']=$info['goods_price2'];
             $data['gwc_goods_name']=$info['goods_name'];
             $data['gwc_goods_id']=$productid;
             $data['gwc_goods_num']=$num;
            

             $result=$gwc->add($data);
        
          }

         if($result){
               $response = array(
                  'errno'=>0,
                  'errmsg'=>'添加成功',
                  'data'=>true
                  );
            }else{
               $response = array(
                  'errno'=>-1,
                  'errmsg'=>'添加失败',
                  'data'=>false
                  );
            }
            echo json_encode($response);

         }

         //购物车改变数量
         function changeNum(){

            //接受参数
               $productid = intval($_POST['productid']);
               $num = intval($_POST['num']);

                session_start();
                $userid=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];
                       if ($userid==null) {
            $response = array(
                  'errno'=>-1,
                  'errmsg'=>'添加失败',
                  'data'=>false
                  );
            echo json_encode($response);
            return false;
          }


                  $gwc=D('gwc');
                  $data['gwc_goods_num']=$num;

                  $re=$gwc->where("gwc_user_id = $userid  and gwc_goods_id= $productid ")->save($data);


              if($re){
            $response = array(
                  'errno'=>0,
                  'errmsg'=>'修改成功',
                  'data'=>true
                  );
         
             }else{
                $response = array(
                  'errno'=>-1,
                  'errmsg'=>'修改失败',
                  'data'=>false
                  );
             }
              echo json_encode($response);
              // $this->gwc1();

         }
         
         //删除商品
         function delCart(){
             $productid = intval($_POST['productid']);
             session_start();
             $userid=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];
                    if ($userid==null) {
            $response = array(
                  'errno'=>-1,
                  'errmsg'=>'添加失败',
                  'data'=>false
                  );
            echo json_encode($response);
            return false;
          }


             $gwc=D('gwc');

             $re=$gwc->where("gwc_user_id = $userid  and gwc_goods_id= $productid ")->delete();
    

            if($re){
            $response = array(
                  'errno'=>0,
                  'errmsg'=>'删除成功',
                  'data'=>true
                  );
         
             }else{
                $response = array(
                  'errno'=>-1,
                  'errmsg'=>'删除失败',
                  'data'=>false
                  );
             }
              echo json_encode($response);
         }

         //清空购物车

         function clearCart(){
            session_start();
             $userid=empty($_SESSION['user_id'])?"":$_SESSION['user_id'];
                    if ($userid==null) {
            $response = array(
                  'errno'=>-1,
                  'errmsg'=>'添加失败',
                  'data'=>false
                  );
            echo json_encode($response);
            return false;
          }


             $gwc=D('gwc');

             $re=$gwc->where("gwc_user_id = $userid ")->delete();
             // $this->ajaxReturn($re,'json');

               if($re){
            $response = array(
                  'errno'=>0,
                  'errmsg'=>'删除成功',
                  'data'=>true
                  );
         
             }else{
                $response = array(
                  'errno'=>-1,
                  'errmsg'=>'删除失败',
                  'data'=>false
                  );
             }
              echo json_encode($response);

         }
}