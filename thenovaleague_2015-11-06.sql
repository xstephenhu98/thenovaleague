# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.26)
# Database: thenovaleague
# Generation Time: 2015-11-06 05:38:44 +0000
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
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  PRIMARY KEY (`cycle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table game
# ------------------------------------------------------------

DROP TABLE IF EXISTS `game`;

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_date` date DEFAULT NULL,
  `black` int(11) NOT NULL,
  `white` int(11) NOT NULL,
  `winner` int(11) DEFAULT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `userpass` varchar(30) NOT NULL DEFAULT '',
  `ogs_userid` int(11) NOT NULL,
  `rating` double NOT NULL,
  `rank` varchar(5) NOT NULL DEFAULT '',
  `about` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ogs_userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
