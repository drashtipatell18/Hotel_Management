-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 05:15 AM
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
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_prefrence`
--

CREATE TABLE `additional_prefrence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_prefrence`
--

INSERT INTO `additional_prefrence` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Pool View', '1725855405_best-hotels-terceira-island.jpeg,1725855405_csm_hotel-fernblick-montafon_pool-cs_116_1dc5e102c4.jpg,1725855405_revato-1752080-12610748-122737.jpg', '2024-09-08 22:46:45', '2024-09-08 22:46:45', NULL),
(7, 'Sky View', '1725855528_Skyview_Entrance.jpg,1725855528_Skyview_Hotel_Building.jpg,1725855528_Skyview-Corporate-Park-2_4272_20170916_003.jpg', '2024-09-08 22:48:48', '2024-09-08 22:48:48', NULL),
(8, 'Garden View', '1725855655_087269a_hb_ba_014.jpg,1725855655_Garden-Terrace-View-Sofitel-Legend-The-Grand-Amsterdam-Prestigious-Venues.jpg,1725855655_HOTEL-BOUTIQUE-EN-MALAGA-ENCANTO-INSTALACIONES-JARDIN-PISCINA.jpg', '2024-09-08 22:50:55', '2024-09-08 22:50:55', NULL),
(9, 'City View', '1725855735_ju_dlsvnvn.jpg', '2024-09-08 22:52:15', '2024-09-08 22:52:15', NULL),
(10, 'Pet Stay', '1725855842_images (2).jpg,1725855842_MWP-174-1200x600.jpg', '2024-09-08 22:54:02', '2024-09-08 23:52:06', NULL),
(11, '22', ',1725859964_Garden-Terrace-View-Sofitel-Legend-The-Grand-Amsterdam-Prestigious-Venues.jpg', '2024-09-08 23:26:57', '2024-09-09 00:02:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Air Conditioning', '589434763.png', 'Air Conditioning', '2024-10-17 23:33:56', '2024-10-18 00:27:45', NULL),
(2, 'Slippers', '904103919.png', 'Slippers', '2024-10-17 23:34:32', '2024-10-17 23:43:37', NULL),
(3, 'Shampoo', '56900116.png', 'Shampoo', '2024-10-17 23:35:57', '2024-10-17 23:43:52', NULL),
(4, 'Pet Friendly', '1528916677.png', 'Pet Friendly', '2024-10-17 23:36:09', '2024-10-17 23:43:59', NULL),
(5, 'Cable TV', '774068526.png', 'Cable TV', '2024-10-17 23:36:21', '2024-10-17 23:44:07', NULL),
(6, 'Towels', '1762041525.png', 'Towels', '2024-10-17 23:36:31', '2024-10-17 23:44:13', NULL),
(7, 'Safe Box', '1990041050.png', 'Safe Box', '2024-10-17 23:36:42', '2024-10-17 23:44:20', NULL),
(8, 'Welcome Drinks', '662369726.png', 'Welcome Drinks', '2024-10-17 23:36:55', '2024-10-17 23:44:28', NULL),
(9, 'Wi-Fi & Internet', '105216962.png', 'Wi-Fi & Internet', '2024-10-17 23:37:11', '2024-10-17 23:44:39', NULL),
(10, 'Hair Dryer', '1086105052.png', 'Hair Dryer', '2024-10-17 23:37:25', '2024-10-17 23:44:47', NULL),
(11, 'Espresso Machine', '1563881111.png', 'Espresso Machine', '2024-10-17 23:37:39', '2024-10-17 23:44:55', NULL),
(12, 'Inroom Refrigerator', '219139718.png', 'Inroom Refrigerator', '2024-10-17 23:37:50', '2024-10-17 23:45:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `room_type_id` bigint(20) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `room_count` int(11) DEFAULT NULL,
  `member_count` int(11) DEFAULT NULL,
  `floor_id` bigint(20) DEFAULT NULL,
  `ac_non_ac` varchar(255) DEFAULT NULL,
  `bed_count` int(11) DEFAULT NULL,
  `total_room_input` int(11) DEFAULT NULL,
  `rent` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_cost_input` int(11) DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `total_numbers` int(11) DEFAULT NULL,
  `booking_date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `check_in_date` varchar(255) DEFAULT NULL,
  `check_in_time` varchar(255) DEFAULT NULL,
  `check_out_date` varchar(255) DEFAULT NULL,
  `check_out_time` varchar(255) DEFAULT NULL,
  `total_hours` float DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('confirmed','cancelled') NOT NULL DEFAULT 'confirmed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `final_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `room_type_id`, `room_number`, `room_count`, `member_count`, `floor_id`, `ac_non_ac`, `bed_count`, `total_room_input`, `rent`, `discount`, `total_cost_input`, `total_cost`, `total_numbers`, `booking_date`, `time`, `check_in_date`, `check_in_time`, `check_out_date`, `check_out_time`, `total_hours`, `email`, `phone_number`, `coupon_code`, `message`, `status`, `created_at`, `updated_at`, `deleted_at`, `room_id`, `final_price`) VALUES
