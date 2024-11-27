-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reservationsmillares`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservationmillares`
--

CREATE TABLE `reservationmillares` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `reserve_date` date DEFAULT NULL,
  `reserve_date_to` date DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `room_capacity` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservationmillares`
--

INSERT INTO `reservationmillares` (`Id`, `name`, `phone`, `reserve_date`, `reserve_date_to`, `room_type`, `room_capacity`, `payment_type`) VALUES
(1, 'Migui Millares', '06265926', '2025-03-04', '2025-03-07', 'Suite', 'Single', 'Cash'),
(2, 'Migui Millares', '06265926', '2025-03-04', '2025-03-07', 'Suite', 'Single', 'Cash'),
(3, 'Migui Millares', '06265926', '2025-03-04', '2025-03-07', 'Suite', 'Single', 'Cash'),
(4, 'Migui Millares', '09286166542', '2024-03-13', '2024-03-15', 'De Luxe', 'Single', 'Credit Card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservationmillares`
--
ALTER TABLE `reservationmillares`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservationmillares`
--
ALTER TABLE `reservationmillares`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
