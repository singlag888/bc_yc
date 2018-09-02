/*
Navicat MySQL Data Transfer

Source Server         : yeq
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bc_yc

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-09-02 23:19:05
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
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'good_name',
  `is_correct` int(11) NOT NULL COMMENT '1=中  2=挂',
  `award_number` int(11) NOT NULL COMMENT '开奖号',
  `category_id` int(11) NOT NULL,
  `start_s` int(11) NOT NULL COMMENT '星级',
  `url_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '﻿福临计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('2', '\r\n财通计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('3', '\r\n金玉计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('4', '\r\n顺心计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('5', '\r\n隆财计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('6', '\r\n吉星计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('7', '\r\n吉日计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('8', '\r\n满堂红计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('9', '\r\n喜鸟计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('10', '\r\n万紫计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('11', '\r\n万红计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('12', '\r\n黑马计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('13', '\r\n祥云计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('14', '\r\n祥福计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('15', '\r\n旺旺计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('16', '\r\n黑司令计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('17', '\r\n如意计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('18', '\r\n祥瑞计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('19', '\r\n红马计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('20', '\r\n富泰计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('21', '﻿福临计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('22', '\r\n财通计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('23', '\r\n金玉计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('24', '\r\n顺心计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('25', '\r\n隆财计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('26', '\r\n吉星计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('27', '\r\n吉日计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('28', '\r\n满堂红计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('29', '\r\n喜鸟计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('30', '\r\n万紫计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('31', '\r\n万红计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('32', '\r\n黑马计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('33', '\r\n祥云计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('34', '\r\n祥福计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('35', '\r\n旺旺计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('36', '\r\n黑司令计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('37', '\r\n如意计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('38', '\r\n祥瑞计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('39', '\r\n红马计划', '0', '0', '1', '1', 'bjpks');
INSERT INTO `goods` VALUES ('40', '\r\n富泰计划', '0', '0', '1', '1', 'bjpks');

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
-- Table structure for goods_j
-- ----------------------------
DROP TABLE IF EXISTS `goods_j`;
CREATE TABLE `goods_j` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qs` varchar(255) NOT NULL,
  `dateline` datetime NOT NULL,
  `number` varchar(11) NOT NULL,
  `cz_b` varchar(255) DEFAULT NULL,
  `rand_code` varchar(255) NOT NULL,
  `is_yes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_j
-- ----------------------------
INSERT INTO `goods_j` VALUES ('1', '701814', '2018-09-02 23:02:45', '02,06,08,04', 'bjpks', '7,4,1,6,7,1,2,2,7,4', null);
INSERT INTO `goods_j` VALUES ('2', '701813', '2018-09-02 22:57:38', '02,08,05,09', 'bjpks', '1,5,5,4,9,6,6,0,4,3', null);
INSERT INTO `goods_j` VALUES ('3', '701812', '2018-09-02 22:52:45', '07,04,02,03', 'bjpks', '7,9,7,4,3,3,2,6,7,0', null);
INSERT INTO `goods_j` VALUES ('4', '701811', '2018-09-02 22:47:44', '09,06,01,10', 'bjpks', '1,4,1,5,3,2,6,8,4,9', null);
INSERT INTO `goods_j` VALUES ('5', '701810', '2018-09-02 22:42:36', '02,03,04,08', 'bjpks', '1,1,4,3,8,7,3,6,1,1', null);
INSERT INTO `goods_j` VALUES ('6', '701809', '2018-09-02 22:37:42', '05,06,03,08', 'bjpks', '3,2,3,8,4,2,1,3,0,5', null);
INSERT INTO `goods_j` VALUES ('7', '701808', '2018-09-02 22:32:44', '01,03,05,06', 'bjpks', '6,3,8,5,7,9,6,4,8,5', null);
INSERT INTO `goods_j` VALUES ('8', '701807', '2018-09-02 22:27:49', '07,08,04,10', 'bjpks', '3,0,9,8,1,9,0,6,1,7', null);
INSERT INTO `goods_j` VALUES ('9', '701806', '2018-09-02 22:22:54', '06,09,04,03', 'bjpks', '2,8,5,6,0,7,6,5,0,5', null);
INSERT INTO `goods_j` VALUES ('10', '701805', '2018-09-02 22:17:43', '06,05,10,07', 'bjpks', '1,4,9,5,6,7,1,7,2,9', null);
INSERT INTO `goods_j` VALUES ('11', '701814', '2018-09-02 23:02:45', '02,06,08,04', 'bjpks', '3,2,5,8,4,5,4,6,5,6', null);
INSERT INTO `goods_j` VALUES ('12', '701813', '2018-09-02 22:57:38', '02,08,05,09', 'bjpks', '2,9,9,6,8,4,2,9,4,9', null);
INSERT INTO `goods_j` VALUES ('13', '701812', '2018-09-02 22:52:45', '07,04,02,03', 'bjpks', '8,2,5,4,3,8,0,6,6,1', null);
INSERT INTO `goods_j` VALUES ('14', '701811', '2018-09-02 22:47:44', '09,06,01,10', 'bjpks', '3,7,3,5,8,2,6,4,7,3', null);
INSERT INTO `goods_j` VALUES ('15', '701810', '2018-09-02 22:42:36', '02,03,04,08', 'bjpks', '6,1,4,7,7,2,5,6,1,4', null);
INSERT INTO `goods_j` VALUES ('16', '701809', '2018-09-02 22:37:42', '05,06,03,08', 'bjpks', '4,5,9,5,6,5,7,7,5,1', null);
INSERT INTO `goods_j` VALUES ('17', '701808', '2018-09-02 22:32:44', '01,03,05,06', 'bjpks', '2,4,6,0,8,7,6,3,1,8', null);
INSERT INTO `goods_j` VALUES ('18', '701807', '2018-09-02 22:27:49', '07,08,04,10', 'bjpks', '6,0,0,6,9,7,0,9,8,4', null);
INSERT INTO `goods_j` VALUES ('19', '701806', '2018-09-02 22:22:54', '06,09,04,03', 'bjpks', '4,6,2,2,9,4,6,1,0,4', null);
INSERT INTO `goods_j` VALUES ('20', '701805', '2018-09-02 22:17:43', '06,05,10,07', 'bjpks', '7,4,0,6,2,8,9,9,3,9', null);

-- ----------------------------
-- Table structure for good_category
-- ----------------------------
DROP TABLE IF EXISTS `good_category`;
CREATE TABLE `good_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of good_category
-- ----------------------------
INSERT INTO `good_category` VALUES ('1', '北京赛车');
INSERT INTO `good_category` VALUES ('2', '秒速赛车');
INSERT INTO `good_category` VALUES ('5', '重庆时时彩');
INSERT INTO `good_category` VALUES ('6', '秒速时时彩');
INSERT INTO `good_category` VALUES ('7', '北京快3');
INSERT INTO `good_category` VALUES ('8', '广西快3');
INSERT INTO `good_category` VALUES ('9', '湖北快3');

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
