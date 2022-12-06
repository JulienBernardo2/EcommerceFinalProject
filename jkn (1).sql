-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 07:38 PM
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
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `flag` enum('none','discount') NOT NULL DEFAULT 'none',
  `message` varchar(200) NOT NULL,
  `reply_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `product_id`, `sender_id`, `receiver_id`, `date_time`, `flag`, `message`, `reply_to`) VALUES
(179, 72, 21, 22, '2022-12-01 22:30:45', 'none', 'Hello, is it really w?', NULL),
(180, 73, 21, 22, '2022-12-01 22:31:00', 'none', 'blah blah', NULL),
(181, 72, 21, 22, '2022-12-01 22:31:10', 'none', 'or a?', 179),
(182, 72, 30, 22, '2022-12-01 22:31:31', 'none', 'Is it windy?', NULL),
(183, 73, 30, 22, '2022-12-01 22:31:45', 'none', 'For the win', NULL),
(184, 73, 30, 22, '2022-12-01 22:31:58', 'none', 'Or lose', 183),
(185, 72, 22, 21, '2022-12-01 22:35:14', 'none', 'its a', 181),
(186, 72, 22, 21, '2022-12-01 22:35:27', 'none', 'and b', 185),
(188, 73, 22, 30, '2022-12-01 22:35:58', 'none', 'lose', 184),
(189, 73, 22, 21, '2022-12-01 22:37:42', 'none', 'fuck', 180),
(190, 72, 22, 30, '2022-12-01 22:41:45', 'none', 'no', 182),
(191, 72, 21, 22, '2022-12-05 19:51:57', 'none', 'hEY sexy', 186);

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

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `profile_id`, `status`, `date`, `total`) VALUES
(177, 21, 'paid', '2022-12-01', 223),
(178, 21, 'paid', '2022-12-01', 200),
(179, 21, 'cart', '2022-12-01', 0);

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

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(456, 177, 57, 1, '200'),
(457, 177, 77, 1, '23'),
(458, 178, 57, 1, '200');

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
  `status` enum('selling','sold') NOT NULL DEFAULT 'selling',
  `rating` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `profile_id`, `name`, `description`, `price`, `quantity`, `state`, `category_id`, `image`, `status`, `rating`) VALUES
(57, 22, 'Jordan 1 University Red', 'The Air Jordan 1 is one of the most influential and memorable models in the history of sneakers. Transcending the game', 200, 3, 'new', 2, '638912e0ae0c0.jpg', 'selling', 0),
(59, 37, 'Coding for dummies', 'Helps with code', 40, 0, 'new', 4, '63741f31057a8.jpg', 'sold', 0),
(72, 22, 'w', '1', 1, 9, 'new', 2, '6387e7d8ea6d2.jpg', 'selling', 0),
(73, 22, '1', '1', 1, 1, 'used', 1, '63890937e2413.jpg', 'selling', 0),
(77, 22, 'qwqw', 'wqwqwqwqw', 23, 33, 'used', 1, '63891d87da6fa.jpg', 'selling', 0);

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
(21, 'Mia', 'Mia', 'Bernardo', 'H7Y2C4', 'Lavals', '$2y$10$TDBPkz/zpzkyRPt9L5KHnuX2qKZ2qt49kzkKS6lzj0GttbSowgto2', 'buyer', '637198ab659d6.jpg'),
(22, 'Julien', 'Julien', 'Bernardo', 'H7Y2C4', 'Laval', '$2y$10$SaYMZEBEQG0Zxo/4ft9pVOBPm5iYAQD.XRergI6EbnP7WA3wnOsTO', 'seller', '6371cccd3881d.png'),
(30, 'Olivia', 'Julien', 'Bernardo', 'H7Y2C4', 'Laval', '$2y$10$6KYxHkCqiGSuj5d7caoDDuaVEwr4G6enOJUZt4WcP5a4KJXCIparu', 'buyer', '636ff197b5e08.jpg'),
(37, 'Spiky', 'Spiky', 'Bernardo', 'H7Y2C4', 'Laval', '$2y$10$qtXqCqn.jJeoTx7MpDt.ae/9WWCHDckVNaw27P8.tA.5tS36kwQLS', 'seller', '6384c6a920b18.jpg'),
(120, 'Raphie', 'Raphie', 'Raphie', 'Raphie', 'St Bruno', '$2y$10$4HTX90GHjq/WKE03swQp7O03Qvmuw2eNnEBdK4WaISz.OYS5UBkaG', 'buyer', '6377e6f0242ea.jpg'),
(135, 'test', '', '', '', '', '$2y$10$xJxWZItGj9jnoJXr2aXnu.IepOgJkZjDMMl59eqkomp25v7hnEuv.', 'buyer', ''),
(136, 'q', '', '', '', '', '$2y$10$Sj9Mqw7ix4mOiCTWFYRb7uavKHNnQ4YfyWj23z1n4RbnfvwneUFTi', 'buyer', ''),
(138, 'drake', 'Drake', 'LastName', 'the 6', 'toronto', '$2y$10$l0bfcl0rRpBmNwBbtkYOYeaAlKkwencqfzprc6hV3uEYCwMqgzBAi', 'buyer', '6388ffd882d3d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `r_product_id` int(11) NOT NULL,
  `r_profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `reciever_to_profile` (`receiver_id`),
  ADD KEY `sender_to_profile` (`sender_id`);

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
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`r_product_id`,`r_profile_id`);

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
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
  ADD CONSTRAINT `reciever_to_profile` FOREIGN KEY (`receiver_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `sender_to_profile` FOREIGN KEY (`sender_id`) REFERENCES `profile` (`profile_id`);

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
