-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1

-- Generation Time: Jul 20, 2019 at 08:39 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfg`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `media` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `name`, `theme_id`, `description`, `media`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Beach Cleanup', 1, 'Students get together to clean beach', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Recognizing Planets', 6, 'Identify Planets', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'School Cleanup', 1, 'Students get together to clean school', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Sun a Star', 6, 'Identify Planets', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Starfish', 8, 'Session on starfishes', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Recognizing Earth', 5, 'Identify Earth', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'Are you Aware?', 7, 'Students learn about different social issues', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 'Honesty is Best Policy', 4, 'Understanding Importance of Honesty', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 'Forgive and forget', 2, 'Fogiveness', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 'Are you Healthy?', 3, 'Health Tips', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 'Oceans ', 8, 'Oceans', '', '2019-07-20 20:38:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_programme`
--

CREATE TABLE `activity_programme` (
  `activity_program_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `assessment_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_parameter_criteria`
--

CREATE TABLE `assessment_parameter_criteria` (
  `assessment_parameter_criteria_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `parameter_criteria_name` varchar(255) NOT NULL,
  `parameter_criteria_value` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `isPresent` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `isPresent`, `programme_id`, `mentor_id`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 1, 2, 1, '2019-07-20 23:28:06', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 2, 0, 2, 1, '2019-07-20 23:28:06', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `mentor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`mentor_id`, `user_id`, `prog_id`, `batch`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 2, 'MORNING', '2019-07-20 21:13:52', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 14, 2, 'MORNING', '2019-07-21 01:34:27', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 16, 2, 'MORNING', '2019-07-21 01:55:53', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 17, 2, 'MORNING', '2019-07-21 02:00:13', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 18, 2, 'MORNING', '2019-07-21 02:02:34', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mentor_programme`
--

CREATE TABLE `mentor_programme` (
  `mentor_programme_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_programme`
--

INSERT INTO `mentor_programme` (`mentor_programme_id`, `user_id`, `programme_id`, `batch`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 2, 'morning', '2019-07-20 21:34:02', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `parameter_id` int(11) NOT NULL,
  `parameter_name` varchar(255) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `programme_id` int(11) NOT NULL,
  `programme_name` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`programme_id`, `programme_name`, `created_on`, `created_by`, `deleted_by`, `deleted_on`, `is_deleted`, `updated_by`, `updated_on`) VALUES
(1, 'BEGINNER', '2019-07-20 18:00:28', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 'FOUNDATION', '2019-07-20 18:00:28', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(3, 'TRANSIT', '2019-07-20 18:00:28', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(4, 'DISCOVERY', '2019-07-20 18:00:28', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(5, 'DREAM', '2019-07-20 18:00:28', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(6, 'LEARNING CENTER 1', '2019-07-20 20:27:46', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(7, 'LEARNING CENTER 2', '2019-07-20 20:27:46', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(8, 'LEARNING CENTER 3', '2019-07-20 20:27:46', 1, 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `savings_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_iby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savings_isdue`
--

CREATE TABLE `savings_isdue` (
  `savings_isdue_id` int(11) NOT NULL,
  `savings_id` int(11) NOT NULL,
  `month_amount` varchar(255) NOT NULL,
  `is_due` int(2) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `starchart`
--

CREATE TABLE `starchart` (
  `starchart_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `param_criteria_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `starchart_parameter`
--

CREATE TABLE `starchart_parameter` (
  `starchart_parameter_id` int(11) NOT NULL,
  `starchart_parameter_name` varchar(255) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `starchart_parameter_criteria`
--

CREATE TABLE `starchart_parameter_criteria` (
  `starchart_parameter_criteria_id` int(11) NOT NULL,
  `starchart_parameter_id` int(11) NOT NULL,
  `starchart_parameter_criteria_name` varchar(255) NOT NULL,
  `starchart_parameter_criteria_value` varchar(10) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_first_name` varchar(255) NOT NULL,
  `student_last_name` varchar(255) NOT NULL,
  `student_school` varchar(255) NOT NULL,
  `student_batch` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_first_name`, `student_last_name`, `student_school`, `student_batch`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Rohan', 'Shah', 'Army Public School', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Raj', 'Shah', 'Army Public School', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Roshan', 'Shah', 'Army Public School', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Shubham', 'Gawde', 'BMC Vidhyalaya', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Anokhi', 'Gawde', 'BMC Vidhyalaya', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Riya', 'Shah', 'Army Public School', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'Raj', 'Shah', 'Army Public School', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 'Roshan', 'Pujari', 'Army Public School', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 'Shreya', 'Gawde', 'BMC Vidhyalaya', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 'Anaya', 'Gawde', 'BMC Vidhyalaya', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 'Aksha', 'Shah', 'Army Public School', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 'Alana', 'Pande', 'Army Public School', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(13, 'Sanya', 'Shah', 'Army Public School', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 'Sonya', 'Gawde', 'BMC Vidhyalaya', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(15, 'Suhani', 'Gupta', 'BMC Vidhyalaya', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(16, 'Riya', 'Shah', 'Army Public School', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(17, 'Rahul', 'Kumar', 'Army Public School', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(18, 'Supriya', 'Mehta', 'Army Public School', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(19, 'Shreya', 'Pawar', 'BMC Vidhyalaya', 'Evening', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(20, 'Amaya', 'Pande', 'BMC Vidhyalaya', 'Morning', '2019-07-20 20:13:21', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_programme`
--

CREATE TABLE `student_programme` (
  `student_programme_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_at` int(11) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `deleted_by` datetime NOT NULL,
  `deleted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_programme`
--

INSERT INTO `student_programme` (`student_programme_id`, `student_id`, `programme_id`, `created_on`, `created_by`, `updated_on`, `updated_at`, `is_deleted`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 2, '2019-07-20 21:11:56', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 2, 2, '2019-07-20 21:11:56', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 3, 1, '2019-07-20 21:12:16', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 4, 4, '2019-07-20 21:12:16', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Cleanliness', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Forgiveness', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Health', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Honesty', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Earth', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Solar System', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'Social Awareness', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 'Oceans', '2019-07-20 20:31:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(255) DEFAULT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` text,
  `user_role_id` int(11) DEFAULT NULL,
  `is_first_login` int(11) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `deleted_on` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_gender`, `user_phone`, `user_email`, `user_password`, `user_role_id`, `is_first_login`, `created_on`, `created_by`, `updated_on`, `updated_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Aakash ', 'Narang', 'Male', '9820197746', 'aakashnarang@gmail.com', 'aakashpass', 1, 0, '2019-07-20 20:02:52', 1, '2019-07-20 20:02:52', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Aashish ', 'Narang', 'Male', '9820197746', 'aashishnarang@gmail.com', 'aashishpass', 2, 0, '2019-07-20 20:03:58', 1, '2019-07-20 20:03:58', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Alok', 'Shah', 'Male', '9820187767', 'alokshah@gmail.com', 'alokshah', 3, 0, '2019-07-20 20:07:05', 1, '2019-07-20 20:07:05', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Anmol', 'Shah', 'Male', '9834187767', 'anmolshah@gmail.com', 'anmolshah', 3, 0, '2019-07-20 20:08:03', 1, '2019-07-20 20:08:03', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Shobha', 'Hande', 'Female', '9833181607', 'shobhahande@gmail.com', 'shobhahande', 2, 0, '2019-07-20 20:09:42', 1, '2019-07-20 20:09:42', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Aditi', 'Hande', 'Female', '9823181607', 'aditihande@gmail.com', 'shobhahande', 2, 0, '2019-07-20 20:10:25', 1, '2019-07-20 20:10:25', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'Aneri', 'Gupta', 'Female', '9823181609', 'nerigupta@gmail.com', 'nerigupta', 2, 0, '2019-07-20 20:10:25', 1, '2019-07-20 20:10:25', 0, 0, '0000-00-00 00:00:00', 0),
(8, NULL, NULL, NULL, NULL, '123@gmail.com', NULL, 2, 0, '2019-07-21 01:09:58', NULL, '2019-07-21 01:09:58', NULL, NULL, NULL, NULL),
(17, 'Dhiren', 'Chotwani', 'Male', '9898856040', 'dhirenchotwani@gmail.com', 'abc', 2, 0, '2019-07-21 02:00:13', 1, '2019-07-21 02:00:13', NULL, 0, NULL, NULL),
(18, 'Ashok', 'Chotwani', 'Male', '9898856040', 'chotwanidhirendc@gmail.com', 'ABC', 2, 0, '2019-07-21 02:02:33', 1, '2019-07-21 02:02:33', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_type`
--

CREATE TABLE `user_role_type` (
  `user_role_type_id` int(11) NOT NULL,
  `user_role_type_name` varchar(255) NOT NULL,
  `user_hierarchy` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `deleted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role_type`
--

INSERT INTO `user_role_type` (`user_role_type_id`, `user_role_type_name`, `user_hierarchy`, `created_by`, `created_on`, `updated_by`, `updated_on`, `is_deleted`, `deleted_by`, `deleted_on`) VALUES
(1, 'ADMIN', 1, 0, '2019-07-20 16:51:58', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(2, 'MENTOR', 2, 1, '2019-07-20 16:51:58', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(3, 'VOLUNTEER', 3, 1, '2019-07-20 16:54:12', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `activity_programme`
--
ALTER TABLE `activity_programme`
  ADD PRIMARY KEY (`activity_program_id`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`assessment_id`);

--
-- Indexes for table `assessment_parameter_criteria`
--
ALTER TABLE `assessment_parameter_criteria`
  ADD PRIMARY KEY (`assessment_parameter_criteria_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`mentor_id`);

--
-- Indexes for table `mentor_programme`
--
ALTER TABLE `mentor_programme`
  ADD PRIMARY KEY (`mentor_programme_id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`parameter_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`programme_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`savings_id`);

--
-- Indexes for table `savings_isdue`
--
ALTER TABLE `savings_isdue`
  ADD PRIMARY KEY (`savings_isdue_id`);

--
-- Indexes for table `starchart`
--
ALTER TABLE `starchart`
  ADD PRIMARY KEY (`starchart_id`);

--
-- Indexes for table `starchart_parameter`
--
ALTER TABLE `starchart_parameter`
  ADD PRIMARY KEY (`starchart_parameter_id`);

--
-- Indexes for table `starchart_parameter_criteria`
--
ALTER TABLE `starchart_parameter_criteria`
  ADD PRIMARY KEY (`starchart_parameter_criteria_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_programme`
--
ALTER TABLE `student_programme`
  ADD PRIMARY KEY (`student_programme_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role_type`
--
ALTER TABLE `user_role_type`
  ADD PRIMARY KEY (`user_role_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `activity_programme`
--
ALTER TABLE `activity_programme`
  MODIFY `activity_program_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessment_parameter_criteria`
--
ALTER TABLE `assessment_parameter_criteria`
  MODIFY `assessment_parameter_criteria_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `mentor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mentor_programme`
--
ALTER TABLE `mentor_programme`
  MODIFY `mentor_programme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `programme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `savings_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savings_isdue`
--
ALTER TABLE `savings_isdue`
  MODIFY `savings_isdue_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `starchart`
--
ALTER TABLE `starchart`
  MODIFY `starchart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `starchart_parameter`
--
ALTER TABLE `starchart_parameter`
  MODIFY `starchart_parameter_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `starchart_parameter_criteria`
--
ALTER TABLE `starchart_parameter_criteria`
  MODIFY `starchart_parameter_criteria_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_programme`
--
ALTER TABLE `student_programme`
  MODIFY `student_programme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_role_type`
--
ALTER TABLE `user_role_type`
  MODIFY `user_role_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
