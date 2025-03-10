-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2025 at 12:15 PM
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
-- Database: `dba_consultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('fcead0a5906cc844bfc585a17c65c519', 'i:1;', 1741593867),
('fcead0a5906cc844bfc585a17c65c519:timer', 'i:1741593867;', 1741593867);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
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
-- Table structure for table `form_attributes`
--

CREATE TABLE `form_attributes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `servicename` varchar(255) DEFAULT NULL,
  `masterserviceid` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `inputtype` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_attributes`
--

INSERT INTO `form_attributes` (`id`, `type`, `servicename`, `masterserviceid`, `value`, `inputtype`, `created_at`, `updated_at`) VALUES
(12, 'Services', 'File Tax Return', '215', 'Name', 'text', '2024-11-13 06:10:25', '2024-11-13 06:10:25'),
(13, 'Services', 'File Tax Return', '215', 'Email', 'email', '2024-11-13 06:10:37', '2024-11-13 06:10:37'),
(20, 'Services', 'GST No.', '214', 'Name', 'text', '2024-11-21 05:05:33', '2024-12-23 06:35:24'),
(21, 'Services', 'GST No.', '214', 'Document', 'file', '2024-11-21 05:05:55', '2024-11-21 05:05:55'),
(22, 'Services', 'GST No.', '214', 'Address', 'textarea', '2024-11-21 05:06:06', '2024-12-23 06:35:40'),
(25, 'Services', 'File Tax Return', '215', 'Document', 'file', '2024-12-09 13:14:43', '2024-12-09 13:14:43'),
(26, 'Services', 'Business Pan Card', '222', 'Business Name', 'text', '2024-12-26 11:07:53', '2024-12-26 11:07:53'),
(27, 'Services', 'Business Pan Card', '222', 'Type of Business', 'text', '2024-12-26 11:08:05', '2024-12-26 11:08:05'),
(28, 'Services', 'Business Pan Card', '222', 'Business Address', 'textarea', '2024-12-26 11:08:27', '2024-12-26 11:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Master',
  `iconimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `label`, `value`, `type`, `iconimage`, `created_at`, `updated_at`) VALUES
