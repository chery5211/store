<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
	
    public function showlist(){
    	$goods=M('goods');
    	//实现分页效果
    	$total=$goods->count();
    	$per=3;//每页显示7条记录
    	$page_obj= new \Tools\Page($total,$per);
    	$sql="select *from sw_goods order by goods_id desc ".$page_obj->limit;
		$info=$goods->query($sql);
		//获得页码列表
		$pagelist=$page_obj->fpage();
		$this->assign('pagelist',$pagelist);
		$this->assign('info',$info);

		$this->display();
    }

    public function add(){
             $goods=D('goods');
            //两个逻辑：展示表单、收集表单
            if(!empty($_POST)){
                if ($_FILES['good_image']['error']<4) {
                    //配置上传信息

                    $cfg=array(
                            'rootPath'=>'./Application/Public/uploads/'  //保存根路径
                        );
                    $up=new \Think\Upload($cfg);



                    //uploadOne()方法执行成功后会把附件（在服务器上）的名字和路径等相关信息返回给我们
                    $z=$up->uploadOne($_FILES['goods_image']);



                    $bigimg=$up->rootPath.$z['savepath'].$z['savename'];//大图路径  要往数据库里存
                    $smallimg=$up->rootPath.$z['savepath'].'small_'.$z['savename'];//小图路径名字，下面缩略图要用
                    //对上传好的图片制作缩略图


                    $im=new \Think\Image();//实例化Image对象
                    $im->open($bigimg);//打开被处理的图片
                    //制作缩略图
                    $im->thumb(77,69);//制作缩略图（默认有等比例缩放效果）
                    $im->save($smallimg);//保存缩略图到服务器 ，参数是小图路径名字，其中包含了图片名字
                    //把数据存入数据库
                    $_POST['goods_big_img']=ltrim($bigimg,'./');
                    $_POST['goods_small_img']=ltrim($smallimg,'./');
                    

                }
                //收集表单信息create方法
                $shuju=$goods->create();//收集$_POST信息 
                $shuju['goods_create_time']=date('Y-m-d H:i:s',time());


                $z=$goods->add($shuju);
                if ($z) {
                    // 页面跳转方法$this->redirect(地址，参数，延迟时间，提示信息);
                    $this->redirect('showlist',array('name'=>'tom','age'=>12),3,'添加商品成功');
                }
                else{
                    $this->redirect('add',array('name'=>'tom','age'=>12),3,'添加商品失败');
                }   
            

            }else{
            $info=M('Cate')->order('cate_path')->select();
            $this->assign('info',$info);

            $this->display();
            }
    }

          //商品更新
        function update( $goods_id){
            $goods=D('Goods');
            //两个逻辑  一个展示，一个收集
            if (!empty($_POST)) {
                $z=$goods->save($_POST);
                if ($z) {
                    // 页面跳转方法$this->redirect(地址，参数，延迟时间，提示信息);
                    $this->redirect('showlist',array(),3,'修改商品成功');
                }
                else{
                    $this->redirect('add',array('goods_id'=>$goods_id),3,'修改商品失败');
                }   
            }else{
                //根据$goods_id获得被修改的商品，并展示给模版看
            //find方法只负责给返回一条记录结果，并且是一维数组
            // $info=$goods->select($goods_id);结果是二维数组
            $info=$goods->find($goods_id);
            $this->assign('info',$info);
            $this->display();
            }

            
        }
        //删除

     function delete($goods_id){
        $goods=D('Goods');
        $z=$goods->delete($goods_id);
        if ($z) {
                    // 页面跳转方法$this->redirect(地址，参数，延迟时间，提示信息);
                    $this->redirect('showlist');
                }
    
    }
}