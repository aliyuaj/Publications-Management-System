﻿-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 11:17 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publications`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `actID` int(11) NOT NULL,
  `adminID` varchar(10) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`actID`, `adminID`, `adminName`, `type`, `activity`, `date`) VALUES
(1, 'cef576iht6', 'Dauda Sani', 'Update Type', 'Changed Admin type to Main', '2015-07-22 20:41:40'),
(2, 'cef576iht6', 'Dauda Sani', 'Update Type', 'Changed Admin type to Sub', '2015-07-22 20:41:57'),
(3, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 00:14:21'),
(4, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to smjhbj2@gmail.com', '2015-07-23 00:17:05'),
(5, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 00:20:44'),
(6, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 00:36:36'),
(7, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:02:09'),
(8, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:04:31'),
(9, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:06:26'),
(10, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:07:29'),
(11, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:11:01'),
(12, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:11:38'),
(13, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:11:50'),
(14, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:12:03'),
(15, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:12:26'),
(16, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:13:29'),
(17, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:13:48'),
(18, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:14:16'),
(19, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:14:25'),
(20, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:20:27'),
(21, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:21:53'),
(22, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:22:30'),
(23, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:23:03'),
(24, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 01:23:32'),
(25, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:21:03'),
(26, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:21:47'),
(27, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:22:00'),
(28, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:22:08'),
(29, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:22:25'),
(30, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:22:35'),
(31, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:29:05'),
(32, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:29:55'),
(33, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 10:30:30'),
(34, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 23:38:56'),
(35, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 23:39:11'),
(36, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 23:44:52'),
(37, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 23:46:54'),
(38, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-23 23:53:05'),
(39, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted Message', '2015-07-23 23:53:15'),
(40, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-24 00:02:25'),
(41, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@ymail.com', '2015-07-24 00:02:32'),
(42, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@gmail.com', '2015-07-24 00:06:50'),
(43, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@gmail.com', '2015-07-24 00:07:08'),
(44, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@gmail.com', '2015-07-24 00:07:22'),
(45, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@gmail.com', '2015-07-24 00:07:35'),
(46, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@gmail.com', '2015-07-24 00:07:47'),
(47, 'cef576iht6', 'Dauda Sani', 'Mail', 'Sent mail to snueboy@gmail.com', '2015-07-24 00:08:50'),
(48, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:09:46'),
(49, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:09:57'),
(50, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:10:54'),
(51, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:11:38'),
(52, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:11:47'),
(53, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:12:17'),
(54, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:12:24'),
(55, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:12:51'),
(56, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:14:34'),
(57, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:15:39'),
(58, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:16:12'),
(59, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:30:00'),
(60, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:30:34'),
(61, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by scooter@yahoo.com', '2015-07-24 00:31:24'),
(62, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:31:41'),
(63, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:31:56'),
(64, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:32:12'),
(65, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:33:23'),
(66, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:33:52'),
(67, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:34:11'),
(68, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:34:31'),
(69, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:34:36'),
(70, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:35:20'),
(71, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:36:10'),
(72, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:36:24'),
(73, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by snueboy@gmail.com', '2015-07-24 00:36:32'),
(74, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:36:45'),
(75, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:36:50'),
(76, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:38:00'),
(77, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:41:08'),
(78, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:44:59'),
(79, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:48:46'),
(80, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:49:31'),
(81, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:50:11'),
(82, 'cef576iht6', 'Dauda Sani', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-24 00:52:02'),
(83, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted Message', '2015-07-24 00:52:38'),
(84, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted Message', '2015-07-24 00:52:42'),
(85, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted Message', '2015-07-24 00:52:44'),
(86, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted Message', '2015-07-24 00:52:47'),
(87, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted Message', '2015-07-24 00:52:52'),
(102, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Sent mail to real306@rocketmail.com', '2015-07-27 09:03:26'),
(103, '2jvy76t8gj', 'Jimmy Benson', 'Delete', 'Deleted publication request', '2015-07-27 09:03:56'),
(104, '2jvy76t8gj', 'Jimmy Benson', 'Delete', 'Deleted Message', '2015-07-27 09:04:14'),
(105, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-27 09:04:52'),
(106, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Replied mail sent by snueboy@ymail.com', '2015-07-27 09:05:07'),
(107, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Replied mail sent by snueboy@ymail.com', '2015-07-27 09:05:23'),
(108, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-27 09:05:39'),
(109, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Replied mail sent by yaksman@yahoo.com', '2015-07-27 09:05:40'),
(110, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Replied mail sent by snueboy@ymail.com', '2015-07-27 09:05:50'),
(111, '2jvy76t8gj', 'Jimmy Benson', 'Mail', 'Sent mail to bagabii@gmail.com', '2015-07-27 10:06:11'),
(112, 'Dauda Sani', 'cef576iht6', 'Create Admin', 'Added Lukman Haruna', '2015-07-27 11:13:55'),
(113, 'Dauda Sani', 'cef576iht6', 'Create Admin', 'Added Lukman Haruna', '2015-07-27 11:17:08'),
(120, 'cef576iht6', 'Dauda Sani', 'Request', 'Granted Request of \'\' to Salisu Usman`', '2015-07-27 13:57:52'),
(122, 'cef576iht6', 'Dauda Sani', 'Request', 'Granted Request of Pub. titled: \'How To Produce Quality Eggs For The Market\' to Salisu Umar', '2015-07-27 14:03:25'),
(124, 'cef576iht6', 'Dauda Sani', 'Update Type', 'Changed Admin type of Salisu Bawa to Main', '2015-07-27 14:39:30'),
(125, 'cef576iht6', 'Dauda Sani', 'Request', 'Granted Request of Pub. titled: \'How To Produce Quality Eggs For The Market\' to Sani Toro', '2015-07-27 14:44:08'),
(126, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted Message sent by \'yaksman@gmail.com\'; content: How can i get the book that i requested', '2015-07-27 14:58:06'),
(145, 'cef576iht6', 'Dauda Sani', 'Update Type', 'Changed Admin type of <b>Aminu Jimoh</b> to Main', '2017-01-21 11:19:40'),
(146, 'cef576iht6', 'Dauda Sani', 'Update Type', 'Changed Admin type of <b>Aminu Jimoh</b> to Sub', '2017-01-21 11:19:46'),
(147, 'cef576iht6', 'Dauda Sani', 'Delete', 'Deleted manual request sent by <b>jmakams@gmail.com</b>', '2017-01-21 11:49:33'),
(148, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Restraining Techniques In Farm Animals</b> edited', '2017-02-01 13:59:09'),
(149, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Production Of Gum Arabic</b> edited', '2017-02-01 20:07:16'),
(150, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Heat Tolerant Tomato Production Under Irrigation</b> edited', '2017-02-01 20:59:54'),
(151, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Major Diseases And Pests Of Forest Trees And Their Control In Nigeria</b> ', '2017-02-02 16:34:52'),
(152, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Estimating Farm Machinery Cost</b> edited', '2017-02-02 17:07:45'),
(153, 'cef576iht6', 'Aminu Umar', 'Delete', 'Deleted Publication titled: <b> Agrimag</b>', '2017-02-02 17:15:13'),
(154, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Onion Production And Management Under Irrigation</b> edited', '2017-02-02 17:16:28'),
(155, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Herd Health Management In Farm Animals</b> edited', '2017-02-02 17:59:39'),
(156, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Major Diseases And Pests Of Forest Trees And Their Control In Nigeria</b> ', '2017-02-02 18:00:03'),
(157, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Production And Utilization Of â€˜Ogbonoâ€™ (Irvingia Gabonensis)</b> edite', '2017-02-02 18:00:26'),
(158, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Heat Tolerant Tomato Production Under Irrigation</b> edited', '2017-02-02 18:06:42'),
(159, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Rice Production</b> edited', '2017-02-02 18:14:21'),
(160, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Rice Production</b> edited', '2017-02-02 18:15:11'),
(161, 'cef576iht6', 'Aminu Umar', 'Edit Details', 'Publication details of <b>Improving The Performance Of Local Chickens</b> edited', '2017-02-03 10:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `catName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `catName`) VALUES
(1, 'Book'),
(3, 'Bulletin'),
(4, 'Guide'),
(5, 'Handbill'),
(6, 'Poster'),
(7, 'Leaflet'),
(8, 'Flipbook (flipcharts)'),
(9, 'Commodity Price'),
(10, 'Agric. Newsletter'),
(11, 'Agric. Extension Journal');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pub_type` varchar(20) NOT NULL,
  `subject_area` varchar(20) NOT NULL,
  `specificarea` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `beneficiary` varchar(100) NOT NULL,
  `timeline` date NOT NULL,
  `date` date NOT NULL,
  `fulfilled` enum('no','yes') NOT NULL DEFAULT 'no',
  `messaged` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `title`, `name`, `organization`, `designation`, `email`, `phone`, `pub_type`, `subject_area`, `specificarea`, `quantity`, `beneficiary`, `timeline`, `date`, `fulfilled`, `messaged`) VALUES
(1, 'Mr.', 'Aliyu Abdul', 'Bank of Agriulture', 'Manager', 'snueboy@gmail.com', '08036142840', 'Bulletin', 'Animal husbandary', 'rabbitary', 10, 'NITR, Kaduna', '2017-01-20', '2017-01-13', 'yes', 'no'),
(3, 'Mr.', 'Aliyu Abdul', 'Bank of Agriulture', 'Manager', 'snueboy@gmail.com', '08036142840', 'Bulletin', 'Animal husbandary', 'rabbitary', 20, 'NITR, Kaduna', '2017-03-17', '2017-01-14', 'yes', 'no'),
(4, 'Mr.', 'Aliyu Abdul', 'Bank of Agriulture', 'Manager', 'snueboy@gmail.com', '08036142840', 'Bulletin', 'Animal husbandary', 'rabbitary', 20, 'NITR, Kaduna', '2017-05-10', '2017-01-14', 'no', 'no'),
(5, 'Mr.', 'John Audu', 'Ministry of Agric', 'Perm Sec.', 'jounaudu@gmail.com', '08064577845', 'Bulletin', 'Animal husbandary', 'rabbitary', 20, 'College of Agric, Bauchi', '2017-01-20', '2017-01-14', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `did` int(11) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `pubID` varchar(20) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`did`, `userID`, `pubID`, `date`) VALUES
(27, '546j66iyy6', '30', '2017-01-11'),
(26, '546j66iyy6', '3', '2017-01-01'),
(25, '546j66iyy6', '30', '2017-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `manual_request`
--

CREATE TABLE `manual_request` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `matID` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manual_request`
--

INSERT INTO `manual_request` (`id`, `name`, `email`, `occupation`, `organization`, `purpose`, `date`, `matID`) VALUES
(3, 'John Stephen', 'js2017@hotmail.com', 'Technologist', 'Altech', 'Practice', '2017-01-14', '11'),
(4, 'Jibril Aminu', 'jaminu@hotmail.com', 'Researcher', 'NAERLS:Farm Broadcast', 'Research', '2017-01-14', '30');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `matID` int(11) NOT NULL,
  `copies` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `sponsor` varchar(100) NOT NULL,
  `pubNum` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL DEFAULT 'english',
  `synopsis` varchar(250) NOT NULL,
  `subject` int(11) NOT NULL,
  `sub_subjects` int(11) DEFAULT '0',
  `sub_sub_subjects` int(11) DEFAULT '0',
  `pubYear` varchar(4) NOT NULL DEFAULT '0000',
  `category` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `today` date DEFAULT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`matID`, `copies`, `title`, `author`, `sponsor`, `pubNum`, `language`, `synopsis`, `subject`, `sub_subjects`, `sub_sub_subjects`, `pubYear`, `category`, `month`, `today`, `location`) VALUES
(1, 300, 'Improving The Performance Of Local Chickens', 'NAERLS', '', '002', 'english', '', 6, NULL, NULL, '2009', 2, '', '2015-06-03', 'STORE'),
(2, 1, 'Field Situation Assessment Of 2003 Wet Season', 'NAERLS', '', '59', 'english', 'The situation report of 2003', 0, NULL, NULL, '2003', 2, '', '2015-06-03', 'Store'),
(3, 667, 'Rice Production', 'NAERLS', 'NAERLS', '0', 'Hausa', 'This publication gives an insight into step by step approach in the production of rice in Nigeria.', 1, NULL, NULL, '2000', 3, '', '2015-06-03', 'Store'),
(4, 52, 'NAERLS Newsletter', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '1986', 10, '', '2015-06-03', 'Store'),
(5, 20, 'Quarterly Report', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2012', 2, '', '2015-06-03', 'Store'),
(6, 69, 'Evaluation Of The Impact Of Training & Visit Extension System In Nigeria', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2011', 11, '', '2015-06-04', 'Store'),
(7, 56, 'How To Produce Quality Eggs For The Market', 'NAERLS', '', '0', 'english', '', 6, NULL, NULL, '0000', 4, 'January', '2015-06-03', 'SMALL STORE'),
(8, 7, 'National Agricultural Extension Review And Planning Meeting 2007/2008', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2008', 11, '', '2015-06-03', 'Store'),
(9, 1, 'Field Situation Assessment Of 2007 Wet Season', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2007', 2, '', '2015-06-03', 'Store'),
(10, 54, 'National Agricultural Extension Review And Planning Meeting 2008/2009', 'NAERLS', '', '', 'english', '', 0, NULL, NULL, '2015', 11, '', '2015-07-10', 'store'),
(11, 12, 'NAERLS Newsletter', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '1983', 10, '', '2015-06-03', 'Store'),
(13, 657, 'Advisory Service Manual on Orchard Establishment and Management ', 'NAERLS', '', '', 'english', '', 1, NULL, NULL, '0000', 3, '', '2015-06-14', 'STORE'),
(14, 22, 'Agricultural Performance Survey (Kaduna)', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2013', 2, '', '2015-06-03', 'Store'),
(15, 50, 'Millet Production ', 'Naerls', '', '0', 'ajami', '', 1, NULL, NULL, '0000', 4, '', '2015-06-04', 'Store'),
(16, 64, 'Crop Residues As Dry Season Feed For Ruminant Livestock', 'NAERLS', '', '', 'english', '', 6, NULL, NULL, '1987', 3, '', '2015-07-27', 'Small Store'),
(17, 89, 'Annual Report', 'NAERLS', '', '', 'english', '', 0, NULL, NULL, '2008', 2, '', '2015-08-17', 'Shelf 40'),
(18, 57, 'Forage Conservation For Dry Season Feeding Of Livestock', 'NAERLS', '', '0', 'english', '', 6, NULL, NULL, '0000', 3, 'January', '2015-06-02', 'Store'),
(19, 77, 'Agricultural Performance Survey (National Report)', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2012', 2, '', '2015-06-03', 'Store'),
(20, 4, 'Agricultural Performance Survey (National Report)', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2011', 2, '', '2015-06-03', 'Store'),
(21, 44, 'Fish Pond Site Selection And Construction', 'Naerls', '', '0', 'english', '', 4, NULL, NULL, '0000', 3, 'January', '2015-06-03', 'STORE'),
(22, 82, 'Dry Season Supplementary Feeds And Feeding', 'NAERLS', '', '0', 'english', '', 6, NULL, NULL, '0000', 3, 'January', '2015-06-02', 'Store'),
(23, 162, 'Agricultural Performance Survey (National Report)', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2013', 2, '', '2015-06-03', 'Store'),
(24, 40, 'Quarterly Report', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2013', 2, '', '2015-06-03', 'Store'),
(25, 213, 'Techniques of Integrated Fish Farming', 'NAERLS', '', '', 'english', '', 4, NULL, NULL, '2011', 3, '', '2015-07-23', 'STORE'),
(26, 5, 'Annual Report', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '2011', 2, '', '2015-06-03', 'Store'),
(27, 79, 'Quarterly Report', 'NAERLS', '', '', 'english', '', 0, NULL, NULL, '2009', 2, '', '2015-07-16', 'Store'),
(28, 45, 'Economics Of Aquaculture Production', 'NAERLS', '', '0', 'english', '', 4, NULL, NULL, '0000', 3, '', '2015-06-03', 'Store'),
(29, 80, 'NAERLS Newsletter', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '1987', 10, '', '2015-06-03', 'Store'),
(30, 89, 'Garlic Production Under Irrigation', 'S. S. Abubakar, G. B. Murtala, Sani Inusa, M. M. Jaliya', 'NAERLS Mgt.', '205', 'english', 'Garlic (Allium Sativum is an important spice crop belonging to the family of Alliaceae together with onion, shallot and chives. They about 40cm tall when fully grown. The leavees of onion, shallot and', 11, NULL, NULL, '2014', 3, '', '2015-06-02', 'store'),
(31, 14, 'Proceeding Of Designing Training Programmes For Rural Women And Effective Communication Skill Workshop', 'NAERLS', '', '0', 'english', '', 0, NULL, NULL, '0000', 11, '', '2015-06-03', 'Store'),
(32, 36, 'Major Abortion Disease Of Farm Animals And Their Control', 'NAERLS', '', '0', 'english', '', 6, NULL, NULL, '0000', 2, 'January', '2015-06-02', 'Store'),
(33, 64, 'Exclusive Breast Feeding Practices For Nigerian Nursing Mothers', 'NAERLS', '', '0', 'english', '', 12, NULL, NULL, '1999', 3, 'January', '2015-06-02', 'Store'),
(34, 12, 'Estimating Farm Machinery Cost', 'Yiljep, I. D. And M. A. Gwarzo', 'NAERLS', '82', 'English', 'This publication highlight on the costing of farm machinery...', 4, 17, 0, '0000', 3, '', '2017-01-31', 'Store'),
(35, 1, 'Beniseed Production And Utilization In Nigeria', 'J. E. Oyibe, E. B. Tologbonshe And E. O. Ubi', 'NAERLS', '', 'English', 'This bulletin gives a general idea on the production and utilization of beniseed in Nigeria.', 3, NULL, NULL, '0000', 3, '', '2017-02-01', 'Store'),
(36, 1, 'Restraining Techniques In Farm Animals', 'A. I. Annatte', 'NAERLS', '', 'English', 'The publication provides details on the restraining technique in Farm Animals.', 6, NULL, NULL, '2000', 3, 'July', '2017-02-01', 'Store'),
(37, 1, 'Production Of Gum Arabic', 'S. S. Okatahi And J. E. Oyibe', 'NAICPP', '', 'English', 'This publication gives an highlight on the production of Gum Arabic in Nigeria.', 7, NULL, NULL, '0000', 3, '', '2017-02-01', 'Main Store'),
(38, 1, 'Heat Tolerant Tomato Production Under Irrigation', 'M. M. Jaliya, B. M. Sani, A. A. Yakubu & Adamu I. Arab', 'Katsina State & FAO', '', 'English', 'Heat tolerance in tomato is defined as the ability of certain varieties of tomato to set fruits under high temperatures not lower than 210C.', 11, NULL, NULL, '2016', 3, 'January', '2017-02-01', 'Online'),
(39, 1, 'Herd Health Management In Farm Animals', 'A. I. Annatte', 'NAERLS', '', 'English', 'The Bulletin provides an insight to Herd Health Management in Farm Animals.', 6, NULL, NULL, '2000', 3, '', '2017-02-01', 'Online'),
(40, 1, 'Major Diseases And Pests Of Forest Trees And Their Control In Nigeria', 'R. A. Gbadegesin, J. O. Adegbehin And E. B. Tologbonse', 'NAERLS', '178', 'English', 'This bulletin discusses the Major Diseases and Pests of Forest Trees and their Control in Nigeria.', 7, NULL, NULL, '1999', 3, '', '2017-02-02', 'Online'),
(41, 1, 'Production And Utilization Of â€˜Ogbonoâ€™ (Irvingia Gabonensis)', 'Chris Chinaka And J. C. Obiefuna', 'NAERLS', '', 'English', 'This publication covers the Production and Utilization of â€˜Ogbonoâ€™ (Irvingia gabonensis).', 3, NULL, NULL, '1999', 3, '', '2017-02-02', 'Online'),
(42, 1, 'Irrigated Onion Production And Management', 'B. M. Sani, M. M Jaliya And A. A. Yakub', 'Katsina State & FAO', '', 'English', 'Onion (Allium cepa) is a vegetable crop grown almost all over the world. It is grown mainly for its bulb, which is used in every home, almost daily. It is rarely used as a sole dish or in large quanti', 11, NULL, NULL, '2016', 3, 'January', '2017-02-02', 'Online'),
(43, 1, 'Onion Production And Management Under Irrigation', 'B. M. Sani, M. M Jaliya', 'NAERLS', '204', 'English', 'This publication highlights on the production and Management of Onion under Irrigation.', 11, NULL, NULL, '0000', 3, '', '2017-02-02', 'Online'),
(44, 1, 'Irrigated Pepper Production', 'M. M. Jaliya, B. M. Sani, Adamu I. Arab And Adamu Yakubu', 'Katsina State & FAO', '', 'English', 'Peppers are Vegetable crops belonging to the family of Solanaceae and genus Capsicum, which are native to tropical America and Africa. In Nigeria, pepper is mainly grown around the Savanna ecological', 11, NULL, NULL, '2016', 3, 'January', '2017-02-02', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msgID` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
  `replied` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgID`, `sender`, `subject`, `email`, `msg`, `time`, `replied`) VALUES
(1, 'Aliyu Abdul', 'Information and Communication (ICT)', 'snueboy@ymail.com', 'Do you have a copy of "Infotech in Agriculture" by Sam Dyabala', '2015-06-03 00:06:03', 'yes'),
(11, 'Yusra Adam', 'publication', 'yusra2@gmail.com', 'Please do you have hausa publications', '2015-07-24 01:03:03', 'no'),
(12, 'xdgcfhvgj', 'heyy', 'snueboy@gmail.com', 'dfhgjhkjl', '2015-10-02 23:42:35', 'no'),
(13, 'xdgcfhvgj', 'heyy', 'snueboy@gmail.com', 'dfhgjhkjl', '2015-10-02 23:47:15', 'no'),
(14, 'xdgcfhvgj', 'heyy', 'snueboy@gmail.com', 'dfhgjhkjl', '2015-10-02 23:47:25', 'no'),
(15, 'xdgcfhvgj', 'heyy', 'snueboy@gmail.com', 'dfhgjhkjl', '2015-10-02 23:47:32', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pub_media`
--

CREATE TABLE `pub_media` (
  `media_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL,
  `type` enum('image','file') NOT NULL,
  `source` varchar(500) NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pub_media`
--

INSERT INTO `pub_media` (`media_id`, `pub_id`, `type`, `source`, `downloads`) VALUES
(1, 30, 'image', 'Capture2.PNG', 0),
(2, 30, 'file', 'Garlic_production_Bulletin.pdf', 1),
(3, 1, 'image', 'pubimage.png', 0),
(4, 33, 'image', 'pubimage.png', 0),
(7, 2, 'image', 'pubimage.png', 0),
(8, 2, 'file', 'COMPILED_NAERLS_PUBLICATION_LIST_FOR_CLARIFICATION_WITH_DEPARTMENTS.docx', 1),
(9, 3, 'image', 'pubimage.png', 0),
(10, 3, 'file', 'MASTER_LIST_BY_SUBJECT.docx\n', 0),
(11, 4, 'image', 'pubimage.png', 0),
(12, 5, 'image', 'pubimage.png', 0),
(13, 6, 'image', 'pubimage.png', 0),
(14, 7, 'image', 'pubimage.png', 0),
(15, 8, 'image', 'pubimage.png', 0),
(16, 9, 'image', 'pubimage.png', 0),
(17, 10, 'image', 'pubimage.png', 0),
(18, 11, 'image', 'pubimage.png', 0),
(21, 13, 'image', 'pubimage.png', 0),
(22, 14, 'image', 'pubimage.png', 0),
(23, 15, 'image', 'pubimage.png', 0),
(24, 16, 'image', 'pubimage.png', 0),
(25, 17, 'image', 'pubimage.png', 0),
(26, 18, 'image', 'pubimage.png', 0),
(27, 19, 'image', 'pubimage.png', 0),
(28, 20, 'image', 'pubimage.png', 0),
(29, 21, 'image', 'pubimage.png', 0),
(30, 22, 'image', 'pubimage.png', 0),
(31, 23, 'image', 'pubimage.png', 0),
(32, 24, 'image', 'pubimage.png', 0),
(33, 25, 'image', 'pubimage.png', 0),
(34, 26, 'image', 'pubimage.png', 0),
(35, 27, 'image', 'pubimage.png', 0),
(37, 28, 'image', 'pubimage.png', 0),
(38, 29, 'image', 'pubimage.png', 0),
(39, 30, 'image', 'pubimage.png', 0),
(40, 31, 'image', 'pubimage.png', 0),
(41, 32, 'image', 'pubimage.png', 0),
(42, 34, 'image', '14858937361.jpg', 0),
(43, 34, 'file', '14858937361_Estimating_farm_machinery.pdf', 0),
(44, 35, 'image', '14859525342.jpg', 0),
(45, 35, 'file', '14859525342_Beniseed.pdf', 0),
(46, 36, 'image', '14859533233.jpg', 0),
(47, 36, 'file', '14859533233_Farm_Animals.pdf', 0),
(48, 37, 'image', '14859538045.jpg', 0),
(49, 37, 'file', '14859538045_Gum_Arabic.pdf', 0),
(50, 38, 'image', '14859785666.jpg', 0),
(51, 38, 'file', '14859785666_Heat_Tolerant_Tomato.pdf', 0),
(52, 39, 'image', '14859789427.jpg', 0),
(53, 39, 'file', '14859789427_Herds.pdf', 0),
(54, 40, 'image', '148604795510.jpg', 0),
(55, 40, 'file', '148604795510_Major_Diseases.pdf', 0),
(56, 41, 'image', '148604953211.jpg', 0),
(57, 41, 'file', '148604953211_Ogbono.pdf', 0),
(58, 42, 'image', '148605064812.jpg', 0),
(59, 42, 'file', '148605064812_Onion_Irrigation.pdf', 0),
(60, 43, 'image', '148605118613.jpg', 0),
(61, 43, 'file', '148605118613_Onions.pdf', 0),
(62, 44, 'image', '148605452614.jpg', 0),
(63, 44, 'file', '148605452614_Pepper_Irragation.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `reqID` int(11) NOT NULL,
  `userID` varchar(15) NOT NULL,
  `matID` varchar(7) NOT NULL,
  `granted` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `replied` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`reqID`, `userID`, `matID`, `granted`, `date`, `replied`) VALUES
(41, '546j66iyy6', '5', 'yes', '2015-07-20', 'yes'),
(47, '546j66iyy6', '4', 'no', '2015-07-27', 'yes'),
(55, '546j66iyy6', '1', 'no', '2017-01-05', 'no'),
(56, '546j66iyy6', '3', 'yes', '2017-01-05', 'yes'),
(59, '546j66iyy6', '13', 'no', '2017-01-05', 'no'),
(60, '546j66iyy6', '25', 'no', '2017-01-21', 'no'),
(61, '546j66iyy6', '16', 'no', '2017-01-21', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`website`, `email`) VALUES
('http://naerlspublications.org', 'info@naerlpublication.org');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(11) NOT NULL,
  `subjectName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectID`, `subjectName`) VALUES
(1, 'Crop and Forestry Extension'),
(2, 'Livestock and Fisheries Extension'),
(3, 'Food Technology and Home Economics Extension'),
(4, 'Agric. Engineering and Irrigation Extension'),
(5, 'Agric. Extension and Economics\r\n'),
(6, 'Agricultural Media'),
(7, 'Reports'),
(8, 'Seminar Paper');

-- --------------------------------------------------------

--
-- Table structure for table `sub_subjects`
--

CREATE TABLE `sub_subjects` (
  `ssID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `ssName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_subjects`
--

INSERT INTO `sub_subjects` (`ssID`, `subjectID`, `ssName`) VALUES
(1, 2, 'Fisheries'),
(2, 2, 'Animal Production'),
(3, 2, 'Animal Nutrition'),
(4, 2, 'Pasture and Range Management'),
(5, 2, 'Animal Health'),
(6, 2, 'Poultry Production'),
(7, 2, 'Sheep and Goat Production'),
(8, 2, 'Micro-Livestock Production'),
(9, 2, 'Pig Production'),
(10, 3, 'Home Management'),
(11, 3, 'Child Development'),
(12, 3, 'Food and Nutrition'),
(13, 3, 'Clothing and Textile'),
(14, 4, 'Irrigation Agronomy'),
(15, 4, 'Post-Harvest Processing and Storage'),
(16, 4, 'Soil and Water Engineering'),
(17, 4, 'Farm Power and Machinery'),
(18, 4, 'Environmental Science'),
(19, 1, 'Agronomy Extension'),
(20, 1, 'Agroforestry Extension'),
(21, 1, 'Apiary Extension'),
(22, 1, 'Forestry Extension'),
(23, 1, 'Climate Change and Climate Smart Agronomy'),
(24, 1, 'Ornamental Horticulture and Landscape design'),
(25, 1, 'Soil Extension'),
(26, 5, 'Agricultural Extension'),
(27, 5, 'Agricultural Economics'),
(28, 7, 'Annual'),
(29, 7, 'Quarterly'),
(30, 7, 'Research'),
(31, 7, 'Agric. Performance Survey\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_subjects`
--

CREATE TABLE `sub_sub_subjects` (
  `sssID` int(11) NOT NULL,
  `ssID` int(11) NOT NULL,
  `sssName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_sub_subjects`
--

INSERT INTO `sub_sub_subjects` (`sssID`, `ssID`, `sssName`) VALUES
(1, 26, 'Extension Philosophy'),
(2, 26, 'Extension Programme Planning & Administration'),
(3, 26, 'Extension Programme Monitoring & Evaluation'),
(4, 26, 'Extension Systems and Approaches'),
(5, 26, 'Extension Methodology'),
(6, 26, 'Extension Communication'),
(7, 26, 'Extension and Rural Social Systems'),
(8, 26, 'Extension, Gender and Youth'),
(9, 26, 'Market-driven extension'),
(10, 26, 'ICTs in extension'),
(11, 27, 'Agricultural production economics'),
(12, 27, 'Agribusiness management'),
(13, 27, 'Agricultural marketing'),
(14, 27, 'Agricultural Projects Analysis'),
(15, 27, 'Agricultural finance'),
(16, 27, 'Agricultural Value Chains '),
(17, 27, 'Agricultural policy'),
(18, 31, 'National Report'),
(19, 31, 'State Report');

-- --------------------------------------------------------

--
-- Table structure for table `tblcountries`
--

CREATE TABLE `tblcountries` (
  `countryid` int(10) NOT NULL,
  `countryname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcountries`
--

INSERT INTO `tblcountries` (`countryid`, `countryname`) VALUES
(1, 'AFGHANISTAN'),
(2, 'ALBANIA'),
(3, 'ALGERIA'),
(4, 'ANDORRA'),
(5, 'ANGOLA'),
(6, 'ANTARCTICA'),
(7, 'ANTIGUA AND BARMUDA'),
(8, 'ARGENTINA'),
(9, 'ARMENIA'),
(10, 'AUSTRALIA'),
(11, 'AUSTRIA'),
(12, 'AZERBAIJAN'),
(13, 'BAHAMAS'),
(14, 'BAHRAIN'),
(15, 'BANGLADESH'),
(16, 'BARBADOS'),
(17, 'BELARUS'),
(18, 'BELGIUM'),
(19, 'BELIZE'),
(20, 'BENIN REPUBLIC'),
(21, 'BHUTAN'),
(22, 'BOLIVIA'),
(23, 'BOSNIA-HERZEGOVINA'),
(24, 'BOTSWANA'),
(25, 'BRAZIL'),
(26, 'BRUNEI'),
(27, 'BULGARIA'),
(28, 'BURKINA FASSO'),
(29, 'BURMA'),
(30, 'BURUNDI'),
(31, 'CAMBODIA'),
(32, 'CAMEROON'),
(33, 'CANADA'),
(34, 'CAPE VERDE'),
(35, 'CENTRAL AFRICAN REPUBLIC'),
(36, 'CHAD'),
(37, 'CHILE'),
(38, 'CHINA'),
(39, 'COLOMBIA'),
(40, 'COMOROS ISLAND'),
(41, 'CONGO DRC'),
(42, 'COSTA RICA'),
(43, 'CROATIA'),
(44, 'CUBA'),
(45, 'CYPRUS'),
(46, 'CZECH REPUBLIC'),
(47, 'DENMARK'),
(48, 'DJIBOUTI'),
(49, 'DOMINICA'),
(50, 'DOMINICAN REPUBLIC'),
(51, 'ECUADOR'),
(52, 'EGYPT'),
(53, 'EL SALVADOR'),
(54, 'EQUATORIAL GUINEA'),
(55, 'ERITREA'),
(56, 'ESTONIA'),
(57, 'ETHIOPIA'),
(58, 'FIJI'),
(59, 'FINLAND'),
(60, 'FRANCE'),
(61, 'FRENCH GUIANA'),
(62, 'GABON'),
(63, 'GEORGIA'),
(64, 'GERMANY'),
(65, 'GHANA'),
(66, 'GREECE'),
(67, 'GREENLAND'),
(68, 'GRENADA'),
(69, 'GUATEMALA'),
(70, 'GUINEA'),
(71, 'GUINEA BISSAU'),
(72, 'GUYANA'),
(73, 'HAITI'),
(74, 'HAWAII'),
(75, 'HONDURAS'),
(76, 'HUNGARY'),
(77, 'ICELAND'),
(78, 'INDIA'),
(79, 'INDONESIA'),
(80, 'IRAN'),
(81, 'IRAQ'),
(82, 'IRELAND'),
(83, 'ISRAEL'),
(84, 'ITALY'),
(85, 'IVORY COAST'),
(86, 'JAMAICA'),
(87, 'JAPAN'),
(88, 'JORDAN'),
(89, 'KAZAKHSTAN'),
(90, 'KENYA'),
(91, 'KIRIBATI'),
(92, 'KUWAIT'),
(93, 'KYRGIZSTAN'),
(94, 'LAOS'),
(95, 'LATVIA'),
(96, 'LEBANON'),
(97, 'LESOTHO'),
(98, 'LIBERIA'),
(99, 'LIBYA'),
(100, 'LIECHTENSTEIN'),
(101, 'LITHUANIA'),
(102, 'LUXEMBOURG'),
(103, 'MACEDONIA'),
(104, 'MADAGASCAR'),
(105, 'MALAWI'),
(106, 'MALAYSIA'),
(107, 'MALI'),
(108, 'MALTA'),
(109, 'MARSHALL ISLANDS'),
(110, 'MAURITANIA'),
(111, 'MAURITIUS'),
(112, 'MEXICO'),
(113, 'MICRONESIA, F.S.O'),
(114, 'MOLDOVA'),
(115, 'MONGOLIA'),
(116, 'MOROCCO'),
(117, 'MOZAMBIQUE'),
(118, 'NAMIBIA'),
(119, 'NAURU'),
(120, 'NEPAL'),
(121, 'NETHERLANDS'),
(122, 'NEW ZEALAND'),
(123, 'NICARAGUA'),
(124, 'NIGER REPUBLIC'),
(125, 'NIGERIA'),
(126, 'NORTH KOREA'),
(127, 'NORWAY'),
(128, 'OMAN'),
(129, 'PACIFIC ISLANDS'),
(130, 'PAKISTAN'),
(131, 'PALAU'),
(132, 'PALESTINE'),
(133, 'PANAMA'),
(134, 'PAPUA NEW GUINEA'),
(135, 'PARAGUAY'),
(136, 'PERU'),
(137, 'PHILIPPINES'),
(138, 'POLAND'),
(139, 'PORTUGAL'),
(140, 'QATAR'),
(141, 'ROMANIA'),
(142, 'RUSSIA'),
(143, 'RWANDA'),
(144, 'SAO TOME AND PRINCIPE'),
(145, 'SAUDI ARABIA'),
(146, 'SENEGAL'),
(147, 'SEYCHELLES'),
(148, 'SIERRA LEONE'),
(149, 'SLOVAKIA'),
(150, 'SLOVENIA'),
(151, 'SOLOMON ISLANDS'),
(152, 'SOMALIA'),
(153, 'SOUTH AFRICA'),
(154, 'SOUTH KOREA'),
(155, 'SPAIN'),
(156, 'SRI LANKA'),
(157, 'ST KITTS-NEVIS'),
(158, 'ST LUCIA'),
(159, 'ST VINCENT AND THE GRENADINES'),
(160, 'SUDAN'),
(161, 'SURINAME'),
(162, 'SWAZILAND'),
(163, 'SWEDEN'),
(164, 'SWITZERLAND'),
(165, 'SYRIA'),
(166, 'TAIWAN'),
(167, 'TAJIKISTAN'),
(168, 'TANZANIA'),
(169, 'THAILAND'),
(170, 'TOGO'),
(171, 'TONGA'),
(172, 'TRINIDAD AND TOBAGO'),
(173, 'TUNISIA'),
(174, 'TURKEY'),
(175, 'TURKMENISTAN'),
(176, 'TUVALU'),
(177, 'UGANDA'),
(178, 'UKRAINE'),
(179, 'U.A.E.'),
(180, 'UNITED KINGDOM'),
(181, 'U.S.A.'),
(182, 'URUGUAY'),
(183, 'UZBEKISTAN'),
(184, 'VANUATU'),
(185, 'VENEZUELA'),
(186, 'VIETNAM'),
(187, 'WESTERN SAMOA'),
(188, 'YEMEN'),
(189, 'YUGOSLAVIA'),
(190, 'ZAMBIA'),
(191, 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Table structure for table `tbllga`
--

CREATE TABLE `tbllga` (
  `lgaid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `stateid` int(11) NOT NULL DEFAULT '0',
  `lganame` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllga`
--

INSERT INTO `tbllga` (`lgaid`, `stateid`, `lganame`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala-Ngwa North'),
(7, 1, 'Isiala-Ngwa South'),
(8, 1, 'Isikwuato'),
(9, 1, 'Nneochi'),
(10, 1, 'Obi-Ngwa'),
(11, 1, 'Ohafia'),
(12, 1, 'Osisioma'),
(13, 1, 'Ugwunagbo'),
(14, 1, 'Ukwa East'),
(15, 1, 'Ukwa West'),
(16, 1, 'Umuahia North'),
(17, 1, 'Umuahia South'),
(18, 2, 'Demsa'),
(19, 2, 'Fufore'),
(20, 2, 'Genye'),
(21, 2, 'Girei'),
(22, 2, 'Gombi'),
(23, 2, 'guyuk'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Jimeta'),
(27, 2, 'Lamurde'),
(28, 2, 'Madagali'),
(29, 2, 'Maiha'),
(30, 2, 'Mayo Belwa'),
(31, 2, 'Michika'),
(32, 2, 'Mubi North'),
(33, 2, 'Mubi South'),
(34, 2, 'Numan'),
(35, 2, 'Shelleng'),
(36, 2, 'Song'),
(37, 2, 'Toungo'),
(38, 2, 'Yola'),
(39, 3, 'Abak'),
(40, 3, 'Eastern-Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Ekpe-Atani'),
(43, 3, 'Essien-Udim'),
(44, 3, 'Esit Ekit'),
(45, 3, 'Etim-Ekpo'),
(46, 3, 'Etinam'),
(47, 3, 'Ibeno'),
(48, 3, 'Ibesikp-Asitan'),
(49, 3, 'Ibiono-Ibom'),
(50, 3, 'Ika'),
(51, 3, 'Ikono'),
(52, 3, 'Ikot-Abasi'),
(53, 3, 'Ikot-Ekpene'),
(54, 3, 'Ini'),
(55, 3, 'Itu'),
(56, 3, 'Mbo'),
(57, 3, 'Mkpae-Enin'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot-Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oro-Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanefun'),
(67, 3, 'Uru Offong Oruko'),
(68, 3, 'Uruan'),
(69, 3, 'Uquo Ibene'),
(70, 3, 'Uyo'),
(71, 4, 'Aguata'),
(72, 4, 'Anambra'),
(73, 4, 'Anambra West'),
(74, 4, 'Anocha'),
(75, 4, 'Awka- North'),
(76, 4, 'Awka-South'),
(77, 4, 'Ayamelum'),
(78, 4, 'Dunukofia'),
(79, 4, 'Ekwusigo'),
(80, 4, 'Idemili-North'),
(81, 4, 'Idemili-South'),
(82, 4, 'Ihiala'),
(83, 4, 'Njikoka'),
(84, 4, 'Nnewi-North'),
(85, 4, 'Nnewi-South'),
(86, 4, 'Ogbaru'),
(87, 4, 'Onisha North'),
(88, 4, 'Onitsha South'),
(89, 4, 'Orumba North'),
(90, 4, 'Orumba South'),
(91, 4, 'Oyi'),
(92, 5, 'Alkaleri'),
(93, 5, 'Bauchi'),
(94, 5, 'Bogoro'),
(95, 5, 'Damban'),
(96, 5, 'Darazo'),
(97, 5, 'Dass'),
(98, 5, 'Gamawa'),
(99, 5, 'Ganjuwa'),
(100, 5, 'Giade'),
(101, 5, 'Itas/Gadau'),
(102, 5, 'Jama\'are'),
(103, 5, 'Katagum'),
(104, 5, 'Kirfi'),
(105, 5, 'Misau'),
(106, 5, 'Ningi'),
(107, 5, 'Shira'),
(108, 5, 'Tafawa-Balewa'),
(109, 5, 'Toro'),
(110, 5, 'Warji'),
(111, 5, 'Zaki'),
(112, 6, 'Brass'),
(113, 6, 'Ekerernor'),
(114, 6, 'Kolokuma/Opokuma'),
(115, 6, 'Nembe'),
(116, 6, 'Ogbia'),
(117, 6, 'Sagbama'),
(118, 6, 'Southern-Ijaw'),
(119, 6, 'Yenegoa'),
(120, 6, 'Kembe'),
(121, 7, 'Ado'),
(122, 7, 'Agatu'),
(123, 7, 'Apa'),
(124, 7, 'Buruku'),
(125, 7, 'Gboko'),
(126, 7, 'Guma'),
(127, 7, 'Gwer-East'),
(128, 7, 'Gwer-West'),
(129, 7, 'Katsina-Ala'),
(130, 7, 'Konshisha'),
(131, 7, 'Kwande'),
(132, 7, 'Logo'),
(133, 7, 'Makurdi'),
(134, 7, 'Obi'),
(135, 7, 'Ogbadibo'),
(136, 7, 'Ohimini'),
(137, 7, 'Oju'),
(138, 7, 'Okpokwu'),
(139, 7, 'Otukpo'),
(140, 7, 'Tarkar'),
(141, 7, 'Vandeikya'),
(142, 7, 'Ukum'),
(143, 7, 'Ushongo'),
(144, 8, 'Abadan'),
(145, 8, 'Askira-Uba'),
(146, 8, 'Bama'),
(147, 8, 'Bayo'),
(148, 8, 'Biu'),
(149, 8, 'Chibok'),
(150, 8, 'Damboa'),
(151, 8, 'Dikwa'),
(152, 8, 'Gubio'),
(153, 8, 'Guzamala'),
(154, 8, 'Gwoza'),
(155, 8, 'Hawul'),
(156, 8, 'Jere'),
(157, 8, 'Kaga'),
(158, 8, 'Kala/Balge'),
(159, 8, 'Kukawa'),
(160, 8, 'Konduga'),
(161, 8, 'Kwaya-Kusar'),
(162, 8, 'Mafa'),
(163, 8, 'Magumeri'),
(164, 8, 'Maiduguri'),
(165, 8, 'Marte'),
(166, 8, 'Mobbar'),
(167, 8, 'Monguno'),
(168, 8, 'Ngala'),
(169, 8, 'Nganzai'),
(170, 8, 'Shani'),
(171, 9, 'Abi'),
(172, 9, 'Akamkpa'),
(173, 9, 'Akpabuyo'),
(174, 9, 'Bakassi'),
(175, 9, 'Bekwara'),
(176, 9, 'Biasi'),
(177, 9, 'Boki'),
(178, 9, 'Calabar-Municipal'),
(179, 9, 'Calabar-South'),
(180, 9, 'Etunk'),
(181, 9, 'Ikom'),
(182, 9, 'Obantiku'),
(183, 9, 'Ogoja'),
(184, 9, 'Ugep North'),
(185, 9, 'Yakurr'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele'),
(204, 10, 'Udu'),
(205, 10, 'Ughilli North'),
(206, 10, 'Ughilli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri Central'),
(210, 10, 'Warri North'),
(211, 10, 'Warri South'),
(212, 11, 'Abakaliki'),
(213, 11, 'Ofikpo North'),
(214, 11, 'Ofikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaukwu'),
(223, 11, 'Ohaozara'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North East'),
(229, 12, 'Esan South East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako-Central'),
(232, 12, 'Etsako-West'),
(233, 12, 'Igueben'),
(234, 12, 'Ikpoba-Okha'),
(235, 12, 'Oredo'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Ovia North East'),
(238, 12, 'Ovia South West'),
(239, 12, 'owan east'),
(240, 12, 'Owan West'),
(241, 12, 'Umunniwonde'),
(242, 13, 'Ado Ekiti'),
(243, 13, 'Aiyedire'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti-East'),
(246, 13, 'Ekiti-South West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Ido Osi'),
(250, 13, 'Ijero'),
(251, 13, 'Ikere'),
(252, 13, 'Ikole'),
(253, 13, 'Ilejemeta'),
(254, 13, 'Irepodun/Ifelodun'),
(255, 13, 'Ise Orun'),
(256, 13, 'Moba'),
(257, 13, 'Oye'),
(258, 14, 'Aninri'),
(259, 14, 'Awgu'),
(260, 14, 'Enugu East'),
(261, 14, 'Enugu North'),
(262, 14, 'Enugu South'),
(263, 14, 'Ezeagu'),
(264, 14, 'Igbo Etiti'),
(265, 14, 'Igbo Eze North'),
(266, 14, 'Igbo Eze South'),
(267, 14, 'Isi Uzo'),
(268, 14, 'Nkanu East'),
(269, 14, 'Nkanu West'),
(270, 14, 'Nsukka'),
(271, 14, 'Oji-River'),
(272, 14, 'Udenu'),
(273, 14, 'Udi'),
(274, 14, 'Uzo Uwani'),
(275, 15, 'Akko'),
(276, 15, 'Balanga'),
(277, 15, 'Billiri'),
(278, 15, 'Dukku'),
(279, 15, 'Funakaye'),
(280, 15, 'Gombe'),
(281, 15, 'Kaltungo'),
(282, 15, 'Kwami'),
(283, 15, 'Nafada/Bajoga'),
(284, 15, 'Shomgom'),
(285, 15, 'Yamltu/Deba'),
(286, 16, 'Ahiazu-Mbaise'),
(287, 16, 'Ehime-Mbano'),
(288, 16, 'Ezinihtte'),
(289, 16, 'Ideato North'),
(290, 16, 'Ideato South'),
(291, 16, 'Ihitte/Uboma'),
(292, 16, 'Ikeduru'),
(293, 16, 'Isiala-Mbano'),
(294, 16, 'Isu'),
(295, 16, 'Mbaitoli'),
(296, 16, 'Ngor-Okpala'),
(297, 16, 'Njaba'),
(298, 16, 'Nkwerre'),
(299, 16, 'Nwangele'),
(300, 16, 'obowo'),
(301, 16, 'Oguta'),
(302, 16, 'Ohaji-Eggema'),
(303, 16, 'Okigwe'),
(304, 16, 'Onuimo'),
(305, 16, 'Orlu'),
(306, 16, 'Orsu'),
(307, 16, 'Oru East'),
(308, 16, 'Oru West'),
(309, 16, 'Owerri Municipal'),
(310, 16, 'Owerri North'),
(311, 16, 'Owerri West'),
(312, 17, 'Auyu'),
(313, 17, 'Babura'),
(314, 17, 'Birnin Kudu'),
(315, 17, 'Birniwa'),
(316, 17, 'Bosuwa'),
(317, 17, 'Buji'),
(318, 17, 'Dutse'),
(319, 17, 'Gagarawa'),
(320, 17, 'Garki'),
(321, 17, 'Gumel'),
(322, 17, 'Guri'),
(323, 17, 'Gwaram'),
(324, 17, 'Gwiwa'),
(325, 17, 'Hadejia'),
(326, 17, 'Jahun'),
(327, 17, 'Kafin Hausa'),
(328, 17, 'Kaugama'),
(329, 17, 'Kazaure'),
(330, 17, 'Kirikasanuma'),
(331, 17, 'Kiyawa'),
(332, 17, 'Maigatari'),
(333, 17, 'Malam Maduri'),
(334, 17, 'Miga'),
(335, 17, 'Ringim'),
(336, 17, 'Roni'),
(337, 17, 'Sule Tankarkar'),
(338, 17, 'Taura'),
(339, 17, 'Yankwashi'),
(340, 18, 'Birnin-Gwari'),
(341, 18, 'Chikun'),
(342, 18, 'Giwa'),
(343, 18, 'Gwagwada'),
(344, 18, 'Igabi'),
(345, 18, 'Ikara'),
(346, 18, 'Jaba'),
(347, 18, 'Jema\'a'),
(348, 18, 'Kachia'),
(349, 18, 'Kaduna North'),
(350, 18, 'Kagarko'),
(351, 18, 'Kajuru'),
(352, 18, 'Kaura'),
(353, 18, 'Kauru'),
(354, 18, 'Koka/Kawo'),
(355, 18, 'Kubah'),
(356, 18, 'Kudan'),
(357, 18, 'Lere'),
(358, 18, 'Makarfi'),
(359, 18, 'Sabon Gari'),
(360, 18, 'Sanga'),
(361, 18, 'Soba'),
(362, 18, 'Tudun-Wada/Makera'),
(363, 18, 'Zango-Kataf'),
(364, 18, 'Zaria'),
(365, 19, 'Ajingi'),
(366, 19, ' Albasu'),
(367, 19, 'Bagwai'),
(368, 19, 'Bebeji'),
(369, 19, 'Bichi'),
(370, 19, 'Bunkure'),
(371, 19, 'Dala'),
(372, 19, 'Dambatta'),
(373, 19, 'Dawakin Kudu'),
(374, 19, 'Dawakin Tofa'),
(375, 19, 'Doguwa'),
(376, 19, 'Fagge'),
(377, 19, 'Gabasawa'),
(378, 19, 'Garko'),
(379, 19, 'Garun-Mallam'),
(380, 19, 'Gaya'),
(381, 19, 'Gezawa'),
(382, 19, 'Gwale'),
(383, 19, 'Gwarzo'),
(384, 19, 'Kabo'),
(385, 19, 'Kano Municipal'),
(386, 19, 'Karaye'),
(387, 19, 'Kibiya'),
(388, 19, 'Kiru'),
(389, 19, 'Kumbotso'),
(390, 19, 'Kunchi'),
(391, 19, 'Kura'),
(392, 19, 'Madobi'),
(393, 19, 'Makoda'),
(394, 19, 'Minjibir'),
(395, 19, 'Nasarawa'),
(396, 19, 'Rano'),
(397, 19, 'Rimin Gado'),
(398, 19, 'Rogo'),
(399, 19, 'Shanono'),
(400, 19, 'Sumaila'),
(401, 19, 'Takai'),
(402, 19, 'Tarauni'),
(403, 19, 'Tofa'),
(404, 19, 'Tsanyawa'),
(405, 19, 'Tudun Wada'),
(406, 19, 'Ngogo'),
(407, 19, 'Warawa'),
(408, 19, 'Wudil'),
(409, 20, 'Bakori'),
(410, 20, 'Batagarawa'),
(411, 20, 'Batsari'),
(412, 20, 'Baure'),
(413, 20, 'Bindawa'),
(414, 20, 'Charanchi'),
(415, 20, 'Danja'),
(416, 20, 'Danjume'),
(417, 20, 'Dan-Musa'),
(418, 20, 'Daura'),
(419, 20, 'Dutsi'),
(420, 20, 'Dutsinma'),
(421, 20, 'Faskari'),
(422, 20, 'Funtua'),
(423, 20, 'Ingara'),
(424, 20, 'Jibia'),
(425, 20, 'Kafur'),
(426, 20, 'Kaita'),
(427, 20, 'Kankara'),
(428, 20, 'Kankia'),
(429, 20, 'Katsina'),
(430, 20, 'Kurfi'),
(431, 20, 'Kusada'),
(432, 20, 'Mai Adua'),
(433, 20, 'Malumfashi'),
(434, 20, 'Mani'),
(435, 20, 'Mashi'),
(436, 20, 'Matazu'),
(437, 20, 'Musawa'),
(438, 20, 'Rimi'),
(439, 20, 'Sabuwa'),
(440, 20, 'Safana'),
(441, 20, 'Sandamu'),
(442, 20, 'Zango'),
(443, 21, 'Aleira'),
(444, 21, 'Arewa'),
(445, 21, 'Argungu'),
(446, 21, 'Augie'),
(447, 21, 'Bagudo'),
(448, 21, 'Birnin-Kebbi'),
(449, 21, 'Bumza'),
(450, 21, 'Dandi'),
(451, 21, 'Danko'),
(452, 21, 'Fakai'),
(453, 21, 'Gwandu'),
(454, 21, 'Jega'),
(455, 21, 'Kalgo'),
(456, 21, 'Koko-Besse'),
(457, 21, 'Maiyama'),
(458, 21, 'Ngaski'),
(459, 21, 'Sakaba'),
(460, 21, 'Shanga'),
(461, 21, 'Suru'),
(462, 21, 'Wasagu'),
(463, 21, 'Yauri'),
(464, 21, 'Zuru'),
(465, 22, 'Adavi'),
(466, 22, 'Ajaokuta'),
(467, 22, 'Ankpa'),
(468, 22, 'Bassa'),
(469, 22, 'Dekina'),
(470, 22, 'Ibaji'),
(471, 22, 'Idah'),
(472, 22, 'Igalamela'),
(473, 22, 'Ijumu'),
(474, 22, 'Kabba/Bunu'),
(475, 22, 'Kogi'),
(476, 22, 'Lokoja'),
(477, 22, 'Mopa-Muro-Mopi'),
(478, 22, 'Ofu'),
(479, 22, 'Ogori/Magongo'),
(480, 22, 'Okehi'),
(481, 22, 'Okene'),
(482, 22, 'Olamaboro'),
(483, 22, 'Omala'),
(484, 22, 'Oyi'),
(485, 22, 'Yagba-East'),
(486, 22, 'Yagba-West'),
(487, 23, 'Asa'),
(488, 23, 'Baruten'),
(489, 23, 'Edu'),
(490, 23, 'Ekiti'),
(491, 23, 'Ifelodun'),
(492, 23, 'Ilorin East'),
(493, 23, 'Ilorin South'),
(494, 23, 'Ilorin West'),
(495, 23, 'Irepodun'),
(496, 23, 'Isin'),
(497, 23, 'Kaiama'),
(498, 23, 'Moro'),
(499, 23, 'Offa'),
(500, 23, 'Oke-Ero'),
(501, 23, 'Oyun'),
(502, 23, 'Pategi'),
(503, 24, 'Agege'),
(504, 24, 'Ajeromi-Ifelodun'),
(505, 24, 'Alimosho'),
(506, 24, 'Amuwo-Odofin'),
(507, 24, 'Apapa'),
(508, 24, 'Bagagry'),
(509, 24, 'Epe'),
(510, 24, 'Eti-Osa'),
(511, 24, 'Ibeju-Lekki'),
(512, 24, 'Ifako-Ijaiye'),
(513, 24, 'Ikeja'),
(514, 24, 'Ikorodu'),
(515, 24, 'Kosofe'),
(516, 24, 'Lagos-Island'),
(517, 24, 'Lagos-Mainland'),
(518, 24, 'Mushin'),
(519, 24, 'Ojo'),
(520, 24, 'Oshodi-Isolo'),
(521, 24, 'Shomolu'),
(522, 24, 'Suru-Lere'),
(523, 25, 'Akwanga'),
(524, 25, 'Awe'),
(525, 25, 'Doma'),
(526, 25, 'Karu'),
(527, 25, 'Keana'),
(528, 25, 'Keffi'),
(529, 25, 'Kokona'),
(530, 25, 'Lafia'),
(531, 25, 'Nassarawa'),
(532, 25, 'Nassarawa Eggor'),
(533, 25, 'Obi'),
(534, 25, 'Toto'),
(535, 25, 'Wamba'),
(536, 26, 'Agaie'),
(537, 26, 'Agwara'),
(538, 26, 'Bida'),
(539, 26, 'Borgu'),
(540, 26, 'Bosso'),
(541, 26, 'Chanchaga'),
(542, 26, 'Edati'),
(543, 26, 'Gbako'),
(544, 26, 'Gurara'),
(545, 26, 'Katcha'),
(546, 26, 'Kontagora'),
(547, 26, 'Lapai'),
(548, 26, 'Lavum'),
(549, 26, 'Magama'),
(550, 26, 'Mariga'),
(551, 26, 'Mashegu'),
(552, 26, 'Mokwa'),
(553, 26, 'Muya'),
(554, 26, 'Paikoro'),
(555, 26, 'Rafi'),
(556, 26, 'Rajau'),
(557, 26, 'Shiroro'),
(558, 26, 'Suleja'),
(559, 26, 'Tafa'),
(560, 26, 'Wushishi'),
(561, 27, 'Abeokuta -North'),
(562, 27, 'Abeokuta -South'),
(563, 27, 'Ado-Odu/Ota'),
(564, 27, 'Yewa-North'),
(565, 27, 'Yewa-South'),
(566, 27, 'Ewekoro'),
(567, 27, 'Ifo'),
(568, 27, 'Ijebu East'),
(569, 27, 'Ijebu North'),
(570, 27, 'Ijebu North-East'),
(571, 27, 'Ijebu-Ode'),
(572, 27, 'Ikenne'),
(573, 27, 'Imeko-Afon'),
(574, 27, 'Ipokia'),
(575, 27, 'Obafemi -Owode'),
(576, 27, 'Odeda'),
(577, 27, 'Odogbolu'),
(578, 27, 'Ogun-Water Side'),
(579, 27, 'Remo-North'),
(580, 27, 'Shagamu'),
(581, 28, 'Akoko-North-East'),
(582, 28, 'Akoko-North-West'),
(583, 28, 'Akoko-South-West'),
(584, 28, 'Akoko-South-East'),
(585, 28, 'Akure- South'),
(586, 28, 'Akure-North'),
(587, 28, 'Ese-Odo'),
(588, 28, 'Idanre'),
(589, 28, 'Ifedore'),
(590, 28, 'Ilaje'),
(591, 28, 'Ile-Oluji-Okeigbo'),
(592, 28, 'Irele'),
(593, 28, 'Odigbo'),
(594, 28, 'Okitipupa'),
(595, 28, 'Ondo-West'),
(596, 28, 'Ondo East'),
(597, 28, 'Ose'),
(598, 28, 'Owo'),
(599, 29, 'Atakumosa'),
(600, 29, 'Atakumosa East'),
(601, 29, 'Ayeda-Ade'),
(602, 29, 'Ayedire'),
(603, 29, 'Boluwaduro'),
(604, 29, 'Boripe'),
(605, 29, 'Ede'),
(606, 29, 'Ede North'),
(607, 29, 'Egbedore'),
(608, 29, 'Ejigbo'),
(609, 29, 'Ife'),
(610, 29, 'Ife East'),
(611, 29, 'Ife North'),
(612, 29, 'Ife South'),
(613, 29, 'Ifedayo'),
(614, 29, 'Ifelodun'),
(615, 29, 'Ila'),
(616, 29, 'Ilesha'),
(617, 29, 'Ilesha-West'),
(618, 29, 'Irepodun'),
(619, 29, 'Irewole'),
(620, 29, 'Isokun'),
(621, 29, 'Iwo'),
(622, 29, 'Obokun'),
(623, 29, 'Odo-Otin'),
(624, 29, 'Ola Oluwa'),
(625, 29, 'Olorunda'),
(626, 29, 'Ori-Ade'),
(627, 29, 'Orolu'),
(628, 29, 'Osogbo'),
(629, 30, 'Afijio'),
(630, 30, 'Akinyele'),
(631, 30, 'Atiba'),
(632, 30, 'Atisbo'),
(633, 30, 'Egbeda'),
(634, 30, 'Ibadan-Central'),
(635, 30, 'Ibadan-North-East'),
(636, 30, 'Ibadan-North-West'),
(637, 30, 'Ibadan-South-East'),
(638, 30, 'Ibadan-South West'),
(639, 30, 'Ibarapa-Central'),
(640, 30, 'Ibarapa-East'),
(641, 30, 'Ibarapa-North'),
(642, 30, 'Ido'),
(643, 30, 'Ifedayo'),
(644, 30, 'Ifeloju'),
(645, 30, 'Irepo'),
(646, 30, 'Iseyin'),
(647, 30, 'Itesiwaju'),
(648, 30, 'Iwajowa'),
(649, 30, 'Kajola'),
(650, 30, 'Lagelu'),
(651, 30, 'Odo-Oluwa'),
(652, 30, 'Ogbomoso-North'),
(653, 30, 'Ogbomosho-South'),
(654, 30, 'Olorunsogo'),
(655, 30, 'Oluyole'),
(656, 30, 'Ona-Ara'),
(657, 30, 'Orelope'),
(658, 30, 'Ori-Ire'),
(659, 30, 'Oyo East'),
(660, 30, 'Oyo West'),
(661, 30, 'saki east'),
(662, 30, 'Saki West'),
(663, 30, 'Surulere'),
(664, 31, 'Barkin Ladi'),
(665, 31, 'Bassa'),
(666, 31, 'Bokkos'),
(667, 31, 'Jos-East'),
(668, 31, 'Jos-South'),
(669, 31, 'Jos-North'),
(670, 31, 'Kanam'),
(671, 31, 'Kanke'),
(672, 31, 'Langtang North'),
(673, 31, 'Langtang South'),
(674, 31, 'Mangu'),
(675, 31, 'Mikang'),
(676, 31, 'Pankshin'),
(677, 31, 'Quan\'pan'),
(678, 31, 'Riyom'),
(679, 31, 'Shendam'),
(680, 31, 'Wase'),
(681, 32, 'Abua/Odual'),
(682, 32, 'Ahoada East'),
(683, 32, 'Ahoada West'),
(684, 32, 'Akukutoru'),
(685, 32, 'Andoni'),
(686, 32, 'Asari-Toro'),
(687, 32, 'Bonny'),
(688, 32, 'Degema'),
(689, 32, 'Eleme'),
(690, 32, 'Emuoha'),
(691, 32, 'Etche'),
(692, 32, 'Gokana'),
(693, 32, 'Ikwerre'),
(694, 32, 'Khana'),
(695, 32, 'Obio/Akpor'),
(696, 32, 'Ogba/Egbama/Ndoni'),
(697, 32, 'Ogu/Bolo'),
(698, 32, 'Okrika'),
(699, 32, 'Omuma'),
(700, 32, 'Opobo/Nkoro'),
(701, 32, 'Oyigbo'),
(702, 32, 'Port-Harcourt'),
(703, 32, 'Tai'),
(704, 33, 'Binji'),
(705, 33, 'Bodinga'),
(706, 33, 'Dange-Shuni'),
(707, 33, 'Gada'),
(708, 33, 'Goronyo'),
(709, 33, 'Gudu'),
(710, 33, 'Gwadabawa'),
(711, 33, 'Illela'),
(712, 33, 'Isa'),
(713, 33, 'Kebbe'),
(714, 33, 'Kware'),
(715, 33, 'Raba'),
(716, 33, 'Sabon-Birni'),
(717, 33, 'Shagari'),
(718, 33, 'Silame'),
(719, 33, 'Sokoto North'),
(720, 33, 'Sokoto South'),
(721, 33, 'Tambuwal'),
(722, 33, 'Tanzaga'),
(723, 33, 'Tureta'),
(724, 33, 'Wamakko'),
(725, 33, 'Wurno'),
(726, 33, 'Yabo'),
(727, 34, 'Ardo Kola'),
(728, 34, 'Bali'),
(729, 34, 'Donga'),
(730, 34, 'Gashaka'),
(731, 34, 'Gassol'),
(732, 34, 'Ibi'),
(733, 34, 'Jalingo'),
(734, 34, 'Karim-Lamido'),
(735, 34, 'Kurmi'),
(736, 34, 'Lau'),
(737, 34, 'Sardauna'),
(738, 34, 'Takuni'),
(739, 34, 'Ussa'),
(740, 34, 'Wukari'),
(741, 34, 'Yarro'),
(742, 34, 'Zing'),
(743, 35, 'Bade'),
(744, 35, 'Bursali'),
(745, 35, 'Damaturu'),
(746, 35, 'Fuka'),
(747, 35, 'Fune'),
(748, 35, 'Geidam'),
(749, 35, 'Gogaram'),
(750, 35, 'Gujba'),
(751, 35, 'Gulani'),
(752, 35, 'Jakusko'),
(753, 35, 'Karasuwa'),
(754, 35, 'Machina'),
(755, 35, 'Nangere'),
(756, 35, 'Nguru'),
(757, 35, 'Potiskum'),
(758, 35, 'Tarmua'),
(759, 35, 'Yunisari'),
(760, 35, 'Yusufari'),
(761, 36, 'Anka'),
(762, 36, 'Bakure'),
(763, 36, 'Bukkuyum'),
(764, 36, 'Bungudo'),
(765, 36, 'Gumi'),
(766, 36, 'Gusau'),
(767, 36, 'Isa'),
(768, 36, 'Kaura-Namoda'),
(769, 36, 'Kiyawa'),
(770, 36, 'Maradun'),
(771, 36, 'Marau'),
(772, 36, 'Shinkafa'),
(773, 36, 'Talata-Mafara'),
(774, 36, 'Tsafe'),
(775, 36, 'Zurmi'),
(776, 9, 'Obudu'),
(777, 37, 'Abaji'),
(778, 37, 'Bwari'),
(779, 37, 'Gwagwalada'),
(780, 37, 'Kuje'),
(781, 37, 'Kwali'),
(782, 37, 'Municipal'),
(783, 12, 'Etsako-East'),
(784, 16, 'Ahiazu-Mbaise'),
(785, 38, 'Foreign'),
(786, 18, 'Kaduna South'),
(787, 16, 'Aboh-Mbaise'),
(788, 9, 'Odukpani');

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `stateid` int(11) NOT NULL DEFAULT '0',
  `statename` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`stateid`, `statename`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'Gombe'),
(16, 'Imo'),
(17, 'Jigawa'),
(18, 'Kaduna'),
(19, 'Kano'),
(20, 'Katsina'),
(21, 'Kebbi'),
(22, 'Kogi'),
(23, 'Kwara'),
(24, 'Lagos'),
(25, 'Nasarawa'),
(26, 'Niger'),
(27, 'Ogun'),
(28, 'Ondo'),
(29, 'Osun'),
(30, 'Oyo'),
(31, 'Plateau'),
(32, 'Rivers'),
(33, 'Sokoto'),
(34, 'Taraba'),
(35, 'Yobe'),
(36, 'Zamfara'),
(37, 'FCT'),
(38, 'Non-Nigerian');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitid` int(10) NOT NULL,
  `unitname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitid`, `unitname`) VALUES
(1, 'Adopted Villages and Outreach'),
(2, 'Internal Audit'),
(3, 'Due Process/Procurement'),
(4, 'Farm Broadcast'),
(5, 'Information and Communication (ICT)'),
(6, 'Information Resource Centre'),
(7, 'Works and Maintenance'),
(8, 'Planning, Monitoring and Evaluation'),
(9, 'Printing Press'),
(10, 'Public Relations, Protocol and Advancement'),
(11, 'Skill Acquisation and Development'),
(12, 'Store'),
(13, 'Security'),
(14, 'Transport and Transportation'),
(15, 'Website and Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `usertype` enum('general','admin') NOT NULL DEFAULT 'general',
  `type` varchar(10) NOT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `nationality` int(3) NOT NULL DEFAULT '125',
  `state` int(3) NOT NULL,
  `lga` int(3) NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `lastSeen` datetime DEFAULT NULL,
  `suspended` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `password`, `fullName`, `title`, `usertype`, `type`, `occupation`, `nationality`, `state`, `lga`, `organization`, `purpose`, `lastSeen`, `suspended`) VALUES
('2j2t76t8kt', 'Salson@gmail.com', '', 'admin', 'Salisu Bawa', '', 'admin', 'sub', '', 125, 3, 1, '', '', '2015-05-18 23:49:38', 0),
('2jvy76t8gj', 'jbenson@gmail.com', '', 'admin', 'Jimmy Benson', '', 'admin', 'main', '', 125, 12, 3, '', '', '2015-07-27 15:26:58', 0),
('2xq3ejb6m0', 'Dave2004@drfgmail.com', '08057497122', '123456', 'David Haruna', 'Mr.', 'general', '', 'Businessman', 125, 10, 5, 'Self employed', 'Business', '2017-01-12 23:23:20', 1),
('546j66iyy6', 'jafargarba@gmail.com', '09037681252', 'garba12', 'jafar garba', 'Mr.', 'general', '', 'Technologist', 125, 4, 12, 'Nigerian Institute for Trypanosomiasis Research', 'Research', '2017-01-16 06:15:32', 1),
('cef576iht6', 'Ameenu', '', 'Ummah', 'Aminu Umar', '', 'admin', 'super', '', 125, 20, 13, '', '', '2016-12-10 10:51:29', 0),
('cyuid5k428', 'Amisco4live88@yahoo.com', NULL, 'admin', 'Aminu Jimoh', NULL, 'admin', 'sub', NULL, 125, 9, 7, NULL, NULL, NULL, 0),
('jbwapts16l', 'snueboy@gmail.com', '08036142840', '67560113', 'Aliyu Abdul', 'Mr.', 'general', '', 'Farmer', 125, 9, 9, 'Altech', 'Research', '2017-01-08 08:23:40', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`actID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `manual_request`
--
ALTER TABLE `manual_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`matID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `pub_media`
--
ALTER TABLE `pub_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`reqID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `sub_subjects`
--
ALTER TABLE `sub_subjects`
  ADD PRIMARY KEY (`ssID`);

--
-- Indexes for table `sub_sub_subjects`
--
ALTER TABLE `sub_sub_subjects`
  ADD PRIMARY KEY (`sssID`);

--
-- Indexes for table `tblcountries`
--
ALTER TABLE `tblcountries`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `tbllga`
--
ALTER TABLE `tbllga`
  ADD PRIMARY KEY (`lgaid`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `manual_request`
--
ALTER TABLE `manual_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `matID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pub_media`
--
ALTER TABLE `pub_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `reqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sub_subjects`
--
ALTER TABLE `sub_subjects`
  MODIFY `ssID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sub_sub_subjects`
--
ALTER TABLE `sub_sub_subjects`
  MODIFY `sssID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tblcountries`
--
ALTER TABLE `tblcountries`
  MODIFY `countryid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unitid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
