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
 * @name    缓存模块
 * 
 * 
 */
class CacheAction extends AdminAction{
	public function _initialize() {
		parent::_initialize();	//RBAC 验证接口初始化
	}

	// 删除全部核心缓存
    public function delCore(){
		import("ORG.Io.Dir");
		$dir = new Dir;
		@unlink('./Temp/~runtime.php');		//删除主编译缓存文件
		@unlink('./Temp/~crons.php');		//删除计划任务缓存文件
		@unlink('./Temp/cron.lock');		//删除计划任务执行锁定文件
		if(is_dir('./Temp/Data')){$dir->delDir('./Temp/Data');}
		if(is_dir('./Temp/Temp')){$dir->delDir('./Temp/Temp');}
		if(is_dir('./Temp/Cache')){$dir->delDir('./Temp/Cache');}
		if(is_dir('./Temp/Logs')){$dir->delDir('./Temp/Logs');}
		echo('[清除成功]');
    }

}