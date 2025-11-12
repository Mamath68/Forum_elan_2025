-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;


-- Listage de la structure de la base pour forum
DROP DATABASE IF EXISTS forum;
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 */ /*!80016 DEFAULT ENCRYPTION = 'N' */;
USE `forum`;

-- Listage de la structure de table forum. category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category`
(
    `id_category` int          NOT NULL AUTO_INCREMENT,
    `name`        varchar(255) NOT NULL,
    `closed`      tinyint      NOT NULL DEFAULT '0',
    PRIMARY KEY (`id_category`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 16
  DEFAULT CHARSET = utf8mb4;

-- Listage des données de la table forum.category : ~9 rows (environ)
TRUNCATE TABLE `category`;
INSERT INTO `category` (`name`, `closed`)
VALUES ('Fruits', 0),
       ('Véhicule', 0),
       ('Animaux', 0),
       ('planètes', 0),
       ('Etoiles', 0),
       ('Technologie', 0),
       ('Japanimation', 0),
       ('drama', 0),
       ('Mangas', 0);

-- Listage de la structure de table forum. post
DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post`
(
    `id_post`      int                                                   NOT NULL AUTO_INCREMENT,
    `body`         text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
    `topic_id`     int                                                   NOT NULL,
    `user_id`      int                                                   NOT NULL,
    PRIMARY KEY (`id_post`) USING BTREE,
    KEY `id_user` (`user_id`) USING BTREE,
    KEY `id_topic` (`topic_id`) USING BTREE,
    CONSTRAINT `FK_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
    CONSTRAINT `FK_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4;

-- Listage de la structure de table forum. topic
DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic`
(
    `id_topic`     int                                                           NOT NULL AUTO_INCREMENT,
    `title`        varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `creationDate` datetime                                                               DEFAULT CURRENT_TIMESTAMP,
    `closed`       tinyint                                                       NOT NULL DEFAULT '0',
    `user_id`      int                                                           NOT NULL,
    `category_id`  int                                                           NOT NULL,
    PRIMARY KEY (`id_topic`) USING BTREE,
    KEY `id_user` (`user_id`) USING BTREE,
    KEY `id_category` (`category_id`) USING BTREE,
    CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
    CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 8
  DEFAULT CHARSET = utf8mb3;

-- Listage de la structure de table forum. user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `id_user`           int                                NOT NULL AUTO_INCREMENT,
    `pseudo`       varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    `email`        varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    `password`     varchar(255) CHARACTER SET utf8mb4 NOT NULL,
    `role`         json     DEFAULT NULL,
    `registerDate` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_user`),
    UNIQUE KEY `pseudo` (`pseudo`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 18
  DEFAULT CHARSET = utf8mb4;

/*!40103 SET TIME_ZONE = IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE = IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS = IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES = IFNULL(@OLD_SQL_NOTES, 1) */;
