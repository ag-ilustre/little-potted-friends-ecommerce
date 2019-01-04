-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 06:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demonewstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'Single Pots'),
(2, 'Sets in Style'),
(3, 'Care Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `name`, `price`, `description`, `img_path`, `category_id`) VALUES
(1, 'Product 1', '600.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '../assets/images/favicon.png', 1),
(2, 'Product 2', '850.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '../assets/images/favicon.png', 1),
(3, 'Product 3', '456.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '../assets/images/favicon.png', 2),
(4, 'Product 4', '897.90', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '../assets/images/favicon.png', 2),
(5, 'Product 5', '542.80', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '../assets/images/favicon.png', 3),
(6, 'Product 6', '227.90', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '../assets/images/favicon.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `payment_mode_id` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `transaction_code`, `purchase_date`, `user_id`, `status_id`, `payment_mode_id`, `total`) VALUES
(1, 'DEB7A7BE8235CABB', '2018-12-31 08:14:32', 55, 1, 1, 1906),
(2, '9D9391A809F9D1FF', '2019-01-01 10:15:29', 67, 2, 1, 3812),
(3, '13511A8ADE2E02CF', '2019-01-02 13:25:23', 55, 3, 1, 1906),
(4, 'ACE640AD053C690E', '2019-01-02 13:46:41', 55, 2, 1, 2269),
(5, '4F95BD388DFD257A', '2019-01-02 15:28:20', 55, 3, 2, 1700);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `quantity`, `price`, `order_id`, `item_id`) VALUES
(1, 1, '600.00', 1, 1),
(2, 1, '850.00', 1, 2),
(3, 1, '456.00', 1, 3),
(4, 2, '600.00', 2, 1),
(5, 2, '850.00', 2, 2),
(6, 2, '456.00', 2, 3),
(7, 1, '456.00', 3, 3),
(8, 1, '600.00', 3, 1),
(9, 1, '850.00', 3, 2),
(10, 1, '600.00', 4, 1),
(11, 1, '897.90', 4, 4),
(12, 1, '542.80', 4, 5),
(13, 1, '227.90', 4, 6),
(14, 2, '850.00', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_modes`
--

CREATE TABLE `tbl_payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_modes`
--

INSERT INTO `tbl_payment_modes` (`id`, `name`) VALUES
(1, 'COD'),
(2, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Completed'),
(3, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Active',
  `access` varchar(5) NOT NULL DEFAULT 'NONE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `address`, `status`, `access`) VALUES
(51, 'Anne Gerly', 'Ilustre', 'gerly.ilustre@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '9778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'ADMIN'),
(52, 'Anne Gerly', 'Ilustre', 'annegerly@yahoo.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '9778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(53, 'Anne Gerly', 'Ilustre', 'annegerly@yahoo.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '9778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(54, 'Anne Gerly', 'Ilustre', '1', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '9778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(55, 'ADMIN', 'ONE', 'csp2ecommerce@gmail.com', '84e87fa20792bccf4178abea96460f888aabf775', '09778148407', '2029-E Agusto Francisco St., Sta. Ana, Manila', 'Active', 'ADMIN'),
(56, 'Anne Gerly', 'Ilustre', 'ag@mail.com', '7c222fb2927d828af22f592134e8932480637c0d', '09778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(57, 'AG', 'Ilustre', 'ag.ilustre@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '09171234567', '123 ABC Street, Brgy. 456, Manila 1001', 'Active', 'NONE'),
(58, 'Anne Gerly', 'Ilustre', 'annegerly@yahoo.com', '3f196cfb6c4cffe3002c0495a1bc822521b6aa36', '09778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(59, 'Anne Gerly', 'Ilustre', 'agil@mail.com', 'a642a77abd7d4f51bf9226ceaf891fcbb5b299b8', '09778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(60, 'Anne Gerly', 'Ilustre', 'annegerly@yahoo.com', '3f196cfb6c4cffe3002c0495a1bc822521b6aa36', '97781484070', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(61, 'Anne Gerly', 'Ilustre', 'annegerly@yahoo.co', 'e38ad214943daad1d64c102faec29de4afe9da3d', '09171234567', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(63, 'Anne Gerly', 'Ilustre', 'ag@gmail.com', 'b49eb82469ac2f7c6c7ea9612d8101ac3c5dd6bb', '09778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(64, 'Anne', 'Ilustre', 'ilustre.ag@gmail.com', '84e87fa20792bccf4178abea96460f888aabf775', '09171234567', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(65, 'Anne Gerly', 'Ilustre', 'nosha1@mail.com', 'ecommerce1', '09778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(66, 'Anne Gerly', 'Ilustre', 'annegerly@yahoo.com', '111', '', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(67, 'Iggie', 'Ilustre', 'ilustreiggie@gmail.com', '73e815e86ff76c9b9a693faa1b1455c424fa80ce', '09055021080', 'Vinzons, Camarines Norte 4603 ', 'Active', 'NONE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tbl_payment_modes`
--
ALTER TABLE `tbl_payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_payment_modes`
--
ALTER TABLE `tbl_payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD CONSTRAINT `tbl_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`payment_mode_id`) REFERENCES `tbl_payment_modes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD CONSTRAINT `tbl_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
