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


CREATE TABLE User (
	UserID int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	IsAdmin int(1) NOT NULL default '0',
	Name varchar(20) NOT NULL,
	Password varchar(20) NOT NULL,
	Description varchar(200),
	Time_stp timestamp default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE GeoCodes (
	GID int(8) NOT NULL AUTO_INCREMENT primary key,
	longLocation decimal(18,14) DEFAULT NULL,
	latLocation decimal(18,14) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8; 

CREATE TABLE Channel (
	ChannelID int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Coordinates int(8) default NULL,
	Description varchar(200),
	Time_stp timestamp default current_timestamp,
	FOREIGN KEY (ChannelID) REFERENCES User(UserID),
	FOREIGN KEY (Coordinates) REFERENCES GeoCodes(GID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Subscription (
	UserID int(8) NOT NULL,
	ChannelID int(8) NOT NULL,
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (UserID,ChannelID),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (ChannelID) REFERENCES Channel(ChannelID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Video (
	VidID int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Content varchar(50) NOT NULL COMMENT,
	Description varchar(200),
	Name varchar(30) NOT NULL,
	Views int(8) NOT NULL default '0',
	Coordinates int(8) default NULL,
	ChannelID int(8) NOT NULL,
	Time_stp timestamp default current_timestamp,
	FOREIGN KEY (ChannelID) REFERENCES Channel(ChannelID),
	FOREIGN KEY (Coordinates) REFERENCES GeoCodes(GID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Comment (
	VidID int(8) NOT NULL,
	UserID int(8) NOT NULL,
	CommentID int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Text varchar(300) NOT NULL,
	Time_stp timestamp default current_timestamp,
	FOREIGN KEY (VidID) REFERENCES Video(VidID),
	FOREIGN KEY (UserID) REFERENCES User(UserID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE AbuseVid (
	VidID int(8) NOT NULL,
	UserID int(8) NOT NULL,
	Message varchar(300),
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (VidID,UserID),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (VidID) REFERENCES Video(VidID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE AbuseComment (
	UserID int(8) NOT NULL,
	CommentID int(8) NOT NULL,
	Message varchar(300),
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (UserID,CommentID),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (CommentID) REFERENCES Comment(CommentID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Likes (
	VidID int(8) NOT NULL,
	UserID int(8) NOT NULL,
	LikeDislike int(1) NOT NULL,
	Time_stp timestamp default current_timestamp,
	PRIMARY KEY (VidID,UserID),
	FOREIGN KEY (VidID) REFERENCES Video(VidID),
	FOREIGN KEY (UserID) REFERENCES User(UserID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

	
	



