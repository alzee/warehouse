/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : rfidsystem

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 14/03/2021 14:23:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bangding
-- ----------------------------
DROP TABLE IF EXISTS `bangding`;
CREATE TABLE `bangding`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '硬件地址',
  `number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '产品编号',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '产品名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bangding
-- ----------------------------
INSERT INTO `bangding` VALUES (1, '1111', '', '');
INSERT INTO `bangding` VALUES (2, '222', '编号2', '产品222');
INSERT INTO `bangding` VALUES (3, '333', '编号3', '测试产品');

-- ----------------------------
-- Table structure for jilu
-- ----------------------------
DROP TABLE IF EXISTS `jilu`;
CREATE TABLE `jilu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'EPC地址',
  `createTime` datetime(0) NULL DEFAULT NULL COMMENT '扫描时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jilu
-- ----------------------------
INSERT INTO `jilu` VALUES (1, '333', '2021-03-14 11:07:16');
INSERT INTO `jilu` VALUES (2, '333', '2021-03-14 11:09:03');
INSERT INTO `jilu` VALUES (3, '222', '2021-03-14 11:58:26');

SET FOREIGN_KEY_CHECKS = 1;
