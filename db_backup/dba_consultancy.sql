-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 01:42 PM
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
('fcead0a5906cc844bfc585a17c65c519', 'i:1;', 1732165426),
('fcead0a5906cc844bfc585a17c65c519:timer', 'i:1732165426;', 1732165426);

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
(14, 'Services', 'File Tax Return', '215', 'Amount', 'text', '2024-11-13 06:10:47', '2024-11-13 06:14:03'),
(15, 'Services', 'File Tax Return', '215', 'Details', 'textarea', '2024-11-13 06:11:03', '2024-11-13 06:11:03'),
(19, 'Services', 'File Tax Return', '215', 'Profile', 'file', '2024-11-18 07:34:52', '2024-11-18 07:34:52'),
(20, 'Services', 'GST No.', '214', 'Number', 'text', '2024-11-21 05:05:33', '2024-11-21 05:05:33'),
(21, 'Services', 'GST No.', '214', 'Document', 'file', '2024-11-21 05:05:55', '2024-11-21 05:05:55'),
(22, 'Services', 'GST No.', '214', 'Amount', 'text', '2024-11-21 05:06:06', '2024-11-21 05:06:06');

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
(6, 'Services', '214', '7955', '8', '9', 'service-bg.png', '[\"GST\",\"Aadhar Card\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 04:46:18', '2024-11-09 06:37:15'),
(9, 'Services', '222', '60,000', '7500', '45', 'service-bg.png', '[\"PAN Card\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 05:19:04', '2024-11-09 06:37:17'),
(10, 'Services', '215', '15000', '7500', '45', 'service-bg.png', '[\"Aadhar Card\",\"PAN Card\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 05:28:04', '2024-11-14 05:53:53'),
(11, 'Services', '223', '50000', '988', '55', 'service-bg.png', '[\"Aadhar Card\",\"Bank Passbook\"]', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', 'The logic here is mostly correct, but you should specify the guard when retrieving the user\'s information to ensure you get the authenticated user from the customer guard rather than the default guard. Here’s the updated code', '2024-11-09 05:28:53', '2024-11-09 06:37:20'),
(13, 'Consulting', '225', '75000', '7500', '45', '1731134472_service-bg.png', '[\"Aadhar Card\"]', 'Consulting Services', 'Consulting Services', '2024-11-09 06:41:12', '2024-11-09 07:16:30');

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
  `status` varchar(255) DEFAULT 'Unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_services`
--

INSERT INTO `purchase_services` (`id`, `formtype`, `serviceid`, `discount`, `userid`, `servicename`, `servicecharge`, `formdata`, `status`, `created_at`, `updated_at`) VALUES
(39, 'Services', '214', '8', '45', 'GST No.', '7955', '[{\"label\":\"_token\",\"value\":\"vMxnDvM2o8zJJGpqAT0Tb1ICSaDvNL1iyU2C8LPh\",\"type\":\"text\"},{\"label\":\"Number\",\"value\":\"500\",\"type\":\"text\"},{\"label\":\"Amount\",\"value\":\"5400\",\"type\":\"text\"},{\"label\":\"Document\",\"value\":\"1732192367_Anurag09.jpg\",\"type\":\"file\"}]', 'Unpaid', '2024-11-21 12:32:47', '2024-11-21 12:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `id` int(11) NOT NULL,
  `mobilenumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verifystatus` varchar(255) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otp` varchar(22) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `mobilenumber`, `email`, `verifystatus`, `created_at`, `updated_at`, `otp`, `username`) VALUES
(44, '1234567894', 'anshul@gmail.com', '1', '2024-11-08 04:34:44', '2024-11-13 04:49:01', '607991', 'Anshul'),
(45, '1234567890', 'nb@gmail.com', '1', '2024-11-08 12:32:41', '2024-11-21 05:01:50', '264634', 'Nitzz');

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
('V52zcQ8zpcCyn8FJnLaLtVkG2TBRVkmDMEQ3ZuxR', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidk14bkR2TTJvOHpKSkdwcUFUMFRiMUlDU2FEdk5MMWl5VTJDOExQaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9jZWVkdG9wYXkvMjE0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NToibG9naW5fY3VzdG9tZXJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0NTtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJGw2LjAzVWI3ek0vZHdMSlhYaERuMi5TZ3NKTTgwNHc2UWNqMTgvdDFVaVZ4b0FlTXNLRkhpIjt9', 1732192713);

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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Harish', 'db@gmail.com', NULL, '$2y$12$l6.03Ub7zM/dwLJXXhDn2.SgsJM804w6Qcj18/t1UiVxoAeMsKFHi', NULL, NULL, NULL, 'i0pJuWnp0ael6gGkJfHvUUhpgyw4mmca3EDwF0ZP5KVaL19RtPKDat5OXbI3', NULL, NULL, '2024-09-04 04:20:07', '2024-09-04 04:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `transactionid` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL,
  `paymenttype` varchar(255) NOT NULL DEFAULT '"credit","debit"',
  `transactiontype` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `userid`, `transactionid`, `amount`, `paymenttype`, `transactiontype`, `status`, `created_at`, `updated_at`) VALUES
(22, '45', NULL, 10000, 'credit', 'online', '0', '2024-11-21 09:54:05', '2024-11-21 09:54:05'),
(23, '45', NULL, 2, 'debit', 'online', '0', '2024-11-21 10:01:19', '2024-11-21 10:01:52');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_services`
--
ALTER TABLE `purchase_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
