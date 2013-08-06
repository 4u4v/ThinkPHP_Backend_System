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
 * @name 系统配置模块
 */
class ConfigAction extends AdminAction{
    public function _initialize() {
        parent::_initialize();  //RBAC 验证接口初始化
    }

	// 基本信息设置
    public function conf(){
		$id           = $this->_get('id','trim','web');
		$config       = require './config.php';	//网站配置
		$config_admin = require APP_PATH.'Conf/Admin/config.php';	//后台分组配置
		$config_home  = require APP_PATH.'Conf/Home/config.php';	//前台分组配置
		$tpl          = './Template/Home/*';		//前台模板
		$list         = glob($tpl);
		foreach($list as $i => $file){
			if (!is_file($file) && $file != "." && $file != ".." )
			$temp[$i]['filename']=basename($file);
		}
		$this->assign('temp',$temp);
		$this->assign('con',$config);
		$this->assign('con_admin',$config_admin);
		$this->assign('con_home',$config_home);
	    $this->display($id);
    }
    
	// 配置信息保存
    private function updateconfig($config){
    	foreach ($config as $k => $c) {
    		$config_old = array();
    		$config_new = array();
    		switch ($k) {
    			case 'con':
					$config_old = require './config.php';
					if(is_array($c)) $config_new = array_merge($config_old,$c);
					arr2file('./config.php',$config_new);
    				break;

    			case 'con_admin':
					$config_old = require APP_PATH.'Conf/Admin/config.php';
					if(is_array($c)) $config_new = array_merge($config_old,$c);
					arr2file(APP_PATH.'Conf/Admin/config.php',$config_new);
    				break;
    			
    			case 'con_home':
					$config_old = require APP_PATH.'Conf/Home/config.php';
					if(is_array($c)) $config_new = array_merge($config_old,$c);
					arr2file(APP_PATH.'Conf/Home/config.php',$config_new);
    				break;
    		}

    	}
    	@unlink('./temp/~app.php');
		$this->success('更新成功！');
	}
	
	//更新web相关配置
    public function updateweb(){
		$con                      = $_POST["con"];
		if(isset($_POST["con_home"]))
		$con_home                 = $_POST["con_home"];
		if(isset($con['web_url']))
		$con['web_url']           = getaddxie($con['web_url']);
		if(isset($con['web_path']))
		$con['web_path']          = getaddxie($con['web_path']);
		if(isset($con['web_adsensepath']))
		$con['web_adsensepath']   = getrexie($con['web_adsensepath']);
		if(isset($con['web_copyright']))
		$con['web_copyright']     = stripslashes($con['web_copyright']);
		if(isset($con['web_tongji']))
		$con['web_tongji']        = stripslashes($con['web_tongji']);
		if(isset($con['web_admin_pagenum']))
		$con['web_admin_pagenum'] = abs(intval($con['web_admin_pagenum']));
		if(isset($con['web_home_pagenum']))
		$con['web_home_pagenum']  = abs(intval($con['web_home_pagenum']));
		if(isset($con['web_adsensepath'])){
			$dir                      = './'.$con['web_adsensepath'];	//广告保存目录
			if(!is_dir($dir)){
				mkdirss($dir);
			}
		}
		if(isset($con_home)){
			$config = array('con'=>$con,'con_home'=>$con_home);
		}else{
			$config = array('con'=>$con);
		}
		$this->updateconfig($config);
	}

	//更新数据库链接配置
    public function updatedb(){
		$con = $_POST["con"];
		$con['db_port'] = abs(intval($con['db_port']));
		$config = array('con'=>$con);
		$this->updateconfig($config);
	}
	
}