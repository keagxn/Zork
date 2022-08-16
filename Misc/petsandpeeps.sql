-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 06:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petsandpeeps`
--

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `user_id` int(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `dob` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`user_id`, `first`, `last`, `email`, `phone`, `dob`) VALUES
(1, 'Carol', 'Baskin', 'lockemup@gm', '(813) 216-3', '22-3-1983'),
(2, 'Elon', 'Musk', 'god@gmail.c', '(440) 650-3', '-3-4-1990'),
(3, 'Bruh', 'Man', 'Bigfella@gm', '(860) 511-4', '1-2-1990'),
(4, 'Ricardo', 'Milos', 'bruuuuuuuh@', '(550) 300-1', '2-3-1991'),
(5, 'John', 'Wick', 'hellojohn@g', '(526) 688-0', '11-11-2000'),
(6, 'Jon', 'Cena', 'invisible@g', '(699) 225-6', '12-12-1995'),
(7, 'Joe', 'Exotic', 'freejoe@gma', '(771) 249-9', '3-3-1983'),
(8, 'Ninja', 'Ligma', 'ded@gmail.c', '(862) 883-9', '1-1-2000'),
(9, 'Adam', 'Sandler', 'good@gmail.', '(599) 658-6', '1-1-1891'),
(10, 'Tyler', 'Durdin', '1strule@gma', '(318) 687-0', '1-1-1999'),
(11, 'Carol', 'Baskin', 'lockemup@gmail.com', '(813) 216-3744', '22-3-1983'),
(12, 'Elon', 'Musk', 'god@gmail.com', '(440) 650-3081', '-3-4-1990'),
(13, 'Bruh', 'Man', 'Bigfella@gmail.com', '(860) 511-4048', '1-2-1990'),
(14, 'Ricardo', 'Milos', 'bruuuuuuuh@gmail.com', '(550) 300-1050', '2-3-1991'),
(15, 'John', 'Wick', 'hellojohn@gmail.com', '(526) 688-0403', '11-11-2000'),
(16, 'Jon', 'Cena', 'invisible@gmail.com', '(699) 225-6868', '12-12-1995'),
(17, 'Joe', 'Exotic', 'freejoe@gmail.com', '(771) 249-9287', '3-3-1983'),
(18, 'Ninja', 'Ligma', 'ded@gmail.com', '(862) 883-9777', '1-1-2000'),
(19, 'Adam', 'Sandler', 'good@gmail.com', '(599) 658-6812', '1-1-1891'),
(20, 'Tyler', 'Durdin', '1strule@gmail.com', '(318) 687-0983', '1-1-1999');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `name`, `dob`) VALUES
(1, 'Darth Vada', '1-1-1990'),
(2, 'Absolute Monkey', '3-4-1990'),
(3, 'Gru', '1-2-1990'),
(4, 'Scott Pilgrim', '5-5-2005'),
(5, 'Arthur Fleck', '11-11-1891'),
(6, 'Ethan Hunt', '12-5-1995'),
(7, 'Rosarch', '3-7-1983'),
(8, 'Dominik', '1-8-2001'),
(9, 'Connor 4 Real', '1-1-1993'),
(10, 'Dpoe', '1-1-2011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
