-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 08:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_10276`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status` enum('belum','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `admin_id`, `judul`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Agenda A', '2021-11-24', '07:15:00', '15:00:00', 'selesai', '2021-11-21 18:09:26', '2021-11-21 20:55:09'),
(2, 1, 'Agenda B', '2021-11-25', '09:05:00', '14:00:00', 'selesai', '2021-11-21 20:59:45', '2021-11-21 21:01:11'),
(3, 1, 'Agenda C', '2021-12-01', '10:07:00', '21:13:00', 'selesai', '2021-11-21 21:08:00', '2021-11-22 09:11:46'),
(5, 1, 'Agenda E', '2021-11-29', '17:05:00', '20:00:00', 'selesai', '2021-11-22 08:56:31', '2021-11-22 12:30:58'),
(7, 1, 'Agenda G', '2021-11-30', '20:40:00', '22:40:00', 'belum', '2021-11-22 12:38:41', '2021-11-22 12:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `detail_agenda`
--

CREATE TABLE `detail_agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agenda_id` bigint(20) UNSIGNED NOT NULL,
  `pekerja_id` bigint(20) UNSIGNED NOT NULL,
  `persediaan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_agenda`
--

INSERT INTO `detail_agenda` (`id`, `agenda_id`, `pekerja_id`, `persediaan_id`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 100, '2021-11-21 20:55:09', '2021-11-21 20:55:09'),
(3, 2, 1, 3, 100, '2021-11-21 21:01:11', '2021-11-21 21:01:11'),
(4, 3, 1, 3, 100, '2021-11-22 09:11:46', '2021-11-22 09:11:46'),
(5, 5, 3, 3, 50, '2021-11-22 12:30:58', '2021-11-22 12:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `detail_persediaan`
--

CREATE TABLE `detail_persediaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `persediaan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_awal` int(11) DEFAULT NULL,
  `jumlah_akhir` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_persediaan`
--

INSERT INTO `detail_persediaan` (`id`, `persediaan_id`, `jumlah_awal`, `jumlah_akhir`, `created_at`, `updated_at`) VALUES
(18, 7, 0, 500, '2021-11-23 07:44:52', '2021-11-23 07:44:52'),
(19, 8, 0, 500, '2021-11-23 07:46:52', '2021-11-23 07:46:52');

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
(5, '2021_09_30_003514_create_agenda_ulangi_table', 1),
(6, '2021_09_30_072839_create_child_agenda_ulangi', 1),
(10, '2014_10_12_000000_create_users_table', 2),
(11, '2021_09_29_151847_create_agenda_table', 2),
(12, '2021_11_21_235509_create_pekerja_table', 2),
(13, '2021_11_22_002539_create_persediaan_table', 2),
(14, '2021_11_22_005646_create_detail_persediaan_table', 2),
(15, '2021_11_22_014630_create_detail_agenda_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id`, `nama`, `telepon`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ahmad Widodo', '081235364738', 'Banyuwangi - Jatim', '2021-11-21 18:09:34', '2021-11-23 07:49:25', '2021-11-23'),
(3, 'Rio Alvian', '0812637483712', 'Malang - Jatim', '2021-11-22 08:59:46', '2021-11-23 07:41:39', '2021-11-23'),
(5, 'Sunaryo Astaman', '081235364783', 'Malang - Jawa Timur', '2021-11-23 07:47:14', '2021-11-23 07:47:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id`, `nama_barang`, `tanggal_masuk`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Semen Tiga Roda', '2021-11-17', 100, '2021-11-21 18:21:32', '2021-11-23 07:40:04', NULL),
(3, 'Batu Bata', '2021-11-18', 50, '2021-11-21 18:41:33', '2021-11-23 07:39:59', NULL),
(6, 'Cat', '2021-11-22', 250, '2021-11-23 07:43:25', '2021-11-23 07:43:25', NULL),
(7, 'Semen', '2021-11-22', 500, '2021-11-23 07:44:52', '2021-11-23 07:44:52', NULL),
(8, 'Pasir', '2021-11-22', 500, '2021-11-23 07:46:52', '2021-11-23 07:46:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pemilik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Biasa', 'admin', '$2y$10$kcFLvHNjqdws5Pvt5ekxlOWu5DcT2U4n0jxL3A0Bt9GB2J8eTBhpy', 'admin', NULL, '2021-11-21 17:00:00', '2021-11-23 06:10:13'),
(2, 'Pemilik', 'pemilik', '$2y$10$vZp8/CLPkqE4dX0LCLkf1.S4P1z39JJ405xoFZjoBYkg6pnRlyZkW', 'pemilik', NULL, '2021-11-21 17:00:00', '2021-11-21 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agenda_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `detail_agenda`
--
ALTER TABLE `detail_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_agenda_agenda_id_foreign` (`agenda_id`),
  ADD KEY `detail_agenda_pekerja_id_foreign` (`pekerja_id`),
  ADD KEY `detail_agenda_persediaan_id_foreign` (`persediaan_id`);

--
-- Indexes for table `detail_persediaan`
--
ALTER TABLE `detail_persediaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_persediaan_persediaan_id_foreign` (`persediaan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_agenda`
--
ALTER TABLE `detail_agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_persediaan`
--
ALTER TABLE `detail_persediaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_agenda`
--
ALTER TABLE `detail_agenda`
  ADD CONSTRAINT `detail_agenda_agenda_id_foreign` FOREIGN KEY (`agenda_id`) REFERENCES `agenda` (`id`),
  ADD CONSTRAINT `detail_agenda_pekerja_id_foreign` FOREIGN KEY (`pekerja_id`) REFERENCES `pekerja` (`id`),
  ADD CONSTRAINT `detail_agenda_persediaan_id_foreign` FOREIGN KEY (`persediaan_id`) REFERENCES `persediaan` (`id`);

--
-- Constraints for table `detail_persediaan`
--
ALTER TABLE `detail_persediaan`
  ADD CONSTRAINT `detail_persediaan_persediaan_id_foreign` FOREIGN KEY (`persediaan_id`) REFERENCES `persediaan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
