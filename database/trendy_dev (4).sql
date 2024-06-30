-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2024 at 12:05 PM
-- Server version: 8.0.33
-- PHP Version: 7.4.33

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
(1, 'test1', 'user1', 'username1', 'tes1@mail.com', '0000', NULL, '2024-03-12 14:04:14', '2024-05-27 12:29:14'),
(2, 'testt', 'testt', 'admin', 'admin@admin.com', '0000', '2024-03-12 13:56:08', '2024-03-12 13:56:08', '2024-05-27 12:29:15'),
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
  `size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 's',
  `is_product_in_promo` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `color_id`, `total_price`, `quantity`, `status`, `size`, `is_product_in_promo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 17, 80, 100, 1, 4, 's', 'no', '2024-04-17 01:54:17', '2024-06-28 08:17:35', NULL),
(2, 1, 17, 97, 100, 1, 1, 's', 'no', '2024-04-17 16:28:43', '2024-04-17 16:31:34', NULL),
(3, 1, 17, 79, 100, 1, 4, 's', 'no', '2024-04-22 10:12:43', '2024-04-22 04:15:53', NULL),
(4, 6, 17, 91, 100, 1, 3, 's', 'no', '2024-04-22 12:32:13', '2024-04-22 04:33:58', NULL),
(5, 6, 17, 79, NULL, 1, 0, 's', 'no', '2024-04-22 13:39:26', '2024-04-22 13:39:26', NULL),
(6, 7, 14, 73, 1500, 10, 1, 's', 'no', '2024-04-23 17:44:44', '2024-04-23 17:46:33', NULL),
(7, 1, 2, 7, NULL, 1, 0, 's', 'no', '2024-05-08 10:48:28', '2024-05-08 10:48:28', NULL),
(8, 1, 17, 86, NULL, 1, 0, 's', 'no', '2024-05-08 10:48:34', '2024-05-08 10:48:34', NULL),
(9, 11, 2, 6, 100, 1, 1, 's', 'no', '2024-05-14 17:03:33', '2024-05-14 17:12:40', NULL),
(10, 11, 16, 76, 320, 1, 1, 's', 'no', '2024-05-14 17:11:48', '2024-05-14 17:12:40', NULL),
(11, 11, 16, 78, 640, 2, 1, 's', 'no', '2024-05-14 17:12:10', '2024-05-14 17:12:40', NULL),
(12, 13, 8, 32, 350, 1, 1, 's', 'no', '2024-05-19 16:29:25', '2024-05-19 16:30:33', NULL),
(13, 11, 41, 222, NULL, 2, 0, 'm', 'no', '2024-05-27 15:08:53', '2024-05-27 16:24:33', '2024-05-28 08:03:25'),
(14, 11, 2, 3, NULL, 1, 0, 'xx', 'no', '2024-05-27 15:53:38', '2024-05-27 15:53:38', '2024-05-28 08:03:57'),
(15, 11, 3, 9, NULL, 1, 0, 'l', 'no', '2024-05-27 16:45:46', '2024-05-27 16:45:46', '2024-05-28 08:03:48'),
(16, 11, 2, 1, 100, 1, 2, 'm', 'no', '2024-05-27 17:34:33', '2024-06-23 02:33:07', NULL),
(17, 13, 2, 1, 100, 1, 4, 'xs', 'no', '2024-05-27 19:47:40', '2024-05-27 12:54:08', NULL),
(18, 13, 26, 163, NULL, 1, 0, 'xs', 'no', '2024-05-27 20:25:13', '2024-05-27 20:25:13', NULL),
(19, 11, 23, 135, NULL, 3, 0, 'xs', 'no', '2024-05-27 21:00:54', '2024-05-27 21:00:54', '2024-05-28 08:03:40'),
(20, 11, 26, 160, NULL, 2, 0, 'xs', 'no', '2024-05-27 21:12:19', '2024-05-27 21:12:19', '2024-05-28 08:03:33'),
(21, 13, 43, 242, NULL, 1, 0, 'l', 'no', '2024-05-27 21:16:56', '2024-05-27 21:16:56', NULL),
(22, 15, 26, 162, NULL, 1, 0, 'one_size', 'no', '2024-05-28 07:57:22', '2024-05-28 07:57:22', NULL),
(23, 11, 2, 2, 100, 1, 1, 'one_size', 'no', '2024-05-28 08:01:56', '2024-05-28 09:13:36', NULL),
(24, 11, 42, 232, NULL, 1, 0, 'xl', 'no', '2024-05-28 08:02:50', '2024-05-28 08:02:50', '2024-05-28 08:03:15'),
(25, 11, 34, 187, NULL, 1, 0, 'l', 'no', '2024-05-28 09:12:04', '2024-05-28 09:12:04', '2024-06-06 09:55:22'),
(26, 11, 3, 9, 260, 1, 2, 's', 'no', '2024-05-28 09:18:45', '2024-05-28 01:19:36', NULL),
(27, 11, 44, 253, NULL, 1, 0, 'one_size', 'no', '2024-05-28 09:41:30', '2024-05-28 09:41:30', '2024-06-06 06:48:16'),
(28, 11, 2, 2, 100, 1, 11, 'one_size', 'no', '2024-06-02 01:07:25', '2024-06-01 17:14:37', NULL),
(29, 11, 47, 266, 250, 1, 1, 'xs', 'no', '2024-06-02 01:15:26', '2024-06-02 01:15:44', NULL),
(30, 11, 2, 2, NULL, 1, 0, 'one_size', 'no', '2024-06-02 16:14:45', '2024-06-02 16:14:45', '2024-06-06 06:48:12'),
(31, 11, 3, 8, NULL, 2, 0, 's', 'no', '2024-06-06 06:31:52', '2024-06-06 06:32:04', '2024-06-06 06:48:08'),
(32, 11, 35, 189, NULL, 1, 0, 'xl', 'no', '2024-06-06 06:33:23', '2024-06-06 06:33:23', '2024-06-06 06:48:04'),
(33, 11, 34, 208, NULL, 1, 0, 'xl', 'no', '2024-06-06 06:36:18', '2024-06-06 06:36:18', '2024-06-06 06:47:58'),
(34, 11, 40, 215, NULL, 1, 0, 'l', 'no', '2024-06-06 06:37:14', '2024-06-06 06:37:14', '2024-06-06 06:47:54'),
(35, 15, 2, 2, 200, 2, 1, 'one_size', 'no', '2024-06-06 09:53:15', '2024-06-28 18:12:30', NULL),
(36, 11, 2, 1, 100, 1, 1, 'one_size', 'no', '2024-06-06 09:54:46', '2024-06-06 09:55:11', NULL),
(37, 15, 27, 166, 400, 2, 1, 'one_size', 'no', '2024-06-06 09:57:02', '2024-06-26 00:03:40', NULL),
(38, 15, 45, 255, 150, 1, 1, 'one_size', 'no', '2024-06-06 10:35:07', '2024-06-26 00:03:40', NULL),
(39, 11, 23, 133, NULL, 1, 0, 'one_size', 'no', '2024-06-06 11:50:27', '2024-06-06 11:50:27', '2024-06-06 11:50:34'),
(40, 11, 45, 254, NULL, 1, 0, 'one_size', 'no', '2024-06-06 11:51:26', '2024-06-06 11:51:26', NULL),
(41, 11, 27, 165, NULL, 1, 0, 'one_size', 'no', '2024-06-06 11:51:39', '2024-06-06 11:51:39', '2024-06-06 12:36:21'),
(42, 11, 2, 2, NULL, 1, 0, 'one_size', 'no', '2024-06-06 12:10:18', '2024-06-06 12:10:18', '2024-06-06 12:36:17'),
(43, 11, 45, 258, NULL, 1, 0, 'one_size', 'no', '2024-06-06 12:12:59', '2024-06-06 12:12:59', '2024-06-06 12:13:08'),
(44, 11, 47, 268, NULL, 1, 0, 'l', 'no', '2024-06-06 12:28:34', '2024-06-06 12:28:34', '2024-06-06 12:36:13'),
(45, 18, 45, 257, NULL, 2, 0, 'one_size', 'no', '2024-06-06 15:00:16', '2024-06-06 15:00:29', NULL),
(46, 17, 26, 163, 180, 1, 2, 'one_size', 'no', '2024-06-06 15:28:46', '2024-06-23 02:32:45', NULL),
(47, 11, 42, 231, NULL, 1, 0, 's', 'no', '2024-06-06 16:36:59', '2024-06-06 16:36:59', NULL),
(48, 17, 26, 160, NULL, 1, 0, 'one_size', 'no', '2024-06-06 18:03:26', '2024-06-06 18:03:26', NULL),
(49, 11, 16, 76, NULL, 1, 0, 'one_size', 'no', '2024-06-14 08:39:42', '2024-06-14 08:39:42', NULL),
(50, 11, 23, 134, NULL, 1, 0, 'one_size', 'no', '2024-06-14 08:40:05', '2024-06-14 08:40:05', '2024-06-14 08:52:18'),
(51, 15, 26, 339, NULL, 1, 0, 'one_size', 'no', '2024-06-27 23:00:26', '2024-06-27 23:00:26', '2024-06-28 02:36:14'),
(52, 15, 26, 339, 110, 1, 1, 'S', 'no', '2024-06-28 02:36:30', '2024-06-28 02:46:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'booty short', 'cotton', '2024-04-16 00:07:20', '2024-04-16 00:07:20', '2024-04-16 06:03:46', 1),
(2, 'ELITE OVERSIZE SHIRT', 'DETAILS', '2024-04-16 05:56:37', '2024-04-16 09:47:44', NULL, 1),
(3, 'Elite', 'Bshss', '2024-04-16 06:00:05', '2024-04-16 06:00:05', '2024-04-16 06:03:50', 1),
(4, 'WOMEN\'S TOP', 'DETAILS', '2024-04-16 06:03:31', '2024-04-16 06:03:31', NULL, 1),
(5, 'BOOTY SHORT', 'DETAILS', '2024-04-16 06:04:36', '2024-04-16 06:04:36', '2024-04-16 06:05:16', 1),
(6, 'BOOTY SHORT', 'DETAILS', '2024-04-16 06:04:36', '2024-04-16 06:04:36', NULL, 1),
(7, 'DRESS', 'DETAILS', '2024-04-16 06:05:39', '2024-04-16 06:05:39', '2024-04-16 09:47:56', 1),
(8, 'DRESS', 'DETAILS', '2024-04-16 06:05:39', '2024-04-16 06:05:39', NULL, 1),
(9, 'COORDINATE', 'DETAILS', '2024-04-16 06:05:57', '2024-04-16 06:05:57', NULL, 1),
(10, 'COORDINATE', 'DETAILS', '2024-04-16 06:05:57', '2024-04-16 06:05:57', '2024-04-16 09:47:18', 1),
(11, 'SUBLIMATION SHORT', 'DETAILS', '2024-04-16 06:06:26', '2024-04-16 06:06:26', '2024-04-16 09:49:42', 1),
(12, 'SUBLIMATION SHORT', 'DETAILS', '2024-04-16 06:06:26', '2024-04-16 06:06:26', NULL, 1),
(13, 'SOCKS', 'DETAILS', '2024-04-16 06:06:45', '2024-04-16 06:06:45', '2024-04-16 09:49:36', 1),
(14, 'SOCKS', 'DETAILS', '2024-04-16 06:06:45', '2024-04-16 06:06:45', '2024-05-27 11:16:48', 1),
(15, 'POLO SHIRT', 'DETAILS', '2024-04-16 06:07:04', '2024-04-16 06:07:04', '2024-04-16 09:49:30', 1),
(16, 'POLO SHIRT', 'DETAILS', '2024-04-16 06:07:04', '2024-04-16 06:07:04', NULL, 1),
(17, 'OPEN COLLAR POLO SHIRT', 'DETAILS', '2024-04-16 06:07:39', '2024-04-16 06:07:39', '2024-04-16 09:49:21', 1),
(18, 'OPEN COLLAR POLO SHIRT', 'DETAILS', '2024-04-16 06:07:39', '2024-04-16 06:07:39', NULL, 1),
(19, 'NY POLO SHIRT', 'DETAILS', '2024-04-16 06:08:07', '2024-04-16 06:08:07', NULL, 1),
(20, 'NIKEE SWOOSH POLO SHIRT', 'DETAILS', '2024-04-16 06:08:35', '2024-04-16 06:08:35', '2024-04-16 09:49:09', 1),
(21, 'NIKEE SWOOSH POLO SHIRT', 'DETAILS', '2024-04-16 06:08:35', '2024-04-16 06:08:35', NULL, 1),
(22, 'JACKET COLLECTION', 'DETAILS', '2024-04-16 06:08:53', '2024-04-16 06:08:53', '2024-05-28 05:43:53', 1),
(23, 'CORDUROY SHIRT', 'DETAILS', '2024-04-16 06:09:19', '2024-04-16 06:09:19', '2024-04-16 09:47:09', 1),
(24, 'CORDUROY SHIRT', 'DETAILS', '2024-04-16 06:09:19', '2024-04-16 06:09:19', NULL, 1),
(25, 'CORDUROY SHORT', 'DETAILS', '2024-04-16 06:09:33', '2024-04-16 06:09:33', NULL, 1),
(26, 'CORDUROY SHORT', 'DETAILS', '2024-04-16 06:09:33', '2024-04-16 06:09:33', '2024-04-16 09:47:25', 1),
(27, 'CLASSIC POLO SHIRT', 'DETAILS', '2024-04-16 06:09:56', '2024-04-16 06:09:56', '2024-04-16 09:47:14', 1),
(28, 'CLASSIC POLO SHIRT', 'DETAILS', '2024-04-16 06:09:56', '2024-04-16 06:09:56', NULL, 1),
(29, 'Customizes Shirt Samples', 'DETAILS', '2024-05-26 14:50:34', '2024-05-26 14:50:34', '2024-05-26 14:54:14', 1),
(30, 'EXAMPLE DESIGN TO BE REQUESTED', 'DETAILS', '2024-05-28 01:36:27', '2024-05-28 01:36:27', '2024-06-05 18:11:34', 1),
(31, 'MESH SHORT', 'DETAILS', '2024-05-28 02:07:31', '2024-05-28 02:07:31', NULL, 1),
(32, 'CUSTOMIZED POLO SHIRT/UNIFORM', 'DETAILS', '2024-06-05 18:20:31', '2024-06-13 11:37:21', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `name`, `link`, `created_at`, `deleted_at`) VALUES
(1, 'J&T EXPRESS', 'https://www.jtexpress.ph/', '2024-06-28 06:58:28', NULL),
(2, 'asdasd', 'asdasd', '2024-06-28 07:36:50', '2024-06-28 15:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_municipality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `phone_no`, `province`, `city_municipality`, `barangay`, `complete_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test', 'test@user.com', 'test user', '0000', '1212223233', '042100000', '042108000', '042108023', 'test test ', '2024-03-17 12:04:27', '2024-05-11 15:01:35', '2024-05-11 15:10:49'),
(2, 'user', 'test', 'mail@mail.com', 'user test', '0000', '555555', NULL, NULL, NULL, NULL, '2024-04-14 13:54:16', '2024-04-14 13:54:16', '2024-05-11 15:10:54'),
(3, 'sass', 'sasas', 'sasasdd@mail.com', 'asasa', 'sasa', '5526', NULL, NULL, NULL, NULL, '2024-04-14 14:47:26', '2024-04-14 14:47:26', '2024-05-11 15:10:57'),
(4, 'ewewe', 'wrere', 'dsfdf@mail.com', 'sadsd', '313232', '23233', '015500000', '015506000', '015506007', NULL, '2024-04-14 14:48:12', '2024-04-14 14:48:12', '2024-05-11 15:11:25'),
(5, 'User', 'Test', 'user@test.com', 'usertest', 'password', '11111111', '042100000', '042108000', '042108005', 'Lorem Lorem Lrem aaa', '2024-04-15 10:14:49', '2024-04-15 10:19:06', '2024-05-11 15:10:58'),
(6, 'arlette joyce', 'gonzales', 'arlettejoycelgonzales@gmail.com', 'AJ', '09101651798', '2147483647', '042100000', '042120000', '042120034', '361 banana island ', '2024-04-22 12:30:46', '2024-04-22 13:38:52', '2024-05-11 15:11:03'),
(7, 'JOYCE ERIKA', 'SENARIS', 'joyce.erika08@gmail.com', 'joyce', '1234', '2147483647', '042100000', '042116000', '042116012', 'BONIFACIO ST.', '2024-04-23 17:39:06', '2024-04-23 17:39:06', NULL),
(8, 'justine', 'morales ', 'justinemorales597@gmail.com', 'justine123', 'pogiako', '2147483647', '042100000', '042106000', '042106056', 'blk6 lot6 phase 1 paliparan 3 dasmariñas cavite ', '2024-04-23 20:11:35', '2024-04-23 20:11:35', NULL),
(9, 'karl angelo', 'Oriel', 'itsmelrak22@gmail.com', 'root', 'admin', '9511658756', '042100000', '042108000', '042108023', 'S3 B7 L1, SUNNY BROOKE 1, SAN FRANCISCO, GEN. TRIAS, CAVITE\r\ntest', '2024-05-09 13:37:05', '2024-05-09 13:37:05', NULL),
(10, 'Cathy', 'Hervilla', 'cathy.hervilla@cvsu.edu.ph', 'Cathy03', 'qwerty1w3', '9197822968', '071200000', '071216000', '071216009', 'Nlkqq1', '2024-05-11 20:05:36', '2024-05-11 20:05:36', '2024-05-11 12:07:42'),
(11, 'Cathy', 'Hervilla', 'hervillacathy@gmail.com', 'Kuda123', 'qwerty123', '9197822968', '061900000', '061906000', '061906011', 'none\r\n', '2024-05-11 20:11:40', '2024-06-06 07:28:42', NULL),
(12, 'John', 'Doe', 'john2@doe.com', 'johndoeuser', '0000', '9999999999', '060400000', '060405000', '060405007', 'Testestestest', '2024-05-11 23:29:14', '2024-05-11 23:29:14', NULL),
(13, 'Justine', 'Morales', 'justinemorales009@gmail.com', 'justine', 'pogiako', '0958085073', '042100000', '042106000', '042106056', 'B6 L6 p1 paliparan 3', '2024-05-19 15:42:48', '2024-05-19 15:42:48', NULL),
(14, 'Jane', 'Doe', 'jane@doe.com', '', '', '3333333333', NULL, NULL, NULL, NULL, '2024-05-26 17:33:31', '2024-05-26 17:33:31', NULL),
(15, 'Jane', 'Doe2', 'jane@doe2.com', 'JaneDoe', 'password', '2222222222', '041000000', '041016000', '041016019', 'asdasdasd', '2024-05-26 17:34:23', '2024-05-26 17:34:23', NULL),
(16, 'Christopher', 'Arellano', 'christopherammaqui@gmail.com', 'topher', 'thankslord', '9637775025', '042100000', '042122000', '042122003', 'Purok11 #080  Barangay Cabuco, Trece Martires City, Cavite.', '2024-05-30 23:07:40', '2024-05-30 23:11:58', NULL),
(17, 'Harvey', 'Pinera', 'harvey12@yahoo.com', 'harvey12@yahoo.com', 'hahaha', '9948768805', '166800000', '166809000', '166809009', 'b2 L19 s5', '2024-06-04 16:16:44', '2024-06-04 16:16:44', NULL),
(18, 'Pogi', 'Ako', 'justinemorales375@gmail.com', 'Pogi123', '0922123268', '9850580733', '037700000', '037707000', '037707007', 'B7 L9 P1', '2024-06-06 02:05:39', '2024-06-06 02:05:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customize_orders`
--

CREATE TABLE `customize_orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `json_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Confirmed','Processing','Shipped','Delivered','Declined','Canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_fee` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customize_orders`
--

INSERT INTO `customize_orders` (`id`, `customer_id`, `json_data`, `status`, `total_price`, `shipping_fee`, `created_at`, `updated_at`, `deleted_at`, `remarks`) VALUES
(1, 11, '{\"customize_by\":\"embroidery\",\"estimatedPrice\":\"1450\",\"shirt_selected\":\"Polo Shirts\",\"avatar_sizing\":\"4x4\",\"text_sizing\":\"2x2\",\"sizes_ordered\":{\"s\":\"2\"},\"front_canvas_image\":\"frontImage_1718326170777.png\",\"front_canvas_image_objects\":[\"frontObjectImage_1718326170.png\"],\"front_canvas_text_objects\":[{\"type\":\"text\",\"value\":\"LENG\",\"fill\":\"#000000\",\"fontFamily\":\"helvetica\",\"fontSize\":40,\"fontWeight\":\"\",\"strokeStyle\":\"\"}],\"back_canvas_image\":\"backImage_1718326170777.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[{\"type\":\"text\",\"value\":\"LENG\",\"fill\":\"#000000\",\"fontFamily\":\"helvetica\",\"fontSize\":40,\"fontWeight\":\"\",\"strokeStyle\":\"\"}]}', NULL, NULL, NULL, '2024-06-14 00:49:30', NULL, NULL, NULL),
(2, 11, '{\"customize_by\":\"print\",\"estimatedPrice\":\"500\",\"shirt_selected\":\"Polo Shirts\",\"avatar_sizing\":\"1x1\",\"text_sizing\":\"1x1\",\"sizes_ordered\":{\"s\":\"1\"},\"front_canvas_image\":\"frontImage_1718326911745.png\",\"front_canvas_image_objects\":[],\"front_canvas_text_objects\":[{\"type\":\"text\",\"value\":\"LENG\",\"fill\":\"#000000\",\"fontFamily\":\"helvetica\",\"fontSize\":40,\"fontWeight\":\"\",\"strokeStyle\":\"\"}],\"back_canvas_image\":\"backImage_1718326911745.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[]}', 'Confirmed', '738', '38', '2024-06-14 01:01:50', '2024-06-14 07:32:38', NULL, 'your customize shirt is now approved you total price is 1m thankyou!\n'),
(3, 15, '{\"customize_by\":\"embroidered\",\"estimatedPrice\":\"500\",\"shirt_selected\":\"Short Sleeve Shirts\",\"avatar_sizing\":\"1x1\",\"text_sizing\":\"1x1\",\"sizes_ordered\":{\"xs\":\"1\"},\"front_canvas_image\":\"frontImage_1718605658595.png\",\"front_canvas_image_objects\":[],\"front_canvas_text_objects\":[],\"back_canvas_image\":\"backImage_1718605658595.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[],\"checkPersonalizedItems\":{\"p_collar_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_right_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_left_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_hem_value\":{\"color\":\"#000000\",\"price\":50},\"p_plaket_value\":{\"color\":\"#000000\",\"price\":50},\"p_button_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_whole_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_upper_part_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_lower_part_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_right_part_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_left_part_value\":{\"color\":\"#000000\",\"price\":50}}}', NULL, NULL, NULL, '2024-06-17 06:27:38', NULL, NULL, NULL),
(4, 15, '{\"customize_by\":\"embroidered\",\"estimatedPrice\":\"500\",\"shirt_selected\":\"Short Sleeve Shirts\",\"avatar_sizing\":\"1x1\",\"text_sizing\":\"1x1\",\"sizes_ordered\":{\"xs\":\"1\"},\"front_canvas_image\":\"frontImage_1718607405277.png\",\"front_canvas_image_objects\":[],\"front_canvas_text_objects\":[],\"back_canvas_image\":\"backImage_1718607405277.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[],\"checkPersonalizedItems\":{\"p_collar_value\":{\"color\":\"#db0000\",\"price\":50},\"p_sleeve_right_value\":{\"color\":\"#ffa200\",\"price\":50},\"p_sleeve_left_value\":{\"color\":\"#03e230\",\"price\":50},\"p_sleeve_hem_value\":{\"color\":\"#0048f0\",\"price\":50},\"p_plaket_value\":{\"color\":\"#ffffff\",\"price\":50},\"p_button_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_whole_value\":{\"color\":\"#da5fe3\",\"price\":50},\"p_body_color_upper_part_value\":{\"color\":\"#3cb4dd\",\"price\":50},\"p_body_color_lower_part_value\":{\"color\":\"#1b6407\",\"price\":50},\"p_body_color_right_part_value\":{\"color\":\"#ddbb13\",\"price\":50},\"p_body_color_left_part_value\":{\"color\":\"#ff00d4\",\"price\":50}}}', NULL, NULL, NULL, '2024-06-17 06:56:45', NULL, NULL, NULL),
(5, 15, '{\"customize_by\":\"embroidered\",\"estimatedPrice\":\"500\",\"shirt_selected\":\"Short Sleeve Shirts\",\"avatar_sizing\":\"1x1\",\"text_sizing\":\"1x1\",\"sizes_ordered\":{\"xs\":\"1\"},\"front_canvas_image\":\"frontImage_1718607770039.png\",\"front_canvas_image_objects\":[],\"front_canvas_text_objects\":[],\"back_canvas_image\":\"backImage_1718607770039.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[],\"checkPersonalizedItems\":{\"p_collar_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_right_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_left_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_hem_value\":{\"color\":\"#000000\",\"price\":50},\"p_plaket_value\":{\"color\":\"#000000\",\"price\":50},\"p_button_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_whole_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_upper_part_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_lower_part_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_right_part_value\":{\"color\":\"#000000\",\"price\":50},\"p_body_color_left_part_value\":{\"color\":\"#000000\",\"price\":50}}}', NULL, NULL, NULL, '2024-06-17 07:02:50', NULL, NULL, NULL),
(6, 15, '{\"customize_by\":\"embroidered\",\"estimatedPrice\":\"500\",\"shirt_selected\":\"Short Sleeve Shirts\",\"avatar_sizing\":\"1x1\",\"text_sizing\":\"1x1\",\"sizes_ordered\":{\"xs\":\"1\"},\"front_canvas_image\":\"frontImage_1718607899288.png\",\"front_canvas_image_objects\":[],\"front_canvas_text_objects\":[],\"back_canvas_image\":\"backImage_1718607899288.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[],\"checkPersonalizedItems\":{\"p_collar_value\":{\"color\":\"#e60000\",\"price\":50},\"p_sleeve_right_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_left_value\":{\"color\":\"#b30f0f\",\"price\":50},\"p_sleeve_hem_value\":{\"color\":\"#00fffb\",\"price\":50},\"p_plaket_value\":{\"color\":\"#34b754\",\"price\":50},\"p_button_value\":{\"color\":\"#1e4d94\",\"price\":50},\"p_body_color_whole_value\":{\"color\":\"#a2b607\",\"price\":50},\"p_body_color_upper_part_value\":{\"color\":\"#e10ebe\",\"price\":50},\"p_body_color_lower_part_value\":{\"color\":\"#9d3939\",\"price\":50},\"p_body_color_right_part_value\":{\"color\":\"#66998a\",\"price\":50},\"p_body_color_left_part_value\":{\"color\":\"#ffffff\",\"price\":50}},\"checkPersonalizedItemsTotal\":\"550\"}', 'Processing', '1610', '10', '2024-06-17 07:04:59', '2024-06-17 07:14:09', NULL, ''),
(7, 15, '{\"customize_by\":\"embroidered\",\"estimatedPrice\":\"1000\",\"shirt_selected\":\"Short Sleeve Shirts\",\"avatar_sizing\":\"1x1\",\"text_sizing\":\"1x1\",\"sizes_ordered\":{\"xs\":\"2\"},\"front_canvas_image\":\"frontImage_1718613287189.png\",\"front_canvas_image_objects\":[\"frontObjectImage_1718613287.png\"],\"front_canvas_text_objects\":[],\"back_canvas_image\":\"backImage_1718613287189.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[],\"checkPersonalizedItems\":{\"p_collar_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_right_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_left_value\":{\"color\":\"#000000\",\"price\":50},\"p_sleeve_hem_value\":{\"color\":\"#000000\",\"price\":50}},\"checkPersonalizedItemsTotal\":\"200\"}', NULL, NULL, NULL, '2024-06-17 08:34:47', NULL, NULL, NULL),
(8, 15, '{\"customize_by\":\"printed\",\"estimatedPrice\":\"500\",\"shirt_selected\":\"MONOCHROME (DESIGN 1)\",\"avatar_sizing\":\"1x1\",\"text_sizing\":\"1x1\",\"sizes_ordered\":{\"xs\":\"2\"},\"front_canvas_image\":\"frontImage_1718613637377.png\",\"front_canvas_image_objects\":[\"frontObjectImage_1718613637.png\"],\"front_canvas_text_objects\":[],\"back_canvas_image\":\"backImage_1718613637377.png\",\"back_canvas_image_objects\":[],\"back_canvas_text_objects\":[],\"checkPersonalizedItems\":{\"p_collar_value\":{\"color\":\"#a20707\",\"price\":50},\"p_sleeve_right_value\":{\"color\":\"#2d5844\",\"price\":50},\"p_sleeve_left_value\":{\"color\":\"#cb9606\",\"price\":50}},\"checkPersonalizedItemsTotal\":\"150\"}', NULL, NULL, NULL, '2024-06-17 08:40:37', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender_age_category`
--

CREATE TABLE `gender_age_category` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_id` int NOT NULL DEFAULT '0',
  `estimated_days_of_delivery` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`, `mop`, `payment_id`, `paid`, `created_at`, `updated_at`, `deleted_at`, `tracking_number`, `courier_id`, `estimated_days_of_delivery`) VALUES
(1, 1, '100', 0, 'cod', NULL, 'no', '2024-04-17 01:54:45', '2024-06-28 08:17:35', NULL, 'sdadasdasd', 1, 2),
(2, 1, '0', 0, 'cod', NULL, 'no', '2024-04-17 16:31:34', '2024-04-17 16:31:34', NULL, NULL, 0, 0),
(3, 1, '0', 0, 'cod', NULL, 'no', '2024-04-22 10:26:43', '2024-04-22 10:26:43', NULL, NULL, 0, 0),
(4, 1, '0', 0, 'cod', NULL, 'no', '2024-04-22 10:26:43', '2024-04-22 10:26:43', NULL, NULL, 0, 0),
(5, 1, '0', 0, 'cod', NULL, 'no', '2024-04-22 10:26:43', '2024-04-22 10:26:43', NULL, NULL, 0, 0),
(6, 1, '0', 0, 'cod', NULL, 'no', '2024-04-22 10:26:43', '2024-04-22 10:26:43', NULL, NULL, 0, 0),
(7, 1, '0', 0, 'cod', NULL, 'no', '2024-04-22 10:26:45', '2024-04-22 10:26:45', NULL, NULL, 0, 0),
(8, 1, '0', 0, 'cod', NULL, 'no', '2024-04-22 10:26:45', '2024-04-22 10:26:45', NULL, NULL, 0, 0),
(9, 1, '100', 0, 'cod', NULL, 'no', '2024-04-22 10:26:45', '2024-04-22 04:15:53', NULL, NULL, 0, 0),
(10, 6, '100', 0, 'cod', NULL, 'no', '2024-04-22 12:32:56', '2024-04-22 04:33:58', NULL, NULL, 0, 0),
(11, 7, '0', 0, 'cod', NULL, 'no', '2024-04-23 17:46:33', '2024-04-23 17:46:33', NULL, NULL, 0, 0),
(12, 11, '0', 0, 'cod', NULL, 'no', '2024-05-14 17:12:40', '2024-05-14 17:12:40', NULL, NULL, 0, 0),
(13, 13, '0', 0, 'cod', NULL, 'no', '2024-05-19 16:30:33', '2024-05-19 16:30:33', NULL, NULL, 0, 0),
(14, 13, '0', 0, 'cod', NULL, 'no', '2024-05-19 16:30:33', '2024-05-19 16:30:33', NULL, NULL, 0, 0),
(15, 13, '0', 0, 'cod', NULL, 'no', '2024-05-19 16:30:33', '2024-05-19 16:30:33', NULL, NULL, 0, 0),
(16, 13, '0', 0, 'cod', NULL, 'no', '2024-05-19 16:30:33', '2024-05-19 16:30:33', NULL, NULL, 0, 0),
(17, 11, '0', 0, 'cod', NULL, 'no', '2024-05-27 17:35:19', '2024-05-27 17:35:19', NULL, NULL, 0, 0),
(18, 11, '0', 0, 'cod', NULL, 'no', '2024-05-27 17:35:22', '2024-05-27 17:35:22', NULL, NULL, 0, 0),
(19, 11, '0', 0, 'cod', NULL, 'no', '2024-05-27 17:35:28', '2024-05-27 17:35:28', NULL, NULL, 0, 0),
(20, 11, '100', 0, 'cod', NULL, 'no', '2024-05-27 17:35:29', '2024-06-23 02:33:07', NULL, NULL, 0, 0),
(21, 11, '0', 0, 'cod', NULL, 'no', '2024-05-27 17:35:29', '2024-05-27 17:35:29', NULL, NULL, 0, 0),
(22, 13, '100', 0, 'cod', NULL, 'no', '2024-05-27 19:48:51', '2024-05-27 12:54:08', NULL, NULL, 0, 0),
(23, 11, '0', 0, 'cod', NULL, 'no', '2024-05-28 09:13:01', '2024-05-28 09:13:01', '2024-05-28 09:13:01', NULL, 0, 0),
(24, 11, '0', 0, 'cod', NULL, 'no', '2024-05-28 09:13:20', '2024-05-28 09:13:20', '2024-05-28 09:13:20', NULL, 0, 0),
(25, 11, '0', 0, 'cod', NULL, 'no', '2024-05-28 09:13:36', '2024-05-28 09:13:36', NULL, NULL, 0, 0),
(26, 11, '260', 0, 'cod', NULL, 'no', '2024-05-28 09:19:09', '2024-05-28 01:19:36', NULL, NULL, 0, 0),
(27, 11, '0', 0, 'cod', NULL, 'no', '2024-06-02 01:08:01', '2024-06-02 01:08:01', '2024-06-02 01:08:01', NULL, 0, 0),
(28, 11, '100', 0, 'cod', NULL, 'no', '2024-06-02 01:08:15', '2024-06-01 17:14:37', NULL, NULL, 0, 0),
(29, 11, '0', 0, 'cod', NULL, 'no', '2024-06-02 01:15:44', '2024-06-02 01:15:44', NULL, NULL, 0, 0),
(30, 11, '0', 0, 'cod', NULL, 'no', '2024-06-06 06:48:36', '2024-06-06 06:48:36', '2024-06-06 06:48:36', NULL, 0, 0),
(31, 11, '0', 0, 'cod', NULL, 'no', '2024-06-06 09:55:11', '2024-06-06 09:55:11', '2024-06-06 09:55:11', NULL, 0, 0),
(32, 17, '180', 0, 'cod', NULL, 'no', '2024-06-06 15:29:01', '2024-06-23 02:32:45', NULL, NULL, 0, 0),
(33, 15, '0', 0, 'cod', NULL, 'no', '2024-06-26 00:03:40', '2024-06-26 00:03:40', NULL, NULL, 0, 0),
(34, 15, '0', 0, 'cod', NULL, 'no', '2024-06-28 02:46:13', '2024-06-28 02:46:13', NULL, NULL, 0, 0),
(35, 15, '0', 0, 'cod', NULL, 'no', '2024-06-28 18:12:30', '2024-06-28 18:12:30', NULL, NULL, 0, 0);

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
  `created_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `cart_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 17, 80, 1, 1, '2024-04-17 01:54:45', '2024-04-17 01:54:45'),
(2, 2, 17, 97, 2, 1, '2024-04-17 16:31:34', '2024-04-17 16:31:34'),
(3, 6, 17, 79, 3, 1, '2024-04-22 10:26:43', '2024-04-22 10:26:43'),
(4, 3, 17, 79, 3, 1, '2024-04-22 10:26:43', '2024-04-22 10:26:43'),
(5, 5, 17, 79, 3, 1, '2024-04-22 10:26:43', '2024-04-22 10:26:43'),
(6, 4, 17, 79, 3, 1, '2024-04-22 10:26:43', '2024-04-22 10:26:43'),
(7, 7, 17, 79, 3, 1, '2024-04-22 10:26:45', '2024-04-22 10:26:45'),
(8, 9, 17, 79, 3, 1, '2024-04-22 10:26:45', '2024-04-22 10:26:45'),
(9, 8, 17, 79, 3, 1, '2024-04-22 10:26:45', '2024-04-22 10:26:45'),
(10, 10, 17, 91, 4, 1, '2024-04-22 12:32:56', '2024-04-22 12:32:56'),
(11, 11, 14, 73, 6, 10, '2024-04-23 17:46:33', '2024-04-23 17:46:33'),
(12, 12, 16, 76, 10, 1, '2024-05-14 17:12:40', '2024-05-14 17:12:40'),
(13, 12, 16, 78, 11, 2, '2024-05-14 17:12:40', '2024-05-14 17:12:40'),
(14, 12, 2, 6, 9, 1, '2024-05-14 17:12:40', '2024-05-14 17:12:40'),
(15, 13, 8, 32, 12, 1, '2024-05-19 16:30:33', '2024-05-19 16:30:33'),
(16, 14, 8, 32, 12, 1, '2024-05-19 16:30:33', '2024-05-19 16:30:33'),
(17, 15, 8, 32, 12, 1, '2024-05-19 16:30:33', '2024-05-19 16:30:33'),
(18, 16, 8, 32, 12, 1, '2024-05-19 16:30:33', '2024-05-19 16:30:33'),
(19, 17, 2, 1, 16, 1, '2024-05-27 17:35:19', '2024-05-27 17:35:19'),
(20, 18, 2, 1, 16, 1, '2024-05-27 17:35:22', '2024-05-27 17:35:22'),
(21, 19, 2, 1, 16, 1, '2024-05-27 17:35:28', '2024-05-27 17:35:28'),
(22, 20, 2, 1, 16, 1, '2024-05-27 17:35:29', '2024-05-27 17:35:29'),
(23, 21, 2, 1, 16, 1, '2024-05-27 17:35:29', '2024-05-27 17:35:29'),
(24, 22, 2, 1, 17, 1, '2024-05-27 19:48:51', '2024-05-27 19:48:51'),
(25, 25, 2, 2, 23, 1, '2024-05-28 09:13:36', '2024-05-28 09:13:36'),
(26, 26, 3, 9, 26, 1, '2024-05-28 09:19:09', '2024-05-28 09:19:09'),
(27, 28, 2, 2, 28, 1, '2024-06-02 01:08:15', '2024-06-02 01:08:15'),
(28, 29, 47, 266, 29, 1, '2024-06-02 01:15:44', '2024-06-02 01:15:44'),
(29, 31, 2, 1, 36, 1, '2024-06-06 09:55:11', '2024-06-06 09:55:11'),
(30, 32, 26, 163, 46, 1, '2024-06-06 15:29:01', '2024-06-06 15:29:01'),
(31, 33, 45, 255, 38, 1, '2024-06-26 00:03:40', '2024-06-26 00:03:40'),
(32, 33, 27, 166, 37, 2, '2024-06-26 00:03:40', '2024-06-26 00:03:40'),
(33, 34, 26, 339, 52, 1, '2024-06-28 02:46:13', '2024-06-28 02:46:13'),
(34, 35, 2, 2, 35, 2, '2024-06-28 18:12:30', '2024-06-28 18:12:30');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int DEFAULT NULL,
  `color` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `color`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(1, NULL, 'BOOTY SHORT', 'garterize 23-32 waistline\r\nlength 20 inches\r\ncotton fabric', 200, NULL, '2024-04-16 07:57:11', '2024-04-16 07:57:11', '2024-04-16 10:31:16', 1),
(2, 6, 'BOOTY SHORTS', 'FABRIC: TERRY BRASSFREESIZE : SMALL TO SEMI LARGE FITWAIST : 26-30 LENGTH : 10L QUALITY CHECK ITEM\'S PRICES ARE VERY AFFORDABLE, PLEASE DO NOT EXPECT TOO MUCH. Prices are super affordable please do not expect mall quality. The item is direct from local manufacturers and sewers, there may be changes with pattern and design of the fabric without prior notice.', 100, NULL, '2024-04-16 18:30:31', '2024-04-16 10:36:03', NULL, 1),
(3, 28, 'CLASSIC POLO SHIRT', '-CVC cotton ang fabric, 220gsm. -Small-XL available sizes-Perfect pang gift at pang outfit', 250, NULL, '2024-04-16 18:38:31', '2024-04-16 10:42:35', NULL, 1),
(4, 9, 'COORDINATE', '✔️ cotton bark fabric\r\n\r\n✔️ garterized\r\n\r\n✔️ fit to large\r\n\r\n', 150, NULL, '2024-04-16 18:42:25', '2024-04-16 18:42:25', '2024-04-16 10:43:38', 1),
(5, 9, 'COORDINATE', '✔️ cotton bark fabric\r\n\r\n✔️ garterized\r\n\r\n✔️ fit to large\r\n\r\n', 150, NULL, '2024-04-16 18:43:30', '2024-04-16 18:43:30', '2024-04-16 10:49:37', 1),
(6, 24, 'CORDUROY SHIRT', '• Premium Quality\r\n• 280gsm thick of fabric (pero hindi mainit suotin 💯)\r\n• Available size from Medium to XL', 300, NULL, '2024-04-16 18:51:30', '2024-04-16 18:51:30', '2024-05-27 02:30:11', 1),
(7, 25, 'CORDUROY SHORT', 'Length:16\"\r\nWaist: 26-35\" max (garterize)\r\nHips: 38\"\r\nRise : 11\"\r\nLeg Hole: 24\"\r\nFabric: Colduroy\r\nPocket :4\r\nFit: Loss', 200, NULL, '2024-04-16 19:03:07', '2024-04-16 19:03:07', '2024-05-26 14:19:20', 1),
(8, 22, 'JACKET COLLECTION', 'Premium Quality\r\nSoft and comfortable\r\nPrinted Longer Jackets\r\nWith Hoodie', 350, NULL, '2024-04-16 19:12:30', '2024-04-16 19:12:30', '2024-05-26 14:23:30', 1),
(9, 2, 'ELITE OVERSIZE SHIRT', '•220GSM\r\n•Sizes:XS,Small,Medium,Large,XL\r\n•24colors available\r\n•80%Cotton 20%Polyester\r\n•1.5inches neck ribbings\r\n•Crewneck\r\n•Oversized Sleeve', 160, NULL, '2024-04-16 19:20:45', '2024-04-16 19:20:45', '2024-05-25 15:28:29', 1),
(10, 21, 'NIKEE SWOOSH POLO SHIRT', 'Embroided design\r\n200GSM\r\nHoneycomb fabric\r\nSizes: xs, small, medium, large, xl, xxl and xxxl\r\n28 colors available', 250, NULL, '2024-04-16 19:26:41', '2024-04-16 19:26:41', '2024-05-25 15:28:53', 1),
(11, 19, 'NY POLO SHIRT', 'Made of 100% polyester material which is perfect for sports apparel. It moves sweat from the body to the outer side of the garment. This kind of Dri-fit material that quickly evaporates sweat hence keeping the user cool & dry when doing outdoor activities.', 250, NULL, '2024-04-16 19:32:55', '2024-04-16 19:32:55', '2024-05-26 14:38:31', 1),
(12, 18, 'OPEN COLLAR POLO SHIRT', '-Fabric is very comfy and stylish\r\n-Linen fabric\r\n-Regular and plus size ', 250, NULL, '2024-04-16 19:35:38', '2024-04-16 19:35:38', '2024-05-25 15:28:37', 1),
(13, 16, 'POLO SHIRT', '✔️ Guarantee brand new and high quality 🙂\r\n\r\n✔️The fabric is soft and breathable\r\n\r\n✔️ Local production', 250, NULL, '2024-04-16 19:42:15', '2024-04-16 19:42:15', '2024-05-25 15:28:48', 1),
(14, 14, 'SOCKS', 'Unisex\r\nPrevent allergy\r\nComfortable and breathable\r\n100% Brand New & High Quality\r\nMaterial:Cotton Blend', 150, NULL, '2024-04-16 19:46:08', '2024-04-16 19:46:08', '2024-05-27 11:16:15', 1),
(15, 14, 'NIKEE SOCKS', 'Unisex\r\nPrevent allergy\r\nComfortable and breathable\r\n100% Brand New & High Quality\r\nMaterial:Cotton Blend', 150, NULL, '2024-04-16 19:49:13', '2024-04-16 19:49:13', '2024-06-05 16:55:45', 1),
(16, 12, 'SUBLIMATION MESH SHORT', 'MESH SHORTS FULL SUBLIMATION CLASSIC', 320, NULL, '2024-04-16 19:51:35', '2024-04-16 19:51:35', NULL, 1),
(17, 4, 'PREMIUM TOPS', 'FREESIZE, BRAND NEW, COTTON SPAN FABRIC ', 100, NULL, '2024-04-16 19:55:48', '2024-04-16 19:55:48', '2024-05-24 16:56:10', 1),
(18, 4, 'CROPTOP', 'Basic croptop\r\nKnitted fabric\r\nDont expect na malabangla tela po ahhh kase mura lang po ito', 100, NULL, '2024-05-25 01:04:22', '2024-05-25 01:04:22', '2024-05-25 15:14:32', 1),
(19, 2, 'PREMIUM TOPS(Round Neck)', 'Knitted Fabric Makapal Round Neck', 100, NULL, '2024-05-25 01:24:54', '2024-05-24 17:25:59', '2024-05-24 17:36:14', 1),
(20, 4, 'SLEEVELESS', 'Premium Sleeveless Tops\r\n', 100, NULL, '2024-05-25 01:34:07', '2024-05-25 01:34:07', '2024-05-25 15:14:14', 1),
(21, 4, 'PREMIUM TOPS', 'RoundNeck \r\nKnitted Fabric\r\nMakapal\r\nVery Affordable ', 100, NULL, '2024-05-25 01:38:14', '2024-05-25 01:38:14', '2024-05-25 15:14:21', 1),
(22, 4, 'SQUARENECK SHIRT', 'Good fabric, quality guaranteed, comfortable to wear, washable and not stretchy.\r\nBeautiful, modern design, suitable for many occasion', 100, NULL, '2024-05-25 01:51:07', '2024-05-25 01:51:07', '2024-05-25 15:14:02', 1),
(23, 4, 'SLEEVELESS CROP TOP', '➜FABRIC/MATERIAL: KNITTED➜SIZES: FREE SIZE FITS SMALL TO LARGE➜DESIGNS: CROP TOP', 100, NULL, '2024-05-25 23:15:37', '2024-05-25 15:22:10', NULL, 1),
(24, 4, 'SQUARE NECK CROP TOP', '➜FABRIC/MATERIAL: KNITTED\r\n➜SIZES: FREE SIZE FITS SMALL TO LARGE\r\n➜DESIGNS: SQUARE NECK CROP TOP', 100, NULL, '2024-05-25 23:23:05', '2024-05-25 23:23:05', NULL, 1),
(25, 4, 'V NECK CROP TOP', '➜FABRIC/MATERIAL: \r\nCOTTON SPANDEX \r\n➜SIZES: FREE SIZE FITS SMALL TO LARGE\r\n➜DESIGNS: V NECK CROP TOP', 100, NULL, '2024-05-26 22:01:35', '2024-05-26 22:01:35', '2024-06-06 02:09:23', 1),
(26, 8, 'BARBARA DRESS', '➜DRESS SHAPE:\r\nPEPLUM DRESSES\r\n➜FABRIC/MATERIAL: \r\nBARK CREPE\r\n➜SIZES: FREE SIZE FITS SMALL TO MEDIUM\r\n➜DESIGNS/PATTERN: PLAIN\r\n➜DRESS LENGTH:\r\nMINI/ABOVE THE KNEE', 180, NULL, '2024-05-26 22:10:18', '2024-05-26 22:10:18', NULL, 1),
(27, 25, 'CORDUROY SHORT', 'Length:16\" Waist: 26-35\" max (garterize) Hips: 38\" Rise : 11\" Leg Hole: 24\" Fabric: Colduroy Pocket :4 Fit: Loss', 200, NULL, '2024-05-26 22:19:56', '2024-05-26 22:19:56', NULL, 1),
(28, 22, 'USAF JACKET', ' -Long sleeves\r\n- Regular fit\r\n- Printed graphics\r\n- Full button close\r\n- Dual zip-close front pockets', 250, NULL, '2024-05-26 22:27:48', '2024-05-26 22:27:48', '2024-05-28 02:17:07', 1),
(29, 22, 'WINDBREAKER JACKET', '-Long sleeves - Regular fit - Printed graphics - Full button close - Dual zip-close front pockets', 250, NULL, '2024-05-26 22:29:48', '2024-05-26 22:29:48', '2024-05-28 02:17:23', 1),
(30, 22, 'PUMA JACKET', '-Long sleeves - Regular fit - Printed graphics - Full button close - Dual zip-close front pockets', 250, NULL, '2024-05-26 22:32:55', '2024-05-26 22:32:55', '2024-05-28 02:16:44', 1),
(31, 2, 'OASICS JACKET', '-Long sleeves - Regular fit - Printed graphics - Full button close - Dual zip-close front pockets', 250, NULL, '2024-05-26 22:34:30', '2024-05-26 22:34:30', '2024-05-27 05:46:10', 1),
(32, 19, 'NY POLO SHIRT', 'Two-button placket\r\nSIZING TIP: Product runs small. For a looser fit, we recommend sizing up.\r\nMaterial: 100% Polyester - Body; 97% Polyester/3% Spandex - Rib\r\nShort sleeve\r\nMachine wash, tumble dry low', 250, NULL, '2024-05-26 22:42:23', '2024-05-26 22:42:23', '2024-05-27 02:13:55', 1),
(33, 19, 'NY POLO SHIRT', 'Premium Quality polo shirt with embroidered design, Comfy and Stylish.\r\n230GSM Honeycomb cotton\r\nModern styling classic fit for dryness and comfort.', 250, NULL, '2024-05-27 10:00:36', '2024-05-27 10:00:36', '2024-05-27 02:14:38', 1),
(34, 21, 'NIKEE SWOOSH POLO SHIRT', 'Description: Two-button placket SIZING TIP: Product runs small. For a looser fit, we recommend sizing up. Material: 100% Polyester - Body; 97% Polyester/3% Spandex - Rib Short sleeve Machine wash, tumble dry low', 250, NULL, '2024-05-27 10:14:30', '2024-05-27 10:14:30', NULL, 1),
(35, 24, 'CORDUROY SHIRT', '220Gsm Shirt Corduroy Fabric\r\nComfy at hindi mainit sa katawan', 300, NULL, '2024-05-27 10:31:16', '2024-05-27 10:31:16', NULL, 1),
(36, 2, 'OASICS JACKET', '-Long sleeves - Regular fit - Printed graphics - Full button close - Dual zip-close front pockets', 250, NULL, '2024-05-27 13:46:28', '2024-05-27 13:46:28', '2024-05-27 05:46:35', 1),
(37, 22, 'OASICS JACKET', '-Long sleeves - Regular fit - Printed graphics - Full button close - Dual zip-close front pockets', 250, NULL, '2024-05-27 13:46:47', '2024-05-27 13:46:47', '2024-05-28 02:16:13', 1),
(38, 22, 'SEATTLE JACKET', '-Long sleeves - Regular fit - Printed graphics - Full button close - Dual zip-close front pockets', 250, NULL, '2024-05-27 13:48:09', '2024-05-27 13:48:09', '2024-05-28 02:16:51', 1),
(39, 9, 'COORDINATE', 'cotton lines\r\n\r\ntop:\r\nsize small-medium \r\nlength 14.5 inches\r\nchest 34 inches\r\narmhole 18 inches\r\nneckline 23.5 inches\r\n\r\nshort:\r\nrelaxed 25 inches\r\nstreched 36 inches\r\nside seam 14.5 inches\r\ninseam 3 inches\r\ncrotch 14 inches\r\ncuff 26 inches\r\nlength 14.5 inches\r\nhips 26 inches', 180, NULL, '2024-05-27 13:55:27', '2024-05-27 13:55:27', NULL, 1),
(40, 16, 'POLO SHIRT', 'Product runs small. For a looser fit, we recommend sizing up. Material: 100% Polyester - Body; 97% Polyester/3% Spandex - Rib Short sleeve Machine wash, tumble dry low', 200, NULL, '2024-05-27 14:52:45', '2024-05-27 14:52:45', NULL, 1),
(41, 19, 'NY POLO SHIRT', ' Two-button placket  For a looser fit, we recommend sizing up. Material: 100% Polyester - Body; 97% Polyester/3% Spandex - Rib Short sleeve Machine wash, tumble dry lowSizes from small-xl', 250, NULL, '2024-05-27 15:00:34', '2024-05-28 05:13:27', NULL, 1),
(42, 2, 'ELITE OVERSIZED SHIRT', '•220GSM\r\n•Sizes:XS,Small,Medium,Large,XL\r\n•24colors available\r\n•80%Cotton 20%Polyester\r\n•1.5inches neck ribbings\r\n•Crewneck\r\n•Oversized Sleeve', 160, NULL, '2024-05-27 18:58:49', '2024-05-27 18:58:49', NULL, 1),
(43, 18, 'OPEN COLLAR POLO SHIRT', '-	Fabric is very comfy and stylish\r\n-	Linen fabric', 250, NULL, '2024-05-27 19:06:09', '2024-05-27 19:06:09', '2024-05-28 04:58:21', 1),
(44, 30, 'POLOSHIRTS DESIGN', 'this is not for sale. the design are needed to be requested thru our email A&Japparel25@gmail.com we\'ll check it first before we approve your request thank you.', 0, NULL, '2024-05-28 09:37:01', '2024-05-28 05:52:20', '2024-06-05 17:32:07', 1),
(45, 31, 'PLAIN MESH SHORT', 'Mesh Shorts\r\nAir-cool FABRIC \r\nMen Shorts\r\nSize Medium (36-40 Waistline)\r\nAbove The Knee (16 Inches High)\r\nWith Side Pocket\r\nClothing Line Quality', 150, NULL, '2024-05-28 10:08:13', '2024-05-28 10:08:13', NULL, 1),
(46, 22, 'MLB Jacket', 'Length:26 inches\r\nWidth: 22 inches\r\nSweater Weather\r\n', 300, NULL, '2024-05-28 10:21:25', '2024-05-28 10:21:25', '2024-05-28 05:43:46', 1),
(47, 18, 'OPEN COLLAR POLO SHIRT', '-	Fabric is very comfy and stylish-	Linen fabric', 250, NULL, '2024-05-28 12:58:49', '2024-05-28 12:58:49', NULL, 1),
(48, 32, 'SUN AND SHADOW', 'NOT FOR SALE', 300, NULL, '2024-06-06 02:26:04', '2024-06-06 02:26:04', '2024-06-13 16:30:02', 1),
(49, 32, 'FROSTY AZURE', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:38:52', '2024-06-06 12:38:52', '2024-06-13 16:29:15', 1),
(50, 32, 'FOREST NIGHT', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:40:05', '2024-06-06 12:40:05', '2024-06-13 16:29:10', 1),
(51, 32, 'MONOCHROME', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:41:57', '2024-06-06 12:41:57', '2024-06-13 16:29:39', 1),
(52, 32, 'NAVY NIOR', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:43:13', '2024-06-06 12:43:13', '2024-06-13 16:29:43', 1),
(53, 32, 'SAPPHIRE SHADOW', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:45:00', '2024-06-06 12:45:00', '2024-06-13 16:29:56', 1),
(54, 32, 'HEAVENLY HAZE', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:46:20', '2024-06-06 12:46:20', '2024-06-13 16:29:22', 1),
(55, 32, 'LEMON CHIFFON', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:47:16', '2024-06-06 12:47:16', '2024-06-13 16:29:27', 1),
(56, 32, 'MINT FROST', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:49:44', '2024-06-06 12:49:44', '2024-06-13 16:29:35', 1),
(57, 32, 'SILVER MIST', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:50:55', '2024-06-06 12:50:55', '2024-06-13 16:30:09', 1),
(58, 32, 'AMBER AND JET', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:52:18', '2024-06-06 12:52:18', '2024-06-13 16:20:32', 1),
(59, 32, 'BLUE ECLIPSE', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:53:30', '2024-06-06 12:53:30', '2024-06-13 16:28:42', 1),
(60, 32, 'COBALT SHADOW', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:54:45', '2024-06-06 12:54:45', '2024-06-13 16:28:51', 1),
(61, 32, 'EMERALD SHADOW', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:55:43', '2024-06-06 12:55:43', '2024-06-13 16:29:01', 1),
(62, 32, 'GRAYSCALE', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:56:41', '2024-06-06 12:56:41', '2024-06-13 16:29:19', 1),
(63, 32, 'AZURE NIOR', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:58:16', '2024-06-06 12:58:16', '2024-06-13 16:23:35', 1),
(64, 32, 'CHARCOAL BLEND', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 12:59:29', '2024-06-06 12:59:29', '2024-06-13 16:28:47', 1),
(65, 32, 'GOLD AND ONYX', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 13:00:18', '2024-06-06 13:00:18', '2024-06-13 16:29:05', 1),
(66, 32, 'MIDNIGHT MOSS', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 13:01:34', '2024-06-06 13:01:34', '2024-06-13 16:29:30', 1),
(67, 32, 'SHAPPIRE MIDNIGHT', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-06 13:03:12', '2024-06-06 13:03:12', '2024-06-13 16:30:21', 1),
(68, 32, 'DESIGN 1', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-14 00:30:49', '2024-06-14 00:30:49', NULL, 1),
(69, 2, 'DESIGN 2', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-14 00:31:03', '2024-06-14 00:31:03', '2024-06-13 16:31:34', 1),
(70, 32, 'DESIGN 3', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-14 00:31:21', '2024-06-14 00:31:21', NULL, 1),
(71, 32, 'DESIGN 2', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-14 00:31:44', '2024-06-14 00:31:44', NULL, 1),
(72, 32, 'DESIGN 4', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-14 00:31:58', '2024-06-14 00:31:58', NULL, 1),
(73, 32, 'DESIGN 5', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-14 00:32:35', '2024-06-14 00:32:35', NULL, 1),
(74, 32, 'DESIGN 6', 'Our estimated price is provided for reference only, as the item is not currently available for sale. If you\'re interested in acquiring a similar design, please reach out to us via email to discuss your request further.', 300, NULL, '2024-06-14 00:32:48', '2024-06-14 00:32:48', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci,
  `stock_qty` int NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `name`, `code`, `stock_qty`, `image`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 2, 'gray', '#c2c4c4', 43, 'uploads/products/2/1/7.png', '2024-04-16 18:32:21', '2024-06-06 09:55:11', NULL, 1, 1),
(2, 2, 'Mauve', '#966060', 46, 'uploads/products/2/2/6.png', '2024-04-16 18:32:55', '2024-06-28 18:12:30', NULL, 1, 1),
(3, 2, 'Pecan', '#a6391e', 89, 'uploads/products/2/3/5.png', '2024-04-16 18:33:21', '2024-06-05 16:33:44', NULL, 1, 1),
(4, 2, 'Purple', '#ae7bcc', 50, 'uploads/products/2/4/4.png', '2024-04-16 18:33:56', '2024-06-05 16:32:39', NULL, 1, 1),
(5, 2, 'SageGreen', '#9cb894', 85, 'uploads/products/2/5/3.png', '2024-04-16 18:34:27', '2024-06-05 16:33:34', NULL, 1, 1),
(6, 2, 'Tan', '#c7b894', 49, 'uploads/products/2/6/2.png', '2024-04-16 18:34:59', '2024-06-05 16:33:03', NULL, 1, 1),
(7, 2, 'White', '#ffffff', 99, 'uploads/products/2/7/1.png', '2024-04-16 18:35:24', '2024-06-05 16:33:21', NULL, 1, 1),
(8, 3, 'Black', '#000000', 112, 'uploads/products/3/8/2.png', '2024-04-16 18:39:06', '2024-06-05 16:38:07', NULL, 1, 1),
(9, 3, 'White', '#ffffff', 99, 'uploads/products/3/9/1.png', '2024-04-16 18:39:22', '2024-06-05 16:37:47', NULL, 1, 1),
(10, 4, 'ArmyGreen', '#43706a', 50, 'uploads/products/4/10/army green.jpg', '2024-04-16 18:45:37', '2024-04-16 18:45:37', NULL, 1, 1),
(11, 4, 'Black', '#000000', 50, 'uploads/products/4/11/black.jpg', '2024-04-16 18:45:57', '2024-04-16 18:45:57', NULL, 1, 1),
(12, 4, 'LightPink', '#f7bfb1', 50, 'uploads/products/4/12/light pink.jpg', '2024-04-16 18:46:29', '2024-04-16 18:46:29', NULL, 1, 1),
(13, 4, 'Mustard', '#b3944d', 50, 'uploads/products/4/13/mustard.jpg', '2024-04-16 18:47:02', '2024-04-16 18:47:02', NULL, 1, 1),
(14, 4, 'OldRose', '#99616b', 50, 'uploads/products/4/14/old rose.jpg', '2024-04-16 18:48:23', '2024-04-16 18:48:23', NULL, 1, 1),
(15, 6, 'ArmyGreen', '#4c857d', 50, 'uploads/products/6/15/army green.jpg', '2024-04-16 18:52:34', '2024-04-16 18:52:34', NULL, 1, 1),
(16, 6, 'BluishGray', '#8ecfde', 50, 'uploads/products/6/16/bluish gray.jpg', '2024-04-16 18:53:16', '2024-04-16 18:53:16', NULL, 1, 1),
(17, 6, 'ChocoBrown', '#a66e50', 50, 'uploads/products/6/17/brown.jpg', '2024-04-16 18:56:46', '2024-04-16 18:56:46', NULL, 1, 1),
(18, 6, 'Cream', '#f2e1b8', 50, 'uploads/products/6/18/cream.jpg', '2024-04-16 18:57:11', '2024-04-16 18:57:11', NULL, 1, 1),
(19, 6, 'Gray', '#858b8c', 50, 'uploads/products/6/19/gray.jpg', '2024-04-16 18:58:37', '2024-04-16 18:58:37', NULL, 1, 1),
(20, 6, 'White', '#ffffff', 50, 'uploads/products/6/20/white.jpg', '2024-04-16 18:58:52', '2024-04-16 18:58:52', NULL, 1, 1),
(21, 7, 'Pink', '#d46b6b', 50, 'uploads/products/7/21/[ink.jpg', '2024-04-16 19:03:54', '2024-04-16 19:03:54', NULL, 1, 1),
(22, 7, 'ArmyGreen', '#375753', 50, 'uploads/products/7/22/aemy green.jpg', '2024-04-16 19:04:18', '2024-04-16 19:04:18', '2024-05-25 15:29:46', 1, 1),
(23, 7, 'Black', '#000000', 50, 'uploads/products/7/23/black.jpg', '2024-04-16 19:04:38', '2024-04-16 19:04:38', '2024-05-25 15:29:48', 1, 1),
(24, 7, 'Blue', '#00a5cc', 50, 'uploads/products/7/24/blue.jpg', '2024-04-16 19:05:24', '2024-04-16 19:05:24', NULL, 1, 1),
(25, 7, 'Brown', '#7d4e2a', 50, 'uploads/products/7/25/brown.jpg', '2024-04-16 19:06:15', '2024-04-16 19:06:15', '2024-05-25 15:29:52', 1, 1),
(26, 7, 'DarkPink', '#b30909', 50, 'uploads/products/7/26/dark pink.jpg', '2024-04-16 19:07:21', '2024-04-16 19:07:21', NULL, 1, 1),
(27, 7, 'Green', '#299c8c', 50, 'uploads/products/7/27/green.jpg', '2024-04-16 19:07:44', '2024-04-16 19:07:44', NULL, 1, 1),
(28, 7, 'Mustard', '#cf940b', 50, 'uploads/products/7/28/mustard.jpg', '2024-04-16 19:08:17', '2024-04-16 19:08:17', NULL, 1, 1),
(29, 7, 'Peach', '#d9b091', 50, 'uploads/products/7/29/peach.jpg', '2024-04-16 19:08:50', '2024-04-16 19:08:51', '2024-05-25 15:29:56', 1, 1),
(30, 7, 'White', '#ffffff', 50, 'uploads/products/7/30/white.jpg', '2024-04-16 19:09:07', '2024-04-16 19:09:07', '2024-05-25 15:30:02', 1, 1),
(31, 8, 'Black', '#000000', 50, 'uploads/products/8/31/pink.jpg', '2024-04-16 19:13:14', '2024-04-16 19:13:14', NULL, 1, 1),
(32, 8, 'Gray', '#c2c0c0', 47, 'uploads/products/8/32/gray.jpg', '2024-04-16 19:13:39', '2024-05-19 16:30:33', NULL, 1, 1),
(33, 8, 'Blue', '#176678', 50, 'uploads/products/8/33/blue.jpg', '2024-04-16 19:14:01', '2024-04-16 19:14:01', NULL, 1, 1),
(34, 8, 'Black (1)', '#000000', 50, 'uploads/products/8/34/black usaf.jpg', '2024-04-16 19:14:28', '2024-04-16 19:14:28', NULL, 1, 1),
(35, 8, 'Black (2)', '#000000', 50, 'uploads/products/8/35/black windbreaker.jpg', '2024-04-16 19:14:48', '2024-04-16 19:14:48', NULL, 1, 1),
(36, 8, 'Black (3)', '#000000', 50, 'uploads/products/8/36/black with mustard.jpg', '2024-04-16 19:15:10', '2024-04-16 19:15:10', NULL, 1, 1),
(37, 8, 'Black (3)', '#000000', 50, 'uploads/products/8/37/black with mustard.jpg', '2024-04-16 19:15:10', '2024-04-16 19:15:10', NULL, 1, 1),
(38, 8, 'Black (4)', '#000000', 50, 'uploads/products/8/38/blackstripe.jpg', '2024-04-16 19:15:31', '2024-04-16 19:15:31', NULL, 1, 1),
(39, 8, 'NavyBLue', '#07264d', 50, 'uploads/products/8/39/blue puma.jpg', '2024-04-16 19:16:25', '2024-04-16 19:16:25', NULL, 1, 1),
(40, 9, 'Black', '#000000', 50, 'uploads/products/9/40/black.jpg', '2024-04-16 19:22:01', '2024-04-16 19:22:01', NULL, 1, 1),
(41, 9, 'Blue', '#235ca1', 50, 'uploads/products/9/41/blue.jpg', '2024-04-16 19:22:23', '2024-04-16 19:22:23', NULL, 1, 1),
(42, 9, 'Indigo', '#8f89d4', 50, 'uploads/products/9/42/indigo.jpg', '2024-04-16 19:22:51', '2024-04-16 19:22:51', NULL, 1, 1),
(43, 9, 'Orange', '#bf5c0b', 50, 'uploads/products/9/43/orange.jpg', '2024-04-16 19:23:37', '2024-04-16 19:23:37', NULL, 1, 1),
(44, 9, 'Pink', '#fcb7b7', 50, 'uploads/products/9/44/pink.jpg', '2024-04-16 19:24:03', '2024-04-16 19:24:03', NULL, 1, 1),
(45, 9, 'Red', '#d60b04', 50, 'uploads/products/9/45/red.jpg', '2024-04-16 19:24:38', '2024-04-16 19:24:38', NULL, 1, 1),
(46, 9, 'Violet', '#9354b8', 55, 'uploads/products/9/46/violet.jpg', '2024-04-16 19:24:59', '2024-04-16 19:24:59', NULL, 1, 1),
(47, 9, 'White', '#ffffff', 55, 'uploads/products/9/47/whte.jpg', '2024-04-16 19:25:14', '2024-04-16 19:25:14', NULL, 1, 1),
(48, 10, 'NavyBLue', '#0f2c4f', 55, 'uploads/products/10/48/blue.jpg', '2024-04-16 19:27:17', '2024-04-16 19:27:17', NULL, 1, 1),
(49, 10, 'Ember', '#d61919', 55, 'uploads/products/10/49/ember.jpg', '2024-04-16 19:27:44', '2024-04-16 19:27:44', NULL, 1, 1),
(50, 10, 'Red', '#f50707', 55, 'uploads/products/10/50/red.jpg', '2024-04-16 19:28:42', '2024-04-16 19:28:42', NULL, 1, 1),
(51, 10, 'SkyBlue', '#00a5cc', 55, 'uploads/products/10/51/skyblue.jpg', '2024-04-16 19:28:59', '2024-04-16 19:28:59', NULL, 1, 1),
(52, 10, 'Violet', '#9d00e6', 55, 'uploads/products/10/52/violet.jpg', '2024-04-16 19:29:30', '2024-04-16 19:29:30', NULL, 1, 1),
(53, 11, 'ArmyGreen', '#678c87', 55, 'uploads/products/11/53/army green.jpg', '2024-04-16 19:33:31', '2024-04-16 19:33:31', NULL, 1, 1),
(54, 11, 'Black', '#000000', 55, 'uploads/products/11/54/black.jpg', '2024-04-16 19:33:46', '2024-04-16 19:33:46', NULL, 1, 1),
(55, 11, 'NavyBLue', '#092b54', 55, 'uploads/products/11/55/blue.jpg', '2024-04-16 19:34:15', '2024-04-16 19:34:15', NULL, 1, 1),
(56, 11, 'Maroon', '#870d0d', 55, 'uploads/products/11/56/maroon.jpg', '2024-04-16 19:34:43', '2024-04-16 19:34:43', NULL, 1, 1),
(57, 11, 'White', '#ffffff', 55, 'uploads/products/11/57/white.jpg', '2024-04-16 19:34:58', '2024-04-16 19:34:58', NULL, 1, 1),
(58, 12, 'AppleGreen', '#79f579', 55, 'uploads/products/12/58/apple green.jpg', '2024-04-16 19:36:15', '2024-04-16 19:36:15', NULL, 1, 1),
(59, 12, 'BabyPink', '#e6b5b5', 55, 'uploads/products/12/59/bby pink.jpg', '2024-04-16 19:36:38', '2024-04-16 19:36:38', NULL, 1, 1),
(60, 12, 'Black', '#000000', 55, 'uploads/products/12/60/black.jpg', '2024-04-16 19:36:51', '2024-04-16 19:36:51', NULL, 1, 1),
(61, 12, 'BlueGreen', '#0a4d5c', 55, 'uploads/products/12/61/blue green.jpg', '2024-04-16 19:37:14', '2024-04-16 19:37:14', NULL, 1, 1),
(62, 12, 'Blue', '#0757ba', 55, 'uploads/products/12/62/blue.jpg', '2024-04-16 19:37:32', '2024-04-16 19:37:32', NULL, 1, 1),
(63, 12, 'Brown', '#87401d', 55, 'uploads/products/12/63/brown.jpg', '2024-04-16 19:37:59', '2024-04-16 19:37:59', NULL, 1, 1),
(64, 12, 'FushiaPink', '#f063bf', 44, 'uploads/products/12/64/fushia pink.jpg', '2024-04-16 19:38:25', '2024-04-16 19:38:25', NULL, 1, 1),
(65, 12, 'Gray', '#b5a9a9', 55, 'uploads/products/12/65/gray.jpg', '2024-04-16 19:38:47', '2024-04-16 19:38:47', NULL, 1, 1),
(66, 12, 'Tangerine', '#e09963', 55, 'uploads/products/12/66/tangerine.jpg', '2024-04-16 19:39:12', '2024-04-16 19:39:12', NULL, 1, 1),
(67, 12, 'Violet', '#8e12d6', 55, 'uploads/products/12/67/violet.jpg', '2024-04-16 19:39:37', '2024-04-16 19:39:37', NULL, 1, 1),
(68, 13, 'ArmyGreen', '#174d32', 55, 'uploads/products/13/68/army green.jpg', '2024-04-16 19:43:17', '2024-04-16 19:43:17', NULL, 1, 1),
(69, 13, 'Black', '#000000', 55, 'uploads/products/13/69/black.jpg', '2024-04-16 19:43:41', '2024-04-16 19:43:41', NULL, 1, 1),
(70, 13, 'Maroon', '#4d0a0a', 55, 'uploads/products/13/70/maroon.jpg', '2024-04-16 19:44:19', '2024-04-16 19:44:19', NULL, 1, 1),
(71, 13, 'NavyBLue', '#031224', 55, 'uploads/products/13/71/Navy blue.jpg', '2024-04-16 19:44:35', '2024-04-16 19:44:35', NULL, 1, 1),
(72, 14, 'BlackWhiteGray', '#f9fcfc', 55, 'uploads/products/14/72/blackwhitegray.jpg', '2024-04-16 19:46:48', '2024-04-16 19:46:48', '2024-04-16 11:48:17', 1, 1),
(73, 14, 'Gray', '#b0b8ba', 45, 'uploads/products/14/73/gray.jpg', '2024-04-16 19:47:02', '2024-04-23 17:46:33', NULL, 1, 1),
(74, 14, 'White', '#ebf9fc', 55, 'uploads/products/14/74/JDI.jpg', '2024-04-16 19:47:34', '2024-04-16 19:47:34', '2024-04-16 11:48:23', 1, 1),
(75, 16, 'BlueMustard', '#003c80', 58, 'uploads/products/16/75/4.png', '2024-04-16 19:52:19', '2024-06-05 17:46:10', NULL, 1, 1),
(76, 16, 'DarkGreen', '#153821', 88, 'uploads/products/16/76/3.png', '2024-04-16 19:52:45', '2024-06-05 17:46:27', NULL, 1, 1),
(77, 16, 'BlackMustard', '#050505', 55, 'uploads/products/16/77/2.png', '2024-04-16 19:53:08', '2024-06-05 17:45:47', NULL, 1, 1),
(78, 16, 'Purple', '#37276b', 53, 'uploads/products/16/78/1.png', '2024-04-16 19:53:33', '2024-06-05 17:47:12', NULL, 1, 1),
(79, 17, 'ArmyGreen', '#03361f', 51, 'uploads/products/17/79/army green sleeveless.jpg', '2024-04-16 19:56:50', '2024-04-22 10:26:45', NULL, 1, 1),
(80, 17, 'BabyBlue', '#5f90cc', 54, 'uploads/products/17/80/babyblue.jpg', '2024-04-16 19:57:10', '2024-04-17 01:54:45', NULL, 1, 1),
(81, 17, 'Black', '#000000', 55, 'uploads/products/17/81/black sleeveless.jpg', '2024-04-16 19:57:24', '2024-04-16 19:57:24', NULL, 1, 1),
(82, 17, 'Black (1)', '#000000', 55, 'uploads/products/17/82/black top.jpg', '2024-04-16 19:57:45', '2024-04-16 19:57:45', NULL, 1, 1),
(83, 17, 'Blue', '#024da8', 55, 'uploads/products/17/83/blue.jpg', '2024-04-16 19:58:05', '2024-04-16 19:58:05', NULL, 1, 1),
(84, 17, 'Brown', '#755339', 55, 'uploads/products/17/84/brown.jpg', '2024-04-16 19:58:27', '2024-04-16 19:58:27', NULL, 1, 1),
(85, 17, 'ChocoBrown', '#5e291c', 55, 'uploads/products/17/85/choco brown.jpg', '2024-04-16 19:58:49', '2024-04-16 19:58:49', NULL, 1, 1),
(86, 17, 'DarkPink', '#a60e4b', 55, 'uploads/products/17/86/dark pink.jpg', '2024-04-16 19:59:14', '2024-04-16 19:59:14', NULL, 1, 1),
(87, 17, 'DustBlue', '#5b929e', 55, 'uploads/products/17/87/dust ble.jpg', '2024-04-16 19:59:37', '2024-04-16 19:59:37', NULL, 1, 1),
(88, 17, 'Gray', '#a7a8a8', 55, 'uploads/products/17/88/gray top (2).jpg', '2024-04-16 20:00:05', '2024-04-16 20:00:05', NULL, 1, 1),
(89, 17, 'Gray (2)', '#979d9e', 66, 'uploads/products/17/89/gray top.jpg', '2024-04-16 20:00:28', '2024-04-16 20:00:28', NULL, 1, 1),
(90, 17, 'Gray (1)', '#4f6469', 55, 'uploads/products/17/90/gray.jpg', '2024-04-16 20:00:59', '2024-04-16 20:00:59', NULL, 1, 1),
(91, 17, 'Gray (3)', '#889699', 54, 'uploads/products/17/91/light gray.jpg', '2024-04-16 20:01:25', '2024-04-22 12:32:56', NULL, 1, 1),
(92, 17, 'LimeGreen', '#7fbf87', 55, 'uploads/products/17/92/limegreen sleeveless.jpg', '2024-04-16 20:02:03', '2024-04-16 20:02:03', NULL, 1, 1),
(93, 17, 'Pink', '#e8a5a5', 55, 'uploads/products/17/93/pink.jpg', '2024-04-16 20:02:35', '2024-04-16 20:02:35', NULL, 1, 1),
(94, 17, 'Gray (4)', '#c3c6c7', 55, 'uploads/products/17/94/puff gray top.jpg', '2024-04-16 20:02:59', '2024-04-16 20:02:59', NULL, 1, 1),
(95, 17, 'Red', '#f70101', 55, 'uploads/products/17/95/red.jpg', '2024-04-16 20:03:23', '2024-04-16 20:03:23', NULL, 1, 1),
(96, 17, 'SageGreen', '#5bdbca', 55, 'uploads/products/17/96/seige green.jpg', '2024-04-16 20:03:47', '2024-04-16 20:03:47', NULL, 1, 1),
(97, 17, 'Violet', '#3d00b8', 54, 'uploads/products/17/97/violet.jpg', '2024-04-16 20:04:04', '2024-04-17 16:31:34', NULL, 1, 1),
(98, 18, 'Black', '#000000', 30, 'uploads/products/18/98/1.jpg', '2024-05-25 01:05:43', '2024-05-25 01:05:43', NULL, 1, 1),
(99, 18, 'Blue', '#0219c9', 33, 'uploads/products/18/99/2.jpg', '2024-05-25 01:06:18', '2024-05-25 01:06:18', NULL, 1, 1),
(100, 18, 'Brown', '#753b0f', 22, 'uploads/products/18/100/3.jpg', '2024-05-25 01:06:41', '2024-05-25 01:06:41', NULL, 1, 1),
(101, 18, 'Gray', '#818687', 44, 'uploads/products/18/101/5.jpg', '2024-05-25 01:07:05', '2024-05-25 01:07:05', NULL, 1, 1),
(102, 18, 'Green', '#198542', 33, 'uploads/products/18/102/6.jpg', '2024-05-25 01:07:30', '2024-05-25 01:07:30', NULL, 1, 1),
(103, 18, 'Purple', '#801b7a', 44, 'uploads/products/18/103/4.jpg', '2024-05-25 01:07:55', '2024-05-25 01:07:55', NULL, 1, 1),
(104, 18, 'ChocoBrown', '#692b0cf9', 33, 'uploads/products/18/104/7.jpg', '2024-05-25 01:08:35', '2024-05-25 01:08:35', NULL, 1, 1),
(105, 18, 'Pink', '#e875de', 44, 'uploads/products/18/105/11.jpg', '2024-05-25 01:10:51', '2024-05-25 01:10:51', NULL, 1, 1),
(106, 18, 'Red', '#ab0e0e', 23, 'uploads/products/18/106/12.jpg', '2024-05-25 01:11:27', '2024-05-25 01:11:27', NULL, 1, 1),
(107, 19, 'Black', '#000000', 333, 'uploads/products/19/107/1.jpg', '2024-05-25 01:26:42', '2024-05-25 01:26:42', NULL, 1, 1),
(108, 19, 'Blue', '#1000bf', 33, 'uploads/products/19/108/2.jpg', '2024-05-25 01:27:18', '2024-05-25 01:27:18', NULL, 1, 1),
(109, 19, 'ChocoBrown', '#59310e', 33, 'uploads/products/19/109/3.jpg', '2024-05-25 01:28:42', '2024-05-25 01:28:42', NULL, 1, 1),
(110, 19, 'Purple', '#7b1187', 33, 'uploads/products/19/110/4.jpg', '2024-05-25 01:29:33', '2024-05-25 01:29:33', NULL, 1, 1),
(111, 19, 'Gray', '#999fa1', 33, 'uploads/products/19/111/5.jpg', '2024-05-25 01:29:49', '2024-05-25 01:29:49', NULL, 1, 1),
(112, 19, 'Green', '#0d8736', 22, 'uploads/products/19/112/6.jpg', '2024-05-25 01:30:31', '2024-05-25 01:30:31', NULL, 1, 1),
(113, 19, 'White', '#ffffff', 23, 'uploads/products/19/113/15.jpg', '2024-05-25 01:30:55', '2024-05-25 01:30:55', NULL, 1, 1),
(114, 19, 'Yellow', '#dae328', 44, 'uploads/products/19/114/16.jpg', '2024-05-25 01:31:51', '2024-05-25 01:31:51', NULL, 1, 1),
(115, 21, 'Black', '#000000', 33, 'uploads/products/21/115/1.jpg', '2024-05-25 01:39:27', '2024-05-25 01:39:27', NULL, 1, 1),
(116, 21, 'Blue', '#172d7a', 33, 'uploads/products/21/116/2.jpg', '2024-05-25 01:39:54', '2024-05-25 01:39:54', NULL, 1, 1),
(117, 21, 'Gray', '#919191', 33, 'uploads/products/21/117/5.jpg', '2024-05-25 01:40:14', '2024-05-25 01:40:14', NULL, 1, 1),
(118, 21, 'White', '#ffffff', 33, 'uploads/products/21/118/15.jpg', '2024-05-25 01:42:27', '2024-05-25 01:42:27', NULL, 1, 1),
(119, 21, 'Yellow', '#d6d31d', 44, 'uploads/products/21/119/16.jpg', '2024-05-25 01:43:03', '2024-05-25 01:43:03', NULL, 1, 1),
(120, 21, 'Green', '#0f9c11', 33, 'uploads/products/21/120/6.jpg', '2024-05-25 01:43:37', '2024-05-25 01:43:37', NULL, 1, 1),
(121, 20, 'Black', '#000000', 112, 'uploads/products/20/121/1.jpg', '2024-05-25 01:45:44', '2024-05-25 01:45:44', '2024-05-24 17:46:27', 1, 1),
(122, 20, 'White', '#ffffff', 321, 'uploads/products/20/122/15.jpg', '2024-05-25 01:46:00', '2024-05-25 01:46:00', '2024-05-24 17:46:30', 1, 1),
(123, 20, 'White', '#ffffff', 311, 'uploads/products/20/123/15.jpg', '2024-05-25 01:46:24', '2024-05-25 01:46:24', NULL, 1, 1),
(124, 20, 'Black', '#000000', 654, 'uploads/products/20/124/1.jpg', '2024-05-25 01:46:55', '2024-05-25 01:46:55', NULL, 1, 1),
(125, 20, 'Blue', '#0e10ab', 434, 'uploads/products/20/125/2.jpg', '2024-05-25 01:47:31', '2024-05-25 01:47:31', NULL, 1, 1),
(126, 20, 'Yellow', '#cdf01d', 655, 'uploads/products/20/126/16.jpg', '2024-05-25 01:47:55', '2024-05-25 01:47:55', NULL, 1, 1),
(127, 20, 'Red', '#d40000', 888, 'uploads/products/20/127/12.jpg', '2024-05-25 01:48:24', '2024-05-25 01:48:24', NULL, 1, 1),
(128, 20, 'ArmyGreen', '#3b4716', 888, 'uploads/products/20/128/9.jpg', '2024-05-25 01:49:22', '2024-05-25 01:49:22', NULL, 1, 1),
(129, 22, 'Gray', '#c4c4c4', 999, 'uploads/products/22/129/15.jpg', '2024-05-25 01:52:09', '2024-05-25 01:52:09', NULL, 1, 1),
(130, 22, 'Blue', '#0f1e94', 999, 'uploads/products/22/130/2.jpg', '2024-05-25 01:52:34', '2024-05-25 01:52:34', NULL, 1, 1),
(131, 22, 'Yellow', '#ecff18', 999, 'uploads/products/22/131/16.jpg', '2024-05-25 01:52:57', '2024-05-25 01:52:57', NULL, 1, 1),
(132, 22, 'Red', '#ba0000', 999, 'uploads/products/22/132/12.jpg', '2024-05-25 01:53:29', '2024-05-25 01:53:29', NULL, 1, 1),
(133, 23, 'Black', '#000000', 333, 'uploads/products/23/133/10.png', '2024-05-25 23:16:36', '2024-06-05 17:34:14', NULL, 1, 1),
(134, 23, 'Blue', '#0613a8', 311, 'uploads/products/23/134/5.png', '2024-05-25 23:17:00', '2024-06-05 17:34:27', NULL, 1, 1),
(135, 23, 'Orange', '#ff6d05', 132, 'uploads/products/23/135/8.png', '2024-05-25 23:17:38', '2024-06-05 17:38:14', NULL, 1, 1),
(136, 23, 'Violet', '#9100bd', 112, 'uploads/products/23/136/4.png', '2024-05-25 23:18:22', '2024-06-05 17:37:01', NULL, 1, 1),
(137, 23, 'Gray', '#7d7d7d', 213, 'uploads/products/23/137/2.png', '2024-05-25 23:18:53', '2024-06-05 17:37:16', NULL, 1, 1),
(138, 23, 'Green', '#17872f', 333, 'uploads/products/23/138/6.jpg', '2024-05-25 23:19:14', '2024-05-25 23:19:14', '2024-06-05 17:36:04', 1, 1),
(139, 23, 'Maroon', '#570808', 331, 'uploads/products/23/139/9.png', '2024-05-25 23:19:48', '2024-06-05 17:37:43', NULL, 1, 1),
(140, 23, 'Green', '#1e7d03', 444, 'uploads/products/23/140/11.png', '2024-05-25 23:20:32', '2024-06-05 17:33:41', NULL, 1, 1),
(141, 23, 'Yellow', '#fbff28', 133, 'uploads/products/23/141/7.png', '2024-05-25 23:21:11', '2024-06-05 17:35:01', NULL, 1, 1),
(142, 23, 'White', '#ffffff', 113, 'uploads/products/23/142/1.png', '2024-05-25 23:21:29', '2024-06-05 17:35:48', NULL, 1, 1),
(143, 24, 'Gray', '#757575', 321, 'uploads/products/24/143/1.png', '2024-05-25 23:23:36', '2024-06-05 17:39:59', NULL, 1, 1),
(144, 24, 'LightBlue', '#8097ff', 123, 'uploads/products/24/144/3.png', '2024-05-25 23:24:06', '2024-06-05 17:39:16', NULL, 1, 1),
(145, 24, 'Brown', '#614713', 333, 'uploads/products/24/145/3.jpg', '2024-05-25 23:24:32', '2024-05-25 23:24:32', '2024-06-05 17:41:24', 1, 1),
(146, 24, 'Purple', '#cf6ad6', 231, 'uploads/products/24/146/2.png', '2024-05-25 23:25:30', '2024-06-05 17:40:19', NULL, 1, 1),
(147, 24, 'LimeGreen', '#38e051', 333, 'uploads/products/24/147/6.png', '2024-05-25 23:26:04', '2024-06-05 17:41:19', NULL, 1, 1),
(148, 24, 'Red', '#a80820', 333, 'uploads/products/24/148/12.jpg', '2024-05-25 23:26:32', '2024-05-25 23:26:32', '2024-06-05 17:41:40', 1, 1),
(149, 24, 'Turquoise', '#ffffff', 223, 'uploads/products/24/149/5.png', '2024-05-25 23:26:49', '2024-06-05 17:40:56', NULL, 1, 1),
(150, 24, 'Yellow', '#ebf224', 333, 'uploads/products/24/150/16.jpg', '2024-05-25 23:27:15', '2024-05-25 23:27:15', '2024-06-05 17:41:37', 1, 1),
(151, 25, 'Black', '#000000', 111, 'uploads/products/25/151/1.jpg', '2024-05-26 22:02:33', '2024-05-26 22:02:33', '2024-06-05 17:48:59', 1, 1),
(152, 25, 'Purple', '#c671e0', 312, 'uploads/products/25/152/2.png', '2024-05-26 22:02:54', '2024-06-05 17:56:31', NULL, 1, 1),
(153, 25, 'LightBlue', '#828fe0', 111, 'uploads/products/25/153/3.png', '2024-05-26 22:03:33', '2024-06-05 17:56:03', NULL, 1, 1),
(154, 25, 'SkyBlue', '#84bbd9', 221, 'uploads/products/25/154/4.png', '2024-05-26 22:05:11', '2024-06-05 17:57:08', NULL, 1, 1),
(155, 25, 'Yellow', '#e6db0a', 111, 'uploads/products/25/155/16.jpg', '2024-05-26 22:06:46', '2024-05-26 22:06:46', '2024-06-05 17:57:18', 1, 1),
(156, 25, 'Red', '#c71818', 111, 'uploads/products/25/156/12.jpg', '2024-05-26 22:07:02', '2024-05-26 22:07:02', '2024-06-05 18:00:03', 1, 1),
(157, 25, 'Gray', '#ababb3', 111, 'uploads/products/25/157/1.png', '2024-05-26 22:07:29', '2024-06-05 17:53:15', NULL, 1, 1),
(158, 25, 'Purple', '#720985', 111, 'uploads/products/25/158/4.jpg', '2024-05-26 22:08:00', '2024-05-26 22:08:00', '2024-06-05 18:00:00', 1, 1),
(159, 25, 'Pink', '#f390f5', 111, 'uploads/products/25/159/11.jpg', '2024-05-26 22:08:43', '2024-05-26 22:08:43', '2024-06-05 17:59:57', 1, 1),
(160, 26, 'Cream', '#ebd8ab', 99, 'uploads/products/26/160/1.png', '2024-05-26 22:15:34', '2024-06-05 16:37:11', NULL, 1, 1),
(161, 26, 'Maroon', '#913234', 113, 'uploads/products/26/161/2.png', '2024-05-26 22:15:56', '2024-06-05 16:36:41', NULL, 1, 1),
(162, 26, 'NavyBLue', '#454685', 100, 'uploads/products/26/162/3.png', '2024-05-26 22:16:22', '2024-06-05 16:36:53', NULL, 1, 1),
(163, 26, 'Pink', '#f06e95', 122, 'uploads/products/26/163/4.png', '2024-05-26 22:16:48', '2024-06-06 15:29:01', NULL, 1, 1),
(164, 26, 'Red', '#ff0000', 111, 'uploads/products/26/164/5.png', '2024-05-26 22:17:05', '2024-06-05 16:35:41', NULL, 1, 1),
(165, 27, 'Yellow', '#f5eb81', 463, 'uploads/products/27/165/7.png', '2024-05-26 22:20:30', '2024-06-05 16:46:02', NULL, 1, 1),
(166, 27, 'Pink', '#faa1b0', 419, 'uploads/products/27/166/1.png', '2024-05-26 22:20:55', '2024-06-26 00:03:40', NULL, 1, 1),
(167, 27, 'LightBlue', '#00a5cc', 312, 'uploads/products/27/167/2.png', '2024-05-26 22:21:29', '2024-06-05 16:44:57', NULL, 1, 1),
(168, 27, 'DarkPink', '#c91652', 111, 'uploads/products/27/168/3.png', '2024-05-26 22:21:53', '2024-06-05 16:44:20', NULL, 1, 1),
(169, 27, 'Green', '#0dbdab', 211, 'uploads/products/27/169/4.png', '2024-05-26 22:22:11', '2024-06-05 16:44:38', NULL, 1, 1),
(170, 27, 'Mustard', '#e0b83e', 241, 'uploads/products/27/170/5.png', '2024-05-26 22:22:44', '2024-06-05 16:45:13', NULL, 1, 1),
(171, 27, 'White', '#ffffff', 422, 'uploads/products/27/171/6.png', '2024-05-26 22:23:00', '2024-06-05 16:45:48', NULL, 1, 1),
(172, 28, 'Black', '#000000', 111, 'uploads/products/28/172/black usaf.jpg', '2024-05-26 22:28:53', '2024-05-26 22:28:53', NULL, 1, 1),
(173, 29, 'Black', '#000000', 111, 'uploads/products/29/173/black windbreaker.jpg', '2024-05-26 22:30:08', '2024-05-26 22:30:08', NULL, 1, 1),
(174, 30, 'NavyBLue', '#05185c', 111, 'uploads/products/30/174/blue puma.jpg', '2024-05-26 22:33:25', '2024-05-26 22:33:25', NULL, 1, 1),
(175, 31, 'BlueGreen', '#08435e', 111, 'uploads/products/31/175/blue.jpg', '2024-05-26 22:35:33', '2024-05-26 22:35:33', NULL, 1, 1),
(176, 32, 'ArmyGreen', '#728f7a', 111, 'uploads/products/32/176/army green.jpg', '2024-05-26 22:43:47', '2024-05-26 22:43:47', '2024-05-27 02:00:59', 1, 1),
(177, 32, 'Blue', '#101296', 111, 'uploads/products/32/177/blue.jpg', '2024-05-26 22:44:07', '2024-05-26 22:44:07', '2024-05-27 02:01:03', 1, 1),
(178, 32, 'White', '#ffffff', 111, 'uploads/products/32/178/white.jpg', '2024-05-26 22:44:19', '2024-05-26 22:44:19', '2024-05-27 02:01:08', 1, 1),
(179, 32, 'Maroon', '#9e5461', 111, 'uploads/products/32/179/maroon.jpg', '2024-05-26 22:44:39', '2024-05-26 22:44:39', '2024-05-27 02:01:06', 1, 1),
(180, 32, 'Black', '#000000', 111, 'uploads/products/32/180/black.jpg', '2024-05-26 22:45:01', '2024-05-26 22:45:01', '2024-05-27 02:01:01', 1, 1),
(181, 32, 'ArmyGreen', '#89a19d', 111, 'uploads/products/32/181/army green.jpg', '2024-05-27 10:01:42', '2024-05-27 10:01:42', NULL, 1, 1),
(182, 32, 'Black', '#000000', 111, 'uploads/products/32/182/black.jpg', '2024-05-27 10:01:55', '2024-05-27 10:01:55', NULL, 1, 1),
(183, 32, 'Maroon', '#753334', 211, 'uploads/products/32/183/maroon.jpg', '2024-05-27 10:02:20', '2024-05-27 10:02:20', NULL, 1, 1),
(184, 32, 'White', '#ffffff', 111, 'uploads/products/32/184/white.jpg', '2024-05-27 10:02:34', '2024-05-27 10:02:34', NULL, 1, 1),
(185, 34, 'ArmyGreen', '#8ba3a0', 222, 'uploads/products/34/185/army green.jpg', '2024-05-27 10:15:11', '2024-05-27 10:15:11', '2024-05-27 06:43:48', 1, 1),
(186, 34, 'Black', '#000000', 111, 'uploads/products/34/186/black.jpg', '2024-05-27 10:15:24', '2024-05-27 10:15:24', '2024-05-27 06:43:50', 1, 1),
(187, 34, 'Maroon', '#ab4949', 111, 'uploads/products/34/187/maroon.jpg', '2024-05-27 10:15:43', '2024-05-27 10:15:43', '2024-05-27 06:43:51', 1, 1),
(188, 34, 'White', '#ffffff', 111, 'uploads/products/34/188/white.jpg', '2024-05-27 10:16:00', '2024-05-27 10:16:00', '2024-05-27 06:43:57', 1, 1),
(189, 35, 'ArmyGreen', '#708280', 120, 'uploads/products/35/189/1.png', '2024-05-27 10:31:50', '2024-06-05 16:42:29', NULL, 1, 1),
(190, 35, 'Black', '#000000', 133, 'uploads/products/35/190/2.png', '2024-05-27 10:32:09', '2024-06-05 16:42:45', NULL, 1, 1),
(191, 35, 'Choco', '#c48585', 189, 'uploads/products/35/191/3.png', '2024-05-27 10:32:35', '2024-06-05 16:43:05', NULL, 1, 1),
(192, 35, 'Khaki', '#f2c29c', 111, 'uploads/products/35/192/4.png', '2024-05-27 10:32:56', '2024-06-05 16:41:45', NULL, 1, 1),
(193, 35, 'Gray', '#d6d6d6', 110, 'uploads/products/35/193/5.png', '2024-05-27 10:33:15', '2024-06-05 16:43:44', NULL, 1, 1),
(194, 35, 'Cream', '#f5f1e7', 98, 'uploads/products/35/194/6.png', '2024-05-27 10:34:12', '2024-06-05 16:43:28', NULL, 1, 1),
(195, 37, 'BlueGreen', '#026278', 222, 'uploads/products/37/195/blue.jpg', '2024-05-27 13:47:31', '2024-05-27 13:47:31', NULL, 1, 1),
(196, 38, 'Gray', '#c4c4c4', 111, 'uploads/products/38/196/gray.jpg', '2024-05-27 13:48:34', '2024-05-27 13:48:34', NULL, 1, 1),
(197, 39, 'ArmyGreen', '#5b8781', 104, 'uploads/products/39/197/1.png', '2024-05-27 13:56:10', '2024-06-05 16:39:38', NULL, 1, 1),
(198, 39, 'Black', '#000000', 199, 'uploads/products/39/198/2.png', '2024-05-27 13:56:42', '2024-06-05 16:39:19', NULL, 1, 1),
(199, 39, 'Cream', '#edccb2', 111, 'uploads/products/39/199/3.png', '2024-05-27 13:57:16', '2024-06-05 16:39:05', NULL, 1, 1),
(200, 39, 'Mustard', '#b88d29', 121, 'uploads/products/39/200/4.png', '2024-05-27 13:57:52', '2024-06-05 16:38:53', NULL, 1, 1),
(201, 39, 'OldRose', '#ad7263', 113, 'uploads/products/39/201/5.png', '2024-05-27 13:58:21', '2024-06-05 16:38:35', NULL, 1, 1),
(202, 34, 'Blue', '#000787', 111, 'uploads/products/34/202/22.png', '2024-05-27 14:44:25', '2024-06-05 17:01:56', NULL, 1, 1),
(203, 34, 'Orange', '#ff9706', 119, 'uploads/products/34/203/21.png', '2024-05-27 14:44:46', '2024-06-05 16:58:00', NULL, 1, 1),
(204, 34, 'Green', '#128c0e', 114, 'uploads/products/34/204/20.png', '2024-05-27 14:45:05', '2024-06-05 16:58:56', NULL, 1, 1),
(205, 34, 'Black', '#000000', 111, 'uploads/products/34/205/16.png', '2024-05-27 14:45:27', '2024-06-05 17:02:17', NULL, 1, 1),
(206, 34, 'Gray', '#adadad', 111, 'uploads/products/34/206/04.png', '2024-05-27 14:45:45', '2024-05-27 14:45:45', '2024-05-27 06:46:06', 1, 1),
(207, 34, 'Gray', '#adadad', 115, 'uploads/products/34/207/18.png', '2024-05-27 14:46:00', '2024-06-05 16:59:22', NULL, 1, 1),
(208, 34, 'ChocoBrown', '#362205', 231, 'uploads/products/34/208/17.png', '2024-05-27 14:46:44', '2024-06-05 17:00:58', NULL, 1, 1),
(209, 34, 'Red', '#8f0c0c', 112, 'uploads/products/34/209/15.png', '2024-05-27 14:47:07', '2024-06-05 16:57:40', NULL, 1, 1),
(210, 34, 'Yellow', '#fff317', 111, 'uploads/products/34/210/13.png', '2024-05-27 14:47:43', '2024-06-05 16:56:30', NULL, 1, 1),
(211, 34, 'White', '#ffffff', 113, 'uploads/products/34/211/8.png', '2024-05-27 14:48:01', '2024-06-05 16:56:49', NULL, 1, 1),
(212, 40, 'Blue', '#0033cc', 123, 'uploads/products/40/212/5.png', '2024-05-27 14:54:09', '2024-06-05 17:28:40', NULL, 1, 1),
(213, 40, 'ArmyGreen', '#406e1f', 223, 'uploads/products/40/213/1.png', '2024-05-27 14:54:31', '2024-06-05 17:27:14', '2024-06-05 17:29:01', 1, 1),
(214, 40, 'ChocoBrown', '#6b3e1c', 321, 'uploads/products/40/214/2.png', '2024-05-27 14:54:56', '2024-06-05 17:28:58', NULL, 1, 1),
(215, 40, 'Black', '#000000', 333, 'uploads/products/40/215/3.png', '2024-05-27 14:55:11', '2024-06-05 17:26:54', NULL, 1, 1),
(216, 40, 'Red', '#d62828', 113, 'uploads/products/40/216/4.png', '2024-05-27 14:55:30', '2024-06-05 17:28:01', NULL, 1, 1),
(217, 40, 'Yellow', '#f7ef53', 111, 'uploads/products/40/217/12.png', '2024-05-27 14:55:51', '2024-06-05 17:26:18', NULL, 1, 1),
(218, 40, 'Purple', '#a800c2', 332, 'uploads/products/40/218/9.png', '2024-05-27 14:56:12', '2024-06-05 17:28:12', NULL, 1, 1),
(219, 40, 'Maroon', '#b83e4c', 333, 'uploads/products/40/219/10.png', '2024-05-27 14:56:33', '2024-06-05 17:28:27', NULL, 1, 1),
(220, 40, 'White', '#ffffff', 321, 'uploads/products/40/220/6.png', '2024-05-27 14:56:54', '2024-06-05 17:26:32', NULL, 1, 1),
(221, 41, 'Blue', '#0022cc', 111, 'uploads/products/41/221/25.png', '2024-05-27 15:01:40', '2024-06-05 17:09:22', NULL, 1, 1),
(222, 41, 'Orange', '#f7a100', 321, 'uploads/products/41/222/24.png', '2024-05-27 15:02:01', '2024-06-05 17:06:52', NULL, 1, 1),
(223, 41, 'ArmyGreen', '#084d00', 111, 'uploads/products/41/223/23.png', '2024-05-27 15:02:30', '2024-06-05 17:10:37', NULL, 1, 1),
(224, 41, 'Green', '#09b832', 441, 'uploads/products/41/224/22.png', '2024-05-27 15:02:56', '2024-06-05 17:07:58', NULL, 1, 1),
(225, 41, 'Black', '#000000', 111, 'uploads/products/41/225/17.png', '2024-05-27 15:03:09', '2024-06-05 17:09:46', NULL, 1, 1),
(226, 41, 'Red', '#eb0000', 213, 'uploads/products/41/226/20.png', '2024-05-27 15:03:34', '2024-06-05 17:06:00', NULL, 1, 1),
(227, 41, 'Maroon', '#91052d', 233, 'uploads/products/41/227/16.png', '2024-05-27 15:04:18', '2024-06-05 17:07:38', NULL, 1, 1),
(228, 41, 'Violet', '#9800c2', 111, 'uploads/products/41/228/15.png', '2024-05-27 15:04:53', '2024-06-05 17:04:36', NULL, 1, 1),
(229, 42, 'Gray', '#bdbdbd', 111, 'uploads/products/42/229/19.png', '2024-05-27 19:00:40', '2024-06-05 16:52:57', NULL, 1, 1),
(230, 42, 'Red', '#e60f0f', 111, 'uploads/products/42/230/a2.png', '2024-05-27 19:01:18', '2024-05-27 19:01:18', '2024-05-27 11:05:12', 1, 1),
(231, 42, 'Orange', '#ff9305', 433, 'uploads/products/42/231/17.png', '2024-05-27 19:01:42', '2024-06-05 16:50:20', NULL, 1, 1),
(232, 42, 'Yellow', '#fff204', 111, 'uploads/products/42/232/35.png', '2024-05-27 19:01:58', '2024-06-05 16:46:43', NULL, 1, 1),
(233, 42, 'Maroon', '#ad032d', 121, 'uploads/products/42/233/15.png', '2024-05-27 19:02:21', '2024-06-05 16:50:42', NULL, 1, 1),
(234, 42, 'Green', '#0b9c06', 111, 'uploads/products/42/234/14.png', '2024-05-27 19:02:38', '2024-06-05 16:52:43', NULL, 1, 1),
(235, 42, 'ArmyGreen', '#07820d', 111, 'uploads/products/42/235/13.png', '2024-05-27 19:02:57', '2024-06-05 16:55:04', NULL, 1, 1),
(236, 42, 'LightBlue', '#00cefc', 115, 'uploads/products/42/236/11.png', '2024-05-27 19:03:21', '2024-06-05 16:51:22', NULL, 1, 1),
(237, 42, 'Purple', '#fa16fa', 231, 'uploads/products/42/237/6.png', '2024-05-27 19:03:44', '2024-06-05 16:48:35', NULL, 1, 1),
(238, 42, 'Violet', '#784acc', 112, 'uploads/products/42/238/8.png', '2024-05-27 19:04:10', '2024-06-05 16:47:32', NULL, 1, 1),
(239, 42, 'White', '#ffffff', 113, 'uploads/products/42/239/3.png', '2024-05-27 19:04:27', '2024-06-05 16:47:08', NULL, 1, 1),
(240, 42, 'Black', '#000000', 212, 'uploads/products/42/240/2.png', '2024-05-27 19:04:45', '2024-06-05 16:54:49', NULL, 1, 1),
(241, 42, 'Red', '#de0000', 312, 'uploads/products/42/241/4.png', '2024-05-27 19:05:07', '2024-06-06 04:23:31', NULL, 1, 1),
(242, 43, 'AppleGreen', '#51e676', 111, 'uploads/products/43/242/apple green.jpg', '2024-05-27 19:06:43', '2024-05-27 11:07:19', NULL, 1, 1),
(243, 43, 'BabyPink', '#edc2e7', 111, 'uploads/products/43/243/bby pink.jpg', '2024-05-27 19:07:07', '2024-05-27 19:07:07', NULL, 1, 1),
(244, 43, 'Black', '#000000', 111, 'uploads/products/43/244/black.jpg', '2024-05-27 19:07:32', '2024-05-27 19:07:32', NULL, 1, 1),
(245, 43, 'BlueGreen', '#027566', 111, 'uploads/products/43/245/blue green.jpg', '2024-05-27 19:07:56', '2024-05-27 19:07:56', NULL, 1, 1),
(246, 43, 'Blue', '#1523e6', 111, 'uploads/products/43/246/blue.jpg', '2024-05-27 19:08:13', '2024-05-27 19:08:13', '2024-05-27 11:08:20', 1, 1),
(247, 43, 'Brown', '#87664d', 111, 'uploads/products/43/247/brown.jpg', '2024-05-27 19:08:36', '2024-05-27 19:08:36', NULL, 1, 1),
(248, 43, 'FushiaPink', '#f012b1', 111, 'uploads/products/43/248/fushia pink.jpg', '2024-05-27 19:08:57', '2024-05-27 19:08:57', NULL, 1, 1),
(249, 43, 'Gray', '#888b8c', 111, 'uploads/products/43/249/gray.jpg', '2024-05-27 19:09:20', '2024-05-27 19:09:20', NULL, 1, 1),
(250, 43, 'Tangerine', '#ffa865', 111, 'uploads/products/43/250/tangerine.jpg', '2024-05-27 19:09:38', '2024-05-27 19:09:38', NULL, 1, 1),
(251, 43, 'Violet', '#aa00f2', 111, 'uploads/products/43/251/violet.jpg', '2024-05-27 19:09:54', '2024-05-27 19:09:54', NULL, 1, 1),
(252, 44, 'BLUE', '#023e8a', 1, 'uploads/products/44/252/FB_IMG_1716860040317.jpg', '2024-05-28 09:38:20', '2024-05-28 09:38:20', NULL, 1, 1),
(253, 44, 'WHITE', '#ffffff', 1, 'uploads/products/44/253/FB_IMG_1716860030915.jpg', '2024-05-28 09:38:47', '2024-05-28 09:38:47', NULL, 1, 1),
(254, 45, 'Black', '#000000', 212, 'uploads/products/45/254/10.png', '2024-05-28 10:09:04', '2024-06-05 17:20:45', NULL, 1, 1),
(255, 45, 'ArmyGreen', '#103121fc', 110, 'uploads/products/45/255/9.png', '2024-05-28 10:10:08', '2024-06-26 00:03:40', NULL, 1, 1),
(256, 45, 'Mustard', '#c48600', 231, 'uploads/products/45/256/8.png', '2024-05-28 10:11:21', '2024-06-05 17:21:56', NULL, 1, 1),
(257, 45, 'Cream', '#e9dab9', 111, 'uploads/products/45/257/7.png', '2024-05-28 10:11:54', '2024-06-05 17:21:19', NULL, 1, 1),
(258, 45, 'ChocoBrown', '#331900', 123, 'uploads/products/45/258/6.png', '2024-05-28 10:12:25', '2024-06-05 17:21:04', NULL, 1, 1),
(259, 45, 'Red', '#9e0003', 322, 'uploads/products/45/259/5.png', '2024-05-28 10:12:51', '2024-06-05 17:22:46', NULL, 1, 1),
(260, 45, 'Pink', '#f2b9ef', 333, 'uploads/products/45/260/4.png', '2024-05-28 10:13:22', '2024-06-05 17:24:09', NULL, 1, 1),
(261, 45, 'Khaki', '#8d7742', 312, 'uploads/products/45/261/2.png', '2024-05-28 10:13:50', '2024-06-05 17:21:37', NULL, 1, 1),
(262, 45, 'SkyBlue', '#60a6c4', 331, 'uploads/products/45/262/1.png', '2024-05-28 10:14:18', '2024-06-05 17:22:27', NULL, 1, 1),
(263, 45, 'NavyBlue', '#011c3d', 113, 'uploads/products/45/263/3.png', '2024-05-28 10:15:15', '2024-06-05 17:24:31', NULL, 1, 1),
(264, 46, 'Gray', '#9b9b9b', 10, 'uploads/products/46/264/FB_IMG_1716862901323.jpg', '2024-05-28 10:22:03', '2024-05-28 10:22:03', NULL, 1, 1),
(265, 47, 'SkyBlue', '#76a6e6', 113, 'uploads/products/47/265/10.png', '2024-05-28 12:59:53', '2024-06-05 17:16:09', NULL, 1, 1),
(266, 47, 'Red', '#b90000', 110, 'uploads/products/47/266/26.png', '2024-05-28 13:01:11', '2024-06-05 17:16:40', NULL, 1, 1),
(267, 47, 'Yellow', '#ffdd00', 121, 'uploads/products/47/267/2.png', '2024-05-28 13:01:37', '2024-06-05 17:15:08', NULL, 1, 1),
(268, 47, 'Orange', '#ff7300', 331, 'uploads/products/47/268/3.png', '2024-05-28 13:02:08', '2024-06-05 17:17:28', NULL, 1, 1),
(269, 47, 'Brown', '#462a14', 117, 'uploads/products/47/269/4.png', '2024-05-28 13:03:10', '2024-06-05 17:16:22', NULL, 1, 1),
(270, 47, 'LimeGreen', '#d6ee51', 123, 'uploads/products/47/270/5.png', '2024-05-28 13:03:56', '2024-06-05 17:17:16', NULL, 1, 1),
(271, 47, 'Purple', '#b882e1', 111, 'uploads/products/47/271/6.png', '2024-05-28 13:04:19', '2024-06-05 17:17:05', NULL, 1, 1),
(272, 47, 'Amethyst', '#9b95f2', 111, 'uploads/products/47/272/7.png', '2024-05-28 13:04:53', '2024-06-05 17:14:25', NULL, 1, 1),
(273, 47, 'Teal', '#53cba9', 231, 'uploads/products/47/273/8.png', '2024-05-28 13:05:24', '2024-06-05 17:15:30', NULL, 1, 1),
(274, 47, 'Gray', '#9a9a9a', 133, 'uploads/products/47/274/9.png', '2024-05-28 13:05:45', '2024-06-05 17:16:53', NULL, 1, 1),
(275, 47, 'ArmyGreen', '#698e54', 121, 'uploads/products/47/275/1.png', '2024-05-28 13:06:46', '2024-06-05 17:15:46', NULL, 1, 1),
(276, 41, 'Nude', '#decbbc', 322, 'uploads/products/41/276/8.png', '2024-05-28 13:14:07', '2024-06-05 17:07:18', NULL, 1, 1),
(277, 41, 'SkyBlue', '#9fe5f5', 121, 'uploads/products/41/277/7.png', '2024-05-28 13:14:30', '2024-06-05 17:05:36', NULL, 1, 1),
(278, 41, 'Brown', '#9f5b27', 122, 'uploads/products/41/278/5.png', '2024-05-28 13:15:17', '2024-06-05 17:09:03', NULL, 1, 1),
(279, 41, 'Purple', '#968deb', 421, 'uploads/products/41/279/6.png', '2024-05-28 13:15:48', '2024-06-05 17:06:19', NULL, 1, 1),
(280, 41, 'SpringGreen', '#5fcba0f2', 151, 'uploads/products/41/280/4.png', '2024-05-28 13:16:33', '2024-06-05 17:05:17', NULL, 1, 1),
(281, 41, 'Flamingo', '#fc8568', 133, 'uploads/products/41/281/3.png', '2024-05-28 13:17:08', '2024-06-05 17:08:16', NULL, 1, 1),
(282, 34, 'ArmyGreen', '#16340a', 141, 'uploads/products/34/282/9.png', '2024-05-28 13:20:59', '2024-06-05 17:02:36', NULL, 1, 1),
(283, 34, 'DarkGreen', '#033520', 151, 'uploads/products/34/283/6.png', '2024-05-28 13:21:26', '2024-06-05 16:59:43', NULL, 1, 1),
(284, 34, 'DarkBlue', '#2b016e', 112, 'uploads/products/34/284/3.png', '2024-05-28 13:22:24', '2024-06-05 17:00:27', NULL, 1, 1),
(285, 34, 'Violet', '#350079', 115, 'uploads/products/34/285/2.png', '2024-05-28 13:22:49', '2024-06-05 16:57:14', NULL, 1, 1),
(286, 34, 'Mulberry', '#3f0129', 211, 'uploads/products/34/286/1.png', '2024-05-28 13:23:38', '2024-06-05 16:58:31', NULL, 1, 1),
(287, 34, 'Brown', '#3c1208', 114, 'uploads/products/34/287/17.png', '2024-05-28 13:24:03', '2024-06-05 17:01:19', NULL, 1, 1),
(288, 42, 'Psychedelic', '#6427ff', 311, 'uploads/products/42/288/7.png', '2024-05-28 13:27:59', '2024-06-05 16:49:55', NULL, 1, 1),
(289, 42, 'Turquoise', '#00e0c2', 141, 'uploads/products/42/289/12.png', '2024-05-28 13:28:36', '2024-06-05 16:47:54', NULL, 1, 1),
(290, 42, 'CyberYellow', '#e4bd62', 111, 'uploads/products/42/290/52.png', '2024-05-28 13:29:05', '2024-05-28 05:53:34', '2024-06-05 16:54:35', 1, 1),
(291, 42, 'Dandelion', '#ffb300', 531, 'uploads/products/42/291/28.png', '2024-05-28 13:29:27', '2024-06-05 16:54:00', NULL, 1, 1),
(292, 42, 'LimeGreen', '#54ff32', 313, 'uploads/products/42/292/26.png', '2024-05-28 13:29:57', '2024-06-05 16:51:02', NULL, 1, 1),
(293, 42, 'AppleGreen', '#49956a', 231, 'uploads/products/42/293/33.png', '2024-05-28 13:30:48', '2024-06-05 16:55:25', NULL, 1, 1),
(294, 42, 'DarkBeige', '#b8a986', 332, 'uploads/products/42/294/24.png', '2024-05-28 13:31:08', '2024-06-05 16:53:13', NULL, 1, 1),
(295, 42, 'IceBlue', '#92c4cf', 112, 'uploads/products/42/295/23.png', '2024-05-28 13:31:48', '2024-06-05 16:52:28', NULL, 1, 1),
(296, 42, 'LightBlue', '#b2c0ff', 141, 'uploads/products/42/296/22.png', '2024-05-28 13:32:15', '2024-06-05 16:49:33', NULL, 1, 1),
(297, 42, 'KellyGreen', '#d3cc3b', 331, 'uploads/products/42/297/20.png', '2024-05-28 13:32:49', '2024-06-05 16:52:05', NULL, 1, 1),
(298, 44, 'BlackMaroon', '#000000', 1, 'uploads/products/44/298/FB_IMG_1716875276480.jpg', '2024-05-28 13:48:32', '2024-05-28 13:48:32', NULL, 1, 1),
(299, 44, 'RedGreen', '#e00000', 1, 'uploads/products/44/299/FB_IMG_1716875270703.jpg', '2024-05-28 13:48:58', '2024-05-28 05:51:16', NULL, 1, 1),
(300, 44, 'NavyWhite', '#ffffff', 1, 'uploads/products/44/300/FB_IMG_1716875234733.jpg', '2024-05-28 13:49:27', '2024-05-28 13:49:27', NULL, 1, 1),
(301, 44, 'NavyGray', '#858585', 1, 'uploads/products/44/301/FB_IMG_1716875215057.jpg', '2024-05-28 13:50:38', '2024-05-28 13:50:38', NULL, 1, 1),
(302, 44, 'RedWhite', '#710000', 1, 'uploads/products/44/302/FB_IMG_1716875211240.jpg', '2024-05-28 13:51:05', '2024-05-28 13:51:05', NULL, 1, 1),
(303, 47, 'Maroon', '#a30052', 231, 'uploads/products/47/303/12.png', '2024-06-06 01:18:22', '2024-06-06 01:18:22', NULL, 1, 1),
(304, 47, 'Green', '#0f7026', 123, 'uploads/products/47/304/20.png', '2024-06-06 01:19:32', '2024-06-06 01:19:32', NULL, 1, 1),
(305, 40, 'ArmyGreen', '#00a5cc', 432, 'uploads/products/40/305/1.png', '2024-06-06 01:29:16', '2024-06-06 01:29:16', NULL, 1, 1),
(306, 40, 'Violet', '#b405ff', 112, 'uploads/products/40/306/17.png', '2024-06-06 01:30:14', '2024-06-06 01:30:14', NULL, 1, 1),
(307, 40, 'Psychedelic', '#8254ff', 231, 'uploads/products/40/307/18.png', '2024-06-06 01:31:37', '2024-06-06 01:31:37', NULL, 1, 1),
(308, 24, 'Orange', '#ff950b', 231, 'uploads/products/24/308/7.png', '2024-06-06 01:42:46', '2024-06-06 01:42:46', NULL, 1, 1),
(309, 24, 'Peach', '#e76f51', 123, 'uploads/products/24/309/9.png', '2024-06-06 01:44:34', '2024-06-06 01:44:34', NULL, 1, 1),
(310, 25, 'Turquoise', '#61d4bf', 213, 'uploads/products/25/310/5.png', '2024-06-06 02:01:56', '2024-06-06 02:01:56', NULL, 1, 1),
(311, 25, 'Orange', '#ffa620', 211, 'uploads/products/25/311/8.png', '2024-06-06 02:07:49', '2024-06-06 02:07:49', NULL, 1, 1),
(312, 25, 'LimeGreen', '#31f53b', 231, 'uploads/products/25/312/7.png', '2024-06-06 02:08:13', '2024-06-06 02:08:13', NULL, 1, 1),
(313, 48, 'Yellow&Black', '#000000', 111, 'uploads/products/48/313/SUN AND SHADOW.png', '2024-06-06 02:27:17', '2024-06-06 02:27:17', NULL, 1, 1),
(314, 49, 'BlueWhite', '#001ac2', 123, 'uploads/products/49/314/FROSTY AZURE.png', '2024-06-06 12:39:36', '2024-06-06 12:39:36', NULL, 1, 1),
(315, 50, 'BlackGreen', '#000000', 312, 'uploads/products/50/315/FOREST NIGHT.png', '2024-06-06 12:40:41', '2024-06-06 12:40:41', NULL, 1, 1),
(316, 51, 'GrayBlack', '#b3b3b3', 222, 'uploads/products/51/316/MONOCHROME.png', '2024-06-06 12:42:31', '2024-06-06 12:42:31', NULL, 1, 1),
(317, 52, 'BlueBlack', '#011aba', 211, 'uploads/products/52/317/NAVY NIOR.png', '2024-06-06 12:43:59', '2024-06-06 12:43:59', NULL, 1, 1),
(318, 53, 'SkyBlueBlack', '#008bcc', 221, 'uploads/products/53/318/SAPPHIRE SHADOW.png', '2024-06-06 12:45:48', '2024-06-06 12:45:48', NULL, 1, 1),
(319, 54, 'SkyBlueWhite', '#007acc', 211, 'uploads/products/54/319/HEAVENLY HAZE.png', '2024-06-06 12:46:53', '2024-06-06 12:46:53', NULL, 1, 1),
(320, 55, 'YellowWhite', '#e8c70a', 322, 'uploads/products/55/320/LEMON CHIFFON.png', '2024-06-06 12:47:49', '2024-06-06 12:47:49', '2024-06-06 04:48:11', 1, 1),
(321, 55, 'YellowWhite', '#e8c70a', 322, 'uploads/products/55/321/LEMON CHIFFON.png', '2024-06-06 12:48:06', '2024-06-06 12:48:06', NULL, 1, 1),
(322, 56, 'GreenWhite', '#006928', 322, 'uploads/products/56/322/MINT FROST.png', '2024-06-06 12:50:16', '2024-06-06 12:50:16', NULL, 1, 1),
(323, 57, 'GrayWhite', '#585959', 221, 'uploads/products/57/323/SILVER MIST.png', '2024-06-06 12:51:35', '2024-06-06 04:51:42', NULL, 1, 1),
(324, 58, 'YellowBlack', '#e0cc34', 332, 'uploads/products/58/324/AMBER AND JET.png', '2024-06-06 12:53:07', '2024-06-06 12:53:07', NULL, 1, 1),
(325, 59, 'BlueBlack', '#0069cc', 211, 'uploads/products/59/325/BLUE ECLIPSE.png', '2024-06-06 12:54:04', '2024-06-06 12:54:04', NULL, 1, 1),
(326, 60, 'BlueBlack', '#0011cc', 211, 'uploads/products/60/326/COBALT SHADOW.png', '2024-06-06 12:55:20', '2024-06-06 12:55:20', NULL, 1, 1),
(327, 61, 'GreenBlack', '#075e21', 213, 'uploads/products/61/327/EMERALD SHADOW.png', '2024-06-06 12:56:18', '2024-06-06 12:56:18', NULL, 1, 1),
(328, 62, 'GrayBlack', '#6b6b6b', 232, 'uploads/products/62/328/GRAYSCALE.png', '2024-06-06 12:57:10', '2024-06-06 12:57:10', NULL, 1, 1),
(329, 63, 'BlueBlack', '#007acc', 122, 'uploads/products/63/329/AZURE NIOR.png', '2024-06-06 12:58:44', '2024-06-06 12:58:44', NULL, 1, 1),
(330, 64, 'GrayBlack', '#7d7d7d', 233, 'uploads/products/64/330/CHARCOAL BLEND.png', '2024-06-06 12:59:52', '2024-06-06 12:59:52', NULL, 1, 1),
(331, 65, 'YellowBlack', '#e0c009', 231, 'uploads/products/65/331/GOLD AND ONYX.png', '2024-06-06 13:01:05', '2024-06-06 13:01:05', NULL, 1, 1),
(332, 66, 'GreenBlack', '#034a09', 232, 'uploads/products/66/332/MIDNIGHT MOSS.png', '2024-06-06 13:02:11', '2024-06-06 13:02:11', NULL, 1, 1),
(333, 67, 'BlueBlack', '#00238c', 131, 'uploads/products/67/333/SAPPHIRE MIDNIGHT.png', '2024-06-06 13:03:37', '2024-06-06 13:03:37', NULL, 1, 1),
(334, 68, 'ForestNight', '#05700a', 231, 'uploads/products/68/334/FOREST NIGHT.png', '2024-06-14 00:34:17', '2024-06-14 00:34:17', NULL, 1, 1),
(335, 68, 'Monochrome', '#717273', 321, 'uploads/products/68/335/MONOCHROME.png', '2024-06-14 00:34:44', '2024-06-14 00:34:44', NULL, 1, 1),
(336, 68, 'NavyNoir', '#01268c', 333, 'uploads/products/68/336/NAVY NIOR.png', '2024-06-14 00:35:10', '2024-06-14 00:35:10', NULL, 1, 1),
(337, 68, 'SapphireShadow', '#0086cf', 221, 'uploads/products/68/337/SAPPHIRE SHADOW.png', '2024-06-14 00:35:45', '2024-06-14 00:35:45', NULL, 1, 1),
(338, 68, 'SunAndShadow', '#f2bd1e', 311, 'uploads/products/68/338/SUN AND SHADOW.png', '2024-06-14 00:36:22', '2024-06-14 00:36:22', NULL, 1, 1),
(339, 26, 'TEST', '#00a5cc', 1, 'uploads/products/26/339/banner-sample.png', '2024-06-26 21:28:55', '2024-06-28 02:46:13', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `size_name` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_display` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_price` int NOT NULL DEFAULT '0',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_name`, `size_display`, `size_price`, `created_at`, `deleted_at`) VALUES
(1, 26, 'Small', 'S', 20, '2024-06-28 01:18:08', '2024-06-28 14:49:07'),
(2, 26, 'Small', 'S', 10, '2024-06-28 14:44:20', '2024-06-28 14:49:05'),
(3, 26, 'Small', 'S', 10, '2024-06-28 14:44:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `created_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `order_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2024-04-16 17:55:28', '2024-06-28 08:17:35', NULL),
(2, 9, '2024-04-22 04:15:58', '2024-04-22 04:15:58', NULL),
(3, 10, '2024-04-22 04:34:01', '2024-04-22 04:34:01', NULL),
(4, 22, '2024-05-27 12:24:40', '2024-05-27 12:54:10', NULL),
(5, 26, '2024-05-28 01:19:40', '2024-05-28 01:19:40', NULL),
(6, 32, '2024-06-23 02:32:21', '2024-06-23 02:32:45', NULL),
(7, 20, '2024-06-23 02:33:07', '2024-06-23 02:33:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int NOT NULL,
  `json_data` text COLLATE utf8mb4_unicode_ci,
  `created_at` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `json_data`, `created_at`) VALUES
(5, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/banner-sample.png\",\"Banner\":\"uploads\\/banners\\/banner-sample.png\"}', '2024-06-26 16:41:14'),
(6, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 16:50:40'),
(7, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:09:37'),
(8, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/photo-1553095066-5014bc7b7f2d.jpg\",\"Banner\":\"uploads\\/banners\\/photo-1553095066-5014bc7b7f2d.jpg\"}', '2024-06-26 17:17:42'),
(9, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\"\"}', '2024-06-26 17:18:14'),
(10, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/AdobeStock-lv8ySwQoCK.jpg\",\"Banner\":\"uploads\\/banners\\/AdobeStock-lv8ySwQoCK.jpg\"}', '2024-06-26 17:18:39'),
(11, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:22:56'),
(12, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/Screenshot 2024-06-04 234105.png\",\"Banner\":\"uploads\\/banners\\/Screenshot 2024-06-04 234105.png\"}', '2024-06-26 17:23:13'),
(13, '{\"productSelect\":\"26\",\"discountPercentage\":\"40%\",\"productPrice\":\"180\",\"discountedPrice\":\"108\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:23:19'),
(14, '{\"productSelect\":\"26\",\"discountPercentage\":\"40%\",\"productPrice\":\"180\",\"discountedPrice\":\"108\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/banner-sample.png\",\"Banner\":\"uploads\\/banners\\/banner-sample.png\"}', '2024-06-26 17:23:43'),
(15, '{\"productSelect\":\"26\",\"discountPercentage\":\"60%\",\"productPrice\":\"180\",\"discountedPrice\":\"72\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\"uploads\\/banners\\/banner-sample.png\"}', '2024-06-26 17:25:26'),
(16, '{\"productSelect\":\"26\",\"discountPercentage\":\"60%\",\"productPrice\":\"180\",\"discountedPrice\":\"72\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/43.png\",\"Banner\":\"uploads\\/banners\\/43.png\"}', '2024-06-26 17:25:37'),
(17, '{\"productSelect\":\"26\",\"discountPercentage\":\"10%\",\"productPrice\":\"180\",\"discountedPrice\":\"162\",\"customRadio\":\"uploadSelectedBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\"uploads\\/banners\\/43.png\"}', '2024-06-26 17:25:43'),
(18, '{\"productSelect\":\"26\",\"discountPercentage\":\"10%\",\"productPrice\":\"180\",\"discountedPrice\":\"162\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:26:32'),
(19, '{\"productSelect\":\"\",\"discountPercentage\":null,\"productPrice\":\"\",\"discountedPrice\":\"162\",\"customRadio\":null,\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:27:20'),
(20, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:30:15'),
(21, '{\"productSelect\":\"\",\"discountPercentage\":null,\"productPrice\":\"\",\"discountedPrice\":\"144\",\"customRadio\":null,\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:30:36'),
(22, '{\"productSelect\":\"26\",\"discountPercentage\":\"\",\"productPrice\":\"180\",\"discountedPrice\":\"\",\"customRadio\":null,\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\"\"}', '2024-06-26 17:32:02'),
(23, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":null,\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\"\"}', '2024-06-26 17:32:11'),
(24, '{\"productSelect\":\"26\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:33:07'),
(25, '{\"productSelect\":\"339\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:37:32'),
(26, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"20%\",\"productPrice\":\"180\",\"discountedPrice\":\"144\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:37:59'),
(27, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:54:18'),
(28, '{\"productSelect\":\"26\",\"color_id\":\"164\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/164\\/5.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/164\\/5.png\"}', '2024-06-26 17:57:18'),
(29, '{\"productSelect\":\"26\",\"color_id\":\"164\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/164\\/5.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/164\\/5.png\"}', '2024-06-26 17:57:38'),
(30, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\"}', '2024-06-26 17:57:42'),
(31, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"Banner2\":\"uploads\\/banners\\/banner-sample.png\",\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"uploads\\/banners\\/banner-sample.png\"}', '2024-06-27 09:23:33'),
(32, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"uploadSelectedBanner\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/_bd8e8f11-1f45-4d60-b339-644fa29b89e1.jpg\",\"Banner\":\"uploads\\/banners\\/_bd8e8f11-1f45-4d60-b339-644fa29b89e1.jpg\",\"Banner2\":null,\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"\"}', '2024-06-27 09:29:09'),
(33, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"uploadSelectedBanner\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\"uploads\\/banners\\/_bd8e8f11-1f45-4d60-b339-644fa29b89e1.jpg\",\"Banner2\":\"uploads\\/banners\\/banner-sample.png\",\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"uploads\\/banners\\/banner-sample.png\"}', '2024-06-27 09:29:21'),
(34, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"customRadio2\":\"setDefaultImage2\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"Banner2\":\"assets\\/carousel\\/3.jpg\",\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"\"}', '2024-06-27 10:39:19'),
(35, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setDefaultImage\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\"assets\\/carousel\\/2.jpg\",\"Banner2\":\"uploads\\/banners\\/banner-sample.png\",\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"uploads\\/banners\\/banner-sample.png\"}', '2024-06-27 10:51:47'),
(36, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"Banner2\":null,\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"\"}', '2024-06-27 19:36:40'),
(37, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"uploadSelectedBanner\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/banner-sample.png\",\"Banner\":\"uploads\\/banners\\/banner-sample.png\",\"Banner2\":null,\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"\"}', '2024-06-27 19:37:50'),
(38, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"setSelectedProductBanner\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"\",\"Banner\":\".\\/uploads\\/products\\/26\\/339\\/banner-sample.png\",\"Banner2\":null,\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"\"}', '2024-06-27 19:38:49'),
(39, '{\"productSelect\":\"26\",\"color_id\":\"339\",\"discountPercentage\":\"50%\",\"productPrice\":\"180\",\"discountedPrice\":\"90\",\"customRadio\":\"uploadSelectedBanner\",\"customRadio2\":\"uploadSelectedBanner2\",\"productImage\":\"\",\"defaultImage\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner\":\"uploads\\/banners\\/banner-sample.png\",\"Banner\":\"uploads\\/banners\\/banner-sample.png\",\"Banner2\":null,\"defaultImage2\":\"assets\\/carousel\\/2.jpg\",\"uploadedBanner2\":\"\"}', '2024-06-27 19:38:58');

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
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customize_orders`
--
ALTER TABLE `customize_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender_age_category`
--
ALTER TABLE `gender_age_category`
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
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customize_orders`
--
ALTER TABLE `customize_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gender_age_category`
--
ALTER TABLE `gender_age_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
