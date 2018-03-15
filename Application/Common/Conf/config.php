<?php
return array(
	//'配置项'=>'配置值'

	'URL_HTML_SUFFIX'     =>'',  //设置伪静态后缀的  默认是html

	//页面底部显示跟踪信息
	// 'SHOW_PAGE_TRACE'=>'true',

	//默认分组设置

	'DEFAULT_MODULE'=>'Home',//默认模块
	'MODULE_ALLOW_LIST'=> array('Home','Admin'),//定义可供访问的分组列表


	 //在这里为smarty做配置

	 // 'TMPL_ENGINE_CONFIG' => array(
	 // 			'left_delimiter'=>'<@@',//把左大括号变为
	 // 			'right_delimiter'=>'@@>',//把右大括号变为

	 // 	),


	  /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'wei',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  'sw_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8


);