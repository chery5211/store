<?php
return array(
	//'配置项'=>'配置值'

	 'TMPL_PARSE_STRING'     =>array(
        //,自定义路径常量，用于后台样式加载
        '__HOME__'             =>  __ROOT__.'/Application/Home/Common/',
        //,自定义路径常量，用于后台JS样式加载
        '__HOMEJS__'             =>  __ROOT__.'/Application/Home/Common/js/',
        //,自定义路径常量，用于后台css样式加载
        '__HOMECSS__'             =>  __ROOT__.'/Application/Home/Common/css/',
        //,自定义路径常量，用于后台image加载
        '__HOMEIMG__'             =>  __ROOT__.'/Application/Home/Common/img/',
        //上传图片的位置
        
        
       /* '__ADMINCONFIG__'       =>  __ROOT__.'/Application/Admin/Common/'//定义后台所需引入文件的路径*/
    )
);