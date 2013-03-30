-- --------------------------------------------------------
-- Хост                          :127.0.0.1
-- Server version                :5.5.25 - MySQL Community Server (GPL)
-- Server OS                     :Win32
-- HeidiSQL Версия               :7.0.0.4244
-- Создано                       :2013-03-30 14:27:34
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for social-pooh
CREATE DATABASE IF NOT EXISTS `social-pooh` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `social-pooh`;


-- Dumping structure for table social-pooh.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(35) NOT NULL,
  `group_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table social-pooh.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) NOT NULL,
  `first_name` varchar(24) NOT NULL,
  `second_name` varchar(24) NOT NULL,
  `third_name` varchar(24) DEFAULT NULL,
  `fourth_name` varchar(24) DEFAULT NULL,
  `group_id` int(10) NOT NULL,
  `city` varchar(35) NOT NULL,
  `profession` varchar(65) DEFAULT NULL,
  `profile_photo` varchar(35) DEFAULT NULL,
  `icq` varchar(9) DEFAULT NULL,
  `skype` varchar(35) DEFAULT NULL,
  `mobile` varchar(24) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id`),
  KEY `FK_profile_groups` (`group_id`),
  CONSTRAINT `FK_profile_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.profile: ~0 rows (approximately)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;


-- Dumping structure for table social-pooh.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `password` varchar(35) NOT NULL,
  `profile_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_profile` (`profile_id`),
  CONSTRAINT `FK_users_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
