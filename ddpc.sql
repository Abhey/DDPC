-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2017 at 03:01 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ddpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `awarddistribution`
--

CREATE TABLE IF NOT EXISTS `awarddistribution` (
  `sem_no` int(2) NOT NULL,
  `credits_through` varchar(100) NOT NULL,
  `max_credits` int(2) NOT NULL,
  PRIMARY KEY (`sem_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awarddistribution`
--

INSERT INTO `awarddistribution` (`sem_no`, `credits_through`, `max_credits`) VALUES
(1, 'Course Work/Research Seminar/Mini Project/Thesis Performance', 20),
(2, 'Course Work/Research Seminar/Mini Project/Comprehensive/State of the Art/Thesis Performance', 20),
(3, 'Course Work/Research Seminar/Mini Project/Comprehensive/State of the Art/Thesis Performance', 20),
(4, 'State of the Art/Thesis Performance', 20),
(5, 'Thesis Performance', 20),
(6, 'Thesis Performance', 20);

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `dept_id` varchar(10) NOT NULL,
  `committee_id` varchar(10) NOT NULL,
  `committee_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`,`committee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`dept_id`, `committee_id`, `committee_name`) VALUES
('4 ', '1', 'DDPC');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_coordinator` varchar(10) NOT NULL,
  `course_instructor` varchar(10) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` varchar(7) NOT NULL,
  PRIMARY KEY (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `dept_id`, `course_name`, `course_coordinator`, `course_instructor`, `sem_type`, `academic_year`) VALUES
('CS2201', '4 ', 'Advanced Computer Architecture', '', '', '0', '2016-17'),
('CS2202', '4 ', 'Cloud Computing', '', '', '0', '2016-17'),
('CS2203', '4 ', 'Secure E-Commerce', '', '', '0', '2016-17'),
('CS2211', '4 ', 'Advanced Algorithm', 'sagarwal', 'sagarwal', '0', '2016-17'),
('CS2213', '4 ', 'Fault Tolerant Syatems', 'rsyadav', 'rsyadav', '0', '2016-17'),
('CS2214', '4 ', 'Semantic Web', '', '', '0', '2016-17'),
('CS2215', '4 ', 'Formal Methods', 'dkyadav', 'dkyadav', '0', '2016-17'),
('CS2218', '4 ', 'Wireless and Mobile Networks', 'ntyagi', 'ntyagi', '0', '2016-17'),
('CS2223', '4 ', 'Advanced Software Engineering', 'anojkumar', 'anojkumar', '0', '2016-17'),
('CS2224', '4 ', 'Forensics and Cyber Crime', '', '', '0', '2016-17'),
('CS6011', '4 ', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6015', '4 ', 'Research Seminar', '', '', '0', '2016-17'),
('CS6016', '4 ', 'Mini Project', '', '', '0', '2016-17'),
('CS6021', '4 ', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6022', '4 ', 'Comprehensive', '', '', '0', '2016-17'),
('CS6023', '4 ', 'State of the Art', '', '', '0', '2016-17'),
('CS6025', '4 ', 'Research Seminar', '', '', '0', '2016-17'),
('CS6026', '4 ', 'Mini Project', '', '', '0', '2016-17'),
('CS6031', '4 ', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6032', '4 ', 'Comprehensive', '', '', '0', '2016-17'),
('CS6033', '4 ', 'State of the Art', '', '', '0', '2016-17'),
('CS6035', '4 ', 'Research Seminar', '', '', '0', '2016-17'),
('CS6036', '4 ', 'Mini Project', '', '', '0', '2016-17'),
('CS6041', '4 ', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6042', '4 ', 'Comprehensive', '', '', '0', '2016-17'),
('CS6043', '4 ', 'State of the Art', '', '', '0', '2016-17'),
('CS6051', '4 ', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6053', '4 ', 'State of the Art', '', '', '0', '2016-17'),
('CS6061', '4 ', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6071', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6081', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6091', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6101', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6111', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6121', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6131', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6141', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6151', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6161', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6171', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6181', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6191', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('CS6201', '4', 'Thesis Performance', '', '', '0', '2016-17'),
('EC2212', '5 ', 'Image Processing and Pattern Recognition', 'vsrvastava', 'vsrvastava', '0', '2016-17');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE IF NOT EXISTS `courseregistration` (
  `reg_no` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `credits_enrolled` decimal(3,0) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_type` tinyint(1) NOT NULL,
  `academic_year` varchar(7) NOT NULL DEFAULT '0',
  `progress` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `student_selected_coordinator` varchar(50) DEFAULT NULL,
  `dropcourse` tinyint(1) NOT NULL DEFAULT '0',
  `reason` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`reg_no`,`course_id`,`sem_type`,`academic_year`),
  KEY `course_id` (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseregistration`
--

INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`, `student_selected_coordinator`, `dropcourse`, `reason`) VALUES
('2008RCS05', 'CS6151', 8, 15, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2008RCS08', 'CS6181', 8, 18, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2009RCS57', 'CS6151', 8, 15, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2010RCS03', 'CS6141', 8, 14, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2010RCS06', 'CS6141', 8, 14, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2012RCS03', 'CS6101', 16, 10, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2012RCS04', 'CS6101', 16, 10, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2012RCS53', 'CS6091', 8, 8, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2012RCS54', 'CS6091', 8, 8, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2012RCS58', 'CS6091', 12, 9, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2013RCS02', 'CS6081', 20, 8, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2013RCS03', 'CS6081', 16, 8, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2013RCS07', 'CS6081', 8, 8, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2013RCS51', 'CS6071', 16, 7, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS01', 'CS6061', 16, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS02', 'CS6061', 12, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS03', 'CS6061', 12, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS04', 'CS6061', 8, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS05', 'CS6061', 16, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS06', 'CS6061', 12, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS07', 'CS6061', 8, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS08', 'CS6061', 8, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS09', 'CS6061', 12, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS10', 'CS6061', 12, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS11', 'CS6061', 16, 6, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS12', 'CS6051', 12, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS12', 'CS6053', 8, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS51', 'CS6051', 8, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS51', 'CS6053', 8, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS52', 'CS6051', 8, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS53', 'CS6051', 20, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS54', 'CS6051', 12, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS54', 'CS6053', 8, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2014RCS55', 'CS6051', 20, 5, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS01', 'CS6041', 12, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS01', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS02', 'CS6031', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS02', 'CS6042', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS03', 'CS6041', 12, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS03', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS04', 'CS6041', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS04', 'CS6043', 4, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS05', 'CS6041', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS05', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS07', 'CS6041', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS07', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS08', 'CS6041', 20, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS09', 'CS6041', 12, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS09', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS10', 'CS6041', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS10', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS11', 'CS6041', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS11', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS12', 'CS6041', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS12', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS13', 'CS6041', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS13', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS51', 'CS6031', 4, 3, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS51', 'CS6032', 8, 3, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS51', 'CS6033', 8, 3, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS52', 'CS6031', 8, 3, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS52', 'CS6032', 8, 3, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS53', 'CS6041', 12, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS53', 'CS6043', 8, 4, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS54', 'CS6031', 8, 3, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2015RCS54', 'CS6032', 8, 3, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS01', 'CS6021', 12, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS01', 'CS6022', 8, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS02', 'CS6021', 12, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS02', 'CS6026', 4, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', 'rajithab', 0, NULL),
('2016RCS02', 'EC2212', 4, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS03', 'CS6022', 8, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS03', 'CS6023', 8, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS04', 'CS2215', 4, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS04', 'CS6021', 8, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS04', 'CS6026', 4, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', 'rsyadav', 0, NULL),
('2016RCS05', 'CS2215', 4, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS05', 'CS6021', 8, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS05', 'CS6026', 4, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', 'rsyadav', 0, NULL),
('2016RCS06', 'CS6021', 8, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS06', 'CS6022', 8, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS07', 'CS2215', 4, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS07', 'CS6021', 12, 2, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS51', 'CS2202', 4, 1, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS51', 'CS2203', 4, 1, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS51', 'CS2211', 4, 1, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL),
('2016RCS51', 'CS2214', 4, 1, 0, '2016-17', 'ChairmanSDPC', 'approved', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseresultmaster`
--

CREATE TABLE IF NOT EXISTS `courseresultmaster` (
  `reg_no` varchar(10) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` varchar(7) NOT NULL,
  `credits_earned` decimal(2,0) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `result` varchar(10) NOT NULL,
  `entered_date` date NOT NULL,
  `enterede_by` varchar(50) NOT NULL,
  `verified_date` date NOT NULL,
  `verified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`,`course_id`,`sem_type`,`academic_year`),
  KEY `course_id` (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currentsupervisor`
--

CREATE TABLE IF NOT EXISTS `currentsupervisor` (
  `reg_no` varchar(10) NOT NULL,
  `supervisor1_id` varchar(10) NOT NULL,
  `supervisor2_id` varchar(10) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentsupervisor`
--

INSERT INTO `currentsupervisor` (`reg_no`, `supervisor1_id`, `supervisor2_id`) VALUES
('2008RCS05', 'ntyagi', ''),
('2008RCS08', 'ntyagi', ''),
('2009RCS53', 'mmgore', ''),
('2009RCS55', 'dskushwaha', ''),
('2009RCS57', 'ntyagi', ''),
('2010RCS03', 'ntyagi', 'mpandey'),
('2010RCS06', 'ntyagi', ''),
('2010RCS53', 'mmgore', 'aksingh'),
('2012RCS03', 'rsyadav', ''),
('2012RCS04', 'kkmishra', ''),
('2012RCS53', 'mmgore', 'mpandey'),
('2012RCS54', 'aksingh', ''),
('2012RCS56', 'dskushwaha', ''),
('2012RCS57', 'rsyadav', 'ranvijay'),
('2012RCS58', 'ranvijay', ''),
('2013RCS01', 'rsyadav', ''),
('2013RCS02', 'anojkumar', ''),
('2013RCS03', 'aksingh', ''),
('2013RCS04', 'ranvijay', ''),
('2013RCS06', 'mmgore', ''),
('2013RCS07', 'aksingh', ''),
('2013RCS51', 'mmgore', 'mpandey'),
('2013RGI04', 'mpandey', ''),
('2014RCS01', 'mmgore', ''),
('2014RCS02', 'dskushwaha', ''),
('2014RCS03', 'sagarwal', ''),
('2014RCS04', 'ssrvastava', ''),
('2014RCS05', 'ranvijay', ''),
('2014RCS06', 'dskushwaha', ''),
('2014RCS07', 'ssrvastava', ''),
('2014RCS08', 'ssrvastava', ''),
('2014RCS09', 'sagarwal', ''),
('2014RCS10', 'mpandey', ''),
('2014RCS11', 'rsyadav', ''),
('2014RCS12', 'mpandey', ''),
('2014RCS51', 'aksingh', ''),
('2014RCS52', 'mpandey', 'ssrvastava'),
('2014RCS53', 'kkmishra', ''),
('2014RCS54', 'ranvijay', ''),
('2014RCS55', 'dskushwaha', ''),
('2015RCS01', 'ntyagi', ''),
('2015RCS02', 'dskushwaha', ''),
('2015RCS03', 'sagarwal', 'ranvijay'),
('2015RCS04', 'pdwivedi', ''),
('2015RCS05', 'pdwivedi', ''),
('2015RCS07', 'aksingh', ''),
('2015RCS08', 'anojkumar', ''),
('2015RCS09', 'kkmishra', ''),
('2015RCS10', 'dskushwaha', ''),
('2015RCS11', 'kkmishra', ''),
('2015RCS12', 'rsyadav', ''),
('2015RCS13', 'dkyadav', ''),
('2015RCS51', 'dkyadav', ''),
('2015RCS52', 'dkyadav', ''),
('2015RCS53', 'kkmishra', ''),
('2015RCS54', 'dskushwaha', ''),
('2016RCS01', 'anojkumar', ''),
('2016RCS02', 'sagarwal', ''),
('2016RCS03', 'pdwivedi', ''),
('2016RCS04', 'dkyadav', ''),
('2016RCS05', 'dkyadav', ''),
('2016RCS06', 'mmgore', ''),
('2016RCS07', 'dkyadav', ''),
('2016RCS51', 'divyakumar', '');

-- --------------------------------------------------------

--
-- Table structure for table `dakinout`
--

CREATE TABLE IF NOT EXISTS `dakinout` (
  `doc_id` varchar(10) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `reference` varchar(100) NOT NULL,
  `send_to` varchar(50) NOT NULL,
  `received_by` varchar(50) NOT NULL,
  `resend_outside` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` varchar(10) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `hod` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `hod`) VALUES
('1', 'Civil Engineering', 'Dr. A K Singh'),
('10', 'Physics', 'Dr. Sanjay Chaubey'),
('2', 'Chemical Engineering', 'Dr. Anuj Jain'),
('3', 'Mechanical Engineering', 'Dr. Rakesh Narain'),
('4', 'Computer Science and Engineering', 'Dr. Neeraj Tyagi'),
('5', 'Electronics and Communication Engineering', 'Dr. V K Srivastava'),
('6', 'Electrical Engineering', 'Dr. Shubhi Purwar'),
('7', 'Mathematics', 'Dr. Pankaj Srivastava'),
('9', 'Bio Technology', 'Dr. Shivesh Sharma');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `doc_id` varchar(10) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `academic_year` decimal(4,0) NOT NULL,
  `application_type` varchar(20) NOT NULL,
  `date_of_upload` date NOT NULL,
  `date_of_final_approval` date NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documentlookup`
--

CREATE TABLE IF NOT EXISTS `documentlookup` (
  `doc_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(50) NOT NULL,
  PRIMARY KEY (`doc_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `documentlookup`
--

INSERT INTO `documentlookup` (`doc_type_id`, `doc_type`) VALUES
(1, 'Marksheet'),
(3, 'Transcript'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `examinarpanel`
--

CREATE TABLE IF NOT EXISTS `examinarpanel` (
  `reg_no` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `progress` varchar(25) NOT NULL,
  PRIMARY KEY (`reg_no`,`type`,`faculty_id`),
  KEY `examinarpanel_ibfk_2` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examinarpanel`
--

INSERT INTO `examinarpanel` (`reg_no`, `type`, `faculty_id`, `role`, `status`, `progress`) VALUES
('2014RCS51', 'Ph.D Thesis Evaluation Board', 'aksingh', 'Internal', 'pending', 'ConvenerDDPC'),
('2014RCS51', 'Ph.D Thesis Evaluation Board', 'dkyadav', 'Internal', 'pending', 'ConvenerDDPC'),
('2014RCS51', 'Ph.D Thesis Evaluation Board', 'dskushwaha', 'Internal', 'pending', 'ConvenerDDPC'),
('2014RCS51', 'Ph.D Thesis Evaluation Board', 'mmgore', 'Internal', 'pending', 'ConvenerDDPC'),
('2014RCS51', 'Ph.D Thesis Evaluation Board', 'ranvijay', 'Internal', 'pending', 'ConvenerDDPC'),
('2014RCS51', 'Ph.D Thesis Evaluation Board', 'ssrvastava', 'Internal', 'pending', 'ConvenerDDPC');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `contact` decimal(15,0) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `external` binary(1) NOT NULL,
  `affiliation` varchar(100) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`faculty_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `password`, `name`, `dept_id`, `designation`, `contact`, `mail_id`, `external`, `affiliation`, `photo_path`, `address`) VALUES
('aksingh', 'aksingh', 'A. K. Singh', '4', 'Associate Professor', 9648161683, 'aks@mnnit.ac.in', '\0', '', '', 'Mnnit Faculty Colony, MNNIT Allahabad'),
('anojkumar', 'anojkumar', 'Anoj Kumar', '4', 'Assistant Professor', 0, 'anojkmr@mnnit.ac.in', '\0', '', '', '0'),
('aojha', 'aojha', 'Animesh Ojha', '10', 'Assistant Professor', 0, '', '\0', '', '', ''),
('aprakash', 'aprakash', 'Arun Prakash', '5', 'Assistant Professor', 0, '', '\0', '', '', ''),
('arvindkmr', 'arvindkmr', 'Arvind Kumar', '10', 'Assistant Professor', 0, '', '\0', '', '', ''),
('asheesh', 'asheesh', 'Asheesh Kumar Singh', '2', 'Assistant Professor', 0, '', '\0', '', '', ''),
('asingh', 'asingh', 'A. K. Singh', '1', 'Professor', 0, '', '\0', '', '', ''),
('bchoudhary', 'bchoudhary', 'B. D. Choudhary', '4', 'Professor', 0, 'bdc@mnnit.ac.in', '\0', '', '', '0'),
('ChairmanSDPC', 'ChairmanSDPC', '', '', NULL, 0, '', '\0', '', '', ''),
('ChairmanSenate', 'ChairmanSenate', '', '', NULL, 0, '', '\0', '', '', ''),
('ConvenerDDPC', 'ConvenerDDPC', '', '', NULL, 0, '', '\0', '', '', ''),
('divyakumar', 'divyakumar', 'Divya Kumar', '4', 'Assistant Professor', 0, 'divkmr@mnnit.ac.in', '\0', '', '', ''),
('dkyadav', 'dkyadav', 'D. K. Yadav', '4', 'Associate Professor', 0, 'dky@mnnit.ac.in', '\0', '', '', '0'),
('dskushwaha', 'dskushwaha', 'D. S. Kushwaha', '4', 'Associate Professor', 0, 'dsk@mnnit.ac.in', '\0', '', '', '0'),
('hnkar', 'hnkar', 'H. N. Kar', '5', 'Professor', 0, 'hnk@mnnit.ac.in', '1', '', '', '0'),
('HOD', 'HOD', '', '', NULL, 0, '', '\0', '', '', ''),
('kkmishra', 'kkmishra', 'K. K. Mishra', '4', 'Assistant Professor', 0, 'kkm@mnnit.ac.in', '\0', '', '', '0'),
('mgupta', 'mgupta', 'Manish Gupta', '2', 'Assistant Professor', 0, '', '\0', '', '', ''),
('mmgore', 'mmgore', 'M. M. Gore', '4', 'Professor', 0, 'mmg@mnnit.ac.in', '\0', '', '', '0'),
('mpandey', 'mpandey', 'Mayank Pandey', '4', 'Assistant Professor', 0, 'mpnd@mnnit.ac.in', '\0', '', '', '0'),
('mtiwari', 'mtiwari', 'Manish Tiwari', '5', 'Assistant Professor', 0, '', '\0', '', '', ''),
('mwairya', 'mwairya', 'Manoj Wairya', '4', 'Associate Professor', 0, 'mw@mnnit.ac.in', '0', '', '', '0'),
('ntyagi', 'ntyagi', 'Neeraj Tyagi', '4', 'Professor', 0, 'ntyg@mnnit.ac.in', '\0', '', '', '0'),
('pdwivedi', 'pdwivedi', 'Pragya Dwivedi ', '4', 'Assistant Professor', 0, 'pdwvd@mnnit.ac.in', '\0', '', '', '0'),
('pitamsingh', 'pitamsingh', 'Pitam Singh', '7', 'Assistant Professor', 0, '', '\0', '', '', ''),
('pragyash', 'pragyash', 'Pragya Shandilya', '3', 'Assistant Professor', 0, '', '\0', '', '', ''),
('rajithab', 'rajithab', 'Rajitha B', '4', 'Assistant Professor', 0, '', '\0', '', '', ''),
('ramishra', 'ramishra', 'R. A. Mishra', '1', 'Assistant Professor', 0, '', '\0', '', '', ''),
('ranvijay', 'ranvijay', 'Ranvijay', '4', 'Assistant Professor', 0, 'rnvjy@mnnit.ac.in', '\0', '', '', '0'),
('rknagaria', 'rknagaria', 'R. K. Nagaria', '5', 'Professor', 0, '', '\0', '', '', ''),
('rksingh', 'rksingh', 'R. K. Singh', '6', 'Assistant Professor', 0, '', '\0', '', '', ''),
('rsrvastava', 'rsrvastava', 'Rajeev Srivastava', '5', 'Assistant Professor', 0, '', '\0', '', '', ''),
('rsyadav', 'rsyadav', 'R. S. Yadav', '4', 'Professor', 0, 'rsy@mnnit.ac.in', '\0', '', '', '0'),
('rtripathi', 'rtripathi', 'Rajeev Tripathi', '5', 'Professor', 0, '', '\0', '', '', ''),
('sagarwal', 'sagarwal', 'Suneeta Agarwal', '4', 'Professor', 0, 'sagr@mnnit.ac.in', '\0', '', '', '0'),
('sdkumar', 'sdkumar', 'Shiv Datt Kumar', '7', 'Assistant Professor', 0, '', '\0', '', '', ''),
('shivesh', 'shivesh', 'Shivesh Sharma', '9', 'Assistant Professor', 0, '', '\0', '', '', ''),
('spadhye', 'spadhye', 'Sahadeo Padhye', '7', 'Assistant Professor', 0, '', '\0', '', '', ''),
('srai', 'srai', 'Sanjeev Rai', '5', 'Assistant Professor', 0, '', '\0', '', '', ''),
('ssrvastava', 'ssrvastava', 'Shashank Srivastava ', '4', 'Assistant Professor', 0, 'ssrvas@mnnit.ac.in', '\0', '', '', '0'),
('tnandan', 'tnandan', 'Tanuj Nandan', '3', 'Assistant Professor', 0, '', '\0', '', '', ''),
('vbhadauria', 'vbhadauria', 'Vijaya Bhadauria', '5', 'Professor', 0, '', '\0', '', '', ''),
('vsrvastava', 'vsrvastava', 'V. K. Srivastava', '5', 'Professor', 0, '', '\0', '', '', ''),
('vstripathi', 'vstripathi', 'V. S. Tripathi', '5', 'Assistant Professor', 0, '', '\0', '', '', ''),
('vyadav', 'vyadav', 'Vinod Yadav', '3', 'Professor', 0, '', '\0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobdocumentlookup`
--

CREATE TABLE IF NOT EXISTS `jobdocumentlookup` (
  `job_type_id` int(11) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  PRIMARY KEY (`doc_type_id`,`job_type_id`),
  KEY `job_type_id` (`job_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdocumentlookup`
--

INSERT INTO `jobdocumentlookup` (`job_type_id`, `doc_type_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `joblookup`
--

CREATE TABLE IF NOT EXISTS `joblookup` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type` varchar(50) NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `joblookup`
--

INSERT INTO `joblookup` (`job_type_id`, `job_type`) VALUES
(1, 'Getting attested Transcript'),
(2, 'Process to get Scholarship 1');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `reg_no` varchar(10) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` decimal(4,0) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_days` decimal(2,0) NOT NULL,
  `status` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `applied_on` date NOT NULL,
  `progress` varchar(25) NOT NULL DEFAULT 'Supervisor',
  PRIMARY KEY (`reg_no`,`leave_type`,`from_date`,`to_date`),
  KEY `leave_type` (`leave_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`reg_no`, `leave_type`, `sem_no`, `sem_type`, `academic_year`, `from_date`, `to_date`, `no_of_days`, `status`, `address`, `applied_on`, `progress`) VALUES
('2012RCS54', '3', 8, '0', 2016, '2017-04-24', '2017-04-27', 4, 'approved', '', '2017-04-15', 'HOD'),
('2015RCS02', '3', 1, '0', 2016, '2017-03-28', '2017-03-30', 3, 'approved', 'abc', '2017-03-13', 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `leavelookup`
--

CREATE TABLE IF NOT EXISTS `leavelookup` (
  `leave_type` varchar(20) NOT NULL,
  `leave_name` varchar(20) NOT NULL,
  `no_of_days` decimal(3,0) NOT NULL,
  PRIMARY KEY (`leave_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavelookup`
--

INSERT INTO `leavelookup` (`leave_type`, `leave_name`, `no_of_days`) VALUES
('1', 'Sick Leave', 10),
('2', 'Personal', 5),
('3', 'casual', 15);

-- --------------------------------------------------------

--
-- Table structure for table `meetattendance`
--

CREATE TABLE IF NOT EXISTS `meetattendance` (
  `meeting_no` varchar(10) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  PRIMARY KEY (`meeting_no`,`member_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE IF NOT EXISTS `meeting` (
  `meeting_no` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `committee_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`meeting_no`,`dept_id`,`committee_id`),
  KEY `dept_id` (`dept_id`,`committee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetingagendabrief`
--

CREATE TABLE IF NOT EXISTS `meetingagendabrief` (
  `meeting_no` varchar(10) NOT NULL,
  `agenda_id` varchar(10) NOT NULL,
  `agenda_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`meeting_no`,`agenda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetingdocs`
--

CREATE TABLE IF NOT EXISTS `meetingdocs` (
  `meeting_no` varchar(10) NOT NULL,
  `meeting_minute` longblob NOT NULL,
  `meeting_notice_with_agenda` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` varchar(10) NOT NULL,
  `member_type` varchar(20) NOT NULL,
  `committee_id` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`member_id`,`committee_id`,`dept_id`,`role`),
  KEY `dept_id` (`dept_id`,`committee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_type`, `committee_id`, `dept_id`, `role`) VALUES
('2015RCS51', 'Student', '1 ', '4 ', 'student'),
('2015RCS52', 'Student', '1 ', '4 ', 'student'),
('aksingh', 'Internal', '1 ', '4 ', 'member'),
('dkyadav', 'Internal', '1 ', '4 ', 'ConvenerDDPC'),
('dskushwaha', 'Internal', '1 ', '4 ', 'member'),
('hnkar', 'External', '1 ', '4 ', 'member'),
('mmgore', 'Internal', '1 ', '4 ', 'member'),
('ntyagi', 'Internal', '1 ', '4 ', 'ChairmanSDPC'),
('ntyagi', 'Internal', '1 ', '4 ', 'ChairmanSenate'),
('ntyagi', 'Internal', '1 ', '4 ', 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `target_group` text NOT NULL,
  `target_member` text NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `issue_date`, `description`, `target_group`, `target_member`, `read`) VALUES
(1, '2017-04-19', 'this', '', 'ntyagi', 0),
(2, '2017-04-19', 'this', '', 'aksingh', 0),
(3, '2017-04-19', 'this', '', 'anojkumar', 0),
(4, '2017-04-19', 'this', '', 'aojha', 0),
(5, '2017-04-19', 'this', '', 'aprakash', 0),
(6, '2017-04-19', 'this', '', 'arvindkmr', 0),
(7, '2017-04-19', 'this', '', 'asheesh', 0),
(8, '2017-04-19', 'this', '', 'asingh', 0),
(9, '2017-04-19', 'this', '', 'bchoudhary', 0),
(10, '2017-04-19', 'this', '', 'divyakumar', 0),
(11, '2017-04-19', 'this', '', 'dkyadav', 0),
(12, '2017-04-19', 'this', '', 'dskushwaha', 0),
(13, '2017-04-19', 'this', '', 'hnkar', 0),
(14, '2017-04-19', 'this', '', 'kkmishra', 0),
(15, '2017-04-19', 'this', '', 'mgupta', 0),
(16, '2017-04-19', 'this', '', 'mmgore', 0),
(17, '2017-04-19', 'this', '', 'mpandey', 0),
(18, '2017-04-19', 'this', '', 'mtiwari', 0),
(19, '2017-04-19', 'this', '', 'mwairya', 0),
(20, '2017-04-19', 'this', '', 'ntyagi', 0),
(21, '2017-04-19', 'this', '', 'pdwivedi', 0),
(22, '2017-04-19', 'this', '', 'pitamsingh', 0),
(23, '2017-04-19', 'this', '', 'pragyash', 0),
(24, '2017-04-19', 'this', '', 'rajithab', 0),
(25, '2017-04-19', 'this', '', 'ramishra', 0),
(26, '2017-04-19', 'this', '', 'ranvijay', 0),
(27, '2017-04-19', 'this', '', 'rknagaria', 0),
(28, '2017-04-19', 'this', '', 'rksingh', 0),
(29, '2017-04-19', 'this', '', 'rsrvastava', 0),
(30, '2017-04-19', 'this', '', 'rsyadav', 0),
(31, '2017-04-19', 'this', '', 'rtripathi', 0),
(32, '2017-04-19', 'this', '', 'sagarwal', 0),
(33, '2017-04-19', 'this', '', 'sdkumar', 0),
(34, '2017-04-19', 'this', '', 'shivesh', 0),
(35, '2017-04-19', 'this', '', 'spadhye', 0),
(36, '2017-04-19', 'this', '', 'srai', 0),
(37, '2017-04-19', 'this', '', 'ssrvastava', 0),
(38, '2017-04-19', 'this', '', 'tnandan', 0),
(39, '2017-04-19', 'this', '', 'vbhadauria', 0),
(40, '2017-04-19', 'this', '', 'vsrvastava', 0),
(41, '2017-04-19', 'this', '', 'vstripathi', 0),
(42, '2017-04-19', 'this', '', 'vyadav', 0),
(43, '2017-04-19', 'this', '', 'dkyadav', 0),
(44, '2017-04-19', 'that', '', 'ntyagi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `othercourses`
--

CREATE TABLE IF NOT EXISTS `othercourses` (
  `course_id` varchar(10) NOT NULL,
  `min_credits` decimal(2,0) NOT NULL,
  `max_credits` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` varchar(7) NOT NULL,
  PRIMARY KEY (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `othercourses`
--

INSERT INTO `othercourses` (`course_id`, `min_credits`, `max_credits`, `sem_type`, `academic_year`) VALUES
('CS6011', 4, 20, '0', '2016-17'),
('CS6015', 4, 20, '0', '2016-17'),
('CS6016', 4, 20, '0', '2016-17'),
('CS6021', 8, 20, '0', '2016-17'),
('CS6022', 4, 20, '0', '2016-17'),
('CS6023', 4, 20, '0', '2016-17'),
('CS6025', 4, 20, '0', '2016-17'),
('CS6026', 4, 20, '0', '2016-17'),
('CS6031', 4, 20, '0', '2016-17'),
('CS6032', 4, 20, '0', '2016-17'),
('CS6033', 4, 20, '0', '2016-17'),
('CS6035', 4, 20, '0', '2016-17'),
('CS6036', 4, 20, '0', '2016-17'),
('CS6041', 8, 20, '0', '2016-17'),
('CS6042', 4, 20, '0', '2016-17'),
('CS6043', 4, 20, '0', '2016-17'),
('CS6051', 8, 20, '0', '2016-17'),
('CS6053', 4, 20, '0', '2016-17'),
('CS6061', 8, 20, '0', '2016-17'),
('CS6071', 8, 20, '0', '2016-17'),
('CS6081', 8, 20, '0', '2016-17'),
('CS6091', 8, 20, '0', '2016-17'),
('CS6101', 8, 20, '0', '2016-17'),
('CS6111', 8, 20, '0', '2016-17'),
('CS6121', 8, 20, '0', '2016-17'),
('CS6131', 8, 20, '0', '2016-17'),
('CS6141', 8, 20, '0', '2016-17'),
('CS6151', 8, 20, '0', '2016-17'),
('CS6161', 8, 20, '0', '2016-17'),
('CS6171', 8, 20, '0', '2016-17'),
('CS6181', 8, 20, '0', '2016-17'),
('CS6191', 8, 20, '0', '2016-17'),
('CS6201', 8, 20, '0', '2016-17');

-- --------------------------------------------------------

--
-- Table structure for table `partfullstatus`
--

CREATE TABLE IF NOT EXISTS `partfullstatus` (
  `reg_no` varchar(10) NOT NULL,
  `reg_status` varchar(20) NOT NULL,
  `date_of_modification` datetime NOT NULL,
  `reason` varchar(255) NOT NULL,
  `supervisor_comment` varchar(255) NOT NULL,
  `progress` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partfullstatus`
--

INSERT INTO `partfullstatus` (`reg_no`, `reg_status`, `date_of_modification`, `reason`, `supervisor_comment`, `progress`, `status`) VALUES
('2008RCS13', 'Full-Time', '2017-03-22 00:00:00', '', '', 'Supervisor', 'pending'),
('2012RCS04', 'Full-Time', '2017-03-22 00:00:00', 'for convenience', '', 'Supervisor', 'pending'),
('2012RCS52', 'Full-Time', '2017-03-22 00:00:00', '', '', 'Supervisor', 'pending'),
('2015RCS01', 'Full-Time', '2017-04-02 00:00:00', 'a', 'abc', 'ChairmanSDPC', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `programcategorylookup`
--

CREATE TABLE IF NOT EXISTS `programcategorylookup` (
  `category` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programcategorylookup`
--

INSERT INTO `programcategorylookup` (`category`, `id`) VALUES
('Full Time', 1),
('Full Time(QIP)', 2),
('Full Time(TEQIP-II)', 3),
('Part Time', 4),
('Self Financed', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rolelookup`
--

CREATE TABLE IF NOT EXISTS `rolelookup` (
  `role_id` varchar(25) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolelookup`
--

INSERT INTO `rolelookup` (`role_id`, `role_name`) VALUES
('ChairmanSDPC', 'SDPC Chairman'),
('ChairmanSenate', 'Senate Chairman'),
('ConvenerDDPC', 'DDPC Convener'),
('CourseCoordinator', 'Course Coordinator'),
('ExternalMemberSRC', 'External Member of SRC'),
('HOD', 'Head of Department'),
('InternalMemberSRC', 'Internal Member of SRC'),
('member', 'DDPC Member'),
('student', 'Student'),
('Supervisor', 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `src`
--

CREATE TABLE IF NOT EXISTS `src` (
  `reg_no` varchar(10) NOT NULL,
  `src_int_id` varchar(10) NOT NULL,
  `src_ext_id` varchar(10) NOT NULL,
  `supervisor1_id` varchar(10) NOT NULL,
  `supervisor2_id` varchar(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `progress` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `src`
--

INSERT INTO `src` (`reg_no`, `src_int_id`, `src_ext_id`, `supervisor1_id`, `supervisor2_id`, `status`, `progress`) VALUES
('2008RCS05', 'mpandey', 'rtripathi', 'ntyagi', '', 'approved', 'ChairmanSDPC'),
('2008RCS08', 'mpandey', 'rtripathi', 'ntyagi', '', 'approved', 'ChairmanSDPC'),
('2009RCS53', 'ntyagi', 'rtripathi', 'mmgore', '', 'approved', 'ChairmanSDPC'),
('2009RCS55', 'ntyagi', 'rtripathi', 'dskushwaha', '', 'approved', 'ChairmanSDPC'),
('2009RCS57', 'mpandey', 'rtripathi', 'ntyagi', '', 'approved', 'ChairmanSDPC'),
('2010RCS03', 'aksingh', 'rtripathi', 'ntyagi', 'mpandey', 'approved', 'ChairmanSDPC'),
('2010RCS06', 'mpandey', 'rtripathi', 'ntyagi', '', 'approved', 'ChairmanSDPC'),
('2010RCS53', 'dskushwaha', 'rsrvastava', 'mmgore', 'aksingh', 'approved', 'ChairmanSDPC'),
('2012RCS03', 'sagarwal', 'rknagaria', 'rsyadav', '', 'approved', 'ChairmanSDPC'),
('2012RCS04', 'dskushwaha', 'rksingh', 'kkmishra', '', 'approved', 'ChairmanSDPC'),
('2012RCS53', 'ntyagi', 'rtripathi', 'mmgore', 'mpandey', 'approved', 'ChairmanSDPC'),
('2012RCS54', 'dskushwaha', 'vsrvastava', 'aksingh', '', 'approved', 'ChairmanSDPC'),
('2012RCS56', 'mmgore', 'rksingh', 'dskushwaha', '', 'approved', 'ChairmanSDPC'),
('2012RCS57', 'sagarwal', 'aprakash', 'rsyadav', 'ranvijay', 'approved', 'ChairmanSDPC'),
('2012RCS58', 'rsyadav', 'rknagaria', 'ranvijay', '', 'approved', 'ChairmanSDPC'),
('2013RCS01', 'sagarwal', 'rknagaria', 'rsyadav', '', 'approved', 'ChairmanSDPC'),
('2013RCS02', 'kkmishra', 'rksingh', 'anojkumar', '', 'approved', 'ChairmanSDPC'),
('2013RCS03', 'mmgore', 'asingh', 'aksingh', '', 'approved', 'ChairmanSDPC'),
('2013RCS04', 'rsyadav', 'ramishra', 'ranvijay', '', 'approved', 'ChairmanSDPC'),
('2013RCS06', 'aksingh', 'shivesh', 'mmgore', '', 'approved', 'ChairmanSDPC'),
('2013RCS07', 'mpandey', 'asheesh', 'aksingh', '', 'approved', 'ChairmanSDPC'),
('2013RCS51', 'ntyagi', 'rtripathi', 'mmgore', '', 'approved', 'ChairmanSDPC'),
('2014RCS01', 'mpandey', 'sdkumar', 'mmgore', '', 'approved', 'ChairmanSDPC'),
('2014RCS02', 'mmgore', 'rksingh', 'dskushwaha', '', 'approved', 'ChairmanSDPC'),
('2014RCS03', 'ssrvastava', 'vsrvastava', 'sagarwal', '', 'approved', 'ChairmanSDPC'),
('2014RCS04', 'mpandey', 'aprakash', 'ssrvastava', '', 'approved', 'ChairmanSDPC'),
('2014RCS05', 'kkmishra', 'aprakash', 'ranvijay', '', 'approved', 'ChairmanSDPC'),
('2014RCS06', 'aksingh', 'srai', 'dskushwaha', '', 'approved', 'ChairmanSDPC'),
('2014RCS07', 'mpandey', 'aprakash', 'ssrvastava', '', 'approved', 'ChairmanSDPC'),
('2014RCS08', 'mpandey', 'aprakash', 'ssrvastava', '', 'approved', 'ChairmanSDPC'),
('2014RCS09', 'ssrvastava', 'vsrvastava', 'sagarwal', '', 'approved', 'ChairmanSDPC'),
('2014RCS10', 'ntyagi', 'rtripathi', 'mpandey', '', 'approved', 'ChairmanSDPC'),
('2014RCS11', 'ranvijay', 'rknagaria', 'rsyadav', '', 'approved', 'ChairmanSDPC'),
('2014RCS12', 'ntyagi', 'rtripathi', 'mpandey', '', 'approved', 'ChairmanSDPC'),
('2014RCS51', 'ntyagi', 'aojha', 'aksingh', '', 'approved', 'ChairmanSDPC'),
('2014RCS52', 'ntyagi', 'rtripathi', 'mpandey', 'ssrvastava', 'approved', 'ChairmanSDPC'),
('2014RCS53', 'anojkumar', 'pitamsingh', 'kkmishra', '', 'approved', 'ChairmanSDPC'),
('2014RCS54', 'rsyadav', 'aprakash', 'ranvijay', '', 'approved', 'ChairmanSDPC'),
('2014RCS55', 'ntyagi', 'srai', 'dskushwaha', '', 'approved', 'ChairmanSDPC'),
('2015RCS01', 'mpandey', 'aprakash', 'ntyagi', '', 'approved', 'ChairmanSDPC'),
('2015RCS02', 'aksingh', 'tnandan', 'dskushwaha', '', 'approved', 'ChairmanSDPC'),
('2015RCS03', 'rsyadav', 'spadhye', 'ranvijay', '', 'approved', 'ChairmanSDPC'),
('2015RCS04', 'kkmishra', 'pitamsingh', 'pdwivedi', '', 'approved', 'ChairmanSDPC'),
('2015RCS05', 'kkmishra', 'pragyash', 'pdwivedi', '', 'approved', 'ChairmanSDPC'),
('2015RCS07', 'rsyadav', 'vbhadauria', 'aksingh', '', 'approved', 'ChairmanSDPC'),
('2015RCS08', 'kkmishra', 'rksingh', 'anojkumar', '', 'approved', 'ChairmanSDPC'),
('2015RCS09', 'pdwivedi', 'arvindkmr', 'kkmishra', '', 'approved', 'ChairmanSDPC'),
('2015RCS10', 'aksingh', 'rtripathi', 'dskushwaha', '', 'approved', 'ChairmanSDPC'),
('2015RCS11', 'anojkumar', 'pitamsingh', 'kkmishra', '', 'approved', 'ChairmanSDPC'),
('2015RCS12', 'ranvijay', 'rknagaria', 'rsyadav', '', 'approved', 'ChairmanSDPC'),
('2015RCS13', 'ntyagi', 'vyadav', 'dkyadav', '', 'approved', 'ChairmanSDPC'),
('2015RCS51', 'dskushwaha', 'srai', 'dkyadav', '', 'approved', 'ChairmanSDPC'),
('2015RCS52', 'rsyadav', 'srai', 'dkyadav', '', 'approved', 'ChairmanSDPC'),
('2015RCS53', 'anojkumar', 'mtiwari', 'kkmishra', '', 'approved', 'ChairmanSDPC'),
('2015RCS54', 'dkyadav', 'vstripathi', 'dskushwaha', '', 'approved', 'ChairmanSDPC');

-- --------------------------------------------------------

--
-- Table structure for table `stipend`
--

CREATE TABLE IF NOT EXISTS `stipend` (
  `reg_no` varchar(10) NOT NULL,
  `month` decimal(2,0) NOT NULL,
  `year` decimal(4,0) NOT NULL,
  `date_sent` date NOT NULL,
  `stipend_amount` decimal(7,2) NOT NULL,
  PRIMARY KEY (`reg_no`,`month`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentmaster`
--

CREATE TABLE IF NOT EXISTS `studentmaster` (
  `reg_no` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo_path` varchar(50) NOT NULL,
  `category` varchar(10) NOT NULL,
  `program` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` decimal(15,0) NOT NULL,
  `mail_id` varchar(30) NOT NULL,
  `hostel` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `highest_qualification` varchar(100) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `admission_category_code` varchar(10) NOT NULL,
  `stipendiary` tinyint(1) NOT NULL,
  `program_type` varchar(25) NOT NULL,
  `program_category` varchar(25) NOT NULL,
  `dept_id` int(2) NOT NULL,
  `year_of_joining` date NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmaster`
--

INSERT INTO `studentmaster` (`reg_no`, `password`, `photo_path`, `category`, `program`, `name`, `father_name`, `address`, `contact_no`, `mail_id`, `hostel`, `gender`, `highest_qualification`, `nationality`, `admission_category_code`, `stipendiary`, `program_type`, `program_category`, `dept_id`, `year_of_joining`) VALUES
('2008RCS05', '2008RCS05', 'html', 'General', 'Ph.D.', 'Awadhesh Kumar', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2008-07-20'),
('2008RCS08', '2008RCS08', '', 'General', 'Ph.D.', 'Shilpy Agarwal', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2008-07-20'),
('2009RCS53', '2009RCS53', '', 'General', 'Ph.D.', 'Sansar Singh Chauhan', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '0000-00-00'),
('2009RCS55', '2009RCS55', '', 'General', 'Ph.D.', 'Sanjeev Kumar Pippal', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '0000-00-00'),
('2009RCS57', '2009RCS57', '', 'General', 'Ph.D.', 'Jokhu Lal', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2010-01-06'),
('2010RCS03', '2010RCS03', '', 'General', 'Ph.D.', 'Debjani Ghosh', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 4, '2010-07-15'),
('2010RCS06', '2010RCS06', '', 'General', 'Ph.D.', 'Vimal Kumar', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2010-07-15'),
('2010RCS53', '2010RCS53', './images/2010RCS53.jpg', 'General', 'Ph.D.', 'Rohit', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 4, '0000-00-00'),
('2012RCS03', '2012RCS03', '', 'General', 'Ph.D.', 'Sarika Yadav', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2012-07-24'),
('2012RCS04', '2012RCS04', './images/2012RCS04.jpg', '', '', 'Nitin Saxena', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2012-07-24'),
('2012RCS51', '2012RCS51', '', 'General', 'Ph.D.', 'Rajitha B', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2013-01-15'),
('2012RCS53', '2012RCS53', '', 'General', 'Ph.D.', 'Shashwati Banerjea', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2013-01-15'),
('2012RCS54', '2012RCS54', '', '', '', 'Rupesh Kumar Dewang', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2013-01-15'),
('2012RCS56', '2012RCS56', '', 'General', 'Ph.D.', 'Dushyant Kumar Singh', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2013-01-15'),
('2012RCS57', '2012RCS57', '', 'General', 'Ph.D.', 'Dinesh Singh', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2013-01-15'),
('2012RCS58', '2012RCS58', '', '', '', 'K. Vinod Kumar', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(QIP)', 4, '2013-01-12'),
('2013RCS01', '2013RCS01', '', 'General', 'Ph.D.', 'Shruti Jadon', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2013-07-23'),
('2013RCS02', '2013RCS02', '', '', '', 'Shailendra Pratap Singh', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2013-07-23'),
('2013RCS03', '2013RCS03', '', '', '', 'Praveen Kumar', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2013-07-23'),
('2013RCS04', '2013RCS04', '', '', '', 'Rajit Ram Yadav', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(TEQIP-II)', 4, '2013-07-23'),
('2013RCS06', '2013RCS06', '', 'General', 'Ph.D.', 'Vijay Kumar Dwivedi', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2013-07-23'),
('2013RCS07', '2013RCS07', '', '', '', 'Subhadra Bose Shaw', '', '', 0, '', '', '', '', '', '', 0, '', 'Part Time', 4, '2013-07-23'),
('2013RCS51', '2013RCS51', '', 'General', 'Ph.D.', 'Anurag Sewak', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(TEQIP-II)', 4, '2014-01-08'),
('2013RGI04', '2013RGI04', '', '', '', 'Abha Trivedi', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(TEQIP-II)', 0, '0000-00-00'),
('2014RCS01', '2014RCS01', './images/2014RCS01.jpg', 'General', 'Ph.D.', 'Brijendra Pratap Singh', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2014-07-22'),
('2014RCS02', '2014RCS02', '', 'General', 'Ph.D.', 'Tarun Kumar', '', '', 0, '', '', '', '', '', '', 0, '', 'Self Financed', 4, '2014-07-22'),
('2014RCS03', '2014RCS03', '', 'General', 'Ph.D.', 'Shambhu Shankar Bharti', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2014-07-22'),
('2014RCS04', '2014RCS04', './images/2014RCS04.jpg', '', '', 'Naveen Kumar', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2014-07-22'),
('2014RCS05', '2014RCS05', '', '', '', 'Mainejar Yadav', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2014-07-22'),
('2014RCS06', '2014RCS06', '', 'General', 'Ph.D.', 'Rohit Kumar Sachan', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2014-07-22'),
('2014RCS07', '2014RCS07', '', '', '', 'Ashuthosh Kumar Singh', '', '', 0, '', '', '', '', '', '', 0, '', 'Self Financed', 4, '2014-07-22'),
('2014RCS08', '2014RCS08', '', '', '', 'Neelam Dayal', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2014-07-22'),
('2014RCS09', '2014RCS09', '', 'General', 'Ph.D.', 'Manish Gupta', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(QIP)', 4, '2014-07-22'),
('2014RCS10', '2014RCS10', '', '', '', 'Krishna Vijay Kr. Singh', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(QIP)', 4, '2014-07-22'),
('2014RCS11', '2014RCS11', '', 'General', 'Ph.D.', 'Suresh Kumar', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(QIP)', 4, '2014-07-22'),
('2014RCS12', '2014RCS12', '', '', '', 'Abhay Singh', '', '', 0, '', '', '', '', '', '', 0, '', 'Project Staff', 4, '2014-07-22'),
('2014RCS51', '2014RCS51', './images/2014RCS51.jpg', '', '', 'Jagrati Singh', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-01-05'),
('2014RCS52', '2014RCS52', '', '', '', 'Nitin Shukla', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-01-05'),
('2014RCS53', '2014RCS53', '', '', '', 'Ravi Prakash', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-01-05'),
('2014RCS54', '2014RCS54', '', '', '', 'Shailendra Puskin', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-01-05'),
('2014RCS55', '2014RCS55', '', 'General', 'Ph.D.', 'Biru Rajak', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-01-05'),
('2015RCS01', '2015RCS01', './images/2015RCS01.jpg', 'General', 'Ph.D.', 'Shabir Ali', 'father', 'G-109,Malviya Hostel,MNNIT Allahabad', 9410671504, 'shabirali@gmail.com', 'hostelName', 'male', '', 'Indian', '', 1, '', 'Full Time', 4, '2015-07-20'),
('2015RCS02', '2015RCS02', '', 'General', 'Ph.D.', 'Neelam Dwivedi', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-07-20'),
('2015RCS03', '2015RCS03', '', '', '', 'Sanjeev Kumar', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2015-07-24'),
('2015RCS04', '2015RCS04', './images/2015RCS04.jpg', '', '', 'Rajneesh Pareek', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2015-07-20'),
('2015RCS05', '2015RCS05', './images/2015RCS05.jpg', '', '', 'Ashish Kumar Sahu', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 4, '2015-07-21'),
('2015RCS07', '2015RCS07', './images/2015RCS07.jpg', '', '', 'Garima Singh', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-07-20'),
('2015RCS08', '2015RCS08', './images/2015RCS08.jpg', '', '', 'Nidhi Lal', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2015-07-20'),
('2015RCS09', '2015RCS09', '', '', '', 'Tribhuvan Singh', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time', 4, '2015-07-20'),
('2015RCS10', '2015RCS10', '', 'General', 'Ph.D.', 'Dhirendra Kumar Shukla', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(QIP)', 4, '2015-07-16'),
('2015RCS11', '2015RCS11', '', '', '', 'Satya Deo Kumar Ram', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-07-20'),
('2015RCS12', '2015RCS12', '', 'General', 'Ph.D.', 'Naveen Kumar Gupta', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(QIP)', 4, '2015-07-22'),
('2015RCS13', '2015RCS13', './images/2015RCS13.jpg', '', '', 'Brajesh Kumar Umrao', '', '', 0, '', '', '', '', '', '', 1, '', 'Full Time(Diety)', 4, '2015-08-04'),
('2015RCS51', '2015RCS51', './images/2015RCS51.jpg', 'General', 'Ph.D.', 'Ashish Kumar Mishra', '', '', 0, '', '', '', '', '', '', 0, '', '', 4, '2016-01-08'),
('2015RCS52', '2015RCS52', './images/2015RCS52.jpg', 'General', 'Ph.D.', 'Mahendra Pratap Yadav', '', '', 0, '', '', '', '', '', '', 0, '', '', 4, '2016-01-12'),
('2015RCS53', '2015RCS53', '', '', '', 'Priyanka SIngh', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-01-12'),
('2015RCS54', '2015RCS54', '', '', '', 'Eva Patel', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-01-15'),
('2016RCS01', '2016RCS01', './images/2016RCS01.jpg', '', '', 'Avjeet Singh', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-07-15'),
('2016RCS02', '2016RCS02', './images/2016RCS02.jpg', '', '', 'Divya Srivastava', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-07-28'),
('2016RCS03', '2016RCS03', './images/2016RCS03.jpg', '', '', 'Prince Rajpoot', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-07-15'),
('2016RCS04', '2016RCS04', './images/2016RCS04.jpg', '', '', 'Ram Chandra Bhushan', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-07-15'),
('2016RCS05', '2016RCS05', '', '', '', 'Nisha Pal', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-07-15'),
('2016RCS06', '2016RCS06', './images/2016RCS06.jpg', '', '', 'Abdul Aleem', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-07-15'),
('2016RCS07', '2016RCS07', '', '', '', 'Sunita Jalal', '', '', 0, '', '', '', '', '', '', 0, '', 'Full Time', 0, '2016-07-15'),
('2016RCS51', '2016RCS51', '', '', '', 'Ankur Maurya', '', '', 0, '', '', 'Male', '', '', '', 0, '', 'Full Time', 0, '2016-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `studentmincredit`
--

CREATE TABLE IF NOT EXISTS `studentmincredit` (
  `department` varchar(50) NOT NULL,
  `qualifying_degree` varchar(50) NOT NULL,
  `min_credit_to_earn` decimal(3,0) NOT NULL,
  `min_credit_through` decimal(2,0) NOT NULL,
  `credit_through_compre_exam` decimal(2,0) NOT NULL,
  `credit_through_soa` decimal(2,0) NOT NULL,
  `credit_through_research` decimal(2,0) NOT NULL,
  `min_duration` varchar(30) NOT NULL,
  `min_residence_full_time` varchar(30) NOT NULL,
  `max_duration_full_time` varchar(30) NOT NULL,
  `max_duration_part_time` varchar(30) NOT NULL,
  PRIMARY KEY (`department`,`qualifying_degree`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmincredit`
--

INSERT INTO `studentmincredit` (`department`, `qualifying_degree`, `min_credit_to_earn`, `min_credit_through`, `credit_through_compre_exam`, `credit_through_soa`, `credit_through_research`, `min_duration`, `min_residence_full_time`, `max_duration_full_time`, `max_duration_part_time`) VALUES
('Engineering', 'B.Tech/MCA/M.Sc.', 120, 32, 8, 8, 72, '3 years', '4 semesters', '6 years', '7 years'),
('Engineering', 'M. Tech/M.E.', 80, 16, 8, 8, 48, '2 years', '4 semester', '6 years', '7 years'),
('Management', 'B.tech/M.Sc./MA/M.Com', 120, 32, 8, 8, 72, '3 years', '4 semesters', '6 years', '7years'),
('Management', 'MBA/MMS', 80, 16, 8, 8, 48, '2 years', '4 semesters', '6 years', '7years'),
('Science/HSS', 'B.tech', 120, 32, 8, 8, 72, '3 years', '4 semesters', '6 years', '7years'),
('Science/HSS', 'M.Sc./MA/M.Com', 80, 16, 8, 8, 48, '3 years', '4 semesters', '6 years', '7years');

-- --------------------------------------------------------

--
-- Table structure for table `studentprogramdetails`
--

CREATE TABLE IF NOT EXISTS `studentprogramdetails` (
  `reg_no` varchar(10) NOT NULL,
  `date_of_comp_of_course_work` date NOT NULL,
  `credit_earn_course_work` decimal(2,0) NOT NULL,
  `credit_earn_thesis` decimal(2,0) NOT NULL,
  `date_of_comp` date NOT NULL,
  `date_of_soa` date NOT NULL,
  `date_of_open` date NOT NULL,
  `date_of_final_viva` date NOT NULL,
  `date_thesis_submission` date NOT NULL,
  `date_of_termination` date NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `program_left` tinyint(1) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date_of_update` date DEFAULT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentprogramdetails`
--

INSERT INTO `studentprogramdetails` (`reg_no`, `date_of_comp_of_course_work`, `credit_earn_course_work`, `credit_earn_thesis`, `date_of_comp`, `date_of_soa`, `date_of_open`, `date_of_final_viva`, `date_thesis_submission`, `date_of_termination`, `completed`, `program_left`, `status`, `date_of_update`) VALUES
('2008RCS05', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of Art Completed', '2010-07-13'),
('2008RCS08', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2012-03-28'),
('2009RCS53', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2011-06-30'),
('2009RCS55', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2011-06-30'),
('2009RCS57', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2012-03-23'),
('2010RCS03', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2012-06-13'),
('2010RCS05', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Open Seminar Completed', '2016-01-22'),
('2010RCS06', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2012-09-04'),
('2010RCS53', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2012-08-23'),
('2012RCS02', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2013-09-24'),
('2012RCS03', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '0000-00-00'),
('2012RCS04', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-06-27'),
('2012RCS51', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-06-18'),
('2012RCS53', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-07-18'),
('2012RCS54', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art Completed', '2013-12-20'),
('2012RCS55', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-06-27'),
('2012RCS56', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-12-09'),
('2012RCS57', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-06-25'),
('2012RCS58', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2013-12-20'),
('2013RCS01', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-10-14'),
('2013RCS02', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2015-08-07'),
('2013RCS03', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2015-05-20'),
('2013RCS04', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-12-11'),
('2013RCS06', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-10-13'),
('2013RCS07', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2014-10-17'),
('2013RCS51', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2015-05-06'),
('2014RCS01', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2015-11-06'),
('2014RCS02', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Comprehensive Completed', '2015-12-04'),
('2014RCS03', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2015-12-04'),
('2014RCS04', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Comprehensive Completed', '2015-11-06'),
('2014RCS05', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Comprehensive Completed', '2015-11-24'),
('2014RCS06', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Comprehensive Completed', '2015-12-03'),
('2014RCS07', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Comprehensive Completed', '2015-11-06'),
('2014RCS08', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2015-11-06'),
('2014RCS09', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2015-12-04'),
('2014RCS10', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2016-04-05'),
('2014RCS11', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'State of art completed', '2016-04-25'),
('2014RCS12', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Completed', NULL),
('2014RCS51', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Completed', NULL),
('2014RCS52', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Completed', NULL),
('2014RCS53', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Completed', NULL),
('2014RCS54', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Completed', NULL),
('2014RCS55', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Completed', NULL),
('2015RCS01', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS02', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS03', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS04', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS05', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS07', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS08', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Completed', NULL),
('2015RCS09', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS10', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS11', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS12', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS13', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS51', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS52', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS53', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL),
('2015RCS54', '0000-00-00', 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Course Work Running', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentregistration`
--

CREATE TABLE IF NOT EXISTS `studentregistration` (
  `reg_no` varchar(10) NOT NULL,
  `sem_no` decimal(2,0) NOT NULL,
  `sem_type` tinyint(1) NOT NULL,
  `registration_by` varchar(50) NOT NULL,
  `date_of_reg` date NOT NULL,
  `remarks` text NOT NULL,
  `total_credits_registered` decimal(3,0) NOT NULL,
  PRIMARY KEY (`reg_no`,`sem_no`,`sem_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentregistration`
--

INSERT INTO `studentregistration` (`reg_no`, `sem_no`, `sem_type`, `registration_by`, `date_of_reg`, `remarks`, `total_credits_registered`) VALUES
('2008RCS05', 15, 0, 'admin', '2017-04-12', '', 8),
('2008RCS08', 18, 0, 'admin', '2017-04-12', '', 8),
('2009RCS57', 15, 0, 'admin', '2017-04-12', '', 8),
('2010RCS03', 14, 0, 'admin', '2017-04-12', '', 8),
('2010RCS06', 14, 0, 'admin', '2017-04-12', '', 8),
('2012RCS03', 10, 0, 'admin', '2017-04-12', '', 16),
('2012RCS04', 10, 0, 'admin', '2017-04-12', '', 16),
('2012RCS53', 8, 0, 'admin', '2017-04-12', '', 8),
('2012RCS54', 8, 0, 'admin', '2017-04-12', '', 8),
('2012RCS58', 9, 0, 'admin', '2017-04-12', '', 12),
('2013RCS02', 8, 0, 'admin', '2017-04-12', '', 20),
('2013RCS03', 8, 0, 'admin', '2017-04-12', '', 16),
('2013RCS07', 8, 0, 'admin', '2017-04-12', '', 8),
('2013RCS51', 7, 0, 'admin', '2017-04-12', '', 16),
('2014RCS01', 6, 0, 'admin', '2017-04-12', '', 16),
('2014RCS02', 6, 0, 'admin', '2017-04-12', '', 12),
('2014RCS03', 6, 0, 'admin', '2017-04-12', '', 12),
('2014RCS04', 6, 0, 'admin', '2017-04-12', '', 8),
('2014RCS05', 6, 0, 'admin', '2017-04-12', '', 16),
('2014RCS06', 6, 0, 'admin', '2017-04-12', '', 12),
('2014RCS07', 6, 0, 'admin', '2017-04-12', '', 8),
('2014RCS08', 6, 0, 'admin', '2017-04-12', '', 8),
('2014RCS09', 6, 0, 'admin', '2017-04-12', '', 12),
('2014RCS10', 6, 0, 'admin', '2017-04-12', '', 12),
('2014RCS11', 6, 0, 'admin', '2017-04-12', '', 16),
('2014RCS12', 5, 0, 'admin', '2017-04-12', '', 20),
('2014RCS51', 5, 0, 'admin', '2017-04-12', '', 16),
('2014RCS52', 5, 0, 'admin', '2017-04-12', '', 8),
('2014RCS53', 5, 0, 'admin', '2017-04-12', '', 20),
('2014RCS54', 5, 0, 'admin', '2017-04-12', '', 20),
('2014RCS55', 5, 0, 'admin', '2017-04-12', '', 20),
('2015RCS01', 4, 0, 'admin', '2017-04-12', '', 20),
('2015RCS02', 4, 0, 'admin', '2017-04-12', '', 16),
('2015RCS03', 4, 0, 'admin', '2017-04-12', '', 20),
('2015RCS04', 4, 0, 'admin', '2017-04-12', '', 12),
('2015RCS05', 4, 0, 'admin', '2017-04-12', '', 16),
('2015RCS07', 4, 0, 'admin', '2017-04-12', '', 16),
('2015RCS08', 4, 0, 'admin', '2017-04-12', '', 20),
('2015RCS09', 4, 0, 'admin', '2017-04-12', '', 20),
('2015RCS10', 4, 0, 'admin', '2017-04-12', '', 16),
('2015RCS11', 4, 0, 'admin', '2017-04-12', '', 16),
('2015RCS12', 4, 0, 'admin', '2017-04-12', '', 16),
('2015RCS13', 4, 0, 'admin', '2017-04-12', '', 16),
('2015RCS51', 3, 0, 'admin', '2017-04-12', '', 20),
('2015RCS52', 3, 0, 'admin', '2017-04-12', '', 16),
('2015RCS53', 4, 0, 'admin', '2017-04-12', '', 20),
('2015RCS54', 3, 0, 'admin', '2017-04-12', '', 16),
('2016RCS01', 2, 0, 'admin', '2017-04-12', '', 20),
('2016RCS02', 2, 0, 'admin', '2017-04-12', '', 20),
('2016RCS03', 2, 0, 'admin', '2017-04-12', '', 16),
('2016RCS04', 2, 0, 'admin', '2017-04-12', '', 16),
('2016RCS05', 2, 0, 'admin', '2017-04-12', '', 16),
('2016RCS06', 2, 0, 'admin', '2017-04-12', '', 16),
('2016RCS07', 2, 0, 'admin', '2017-04-12', '', 16),
('2016RCS51', 1, 0, 'admin', '2017-04-12', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `studentthesisdetails`
--

CREATE TABLE IF NOT EXISTS `studentthesisdetails` (
  `reg_no` varchar(10) NOT NULL,
  `AOR` varchar(150) NOT NULL,
  `proposed_topic` varchar(150) NOT NULL,
  `final_topic` varchar(150) NOT NULL,
  `soa_report` longblob NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentthesisdetails`
--

INSERT INTO `studentthesisdetails` (`reg_no`, `AOR`, `proposed_topic`, `final_topic`, `soa_report`) VALUES
('2015RCS01', 'Operating Systems', 'Cooperative Caching: Using Remote Client Memory to Improve File System Performance', 'Cooperative Caching: Using Remote Client Memory to Improve File System Performance', ''),
('2015RCS02', 'Networking', 'Formal modelling, verification and analysis of wireless mesh networks', 'Formal modelling, verification and analysis of wireless mesh networks', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_joining`
--
CREATE TABLE IF NOT EXISTS `student_joining` (
`reg_no` varchar(10)
,`date_of_joining` date
);
-- --------------------------------------------------------

--
-- Table structure for table `supervisorchange`
--

CREATE TABLE IF NOT EXISTS `supervisorchange` (
  `reg_no` varchar(15) NOT NULL,
  `supervisor_id` varchar(15) NOT NULL,
  `reason` text NOT NULL,
  `progress` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`reg_no`,`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisorchange`
--

INSERT INTO `supervisorchange` (`reg_no`, `supervisor_id`, `reason`, `progress`, `status`) VALUES
('2015RCS01', 'divyakumar', 'this is the reason', '', 'approved'),
('2015RCS01', 'mmgore', 'this is the reason', '', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `supervisorhistory`
--

CREATE TABLE IF NOT EXISTS `supervisorhistory` (
  `reg_no` varchar(10) NOT NULL,
  `supervisor_id` varchar(10) NOT NULL,
  `date_of_allotment` date NOT NULL,
  `date_of_relieving` date NOT NULL,
  PRIMARY KEY (`reg_no`,`supervisor_id`),
  KEY `supervisorhistory_ibfk_1` (`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisorselection`
--

CREATE TABLE IF NOT EXISTS `supervisorselection` (
  `reg_no` varchar(15) NOT NULL,
  `supervisor_id` varchar(15) NOT NULL,
  `progress` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`reg_no`,`supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `theorycourses`
--

CREATE TABLE IF NOT EXISTS `theorycourses` (
  `course_id` varchar(10) NOT NULL,
  `total_credits` decimal(2,0) NOT NULL,
  `sem_type` varchar(10) NOT NULL,
  `academic_year` varchar(7) NOT NULL,
  PRIMARY KEY (`course_id`,`sem_type`,`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theorycourses`
--

INSERT INTO `theorycourses` (`course_id`, `total_credits`, `sem_type`, `academic_year`) VALUES
('CS2201', 4, '0', '2016-17'),
('CS2202', 4, '0', '2016-17'),
('CS2203', 4, '0', '2016-17'),
('CS2211', 4, '0', '2016-17'),
('CS2213', 4, '0', '2016-17'),
('CS2214', 4, '0', '2016-17'),
('CS2215', 4, '0', '2016-17'),
('CS2218', 4, '0', '2016-17'),
('CS2223', 4, '0', '2016-17'),
('CS2224', 4, '0', '2016-17'),
('EC2212', 4, '0', '2016-17');

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `var` varchar(25) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`var`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`var`, `value`) VALUES
('reg_open', '1'),
('sem', 'Even'),
('session', '2016-17');

-- --------------------------------------------------------

--
-- Structure for view `student_joining`
--
DROP TABLE IF EXISTS `student_joining`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_joining` AS (select `studentregistration`.`reg_no` AS `reg_no`,min(`studentregistration`.`date_of_reg`) AS `date_of_joining` from `studentregistration` group by `studentregistration`.`reg_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseresultmaster`
--
ALTER TABLE `courseresultmaster`
  ADD CONSTRAINT `courseresultmaster_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`),
  ADD CONSTRAINT `courseresultmaster_ibfk_2` FOREIGN KEY (`course_id`, `sem_type`, `academic_year`) REFERENCES `course` (`course_id`, `sem_type`, `academic_year`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `othercourses`
--
ALTER TABLE `othercourses`
  ADD CONSTRAINT `othercourses_ibfk_1` FOREIGN KEY (`course_id`, `sem_type`, `academic_year`) REFERENCES `course` (`course_id`, `sem_type`, `academic_year`),
  ADD CONSTRAINT `othercourses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisorhistory`
--
ALTER TABLE `supervisorhistory`
  ADD CONSTRAINT `supervisorhistory_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervisorhistory_ibfk_2` FOREIGN KEY (`reg_no`) REFERENCES `studentmaster` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theorycourses`
--
ALTER TABLE `theorycourses`
  ADD CONSTRAINT `theorycourses_ibfk_1` FOREIGN KEY (`course_id`, `sem_type`, `academic_year`) REFERENCES `course` (`course_id`, `sem_type`, `academic_year`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
