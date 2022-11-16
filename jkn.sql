-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 08:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkn`
--
CREATE DATABASE IF NOT EXISTS `jkn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jkn`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nicename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `nicename`) VALUES
(1, 'CLOTHES', 'Clothes'),
(2, 'SHOES', 'Shoes'),
(3, 'TECH', 'Technology'),
(4, 'BOOK', 'Book');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `code` varchar(72) NOT NULL,
  `status` enum('created','applied') NOT NULL DEFAULT 'created'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `profile_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `flag` enum('none','discount') NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `status` enum('cart','paid','shipped') NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `state` enum('used','new') NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `status` enum('selling','sold') NOT NULL DEFAULT 'selling'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `profile_id`, `name`, `description`, `price`, `quantity`, `state`, `category_id`, `image`, `status`) VALUES
(57, 22, 'Jordan 1 University Red', 'The Air Jordan 1 is one of the most influential and memorable models in the history of sneakers. Transcending the game', 300, 2, 'new', 2, '63741ea10bf2f.png', 'selling'),
(58, 22, 'Air Force 1', 'Designed by Bruce Kilgore and introduced in 1982, the Air Force 1 was the first ever basketball shoe to feature Nike ', 120, 1, 'new', 2, '63741e0f36df9.png', 'selling'),
(59, 37, 'Coding for dummies', 'Helps with code', 40, 3, 'new', 4, '63741f31057a8.jpg', 'selling'),
(60, 37, 'Lakers Jersey', '50th edition', 100, 3, 'new', 1, '63741fbc9ee07.png', 'selling');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `password_hash` varchar(72) NOT NULL,
  `role` enum('buyer','seller') NOT NULL DEFAULT 'seller',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `username`, `first_name`, `last_name`, `postal_code`, `city`, `password_hash`, `role`, `image`) VALUES
(21, 'Mia', 'Mia', 'Bernardo', 'H7Y2C4', 'Laval', '$2y$10$TDBPkz/zpzkyRPt9L5KHnuX2qKZ2qt49kzkKS6lzj0GttbSowgto2', 'buyer', '637198ab659d6.jpg'),
(22, 'Julien', 'Julien', 'Bernardo', 'H7Y2C4', 'Laval', '$2y$10$SaYMZEBEQG0Zxo/4ft9pVOBPm5iYAQD.XRergI6EbnP7WA3wnOsTO', 'seller', '6371cccd3881d.png'),
(30, 'Olivia', 'Julien', 'Bernardo', 'H7Y2C4', 'Laval', '$2y$10$6KYxHkCqiGSuj5d7caoDDuaVEwr4G6enOJUZt4WcP5a4KJXCIparu', 'buyer', '636ff197b5e08.jpg'),
(37, 'Spiky', 'Spiky', 'Bernardo', 'H7Y2C4', 'Laval', '$2y$10$qtXqCqn.jJeoTx7MpDt.ae/9WWCHDckVNaw27P8.tA.5tS36kwQLS', 'seller', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`),
  ADD KEY `discount_to_profile` (`profile_id`),
  ADD KEY `discount_to_message` (`message_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_to_product` (`product_id`),
  ADD KEY `message_to_profile` (`profile_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_to_profile` (`profile_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `order_detail_to_detail` (`order_id`),
  ADD KEY `order_detail_to_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_to_profile` (`profile_id`),
  ADD KEY `product_to_category` (`category_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_to_message` FOREIGN KEY (`message_id`) REFERENCES `message` (`message_id`),
  ADD CONSTRAINT `discount_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `message_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_to_detail` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_detail_to_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_to_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
