-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 09:56 PM
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
-- Database: `db_lighthouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `page_rating` int(11) DEFAULT NULL,
  `devices` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `fullname`, `email`, `page_rating`, `devices`, `comment`) VALUES
(1, 'Jane Victoria Munoz', 'janevictoriamunoz@gmail.com', 0, 'SmartPhone', 'yes'),
(2, 'Jane Victoria Munoz', 'janevictoriamunoz@gmail.com', 0, 'SmartPhone', 'yes'),
(3, 'Jane Victoria Munoz', 'janevictoriamunoz@gmail.com', 10, 'Tablet, Other', 'thank you'),
(4, 'Jane Victoria Munoz', 'janevictoriamunoz@gmail.com', 7, 'Desktop', 'Thank you!'),
(5, 'Jane Victoria Munoz', 'janevictoriamunoz@gmail.com', 7, 'Desktop', 'Thank you!'),
(6, 'Diether Urdas', 'diether@gmail.com', 7, 'Tablet, SmartPhone', 'Thank you');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','done') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `category`, `status`) VALUES
(1, 'Cookies & Cream', 100.00, 'PASTRIES', 'available'),
(2, 'Sneakies', 100.00, 'PASTRIES', 'available'),
(3, 'Classic Choco Chip', 100.00, 'PASTRIES', 'available'),
(4, 'Red Velvet Cheesecake', 110.00, 'PASTRIES', 'available'),
(5, 'Biscookie', 110.00, 'PASTRIES', 'available'),
(6, 'Double Dark Chocolate', 110.00, 'PASTRIES', 'available'),
(7, 'Ham & Cheese Croissant', 110.00, 'PASTRIES', 'available'),
(8, 'Kouign Amann', 110.00, 'PASTRIES', 'available'),
(9, 'Pain Au Chocolat', 110.00, 'PASTRIES', 'available'),
(10, 'Cheese Puff', 124.00, 'PASTRIES', 'available'),
(11, 'Turron Croissant', 130.00, 'PASTRIES', 'available'),
(12, 'Americano', 55.00, 'HOT COFFEE', 'available'),
(13, 'Espresso', 50.00, 'HOT COFFEE', 'available'),
(14, 'Cappuccino', 70.00, 'HOT COFFEE', 'available'),
(15, 'Latte', 70.00, 'HOT COFFEE', 'available'),
(16, 'Mocha', 70.00, 'HOT COFFEE', 'available'),
(17, 'Cioccolata Calda', 80.00, 'HOT COFFEE', 'available'),
(18, 'Cafe Shakerato', 60.00, 'COLD COFFEE', 'available'),
(19, 'Cappuccino Freddo', 90.00, 'COLD COFFEE', 'available'),
(20, 'Mochaccino Freddo', 95.00, 'COLD COFFEE', 'available'),
(21, 'Cioccolata Freddo', 85.00, 'COLD COFFEE', 'available'),
(22, 'Earl Grey', 50.00, 'TEA', 'available'),
(23, 'English Breakfast', 50.00, 'TEA', 'available'),
(24, 'Green Tea', 50.00, 'TEA', 'available'),
(25, 'Double Chocolate Chip', 90.00, 'ICE BLENDED', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `userID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`userID`, `fullname`, `email`, `password`, `address`, `phone_number`) VALUES
(1, 'Eidrian', 'Eidrian@gmail.com', '$2y$10$A0/1ERpsP5OEkKAegelidev1cLBle7MEGoFirr7SYTt46u7QmWB5K', '906 Marinduque St. Pitogo, Taguig City', '09286166542'),
(2, 'Larl Cabrera', 'cabrerafrance@gmail.com', '$2y$10$VSA.h9GtZLit7DhK82pTf.ARFFQ6vAC/vfojQnzZvNNcP2zsmusle', '906 Marinduque St. Pitogo, Taguig City', '09286166542'),
(3, 'Pranses', 'prans@gmail.com', '$2y$10$yacb8duK75e2vJKhta3k5.y5jOYqF5mzvdqSXTGaHlBfqw5DVu6ju', '906 Marinduque St. Pitogo, Taguig City', '09286166542'),
(4, 'Jane Victoria Munoz', 'janevictoriamunoz@gmail.com', '$2y$10$T83Nd61UDW4i0Njw.zFxfO1cPNAGUekMWIEHJN/1xTznxG9QkiqRK', '906 Marinduque St. Pitogo, Taguig City', '09286166542'),
(7, 'Jane Admin', 'janeLH@admin.com', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFUpy5s5y5y5y5y5y5y5y5y5y5y5y5y', 'Admin Address', '1234567890'),
(8, 'Jane Employee', 'janeLH@employee.com', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFUpy5s5y5y5y5y5y5y5y5y5y5y5y', 'Employee Address', '0987654321'),
(9, 'France Eidrian B. Cabrera', 'france@gmail.com', '$2y$10$8XOS2LXIBjiXnV2UbKBHturolkZ1Fw1nypB49lM1o7b/f8DlpC/2G', '906 Marinduque St. Pitogo, Taguig City', '09286166542'),
(10, 'Diether Urdas', 'diether@gmail.com', '$2y$10$MrXNurxO8kOI2NIlJOgwy.DRsf20EsK2O1YJ9AO0kXUa49Yq4CdMS', '906 Marinduque St. Pitogo, Taguig City', '09286166542');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `orderlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_account` (`userID`),
  ADD CONSTRAINT `orderlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
