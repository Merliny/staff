-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `start_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `staff` (`id`, `name`, `surname`, `position`, `salary`, `start_date`) VALUES
(1,	'Tonda',	'Blaník',	'ředitel',	120000,	'1989-12-20'),
(2,	'Lenka',	'Baculíkova',	'sekretářka',	18000,	'1995-08-20'),
(3,	'Luboš',	'Žížala',	'copywriter',	25000,	'2000-06-07');

-- 2015-01-15 17:25:09
