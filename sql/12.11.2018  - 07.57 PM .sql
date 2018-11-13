-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2018 at 02:27 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

DROP TABLE IF EXISTS `job_posts`;
CREATE TABLE IF NOT EXISTS `job_posts` (
  `jobID` int(11) NOT NULL AUTO_INCREMENT,
  `jobTitle` varchar(255) COLLATE utf8_bin NOT NULL,
  `industryTypeID` int(11) NOT NULL,
  `jobType` tinyint(1) NOT NULL,
  `userID` int(11) NOT NULL,
  `cityID` int(11) NOT NULL,
  `districtID` int(11) NOT NULL,
  `ProvinceID` int(11) NOT NULL,
  `salaryRangeID` int(11) NOT NULL,
  `contactName` varchar(255) COLLATE utf8_bin NOT NULL,
  `contactPosition` varchar(255) COLLATE utf8_bin NOT NULL,
  `contactPhone` varchar(255) COLLATE utf8_bin NOT NULL,
  `contactEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`jobID`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
