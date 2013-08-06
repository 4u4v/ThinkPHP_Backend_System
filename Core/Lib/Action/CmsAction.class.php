<?php
/*
* 系统公共类
*/
class CmsAction extends Action{

    public function _initialize(){
		/*
		* 载入各种扩展
		*/
		//import("ORG.Util.Image");	//图像操作类库
		Load('extend');		//Think扩展函数库

    }
	
}