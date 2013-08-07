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
 * 后台用户管理模块
 * 
 */
class NewsAction extends AdminAction {
	//继承后台主框架模块授权
    public function _initialize() {
        parent::_initialize();  //RBAC 验证接口初始化
    }

/* ================新闻管理部分================ */
    public function index(){
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
        $this->display();
    }

    // 添加新闻
    public function add(){
        if(isset($_POST['dosubmit'])) {
            //根据表单提交的POST数据创建数据对象
            $Form = D("News");
        if ($vo = $Form->create()) {
            $list = $Form->add();
            if ($list == true) {
                $this->success('数据保存成功！',U('/Admin/News/index'));
            } else {
                $this->error('数据写入错误！');
            }
        } else {
            $this->error($Form->getError());
			}
		}
		$this->display();
    }

    // 编辑新闻
    public function edit($id){
        if (!empty($id)) {
            $Form = M("News");//实例化数据对象
            $vo = $Form->getById($id);
            if ($vo) {
                $this->vo   =   $vo;
                $this->display();
            } else {
                $this->error('数据不存在！');
            }
        } else {
            $this->error('数据不存在！');
        }
    }

    // 更新数据
    public function update() {
        $Form = D("News");
        if ($vo = $Form->create()) {
            $list = $Form->save();
            if ($list == true) {
                $this->success('数据更新成功！',U('/Admin/News/index'));
            } else {
                $this->error("没有更新任何数据!");
            }
        } else {
            $this->error($Form->getError());
        }
    }

    //删除用户
  public function del(){
        $id = $this->_get('id','intval',0);
        if(!$id)$this->error('参数错误!');
        if (!empty($id)) {
            $Form = M("News");
            $result = $Form->delete($id);
            if (true == $result) {
                $this->success('删除成功！', U('/Admin/News/index'));
            } else {
                $this->error('删除出错！');
            }
        } else {
            $this->error('ID错误！');
        }
    }


/* ========权限设置部分======== */
    
    //权限浏览
    public function access(){
        $roleid = $this->_get('roleid','intval',0);
        if(!$roleid) $this->error('参数错误!');
        Vendor('Common.Tree');  //导入通用树型类

        $Tree = new Tree();
        $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $Tree->nbsp = '&nbsp;&nbsp;&nbsp;';

        $NodeDB = D('Node');
        $node = $NodeDB->getAllNode();

        $AccessDB = D('Access');
        $access = $AccessDB->getAllAccess('','role_id,node_id,pid,level');
       

        foreach ($node as $n=>$t) {
            $node[$n]['checked'] = ($AccessDB->is_checked($t,$roleid,$access))? ' checked' : '';
            $node[$n]['depth'] = $AccessDB->get_level($t['id'],$node);
            $node[$n]['pid_node'] = ($t['pid'])? ' class="tr lt child-of-node-'.$t['pid'].'"' : '';
        }
        $str  = "<tr id='node-\$id' \$pid_node>
                    <td style='padding-left:30px;'>\$spacer<input type='checkbox' name='nodeid[]' value='\$id' class='radio' level='\$depth' \$checked onclick='javascript:checknode(this);' > \$title (\$name)</td>
                </tr>";

        $Tree->init($node);
        $html_tree = $Tree->get_tree(0, $str);
        $this->assign('html_tree',$html_tree);

        $this->display();
    }

    //权限编辑
    public function access_edit(){
        $roleid = $this->_post('roleid','intval',0);
        $nodeid = $this->_post('nodeid');
        if(!$roleid) $this->error('参数错误!');
        $AccessDB = D('Access');

        if (is_array($nodeid) && count($nodeid) > 0) {  //提交得有数据，则修改原权限配置
            $AccessDB -> delAccess(array('role_id'=>$roleid));  //先删除原用户组的权限配置

            $NodeDB = D('Node');
            $node = $NodeDB->getAllNode();

            foreach ($node as $_v) $node[$_v[id]] = $_v;
            foreach($nodeid as $k => $node_id){
                $data[$k] = $AccessDB -> get_nodeinfo($node_id,$node);
                $data[$k]['role_id'] = $roleid;
            }
            $AccessDB->addAll($data);   // 重新创建角色的权限配置
        } else {    //提交的数据为空，则删除权限配置
            $AccessDB -> delAccess(array('role_id'=>$roleid));
        }
        $this->assign("jumpUrl",U('/Admin/News/access',array('roleid'=>$roleid)));
        $this->success('设置成功！');
    }

	
}