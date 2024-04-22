-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 07:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuejs-laravel-inertiajs`
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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Sabbir', 'sabbirahammedsovon@gmail.com', 'fghfhg', '2024-04-21 22:57:14', '2024-04-21 22:57:14'),
(2, 'Md Sabbir Ahammed', 'sabbirahammedsovon@gmail.com', 'dfgfd', '2024-04-21 22:59:57', '2024-04-21 22:59:57'),
(3, 'fdfd', 'hk@jhgh', 'ghjhgj', '2024-04-21 23:03:05', '2024-04-21 23:03:05'),
(4, 'dtyr', 'ytrytry@kjhkjhkjh', 'rtyrty', '2024-04-21 23:05:08', '2024-04-21 23:05:08'),
(5, 'Md Sabbir Ahammed', 'sabbirahammedsovon@gmail.com', 'dfgdgfdg', '2024-04-21 23:05:34', '2024-04-21 23:05:34'),
(6, 'dgdfgfd', 'customer1@email.com', 'fgfdgfdg', '2024-04-21 23:12:56', '2024-04-21 23:12:56'),
(7, 'fdfd', 'customer1@email.com', 'dfgdg', '2024-04-21 23:15:52', '2024-04-21 23:15:52'),
(8, 'vekih70522', 'admin@doe.comg', 'tryrytr', '2024-04-21 23:27:15', '2024-04-21 23:27:15'),
(9, 'Md Sabbir Ahammed', 'customer1@email.com', 'gfhfghgf', '2024-04-21 23:29:03', '2024-04-21 23:29:03'),
(10, 'fdfd', 'admin@doe.com', 'fgyujg', '2024-04-21 23:29:35', '2024-04-21 23:29:35'),
(11, 'Md Sabbir Ahammed', 'admin@doe.comg', 'sdfgdfgfd', '2024-04-21 23:31:30', '2024-04-21 23:31:30'),
(12, 'fhdghfg', 'gfhghgfhgfh@kjljklkjl', 'lkjlkjlkjlklkjlkj', '2024-04-21 23:31:53', '2024-04-21 23:31:53');

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
(4, '2024_04_22_043643_create_contacts_table', 2);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Felipe Donnelly', 'blick.arturo@example.net', '2024-04-21 21:53:36', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'UIbCnVJC8i', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(2, 'Alfredo Kris', 'merl.botsford@example.net', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'Z33IPKkicG', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(3, 'Mr. Lorenzo Bosco IV', 'cristopher40@example.com', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'GG1hgwm4qP', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(4, 'General Conroy', 'morissette.brooks@example.org', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'eG3yIPCBiT', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(5, 'Uriel Tromp Jr.', 'hodkiewicz.ronaldo@example.net', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'PXOBC3JZb2', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(6, 'Dax O\'Reilly', 'ymorissette@example.net', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'uzF5A9gJqV', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(7, 'Cale Walsh', 'corine63@example.net', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'Iwz22FzXcf', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(8, 'Deangelo Thompson', 'luisa52@example.com', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'G0dKJhYyhF', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(9, 'Ms. Alena Beer I', 'kassulke.maximillian@example.net', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'ojlNiagdq3', '2024-04-21 21:53:38', '2024-04-21 21:53:38'),
(10, 'Paxton Kilback', 'maryam68@example.org', '2024-04-21 21:53:37', '$2y$12$dEOnmnGent8gWloa/jy3JuqLmCsyfFS33B/M5xJDZqWURutaCv8Pu', 'EWKHjhgxf6', '2024-04-21 21:53:39', '2024-04-21 21:53:39');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
