-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 03:11 PM
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
-- Database: `db_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reserveID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `reserve_date_from` date DEFAULT NULL,
  `reserve_date_to` date DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `room_capacity` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reserveID`, `name`, `phone`, `reserve_date_from`, `reserve_date_to`, `room_type`, `room_capacity`, `payment_type`) VALUES
(29, 'France', '09286166542', '2024-04-04', '2025-01-02', 'Regular', 'Single', 'Cash'),
(30, 'France', '09286166542', '2024-04-04', '2025-01-02', 'Regular', 'Single', 'Cash'),
(31, 'France', '06265926', '2024-03-03', '2025-01-02', 'Regular', 'Single', 'Cash'),
(32, 'France', '06265926', '2024-03-03', '2025-01-02', 'Regular', 'Single', 'Cash'),
(33, 'France', '06265926', '2024-03-03', '2025-01-02', 'Regular', 'Single', 'Cash'),
(34, 'France', '06265926', '2024-02-01', '2024-02-03', 'Regular', 'Single', 'Cash'),
(35, 'France', '06265926', '2024-02-01', '2024-02-03', 'Regular', 'Single', 'Cash'),
(36, 'France', '09051911267', '2024-01-02', '2024-02-03', 'De Luxe', 'Single', 'Check'),
(37, 'France', '06265926', '2024-01-01', '2024-01-04', 'Suite', 'Family', 'Cash'),
(38, 'France', 'asdasfasda', '2025-01-03', '2025-01-03', 'Suite', 'Family', 'Cash'),
(39, 'France', '06265926', '2025-01-01', '2025-01-07', 'De Luxe', 'Single', 'Credit Card'),
(40, 'Les', 'asdasfasda', '2026-01-01', '2026-03-06', 'De Luxe', 'Single', 'Credit Card'),
(41, 'France', '06265926', '2024-01-05', '2024-02-04', 'Suite', 'Family', 'Credit Card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reserveID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reserveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
