/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50727
Source Host           : localhost:3306
Source Database       : dbcourse

Target Server Type    : MYSQL
Target Server Version : 50727
File Encoding         : 65001

Date: 2020-03-30 19:09:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `song_list`
-- ----------------------------
DROP TABLE IF EXISTS `song_list`;
CREATE TABLE `song_list` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `song_ID` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_bin,
  PRIMARY KEY (`user_ID`,`song_ID`),
  KEY `songid_index` (`song_ID`),
  CONSTRAINT `songid_index` FOREIGN KEY (`song_ID`) REFERENCES `song` (`song_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of song_list
-- ----------------------------
