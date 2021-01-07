-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021 年 1 朁E07 日 13:44
-- サーバのバージョン： 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsacf_d07_19`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `score_table`
--

CREATE TABLE `score_table` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `weather` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `out_score` int(10) NOT NULL,
  `in_score` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `score_table`
--

INSERT INTO `score_table` (`id`, `date`, `weather`, `place`, `name_1`, `name_2`, `name_3`, `out_score`, `in_score`, `total`, `updated_at`) VALUES
(2, '2021-01-22', '曇り', '大博多', '進藤理恵', '進藤理恵', '進藤理恵', 50, 40, 90, '0000-00-00 00:00:00'),
(3, '2021-01-20', '大雨', '伊都ゴルフ', '進藤', '田中', '大山', 50, 60, 110, '0000-00-00 00:00:00'),
(5, '0000-00-00', 'みぞれ', '小郡カントリークラブ', '佐々木', '汐待', '児島', 60, 50, 110, '2021-01-06 22:38:17'),
(7, '2021-01-14', '曇り', '大博多', '進藤理恵', '進藤理恵', '進藤理恵', 30, 70, 100, '0000-00-00 00:00:00'),
(8, '0000-00-00', '曇り', '大博多', '進藤理恵', '進藤理恵', '進藤理恵', 20, 79, 99, '2021-01-06 22:37:59'),
(9, '2021-01-27', '曇り', '麻生飯塚', '田中', '那珂川', '山田', 30, 50, 80, '0000-00-00 00:00:00'),
(10, '2020-11-11', '大雨', 'レイクサイド', '田端', 'タナベ', '山田', 45, 60, 105, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score_table`
--
ALTER TABLE `score_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score_table`
--
ALTER TABLE `score_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
