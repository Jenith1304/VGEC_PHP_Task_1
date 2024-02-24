-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 01:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vgec_php_task_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `Fname` varchar(150) NOT NULL,
  `Lname` varchar(150) NOT NULL,
  `Email Address` varchar(250) NOT NULL,
  `Phone Number` varchar(120) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `City` varchar(150) NOT NULL,
  `State` varchar(150) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  `Password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Fname`, `Lname`, `Email Address`, `Phone Number`, `Gender`, `City`, `State`, `Zip`, `Password`) VALUES
(8, 'sscsc', 'scdfsf', '12345@gmail.com', '9978449197', 'Male', 'ahmedavbad', 'gujarat', '380001', '456'),
(7, 'sscsc', 'scdfsf', '1234@gmail.com', '456', 'Male', 'ahmedavbad', 'gujarat', '38000', '456'),
(1, 'Mital', 'Panchal', '123@gmail.com', '9978449197', 'Female', 'ahmedavbad', 'gujarat', '380001', '456'),
(6, 'Mital', 'Panchal', '456@gmail.com', '9978', 'Male', 'ahmedavbad', 'gujarat', '380001', '456'),
(3, 'Mital', 'Panchal', 'bookatplaybox7@gmail.com', '9978449197', 'Female', 'ahmedavbad', 'gujarat', '380001', '2306'),
(4, 'Salman', 'Khan', 'jenithpanchal1304@gmail.com', '9978449197', 'Male', 'ahmedavbad', 'gujarat', '380001', '1304'),
(2, 'Jenith', 'Panchal', 'minakanupanchal@gmail.com', '9978449197', 'Male', 'Ahmedabad', 'gujarat', '380001', '789');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `Task Heading` varchar(150) NOT NULL,
  `Task Description` varchar(150) NOT NULL,
  `Task Date` varchar(150) NOT NULL,
  `Email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `Task Heading`, `Task Description`, `Task Date`, `Email`) VALUES
(3, 'Learn AJAX', 'FROM Yahoo BABA', '17/02/24', 'minakanupanchal@gmail.com'),
(6, 'Learn React', 'Harry', '2024-02-24', 'minakanupanchal@gmail.com'),
(7, 'Learn React', 'Harry', '2024-02-24', 'minakanupanchal@gmail.com'),
(9, 'Hello', 'nknk', '2222-02-01', 'minakanupanchal@gmail.com'),
(23, 'Hello', 'Hello World', '2004-04-13', 'minakanupanchal@gmail.com'),
(24, 'Dada', 'Dada hai tu yahan ka?', '2004-04-13', 'minakanupanchal@gmail.com'),
(25, 'Pray', 'Go Temple and pRAY', '17-02-2024', 'bookatplaybox7@gmail.com'),
(30, 'xyz', 'sdsdsd', '1111-11-11', 'minakanupanchal@gmail.com'),
(31, 'Dada', 'Dada hai tu yahan ka?', '2004-04-13', 'bookatplaybox7@gmail.com'),
(32, 'Movie', 'Sultan Shoot at mumbai', '2014-12-14', 'jenithpanchal1304@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Email Address`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `registration` (`Email Address`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
