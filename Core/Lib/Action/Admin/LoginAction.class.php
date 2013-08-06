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
 * 后台登陆模块
 */
class LoginAction extends AdminAction{
    //登陆界面
    public function index(){
    	//检测后台登录入口是否正确
        if(!session('?right_enter')) {
        	redirect(C('web_url'));exit;
        }
		if (session(C('USER_AUTH_KEY'))){
			redirect(C('cms_admin').'?s=Admin/Index');exit;
		}
		$this->display();
    }	

	//登陆检测_前置
	public function _before_check(){
            $this->assign("jumpUrl",C('cms_admin').'?s=Admin/Login');
            $username = $this->_post('username');
            $password =  $this->_post('password');
            $verify   = $this->_post('verify');
            
            if (empty($username)) {
                $this->error(L('lan_input_user_name'));
            }elseif(empty($password)) {
                $this->error(L('lan_input_password'));
            }elseif(empty($verify)){
             $this->error(L('lan_input_verify'));
            }
	}	

    // 登录检测
    public function checkLogin() {

        $username = $this->_post('username');
        $password =  $this->_post('password');
        $verify   = $this->_post('verify');

        //生成认证条件
        $map            =   array();
        // 支持使用绑定帐号登录
        $map['username'] = $username;
        $map['status']        = 1;
        if(session('verify') != md5($verify)) {
            $this->error('验证码错误！');
        }
        import('ORG.Util.RBAC');
        $authInfo = RBAC::authenticate($map);
        //使用用户名、密码和状态的方式进行认证
        if(false == $authInfo) {
            $this->error('帐号不存在或已禁用！');
        }else {
            if($authInfo['password'] != md5($password) ) {
                $this->error('密码错误！');
            }
			session(C('USER_AUTH_KEY'), $authInfo['id']);
            session('userid',$authInfo['id']);  //用户ID
			session('username',$authInfo['username']);   //用户名
            session('roleid',$authInfo['role']);    //角色ID
            if($authInfo['username']==C('SPECIAL_USER')) {
                session(C('ADMIN_AUTH_KEY'), true);
            }
            
            //保存登录信息
            $User	=	M(C('USER_AUTH_MODEL'));
            $ip		=	get_client_ip();
            $data = array();
            if($ip){    //如果获取到客户端IP，则获取其物理位置
                import('ORG.Net.IpLocation');// 导入IpLocation类
                $Ip = new IpLocation(); // 实例化类
                $location = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
                $data['last_location'] = '';
                if($location['country'] && $location['country']!='CZ88.NET') $data['last_location'].=$location['country'];
                if($location['area'] && $location['area']!='CZ88.NET') $data['last_location'].=' '.$location['area'];
            }
            $data['id']	=	$authInfo['id'];
            $data['last_login_time']	=	time();
            $data['last_login_ip']	=	get_client_ip();
            $User->save($data);
			
            // 缓存访问权限
            RBAC::saveAccessList();
            redirect(C('cms_admin').'?s=Admin/Index');
        }
    }
	
    // 用户登出
    public function logout() {
        if(session('?'.C('USER_AUTH_KEY'))) {
            session(C('USER_AUTH_KEY'),null);
            session(null);
            redirect(C('cms_admin').'?s=Admin/Login');
        }else {
            $this->error('已经登出！');
        }
    }	
}