-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: dbs1.cwsbxjeoomse.ap-south-1.rds.amazonaws.com
-- Generation Time: Aug 08, 2019 at 09:41 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paraclg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `access_website_basic` tinyint(1) NOT NULL DEFAULT '0',
  `access_circulars` tinyint(1) NOT NULL DEFAULT '0',
  `access_admissions` tinyint(1) NOT NULL DEFAULT '0',
  `access_results` tinyint(1) NOT NULL DEFAULT '0',
  `access_admin_creation` tinyint(1) NOT NULL DEFAULT '0',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `username`, `password`, `email`, `created_by`, `deletable`, `access_website_basic`, `access_circulars`, `access_admissions`, `access_results`, `access_admin_creation`, `last_update`) VALUES
(1, 'Default', 'Admin', 'superadmin', 'b0301b9faf4d5909f4f3eeddaf91acc2', 'email@example.com', 'AppDeveloper', 0, 1, 1, 1, 1, 1, '2019-07-31 14:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(256) NOT NULL,
  `created_by` varchar(256) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifs_circus_downlds`
--

CREATE TABLE `notifs_circus_downlds` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `link` varchar(256) NOT NULL,
  `flag` varchar(5) NOT NULL DEFAULT 'new',
  `last_edited_by` varchar(30) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `result_url` varchar(256) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_basic_info`
--

CREATE TABLE `website_basic_info` (
  `id` int(11) NOT NULL,
  `about_para_1` text NOT NULL,
  `about_para_2` text NOT NULL,
  `address_line_1` varchar(256) NOT NULL,
  `address_line_2` varchar(256) NOT NULL,
  `address_line_3` varchar(256) NOT NULL,
  `college_contact_no_1` varchar(20) NOT NULL,
  `college_contact_no_2` varchar(20) NOT NULL,
  `college_email` varchar(256) NOT NULL,
  `ss_img_1_url` varchar(256) NOT NULL,
  `ss_img_1_title` varchar(25) NOT NULL,
  `ss_img_1_info` text NOT NULL,
  `ss_img_2_url` varchar(256) NOT NULL,
  `ss_img_2_title` varchar(25) NOT NULL,
  `ss_img_2_info` text NOT NULL,
  `ss_img_3_url` varchar(256) NOT NULL,
  `ss_img_3_title` varchar(25) NOT NULL,
  `ss_img_3_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_basic_info`
--

INSERT INTO `website_basic_info` (`id`, `about_para_1`, `about_para_2`, `address_line_1`, `address_line_2`, `address_line_3`, `college_contact_no_1`, `college_contact_no_2`, `college_email`, `ss_img_1_url`, `ss_img_1_title`, `ss_img_1_info`, `ss_img_2_url`, `ss_img_2_title`, `ss_img_2_info`, `ss_img_3_url`, `ss_img_3_title`, `ss_img_3_info`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Shivneri Building, Akola Naka,', 'Washim, Dist Washim - 444505', 'Washim Maharashtra', '1234567890', '', 'clgemail@example.com', 'https://via.placeholder.com/2000x1020?text=Slide1', 'Some Title', 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, ege', 'https://via.placeholder.com/2000x1020?text=Slide2', 'Some Title', 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.', 'https://via.placeholder.com/2000x1020?text=Slide3', 'Some TItle', 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username_unq` (`username`),
  ADD UNIQUE KEY `email_unq` (`email`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD UNIQUE KEY `exam_name` (`exam_name`);

--
-- Indexes for table `notifs_circus_downlds`
--
ALTER TABLE `notifs_circus_downlds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_basic_info`
--
ALTER TABLE `website_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifs_circus_downlds`
--
ALTER TABLE `notifs_circus_downlds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_basic_info`
--
ALTER TABLE `website_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
