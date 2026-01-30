-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2026 at 05:14 PM
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
-- Database: `treasure`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `judul`, `tahun`, `cover`, `tipe`, `deskripsi`) VALUES
(1, 'LOVE PULSE', '2024', 'newalbum.jpg', 'Mini Album', 'yuhuu\r\n'),
(2, 'REBOOT', '2023', 'reboot.jpg', 'Full Album', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `funfact` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `funfact`, `foto`) VALUES
(1, 'Choi Hyunsuk', 'Seoul', '1999-04-21', 'Leader & Rapper', 'Hyunsuk.jpg'),
(2, 'Park Jihoon', 'Busan', '2000-03-14', 'Leader & Vocalist', 'Jihoon.jpg'),
(3, 'Kim Junkyu', 'Chungju', '2000-09-09', 'Vocalist & Mood Maker', 'Junkyu.jpg'),
(4, 'Yoshi', 'Kobe', '2000-05-15', 'High Tone Rapper', 'Yoshi.jpg'),
(5, 'Yoon Jaehyuk', 'Seoul', '2001-07-23', 'Vocalist & Visual', 'Jaehyuk.jpg'),
(6, 'Asahi', 'Osaka', '2001-08-20', 'Producer & Vocalist', 'Asahi.jpg'),
(7, 'Kim Doyoung', 'Seoul', '2003-12-04', 'Main Dancer', 'Doyoung.jpg'),
(8, 'Haruto', 'Fukuoka', '2004-04-05', 'Low Tone Rapper', 'Haruto.jpg'),
(9, 'Park Jeongwoo', 'Iksan', '2004-09-28', 'Main Vocalist', 'Jeongwoo.jpg'),
(10, 'Seo Junghwan', 'Iksan', '2005-02-18', 'Maknae & Dancer', 'Junghwan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `album` varchar(100) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `cover_url` varchar(255) DEFAULT 'default_cover.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `no_hp`, `password`, `role`) VALUES
(1, 'Bang Yedam', 'yedambang', 'yedam@gmail.com', '0850020211', '$2y$10$xKOh44tuwbhDETBi0uEkwe39ARpY06QK6WcwUJU7tuCc3HC5r5YUS', 'user'),
(2, 'Takata Mashiho', 'mashihomashi', 'takatamashiho@gmail.com', '08123654789', '$2y$10$Pnwc7Ha.EcE66RACuuRVKOcE8hbk54i8EYGJxL2TZCq24ojAbiXvy', 'user'),
(3, NULL, 'teume', NULL, NULL, '9970fb986af6c58182b48e92c73f1c67', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
