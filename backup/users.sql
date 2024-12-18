-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2023 at 04:58 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1734068_ehwunioleo`
--

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
(12, 'Rifa Salsabila', '000732040', 'Staff', 'Super Admin', 'rifa.salsabila@unilever.com', NULL, '$2y$10$RLE2PdMdvRQziusNW8fsyuVJI8sx.piDsSUrkVcOf024sOPiHxaui', NULL, '2023-04-27 18:39:17', '2023-05-02 19:13:05'),
(13, 'Safety Leader', '123456788', 'Staff', 'Safety Leader', 'safetyleader@unilever.com', '2023-05-03 02:26:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-05-03 02:26:26', '2023-05-03 02:26:26'),
(14, 'User', '123456787', 'Staff', 'User', 'user@unilever.com', '2023-05-03 02:27:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-05-03 02:27:28', '2023-05-03 02:27:28'),
(15, 'Admin', '123456786', 'Staff', 'Admin', 'admin@unilver.com', '2023-05-03 02:32:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2023-05-03 02:32:25', '2023-05-03 02:32:25'),
(16, 'ANDI HIDAYAT', '000517952', 'Staff', 'User', 'andi.hidayat3@unilever.com', NULL, '$2y$10$LCWcla0if4Zq5WPahrhSmesne/ttygkEELXW2EETCiM60alSi04t2', NULL, '2023-05-02 20:20:27', '2023-05-02 20:20:27'),
(17, 'Efri Dunanta Ginting', '000507569', 'Staff', 'User', 'efri.ginting@unilever.com', NULL, '$2y$10$EgtAXj2l8FXhTVpGJFs/F.u66.UJwaUoSIaJk5ZubB3jHs2hZMfRi', NULL, '2023-05-02 20:30:25', '2023-05-02 20:30:25'),
(18, 'Hendrianto', '000708082', 'Staff', 'User', 'hendrianto.hendrianto@unilever.com', NULL, '$2y$10$98mG8s1QkhRT0a4HuETvJOHDKRo7ms7b0si4JXnz88djWIf8p/NQy', NULL, '2023-05-02 20:32:45', '2023-05-02 20:32:45'),
(19, 'Rakhim', '000532590', 'Staff', 'User', 'rakhim.rakhim2@unilever.com', NULL, '$2y$10$ukPNKK0Ufy6LQqpU7gLSTeJk704q8VKkMWPV3/X5fo6DzAYs2KGw.', NULL, '2023-05-02 20:41:45', '2023-05-02 20:41:45'),
(20, 'Raja Irwansyah Putra', '000512685', 'Staff', 'User', 'Raja.putra@unilever.com', NULL, '$2y$10$2mACe7dD.Qcqqk.zs0i4d.XNRRyHs5S0esEpN3eSvZpxvv4S1cdDi', NULL, '2023-05-02 20:52:54', '2023-05-02 20:52:54'),
(21, 'jasa emardani sipayung', '000511078', 'Staff', 'User', 'jasa.sipayung@unilever.com', NULL, '$2y$10$0cwIO6KWQBkXJRkOV3IHV.gA8m162B304MGsnL3IKK.yCaz5MShB2', NULL, '2023-05-02 20:53:47', '2023-05-02 20:53:47'),
(22, 'Abdul Rasyid', '000724988', 'Staff', 'User', 'abdul.rasyid@unilever.com', NULL, '$2y$10$PUqLWlWo6nZAb0rRTfBrIuEw.X4eJEQ.XnQ9lkU/zsC4QYDU0h8NS', NULL, '2023-05-02 20:54:38', '2023-05-02 20:54:38'),
(23, 'Nuriza Aulintang', '000736617', 'Staff', 'User', 'nuriza.aulintang@unilever.com', NULL, '$2y$10$YLQdiDtDNlHL9wIP7wlSJOHuKf5lIWXPnV49TLCL6kldfWBUQX5l.', NULL, '2023-05-02 20:56:27', '2023-05-02 20:56:27'),
(24, 'Shobirin', '000509816', 'Staff', 'User', 'shobirin.shobirin@unilever.com', NULL, '$2y$10$.V7.a8ZCnC4hyWyp.LXMFOz1QYpq0zDyl5.lP7tmz8x.dc3kISd3K', NULL, '2023-05-02 21:00:02', '2023-05-02 21:00:02'),
(25, 'Yahdini Fitri Rajabi Bachtiar', '000731066', 'Staff', 'Super Admin', 'yahdini-fitri-rajabi.bachtiar@unilever.com', NULL, '$2y$10$aflazvsbXg3O3M5s2lBhV.vNeJByGuKJQwgrLHgPWZEQUFESgotCu', NULL, '2023-05-02 21:38:45', '2023-05-02 21:39:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
