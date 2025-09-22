-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2025 at 01:09 PM
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
-- Database: `timebridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `firstname`, `lastname`, `email`, `contactnumber`, `userid`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '1234567890', 17),
(2, 'Jane', 'Smith', 'smith@gmail.com', '0987654321', 12),
(3, 'Alice', 'Johnson', 'alice@gmail.com', '1122334455', 16);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `shippingaddress` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `userid`, `firstname`, `lastname`, `shippingaddress`, `contactnumber`, `email`) VALUES
(19, 36, 'Sukitha', 'Hettimudalige', '79/A', '0752323543', 'sukithachathuranga@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_amount`, `status`) VALUES
(10, 21, '2025-09-21 13:47:40', 2283.00, 'pending'),
(11, 21, '2025-09-21 14:36:24', 50.00, 'cancelled'),
(12, 21, '2025-09-21 14:47:59', 50.00, 'cancelled'),
(13, 21, '2025-09-21 15:25:26', 2233.00, 'cancelled'),
(14, 21, '2025-09-21 15:38:15', 50.00, 'cancelled'),
(15, 36, '2025-09-22 14:40:11', 50.00, 'cancelled'),
(16, 36, '2025-09-22 15:17:34', 2283.00, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_code`, `quantity`, `price`) VALUES
(16, 11, '12', 1, 50.00),
(17, 12, '12', 1, 50.00),
(18, 13, '123', 1, 2233.00),
(19, 14, '12', 1, 50.00),
(20, 15, '12', 1, 50.00),
(21, 16, '12', 1, 50.00),
(22, 16, '123', 1, 2233.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `diameter` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `strap` varchar(100) NOT NULL,
  `water_resistence` varchar(50) NOT NULL,
  `calibre` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `brand`, `model`, `productcode`, `diameter`, `type`, `material`, `strap`, `water_resistence`, `calibre`, `price`, `quantity`, `image`, `created_at`) VALUES
(30, 'Seiko', '1926 39mm', '12', '39mm', 'Male', 'Steel', 'Leather', 'Waterproof to 100m (330 ft)', 'movement, Calibre T601', 50.00, 90, 'uploads/68ce69ef8ac7c.jpg', '2025-09-20 08:46:39'),
(31, 'Omega', '555', '123', '23', 'Female', 'Plastic', 'Steel', '2233', '1223', 2233.00, 23323, 'uploads/68d129d89c579.jpg', '2025-09-21 06:08:01'),
(32, 'Omega', 'Rendez-Vous 34mm', 'Q34', '26mm', 'Female', 'Steel', 'Steel', '30 M', '898A', 200000.00, 5, 'uploads/68d12a9ab334e.jpg', '2025-09-22 10:53:14'),
(33, 'Seiko', 'BLACK BAY 41mm', 'seik23', '41mm', 'Male', 'Steel', 'Steel', '200 M', 'MT5602-U', 120000.00, 10, 'uploads/68d12b47077e9.jpg', '2025-09-22 10:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `role`) VALUES
(12, 'fffff', '$2y$10$iTtXeht.2W3IGikoiMew2eTq811kchVZndTO9lOnX7WytFDsEbk5m', 'admin'),
(14, 'jhonthamaidon', '$2y$10$MGhVen1.ERYSP74.DXaSt.oEjacsVTlXeqjWpfItw917NQiZZqT9G', 'admin'),
(15, 'fthl123456', '$2y$10$H4Uk6Chz9G5kwPKLGSv7qeQMWvS4NEUfHSCZwbMlKTzFa/7XXF.Km', 'admin'),
(16, 'alison', '$2y$10$mDkH/C8KYULZAUBZOyXQ8eHabtgqLTP5VsVHiMmuw06QrYwrVsauW', 'admin'),
(17, 'asdfghj', '$2y$10$WCsZLsGONBKrAZki56kI/.SMRK58YE/4Krh69xO33wxxDtdeUO8iu', 'admin'),
(21, 'mi', '$2y$10$8Op/ge/BUb4GFLEkwhrTeeEhrgFlJufDqZ1Mb967QX7LyZHUmix/6', 'customer'),
(36, 'suki', '$2y$10$rl0cQiBVMJQ5ZOeGNDjRxuTCxdzDiCtLsz483PCUuzRT2lw2zTS4y', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_admin_user` (`userid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `fk_product_code` (`product_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `productcode` (`productcode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE SET NULL;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_product_code` FOREIGN KEY (`product_code`) REFERENCES `products` (`productcode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
