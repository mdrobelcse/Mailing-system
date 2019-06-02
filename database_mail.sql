-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 09:07 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_mail`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminuser` varchar(50) NOT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpass` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminuser`, `adminemail`, `adminpass`, `role`) VALUES
(5, 'Editor', 'editor@gmail.com', '123', 2),
(8, 'sohel', 'sohel@gmail.com', '123', 2),
(10, 'admin', 'admin@gmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_draft`
--

CREATE TABLE `tbl_draft` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_draft`
--

INSERT INTO `tbl_draft` (`id`, `userid`, `sub`, `msg`) VALUES
(1, 16, 'php programming', 'msg'),
(2, 16, 'java', 'msg'),
(3, 16, 'draft messge', 'msg'),
(4, 16, 'draft messge 2', '<p>dammy draf message</p>\r\n'),
(5, 15, 'object oriented programmin', '<p>draft</p>\r\n'),
(8, 16, 'android application', '<p>android apps</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `msgid` int(11) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `tomail` varchar(255) NOT NULL,
  `fromemail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`msgid`, `sub`, `msg`, `tomail`, `fromemail`) VALUES
(2, 'object oriented programmin part 2', '<p>dammy text .......</p>\r\n', 'robel@gmail.com', 'sohel@gmail.com'),
(3, 'object oriented programmin part 3', '<p>dammy text threee</p>\r\n', 'robel@gmail.com', 'sohel@gmail.com'),
(5, 'c programmin', '<p>dammy text dammy text dammy text dammy text dammy text</p>\r\n', 'sohel@gmail.com', 'robel@gmail.com'),
(6, 'c# programmin', '<p>dammy text dammy text dammy text dammy text</p>\r\n', 'sohel@gmail.com', 'robel@gmail.com'),
(8, 'object oriented programmin', '<p>asdfasdf</p>\r\n', 'sohel@gmail.com', 'robel@gmail.com'),
(11, 'android application', '<p>android applications</p>\r\n', 'robel@gmail.com', 'sohel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `email`, `password`) VALUES
(15, 'Robel ahammed', 'robel@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(16, 'Sohel ahammed', 'sohel@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_draft`
--
ALTER TABLE `tbl_draft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`msgid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_draft`
--
ALTER TABLE `tbl_draft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `msgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
