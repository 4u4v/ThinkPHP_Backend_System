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
 
class MemberModel extends Model {

	//自动验证
	protected $_validate = array(
		array('username','require','用户名称必须！',1,'',3),
		array('username','','用户名称已经存在！',1,'unique',3),
		array('email','email','请填写正确格式的邮箱',0,'regex'),
		array('password','require','请输入密码！'),
		array('repassword','password','确认密码不一样',1,'confirm'), // 验证确认密码是否和密码一致
		array('verify','require','验证码必须！',1,'',3), //默认情况下用正则进行验证
		array('verify','checkyzm','验证码不正确!',1,'callback',3), // 用回调方法校验验证码
	);

	//自定义函数验证码校验
	protected function checkyzm(){
		if($_SESSION['verify'] != md5($_POST['verify']))
			return false;
		else
			return true;
	}

	//自动完成
	protected $_auto = array ( 
		array('password','md5',1,'function'),	//使用MD5加密
		array('reg_time','time',1,'function'), 	//自动加入当前注册时间戳
		//array('reg_ip','127.0.0.1'), 	//默认注册IP
	);

}