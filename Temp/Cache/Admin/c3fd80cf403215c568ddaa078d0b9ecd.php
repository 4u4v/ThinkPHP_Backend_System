<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台用户管理-<?php echo (C("cms_name")); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel='stylesheet' type='text/css' href='__PUBLIC__/Admin/css/admin_style.css' />
	<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/js/function.js"></script>
	<style>td{ height:22px; line-height:22px}</style>
</head>
<body>
	<table width="98%" border="0" cellpadding="9" cellspacing="1" class="table">
		<tr>
			<td colspan="9" class="table_title">
				<span class="fl">后台用户管理</span>
				<span class="fr">
					<a href="<?php echo U('/Admin/User/add');?>">添加用户</a>
				</span>
			</td>
			<tr class="list_head ct">
				<td width="70">ID</td>
				<td width="150">用户名称</td>
				<td width="150">角色名称</td>
				<td >用户描述</td>
				<td width="100">最后登录IP</td>
				<td width="150">最后登录位置</td>
				<td width="150">最后登录时间</td>
				<td width="70">状态</td>
				<td width="100">管理操作</td>
			</tr>
	    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class='<?php if(($mod) == "1"): ?>tr<?php else: ?>ji<?php endif; ?>'>
				<td align='center'><?php echo ($vo["id"]); ?></td>
				<td ><?php echo ($vo["username"]); ?></td>
				<td ><?php echo ($role[$vo['role']]); ?></td>
				<td ><?php echo ($vo["remark"]); ?></td>
				<td align='center'><?php echo ($vo["last_login_ip"]); ?></td>
				<td align='center'><?php echo ($vo["last_location"]); ?></td>
				<td align='center'><?php echo get_color_date('Y-m-d H:i:s', $vo['last_login_time']);?></td>
				<td align='center'><?php if(($vo["status"]) == "1"): ?><font color="red">√</font><?php else: ?><font color="blue">×</font><?php endif; ?> 
				</td>
				<td align='center'>
					<a href="<?php echo U('/Admin/User/edit/',array('id'=>$vo['id']));?>">修改</a>
					| <?php if(($vo["username"]) == C("SPECIAL_USER")): ?><font color="#cccccc">删除</font><?php else: ?><a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/User/del/',array('id'=>$vo['id']));?>','确定删除该用户吗?')">删除</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr class="tr">
          <td colspan="9" class="pages">
            <?php echo ($page); ?>
          </td>
        </tr>
		</table>
		<script>var version='<?php echo (C("cms_var")); ?>';</script>
		﻿<style>
#footer, #footer a:link, #footer a:visited {
	clear:both;
	color:#0072e3;
	font:12px/1.5 Arial;
	margin-top:10px;
	text-align:center;
	white-space:nowrap;
}
</style>
<div id="footer">程序版本：<?php echo (C("cms_var")); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo (C("cms_url")); ?>" target="_blank"><?php echo (C("web_name")); ?></a> 2011-<?php echo (C("end_year")); ?> All Rights Reserved.</div>
</body>
	</html>