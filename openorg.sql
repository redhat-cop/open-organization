-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2019 at 02:20 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openorg`
--

-- --------------------------------------------------------

--
-- Table structure for table `open_data`
--

CREATE TABLE `open_data` (
  `id` int(3) NOT NULL,
  `user` varchar(100) NOT NULL,
  `client` varchar(50) NOT NULL,
  `project` varchar(100) NOT NULL,
  `rhEmail` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(20) DEFAULT NULL,
  `lob` varchar(100) NOT NULL,
  `o1` float NOT NULL,
  `o2` float NOT NULL,
  `o3` float NOT NULL,
  `o4` float NOT NULL,
  `o5` float NOT NULL,
  `d1` float NOT NULL,
  `d2` float NOT NULL,
  `d3` float NOT NULL,
  `d4` float NOT NULL,
  `d5` float NOT NULL,
  `hash` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `share` varchar(3) NOT NULL DEFAULT 'on',
  `contact` varchar(3) NOT NULL DEFAULT 'on',
  `comments` text DEFAULT NULL,
  `comments_transparency` text DEFAULT NULL,
  `comments_inclusivity` text DEFAULT NULL,
  `comments_adaptability` text DEFAULT NULL,
  `comments_collaboration` text DEFAULT NULL,
  `comments_community` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `uuid`, `lastUpdate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin User', '', '2019-08-07 14:05:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `open_data`
--
ALTER TABLE `open_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `open_data`
--
ALTER TABLE `open_data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
