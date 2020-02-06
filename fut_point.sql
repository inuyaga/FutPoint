/*
 Navicat Premium Data Transfer

 Source Server         : 228
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : 192.168.1.228:3306
 Source Schema         : fut_point

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 06/02/2020 17:22:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fp_pais
-- ----------------------------
DROP TABLE IF EXISTS `fp_pais`;
CREATE TABLE `fp_pais`  (
  `pais_id` int(11) NOT NULL AUTO_INCREMENT,
  `pais_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pais_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fp_pais
-- ----------------------------
INSERT INTO `fp_pais` VALUES (3, 'MEXICO');
INSERT INTO `fp_pais` VALUES (4, 'ECUADOR');
INSERT INTO `fp_pais` VALUES (5, 'BRAZIL');

-- ----------------------------
-- Table structure for fp_partidos
-- ----------------------------
DROP TABLE IF EXISTS `fp_partidos`;
CREATE TABLE `fp_partidos`  (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_date` datetime(0) NULL DEFAULT NULL,
  `pt_status` int(2) NULL DEFAULT NULL,
  `pt_pais_uno_id` int(11) NULL DEFAULT NULL,
  `pt_pais_dos_id` int(11) NULL DEFAULT NULL,
  `pt_pais_uno_anotacion` int(11) NOT NULL DEFAULT 0,
  `pt_pais_dos_anotacion` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`pt_id`) USING BTREE,
  INDEX `pais_uno_vs`(`pt_pais_uno_id`) USING BTREE,
  INDEX `pais_dos_vs`(`pt_pais_dos_id`) USING BTREE,
  CONSTRAINT `pais_uno_vs` FOREIGN KEY (`pt_pais_uno_id`) REFERENCES `fp_pais` (`pais_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `pais_dos_vs` FOREIGN KEY (`pt_pais_dos_id`) REFERENCES `fp_pais` (`pais_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fp_partidos
-- ----------------------------
INSERT INTO `fp_partidos` VALUES (1, '2020-02-06 14:43:59', 2, 3, 5, 19, 14);
INSERT INTO `fp_partidos` VALUES (2, '2020-02-06 18:00:00', 2, 3, 4, 10, 4);
INSERT INTO `fp_partidos` VALUES (3, '2020-02-06 10:00:00', 0, 4, 5, 0, 0);

-- ----------------------------
-- Table structure for fp_user
-- ----------------------------
DROP TABLE IF EXISTS `fp_user`;
CREATE TABLE `fp_user`  (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_correo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `us_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  `us_telefono` int(10) NULL DEFAULT NULL,
  `us_direccion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  `us_pass` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NULL DEFAULT NULL,
  `us_is_superuser` int(2) NOT NULL,
  PRIMARY KEY (`us_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fp_user
-- ----------------------------
INSERT INTO `fp_user` VALUES (7, 'hdez.marioe@gmail.com', 'Mario Esteban Hernandez Hernandez', 2147483647, 'Fraccionamiento pomoca', '123456', 1);

SET FOREIGN_KEY_CHECKS = 1;
