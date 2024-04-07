-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 05:03 AM
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
-- Database: `ecom-backend`
--

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
(5, '2022_05_17_181447_create_roles_table', 1),
(6, '2022_05_17_181456_create_user_roles_table', 1),
(7, '2023_10_09_100223_create_products_table', 1),
(8, '2023_10_09_100342_create_orders_table', 1),
(9, '2023_10_12_130822_create_wishlist_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `created_at`, `updated_at`) VALUES
(4, 1, '60.00', '2024-04-05 22:10:58', '2024-04-05 22:10:58'),
(5, 1, '30.00', '2024-04-05 23:46:39', '2024-04-05 23:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(4, 4, 1, 2, '10.00', NULL, NULL),
(5, 4, 3, 2, '10.00', NULL, NULL),
(6, 4, 7, 2, '10.00', NULL, NULL),
(7, 5, 3, 1, '10.00', NULL, NULL),
(8, 5, 5, 1, '10.00', NULL, NULL),
(9, 5, 8, 1, '10.00', NULL, NULL);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'hydra-api-token', 'd36d645adac564adcf5c13c11660ea2117f9c70a30923ed4d2ce634b1adb7d62', '[\"admin\"]', NULL, '2024-04-05 00:10:58', '2024-04-05 00:10:58'),
(2, 'App\\Models\\User', 1, 'hydra-api-token', 'ddc3561390f6f26c9be49b44695f361f145938b9678fe284f525faa2f9ec22b9', '[\"admin\"]', NULL, '2024-04-05 00:11:07', '2024-04-05 00:11:07'),
(3, 'App\\Models\\User', 1, 'hydra-api-token', 'f4cc67109c70cbc990f5fc7f89c637cdf4d0cdf5dc93bc5fe845dda5dfb13b0a', '[\"admin\"]', NULL, '2024-04-05 00:12:49', '2024-04-05 00:12:49'),
(4, 'App\\Models\\User', 1, 'hydra-api-token', 'b4b3a8a9e474637054ad0e0d721a44c1daacb08b4a30d7733717a4410fd4c92a', '[\"admin\"]', NULL, '2024-04-05 02:13:52', '2024-04-05 02:13:52'),
(5, 'App\\Models\\User', 1, 'hydra-api-token', 'baa502a31e211189acb5464d3e76c7cdb663500f2222d185348d83fe20399b8c', '[\"admin\"]', NULL, '2024-04-05 02:13:54', '2024-04-05 02:13:54'),
(6, 'App\\Models\\User', 1, 'hydra-api-token', 'c650a819c8d47d08654cf8c9ea3f70fe51d5b932ad0eda1486618cd2f6a289dc', '[\"admin\"]', '2024-04-05 23:55:25', '2024-04-05 20:59:10', '2024-04-05 23:55:25'),
(7, 'App\\Models\\User', 1, 'hydra-api-token', 'd4facf4fc14d92bf87c7d15777c2a682a9dfaac4ae7f64bd38c8134689023f77', '[\"admin\"]', '2024-04-06 03:33:11', '2024-04-06 03:08:28', '2024-04-06 03:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `category`, `image`, `rating`, `rating_count`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat1', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53'),
(2, 'Product 2', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat2', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53'),
(3, 'Product 3', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat3', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53'),
(4, 'Product 4', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat4', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53'),
(5, 'Product 5', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat1', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53'),
(6, 'Product 6', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat2', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53'),
(7, 'Product 7', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat3', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53'),
(8, 'Product 8', '10.00', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem animi reprehenderit cum, voluptate temporibus aliquid vero nesciunt iste culpa architecto. Ullam quisquam totam dolore pariatur repudiandae dignissimos eum earum voluptas.\r\n\r\n', 'cat4', 'https://images.unsplash.com/photo-1711843250832-404dae8ff71d?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '4.0', 2, '2024-04-04 08:15:53', '2024-04-05 08:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2024-04-05 00:08:42', '2024-04-05 00:08:42'),
(2, 'User', 'user', '2024-04-05 00:08:43', '2024-04-05 00:08:43'),
(3, 'Customer', 'customer', '2024-04-05 00:08:43', '2024-04-05 00:08:43'),
(4, 'Editor', 'editor', '2024-04-05 00:08:43', '2024-04-05 00:08:43'),
(5, 'All', '*', '2024-04-05 00:08:43', '2024-04-05 00:08:43'),
(6, 'Super Admin', 'super-admin', '2024-04-05 00:08:43', '2024-04-05 00:08:43');

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$WDRCIuls2rT8eKHLRyp7TOUjvfMMzfxuUz4pV34sPJw2d2u21isgy', NULL, '2024-04-05 00:08:44', '2024-04-05 00:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2024-04-06 03:31:16', '2024-04-06 03:31:16'),
(5, 1, 4, '2024-04-06 03:31:18', '2024-04-06 03:31:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_slug_index` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_roles_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`),
  ADD KEY `wishlist_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
