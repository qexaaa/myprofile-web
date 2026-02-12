-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2026 at 05:15 AM
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
-- Database: `portofolio_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(6, 'Sertifikat LGKM', 'certificates/Z6dnkxikLEGJFndg1dY3sVMnAdapimoo5Kt070B8.png', '2026-02-05 18:35:12', '2026-02-08 23:09:27'),
(7, 'Peserta Seminar Nasional HIMIFDA 2025 – Perlindungan Data Pribadi di Era Digital', 'certificates/z2Yxi8ebyJlVfwb7qAWUrLojEI8PKD678HyZpdPd.png', '2026-02-08 23:18:03', '2026-02-09 20:29:46'),
(8, 'Peserta Seminar Investasi – Sukses Mengelola Pendapatan dengan Berinvestasi', 'certificates/jnjXzHpyUoZy0S9gGEPOsLoPdesk6rzqVd4QukbS.png', '2026-02-08 23:18:19', '2026-02-09 20:24:58'),
(9, 'Peserta Seminar Teknologi Teknik Festival 2024 – Internet of Things & Artificial Intelligence', 'certificates/3eM7umItAtzIM7VVfcI9jgpHuSnfiF8KGALcNObz.png', '2026-02-08 23:18:34', '2026-02-09 20:24:37'),
(10, 'Peserta Seminar Nasional & Talkshow INFESTION 2023 – Industrial Festival & Competition', 'certificates/viGFsnelRuKIvfxBFD74eYIViR5L6pGTz2wbDALm.png', '2026-02-08 23:18:50', '2026-02-09 20:29:16'),
(11, 'Python Introduction for Data Analysis – MySkill Short Class', 'certificates/4nUBP4O54KTggeDAsPYctuKKFxFaVJwqDXjVDRfb.png', '2026-02-08 23:19:05', '2026-02-09 20:11:03'),
(12, 'Data Visualization with Looker Data Studio – MySkill Short Class', 'certificates/phFiBtrLWup3InDIwyoNdSK6DcqhFz4WTsIHGYQr.png', '2026-02-08 23:19:24', '2026-02-09 20:10:28'),
(13, 'Juara 3 – Lomba Gagasan Kreatif Mahasiswa', 'certificates/QBY7GcwTh8v3JWYccbnoXkFl2UZFMLMaFvXDSuz0.png', '2026-02-08 23:19:37', '2026-02-09 20:01:19');

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
(4, '2026_02_04_074433_create_portfolios_table', 1),
(5, '2026_02_04_074505_create_skills_table', 1),
(6, '2026_02_04_074545_create_certificates_table', 1),
(7, '2026_02_04_081259_create_profiles_table', 2),
(8, '2026_02_06_140326_remove_tech_stack_from_portfolios', 3),
(9, '2026_02_07_024652_add_name_and_cv_to_profiles_table', 3),
(10, '2026_02_08_080557_add_hero_background_to_profiles_table', 4),
(11, '2026_02_08_085002_add_avatar_to_profiles_table', 5),
(12, '2026_02_08_154916_add_instagram_to_profiles_table', 6),
(13, '2026_02_09_023244_remove_cv_from_profiles_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `description`, `image`, `github_link`, `created_at`, `updated_at`) VALUES
(3, 'Aplikasi Reservasi Padel Mobile', 'Membuat Aplikasi Reservasi Padel Mobile menggunakan Android Studio dengan bahasa pemrograman Flutter', 'portfolios/o1Dvy9unX9CPPyncxD1kvaVdeXI8PW5UC3PYXSfY.png', 'https://github.com/qexaaa/aplikasi_reservasi_padel', '2026-02-07 07:04:54', '2026-02-07 09:42:51'),
(4, 'Sistem Struk Belanja Mini Market – Java', 'Project ini merupakan aplikasi Sistem Struk Belanja Mini Market berbasis Java yang dirancang untuk mensimulasikan proses transaksi penjualan pada mini market.\r\nAplikasi ini mampu mencatat data barang, menghitung total belanja secara otomatis, serta menghasilkan struk belanja berdasarkan input transaksi.\r\nMelalui project ini, saya melatih logika pemrograman Java, pengolahan data transaksi, serta penerapan konsep dasar aplikasi kasir sederhana.', 'portfolios/5iHTw2SEnXBB2S7BZspKdwyC9dtFn7nlNoubvQYx.png', 'https://github.com/qexaaa/Sistem-Struk-Belanja-Mini-Market', '2026-02-08 23:14:57', '2026-02-09 19:33:57'),
(5, 'Web App To-Do List – PHP Native & MySQL', 'Project ini merupakan aplikasi Web To-Do List berbasis PHP Native dan MySQL yang dirancang untuk membantu pengguna dalam mengelola daftar tugas secara sederhana dan efisien.\r\nAplikasi ini memiliki fitur CRUD (Create, Read, Update, Delete) untuk manajemen tugas, serta menggunakan konsep dasar pengolahan data dan interaksi database.\r\nProject ini dibuat sebagai latihan penguatan logika pemrograman web, pengelolaan database, dan implementasi fitur dasar aplikasi berbasis web.', 'portfolios/tCuCXF9BxFunXNnkgXOBZIo6jMorcomS5kjy4Qf7.png', 'https://github.com/qexaaa/Web-App-To-Do-List', '2026-02-08 23:15:11', '2026-02-09 19:27:16'),
(6, 'Python Introduction & Data Visualization – Short Class MySkill', 'Project ini merupakan hasil Short Class Data Science & Data Analysis by MySkill yang berfokus pada pengenalan Python untuk pengolahan dan visualisasi data.\r\nDalam project ini, saya mempelajari dasar Python, melakukan eksplorasi dataset menggunakan Google Colab, serta mempraktikkan proses analisis data sesuai arahan tutor.\r\nHasil pembelajaran dirangkum dalam bentuk course summary dan screenshot praktik Python, yang digunakan sebagai portofolio pembelajaran dan pengembangan skill di bidang data.', 'portfolios/DRgcNomDPMx4pYNhYiby5i9WfStBnpILsnsHqM4e.png', NULL, '2026-02-08 23:15:23', '2026-02-09 18:09:47'),
(7, 'Data Visualization with Looker - Short Class MySkill', 'Membuat Visualisasi Data dengan Google Looker Studio', 'portfolios/JNlGTv6uZKNvtlWWpbD4EaeuejTmWrVbyw9YkFNn.png', NULL, '2026-02-08 23:15:36', '2026-02-09 18:10:07'),
(8, 'K-Nearest Neighbour', 'Proyek ini berfokus pada eksplorasi dan analisis dataset klasik Iris menggunakan teknik dasar dalam ilmu data seperti visualisasi, preprocessing, dan klasifikasi.', 'portfolios/OFqpgif2pBQnfWVEvCv29jts6JrDEGyJB6ONjjFZ.png', 'https://github.com/qexaaa/K-Nearest-Neighbour', '2026-02-08 23:16:05', '2026-02-09 17:46:58'),
(9, 'Aplikasi Reservasi Padel Mobile', 'Membuat Aplikasi Reservasi Padel Mobile menggunakan Android Studio dengan bahasa pemrograman Flutter', 'portfolios/VKN6FoKPTA5vtoz6HjKMzujSif4dtXBDDD2ctckc.png', 'https://github.com/qexaaa/aplikasi_reservasi_padel', '2026-02-08 23:16:20', '2026-02-09 17:17:02'),
(10, 'Reservasi Padel dengan Laravel', 'Membuat website reservasi padel dengan framework Laravel', 'portfolios/X27uHs8iSn0FYyT5bkTo2sgP08wZBi7eFo6vMYag.png', NULL, '2026-02-08 23:17:40', '2026-02-09 17:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `about` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `hero_background` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `about`, `email`, `linkedin`, `github`, `instagram`, `avatar`, `hero_background`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Saoki Ramada', 'Mahasiswa Unsada yang mempelajari bidang Teknologi Informasi', 'saoki.ramada@gmail.com', 'https://www.linkedin.com/in/muhammadsaokiramada/', 'https://github.com/qexaaa', 'https://www.instagram.com/rmd.kiou/', 'profile/iE5B7Vd4XeYfmNawLUwTMKcEXL2hjTD2vL21NS92.jpg', 'profile/AK6S8RFpSUy0OGKTNAuoC7JTUIuRkkROfdD1KhKP.jpg', '2026-02-08 01:37:01', '2026-02-09 17:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `level`, `created_at`, `updated_at`) VALUES
(5, 'HTML', 70, '2026-02-05 18:31:59', '2026-02-09 02:37:37'),
(6, 'CSS', 60, '2026-02-08 20:49:59', '2026-02-08 20:55:25'),
(7, 'PHP', 80, '2026-02-08 20:50:26', '2026-02-09 02:37:24'),
(8, 'Laravel', 85, '2026-02-08 20:51:14', '2026-02-08 20:54:53'),
(9, 'JavaScript', 40, '2026-02-08 20:51:34', '2026-02-08 20:51:34'),
(10, 'Pyhton', 50, '2026-02-08 20:52:34', '2026-02-08 20:52:34');

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
(1, 'Admin', 'admin@gmail.com', NULL, '482c811da5d5b4bc6d497ffa98491e38', NULL, '2026-02-04 16:46:49', '2026-02-04 16:46:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
