<?php
return array(
	//'配置项'=>'配置值'

	 'TMPL_PARSE_STRING'     =>array(
        //,自定义路径常量，用于后台样式加载
        '__ADMINCS__'             =>  __ROOT__.'/Application/Admin/Common/style/font/css/',
        //,自定义路径常量，用于后台JS样式加载
        '__ADMINJS__'             =>  __ROOT__.'/Application/Admin/Common/style/js/',
        //,自定义路径常量，用于后台css样式加载
        '__ADMINCSS__'             =>  __ROOT__.'/Application/Admin/Common/style/css/',
        //,自定义路径常量，用于后台image加载
        '__ADMINIMG__'             =>  __ROOT__.'/Application/Admin/Common/Images/',
        
       /* '__ADMINCONFIG__'       =>  __ROOT__.'/Application/Admin/Common/'//定义后台所需引入文件的路径*/
    )
);