(1, '75', 1, '20002', 3, 1, 1, 'AC', NULL, 3000, 1000, 4, 2880, 0, NULL, '2024-11-04 05:11:09', NULL, '2024-11-04', '10:52:00', '2024-11-14', '10:52:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-03 23:52:09', '2024-11-03 23:52:09', NULL, 1, NULL),
(2, '75', 1, '20002', 1, 1, 1, 'AC', NULL, 1000, 1000, 4, 960, 0, NULL, '2024-11-04 05:11:46', NULL, '2024-11-04', '10:55:00', '2024-11-15', '10:55:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-03 23:55:46', '2024-11-03 23:55:46', NULL, 1, NULL),
(3, '75', 1, '20002', 6, 1, 1, 'AC', NULL, 6000, 1000, 4, 5760, 0, NULL, '2024-11-04 05:11:33', NULL, '2024-11-04', '11:04:00', '2024-11-07', '11:04:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-04 00:04:33', '2024-11-04 00:04:33', NULL, 1, NULL),
(4, '75', 1, '20002', 2, 1, 1, 'AC', NULL, 2000, 1000, 4, 1920, 0, NULL, '2024-11-04 05:11:11', NULL, '2024-11-04', '11:07:00', '2024-11-14', '11:07:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-04 00:07:11', '2024-11-04 00:07:11', NULL, 1, NULL),
(5, '75', 1, '20002', 5, 1, 1, 'AC', NULL, 5000, 1000, 4, 4800, 0, NULL, '2024-11-04 09:11:33', NULL, '2024-11-04', '15:05:00', '2024-11-23', '15:05:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-04 04:05:33', '2024-11-04 04:05:33', NULL, 1, NULL),
(6, '75', 1, '20002', 3, 1, 1, 'AC', NULL, 3000, 1000, 4, 2880, 0, NULL, '2024-11-05 03:11:09', NULL, '2024-11-05', '08:46:00', '2024-11-27', '08:46:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-04 21:47:09', '2024-11-04 21:47:09', NULL, 1, NULL),
(7, '75', 1, '20002', 4, 1, 1, 'AC', NULL, 4000, 1000, 78, 3840, 0, NULL, '2024-11-05 09:11:38', NULL, '2024-11-05', '15:13:00', '2024-11-24', '15:13:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-05 04:13:38', '2024-11-05 04:15:09', NULL, 1, 3762),
(8, '75', 1, '20002', 4, 4, 1, 'AC', NULL, 4000, 1000, 1306, 3840, 0, NULL, '2024-11-05 10:11:33', NULL, '2024-11-05', '15:30:00', '2024-11-07', '15:30:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-05 04:30:33', '2024-11-05 04:31:49', NULL, 1, 2534),
(9, '75', 1, '20002', 3, 4, 1, 'AC', NULL, 3000, 1000, 4, 2880, 0, NULL, '2024-11-05 10:11:58', NULL, '2024-11-05', '15:33:00', '2024-11-06', '17:35:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-05 04:33:58', '2024-11-05 04:33:58', NULL, 1, NULL),
(10, '75', 3, '2001', 6, 4, 2, 'AC', NULL, 42000, 7000, 45, 40320, 0, NULL, '2024-11-05 10:11:35', NULL, '2024-11-05', '15:37:00', '2024-11-20', '15:37:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-05 04:37:35', '2024-11-05 04:38:59', NULL, 2, 40275),
(11, '75', 1, '20002', 3, 6, 1, 'AC', NULL, 3000, 1000, 78, 2880, 0, NULL, '2024-11-05 10:11:52', NULL, '2024-11-05', '15:50:00', '2024-11-21', '17:52:00', NULL, NULL, NULL, NULL, NULL, 'confirmed', '2024-11-05 04:50:52', '2024-11-05 04:52:34', NULL, 1, 2802),
(12, '75', 3, '2001', 5, 1, 2, 'AC', NULL, 35000, 7000, 78, 33600, 0, NULL, '2024-11-06 03:11:08', NULL, '2024-11-06', '08:55:00', '2024-11-21', '08:55:00', NULL, NULL, NULL, 'ABC', NULL, 'confirmed', '2024-11-05 21:56:08', '2024-11-05 21:58:17', NULL, 2, 33522);

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `buling_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cardholder_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `captcha` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `dob`, `house_no`, `buling_name`, `country`, `state`, `city`, `cardholder_name`, `card_number`, `expiry_date`, `cvv`, `total_price`, `status`, `created_at`, `updated_at`, `room_id`, `booking_id`, `captcha`, `coupon_code`) VALUES
(1, 75, 'Dhruvish', 'Sorathiya', 'dhruvish.kalathiyainfotech@gmail.com', '8141233650', '2024-11-05', 'dd', 'ddd', 'IN', 'AN', 'Nicobar', 'DhruvishPatel', '1234567890123456', '02/22', '123', '2876', 'pending', '2024-11-05 04:34:30', '2024-11-05 04:34:30', 1, 9, 'rrbt', NULL),
(2, 75, 'Dhruvish', 'Sorathiya', 'dhruvish.kalathiyainfotech@gmail.com', '8141233650', '2024-11-03', 'w', 'ww', 'IN', 'DL', NULL, 'ww', 'www', '02/22', '123', '40275', 'pending', '2024-11-05 04:40:52', '2024-11-05 04:40:52', 2, 10, 'yhbp', 'ddd'),
(3, 75, 'Dhruvish', 'Sorathiya', 'dhruvish.kalathiyainfotech@gmail.com', '8141233650', '2024-11-02', '409', 'Dhanmora', 'IN', 'DL', NULL, 'Dhruvish', '1234567890123456', '02/22', '123', '33522', 'pending', '2024-11-05 22:01:25', '2024-11-05 22:01:25', 2, 12, 'a7n8', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `client_reviews`
--

CREATE TABLE `client_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_reviews`
--

INSERT INTO `client_reviews` (`id`, `client_name`, `image`, `description`, `country`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test', '825613314.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\"', 'India', 'Karnataka', '2024-10-01 06:16:15', '2024-10-04 07:07:50', NULL),
(2, 'Demo', '887578828.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\"', 'Bahamas', 'Bimini', '2024-10-01 06:16:41', '2024-10-04 07:08:11', NULL),
(3, 'Drive', '2027177470.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\"', 'Zimbabwe', 'Bulawayo', '2024-10-01 06:17:04', '2024-10-04 07:08:17', NULL),
(4, 'dwwdd', '1144091038.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\"', 'Bahrain', 'Sitrah', '2024-10-01 06:17:25', '2024-10-04 07:08:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Jenish Kankotiya', 'jenish@gmail.com', 'Metting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, NULL),
(3, 'Dhruvish', 'dhruvish@gmail.com', 'Time Pass', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL),
(4, 'Virag', 'virag@gmail.com', 'Paragraph', 'Where can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL, NULL),
(5, 'ww', 'dddef', 'dddef', 'ewfwef', '2024-10-08 05:13:21', '2024-10-08 05:13:21'),
(6, 'Scott Anderson', 'Et blanditiis volupt', 'Et blanditiis volupt', 'Voluptatum non quasi', '2024-10-08 05:15:10', '2024-10-08 05:15:10'),
(8, 'Maisie Buck', 'Voluptatem Dolor am', 'Voluptatem Dolor am', 'Repellendus Molesti', '2024-10-08 05:26:51', '2024-10-08 05:26:51'),
(9, 'Signe Duncan', 'Do quo aut expedita', 'Do quo aut expedita', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2024-10-08 05:37:47', '2024-10-08 05:37:47'),
(10, 'jenish', 'Title', 'Title', 'mjsdkdkd', '2024-11-05 22:37:38', '2024-11-05 22:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('fixed','percentage') NOT NULL DEFAULT 'fixed',
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `max_uses` int(11) NOT NULL DEFAULT 1,
  `starts_at` date DEFAULT NULL,
  `expires_at` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `code`, `name`, `description`, `image`, `type`, `discount_amount`, `max_uses`, `starts_at`, `expires_at`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'ABC', 'Diwali', 'ddjq', '1730863526.png', 'fixed', 78.00, 25, '2024-11-05', '2024-11-14', 1, NULL, '2024-11-04 23:34:25', '2024-11-05 21:55:26'),
(2, 1, 'BNHJ', 'Naratry', 'wee', '1730863539.png', 'percentage', 789.00, 56, '2024-11-05', '2024-11-14', 1, NULL, '2024-11-04 23:34:48', '2024-11-05 21:55:39'),
(3, 1, 'KLK', 'kdkd', 'kdkdk', '1730863548.jpg', 'percentage', 34.00, 67, '2024-11-05', '2024-11-14', 1, NULL, '2024-11-04 23:37:46', '2024-11-05 21:55:48'),
(4, 1, 'www', 'ddddd', 'ccc', NULL, 'fixed', 56.00, 90, '2024-11-05', '2024-11-29', 1, NULL, '2024-11-04 23:38:04', '2024-11-04 23:38:04'),
(5, 1, 'ddd', 'ddd', 'ddd', '1730797792.png', 'fixed', 45.00, 9, '2024-11-05', '2024-11-24', 1, NULL, '2024-11-04 23:38:25', '2024-11-05 03:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_usages`
--

INSERT INTO `coupon_usages` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `coupon_id`) VALUES
(1, 75, '2024-11-05 21:58:17', '2024-11-05 21:58:17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `total_numbers` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `depature_date` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ph_number` varchar(255) DEFAULT NULL,
  `fileupload` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `aadharcard` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `lname`, `country`, `state`, `city`, `room_type`, `total_numbers`, `date`, `time`, `arrival_date`, `depature_date`, `email`, `ph_number`, `fileupload`, `address`, `gender`, `aadharcard`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 75, 'Dhruvish', 'Sorathiya', 'IN', 'DL', 'South Delhi', NULL, NULL, '2024-11-05', NULL, NULL, NULL, 'dhruvish.kalathiyainfotech@gmail.com', '8141233650', '1730697914_1729741348_the-day-is-marked-with-an-array-of-messages-that-encapsulate-patriotism.jpg', 'Dhanmora Katargam', NULL, NULL, 'active', '2024-11-03 23:51:33', '2024-11-03 23:56:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `hotel_id`, `event_image`, `event_name`, `start_date`, `start_time`, `end_date`, `end_time`, `total_hours`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1722506100_the-day-is-marked-with-an-array-of-messages-that-encapsulate-patriotism.jpg', 'Independence Day', '2024-08-02', '17:14', '2024-08-02', '21:18', '4.07', 'Nice Work', 'active', '2024-08-01 03:12:08', '2024-08-01 04:25:00', NULL),
