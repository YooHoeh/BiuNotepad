/*
Navicat MySQL Data Transfer

Source Server         : a1
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : dome

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-04-06 09:41:22
*/

CREATE DATABASE dome;

USE dome;

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
  `isdelete` tinyint(3) unsigned zerofill NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `mark_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mark
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of note
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notebook
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

INSERT INTO user ( username, password,email ) VALUES ( '1', '123@qq.com','7c4a8d09ca3762af61e59520943dc26494f8941b' );

INSERT INTO user ( username, password,email ) VALUES ( '2', '456@qq.com','7c4a8d09ca3762af61e59520943dc26494f8941b' );

INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 1, 'noetbook_test1' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 1, 'noetbook_test2' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 1, 'noetbook_test3' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 1, 'noetbook_test4' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 1, 'noetbook_test5' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 1, 'noetbook_test6' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 1, 'noetbook_test7' );

INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 2, 'noetbook_test1' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 2, 'noetbook_test2' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 2, 'noetbook_test3' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 2, 'noetbook_test4' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 2, 'noetbook_test5' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 2, 'noetbook_test6' );
INSERT INTO NOTEBOOK ( userid, bookname ) VALUES ( 2, 'noetbook_test7' );

INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test1',1);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test2',1);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test3',1);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test4',1);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test5',1);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test6',1);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test7',1);


INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test1',2);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test2',2);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test3',2);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test4',2);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test5',2);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test6',2);
INSERT INTO note ( userid, content ,notebookid) VALUES ( 1, 'noet_test7',2);


INSERT INTO mark ( userid, markName ) VALUES ( 1, 'mark_test1' );
INSERT INTO mark ( userid, markName ) VALUES ( 1, 'mark_test2' );
INSERT INTO mark ( userid, markName ) VALUES ( 1, 'mark_test3' );
INSERT INTO mark ( userid, markName ) VALUES ( 1, 'mark_test4' );
INSERT INTO mark ( userid, markName ) VALUES ( 1, 'mark_test5' );
INSERT INTO mark ( userid, markName ) VALUES ( 1, 'mark_test6' );
INSERT INTO mark ( userid, markName ) VALUES ( 1, 'mark_test7' );

INSERT INTO mark ( userid, markName ) VALUES ( 2, 'mark_test1' );
INSERT INTO mark ( userid, markName ) VALUES ( 2, 'mark_test2' );
INSERT INTO mark ( userid, markName ) VALUES ( 2, 'mark_test3' );
INSERT INTO mark ( userid, markName ) VALUES ( 2, 'mark_test4' );
INSERT INTO mark ( userid, markName ) VALUES ( 2, 'mark_test5' );
INSERT INTO mark ( userid, markName ) VALUES ( 2, 'mark_test6' );
INSERT INTO mark ( userid, markName ) VALUES ( 2, 'mark_test7' );
