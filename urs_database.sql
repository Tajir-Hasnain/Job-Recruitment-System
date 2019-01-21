-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2019 at 08:54 AM
-- Server version: 5.7.24-0ubuntu0.18.10.1
-- PHP Version: 7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `adminid` int(11) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `adminid`, `password`) VALUES
('root', 1, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `sid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`sid`, `jobid`, `cid`) VALUES
(3, 2, 1),
(3, 3, 2),
(5, 3, 2),
(3, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comjob`
--

CREATE TABLE `comjob` (
  `cid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `postname` text NOT NULL,
  `postdate` date NOT NULL,
  `expdate` date NOT NULL,
  `jobdes` text NOT NULL,
  `display` int(1) NOT NULL,
  `applied` int(11) NOT NULL DEFAULT '0',
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comjob`
--

INSERT INTO `comjob` (`cid`, `jobid`, `postname`, `postdate`, `expdate`, `jobdes`, `display`, `applied`, `slot`) VALUES
(1, 2, 'asd', '2017-06-07', '2019-06-17', '', 1, 0, 5),
(2, 3, 'Software Developer', '2017-07-16', '2017-07-20', '', 0, 0, 0),
(2, 14, 'junior secretary', '2017-07-16', '2017-08-01', 'good', 1, 0, 0),
(1, 15, ',qjn', '2017-07-19', '2017-01-01', '32sd132', 1, 0, 0),
(1, 16, 'asd', '2017-07-25', '2017-07-14', 'asdasd', 1, 0, 0),
(2, 17, 'teacher', '2017-07-25', '2018-01-01', 'aaaaaa', 1, 0, 0),
(1, 18, 'Baal', '2019-01-21', '2020-01-01', 'Chudachudi', 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cid` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(15) NOT NULL,
  `companydescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyname`, `email`, `cid`, `username`, `password`, `companydescription`) VALUES
('root', 'someone@something.com', 1, 'root', 'root', 'bla bla bla'),
('TigerIT', 'abc@gmail.com', 2, 'tiger', 'root', 'We build Software');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `roll` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `university` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `result` float NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fathername` text NOT NULL,
  `mothername` text NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `number` int(12) NOT NULL,
  `depertment` text NOT NULL,
  `level` int(11) NOT NULL,
  `c` int(1) NOT NULL DEFAULT '0',
  `java` int(1) NOT NULL DEFAULT '0',
  `python` int(1) NOT NULL DEFAULT '0',
  `golang` int(1) NOT NULL DEFAULT '0',
  `php` int(1) NOT NULL DEFAULT '0',
  `android` int(1) NOT NULL DEFAULT '0',
  `webdev` int(1) NOT NULL DEFAULT '0',
  `servermanagement` int(1) NOT NULL DEFAULT '0',
  `ai` int(1) NOT NULL DEFAULT '0',
  `sysadmin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`firstname`, `lastname`, `roll`, `sid`, `university`, `email`, `result`, `username`, `password`, `fathername`, `mothername`, `gender`, `dob`, `address`, `number`, `depertment`, `level`, `c`, `java`, `python`, `golang`, `php`, `android`, `webdev`, `servermanagement`, `ai`, `sysadmin`) VALUES
('Tajir', 'Hasnain', 1604081, 6, 'CUET', 'u1604081@student.cuet.ac.bd', 3.35, 'root', 'root', 'Syed Nasimul Hasnain', 'Nishat Parvin', 'male', '1997-09-12', '61,Pathantuly Road,Chittagong', 1732096889, 'CSE', 2, 1, 1, 1, 0, 1, 1, 1, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`jobid`,`sid`);

--
-- Indexes for table `comjob`
--
ALTER TABLE `comjob`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comjob`
--
ALTER TABLE `comjob`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