(4, 2, '1722506115_1_na_1q7Las_PtzmJGxztuJQ.jpg', 'Kite Festival', '2024-08-01', '14:50', '2024-08-01', '18:54', '4.07', 'Please all member join in time', 'active', '2024-08-01 03:50:53', '2024-08-01 04:25:15', NULL),
(5, 2, '1722506187_full-length-portrait-traditional-santa-claus-putting-presents-christmas-tree-copy-space-min.jpg', 'Christmas', '2024-08-02', '16:26', '2024-08-02', '17:26', '1.00', 'Very Amazing Theme', 'active', '2024-08-01 04:26:27', '2024-08-01 04:26:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `image`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Restaurant', '1728474241_a3f877f20da02b1a9b619ed4a82a065e.jpg,1728474241_aa1.jpg', 'Once you try it, You will Love it.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnalaboris nisi ut aliquip exLorem ipsum dolor sit.', '2024-10-01 06:59:45', '2024-10-14 01:44:58', NULL),
(2, 'Casino', '1728474502_1679880757083.png,1728474502_a3f877f20da02b1a9b619ed4a82a065e.jpg,1728474502_aa1.jpg', 'Fun and entertainment inside', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnalaboris nisi ut aliquip exLorem ipsum dolor sit.', '2024-10-01 07:00:06', '2024-10-09 06:18:55', NULL),
(3, 'Spa', '1730203017_sce3_1.png,1730203017_sce3_2.png,1730690616_3-14.png', 'Refreshment for the Body and Mind', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi ut aliquip ex ea commodo consequat.', '2024-10-01 07:01:02', '2024-11-03 21:53:36', NULL),
(4, 'Indoor Pool', '1728388830_sec5_1.png,1728388830_sec5_2.png,1728448254_4.jpg', 'Elevate your pool experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnalaboris nisi ut aliquip exLorem ipsum dolor sit.', '2024-10-01 07:01:38', '2024-10-08 23:00:54', NULL),
(5, 'Bar', '1730690594_360_F_324739203_keeq8udvv0P2h1MLYJ0GLSlTBagoXS48.jpg', 'Bar', 'Bar', '2024-10-01 07:02:16', '2024-11-03 21:53:14', NULL),
(10, 'Fitness Center', '1728471323_revato-1752080-12610748-122737.jpg,1728471323_roomSec1.png,1728471323_sec4_3.png,1728471572_Garden-Terrace-View-Sofitel-Legend-The-Grand-Amsterdam-Prestigious-Venues.jpg,1728471572_hall.png', 'Fitness Center', 'Fitness Center', '2024-10-04 02:37:31', '2024-10-09 06:20:07', NULL);

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
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `floor_name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'First Floor', 'First Floor', '2024-07-26 07:01:28', '2024-07-26 07:01:28', NULL),
(2, 'Second Floor', 'Second Floor', '2024-07-26 07:14:12', '2024-07-26 07:14:12', NULL),
(3, 'Third Floor', 'Third Floor', '2024-07-26 07:14:21', '2024-07-26 07:14:21', NULL),
(4, 'Four Floor', 'Four Floor', '2024-07-26 07:14:35', '2024-07-26 07:14:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `food_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food_name`, `description`, `food_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Welcome Drink', 'Nice', '1150613966.png', '2024-07-29 22:24:42', '2024-08-24 06:26:40', NULL),
(2, 'Soft Drink', 'Good', '1722311764_bottles-of-global-soft-drink-brands-2HNMMGP.jpg', '2024-07-29 22:26:04', '2024-07-29 22:26:04', NULL),
(3, 'Break fast', 'Very Yummy', '1722311820_pexels-jjagtenberg-103124.jpg', '2024-07-29 22:27:00', '2024-07-29 22:27:00', NULL),
(4, 'Lunch', 'Vey Tasty', '1722311860_pexels-chanwalrus-958545.jpg', '2024-07-29 22:27:41', '2024-07-29 22:27:41', NULL),
(5, 'Lunch-Dinner', 'Very good Combination', '1722311907_a3f877f20da02b1a9b619ed4a82a065e.jpg', '2024-07-29 22:28:27', '2024-07-29 22:28:27', NULL),
(6, 'Dinner', 'Nice', '1722311950_medium-overhead-shot-of-families-sharing-dinner-at-royalty-free-image-1690401358.jpg', '2024-07-29 22:29:10', '2024-07-29 22:29:10', NULL),
(7, 'Free Food', 'Very nice', '1722312049_35117-7-pepperoni-pizza-transparent.jpeg', '2024-07-29 22:30:49', '2024-07-29 22:30:49', NULL),
(8, 'miku', 'dsdsdsdsd', '1755510791.jpg', '2024-07-29 22:39:00', '2024-07-29 22:42:20', '2024-07-29 22:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `halltype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hall_number` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('avaliable','notavaliable') NOT NULL DEFAULT 'avaliable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `floor_id`, `halltype_id`, `hall_number`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 56789, 'yy', 'avaliable', '2024-08-01 06:14:53', '2024-08-30 23:34:25', NULL),
(2, 2, 2, 67, 'hhh', 'notavaliable', '2024-08-01 06:17:55', '2024-08-30 23:34:26', NULL),
(3, 3, 3, 678, 'jjj', 'notavaliable', '2024-08-01 06:18:06', '2024-08-30 23:34:26', NULL),
(4, 4, 4, 6789, 'jjj', 'avaliable', '2024-08-01 06:18:15', '2024-08-01 06:19:05', '2024-08-01 06:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `halltypes`
--

CREATE TABLE `halltypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `halltype_name` varchar(255) NOT NULL,
  `halltype_image` varchar(255) NOT NULL,
  `halltype_capacity` varchar(255) NOT NULL,
  `base_price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('avaliable','notavaliable') NOT NULL DEFAULT 'avaliable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halltypes`
--

INSERT INTO `halltypes` (`id`, `halltype_name`, `halltype_image`, `halltype_capacity`, `base_price`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dining hall', '1722506606_latest-dining-hall-ceiling-designs-for-your-home.jpg', '300', '23000', 'Amazing Hall', 'avaliable', '2024-08-01 04:33:26', '2024-09-10 23:25:03', NULL),
(2, 'Metting Hall', '1722506685_20201008-199WaterSt-2_v1-scaled.jpg', '20', '25000', 'Good', 'avaliable', '2024-08-01 04:34:45', '2024-09-10 23:25:04', NULL),
(3, 'Religious halls', '1722506772_aa1.jpg', '300', '5200', 'Amazing Hall', 'notavaliable', '2024-08-01 04:36:12', '2024-09-10 23:25:05', NULL),
(4, 'Residence hall', '1722506859_Residence-Life_Strickland_03-2020-1200x675.jpg', '502', '12000', 'looking gorgeous', 'avaliable', '2024-08-01 04:37:39', '2024-08-01 04:38:05', NULL),
(5, 'demo', '1722506912_close-up-portrait-of-smiling-handsome-young-caucasian-man-face-looking-at-camera-on-isolated-light-gray-studio-background-photo.jpg', '2', '34', 'ddsdd', 'avaliable', '2024-08-01 04:38:32', '2024-08-01 04:38:35', '2024-08-01 04:38:35'),
(6, 'test', '1722514678_pexels-chanwalrus-958545.jpg', '3', '23', 'dd', 'avaliable', '2024-08-01 06:47:58', '2024-08-01 06:48:01', '2024-08-01 06:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `address`, `phone`, `email`, `stars`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aether Haven', 'Good', 7896541230, 'haven@gmail.com', 5, 'active', '2024-07-29 06:11:00', '2024-08-30 23:32:10', NULL),
(2, 'Beachfront Bliss', 'Nice', 8523697410, 'bliss@gmail.com', 3, 'active', '2024-07-29 06:11:31', '2024-08-30 23:32:11', NULL),
(3, 'Palm Paradise', 'Very good', 8521479645, 'palm@gmail.com', 2, 'active', '2024-07-29 06:11:59', '2024-08-30 23:32:12', NULL),
(4, 'ddd', 'dd', 9879831225, 'dd@gmail.com', 3, 'active', '2024-08-14 00:21:52', '2024-09-03 22:03:29', NULL),
(5, 'ddd', 'dsdsdsddsd', 8141233650, 'ddddd@gmail.com', 3, 'active', '2024-08-14 00:25:06', '2024-09-03 22:03:30', NULL),
(6, 'weww', 'ffff', 7894561230, 'ewee@gmail.com', 3, 'inactive', '2024-08-14 00:59:29', '2024-08-30 23:32:13', NULL),
(7, 'ddd', 'dddd', 1234567890, 'dd@gmail.com', 3, 'inactive', '2024-08-14 01:00:57', '2024-08-30 23:32:13', NULL),
(8, 'dfdffd', 'ddd', 1234567890, 'fdf@gmail.com', 2, 'active', '2024-08-14 01:02:09', '2024-10-08 06:59:53', NULL),
(9, 'dsdds', 'adasdadadas', 7894563210, 'dsd@gmail.com', 3, 'active', '2024-08-14 03:13:59', '2024-10-08 06:59:53', NULL),
(10, 'rffwe', '342342', 2213131313, 'wfwefwefwefef@gmail.com', 3434234, 'active', '2024-08-30 23:27:26', '2024-09-10 23:39:58', NULL),
(11, 'Brianna Potts', 'Eiusmod adipisicing', 4561230789, 'vase@mailinator.com', 44, 'active', '2024-08-30 23:27:45', '2024-10-08 06:59:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_amenity`
--

CREATE TABLE `hotel_amenity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_amenity`
--

INSERT INTO `hotel_amenity` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '24- Hour Front Deskwww', '1116346922.svg', '24- Hour Front Desk', '2024-10-18 00:18:25', '2024-10-18 00:39:19', NULL),
(2, 'Indoor Pool', '59791342.svg', 'Indoor Pool', '2024-10-18 00:20:31', '2024-10-18 00:39:25', NULL),
(3, 'Fitness Center', '395738700.svg', 'Fitness Center', '2024-10-18 00:20:45', '2024-10-18 00:39:31', NULL),
(4, 'Spa & Salon', '971922279.svg', 'Spa & Salon', '2024-10-18 00:22:32', '2024-10-18 00:39:37', NULL),
(5, 'High-Speed Wi-Fi', '218112231.svg', 'High-Speed Wi-Fi', '2024-10-18 00:22:44', '2024-10-18 00:39:45', NULL),
(6, 'Parking', '1434888208.svg', 'Parking', '2024-10-18 00:22:56', '2024-10-18 00:39:53', NULL),
(7, 'EV Charging', '651816537.svg', 'EV Charging', '2024-10-18 00:23:07', '2024-10-18 00:40:00', NULL),
(8, 'Accessibility', '1946831978.svg', 'Accessibility', '2024-10-18 00:23:18', '2024-10-18 00:40:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_images`
--

CREATE TABLE `hotel_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hotel_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_images`
--

INSERT INTO `hotel_images` (`id`, `hotel_id`, `hotel_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 8, '1723625671_leela-palace-g.jpg', '2024-08-14 03:24:31', '2024-08-14 03:24:31', NULL),
(30, 10, '1725080246_1.jpg', '2024-08-30 23:27:26', '2024-08-30 23:27:26', NULL),
(31, 11, '1726027499_istockphoto-104731717-612x612.jpg', '2024-09-10 22:34:59', '2024-09-10 22:34:59', NULL),
(32, 9, '1728390657_1 (1).png', '2024-10-08 07:00:57', '2024-10-08 07:00:57', NULL),
(33, 1, '1728478528_Bar_and_restaurant_Surat1.jpg', '2024-10-09 07:25:28', '2024-10-09 07:25:28', NULL),
(34, 2, '1728478537_Garden-Terrace-View-Sofitel-Legend-The-Grand-Amsterdam-Prestigious-Venues.jpg', '2024-10-09 07:25:37', '2024-10-09 07:25:37', NULL),
(35, 3, '1728478544_hall.png', '2024-10-09 07:25:44', '2024-10-09 07:25:44', NULL),
(36, 1, '1728478697_Bar_and_restaurant_Surat1.jpg', '2024-10-09 07:28:17', '2024-10-09 07:28:17', NULL),
(37, 1, '1728478697_best-hotels-terceira-island.jpeg', '2024-10-09 07:28:17', '2024-10-09 07:28:17', NULL),
(38, 1, '1728478697_full-length-portrait-traditional-santa-claus-putting-presents-christmas-tree-copy-space-min.jpg', '2024-10-09 07:28:17', '2024-10-09 07:28:17', NULL),
(39, 1, '1728478697_Garden-Terrace-View-Sofitel-Legend-The-Grand-Amsterdam-Prestigious-Venues.jpg', '2024-10-09 07:28:17', '2024-10-09 07:28:17', NULL),
(40, 2, '1728478715_35117-7-pepperoni-pizza-transparent.jpeg', '2024-10-09 07:28:35', '2024-10-09 07:28:35', NULL),
(41, 2, '1728478715_087269a_hb_ba_014.jpg', '2024-10-09 07:28:35', '2024-10-09 07:28:35', NULL),
(42, 2, '1728478715_csm_hotel-fernblick-montafon_pool-cs_116_1dc5e102c4.jpg', '2024-10-09 07:28:35', '2024-10-09 07:28:35', NULL),
(43, 2, '1728478715_HOTEL-BOUTIQUE-EN-MALAGA-ENCANTO-INSTALACIONES-JARDIN-PISCINA.jpg', '2024-10-09 07:28:35', '2024-10-09 07:28:35', NULL),
(44, 2, '1728478715_hotel-twin-bedroom-with-garden-view_wide.jpg', '2024-10-09 07:28:35', '2024-10-09 07:28:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `map_link` longtext DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `map_link`, `address`, `latitude`, `longitude`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'kalathiya infotech', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d464.9570868654145!2d72.8818075!3d21.2057926!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x26cb5e4230fc8877%3A0xd36ccfe485cd6a01!2sKalathiya%20Infotech!5e0!3m2!1sen!2sin!4v1730698866120!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Silver Point, 102-103, Jivanjyot Circle, nr. Savlia Circle, Devidarshan Society, Yoginagar Society, Surat, Gujarat 395010', '21.2147', '72.8887', NULL, '2024-11-03 22:22:16', '2024-11-04 00:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_10_16_234538_create_sequence_tbls_table', 1),
(8, '2021_11_25_222820_create_gena_cus_ids_table', 1),
(9, '2021_11_25_223004_create_sequence_cuses_table', 1),
(10, '2021_12_16_225527_create_room_sequences_table', 1),
(11, '2024_07_22_100422_create_hotel_table', 1),
(12, '2024_07_23_112445_create_amenities_table', 1),
(14, '2024_07_25_051736_create_floors_table', 1),
(19, '2024_07_24_044956_create_room_types_table', 4),
(21, '2024_07_29_051651_create_positions_table', 5),
(23, '2024_07_29_060644_create_staff_table', 6),
(24, '2024_07_25_060953_create_foods_table', 7),
(26, '2024_07_26_120544_create_booking_table', 8),
(27, '2024_07_30_104023_create_price_managers_table', 9),
(30, '2024_08_01_044555_create_events_table', 10),
(33, '2024_08_01_091211_create_halltypes_table', 11),
(34, '2024_08_01_101915_create_hall_table', 12),
(35, '2024_08_14_042427_create_hotel_images_table', 13),
(36, '2021_12_14_225935_create_rooms_table', 14),
(37, '2024_08_29_055940_create_contacts_table', 15),
(38, '2024_08_29_082924_create_room_type_images_table', 16),
(39, '2024_09_04_051029_create_smoking_prefrence_table', 17),
(40, '2024_09_09_033335_create_additional_prefrence_table', 18),
(43, '2024_10_01_033525_create_client_reviews_table', 20),
(44, '2024_09_30_040648_create_facilities_table', 21),
(45, '2024_10_06_162326_create_users_address_table', 22),
(47, '2021_11_23_223955_create_customers_table', 23),
(52, '2024_10_14_104631_create_spas_table', 24),
(53, '2024_10_15_060752_create_spa_check_outs_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `offer_packages`
--

CREATE TABLE `offer_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `offer_include` text DEFAULT NULL,
  `image` text NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `discount_value` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_packages`
--

INSERT INTO `offer_packages` (`id`, `hotel_id`, `title`, `description`, `offer_include`, `image`, `discount_type`, `discount_value`, `start_date`, `end_date`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Doloremque velit rep', 'Qui quos consequat', 'Velit consectetur ea', '1729741229_offer1.png,1729741238_220px-Gym_Cardio_Area.jpg,1729741238_360_F_324739203_keeq8udvv0P2h1MLYJ0GLSlTBagoXS48.jpg', 'Percentage sales', '5', '2024-10-23', '2024-11-24', '1', NULL, '2024-10-23 00:58:35', '2024-10-23 22:10:38'),
(2, 1, 'Et aut ea ea ad rem', 'Sit deserunt neque q', 'Unde dolorem impedit', '1729741338_offer2.png,1729741348_standardroom_1878.jpg,1729741348_the-day-is-marked-with-an-array-of-messages-that-encapsulate-patriotism.jpg', 'Beatae est error sun', '4', '2009-09-30', '2013-06-25', '1', NULL, '2024-10-23 01:05:25', '2024-10-23 22:12:28'),
(3, 9, 'Qui porro veniam pa', 'Incidunt rem evenie', 'Odit sed in atque ad', '1729741371_offer3.png,1729741381_images (2).jpg,1729741381_images.jpg,1729741381_istockphoto-104731717-612x612-1.jpg,1729741381_offer2.png', 'Excepturi possimus', '8', '2024-10-23', '2024-11-29', '1', NULL, '2024-10-23 03:15:28', '2024-10-23 22:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Receptionist', 'Receptionist', '2024-07-29 00:24:34', '2024-07-29 00:33:40', NULL),
(2, 'Hotel Manager', 'Hotel Manager', '2024-07-29 00:24:59', '2024-07-29 00:24:59', NULL),
(3, 'House Keeping', 'House Keeping', '2024-07-29 00:28:24', '2024-07-29 00:28:24', NULL),
(4, 'Food and beverage', 'Food and beverage', '2024-07-29 00:28:41', '2024-07-29 00:28:41', NULL),
(5, 'Sales and Marketing', 'Sales and Marketing', '2024-07-29 00:28:51', '2024-07-29 00:28:51', NULL),
(6, 'Adminstration and support', 'Adminstration and support', '2024-07-29 00:29:06', '2024-07-29 00:29:06', NULL),
(7, 'IT Department', 'Laravel Developer', '2024-07-29 00:35:17', '2024-07-29 00:35:27', '2024-07-29 00:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `price_managers`
--

CREATE TABLE `price_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `monday_price` decimal(8,2) DEFAULT NULL,
  `tuesday_price` decimal(8,2) DEFAULT NULL,
  `wednesday_price` decimal(8,2) DEFAULT NULL,
  `thursday_price` decimal(8,2) DEFAULT NULL,
  `friday_price` decimal(8,2) DEFAULT NULL,
  `saturday_price` decimal(8,2) DEFAULT NULL,
  `sunday_price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_managers`
--

INSERT INTO `price_managers` (`id`, `room_type_id`, `monday_price`, `tuesday_price`, `wednesday_price`, `thursday_price`, `friday_price`, `saturday_price`, `sunday_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 123456.00, 4.00, 4.00, 4.00, 4.00, 4.00, 4.00, '2024-07-30 22:58:11', '2024-07-31 00:23:46', '2024-07-31 00:23:46'),
(2, 2, 893.00, 3.00, 3.00, 3.00, 3.00, 3.00, 3.00, '2024-07-30 22:58:37', '2024-07-31 22:14:52', NULL),
(3, 3, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, '2024-07-30 23:06:03', '2024-07-30 23:06:03', NULL),
(4, 3, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, 8.00, '2024-07-30 23:12:12', '2024-07-30 23:12:12', NULL),
(5, 3, 1.00, 1.00, 8.00, 1.00, 1.00, 1.00, 1.00, '2024-07-30 23:13:01', '2024-07-31 00:23:56', '2024-07-31 00:23:56'),
(6, 2, 1200.00, 2.00, 2.00, 2.00, 2.00, 2.00, 2.00, '2024-07-31 00:01:01', '2024-07-31 00:23:51', '2024-07-31 00:23:51'),
(7, 7, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, '2024-07-31 00:25:37', '2024-07-31 00:25:58', NULL),
(8, 6, 12.00, 12.00, 12.00, 12.00, 12.00, 12.00, 12.00, '2024-07-31 01:40:00', '2024-07-31 22:24:27', '2024-07-31 22:24:27'),
(9, 6, 13.00, 11.00, 12.00, 11.00, 11.00, 13.00, 22.00, '2024-08-24 03:40:37', '2024-08-24 03:40:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `room_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ac_non_ac` varchar(255) DEFAULT NULL,
  `food_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bed_type` varchar(255) DEFAULT NULL,
  `rent` varchar(255) DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `room_size` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `total_member_capacity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `smoking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `view_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `include_suites` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `floor_id`, `room_name`, `room_number`, `room_type_id`, `ac_non_ac`, `food_id`, `bed_type`, `rent`, `phone_number`, `room_size`, `message`, `status`, `from_date`, `to_date`, `total_member_capacity`, `created_at`, `updated_at`, `deleted_at`, `smoking_id`, `view_id`, `offer_id`, `include_suites`) VALUES
(1, 1, 'King Bed, Forest View, Loft Guest Room23', '20002', 1, 'AC', 2, 'King bed', '1000', 8141233650, '80m2', 'ffff', 'active', '2024-11-04', '2024-11-05', 5, '2024-08-29 00:05:03', '2024-11-03 22:28:39', NULL, NULL, NULL, 2, NULL),
(2, 2, 'Queen Bed, City View, Standard Room', '2001', 3, 'AC', 2, 'Queen bed', '7000', 8141233650, '60m2', 'ddd', 'active', '2024-11-05', '2024-11-08', 23, '2024-10-18 22:41:02', '2024-11-03 22:35:00', NULL, 2, 7, 2, NULL),
(3, 2, 'Double Beds, Garden View, Family Suite', '2008', 7, 'AC', 5, 'Queen bed', '5000', 8141233650, '100m2', 'ddd', 'active', '2024-10-23', '2024-10-31', NULL, '2024-09-10 22:41:02', '2024-11-03 22:28:40', NULL, NULL, NULL, 4, NULL),
(6, 1, 'ddd', '12000', 1, 'AC', 1, 'king', '100', 8141233650, '50m2', 'dddd', 'active', '2024-10-21', '2024-10-31', 34, '2024-10-16 06:09:44', '2024-11-03 22:28:40', NULL, 2, 6, NULL, NULL),
(16, 3, 'Lev Leon', '139456', 7, 'NON-AC', 7, 'Double bed', '80000', 9879831225, '100m2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'active', '2024-10-17', '2024-10-27', 12, '2024-10-16 23:58:43', '2024-10-22 05:47:24', NULL, 3, 7, 1, '<p>THTHHDHd</p><p>sdadadhasdadasldd</p><p><strong>\\asdmasdjdkad</strong></p>'),
(18, 1, 'Tiger Cash', '34444', 2, 'NON-AC', 2, 'ffff', '3333', 8141233650, '5', 'ttt', 'active', '2024-10-23', '2024-10-29', 56, '2024-10-19 00:56:32', '2024-10-22 05:48:20', NULL, 3, 8, 1, '<p>ddasddadadadad</p><p>sdasmdjdadadada</p><p>asasndasjdaskdadkadas</p><p><i>aSANSASDAJDASLDASD</i></p><p><strong>ASDASDKDASDASDAD</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_images`
--

CREATE TABLE `rooms_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_images`
--

INSERT INTO `rooms_images` (`id`, `image`, `room_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1729142923_room6.png', 16, '2024-10-16 23:58:43', '2024-10-16 23:58:43', NULL),
(2, '1729142923_room2.png', 16, '2024-10-16 23:58:43', '2024-10-16 23:58:43', NULL),
(3, '1729142923_room7.png', 16, '2024-10-16 23:58:43', '2024-10-16 23:58:43', NULL),
(8, '1729144267_full-length-portrait-traditional-santa-claus-putting-presents-christmas-tree-copy-space-min.jpg', 16, '2024-10-17 00:21:07', '2024-10-17 00:24:15', '2024-10-17 00:24:15'),
(9, '1729144473_hall.png', 16, '2024-10-17 00:24:33', '2024-10-17 00:24:33', NULL),
(10, '1729144473_honeymoon-suite-interior-package-at-our-jungle-house-a-lodge-near-CY0D96.jpg', 16, '2024-10-17 00:24:33', '2024-10-17 00:24:33', NULL),
(11, '1729144473_HOTEL-BOUTIQUE-EN-MALAGA-ENCANTO-INSTALACIONES-JARDIN-PISCINA.jpg', 16, '2024-10-17 00:24:33', '2024-10-17 00:24:33', NULL),
(12, '1729249780_04-07-2024-DhruvishSorathiya.png', 2, '2024-10-18 05:39:40', '2024-10-18 05:39:40', NULL),
(13, '1729249780_04-09-2025.png', 2, '2024-10-18 05:39:40', '2024-10-18 05:39:40', NULL),
(14, '1729249780_04-010-2024.png', 2, '2024-10-18 05:39:40', '2024-10-18 05:39:40', NULL),
(15, '1729249780_05-07-2024_DhruvishSorathiya.png', 2, '2024-10-18 05:39:40', '2024-10-18 05:39:40', NULL),
(16, '1729319192_12-07-2024-Dhruvish-Sorathiya.png', 18, '2024-10-19 00:56:32', '2024-10-19 00:56:32', NULL),
(18, '1729599384_220px-Gym_Cardio_Area.jpg', 3, '2024-10-22 06:46:24', '2024-10-22 06:46:24', NULL),
(19, '1729599384_360_F_324739203_keeq8udvv0P2h1MLYJ0GLSlTBagoXS48.jpg', 3, '2024-10-22 06:46:24', '2024-10-22 06:46:24', NULL),
(20, '1729599384_800px-width-x-600px-height-landscape.jpg', 3, '2024-10-22 06:46:24', '2024-10-22 06:46:24', NULL),
(21, '1729686151_1679880757083.png', 1, '2024-10-23 06:52:31', '2024-10-23 06:52:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_sequences`
--

CREATE TABLE `room_sequences` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `extra_bed` int(11) NOT NULL DEFAULT 0,
  `per_extra_bed_price` int(11) DEFAULT NULL,
  `extra_bed_quantity` int(11) DEFAULT NULL,
  `amenities_id` varchar(255) DEFAULT NULL,
  `base_price` int(11) DEFAULT NULL,
  `extra_bed_price` int(11) DEFAULT NULL,
  `room_image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `room_name`, `description`, `capacity`, `extra_bed`, `per_extra_bed_price`, `extra_bed_quantity`, `amenities_id`, `base_price`, `extra_bed_price`, `room_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Single Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 2, 0, 1200, 2, '2,3,4,5,8,9,10,11', 2000, 4400, '1374917016.singleroom_713511961_1000.jpg', 'active', '2024-07-28 22:33:16', '2024-10-21 02:54:34', NULL),
(2, 'Standard double Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 3, 0, NULL, NULL, '1,2,3,4,5,6,7', 20000, 20000, '2130244282.large_deluxe-double-double.jpg', 'active', '2024-07-28 22:33:46', '2024-10-04 05:54:44', NULL),
(3, 'Junior suite Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 5, 0, NULL, NULL, '14', 1200, 1200, '434184045.hotel-twin-bedroom-with-garden-view_wide.jpg', 'active', '2024-07-28 22:34:09', '2024-10-04 06:47:22', NULL),
(5, 'Executive Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 5, 0, NULL, NULL, '10', 2300, 2300, '410696895.executive-suite-living-room-1920-x-1080_wide.jpg', 'active', '2024-07-28 23:03:18', '2024-10-04 06:47:29', NULL),
(6, 'Honeymoon Suite Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 2, 0, NULL, NULL, '11', 5000, 5000, '278721253.honeymoon-suite-interior-package-at-our-jungle-house-a-lodge-near-CY0D96.jpg', 'active', '2024-07-28 23:03:44', '2024-10-04 06:48:16', NULL),
(7, 'Deluxe Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 3, 1, 300, 2, '1,2,3,4,5,6,7,8', 4000, 4600, '894329167.1679880757083.png', 'active', '2024-07-28 23:04:17', '2024-10-04 06:47:35', NULL),
(15, 'Premium Rooms', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 2, 0, NULL, NULL, '1,2,3,4,5', 1200, 1200, NULL, 'active', '2024-09-30 01:07:32', '2024-10-04 06:47:41', NULL),
(16, 'Standard double Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna laboris nisi ut aliquip exLorem ipsum dolor sit amet,', 1, 0, NULL, NULL, '1,2,3,4,5,6,7', 230, 230, NULL, 'active', '2024-09-30 01:40:58', '2024-10-27 23:41:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_type_images`
--

CREATE TABLE `room_type_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roomType_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_type_images`
--

INSERT INTO `room_type_images` (`id`, `roomType_id`, `room_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '1725079657_26-07-2024.png', '2024-08-30 23:17:37', '2024-08-30 23:23:21', '2024-08-30 23:23:21'),
(2, NULL, '1725079657_27-07-2024.png', '2024-08-30 23:17:37', '2024-08-30 23:17:54', '2024-08-30 23:17:54'),
(3, NULL, '1725079657_28-08-2024.png', '2024-08-30 23:17:37', '2024-08-30 23:23:23', '2024-08-30 23:23:23'),
(4, NULL, '1725079657_29-07-2024.png', '2024-08-30 23:17:37', '2024-08-30 23:23:25', '2024-08-30 23:23:25'),
(5, NULL, '1725079657_29-08-2024.png', '2024-08-30 23:17:37', '2024-08-30 23:23:27', '2024-08-30 23:23:27'),
(6, NULL, '1725079696_PHK_Exterior_1280.jpg', '2024-08-30 23:18:16', '2024-08-30 23:39:09', '2024-08-30 23:39:09'),
(7, NULL, '1725080054_15-07-2024-DhruvishSorathiya.png', '2024-08-30 23:24:14', '2024-08-30 23:24:14', NULL),
(8, NULL, '1725080054_22-08-2024.png', '2024-08-30 23:24:14', '2024-08-30 23:24:14', NULL),
(9, NULL, '1725080054_360_F_9211505_d4hxfNtPeTfgt7AeGmoO7u79P2hwxkoQ.jpg', '2024-08-30 23:24:14', '2024-08-30 23:24:14', NULL),
(10, NULL, '1725080054_istockphoto-104731717-612x612.jpg', '2024-08-30 23:24:14', '2024-08-30 23:24:14', NULL),
(11, NULL, '1725080079_1.jpg', '2024-08-30 23:24:39', '2024-08-30 23:24:39', NULL),
(12, NULL, '1725080079_compressed_gm_40_img_604972_2cbefaa8_1688786602050_sc.jpg', '2024-08-30 23:24:39', '2024-08-30 23:24:39', NULL),
(13, 1, '1725864225_full-length-portrait-traditional-santa-claus-putting-presents-christmas-tree-copy-space-min.jpg', '2024-09-09 01:13:45', '2024-09-09 01:17:02', '2024-09-09 01:17:02'),
(14, NULL, '1725864381_medium-overhead-shot-of-families-sharing-dinner-at-royalty-free-image-1690401358.jpg', '2024-09-09 01:16:21', '2024-09-09 01:17:26', '2024-09-09 01:17:26'),
(15, NULL, '1725864381_MWP-174-1200x600.jpg', '2024-09-09 01:16:21', '2024-09-09 01:17:29', '2024-09-09 01:17:29'),
(16, NULL, '1725864478_large_deluxe-double-double.jpg', '2024-09-09 01:17:58', '2024-09-09 01:17:58', NULL),
(17, NULL, '1725864478_latest-dining-hall-ceiling-designs-for-your-home.jpg', '2024-09-09 01:17:58', '2024-09-09 01:17:58', NULL),
(18, NULL, '1725864478_medium-overhead-shot-of-families-sharing-dinner-at-royalty-free-image-1690401358.jpg', '2024-09-09 01:17:58', '2024-09-09 01:17:58', NULL),
(19, 1, '1727674557_white-bedroom-hotel.jpg', '2024-09-30 00:05:57', '2024-09-30 00:38:19', '2024-09-30 00:38:19'),
(20, 2, '1727674638_3d-rendering-luxury-bedroom-suite-resort-hotel-with-twin-bed-living.jpg', '2024-09-30 00:07:18', '2024-09-30 00:38:32', '2024-09-30 00:38:32'),
(21, 3, '1727674736_red-soccer-jersey-with-number-1-it_1308172-315519.jpg', '2024-09-30 00:08:56', '2024-09-30 00:38:39', '2024-09-30 00:38:39'),
(22, 1, '1727676505_white-bedroom-hotel 1.png', '2024-09-30 00:38:25', '2024-10-04 06:06:20', '2024-10-04 06:06:20'),
(23, 2, '1727676553_3d-rendering-luxury-bedroom-suite-resort-hotel-with-twin-bed-living 1.png', '2024-09-30 00:39:13', '2024-09-30 00:39:13', NULL),
(24, 6, '1727676651_romantic-bedroom 1.png', '2024-09-30 00:40:51', '2024-09-30 00:40:51', NULL),
(25, 3, '1727676715_bangkok-thailand-august-12-2016-beautiful-luxury-bedroom-int 1.png', '2024-09-30 00:41:55', '2024-09-30 00:41:55', NULL),
(26, 5, '1727676751_luxurious-bedroom-with-large-bed-hardwood-floors-large-windows 1.png', '2024-09-30 00:42:31', '2024-09-30 00:42:31', NULL),
(27, 7, '1727676785_image 90.png', '2024-09-30 00:43:05', '2024-09-30 00:43:05', NULL),
(28, 1, '1727677942_SocketTVLogo.jpg', '2024-09-30 01:02:22', '2024-10-04 06:06:17', '2024-10-04 06:06:17'),
(29, NULL, '1727678083_SocketTVLogo.jpg', '2024-09-30 01:04:43', '2024-09-30 01:04:43', NULL),
(30, 15, '1727678252_image 79.png', '2024-09-30 01:07:32', '2024-09-30 01:07:32', NULL),
(31, 16, '1727680258_image 79.png', '2024-09-30 01:40:58', '2024-10-27 23:41:00', '2024-10-27 23:41:00'),
(32, NULL, '1727695621_25-07-2024-Dhruvish.png', '2024-09-30 05:57:01', '2024-09-30 05:57:11', '2024-09-30 05:57:11'),
(33, NULL, '1727696439_PHK_Exterior_1280 - Copy.jpg', '2024-09-30 06:10:39', '2024-10-01 05:27:44', '2024-10-01 05:27:44'),
(34, 1, '1728041858_roomSec1.png', '2024-10-04 06:07:38', '2024-10-04 06:10:51', '2024-10-04 06:10:51'),
(35, 1, '1728042087_roomSec1.png', '2024-10-04 06:11:27', '2024-10-04 06:11:39', '2024-10-04 06:11:39'),
(36, 1, '1728042107_images.jpg', '2024-10-04 06:11:47', '2024-10-04 06:12:13', '2024-10-04 06:12:13'),
(37, 1, '1728042138_large_deluxe-double-double.jpg', '2024-10-04 06:12:18', '2024-10-04 06:19:01', '2024-10-04 06:19:01'),
(38, 1, '1728042548_white-bedroom-hotel 1 (1).png', '2024-10-04 06:19:08', '2024-10-04 06:19:08', NULL),
(39, 16, '1730092270_spasec2_1.png', '2024-10-27 23:41:10', '2024-10-27 23:41:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sequence_cuses`
--

CREATE TABLE `sequence_cuses` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sequence_cuses`
--

INSERT INTO `sequence_cuses` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `sequence_tbls`
--

CREATE TABLE `sequence_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smoking_prefrence`
--

CREATE TABLE `smoking_prefrence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smoking_prefrence`
--

INSERT INTO `smoking_prefrence` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '222222222', '1725691042_istockphoto-104731717-612x612.jpg,1725692071_08-08-2024.png,1725692071_09-07-2024-DhruvishSorathiya.png,1725692071_09-08-2024.png,1725692071_10-07-2024-Dhruvish-sorathiya.png,1725692071_11-07-2024-DhruvishSorathiya.png', '2024-09-07 01:07:10', '2024-09-07 01:26:29', '2024-09-07 01:26:29'),
(2, 'Smoking', ',1726032551_What-Happens-If-You-Quit-Smoking-by-35-1.jpg', '2024-09-07 01:26:41', '2024-09-10 23:59:11', NULL),
(3, 'No Smoking', '1725692216_360_F_9211505_d4hxfNtPeTfgt7AeGmoO7u79P2hwxkoQ.jpg,1725692216_istockphoto-104731717-612x612.jpg,1725692216_PHK_Exterior_1280.jpg,1725853220_230-7-2024-Dhruvish-Sorathiya.png,1725854545_24-08.png', '2024-09-07 01:26:56', '2024-10-03 03:52:02', NULL),
(4, 'No Prefrence', ',1725855221_230-7-2024-Dhruvish-Sorathiya.png', '2024-09-08 22:33:07', '2024-09-08 22:43:45', '2024-09-08 22:43:45'),
(5, 'No Prefrence', '1725855239_230-7-2024-Dhruvish-Sorathiya.png,1725855239_360_F_9211505_d4hxfNtPeTfgt7AeGmoO7u79P2hwxkoQ - Copy.jpg', '2024-09-08 22:43:59', '2024-09-08 22:43:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spas`
--

CREATE TABLE `spas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spas`
--

INSERT INTO `spas` (`id`, `name`, `category`, `description`, `image`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Elite Retreat', 'seasonaloffer', 'TETTTSTSTSTSTSTSTSTSTSTSTST', '1729741762_Skyview_Entrance.jpg,1729741762_Skyview_Hotel_Building.jpg,1729741762_Skyview-Corporate-Park-2_4272_20170916_003.jpg,1729741762_spa.jpg', '586', '2024-10-23 04:45:27', '2024-10-25 05:38:08', NULL),
(2, 'Mindful oasis', 'massage', 'wdwq', '1729853262_istockphoto-104731717-612x612-1.jpg,1729853346_medium_20211130_032720_844523_tac_dung_cua_viec_d_max_1800x1800_jpg_f93c37ed0a.jpg', '3423', '2024-10-25 01:37:52', '2024-10-25 05:38:18', NULL),
(3, 'Oasis Spa', 'coupleritual', 'Mineral Spa', '1729848529_6UzFbSIe8gmqc5yu.jpg,1729853329_depositphotos_13789300-stock-photo-latin-woman-spa.jpg', '896', '2024-10-25 03:58:49', '2024-10-25 05:38:26', NULL),
(4, 'Blessed Spa', 'facial', 'Bath & SPa', '1729853627_2285930_1.jpg,1729854746_best-hotels-terceira-island.jpeg', '856', '2024-10-25 05:23:47', '2024-10-25 05:42:26', NULL),
(5, 'Serenity Spa', 'seasonaloffer', 'sss', '1729854363_4.jpg,1729854363_087269a_hb_ba_014.jpg,1729854363_2285930_1.jpg', '89', '2024-10-25 05:36:03', '2024-10-25 05:41:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spa_bookknows`
--

CREATE TABLE `spa_bookknows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `technician` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `spa_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spa_bookknows`
--

INSERT INTO `spa_bookknows` (`id`, `checkin`, `time`, `technician`, `person`, `price`, `total_price`, `created_at`, `updated_at`, `deleted_at`, `spa_id`) VALUES
(1, '2024-10-25', '10:00 am - 11:40 am', 'Female', '2', '586', 1172, '2024-10-25 01:36:50', '2024-10-25 01:36:50', NULL, 1),
(2, '2024-10-09', '10:00 am - 11:40 am', 'Female', '3', '3423', 10269, '2024-10-25 01:38:12', '2024-10-25 01:38:12', NULL, 2),
(3, '2024-10-17', '11:00 am - 12:40 pm', 'Female', '6', '586', 3516, '2024-10-25 01:38:30', '2024-10-25 01:38:30', NULL, 1),
(4, '2024-10-26', '09:00 am - 10:40 am', 'Female', '8', '586', 4688, '2024-10-25 01:42:00', '2024-10-25 01:42:00', NULL, 1),
(5, '2024-10-26', '12:00 pm - 01:40 pm', 'Male', '4', '3423', 13692, '2024-10-25 02:59:07', '2024-10-25 02:59:07', NULL, 2),
(6, '2024-10-31', '10:00 am - 11:40 am', 'Female', '2', '586', 1172, '2024-10-25 03:18:22', '2024-10-25 03:18:22', NULL, 1),
(7, '2024-10-29', '11:00 am - 12:40 pm', 'Female', '3', '586', 1758, '2024-10-27 23:43:42', '2024-10-27 23:43:42', NULL, 1),
(8, '2024-11-14', '10:00 am - 11:40 am', 'Female', '5', '3423', 17115, '2024-11-05 22:13:29', '2024-11-05 22:13:29', NULL, 2),
(9, '2024-11-20', '11:00 am - 12:40 pm', 'Female', '4', '586', 2344, '2024-11-05 22:18:00', '2024-11-05 22:18:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `spa_check_outs`
--

CREATE TABLE `spa_check_outs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `spa_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `additional_info` varchar(255) NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `captcha` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spa_check_outs`
--

INSERT INTO `spa_check_outs` (`id`, `user_id`, `spa_id`, `first_name`, `last_name`, `email`, `phone`, `additional_info`, `cardholder_name`, `card_number`, `expiry_date`, `cvv`, `total_price`, `status`, `captcha`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 66, 1, 'Dhruvish', 'Sorathiya', 'dhruvish@gmail.com', '8141233620', 'sss', 'Dhruvish', '12345678901234567', '02/22', '123', NULL, NULL, '3na3', '2024-10-24 22:59:13', '2024-10-24 22:59:13', NULL),
(2, 66, 1, 'Viraj', 'Kapdiya', 'viraj@gmail.com', '8141233650', 'ddd', 'Viraj', '12345678901234567', '02/22', '123', NULL, NULL, '7atd', '2024-10-24 23:01:05', '2024-10-24 23:01:05', NULL),
(3, 66, 1, 'Dhruvish', 'Sorathiya', 'dhruvish@gmail.com', '8141233650', 'dddd', 'Dhruvish', '12345678901234567', '02/22', '123', NULL, NULL, 'g72h', '2024-10-25 00:17:48', '2024-10-25 00:17:48', NULL),
(4, 66, 2, 'Carly', 'Battle', 'fyzyw@mailinator.com', '8141233650', 'Id inventore eiusmo', 'Chantale Stein', '109', '10/25', '123', NULL, NULL, 'enh7', '2024-10-25 03:14:33', '2024-10-25 03:14:33', NULL),
(5, 66, 2, 'Reagan', 'Bridges', 'toro@mailinator.com', '9638527410', 'Est corrupti tempor', 'Melodie Bean', '384', '09-Apr-1973', '123', NULL, NULL, 'nnj3', '2024-10-25 03:15:15', '2024-10-25 03:15:15', NULL),
(6, 66, 1, 'Nayda', 'Gallagher', 'mysuhy@mailinator.com', '9879831225', 'Magna et voluptas in', 'Tanisha Church', '835', '02/23', '123', '1272', NULL, 'pdtr', '2024-10-25 03:19:15', '2024-10-25 03:19:15', NULL),
(7, 75, 1, 'Clarke', 'Murphy', 'masimohy@mailinator.com', '8141233650', 'Officia impedit rer', 'Jamal Mccall', '878', '02/22', '123', '2444', NULL, 'atXa', '2024-11-05 22:18:22', '2024-11-05 22:18:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `salary` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `hire_date` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `aadharcard` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `hotel_id`, `first_name`, `last_name`, `email`, `password`, `country`, `state`, `city`, `phone`, `position_id`, `salary`, `birth_date`, `hire_date`, `gender`, `aadharcard`, `address`, `profile_pic`, `status`, `created_at`, `updated_at`, `deleted_at`, `staff_id`) VALUES
(1, 1, 'staff', 'role', 'staff@gmail.com', '$2y$10$dKU8l8FEKefm2G3Nca0QxeyLncUx7W4Pv5.3DnCfSSUMvyFtE413C', 'IN', 'UP', 'Anupshahr', '9879831225', 2, '25000', '2024-10-10', '2024-10-27', 'male', '6707bd7c02d66.png', 'Hello', '6707bd7c029a7.jpg', 'active', '2024-10-10 06:11:48', '2024-10-14 04:23:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL COMMENT '  0 = Admin\r\n  1 = Staff\r\n  2 = Account\r\n  3 = Customer',
  `profile` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password_reset_otp` int(11) DEFAULT NULL,
  `password_reset_otp_expires_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `lname`, `dob`, `email`, `address`, `join_date`, `phone_number`, `status`, `role_id`, `profile`, `position`, `department`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `staff_id`, `password_reset_otp`, `password_reset_otp_expires_at`, `country`, `state`, `city`, `google_id`) VALUES
(1, 'KH_001', 'VirajKeva', 'Sorathiya', '2024-10-08', 'admin@example.com', 'Kalthiya Solution', NULL, '8141233650', NULL, 0, '1730787664.png', NULL, NULL, '2024-08-31 05:26:06', '$2y$10$8iTUQ2jrPAa8prNQybeUHuKvxxKBumFOt0bxsB3PwnC7mk/hPErWO', 's2BF6VEsytZP7VuoTXzNfsAx2pzHnC7FIGIuyapx5yUbpL9gBgiqek8oWAOA', '2024-07-26 06:58:28', '2024-11-05 00:53:55', NULL, NULL, NULL, 'AF', 'BDG', 'Ghormach', NULL),
(64, 'KH_002', 'Frontened Side', 'Developer', '2024-10-27', 'fronted123@gmail.com', 'JKP Nager SOA456', NULL, '8141233650', NULL, 3, '1728557262_close-up-portrait-of-smiling-handsome-young-caucasian-man-face-looking-at-camera-on-isolated-light-gray-studio-background-photo.jpg', NULL, NULL, NULL, '$2y$10$/Gbb8wm8PvNOV9ybMHuwTue6p.fZS0c4tfBVKKvFIGoVt0XYcA6H6', NULL, '2024-10-10 05:14:25', '2024-10-10 06:49:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'KH_003', 'staff', 'role', '2024-10-10', 'staff@gmail.com', NULL, NULL, '9879831225', NULL, 1, '6707bd7c029a7.jpg', NULL, NULL, NULL, '$2y$10$9reg1DFuqDvhg7RfZTTwbuQnS4DHuLTLHDMs9xINkRefhNBS1bt3G', NULL, '2024-10-10 06:11:48', '2024-10-10 06:11:48', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'KH_004', 'Dhruvish', 'Sorathiya', '2024-11-05', 'dhruvish.kalathiyainfotech@gmail.com', 'Dhanmora Katargam', NULL, '8141233650', NULL, 3, '1730697914_1729741348_the-day-is-marked-with-an-array-of-messages-that-encapsulate-patriotism.jpg', NULL, NULL, NULL, '$2y$10$Ht2lMkEJ0MsA4nn.72iuNugj4c3KVBHleD9TqTn0DyG97RTA.QCTi', NULL, '2024-11-03 23:51:33', '2024-11-03 23:56:29', NULL, NULL, NULL, 'IN', 'DL', NULL, '112195652951894170292');

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`id`, `user_id`, `address`, `country`, `state`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Hello', NULL, NULL, NULL, '2024-10-06 23:03:15', '2024-10-06 23:03:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_prefrence`
--
ALTER TABLE `additional_prefrence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_id` (`room_id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_admin` (`room_id`),
  ADD KEY `fk_booking_id` (`booking_id`);

--
-- Indexes for table `client_reviews`
--
ALTER TABLE `client_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_usages_user_id_foreign` (`user_id`),
  ADD KEY `fk_coupon_id` (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_floor_id_foreign` (`floor_id`),
  ADD KEY `hall_halltype_id_foreign` (`halltype_id`);

--
-- Indexes for table `halltypes`
--
ALTER TABLE `halltypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_amenity`
--
ALTER TABLE `hotel_amenity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_images_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_packages`
--
ALTER TABLE `offer_packages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_managers`
--
ALTER TABLE `price_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_managers_room_type_id_foreign` (`room_type_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_floor_id_foreign` (`floor_id`),
  ADD KEY `rooms_room_type_id_foreign` (`room_type_id`),
  ADD KEY `rooms_food_id_foreign` (`food_id`),
  ADD KEY `fk_admin_smoking` (`smoking_id`),
  ADD KEY `fk_admin_view` (`view_id`),
  ADD KEY `fk_offer_id` (`offer_id`);

--
-- Indexes for table `rooms_images`
--
ALTER TABLE `rooms_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room` (`room_id`);

--
-- Indexes for table `room_sequences`
--
ALTER TABLE `room_sequences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type_images`
--
ALTER TABLE `room_type_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_type_images_roomtype_id_foreign` (`roomType_id`);

--
-- Indexes for table `sequence_cuses`
--
ALTER TABLE `sequence_cuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smoking_prefrence`
--
ALTER TABLE `smoking_prefrence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spas`
--
ALTER TABLE `spas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spa_bookknows`
--
ALTER TABLE `spa_bookknows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_spa_id` (`spa_id`);

--
-- Indexes for table `spa_check_outs`
--
ALTER TABLE `spa_check_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_hotel_id_foreign` (`hotel_id`),
  ADD KEY `staff_position_id_foreign` (`position_id`),
  ADD KEY `fk_admin` (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_id` (`staff_id`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_address_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_prefrence`
--
ALTER TABLE `additional_prefrence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_reviews`
--
ALTER TABLE `client_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `halltypes`
--
ALTER TABLE `halltypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_amenity`
--
ALTER TABLE `hotel_amenity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotel_images`
--
ALTER TABLE `hotel_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `offer_packages`
--
ALTER TABLE `offer_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `price_managers`
--
ALTER TABLE `price_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms_images`
--
ALTER TABLE `rooms_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room_sequences`
--
ALTER TABLE `room_sequences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `room_type_images`
--
ALTER TABLE `room_type_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sequence_cuses`
--
ALTER TABLE `sequence_cuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smoking_prefrence`
--
ALTER TABLE `smoking_prefrence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spas`
--
ALTER TABLE `spas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spa_bookknows`
--
ALTER TABLE `spa_bookknows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `spa_check_outs`
--
ALTER TABLE `spa_check_outs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_room_id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_booking_id` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `hall_halltype_id_foreign` FOREIGN KEY (`halltype_id`) REFERENCES `halltypes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD CONSTRAINT `hotel_images_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `price_managers`
--
ALTER TABLE `price_managers`
  ADD CONSTRAINT `price_managers_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_admin_smoking` FOREIGN KEY (`smoking_id`) REFERENCES `smoking_prefrence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_admin_view` FOREIGN KEY (`view_id`) REFERENCES `additional_prefrence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_offer_id` FOREIGN KEY (`offer_id`) REFERENCES `offer_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rooms_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `rooms_images`
--
ALTER TABLE `rooms_images`
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_type_images`
--
ALTER TABLE `room_type_images`
  ADD CONSTRAINT `room_type_images_roomtype_id_foreign` FOREIGN KEY (`roomType_id`) REFERENCES `room_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `spa_bookknows`
--
ALTER TABLE `spa_bookknows`
  ADD CONSTRAINT `fk_spa_id` FOREIGN KEY (`spa_id`) REFERENCES `spas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `staff_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `users_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
