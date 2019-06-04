/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yesadmin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-06-09 16:44:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yes_admin
-- ----------------------------
DROP TABLE IF EXISTS `yes_admin`;
CREATE TABLE `yes_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '用户名',
  `password` varchar(80) DEFAULT '' COMMENT '密码',
  `ip` varchar(10) DEFAULT NULL COMMENT '最后登录ip',
  `last_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `type` int(1) DEFAULT NULL COMMENT '类型 1商家 2店长',
  `username` varchar(255) DEFAULT '' COMMENT '店长名称',
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yes_admin
-- ----------------------------
INSERT INTO `yes_admin` VALUES ('1', 'admin', '$2y$10$snKKjRzy0Q1xRAIcKlU3q.fAMKv7/.9m/BPNXzb7kYp99qxDCJMxi', '127.0.0.1', '2018-06-09 16:25:31', '2', '张超', null);

-- ----------------------------
-- Table structure for yes_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `yes_auth_group`;
CREATE TABLE `yes_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='-- think_auth_group 用户组表， \r\n-- id：主键， title:用户组中文名称， rules：用户组拥有的规则id， 多个规则","隔开，status 状态：为1正常，为0禁用';

-- ----------------------------
-- Records of yes_auth_group
-- ----------------------------
INSERT INTO `yes_auth_group` VALUES ('1', '超级管理员', '1', '2,3,4,25,27,7,8,13,11,12,32,10,14,15,16,33,34,5,6,17,18,22,19,20,21,23,24,35,36,37,42,38,39,40,41');
INSERT INTO `yes_auth_group` VALUES ('5', 'qwe', '1', '2,3,4,25,27,7,8,13,11,12,32,10,14,15,16,33');

-- ----------------------------
-- Table structure for yes_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `yes_auth_group_access`;
CREATE TABLE `yes_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='-- think_auth_group_access 用户组明细表\r\n-- uid:用户id，group_id：用户组id';

-- ----------------------------
-- Records of yes_auth_group_access
-- ----------------------------
INSERT INTO `yes_auth_group_access` VALUES ('1', '1');
INSERT INTO `yes_auth_group_access` VALUES ('13', '1');

