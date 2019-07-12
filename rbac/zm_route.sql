/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50726
Source Host           : 127.0.0.1:3306
Source Database       : app

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-07-05 15:15:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zm_route
-- ----------------------------
DROP TABLE IF EXISTS `zm_route`;
CREATE TABLE `zm_route` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '路由名称',
  `route` varchar(128) NOT NULL DEFAULT '' COMMENT '路由',
  `mid` int(12) NOT NULL DEFAULT '0' COMMENT '菜单id',
  `is_default` tinyint(1) NOT NULL COMMENT '是否默认 0:否1:是',
  `operator` varchar(21) NOT NULL DEFAULT '' COMMENT '操作人',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_route` (`route`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zm_route
-- ----------------------------
INSERT INTO `zm_route` VALUES ('7', '菜单首页', 'App\\Http\\Controllers\\Zuimei\\MenuController@getList', '41', '1', 'zhuwanxiong-xy', '2017-01-30 21:24:01', '2017-01-31 22:55:05');
INSERT INTO `zm_route` VALUES ('8', '菜单查询', 'App\\Http\\Controllers\\Zuimei\\MenuController@postQuery', '41', '0', 'zhuwanxiong-xy', '2017-01-30 21:25:52', '2017-01-31 22:47:45');
INSERT INTO `zm_route` VALUES ('9', '菜单添加', 'App\\Http\\Controllers\\Zuimei\\MenuController@postAdd', '41', '0', 'zhuwanxiong-xy', '2017-01-30 21:27:47', '2017-01-30 21:27:47');
INSERT INTO `zm_route` VALUES ('10', '菜单获取指定行', 'App\\Http\\Controllers\\Zuimei\\MenuController@postRow', '41', '0', 'zhuwanxiong-xy', '2017-01-30 21:28:54', '2017-01-30 21:28:54');
INSERT INTO `zm_route` VALUES ('11', '菜单更新', 'App\\Http\\Controllers\\Zuimei\\MenuController@postUpdate', '41', '0', 'zhuwanxiong-xy', '2017-01-30 21:29:47', '2017-01-30 21:29:47');
INSERT INTO `zm_route` VALUES ('12', '菜单删除', 'App\\Http\\Controllers\\Zuimei\\MenuController@postDelete', '41', '0', 'zhuwanxiong-xy', '2017-01-30 21:30:25', '2017-01-30 21:30:25');
INSERT INTO `zm_route` VALUES ('13', '路由首页', 'App\\Http\\Controllers\\Zuimei\\RouteController@getList', '42', '1', 'zhuwanxiong-xy', '2017-01-30 21:31:50', '2017-01-30 21:31:50');
INSERT INTO `zm_route` VALUES ('14', '路由查询', 'App\\Http\\Controllers\\Zuimei\\RouteController@postQuery', '42', '0', 'zhuwanxiong-xy', '2017-01-30 21:32:29', '2017-01-30 21:32:29');
INSERT INTO `zm_route` VALUES ('15', '路由添加', 'App\\Http\\Controllers\\Zuimei\\RouteController@postAdd', '42', '0', 'zhuwanxiong-xy', '2017-01-30 21:33:00', '2017-01-30 21:33:01');
INSERT INTO `zm_route` VALUES ('16', '路由获取一行', 'App\\Http\\Controllers\\Zuimei\\RouteController@postRow', '42', '0', 'zhuwanxiong-xy', '2017-01-30 21:34:09', '2017-01-30 21:34:09');
INSERT INTO `zm_route` VALUES ('17', '路由更新', 'App\\Http\\Controllers\\Zuimei\\RouteController@postUpdate', '42', '0', 'zhuwanxiong-xy', '2017-01-30 21:34:39', '2017-01-30 21:34:39');
INSERT INTO `zm_route` VALUES ('18', '路由删除', 'App\\Http\\Controllers\\Zuimei\\RouteController@postDelete', '42', '0', 'zhuwanxiong-xy', '2017-01-30 21:35:09', '2017-01-30 21:35:09');
INSERT INTO `zm_route` VALUES ('19', '角色首页', 'App\\Http\\Controllers\\Zuimei\\RoleController@getList', '43', '1', 'zhuwanxiong-xy', '2017-02-16 22:12:51', '2017-02-16 22:14:29');
INSERT INTO `zm_route` VALUES ('20', '角色查询', 'App\\Http\\Controllers\\Zuimei\\RoleController@postQuery', '43', '0', 'zhuwanxiong-xy', '2017-02-16 22:16:17', '2017-02-16 22:16:17');
INSERT INTO `zm_route` VALUES ('21', '角色添加', 'App\\Http\\Controllers\\Zuimei\\RoleController@postAdd', '43', '0', 'zhuwanxiong-xy', '2017-02-16 22:16:54', '2017-02-16 22:16:54');
INSERT INTO `zm_route` VALUES ('22', '角色获取指定行', 'App\\Http\\Controllers\\Zuimei\\RoleController@postRow', '43', '0', 'zhuwanxiong-xy', '2017-02-16 22:17:24', '2017-02-16 22:17:24');
INSERT INTO `zm_route` VALUES ('23', '角色更新', 'App\\Http\\Controllers\\Zuimei\\RoleController@postUpdate', '43', '0', 'zhuwanxiong-xy', '2017-02-16 22:17:46', '2017-02-16 22:17:46');
INSERT INTO `zm_route` VALUES ('24', '角色删除', 'App\\Http\\Controllers\\Zuimei\\RoleController@postDelete', '43', '0', 'zhuwanxiong-xy', '2017-02-16 22:18:07', '2017-02-19 20:42:55');
INSERT INTO `zm_route` VALUES ('25', '权限首页', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@getList', '44', '1', 'zhuwanxiong-xy', '2017-02-16 22:21:05', '2017-02-16 22:21:05');
INSERT INTO `zm_route` VALUES ('26', '权限查询', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postQuery', '44', '0', 'zhuwanxiong-xy', '2017-02-16 22:21:46', '2017-02-16 22:21:46');
INSERT INTO `zm_route` VALUES ('27', '权限添加', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postAdd', '44', '0', 'zhuwanxiong-xy', '2017-02-16 22:22:35', '2017-02-16 22:22:35');
INSERT INTO `zm_route` VALUES ('28', '权限删除', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postDelete', '44', '0', 'zhuwanxiong-xy', '2017-02-16 22:23:12', '2017-02-16 22:23:12');
INSERT INTO `zm_route` VALUES ('29', '用户首页', 'App\\Http\\Controllers\\Zuimei\\UserController@getList', '56', '1', 'zhuwanxiong-xy', '2017-02-16 22:39:21', '2017-02-16 22:39:21');
INSERT INTO `zm_route` VALUES ('30', '用户查询', 'App\\Http\\Controllers\\Zuimei\\UserController@postQuery', '56', '0', 'zhuwanxiong-xy', '2017-02-16 22:40:06', '2017-02-16 22:40:06');
INSERT INTO `zm_route` VALUES ('31', '用户添加', 'App\\Http\\Controllers\\Zuimei\\UserController@postAdd', '56', '0', 'zhuwanxiong-xy', '2017-02-16 22:40:58', '2017-02-16 22:40:58');
INSERT INTO `zm_route` VALUES ('32', '用户获取指定行', 'App\\Http\\Controllers\\Zuimei\\UserController@postRow', '56', '0', 'zhuwanxiong-xy', '2017-02-16 22:41:25', '2017-02-16 22:41:25');
INSERT INTO `zm_route` VALUES ('33', '用户更新', 'App\\Http\\Controllers\\Zuimei\\UserController@postUpdate', '56', '0', 'zhuwanxiong-xy', '2017-02-16 22:41:47', '2017-02-16 22:41:47');
INSERT INTO `zm_route` VALUES ('34', '用户删除', 'App\\Http\\Controllers\\Zuimei\\UserController@postDelete', '56', '0', 'zhuwanxiong-xy', '2017-02-16 22:42:21', '2017-02-16 22:42:21');
INSERT INTO `zm_route` VALUES ('35', '角色设置路由', 'App\\Http\\Controllers\\Zuimei\\RoleController@setting', '43', '0', 'zhuwanxiong-xy', '2017-02-18 19:13:07', '2017-02-18 19:13:07');
INSERT INTO `zm_route` VALUES ('36', '角色设置路由post', 'App\\Http\\Controllers\\Zuimei\\RoleController@postSetting', '43', '0', 'zhuwanxiong-xy', '2017-02-18 20:02:24', '2017-02-18 20:02:24');
INSERT INTO `zm_route` VALUES ('37', '类目首页', 'App\\Http\\Controllers\\Product\\CategoryController@getList', '63', '1', 'zhuwanxiong-xy', '2017-02-26 22:00:15', '2017-02-26 22:02:51');
INSERT INTO `zm_route` VALUES ('38', '类目添加', 'App\\Http\\Controllers\\Product\\CategoryController@postAdd', '63', '0', 'zhuwanxiong-xy', '2017-02-26 22:32:41', '2017-02-26 22:32:41');
INSERT INTO `zm_route` VALUES ('39', '类目查询', 'App\\Http\\Controllers\\Product\\CategoryController@postQuery', '63', '0', 'zhuwanxiong-xy', '2017-02-26 22:32:59', '2017-02-26 22:32:59');
INSERT INTO `zm_route` VALUES ('40', '类目获取指定行', 'App\\Http\\Controllers\\Product\\CategoryController@postRow', '63', '0', 'zhuwanxiong-xy', '2017-02-26 22:33:28', '2017-02-26 22:33:28');
INSERT INTO `zm_route` VALUES ('41', '类目更新', 'App\\Http\\Controllers\\Product\\CategoryController@postUpdate', '63', '0', 'zhuwanxiong-xy', '2017-02-26 22:36:55', '2017-02-26 22:36:55');
INSERT INTO `zm_route` VALUES ('42', '类目删除', 'App\\Http\\Controllers\\Product\\CategoryController@postDelete', '63', '0', 'zhuwanxiong-xy', '2017-02-26 22:37:48', '2017-02-26 22:37:48');
INSERT INTO `zm_route` VALUES ('43', '文章首页', 'App\\Http\\Controllers\\Product\\ArticleController@getList', '65', '1', 'zhuwanxiong-xy', '2017-02-28 20:51:46', '2017-02-28 21:05:00');
INSERT INTO `zm_route` VALUES ('44', '文章查询', 'App\\Http\\Controllers\\Product\\ArticleController@postQuery', '65', '0', 'zhuwanxiong-xy', '2017-02-28 20:52:30', '2017-02-28 21:06:37');
INSERT INTO `zm_route` VALUES ('45', '文章添加', 'App\\Http\\Controllers\\Product\\ArticleController@postAdd', '65', '0', 'zhuwanxiong-xy', '2017-02-28 20:53:04', '2017-02-28 20:53:04');
INSERT INTO `zm_route` VALUES ('46', '文章获取特定行', 'App\\Http\\Controllers\\Product\\ArticleController@postRow', '65', '0', 'zhuwanxiong-xy', '2017-02-28 20:53:32', '2017-02-28 20:53:32');
INSERT INTO `zm_route` VALUES ('47', '文章更新', 'App\\Http\\Controllers\\Product\\ArticleController@postUpdate', '65', '0', 'zhuwanxiong-xy', '2017-02-28 20:53:53', '2017-02-28 20:53:53');
INSERT INTO `zm_route` VALUES ('48', '文章删除', 'App\\Http\\Controllers\\Product\\ArticleController@postDelete', '65', '0', 'zhuwanxiong-xy', '2017-02-28 20:54:06', '2017-02-28 20:54:06');
INSERT INTO `zm_route` VALUES ('49', 'web首页', 'App\\Http\\Controllers\\Web\\WebController@getList', '47', '1', 'test', '2017-03-19 16:46:51', '2017-03-19 16:50:11');
INSERT INTO `zm_route` VALUES ('50', '商品首页', 'App\\Http\\Controllers\\Product\\GoodsController@getList', '64', '1', 'zhuwanxiong-xy', '2017-06-11 22:25:29', '2017-06-11 22:25:29');
INSERT INTO `zm_route` VALUES ('51', '商品查询', 'App\\Http\\Controllers\\Product\\GoodsController@postQuery', '64', '0', 'zhuwanxiong-xy', '2017-06-11 22:25:55', '2017-06-11 22:25:55');
INSERT INTO `zm_route` VALUES ('52', '商品添加', 'App\\Http\\Controllers\\Product\\GoodsController@postAdd', '64', '0', 'zhuwanxiong-xy', '2017-06-11 22:26:20', '2017-06-11 22:26:20');
INSERT INTO `zm_route` VALUES ('53', '商品查询特殊行', 'App\\Http\\Controllers\\Product\\GoodsController@postRow', '64', '0', 'zhuwanxiong-xy', '2017-06-11 22:26:42', '2017-06-11 22:26:42');
INSERT INTO `zm_route` VALUES ('54', '商品更新', 'App\\Http\\Controllers\\Product\\GoodsController@postUpdate', '64', '0', 'zhuwanxiong-xy', '2017-06-11 22:27:03', '2017-06-11 22:27:03');
INSERT INTO `zm_route` VALUES ('55', '商品删除', 'App\\Http\\Controllers\\Product\\GoodsController@postDelete', '64', '0', 'zhuwanxiong-xy', '2017-06-11 22:27:20', '2017-06-11 22:27:20');
INSERT INTO `zm_route` VALUES ('56', 'banner首页', 'App\\Http\\Controllers\\Product\\BannerController@getList', '67', '1', 'zhuwanxiong-xy', '2017-07-01 21:10:28', '2017-07-01 21:10:28');
INSERT INTO `zm_route` VALUES ('57', 'banner查询', 'App\\Http\\Controllers\\Product\\BannerController@postQuery', '67', '0', 'zhuwanxiong-xy', '2017-07-01 21:10:48', '2017-07-01 21:10:48');
INSERT INTO `zm_route` VALUES ('58', 'banner添加', 'App\\Http\\Controllers\\Product\\BannerController@postAdd', '67', '0', 'zhuwanxiong-xy', '2017-07-01 21:11:05', '2017-07-01 21:11:05');
INSERT INTO `zm_route` VALUES ('59', 'banner特殊行', 'App\\Http\\Controllers\\Product\\BannerController@postRow', '67', '0', 'zhuwanxiong-xy', '2017-07-01 21:11:24', '2017-07-01 21:11:24');
INSERT INTO `zm_route` VALUES ('60', 'banner更新', 'App\\Http\\Controllers\\Product\\BannerController@postUpdate', '67', '0', 'zhuwanxiong-xy', '2017-07-01 21:11:39', '2017-07-01 21:11:39');
INSERT INTO `zm_route` VALUES ('61', 'banner删除', 'App\\Http\\Controllers\\Product\\BannerController@postDelete', '67', '0', 'zhuwanxiong-xy', '2017-07-01 21:11:58', '2017-07-01 21:11:58');
INSERT INTO `zm_route` VALUES ('62', '后台首页', 'App\\Http\\Controllers\\Admin\\AdminController@index', '68', '1', 'zhuwanxiong-xy', '2017-09-03 00:34:58', '2017-09-03 00:34:58');
INSERT INTO `zm_route` VALUES ('64', 'topic首页', 'App\\Http\\Controllers\\Product\\TopicController@getList', '69', '1', 'zhuwanxiong-xy', '2017-12-26 14:13:33', '2017-12-26 14:13:33');
INSERT INTO `zm_route` VALUES ('65', 'topic查询', 'App\\Http\\Controllers\\Product\\TopicController@postQuery', '69', '0', 'zhuwanxiong-xy', '2017-12-26 14:14:27', '2017-12-26 14:14:27');
INSERT INTO `zm_route` VALUES ('66', 'topic添加', 'App\\Http\\Controllers\\Product\\TopicController@postAdd', '69', '0', 'zhuwanxiong-xy', '2017-12-26 14:15:35', '2017-12-26 14:15:35');
INSERT INTO `zm_route` VALUES ('67', 'topic特殊行', 'App\\Http\\Controllers\\Product\\TopicController@postRow', '69', '0', 'zhuwanxiong-xy', '2017-12-26 14:16:17', '2017-12-26 14:16:17');
INSERT INTO `zm_route` VALUES ('68', 'topic更新', 'App\\Http\\Controllers\\Product\\TopicController@postUpdate', '69', '0', 'zhuwanxiong-xy', '2017-12-26 14:16:54', '2017-12-26 14:16:54');
INSERT INTO `zm_route` VALUES ('69', 'topic删除', 'App\\Http\\Controllers\\Product\\TopicController@postDelete', '69', '0', 'zhuwanxiong-xy', '2017-12-26 14:17:38', '2017-12-26 14:17:38');
INSERT INTO `zm_route` VALUES ('70', '攻略首页', 'App\\Http\\Controllers\\Product\\StrategyController@getList', '70', '1', 'zhuwanxiong-xy', '2018-06-26 18:09:01', '2018-06-26 18:09:01');
INSERT INTO `zm_route` VALUES ('71', '攻略查询', 'App\\Http\\Controllers\\Product\\StrategyController@postQuery', '70', '1', 'zhuwanxiong-xy', '2018-06-26 18:18:58', '2018-06-26 18:18:55');
INSERT INTO `zm_route` VALUES ('72', '攻略添加', 'App\\Http\\Controllers\\Product\\StrategyController@postAdd', '70', '0', 'zhuwanxiong-xy', '2018-06-26 20:12:25', '2018-06-26 20:12:22');
INSERT INTO `zm_route` VALUES ('73', '攻略一行', 'App\\Http\\Controllers\\Product\\StrategyController@postRow', '70', '0', 'zhuwanxiong-xy', '2018-06-26 20:13:38', '2018-06-26 20:13:35');
INSERT INTO `zm_route` VALUES ('74', '攻略更新', 'App\\Http\\Controllers\\Product\\StrategyController@postUpdate', '70', '0', 'zhuwanxiong-xy', '2018-06-26 20:14:28', '2018-06-26 20:14:24');
INSERT INTO `zm_route` VALUES ('75', '攻略删除', 'App\\Http\\Controllers\\Product\\StrategyController@postDelete', '70', '0', 'zhuwanxiong-xy', '2018-06-26 20:15:08', '2018-06-26 20:15:05');
INSERT INTO `zm_route` VALUES ('76', '文摘首页', 'App\\Http\\Controllers\\Product\\TabloidController@getList', '71', '1', 'zhuwanxiong-xy', '2018-08-17 21:39:42', '0000-00-00 00:00:00');
INSERT INTO `zm_route` VALUES ('77', '文摘查询', 'App\\Http\\Controllers\\Product\\TabloidController@postQuery', '71', '1', 'zhuwanxiong-xy', '2018-08-17 21:40:31', '0000-00-00 00:00:00');
INSERT INTO `zm_route` VALUES ('78', '文摘添加', 'App\\Http\\Controllers\\Product\\TabloidController@postAdd', '71', '0', 'zhuwanxiong-xy', '2018-08-17 21:41:17', '0000-00-00 00:00:00');
INSERT INTO `zm_route` VALUES ('79', '文摘获取某行', 'App\\Http\\Controllers\\Product\\TabloidController@postRow', '71', '0', 'zhuwanxiong-xy', '2018-08-17 21:42:00', '0000-00-00 00:00:00');
INSERT INTO `zm_route` VALUES ('80', '文摘更新', 'App\\Http\\Controllers\\Product\\TabloidController@postUpdate', '71', '0', 'zhuwanxiong-xy', '2018-08-17 21:42:49', '0000-00-00 00:00:00');
INSERT INTO `zm_route` VALUES ('81', '文摘删除', 'App\\Http\\Controllers\\Product\\TabloidController@postDelete', '71', '0', 'zhuwanxiong-xy', '2018-08-17 21:43:31', '0000-00-00 00:00:00');
