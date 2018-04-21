/*
Navicat MySQL Data Transfer

Source Server         : a1
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : dome2

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-04-21 13:02:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `noteid` int(11) NOT NULL,
  `content` text NOT NULL,
  `filename` text,
  `ext` text,
  `type` text,
  `filepath` text,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `noteid` (`noteid`),
  CONSTRAINT `comment_note` FOREIGN KEY (`noteid`) REFERENCES `note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for mark
-- ----------------------------
DROP TABLE IF EXISTS `mark`;
CREATE TABLE `mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `markName` text NOT NULL,
  `isStart` tinyint(4) NOT NULL DEFAULT '0',
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updteTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isdelete` tinyint(3) unsigned zerofill NOT NULL DEFAULT '000',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `mark_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mark
-- ----------------------------
INSERT INTO `mark` VALUES ('1', '4', '学习', '0', '2018-04-21 13:00:17', '2018-04-21 13:00:17', '000');
INSERT INTO `mark` VALUES ('2', '4', '学习', '0', '2018-04-21 13:00:19', '2018-04-21 13:00:19', '000');
INSERT INTO `mark` VALUES ('3', '4', '娱乐', '0', '2018-04-21 13:00:31', '2018-04-21 13:00:31', '000');
INSERT INTO `mark` VALUES ('4', '4', '影视', '0', '2018-04-21 13:00:42', '2018-04-21 13:00:42', '000');
INSERT INTO `mark` VALUES ('5', '4', '游戏', '0', '2018-04-21 13:00:51', '2018-04-21 13:00:51', '000');
INSERT INTO `mark` VALUES ('6', '4', '休闲', '0', '2018-04-21 13:01:01', '2018-04-21 13:01:01', '000');
INSERT INTO `mark` VALUES ('7', '4', '作业', '0', '2018-04-21 13:01:12', '2018-04-21 13:01:12', '000');

-- ----------------------------
-- Table structure for note
-- ----------------------------
DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `content` text NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updteTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `markID` text,
  `notbookID` text,
  `remindTime` timestamp NULL DEFAULT NULL,
  `isStart` tinyint(4) NOT NULL DEFAULT '0',
  `isShare` tinyint(4) NOT NULL DEFAULT '0',
  `isdelete` tinyint(4) NOT NULL DEFAULT '0',
  `sharedpeople` text,
  `notebookid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `notebookid` (`notebookid`),
  CONSTRAINT `not_notebook` FOREIGN KEY (`notebookid`) REFERENCES `notebook` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `note_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of note
-- ----------------------------
INSERT INTO `note` VALUES ('2', '4', 'java，重写StringBuffer类的toString方法', '2018-04-21 12:54:19', '2018-04-21 12:54:19', '1,6', null, null, '0', '0', '0', null, '2');
INSERT INTO `note` VALUES ('4', '4', 'c++，预习多继承和多重继承', '2018-04-21 12:54:57', '2018-04-21 12:54:57', '1', null, null, '0', '0', '0', null, '2');
INSERT INTO `note` VALUES ('5', '4', '高等数学，P53第1,5,13题，预习下一章', '2018-04-21 12:56:33', '2018-04-21 12:56:33', '1,6', null, null, '0', '0', '0', null, '2');
INSERT INTO `note` VALUES ('6', '4', '视听说，网课注册，P63页听力', '2018-04-21 12:57:21', '2018-04-21 12:57:21', '1,6', null, null, '0', '0', '0', null, '2');
INSERT INTO `note` VALUES ('8', '4', '周五下午6101开班会', '2018-04-21 12:58:35', '2018-04-21 12:58:35', null, null, null, '0', '0', '0', null, '3');
INSERT INTO `note` VALUES ('9', '4', '周六上午10点东操场集合打扫卫生', '2018-04-21 12:58:51', '2018-04-21 12:58:51', null, null, null, '0', '0', '0', null, '3');
INSERT INTO `note` VALUES ('10', '4', '周一下午凑人头3201去听讲座', '2018-04-21 12:59:12', '2018-04-21 12:59:12', null, null, null, '0', '0', '0', null, '3');
INSERT INTO `note` VALUES ('11', '4', '周四晚上跟室友去看电影', '2018-04-21 12:59:32', '2018-04-21 12:59:32', '2,3,5', null, null, '0', '0', '0', null, '4');
INSERT INTO `note` VALUES ('12', '4', '周日陪兄弟一区上分', '2018-04-21 12:59:45', '2018-04-21 12:59:45', '2,4', null, null, '0', '0', '0', null, '4');
INSERT INTO `note` VALUES ('13', '4', '晚上去超市买生活用品', '2018-04-21 13:00:05', '2018-04-21 13:00:05', null, null, null, '0', '0', '0', null, '4');

-- ----------------------------
-- Table structure for notebook
-- ----------------------------
DROP TABLE IF EXISTS `notebook`;
CREATE TABLE `notebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `bookName` text NOT NULL,
  `isShare` tinyint(4) NOT NULL DEFAULT '0',
  `isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updteTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isStart` tinyint(4) NOT NULL DEFAULT '0',
  `noteNumber` int(11) NOT NULL DEFAULT '0',
  `sharedpeople` text,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `notebook_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notebook
-- ----------------------------
INSERT INTO `notebook` VALUES ('2', '4', '周末作业', '0', '0', '2018-04-21 12:52:40', '2018-04-21 12:52:40', '0', '0', null);
INSERT INTO `notebook` VALUES ('3', '4', '无聊琐事', '0', '0', '2018-04-21 12:52:53', '2018-04-21 12:52:53', '0', '0', null);
INSERT INTO `notebook` VALUES ('4', '4', '有趣大事', '0', '0', '2018-04-21 12:53:00', '2018-04-21 12:53:00', '0', '0', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `creataTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('4', '1', '123@qq.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-04-21 12:51:26');
INSERT INTO `user` VALUES ('5', '2', '456@qq.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-04-21 12:52:11');
