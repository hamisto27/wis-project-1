-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Host: db4free.net:3306
-- Generation Time: Dec 14, 2013 at 02:13 PM
-- Server version: 5.6.15
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `youcours`
--

-- --------------------------------------------------------

--
-- Table structure for table `AbuseComment`
--

CREATE TABLE `AbuseComment` (
  `id` int(8) NOT NULL,
  `CommentID` int(8) NOT NULL,
  `Message` varchar(300) DEFAULT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`CommentID`),
  KEY `CommentID` (`CommentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AbuseVid`
--

CREATE TABLE `AbuseVid` (
  `VidID` int(8) NOT NULL,
  `id` int(8) NOT NULL,
  `Message` varchar(300) DEFAULT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`VidID`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Channel`
--

CREATE TABLE `Channel` (
  `ChannelID` int(8) NOT NULL AUTO_INCREMENT,
  `Description` varchar(200) DEFAULT NULL,
  `longLocation` decimal(18,14) DEFAULT NULL,
  `latLocation` decimal(18,14) DEFAULT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ChannelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `VidID` int(8) NOT NULL,
  `id` int(8) NOT NULL,
  `CommentID` int(8) NOT NULL AUTO_INCREMENT,
  `Text` varchar(300) NOT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`),
  KEY `VidID` (`VidID`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `allDay`, `start`, `end`, `editable`, `city`, `address`) VALUES
(1, 1, 'hello', 1, 1388012400, 1388016000, 1, NULL, NULL),
(2, 1, 'hello', 1, 1390518000, 1390521600, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_helper`
--

CREATE TABLE `events_helper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events_helper`
--

INSERT INTO `events_helper` (`id`, `user_id`, `title`) VALUES
(1, 1, 'test event 1'),
(2, 1, 'test event 2'),
(3, 1, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `events_user_preference`
--

CREATE TABLE `events_user_preference` (
  `user_id` int(10) unsigned NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `mobile_alert` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(40) DEFAULT NULL,
  `email_alert` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events_user_preference`
--

INSERT INTO `events_user_preference` (`user_id`, `mobile`, `mobile_alert`, `email`, `email_alert`) VALUES
(1, NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `VidID` int(8) NOT NULL,
  `id` int(8) NOT NULL,
  `LikeDislike` int(1) NOT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`VidID`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Subscription`
--

CREATE TABLE `Subscription` (
  `id` int(8) NOT NULL,
  `ChannelID` int(8) NOT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`ChannelID`),
  KEY `ChannelID` (`ChannelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES
(1, 'Admin', 'Administrator', '0000-00-00'),
(2, 'Demo', 'Demo', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

CREATE TABLE `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `Description` varchar(200) DEFAULT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`, `Description`, `Time_stp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1387025382, 1, 1, NULL, '2013-12-12 20:03:55'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 1387025590, 0, 1, NULL, '2013-12-12 20:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `Video`
--

CREATE TABLE `Video` (
  `VidID` int(8) NOT NULL AUTO_INCREMENT,
  `Content` varchar(50) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Name` varchar(30) NOT NULL,
  `Views` int(8) NOT NULL DEFAULT '0',
  `ChannelID` int(8) NOT NULL,
  `longLocation` decimal(18,14) DEFAULT NULL,
  `latLocation` decimal(18,14) DEFAULT NULL,
  `Time_stp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `slideshare` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`VidID`),
  KEY `ChannelID` (`ChannelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AbuseComment`
--
ALTER TABLE `AbuseComment`
  ADD CONSTRAINT `AbuseComment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `AbuseComment_ibfk_2` FOREIGN KEY (`CommentID`) REFERENCES `Comment` (`CommentID`);

--
-- Constraints for table `AbuseVid`
--
ALTER TABLE `AbuseVid`
  ADD CONSTRAINT `AbuseVid_ibfk_1` FOREIGN KEY (`id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `AbuseVid_ibfk_2` FOREIGN KEY (`VidID`) REFERENCES `Video` (`VidID`);

--
-- Constraints for table `Channel`
--
ALTER TABLE `Channel`
  ADD CONSTRAINT `Channel_ibfk_1` FOREIGN KEY (`ChannelID`) REFERENCES `User` (`id`);

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`VidID`) REFERENCES `Video` (`VidID`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`VidID`) REFERENCES `Video` (`VidID`),
  ADD CONSTRAINT `Likes_ibfk_2` FOREIGN KEY (`id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Subscription`
--
ALTER TABLE `Subscription`
  ADD CONSTRAINT `Subscription_ibfk_1` FOREIGN KEY (`id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Subscription_ibfk_2` FOREIGN KEY (`ChannelID`) REFERENCES `Channel` (`ChannelID`);

--
-- Constraints for table `Video`
--
ALTER TABLE `Video`
  ADD CONSTRAINT `Video_ibfk_1` FOREIGN KEY (`ChannelID`) REFERENCES `Channel` (`ChannelID`);
