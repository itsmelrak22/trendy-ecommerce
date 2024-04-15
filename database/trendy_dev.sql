-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2024 at 10:43 AM
-- Server version: 8.0.34
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trendy_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `building_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_municipality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test1', 'user1', 'username1', 'tes1@mail.com', '0000', NULL, '2024-03-12 14:04:14', NULL),
(2, 'testt', 'testt', 'admin', 'admin@admin.com', '0000', '2024-03-12 13:56:08', '2024-03-12 13:56:08', NULL),
(3, 'useer', 'uuusseeeer', 'uuusssee', 'www@mail.com', '1111', '2024-03-12 13:57:25', '2024-03-12 13:57:25', '2024-03-12 14:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `color_id` int NOT NULL,
  `total_price` int DEFAULT NULL,
  `quantity` int DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `created_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `color_id`, `total_price`, `quantity`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1, 7, 10, NULL, 5, 0, '2024-04-14 21:48:53', '2024-04-14 21:48:53', NULL),
(12, 5, 4, 9, 500, 1, 4, '2024-04-15 10:26:58', '2024-04-15 06:01:40', NULL),
(13, 5, 7, 10, 250, 1, 1, '2024-04-15 18:36:15', '2024-04-15 18:36:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, 'CORDUROY SHORT', 'CORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORTCORDUROY SHORT', '2024-03-17 05:32:36', '2024-03-17 05:32:36', '2024-03-17 16:06:36', 1),
(10, 'test test', 'test testtest testtest testtest testtest testtest test', '2024-03-24 04:30:17', '2024-03-24 04:30:17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` int DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_municipality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `phone_no`, `province`, `city_municipality`, `barangay`, `complete_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test', 'test@user.com', 'test user', '0000', 1212, '042100000', '042108000', '042108023', 'test test ', '2024-03-17 12:04:27', '2024-04-14 20:53:17', NULL),
(2, 'user', 'test', 'mail@mail.com', 'user test', '0000', 555555, NULL, NULL, NULL, NULL, '2024-04-14 13:54:16', '2024-04-14 13:54:16', NULL),
(3, 'sass', 'sasas', 'sasasdd@mail.com', 'asasa', 'sasa', 5526, NULL, NULL, NULL, NULL, '2024-04-14 14:47:26', '2024-04-14 14:47:26', NULL),
(4, 'ewewe', 'wrere', 'dsfdf@mail.com', 'sadsd', '313232', 23233, '015500000', '015506000', '015506007', NULL, '2024-04-14 14:48:12', '2024-04-14 14:48:12', NULL),
(5, 'User', 'Test', 'user@test.com', 'usertest', 'password', 11111111, '042100000', '042108000', '042108005', 'Lorem Lorem Lrem aaa', '2024-04-15 10:14:49', '2024-04-15 10:19:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender_age_category`
--

CREATE TABLE `gender_age_category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'user', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `total` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `mop` enum('cod','online') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`, `mop`, `payment_id`, `paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 5, '500', 0, 'cod', NULL, 'no', '2024-04-15 11:10:22', '2024-04-15 06:01:40', NULL),
(18, 5, '0', 0, 'cod', NULL, 'no', '2024-04-15 18:36:25', '2024-04-15 18:36:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `color_id` int NOT NULL,
  `cart_id` int DEFAULT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `created_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `cart_id`, `qty`, `created_at`, `updated_at`) VALUES
(14, 17, 4, 9, 12, 1, '2024-04-15 11:10:22', '2024-04-15 11:10:22'),
(15, 18, 7, 10, 13, 1, '2024-04-15 18:36:25', '2024-04-15 18:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `sale_id` int DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` int DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `mop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0'
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
  `color` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `color`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(1, 7, 'test', 'test', 1000, NULL, '2024-03-24 11:21:43', '2024-03-24', '2024-03-24 08:29:56', 1),
(2, 7, 'TEST 2', 'qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe qweqwe ', 500, NULL, '2024-03-24 12:27:42', '2024-03-24', '2024-03-24 08:29:49', 1),
(3, 10, 'Test 333', 'Test 3Test 3Test 3Test 3Test 3Test 3Test 3Test 3Test 3Test 3Test 33', 500, NULL, '2024-03-24 16:22:44', '2024-03-24', '2024-03-24 08:28:38', 1),
(4, 8, 'TEST 1', 'TEST 1 TEST 1 TEST 1TEST 1TEST 1TEST 1TEST 1TEEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1TEST 1', 500, NULL, '2024-03-24 16:30:13', '2024-03-24 08:31:08', NULL, 1),
(5, 8, 'TEST2', 'SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD SDASDASDSAD ', 22, NULL, '2024-03-24 16:39:38', '2024-03-24 16:39:38', NULL, 1),
(6, NULL, 'TEST 1', NULL, NULL, NULL, '2024-03-24 17:35:31', '2024-03-24 17:35:31', '2024-03-24 09:35:36', 1),
(7, 6, 'TEST SHORTS ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris viverra massa mollis, scelerisque justo vel, vehicula purus. Aliquam mi augue, laoreet malesuada tellus auctor, blandit sollicitudin ligula. Proin congue condimentum tellus, sed congue magna tempus in. Curabitur consequat non sapien a malesuada. Suspendisse vestibulum sagittis lorem a dignissim. Praesent ac blandit nisl, rutrum blandit magna. Duis sit amet lacus tellus. ', 250, NULL, '2024-04-06 18:06:43', '2024-04-06 18:06:43', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `stock_qty` int NOT NULL DEFAULT '0',
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `name`, `code`, `stock_qty`, `image`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 4, 'Yellow', '#e9c46a', 40, NULL, '2024-03-24 17:44:22', '2024-04-06 18:53:23', NULL, 1, 1),
(2, 4, 'Turquoise ', '#00a5cc', 82, NULL, '2024-03-24 17:45:14', '2024-04-14 21:46:50', NULL, 1, 1),
(3, 4, 'Red', '#d62828', 100, NULL, '2024-03-24 17:45:47', '2024-03-24 17:45:47', '2024-03-25 00:40:57', 1, 1),
(4, 4, 'Orange', '#cf4f30', 50, NULL, '2024-03-24 17:47:28', '2024-03-24 17:47:28', '2024-03-25 00:40:55', 1, 1),
(5, 4, 'Black with image update22', '#000000', 1, 'uploads/products/4/5/1.jpg', '2024-03-24 17:48:05', '2024-04-07 18:43:16', NULL, 1, 1),
(6, 4, 'Green', '#2a9d8f', 20, NULL, '2024-03-24 18:45:18', '2024-03-24 18:45:18', '2024-03-25 00:39:38', 1, 1),
(7, 4, 'Test 5', '#d807db', 10, NULL, '2024-03-24 23:34:52', '2024-03-24 23:34:52', '2024-03-25 00:40:58', 1, 1),
(8, 4, 'Test 5 to Red', '#d62828', 13, 'uploads/products/4/8/1.jpg', '2024-03-24 23:35:10', '2024-04-13 11:04:06', NULL, 1, 1),
(9, 4, 'Test 5 to /eer', '#d807db', 97, 'uploads/products/4/9/1.jpg', '2024-03-24 23:36:05', '2024-04-15 11:10:22', NULL, 1, 1),
(10, 7, 'CREAM', '#d6c498', 29, 'uploads/products/7/10/Screenshot 2024-04-06 180731.png', '2024-04-06 18:07:56', '2024-04-15 18:36:25', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `created_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `order_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 17, '2024-04-15 05:14:56', '2024-04-15 06:01:40', NULL);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gender_age_category`
--
ALTER TABLE `gender_age_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
