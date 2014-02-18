-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2014 at 10:52 AM
-- Server version: 5.5.36
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `devtest`
--
DROP DATABASE `devtest`;
CREATE DATABASE `devtest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `devtest`;

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

DROP TABLE IF EXISTS `user_sessions`;
CREATE TABLE IF NOT EXISTS `user_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `session_start` datetime DEFAULT NULL,
  `session_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `user_id` (`user_id`),
  KEY `session_start` (`session_start`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`session_id`, `user_id`, `session_start`, `session_time`) VALUES
(1, 1, '2014-01-10 09:55:20', 451),
(2, 1, '2013-11-15 09:55:20', 297),
(3, 1, '2014-02-18 09:55:20', 131),
(4, 1, '2013-12-04 09:55:20', 486),
(5, 1, '2014-01-28 09:55:20', 596),
(6, 1, '2013-10-25 09:55:20', 81),
(7, 1, '2014-01-10 09:55:20', 58),
(8, 1, '2013-11-24 09:55:20', 45),
(9, 1, '2013-12-06 09:55:20', 51),
(10, 1, '2013-10-27 09:55:20', 121),
(11, 1, '2013-11-04 09:55:20', 453),
(12, 1, '2013-12-11 09:55:20', 461),
(13, 1, '2014-01-21 09:55:20', 227),
(14, 1, '2013-12-28 09:55:20', 473),
(15, 1, '2013-12-22 09:55:20', 241),
(16, 1, '2014-02-06 09:55:20', 508),
(17, 1, '2014-02-09 09:55:20', 375),
(18, 1, '2014-02-10 09:55:20', 350),
(19, 1, '2014-02-02 09:55:20', 626),
(20, 1, '2013-12-26 09:55:20', 641),
(21, 1, '2013-11-09 09:55:20', 607),
(22, 1, '2013-11-03 09:55:20', 393),
(23, 1, '2013-10-30 09:55:20', 142),
(24, 1, '2013-10-24 09:55:20', 251),
(25, 1, '2014-02-09 09:55:20', 110),
(26, 1, '2013-12-25 09:55:20', 516),
(27, 1, '2014-02-10 09:55:20', 90),
(28, 1, '2013-10-23 09:55:20', 341),
(29, 1, '2013-11-24 09:55:20', 716),
(30, 1, '2013-12-05 09:55:20', 396),
(31, 1, '2014-02-18 09:55:20', 552),
(32, 1, '2014-02-05 09:55:20', 131),
(33, 1, '2013-12-12 09:55:20', 439),
(34, 1, '2013-12-21 09:55:20', 364),
(35, 1, '2013-11-20 09:55:20', 503),
(36, 1, '2014-01-12 09:55:20', 702),
(37, 1, '2014-01-15 09:55:20', 562),
(38, 1, '2013-12-19 09:55:20', 702),
(39, 1, '2013-11-26 09:55:20', 383),
(40, 1, '2013-10-25 09:55:20', 530),
(41, 1, '2013-11-22 09:55:20', 62),
(42, 1, '2013-11-17 09:55:20', 161),
(43, 1, '2013-11-26 09:55:20', 617),
(44, 1, '2014-01-31 09:55:20', 443),
(45, 1, '2013-11-30 09:55:20', 366),
(46, 1, '2013-11-05 09:55:20', 499),
(47, 1, '2014-01-04 09:55:20', 676),
(48, 1, '2014-01-15 09:55:20', 444),
(49, 1, '2014-01-17 09:55:20', 192),
(50, 1, '2013-12-21 09:55:20', 348),
(51, 1, '2013-12-01 09:55:20', 446),
(52, 1, '2013-11-12 09:55:20', 465),
(53, 1, '2014-02-03 09:55:20', 265),
(54, 1, '2014-01-28 09:55:20', 650);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `created_on`) VALUES
(1, 'john', 'doe', 'johnd@email.com', '123456', '2013-01-01 08:00:00'),
(2, 'jane', 'doe', 'janed@email.com', '123456', '2013-01-01 08:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
