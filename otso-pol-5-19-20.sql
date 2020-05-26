-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2020 at 01:22 PM
-- Server version: 5.5.65-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paulodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `encryption`
--

CREATE TABLE `encryption` (
  `encryptionkey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encryption`
--

INSERT INTO `encryption` (`encryptionkey`) VALUES
('otso');

-- --------------------------------------------------------

--
-- Table structure for table `guest_register`
--

CREATE TABLE `guest_register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `idgiven` varchar(20) NOT NULL,
  `contactnum` varchar(11) NOT NULL,
  `guestcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_register`
--

INSERT INTO `guest_register` (`id`, `firstname`, `middlename`, `lastname`, `email`, `date`, `purpose`, `idgiven`, `contactnum`, `guestcode`) VALUES
(20, 'ad', 'Caesar', 'Daman', 'dinogomez118@gmail.com', '0312-12-03', 'School Tour', 'Goverment', '0913-533-23', '2906CC'),
(21, 'Marco', 'Caesar', 'Daman', 'dinogomez118@gmail.com', '2003-12-31', 'School Tour', 'School ID', '0913-533-23', 'NU7224'),
(22, 'Marco', 'Caesar', 'Daman', 'dinogomez118@gmail.com', '2003-12-31', 'School Tour', 'School ID', '0913-533-23', '9MC080');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `permission` int(1) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`permission`, `id`, `username`, `password`, `firstName`, `middleName`, `lastName`) VALUES
(0, 1, 'admin', 'admin', '', '', ''),
(0, 3, 'devnet-pol', 'devnet', '', '', ''),
(1, 4, '201801017', 'power', 'Dino Paulo', 'Reyes', 'Gomez'),
(0, 6, '201801018', 'power', 'Jack', 'Severus', 'Sparrow');

-- --------------------------------------------------------

--
-- Table structure for table `user_school_visit`
--

CREATE TABLE `user_school_visit` (
  `id` int(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateOfVisit` date NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `idType` varchar(50) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `guestcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_school_visit`
--

INSERT INTO `user_school_visit` (`id`, `firstName`, `middleName`, `lastName`, `email`, `dateOfVisit`, `purpose`, `idType`, `contactNumber`, `guestcode`) VALUES
(39, '', '', '', '', '0000-00-00', '', '', '0', ''),
(40, 'Dino Paulo', 'Reyes', 'Gomez', 'Marco@gmail.com', '2003-12-31', 'School Tour', 'Goverment', '913', '2S0Y17'),
(41, 'Dino Paulo', 'Reyes', 'Gomez', 'dinogomez118@gmail.com', '2020-05-23', 'Event', 'Driver License', '932', '2K720R');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(30) NOT NULL,
  `username` varchar(80) NOT NULL,
  `token` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `username`, `token`) VALUES
(23, 'admin', '67454deRv12nj6S04'),
(25, 'devnet-pol', 'A927C8rW37Sk8l674'),
(26, '201801017', '8YqFT3981iB83u527'),
(27, '201801018', '0qw4fh2Y508L789O6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest_register`
--
ALTER TABLE `guest_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_school_visit`
--
ALTER TABLE `user_school_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest_register`
--
ALTER TABLE `guest_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_school_visit`
--
ALTER TABLE `user_school_visit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
