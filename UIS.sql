-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2013 at 05:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `UIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `access_lvl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `pwd`, `access_lvl`) VALUES
('admin1', 'Prasad Naik', 'admin123', 2),
('admin2', 'Subba Rayudu', 'admin', 2),
('com1', 'Seshagiri', 'seshu123', 4),
('com2', 'Nabi Rasool', 'nabi123', 4),
('com3', 'Kutti', 'kutti123', 4),
('com4', 'Subbu', 'subbu123', 4),
('fac1', 'Satyanandaram', 'satya123', 3),
('fac2', 'Tariq', 'tariq123', 3),
('fac4', 'Raghu', 'raghu123', 3),
('R091057', 'B VARUN KUMAR REDDY', 'varun123', 1),
('R091071', 'Pavan', 'pavan123', 1),
('R091178', 'Janardhan', 'jan123', 1),
('R092004', 'A Charan', 'charan123', 1),
('R092401', 'Sreekanth Y', 'sri123', 1),
('R092415', 'Mahesh', 'nani123', 1),
('R092416', 'P Sai Ram', 'sairam', 1),
('R092417', 'Pramodh', 'kaka123', 1),
('R092425', 'Dinesh', 'dinnu.iiit', 1),
('R092749', 'B Babu Reddy', 'babu123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `phone_num`, `mail_id`, `type`) VALUES
('admin1', 'Prasad Naik', '9916745723', 'prasad.naik@gmail.com', 'notices'),
('admin2', 'Subbarayudu', '8787763746', 'subbu.rayudu123@gmail.com', 'database');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `ansr_id` varchar(10) NOT NULL,
  `ques_id` varchar(10) NOT NULL,
  `posted_by` varchar(10) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer` text NOT NULL,
  PRIMARY KEY (`ques_id`,`posted_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ansr_id`, `ques_id`, `posted_by`, `posted_on`, `answer`) VALUES
('ans11', 'ques1', 'R091057', '2013-02-25 18:00:50', 'software quality'),
('ans12', 'ques1', 'R092749', '2013-02-20 18:29:01', 'It''s a measure of software performance.'),
('ans22', 'ques2', 'R091057', '2013-02-25 18:01:10', '4 tupled'),
('ans21', 'ques2', 'R092416', '2013-02-20 18:29:10', '4 Types they are Type 0,Type 1,Type 2,and Type 3'),
('ans31', 'ques3', 'R091057', '2013-02-20 18:29:18', 'Its a testing process which done at each individual module leval'),
('ans52', 'ques5', 'R092749', '2013-02-20 18:29:39', '3 gates'),
('ans61', 'ques6', 'R091057', '2013-03-03 16:08:33', '7 Tupled.');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `fac_id` varchar(10) NOT NULL,
  `class` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `present` text NOT NULL,
  `absent` text NOT NULL,
  PRIMARY KEY (`fac_id`,`class`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`fac_id`, `class`, `date`, `present`, `absent`) VALUES
('FAC1', 'Sigma7', '2013-03-01', 'R091057,R091426,R092004,', 'R092416,R092749,R0927499,'),
('FAC1', 'Sigma7', '2013-03-03', 'R091057,R092004,R092416,R092749,R0927499,', 'R091426,'),
('FAC1', 'Sigma7', '2013-03-04', 'R091057,R092004,R092416,R092749,', ''),
('facID', 'Sigma7', '2013-02-26', 'R091426,R092004,R092416,R0927499,', 'R091057,R092749,');

-- --------------------------------------------------------

--
-- Table structure for table `branchsub`
--

CREATE TABLE IF NOT EXISTS `branchsub` (
  `branch` varchar(20) NOT NULL,
  `subjects` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchsub`
--

INSERT INTO `branchsub` (`branch`, `subjects`) VALUES
('CSE', 'FLAT-ISE-SCLD-PSP'),
('ECE', 'AEC-PSP-DOA-SS'),
('MME', 'MM-MT-NFEM-IE'),
('CE', 'DOA-IE-SA-WR'),
('MEC', 'DOM-IE-FM-PDA'),
('CHEM', 'CT-IE-MAT4-HT');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `com_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`com_id`, `name`, `photo`, `mail_id`, `phone_num`) VALUES
('com1', 'Sheshagiri', '', 'seshu@gmail.com', '9912345611'),
('com2', 'Nabi Rasool', '', 'nabir@gmail.com', '9919478128'),
('com3', 'Kutti', '', 'kutti@gmail.com', '9912367844'),
('com4', 'Subbu', '', 'subbu23@gmail.com', '999999999');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `stu_id` varchar(10) NOT NULL,
  `exam_id` varchar(10) NOT NULL,
  `marks` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`stu_id`,`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`stu_id`, `exam_id`, `marks`, `rank`) VALUES
