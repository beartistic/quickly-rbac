/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50726
Source Host           : 127.0.0.1:3306
Source Database       : app

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-07-05 15:15:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zm_role
-- ----------------------------
DROP TABLE IF EXISTS `zm_role`;
CREATE TABLE `zm_role` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '角色名称',
  `operator` varchar(32) NOT NULL DEFAULT '' COMMENT '操作人',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zm_role
-- ----------------------------
INSERT INTO `zm_role` VALUES ('12', '超级管理员', 'zhuwanxiong-xy', '2017-02-11 10:56:21', '2017-02-11 20:04:32');
INSERT INTO `zm_role` VALUES ('13', '客户端组', 'zhuwanxiong-xy', '2017-02-11 17:45:51', '2017-02-11 17:45:51');
INSERT INTO `zm_role` VALUES ('14', '测试组', 'zhuwanxiong-xy', '2017-02-11 17:45:56', '2017-02-11 17:45:56');
INSERT INTO `zm_role` VALUES ('15', '服务端组', 'zhuwanxiong-xy', '2017-02-11 17:46:02', '2017-02-11 17:46:02');
INSERT INTO `zm_role` VALUES ('16', '游客', 'zhuwanxiong-xy', '2017-03-26 17:35:20', '2017-03-26 17:35:20');
