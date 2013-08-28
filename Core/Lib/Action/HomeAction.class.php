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

/*
* Home分组公共类
*/
class HomeAction extends CmsAction{
    public function _initialize(){
		C('TOKEN_NAME','__cmsform__');
        parent::_initialize();
        // 前台用户权限检查
        if (C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
            import('ORG.Util.RBAC');
            if (!RBAC::AccessDecision($appName='Home')) {
                //检查认证识别号
                if (!$_SESSION [C('USER_AUTH_KEY')]) {
                    //跳转到认证网关
                    redirect(PHP_FILE.C('USER_AUTH_GATEWAY'), 3, '<p><br />跳转到登录页面中...</p>');
                }else{
                    echo "会员验证成功！";
                    //exit();
                }
                // 没有权限
            }
        }
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