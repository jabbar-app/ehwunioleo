-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2023 at 09:59 AM
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
-- Table structure for table `capacities`
--

CREATE TABLE `capacities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2023_04_16_032717_create_transports_table', 1),
(8, '2023_04_16_032810_create_dashboards_table', 1),
(9, '2023_04_16_060755_create_schedules_table', 1),
(10, '2023_04_16_061359_create_capacities_table', 1),
(11, '2023_04_16_082929_create_providers_table', 1),
(12, '2023_04_16_143017_create_reports_table', 1),
(13, '2023_04_27_073835_create_sources_table', 1);

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
  `contract_start` date NOT NULL,
  `contract_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `waste`, `address`, `contract_start`, `contract_end`, `created_at`, `updated_at`) VALUES
(1, 'PT. Sumatera Deli Lestari Indah (SDLI)', 'Glycerine Pitch, Ex Chemical Solid, Ex Chemical Liquid', 'Sei Jernih Dusun XIX, Desa, Sampali, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20371', '2014-12-12', '2024-12-12', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(2, 'PT. Prasadha Pamunah Limbah Industri (PPLI)', 'Glycerine Pitch, Ex Chemical Solid, Ex Chemical Liquid', 'Sei Jernih Dusun XIX, Desa, Sampali, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20371', '2014-12-12', '2024-12-12', '2023-04-27 00:54:53', '2023-04-27 00:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `requested_by` varchar(255) NOT NULL,
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

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `requested_by`, `waste_name`, `waste_code`, `source`, `amount`, `weight`, `packaging`, `dispose_to`, `note`, `cost`, `created_at`, `updated_at`) VALUES
(1, '2023-01-01', 'Jabbar Ali Panggabean', 'Glycerine Pitch', 'A 343-1', 'Fatty Acid', '3', '2', 'Jumbo Bag', 'PT. Sumatera Deli Lestari Indah (SDLI)', 'Catatan', '1000', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(2, '2023-01-01', 'Kamadou Tanjiro', 'Activated Carbon', 'A 110 D', 'Soap', '5', '2', 'Jumbo Bag', 'PT. Sumatera Deli Lestari Indah (SDLI)', 'Catatan', '1000', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(3, '2023-01-01', 'Kamadou Tanjiro', 'Activated Carbon', 'A 110 D', 'Soap', '5', '5', 'Jumbo Bag', 'PT. Sumatera Deli Lestari Indah (SDLI)', 'Catatan', '4000', '2023-04-27 00:54:53', '2023-04-27 00:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `requested_by` varchar(255) NOT NULL,
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

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date`, `requested_by`, `waste_name`, `waste_code`, `amount`, `weight`, `packaging`, `source`, `dispose_to`, `status`, `note`, `v_symbol`, `v_packaging`, `v_label`, `step`, `created_at`, `updated_at`) VALUES
(1, '2023-04-27', 'Jabbar Ali Panggabean', 'Glycerine Pitch', 'A 343-1', '3', '3', 'Jumbo Bag', 'Fatty Acid', 'PT. Sumatera Deli Lestari Indah (SDLI)', 'On Request', NULL, NULL, NULL, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(2, '2023-04-27', 'Kamadou Tanjiro', 'Activated Carbon', 'A 110 D', '5', '3', 'Jumbo Bag', 'Soap', 'PT. Sumatera Deli Lestari Indah (SDLI)', 'Approved', NULL, NULL, NULL, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53');

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
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `nik`, `title`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '123456789', 'Staff', 'Super Admin', 'jabbarpanggabean@gmail.com', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PXUhyrIuaX', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(2, 'Mala Yani Suryatmi', '377994933', 'Staff', 'User', 'nasyidah.karsana@example.com', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iOBJzUHiLQ', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(3, 'Kasiyah Mulyani', '202030771', 'Staff', 'User', 'wastuti.hani@example.net', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GRMaNLiZM8', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(4, 'Samiah Sudiati M.Ak', '765144536', 'Staff', 'User', 'danggriawan@example.org', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UJNqfEfPiC', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(5, 'Saadat Atmaja Wijaya', '110811910', 'Staff', 'User', 'budiyanto.nadia@example.net', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yYqJMebkRJ', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(6, 'Hilda Wahyuni', '150016375', 'Staff', 'User', 'ghani.nababan@example.com', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F3FX1aRgoW', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(7, 'Dalimin Lanang Saputra S.Sos', '135358837', 'Staff', 'User', 'rpurwanti@example.net', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n1zfz1BWra', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(8, 'Lamar Marbun', '892906626', 'Staff', 'User', 'rahayu.alika@example.net', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hxiSP8Oepe', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(9, 'Mursita Zulkarnain S.Kom', '178785282', 'Staff', 'User', 'lwidodo@example.org', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZaJ64WPZPz', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(10, 'Raina Eva Permata S.Psi', '887099899', 'Staff', 'User', 'nashiruddin.bakti@example.net', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pO15iUms63', '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(11, 'Sarah Indah Uyainah S.E.I', '182054447', 'Staff', 'User', 'hasanah.wani@example.com', '2023-04-27 00:54:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ELiKcQT8BX', '2023-04-27 00:54:53', '2023-04-27 00:54:53');

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
  `weight` int(11) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wastes`
--

INSERT INTO `wastes` (`id`, `waste_name`, `waste_code`, `packaging`, `capacity`, `weight`, `used`, `created_at`, `updated_at`) VALUES
(1, 'Activated Carbon', 'A 110 D', 'Jumbo Bag', 0, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(2, 'Ex Chemical Solid', 'A 338-1', 'Jumbo Bag', 0, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(3, 'Ex Chemical Liquid', 'A 338-1', 'IBC', 12, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(4, 'Ex Packaging', 'B 104 D', 'Box', 12, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(5, 'Filter Bekas', 'B 109 D', 'Jumbo Bag', 0, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(6, 'Glycerine Pitch', 'A 343-1', 'Jumbo Bag', 32, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(7, 'Lampu Bekas', 'B 107 D', 'Jumbo Bag', 1, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(8, 'Nickel Catalyst', 'B 343-1', 'Jumbo Bag', 20, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(9, 'Refigrant Bekas', 'A 111 D', 'Jumbo Bag', 0, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(10, 'Spent Bleaching Earth', 'B 413', 'Jumbo Bag', 20, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(11, 'Used Oil', 'B 105 D', 'Jumbo Bag', 24, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(12, 'Used Rags', 'B 110 D', 'Jumbo Bag', 12, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53'),
(13, 'WWTP Sludge', 'B 343-2', 'IBC', 22, NULL, 0, '2023-04-27 00:54:53', '2023-04-27 00:54:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capacities`
--
ALTER TABLE `capacities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
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
-- Indexes for table `transports`
--
ALTER TABLE `transports`
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
-- AUTO_INCREMENT for table `capacities`
--
ALTER TABLE `capacities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wastes`
--
ALTER TABLE `wastes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
