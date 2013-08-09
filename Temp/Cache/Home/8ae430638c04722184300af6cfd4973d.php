<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php echo ($title); ?> | <?php echo (C("web_name")); ?></title>

</head>
<body>
<br />
<?php echo ($content); ?>
<p><br /></p>
<style>
#footer, #footer a:link, #footer a:visited {
	clear:both;
	color:#000;
	font:12px/1.5 Arial;
	margin-top:10px;
	text-align:center;
	white-space:nowrap;
}
</style>
<div id="footer"><?php echo (C("web_copyright")); ?></div>
</body>
</html>