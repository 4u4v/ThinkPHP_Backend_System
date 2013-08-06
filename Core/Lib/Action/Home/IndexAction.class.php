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

class IndexAction extends HomeAction {
    public function index(){
		$this->title = '网站首页标题'; // 进行模板变量赋值
		$this->content = '<p>Home分组==>Index模块==>index操作</p>';
		$this->display();
	}

    public function ad(){
		$this->title = "网站首页广告"; // 进行模板变量赋值
		$this->content = '<p>这里是<a href="http://shuimu.js.cn">广告</a>内容</p>';
		$this->display();
	}
}