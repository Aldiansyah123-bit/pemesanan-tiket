-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2022 at 02:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemesanan_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Tiket Kereta Api', '2021-06-29 04:46:45', '2021-06-29 02:12:50'),
(3, 'Tiket Pesawat', '2021-06-29 00:47:40', '2021-06-29 01:19:57'),
(4, 'Musik', '2021-06-29 03:23:01', '2021-06-29 03:23:01'),
(5, 'Tiket Bus', '2021-06-30 00:34:30', '2021-06-30 00:34:30'),
(6, 'Tiket Travel', '2021-06-30 00:34:30', '2021-06-30 00:34:30'),
(7, 'Tiket Hotel', '2021-06-30 00:34:30', '2021-06-30 00:34:30'),
(8, 'Tiket Wisata', '2021-06-30 00:34:30', '2021-06-30 00:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_29_035734_create_kategoris_table', 2),
(5, '2021_06_29_082908_create_tikets_table', 3),
(6, '2021_06_29_102719_create_transaksis_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$dHGPPxZUN2gq8Y3iwxSh/.KDke5U4me5MDdPAJLBU7Zt9jmqJbDNi', '2021-06-28 20:16:59'),
('user@gmail.com', '$2y$10$ZwYOfvbVzt5W/V/K2EqZi.8SkS6vZaOOmY4u0wMaKj4rs4Yb2DCVy', '2021-06-28 20:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `tikets`
--

CREATE TABLE `tikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tiket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tiket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `harga_tiket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tikets`
--

INSERT INTO `tikets` (`id`, `nama_tiket`, `jenis_tiket`, `id_kategori`, `jumlah_tiket`, `harga_tiket`, `created_at`, `updated_at`) VALUES
(1, 'Tiket Konser', 'Koser', 4, 5, '30.000', NULL, '2021-06-30 00:43:36'),
(3, 'Tiket Konser Noah', 'Koser', 4, 3, '500.000', '2021-06-29 16:40:47', '2021-06-30 00:41:49'),
(4, 'Tiket Kereta Eksekutif', 'Tiket Kereta', 1, 30, '350.000', '2021-06-29 19:29:29', '2021-06-30 00:47:35'),
(5, 'Tiket Pesawat Eksekutif', 'Tiket Pesawat', 3, 34, '1.000.000', '2021-06-29 19:30:28', '2021-06-30 00:47:44'),
(6, 'Tiket Bus', 'Tiket Bus', 5, 45, '500.000', '2021-06-30 00:44:55', '2021-06-30 00:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tiket` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_tiket`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 1, '2021-06-29 23:16:57', '2021-06-29 17:01:00'),
(2, 3, '2', 1, '2021-06-29 16:46:02', '2021-06-29 17:01:00'),
(4, 4, '4', 1, '2021-06-29 19:40:12', '2021-06-29 19:40:20'),
(7, 3, '2', 1, '2021-06-29 20:26:08', '2021-06-29 20:26:30'),
(18, 3, '5', 1, '2021-06-29 20:48:41', '2021-06-29 20:48:52'),
(22, 3, '2', 1, '2021-06-29 21:04:57', '2021-06-29 21:05:00'),
(23, 5, '5', 1, '2021-06-29 22:17:52', '2021-06-29 22:17:57'),
(24, 5, '5', 1, '2021-06-29 22:18:16', '2021-06-29 22:18:18'),
(26, 5, '1', 1, '2021-06-29 23:34:29', '2021-06-30 01:19:50'),
(27, 3, '5', 1, '2021-06-29 23:34:39', '2021-06-30 01:19:50'),
(28, 3, '5', 1, '2021-06-30 01:20:10', '2021-06-30 01:20:12'),
(29, 1, '5', 1, '2021-06-30 01:20:38', '2021-06-30 01:20:42'),
(31, 1, '5', 1, '2021-07-12 21:23:57', '2022-01-28 04:30:54'),
(32, 3, '2', 0, '2022-01-28 04:33:28', '2022-01-28 04:33:28');

--
-- Triggers `transaksis`
--
DELIMITER $$
CREATE TRIGGER `batal_penjualan` AFTER DELETE ON `transaksis` FOR EACH ROW BEGIN
	UPDATE tikets SET jumlah_tiket=jumlah_tiket+OLD.qty
    WHERE id=OLD.id_tiket;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `penjualan_tiket` AFTER INSERT ON `transaksis` FOR EACH ROW BEGIN 
	UPDATE tikets SET jumlah_tiket=jumlah_tiket-NEW.qty 
    WHERE id=NEW.id_tiket; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'aldiansyahunip@gmail.com', '2021-06-28 20:42:34', '$2y$10$pJWLCPtRsEsOKTnKjbGEAeUSCvJyoajJ/wqNZgEw6v7xnwKKaC9mO', NULL, '2021-06-28 20:42:07', '2021-06-28 20:42:34'),
(2, 'User', 'user@gmail.com', '2021-06-28 20:43:31', '$2y$10$eNraSZyahq.7K5.KqvI.Lufal1phJS/fwbNCDCU/rMjnaxtJpTony', NULL, '2021-06-28 20:43:16', '2021-06-28 20:43:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tikets_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_id_tiket_foreign` (`id_tiket`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tikets`
--
ALTER TABLE `tikets`
  ADD CONSTRAINT `tikets_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`);

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_id_tiket_foreign` FOREIGN KEY (`id_tiket`) REFERENCES `tikets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
