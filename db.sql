-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: dbs1.cwsbxjeoomse.ap-south-1.rds.amazonaws.com
-- Generation Time: Aug 24, 2019 at 08:55 PM
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
(1, 1, 'Default', 'Admin', 'superadmin', 'b0301b9faf4d5909f4f3eeddaf91acc2', 'example@example.com', 'superadmin', 1, 1, 1, 1, 1, 1, '2019-08-21 04:33:00');

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

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `eligibility`, `duration`, `exam_fees`, `last_update`, `last_edited_by`) VALUES
(4, 'BAMS AM', 'HSC', '36', 5000, '2019-08-23 12:20:14', 'superadmin'),
(5, 'BEMS EH', 'HSC', '36', 5000, '2019-08-23 12:20:31', 'superadmin'),
(6, 'BNYS', 'HSC', '36', 5000, '2019-08-23 12:20:42', 'superadmin'),
(8, 'DAMS AM', 'HSC', '36', 5000, '2019-08-23 12:21:15', 'superadmin'),
(9, 'M.D.A.M.', 'ANY DR.DEGREE,', '18', 10000, '2019-08-23 12:46:55', 'superadmin'),
(10, 'M.D.E.H.', 'ANY DR.DEGREE,', '18', 10000, '2019-08-23 12:47:32', 'superadmin'),
(11, 'M.D.NATUROPATHY', 'ANY DR.DEGREE,', '18', 10000, '2019-08-23 12:47:57', 'superadmin'),
(12, 'D.E.H.M,', 'SSC', '18', 5000, '2019-08-23 12:48:49', 'superadmin'),
(13, 'D.N.Y.S,', 'SSC', '24', 5000, '2019-08-23 12:49:20', 'superadmin'),
(14, 'D.B.M.S,', 'SSC', '24', 5000, '2019-08-23 12:49:42', 'superadmin'),
(15, 'D.S.I,', 'HSC', '24', 5000, '2019-08-23 12:51:47', 'superadmin'),
(16, 'C.M.S&amp;E.D.,', 'HSC', '18', 10000, '2019-08-23 12:52:27', 'superadmin'),
(17, 'D.M.L.T,', 'HSC', '18', 5000, '2019-08-23 12:54:04', 'superadmin'),
(18, 'P.G.D.M.L.T.,', 'HSC', '24', 10000, '2019-08-23 12:55:43', 'superadmin'),
(19, 'C.M.L.T.,', 'HSC', '18', 5000, '2019-08-23 12:56:34', 'superadmin'),
(20, 'D.X.R.T,', 'HSC', '18', 5000, '2019-08-23 12:57:52', 'superadmin'),
(21, 'D.E.C.G,', 'HSC', '18', 5000, '2019-08-23 12:58:13', 'superadmin'),
(22, 'P.M.W.', 'HSC', '18', 5000, '2019-08-23 12:58:35', 'superadmin'),
(23, 'D.Asc.', 'HSC', '18', 5000, '2019-08-23 13:00:47', 'superadmin'),
(24, 'D.Ysc.', 'HSC', '18', 5000, '2019-08-23 13:00:59', 'superadmin'),
(26, 'D.G.O.A.M.', 'ANY DR.DEGREE', '18', 5000, '2019-08-23 13:05:53', 'superadmin'),
(27, 'D.C.H.A.M.', 'ANY DR.DEGREE', '18', 5000, '2019-08-23 13:06:08', 'superadmin'),
(29, 'D.V.D. A.M.', 'ANY DR.DEGREE', '18', 5000, '2019-08-23 13:07:44', 'superadmin');

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

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `created_by`, `last_update`) VALUES
(1, '2013', 'superadmin', '2019-08-23 12:22:59'),
(2, '2014', 'superadmin', '2019-08-23 12:23:08'),
(3, '2015', 'superadmin', '2019-08-23 12:23:15'),
(4, '2016', 'superadmin', '2019-08-23 12:23:21'),
(5, '2017', 'superadmin', '2019-08-23 12:23:26'),
(6, '2018', 'superadmin', '2019-08-23 12:23:31'),
(7, '2019', 'superadmin', '2019-08-23 12:23:38');

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

--
-- Dumping data for table `notifs_circus_downlds`
--

INSERT INTO `notifs_circus_downlds` (`id`, `text`, `type`, `link`, `flag`, `last_edited_by`, `last_update`) VALUES
(1, 'Registration Certificate', 'L', '/assets/uploads/24-08-2019-353103-A.jpg', 'new', 'superadmin', '2019-08-24 11:36:52');

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
(1, 'AN ISO CERTIFIED EDUCATION BOARD\nARYAWART PARA MEDICAL EDUCATION, VOCATIONAL  &amp; SELF EMPLOYMENT EDUCATION BOARD\nAll Courses will be Registerd Under Self -Employment Exchange Deparnment Goverment of Maharashtra \nAryawart Para medical Education,Vocational &amp; Self Employment Education Board was Legally established under the guidance of Jurist,Eminent educationists &amp; Social workers for the Development of education in wide areas.Government of Maharashtra registered the board for propagation &amp; devolopment of vocational &amp; Self Employment Education. Traing Registered under Employment &amp; self Employment  self Employment Exchange Govt.of Maharashtra (Vide No.RSRUS/VMN/ K6/3111-12-2011.) The Board under Govt of India act XXI of 1860 is legal Autonomous &amp; Voluntary Institutaion and has legal right of teaching &amp; Training under the provisions of constitution copies of bylaw prospects etc are sent to the various authorities and Departments of the Govt of India,Govt. of Maharashtra &amp; Union Territories by the board from time to time. APVSEEB is an Autonomous body conducting various education Programmes to inspire youth to take to self-Employment in thir chosen  profession. The idelogy at APVSEEB is to create quality man power and instill in them a feeling of self Esteem to be able to complete in the progressive Markets and achive success APVSEEB is engaged in offering certification in various vocational, paramedical,Alternative,Vetarnary, Computer field.   Above said board is a division regulity and governed.The Norms and Objects of APVSEEB is a registered organization under SR Act XXI of 1860 ( Working under act XXI of 1854,17,18,Vict-C-112,S,20,et.seq.) Literary and sintific institution Act with the head office at Washim (Maharashtra) is Generally Colled Central board being central office to supervise the affiliated  Instititution/ colleges all Maharashtra and India bases.                        All Diplomas / certificates are awarded Autonomously by The Board for Effective Health services now there is need that Entire Programme should be at National Level to be Reviewed to move with new Medical Development. The  respolsibilities of community in Health have more importance which should have trained Health specialist along with  workers and techonologists and should be well Equipped to give specified remedies for day today illness. so to achieve  this purpose APVSEEB of Maharashtra has Founded. We have to infrom that Our Institutions stands in therefore front of  similar Institute in Maharashrta and India as on our Quality Knowledge &amp; Training as well as Students in Medical Paramedical Vocational education.                           \n', '                           \nAll Courses will be Registerd Under Self -Employment Exchange Deparnment Goverment of Maharashtra ', 'Shivneri Building, Akola Naka,', 'Washim, Dist Washim - 444505', 'Washim Maharashtra', '9423639355', '', 'aryawrateducation@reddiffmail.com', '/assets/img/slides/1.jpg', 'Paramedical Board', '<big>Aryawart para medical education, vocational & self employment education, board<br/>Best Board of Maharashtra</big>', '/assets/img/slides/2.jpg', 'ISO Certified Board', '', '/assets/img/slides/3.jpg', 'Paramedical Courses', 'Get to know to our paramedical courses.');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifs_circus_downlds`
--
ALTER TABLE `notifs_circus_downlds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
