-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2020 at 09:44 AM
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

DROP TABLE IF EXISTS `encryption`;
CREATE TABLE IF NOT EXISTS `encryption` (
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

DROP TABLE IF EXISTS `guest_register`;
CREATE TABLE IF NOT EXISTS `guest_register` (
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
(22, 'Marco', 'Caesar', 'Daman', 'dinogomez118@gmail.com', '2003-12-31', 'School Tour', 'School ID', '0913-533-23', '9MC080'),
(23, 'Marco', 'Caesar', 'Daman', 'Marco@gmail.com', '2003-02-13', 'Purpose of Visit', 'Goverment', '0913-533-23', 'I91J16'),
(24, 'Mathias', 'Polo', 'Gomez', 'dinogomez118@gmail.com', '2020-05-09', 'Registrar', 'Driver License', '0913-533-23', 'J8J165'),
(25, 'Mathias', 'Caesar', 'Daman', 'Marco@gmail.com', '3123-12-12', 'School Tour', 'Goverment', '0913-533-23', 'I931U2'),
(26, '', '', '', '', '0000-00-00', '', '', '', ''),
(27, '', '', '', '', '0000-00-00', '', '', '', ''),
(28, '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `permission` int(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`permission`, `username`, `password`, `firstName`, `middleName`, `lastName`) VALUES
(0, '201801018', 'power', 'Jack', 'Severus', 'Sparrow'),
(3, '2018018123', '$2y$10$ywgKhP0swPlFq.CDd30ileN7Gl8BN4UYdmDzt9rcPhX/rzwxEQymG', 'Dino', 'Paulo', 'Gomez'),
(2, '201901010', 'power', 'Jack', 'a', 'Sparrow'),
(1, '202001019', '$2y$10$xZBRyShve.xrRhi9gjPDGeoDHBKt3ixb.5msYXDfey.aiTlAYb7NC', 'Allan', 'Peter', 'Cayatano'),
(3, '202020', 'power', 'Jack', 'a', 'Sparrow'),
(0, 'admin', 'admin', '', '', ''),
(0, 'devnet-pol', 'devnet', '', '', ''),
(2, '201801014', 'rawr', 'Camille', 'Nicole', 'Pascua'),
(1, 'root', 'root', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_school_visit`
--

DROP TABLE IF EXISTS `user_school_visit`;
CREATE TABLE IF NOT EXISTS `user_school_visit` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateOfVisit` date NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `idType` varchar(50) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `guestcode` varchar(6) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_school_visit`
--

INSERT INTO `user_school_visit` (`id`, `username`, `firstName`, `middleName`, `lastName`, `email`, `dateOfVisit`, `purpose`, `idType`, `contactNumber`, `guestcode`, `checkIn`, `checkOut`) VALUES
(64, '', 'Dino Paulo', 'Reyes', 'Gomez', 'Marco@gmail.com', '2003-12-31', 'School Tour', 'School ID', '0913-533-23', 'K841K8', '0000-00-00', '0000-00-00'),
(67, '', 'Dino Paulo', 'Reyes', 'Gomez', 'Marco@gmail.com', '2003-12-31', 'School Tour', 'Goverment', '0913-533-23', 'B86F84', '0000-00-00', '0000-00-00'),
(69, '', '', '', '', '201801017@iacademy.edu.ph', '2020-05-30', 'Registrar', 'School ID', '09132334561', 'IL0314', '0000-00-00', '0000-00-00'),
(75, '', '', '', '', '', '1970-01-01', '', '', '', '', '0000-00-00', '0000-00-00'),
(80, '201801018', 'Jack', 'Severus', 'Sparrow', 'Marco@gmail.com', '2020-05-20', 'School Tour', 'Goverment', '0913-533-23', '01JJ70', '0000-00-00', '0000-00-00'),
(81, '201801018', 'Jack', 'Severus', 'Sparrow', 'ad@gmail.com', '2020-05-30', 'Event', 'Company ID', '0913-533-23', '946GC7', '0000-00-00', '0000-00-00'),
(87, '201801017', 'Dino Paulo', 'Reyes', 'Gomez', 'Marco@gmail.com', '0023-12-31', 'School Tour', 'Goverment', '0913-533-23', '0Q9Z64', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
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
(26, '201801017', '465hVB476n61d86aq'),
(27, '201801018', 'nk3e5X230890Z1gr3');

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
  ADD PRIMARY KEY (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_school_visit`
--
ALTER TABLE `user_school_visit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
