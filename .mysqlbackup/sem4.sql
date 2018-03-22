-- Adminer 4.5.0 MySQL dump

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

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `CarouselID` int(11) NOT NULL AUTO_INCREMENT,
  `Heading` text COLLATE utf8_unicode_ci,
  `Description` text COLLATE utf8_unicode_ci,
  `Image` text COLLATE utf8_unicode_ci,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  PRIMARY KEY (`CarouselID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `carousel` (`CarouselID`, `Heading`, `Description`, `Image`, `Status`, `DateAdded`, `DateModified`) VALUES
(1,	'This is heading 1',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel lacus posuere, luctus mi eu, vulputate lectus. Quisque condimentum tincidunt lacus ut cursus. ',	'1.jpg',	1,	'2018-01-25 14:21:12',	'2018-01-25 14:21:12'),
(2,	'This is a heading',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel lacus posuere, luctus mi eu, vulputate lectus. Quisque condimentum tincidunt lacus ut cursus. ',	'2.jpg',	1,	'2018-01-25 14:21:27',	'2018-01-25 14:21:27'),
(3,	'This is heading',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel lacus posuere, luctus mi eu, vulputate lectus. Quisque condimentum tincidunt lacus ut cursus. ',	'3.jpg',	1,	'2018-01-25 14:21:38',	'2018-01-25 14:21:38'),
(4,	'This is a heading',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel lacus posuere, luctus mi eu, vulputate lectus. Quisque condimentum tincidunt lacus ut cursus. ',	'4.jpg',	1,	'2018-01-25 14:21:51',	'2018-01-25 14:21:51');

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
(5,	'Shorts',	1,	'2018-01-08 13:45:04',	'2018-01-18 13:10:21'),
(7,	'Shirts',	1,	'2018-01-10 05:14:06',	'2018-01-19 09:27:17'),
(8,	'Ties',	1,	'2018-01-10 05:14:08',	'2018-01-10 05:14:08'),
(9,	'Shoes',	1,	'2018-01-10 05:14:15',	'2018-01-10 05:14:15'),
(10,	'NeckTie',	1,	'2018-01-10 05:14:21',	'2018-01-10 09:29:36'),
(11,	'test',	1,	'2018-02-01 05:41:03',	'2018-02-01 05:41:03'),
(12,	'Belts',	1,	'2018-02-13 04:29:55',	'2018-02-13 04:29:55');

DROP TABLE IF EXISTS `men_products`;
CREATE TABLE `men_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) NOT NULL,
  `ProductName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProductDescription` text COLLATE utf8_unicode_ci,
  `ProductImage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductPrice` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `men_products` (`ProductID`, `CategoryID`, `ProductName`, `ProductDescription`, `ProductImage`, `ProductPrice`, `Status`, `DateAdded`, `DateModified`) VALUES
