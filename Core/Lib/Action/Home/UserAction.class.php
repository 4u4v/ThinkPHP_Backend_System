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
 * 前台会员模块
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

    // 处理表单数据
    public function insert() {
        $Form = D("Member"); // 实例化Member模型
        if ($Form->create()) {
            if ($Form->add() == true) {
                $this->success('注册成功了！', '__URL__/login');
            } else {
                $this->error('注册失败，请重试。');
            }
        } else {
            // 字段验证错误
            $this->error($Form->getError());
        }
    }

    public function login(){
		$this->title = "会员登录"; // 进行模板变量赋值
		$this->content = '<p>这里设计一个会员登录机制（主要是表单验证机制）</p>';
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

/**
 * 上传头像模块
 * 
 */
	public function upload(){
    	$this->display();
    }
	
	//上传头像
	public function uploadImg(){
		import('ORG.Util.UploadFile');
		$upload = new UploadFile();						// 实例化上传类
		$upload->maxSize = 1*1024*1024;					//设置上传图片的大小
		$upload->allowExts = array('jpg','png','gif');	//设置上传图片的后缀
		$upload->uploadReplace = true;					//同名则替换
		$upload->saveRule = 'uniqid';					//设置上传头像命名规则(临时图片),修改了文件名唯一性
        $upload->thumbRemoveOrigin = true;             //生成缩略图后是否删除原图 
        $upload->autoSub = true;                      //是否使用子目录保存上传文件  
        $upload->subType = 'date';                      //子目录创建方式，默认为hash，可以设置为hash或者date 
        $upload->dateFormat = 'Ym';                     //子目录方式为date的时候指定日期格式 
		//完整的头像路径
		$path = './avatar/';
		$upload->savePath = $path;
		if(!$upload->upload()) {						// 上传错误提示错误信息
			$this->ajaxReturn('',$upload->getErrorMsg(),0,'json');
		}else{											// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$picName = $info[0]['savename'];
			$temp_size = getimagesize($path.$picName);
			if($temp_size[0] < 100 || $temp_size[1] < 100){//判断宽和高是否符合头像要求
				$this->ajaxReturn(0,'图片宽或高不得小于100px！',0,'json');
			}
			$this->ajaxReturn('../../avatar/'.$user_path.$picName,$info,1,'json');
		}
	}
	//裁剪并保存用户头像
	public function cropImg(){
		//图片裁剪数据
		$params = $this->_post();						//裁剪参数
		if(!isset($params) && empty($params)){
			return;
		}
		
		$picName = $this->_post('picName');
		$picName = explode('/', $picName);
		//头像目录地址
		$path = './avatar/'.$picName[3].'/';
		//要保存的图片
		$real_path = $path.$picName[4];
		//临时图片地址
		$pic_path = $real_path;
		$thumb = explode('.',$picName[4]);//返回的是除后缀名的文件名
		import('ORG.Util.ThinkImage.ThinkImage');
		$Think_img = new ThinkImage(THINKIMAGE_GD); 
		//裁剪原图
		$Think_img->open($pic_path)->crop($params['w'],$params['h'],$params['x'],$params['y'])->save($real_path);
		//生成缩略图
		$Think_img->open($real_path)->thumb(100,100, 1)->save($path.$thumb[0].'_100.jpg');
		$Think_img->open($real_path)->thumb(60,60, 1)->save($path.$thumb[0].'_60.jpg');
		$Think_img->open($real_path)->thumb(30,30, 1)->save($path.$thumb[0].'_30.jpg');
		$this->success('上传头像成功');
		//@unlink($pic_path);//删除临时文件
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