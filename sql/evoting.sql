# Host: localhost  (Version: 5.0.24a-community-nt)
# Date: 2018-02-14 16:01:43
# Generator: MySQL-Front 5.2  (Build 5.106)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;

DROP DATABASE IF EXISTS `evoting`;
CREATE DATABASE `evoting` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `evoting`;

#
# Source for table "admininfo"
#

DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE `admininfo` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `Email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Source for table "constituency"
#

DROP TABLE IF EXISTS `constituency`;
CREATE TABLE `constituency` (
  `Id` int(11) NOT NULL auto_increment,
  `area` varchar(255) default NULL,
  `central` varchar(255) default NULL,
  `state` varchar(255) default NULL,
  `local` varchar(255) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Source for table "electioninfo"
#

DROP TABLE IF EXISTS `electioninfo`;
CREATE TABLE `electioninfo` (
  `ID` int(11) NOT NULL auto_increment,
  `ename` varchar(200) NOT NULL,
  `edate` varchar(100) NOT NULL,
  `etype` varchar(100) NOT NULL,
  `econ` varchar(200) default NULL,
  `STATUS` varchar(10) NOT NULL,
  `subtype` varchar(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `flag` varchar(200) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Source for table "userinfo"
#

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Source for table "voterinfo"
#

DROP TABLE IF EXISTS `voterinfo`;
CREATE TABLE `voterinfo` (
  `ID` int(11) NOT NULL auto_increment,
  `vimage` varchar(100) NOT NULL,
  `vaadhar` varchar(255) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vid` varchar(12) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `area` varchar(255) default NULL,
  `finger` varchar(255) default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `vaadhar` (`vaadhar`),
  UNIQUE KEY `vid` (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Source for table "votes"
#

DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `Id` int(11) NOT NULL auto_increment,
  `voter` varchar(255) default NULL,
  `candidate` varchar(255) default NULL,
  `time` varchar(255) default NULL,
  `election` varchar(255) default NULL,
  `etype` varchar(255) default NULL,
  `esubtype` varchar(255) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
