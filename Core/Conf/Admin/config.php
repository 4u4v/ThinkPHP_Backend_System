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

return array (
  'default_theme' => 'default',
  'USER_AUTH_ON' => true,               // 开启认证
  'USER_AUTH_TYPE' => 2,			    // 默认认证类型，1为登录认证，2为实时认证
  'USER_AUTH_KEY' => 'authId',          // 用户认证SESSION标记
  'ADMIN_AUTH_KEY' => 'administrator',  // 管理员用户标记
  'USER_AUTH_MODEL' => 'User',          // 默认验证数据表模型
  'AUTH_PWD_ENCODER' => 'md5',          // 用户认证密码加密方式
  'USER_AUTH_GATEWAY' => '/Admin/Login',// 默认认证网关
  'NOT_AUTH_MODULE' => 'Login,Public',  // 默认无需认证模块
  'REQUIRE_AUTH_MODULE' => '',          // 默认需要认证模块
  'NOT_AUTH_ACTION' => '',              // 默认无需认证操作
  'REQUIRE_AUTH_ACTION' => '',          // 默认需要认证操作
  'GUEST_AUTH_ON' => false,             // 是否开启游客授权访问
  'GUEST_AUTH_ID' => 0,                 // 游客的用户ID
  'RBAC_ROLE_TABLE' => 'tp_role',       // 角色表
  'RBAC_USER_TABLE' => 'tp_role_user',  // 角色分配表
  'RBAC_ACCESS_TABLE' => 'tp_access',   // 权限分配表
  'RBAC_NODE_TABLE' => 'tp_node',       // 节点表
  'SPECIAL_USER' => 'admin',
  'TMPL_PARSE_STRING' =>  array( // 添加输出替换
        '__UPLOAD__'  =>  __ROOT__.'/admin/uploads',
    ),
  'cms_name' => '后台管理系统',
  'cms_url' => 'http://www.4u4v.net',
  'cms_var' => '1.3.3',
  'end_year' => '2013',
  'cms_admin' => 'index.php',
);
?>