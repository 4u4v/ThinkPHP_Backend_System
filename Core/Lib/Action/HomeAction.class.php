<?php
/*
* Home分组公共类
*/
class HomeAction extends CmsAction{
    public function _initialize(){
		C('TOKEN_NAME','__cmsform__');
        parent::_initialize();
    }
    
	/*
	* 空操作
	* 前台模块操作指定错误时调用
	*/
    public function _empty(){
    	$this->display(C('ERROR_PAGE'));
    	exit;
    }
}