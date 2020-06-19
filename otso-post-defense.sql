-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 12:39 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otso`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `description` varchar(255) NOT NULL,
  `timeCreated` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`description`, `timeCreated`, `date`) VALUES
('On Checkout, 466XA7, Lee, Tim', '00:22:49', '2020-06-19'),
('On CheckIn, 9X165H, Consolacion, Ke\\\'an Martin', '00:23:31', '2020-06-19'),
('On Checkout, 9X165H, Consolacion, Ke\\\'an Martin', '00:23:47', '2020-06-19'),
('On CheckIn, B6998N, Consolacion, Ke\\\'an Martin', '00:27:03', '2020-06-19'),
('On Checkout, B6998N, Consolacion, Ke\\\'an Martin', '00:27:17', '2020-06-19'),
('On CheckIn, 2N54D2, Lee, Tim', '00:30:28', '2020-06-19'),
('On Checkout, 2N54D2, Lee, Tim', '00:30:31', '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `check_in_lobby`
--

CREATE TABLE `check_in_lobby` (
  `guestcode` varchar(6) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `typeOfVisitor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `personToMeet` varchar(50) NOT NULL,
  `idgiven` varchar(20) NOT NULL,
  `contactnum` varchar(11) NOT NULL,
  `guestcode` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_register`
--

INSERT INTO `guest_register` (`id`, `firstname`, `middlename`, `lastname`, `email`, `date`, `purpose`, `personToMeet`, `idgiven`, `contactnum`, `guestcode`, `status`) VALUES
(52, 'Owen', 'C.', 'Clamor', 'owenclamor@yahoo.com', '2020-06-12', 'School Tour', '', 'School ID', '', '81C3U6', 'checkedIn'),
(53, 'Tim', 'Berners', 'Lee', 'timbernerslee@gmail.com', '2020-06-18', 'School Tour', '', 'Goverment', '', 'QB0806', 'checkedIn'),
(54, 'Tim', 'Berners', 'Lee', 'timbernerslee@gmail.com', '2020-06-19', 'Registrar', '', 'School ID', '', '466XA7', 'checkedIn'),
(55, 'Ke\\\'an Martin', 'S.', 'Consolacion', 'keanconsolacion@gmail.com', '2020-06-19', 'Registrar', '', 'School ID', '', 'B6998N', 'checkedIn'),
(56, 'Tim', 'Berners', 'Lee', '123123@yahoo.com', '2020-06-19', 'Registrar', '', 'School ID', '', '2N54D2', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
(2, 'adminsecurity', '$2y$10$f8IZ/Hbcfs6kKHfi0.G3/OcJ8exkpysufry3iKE2aoG7XSjo7hFGu', 'Admini', 'S', 'Strator'),
(4, 'kean-student', '$2y$10$uMywBAcGQE0E4jeC0IM01u6gXSKVNEpMZTKFxCG8jDyfvn6Wg7n1G', 'Ke\'an Martin', 'S.', 'Consolacion'),
(2, 'security', '$2y$10$FYcQhFF8KLYY5DwZDWAE7.p8MdVOKVHczXZnDPEWbH8yX8WG6EEvu', 'Tim', 'Berners', 'Lee');

-- --------------------------------------------------------

--
-- Table structure for table `user_school_visit`
--

CREATE TABLE `user_school_visit` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateOfVisit` date NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `personToMeet` varchar(50) NOT NULL,
  `idType` varchar(50) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `guestcode` varchar(6) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `status` varchar(10) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_school_visit`
--

INSERT INTO `user_school_visit` (`id`, `username`, `firstName`, `middleName`, `lastName`, `email`, `dateOfVisit`, `purpose`, `personToMeet`, `idType`, `contactNumber`, `guestcode`, `checkIn`, `checkOut`, `status`) VALUES
(106, 'kean-student', 'Ke\\\'an Martin', 'S.', 'Consolacion', '', '2020-06-12', 'Registrar', '', 'Goverment', '', '08J25C', '0000-00-00', '0000-00-00', 'checkedIn'),
(107, 'kean-student', 'Ke\\\'an Martin', 'S.', 'Consolacion', '', '2020-06-25', 'Registrar', '', 'School ID', '', 'M7U523', '0000-00-00', '0000-00-00', 'checkedIn'),
(108, 'kean-student', 'Ke\\\'an Martin', 'S.', 'Consolacion', '', '2020-06-19', 'Registrar', '', 'School ID', '', '9X165H', '0000-00-00', '0000-00-00', 'complete');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_school_visit`
--
ALTER TABLE `user_school_visit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
