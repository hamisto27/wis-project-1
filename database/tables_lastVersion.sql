-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Host: db4free.net:3306
-- Generation Time: Dec 14, 2013 at 02:42 PM
-- Server version: 5.6.15
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `youcours`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `allDay` smallint(5) unsigned NOT NULL DEFAULT '0',
  `start` int(10) unsigned DEFAULT NULL,
  `end` int(10) unsigned DEFAULT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `city` varchar(30) DEFAULT NULL,
  `address` int(50) DEFAULT NULL,
  `jqcalendar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `allDay`, `start`, `end`, `editable`, `city`, `address`, `jqcalendar`) VALUES
(1, 1, 'hello', 1, 1388012400, 1388016000, 1, NULL, NULL, NULL),
(2, 1, 'hello', 1, 1390518000, 1390521600, 1, NULL, NULL, NULL);
