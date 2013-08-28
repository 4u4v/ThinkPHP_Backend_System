<?php

// +----------------------------------------------------------------------
// | ThinkPHP通用后台管理系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 www.4u4v.net All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 水木清华 <admin@4u4v.net>
// +----------------------------------------------------------------------


/**
 * @name $config 系统配置文件
 */
$config = require './config.php';
$array = array(
		'APP_GROUP_LIST'       => 'Admin,Home',	// 分组
		'TMPL_FILE_DEPR'       => '_',			// 模板文件MODULE_NAME与ACTION_NAME之间的分割符，只对项目分组部署有效
		'DEFAULT_GROUP'        => 'Home', 		// 默认分组
		'URL_MODEL'            => 2,			// URL兼容模式
		'URL_HTML_SUFFIX'      => 'html',       // URL伪静态后缀设置
		'URL_CASE_INSENSITIVE' => true,			// URL是否不区分大小写 默认区分大小写
		'DB_FIELDTYPE_CHECK'   => true, 		// 是否进行字段类型检查
		'DATA_CACHE_SUBDIR'    => true,			// 哈希子目录动态缓存的方式
		'DATA_PATH_LEVEL'      => 2,
		'TMPL_STRIP_SPACE'     => false,		//是否去除模板文件里面的html空格与换行
		
		'TOKEN_ON'             => true,  // 是否开启令牌验证
		'TOKEN_NAME'           => '__hash__',    // 令牌验证的表单隐藏字段名称
		'TOKEN_TYPE'           => 'md5',  //令牌哈希验证规则 默认为MD5
		'TOKEN_RESET'          => true,  //令牌验证出错后是否重置令牌 默认为true

		'TMPL_ACTION_ERROR'    => './Public/tips/tips.html', // 默认错误跳转对应的模板文件
		'TMPL_ACTION_SUCCESS'  => './Public/tips/tips.html', // 默认成功跳转对应的模板文件
		'ERROR_PAGE'           => './Public/tips/error.html',// 异常和错误
		
		'SHOW_PAGE_TRACE'      => true,	 // 显示TRACE页面
/*
		//邮件配置
		'SMTP_SERVER' =>'smtp.163.com',					//邮件服务器
		'SMTP_PORT' =>25,								//邮件服务器端口
		'SMTP_USER_EMAIL' =>'4u4v@163.com', 	//SMTP服务器的用户邮箱(一般发件人也得用这个邮箱)
		'SMTP_USER'=>'4u4v@163.com',			//SMTP服务器账户名
		'SMTP_PWD'=>'15083523531',							//SMTP服务器账户密码
		'SMTP_MAIL_TYPE'=>'HTML',						//发送邮件类型:HTML,TXT(注意都是大写)
		'SMTP_TIME_OUT'=>60,							//超时时间
		'SMTP_AUTH'=>true,								//邮箱验证(一般都要开启)
*/		
		//多语言配置
		'LANG_SWITCH_ON'       => true,   // 开启多语言功能
		'LANG_AUTO_DETECT'     => true, // 自动侦测语言 开启多语言功能后有效
		'DEFAULT_LANG'         => 'zh-cn', // 默认语言
		'LANG_LIST'            => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
		'VAR_LANGUAGE'         => 'l', // 默认语言切换变量
		
);
return array_merge($config,$array);