-- --------------------------------------------------------
-- Хост                          :127.0.0.1
-- Server version                :5.5.25 - MySQL Community Server (GPL)
-- Server OS                     :Win32
-- HeidiSQL Версия               :7.0.0.4244
-- Создано                       :2013-04-03 23:07:42
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for social-pooh
CREATE DATABASE IF NOT EXISTS `social-pooh` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `social-pooh`;


-- Dumping structure for table social-pooh.authassignment
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.authassignment: ~0 rows (approximately)
/*!40000 ALTER TABLE `authassignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `authassignment` ENABLE KEYS */;


-- Dumping structure for table social-pooh.authitem
CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.authitem: ~0 rows (approximately)
/*!40000 ALTER TABLE `authitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `authitem` ENABLE KEYS */;


-- Dumping structure for table social-pooh.authitemchild
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.authitemchild: ~0 rows (approximately)
/*!40000 ALTER TABLE `authitemchild` DISABLE KEYS */;
/*!40000 ALTER TABLE `authitemchild` ENABLE KEYS */;


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


-- Dumping structure for table social-pooh.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `title` varchar(35) NOT NULL,
  `content` text,
  `views` int(10) DEFAULT '0',
  `data` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_users` (`user_id`),
  CONSTRAINT `FK_news_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.news: ~3 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `user_id`, `title`, `content`, `views`, `data`) VALUES
	(1, 1, 'тестовая новость', 'Проверка новости\r\nтут <b>жирный</b> текст <img src="http://gcp2.ru/images/icons/3cceb241a4d43a34106634923ec6b483.png" />\r\nтут продолжение', 15, '2013-04-03 20:19'),
	(2, 1, 'вторая тестовая новость', 'текст новости\r\nтекст                  текст\r\n\r\nтекст\r\n\r\n\r\n\r\nтекст', 1, '2013.04.03 20:21:54'),
	(3, 1, 'тут <b>не пашет</b> html', 'а тут <u>пашет</u>\r\nтест тест тест тест<podkat>\r\nтест тест тест тест\r\n\r\nтест тест тест тест', 3, '2013.04.03 20:30:41');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.profile: ~2 rows (approximately)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `first_name`, `second_name`, `third_name`, `fourth_name`, `group_id`, `city`, `profession`, `profile_photo`, `icq`, `skype`, `mobile`, `about`) VALUES
	(1, 'имя', 'фамилия', 'отчество', '', 1, 'город', '', NULL, '', '', '', ''),
	(4, 'test', 'test', 'test', NULL, 1, 'test', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;


-- Dumping structure for table social-pooh.rights
CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.rights: ~0 rows (approximately)
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;


-- Dumping structure for table social-pooh.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `profile_id` int(10) DEFAULT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `state` int(1) NOT NULL DEFAULT '0',
  `access` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_users_profile` (`profile_id`),
  CONSTRAINT `FK_users_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table social-pooh.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `email`, `profile_id`, `identity`, `network`, `state`, `access`) VALUES
	(1, 'test', 'test', 'test@test.ru', 1, NULL, NULL, 0, 1),
	(3, 'test2', 'test2', 'test@test.fs', 4, NULL, NULL, 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
