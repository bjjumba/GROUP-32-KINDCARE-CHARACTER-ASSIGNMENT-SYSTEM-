
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2022 at 10:55 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kindercare_sys`
--
CREATE DATABASE IF NOT EXISTS `kindercare_sys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kindercare_sys`;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE IF NOT EXISTS `assignment` (
  `AssgnID` varchar(20) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `No_of_chars` int(11) NOT NULL,
  `Passcode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`AssgnID`),
  KEY `Passcode` (`Passcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

DROP TABLE IF EXISTS `pupil`;
CREATE TABLE IF NOT EXISTS `pupil` (
  `Usercode` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `Passcode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Usercode`),
  KEY `Passcode` (`Passcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pupilassignment`
--

DROP TABLE IF EXISTS `pupilassignment`;
CREATE TABLE IF NOT EXISTS `pupilassignment` (
  `Usercode` varchar(20) DEFAULT NULL,
  `AssignID` varchar(20) DEFAULT NULL,
  KEY `Usercode` (`Usercode`),
  KEY `AssignID` (`AssignID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scorerecords`
--

DROP TABLE IF EXISTS `scorerecords`;
CREATE TABLE IF NOT EXISTS `scorerecords` (
  `ScoreCode` varchar(20) NOT NULL,
  `marks` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `Passcode` varchar(20) DEFAULT NULL,
  `AssgnID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ScoreCode`),
  KEY `Passcode` (`Passcode`),
  KEY `AssgnID` (`AssgnID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `Passcode` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`Passcode`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
