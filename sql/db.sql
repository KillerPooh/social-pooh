-- --------------------------------------------------------
-- Хост                          :127.0.0.1
-- Server version                :5.5.25 - MySQL Community Server (GPL)
-- Server OS                     :Win32
-- HeidiSQL Версия               :7.0.0.4244
-- Создано                       :2013-03-30 18:08:48
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.groups: ~1 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `group_name`, `group_desc`) VALUES
	(1, 'тестовая группа', 'описание группы');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table social-pooh.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.profile: ~2 rows (approximately)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `first_name`, `second_name`, `third_name`, `fourth_name`, `group_id`, `city`, `profession`, `profile_photo`, `icq`, `skype`, `mobile`, `about`) VALUES
	(1, 'имя', 'фамилия', 'отчество', NULL, 1, 'город', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'test', 'test', 'test', NULL, 1, 'test', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;


-- Dumping structure for table social-pooh.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `profile_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_profile` (`profile_id`),
  CONSTRAINT `FK_users_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `email`, `profile_id`) VALUES
	(1, 'test', 'test', 'test@test.ru', 1),
	(3, 'test2', 'test2', 'test@test.fs', 4);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
