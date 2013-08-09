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

class UserAction extends HomeAction {
    public function index(){
		$this->title = '网站会员模块标题'; // 进行模板变量赋值
		$this->content = '<p>这里是会员中心界面。</p>';
		$this->display();
	}

    public function reg(){
		$this->title = "会员注册"; // 进行模板变量赋值
		//$verify = $this->fetch('verify'); 
		$this->content = '<p>这里设计一个会员注册表单</p>';
		$this->display();
	}
	//验证码显示
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
		//$this->display();
    }

    public function login(){
		$this->title = "会员登录"; // 进行模板变量赋值
		$this->content = '<p>这里设计一个会员登录机制（主要是验证机制）</p>';
		$this->display();
	}

    //验证是否账号密码
    function checklogin(){
        //此处多余可自行改为Model自动验证
        if(empty($_POST['username'])) {
            $this->error('请输入帐号！');
        }elseif (empty($_POST['password'])){
            $this->error('密码必须！');
        }elseif (empty($_POST['verify'])){
            $this->error('验证码必须！');
        }

        $map=array();
        $map['username']=$_POST['username'];
        $map['status']=array('gt',0);
        if($_SESSION['verify'] != md5($_POST['verify'])) {
            $this->error('验证码错误！');
        }
        
        import('ORG.Util.RBAC');
        //C('USER_AUTH_MODEL','User');
        //验证账号密码
         $authInfo=RBAC::authenticate($map);
        
        if(empty($authInfo)){
            $this->error('账号不存在或者被禁用!');
        }else{
            if($authInfo['password']!=md5($_POST['password'])){
                $this->error('密码错误!');
            }else{  
            $_SESSION[C('USER_AUTH_KEY')]=$authInfo['id'];
			//记录认证标记，必须有。其他信息根据情况取用。
            $_SESSION['user']=$authInfo['username'];

            //判断是否为管理员
            //if($authInfo['username']=='admin'){
            //$_SESSION[C('ADMIN_AUTH_KEY')]=true; }

           //以下操作为记录本次登录信息
            $user=M('Member');
            $data=array();
            $data['id']=$authInfo['id'];
            $lasttime=date('Y-m-d H:i:s');
            $data['last_login_time']=$lasttime;
            $user->save($data);
            RBAC::saveAccessList();//用于检测用户权限的方法,并保存到Session中
            $this->assign('jumpUrl', __APP__.'/User/index');
            $this->success('登录成功!');
            }
        }
    }
    //退出登录操作
    function logout(){
        if(!empty($_SESSION[C('USER_AUTH_KEY')])){
            unset($_SESSION[C('USER_AUTH_KEY')]);
            $_SESSION=array();
            session_destroy();
            $this->assign('jumpUrl', __APP__.'/User/login');
            $this->success('退出成功！');
        }else{
            $this->error('已经登出了~！');
        }
    }


}