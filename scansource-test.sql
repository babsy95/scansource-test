-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 05:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scansource-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE DATABASE `scansource-test`;

USE `scansource-test`;

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'For Admin', '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(2, 'Manager', 'For Manager', '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(3, 'Associate', 'For Associate', '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(4, 'Supervior', 'For Supervior', '2023-05-08 06:33:11', '2023-05-08 06:33:11');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_06_014309_create_groups_table', 1),
(6, '2023_05_06_014626_create_user_groups_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '865400000', '$2y$10$J7MHr1bTy2RIlaoGHmIV3esTMFZ.H.yAm3oWog0e28PBZoRBgTfau', NULL, NULL, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(2, 'User 1', 'user1@gmail.com', '861111000', '$2y$10$MVuQ0bqlH/XylkT04/VR.OvblAH4NEnek5OBM1MZ7w///cd6tN/y6', NULL, NULL, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(3, 'John Doe', 'john@gmail.com', '861111000', '$2y$10$qr3FPTYmV6OAF95/nds8t.UD8n8aFTJ3kaqLMclXApSEywkc2dFCa', NULL, NULL, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(4, 'Matt', 'matt@gmail.com', '7881111000', '$2y$10$B46IUFVDIxCqgHC6uSeZPOLsRoZAyy4tc5LL/r1kwqqG8LynjeG0q', NULL, NULL, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(5, 'Billy', 'bill@gmail.com', '444111000', '$2y$10$c9yxVSgptmwcXx1uMPKaieTAXcFdFe0yW9JVMjC0yvK2UvWHNfEw2', NULL, NULL, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(6, 'Lary', 'lary1@gmail.com', '7661111000', '$2y$10$xXz.JsXiv5ar26rkH0j4Aej2yoh6l/fn4hLTdeMNs5jOO9JKIO3i2', NULL, NULL, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(7, 'Lary', 'lary@gmail.com', '7661111000', '$2y$10$5jenZAQcMGFjUw6w9z0DM.Ur2E0hpYdNRNE/NwhKC2LtGF.Y17bBm', NULL, NULL, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(10, 'angel', 'angel@gmail.com', '999999999', '$2y$10$lq6ejJFhLIdQmUHvEiFv6.CZmhWAwPTFQS1wJMmxk1SkFl9EXYQka', NULL, NULL, '2023-05-08 06:53:15', '2023-05-08 06:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(2, 2, 3, '2023-05-08 06:33:11', '2023-05-08 06:33:11'),
(3, 10, 2, '2023-05-08 06:55:32', '2023-05-08 06:55:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_id_index` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_index` (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_groups_id_index` (`id`),
  ADD KEY `user_groups_user_id_index` (`user_id`),
  ADD KEY `user_groups_group_id_index` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `user_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
