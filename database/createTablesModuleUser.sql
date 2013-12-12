/* This script creates the tables for the WIS YouCourse DB used in
Web Information System - Project 2013
Jorge Garcia Ximenez - Aur�lien Plisnier - Mohammed Chajii
---------------------------------------------------------
*/



DROP TABLE IF EXISTS Subscription;
DROP TABLE IF EXISTS Likes;
DROP TABLE IF EXISTS AbuseComment;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS AbuseVid;
DROP TABLE IF EXISTS Video;
DROP TABLE IF EXISTS Channel;
DROP TABLE IF EXISTS GeoCodes;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS tbl_profiles;
DROP TABLE IF EXISTS tbl_profiles_fields;

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
  PRIMARY KEY (`id`),
  Description varchar(200),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`),
  Time_stp timestamp default current_timestamp
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `User` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 0, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 0, 0, 1);

CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES
(1, 'Admin', 'Administrator', '0000-00-00'),
(2, 'Demo', 'Demo', '0000-00-00');

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

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2);

CREATE TABLE Channel (
	ChannelID int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Description varchar(200),
	longLocation decimal(18,14) DEFAULT NULL,
	latLocation decimal(18,14) DEFAULT NULL,
	Time_stp timestamp default current_timestamp,
	FOREIGN KEY (ChannelID) REFERENCES User(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Subscription (
	id int(8) NOT NULL,
	ChannelID int(8) NOT NULL,
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (id,ChannelID),
    FOREIGN KEY (id) REFERENCES User(id),
    FOREIGN KEY (ChannelID) REFERENCES Channel(ChannelID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Video (
	VidID int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Content varchar(50) NOT NULL,
	Description varchar(200),
	Name varchar(30) NOT NULL,
	Views int(8) NOT NULL default '0',
	ChannelID int(8) NOT NULL,
	longLocation decimal(18,14) DEFAULT NULL,
	latLocation decimal(18,14) DEFAULT NULL,
	Time_stp timestamp default current_timestamp,
	FOREIGN KEY (ChannelID) REFERENCES Channel(ChannelID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Comment (
	VidID int(8) NOT NULL,
	id int(8) NOT NULL,
	CommentID int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Text varchar(300) NOT NULL,
	Time_stp timestamp default current_timestamp,
	FOREIGN KEY (VidID) REFERENCES Video(VidID),
	FOREIGN KEY (id) REFERENCES User(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE AbuseVid (
	VidID int(8) NOT NULL,
	id int(8) NOT NULL,
	Message varchar(300),
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (VidID,id),
    FOREIGN KEY (id) REFERENCES User(id),
    FOREIGN KEY (VidID) REFERENCES Video(VidID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE AbuseComment (
	id int(8) NOT NULL,
	CommentID int(8) NOT NULL,
	Message varchar(300),
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (id,CommentID),
    FOREIGN KEY (id) REFERENCES User(id),
    FOREIGN KEY (CommentID) REFERENCES Comment(CommentID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Likes (
	VidID int(8) NOT NULL,
	id int(8) NOT NULL,
	LikeDislike int(1) NOT NULL,
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (VidID,id),
	FOREIGN KEY (VidID) REFERENCES Video(VidID),
	FOREIGN KEY (id) REFERENCES User(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
