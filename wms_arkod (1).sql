-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 05:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wms_arkod`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity_id` bigint(20) UNSIGNED NOT NULL,
  `carton_quantity` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `attention` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `uid` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `address`, `attention`, `tel`, `uid`, `created_at`, `updated_at`) VALUES
(1, 'Yee Lee Marketing', 'yeelee@gmail.com', '123 Marketing St.', 'Mr. Lee', '+60172224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(2, 'Manusia Biase', 'client2@gmail.com', '101 Client Ave.', 'Mr. Smith', '+60272224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(3, 'Client 3', 'client3@gmail.com', '202 Client Blvd.', 'Ms. Johnson', '+60372224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(5, 'Client 5', 'client5@gmail.com', '404 Client Blvd.', 'Ms. Johnson', '+60572224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(6, 'Client 6', 'client6@gmail.com', '505 Client Blvd.', 'Mr. Smith', '+60672224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(7, 'Client 7', 'client7@gmail.com', '606 Client Blvd.', 'Ms. Johnson', '+60772224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(8, 'Client 8', 'client8@gmail.com', '707 Client Blvd.', 'Mr. Smith', '+60872224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(9, 'Client 9', 'client9@gmail.com', '707 Client Blvd.', 'Mr. Smith', '+60872224315', NULL, '2024-06-10 03:42:46', '2024-06-10 03:42:46'),
(12, 'Client 1299', 'client12@gmail.com', '707 Client Blvd.', 'Mr. Smith', '+608111', NULL, '2024-06-10 03:42:46', '2024-06-23 22:14:55'),
(17, 'Jesdylisia', 'jesdylisia213@gmail.com', 'Lot 185, RPR Sebiew, Jalan Sibiyu', 'mr shee', '0178285464', NULL, '2024-06-23 19:35:19', '2024-06-23 21:42:40'),
(18, 'jj', 'jj@gmail.com', 'jj', 'jj', '856', NULL, '2024-06-23 19:40:14', '2024-06-23 19:41:15'),
(20, 'rt', 'rt@gmail.com', 'rt', 'rt', 'rt', NULL, '2024-06-23 22:33:20', '2024-06-23 22:33:20'),
(28, 'Drinking Water', 'water@gmail.com', 'kk', 'qq', 'qq', 30, '2024-06-24 00:50:15', '2024-06-24 22:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `address`, `phone_number`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 'Yee Lee Marketing', 'First Floor, Lot 1002, Jalan Kwong Lee Bank, Pending, Kuching, Sarawak', '+60124010728', 'conniew@ylm.com.my', 18, '2024-01-08 06:13:07', '2024-01-08 06:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `attention` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `client_id`, `name`, `email`, `address`, `attention`, `tel`, `created_at`, `updated_at`) VALUES
(17, 5, 'KK', 'KK@GMAIL.COM', 'ASD', 'aa', '0178285464', '2024-06-19 22:42:48', '2024-06-19 22:42:48'),
(18, 3, 'Ace', 'ace@gmail.com', 'aCE', 'MR ACE', '0133444', '2024-06-19 22:53:14', '2024-06-19 22:54:28'),
(20, 12, 'Jesdylisia Conny Anak Johneddy', 'jesdylisia213@gmail.com', 'Lot 185, RPR Sebiew, Jalan Sibiyu', 'mr shee', '0178285464', '2024-06-23 22:16:51', '2024-06-23 22:16:51'),
(26, 1, 'Jesdylisia Conny Anak Johneddy', 'jesdylisia213@gmail.com', 'Lot 185, RPR Sebiew, Jalan Sibiyu', 'mee', '0178285464', '2024-06-24 23:08:34', '2024-06-24 23:08:34'),
(27, NULL, 'qq', 'qq@gmail.com', 'qq', 'qq', 'qq', '2024-06-24 23:16:24', '2024-06-24 23:16:24'),
(28, NULL, 'Keyboard', 'key@gmail.com', 'key', 'key', 'key', '2024-06-24 23:20:57', '2024-06-24 23:20:57'),
(30, NULL, 'Jesdylisia Conny Anak Johneddy', 'jesdylisia213@gmail.com', 'Lot 185, RPR Sebiew, Jalan Sibiyu', 'qq', '0178285464', '2024-06-24 23:23:25', '2024-06-24 23:23:25'),
(31, NULL, 'Jesdylisia Conny Anak Johneddy', 'jesdylisia213@gmail.com', 'Lot 185, RPR Sebiew, Jalan Sibiyu', 'mee', '0178285464', '2024-06-24 23:28:26', '2024-06-24 23:28:26'),
(33, 28, 'gg', 'gg@gmail.com', 'gg', 'gg', 'gg', '2024-06-24 23:36:26', '2024-06-24 23:36:26'),
(35, 28, 'cc', 'c2@gmail.com', 'cc', 'cc', 'cc', '2024-06-25 18:53:03', '2024-06-25 18:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_no` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_address` text NOT NULL,
  `sender_postcode` varchar(10) NOT NULL,
  `sender_state` varchar(255) NOT NULL,
  `sender_phone` varchar(20) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_address` text NOT NULL,
  `receiver_postcode` varchar(10) NOT NULL,
  `receiver_state` varchar(255) NOT NULL,
  `receiver_phone` varchar(20) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_product`
--

CREATE TABLE `delivery_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `delivery_quantity` text NOT NULL,
  `weight` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `floor_locations`
--

CREATE TABLE `floor_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_codes` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `occupied` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floor_locations`
--

INSERT INTO `floor_locations` (`id`, `location_codes`, `capacity`, `occupied`, `created_at`, `updated_at`) VALUES
(1, 'A-1', 3000, 2520, NULL, NULL),
(2, 'A-2', 3000, 0, NULL, NULL),
(3, 'A-3', 3000, 2100, NULL, NULL),
(4, 'A-4', 3000, 2338, NULL, NULL),
(5, 'A-5', 3000, 1329, NULL, NULL),
(6, 'A-6', 3000, 0, NULL, NULL),
(7, 'A-7', 3000, 0, NULL, NULL),
(8, 'A-8', 3000, 0, NULL, NULL),
(9, 'A-9', 3000, 0, NULL, NULL),
(10, 'A-10', 3000, 4, NULL, NULL),
(11, 'B-1', 3000, 1040, NULL, NULL),
(12, 'B-2', 3000, 0, NULL, NULL),
(13, 'B-3', 3000, 0, NULL, NULL),
(14, 'B-4', 3000, 0, NULL, NULL),
(15, 'B-5', 3000, 0, NULL, NULL),
(16, 'B-6', 3000, 0, NULL, NULL),
(17, 'B-7', 3000, 0, NULL, NULL),
(18, 'B-8', 3000, 0, NULL, NULL),
(19, 'B-9', 3000, 0, NULL, NULL),
(20, 'B-10', 3000, 0, NULL, NULL),
(21, 'C-1', 3000, 1890, NULL, NULL),
(22, 'C-2', 3000, 2100, NULL, NULL),
(23, 'C-3', 3000, 2100, NULL, NULL),
(24, 'C-4', 3000, 2100, NULL, NULL),
(25, 'C-5', 3000, 800, NULL, NULL),
(26, 'C-6', 3000, 218, NULL, NULL),
(27, 'C-7', 3000, 1088, NULL, NULL),
(28, 'C-8', 3000, 0, NULL, NULL),
(29, 'C-9', 3000, 0, NULL, NULL),
(30, 'C-10', 3000, 0, NULL, NULL),
(31, 'D-1', 3000, 0, NULL, NULL),
(32, 'D-2', 3000, 0, NULL, NULL),
(33, 'D-3', 3000, 0, NULL, NULL),
(34, 'D-4', 3000, 0, NULL, NULL),
(35, 'D-5', 3000, 0, NULL, NULL),
(36, 'D-6', 3000, 0, NULL, NULL),
(37, 'D-7', 3000, 0, NULL, NULL),
(38, 'D-8', 3000, 0, NULL, NULL),
(39, 'D-9', 3000, 0, NULL, NULL),
(40, 'D-10', 3000, 0, NULL, NULL),
(41, 'E-1', 3000, 0, NULL, NULL),
(42, 'E-2', 3000, 0, NULL, NULL),
(43, 'E-3', 3000, 0, NULL, NULL),
(44, 'E-4', 3000, 0, NULL, NULL),
(45, 'E-5', 3000, 0, NULL, NULL),
(46, 'E-6', 3000, 0, NULL, NULL),
(47, 'E-7', 3000, 0, NULL, NULL),
(48, 'E-8', 3000, 0, NULL, NULL),
(49, 'E-9', 3000, 0, NULL, NULL),
(50, 'E-10', 3000, 0, NULL, NULL),
(51, 'F-1', 3000, 0, NULL, NULL),
(52, 'F-2', 3000, 0, NULL, NULL),
(53, 'F-3', 3000, 0, NULL, NULL),
(54, 'F-4', 3000, 0, NULL, NULL),
(55, 'F-5', 3000, 0, NULL, NULL),
(56, 'F-6', 3000, 0, NULL, NULL),
(57, 'F-7', 3000, 0, NULL, NULL),
(58, 'F-8', 3000, 0, NULL, NULL),
(59, 'F-9', 3000, 0, NULL, NULL),
(60, 'F-10', 3000, 0, NULL, NULL),
(61, 'G-1', 3000, 0, NULL, NULL),
(62, 'G-2', 3000, 0, NULL, NULL),
(63, 'G-3', 3000, 0, NULL, NULL),
(64, 'G-4', 3000, 0, NULL, NULL),
(65, 'G-5', 3000, 0, NULL, NULL),
(66, 'G-6', 3000, 0, NULL, NULL),
(67, 'G-7', 3000, 0, NULL, NULL),
(68, 'G-8', 3000, 0, NULL, NULL),
(69, 'G-9', 3000, 0, NULL, NULL),
(70, 'G-10', 3000, 0, NULL, NULL),
(71, 'H-1', 3000, 0, NULL, NULL),
(72, 'H-2', 3000, 0, NULL, NULL),
(73, 'H-3', 3000, 0, NULL, NULL),
(74, 'H-4', 3000, 0, NULL, NULL),
(75, 'H-5', 3000, 0, NULL, NULL),
(76, 'H-6', 3000, 0, NULL, NULL),
(77, 'H-7', 3000, 0, NULL, NULL),
(78, 'H-8', 3000, 0, NULL, NULL),
(79, 'H-9', 3000, 0, NULL, NULL),
(80, 'H-10', 3000, 0, NULL, NULL),
(81, 'I-1', 3000, 0, NULL, NULL),
(82, 'I-2', 3000, 0, NULL, NULL),
(83, 'I-3', 3000, 0, NULL, NULL),
(84, 'I-4', 3000, 0, NULL, NULL),
(85, 'I-5', 3000, 0, NULL, NULL),
(86, 'I-6', 3000, 0, NULL, NULL),
(87, 'I-7', 3000, 0, NULL, NULL),
(88, 'I-8', 3000, 0, NULL, NULL),
(89, 'I-9', 3000, 0, NULL, NULL),
(90, 'I-10', 3000, 0, NULL, NULL),
(91, 'J-1', 3000, 0, NULL, NULL),
(92, 'J-2', 3000, 0, NULL, NULL),
(93, 'J-3', 3000, 0, NULL, NULL),
(94, 'J-4', 3000, 0, NULL, NULL),
(95, 'J-5', 3000, 0, NULL, NULL),
(96, 'J-6', 3000, 0, NULL, NULL),
(97, 'J-7', 3000, 0, NULL, NULL),
(98, 'J-8', 3000, 0, NULL, NULL),
(99, 'J-9', 3000, 0, NULL, NULL),
(100, 'J-10', 3000, 0, NULL, NULL),
(101, 'A-11', 3000, 0, NULL, NULL),
(102, 'A-12', 3000, 0, NULL, NULL),
(103, 'A-13', 3000, 0, NULL, NULL),
(104, 'A-14', 3000, 0, NULL, NULL),
(105, 'A-15', 3000, 0, NULL, NULL),
(106, 'A-16', 3000, 0, NULL, NULL),
(107, 'A-17', 3000, 0, NULL, NULL),
(108, 'A-18', 3000, 0, NULL, NULL),
(109, 'A-19', 3000, 0, NULL, NULL),
(110, 'A-20', 3000, 0, NULL, NULL),
(111, 'B-11', 3000, 0, NULL, NULL),
(112, 'B-12', 3000, 0, NULL, NULL),
(113, 'B-13', 3000, 0, NULL, NULL),
(114, 'B-14', 3000, 0, NULL, NULL),
(115, 'B-15', 3000, 0, NULL, NULL),
(116, 'B-16', 3000, 0, NULL, NULL),
(117, 'B-17', 3000, 0, NULL, NULL),
(118, 'B-18', 3000, 0, NULL, NULL),
(119, 'B-19', 3000, 0, NULL, NULL),
(120, 'B-20', 3000, 0, NULL, NULL),
(121, 'C-11', 3000, 0, NULL, NULL),
(122, 'C-12', 3000, 0, NULL, NULL),
(123, 'C-13', 3000, 0, NULL, NULL),
(124, 'C-14', 3000, 0, NULL, NULL),
(125, 'C-15', 3000, 0, NULL, NULL),
(126, 'C-16', 3000, 0, NULL, NULL),
(127, 'C-17', 3000, 0, NULL, NULL),
(128, 'C-18', 3000, 0, NULL, NULL),
(129, 'C-19', 3000, 0, NULL, NULL),
(130, 'C-20', 3000, 0, NULL, NULL),
(131, 'D-11', 3000, 0, NULL, NULL),
(132, 'D-12', 3000, 0, NULL, NULL),
(133, 'D-13', 3000, 0, NULL, NULL),
(134, 'D-14', 3000, 0, NULL, NULL),
(135, 'D-15', 3000, 0, NULL, NULL),
(136, 'D-16', 3000, 0, NULL, NULL),
(137, 'D-17', 3000, 0, NULL, NULL),
(138, 'D-18', 3000, 0, NULL, NULL),
(139, 'D-19', 3000, 0, NULL, NULL),
(140, 'D-20', 3000, 0, NULL, NULL),
(141, 'E-11', 3000, 0, NULL, NULL),
(142, 'E-12', 3000, 0, NULL, NULL),
(143, 'E-13', 3000, 0, NULL, NULL),
(144, 'E-14', 3000, 0, NULL, NULL),
(145, 'E-15', 3000, 0, NULL, NULL),
(146, 'E-16', 3000, 0, NULL, NULL),
(147, 'E-17', 3000, 0, NULL, NULL),
(148, 'E-18', 3000, 0, NULL, NULL),
(149, 'E-19', 3000, 0, NULL, NULL),
(150, 'E-20', 3000, 0, NULL, NULL),
(151, 'F-11', 3000, 0, NULL, NULL),
(152, 'F-12', 3000, 0, NULL, NULL),
(153, 'F-13', 3000, 0, NULL, NULL),
(154, 'F-14', 3000, 0, NULL, NULL),
(155, 'F-15', 3000, 0, NULL, NULL),
(156, 'F-16', 3000, 0, NULL, NULL),
(157, 'F-17', 3000, 0, NULL, NULL),
(158, 'F-18', 3000, 0, NULL, NULL),
(159, 'F-19', 3000, 0, NULL, NULL),
(160, 'F-20', 3000, 0, NULL, NULL),
(161, 'G-11', 3000, 0, NULL, NULL),
(162, 'G-12', 3000, 0, NULL, NULL),
(163, 'G-13', 3000, 0, NULL, NULL),
(164, 'G-14', 3000, 0, NULL, NULL),
(165, 'G-15', 3000, 0, NULL, NULL),
(166, 'G-16', 3000, 0, NULL, NULL),
(167, 'G-17', 3000, 0, NULL, NULL),
(168, 'G-18', 3000, 0, NULL, NULL),
(169, 'G-19', 3000, 0, NULL, NULL),
(170, 'G-20', 3000, 0, NULL, NULL),
(171, 'H-11', 3000, 0, NULL, NULL),
(172, 'H-12', 3000, 0, NULL, NULL),
(173, 'H-13', 3000, 0, NULL, NULL),
(174, 'H-14', 3000, 0, NULL, NULL),
(175, 'H-15', 3000, 0, NULL, NULL),
(176, 'H-16', 3000, 0, NULL, NULL),
(177, 'H-17', 3000, 0, NULL, NULL),
(178, 'H-18', 3000, 0, NULL, NULL),
(179, 'H-19', 3000, 0, NULL, NULL),
(180, 'H-20', 3000, 0, NULL, NULL),
(181, 'I-11', 3000, 0, NULL, NULL),
(182, 'I-12', 3000, 0, NULL, NULL),
(183, 'I-13', 3000, 0, NULL, NULL),
(184, 'I-14', 3000, 0, NULL, NULL),
(185, 'I-15', 3000, 0, NULL, NULL),
(186, 'I-16', 3000, 0, NULL, NULL),
(187, 'I-17', 3000, 0, NULL, NULL),
(188, 'I-18', 3000, 0, NULL, NULL),
(189, 'I-19', 3000, 0, NULL, NULL),
(190, 'I-20', 3000, 0, NULL, NULL),
(191, 'J-11', 3000, 0, NULL, NULL),
(192, 'J-12', 3000, 0, NULL, NULL),
(193, 'J-13', 3000, 0, NULL, NULL),
(194, 'J-14', 3000, 0, NULL, NULL),
(195, 'J-15', 3000, 0, NULL, NULL),
(196, 'J-16', 3000, 0, NULL, NULL),
(197, 'J-17', 3000, 0, NULL, NULL),
(198, 'J-18', 3000, 0, NULL, NULL),
(199, 'J-19', 3000, 0, NULL, NULL),
(200, 'J-20', 3000, 0, NULL, NULL),
(201, 'A-21', 3000, 0, NULL, NULL),
(202, 'A-22', 3000, 0, NULL, NULL),
(203, 'A-23', 3000, 0, NULL, NULL),
(204, 'A-24', 3000, 0, NULL, NULL),
(205, 'A-25', 3000, 0, NULL, NULL),
(206, 'A-26', 3000, 0, NULL, NULL),
(207, 'A-27', 3000, 0, NULL, NULL),
(208, 'A-28', 3000, 0, NULL, NULL),
(209, 'A-29', 3000, 0, NULL, NULL),
(210, 'A-30', 3000, 0, NULL, NULL),
(211, 'B-21', 3000, 0, NULL, NULL),
(212, 'B-22', 3000, 0, NULL, NULL),
(213, 'B-23', 3000, 0, NULL, NULL),
(214, 'B-24', 3000, 0, NULL, NULL),
(215, 'B-25', 3000, 0, NULL, NULL),
(216, 'B-26', 3000, 0, NULL, NULL),
(217, 'B-27', 3000, 0, NULL, NULL),
(218, 'B-28', 3000, 0, NULL, NULL),
(219, 'B-29', 3000, 0, NULL, NULL),
(220, 'B-30', 3000, 0, NULL, NULL),
(221, 'C-21', 3000, 0, NULL, NULL),
(222, 'C-22', 3000, 0, NULL, NULL),
(223, 'C-23', 3000, 0, NULL, NULL),
(224, 'C-24', 3000, 0, NULL, NULL),
(225, 'C-25', 3000, 0, NULL, NULL),
(226, 'C-26', 3000, 0, NULL, NULL),
(227, 'C-27', 3000, 0, NULL, NULL),
(228, 'C-28', 3000, 0, NULL, NULL),
(229, 'C-29', 3000, 0, NULL, NULL),
(230, 'C-30', 3000, 0, NULL, NULL),
(231, 'D-21', 3000, 0, NULL, NULL),
(232, 'D-22', 3000, 0, NULL, NULL),
(233, 'D-23', 3000, 0, NULL, NULL),
(234, 'D-24', 3000, 0, NULL, NULL),
(235, 'D-25', 3000, 0, NULL, NULL),
(236, 'D-26', 3000, 0, NULL, NULL),
(237, 'D-27', 3000, 0, NULL, NULL),
(238, 'D-28', 3000, 0, NULL, NULL),
(239, 'D-29', 3000, 0, NULL, NULL),
(240, 'D-30', 3000, 0, NULL, NULL),
(241, 'E-21', 3000, 0, NULL, NULL),
(242, 'E-22', 3000, 0, NULL, NULL),
(243, 'E-23', 3000, 0, NULL, NULL),
(244, 'E-24', 3000, 0, NULL, NULL),
(245, 'E-25', 3000, 0, NULL, NULL),
(246, 'E-26', 3000, 0, NULL, NULL),
(247, 'E-27', 3000, 0, NULL, NULL),
(248, 'E-28', 3000, 0, NULL, NULL),
(249, 'E-29', 3000, 0, NULL, NULL),
(250, 'E-30', 3000, 0, NULL, NULL),
(251, 'F-21', 3000, 0, NULL, NULL),
(252, 'F-22', 3000, 0, NULL, NULL),
(253, 'F-23', 3000, 0, NULL, NULL),
(254, 'F-24', 3000, 0, NULL, NULL),
(255, 'F-25', 3000, 0, NULL, NULL),
(256, 'F-26', 3000, 0, NULL, NULL),
(257, 'F-27', 3000, 0, NULL, NULL),
(258, 'F-28', 3000, 0, NULL, NULL),
(259, 'F-29', 3000, 0, NULL, NULL),
(260, 'F-30', 3000, 0, NULL, NULL),
(261, 'G-21', 3000, 0, NULL, NULL),
(262, 'G-22', 3000, 0, NULL, NULL),
(263, 'G-23', 3000, 0, NULL, NULL),
(264, 'G-24', 3000, 0, NULL, NULL),
(265, 'G-25', 3000, 0, NULL, NULL),
(266, 'G-26', 3000, 0, NULL, NULL),
(267, 'G-27', 3000, 0, NULL, NULL),
(268, 'G-28', 3000, 0, NULL, NULL),
(269, 'G-29', 3000, 0, NULL, NULL),
(270, 'G-30', 3000, 0, NULL, NULL),
(271, 'H-21', 3000, 0, NULL, NULL),
(272, 'H-22', 3000, 0, NULL, NULL),
(273, 'H-23', 3000, 0, NULL, NULL),
(274, 'H-24', 3000, 0, NULL, NULL),
(275, 'H-25', 3000, 0, NULL, NULL),
(276, 'H-26', 3000, 0, NULL, NULL),
(277, 'H-27', 3000, 0, NULL, NULL),
(278, 'H-28', 3000, 0, NULL, NULL),
(279, 'H-29', 3000, 0, NULL, NULL),
(280, 'H-30', 3000, 0, NULL, NULL),
(281, 'I-21', 3000, 0, NULL, NULL),
(282, 'I-22', 3000, 0, NULL, NULL),
(283, 'I-23', 3000, 0, NULL, NULL),
(284, 'I-24', 3000, 0, NULL, NULL),
(285, 'I-25', 3000, 0, NULL, NULL),
(286, 'I-26', 3000, 0, NULL, NULL),
(287, 'I-27', 3000, 0, NULL, NULL),
(288, 'I-28', 3000, 0, NULL, NULL),
(289, 'I-29', 3000, 0, NULL, NULL),
(290, 'I-30', 3000, 0, NULL, NULL),
(291, 'J-21', 3000, 0, NULL, NULL),
(292, 'J-22', 3000, 0, NULL, NULL),
(293, 'J-23', 3000, 0, NULL, NULL),
(294, 'J-24', 3000, 0, NULL, NULL),
(295, 'J-25', 3000, 0, NULL, NULL),
(296, 'J-26', 3000, 0, NULL, NULL),
(297, 'J-27', 3000, 0, NULL, NULL),
(298, 'J-28', 3000, 0, NULL, NULL),
(299, 'J-29', 3000, 0, NULL, NULL),
(300, 'J-30', 3000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocationID` int(11) NOT NULL,
  `LocationType` int(11) NOT NULL,
  `LocationCode` varchar(255) NOT NULL,
  `Capacity` decimal(11,0) DEFAULT NULL,
  `Occupied` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='LocationType: Floor (1), Rack (2), Bin(3), None(4)';

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LocationID`, `LocationType`, `LocationCode`, `Capacity`, `Occupied`) VALUES
(1, 1, 'Z2-U-F5', 300, 22),
(2, 1, 'Z2-T-F7', 300, 300),
(3, 1, 'Z2-u-f10', 300, 32),
(4, 1, 'Z1-B-F21', 300, 300),
(9, 1, 'Z1-A-F21', 300, 135),
(10, 1, 'Z1-E-F18', 300, 300);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rack_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_no` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `floor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `week_number` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `attention` varchar(255) DEFAULT NULL,
  `partner_type` int(11) NOT NULL DEFAULT 2,
  `uid` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `address`, `tel`, `email`, `attention`, `partner_type`, `uid`) VALUES
(1, 'YEE LEE MARKETING SDN. BHD.', '1st Floor, Lot 1002, Jalan Kwong Lee Bank, Pending Hg 93450, KUCHING, SARAWAK.\r\n', '012-8889118', NULL, 'Michael TAN', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('asyrafmalek66@gmail.com', 'EsbmDBzGWAqQZfWq7hC95sKFVXmjvM0T66bo3t3wftCzfe2ghLz9eGBOT0Fe1KwB', '2023-08-24 17:11:29'),
('asyrafmalek66@gmail.com', 'pSCqm7hxm8MfBPt19BeQGZLyD2ZdxO5YUBdwRMGdNDFQ8bcgd1YC6wgKUTATFi7X', '2023-08-24 17:12:46'),
('asyrafmalek66@gmail.com', 'zy0UIXmptDMHdh1V91pOL54kxGqR5g3kSsodYZDksuHHCFvnqVSwcwsAtqYk8ltM', '2023-08-24 17:13:21'),
('asyrafmalek66@gmail.com', 'TymiCOMPZUWSQXYUb3anSHy0efF79vbRU0us92RgkOVAqBZAUevQW1lWKIN4aKCw', '2023-08-24 17:14:49'),
('asyrafmalek66@gmail.com', 'cjbcRttwAjlsE78pwF4HcburPFmDBnGcwK4HS88z6NQT4xMIKEeYYEI0ZhofrC2m', '2023-08-24 17:18:45'),
('asyrafmalek66@gmail.com', 'yJLzLJqXAWuEsr5d6taoSgI8I5mJ4OTW5qq6cPYfQOpyfl7O9VmQSyHHkEzk1n6c', '2023-08-24 17:20:21'),
('asyrafmalek66@gmail.com', 'GwcmqMEJroGZMUZeqCyWYQgWWoMVDrLZWi21rYDv8IBguk9iGIflm9dwVntq4i36', '2023-08-24 17:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickers`
--

CREATE TABLE `pickers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rack_id` bigint(20) UNSIGNED DEFAULT NULL,
  `return_stock_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_no` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `report` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `floor_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickups`
--

CREATE TABLE `pickups` (
  `sender_address` text NOT NULL,
  `receiver_address` text NOT NULL,
  `sender_state` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `receiver_state` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `sender_postcode` varchar(10) NOT NULL,
  `receiver_postcode` varchar(10) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_contact_no` varchar(20) NOT NULL,
  `pickup_id` int(11) NOT NULL,
  `time_pickup` time NOT NULL,
  `date_pickup` date NOT NULL,
  `carton_quantity` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `Img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `UOM` varchar(255) DEFAULT NULL,
  `weight_per_unit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uid` bigint(20) UNSIGNED DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `SKU`, `product_desc`, `expired_date`, `Img`, `UOM`, `weight_per_unit`, `created_at`, `updated_at`, `uid`, `partner_id`) VALUES
(28, 'RBP24', 'RBP24', 'RBP24', NULL, 'no_image.jpg', 'CTN', 1, '2024-06-10 10:23:43', '2024-07-10 02:13:48', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_request`
--

CREATE TABLE `product_request` (
  `id` int(11) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` text NOT NULL,
  `product_desc` text NOT NULL,
  `carton_quantity` int(11) NOT NULL,
  `item_per_carton` int(11) NOT NULL,
  `product_dimensions` varchar(255) NOT NULL,
  `weight_per_item` decimal(10,2) NOT NULL,
  `weight_per_carton` decimal(10,2) NOT NULL,
  `total_weight` double(8,2) NOT NULL,
  `product_price` float(8,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE `quantities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `pallet_quantity` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `sold_carton_quantity` int(11) NOT NULL,
  `sold_item_quantity` int(11) NOT NULL,
  `remaining_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`id`, `product_id`, `pallet_quantity`, `total_quantity`, `sold_carton_quantity`, `sold_item_quantity`, `remaining_quantity`, `created_at`, `updated_at`) VALUES
(103, 1, 13, 1890, 0, 0, 1890, '2024-02-04 11:39:30', '2024-02-04 11:39:30'),
(106, 2, 4, 630, 0, 0, 630, '2024-02-04 16:06:48', '2024-02-04 16:06:48'),
(108, 4, 2, 238, 0, 0, 238, '2024-02-04 16:27:52', '2024-02-04 16:27:52'),
(109, 3, 4, 540, 0, 0, 540, '2024-02-04 16:31:22', '2024-02-04 16:31:22'),
(110, 5, 3, 500, 0, 0, 500, '2024-02-04 16:36:12', '2024-02-04 16:36:12'),
(111, 6, 2, 370, 0, 0, 370, '2024-02-04 16:40:14', '2024-02-04 16:40:14'),
(112, 7, 12, 1730, 0, 0, 1730, '2024-02-04 16:48:34', '2024-02-04 16:48:34'),
(113, 8, 14, 2100, 0, 0, 2100, '2024-02-04 16:53:21', '2024-02-04 16:53:21'),
(114, 9, 13, 1890, 0, 0, 1890, '2024-02-04 17:08:27', '2024-02-04 17:08:27'),
(115, 10, 14, 2100, 0, 0, 2100, '2024-02-04 17:11:31', '2024-02-04 17:11:31'),
(116, 11, 14, 2100, 0, 0, 2100, '2024-02-04 17:14:37', '2024-02-04 17:14:37'),
(117, 12, 14, 2100, 0, 0, 2100, '2024-02-04 17:18:32', '2024-02-04 17:18:32'),
(118, 13, 5, 800, 0, 0, 800, '2024-02-04 17:22:28', '2024-02-04 17:22:28'),
(119, 14, 1, 111, 0, 0, 111, '2024-02-04 17:24:53', '2024-02-04 17:24:53'),
(120, 15, 1, 107, 0, 0, 107, '2024-02-04 17:27:59', '2024-02-04 17:27:59'),
(121, 16, 1, 187, 0, 0, 187, '2024-02-04 17:30:40', '2024-02-04 17:30:40'),
(122, 20, 6, 901, 0, 0, 901, '2024-02-04 17:32:37', '2024-02-04 17:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `rack_locations`
--

CREATE TABLE `rack_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(255) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `occupied` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rack_locations`
--

INSERT INTO `rack_locations` (`id`, `location_code`, `capacity`, `occupied`, `created_at`, `updated_at`) VALUES
(1, 'A-1-L1', 200, 167.00, NULL, '2023-08-02 00:47:56'),
(2, 'A-1-L2', 200, 1.00, NULL, '2023-07-31 23:23:39'),
(3, 'A-1-L3', 200, 11.20, NULL, '2023-08-22 17:33:52'),
(4, 'A-2-L1', 200, 119.00, NULL, NULL),
(5, 'A-2-L2', 200, 3.60, NULL, NULL),
(6, 'A-2-L3', 200, 11.00, NULL, NULL),
(7, 'A-3-L1', 200, 0.00, NULL, NULL),
(8, 'A-3-L2', 200, 0.00, NULL, NULL),
(9, 'A-3-L3', 200, 0.00, NULL, NULL),
(10, 'A-4-L1', 200, 0.00, NULL, NULL),
(11, 'A-4-L2', 200, 150.00, NULL, NULL),
(12, 'A-4-L3', 200, 0.00, NULL, NULL),
(13, 'B-1-L1', 200, 0.00, NULL, '2023-08-22 22:26:19'),
(14, 'B-1-L2', 200, 9.16, NULL, '2023-08-01 22:04:38'),
(15, 'B-1-L3', 200, 157.50, NULL, NULL),
(16, 'B-2-L1', 200, 169.40, NULL, '2023-07-31 23:17:08'),
(17, 'B-2-L2', 200, 1.20, NULL, NULL),
(18, 'B-2-L3', 200, 3.00, NULL, NULL),
(19, 'B-3-L1', 200, 0.00, NULL, NULL),
(20, 'B-3-L2', 200, 0.00, NULL, NULL),
(21, 'B-3-L3', 200, 0.00, NULL, NULL),
(22, 'B-4-L1', 200, 0.00, NULL, NULL),
(23, 'B-4-L2', 200, 0.00, NULL, NULL),
(24, 'B-4-L3', 200, 0.00, NULL, NULL),
(25, 'C-1-L1', 200, 0.00, NULL, NULL),
(26, 'C-1-L2', 200, 0.00, NULL, NULL),
(27, 'C-1-L3', 200, 0.00, NULL, NULL),
(28, 'C-2-L1', 200, 0.00, NULL, NULL),
(29, 'C-2-L2', 200, 0.00, NULL, NULL),
(30, 'C-2-L3', 200, 0.00, NULL, NULL),
(31, 'C-3-L1', 200, 0.00, NULL, NULL),
(32, 'C-3-L2', 200, 0.00, NULL, NULL),
(33, 'C-3-L3', 200, 0.00, NULL, NULL),
(34, 'C-4-L1', 200, 0.00, NULL, NULL),
(35, 'C-4-L2', 200, 0.00, NULL, NULL),
(36, 'C-4-L3', 200, 0.00, NULL, NULL),
(37, 'D-1-L1', 200, 0.00, NULL, NULL),
(38, 'D-1-L2', 200, 0.00, NULL, NULL),
(39, 'D-1-L3', 200, 0.00, NULL, NULL),
(40, 'D-2-L1', 200, 0.00, NULL, NULL),
(41, 'D-2-L2', 200, 0.00, NULL, NULL),
(42, 'D-2-L3', 200, 0.00, NULL, NULL),
(43, 'D-3-L1', 200, 0.00, NULL, NULL),
(44, 'D-3-L2', 200, 0.00, NULL, NULL),
(45, 'D-3-L3', 200, 0.00, NULL, NULL),
(46, 'D-4-L1', 200, 0.00, NULL, NULL),
(47, 'D-4-L2', 200, 0.00, NULL, NULL),
(48, 'D-4-L3', 200, 0.00, NULL, NULL),
(49, 'E-1-L1', 200, 0.00, NULL, NULL),
(50, 'E-1-L2', 200, 0.00, NULL, NULL),
(51, 'E-1-L3', 200, 0.00, NULL, NULL),
(52, 'E-2-L1', 200, 0.00, NULL, NULL),
(53, 'E-2-L2', 200, 0.00, NULL, NULL),
(54, 'E-2-L3', 200, 0.00, NULL, NULL),
(55, 'E-3-L1', 200, 0.00, NULL, NULL),
(56, 'E-3-L2', 200, 0.00, NULL, NULL),
(57, 'E-3-L3', 200, 0.00, NULL, NULL),
(58, 'E-4-L1', 200, 0.00, NULL, NULL),
(59, 'E-4-L2', 200, 0.00, NULL, NULL),
(60, 'E-4-L3', 200, 8.30, NULL, '2023-09-20 17:52:06'),
(61, 'F-1-L1', 200, 0.00, NULL, NULL),
(62, 'F-1-L2', 200, 0.00, NULL, NULL),
(63, 'F-1-L3', 200, 0.00, NULL, NULL),
(64, 'F-2-L1', 200, 0.00, NULL, NULL),
(65, 'F-2-L2', 200, 0.00, NULL, NULL),
(66, 'F-2-L3', 200, 0.00, NULL, NULL),
(67, 'F-3-L1', 200, 0.00, NULL, NULL),
(68, 'F-3-L2', 200, 0.00, NULL, NULL),
(69, 'F-3-L3', 200, 0.00, NULL, NULL),
(70, 'F-4-L1', 200, 0.00, NULL, NULL),
(71, 'F-4-L2', 200, 0.00, NULL, NULL),
(72, 'F-4-L3', 200, 0.00, NULL, NULL),
(73, 'G-1-L1', 200, 0.00, NULL, NULL),
(74, 'G-1-L2', 200, 0.00, NULL, NULL),
(75, 'G-1-L3', 200, 0.00, NULL, NULL),
(76, 'G-2-L1', 200, 0.00, NULL, NULL),
(77, 'G-2-L2', 200, 0.00, NULL, NULL),
(78, 'G-2-L3', 200, 0.00, NULL, NULL),
(79, 'G-3-L1', 200, 0.00, NULL, NULL),
(80, 'G-3-L2', 200, 0.00, NULL, NULL),
(81, 'G-3-L3', 200, 0.00, NULL, NULL),
(82, 'G-4-L1', 200, 0.00, NULL, NULL),
(83, 'G-4-L2', 200, 0.00, NULL, NULL),
(84, 'G-4-L3', 200, 0.00, NULL, NULL),
(85, 'H-1-L1', 200, 0.00, NULL, NULL),
(86, 'H-1-L2', 200, 0.00, NULL, NULL),
(87, 'H-1-L3', 200, 0.00, NULL, NULL),
(88, 'H-2-L1', 200, 0.00, NULL, NULL),
(89, 'H-2-L2', 200, 0.00, NULL, NULL),
(90, 'H-2-L3', 200, 0.00, NULL, NULL),
(91, 'H-3-L1', 200, 0.00, NULL, NULL),
(92, 'H-3-L2', 200, 0.00, NULL, NULL),
(93, 'H-3-L3', 200, 0.00, NULL, NULL),
(94, 'H-4-L1', 200, 1.50, NULL, '2023-09-20 17:52:06'),
(95, 'H-4-L2', 200, 0.00, NULL, NULL),
(96, 'H-4-L3', 200, 0.00, NULL, NULL),
(97, 'I-1-L1', 200, 0.00, NULL, NULL),
(98, 'I-1-L2', 200, 0.00, NULL, NULL),
(99, 'I-1-L3', 200, 0.00, NULL, NULL),
(100, 'I-2-L1', 200, 0.00, NULL, NULL),
(101, 'I-2-L2', 200, 0.00, NULL, NULL),
(102, 'I-2-L3', 200, 0.00, NULL, NULL),
(103, 'I-3-L1', 200, 0.00, NULL, NULL),
(104, 'I-3-L2', 200, 0.00, NULL, NULL),
(105, 'I-3-L3', 200, 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restock_request`
--

CREATE TABLE `restock_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_weight` decimal(8,2) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rack_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `floor_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_stock`
--

CREATE TABLE `return_stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `return_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `receive_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_stock_pivot`
--

CREATE TABLE `return_stock_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `return_stock_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Leonal Sigar Anak Jame', 'leoznalz@gmail.com', NULL, '$2y$10$PxPfYA4XD.RLFF/irLqP..YHmcHi67W6TeT6Km0aWey55cNK9G7Bm', '1', NULL, '2023-07-20 18:23:19', '2023-07-20 18:23:19'),
(2, 'admin', 'admin@arkod.com.my', NULL, '$2y$10$QwSyg4TsKCMqjcWcVTqbVewwXXcVvQw5RjUIkKhDiBtmczbBHthA.', '1', NULL, '2023-07-20 18:33:44', '2023-07-20 18:33:44'),
(3, 'testing', 'testing@arkod.com.my', NULL, '$2y$10$4O5U1k/YaFSRbR7TsdvZ/OxYq1wzp77SWxAbfGeuC5nOT5X0pLgOG', '3', NULL, '2023-07-20 18:35:49', '2023-07-20 18:35:49'),
(4, 'Einstein', 'ek@ek.com', NULL, '$2y$10$MpdynnSk1..LbM1H6M9V8OeuaPKC4/j07aFxIiXdu/DA3BChEjCJa', '1', NULL, '2023-07-20 23:09:36', '2023-07-20 23:09:36'),
(5, 'Ryan Giggs', 'rockgiggs11@gmail.com', NULL, '$2y$10$TpsEMNFq3rqcJ54WYy1FK.emn10IJZ96/HIugXz3jfBYK5rCUfspi', '3', NULL, '2023-07-22 23:40:55', '2023-07-22 23:40:55'),
(6, 'LEX', 'arkod202079@aol.com', NULL, '$2y$10$iX5czT/qVAGbBkXM2gEKF.5GqygnR4Um7Dyu3nCRIrHNr6tzzwmb.', '3', NULL, '2023-07-23 23:46:28', '2023-07-23 23:46:28'),
(7, 'Bur', 'bur@bur.com', NULL, '$2y$10$wGUMRaFQ7jLeWnkxUZsmNukJrtVzEx1d7bQqkc3BlH4lkz4wPr1TW', '2', NULL, '2023-07-23 23:56:17', '2023-07-23 23:56:17'),
(8, 'myname', 'myname@myname.com', NULL, '$2y$10$2ugMqQhkWqbBZFB.XAhGcuztxkBd2i4wmyZ2fYrogr9QFBbVqnhpu', '3', NULL, '2023-07-27 01:25:45', '2023-07-27 01:25:45'),
(9, 'Leonal2', 'leonalsigar57@gmail.com', NULL, '$2y$10$usxauK6wzy5XTFwu/h0diuootPMsho9rxF7zb8jOTNhX.1TfSGetu', '3', NULL, '2023-07-31 17:40:56', '2023-07-31 17:40:56'),
(10, 'Justin Picker 1', 'leo69nal@gmail.com', NULL, '$2y$10$ZSQote7BzVAde4QDA1OaZ.Lz.r2suP2pjbl4bgzjfQ8ll/Inz9g5u', '2', NULL, '2023-07-31 18:20:03', '2023-07-31 18:20:03'),
(11, 'BP', 'ark479210@gmail.com', NULL, '$2y$10$MqYGJWc57smNWO0ynFMbQ.rt.Ie3siXaYKVtH4FnIwAQMNBaygFaG', '3', NULL, '2023-07-31 22:59:16', '2023-07-31 22:59:16'),
(12, 'Admin1', 'springlex@arkod.com.my', NULL, '$2y$10$uMhO8V5wCvBAxjuPpyIALOS9ZlmecF141kY6SBYMRjQCYqfKuLGYO', '1', NULL, '2023-08-01 17:27:51', '2023-08-01 17:27:51'),
(13, 'lepicker', 'picker@ek.com', NULL, '$2y$10$.ltkVspaJ4fkrVCz.c2t4OrCrZoY4pUSVucsgdjYJvpwpW5e5wWnS', '2', NULL, '2023-08-01 21:48:19', '2023-08-01 21:48:19'),
(14, 'Syafiq', 'syafiq@mail.com', NULL, '$2y$10$JOsCxmgRLv9D7ozi0cUPCuuAxkuqUpN0G9DNwV2hfwK.b5i9.7f8a', '3', NULL, '2023-08-07 05:38:36', '2023-08-07 05:38:36'),
(15, 'Admin Syafiq', 'adminsyafiq@mail.com', NULL, '$2y$10$sz8lYAWN719QdTUMbyCsXuDrcU40ZZnvZOlmIrNV6Ud18olmUTQ6.', '1', NULL, '2023-08-07 06:17:32', '2023-08-07 06:17:32'),
(16, 'abangjnt', 'abangjnt@gmail.com', NULL, '$2y$10$D6NduMy0ZGYo/XIUXDI8guk4h1Lb6VYuBTkqXHx9iZVNVP3MSzoTy', '2', NULL, '2023-08-22 22:24:16', '2023-08-22 22:24:16'),
(17, 'Asyraf Malek', 'asyrafmalek66@gmail.com', NULL, '$2y$10$PQMyRPs6DuNtPc/xa2itGuNzP8gB..7UiZL53VDcZ4QiJg.8kwLjq', '3', NULL, '2023-08-24 17:11:15', '2023-08-24 17:11:15'),
(18, 'Connie Wong', 'conniew@ylm.com.my', NULL, '$2y$10$X9/7x2.haDPekfFz9owIb.JcAzfehXjBiOjpuKFQe68k9pJ6Z2Ji2', '3', NULL, '2024-01-08 06:04:12', '2024-01-08 06:04:12'),
(25, 'test', 'test@gmail.com', NULL, '$2y$10$lA6/lHzVerP/eq.1POEv5OrWMtmmFLHEd3an1h/2tDdjDFe/hD3yq', '3', NULL, '2024-05-28 17:57:33', '2024-05-28 17:57:33'),
(26, 'Laptop', 'jj@gmail.com', NULL, '$2y$10$XFPKdGof3jT/xh93BDEmsec3hNtaHoB.j/HbYm7/wKhe8RTKu/KBq', '3', NULL, '2024-06-10 18:41:45', '2024-06-10 18:41:45'),
(30, 'Drinking Water', 'water@gmail.com', NULL, '$2y$10$KcQLFjetktZbJXyGIXdOvu610ypErHFSh1FqKmA/YdSh2l.ADFMli', '3', NULL, '2024-06-24 00:50:15', '2024-06-24 00:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_reports`
--

CREATE TABLE `weekly_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `week_number` smallint(5) UNSIGNED NOT NULL,
  `total_inflow_quantity` int(10) UNSIGNED NOT NULL,
  `total_outflow_quantity` int(10) UNSIGNED NOT NULL,
  `net_change_quantity` int(10) UNSIGNED NOT NULL,
  `remaining_quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `weight_of_product` double(8,2) NOT NULL,
  `rack_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `floor_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `weight_of_product`, `rack_id`, `product_id`, `created_at`, `updated_at`, `floor_id`) VALUES
(103, 1890.00, NULL, 1, '2024-02-04 11:39:30', '2024-02-04 11:39:30', 1),
(106, 630.00, NULL, 2, '2024-02-04 16:06:48', '2024-02-04 16:06:48', 1),
(108, 238.00, NULL, 4, '2024-02-04 16:27:52', '2024-02-04 16:27:52', 4),
(109, 540.00, NULL, 3, '2024-02-04 16:31:22', '2024-02-04 16:31:22', 11),
(110, 500.00, NULL, 5, '2024-02-04 16:36:12', '2024-02-04 16:36:12', 11),
(111, 370.00, NULL, 6, '2024-02-04 16:40:14', '2024-02-04 16:40:14', 3),
(112, 1730.00, NULL, 7, '2024-02-04 16:48:34', '2024-02-04 16:48:34', 3),
(113, 2100.00, NULL, 8, '2024-02-04 16:53:21', '2024-02-04 16:53:21', 4),
(114, 1890.00, NULL, 9, '2024-02-04 17:08:27', '2024-02-04 17:08:27', 21),
(115, 2100.00, NULL, 10, '2024-02-04 17:11:31', '2024-02-04 17:11:31', 22),
(116, 2100.00, NULL, 11, '2024-02-04 17:14:37', '2024-02-04 17:14:37', 23),
(117, 2100.00, NULL, 12, '2024-02-04 17:18:32', '2024-02-04 17:18:32', 24),
(118, 800.00, NULL, 13, '2024-02-04 17:22:28', '2024-02-04 17:22:28', 25),
(119, 111.00, NULL, 14, '2024-02-04 17:24:53', '2024-02-04 17:24:53', 26),
(120, 107.00, NULL, 15, '2024-02-04 17:27:59', '2024-02-04 17:27:59', 26),
(121, 187.00, NULL, 16, '2024-02-04 17:30:40', '2024-02-04 17:30:40', 27),
(122, 901.00, NULL, 20, '2024-02-04 17:32:37', '2024-02-04 17:32:37', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_quantity_id_foreign` (`quantity_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_delivery_users_id` (`user_id`);

--
-- Indexes for table `delivery_product`
--
ALTER TABLE `delivery_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floor_locations`
--
ALTER TABLE `floor_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_rack_id_foreign` (`rack_id`),
  ADD KEY `orders_company_id_foreign` (`company_id`),
  ADD KEY `orders_delivery_id_foreign` (`order_no`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UID` (`uid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickers`
--
ALTER TABLE `pickers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pickers_user_id_foreign` (`user_id`),
  ADD KEY `pickers_rack_id_foreign` (`rack_id`),
  ADD KEY `pickers_return_stock_id_foreign` (`return_stock_id`),
  ADD KEY `pickers_delivery_id_foreign` (`order_no`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `pickups`
--
ALTER TABLE `pickups`
  ADD PRIMARY KEY (`pickup_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_users` (`uid`),
  ADD KEY `fk_products_customers` (`partner_id`);

--
-- Indexes for table `product_request`
--
ALTER TABLE `product_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_companies_id` (`company_id`);

--
-- Indexes for table `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rack_locations`
--
ALTER TABLE `rack_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restock_request`
--
ALTER TABLE `restock_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restock_request_rack_id_foreign` (`rack_id`),
  ADD KEY `restock_request_user_id_foreign` (`user_id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- Indexes for table `return_stock`
--
ALTER TABLE `return_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_user_id_fk` (`user_id`),
  ADD KEY `return_company_id_fk` (`company_id`);

--
-- Indexes for table `return_stock_pivot`
--
ALTER TABLE `return_stock_pivot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_stock_pivot_ibfk_1` (`return_stock_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weekly_reports`
--
ALTER TABLE `weekly_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weekly_reports_company_id_foreign` (`company_id`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weights_rack_id_foreign` (`rack_id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `delivery_product`
--
ALTER TABLE `delivery_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floor_locations`
--
ALTER TABLE `floor_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickers`
--
ALTER TABLE `pickers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pickups`
--
ALTER TABLE `pickups`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_request`
--
ALTER TABLE `product_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `quantities`
--
ALTER TABLE `quantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `rack_locations`
--
ALTER TABLE `rack_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `restock_request`
--
ALTER TABLE `restock_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `return_stock`
--
ALTER TABLE `return_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `return_stock_pivot`
--
ALTER TABLE `return_stock_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `weekly_reports`
--
ALTER TABLE `weekly_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_quantity_id_foreign` FOREIGN KEY (`quantity_id`) REFERENCES `quantities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_product`
--
ALTER TABLE `delivery_product`
  ADD CONSTRAINT `delivery_product_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`order_no`) REFERENCES `delivery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floor_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `rack_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pickers`
--
ALTER TABLE `pickers`
  ADD CONSTRAINT `pickers_delivery_id_foreign` FOREIGN KEY (`order_no`) REFERENCES `delivery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pickers_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floor_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pickers_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `rack_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pickers_return_stock_id_foreign` FOREIGN KEY (`return_stock_id`) REFERENCES `return_stock` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pickers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_request`
--
ALTER TABLE `product_request`
  ADD CONSTRAINT `fk_companies_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restock_request`
--
ALTER TABLE `restock_request`
  ADD CONSTRAINT `restock_request_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floor_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restock_request_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `rack_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restock_request_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `return_stock`
--
ALTER TABLE `return_stock`
  ADD CONSTRAINT `return_company_id_fk` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `return_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `return_stock_pivot`
--
ALTER TABLE `return_stock_pivot`
  ADD CONSTRAINT `return_stock_pivot_ibfk_1` FOREIGN KEY (`return_stock_id`) REFERENCES `return_stock` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weekly_reports`
--
ALTER TABLE `weekly_reports`
  ADD CONSTRAINT `weekly_reports_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `weights`
--
ALTER TABLE `weights`
  ADD CONSTRAINT `weights_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floor_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `weights_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `rack_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
