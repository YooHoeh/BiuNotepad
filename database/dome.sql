/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : dome

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-04-26 17:54:01
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mark
-- ----------------------------
INSERT INTO `mark` VALUES ('1', '1', '学习', '1', '2018-04-21 13:00:17', '2018-04-21 13:00:17', '000');
INSERT INTO `mark` VALUES ('2', '1', '娱乐', '0', '2018-04-21 13:00:31', '2018-04-21 13:00:31', '000');
INSERT INTO `mark` VALUES ('3', '1', '影视', '0', '2018-04-21 13:00:42', '2018-04-21 13:00:42', '000');
INSERT INTO `mark` VALUES ('4', '1', '游戏', '1', '2018-04-21 13:00:51', '2018-04-21 13:00:51', '000');
INSERT INTO `mark` VALUES ('5', '1', '休闲', '0', '2018-04-21 13:01:01', '2018-04-21 13:01:01', '000');
INSERT INTO `mark` VALUES ('6', '1', '作业', '0', '2018-04-21 13:01:12', '2018-04-21 13:01:12', '000');
INSERT INTO `mark` VALUES ('7', '1', '团队', '0', '2018-04-26 13:02:07', '2018-04-26 13:02:07', '000');
INSERT INTO `mark` VALUES ('8', '1', '个人', '0', '2018-04-27 13:02:28', '2018-04-26 13:02:39', '000');

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
INSERT INTO `note` VALUES ('1', '1', 'java，重写StringBuffer类的toString方法', '2018-04-21 12:54:19', '2018-04-25 19:46:19', '1,6', '1', '2018-04-25 19:46:13', '1', '0', '0', null, '1');
INSERT INTO `note` VALUES ('2', '1', 'c++，预习多继承和多重继承', '2018-04-21 12:54:57', '2018-04-25 21:45:09', '1', '1', '2018-05-02 19:46:20', '1', '0', '0', null, '1');
INSERT INTO `note` VALUES ('3', '1', '高等数学，P53第1,5,13题，预习下一章', '2018-04-25 12:56:33', '2018-04-25 20:23:45', '1,6', '2', '2018-05-04 19:46:26', '0', '0', '0', null, '1');
INSERT INTO `note` VALUES ('4', '1', '视听说，网课注册，P63页听力', '2018-05-02 12:57:21', '2018-04-25 20:30:11', '1,6', '1', '2018-05-02 19:46:31', '0', '0', '0', null, '1');
INSERT INTO `note` VALUES ('5', '1', '周五下午6101开班会', '2018-04-21 12:58:35', '2018-04-25 19:46:42', null, '1', '2018-03-30 19:46:37', '1', '0', '0', null, '2');
INSERT INTO `note` VALUES ('6', '1', '周六上午10点东操场集合打扫卫生', '2018-04-21 12:58:51', '2018-04-25 19:46:47', null, '1', '2018-05-16 19:46:42', '0', '0', '0', null, '2');
INSERT INTO `note` VALUES ('7', '1', '周一下午凑人头3201去听讲座', '2018-04-21 12:59:12', '2018-04-25 19:46:50', null, '3', '2018-04-08 19:46:47', '0', '0', '0', null, '2');
INSERT INTO `note` VALUES ('8', '1', '周四晚上跟室友去看电影', '2018-04-21 12:59:32', '2018-04-25 19:46:53', '2,3,5', '3', '2018-04-16 19:46:50', '1', '0', '0', null, '3');
INSERT INTO `note` VALUES ('9', '1', '周日陪兄弟一区上分', '2018-04-21 12:59:45', '2018-04-25 19:46:56', '2,4', '1', '2018-04-15 19:46:53', '0', '0', '0', null, '3');
INSERT INTO `note` VALUES ('10', '1', '晚上去超市买生活用品', '2018-04-21 13:00:05', '2018-04-25 19:46:59', null, '2', '2018-04-01 19:46:56', '0', '0', '0', null, '3');

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
INSERT INTO `notebook` VALUES ('1', '1', '周末作业', '0', '0', '2018-04-21 12:52:40', '2018-04-24 17:44:36', '1', '0', null);
INSERT INTO `notebook` VALUES ('2', '1', '无聊琐事', '0', '0', '2018-04-21 12:52:53', '2018-04-24 17:44:39', '0', '0', null);
INSERT INTO `notebook` VALUES ('3', '1', '有趣大事', '0', '0', '2018-04-21 12:53:00', '2018-04-24 17:44:43', '0', '0', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'text_user1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123@qq.com', '2018-04-21 12:51:26');
INSERT INTO `user` VALUES ('2', 'text_user2', '7c4a8d09ca3762af61e59520943dc26494f8941b', '456@qq.com', '2018-04-21 12:52:11');
