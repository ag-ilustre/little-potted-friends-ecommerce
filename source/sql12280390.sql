-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 05:07 PM
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
(1, 'Hedgehog Cactus', '249.00', 'Hedgehog Cactus is paired with our minimalist white pot. This plant is ideal for home and offices. Plant height, size, and color may vary slightly.', '../assets/images/uploads/minimalistpot.png', 1),
(2, 'Echeveria Purple Pearl', '379.00', 'Echeveria Purple Pearl is an evergreen succulent forming a large rosette. It is drought tolerant and gets brighter colors with more sun. Your plant height, size, and color may vary slightly.', '../assets/images/uploads/purplecheveria.png', 1),
(3, 'Echeveria Twin Pots', '659.00', 'Two varieties of Echeveria succulents in minimalist pots. This pet-friendly succulents are ideal for home and offices. Plant height, size and colour may vary slightly.', '../assets/images/uploads/echveriatwins.png', 2),
(4, 'Fairy Washboards', '899.00', 'These fairy washboard triplets are great indoor plants on sunny or bright windowsills.  Plant height, size, and color may vary slightly.', '../assets/images/uploads/triplepots.png', 2),
(5, 'Columnar Cacti', '469.00', 'The columnar cacti in orange pot is ideal for home and offices. Plant height, size, and color may vary slightly.', '../assets/images/uploads/orangepot.png', 1),
(6, 'Schlumbergera', '299.00', 'Schlumbergera cactus is also called Christmas Cactus, Thanksgiving Cactus, or Holiday Cactus because of the seasons that it typically blooms in: between November to January. Its pink flowers and rustic pot make it ideal as table centerpiece! Plant height,', '../assets/images/uploads/rusticpot.png', 1),
(7, 'Designer Pot', '229.00', 'Level up your gardening and decorating skills with this exclusive designer pot! Dimensions: 4\"x4\"x6\".', '../assets/images/uploads/designerpot.png', 3),
(8, 'Starter Pot', '89.00', 'Begin your a newfound hobby of growing succulents will this starter pots! Dimensions: 3.5\"x3.5\"x5\".', '../assets/images/uploads/starterpots.png', 3),
(9, 'Echeveria in Full Bloom', '289.00', 'Echeveria in Full Bloom is a pet-friendly evergreen succulent that is ideal for home and offices. Plant height, size, and color may vary slightly.', '../assets/images/uploads/echeveria.png', 1),
(29, 'Camera Pot', '479.00', 'Get this limited edition pink camera pot for your next succulent pal! (Plant not included.) Dimensions: 3.5\"x3.5\"x6\".', '../assets/images/favicon.png', 3);

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
  `total` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `transaction_code`, `purchase_date`, `user_id`, `status_id`, `payment_mode_id`, `total`) VALUES
(19, 'DB7584842ABE100B', '2019-02-24 10:27:34', 69, 3, 1, '628.00'),
(23, 'DA912ADE61E1BA06', '2019-02-24 11:08:04', 69, 1, 1, '899.00'),
(24, 'C3FA6D63374519C5', '2019-02-24 11:08:42', 69, 1, 1, '378.00'),
(26, 'DA5F57DE341D0874', '2019-02-24 11:14:03', 69, 1, 1, '249.00'),
(27, 'B3610CC3A61C5F08', '2019-02-24 11:14:13', 69, 1, 1, '379.00'),
(28, 'F340B4DFD2F1573C', '2019-02-24 11:14:36', 69, 1, 1, '659.00'),
(29, 'D99F6D06E1B8047B', '2019-02-24 11:24:13', 69, 3, 1, '899.00'),
(30, '4F0A70F237B50BF8', '2019-02-24 11:24:38', 69, 3, 2, '469.00'),
(31, 'BA3D433C95F6021A', '2019-02-24 11:25:03', 69, 3, 1, '299.00'),
(32, '863F9A340B76329C', '2019-02-24 11:25:40', 69, 3, 1, '229.00'),
(33, '0BCE22D4BCD5EF17', '2019-02-24 11:25:58', 69, 3, 2, '89.00'),
(34, 'F39D97554139DABF', '2019-02-24 11:26:12', 69, 3, 1, '289.00'),
(35, '54086666D55D60AD', '2019-02-24 11:26:28', 69, 3, 1, '479.00'),
(39, 'F5F025AC7C7E415C', '2019-02-24 11:52:08', 69, 3, 1, '2834.00'),
(40, 'ED7AC93BD4604974', '2019-02-24 11:55:01', 69, 3, 1, '1287.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`id`, `quantity`, `price`, `subtotal`, `order_id`, `item_id`) VALUES
(29, 1, '249.00', '249.00', 19, 1),
(30, 1, '379.00', '379.00', 19, 2),
(38, 1, '899.00', '899.00', 23, 4),
(39, 1, '89.00', '89.00', 24, 8),
(40, 1, '289.00', '289.00', 24, 9),
(50, 1, '249.00', '249.00', 26, 1),
(51, 1, '379.00', '379.00', 27, 2),
(52, 1, '659.00', '659.00', 28, 3),
(53, 1, '899.00', '899.00', 29, 4),
(54, 1, '469.00', '469.00', 30, 5),
(55, 1, '299.00', '299.00', 31, 6),
(56, 1, '229.00', '229.00', 32, 7),
(57, 1, '89.00', '89.00', 33, 8),
(58, 1, '289.00', '289.00', 34, 9),
(59, 1, '479.00', '479.00', 35, 29),
(81, 2, '659.00', '1318.00', 39, 3),
(82, 4, '379.00', '1516.00', 39, 2),
(83, 1, '379.00', '379.00', 40, 2),
(84, 1, '659.00', '659.00', 40, 3),
(85, 1, '249.00', '249.00', 40, 1);

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
(52, 'Anne Gerly', 'Ilustre', 'annegerly@yahoo.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '9778148407', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'ADMIN'),
(55, 'ADMIN', 'ONE', 'csp2ecommerce@gmail.com', '84e87fa20792bccf4178abea96460f888aabf775', '09778148407', '123 ABC Street, Sta. Ana, Manila', 'Active', 'ADMIN'),
(64, 'Anne', 'Ilustre', 'ilustre.ag@gmail.com', '84e87fa20792bccf4178abea96460f888aabf775', '09171234567', '2029-E Agusto Francisco St., Sta. Ana', 'Active', 'NONE'),
(69, 'AG', 'Ilustre', 'ag.ilustre@gmail.com', '84e87fa20792bccf4178abea96460f888aabf775', '09778148407', '123456 ABC St., Sta. Ana, Manila ', 'Active', 'NONE'),
(70, 'Anne', 'Il', 'csp3laravel@gmail.com', '84e87fa20792bccf4178abea96460f888aabf775', '09187654321', '4567 ABC St., Sta. Ana, Manila', 'Active', 'NONE');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
