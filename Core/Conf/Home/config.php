<?php 
 return array (
  'default_theme' => 'default',
  'USER_AUTH_ON' => true,
  'USER_AUTH_TYPE' => 1,
  'USER_AUTH_KEY' => 'authId',
  'ADMIN_AUTH_KEY' => 'admin',
  'USER_AUTH_MODEL' => 'Member',
  'AUTH_PWD_ENCODER' => 'md5',
  'USER_AUTH_GATEWAY' => '/User/Login',
  'NOT_AUTH_MODULE' => 'Login,Index',
  'REQUIRE_AUTH_MODULE' => 'User',
  'NOT_AUTH_ACTION' => '',
  'REQUIRE_AUTH_ACTION' => 'index',
  'GUEST_AUTH_ON' => false,
  'GUEST_AUTH_ID' => 0,
  'RBAC_ROLE_TABLE' => '',
  'RBAC_USER_TABLE' => '',
  'RBAC_ACCESS_TABLE' => '',
  'RBAC_NODE_TABLE' => '',
); 
 ?>