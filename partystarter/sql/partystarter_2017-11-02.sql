# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.19)
# Database: partystarter
# Generation Time: 2017-11-02 02:42:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table guest
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guest`;

CREATE TABLE `guest` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `payment` tinyint(1) DEFAULT '0',
  `comment` text,
  `rate` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `guest` WRITE;
/*!40000 ALTER TABLE `guest` DISABLE KEYS */;

INSERT INTO `guest` (`id`, `user_id`, `host_id`, `payment`, `comment`, `rate`, `create_at`)
VALUES
	(1,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `guest` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table host
# ------------------------------------------------------------

DROP TABLE IF EXISTS `host`;

CREATE TABLE `host` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `description` text,
  `time` datetime DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `place` text,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `price` int(11) DEFAULT NULL,
  `maximum` int(11) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `avalaible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(255) DEFAULT NULL,
  `password` char(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `profile_photo` text,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `self_description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `email`, `profile_photo`, `create_at`, `self_description`)
VALUES
	(14,'x','11f6ad8ec52a2984abaafd7c3b516503785c2072','xiong@e.com','uploads/x.png','2017-10-29 11:45:50','x'),
	(17,'q','22ea1c649c82946aa6e479e1ffd321e4a318b1b0','q@q.com','uploads/q.png','2017-10-29 12:23:05','q'),
	(18,'w','aff024fe4ab0fece4091de044c58c9ae4233383a','w@w.com','uploads/w.png','2017-11-02 00:01:26','w'),
	(25,'r','4dc7c9ec434ed06502767136789763ec11d2c4b7','r@r.com','uploads/r.png','2017-11-02 10:05:31','r');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
