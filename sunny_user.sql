/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-02-28 13:50:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sunny_user
-- ----------------------------
DROP TABLE IF EXISTS `sunny_user`;
CREATE TABLE `sunny_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mobile_char` varchar(11) DEFAULT NULL,
  `passwd_char` varchar(32) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sunny_user
-- ----------------------------
INSERT INTO `sunny_user` VALUES ('1', '15836020238', '123456', null);
