-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2019 at 04:43 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teleshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(150) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userType` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text CHARACTER SET utf8mb4 NOT NULL,
  `profileImage` varchar(150) NOT NULL,
  `authToken` varchar(255) NOT NULL,
  `deviceType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:Browser,1:Android,2:Ios',
  `deviceToken` varchar(255) NOT NULL,
  `socialId` varchar(255) NOT NULL,
  `socialType` varchar(255) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `isVerify` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1: vefify',
  `approval` tinyint(4) NOT NULL DEFAULT '0',
  `crd` date NOT NULL,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `userName`, `userType`, `password`, `contact`, `address`, `profileImage`, `authToken`, `deviceType`, `deviceToken`, `socialId`, `socialType`, `latitude`, `longitude`, `status`, `isVerify`, `approval`, `crd`, `upd`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 1, '$2y$10$OVRmd0jhPtXb3t29FQbn5elpiNQ4jC1xvvP/wtqYNG1D4Y7hZFeEW', '', '', '', 'a6f0c5e3e413cd1bb5dfcdd42a00e40c89bd5aa3', 0, '', '', '', 0.000000, 0.000000, 1, 0, 0, '0000-00-00', '2019-04-15 12:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `userType`
--

CREATE TABLE `userType` (
  `id` int(6) NOT NULL,
  `userType` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userType`
--

INSERT INTO `userType` (`id`, `userType`, `status`) VALUES
(1, 'Super Admin', 1),
(2, 'Agent', 1),
(3, 'Dispatcher ', 1),
(4, 'Marketing', 1),
(5, 'Customer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userType`
--
ALTER TABLE `userType`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userType`
--
ALTER TABLE `userType`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
