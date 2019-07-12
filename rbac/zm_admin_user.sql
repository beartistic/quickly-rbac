/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50726
Source Host           : 127.0.0.1:3306
Source Database       : app

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-07-05 15:14:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zm_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `zm_admin_user`;
CREATE TABLE `zm_admin_user` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '登录密码',
  `operator` varchar(32) NOT NULL DEFAULT '' COMMENT '操作人',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zm_admin_user
-- ----------------------------
INSERT INTO `zm_admin_user` VALUES ('46', 'zhuwanxiong-xy', 'fba373ec33f112d6fc74651cedc0c6c0', 'zhuwanxiong-xy', '2017-01-07 23:58:05', '2019-03-16 19:37:15');
INSERT INTO `zm_admin_user` VALUES ('47', 'test', 'e10adc3949ba59abbe56e057f20f883e', 'zhuwanxiong-xy', '2017-02-18 20:07:16', '2017-03-17 22:57:56');
INSERT INTO `zm_admin_user` VALUES ('48', 'seeyou', 'fba373ec33f112d6fc74651cedc0c6c0', 'zhuwanxiong-xy', '2019-03-17 14:38:44', '2019-03-18 12:01:30');
