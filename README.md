ThinkPHP通用后台管理系统
========================

[ 介绍 ]

    这是一套使用ThinkPHP3.X开发的基础系统，包含后台用户权限控制，
    后台用户分组管理、网站系统配置功能，可用他来衍生各种产品模块。

[ 安装方法 ]

    1 创建MYSQL数据库，导入thinkphp_system.sql
    2 把根目录的config.php.bak文件名改成config.php
    3 根据你的数据库，配置config.php “db_host db_name db_user db_pwd db_port”
    4 后台入口 http://domain/admin
    5 后台帐号密码 admin admin888
    6 后台菜单设置方法请参考已有的那些菜单

[ 目录结构 ]

    |-admin     后台入口跳转路径
    |-Core      系统核心
    |  ├Common      项目公共函数文件目录
    |  ├Conf        项目配置目录
    |  | ├Admin/config.php      项目后台配置文件
    |  | └Home/config.php       项目前台配置文件
    |  |
    |  ├Lang        项目多语言包目录
    |  | ├en-us         英文言包目录
    |  | └zh-cn         中文言包目录
    |  |
    |  ├Lib         项目类库目录
    |  | ├Action        控制器
    |  | └Model         模型
    |  |
    |  ├config.php      项目配置文件
    |  ├define.php      项目路径常量配置文件
    |  └tags.php        项目扩展行为调用配置文件
    |
    |-Public    公共静态文件目录
    |  ├Admin       后台公共静态目录
    |  ├Home        前台公共静态目录
    |  ├js          公共JS目录
    |  └tips        信息提示跳转页面
    |
    |-Temp      系统缓存目录
    |-Template  项目模板目录
    |  ├Admin/default       后台模板目录
    |  └Home/default        前台模板目录
    |
    |-config.php    网站配置文件
    └-index.php     系统入口文件

[ 协议 ]

    本系统除ThinkPHP框架外，遵循Apache Licence2.0开源许可协议发布
    具体参考LICENSE.txt内容