(57,	8,	'qFBUhXSJdd',	'YAYTay0EAYl99mAENZDBZ8au5i54xCGdaLIsJPxhxUjFUAqLU9LDi0mM5DsfIhTdG3IK0loASwiGTKhcpMG0y1LPdqSMRqTk7KpBr7A5rW0loe5OCN84n0Rv',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(58,	8,	'31dU3T2MHp',	'Ar4tgqwaAMuybmLD7MdI0Ta0VWwRPdGlEfwVlE0uYtPEYLnUiQsSHcwjUyadaBHiU2KAgNwY2vqeXp46I4o8wrE6Yh8IyLpO4FPRNBJ4Ri2LMWvvfRg8ninF',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(59,	8,	'eO2PmHM5kU',	'sQcJBhBTNjOwp9HVyLIEkMs8KKGHFh7nzuICSeY2so8jojegibDNvJQhibyaMnL3jQqShyEjSPsRAaFCL1KLa8TQZ5WDjTFjtCyWJ7xLBrQLFrZKPf54nLWy',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(60,	8,	'Js3VH4EFLE',	'WhE0pfuWguuU1HosD4OhtAxygVNKevGa3wTIuebVJLXAogOvBWHTpTGcGoIvPco34bPPnyV1T6gI3DWMIlbIRAS4gdZSf0AwhvoPYtSqLou1xkSjNJkswGgi',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(61,	8,	'r4mc5VE7xP',	'cuZ6OP7GpVlGTBB3haJ0Q7qoouVy9YHdF526JdczQvSjLuUVse4HnpAlSeYZSvPgEJyeBoidF6znQrQ5IYRVDCpFiJ6nqJ8MuogLAqY788JNi5MpyxdnimLf',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(62,	8,	'iodhGjO9NQ',	'j7gaKNbZoitPajrFMZZ8PanjqPtZqit9kEkvDxrwEqb7nVT6AZu2LvE348RYSDtAGYWmV53vdAmqzQOlatyfV5SKLVdOpWRWX9t3RRo8JxlHZM3GMbkeuZLH',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(63,	8,	'Lcyxj5F6SG',	'nzLWljhY3P3OMERPyqJHm6xsadqnPDZ8JotAn6OHHiPplGjiUsdaMmHEZDyncqNvy8ijq4BFuQK1tjDWtfqEKTqdUrXRSIML6LJZHWpcfzgFjseIA9Uht906',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(64,	8,	'nkfYV5wj9y',	'Vtd96j74gHaQOC1iXuqxbiiIsafxvKHygZREyebxGLhx7t7xnUe2S6eTENfoUBQL7UJ6bktwz4GpHAklk12EetRTvA4FoGHpDWWCMMtKa81juAWaaPe5T8AR',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(65,	8,	'jKKHuKjFM9',	'zNqV8FkW1GtVhL7yP0qb6nNECdtLvahAGw2rTHGq2pVbOGr5FDHQPq3jTYQrOxVvCEl7jPj1HioYoG5OtIS8ubOH1C24psORvWC3vA408xdGmSRU09Y6Dy9T',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(66,	8,	'lBvJYui9PH',	'3XvQ1gFTMqz9uvuqZY9oZiyvgD0aNkJpEvwifY8NzX7KXkzde00ZrtDWcnx2lcK66c0kHlbjvkCQqBDqt7aoc0ElWGMAIGPDmdPRvugX1daqDBn1kb9JGqgt',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(67,	8,	'bRRav1zdTZ',	'60EdXqEX9IEBcFiEAUAKQqetSMjmGqaw83rtwdG4BK1lxVjUNk5rLMM86hq2MoLfto7Eh7DXBR15tmdc67Yf0dAGdQhP5X2oVVH8HwggGWgVtKbytnA0yw1A',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(68,	8,	'nyQb5LMiV6',	'6J70zHZX3NMxYZc54D7kSer2b5EOWNEIHjPRDlm0ooU7EeAQYxtDDrnk7TOEKQ21OERT5V8s4oSxVydwYWM9mXjfkYRDYbVvhM6ldsH968hy8i3VAZsz55eJ',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(69,	8,	'wz8YQOTDkD',	'b6WO4XEacsqwKYERLEyKwal6qsYq3j706xkuvgk2VWMMlHLruxO0V38dzybejlDhKmjqJP24rpksJlwaMl7Ch2FzzNSt9FqfoFCilmUivHtsj99tgGbq9kmS',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(70,	8,	'48RBVAKB1d',	'qH0Lt39FeI29jNrBonmjxes0wrpWicgic8fQNU14ipqWoNxoL9If1q6gN7hSnyA5KxQmD1yYnk08cm6TzwZxsAsKGE2EpWQkLBfk6joxFHI0T1VyocdcnzPb',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(71,	8,	'gPXVuazuSm',	'tao1wFGCUYkBxVOiPOHSa04JY01LBKnYKbuGlHy3vth94SGdVLfjdoD1aF6vcctFFh4946wXBKhCrg8TAAi3QodMB5pcKQieutx1166vtofgZ3zNwaWwxaXL',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(72,	8,	'Dy5bV8ic6e',	'VjTyh7XLhZ8SnIUd7owBbZIFJPnhmB2oRZ0JppPuDkpGGk3sPU2WX6NIzTyzrQpot0hdBZge8KaGAE9lBsBz3tCQo4g7CLE1NCCpMSLFxkdMBK5YV2XxJcwG',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(73,	8,	'O9C44fcZoA',	'oPeW6Pobx8SIB6445Rr5Eoz9CwO77leC6bJNtoWUx3iDocDwbLQ9WopOj1pz4DEJMIUBjkV1CgQ0nJfLimDPsXuXfBJSJ5j16KBziUxCMTNpsAG0uHRDcnsL',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(74,	8,	'6vyS5JNYAx',	'3HhCrnxe17JhnlhmAbJjIGKVjixKA9mFvx4vL9C1asfPkD6I5n0pTNuFUoxSzIc9m4PIBYnf19PYVJxb4R3XgZZ5Kdlz9hOdneICcRIwL4gu4qDaRX0E4K5V',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(75,	8,	'dXnYnvGbKG',	'VjSysZ6DwzFgtXD9MlwDoBg547oHUc0yVOF2fdZhAnt2jx9KWsf8KkwD3yNj4nQ2XbDxkhLOUxhKxlobvakYrI23vKdL1TyzCT47U3NmEHRvSQed7yfU1Anl',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(76,	8,	'4H6JfA5rgp',	'xZAhzI9OJBhrr6LtLMXSC1H4ycvT6ZRgVLDYoVFmuIhT3s14X07fEHW7Hj3J7lOM5KdKdV1uvnKGFA5K46k78AA0c7StM9F8R9K4Uo7mVeJCjPtjDuovj53e',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(77,	8,	'BYPTjk4Q7b',	'MBbgHUKFqPg6VtYBHAhyIc22vC6TcgAyQX25wd5BDE8hqgBoRTENZCNI39hTKVR8vvEBG3cRjQAuuJLi4aM0rGNvwFckF662jbBUM0AnsESKTsmf04EAxlZm',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(78,	8,	'ml0YV2bQNr',	'SoCvEaJCxFKtr2WdUzROGGQH8Np3Kn5YahhRu7Cw53a9EMr3YUNMqgj52m0EgdgddIfMeHMWLc3GVwzW4kxyE0jwWfYTe1kU4vPUsrewDrhwQfBjDLSYUNTc',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(79,	8,	'0487e0Lwlw',	'BCrQ4MxqOi76uWXErWs405axlL8MEVznTmVrYx1191oySnUyQBQY32cBLYxDwhE2xqjXExgfQtUQ2yK1Z4aJ5c7LUtJZFT9RtqJkK0aPQYzOtlzla3yytbED',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(80,	8,	'oi8QtppidR',	'LhYp6R1ALFf5BrYOC2vyWXyjUNvqqa9KmTSzvziQ2QUP3zOSq9zaU7PfKJL8wD7XzDxFSiHwAPdpcdaP34tvb9nxDFcWVGFOG0CYpYf982veTpPb9TJBindj',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(81,	8,	'f1X0HLvit5',	'DYdwywIPCRyd8l0bYigTaDICjTXanz6cNxNYIVWZlsoQrHhKdVf9bXzrcwqGk9oCDjja5ZHmAdOrgl5D1nnrt8fZ3ePNYpRldaMQHQ960mxg57c3etxVwsz8',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(82,	8,	'70eE4P0Cq7',	'6GiipYAF8sIhdRGle7CleNL1X82RTGBrJE6TKHrsHUhsZCpBbfbL6wySYZv6p5DfRT9ZaJKBQOzr9uLy0rtBN0zH8JzI19E4r0irglbhgITXep23bhtKKHbL',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(83,	8,	'fe0WmNBbb6',	'3E8J57WDIlz8c0Ww25YvhJ58Tajko90cIT6575RgtSQSiZRbyUZ5AkiYOzgGsM90Kdng3nCrWRBaTE6iRmUoZGrxht5rffN2JPk2ogIL3g0toBPqlHlWuXxq',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(84,	8,	'nZdYCotM9H',	'Fj1iQDNbl6Omif26qAUVmKQmZWEZdAFn7aRpHOO9EMsCKN0jNUcdXsTDSqZP7De5w0h9uUrAglid2yDiUL1tFwX7MBhVMyirN7hfYNRHYDEQgtFhB2k8btvY',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(85,	8,	'9DWvTrcqpS',	'aYlzbcCfZJKXBFgKfF5cSpuBldnES8u70HcyadcaTybzFizj0rTMVVVwpH48ekcJx547biT0vL2glLbuDf8M3m5aymfWmuaFT7xMQbx8fMUVHqEnbT2IAf5A',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(86,	8,	'Ynzr1ogogN',	'oHHRehM76BN85v2iCfpUqRL88B1fjVJcQqGnWmLB0NHiWoVL8RerFdPNSaWWSD1QXV6Oz4dAvyiEFKHcL39r9z8Ik0rH2HJ5k1wGLjtEGr4PBWlfn9O5f8EN',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(87,	8,	'xy3gzMnpRs',	'RAHCekgbe7SmIB62M80OXulwrHbijrh23NDEwP6q0RfAWQ4hI6GJsHxcZBkWaiE9iXlEXhSP8gQHoTqUl6VNwRGIC5jLIqwI41EE53MTCMSsvKJX3e1DOTEv',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(88,	8,	'jLoI4c694Y',	'vxc5rr4O8yuLEme7kEslTqd7TJWBbDSR2ThnDLiUVgaQgOON98veSGEfRtbWJUF4Cule7JfGJZAwDAe2h5CljP81Z1hgM8YZybeHFhInHok7AZFXm35eF2KB',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(89,	8,	'wsrey6MCDe',	'8Zx1BjWaKUao1q9GnvDrv2iaHvmMFlBXOCxTzQiU2Pt9Dw6kTpIlqit01Bg2LaCtUp937GmiC1WEgXDt3Id1CQKrHaXT86rHNzPU22ERQRDhv6Fwx0bY1f4X',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(90,	8,	'WHq6iy8kSg',	'9uSlc4CE9HCJnp65delQKM4jrlKhwKqiDCGdR3jpNwISQS5323rNMCYwrtgACpIx5Xd6KhHTaUj8Dxk31sSu6cNU5zkDERdFKjXHj53QTn0sSsAAbJydkHBF',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(91,	8,	'oB2E0aWsja',	'JhPRoQjWofJiAwgZLw9CyNrAgM1GVkpKpGrESzk2PyOjVXPsXlWAFyzrBsBBPpTOBHe8PiPSA7kslphodzBe3zMjee71sg1idcKm7Z1kZtLnMDV1aiaTMQaj',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(92,	8,	'QV2tW43ArW',	'U7a51LOEqgh4pooECxZDVRLkI2cPW0cPExrAeLRLmlWwLApJZgc57h5gAPFKBMJHN85JhMiMIeQv1bHVmY71PpDuqdfDJYGwNgtKwOKSXHyuMqJRdES3Ipm3',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(93,	8,	'm72rHx6DUN',	'0yFiljqrMZJfopQbNayeDlOHJt0JDdecs9PgVGMh9bo4LdiezkJN0VFMrq9RokgCZqMPJNITPHbwfbMxi9CgNqYY2cwqZNFtYnh1WNNp4IKhjbDEdxyBpcOh',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(94,	8,	'2GMLmaGdI6',	'H5UydaWPkDnjK6k785qJObSySurJxTpsBxIpLIGJOw3ygSTR5MDSxwncllTZ4SZhvgCcTmUHWTKu6C9cT38g9cmbNdMS8azswcG0HxK1LzK1vgNDkY4olfqp',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(95,	8,	'tgcUBXeRtA',	'MjJiWTec6SfYuQzEioznjjKMyrZZ68GPuibmP2OLySKoKjgKGNNPyE2K8o8v3LA7ym1uuhiTEZ3DObh31nTiW4mp8MqRIqFmlzEig4NOr2Zr0V0h5gPC5HGj',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(96,	8,	'rYRmvJSgYc',	'MzyPE1yiKYiTYMxFmE3MS3wGHMVSG6iI3rTzYwKMmGBLxzKE6fZpLL8pbv9eiaqx6xzt5wtqupqX8Usr3zzC3oviFN1N3kO1m27qJgeMFJZeShApfaZKXy5v',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(97,	8,	'wJFDOnR5LA',	'3FnQ34RncP2ZkmWRy1otbNia1u8P8TPUMWqo8aO84X6dgl9MXKoAcEnKTAQvGv76jax0s2wQmD3uWbvGhihA0C9WylxRKvVYzZjGIYAwzqgiJOJAeGq6NHri',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(98,	8,	'AWhgpJ6soH',	'ZmVWaw3Q1LrztT9AdhBJgPzFXH8xOOhwQuhvAZxQlCZbm6oz5AUwWCz8CcfguOhMNzTpMyOElGaOr8oNBSR83fl5qONoWkImeJDmEMxXSTPIEOTsSLb7s0xZ',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(99,	8,	'FbpdxxXwH9',	'dTENQiy4TY0rETdQOwxZKblPGT9LXowUerDgNkPk1t4KqPb6I0UxtahyYxxPMAFOtpeqZKVqkNY4cQwIehz1iA1KHUqReH9MHZ3wAVkHp8Cf3a3mENCupnV0',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(100,	8,	'Uq3hq5PfX6',	'f6r3SO6oP8QCJyfrbjosvfuY7TFC2OmzaNASa6mxOrBg2V731cYfyxjrbIyTeRdYypPVUCiNdlmfxOkNy3MbbwbeVTuqCJwKEhfmIQaLnrDiFYcwYevG9gIA',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(101,	8,	'BcySWoP9uN',	'8gdoRcGtRWoyNCq0qOG2NhXZPOsMVmxAfqB0tz6XnoXDrDALmiZIqZQA2wnThPXBZHXTApPUTNQ5uP58n9niVbhEJGYEg1HEA2C5zoKMgJp5PEex2Oxh9qsG',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(102,	8,	'PSC4ik7YRf',	'HpcQliF2DuMuaBFhZynGxg6YmJL06VzD0DCMExipjhMxoW1JYTnjCvMwjhYJEcw8jUZR913dKrcui83IwBPMOwoWL32W6cGEj2lDjiqfbfWZm5tDGm1FTjSe',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(103,	8,	'REk91JRfu2',	'BUGtNiPaUaZ2GhPLfoERNya2Wu9UxtEGpLsaykjeSBbwutkYmrwnCxpHAjWwFiO4v2BYU5vwuVhzfV5quGKqZPKPVMKYbQlNY5JijzRkof26RZ2SNC7uONXx',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(104,	8,	'nNJh8d3356',	'TYxXhsYHEfVe8mE1SrgRoX6gbqoqIk7TdXfNExQdqvkITjbS6k51JrOWbCTXpuwiIrikkazYBXA1gZjfq1REZ8jNIWoCRcClmWLfx2LFNphjC31WnxdBHWw1',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(105,	8,	'4tfeVhzZiN',	'kA7ixWLGInX8DznU09uyvHut2DclDBJz2DBqcY5KdJYpAcPrgusxOb5uYRwAgaGIfShWPn7xsx3r13I9HkBCwKSsS5RiD021EClQAqiNDJHgJlgZ6lRhmmBP',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(106,	8,	'TeuoP6P4Qw',	'OX5AIXBzkCPpgAhL53dC5suE7jRLRAUhwRx58RFfejyG5j50xUAToKH5TfA9f9msyrJDSdeWzQLCsuOdabwvShFcOf3yff5pgh3GQJqvNQHqciovu6IMWgH3',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(107,	8,	'ljLsaCfHjj',	'aTOwGN7OHEhkRGzkRHRoek4Jbq02ukzpsomx2sF5BjY0cfyokljRYpLVa4ng0czGbNNAwvQuCobAB4Nqemfh51TocEZEYoZVcQiTF6Siti6VTAUp441I5bHf',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(108,	8,	'YlivPDX3Iy',	'oWMZMWsHwItlUSjFGSugyC7x5Gnagq4tMwEJVrmC0LWfcKgp14uqauHOXxKgMmR2fyz5QhIpWimhRZ9oBy6Wzen3fU0XOiXFIjCcMwmUy79Zk96umqSSW4GN',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:19:51',	'2018-01-18 10:19:51'),
(194,	5,	'FZtEeIbUNX',	'0m965cWRWdmo6SF71IoudHMfD9rUoMw0nQOMfLYmaGqC145mSUVNtJNrPrPBrxQ09afCy6UtlIeeQtxsmOnJlBLcMy8j7kIimqYEkXsiIIR3WXbVnosez6ee',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(195,	5,	'U8UmigXH9M',	'Rr6wCZgOC7AtqceENP1cGROInDgZ1Aq6WrwCVs0EfubXATnvY1q4wKdPHVVzf8pBvemnlrMXGc97t8tmqQKrEyMZBSG3aIl4iFokXX6mQcczqKWbiTXJuYCp',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(196,	5,	'KMHVWpIdfH',	'E2zwpdDPEqi78esOsUyVotkCdpDgBavOY1S2se7iYIRubSRNYDhX2rj7Toc60NHNYp1b2pQo9g6WbWtGh3pWU7e76TdRVGHitL5n0ZKkQHxndHtFCekfZ8wQ',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(197,	5,	'irDqrDToPZ',	'JbrVW7McdzykDyEhrAAztwudw1bd97G9P4wmUoGOwfWtdnV1KibaTN2neDaTm56uQ53Cx0JJRVnLsQLAamZT9urQWeuqws0O699F15BgW9rNBF4R9s4Rs3xS',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(198,	5,	'uQTTX7A7y5',	'0Vs5pHu3ggJ1QCp0aZVFqiaCAfsZ81mCBA8w8AsTEHuX5LZp21k2a8ElbIPtzs8K3opZsaZttwHyn4lLomjhzZVZ3ZgcBLwTFGeFpiSuRwT6lCUzR5j4ti3y',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(199,	5,	'OxQPhv5z6A',	'4oyq5o83SydBkERSkAh0V4imsPRK2ErdjfkyH2lbblo3AfG0UD9fg1Bp7ICcMdASvmec2p8u69o4Lj44jh5jQIpLoQYRVpcVYryGHjkS2YsySRZTI3GZFX02',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(200,	5,	'7lUiLVdW2a',	'VXudYqrxVMOBfc6RAQ5WgavZr3DoxvGR1MqDDMMbfceK382K57CDxeny7KQVS9meMg6hBvoAipF1wI9haMXoCHrxHWD6Q6c6IStTj3tElMNpAu2F3fqXcvfh',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(201,	5,	'oMNpPdLN6b',	'43R1tAcx0BJ1Ono5L9aA6QO6mFaYomOK9rBimfnI60O5KunRpjMDBMuCtTPY5ubDIqJLZs4WF0sKlDRjS2e8L2rXEURubtuYyOPUb68UNN8J8tmObqfuka2o',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(202,	5,	'oqjE0GbfXs',	'rzKa3Yilh5S8YSHSCeNGNGies0zXx4da3iKfY2tCIg6kknpXGsrTmRKycUbZ00UQ0uwR5INF3s3VkQQ6cQAIFXugrKykLP7Xg44BGrY6hxb2uI1bIFlKau5r',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(203,	5,	'28XnKR9nHb',	'5DKv5lfsQKesEVdhPT7Etf4hWbgCjiIKIc6DQgOu1QOFC04E1u6fQYseEozVLwbFjc3V1eSrqlWIRrdnuhmBEJKYNgJVu55fKZe8lQeJ7iUcOaVZHzjtcsFr',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(204,	5,	'pul1OfXsFS',	'mOteJI73ev0o63WVfxpnY3tCWrZUoAd9h2iwxsNbAjbwN3dD3bWK906t78n6nOVZ0oys0PGGGJdLoFdR4odHp9VkEaZASbMIMo1Gks0gK9Z7CmmH5SnwzIiu',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(205,	5,	'mwzyD1S0Xu',	'M95UEB2er7lU7OLarleKgOo4WFyi9Z59qBjoLveSiuvqYj8uKFFg8sQg8EZ7dJQ9HgiSa4U5GXtSncPYgUD0zcdsZyguLLu9iW51BqTcUv4SDuuEnw2qQ27K',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(206,	5,	'6c0abJjVG7',	'hiBafOUgLQRO6y2nhR7e4izpyqU1Wxeu3BpPBTLMzTWEyF722i6IoNuhyvum0t45NKhGFdQwLcVYgMhCBelqpYeidnQSm9mnq72GZgvaITSyXbeEXeqkbWuV',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(207,	5,	'g8f0gV37pU',	'7P5e58MYs874m3XUrkWoeuX0OTeknN6Hl5FJ9GpdnvJ1fG7EaScWZ2cK0ZkBvFPy2QsIV6WIaMI5OSYUPoANjbhsi2Jo2bewN7wh7KEfjlkBI7oTAvBWD6FR',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(208,	5,	'8hKYzVqlLZ',	'DlmDS8gOcVGbpNBh8QEVk5rR3KFP15hHIYe6aluqWxXvg4LtA6OFbKNHelXH6PVNb80FKy2xqo2XPiaoraTzbi0ULhUs3EzfW2zvZtilujc9wUVZVhAQiP0p',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(209,	5,	'AW1198i6cE',	'G73wCcmwF1oIBVkG73r0mPSJNJquMf5NIucvrSCBhrCYBwITekOlNAHRUdRL11NSq316HI8sczr04S5f09OA3WNEh4Fn5EmAszJbFJl6uuFjKy791lOvw42x',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:20:31',	'2018-01-18 10:20:31'),
(361,	9,	'MXSbhS8IFH',	'3NEs9axx4P1yOydicIbEPcu09VPNXWC0SIpkuWZq8souDYqAd1yGVONuiVRDlyqepITIftWv32rAfWRy4ZoIfmdkDjYzgZKF9JtorgZeMEU5Ss9dNUJzxIxH',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(362,	9,	'jIq1kqixQE',	'yhf9B4Br1FRdmGlnBWPR6vtPhvKsKtk5QB2vqXKbJwpISPklTuxuaboWxGrqD31fJxijBkc7p01KUOPLs1oOqnQWi4ygeOWdMslhhfHiSHG7kAl0BdsXjPrP',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(363,	9,	'eqGRkRFsbU',	'Tf2GW43EBwu7a21ddb0whwVyzvAlJPGioKPG0cWF7E2vE3r9PSMuS3c4j45v6KWSQXhmxJ6puqWY3UV7Xxv1SjQkSEE23XRghnah0yDawMPEzVcVn2Uthhfo',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(364,	9,	'cGh9FVmiy2',	'IQJwu4mCni4Rp8EuuLLpyRPVBFVYX5LOQXUtQRUOFN5aMYIxBH1hjdq9kcErQlbtmJA9r4i1NfELnqR3T0yeZp1TTsO4aMXflAJUVSZxb2B91Ozku0ShQ5Ds',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(365,	9,	'VnPri4Bu65',	'EnYPmpZuXsKX89d9MS7025wBcimSCeXkeWm6Sd0rt1zi9t6K7dGEZZBok930jsVxe0NKoLGnHaDWOzWDKcS70vK2AlQKeLWAcY39z7ymJtNCGGTZ1s85b7YD',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(366,	9,	'yAIqClIxde',	'baL1jhjjDRRCHdSlpPLiNjqBk0yJ31n7q0QjIw8ri24mHpIwF71fJnGNElZ9gPxgYo3RbVh4lLSWN6yHjoOmHeso1eOmf0HUGinaV02RIOZ9eUqikWVwPrCJ',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(367,	9,	'DrV36nE2tV',	'dc0XGKvGzyvLGaSPlkxDbd8nIOfz5vwmli3jYSassooqorYdj3iCELaZEMNMb9vcxxv2R0LFEhVHB7Gzrqr5CF7kZNDo0lXk126nIJxsl8OLi8EtcLfFYBhL',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(368,	9,	'A6Ek65U1XZ',	'MXIJ9ZWPaydZt1XdLr37xEGvSNffmfp4dtxjatRaSCTUbRZokSnDSGpHjiCzWUMArM1YBbPvwV3oX5gDrBlMj2VswNawUU5qZWjibaBqt6dyiEWxfujiDBJr',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(369,	9,	'OTjhqeNs5L',	'ZWOYWIrFUc4Bllq6SssVOyAlNwe4Jzthb18eMB5SjbsEMkOmqPM67OHcIeNv1ik9Q4CpeOLFANZvxUdpxaOYe6DZzwYhJ3dvYUaWtgsBBSuRXX6OJTLY4acK',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(370,	9,	'lzhmSyYaVX',	'nWrUDW7ishjunpfFPftmnoFairfCIokYWoATsKsJbj02krk48UEmrFRgUb3AyQtjVxAGiol60rMFd2Grtkf3lNaACagzs5wLFmFug12nbKx9yGvCuF0PxCJq',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(371,	9,	'loFOroXaSw',	'WFEJ5YvCUS3XipcN6FY5QzDkmfzJuCxHXIozImMOVo1cMWLVm54EcRVhG7rZgMxTAfFh3kQ0xNoP64HVTIs9NGN2vgUV0NBegm6yDO5mSbYfUePBHnQeuc4P',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(372,	9,	'fh7X1zp3NX',	'C9AoEgPudmqwY1v08tSsWsJOeu2YP7X5QT3MPwHzI7Xw49JMWXtaX8iAKCJMVziflFQCqxYFj3shgxjojroZ83MEMs3poJI1CPLWNmoVLe928hDDYP0aNHuu',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(373,	9,	'O1IuvVAsba',	'CtgP9CNFyhmLvAOpaclNibQwytse085aN3X1zg87ULZTxI27Tx0xSakXKXeCzrjh2OTJJ9BrxVymqu3s7XJf2GaC78UBb6rA0txSzOEDIBiw5tKBjT8SlB19',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(374,	9,	'yEoEqr0deh',	'E90vxUgAhcsMCjgE2uc45DXl9H7Kmqm9xVlXRMf0VBBd08vaIqGbaEEc55TzGdvE0ExxoCpMZrD35l9ZlkmMmO4zKPpMf5iDM2pnJo5HCVyrE7t6vI32jQtK',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(375,	9,	'0ZtkRngNU2',	'7B2i93R6g5FA34jaHSWKYnSy5NQtMrW5JGMD0RQhOrjfjFTEIwflMnRRR8b21gHEPJllymgjXuM8CQQG1xxvrOuRZCctjPBfut2NvzML1zRxxIsuWciPK7X3',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(376,	9,	'r0bmeMTvv7',	'ckq3VOjSYK5i7tEZ28KDtTJB638HVe1Q3VCTehhM6d3oBczGKKkP4mHiDnEUfLdp1bHuCQi2AiZRHdtnqrBfoKOyp6U2wiVH7uWpkEjql2mKyfY5txmY9e8f',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(377,	9,	'EeRJ821Z43',	'ZowSfW5rlA5cNfp9PfsRAdV1L8GvKoWgRFQAC374bJZln5QKWsiVKpNCBSaji748HIP4LIznV5AgWVoCNw5eqybmi992dcWUQhzUxgkNnIZeBrWGtSNSjWf1',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(378,	9,	'b5mKzrmA5o',	'CTGISnxrJz7qA2O05mo5GBryFqBJgwtnFQU4hlbYL1X0hbbzdzYnvEfJ9WaC9kgTF47EEgb9ZuETjZRE7Uyn7PcpKGXk2LLBX7N157RhhbVaZ3QV8phUzvQX',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(379,	9,	'MdKNH0f1ho',	'qjbyGE92jaiLjjjQzTvb00bm2le5PbIjCjN6zvPlYocPQMOtr7IEWcALIJNzZB7E8kuGa2m5OlCP1jj0sbMM85hTRKFXJdO6rjs7Liw858vXGsWTUUc3IrMy',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(380,	9,	'uohkSZ36dh',	'swz3TZrmr30IQJLd07m7tw9De0EKC9x44OIzazIYWCfKVVSiHNsXjeLY6EZALLw2FqJjmZo9KQYBfpW9aMi5PHFyoYiCL56w8ciaGlrSLtGKfWDhQH9gFbsH',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(381,	9,	'j7QZC7jkwK',	'8OlVo6ThH7YYR5oCHdV2EBkf6IW1b8YXM9L33gp7obHQrlkAEdUG0L1Mdv5kcNh1WJibdb26q4dbywiKgkZGBsmA8C8jimJ4TBL653o1vV7eC9JOVIWYkdGN',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(382,	9,	'W4QVe7YEwG',	'GFMAvUK1gezchparQtrdNC6emaCbt8DGcKwggoOl6qhE8e4J8xPvpGCP23s5HZfMliXakcBMASJeaKbEG2yJ2LWCeRQw0AFUAF88lvFlSNU3tkbk2SlLJo4s',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(383,	9,	'LylflXpjM4',	'CMHnCxIVbIKxCX9dkhffkOjAnLIBOGiDg63bx4Ldn2CL6PYJ6KeP6jVKTWs6mTCXQUvdzaeYBxEqsyQRh5tUKWonypA1UQKanPTlWQiMsTytHtjm9HkDXGzx',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(384,	9,	'5Y2EZsR3By',	'FwyloJ7fuvup15XE0DYgg4doxuRiqJE5z8kwCmfpYI5aUhbkFPLvUT9G7ssVaxhr69wUqzmSRQilzmT36QWcUh1hEjKxFFZMbaBxzQ6Z0SVnpbOCyErgqwPg',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(385,	9,	'd9ZQYfAh6Q',	'fLXo6QviK2ZF1mfoU059SwNMYuR6wEfWXiQ8TPBXdqxfI5IilrrVf3qxOqZpVFra4x1TK4bZQLcQ6RaIGLuV1MLZCAL84TOpaqaHW9uxL9v0SVvgZz5AgEuE',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(386,	9,	'NUGgF4wcwg',	'QJh8OIAeNM5AKwKgyGlD6ncnVPf4dB7jrFbP0t3vvyFRpM3ckK0X2jGPSLLvJ7MumqFCmPQt09ywHeNjBQOo0bxszf2EpMhCg4dV7AHt2uSkJTtwwCoxAUm6',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(387,	9,	'AopJpOSeik',	'Slo09JB6UzId23Y10j18jAI41zHKzJwatM8wokNRASGnInJJex40iBBiMtHhS3WyLXaoYw89kdKMKx7jQnoozJwRXSk4yza1v5iWmOaVmPkrAiKclmXPotIk',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(388,	9,	'AmvopYHpbm',	'q08ghboZAdp9dKQ4gPiuIB77Xk3pj4uYRitQQ4kZ3tFIe3j4h33OOJqEA8arUtMLIZ6I1Tvn7UCNeTCnOMKzqlogUKOBI8nGfV11Zamvxilz7mi3HFd7dm6O',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(389,	9,	'9W4JqIeGc6',	'ZaPjqtPq0h2X969j2vmhE6EP5ED8xM8l6Q71KFoVaSpGRLkf7zNfJtxBJKJrZzH1XViHCdb225DqDysrOc7WC6QnpGlzC6rE22AodNC8R4WF11I0RW6LTURs',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(390,	9,	'S0L4kMDqzt',	'PmuzMfvVrFe8pc7PMoEjNmkAcoOVgZWT82mUysKwpRBXxuXIeQdvg932Fla9mKIbi6cvGt73Rmtk0GfuZLHbfpDXSI39JuMBs1z66MODSEfQRmLtQxZegVpW',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(391,	9,	'MluzhEZy0F',	'xqsL7XJYtSogwb4yZtuAc7Wh3OZCJcWXmeo16KRuOHslpkgqeFEJ0eDWdgeH7MkxsNQvywNtlniKPo1bcKcOMW4RUh8XYQbMDKFw25DvPQqjPrjrIroXX5GM',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(392,	9,	'NHlDOs74Gq',	'VjzsEmmgZlkaMeneVm9799TP7foCvfXzslEnKNebhPEJFFUZhWrFzYMbyHBAZAzsIAa3CnOv5BE4rFufFvSAHnYz0yDcfov696UzxonQZdeFEz4m1eX3wLdZ',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(393,	9,	'PGtsWbROFa',	'lFtjrQpglqCiMWobuX9XYJ6elPsasEiNziWczhYBgQ7w8GjE2PJnqemUn2dw1mJV2xM4f1s92d5bo5tiyWmUkan1cJ0S8KyKa6isKtIM8jp4Xingq98PJTjO',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(394,	9,	'pt2Z4kicjb',	'ewGh2a06nj2Xm5F97jYwjnKgwtTUtsrhdpvC1up0v5RDQrxPsaV8dn7ruHhTM9NyM8cF9UyGrltAviOy7IDwCvRpmoKrnUYWGOUnLa2GMMYIaWT3xBkfqadk',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(395,	9,	'7AlfTJfgCy',	'39wijz5dC1ZtPhROg5Vycln5zih2kaQ07TpTFRJGsGiuTLJJwHPgwLGYbrTMFwYqJEw0P4e5mBDXYdJjtvE7nvm6Xl6AcCZ6eLzreYut0lfC1hcmH1CG96Tx',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(396,	9,	'HSRm2t4q1a',	'MtOlwsZcqFh4DXTNIPyeAomjqc6JLuBwU6WolDadrfRNXXBdFHU6UG20wkzOYaExbfEX4Scsm1iPMae1R5JrN8nhDsxPuiHGEWzWTAFs3hAICSIyN59pm427',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(397,	9,	'u5NJtbUFlb',	'hhg2ekLXyADnsbWa9HnzIMHnbc4pcHhipzjVSip67ISGJYcsAbyjae4elPlcEA8OY8Tet2ravpj8zcNp1DrwZDv5oBhs8HOtyr5THKBY4xCft7doIcVqvXkY',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(398,	9,	'tWluJyLDCU',	'vmNwU4zM8npAq0FtM1Lwf9fVHrnIFHGHyPvS00WDMxpAyBy7jUQuHF5f7DQrXXtw0VJyd8YOAKeExyUru6676xWDkAfqz2fXBdqj2ZISHjLS7mnoUn81tkh0',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(399,	9,	'pwp6alRjGP',	'PD9M6I6qlsFfTOBsCTD4RoMVXgL9kO5lUM9rnliLy3JM5J4uQ8NE8SXJSFtv0GvT9R1ikZuE1jDfY7vJnUuV9YO7Zca4uvHw1ddyIO46qWkWyG3XwZhoxiBu',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(400,	9,	'7Yg2eHdbSb',	'eJ9Bb4XDeiD38xm97olbciXiy0FtNaEICcGraTobp8e6iTd25HnDyJcLdYliPYiLmWrgVe5L0CBvXY7mBtLNX2HofJl19WWcmXs2pLTcqil9k3iAa3v0mgdF',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(401,	9,	'vPhjsAVmAY',	'E8zTd8OqdoPNnxDwHLVlDwOB4ZtgXupCvqBuNzOlInNJRPBFQGn4l8C56wwHlMoehLQ9CNfHRiZQrMbayJJpwvTJ08z1up2dHXyqUFgYanCBFoz67D0NvM2O',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(402,	9,	'dPJz2Yx5QP',	'4b31LzIReXxvfAoktaJESad7dZFxhYIYy3Slr1Tr9tR9o9YBHZ6iMCt14GBqkqcxdRYfRZV2Rjrzo71oiDHu7gh0Z7UCLrlefgeAhWn9gCceEivu9NHEBLEe',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(403,	9,	'x08iUotzdC',	'krGvXxqfy0ziHHd5YnzxyulLqac9uITw4ZJUanG5UT8tOoGIta29gvl2KwBOKNMUVKAOMthfyT7tQAT7Dzbyd8RzB2jRxVA41djyqyxzg4b94uc0ID80iCZd',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(404,	9,	'SL6t4sZ3ze',	'DdURF3x3QMIGmwrghzl6apzeFVFNw8qDjp2hjNs0p6sEEEBNMGchrZmbNk0FAe4F7KGEo8SMoWyy6Ae5fctgq9wXdeyMe8eypYXep3FZYNIoa7k1beBPKOr1',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(405,	9,	'ol5vxmJ5Dr',	'On3plWyNaDNICK51hoTTEjzMOxi8k3DwRv6fEue7ScH1mGYUXmQ0ccMrMSV5bEhPT41FtWbxSyyctWzsHF4Ff6MzcoiCH3QYDgQxcSDjdNaY8JqcSxcSeX1T',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(406,	9,	'4GI1ATjwYj',	'eKYuu1bo7tnS8njRfkV7GezGQXyvqtN10qS1QKXdUVZjAZPDEmkIltTVjF9cTchtRIeUis8YgKOZmQl5xPcb96oXmg1g00qtjo9XMlTUc2KKapqNCtPA9WTq',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(407,	9,	'0M0tBR4kf9',	'elVWT99RXZ6bTu9NzyyMUA6e8sezgBaPcjyHUXTFjHpXtLdgtutKYtSUMyBi4BAjmMOgE6K8lUrd6P2BlcJPz2nCJSOsNuJitoO8BPW6fowvVrxtm5tXk5fW',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(408,	9,	'AK6gTD8tZV',	'12F4N51QDX6mAPelbZUhUtHjSFxPZ12Q2nFG0sEV1qntxH2q5mFcblvGxSpwhUQdsvoQfH55aEqEdvNbfIZ1vT5QEhR5P80QZofIhZ2KdJx6J4YvzotOCETB',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(409,	9,	'W0tvApGT9W',	'Yk1ts3ZRQ5QxX2JTWP2rLkLGBqGCYxryskUh3vNv1iectdPU6B8bHFAAVNleLzfrX5D0qcDACQ0nL0sKLzk0nNVqCN2UuEQwyn0xqWdlNKnPmvZfjdmwyakX',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(410,	9,	'oQ8kps9jOy',	'725ZyZBrhH4p1F7OCblBLN6zaeoavv3ZmKWyY6TkBT5181Z14hThZrM4NEoUPtCpE5pmB35XoViHqnvtzfYDWGczffcZdk0RnszKM04I8OY5LCBa1szlmizC',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(411,	9,	'7oYWl0UMny',	'ATSjKp4NOxavIXk2vKh8kPyfFy7vjiP3c8myNCYLFHsEorSeHKpz9yXmtzrXqbMIGlgyptmYCqc3Wd4PbydoqsaLiacN7YpQhTZO2O6Jp7DkRxyodNApmHYt',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:32',	'2018-01-18 10:21:32'),
(462,	10,	'N1b47ovN1G',	'mMwNPla8j864OSvIEG5cKTNG2qxHqI5AkXmxSY82YXUlssQ5yl74Jj3tLeMl2aqacxiUcTE54VDMMvdGrqIIGlja46mNlWpi3LuWhRiHnJcsFkna1IEAegKr',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(463,	10,	'a04DTQKtFI',	'nQRrM1RqMw4DmQU45zgf69BRdIwP1CKBdmND3fHiixh0mb4MzGBbjC4gI0KKi5Vu1GmrmvWeb6WlctE18scLOh59UprBvIibCvrMHBi6444BZlp3KtHb2GlR',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(464,	10,	'R20WjA0Tem',	'YDPkEGAYt4z1zi0eRW36XELYMaahLxbAEye9iP0OFJHlZn7ftQKsEJukWSn2G86qldZW5anWy1fwKU8jZf01fLh2YGn4phzX5OLLLyTjKjDaKFmHTfwKcaFK',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(465,	10,	'Dgt5MZJ1hl',	'jA7HQX0rnwgprN7ZbMC0oK1LsCDavADEIknUn9yf7cp7hE8ktrRLw05BKIwxi0HXPqBKzIAYDLp09lmeJ3cEeKbkzAnQHtzHdvGjemoiGNN2puzht1fFIkel',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(466,	10,	'jATDfseCW0',	'5Qq5V3WCkNR0J6PdRd27XUtWfxxN1FaGAZDJynyTzjmJVpqtm6Q7l7wJ17rM0YETo6Gs3uTlduAERR3MoH37f7qBPxbKcl53kNwE0lgeuhY0K23PhRu6zbEA',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(467,	10,	'Zslhj4Pezt',	'0uHlsF0ngFj2aZr2918zaTfSxINZMmJ410InSfI3fvugBfUkWK7gVe2KZeBUEi9dqf1cPhSVNZTG3qQ1hR7F91XHu8Hadf2BVqKNoWWCWg7uofS9qJPP9ieT',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(468,	10,	'kQxQtbULMc',	's6KzA7pySowPaEFCrqUQWvwPUcaB9BVAqw1bLKJjURr98kqb3w9oqkseDXibOErGRYUPqTiNTDEmQyjvX3eKE3NqDurtDvVNh0WGEHIl4tFRyxmnczZ18MKp',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(469,	10,	'AwwNdAVj6B',	'A3UwhEhFYlZBLQoVk57PkWyznyKn4g1xZeoP0qzV1vcUSueXD6kQlW6jDq0EUy1VSBDNUftQtCdTwvniwfz3j9HNkFyJy9V7yr2Yu0oZO9JDxiaJHxf7dUOU',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(470,	10,	'byBtY808jt',	'g2DDmX3tUEzDIHk1x5grFF42L1ZSky9qaVUx3QKH8P5l7qC3thxp882ku8FOkW0nKvkRlS6WyP6UvfLpVxfA9SSouHdPaRcqifeKWCllxzBAQ5V6mLVnQVne',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(471,	10,	'BskPNPcmhf',	'ZQh1Ye66wa6DjpZGi2Q26S1bePzy206eHLwiPOLbEZ8bvzRaM5JBknM2CNSa1ajPCrqjjjutEJqe3IDZ3AHx4Qabomlqa8Ku5Wigd4mG6U5wsKSalcEaJhXc',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(472,	10,	'By2VJId5MQ',	'klPJxU6SEfFcvjyccmIKiueo4kVFLghnUCKxjFGXi2uR36lm85HKPJFSaeA9ZYZ9kHl0eJUOX714ouyF6LF01FBsWTN7hzI9MwsvsOKn6Uaf3DcjJ6sr7Uqz',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(473,	10,	'zmr7ebazoK',	'82XMIu17D0aTXhFFdVxcU0uXM9Z6HS3taZkTvEO3wqO0wKeBxoxTRnFOX6CZfVklYt0bNBfWVUAntUae57Kw8M7VSDjRGHJ4Qayfv3pWnARdogSvBRPx7Afd',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(474,	10,	'VqV9ATeWtD',	'LQRt2bif0M8uEnjAJIv6ASMf7TOvXkT2Un8Cb7b9ChRrFGmHnfe8PZRkYpouDJlRNhdqPMmKAPzAF6yExOBOal1jkr4xSl2y0AD7izJyEI5FZicFEqndr3Cy',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(475,	10,	'YADsPaAfiO',	'JhTAro0gfEs4EJ5WPMJtSx9eAP7J0oetlr2ihuGyCOzjeMZ9OtygnvOchXTa8OqvuQswSVm0mCHtbpeVrUQYi5Rn2gtVrkb7xLSGM9dG39QNGjKAlIJhPEhi',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(476,	10,	'3Wn57GX6Bb',	'pT2sWqHphoO8EwuXGqgo27E9mFjif7FFOslqjgQX5l64XemU4iPPk0dNYzoZ36ozxj5CzINcYPO5hqbsVH7bPtUD6i1wPtewPkV4cL9CZViJu8brMQpeHPd1',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(477,	10,	'6eJ10fyjDP',	'XZOFZYM9Og1tmbD94jAgEZlJF2V6pQcjhzxz0bke3UHiDgWYEBubSxzqWsDaZ7ry8gGmHQRVcxx3DQgL3DRO2yokw3W4wcu1RhF9jW3Ls9GcQgrK3irjcXB3',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(478,	10,	'lR7qUp6jA4',	'rFsjRuFpWe3m7eFueJrAtlLEN8cxELecjrSEDHEsMJEpLjaaTHMAFkOqxihx5APTHPOD1riECzSrlDILGh3EPSZIUkwuBo1k39RAmnA2oMH4d5eQH5IZd1UG',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(479,	10,	'y0gl5bM1cP',	'BGuPSukXWMgWvzWGzVdWmULlL9WfKx5PttNFsuDsSZZ6Wb2XroXDuu3f6VEweStiQLf2GFgX03o3ppfuybXE8RrXbSYRp8i3RDhiwHOyoBeIcOGl5HO3Plq5',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(480,	10,	'Z1WDVM4CAt',	'mQNXKk9koCZfMrTFopC704qgBqKH6cNrV89avcHFAtHCONEJhhWj1oTomIcRwoOLeJzWhciNgHBwEoWv48KpKfUdVQco6GSqwQDj8keNuSNM20bIF4QVpw2p',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(481,	10,	'3U4qTzD2f4',	'xCtJR4w4wjoJonh4SkLZ3XvReoR9PS7q4XW42U4sn9HL4fvY2Lgy9mwdD5Pr97kxyPJ44FJrYVCD1yYPqJDKrWFGHkAMDCnjIIkBdwFQAOdlkyQgzTJyeIBu',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(482,	10,	'EFSQ0qw6dN',	'FICAaMof0iqMwqWsL4UcxbvADbDiHgY1eRcIGTiDX7VUewK7uGElK7zzcpRVOfIxaSr3kzd8bVLKuhkYsJ1kYGEnjx3oTgzM8dontKjyGNSSZdFK4vDuxMV3',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(483,	10,	'jfMDRRjz5L',	'xRfh7snpnCtcTezyQMbXoztPWGkBdVi5WrEcQumZPuZsCNPg3dYfxsldbKsudjygZEE5eZCVE9mD72t5zr4cNSvYvwp0OfV48iHMHRwzCgE4GEAUW6Bgs1oA',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(484,	10,	'q9MF8BPmgI',	'p0MOZ0RBhNO80aegDZH3ZWoi54ArPdGSZ1DXiLR5V89gcaUo9n4pnL9nulX1XRm0jNI2mn82prlImsIVzcchCETvpWtlX78ArRttWvr8lrHeSh5gWeQMV5yg',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(485,	10,	'jQ0fpjss81',	'XhxaXZNf9bmIJwXCVFlRlZe7MDkGvz2Z1WAHzjpvhNfEjv9dsCoSBOHqyowF76y9tFUV5g2dfW6eqqmoHz66TNcBvL2i1R9fjC21q22ed7Aj8BYQlTaTBbsY',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(486,	10,	'K6BdtPIdgU',	'YByAjvjsLFawQoduy0s2zhugxU3FNXFII8Dn2TpcHKJLG3Bawtbd5i1yVeb8uEVPJugFcBqzZ2l7kLHyqVmPYkKnYE5iINCZ8Dp0FbFmJlK7hIzwyXkfPthf',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(487,	10,	'twkRIKTZAG',	'EIqlHnbJZoMOHNxFAQDIhxIlq4pT4BrVoY77oe7kSjLRJvXMl9wn5xYkEjAQPDPpdtRrwuERSGSWAMdo0W9XZHJL8tJU1w5UpuKlWd7xVooGD1q2Z256zDvH',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(488,	10,	'kAhiwB78FC',	'sMR0USSoI46vMFFlCyIFmtWs15DjUsz3roSDrccqnp9hSxtCNF6F3L90ya44Pu4hufptIf4ud37PY7iK5EFAeciZzCxZbI8zGrVnthYDfLWoAYmDoVM2pPOW',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(489,	10,	'u04RfRxOrC',	'ItYiauk96wPB0dpMdtHeOfcOJVQM4KFiJwJdfFH82ivEzDTspQ40GbfZUU4nuG6maL3wb974intljyUhZekiFnTVld8pRFyWaC1779FmaNdzAvZwCZieL6gf',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(490,	10,	'6HZKUrWike',	'ZrxAHIGqiJkzd7B6tqvWToYDPwngH2aJ80ACD75pUBiloNlWHWrc0AKQIUvSxRpGjULf8Oqj3pUPLzWtWO7uJPARk0EG64xqAZd3Q1GIlnL7AFDh1BRO5L5S',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(491,	10,	'EvQP2yW3F5',	'TYIHU6wg6br4qHa0Tqv5dCJjM4bI03UzEkQenh3k0Uzw71rGgMz4HWoUOuFe4Zbvo8xzCcNi79TQuLAcKJ7fgjwuLKFgRPBepbsNnhHxwPzi4Zl5y5vrWocu',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(492,	10,	'Hu0FT81lEZ',	'bfk4n2g94AInQNmh8vVoZvKQeDbYkxlBNMEgCCDlncrALtY5lOtRw9erk48tYGRRz8NuOm7vwTrhffc0SvtCAm1fxIZBMbRQhsrnVKGtvJldVMVMxvrgVYid',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(493,	10,	'xkE5jOwr6M',	'utQkJNl18i099HmPNwScJduroQ5c92vYW17JPdPkD6XxNJbh9EpSVl3JnXNhpnwIvlIlrG85wNxUgRwxyshnUX4gpKgxO7sRmc6ly3xpvExn3r6WHBA3ma96',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(494,	10,	'PqEcgr9Hoy',	'tptz3ZT62snNfJluGOUpzCRJkAJiFKdktK0OKaLCNvVbGWXm78lQsFbtuveATMF7UIB440LMPrZNklVQ1JvKt4vX6iZ0NyCDToNb3kOHcE3fEiNwyT0tE08h',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(495,	10,	'E6Vuym9aXZ',	'XE7F37dlwVjQsHYbjfuiivOSbhlYYvqiveCP4Mm2XdslA3igkM20tSSNZa6c4kgQAxbJ3xJBbHih0PLPtOoQWTKi93had8Dpa5vy7jlsiuSielRfxMApew9c',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(496,	10,	'joiftDHglG',	'FKd5Pehj00diKAoNXD9ZL5Nfs3uQO9iuTZSNVtTfZVvEfoTDfJQ6JL9ILh987hKzh5MyoNHXjPYrJnnJfONfIbIBKY4gM6nKFkc2pBw1n8pRjM0fBgZCtekp',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(497,	10,	'D6ibTTb2gq',	'0IZ4aSruGp79kY5Dw8Rkze9BCKAkfRMmhRiyQxeVrLFnmGgjBgBOU2Z0CeuAkrhGRniLsIrUBv5M7BiIXluTHzhQoW5nFZv1GIdOR0Mq3nTa2aGxOmYTVDO7',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(498,	10,	'BiW1EgUvvS',	'J6WbhayKGfJa366rcbRNAhsRL7rB3G508UDUT6RwKyZ0lXoY4muNTNEyekW6QP8RsHeFg4eC4QcnY346RB7kxu8f3gtxAUkOMMv88lhON6OWtNBNMm737EWr',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(499,	10,	'ZbYfHbAIJ7',	'YOPXcphaY5rpQ1CBM8UTyKvrPPEOHboPypTNDo043Ev5gfruDjanjfl4RRl5M7B8jciarATm4n7QGDAHGdbe8modzG6c1YXjZISXG5ZfyPiWaicGErJfAZLG',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(500,	10,	'D5SqWebMWS',	'RkdMhjCBgFs8ujnr5j7xpl70RHFjQHA5DFInMPbWLQhUxFE0jDSAFow02OUnDx7j1dC4TBxRAHrtOWHd82fY7fjUQ9qoRVf1YjyMMSFpyXHLYYMAK2ps0xyt',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(501,	10,	'NdcL6g670o',	'6c33XZ2dlZyjAlW15jLT0xJ3gX44hhJYTjUMMTQfNzSI4nrCuc56lYZgkJSKKNfE5BM58UvZ7w0LwWeN7675zAONYydJ8F3nPo0BQHHhhiKDHRXAakOqcWuy',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(502,	10,	'a2rI1Q66NK',	'JwtU9QOhPFlFbR9RfvtA5NHMR76pbVKgokFg0j3BcYPq9qxGBTv1xZ1aQYgZVlgrtBGLfsy5bZblKbIbMCzmELFiLzI9wdU8qPMQt6oK6OmSBrHthtxCa5Eq',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(503,	10,	'P9P5I8D0TX',	'KBnjumwNgNTx2MwCPIR24SiTvQ8Ye2OGFAX2W5gWqE2adTVbPrpxHVVM6sxUW5dK647aVazMrAlx8VBgwW3mEosgJyZr7sDTPjUg1w8MeWr6kcNUlJyzwy6c',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(504,	10,	'zc7YpfPTIp',	'x5YKAoLXUrqqSEUJgc82NX19RveWrtXGsqY2SrI8MQTsjYEN5gyMYoHfixmm7qG50AZoEqq3FTKzKYb7V1zqHnDFCIX1g1A96SKWgh6hTGhsFXOpFtf8Qezv',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(505,	10,	'TtVD0b7NPl',	'zvrOeXzXLr25bkZmIeb0ccbXYpITKO8jDsQeHzc87NVkjvciFoaRcAY1uc92fxNBj5DRU3DiOkaEMvByScaKOWvgqPILtfLtkTsTcyT5Ufa69gED6Yer7yK9',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(506,	10,	'6cDcCScX5g',	'P7Oillooj4FS3rYGO5SmKI1EklvfilvHS3zHUG22nvDG7EYGKOKGqduIV2gtUfqx6TDGTzlVbupW3Hracgy9mwtEYbK8plimZmjwFbJf369PnvVBPLeykadb',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(507,	10,	'PZhZumZOEO',	'IJxPQ1LI5D8F9w9ba3WJjtN60rwaJo4hEmioBTBSR0EdL5kznwAxPhOumiHcffRV4kR0Vz5nXFy17Nt3XR7TTNuapMq638WAxp8oBwIgc9ktmojMEAkbyYlU',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(508,	10,	'tKX3uKhepb',	'TP1xbGG0YW5CXLYHuAPs0VIYS9hkqfpbh9oVAYuuVUROEzTaDDWaZQyJgS5jIx0NPi0UnczmoGY91qeYl8hWIcA0gsxgkJaHKEUzupVnPpD2yC1IU61isuBo',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(509,	10,	'4FAnkQHgEH',	'pbqfNtlXUx2meoJjUMWca7SHTkUfedlqSCfXGaTY15YRwuRZjAwHkMKst8zAgwDZsmpWShTHRlnlVp1mtPGdHsxyLkSZ6i6cuTVOJG6HVEVOh4K1bPFy7g4p',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(510,	10,	'GDj6hgfE39',	'vb1DQqDMDZxyYNUlBZbjncYfWIXMtrZD4ym23VGrcaEsW9ZDRBVwTAJUfzp0gcDC0GpZ08kjgBwnRXXFBvvqwvaA57ziJKHLkqMeUgtvQRdIGpeEm3qXWW6x',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(511,	10,	'zCWdHhEvct',	'XfAvnkbwStoDWV21IUj3GScf15JzU2RE7AcOoFvEvfJQiyHQsdIr0opQdEFxNtf8eki98HilEsw5lmZ7kHs9bcDlI9RieMG3Fuod1txJt4AzbldUoZk0GZcR',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(512,	10,	'kTTIpvDymh',	'zpNwo8DxqGlVqzu4a0q1WRlBgRuEexq8YVvS5vrfdZNBDFea24lyCaB19IlHDZxILM1or3Vo1YpmyluWReFtkb9015PdAlXGDETeS2TVD75R4itUPXiqwJ7d',	'placeholder.jpg',	5000,	1,	'2018-01-18 10:21:43',	'2018-01-18 10:21:43'),
(513,	11,	'yggvghgv',	'YGYVYGV',	'513_ffeWZ.png',	85852852,	1,	'2018-02-01 05:41:54',	'2018-02-01 05:41:54'),
(514,	12,	'Belt 1',	'test description',	'514_mVu1i.jpg',	5000,	1,	'2018-02-13 04:30:39',	'2018-02-13 04:30:39'),
(515,	7,	'Grey Checks Shirt - E024LD',	'This is a grey checked shirt made of the highest quality.',	'515_mmyR0.png',	25000,	1,	'2018-02-13 10:39:26',	'2018-02-13 10:39:26'),
(516,	7,	'Purple Shirt - FG525H7',	'This is a purple shirt made from purple ink, imported from Africa.',	'516_vrUFd.jpg',	3000,	1,	'2018-02-13 10:46:12',	'2018-02-13 10:46:12'),
(517,	7,	'Navy Blue Shirt - ZAD256L',	'A Navy blue shirt designed for Navy personale, it is the peak of navy craftmasnship.',	'517_YnKHE.jpg',	9000,	1,	'2018-02-13 10:49:06',	'2018-02-13 10:49:06'),
(518,	7,	'Checked black shirt - 52HJ569',	'This quality product is a real-life manifestation of the highest quality of cotton.',	'518_xdfMj.jpg',	32000,	1,	'2018-02-13 11:00:48',	'2018-02-13 11:00:48'),
(519,	7,	'Jeans Shirt - FRT586C1',	'A normal jeans shirt',	'519_MMBYj.jpg',	200,	1,	'2018-02-13 11:02:09',	'2018-02-13 11:02:09');

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `OrderID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` int(10) unsigned NOT NULL,
  `ProductsArray` text COLLATE utf8_unicode_ci NOT NULL,
  `Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(3) unsigned NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `order` (`OrderID`, `UserID`, `ProductsArray`, `Address`, `Status`, `DateAdded`, `DateModified`) VALUES
(4,	5,	'a:2:{i:0;a:3:{s:2:\"id\";i:4;s:3:\"qty\";s:1:\"7\";s:5:\"_type\";s:5:\"women\";}i:1;a:3:{s:2:\"id\";i:5;s:3:\"qty\";s:1:\"4\";s:5:\"_type\";s:5:\"women\";}}',	'Ali ali ali ali',	5,	'2018-01-22 12:24:04',	'2018-01-24 07:41:17'),
(5,	5,	'a:1:{i:0;a:3:{s:2:\"id\";i:308;s:3:\"qty\";s:1:\"1\";s:5:\"_type\";s:3:\"men\";}}',	'something Else',	5,	'2018-01-23 08:34:11',	'2018-01-24 07:41:31'),
(6,	5,	'a:1:{i:0;a:3:{s:2:\"id\";i:3;s:3:\"qty\";s:1:\"6\";s:5:\"_type\";s:5:\"women\";}}',	'dsifiuhsdfudshfuydhfusdhf',	4,	'2018-02-01 05:38:28',	'2018-02-01 05:40:21'),
(7,	9,	'a:2:{i:0;a:3:{s:2:\"id\";i:202;s:3:\"qty\";s:1:\"2\";s:5:\"_type\";s:3:\"men\";}i:1;a:3:{s:2:\"id\";i:83;s:3:\"qty\";s:1:\"1\";s:5:\"_type\";s:3:\"men\";}}',	'tariq road',	5,	'2018-02-13 04:26:42',	'2018-02-13 04:29:25');

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
(5,	'ali',	'ali@hotmail.com',	'$2y$10$JqZr.weLIdnPuf/7ZmoZbusltFv2FXV1..LQp7fcdijIQbh0l202.',	'Ali ali ali ali',	'1111',	1,	'2018-01-03 13:39:53',	'2018-01-24 10:28:00'),
(7,	'Usaid Raees',	'ss4_usaid@hotmail.com',	'$2y$10$jBtD9DRG7KOhDKpNspQdbep9u2n6XyibEZKOfVaqhuwYKR7W0gdSW',	'karachi pakistan',	'85692347',	1,	'2018-01-03 13:42:43',	NULL),
(8,	'wali',	'wali@hotmail.com',	'$2y$10$MnAQI8mDEIwszh8/KcNM6uKX0jPEec3lLuAR6ZKrIIhueRjXmWKau',	'karachi',	'236574189',	1,	'2018-01-03 13:45:59',	NULL),
(9,	'Murtaza',	'murtaza@hotmail.com',	'$2y$10$EHhdAYhJ80GV3QEUF4ohquFob9Qi2SZwWT1nZngiPdNytV9JU.Es2',	'tariq road',	'021354687',	1,	'2018-02-13 04:20:10',	'2018-02-13 09:07:28');

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
(5,	'Heels',	1,	'2018-01-10 10:50:09',	'2018-01-19 06:02:52'),
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
  `ProductPrice` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `DateModified` datetime NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `women_products` (`ProductID`, `CategoryID`, `ProductName`, `ProductDescription`, `ProductImage`, `ProductPrice`, `Status`, `DateAdded`, `DateModified`) VALUES
(2,	4,	'First belt',	'First Description',	'2_EkSbG.jpg',	5000,	1,	'2018-01-17 09:57:15',	'2018-01-17 09:57:15'),
(3,	5,	'aaa',	'aaa',	'3_GKgvG.jpg',	1000,	1,	'2018-01-18 12:41:40',	'2018-01-18 12:41:40'),
(4,	5,	'bbb',	'bbb',	'4_RJlFh.jpg',	2000,	1,	'2018-01-18 12:41:54',	'2018-01-18 12:41:54'),
(5,	5,	'ccc',	'ccc',	'5_6LQjb.jpg',	3000,	1,	'2018-01-18 12:42:06',	'2018-01-18 12:42:06'),
(6,	5,	'rayid',	'rayid',	'6_MBN0v.jpg',	500000,	0,	'2018-01-18 12:49:50',	'2018-01-18 12:50:02');

-- 2018-02-13 11:04:28
