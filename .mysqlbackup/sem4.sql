-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `sem4` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `sem4`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Cell` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `men`;
CREATE TABLE `men` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `men` (`CategoryID`, `CategoryName`, `Status`, `DateAdded`, `DateModified`) VALUES
(4,	'Jeans',	1,	'2018-01-08 13:44:57',	'2018-01-08 13:44:57'),
(5,	'Shorts',	1,	'2018-01-08 13:45:04',	'2018-01-08 13:45:04'),
(6,	'Socks',	1,	'2018-01-10 05:14:03',	'2018-01-10 05:14:03'),
(7,	'Shirts',	1,	'2018-01-10 05:14:06',	'2018-01-10 05:14:06'),
(8,	'Ties',	1,	'2018-01-10 05:14:08',	'2018-01-10 05:14:08'),
(9,	'Shoes',	1,	'2018-01-10 05:14:15',	'2018-01-10 05:14:15'),
(10,	'NeckTie',	1,	'2018-01-10 05:14:21',	'2018-01-10 09:29:36');

DROP TABLE IF EXISTS `men_products`;
CREATE TABLE `men_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) NOT NULL,
  `ProductName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProductDescription` text COLLATE utf8_unicode_ci,
  `ProductImage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductPrice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `men_products` (`ProductID`, `CategoryID`, `ProductName`, `ProductDescription`, `ProductImage`, `ProductPrice`, `Status`, `DateAdded`, `DateModified`) VALUES
(7,	8,	'TEsting',	'Testing',	'7_YY4Cu.jpg',	'8686868',	1,	'2018-01-16 10:07:54',	'2018-01-16 10:07:54'),
(8,	4,	'sadasd',	'Edintgasdasdsad',	'8_uqGiF.jpg',	'1000000000000',	1,	'2018-01-16 10:09:30',	'2018-01-16 10:54:07'),
(9,	4,	'TEsting',	'teteetet',	'9_FBEcz.jpg',	'500',	1,	'2018-01-16 10:13:37',	'2018-01-16 10:13:37'),
(10,	10,	'necktie',	'alkjsdlaskjdlaskjd',	'10_WxmS1.jpg',	'555555555',	1,	'2018-01-16 10:14:39',	'2018-01-16 10:14:39');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `Address` text COLLATE utf8mb4_bin,
  `Cell` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;


DROP TABLE IF EXISTS `women`;
CREATE TABLE `women` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- 2018-01-16 11:00:52
