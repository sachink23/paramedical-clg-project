-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: dbs1.cwsbxjeoomse.ap-south-1.rds.amazonaws.com
-- Generation Time: Aug 20, 2019 at 08:44 PM
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
  `admin_state` tinyint(1) NOT NULL DEFAULT '1',
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `access_website_basic` tinyint(1) NOT NULL DEFAULT '0',
  `access_circulars` tinyint(1) NOT NULL DEFAULT '0',
  `access_admissions` tinyint(1) NOT NULL DEFAULT '0',
  `access_results` tinyint(1) NOT NULL DEFAULT '0',
  `access_courses` tinyint(1) NOT NULL DEFAULT '0',
  `access_admin_creation` tinyint(1) NOT NULL DEFAULT '0',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_state`, `first_name`, `last_name`, `username`, `password`, `email`, `created_by`, `access_website_basic`, `access_circulars`, `access_admissions`, `access_results`, `access_courses`, `access_admin_creation`, `last_update`) VALUES
(1, 1, 'Default', 'Admin', 'superadmin', 'b0301b9faf4d5909f4f3eeddaf91acc2', 'sachin@gmail.com', 'superadmin', 1, 1, 1, 1, 1, 1, '2019-08-17 17:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `application_date` varchar(10) NOT NULL,
  `institute_details` varchar(256) NOT NULL,
  `candidate_name` varchar(128) NOT NULL,
  `father_name` varchar(128) NOT NULL,
  `mother_name` varchar(128) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `edu_qual` varchar(50) NOT NULL,
  `perm_add` varchar(256) NOT NULL,
  `local_add` varchar(256) NOT NULL,
  `father_occupation` varchar(50) NOT NULL,
  `mother_occupation` varchar(50) NOT NULL,
  `mob_1` varchar(10) NOT NULL,
  `mob_2` varchar(10) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `ssc` tinyint(1) NOT NULL,
  `ssc_passed_status` tinyint(1) NOT NULL DEFAULT '0',
  `ssc_year` varchar(7) NOT NULL,
  `ssc_school` varchar(100) NOT NULL,
  `ssc_board` varchar(100) NOT NULL,
  `ssc_per` float UNSIGNED NOT NULL,
  `ssc_div` varchar(50) NOT NULL,
  `hsc` tinyint(1) NOT NULL DEFAULT '0',
  `hsc_passed_status` tinyint(1) NOT NULL,
  `hsc_year` varchar(7) NOT NULL,
  `hsc_college` varchar(100) NOT NULL,
  `hsc_board` varchar(100) NOT NULL,
  `hsc_per` float UNSIGNED NOT NULL,
  `hsc_div` varchar(50) NOT NULL,
  `grad` tinyint(1) NOT NULL DEFAULT '0',
  `grad_passed_status` tinyint(1) NOT NULL,
  `grad_year` varchar(7) NOT NULL,
  `grad_college` varchar(100) NOT NULL,
  `grad_uni` varchar(100) NOT NULL,
  `grad_per` float UNSIGNED NOT NULL,
  `grad_div` varchar(50) NOT NULL,
  `other` tinyint(1) NOT NULL DEFAULT '0',
  `other_course_name` varchar(100) NOT NULL,
  `other_pass_status` tinyint(1) NOT NULL,
  `other_year` varchar(7) NOT NULL,
  `other_college` varchar(100) NOT NULL,
  `other_uni` varchar(100) NOT NULL,
  `other_per` float UNSIGNED NOT NULL,
  `other_div` varchar(50) NOT NULL,
  `photo_url` varchar(256) NOT NULL,
  `creation_ip` varchar(50) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `accepted_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(128) NOT NULL,
  `eligibility` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `exam_fees` float NOT NULL,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Shivneri Building, Akola Naka,', 'Washim, Dist Washim - 444505', 'Washim Maharashtra', '9423639355', '', 'dr.madhavhivale2568@gmail.com', 'https://via.placeholder.com/2000x1020?text=Slide1', 'Some Title', 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, ege', 'https://via.placeholder.com/2000x1020?text=Slide2', 'Some Title', 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.', 'https://via.placeholder.com/2000x1020?text=Slide3', 'Some TItle', 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.');

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
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifs_circus_downlds`
--
ALTER TABLE `notifs_circus_downlds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_basic_info`
--
ALTER TABLE `website_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
