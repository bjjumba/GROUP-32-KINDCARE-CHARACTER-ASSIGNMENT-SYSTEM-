-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2022 at 10:45 AM
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
(1, 'E', 'F', 'H', 'V', 'W', 'Z', 'X', 'M', '2022-02-05', '2022-02-05', '02:03:00', '02:33:00', 'Benja'),
(3, 'S', 'I', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-04', '2022-02-28', '17:14:39', '17:14:46', 'benja'),
(7, 'J', NULL, NULL, NULL, NULL, NULL, NULL, 'V', '2022-02-27', '2022-03-01', '09:39:00', '12:42:00', 'Esther'),
(8, 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-09', '2022-02-28', '13:33:47', '14:23:47', 'Benja'),
(45, 'B', NULL, 'F', NULL, NULL, NULL, NULL, NULL, '2022-02-22', '2022-02-28', '28:33:56', '20:23:56', 'Benja'),
(71, 'C', 'E', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-16', '2022-02-17', '02:44:00', '07:49:00', 'DeGuzman');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `Usercode` int(11) NOT NULL,
  `teacherUsername` varchar(10) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `ATTEMPT` varchar(200) DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `average` float DEFAULT NULL,
  `Duration` float NOT NULL,
  PRIMARY KEY (`Usercode`,`teacherUsername`,`assignmentID`),
  KEY `Usercode` (`Usercode`),
  KEY `teacherUsername` (`teacherUsername`),
  KEY `assignmentID` (`assignmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`Usercode`, `teacherUsername`, `assignmentID`, `ATTEMPT`, `comment`, `average`, `Duration`) VALUES
(1234, 'DeGuzman', 24, 'ATTEMPTED', 'try harder', 40.5, 0);

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
(20, 'BENJAMIN', 'JJUMBA', '0721855895', 'Active', 'Benja'),
(1234, 'De Miss', 'Christine', '0700000000', 'Inactive', 'DeGuzman'),
(21, 'Ramond ', 'Mist', '0701234567', 'Inactive', 'DeGuzman'),
(11, 'De', 'Christine', '0700000000', 'Inactive', 'DeGuzman'),
(790, 'NAGAWA', 'ANNA', '0784577777', 'Inactive', 'Esther'),
(55, 'Esther', 'Nabwire', '0745213698', 'Active', 'DeGuzman');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
