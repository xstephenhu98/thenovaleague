# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.26)
# Database: thenovaleague
# Generation Time: 2015-11-20 04:22:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cycle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cycle`;

CREATE TABLE `cycle` (
  `cycle_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`cycle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cycle` WRITE;
/*!40000 ALTER TABLE `cycle` DISABLE KEYS */;

INSERT INTO `cycle` (`cycle_id`, `description`, `start_time`, `end_time`)
VALUES
	(1,'Test','2015-11-11 00:00:00','2015-11-25 00:00:00'),
	(2,'Another test','2015-12-01 00:00:00','2015-12-31 00:00:00');

/*!40000 ALTER TABLE `cycle` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table enrollment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `enrollment`;

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `cycle_id` (`cycle_id`),
  CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`cycle_id`) REFERENCES `cycle` (`cycle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;

INSERT INTO `enrollment` (`id`, `username`, `cycle_id`)
VALUES
	(14,'xhu98',1),
	(23,'calantir',1),
	(24,'anoek',1),
	(25,'anoek',2),
	(26,'matburt',2),
	(27,'matburt',1),
	(28,'Fairgo',1),
	(29,'Fairgo',2),
	(30,'mark5000',1),
	(31,'YannickYao',1),
	(32,'calantir',2);

/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table game
# ------------------------------------------------------------

DROP TABLE IF EXISTS `game`;

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_date` datetime DEFAULT NULL,
  `player1` varchar(255) NOT NULL DEFAULT '',
  `player2` varchar(255) NOT NULL DEFAULT '',
  `winner` varchar(255) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;

INSERT INTO `game` (`game_id`, `game_date`, `player1`, `player2`, `winner`, `url`)
VALUES
	(8,'2015-11-19 23:30:00','calantir','mark5000','mark5000','http://www.google.com/');

/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL DEFAULT '',
  `userpass` varchar(255) NOT NULL DEFAULT '',
  `ogs_userid` int(11) NOT NULL,
  `rating` double NOT NULL,
  `rank` varchar(5) NOT NULL DEFAULT '',
  `about` varchar(600) DEFAULT '',
  PRIMARY KEY (`ogs_userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`username`, `userpass`, `ogs_userid`, `rating`, `rank`, `about`)
VALUES
	('anoek','1234567890',1,923.417,'12k','OGS Developer'),
	('matburt','1234567',4,361.305,'18k','OGS Developer'),
	('calantir','123456',444,1702.308,'4k','I started playing Go in November 2011'),
	('Fairgo','654321',1367,2330.299,'3d','Hola, I\'m currently an AGA 4d. '),
	('saxmaam','123567',62763,820.104,'13k','Hi'),
	('mark5000','12345678',64817,2205.714,'2d','##Love Your Neighbor\r\n\r\n'),
	('xhu98','12345678',69627,2396.837,'3d','I like cats'),
	('YannickYao','12345678987654321',93112,1126,'10k','A member of PEA Go/Weiqi Club');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
