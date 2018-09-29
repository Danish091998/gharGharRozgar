-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2018 at 02:28 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7078476_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `companyRegister`
--

CREATE TABLE `companyRegister` (
  `ID` int(11) NOT NULL,
  `PHONE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PHONESEC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CITY` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LOGOIMAGE` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `COURSE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `COURSE`, `CAT`) VALUES
(1, 'B.Tech/B.E.', 0),
(2, 'M.Tech', 1),
(3, 'B.Sc.', 0),
(4, 'M.Sc.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `ID` int(11) NOT NULL,
  `EDUCATION` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`ID`, `EDUCATION`) VALUES
(1, '12th'),
(2, 'Under Graduate'),
(3, 'Post Graduate');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `ID` int(11) NOT NULL,
  `FIELD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CAT` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`ID`, `FIELD`, `CAT`) VALUES
(1, 'CSE', 'B.Tech/B.E.'),
(2, 'IT', 'B.Tech/B.E.'),
(3, 'Mathematics', 'B.Sc.'),
(4, 'Mathematics', 'M.Sc.'),
(5, 'Physics', 'B.Sc.'),
(6, 'Physics', 'M.Sc.'),
(7, 'Food Technology', 'M.Tech'),
(8, 'Microelectronics', 'M.Tech'),
(9, 'CSE', 'M.Tech');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `ID` int(11) NOT NULL,
  `JOB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COURSE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FIELD` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORG` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `INFO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MINMARKS` float NOT NULL,
  `SALARY` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ROLE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EMPTYPE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CITY` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`ID`, `JOB`, `COURSE`, `FIELD`, `ORG`, `INFO`, `ADDRESS`, `MINMARKS`, `SALARY`, `ROLE`, `EMPTYPE`, `CITY`) VALUES
(1, 'Waiter', '0', '0', 'King Restaurant', 'Waiter required for Restaurant, no degree required. Contact +91987654321 for info', 'King Restaurant, Maqsudan Chownk, Jalandhar', 0, '', '', '', ''),
(2, 'Mathematics Teacher', 'M.Sc.', 'Mathematics', 'ABC Public School', 'Math teacher required for classes 6th to 10th', 'ABC Public School, OPP. Fortis Hospital, Nakodar Chowk Jalandhar', 75, '', '', '', ''),
(3, 'Mathematics Teacher', 'B.Sc.', 'Mathematics', 'ABC Public School', 'Math teacher required for classes 6th to 10th', 'ABC Public School, OPP. Fortis Hospital, Nakodar Chowk Jalandhar', 80, '', '', '', ''),
(4, 'Receptionist', '0', '0', 'Alpha Academy', 'No Information Given.', 'Alpha Academy, Near Lovely Dhaba, Football Chowk, Jalandhar', 0, '', '', '', ''),
(5, 'Physics Teacher', 'M.Sc.', 'Physics', 'ABC Public School', 'Physics teacher required for classes 6th to 10th', 'ABC Public School, OPP. Fortis Hospital, Nakodar Chowk Jalandhar', 75, '', '', '', ''),
(6, 'Physics Teacher', 'B.Sc.', 'Physics', 'ABC Public School', 'Physics teacher required for classes 6th to 10th', 'ABC Public School, OPP. Fortis Hospital, Nakodar Chowk Jalandhar', 80, '', '', '', ''),
(7, 'Software Engineer', 'B.Tech/B.E.', 'CSE', 'Techno Jalandhar', 'Min SGPA: 7.0, Languages required: Java or C++', 'Techno, Ansal Building Second Floor, Near Guru Gobind Singh Stadium, Jalandhar', 65, '', '', '', ''),
(8, 'Software Engineer', 'B.Tech/B.E.', 'IT', 'Techno Jalandhar', 'Min SGPA: 7.0, Languages required: Java or C++', 'Techno, Ansal Building Second Floor, Near Guru Gobind Singh Stadium, Jalandhar', 65, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `ID` int(11) NOT NULL,
  `LOCATION` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`ID`, `LOCATION`) VALUES
(1, 'Jalandhar'),
(2, 'Ludhiana'),
(3, 'Amritsar'),
(4, 'Bathinda'),
(5, 'Ambala');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profilepic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`ID`, `name`, `email`, `password`, `phone`, `city`, `education`, `percentage`, `course`, `field`, `profilepic`, `gender`, `birthDate`) VALUES
(22, 'aaa', 'a', '$2y$10$8kkFHADB/GdeCW94Pd21.e1eEXEWwQC/2esJORIZkDPv1EwB8f.au', '123', 'Jalandhar', '12th', '80', '0', '0', '', '', '0000-00-00'),
(23, 'Gulshan Kumar', 'virajkumar508@gmail.com', '$2y$10$IzPnn2HfTV8TLI3tGkMxyujQyhGEWb.WFSmnrOb9MHka/7OfOhmWm', '9876864549', 'Jalandhar', 'Under Graduate', '100', 'B.Tech/B.E.', 'CSE', '', '', '0000-00-00'),
(24, 'bodycon', 'gujnv', '$2y$10$6EtpMq788LnIyuoVm6vyI.aSOwiaOftPP8yJ5U0g6ImsY1abM0tT6', '867599', 'Jalandhar', '12th', '85', '0', '0', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companyRegister`
--
ALTER TABLE `companyRegister`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companyRegister`
--
ALTER TABLE `companyRegister`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
