/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50726
Source Host           : 127.0.0.1:3306
Source Database       : app

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-07-05 16:05:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zm_menu
-- ----------------------------
DROP TABLE IF EXISTS `zm_menu`;
CREATE TABLE `zm_menu` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `pid` int(12) NOT NULL DEFAULT '0' COMMENT '父id',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0表示不显示 1表示显示',
  `icon` varchar(256) NOT NULL DEFAULT '' COMMENT 'icon class',
  `badge` varchar(256) NOT NULL DEFAULT '' COMMENT 'badge class',
  `msgnum` int(12) NOT NULL DEFAULT '0' COMMENT 'message count',
  `sortnum` tinyint(12) NOT NULL DEFAULT '0' COMMENT '排列顺序',
  `operator` varchar(32) NOT NULL DEFAULT '' COMMENT '操作人',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zm_menu
-- ----------------------------
INSERT INTO `zm_menu` VALUES ('39', '用户', '0', '0', 'icon-users icon  text-primary', '', '0', '3', 'zhuwanxiong-xy', '0000-00-00 00:00:00', '2017-03-26 18:24:15');
INSERT INTO `zm_menu` VALUES ('40', '账号授权', '39', '0', 'icon-user', '', '0', '1', 'zhuwanxiong-xy', '0000-00-00 00:00:00', '2017-02-12 22:35:24');
INSERT INTO `zm_menu` VALUES ('41', '菜单管理', '40', '0', 'fa fa-angle-right text-xs', '', '0', '-1', 'zhuwanxiong-xy', '0000-00-00 00:00:00', '2017-02-16 21:44:29');
INSERT INTO `zm_menu` VALUES ('42', '路由管理', '40', '0', 'fa fa-angle-right text-xs', '', '0', '0', 'zhuwanxiong-xy', '0000-00-00 00:00:00', '2017-02-12 22:42:06');
INSERT INTO `zm_menu` VALUES ('43', '角色管理', '40', '0', 'fa fa-angle-right text-xs', '', '0', '3', 'zhuwanxiong-xy', '0000-00-00 00:00:00', '2017-02-16 21:45:21');
INSERT INTO `zm_menu` VALUES ('44', '权限管理', '40', '0', 'fa fa-angle-right text-xs', '', '0', '0', 'zhuwanxiong-xy', '0000-00-00 00:00:00', '2017-02-12 22:42:17');
INSERT INTO `zm_menu` VALUES ('47', '发现', '49', '0', 'icon-compass icon text-success', 'badge bg-info pull-right text-success', '0', '1', 'zhuwanxiong-xy', '2017-02-12 16:25:48', '2017-02-16 21:58:13');
INSERT INTO `zm_menu` VALUES ('49', '应用', '0', '1', 'icon-disc icon text-success', '', '0', '1', 'zhuwanxiong-xy', '2017-02-12 18:15:19', '2017-02-19 21:44:45');
INSERT INTO `zm_menu` VALUES ('56', '用户管理', '40', '0', 'fa fa-angle-right text-xs', '', '0', '0', 'zhuwanxiong-xy', '2017-02-16 22:38:36', '2017-02-16 22:38:36');
INSERT INTO `zm_menu` VALUES ('61', '产品', '0', '0', 'icon-briefcase', '', '0', '2', 'zhuwanxiong-xy', '2017-02-26 21:09:36', '2017-03-16 23:01:38');
INSERT INTO `zm_menu` VALUES ('62', '资源分配', '61', '0', 'icon-briefcase', '', '0', '0', 'test', '2017-02-26 21:14:38', '2017-03-19 00:35:44');
INSERT INTO `zm_menu` VALUES ('63', '类目管理', '62', '1', 'fa fa-angle-right text-xs', '', '0', '1', 'zhuwanxiong-xy', '2017-02-26 21:16:16', '2017-07-01 21:06:19');
INSERT INTO `zm_menu` VALUES ('64', '商品管理', '62', '1', 'fa fa-angle-right text-xs', '', '0', '3', 'zhuwanxiong-xy', '2017-02-26 21:25:41', '2017-07-01 21:06:04');
INSERT INTO `zm_menu` VALUES ('65', '文章选集', '62', '0', 'fa fa-angle-right text-xs', '', '0', '2', 'zhuwanxiong-xy', '2017-02-28 20:31:18', '2017-03-26 18:25:52');
INSERT INTO `zm_menu` VALUES ('66', '精选', '49', '1', 'icon-drawer icon text-primary-lter text-info', '', '0', '2', 'zhuwanxiong-xy', '2017-03-19 16:57:49', '2017-03-26 18:27:13');
INSERT INTO `zm_menu` VALUES ('67', 'App SplashScreen', '62', '1', 'fa fa-angle-right text-xs', '', '0', '0', 'zhuwanxiong-xy', '2017-07-01 21:07:34', '2018-06-26 20:19:15');
INSERT INTO `zm_menu` VALUES ('68', '管理', '49', '1', 'icon-grid icon', '', '0', '0', 'zhuwanxiong-xy', '2017-09-03 00:31:54', '2017-10-11 14:39:49');
INSERT INTO `zm_menu` VALUES ('69', 'App Topic', '62', '1', 'fa fa-angle-right text-xs', '', '0', '0', 'zhuwanxiong-xy', '2017-12-26 14:07:40', '2018-06-26 20:19:47');
INSERT INTO `zm_menu` VALUES ('70', 'App 发现', '62', '1', 'fa fa-angle-right text-xs', '', '0', '0', 'zhuwanxiong-xy', '2018-06-26 17:35:17', '2018-06-26 17:35:17');
INSERT INTO `zm_menu` VALUES ('71', 'App Tabloid', '62', '1', 'fa fa-angle-right text-xs', '', '0', '0', 'zhuwanxiong-xy', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
