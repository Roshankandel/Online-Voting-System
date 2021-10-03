-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 11:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(100) NOT NULL,
  `a_username` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `a_username`, `a_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `votes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `verified`, `token`, `password`, `photo`, `role`, `status`, `votes`) VALUES
(8, 'Candidate1', 'candidate1@gmail.com', 1, '96318a792797900338cc8d67433c747b5efaa97b1d073d336d17024987f46c04fe199d1c1eea512f8c09084da21aae92d97e', 'candidate1', 'candidate1.jpg', 'candidate', 1, 5),
(10, 'candidate3', 'candidate3@gmail.com', 1, 'e405668c23415352b012e47cfdc7aeb1a0ceea92240b2609485f67647022d513884830f332d688c5b21d255817c92ac4d1a1', 'candidate3', 'candidate3.png', 'candidate', 1, 1),
(12, 'candidate2', 'candidate2@gmail.com', 1, '52c94702f0a76a4a8c6b3cf371c1fc59cf1819c8227b8d9532ac652790c7f3ff26cc8bbe8ca13ceff5f66f934a8d820eb421', 'candidate2', 'candidate2.png', 'candidate', 0, 0),
(14, 'Bishal', 'Bishal@ncit.edu.np', 0, 'ec104579f04df437a00b06bc2443ea247d6fb051fe4752d865d517e91612a8459d46a1f63120c24ad60c5de24e8fbe9050c7', 'bishal', 'user4.jfif', 'voter', 1, 0),
(15, 'Roshan kandel', 'roshan@gmail.com', 1, '8877c5c7338405d4736f843f4f0ea95a6723bfa9cc958c0c4674f711ccb2489f5d4c0d20268c99b145025687feb506b8bf97', 'roshan', 'user1.png', 'voter', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
