-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2023 at 04:06 PM
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
-- Database: `ehwunioleo`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE `dashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Fatty Acid'),
(2, NULL, NULL, 'Dove'),
(3, NULL, NULL, 'Soap'),
(4, NULL, NULL, 'Betaine'),
(5, NULL, NULL, 'Logistic'),
(6, NULL, NULL, 'HRBP'),
(7, NULL, NULL, 'Procurement'),
(8, NULL, NULL, 'Sales'),
(9, NULL, NULL, 'SHE'),
(10, NULL, NULL, 'Community Engagement'),
(11, NULL, NULL, 'Planning');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_16_032043_create_wastes_table', 1),
(7, '2023_04_16_032810_create_dashboards_table', 1),
(8, '2023_04_16_060755_create_schedules_table', 1),
(9, '2023_04_16_082929_create_providers_table', 1),
(10, '2023_04_16_143017_create_reports_table', 1),
(11, '2023_04_27_073835_create_sources_table', 1),
(12, '2023_05_11_234436_departments', 1),
(13, '2023_05_11_235443_titles', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `waste` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contract` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `waste`, `address`, `contract`, `created_at`, `updated_at`) VALUES
(1, 'PT. Sumatera Deli Lestari Indah (SDLI)', 'Glycerine Pitch, Ex Chemical Solid, Ex Chemical Liquid', 'Sei Jernih Dusun XIX, Desa, Sampali, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20371', '2014-12-12 s.d. 2015-12-12', '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(2, 'PT. Prasadha Pamunah Limbah Industri (PPLI)', 'Glycerine Pitch, Ex Chemical Solid, Ex Chemical Liquid', 'Sei Jernih Dusun XIX, Desa, Sampali, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20371', '2014-12-12 s.d. 2015-12-12', '2023-05-14 07:04:51', '2023-05-14 07:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `waste_name` varchar(255) NOT NULL,
  `waste_code` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `packaging` varchar(255) NOT NULL,
  `dispose_to` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `waste_name` varchar(255) NOT NULL,
  `waste_code` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `packaging` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `dispose_to` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `v_symbol` varchar(255) DEFAULT NULL,
  `v_packaging` varchar(255) DEFAULT NULL,
  `v_label` varchar(255) DEFAULT NULL,
  `step` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fatty Acid', NULL, NULL),
(2, 'Dove', NULL, NULL),
(3, 'Soap', NULL, NULL),
(4, 'Betaine', NULL, NULL),
(5, 'WWTP', NULL, NULL),
(6, 'Warehouse', NULL, NULL),
(7, 'Flacking Bagging', NULL, NULL),
(8, 'Tank Farm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `created_at`, `updated_at`, `title`) VALUES
(1, NULL, NULL, 'Admin'),
(2, NULL, NULL, 'Operator'),
(3, NULL, NULL, 'Team Leader'),
(4, NULL, NULL, 'Engineer'),
(5, NULL, NULL, 'Assistant Manager'),
(6, NULL, NULL, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'User',
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

INSERT INTO `users` (`id`, `name`, `nik`, `department`, `title`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '123456789', 'SHE', 'Team Leader', 'Super Admin', 'jabbarpanggabean@gmail.com', '2023-05-14 07:04:51', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MreARu2mPj', '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(2, 'Kamadou Tanjiro', '123456786', 'Logistics', 'Team Leader', 'User', 'jabbarp17@gmail.com', '2023-05-14 07:04:51', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vNYmZJFrYW', '2023-05-14 07:04:51', '2023-05-14 07:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `wastes`
--

CREATE TABLE `wastes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waste_name` varchar(255) NOT NULL,
  `waste_code` varchar(255) NOT NULL,
  `packaging` varchar(255) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wastes`
--

INSERT INTO `wastes` (`id`, `waste_name`, `waste_code`, `packaging`, `capacity`, `used`, `created_at`, `updated_at`) VALUES
(1, 'Activated Carbon', 'A 110 D', 'Jumbo Bag', 0, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(2, 'Ex Chemical Solid', 'A 338-1', 'Jumbo Bag', 0, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(3, 'Ex Chemical Liquid', 'A 338-1', 'IBC', 12, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(4, 'Ex Packaging', 'B 104 D', 'Box', 12, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(5, 'Filter Bekas', 'B 109 D', 'Jumbo Bag', 0, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(6, 'Glycerine Pitch', 'A 343-1', 'Jumbo Bag', 32, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(7, 'Lampu Bekas', 'B 107 D', 'Jumbo Bag', 1, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(8, 'Nickel Catalyst', 'B 343-1', 'Jumbo Bag', 20, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(9, 'Refigrant Bekas', 'A 111 D', 'Jumbo Bag', 0, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(10, 'Spent Bleaching Earth', 'B 413', 'Jumbo Bag', 20, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(11, 'Used Oil', 'B 105 D', 'Jumbo Bag', 24, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(12, 'Used Rags', 'B 110 D', 'Jumbo Bag', 12, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51'),
(13, 'WWTP Sludge', 'B 343-2', 'IBC', 22, 0, '2023-05-14 07:04:51', '2023-05-14 07:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wastes`
--
ALTER TABLE `wastes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wastes_waste_name_unique` (`waste_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wastes`
--
ALTER TABLE `wastes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
