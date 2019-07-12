/*
Navicat MySQL Data Transfer

Source Server         : 118.31.47.62
Source Server Version : 50726
Source Host           : 118.31.47.62:3306
Source Database       : rbr9emum4g

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-07-05 15:15:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zm_user_role
-- ----------------------------
DROP TABLE IF EXISTS `zm_user_role`;
CREATE TABLE `zm_user_role` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `role_id` int(12) NOT NULL DEFAULT '0' COMMENT '角色fk',
  `operator` varchar(32) NOT NULL DEFAULT '' COMMENT '操作人',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_role` (`username`,`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zm_user_role
-- ----------------------------
INSERT INTO `zm_user_role` VALUES ('41', 'zhuwanxiong-xy', '12', 'zhuwanxiong-xy', '2017-02-18 20:08:34', '2017-02-18 20:08:34');
INSERT INTO `zm_user_role` VALUES ('49', 'test', '16', 'zhuwanxiong-xy', '2017-03-26 17:58:59', '2017-03-26 17:58:59');
INSERT INTO `zm_user_role` VALUES ('50', 'seeyou', '16', 'zhuwanxiong-xy', '2019-03-17 14:39:11', '2019-03-17 14:39:11');
