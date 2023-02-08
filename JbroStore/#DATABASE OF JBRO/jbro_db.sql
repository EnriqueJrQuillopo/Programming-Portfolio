-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 09:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbro_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'UNPAID',
  `order_status` varchar(100) NOT NULL DEFAULT 'YOUR ORDER IS BEING PREPARED.',
  `procurement_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`, `order_status`, `procurement_date`) VALUES
(38, 4, 'Christian Acedillo', '09989291436', 'enriquejr.quillopo@gmail.com', 'CASH ON DELIVERY', 'House no. 145, Dulong Bayan, Bacoor, Philippines - 4102', ', SECRET LAB TITAN BM (5) ', 129995, '02-Dec-2022', 'PAID', 'ORDER SUCCESSFULLY DELIVERED', '2022-12-02 09:12:26'),
(39, 4, 'Christian Acedillo', '0998291436', 'quillopoenrique@gmail.com', 'CASH ON DELIVERY', 'House no. 165, Dulong Bayan, Bacoor, Philippines - 4102', ', PANTHER GAZER PINK (1) ', 6999, '02-Dec-2022', 'PAID', 'ORDER SUCCESSFULLY DELIVERED', '2022-11-03 09:12:01'),
(40, 4, 'Christian Acedillo', '09989291436', 'quillopoenrique@gmail.com', 'CASH ON DELIVERY', 'House no. 143, Dulong Bayan, Bacoor, Philippines - 4102', ', BATHALA EXTREME B&W (1) ', 7999, '02-Dec-2022', 'PAID', 'ORDER SUCCESSFULLY DELIVERED', '2022-12-01 10:12:16'),
(41, 4, 'Christian Acedillo', '0998919243', 'enriquejr.quillopo@gmail.com', 'CASH ON DELIVERY', 'House no. 123, Dulong Bayan, Bacoor, Philippines - 4102', ', Finger Clip Pulse Oximeter (4) ', 1996, '02-Dec-2022', 'UNPAID', 'YOUR ORDER IS BEING PREPARED.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `size`, `price`, `image`) VALUES
(12, 'PANTHER GAZER PINK', 10, '73cm x 60.5cm X 140cm', 6999, 'chair1.png'),
(13, 'BATHALA EXTREME B&W', 9, '73cm X 60.5cm X 140cm', 7999, 'chair2.png'),
(14, 'BATHALA ONIX ', 10, '73cm X 60.5cm X 140cm', 8999, 'chair3.png'),
(16, 'PANTHER GAZER B&W', 10, '73cm X 60.5cm X 140cm', 9999, 'chair4.png'),
(18, 'PANTHER GAZER RED EX', 10, '73cm X 60.5cm X 140cm', 10999, 'chair5.png'),
(19, 'SECRET LAB TITAN BM', 10, '73cm X 60.5cm X 140cm', 25999, 'chair6.png'),
(20, 'ACCU-CHEK ACTIVE', 10, '50s', 1299, 'med1.png'),
(25, 'ACCU-CHEK SOFTCLIX', 10, '100s', 1199, 'med2.png'),
(26, 'ACCU-CHEK INSTANT', 10, '40g', 1399, 'med3.png'),
(27, 'SURE-GUARD DBPM', 10, '', 999, 'med4.png'),
(28, 'Finger Clip Pulse Oximeter', 6, '', 499, 'med5.png'),
(29, 'Accu-Chek Performa ', 10, '50s', 1499, 'med6.png'),
(30, 'PUNICA SNOWBARE ', 10, '30ml', 299, 'punica.png'),
(31, 'PUNICA TONER', 10, '30ml', 199, 'punica-t.png'),
(32, 'PUNICA REJUV SET', 10, '50g', 399, 'punica-s.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `verification` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `verification`, `user_type`) VALUES
(1, 'ADMINISTRATOR', 'admin@jbro', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'verified', 'admin'),
(2, 'JBRO STAFF 1', 'staff1@jbro', 'b99165cd2609bbb891390120ed2df1cb', 'verified', 'staff'),
(3, 'JBRO STAFF 2', 'staff2@jbro', 'b99165cd2609bbb891390120ed2df1cb', 'verified', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