('R092749', 'exam_1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `conducted_by` varchar(10) NOT NULL,
  `key` varchar(100) NOT NULL,
  `conducted_on` date NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `subject`, `conducted_by`, `key`, `conducted_on`) VALUES
('exam_1', 'PDS', 'fac1', '1,2,0,0,1,0,1,0,3,1,0,3,2,2,0,1,2,0,0,2,0,2,0,1,1', '2013-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fac_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `name`, `subject`, `branch`, `photo`, `mail_id`, `phone_num`) VALUES
('fac1', 'Satyanandaram', 'ISE', 'CSE', '', 'satya.ram@gmail.com', '9912345678'),
('fac2', 'Tariq', 'FLAT', 'CSE', '', 'tariq.md@gmail.com', '9999912345'),
('fac4', 'Raghu', 'SCLD', 'CSE', '', 'raghu123@gmail.com', '9123450678');

-- --------------------------------------------------------

--
-- Table structure for table `internal_marks`
--

CREATE TABLE IF NOT EXISTS `internal_marks` (
  `fac_id` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `stu_id` varchar(10) NOT NULL,
  `exam` varchar(10) NOT NULL,
  `marks` int(3) NOT NULL,
  PRIMARY KEY (`fac_id`,`class`,`stu_id`,`exam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internal_marks`
--

INSERT INTO `internal_marks` (`fac_id`, `subject`, `class`, `stu_id`, `exam`, `marks`) VALUES
('FAC1', 'Subject', 'Sigma7', 'R091057', 'CAT1', 2),
('FAC1', 'Subject', 'Sigma7', 'R091057', 'CAT2', 3),
('FAC1', 'Subject', 'Sigma7', 'R091057', 'CAT3', 3),
('FAC1', 'Subject', 'Sigma7', 'R091426', 'CAT1', 3),
('FAC1', 'Subject', 'Sigma7', 'R091426', 'CAT2', 4),
('FAC1', 'Subject', 'Sigma7', 'R091426', 'CAT3', 4),
('FAC1', 'Subject', 'Sigma7', 'R092004', 'CAT1', 4),
('FAC1', 'Subject', 'Sigma7', 'R092004', 'CAT2', 5),
('FAC1', 'Subject', 'Sigma7', 'R092004', 'CAT3', 5),
('FAC1', 'Subject', 'Sigma7', 'R092416', 'CAT1', 5),
('FAC1', 'Subject', 'Sigma7', 'R092416', 'CAT2', 5),
('FAC1', 'Subject', 'Sigma7', 'R092416', 'CAT3', 5),
('FAC1', 'Subject', 'Sigma7', 'R092749', 'CAT1', 5),
('FAC1', 'Subject', 'Sigma7', 'R092749', 'CAT2', 5),
('FAC1', 'Subject', 'Sigma7', 'R092749', 'CAT3', 5),
('FAC1', 'Subject', 'Sigma7', 'R0927499', 'CAT1', 1),
('FAC1', 'Subject', 'Sigma7', 'R0927499', 'CAT2', 5),
('FAC1', 'Subject', 'Sigma7', 'R0927499', 'CAT3', 1),
('facID', 'Subject', 'Sigma10', 'R092701', 'cat2', 2),
('facID', 'Subject', 'Sigma10', 'R092745', 'cat2', 3),
('facID', 'Subject', 'Sigma7', 'R091057', 'cat2', 0),
('facID', 'Subject', 'Sigma7', 'R091426', 'cat2', 1),
('facID', 'Subject', 'Sigma7', 'R092004', 'cat2', 2),
('facID', 'Subject', 'Sigma7', 'R092416', 'cat2', 3),
('facID', 'Subject', 'Sigma7', 'R092749', 'cat2', 4),
('facID', 'Subject', 'Sigma7', 'R0927499', 'cat2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
  `notice_id` varchar(10) NOT NULL,
  `to` text NOT NULL,
  `from` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notice` text NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `to`, `from`, `time`, `notice`) VALUES
('notice1', 'R091058-R091056-R091061-R091062-R091057-R091060', 'com1', '2013-02-20 04:01:47', 'This is a test notice'),
('notice2', 'R091069-R091068-R091071-R091057-R091062-R091061-R091058', 'com2', '2013-02-19 04:10:59', 'This is one more test notice'),
('notice3', 'R091058-R091056', 'com1', '2013-02-20 04:03:31', 'This notice is to cross check'),
('notice4', 'all', 'fac1', '2013-02-26 05:55:23', 'First Notice from faculty......'),
('notice5', 'all_students', 'fac1', '2013-02-26 05:55:37', 'Second Notice from Faculty.....'),
('notice6', 'R091057', 'fac1', '2013-02-26 05:56:58', 'Notce from facutly to A single student.......'),
('notice7', 'all_students', 'fac1', '2013-02-26 05:58:31', 'Second notice to all students.....'),
('notice8', 'R091057', 'fac1', '2013-03-03 09:43:29', 'Notice 2 to r091057'),
('notice9', 'admin1', 'R091057', '2013-03-04 14:43:18', 'To Check-From Student');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `ques_id` varchar(10) NOT NULL,
  `question` text NOT NULL,
  `subject` varchar(50) NOT NULL,
  `posted_by` varchar(10) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` varchar(10) NOT NULL,
  PRIMARY KEY (`ques_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ques_id`, `question`, `subject`, `posted_by`, `posted_on`, `branch`) VALUES
('ques1', 'What is meant by Software Quality', 'ISE', 'R092416', '2013-02-20 18:19:55', 'CSE'),
('ques2', 'How many types of grammer''s are there', 'FLAT', 'R092749', '2013-02-20 17:55:01', 'CSE'),
('ques3', 'What is meant by Unit Testing ', 'ISE', 'R092004', '2013-02-20 17:56:42', 'CSE'),
('ques4', 'What is meant by Software life cycle model and what is its use', 'ISE', 'R091057', '2013-02-20 17:56:42', 'CSE'),
('ques5', 'Minimum number of nand gates requiered to construct XOR gate?', 'SCLD', 'R091057', '2013-02-20 18:09:52', 'CSE'),
('ques6', 'Turing machine accepts how many tupled language?', 'FLAT', 'R092416', '2013-02-20 18:09:52', 'CSE'),
('ques7', 'Can any one tell me What exactly the Use of Flip Flops', 'SCLD', 'R091057', '2013-02-26 04:41:27', 'CSE'),
('ques8', 'What is meant by updown counter', 'SCLD', 'R091057', '2013-03-03 20:44:51', 'CSE'),
('ques9', 'How to convert a binary bumber into hexadecimal', 'SCLD', 'R092004', '2013-03-03 20:45:43', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `nss` int(11) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `name`, `class`, `branch`, `course`, `dob`, `address`, `photo`, `mail_id`, `phone_num`, `nss`) VALUES
('R091057', 'B VARUN KUMAR REDDY', 'Sigma7', 'CSE', 'E2', '1995-03-22', 'H No:130,Mahabubnagar,Andhra Pradesh,India,509002.', '', 'varun123@gmail.com', '8500571057', 1),
('R091071', 'Pavan', 'Sigma10', 'CSE', 'E2', '1994-03-22', 'Sigma10', '', 'pavan123@gmail.com', '9848012346', 0),
('R092004', 'A Charan Kumar', 'Sigma7', 'CSE', 'E2', '1994-06-12', 'H No:2004,\r\nChittor,\r\nAndhra Pradesh,\r\nIndia,\r\n509005.', '', 'charan123@gmail.com', '9999992004', 1),
('R092401', 'Sreekanth Y', 'Sigma7', 'CSE', 'E2', '1994-05-13', 'Sigma7', '', 'sri123@gmail.com', '9848123987', 1),
('R092415', 'Mahesh', 'Sigma10', 'CSE', 'E2', '1994-03-22', 'Sigma10', '', 'nani123@gmail.com', '9876543210', 0),
('R092416', 'P Sai Ram', 'Sigma7', 'CSE', 'E2', '1994-05-13', 'H No:2541,\r\nKhammam,\r\nAndhra Pradesh,\r\nIndia,\r\n509003.', '', 'sai123@gmail.com', '9924162541', 0),
('R092417', 'Pramodh', 'S7', 'ECE', 'E2', '1994-03-09', 'S7', '', 'pramodh123@gmail.com', '9440123456', 1),
('R092425', 'Dinesh', 'Sigma8', 'CSE', 'E2', '1993-06-10', 'Hyd', '', 'dinu.iiit@gmail.com', '8500202425', 0),
('R092749', 'B Babu Reddy', 'Sigma7', 'CSE', 'E2', '1994-04-06', 'H No:2749,\nChittor,\nAndhra Pradesh,\nIndia,\n509004.', '', 'babu123@gmail.com', '9999992749', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
