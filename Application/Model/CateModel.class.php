<?php

namespace Model;
use Think\Model;

class CateModel extends Model{
    //实现权限添加逻辑
    function saveData($data){
 
        $newid = $this -> add($data);//插入一条记录，返回newID
        //2) 制作auth_path
        if($data['cate_pid']==0){
        //  ① 顶级权限 auth_path=====新记录主键id值
            $path = $newid;
        }else{
        //  ② 非顶级权限  根据pid获得父级权限信息，进而获得其“全路径”
        //     父级全路径-新记录主键id值
            $pinfo = $this -> find($data['cate_pid']);
            $path = $pinfo['cate_path']."-".$newid;
        }
        //3) 制作auth_level
        //   全路径里边"-"数量就是auth_level的值
        //   substr_count()计算一个字符串中出现的目标内容次数
        $level = substr_count($path,'-');
        
        $sql = "update sw_cate set cate_path='$path',cate_level='$level' where cate_id='$newid'";
        return $this -> execute($sql);
    }

}
