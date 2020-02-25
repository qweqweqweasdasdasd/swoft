/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-02-25 10:56:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `order_did` int(11) NOT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_price` decimal(10,0) DEFAULT NULL,
  `discount` tinyint(7) DEFAULT NULL COMMENT '折扣 1 -10',
  `prod_num` int(20) DEFAULT NULL,
  `totalmoney` decimal(10,0) DEFAULT NULL,
  `prod_remark` text,
  PRIMARY KEY (`order_did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
