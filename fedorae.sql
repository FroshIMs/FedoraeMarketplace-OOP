-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 07:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fedorae`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard', ''),
(2, 'Administrator', '{\"admin\": 1}'),
(3, 'Seller', '{\"seller\": 2}'),
(4, 'Producer', '{\"producer\": 3}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(18) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `availability` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `price`, `quantity`, `description`, `availability`, `status`, `image`, `user_id`) VALUES
(1, 'Airpods', 'aps11', 49.99, 10, 'The new wireless Airpods.', 'In stock', 1, 'airpods.png', 2),
(2, 'Product Name', 'sdfjygv98hew', 120, 10, 'Some description', 'In Stock', 0, '', 87),
(3, 'Test Product', '423de6yg', 213142, 19, 'Test Product description', 'Out of Stock', 0, '', 87),
(4, 'Test Product', '423de6yg', 213142, 19, 'Test Product description', 'Out of Stock', 0, '', 87);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `user_id`, `created_at`, `image`) VALUES
(1, 'Fedorae.com', 2, '0000-00-00 00:00:00', 'store.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(50) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `joined` datetime NOT NULL DEFAULT current_timestamp(),
  `user_type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `verified`, `joined`, `user_type`, `image`, `terms`) VALUES
(11, 'social', 'social@media.com', '$2y$10$z6lQCRt2eim5M3wpbr/yEOHmj5iOh0tIPtrz6Nvr4hSDr/8gg5LRy', '64104348a8129153e9321db5d72c99e9896800f967595b655f', 0, '2020-03-27 01:05:33', 3, '', 1),
(74, 'Fedorae', 'services.fedorae@gmail.com', '$2y$10$IpKOgrXPMRwBrWL7xE72LOgmBc2YanXf3jvSThBtvHET4yK1ek4L6', 'b162467ec2ae4268aa868ef5c5ac3da2f509fc2dace7a2fdb3', 0, '2020-03-27 06:23:13', 2, '', 1),
(85, 'user', 'user@user.com', '$2y$10$oQrPTc7DxakuW/cXbPOf7ujsj3HiFm5E.GWK9ko28.89/KMH6A8rS', '008f596f1734bfa1f7243bd6fc12d0c7c913206f7859cccece', 0, '2020-03-27 06:56:06', 2, '', 1),
(87, 'someone', 'someone@someone.com', '$2y$10$BvSEW4h3uP6yyqmi6xWJbe7sDNIVGoPNXXQmBGjShVT28bQtxdJEO', 'b55471f341db96192a27a349068dc1e9cce40b2aad555ba3e9', 0, '2020-04-01 01:01:17', 2, '', 1),
(88, 'someone', 'someone@someone.com', '$2y$10$BvSEW4h3uP6yyqmi6xWJbe7sDNIVGoPNXXQmBGjShVT28bQtxdJEO', 'b55471f341db96192a27a349068dc1e9cce40b2aad555ba3e9', 0, '2020-04-01 01:01:18', 2, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
