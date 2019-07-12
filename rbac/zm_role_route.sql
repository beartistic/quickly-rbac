/*
Navicat MySQL Data Transfer

Source Server         : 118.31.47.62
Source Server Version : 50726
Source Host           : 118.31.47.62:3306
Source Database       : rbr9emum4g

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-07-05 15:15:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zm_role_route
-- ----------------------------
DROP TABLE IF EXISTS `zm_role_route`;
CREATE TABLE `zm_role_route` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `role_id` int(12) NOT NULL DEFAULT '0' COMMENT '角色fk',
  `has_route` varchar(255) NOT NULL DEFAULT '' COMMENT '路由',
  `operator` varchar(32) NOT NULL DEFAULT '' COMMENT '操作人',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1064 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zm_role_route
-- ----------------------------
INSERT INTO `zm_role_route` VALUES ('128', '13', 'App\\Http\\Controllers\\Zuimei\\MenuController@getList', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('129', '13', 'App\\Http\\Controllers\\Zuimei\\MenuController@postQuery', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('130', '13', 'App\\Http\\Controllers\\Zuimei\\MenuController@postAdd', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('131', '13', 'App\\Http\\Controllers\\Zuimei\\MenuController@postRow', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('132', '13', 'App\\Http\\Controllers\\Zuimei\\MenuController@postUpdate', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('133', '13', 'App\\Http\\Controllers\\Zuimei\\MenuController@postDelete', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('134', '13', 'App\\Http\\Controllers\\Zuimei\\RouteController@getList', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('135', '13', 'App\\Http\\Controllers\\Zuimei\\RouteController@postQuery', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('136', '13', 'App\\Http\\Controllers\\Zuimei\\RouteController@postAdd', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('137', '13', 'App\\Http\\Controllers\\Zuimei\\RouteController@postRow', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('138', '13', 'App\\Http\\Controllers\\Zuimei\\RouteController@postUpdate', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('139', '13', 'App\\Http\\Controllers\\Zuimei\\RouteController@postDelete', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('140', '13', 'App\\Http\\Controllers\\Zuimei\\RoleController@getList', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('141', '13', 'App\\Http\\Controllers\\Zuimei\\RoleController@postQuery', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('142', '13', 'App\\Http\\Controllers\\Zuimei\\RoleController@postAdd', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('143', '13', 'App\\Http\\Controllers\\Zuimei\\RoleController@postRow', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('144', '13', 'App\\Http\\Controllers\\Zuimei\\RoleController@postUpdate', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('145', '13', '	App\\Http\\Controllers\\Zuimei\\RoleController@postDelete', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('146', '13', 'App\\Http\\Controllers\\Zuimei\\RoleController@setting', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('147', '13', 'App\\Http\\Controllers\\Zuimei\\RoleController@postSetting', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('148', '13', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@getList', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('149', '13', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postQuery', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('150', '13', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postAdd', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('151', '13', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postDelete', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('152', '13', 'App\\Http\\Controllers\\Zuimei\\UserController@getList', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('153', '13', 'App\\Http\\Controllers\\Zuimei\\UserController@postQuery', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('154', '13', 'App\\Http\\Controllers\\Zuimei\\UserController@postAdd', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('155', '13', 'App\\Http\\Controllers\\Zuimei\\UserController@postRow', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('156', '13', 'App\\Http\\Controllers\\Zuimei\\UserController@postUpdate', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('157', '13', 'App\\Http\\Controllers\\Zuimei\\UserController@postDelete', 'zhuwanxiong-xy', '2017-02-19 16:02:18', '2017-02-19 16:02:18');
INSERT INTO `zm_role_route` VALUES ('556', '16', 'App\\Http\\Controllers\\Zuimei\\MenuController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('557', '16', 'App\\Http\\Controllers\\Zuimei\\MenuController@postQuery', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('558', '16', 'App\\Http\\Controllers\\Zuimei\\MenuController@postRow', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('559', '16', 'App\\Http\\Controllers\\Zuimei\\RouteController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('560', '16', 'App\\Http\\Controllers\\Zuimei\\RouteController@postQuery', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('561', '16', 'App\\Http\\Controllers\\Zuimei\\RouteController@postRow', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('562', '16', 'App\\Http\\Controllers\\Zuimei\\RoleController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('563', '16', 'App\\Http\\Controllers\\Zuimei\\RoleController@postQuery', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('564', '16', 'App\\Http\\Controllers\\Zuimei\\RoleController@postRow', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('565', '16', 'App\\Http\\Controllers\\Zuimei\\RoleController@setting', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('566', '16', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('567', '16', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postQuery', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('568', '16', 'App\\Http\\Controllers\\Zuimei\\UserController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('569', '16', 'App\\Http\\Controllers\\Zuimei\\UserController@postQuery', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('570', '16', 'App\\Http\\Controllers\\Zuimei\\UserController@postRow', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('571', '16', 'App\\Http\\Controllers\\Web\\WebController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('572', '16', 'App\\Http\\Controllers\\Product\\CategoryController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('573', '16', 'App\\Http\\Controllers\\Product\\CategoryController@postQuery', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('574', '16', 'App\\Http\\Controllers\\Product\\CategoryController@postRow', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('575', '16', 'App\\Http\\Controllers\\Product\\ArticleController@getList', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('576', '16', 'App\\Http\\Controllers\\Product\\ArticleController@postQuery', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('577', '16', 'App\\Http\\Controllers\\Product\\ArticleController@postRow', 'zhuwanxiong-xy', '2017-03-26 17:58:08', '2017-03-26 17:58:08');
INSERT INTO `zm_role_route` VALUES ('990', '12', 'App\\Http\\Controllers\\Zuimei\\MenuController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('991', '12', 'App\\Http\\Controllers\\Zuimei\\MenuController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('992', '12', 'App\\Http\\Controllers\\Zuimei\\MenuController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('993', '12', 'App\\Http\\Controllers\\Zuimei\\MenuController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('994', '12', 'App\\Http\\Controllers\\Zuimei\\MenuController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('995', '12', 'App\\Http\\Controllers\\Zuimei\\MenuController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('996', '12', 'App\\Http\\Controllers\\Zuimei\\RouteController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('997', '12', 'App\\Http\\Controllers\\Zuimei\\RouteController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('998', '12', 'App\\Http\\Controllers\\Zuimei\\RouteController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('999', '12', 'App\\Http\\Controllers\\Zuimei\\RouteController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1000', '12', 'App\\Http\\Controllers\\Zuimei\\RouteController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1001', '12', 'App\\Http\\Controllers\\Zuimei\\RouteController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1002', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1003', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1004', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1005', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1006', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1007', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1008', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@setting', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1009', '12', 'App\\Http\\Controllers\\Zuimei\\RoleController@postSetting', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1010', '12', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1011', '12', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1012', '12', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1013', '12', 'App\\Http\\Controllers\\Zuimei\\UserRoleController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1014', '12', 'App\\Http\\Controllers\\Zuimei\\UserController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1015', '12', 'App\\Http\\Controllers\\Zuimei\\UserController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1016', '12', 'App\\Http\\Controllers\\Zuimei\\UserController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1017', '12', 'App\\Http\\Controllers\\Zuimei\\UserController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1018', '12', 'App\\Http\\Controllers\\Zuimei\\UserController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1019', '12', 'App\\Http\\Controllers\\Zuimei\\UserController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1020', '12', 'App\\Http\\Controllers\\Web\\WebController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1021', '12', 'App\\Http\\Controllers\\Admin\\AdminController@index', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1022', '12', 'App\\Http\\Controllers\\Product\\CategoryController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1023', '12', 'App\\Http\\Controllers\\Product\\CategoryController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1024', '12', 'App\\Http\\Controllers\\Product\\CategoryController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1025', '12', 'App\\Http\\Controllers\\Product\\CategoryController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1026', '12', 'App\\Http\\Controllers\\Product\\CategoryController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1027', '12', 'App\\Http\\Controllers\\Product\\CategoryController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1028', '12', 'App\\Http\\Controllers\\Product\\GoodsController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1029', '12', 'App\\Http\\Controllers\\Product\\GoodsController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1030', '12', 'App\\Http\\Controllers\\Product\\GoodsController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1031', '12', 'App\\Http\\Controllers\\Product\\GoodsController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1032', '12', 'App\\Http\\Controllers\\Product\\GoodsController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1033', '12', 'App\\Http\\Controllers\\Product\\GoodsController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1034', '12', 'App\\Http\\Controllers\\Product\\ArticleController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1035', '12', 'App\\Http\\Controllers\\Product\\ArticleController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1036', '12', 'App\\Http\\Controllers\\Product\\ArticleController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1037', '12', 'App\\Http\\Controllers\\Product\\ArticleController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1038', '12', 'App\\Http\\Controllers\\Product\\ArticleController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1039', '12', 'App\\Http\\Controllers\\Product\\ArticleController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1040', '12', 'App\\Http\\Controllers\\Product\\BannerController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1041', '12', 'App\\Http\\Controllers\\Product\\BannerController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1042', '12', 'App\\Http\\Controllers\\Product\\BannerController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1043', '12', 'App\\Http\\Controllers\\Product\\BannerController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1044', '12', 'App\\Http\\Controllers\\Product\\BannerController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1045', '12', 'App\\Http\\Controllers\\Product\\BannerController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1046', '12', 'App\\Http\\Controllers\\Product\\TopicController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1047', '12', 'App\\Http\\Controllers\\Product\\TopicController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1048', '12', 'App\\Http\\Controllers\\Product\\TopicController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1049', '12', 'App\\Http\\Controllers\\Product\\TopicController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1050', '12', 'App\\Http\\Controllers\\Product\\TopicController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1051', '12', 'App\\Http\\Controllers\\Product\\TopicController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1052', '12', 'App\\Http\\Controllers\\Product\\StrategyController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1053', '12', 'App\\Http\\Controllers\\Product\\StrategyController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1054', '12', 'App\\Http\\Controllers\\Product\\StrategyController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1055', '12', 'App\\Http\\Controllers\\Product\\StrategyController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1056', '12', 'App\\Http\\Controllers\\Product\\StrategyController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1057', '12', 'App\\Http\\Controllers\\Product\\StrategyController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1058', '12', 'App\\Http\\Controllers\\Product\\TabloidController@getList', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1059', '12', 'App\\Http\\Controllers\\Product\\TabloidController@postQuery', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1060', '12', 'App\\Http\\Controllers\\Product\\TabloidController@postAdd', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1061', '12', 'App\\Http\\Controllers\\Product\\TabloidController@postRow', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1062', '12', 'App\\Http\\Controllers\\Product\\TabloidController@postUpdate', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
INSERT INTO `zm_role_route` VALUES ('1063', '12', 'App\\Http\\Controllers\\Product\\TabloidController@postDelete', 'zhuwanxiong-xy', '2019-07-03 13:59:03', '2019-07-03 05:59:03');
