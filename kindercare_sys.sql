-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2022 at 11:33 AM
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
  `assignmentID` int(11) NOT NULL,
  `character1` char(1) DEFAULT NULL,
  `character2` char(1) DEFAULT NULL,
  `character3` char(1) DEFAULT NULL,
  `character4` char(1) DEFAULT NULL,
  `character5` char(1) DEFAULT NULL,
  `character6` char(1) DEFAULT NULL,
  `character7` char(1) DEFAULT NULL,
  `character8` char(1) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `teacherUsername` varchar(10) NOT NULL,
  PRIMARY KEY (`assignmentID`),
  KEY `teacherUsername` (`teacherUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `character1`, `character2`, `character3`, `character4`, `character5`, `character6`, `character7`, `character8`, `startDate`, `endDate`, `startTime`, `endTime`, `teacherUsername`) VALUES
(24, 'Q', 'P', 'A', 'K', 'N', 'M', 'L', 'H', '2022-02-03', '2022-02-04', '07:10:00', '09:10:00', 'Raymond'),
(1, 'E', 'F', 'H', 'V', 'W', 'Z', 'X', 'M', '2022-02-05', '2022-02-05', '02:03:00', '02:33:00', 'Benja');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `Usercode` int(11) NOT NULL,
  `teacherUsername` varchar(10) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `average` float DEFAULT NULL,
  PRIMARY KEY (`Usercode`,`teacherUsername`,`assignmentID`),
  KEY `Usercode` (`Usercode`),
  KEY `teacherUsername` (`teacherUsername`),
  KEY `assignmentID` (`assignmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`Usercode`, `teacherUsername`, `assignmentID`, `score`, `comment`, `average`) VALUES
(20, 'DeGuzman', 24, 45, 'Work harder54', 45);

-- --------------------------------------------------------

--
-- Table structure for table `pupil`
--

DROP TABLE IF EXISTS `pupil`;
CREATE TABLE IF NOT EXISTS `pupil` (
  `Usercode` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `activeInactive` varchar(20) DEFAULT 'Active',
  `teacherUsername` varchar(10) NOT NULL,
  PRIMARY KEY (`Usercode`),
  KEY `teacherUsername` (`teacherUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pupil`
--

INSERT INTO `pupil` (`Usercode`, `firstname`, `lastname`, `phonenumber`, `activeInactive`, `teacherUsername`) VALUES
(20, 'BENJAMIN', 'JJUMBA', '0721855895', 'Inactive', 'Benja'),
(1234, 'De Miss', 'Christine', '0700000000', 'Active', 'DeGuzman'),
(21, 'Ramond ', 'Mist', '0701234567', 'Active', 'DeGuzman'),
(11, 'De', 'Christine', '0700000000', 'Active', 'DeGuzman');

-- --------------------------------------------------------

--
-- Table structure for table `pupilassignment`
--

DROP TABLE IF EXISTS `pupilassignment`;
CREATE TABLE IF NOT EXISTS `pupilassignment` (
  `Usercode` varchar(20) NOT NULL,
  `AssignID` varchar(20) NOT NULL,
  KEY `Usercode` (`Usercode`),
  KEY `AssignID` (`AssignID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `requestID` int(11) NOT NULL AUTO_INCREMENT,
  `request` varchar(50) NOT NULL,
  `Usercode` int(11) NOT NULL,
  `teacherUsername` varchar(10) NOT NULL,
  PRIMARY KEY (`requestID`),
  KEY `Usercode` (`Usercode`),
  KEY `teacherUsername` (`teacherUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherUsername` varchar(10) NOT NULL,
  `teacherPasscode` varchar(15) NOT NULL,
  `teacherName` varchar(40) NOT NULL,
  `teacherEmail` varchar(30) NOT NULL,
  PRIMARY KEY (`teacherUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherUsername`, `teacherPasscode`, `teacherName`, `teacherEmail`) VALUES
('Raymond', '1234', 'NSUBUGA RAYMOND', 'raymond@gmail.com'),
('Benja', '2468', 'JJUMBA ERIC BENJA', 'jjumba@gmail.com'),
('Esther', '1357', 'NABWIRE ESTHER', 'esther@gmail.com'),
('DeGuzman', '1234', 'DeGUZMAN ERNESTO', 'zziwa@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
