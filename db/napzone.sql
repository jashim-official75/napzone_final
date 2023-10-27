-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2023 at 11:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `napzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(14, 'puzzle', '2022-01-13 01:59:01', '2022-01-13 01:59:01'),
(15, 'hyper casual', '2022-01-13 01:59:19', '2022-01-13 01:59:19'),
(16, 'platformer', '2022-01-13 01:59:28', '2022-01-13 01:59:28'),
(17, 'arcade', '2022-01-13 01:59:37', '2022-01-13 01:59:37'),
(18, 'shooting', '2022-01-13 01:59:46', '2022-01-13 01:59:46'),
(19, 'educational', '2022-01-13 02:00:07', '2022-01-13 02:00:07'),
(20, 'board', '2022-01-13 02:00:16', '2022-01-13 02:00:16'),
(21, 'multiplayer', '2022-01-13 02:00:25', '2022-01-13 02:00:25'),
(22, 'sports', '2022-01-13 02:00:32', '2022-01-13 02:00:32'),
(23, 'racing', '2022-01-13 02:00:38', '2022-01-13 02:00:38'),
(24, 'action', '2022-01-24 01:27:47', '2022-01-24 01:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_games`
--

CREATE TABLE `favorite_games` (
  `id` bigint UNSIGNED NOT NULL,
  `subscriber_id` bigint UNSIGNED NOT NULL,
  `game_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorite_games`
--

INSERT INTO `favorite_games` (`id`, `subscriber_id`, `game_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-10-25 20:08:10', '2023-10-25 20:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint UNSIGNED NOT NULL,
  `game_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keyword` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `is_free` int DEFAULT '1',
  `is_exclusive` int NOT NULL DEFAULT '1',
  `total_play` bigint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `game_thumbnail`, `game_file`, `zip`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `is_free`, `is_exclusive`, `total_play`, `created_at`, `updated_at`) VALUES
(1, 'Cricket World Cup', 'Uploads/Game/Thumbnail/1698264482-asset-8-6529437f625c2.webp', 'cricket-world-cup', 'AllGames/cricket-world-cup', 'Cricket World Cup', 'Cricket World Cup', 'Cricket World Cup', 'Cricket World Cup', 0, 0, 9, '2023-10-25 20:08:02', '2023-10-26 15:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `game_categories`
--

CREATE TABLE `game_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `game_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_categories`
--

INSERT INTO `game_categories` (`id`, `game_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 22, '2023-10-25 20:08:02', '2023-10-25 20:08:02'),
(2, 1, 24, '2023-10-25 20:08:02', '2023-10-25 20:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `game_plays`
--

CREATE TABLE `game_plays` (
  `id` bigint UNSIGNED NOT NULL,
  `subscriber_id` bigint UNSIGNED NOT NULL,
  `game_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_02_091735_create_games_table', 1),
(6, '2021_12_02_092041_create_game_plays_table', 1),
(7, '2021_12_02_092114_create_categories_table', 1),
(8, '2021_12_02_092135_create_game_categories_table', 1),
(9, '2021_12_15_070048_create_subscribers_table', 1),
(10, '2021_12_15_070651_create_subscriber_details_table', 1),
(11, '2023_10_23_013725_create_favorite_games_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` int NOT NULL,
  `group_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `validity`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'daily', 86400, 1, '2022-01-11 03:49:05', '2022-01-11 03:49:05'),
(2, 'weekly', 604800, 1, '2022-01-11 03:49:35', '2022-01-11 03:49:35'),
(3, 'monthly', 2592000, 1, '2022-01-11 03:49:50', '2022-01-11 03:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_plans`
--

CREATE TABLE `purchase_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `subscriber_id` bigint UNSIGNED NOT NULL,
  `service_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'D for daily W for weekly B for biweekly M for monthly O for on demand',
  `autorenew` int NOT NULL DEFAULT '1',
  `renewed` int NOT NULL DEFAULT '0',
  `confirmed_by_user` int NOT NULL DEFAULT '0',
  `purchase_confirmed` int NOT NULL DEFAULT '0',
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `unsubscribe` tinyint DEFAULT '0',
  `refid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_plans`
--

INSERT INTO `purchase_plans` (`id`, `plan_id`, `subscriber_id`, `service_type`, `autorenew`, `renewed`, `confirmed_by_user`, `purchase_confirmed`, `start_at`, `end_at`, `unsubscribe`, `refid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'D', 1, 0, 0, 0, NULL, '2023-10-08 17:03:29', 0, '1', '2023-10-08 11:03:29', '2023-10-08 11:03:29'),
(2, 1, 1, 'D', 1, 0, 1, 0, NULL, '2023-10-08 17:04:53', 0, '1', '2023-10-08 11:04:53', '2023-10-08 11:04:53'),
(3, 1, 1, 'D', 1, 0, 0, 0, NULL, '2023-10-22 20:52:25', 0, '1', '2023-10-22 14:52:25', '2023-10-22 14:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `unique_id` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verified` int NOT NULL DEFAULT '0',
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `unique_id`, `phone_num`, `name`, `image`, `otp_verified`, `token`, `created_at`, `updated_at`) VALUES
(1, 'qH9O06', '8801568562265', 'sohelst9', 'assets/frontend/images/uploads/user/653176af7d4db.webp', 1, 'hmpr83XGjUJIsVP8AkhMwY6RxG7IpR', '2023-10-07 08:18:08', '2023-10-19 18:34:23'),
(2, '6pYo3A', '8801569128880', NULL, NULL, 0, 'zzwGKfqxk8cTxtrRDcxU5FngAN9SDA', '2023-10-23 12:20:40', '2023-10-23 12:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_details`
--

CREATE TABLE `subscriber_details` (
  `id` bigint UNSIGNED NOT NULL,
  `subscriber_id` bigint UNSIGNED NOT NULL,
  `device` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriber_details`
--

INSERT INTO `subscriber_details` (`id`, `subscriber_id`, `device`, `ip`, `platform`, `browser`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 18:10:20', '2023-10-22 18:10:20'),
(2, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 19:36:14', '2023-10-22 19:36:14'),
(3, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-22 19:45:16', '2023-10-22 19:45:16'),
(4, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 06:23:35', '2023-10-23 06:23:35'),
(5, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 07:51:54', '2023-10-23 07:51:54'),
(6, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 08:42:41', '2023-10-23 08:42:41'),
(7, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 11:28:04', '2023-10-23 11:28:04'),
(8, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 12:06:55', '2023-10-23 12:06:55'),
(9, 2, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 12:20:40', '2023-10-23 12:20:40'),
(10, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 12:20:49', '2023-10-23 12:20:49'),
(11, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 18:03:40', '2023-10-23 18:03:40'),
(12, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-23 18:05:27', '2023-10-23 18:05:27'),
(13, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-25 08:05:43', '2023-10-25 08:05:43'),
(14, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-25 13:38:03', '2023-10-25 13:38:03'),
(15, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-25 17:33:29', '2023-10-25 17:33:29'),
(16, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 08:10:03', '2023-10-26 08:10:03'),
(17, 1, 'Computer', '127.0.0.1', 'Windows', 'Chrome version: 118.0.0.0', '2023-10-26 15:21:05', '2023-10-26 15:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint UNSIGNED NOT NULL,
  `phone_num` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacted` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `phone_num`, `problem`, `contacted`, `created_at`, `updated_at`) VALUES
(1, '01717105379', 'test', 1, '2022-01-14 21:37:57', '2022-01-23 14:23:45'),
(2, '67 322 91 10', 'Hello,\r\n\r\nIt is with sad regret to inform you that DataList.biz is shutting down. We have made all our databases available for you at a one-time fee.\r\n\r\nYou can visit us on DataList.biz\r\n\r\nRegards.\r\nDarla', 0, '2022-03-12 21:54:16', '2022-03-12 21:54:16'),
(3, '+1 304-873-4360', 'It is with sad regret to inform you DataList.biz is shutting down on 25 March 2022. \r\n\r\nWe have made available databases per country for all companies available.. \r\n\r\nYou can view our samples and download databases instantly on our website DataList.biz', 0, '2022-03-23 18:03:43', '2022-03-23 18:03:43'),
(4, '079 0005 7779', 'Hello.\r\n\r\nWe are offering Bullet Proof SMTP servers that never get suspended. Email as much as you want.\r\n\r\nDMCA ignored, bulletproof locations, 100% uptime guaranteed, unlimited data transfer, and 24/7/365 support.\r\n\r\n100 Spots available. BulletProofSMTP.org', 1, '2022-04-13 00:33:48', '2022-10-10 21:48:59'),
(5, '0327 4375911', 'Would you like to send targeted messages to website owners, just like this one?\r\n\r\nContact Page Marketing..  \r\n\r\nWe will deliver your message to website owners, excellent for B2B products.\r\n\r\nhttps://cutt.ly/ChatToUs', 1, '2022-06-22 05:24:13', '2022-10-10 21:49:09'),
(6, '079 2186 1640', 'Convert napzone.games to an app with one click!\r\n\r\n80% of users browse websites from their phones. \r\n\r\nHave the App send out push notifications without any extra marketing costs!\r\n\r\nMakeMySiteMobile.com', 1, '2022-07-06 03:35:23', '2022-08-30 23:17:03'),
(7, '(02) 4088 5759', 'Hi,\r\n\r\nYour website is only listed in 8 out of a possible 12,489 directories.\r\n\r\nWe are a service that lists your website in all these directories.\r\n\r\nPlease visit us on DirectoryBump.com to find our more.\r\n\r\nRegards,\r\nEdythe Mcafee', 1, '2023-05-18 19:13:04', '2023-10-22 06:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@napzone.games', '$2y$10$9dRuH3M2ZIebgchoUESLIeKhdxOmtBSSPqechDpYjD4pQKYJc/4Yu', NULL, '2022-01-05 12:08:30', '2022-01-05 12:08:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_games`
--
ALTER TABLE `favorite_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `games_game_name_unique` (`game_name`),
  ADD UNIQUE KEY `games_game_thumbnail_unique` (`game_thumbnail`),
  ADD UNIQUE KEY `games_game_file_unique` (`game_file`);

--
-- Indexes for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_categories_game_id_foreign` (`game_id`),
  ADD KEY `game_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `game_plays`
--
ALTER TABLE `game_plays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_plays_subscriber_id_foreign` (`subscriber_id`),
  ADD KEY `game_plays_game_id_foreign` (`game_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_plans`
--
ALTER TABLE `purchase_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_plans_plan_id_foreign` (`plan_id`),
  ADD KEY `purchase_plans_subscriber_id_foreign` (`subscriber_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_unique_id_unique` (`unique_id`);

--
-- Indexes for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriber_details_subscriber_id_foreign` (`subscriber_id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_games`
--
ALTER TABLE `favorite_games`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_categories`
--
ALTER TABLE `game_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game_plays`
--
ALTER TABLE `game_plays`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_plans`
--
ALTER TABLE `purchase_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_categories`
--
ALTER TABLE `game_categories`
  ADD CONSTRAINT `game_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_categories_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `game_plays`
--
ALTER TABLE `game_plays`
  ADD CONSTRAINT `game_plays_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_plays_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_plans`
--
ALTER TABLE `purchase_plans`
  ADD CONSTRAINT `purchase_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `purchase_plans_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`);

--
-- Constraints for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  ADD CONSTRAINT `subscriber_details_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
