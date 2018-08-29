/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : yc_

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-29 17:59:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '无',
  `username` varchar(35) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `add_time` datetime NOT NULL,
  `log_time` datetime NOT NULL,
  `log_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '199', '199', '5b9240d47b1ee0f8a3f58853b6a900c9', '2018-08-28 16:28:53', '0000-00-00 00:00:00', '');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '1阿萨德3');
INSERT INTO `category` VALUES ('3', '撒旦');

-- ----------------------------
-- Table structure for goodscz
-- ----------------------------
DROP TABLE IF EXISTS `goodscz`;
CREATE TABLE `goodscz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT '彩种ID',
  `url_code` varchar(30) NOT NULL,
  `detai_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodscz
-- ----------------------------
INSERT INTO `goodscz` VALUES ('4', '2', '1', 'bjpks', '0');
INSERT INTO `goodscz` VALUES ('3', '123', '3', '22', '0');

-- ----------------------------
-- Table structure for goods_details
-- ----------------------------
DROP TABLE IF EXISTS `goods_details`;
CREATE TABLE `goods_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `dateline` datetime NOT NULL,
  `qs` varchar(255) NOT NULL COMMENT '期数',
  `bh` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_details
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `log_time` datetime NOT NULL,
  `res_time` datetime NOT NULL,
  `log_ip` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '敖德萨多', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12');
