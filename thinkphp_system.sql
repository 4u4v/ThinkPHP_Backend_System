-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 08 月 28 日 16:00
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `thinkphp_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_access`
--

CREATE TABLE IF NOT EXISTS `tp_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `tp_access`
--

INSERT INTO `tp_access` (`role_id`, `node_id`, `pid`, `level`, `module`) VALUES
(1, 20, 19, 3, NULL),
(1, 19, 1, 2, NULL),
(1, 17, 8, 3, NULL),
(1, 11, 8, 3, NULL),
(1, 10, 8, 3, NULL),
(1, 9, 8, 3, NULL),
(1, 16, 8, 3, NULL),
(1, 8, 28, 2, NULL),
(1, 28, 13, 0, NULL),
(1, 13, 1, 0, NULL),
(1, 6, 2, 3, NULL),
(1, 7, 2, 3, NULL),
(1, 4, 2, 3, NULL),
(1, 5, 2, 3, NULL),
(1, 3, 2, 3, NULL),
(1, 2, 1, 2, NULL),
(1, 38, 21, 3, NULL),
(1, 37, 21, 3, NULL),
(1, 33, 21, 3, NULL),
(1, 32, 21, 3, NULL),
(1, 31, 21, 3, NULL),
(3, 5, 2, 3, NULL),
(3, 3, 2, 3, NULL),
(3, 2, 1, 2, NULL),
(3, 38, 21, 3, NULL),
(3, 37, 21, 3, NULL),
(3, 33, 21, 3, NULL),
(3, 32, 21, 3, NULL),
(3, 31, 21, 3, NULL),
(3, 23, 21, 3, NULL),
(3, 22, 21, 3, NULL),
(3, 40, 21, 3, NULL),
(3, 36, 21, 3, NULL),
(3, 35, 21, 3, NULL),
(3, 34, 21, 3, NULL),
(3, 30, 21, 3, NULL),
(3, 21, 18, 2, NULL),
(3, 18, 1, 0, NULL),
(3, 62, 46, 0, NULL),
(3, 49, 46, 0, NULL),
(3, 47, 46, 3, NULL),
(3, 46, 45, 2, NULL),
(3, 45, 1, 0, NULL),
(3, 15, 25, 0, NULL),
(1, 23, 21, 3, NULL),
(1, 22, 21, 3, NULL),
(1, 36, 21, 3, NULL),
(1, 35, 21, 3, NULL),
(1, 34, 21, 3, NULL),
(1, 30, 21, 3, NULL),
(1, 21, 18, 2, NULL),
(3, 25, 14, 0, NULL),
(3, 14, 1, 0, NULL),
(3, 1, 0, 1, NULL),
(1, 18, 1, 0, NULL),
(1, 15, 25, 0, NULL),
(1, 25, 14, 0, NULL),
(1, 14, 1, 0, NULL),
(1, 1, 0, 1, NULL),
(2, 61, 59, 3, NULL),
(2, 60, 59, 3, NULL),
(2, 59, 58, 2, NULL),
(2, 58, 1, 0, NULL),
(2, 57, 54, 3, NULL),
(2, 56, 54, 3, NULL),
(2, 55, 54, 3, NULL),
(2, 54, 53, 2, NULL),
(2, 53, 1, 0, NULL),
(2, 20, 19, 3, NULL),
(2, 19, 1, 2, NULL),
(1, 53, 1, 0, NULL),
(1, 54, 53, 2, NULL),
(1, 55, 54, 3, NULL),
(1, 56, 54, 3, NULL),
(1, 57, 54, 3, NULL),
(2, 6, 2, 3, NULL),
(2, 7, 2, 3, NULL),
(2, 4, 2, 3, NULL),
(2, 5, 2, 3, NULL),
(2, 3, 2, 3, NULL),
(2, 2, 1, 2, NULL),
(2, 15, 25, 0, NULL),
(2, 25, 14, 0, NULL),
(2, 14, 1, 0, NULL),
(2, 1, 0, 1, NULL),
(3, 4, 2, 3, NULL),
(3, 7, 2, 3, NULL),
(3, 6, 2, 3, NULL),
(3, 19, 1, 2, NULL),
(3, 20, 19, 3, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_files`
--