-- ----------------------------
-- Table structure for yes_menus_rule
-- ----------------------------
DROP TABLE IF EXISTS `yes_menus_rule`;
CREATE TABLE `yes_menus_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(30) DEFAULT NULL,
  `name` char(80) DEFAULT NULL,
  `title` char(20) DEFAULT '',
  `isshow` int(1) DEFAULT '1' COMMENT '是否显示 1显示 2不显示',
  `pid` int(11) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `ismenu` int(1) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='-- think_auth_rule，规则表，\r\n-- id:主键，name：规则唯一标识, title：规则中文名称 status 状态：为1正常，为0禁用，condition：规则表达式，为空表示存在就验证，不为空表示按照条件验证';

-- ----------------------------
-- Records of yes_menus_rule
-- ----------------------------
INSERT INTO `yes_menus_rule` VALUES ('1', 'dsfgds1', 'Index/index', '系统首页', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('2', 'fa-lock', 'Auth/lists', '权限管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('3', 'fa-align-center', 'Menus/lists', '菜单管理', '1', '2', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('4', 'fa-align-center', 'Menus/lists', '菜单列表', '1', '3', '1', '1', '', '1', '0,3,');
INSERT INTO `yes_menus_rule` VALUES ('5', 'fa-users', 'Member/lists', '会员管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('6', 'fa-group', 'Member/lists', '会员列表', '1', '5', '1', '1', '', '1', '0,5,');
INSERT INTO `yes_menus_rule` VALUES ('7', 'fa-shield', 'AuthGroup/lists', '权限组管理', '1', '2', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('8', 'fa-shield', 'AuthGroup/lists', '权限组列表', '1', '7', '1', '1', '', '1', '0,7,');
INSERT INTO `yes_menus_rule` VALUES ('10', 'fa-align-center', 'Menus/created', '添加菜单', '1', '2', '1', '1', '', '2', '0,3,4,');
INSERT INTO `yes_menus_rule` VALUES ('11', 'fa-shield', 'AuthGroup/getAuth', '获取权限列表', '1', '7', '1', '1', '', '2', '0,7');
INSERT INTO `yes_menus_rule` VALUES ('12', 'fa-shield', 'AuthGroup/created', '添加权限组', '1', '7', '1', '1', '', '2', '0,7');
INSERT INTO `yes_menus_rule` VALUES ('13', 'fa-shield', 'AuthGroup/modify', '修改权限组', '1', '8', '1', '1', '', '2', '0,7,8');
INSERT INTO `yes_menus_rule` VALUES ('14', 'fa-user-circle-o', 'Admin/lists', '管理员管理', '1', '2', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('15', 'fa-user-circle-o', 'Admin/lists', '管理员列表', '1', '14', '1', '1', '', '1', '0,14,');
INSERT INTO `yes_menus_rule` VALUES ('16', 'fa-user-circle-o', 'Admin/created', '添加管理员', '1', '14', '1', '1', '', '2', '0,14,');
INSERT INTO `yes_menus_rule` VALUES ('17', 'fa-codepen', 'System/lists', '系统管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('18', 'fa-codepen', 'System/lists', '基本配置', '1', '17', '1', '1', '', '1', '0,17');
INSERT INTO `yes_menus_rule` VALUES ('19', 'fa-hard-of-hearing', 'Interface/lists', '接口管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('20', 'fa-hard-of-hearing', 'Interface/local', '本地接口', '1', '19', '1', '1', '', '1', '0,19');
INSERT INTO `yes_menus_rule` VALUES ('21', 'fa-hard-of-hearing', 'Interface/other', '第三方接口', '1', '19', '1', '1', '', '1', '0,19');
INSERT INTO `yes_menus_rule` VALUES ('22', 'fa-codepen', 'System/created', '添加修改系统配置', '1', '17', '1', '1', '', '2', '0,17,18');
INSERT INTO `yes_menus_rule` VALUES ('23', 'fa-random', 'Addons/lists', '插件管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('24', 'fa-random', 'Addons/lists', '插件列表', '1', '23', '1', '1', '', '1', '0,23');
INSERT INTO `yes_menus_rule` VALUES ('25', 'fa-align-center', 'Menus/modify', '修改菜单', '1', '3', '1', '1', '', '2', '0,4,');
INSERT INTO `yes_menus_rule` VALUES ('27', 'fa-align-center', 'Menus/delete', '删除权限菜单', '1', '3', '1', '1', '', '2', '0,4,');
INSERT INTO `yes_menus_rule` VALUES ('32', 'fa-shield', 'AuthGroup/delete', '删除权限组', '1', '7', '1', '1', '', '2', '0,7,8,');
INSERT INTO `yes_menus_rule` VALUES ('33', 'fa-user-circle-o', 'Admin/modify', '编辑管理员', '1', '14', '1', '1', '', '2', '0,14,15,');
INSERT INTO `yes_menus_rule` VALUES ('34', 'fa-user-circle-o', 'Admin/delete', '删除管理员', '1', '14', '1', '1', '', '2', '0,14,15');
INSERT INTO `yes_menus_rule` VALUES ('35', 'fa-random', 'Addons/install', '安装插件', '1', '23', '1', '1', '', '2', '0,23,24');
INSERT INTO `yes_menus_rule` VALUES ('36', 'fa-file-word-o', 'Article/lists', '文章管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('37', 'fa-file-word-o', 'Article/lists', '文章列表', '1', '36', '1', '1', '', '1', '0,36,');
INSERT INTO `yes_menus_rule` VALUES ('38', 'fa-header', 'Column/lists', '栏目管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('39', 'fa-header', 'Column/lists', '栏目列表', '1', '38', '1', '1', '', '1', '0,38,');
INSERT INTO `yes_menus_rule` VALUES ('40', 'fa-file-excel-o', 'File/lists', '文件管理', '1', '0', '1', '1', '', '1', '0,');
INSERT INTO `yes_menus_rule` VALUES ('41', 'fa-file-excel-o', 'File/lists', '文件列表', '1', '40', '1', '1', '', '1', '0,40,');
INSERT INTO `yes_menus_rule` VALUES ('42', 'fa-empire', 'Type/lists', '分类列表', '1', '36', '1', '1', '', '1', '0,36,');

-- ----------------------------
-- Table structure for yes_type
-- ----------------------------
DROP TABLE IF EXISTS `yes_type`;
CREATE TABLE `yes_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT '' COMMENT '分类名称',
  `pid` int(11) DEFAULT '0' COMMENT '分类父级id',
  `icon` varchar(20) DEFAULT '' COMMENT '分类icon图标',
  `path` varchar(180) DEFAULT '' COMMENT '当前分类的路径',
  `delete` int(11) DEFAULT '1' COMMENT '当前分类的状态 1存在 2删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yes_type
-- ----------------------------
INSERT INTO `yes_type` VALUES ('1', '首页', '0', 'fa', '0，', '1');
