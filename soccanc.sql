/*
 Navicat Premium Data Transfer

 Source Server         : Ham
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : soccanc

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 04/03/2020 02:55:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `post_id`(`post_id`) USING BTREE,
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 10, 38, 'hjikfiyf', '2020-02-22 22:14:12.987913');
INSERT INTO `comments` VALUES (2, 11, 38, '', '2020-02-22 22:17:36.672588');
INSERT INTO `comments` VALUES (3, 11, 38, '', '2020-02-22 22:18:06.424430');
INSERT INTO `comments` VALUES (4, 10, 38, 'jhjhikhb', '2020-02-22 22:18:49.124512');
INSERT INTO `comments` VALUES (5, 11, 38, '', '2020-02-22 22:30:43.927646');
INSERT INTO `comments` VALUES (6, 11, 38, '', '2020-02-22 22:37:29.853639');
INSERT INTO `comments` VALUES (7, 13, 38, 'hbn,boug', '2020-02-22 22:45:12.643924');
INSERT INTO `comments` VALUES (10, 13, 38, 'Ham', '2020-02-23 11:44:06.991393');
INSERT INTO `comments` VALUES (14, 13, 38, '123456', '2020-02-23 11:46:47.150773');
INSERT INTO `comments` VALUES (15, 13, 38, '123456', '2020-02-23 12:13:01.204648');
INSERT INTO `comments` VALUES (16, 13, 38, 'bjhk', '2020-02-23 19:49:49.066066');
INSERT INTO `comments` VALUES (18, 19, 38, 'ffffffffffff', '2020-03-04 00:56:09.557494');
INSERT INTO `comments` VALUES (19, 19, 38, 'cdac', '2020-03-04 00:56:58.068598');
INSERT INTO `comments` VALUES (20, 19, 38, 'xxxx', '2020-03-04 01:09:10.268733');
INSERT INTO `comments` VALUES (21, 18, 38, 'xxxx', '2020-03-04 01:09:18.596960');
INSERT INTO `comments` VALUES (22, 19, 38, 'zzz', '2020-03-04 01:10:07.710192');
INSERT INTO `comments` VALUES (23, 19, 38, 'xxxxx', '2020-03-04 01:13:30.989221');
INSERT INTO `comments` VALUES (24, 18, 38, 'sssss', '2020-03-04 01:14:31.057016');
INSERT INTO `comments` VALUES (25, 18, 38, 'xxxxxxxx', '2020-03-04 01:15:08.645441');
INSERT INTO `comments` VALUES (26, 19, 38, 'xxxxxxxx', '2020-03-04 01:15:15.078749');
INSERT INTO `comments` VALUES (27, 18, 38, 'xxxxxxxxxxxx', '2020-03-04 01:15:46.217153');
INSERT INTO `comments` VALUES (28, 18, 38, 'dddd', '2020-03-04 01:20:28.851545');
INSERT INTO `comments` VALUES (29, 18, 38, 'qqqqqqqq', '2020-03-04 01:20:39.427550');
INSERT INTO `comments` VALUES (30, 18, 38, 'sssss', '2020-03-04 01:21:55.891797');
INSERT INTO `comments` VALUES (31, 18, 38, 'sssss', '2020-03-04 01:22:42.572164');
INSERT INTO `comments` VALUES (32, 18, 38, 'sssssssssssssss', '2020-03-04 01:23:38.717583');
INSERT INTO `comments` VALUES (33, 18, 38, 'sssssssssssssssss', '2020-03-04 01:25:03.655641');
INSERT INTO `comments` VALUES (34, 18, 38, 'ssssssssssss', '2020-03-04 01:25:26.561076');
INSERT INTO `comments` VALUES (35, 18, 38, 'eeeeeeeeeeeeeeee', '2020-03-04 01:26:16.730319');
INSERT INTO `comments` VALUES (36, 18, 38, 'sssssssssssssssssssssss', '2020-03-04 01:27:55.634819');
INSERT INTO `comments` VALUES (37, 18, 38, 'sss', '2020-03-04 01:28:43.198384');
INSERT INTO `comments` VALUES (38, 20, 38, 'vvvv', '2020-03-04 01:47:07.197064');
INSERT INTO `comments` VALUES (39, 21, 38, 'sssssssss', '2020-03-04 02:42:54.730873');
INSERT INTO `comments` VALUES (40, 21, 38, 'sssssss', '2020-03-04 02:43:28.058588');

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `my_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `my_id`(`my_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`my_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of friends
-- ----------------------------
INSERT INTO `friends` VALUES (22, 39, 38);
INSERT INTO `friends` VALUES (23, 38, 40);

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `my_id` int(11) NULL DEFAULT NULL,
  `rec_id` int(11) NULL DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `my_id`(`my_id`) USING BTREE,
  INDEX `rec_id`(`rec_id`) USING BTREE,
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`my_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`rec_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 705 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES (601, 38, 39, 'Barev', '2020-02-17 19:36:05');
INSERT INTO `message` VALUES (614, 39, 38, 'Barev aper', '2020-02-17 21:40:26');
INSERT INTO `message` VALUES (695, 38, 40, 'baerv', '2020-02-19 11:43:14');
INSERT INTO `message` VALUES (696, 38, 39, 's', '2020-02-19 11:51:28');
INSERT INTO `message` VALUES (697, 38, 39, 's', '2020-02-20 00:42:46');
INSERT INTO `message` VALUES (698, 38, 39, '', '2020-02-20 00:42:49');
INSERT INTO `message` VALUES (699, 38, 39, '', '2020-02-20 00:42:51');
INSERT INTO `message` VALUES (700, 38, 39, '', '2020-02-20 00:42:52');
INSERT INTO `message` VALUES (701, 38, 39, '', '2020-02-20 00:42:52');
INSERT INTO `message` VALUES (702, 38, 39, '', '2020-02-20 00:42:52');
INSERT INTO `message` VALUES (703, 38, 39, '', '2020-02-20 00:42:52');
INSERT INTO `message` VALUES (704, 38, 40, '', '2020-02-20 00:43:17');

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES (66, 'img/158167240115814941701581437056158093320782571707_2588301081414936_5427464233954574336_n.jpg', 39);
INSERT INTO `photos` VALUES (67, 'img/1581702555158149385581350789_472694286961512_4884583004850094080_n.jpg', 40);
INSERT INTO `photos` VALUES (70, 'img/1583276035158309246515816668391581494333158126406380596517_2492171037720584_2782673757339123712_o.jpg', 38);

-- ----------------------------
-- Table structure for post_likes
-- ----------------------------
DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE `post_likes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `post_id`(`post_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_likes
-- ----------------------------
INSERT INTO `post_likes` VALUES (1, 13, 38);
INSERT INTO `post_likes` VALUES (2, 15, 38);
INSERT INTO `post_likes` VALUES (3, 16, 38);
INSERT INTO `post_likes` VALUES (4, 13, 38);
INSERT INTO `post_likes` VALUES (5, 13, 38);
INSERT INTO `post_likes` VALUES (7, 18, 38);
INSERT INTO `post_likes` VALUES (13, 21, 38);

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `post` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (13, 38, 'gggggggg', '2020-02-22 22:45:00.760984', 'images/158239710015816668391581494333158126406380596517_2492171037720584_2782673757339123712_o.jpg');
INSERT INTO `posts` VALUES (15, 38, 'Arman', '2020-02-23 16:26:35.646139', 'images/158246079515814941701581437056158093320782571707_2588301081414936_5427464233954574336_n.jpg');
INSERT INTO `posts` VALUES (16, 38, '', '2020-02-23 17:47:57.205875', NULL);
INSERT INTO `posts` VALUES (17, 38, 'jdfhfvbhwphpwh[w', '2020-02-24 11:33:45.236679', 'images/15825296251581494333158126406380596517_2492171037720584_2782673757339123712_o.jpg');
INSERT INTO `posts` VALUES (18, 39, '', '2020-02-24 12:19:58.126732', NULL);
INSERT INTO `posts` VALUES (19, 39, 'ldkwhfwhwp', '2020-02-24 12:43:21.780016', 'images/1582533801158223088715814941701581437056158093320782571707_2588301081414936_5427464233954574336_n.jpg');
INSERT INTO `posts` VALUES (20, 38, 'sssssssssss', '2020-03-04 01:46:57.022530', 'images/1583272016images.jpg');
INSERT INTO `posts` VALUES (21, 38, 'sssssssssssssssssssssss', '2020-03-04 01:48:02.322162', 'images/1583272082images (2).jp.jpg');

-- ----------------------------
-- Table structure for request
-- ----------------------------
DROP TABLE IF EXISTS `request`;
CREATE TABLE `request`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `my_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`my_id`) USING BTREE,
  INDEX `user_id_2`(`user_id`) USING BTREE,
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`my_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `request_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of request
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `age` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `profil` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (38, 'Hambardzum', 'Poghosyan', 'ham@mail.ru', '$2y$10$zk.YThb9wTb/SGoV8CGfoOLcvlsK8WtGpFw8xR/D9C2hLOFik7DLq', '22', 'img/15816668391581494333158126406380596517_2492171037720584_2782673757339123712_o.jpg');
INSERT INTO `users` VALUES (39, 'Arman', 'Amirkhanyan', 'arm@mail.ru', '$2y$10$wVT/GpIdarBsXMO9yEAFJ.xMXg6nfKPYmkdKrdAC0rzhgGJR5SU9i', '22', 'img/158167240115814941701581437056158093320782571707_2588301081414936_5427464233954574336_n.jpg');
INSERT INTO `users` VALUES (40, 'Harut', 'Mayilyan', 'har@mail.ru', '$2y$10$CEFHyuvr7IGLpVdUcWq41Ow4qyReheB.fHc4k3dpd0TBy5rginaT6', '22', 'img/1581702555158149385581350789_472694286961512_4884583004850094080_n.jpg');

SET FOREIGN_KEY_CHECKS = 1;
