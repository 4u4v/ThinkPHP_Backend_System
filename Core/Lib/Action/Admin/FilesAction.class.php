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
 * 文件图片管理模块
 * 
 */
class FilesAction extends AdminAction {
    public function _initialize() {
        parent::_initialize();  //RBAC 验证接口初始化
    }

/* ================图片文件列表================ */
    public function index(){
		
        import('ORG.Util.Page');// 导入分页类
        $map = array();
        $FilesDB = D('Files');
        $count = $FilesDB->where($map)->count();
        $Page = new Page($count, 5);// 传入总记录数,每页显示5条记录
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $nowPage = isset($_GET['p']) ? $_GET['p'] : 1;
		//默认情况下，分页传值的变量是p，生成的分页类似于：index/p/2
        $show = $Page->show();// 分页显示输出

        // 设置分页显示（详见分页类Page.class.php）
        
        $data = $FilesDB->limit($Page->firstRow. ',' . $Page->listRows)->order('id desc')->select();
        $this->assign('data',$data);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
		
		//$Files  =   M('Files');
        //$data   =   $Files->order('upload_time desc')->limit(10)->select();
        //$this->assign('data', $data);
        $this->display();
    }

    // 上传文件
    public function upload(){
    import('ORG.Net.UploadFile');
    $upload = new UploadFile();// 实例化上传类
    $upload->maxSize  = 2048000;// 设置附件上传大小
    $upload->allowExts  = array('jpg','gif','png','jpeg', 'txt','doc','docx','xls','xlsx','ppt','pptx', 'pdf');// 设置附件上传类型
    $upload->savePath =  './admin/uploads/';// 设置附件上传目录
	$upload->saveRule = 'time'; // 设置上传文件名,保持文件名不变

    if(!$upload->upload()) {// 上传错误提示错误信息
        $this->error($upload->getErrorMsg());
		}else{// 上传成功
		$info = $upload->getUploadFileInfo(); //取得成功上传的文件信息
		//dump($info); exit(); //可以输出看下$info类型
        $model  = M('Files');
        //保存当前数据对象
		$data['original_name'] = $info[0]['name'];
        $data['file_name'] = $info[0]['savename'];
		$data['file_size'] = $info[0]['size'];
		$data['file_type'] = $info[0]['type'];
        $data['upload_time'] = NOW_TIME;
        $model->add($data);
        $this->success('上传成功！', U('/Admin/Files/index'));
		}
    }

    //删除文件
    public function del(){
        $id = $this->_get('id','intval',0);
        if(!$id)$this->error('参数错误!');
        if (!empty($id)) {
            $Form = M("Files");
            $result = $Form->delete($id);
            if (true == $result) {
                $this->success('删除成功！', U('/Admin/Files/index'));
            } else {
                $this->error('删除出错！');
            }
        } else {
            $this->error('ID错误！');
        }
    }

}