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
 * 前台入口模块
 * 
 */
//class IndexAction extends Action

class UserAction extends HomeAction {
    public function index(){
		$this->title = '网站会员模块标题'; // 进行模板变量赋值
		$this->content = '<p>Home分组==>User模块==>index操作</p>';
		$this->display();
	}

    public function reg(){
		$this->title = "会员注册"; // 进行模板变量赋值
		$this->content = '<p>这里设计一个会员注册表单</p>';
		$this->display();
	}

    public function login(){
		$this->title = "会员登录"; // 进行模板变量赋值
		$this->content = '<p>这里设计一个会员登录机制（主要是验证机制）</p>';
		$this->display();
	}
}