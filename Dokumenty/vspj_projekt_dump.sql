-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `vspj_projekt` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `vspj_projekt`;

DROP TABLE IF EXISTS `issue`;
CREATE TABLE `issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `issue` (`id`, `name`, `date`, `status`) VALUES
(1,	'Páteř jako prokletí',	'2019-07-01',	'Dokončeno'),
(2,	'Bolest hlavy',	'2019-08-01',	'Dokončeno'),
(3,	'Orgány plné mikroplastů',	'2019-09-01',	'Dokončeno'),
(4,	'Utajená rizika',	'2019-10-01',	'Dokončeno'),
(5,	'Škodlivé látky v potravinách',	'2019-11-01',	'Dokončeno'),
(7,	'Lidské cesty',	'2020-01-01',	'Dokončeno'),
(8,	'Mocné síly psychiky',	'2020-02-01',	'Dokončeno'),
(9,	'O záhadách mozku',	'2020-03-01',	'Dokončeno'),
(10,	'Nemoc prozradí kůže',	'2020-05-01',	'Dokončeno'),
(15,	'Tichý zloděj kostí',	'2021-01-21',	'Zpracovává se');

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `status` text COLLATE utf8_czech_ci NOT NULL,
  `name` text COLLATE utf8_czech_ci NOT NULL,
  `issue_id` text COLLATE utf8_czech_ci NOT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `file_name` tinytext COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `post` (`id`, `author_id`, `status`, `name`, `issue_id`, `reviewer_id`, `file_name`) VALUES
(1,	1,	'Přidělen recenzentovi',	'Článek o ničem2',	'10',	9,	'pribeh.pdf'),
(127,	1,	'Přidělen recenzentovi',	'toto je post 2',	'5',	10,	'podminky.pdf'),
(128,	4,	'Publikováno',	'Testovací článek 2',	'1',	10,	'pribeh.pdf'),
(129,	4,	'Zamítnuto',	'Jak fungují jaderné elektrárny? Otázky a odpovědi',	'4',	NULL,	'rozpis.pdf'),
(132,	1,	'Nový',	'test',	'1',	10,	'pribeh.pdf'),
(142,	4,	'Nový',	'Článek bláhový',	'8',	NULL,	'podminky.pdf'),
(143,	4,	'Nový',	'O životě opic',	'3',	NULL,	'rozpis.pdf'),
(144,	4,	'Nový',	'Mořská panna ',	'2',	NULL,	'pribeh.pdf'),
(145,	4,	'Přidělen recenzentovi',	'Barevné klávesnice',	'5',	9,	'podminky.pdf'),
(160,	1,	'Přidělen recenzentovi',	'Modré světlo',	'5',	9,	'rozpis.pdf'),
(162,	4,	'Nový',	'Testovací článek 2021',	'15',	NULL,	'RPS 18-2020 Časový plán registrace předmětů a tvorby rozvrhu na LS 2020-2021.pdf'),
(163,	4,	'Nový',	'Proč spíme?',	'1',	NULL,	'rozpis.pdf'),
(164,	4,	'Nový',	'Programování kvadrokoptéry',	'9',	NULL,	'FAQ-DRONES_CS.pdf'),
(165,	1,	'Nový',	'Co je to Osteoporóza? Nevaruje a udeří',	'15',	NULL,	'osteoporoza.pdf'),
(166,	4,	'Nový',	'Kolik je mnoho?',	'2',	NULL,	'rozpis.pdf'),
(167,	4,	'Nový',	'Článek lore ipsum',	'15',	NULL,	'osteoporoza.pdf');

DROP TABLE IF EXISTS `post_meta`;
CREATE TABLE `post_meta` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_content` text COLLATE utf8_czech_ci NOT NULL,
  KEY `post_id` (`post_id`),
  CONSTRAINT `post_meta_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `post_meta` (`id`, `post_id`, `post_content`) VALUES
(1,	1,	''),
(2,	1,	''),
(0,	1,	'');

DROP TABLE IF EXISTS `rewiev_conn`;
CREATE TABLE `rewiev_conn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `rewiev_conn_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `rewiev_conn_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `rewiev_conn` (`id`, `author_id`, `post_id`) VALUES
(1,	1,	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` text COLLATE utf8_czech_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(1,	'pes',	'domaci',	'pes@aaa.cz',	'$2y$10$MJVFMbbi.bLwG91VK3Zv5.q7QjtDd2W6MEQirL60UQi6uc8dZCJIy',	'autor'),
(4,	'Test',	'Testovič',	'autor@test.cz',	'$2y$10$1JFf7piyQYEFcbCzPPKdT.05TCINbaPnYDakmrl6xhlXQhmiDVqrG',	'autor'),
(6,	'Redaktor',	'Testovací',	'redaktor@test.cz',	'$2y$10$CvxzYzXjxj/uXYlHOtNvN.4lP72FxFxeASwMlHat8SynIpKUnwW9a',	'redaktor'),
(7,	'Šéfredaktor',	'Testovací',	'sefredaktor@test.cz',	'$2y$10$XK/pthP1Uv0mB6jjIBU2feCPkBk2CIWZCyToto8mhHowgfWj1qT7S',	'sefredaktor'),
(8,	'Administrátor',	'Testovací',	'administrator@test.cz',	'$2y$10$2QRx/m1RJYLgVRs3ORjrL.KAIUWwl4KTW57xJ/R.HSXMP8r5X1PSe',	'administrator'),
(9,	'Recenzent',	'Testovací',	'recenzent@test.cz',	'$2y$10$ZiqheT6dtBnvGcUUBEFCXeRVVu8cqlMyejVSES7TK/kTmxaQqSf2G',	'recenzent'),
(10,	'Franta',	'Recenzentovač',	'franta@test.cz',	'$2y$10$NErP4xoLm94dhZoXjTweMeD3vGJ0U88SngKzyTglgp.wVGvU.OKwm',	'recenzent');

-- 2021-01-10 18:14:33
