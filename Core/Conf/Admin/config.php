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
  'USER_AUTH_ON' => true,
  'USER_AUTH_TYPE' => 2,
  'USER_AUTH_KEY' => 'authId',
  'ADMIN_AUTH_KEY' => 'administrator',
  'USER_AUTH_MODEL' => 'User',
  'AUTH_PWD_ENCODER' => 'md5',
  'USER_AUTH_GATEWAY' => '/Admin/Login',
  'NOT_AUTH_MODULE' => 'Login,Public',
  'REQUIRE_AUTH_MODULE' => '',
  'NOT_AUTH_ACTION' => '',
  'REQUIRE_AUTH_ACTION' => '',
  'GUEST_AUTH_ON' => false,
  'GUEST_AUTH_ID' => 0,
  'RBAC_ROLE_TABLE' => 'tp_role',
  'RBAC_USER_TABLE' => 'tp_role_user',
  'RBAC_ACCESS_TABLE' => 'tp_access',
  'RBAC_NODE_TABLE' => 'tp_node',
  'SPECIAL_USER' => 'admin',
  'cms_name' => '后台管理系统',
  'cms_url' => 'http://www.4u4v.net',
  'cms_var' => '1.1.0',
  'end_year' => '2013',
  'cms_admin' => 'index.php',
);
?>