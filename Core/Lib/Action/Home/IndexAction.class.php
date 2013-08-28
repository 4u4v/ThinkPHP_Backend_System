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
 * 前台入口模块
 * 
 */
//class IndexAction extends Action

class IndexAction extends HomeAction {
    public function index(){
		$this->title = '网站首页标题'; // 进行模板变量赋值
		$this->content = '<p>Home分组==>Index模块==>index操作</p>';
		$this->display();
	}

    public function ad(){
		$this->title = "网站首页广告"; 
		$ad1 = '<p>这里是<a href="http://shuimu.js.cn">广告</a>内容</p>';
		$this->content = $ad1;
		$this->display();
	}

    public function mail_form(){
		$this->title = "邮件发送表单"; // 进行模板变量赋值
		$this->content = '<p>这里设计一个邮件发送表单。</p>';
		$this->display();
	}
	
    public function send_mail() {
   //$config = C('THINK_EMAIL');
   import('ORG.Util.Email');
        //此处多余可自行改为Model自动验证
        if(empty($_POST['mailto'])) {
            $this->error('收件人Email必须！');
        }elseif (empty($_POST['subject'])){
            $this->error('请输入邮件标题！');
        }elseif (empty($_POST['body'])){
            $this->error('请输入邮件内容！');
        }
	$data['mailto']  =$_POST['mailto'];
	$data['subject'] =$_POST['subject'];
	$data['body']    =$_POST['body'];
   $mail = new Email();
   if($mail->send($data))
   {
		$result = '邮件发送成功!';
   }
   else
   {
		$result = '邮件发送失败!';
   } 
		$this->assign('result',$result);
		$this->show('<p><br>Mailer<font color="red">{$result}</font></p>');
	//$mail->debug(true)->send($data);   //开启调试功能
	}

}