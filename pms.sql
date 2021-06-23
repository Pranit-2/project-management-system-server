-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2021 at 12:16 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL,
  `attDATE` date NOT NULL,
  `attTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `resourceList` varchar(20) NOT NULL,
  `markAttendance` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leadinformation`
--

DROP TABLE IF EXISTS `leadinformation`;
CREATE TABLE IF NOT EXISTS `leadinformation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recievedOn` date NOT NULL,
  `leadSource` varchar(27) NOT NULL,
  `leadName` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(500) NOT NULL,
  `confidence` varchar(15) NOT NULL,
  `estimateCost` double NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leadinformation`
--

INSERT INTO `leadinformation` (`id`, `recievedOn`, `leadSource`, `leadName`, `phone`, `email`, `address`, `confidence`, `estimateCost`, `createdOn`, `comments`) VALUES
(1, '2021-01-29', 'sumey', 'Delton', 1234567810, 'dalton@gmail.com', 'Marcela', '100%', 50000, '2021-05-27 06:01:05', 'I need it urgently without any fail as soon as possible'),
(2, '2021-01-29', 'sumey', 'Delton', 1234567810, 'dalton@gmail.com', 'Marcela', '100%', 50000, '2021-05-27 06:01:28', 'I need it urgently without any fail as soon as possible'),
(4, '2021-01-29', 'Shravani', 'Tanvi', 2147483647, 'Tanvi@gmail.com', 'Ponda', '100%', 60000, '2020-01-28 18:30:00', 'Take your time');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

DROP TABLE IF EXISTS `phases`;
CREATE TABLE IF NOT EXISTS `phases` (
  `id` int(11) NOT NULL,
  `phaseId` int(11) NOT NULL,
  `phaseName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL,
  `leadId` int(11) NOT NULL,
  `contactPerson` varchar(200) NOT NULL,
  `contactPhone` int(11) NOT NULL,
  `projectName` varchar(200) NOT NULL,
  `cost` double NOT NULL,
  `location` text NOT NULL,
  `startDate` date NOT NULL,
  `estimatedEndDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projectexpence`
--

DROP TABLE IF EXISTS `projectexpence`;
CREATE TABLE IF NOT EXISTS `projectexpence` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `expenceDate` date NOT NULL,
  `expenceType` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `comments` text,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projectmilstone`
--

DROP TABLE IF EXISTS `projectmilstone`;
CREATE TABLE IF NOT EXISTS `projectmilstone` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `actualStartDate` date NOT NULL,
  `actualEndDate` date NOT NULL,
  `deliverables` text,
  `comments` text,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projectresource`
--

DROP TABLE IF EXISTS `projectresource`;
CREATE TABLE IF NOT EXISTS `projectresource` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `resourceId` int(11) NOT NULL,
  `comments` text,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `phaseId` int(11) NOT NULL,
  `task` text,
  `resourceId` int(11) NOT NULL,
  `assignedBy` int(11) NOT NULL,
  `assignedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estimatedHours` int(11) DEFAULT NULL,
  `startDateTime` datetime NOT NULL,
  `actualHours` int(11) DEFAULT NULL,
  `progress` int(11) NOT NULL,
  `endDateTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userresource`
--

DROP TABLE IF EXISTS `userresource`;
CREATE TABLE IF NOT EXISTS `userresource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  `resourceName` varchar(200) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `qualification` text NOT NULL,
  `designation` varchar(20) NOT NULL,
  `skillset` text NOT NULL,
  `salary` double NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userresource`
--

INSERT INTO `userresource` (`id`, `role`, `resourceName`, `password`, `phone`, `email`, `address`, `qualification`, `designation`, `skillset`, `salary`, `comments`) VALUES
(1, 'Admin', 'Pranita', '123', 985045450, 'pranita22031999@gmail.com', 'Marcela', 'B.E computer science engineering', 'Project Manager', 'c,c++,java,javascript,css,html,php,mysql', 50000, 'Hello!!'),
(2, 'staff', 'Shravani', '234', 1234567810, 'shravaninaik18@gmail.com', 'Merces', 'B.E computer science engineering', 'Developer', 'c,c++,java', 30000, 'Hiiii'),
(3, 'staff', 'Shereen', '345', 1234567892, 'shereengubbi@gmail.com', 'Panjim', 'B.E computer science', 'Designer', 'html,css,bootstrap,c#', 30000, 'Heyy I am a designer');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `role_name` varchar(50) DEFAULT NULL,
  `role_description` varchar(150) NOT NULL,
  `role_isActive` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
