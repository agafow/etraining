-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 11:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `did` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `rdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `eid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `enrol_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `staff` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `mobile` double NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `depid` int(11) NOT NULL,
  `rdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `training` (
  `tid` int(11) NOT NULL,
  `trainer` varchar(100) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `nstudents` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `rdate` date NOT NULL,
  `state` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`did`),
  ADD KEY `ins_id` (`ins_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `depid` (`depid`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `project_id` (`project_id`);

ALTER TABLE `departments`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `ins_id` FOREIGN KEY (`ins_id`) REFERENCES `institutions` (`id`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `sid` FOREIGN KEY (`sid`) REFERENCES `staff` (`sid`),
  ADD CONSTRAINT `tid` FOREIGN KEY (`tid`) REFERENCES `training` (`tid`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `dep_id` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`did`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `depid` FOREIGN KEY (`depid`) REFERENCES `departments` (`did`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
