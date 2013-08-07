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
 * 前台新闻展示模块
 * 
 */

class NewsAction extends HomeAction {
    public function index(){
		$this->title = '新闻列表标题'; // 进行模板变量赋值

        import('ORG.Util.Page');// 导入分页类
        $map = array();
        $NewsDB = D('News');
        $count = $NewsDB->where($map)->count();
        $Page = new Page($count, 5);// 传入总记录数,每页显示5条记录
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $nowPage = isset($_GET['p']) ? $_GET['p'] : 1;
		//默认情况下，分页传值的变量是p，生成的分页类似于：index/p/2
        $show = $Page->show();// 分页显示输出

        // 设置分页显示（详见分页类Page.class.php）

        //$list = $NewsDB->where($map)->order('id ASC')->page($nowPage,5)->select();
        $list = $NewsDB->limit($Page->firstRow. ',' . $Page->listRows)->order('id desc')->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

		//$this->content = '<p>Home分组==>News模块==>index操作</p>';
		$this->display();
	}

    public function detail($id){
		$this->title = "新闻详细页"; // 进行模板变量赋值
        if (!empty($id)) {
            $NewsDB = M("News");//实例化数据对象
            $data = $NewsDB->getById($id);
            if ($data) {
                $this->data   =   $data;
				//$id = $this->_param('id'); 
				$NewsDB->where('id='.$id)->setInc('click'); // 点击数加1
                $this->display();
            } else {
                $this->error('数据不存在！');
            }
        } else {
            $this->error('数据不存在！');
        }
		//$this->content = '<p>这里是<a href="http://shuimu.js.cn">新闻详细</a>内容</p>';
	}
}