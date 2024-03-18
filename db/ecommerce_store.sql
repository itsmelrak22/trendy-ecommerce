-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2024 at 12:04 AM
-- Server version: 8.0.34
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test1', 'user1', 'username1', 'tes1@mail.com', '0000', NULL, '2024-03-12 14:04:14', NULL),
(2, 'testt', 'testt', 'testuserr', 'user@mail.com', NULL, '2024-03-12 13:56:08', '2024-03-12 13:56:08', NULL),
(3, 'useer', 'uuusseeeer', 'uuusssee', 'www@mail.com', '1111', '2024-03-12 13:57:25', '2024-03-12 13:57:25', '2024-03-12 14:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `total_price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 3, 1001, 2, '2024-03-15 05:55:58', '2024-03-15 08:05:16', '2024-03-15 08:09:31'),
(2, 2, 2, 199, 0, '2024-03-15 16:01:33', '2024-03-15 16:01:33', NULL),
(3, 1, 1, 1001, 1, '2024-03-15 16:22:01', '2024-03-15 16:22:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(4, 'Men', 'Men Clothes', '2024-03-17 05:05:23', '2024-03-17 05:05:23', '2024-03-17 05:10:45', 1),
(5, 'test', 'test', '2024-03-17 05:13:22', '2024-03-17 05:13:22', '2024-03-17 05:14:03', 1),
(6, 'BOOTY SHORTS', 'BOOTY SHORTS BOOTY SHORTS BOOTY SHORTS BOOTY SHORTS', '2024-03-17 05:26:34', '2024-03-17 05:26:34', NULL, 1),
(7, 'CLASSIC POLO SHIRT', 'CLASSIC POLO SHIRT CLASSIC POLO SHIRT CLASSIC POLO SHIRT CLASSIC POLO SHIRT CLASSIC POLO SHIRT CLASSIC POLO SHIRT', '2024-03-17 05:26:46', '2024-03-17 05:26:46', NULL, 1),
(8, 'CORDUROY SHIRT', 'CORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRTCORDUROY SHIRT', '2024-03-17 05:32:29', '2024-03-17 05:32:29', NULL, 1),
(9, 'CORDUROY SHORT', 'CORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORT', '2024-03-17 05:32:36', '2024-03-17 05:32:36', '2024-03-17 16:06:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test', 'user@mail.com', 1212, '2024-03-17 12:04:27', '2024-03-17 12:04:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender_age_category`
--

CREATE TABLE `gender_age_category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gender_age_category`
--

INSERT INTO `gender_age_category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(339, 'asdasdasd', '2024-03-09 16:40:54', '2024-03-09 16:59:37', '2024-03-09 17:09:06', 1),
(340, 'test22', '2024-03-09 16:41:30', '2024-03-09 16:41:30', '2024-03-17 05:16:13', 1),
(341, 'newtest', '2024-03-09 17:04:52', '2024-03-09 17:04:57', '2024-03-09 17:08:02', 1),
(342, 'test221', '2024-03-09 17:14:17', '2024-03-09 17:14:17', '2024-03-17 05:16:14', 1),
(343, 'tstetst', '2024-03-09 18:17:27', '2024-03-09 18:17:27', '2024-03-17 05:16:14', 1),
(344, 'Men', '2024-03-17 05:19:18', '2024-03-17 05:19:18', NULL, 1),
(345, 'Women', '2024-03-17 05:19:25', '2024-03-17 05:19:25', NULL, 1),
(346, 'Kids', '2024-03-17 05:19:38', '2024-03-17 05:19:38', NULL, 1),
(347, 'Unisex', '2024-03-17 05:19:42', '2024-03-17 05:19:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `sale_id` int DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` int DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `mop` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` int DEFAULT NULL,
  `stock_qty` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `sale_price` int DEFAULT NULL,
  `sales_date` datetime DEFAULT NULL,
  `mop` int DEFAULT '0',
  `sub_total` int DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `product_id`, `qty`, `sale_price`, `sales_date`, `mop`, `sub_total`, `order_date`, `deleted_at`) VALUES
(1, 2, 2, 2, 333, '2024-03-15 08:30:18', 2, 211, '2024-03-15 08:30:18', '2024-03-15 08:36:44'),
(2, 1, 1, 1, 1111, '2024-03-17 12:05:39', 0, 1, '2024-03-17 12:05:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender_age_category`
--
ALTER TABLE `gender_age_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gender_age_category`
--
ALTER TABLE `gender_age_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
