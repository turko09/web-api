-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.1:32769
-- Generation Time: Mar 26, 2018 at 01:12 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsc_team_alpha`
--
CREATE DATABASE IF NOT EXISTS `cmsc_team_alpha` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cmsc_team_alpha`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  `photo` blob,
  `datecreated` datetime NOT NULL,
  `datemodified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `blocked` tinyint(4) NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  `photo` blob NOT NULL,
  `datecreated` datetime NOT NULL,
  `datemodified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `driver_email` (`email`),
  UNIQUE KEY `driver_mobile` (`mobile`),
  KEY `email` (`email`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driverdocument`
--

CREATE TABLE IF NOT EXISTS `driverdocument` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverid` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `document` blob NOT NULL,
  `datecreated` datetime NOT NULL,
  `datemodified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `driverid` (`driverid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

CREATE TABLE IF NOT EXISTS `fare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(6,2) DEFAULT NULL,
  `surge_amount` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `panicmobile` varchar(12) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `blocked` tinyint(4) NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  `photo` blob NOT NULL,
  `datecreated` datetime NOT NULL,
  `datemodified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `passenger_email` (`email`),
  UNIQUE KEY `passenger_mobile` (`mobile`),
  KEY `email` (`email`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `tripid` int(11) NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `mode` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tripid` (`tripid`),
  KEY `mode` (`mode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE IF NOT EXISTS `trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicleid` int(11) NOT NULL,
  `passengerid` int(11) NOT NULL,
  `source` varchar(250) NOT NULL,
  `sourcelat` decimal(11,8) NOT NULL,
  `sourcelong` decimal(11,8) NOT NULL,
  `destination` varchar(250) NOT NULL,
  `destinationlat` decimal(11,8) NOT NULL,
  `destinationlong` decimal(11,8) NOT NULL,
  `stage` varchar(15) NOT NULL,
  `datestart` datetime DEFAULT NULL,
  `dateend` datetime DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `datemodified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicleid` (`vehicleid`),
  KEY `passengerid` (`passengerid`),
  KEY `stage` (`stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverid` int(11) NOT NULL,
  `plateno` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `make` varchar(10) NOT NULL,
  `model` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `photo` blob,
  `active` tinyint(4) NOT NULL,
  `free` tinyint(4) NOT NULL,
  `locationlat` decimal(11,8) DEFAULT NULL,
  `locationlong` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicle_plateno` (`plateno`),
  KEY `driverid` (`driverid`),
  KEY `plateno` (`plateno`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driverdocument`
--
ALTER TABLE `driverdocument`
  ADD CONSTRAINT `driverdocument_ibfk_1` FOREIGN KEY (`driverid`) REFERENCES `driver` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`tripid`) REFERENCES `trip` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`vehicleid`) REFERENCES `vehicle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`passengerid`) REFERENCES `passenger` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`driverid`) REFERENCES `driver` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
