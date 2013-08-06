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


// 数组保存到文件
function arr2file($filename, $arr=''){
	if(is_array($arr)){
		$con = var_export($arr,true);
	} else{
		$con = $arr;
	}
	$con = "<?php \n return $con; \n ?>"; //\n!defined('IN_MP') && die();\nreturn $con;\n
	write_file($filename, $con);
}
function mkdirss($dirs,$mode=0777) {
	if(!is_dir($dirs)){
		mkdirss(dirname($dirs), $mode);
		return @mkdir($dirs, $mode);
	}
	return true;
}
function write_file($l1, $l2=''){
	$dir = dirname($l1);
	if(!is_dir($dir)){
		mkdirss($dir);
	}
	return @file_put_contents($l1, $l2);
}
function read_file($l1){
	return @file_get_contents($l1);
}
// 转换成JS
function t2js($l1, $l2=1){
    $I1 = str_replace(array("\r", "\n"), array('', '\n'), addslashes($l1));
    return $l2 ? "document.write(\"$I1\");" : $I1;
}
//utf8转gbk
function u2g($str){
	return iconv("UTF-8","GBK",$str);
}
//gbk转utf8
function g2u($str){
	return iconv("GBK","UTF-8//ignore",$str);
}
//获取当前地址栏URL
function http_url(){
	return htmlspecialchars("http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]);
}
//获得某天前的最后一秒时间戳
function xtime($day){
	$day = intval($day);
	return mktime(23,59,59,date("m"),date("d")-$day,date("y"));
}
// 获取相对目录
function get_base_path($filename){
    $base_path = $_SERVER['PHP_SELF'];
    $base_path = substr($base_path,0,strpos($base_path,$filename));
	return $base_path;
}
// 获取相对路径
function get_base_url($baseurl,$url){
	if("#" == $url){
		return "";
	}elseif(FALSE !== stristr($url,"http://")){
		return $url;
	}elseif( "/" == substr($url,0,1) ){
		$tmp = parse_url($baseurl);
		return $tmp["scheme"]."://".$tmp["host"].$url;
	}else{
		$tmp = pathinfo($baseurl);
		return $tmp["dirname"]."/".$url;
	}
}
//输入过滤 同时去除连续空白字符可参考扩展库的remove_xss
function get_replace_input($str,$rptype=0){
	$str = stripslashes($str);
	$str = htmlspecialchars($str);
	$str = get_replace_nb($str);
	return addslashes($str);
}
//去除换行
function get_replace_nr($str){
	$str = str_replace(array("<nr/>","<rr/>"),array("\n","\r"),$str);
	return trim($str);
}
//去除连续空格
function get_replace_nb($str){
	$str = str_replace("&nbsp;",' ',$str);
	$str = str_replace("　",' ',$str);
	$str = ereg_replace("[\r\n\t ]{1,}",' ',$str);
	return trim($str);
}
//去除所有标准的HTML代码
function get_replace_html($str, $start=0, $length, $charset="utf-8", $suffix=false){
	return msubstr(eregi_replace('<[^>]+>','',ereg_replace("[\r\n\t ]{1,}",' ',get_replace_nb($str))),$start,$length,$charset,$suffix);
}
//判断是否属于当前模块
function check_model($modelname){
	if(strtolower(MODULE_NAME) == $modelname){
		return 1;
	}
	return 0;
}
// 获取广告调用地址
function get_cms_ads($str,$charset="utf-8"){
	return '<script type="text/javascript" src="'.C('web_path').C('web_adsensepath').'/'.$str.'.js" charset="utf-8"></script>';
}
// 获取标题颜色
function get_color_title($str,$color){
	if (empty($color)) {
	    return $str;
	}else{
	    return '<font color="'.$color.'">'.$str.'</font>';
	}
}
// 获取时间颜色
function get_color_date($type='Y-m-d H:i:s',$time,$color='red'){
	if($time > xtime(1)){
		return '<font color="'.$color.'">'.date($type,$time).'</font>';
	}else{
	    return date($type,$time);
	}
}
//生成字母前缀
function get_letter($s0){
	$firstchar_ord = ord(strtoupper($s0{0})); 
	if (($firstchar_ord>=65 and $firstchar_ord<=91)or($firstchar_ord>=48 and $firstchar_ord<=57)) return $s0{0}; 
	$s = iconv("UTF-8","gb2312", $s0); 
	$asc = ord($s{0})*256+ord($s{1})-65536; 
	if($asc>=-20319 and $asc<=-20284)return "A";
	if($asc>=-20283 and $asc<=-19776)return "B";
	if($asc>=-19775 and $asc<=-19219)return "C";
	if($asc>=-19218 and $asc<=-18711)return "D";
	if($asc>=-18710 and $asc<=-18527)return "E";
	if($asc>=-18526 and $asc<=-18240)return "F";
	if($asc>=-18239 and $asc<=-17923)return "G";
	if($asc>=-17922 and $asc<=-17418)return "H";
	if($asc>=-17417 and $asc<=-16475)return "J";
	if($asc>=-16474 and $asc<=-16213)return "K";
	if($asc>=-16212 and $asc<=-15641)return "L";
	if($asc>=-15640 and $asc<=-15166)return "M";
	if($asc>=-15165 and $asc<=-14923)return "N";
	if($asc>=-14922 and $asc<=-14915)return "O";
	if($asc>=-14914 and $asc<=-14631)return "P";
	if($asc>=-14630 and $asc<=-14150)return "Q";
	if($asc>=-14149 and $asc<=-14091)return "R";
	if($asc>=-14090 and $asc<=-13319)return "S";
	if($asc>=-13318 and $asc<=-12839)return "T";
	if($asc>=-12838 and $asc<=-12557)return "W";
	if($asc>=-12556 and $asc<=-11848)return "X";
	if($asc>=-11847 and $asc<=-11056)return "Y";
	if($asc>=-11055 and $asc<=-10247)return "Z";
	return 0;
}