-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2016 at 08:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lead`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow_up`
--

CREATE TABLE IF NOT EXISTS `follow_up` (
`folup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `folup_date` date NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_up`
--

INSERT INTO `follow_up` (`folup_id`, `user_id`, `lead_id`, `folup_date`, `feedback`) VALUES
(1, 11, 3, '2016-01-28', 'ikolkndsjncslj'),
(2, 2, 1, '2016-01-28', 'hvhvjvvj'),
(3, 2, 1, '2016-01-28', 'jvjvmnbmvnbcv');

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE IF NOT EXISTS `lead` (
`id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_student` int(1) NOT NULL,
  `managed_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `status_id`, `semester_id`, `is_active`, `is_student`, `managed_by`, `created_at`, `updated_at`) VALUES
(1, 'Bishal', 'Bhandari', 'ww@hgjsdf.com', '98989898', 'Kathmandu', 1, 1, 1, 0, 2, '2016-01-28', '2016-01-29'),
(2, 'Bishesh', 'Bhandari', 'insomniackid_bishal@yahoo.com', '98989898', 'hgfjgh', 1, 1, 1, 0, 2, '2016-01-28', '2016-01-30'),
(3, 'Srijan', 'Karki', 'jjjh@ymail.com', '98989898', 'Kathmandu', 4, 1, 1, 0, 11, '2016-01-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `year`, `name`) VALUES
(1, '2015', 'Autum'),
(2, '2016', 'Spring');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Active'),
(2, 'Expired'),
(3, 'Dismissed'),
(4, 'Postponed'),
(5, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created` varchar(15) NOT NULL,
  `updated` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `phone_no`, `address`, `role`, `status`, `created`, `updated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Srijan', 'Karki', 'srijankarki@outlook.com', '9841939716', '________TOP _______ Secret  ________1100011_______0011_ERROR', 'admin', 1, '1451749591', '1451891151'),
(2, 'c1', 'a9f7e97965d6cf799a529102a973b8b9', 'James', 'Bond', 'bond@james.com', '12345678', 'test', 'counselor', 1, '1451797596', ''),
(11, 'bishalb', '1adb27fabdfee91e29a94e3fb02e08bc', 'James', 'Donald', 'bishal.bhandari.c6@gmail.com', '9849711272', 'Kathmandu', 'counselor', 1, '1453998060', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow_up`
--
ALTER TABLE `follow_up`
 ADD PRIMARY KEY (`folup_id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow_up`
--
ALTER TABLE `follow_up`
MODIFY `folup_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
