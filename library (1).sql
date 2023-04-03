-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 07:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admmmin', 'admin@gmail.com', 'admin', 'f925916e2754e5e03f75dd58a5733251', '2021-01-06 07:35:56'),
(4, 'naufal', 'naaful', 'tester', 'Test@123', '2021-01-17 15:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `reqbook`
--

CREATE TABLE `reqbook` (
  `id` int(1) NOT NULL,
  `ReqTitle` varchar(100) DEFAULT NULL,
  `ReqAuthor` varchar(100) DEFAULT NULL,
  `ReqVersion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reqbook`
--

INSERT INTO `reqbook` (`id`, `ReqTitle`, `ReqAuthor`, `ReqVersion`) VALUES
(1, 'eletronik', '13th edition', NULL),
(9, 'bio', 'kimi', '11th'),
(10, 'lk', 'no', '12th'),
(11, 'BM', 'james', '13th'),
(12, 'dada', 'sss', 'ss'),
(13, 'dada', 'sss', 'ss'),
(14, 'Computer Programming', 'HEHE', '11th');

-- --------------------------------------------------------

--
-- Table structure for table `reqthesis`
--

CREATE TABLE `reqthesis` (
  `id` int(11) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `id` int(1) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `LecturesID` int(100) DEFAULT NULL,
  `Location` varchar(100) NOT NULL,
  `Borrowers` varchar(100) DEFAULT NULL,
  `Availability` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`id`, `Title`, `LecturesID`, `Location`, `Borrowers`, `Availability`) VALUES
(1, 'Statistic 10th Edition', 1, 'in my Lab', 'izzul', '0'),
(2, 'Web and Database 11th Edition', 1, 'mungkin di hati', 'non', '1'),
(4, 'Kimia', 2, 'at the table of borrower', 'koi', '1'),
(5, 'bio', 1, 'free', 'dd', '0'),
(12, 'adsad', 0, 'dsd', 'ddd', NULL),
(13, 'Arsenal', 0, '', 'koi', NULL),
(15, 'Computer', 12, 'kat kotak', '', '1'),
(16, 'CEl2103', 12, '-', '-', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblfyp`
--

CREATE TABLE `tblfyp` (
  `id` int(1) NOT NULL,
  `FYPName` varchar(150) DEFAULT NULL,
  `Location` varchar(29) DEFAULT NULL,
  `borrower` varchar(100) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfyp`
--

INSERT INTO `tblfyp` (`id`, `FYPName`, `Location`, `borrower`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(28, 'Low cost modular home monitoring infrastructure using Raspberry PI and Arduino (2019)', '411', 'dsdds', 0, '2021-01-19 01:21:11', '2021-01-20 07:34:28'),
(29, ' ZINC - Online Assignment Submission & Automatic Grader System (2019)', '404', 'hihi', 1, '2021-01-19 01:21:42', '2021-01-20 07:34:38'),
(30, 'Automated Vision-based Wellness Analysis of Elderly Care Center Citizens (2020)', '409', '', 0, '2021-01-19 01:22:03', '2021-01-20 06:40:23'),
(31, 'Establishing a virtual classroom. (2020)', '405', NULL, 1, '2021-01-19 01:22:30', '2021-01-19 13:49:33'),
(32, 'AI Chatbot Solution for e-Learning Environments (2020)', '407', NULL, 1, '2021-01-19 12:21:44', '2021-01-19 13:49:43'),
(33, 'Attendance systems for students in remote locations (2020)', '412', NULL, 1, '2021-01-19 12:22:35', '2021-01-19 13:49:52'),
(34, 'saya ', 'Bilik ', NULL, 1, '2021-01-19 15:03:24', '2021-01-19 15:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbllecturers`
--

CREATE TABLE `tbllecturers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllecturers`
--

INSERT INTO `tbllecturers` (`id`, `FullName`, `UserName`, `MobileNumber`, `Password`, `RegDate`, `UpdationDate`) VALUES
(1, 'naufal', 'naaufl', '123', '202cb962ac59075b964b07152d234b70', '2021-01-17 16:00:23', '2021-01-18 15:19:37'),
(2, 'ahmad', 'ahmad', '123', 'f925916e2754e5e03f75dd58a5733251', '2021-01-18 14:58:21', '2021-01-18 18:07:23'),
(3, 'ahmad naufal ', 'ahmadnaufal', '123', '202cb962ac59075b964b07152d234b70', '2021-01-18 18:16:16', '2021-01-20 07:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(3, 'SID009', 'naaufl', 'test@gmail.com', '2359874527', 'f925916e2754e5e03f75dd58a5733251', 1, '2017-07-11 15:58:28', '2021-01-20 06:38:59'),
(12, 'SID014', 'syahir', 'syahir@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 1, '2021-01-24 05:11:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblthesis`
--

CREATE TABLE `tblthesis` (
  `id` int(11) NOT NULL,
  `Title` varchar(60) DEFAULT NULL,
  `Author` varchar(60) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqbook`
--
ALTER TABLE `reqbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqthesis`
--
ALTER TABLE `reqthesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfyp`
--
ALTER TABLE `tblfyp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllecturers`
--
ALTER TABLE `tbllecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `tblthesis`
--
ALTER TABLE `tblthesis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reqbook`
--
ALTER TABLE `reqbook`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reqthesis`
--
ALTER TABLE `reqthesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblfyp`
--
ALTER TABLE `tblfyp`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbllecturers`
--
ALTER TABLE `tbllecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblthesis`
--
ALTER TABLE `tblthesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
