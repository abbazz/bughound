-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 03:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bughound`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `aid` int(11) NOT NULL,
  `program_name` varchar(30) NOT NULL,
  `area_name` varchar(30) NOT NULL,
  `version` int(5) NOT NULL,
  `prog_release` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`aid`, `program_name`, `area_name`, `version`, `prog_release`) VALUES
(38, 'Skyrim', 'Menu', 1, '1'),
(39, 'Skyrim', 'Launcher', 1, '1'),
(40, 'Skyrim', 'Riften', 1, '1'),
(41, 'Skyrim', 'Falkreath', 1, '1'),
(42, 'Bughound', 'Logon', 1, '1'),
(43, 'Bughound', 'Start', 1, '1'),
(44, 'Bughound', 'DB Maintenance', 1, '1'),
(45, 'Bughound', 'Search', 1, '1'),
(46, 'Bughound', 'Insert  New', 1, '1'),
(47, 'Bughound', 'Search Results', 1, '1'),
(48, 'Bughound', 'Add Edit Areas', 1, '1'),
(49, 'Bughound', 'Add Employees', 1, '1'),
(50, 'Bughound', 'Add Programs', 1, '1'),
(51, 'Bughound', 'View Bugs', 1, '1'),
(52, 'Visual Ada95', 'Lexer', 1, '1'),
(53, 'Visual Ada95', 'Parser', 1, '1'),
(54, 'Visual Ada95', 'Code Generator', 1, '1'),
(55, 'Visual Ada95', 'Linker', 1, '1'),
(56, 'Visual Ada95', 'Lexer', 1, '2'),
(57, 'Visual Ada95', 'Parser', 1, '2'),
(58, 'Visual Ada95', 'Code Generator', 1, '2'),
(59, 'Visual Ada95', 'Linker', 1, '2'),
(60, 'Visual Ada95', 'Lexer', 2, '1'),
(61, 'Visual Ada95', 'Parser', 2, '1'),
(62, 'Visual Ada95', 'Code Generator', 2, '1'),
(63, 'Visual Ada95', 'Linker', 2, '1'),
(64, 'Visual Ada95', 'IDE', 2, '1'),
(65, 'Pascal Cdoer', 'Lexer', 1, '1'),
(66, 'Pascal Cdoer', 'Parser', 1, '1'),
(67, 'Pascal Cdoer', 'Code Generator', 1, '1'),
(68, 'Pascal Cdoer', 'Linker', 1, '1'),
(69, 'Pascal Cdoer', 'IDE', 1, '1'),
(70, 'Word Writer 2011', 'Editor', 1, '1'),
(71, 'Word Writer 2011', 'Spell Checker', 1, '1'),
(72, 'Word Writer 2011', 'Dynodraw', 1, '1'),
(73, 'Word Writer 2011', 'Formulaor', 1, '1'),
(74, 'MapStar 7', 'Menu', 7, '1'),
(75, 'MapStar 7', 'Router', 7, '1'),
(76, 'MapStar 7', 'Datbase', 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `attch_id` int(12) NOT NULL,
  `bug_id` int(12) NOT NULL,
  `file_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `bug_id` int(5) NOT NULL,
  `program_type` varchar(25) NOT NULL,
  `report_type` varchar(20) DEFAULT NULL,
  `severity` varchar(20) DEFAULT NULL,
  `prob_summary` varchar(100) NOT NULL,
  `problem` varchar(300) NOT NULL,
  `suggest_fix` varchar(250) NOT NULL,
  `reported_by` varchar(32) NOT NULL,
  `report_date` date NOT NULL,
  `status` varchar(12) NOT NULL,
  `resolved_by` varchar(32) NOT NULL,
  `resolve_date` date NOT NULL,
  `tested_by` varchar(32) NOT NULL,
  `tested_date` date NOT NULL,
  `funct_area` varchar(30) DEFAULT NULL,
  `assigned_to` varchar(30) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `priority` varchar(15) DEFAULT NULL,
  `resolution` varchar(30) DEFAULT NULL,
  `resolution_version` int(30) DEFAULT NULL,
  `version` int(5) DEFAULT NULL,
  `prog_release` varchar(10) DEFAULT NULL,
  `attachment` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(12) NOT NULL,
  `emp_name` varchar(32) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userlevel` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_name`, `username`, `password`, `userlevel`) VALUES
(1, 'Pip', 'Pip123', '123', 3),
(2, 'Brutus', 'Brutus123', '123456', 1),
(19, 'Timmy', 'timmy!', '123', 3),
(20, 'Jorge', 'jorge', '123', 3),
(21, 'Hanna', 'smith', '123', 2),
(22, 'Johann Gomblepuddy', 'johang', '123', 1),
(23, 'Louis XIV', 'leroisoleil', '123', 2),
(24, 'Brenda', 'jonesbrenda', '123', 1),
(25, 'Prakish', 'smithp', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(10) NOT NULL,
  `program_name` varchar(30) NOT NULL,
  `version` int(5) NOT NULL,
  `prog_release` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `version`, `prog_release`) VALUES
(16, 'Skyrim', 1, '1'),
(17, 'Bughound', 1, '1'),
(18, 'Visual Ada95', 1, '1'),
(19, 'Visual Ada95', 1, '2'),
(20, 'Visual Ada95', 2, '1'),
(21, 'Pascal Cdoer', 1, '1'),
(22, 'Word Writer 2011', 1, '1'),
(23, 'MapStar 7 ', 7, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attch_id`),
  ADD KEY `bug_id` (`bug_id`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`bug_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `bug_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
