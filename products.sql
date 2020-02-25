/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-02-24 16:53:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `prod_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_price` decimal(10,0) DEFAULT NULL,
  `prod_click` int(7) DEFAULT '0',
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'PHP入门到精通', '20', '0');
INSERT INTO `products` VALUES ('2', 'Java入门到精通', '30', '0');
INSERT INTO `products` VALUES ('3', 'golang入门到精通', '20', '0');
INSERT INTO `products` VALUES ('4', 'java入门到', '10', '0');
