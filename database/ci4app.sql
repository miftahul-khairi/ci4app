-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 05:10 PM
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
-- Database: `ci4app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `gelar_depan` varchar(50) NOT NULL,
  `gelar_belakang` varchar(50) NOT NULL,
  `nik` char(16) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `gelar_depan`, `gelar_belakang`, `nik`, `nip`, `jenis_kelamin`, `alamat`, `email`, `password`, `level`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', 'Dr.', 'M.Sc', '1234567890123456', '123456789012345678', 'Laki-laki', 'Jl. Merdeka No.1, Jakarta', 'admin@example.com', '$2y$10$zyI/xVBtxfWEi7nYQWzcC.Z/bAD02WFmRX98Ck5ds.CsRbOGIvniS', 'admin', '20250215/1739663400_54dcbf4ca4578d3f802b.png', '2025-02-16 02:06:35', '2025-02-16 17:42:04'),
(2, 'Siti Aminah', 'Prof.', 'Ph.D', '2345678901234567', '198507152023021001', 'Perempuan', 'Jl. Sudirman No.2, Bandung', 'siti@example.com', '$2y$10$dBdgJ//.YSgRQ3Ql9yzlQOJesn8BJB6Eamjq/nuHo.quSfTHKcU3G', 'user', '20250216/1739702451_c15bad6c1d02c3c03347.jpg\r\n', '2025-02-16 04:23:30', '2025-02-16 17:42:43'),
(6, 'Miftahul Khairi', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Tanjung Harapan, Kecamatan Meukek,Aceh Selatan', 'miftahulkhairi24@gmail.com', '$2y$10$fxXy/lOz0R/lWQ67j5eu0OuYqUALPxk0eEaIqk00Mm5MHcQQW8sH6', 'admin', '20250215/1739663400_54dcbf4ca4578d3f802b.png', '2025-02-16 06:50:00', '2025-02-16 06:50:00'),
(8, 'Judinman', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Dusun Ahya, Gampong Tanjung Harapan, Kecamtan Meukek, Kabupaten Aceh Selatan, Provinsi Aceh', 'judinman@gmail.com', '$2y$10$MKFkk64zTe.kh.wdPJcJ9.vpMTIXMnu9BF6hKhf4FHFJdT.5MdTh.', 'user', '20250216/1739697670_a31784b40fa1f35ea863.jpg', '2025-02-16 16:21:10', '2025-02-16 16:21:10'),
(9, 'Ani Khairani', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Banda Aceh', 'anikhairani@gmail.com', '$2y$10$SVlfMO2r3Swenibefl793uucffxuWDNVg/umnaRPcny.KwVbQ5Wry', 'user', '20250216/1739702451_c15bad6c1d02c3c03347.jpg', '2025-02-16 17:40:52', '2025-02-16 17:40:52'),
(10, 'Test', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Tanjung Harapan, Kecamatan Meukek,Aceh Selatan', 'test@gmail.com', '$2y$10$mz6VJq1.qXHL4QzC.y.wa.wOOwB/.5iUViVISbw13wcDfoIA04GuK', 'user', '20250216/1739706877_7aa33c160dc0ca3a33fe.jpg', '2025-02-16 18:54:37', '2025-02-16 18:54:37'),
(11, 'Test01', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Dusun Ahya, Gampong Tanjung Harapan, Kecamtan Meukek, Kabupaten Aceh Selatan, Provinsi Aceh', 'test01@gmail.com', '$2y$10$qNyovavSbHCCmdyADxq1OuhAd9XxAsHyPr8uoYzHYjDGNFz/f1XkC', 'user', '20250216/1739708688_e0d5405667cb1e4ad7c8.jpg', '2025-02-16 19:24:48', '2025-02-16 19:24:48'),
(12, 'ariana', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Tanjung Harapan, Kecamatan Meukek,Aceh Selatan', 'test02@gmail.com', '$2y$10$lvF3oJT5WhNozlJD8hCXP.PoXkqEEsXhk0/X5QbyZf1v5v2nXdLlO', 'user', '20250216/1739709553_e77a8144c763d3b79caa.jpg', '2025-02-16 19:39:13', '2025-02-16 19:39:13'),
(13, 'test03', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Tanjung Harapan, Kecamatan Meukek,Aceh Selatan', 'test03@gmail.com', '$2y$10$.yUdpraR9W9ez.aufF3Fhel2uHlAGXZ0oBH1Jvb1KWnLlXelhW/Ri', 'user', '20250216/1739712183_04194a6f506e6293354c.jpg', '2025-02-16 20:23:03', '2025-02-16 20:23:03'),
(14, 'test empat', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Tanjung Harapan, Kecamatan Meukek,Aceh Selatan', 'test04@gmail.com', '$2y$10$ALDRYbYS3YmIgt.YafL1RO8R3kOjF58lGL3P9hLsXLIjmB17QinGa', 'user', '20250216/1739719912_1e290576a88f7d2238ec.jpg', '2025-02-16 22:31:52', '2025-02-16 22:31:52'),
(15, 'test enam', 'Prof.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Tanjung Harapan, Kecamatan Meukek,Aceh Selatan', 'test06@gmail.com', '$2y$10$0IuLwu7mA7BXJhun25yn9.2FqaQo9zJYLQb.eS9b/PUt9dRDAadHe', 'user', '20250216/1739721446_2f0d92a6183a18f2a84c.jpg', '2025-02-16 22:57:26', '2025-02-16 22:57:26'),
(16, 'Asrul Navis', 'Dr.', 'S. Kom., M.Sc', '1101052401970001', '197811302018041003', '', 'Labuhan Tarok', 'asrulnavis@gmail.com', '$2y$10$klQhdrkkTn22e4Vy0wAu7.W7aXNS9vd2RtBP8UImLMsoVlFoFDdSG', 'user', '20250216/1739721940_7f4154b857454f6f26b3.jpg', '2025-02-16 23:05:40', '2025-02-16 23:05:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