CREATE TABLE IF NOT EXISTS `tp_files` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `original_name` varchar(32) NOT NULL,
  `file_name` varchar(32) NOT NULL,
  `file_size` int(10) NOT NULL,
  `file_type` varchar(16) DEFAULT NULL,
  `upload_time` varchar(27) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 导出表中的数据 `tp_files`
--

INSERT INTO `tp_files` (`id`, `original_name`, `file_name`, `file_size`, `file_type`, `upload_time`) VALUES
(1, '7logo.jpg', '1376381423.jpg', 3502, 'image/jpeg', '1376381423'),
(2, 'login_member.jpg', '1376381667.jpg', 32845, 'image/jpeg', '1376381667'),
(3, 'QQ图片20130606132717.jpg', '1376381707.jpg', 10274, 'image/jpeg', '1376381707'),
(5, 'M.jpg', '1376382199.jpg', 113314, 'image/jpeg', '1376382199'),
(6, 'SAP系统状态信息.jpg', '1376387602.jpg', 90951, 'image/jpeg', '1376387602'),
(7, '01.jpg', '1376446447.jpg', 140782, 'image/jpeg', '1376446447'),
(8, '文本文档01.txt', '1376446464.txt', 301, 'text/plain', '1376446464'),
(9, '新建 Microsoft Office Word 文档.docx', '1376446476.docx', 11873, 'application/vnd.', '1376446476'),
(10, 'qp_area.xlsx', '1376446488.xlsx', 9784, 'application/vnd.', '1376446488');

-- --------------------------------------------------------

--
-- 表的结构 `tp_member`
--

CREATE TABLE IF NOT EXISTS `tp_member` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 NOT NULL,
  `reg_time` int(11) unsigned NOT NULL,
  `last_login_time` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `tp_member`
--

