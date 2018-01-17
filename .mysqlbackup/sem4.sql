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

INSERT INTO `admin` (`AdminID`, `FirstName`, `LastName`, `Cell`, `Email`, `Username`, `Password`, `Status`, `DateAdded`, `DateModified`) VALUES
(2,	'Usaid',	'Raees',	'03472568223',	'ss4_usaid@hotmail.com',	'admin',	'$2y$10$jfhNz5thEKdRcdN2HuQGOuNIvWV5nJcM57QNll1d/o7JFHyFmQR9G',	1,	'2017-12-20 13:20:17',	NULL);

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
(5,	'Shorts',	1,	'2018-01-08 13:45:04',	'2018-01-08 13:45:04'),
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
(7,	8,	'TEsting',	'Testing',	'7_YY4Cu.jpg',	'8686868',	1,	'2018-01-16 10:07:54',	'2018-01-16 10:07:54');

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

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `Address`, `Cell`, `Status`, `DateAdded`, `DateModified`) VALUES
(3,	'ahmad',	'ahmad@hotmail.com',	'$2y$10$O/t4FFhwuTFjo4gbypM2wuILQ39LmogISMQ6SspoGrliIQImibxzu',	'sdasdasdasdasdasd',	'03472568223',	0,	'2018-01-03 10:52:28',	'2018-01-10 09:31:30'),
(5,	'ali',	'ali@hotmail.com',	'$2y$10$5myIU9C0k7/fYOzzpR2zg.8Sg7aDH6M8Lu/FznR4hkDCR4bAmVNaK',	'Ali ali ali ali',	'123456789',	1,	'2018-01-03 13:39:53',	'2018-01-10 09:31:48'),
(7,	'Usaid Raees',	'ss4_usaid@hotmail.com',	'$2y$10$jBtD9DRG7KOhDKpNspQdbep9u2n6XyibEZKOfVaqhuwYKR7W0gdSW',	'karachi pakistan',	'85692347',	1,	'2018-01-03 13:42:43',	NULL),
(8,	'wali',	'wali@hotmail.com',	'$2y$10$MnAQI8mDEIwszh8/KcNM6uKX0jPEec3lLuAR6ZKrIIhueRjXmWKau',	'karachi',	'236574189',	1,	'2018-01-03 13:45:59',	NULL);

DROP TABLE IF EXISTS `women`;
CREATE TABLE `women` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `women` (`CategoryID`, `CategoryName`, `Status`, `DateAdded`, `DateModified`) VALUES
(4,	'Betls',	1,	'2018-01-10 10:50:06',	'2018-01-10 10:50:06'),
(5,	'Heels',	1,	'2018-01-10 10:50:09',	'2018-01-10 10:50:09'),
(6,	'Shoes',	1,	'2018-01-10 10:50:12',	'2018-01-10 10:50:12'),
(7,	'Shirts',	1,	'2018-01-10 10:50:16',	'2018-01-10 10:50:16'),
(8,	'Jeans',	1,	'2018-01-10 10:50:36',	'2018-01-10 10:50:36'),
(9,	'Skirts',	1,	'2018-01-10 10:50:37',	'2018-01-10 10:50:37'),
(10,	'Dress',	1,	'2018-01-10 10:50:38',	'2018-01-10 10:50:38');

DROP TABLE IF EXISTS `women_products`;
CREATE TABLE `women_products` (
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


-- 2018-01-17 09:48:53
