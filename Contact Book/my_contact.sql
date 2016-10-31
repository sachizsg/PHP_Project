-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2014 at 08:53 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `hnumber` varchar(32) NOT NULL,
  `mnumber` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`,`email`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `uname`, `name`, `address`, `hnumber`, `mnumber`, `email`) VALUES
(13, 'sachi2', 'Mahesh', 'Gampaha', '0332265412', '0712546325', 'mahesh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mcontacts`
--

CREATE TABLE IF NOT EXISTS `mcontacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(32) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `cpwd` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`,`email`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mcontacts`
--

INSERT INTO `mcontacts` (`id`, `fname`, `uname`, `cpwd`, `email`) VALUES
(1, 'Sachithra', 'sachi2', 'qwer123', 'wrsachithra@gmail.com'),
(2, 'Chathu', 'Chathu', '123456', 'chathu@gmail.com'),
(3, 'Anusari', 'Anu', '123456', 'anu@gmail.com');
