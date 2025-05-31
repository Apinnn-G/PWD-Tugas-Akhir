-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 02:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `judul`, `durasi`, `genre`, `gambar`) VALUES
(1, '0', '1', '0', '0'),
(2, '0', '1', '0', '0'),
(3, '0', '1', '0', '0'),
(4, '0', '1', '0', '0'),
(5, '0', '1', '0', '0'),
(6, '0', '1', '0', '0'),
(7, '0', '1', '0', '0'),
(8, '0', '1', '0', '0'),
(9, '0', '2', '0', '0'),
(10, '0', '2', '0', '0'),
(11, 'Lilo & Stitch', '1h 48m', 'Adventure', 'm1.jpg'),
(12, 'Cocote Tonggo', '1h 57m', 'Comedy', 'm2.jpg'),
(13, 'Pembantaian Dukun Santet', '1h 32m', 'Horror', 'm3.jpg'),
(14, 'Mungkin Kita Perlu Waktu', '1h 38m', 'Family, Drama', 'm4.jpg'),
(15, 'Pengepungan Di Bukit Duri', '1h 58m', 'Thriller', 'm5.jpg'),
(16, 'Mendadak Dangdut', '1h 49m', 'Comedy', 'm6.jpg'),
(17, 'Mumu', '1h 51m', 'Drama', 'm7.jpg'),
(18, 'Gundik', '1h 52m', 'Horror', 'm8.jpg'),
(19, 'Thunderbolts', '2h 7m', 'Action', 'm9.jpg'),
(20, 'The Red Envelope', '2h 8m', 'Comedy', 'm10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'apin', 'pindodinarmansitungkir112245@gmail.com', '220606');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
