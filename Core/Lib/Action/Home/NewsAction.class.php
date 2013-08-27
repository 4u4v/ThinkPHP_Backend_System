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


   /**
    +--------------------------------------------------------------
    * 搜索操作，当用户提交表单后，调用此函数进行搜索，最后返回结果
    +--------------------------------------------------------------
    */
    
    //显示搜索表单
    public function search()
    {
        $this->title = "搜索新闻内容";
        $this->display();
    }
    
    public function result()
    {
        $keyword = htmlspecialchars(trim($_REQUEST['keyword']));
        //转换HTML字符并删掉两边空格
        if (empty($keyword)) {
            $this->error('请输入要搜索的关键词!');
            //exit;
        }
        $Form                 = M('News');
        //这里我做的一个模糊查询到标题或者包含关键字的内容
        $map['title|content'] = array(
            'like',
            '%' . $keyword . '%'
        );
        //等价于 SELECT * FROM `think_form` WHERE ( (`title` LIKE '%测试%') OR (`content` LIKE '%测试%') )
        // 把查询条件传入查询方法
        $result               = $Form->where($map)->select();
        //var_dump($result);//调试
        if (!empty($result)) {
            $this->list = $result;
            $this->display();
        } else {
            $this->assign("no_result", "抱歉，搜索关键字“<font color=\"red\">" . $keyword . "</font>”结果不存在！");
            $this->display();
        }
    }

}