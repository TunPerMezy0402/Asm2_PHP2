-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2025 at 05:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm_php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'SumSung'),
(3, 'Nokia'),
(5, 'Riore'),
(6, '222');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `img`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Iphone 16', NULL, 'Mã 1', '2025-02-22 19:57:31', '2025-02-22 19:57:31'),
(2, 3, 'Nokia-V3', NULL, 'Mã 2', '2025-02-22 19:57:31', '2025-02-22 19:57:31'),
(3, 2, 'S22_Untra', NULL, 'Mã 3', '2025-02-22 19:58:18', '2025-02-22 19:58:18'),
(4, 1, 'Iphone 15', NULL, 'Mã 4', '2025-02-22 19:57:31', '2025-02-22 19:57:31'),
(5, 3, 'Nokia-V8', NULL, 'Mã 5', '2025-02-22 19:57:31', '2025-02-22 19:57:31'),
(6, 2, 'S21_Untra', NULL, 'Mã 6', '2025-02-22 19:58:18', '2025-02-22 19:58:18'),
(7, 1, 'Iphone 11', NULL, 'Mã 7', '2025-02-22 19:57:31', '2025-02-22 19:57:31'),
(8, 3, 'Nokia-V7', NULL, 'Mã 8', '2025-02-22 19:57:31', '2025-02-22 19:57:31'),
(9, 2, 'S25_Untra', NULL, 'Mã 9', '2025-02-22 19:58:18', '2025-02-22 19:58:18'),
(40, 3, 'Atino', '1740504594_22.jpg', 'Mã 2', '2025-02-25 10:29:54', '2025-02-25 10:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'tuananh', 'tuananhdubai428@gmail.com', 'tuananh12345', 'admin'),
(2, 'mamcode', 'mamcode@gmail.com', '123456', 'admin'),
(3, 'asdasd', 'tuananhdubai428@gmail.com', 'ư212121', 'admin'),
(4, 'mamcode', 'mamcode@gmail.com', 'tuânnh2004', 'user'),
(5, 'asdasd', 'tuananhdubai428@gmail.com', 'asdasd', 'user'),
(8, 'tuananh', 'tuananh', 'tuananh', 'user'),
(9, 'admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
