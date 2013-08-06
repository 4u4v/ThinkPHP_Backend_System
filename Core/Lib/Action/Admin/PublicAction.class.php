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
 * 后台公共模块
 * 注意：此模块没有RBAC控制
 */
 
 class PublicAction extends AdminAction{

 	//生成4位数验证码
    public function verify() {
    	import("ORG.Util.Image");	//图像操作类库
        $type	 =	 isset($_GET['type'])?$_GET['type']:'gif';
        Image::buildImageVerify(4,1,$type);
    }

 }