(209, 'Services', 'Services', 'Master', NULL, '2024-11-05 06:26:42', '2024-11-05 10:29:23'),
(214, 'GST No.', 'GST No.', 'Services', '1731067480_gst.jpg', '2024-11-05 07:17:17', '2024-11-08 12:04:40'),
(215, 'File Tax Return', 'File Tax Return', 'Services', '1731067500_tax-return.jpg', '2024-11-05 08:54:17', '2024-11-08 12:13:48'),
(217, 'Documents', 'Documents', 'Master', NULL, '2024-11-07 05:30:44', '2024-11-07 05:30:44'),
(218, 'GST', 'GST', 'Documents', NULL, '2024-11-07 05:30:55', '2024-11-07 05:30:55'),
(219, 'Aadhar Card', 'Aadhar Card', 'Documents', NULL, '2024-11-07 05:31:04', '2024-11-07 05:31:04'),
(220, 'Bank Passbook', 'Bank Passbook', 'Documents', NULL, '2024-11-07 05:31:18', '2024-11-07 05:31:18'),
(221, 'PAN Card', 'PAN Card', 'Documents', NULL, '2024-11-07 05:31:26', '2024-11-07 05:31:26'),
(222, 'Business Pan Card', 'Business Pan Card', 'Services', '1731067538_pcard.jpg', '2024-11-08 12:05:38', '2024-11-08 12:05:38'),
(223, 'Company Registration', 'Company Registration', 'Services', '1731067597_registration.jpg', '2024-11-08 12:06:37', '2024-11-08 12:06:37'),
(224, 'Consulting', 'Consulting', 'Master', NULL, '2024-11-09 05:56:51', '2024-11-09 08:06:14'),
(225, 'Legal Consulting', 'Legal Consulting', 'Consulting', '1731131847_Layer 1.png', '2024-11-09 05:57:27', '2024-11-09 06:48:09');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_04_094609_add_two_factor_columns_to_users_table', 1),
(5, '2024_09_04_094634_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('nitzz@gmail.com', '$2y$12$8KjOvBqZkyCR13QIcyx2a.HOcwfeZDj6t.5pivgTHT0m82TCtOgB6', '2024-09-12 00:26:04');

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
-- Table structure for table `pricing_details`
--

CREATE TABLE `pricing_details` (
  `id` int(11) NOT NULL,
  `servicetype` varchar(255) DEFAULT NULL,
  `serviceid` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `disprice` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `coverimage` varchar(255) DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents`)),
  `details` longtext DEFAULT NULL,
  `notereq` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing_details`
--

INSERT INTO `pricing_details` (`id`, `servicetype`, `serviceid`, `price`, `disprice`, `duration`, `coverimage`, `documents`, `details`, `notereq`, `created_at`, `updated_at`) VALUES
(6, 'Services', '214', '1500', '8', '9', 'service-bg.png', '[\"GST\",\"Aadhar Card\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 04:46:18', '2024-12-23 06:28:03'),
(9, 'Services', '222', '1500', '500', '45', 'service-bg.png', '[\"PAN Card\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 05:19:04', '2025-02-25 05:32:16'),
(10, 'Services', '215', '2500', '100', '45', 'service-bg.png', '[\"Aadhar Card\",\"Bank Passbook\",\"PAN Card\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 05:28:04', '2025-02-25 13:06:19'),
(11, 'Services', '223', '2000', '988', '55', 'service-bg.png', '[\"Aadhar Card\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 05:28:53', '2025-02-25 12:10:41'),
(13, 'Consulting', '225', '75000', '7500', '45', '1731134472_service-bg.png', '[\"Aadhar Card\"]', 'Consulting Services', 'Consulting Services', '2024-11-09 06:41:12', '2024-11-09 07:16:30'),
(15, 'Services', '214', '800', '8', '45', '1741238098_pexels-anton-8100-46924.jpg', '[\"Aadhar Card\",\"Bank Passbook\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s inform\n\n', 'dfgfdgfdgfdgfd', '2025-03-06 05:14:58', '2025-03-08 11:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_services`
--

CREATE TABLE `purchase_services` (
  `id` int(11) NOT NULL,
  `formtype` varchar(255) DEFAULT NULL,
  `serviceid` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `servicename` varchar(255) DEFAULT NULL,
  `servicecharge` varchar(255) DEFAULT NULL,
  `formdata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`formdata`)),
  `documents` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_services`
--

INSERT INTO `purchase_services` (`id`, `formtype`, `serviceid`, `discount`, `userid`, `servicename`, `servicecharge`, `formdata`, `documents`, `note`, `status`, `created_at`, `updated_at`) VALUES
(57, 'Services', '214', '8', '64', 'GST No.', '1500', '[{\"label\":\"_token\",\"value\":\"2uZfCLaDBx7oYChiq9hd7B45u6lsNHYcBiPj3gXs\",\"type\":\"text\"},{\"label\":\"Name\",\"value\":\"Dummy\",\"type\":\"text\"},{\"label\":\"Address\",\"value\":\"Panchsheel\",\"type\":\"textarea\"},{\"label\":\"Document\",\"value\":\"1740391796_dummy.pdf\",\"type\":\"file\"}]', 'assets/images/documents/dummy.pdf,assets/images/documents/dummy2.pdf', 'All done', 'Completed', '2025-02-24 10:09:56', '2025-02-26 06:26:48'),
(59, 'Services', '215', '100', '65', 'File Tax Return', '2500', '[{\"label\":\"_token\",\"value\":\"zuAOxNrtrRmygTorTKHiuxBv2KLGw0DK2qtwPENE\",\"type\":\"text\"},{\"label\":\"Name\",\"value\":\"Nitesh File Tax Return\",\"type\":\"text\"},{\"label\":\"Email\",\"value\":\"sn@gmail.com\",\"type\":\"email\"},{\"label\":\"Document\",\"value\":\"1740464931_WhatsApp Image 2025-02-22 at 4.55.30 PM (1).jpeg\",\"type\":\"file\"}]', NULL, NULL, 'Processing', '2025-02-25 06:28:51', '2025-02-25 06:31:12'),
(61, 'Services', '215', '100', '64', 'File Tax Return', '2500', '[{\"label\":\"_token\",\"value\":\"7VU61GbQIolidoGQZUWElq1BdHrBXfxpniF0YCAN\",\"type\":\"text\"},{\"label\":\"Name\",\"value\":\"Dummy\",\"type\":\"text\"},{\"label\":\"Email\",\"value\":\"nb@gmail.com\",\"type\":\"email\"},{\"label\":\"Document\",\"value\":\"1741434660_Anurag09.jpg\",\"type\":\"file\"}]', NULL, NULL, 'Processing', '2025-03-08 11:51:00', '2025-03-08 11:51:20'),
(73, 'Services', '222', '500', '64', 'Business Pan Card', '1500', '[{\"label\":\"_token\",\"value\":\"7VU61GbQIolidoGQZUWElq1BdHrBXfxpniF0YCAN\",\"type\":\"text\"},{\"label\":\"Business_Name\",\"value\":\"BSNL PVT. LTD.\",\"type\":\"text\"},{\"label\":\"Type_of_Business\",\"value\":\"BSNL PVT. LTD.\",\"type\":\"text\"},{\"label\":\"Business_Address\",\"value\":\"BSNL PVT. LTD.\",\"type\":\"text\"}]', NULL, NULL, 'Processing', '2025-03-08 12:09:06', '2025-03-08 12:10:00'),
(74, 'Services', '222', '500', '64', 'Business Pan Card', '1500', '[{\"label\":\"_token\",\"value\":\"7VU61GbQIolidoGQZUWElq1BdHrBXfxpniF0YCAN\",\"type\":\"text\"},{\"label\":\"Business_Name\",\"value\":\"new\",\"type\":\"text\"},{\"label\":\"Type_of_Business\",\"value\":\"new\",\"type\":\"text\"},{\"label\":\"Business_Address\",\"value\":\"new\",\"type\":\"text\"}]', NULL, NULL, 'Processing', '2025-03-08 12:10:27', '2025-03-08 12:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `refer_incomes`
--

CREATE TABLE `refer_incomes` (
  `id` int(11) NOT NULL,
  `incomename` varchar(255) DEFAULT NULL,
  `criteria` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `lessthangreater` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refer_incomes`
--

INSERT INTO `refer_incomes` (`id`, `incomename`, `criteria`, `amount`, `lessthangreater`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Referral Bonus', '15%', '50000', 'beyond', '0', '2024-11-22 06:14:20', '2024-11-22 06:14:20'),
(5, 'Direct Referral', '10%', '50000', 'upto', '0', '2024-11-22 06:14:39', '2025-02-25 06:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `id` int(11) NOT NULL,
  `mobilenumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verifystatus` varchar(255) DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otp` varchar(22) DEFAULT NULL,
  `refercode` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `parentreferid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL,
  `permaddress` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pancard` varchar(255) DEFAULT NULL,
  `aadharcard` varchar(255) DEFAULT NULL,
  `gstnum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `mobilenumber`, `email`, `verifystatus`, `remember_token`, `created_at`, `updated_at`, `otp`, `refercode`, `password`, `parentreferid`, `username`, `profileimage`, `permaddress`, `city`, `state`, `pancard`, `aadharcard`, `gstnum`) VALUES
(64, '9429158300', 'ramkumar@gmail.com', '1', '305dc6c6f9b09c03ff9f05ea51471dd3daafde9e6a63740dfea1bed122b864e2', '2025-02-24 09:39:49', '2025-03-10 07:54:03', '150226', '2025dba64', '$2y$12$94bhVIreuDCzFo1XpZmk3eVnG7w8MVTzx8j5xyT2vH/1Jn.fgO2vS', NULL, 'Ram Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '6375475956', 'nitzz@gmail.com', '1', NULL, '2025-02-25 06:11:17', '2025-02-27 05:34:46', '607594', '2025dba65', NULL, '2025dba64', 'Nitesh Sharma', '1740466346_music.png', 'Panchsheel', 'Ajmer', 'Rajasthan', '5454545454', '54545454545', '545454545454545434343'),
(77, '8209165518', 'nitesh.yuvmedia@gmail.com', '1', '41d820e443818039e8ee2eb68a8a0b2f2b392432c9ef9d9f43594058a98866db', '2025-03-06 05:12:17', '2025-03-10 10:24:12', '315779', '2025dba77', '$2y$12$94bhVIreuDCzFo1XpZmk3eVnG7w8MVTzx8j5xyT2vH/1Jn.fgO2vS', NULL, 'Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ktU9QZQl8XbxrqbIMN02AUj4GU7h3KCtVIfPBliS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3JlZmVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjdRNTlsUERYa3lvR1VtUmZ1MFlnc0o2cjJQdTFLc2R3R0syOFBVbDAiO3M6NTU6ImxvZ2luX2N1c3RvbWVyXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Nzc7fQ==', 1741602303);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phonenumber`, `companyname`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Harish Ahuja', 'db@gmail.com', '9460574344', 'DBA Consultancy', NULL, '$2y$12$l6.03Ub7zM/dwLJXXhDn2.SgsJM804w6Qcj18/t1UiVxoAeMsKFHi', NULL, NULL, NULL, 'PbtJz7HdvzKn1xWm3Qc2N0W4b6TBgqWshRHFxL0VdQZocsqDbvB6aUt4l3bn', NULL, '1740471976_avatar-3.jpg', '2024-09-04 04:20:07', '2025-02-25 08:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `serviceid` varchar(255) DEFAULT NULL,
  `transactionid` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL,
  `paymenttype` varchar(255) NOT NULL DEFAULT '"credit","debit"',
  `transactiontype` varchar(255) NOT NULL,
  `transactiondata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`transactiondata`)),
  `parentreferid` varchar(255) DEFAULT NULL,
  `commissionamt` varchar(255) DEFAULT NULL,
  `commissionby` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `userid`, `serviceid`, `transactionid`, `amount`, `paymenttype`, `transactiontype`, `transactiondata`, `parentreferid`, `commissionamt`, `commissionby`, `status`, `created_at`, `updated_at`) VALUES
(71, '64', NULL, '67b5910585fe6', 12000, 'credit', 'Wallet Recharged', '{\"providerReferenceId\":\"M22NHRP0U0HEA\",\"checksum\":null,\"amount\":1200000,\"transaction_id\":\"OMO2502191336298121807052\",\"status\":\"PAYMENT_SUCCESS\",\"merchantOrderId\":\"67b5910585fe6\"}', NULL, NULL, NULL, 'PAYMENT_SUCCESS', '2025-02-24 09:46:42', '2025-02-24 09:59:57'),
(72, '64', '214', '57', 1492, 'debit', 'serviceorder', NULL, NULL, '149.2', NULL, '0', '2025-02-24 10:12:47', '2025-02-26 06:26:48'),
(73, '64', '222', '58', 1000, 'debit', 'serviceorder', NULL, NULL, NULL, NULL, 'Hold', '2025-02-25 05:32:37', '2025-02-25 05:32:37'),
(74, '65', NULL, '67b5910585fe6', 10000, 'credit', 'Wallet Recharged', '{\"providerReferenceId\":\"M22NHRP0U0HEA\",\"checksum\":null,\"amount\":1000000,\"transaction_id\":\"OMO2502191336298121807052\",\"status\":\"PAYMENT_SUCCESS\",\"merchantOrderId\":\"67b5910585fe6\"}', NULL, NULL, NULL, 'PAYMENT_SUCCESS', '2025-02-24 09:46:42', '2025-02-25 06:27:30'),
(75, '65', '215', '59', 2400, 'debit', 'serviceorder', NULL, NULL, NULL, NULL, 'Hold', '2025-02-25 06:31:12', '2025-02-25 06:31:12'),
(76, '64', '215', '61', 2400, 'debit', 'serviceorder', NULL, NULL, NULL, NULL, 'Hold', '2025-03-08 11:51:20', '2025-03-08 11:51:20'),
(77, '64', '222', '63', 1000, 'debit', 'serviceorder', NULL, NULL, NULL, NULL, 'Hold', '2025-03-08 11:53:21', '2025-03-08 11:53:21'),
(78, '64', '222', '73', 1000, 'debit', 'serviceorder', NULL, NULL, NULL, NULL, 'Hold', '2025-03-08 12:10:00', '2025-03-08 12:10:00'),
(79, '64', '222', '74', 1000, 'debit', 'serviceorder', NULL, NULL, NULL, NULL, 'Hold', '2025-03-08 12:10:43', '2025-03-08 12:10:43'),
(80, '64', NULL, NULL, 500, 'debit', 'withdraw', NULL, NULL, NULL, NULL, 'requested', '2025-03-10 07:54:15', '2025-03-10 07:54:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_attributes`
--
ALTER TABLE `form_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pricing_details`
--
ALTER TABLE `pricing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_services`
--
ALTER TABLE `purchase_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_incomes`
--
ALTER TABLE `refer_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_users`
--
ALTER TABLE `register_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_attributes`
--
ALTER TABLE `form_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing_details`
--
ALTER TABLE `pricing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchase_services`
--
ALTER TABLE `purchase_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `refer_incomes`
--
ALTER TABLE `refer_incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
