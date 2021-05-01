-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2021 at 02:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiflux_mvp`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `photo_campaign` varchar(50) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `tipe` tinyint(4) NOT NULL,
  `biaya` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `jenis` tinyint(4) NOT NULL,
  `laporan` date NOT NULL,
  `post` date NOT NULL,
  `deskripsi` text NOT NULL,
  `syarat` text NOT NULL,
  `status_campaign` tinyint(4) NOT NULL,
  `id_user` int(11) NOT NULL,
  `payment` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id_campaign`, `nama`, `photo_campaign`, `produk`, `tipe`, `biaya`, `deadline`, `jenis`, `laporan`, `post`, `deskripsi`, `syarat`, `status_campaign`, `id_user`, `payment`) VALUES
(1, 'Campaign 1', '161725305312.jpg', 'Produk 1', 0, 10000000, '2021-04-01', 0, '2021-04-15', '2021-04-08', 'asd', 'asd', 1, 12, 1),
(2, 'Private 1', '161735174812.jpg', 'produk 2', 1, 5000, '2021-04-03', 0, '2021-04-16', '2021-04-09', '', 'seperti kamu', 1, 12, 0),
(3, 'Campaign 2', '161735547512.jpg', 'Produk 2', 0, 2000, '2021-04-03', 0, '2021-04-23', '2021-04-09', 'asdasd', 'asdasdasd', 1, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_process`
--

CREATE TABLE `campaign_process` (
  `id_process` int(11) NOT NULL,
  `id_campaign` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `shortcode` varchar(20) DEFAULT '',
  `url_photo` varchar(500) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `share` int(11) DEFAULT 0,
  `jangkauan` int(11) NOT NULL DEFAULT 0,
  `bukti` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign_process`
--

INSERT INTO `campaign_process` (`id_process`, `id_campaign`, `id_user`, `status`, `shortcode`, `url_photo`, `likes`, `comments`, `share`, `jangkauan`, `bukti`) VALUES
(1, 1, 13, 1, 'B98cMUjg7cM', 'https://scontent-cgk1-1.cdninstagram.com/v/t51.2885-15/e35/90511092_194445358515467_6630321988623569869_n.jpg?tp=1&_nc_ht=scontent-cgk1-1.cdninstagram.com&_nc_cat=111&_nc_ohc=0wyg2J3x1RcAX81OaMy&edm=ALQROFkAAAAA&ccb=7-4&oh=3c212dd4dcde7fa271d71d1c7a497506&oe=608AF8BF&_nc_sid=30a2ef&ig_cache_key=MjI2ODgxMjMwNDI5NDU5MDIyMA%3D%3D.2-ccb7-4', 1, 0, 100, 0, 'Bukti16173459811.png'),
(3, 3, 13, 1, 'B98cMUjg7cM', 'https://scontent-cgk1-1.cdninstagram.com/v/t51.2885-15/e35/90511092_194445358515467_6630321988623569869_n.jpg?tp=1&_nc_ht=scontent-cgk1-1.cdninstagram.com&_nc_cat=111&_nc_ohc=0wyg2J3x1RcAX8rlsRK&edm=ALQROFkAAAAA&ccb=7-4&oh=3b655f54b79b5250feb89999f859e76c&oe=608AF8BF&_nc_sid=30a2ef&ig_cache_key=MjI2ODgxMjMwNDI5NDU5MDIyMA%3D%3D.2-ccb7-4', 1, 0, 1000, 1000, 'Bukti16173559223.jpg'),
(4, 2, 13, 0, '', NULL, NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daerah_campaign`
--

CREATE TABLE `daerah_campaign` (
  `id_daerah` int(11) NOT NULL,
  `daerah` varchar(50) NOT NULL,
  `id_campaign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daerah_campaign`
--

INSERT INTO `daerah_campaign` (`id_daerah`, `daerah`, `id_campaign`) VALUES
(1, 'malang', 1),
(2, 'surabaya', 1),
(3, 'malang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `daerah_user`
--

CREATE TABLE `daerah_user` (
  `id_daerah` int(11) NOT NULL,
  `daerah` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `influencer`
--

CREATE TABLE `influencer` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `following` int(11) NOT NULL,
  `follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `influencer`
--

INSERT INTO `influencer` (`id`, `username`, `nama`, `following`, `follower`) VALUES
(13, 'madl33ts', 'Jack Sparrow', 17, 356);

-- --------------------------------------------------------

--
-- Table structure for table `master_tag`
--

CREATE TABLE `master_tag` (
  `id_master` int(11) NOT NULL,
  `deskripsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_tag`
--

INSERT INTO `master_tag` (`id_master`, `deskripsi`) VALUES
(1, 'Foodies'),
(2, 'Lifestyle');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_example`
--

CREATE TABLE `photo_example` (
  `id_photo` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `id_campaign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo_example`
--

INSERT INTO `photo_example` (`id_photo`, `filename`, `id_campaign`) VALUES
(1, '16172530531_example0.png', 1),
(2, '16172530531_example1.jpeg', 1),
(3, '16172530531_example2.png', 1),
(4, '16173517482_example0.png', 2),
(5, '16173517482_example1.png', 2),
(6, '16173517482_example2.png', 2),
(7, '16173554753_example0.png', 3),
(8, '16173554753_example1.png', 3),
(9, '16173554753_example2.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk_tag`
--

CREATE TABLE `produk_tag` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_campaign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_tag`
--

INSERT INTO `produk_tag` (`id`, `id_master`, `id_campaign`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `id_master`, `id_user`) VALUES
(1, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `no_hp` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `photo`, `no_hp`) VALUES
(1, 'kosong', 'kosong@gmail.com', NULL, '$2y$10$wFZ98HF95BE.LEmAjC/avesaVh.q/fNXv4YOHJx6/HHEcgthIUGe.', NULL, '2021-03-11 18:23:10', '2021-03-11 18:23:10', 0, '', ''),
(12, 'coba', 'kosongblong2@gmail.com', '2021-03-30 05:54:23', '$2y$10$wFZ98HF95BE.LEmAjC/avesaVh.q/fNXv4YOHJx6/HHEcgthIUGe.', NULL, '2021-03-30 05:53:15', '2021-03-30 05:55:06', 1, '1617108918.jpg', '085123123123'),
(13, 'Influencer 1', 'kosongisnotzero@gmail.com', '2021-03-31 02:08:26', '$2y$10$wFZ98HF95BE.LEmAjC/avesaVh.q/fNXv4YOHJx6/HHEcgthIUGe.', NULL, '2021-03-31 01:46:34', '2021-03-31 02:08:58', 2, '1617181751.jpg', '089123123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id_campaign`);

--
-- Indexes for table `campaign_process`
--
ALTER TABLE `campaign_process`
  ADD PRIMARY KEY (`id_process`);

--
-- Indexes for table `daerah_campaign`
--
ALTER TABLE `daerah_campaign`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `daerah_user`
--
ALTER TABLE `daerah_user`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `influencer`
--
ALTER TABLE `influencer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_tag`
--
ALTER TABLE `master_tag`
  ADD PRIMARY KEY (`id_master`);

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
-- Indexes for table `photo_example`
--
ALTER TABLE `photo_example`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `produk_tag`
--
ALTER TABLE `produk_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
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
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id_campaign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaign_process`
--
ALTER TABLE `campaign_process`
  MODIFY `id_process` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daerah_campaign`
--
ALTER TABLE `daerah_campaign`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daerah_user`
--
ALTER TABLE `daerah_user`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_tag`
--
ALTER TABLE `master_tag`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo_example`
--
ALTER TABLE `photo_example`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk_tag`
--
ALTER TABLE `produk_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