INSERT INTO `tp_member` (`id`, `username`, `password`, `email`, `reg_time`, `last_login_time`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245', 'admin@4u4v.net', 1375262553, '2013-08-13 08:54'),
(2, '水木', 'f4eddb1257c91ed28fd2fead367337e9', '35991353@qq.com', 1376028842, '2013-08-09 17:33'),
(3, '4u4v', 'f4eddb1257c91ed28fd2fead367337e9', 'admin@4u4v.com', 1377672534, '2013-08-28 14:56'),
(4, 'high', 'f4eddb1257c91ed28fd2fead367337e9', 'high@qq.com', 1377672976, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_news`
--

CREATE TABLE IF NOT EXISTS `tp_news` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `click` int(16) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `tp_news`
--

INSERT INTO `tp_news` (`id`, `title`, `content`, `create_time`, `status`, `click`) VALUES
(1, '测试标题1', '<p>这里是测试内容1。这里是测试内容。这里是测试内容。这里是测试内容1。</p>\r\n<p>这里是测试内容1。这里是测试内容。这里是测试内容。这里是测试内容。</p>', 1374477140, 1, 0),
(5, '新闻标题', '这是<a href="http://shuimu.js.cn">新闻内容</a>\r\n支持HTML哦！', 0, 0, 5),
(2, '测试标题2', '测试内容。。。测试内容。。。测试内容。。。', 1374561995, 0, 2),
(3, '测试标题3', 'ThinkPHP示例之3：表单处理', 1374565709, 0, 3),
(7, '新闻标题7', '新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容', 1375855131, 1, 6),
(6, '新闻标题6', '新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容', 1375855080, 1, 6),
(8, '新闻标题8', '新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8<br />新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8新闻内容8', 1375855181, 1, 6);

-- --------------------------------------------------------

--
-- 表的结构 `tp_node`
--

CREATE TABLE IF NOT EXISTS `tp_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '节点名称',
  `title` varchar(50) NOT NULL COMMENT '菜单名称',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活 1：是 2：否',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父ID',
  `level` tinyint(1) unsigned NOT NULL COMMENT '节点等级',
  `data` varchar(255) DEFAULT NULL COMMENT '附加参数',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '菜单显示类型 0:不显示 1:导航菜单 2:左侧菜单',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- 导出表中的数据 `tp_node`
--

INSERT INTO `tp_node` (`id`, `name`, `title`, `status`, `remark`, `pid`, `level`, `data`, `sort`, `display`) VALUES
(1, 'cms', '根节点', 1, '不可删除', 0, 1, NULL, 0, 0),
(2, 'index', '后台主框架模块', 1, '所有后台用户组都必须有此权限，否则后台无法登录', 1, 2, '', 10, 0),
(3, 'index', 'index方法', 1, 'Index模块的index方法', 2, 3, '', 5, 0),
(4, 'left', 'left方法', 1, 'Index模块的left方法', 2, 3, '', 3, 0),
(5, 'top', 'top方法', 1, 'Index模块的top方法', 2, 3, '', 4, 0),
(6, 'main', 'main方法', 1, 'Index模块的main方法', 2, 3, '', 1, 0),
(7, 'footer', 'footer方法', 1, 'Index模块的footer方法', 2, 3, '', 2, 0),
(8, 'Node', '菜单节点管理', 1, '', 28, 2, '?s=/Admin/Node/index', 1, 2),
(9, 'add', '添加菜单', 1, '', 8, 3, '', 4, 0),
(10, 'edit', '修改菜单', 1, '', 8, 3, '', 3, 0),
(11, 'del', '删除菜单', 1, '', 8, 3, '', 2, 0),
(13, 'extend', '扩展功能', 1, '', 1, 0, '', 9, 1),
(14, 'public_main', '我的面板', 1, '', 1, 0, '', 40, 1),
(15, 'main', '系统环境', 1, '快捷菜单', 25, 0, '?s=/Admin/Index/main', 10, 2),
(16, 'index', '菜单列表', 1, '', 8, 3, '', 5, 0),
(17, 'sort', '菜单排序', 1, '', 8, 3, '', 1, 0),
(18, 'UserCenter', '用户管理', 1, '', 1, 0, '', 20, 1),
(19, 'cache', '缓存模块', 1, '', 1, 2, '', 0, 0),
(20, 'delCore', '删除核心缓存', 1, '', 19, 3, '', 0, 0),
(21, 'User', '后台用户管理', 1, '', 18, 2, '', 0, 2),
(22, 'role', '角色权限管理', 1, '', 21, 3, '?s=/Admin/User/role', 4, 2),
(23, 'role_add', '角色添加', 1, '', 21, 3, '?s=/Admin/User/role_add', 0, 0),
(25, 'my', '我的面板', 1, '', 14, 0, '', 0, 2),
(30, 'index', '后台用户管理', 1, '', 21, 3, '?s=/Admin/User/index', 10, 2),
(28, 'extend_sub', '扩展功能', 1, '', 13, 0, '', 0, 2),
(31, 'role_edit', '角色编辑', 1, '', 21, 3, '', 0, 0),
(32, 'role_del', '角色删除', 1, '', 21, 3, '', 0, 0),
(33, 'role_sort', '角色排序', 1, '', 21, 3, '', 0, 0),
(34, 'add', '后台用户添加', 1, '', 21, 3, '?s=/Admin/User/add', 9, 2),
(35, 'edit', '后台某用户编辑', 1, '', 21, 3, '?s=/Admin/User/edit/id/3', 8, 0),
(36, 'del', '后台用户删除', 1, '', 21, 3, '', 7, 0),
(37, 'access', '角色权限浏览', 1, '', 21, 3, '', 0, 0),
(38, 'access_edit', '角色权限编辑', 1, '', 21, 3, '', 0, 0),
(40, 'check_username', '检查用户名', 1, 'ajax验证', 21, 3, '', 6, 0),
(47, 'conf', '浏览网站各配置信息', 1, '', 46, 3, '', 0, 0),
(45, 'system_settings', '系统设置', 1, '', 1, 0, '', 30, 1),
(46, 'Config', '系统配置', 1, '', 45, 2, '', 0, 2),
(48, 'updateweb', '更新网站相关配置', 1, '', 46, 3, '', 0, 0),
(49, 'confweb', '网站信息设置', 1, '', 46, 0, '?s=/Admin/Config/conf/id/web', 0, 2),
(50, 'updatedb', '更新数据库链接配置', 1, '', 46, 3, '', 0, 0),
(51, 'confdb', '数据库链接配置', 1, '', 46, 0, '?s=/Admin/Config/conf/id/db', 0, 2),
(53, 'NewsCenter', '新闻管理', 1, '', 1, 0, '', 0, 1),
(54, 'News', '新闻管理模块', 1, '', 53, 2, '', 0, 2),
(55, 'index', '后台新闻管理', 1, '', 54, 3, '?s=/Admin/News/index', 0, 2),
(56, 'add', '后台新闻添加', 1, '', 54, 3, '?s=/Admin/News/add', 0, 2),
(57, 'edit', '后台新闻编辑', 1, '', 54, 3, '?s=/Admin/News/edit', 0, 0),
(58, 'FilesManage', '文件管理', 1, '', 1, 0, '', 0, 1),
(59, 'Files', '文件管理模块', 1, '', 58, 2, '', 0, 2),
(60, 'index', '图片文件列表', 1, '', 59, 3, '?s=/Admin/Files/index', 0, 2),
(61, 'add', '上传图片文件', 1, '', 59, 3, '?s=/Admin/Files/add', 0, 2),
(62, 'confmail', '邮件服务配置', 1, '', 46, 0, '?s=/Admin/Config/conf/id/mail', 0, 2),
(63, 'updatemail', '更新邮件服务器配置', 1, '', 46, 3, '', 0, 0),
(64, 'BackupManage', '备份管理', 1, '', 1, 0, '', 0, 1),
(65, 'Baksql', '备份管理模块', 1, '', 64, 2, '', 0, 2),
(66, 'index', '备份文件管理', 1, '', 65, 3, '?s=/Admin/Baksql/index', 0, 2),
(67, 'tablist', '数据表信息', 1, '各数据表信息', 65, 3, '?s=/Admin/Baksql/tablist', 0, 2),
(68, 'backall', 'MySQL一键备份', 1, '备份整个数据库', 65, 3, '?s=/Admin/Baksql/backall', 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `tp_role`
--

CREATE TABLE IF NOT EXISTS `tp_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '后台组名',
  `pid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '是否激活 1：是 0：否',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `tp_role`
--

INSERT INTO `tp_role` (`id`, `name`, `pid`, `status`, `sort`, `remark`) VALUES
(1, '超级管理员', 0, 1, 50, '超级管理员组'),
(2, '网站编辑', 0, 1, 40, '编辑组'),
(3, '站点监督员', 0, 1, 49, '站点监督员组');

-- --------------------------------------------------------

--
-- 表的结构 `tp_role_user`
--

CREATE TABLE IF NOT EXISTS `tp_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` smallint(6) unsigned NOT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `tp_role_user`
--

INSERT INTO `tp_role_user` (`user_id`, `role_id`) VALUES
(3, 2),
(1, 1),
(8, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE IF NOT EXISTS `tp_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `role` smallint(6) unsigned NOT NULL COMMENT '组ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 1:启用 0:禁止',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注说明',
  `last_login_time` int(11) unsigned NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(15) DEFAULT NULL COMMENT '最后登录IP',
  `last_location` varchar(100) DEFAULT NULL COMMENT '最后登录位置',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `tp_user`
--

INSERT INTO `tp_user` (`id`, `username`, `password`, `role`, `status`, `remark`, `last_login_time`, `last_login_ip`, `last_location`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245', 1, 1, '神级管理员,可无视系统权限.', 1376961366, '127.0.0.1', ''),
(3, 'editor', 'f4eddb1257c91ed28fd2fead367337e9', 2, 1, '', 1376961309, '127.0.0.1', ''),
(8, '水木', 'f4eddb1257c91ed28fd2fead367337e9', 1, 1, '拥有后台所有管理权限', 1375262553, '127.0.0.1', '新建用户');
