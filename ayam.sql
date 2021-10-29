-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 03:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(120) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$EmKROLd9YJH/RaUOSvGyLORRx1BrvxPS0Jn/9FEOFyl.j2Q57Xo72', '');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `harga_pasar` int(11) NOT NULL,
  `harga_pribadi` int(11) NOT NULL,
  `waktu` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `harga_pasar`, `harga_pribadi`, `waktu`, `biaya`) VALUES
(10, 20000, 27000, '2021-10-20', 2000000),
(11, 20000, 24000, '2021-10-24', 2000000),
(12, 20000, 22000, '2021-10-25', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `setoran`
--

CREATE TABLE `setoran` (
  `id` int(11) NOT NULL,
  `keranjang` int(11) NOT NULL,
  `timbangan` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `username` varchar(120) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `waktu` text COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `setoran`
--

INSERT INTO `setoran` (`id`, `keranjang`, `timbangan`, `username`, `status`, `waktu`) VALUES
(3, 21, '28', 'Azmi waffi', 0, '2021-10-19'),
(4, 1, '23', 'Bagas', 0, '2021-10-19'),
(5, 21, '28', 'Azmi waffi', 1, '2021-10-18'),
(6, 22, '28', 'Bagas', 0, '2021-10-18'),
(7, 1, '28', 'Bagas', 0, '2021-10-17'),
(8, 1, '23', 'Syuhada', 0, '2021-10-18'),
(9, 1, '23', 'Alexander', 0, '2021-10-18'),
(10, 14, '40', 'Gairent', 0, '2021-10-18'),
(11, 13, '46', 'Rangga', 0, '2021-10-18'),
(12, 1, '70', 'Indro', 0, '2021-10-18'),
(13, 14, '80', 'Usman', 0, '2021-10-18'),
(14, 13, '45', 'Britney', 0, '2021-10-18'),
(15, 1, '47', 'Hapizh', 0, '2021-10-18'),
(16, 1, '28', 'Theo', 0, '2021-10-18'),
(17, 1, '10.2', 'Alexander', 0, '2021-10-20'),
(18, 1, '28.2', 'Azmi waffi', 0, '2021-10-20'),
(19, 13, '30.6', 'Anissa', 0, '2021-10-20'),
(20, 22, '28.5', 'Anissa', 1, '2021-10-23'),
(21, 14, '28.5', 'Azmi waffi', 0, '2021-10-23'),
(24, 22, '28.5', 'Gairent', 0, '2021-10-23'),
(25, 10, '28.5', 'Rangga', 0, '2021-10-23'),
(26, 22, '28.5', 'denny', 0, '2021-10-23'),
(29, 14, '28.5', 'Theo', 0, '2021-10-23'),
(30, 22, '28.5', 'Britney', 0, '2021-10-23'),
(31, 14, '28.5', 'Juntak', 0, '2021-10-23'),
(32, 22, '28.5', 'Bagas', 0, '2021-10-23'),
(33, 13, '28.5', 'Indro', 0, '2021-10-23'),
(34, 14, '28.7', 'Anissa', 0, '2021-10-24'),
(35, 22, '28.5', 'Anissa', 0, '2021-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(120) COLLATE utf8mb4_swedish_ci NOT NULL,
  `phone` varchar(120) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`) VALUES
(5, 'Rayhan', '085925103678'),
(6, 'Azmi waffi', '085925103677'),
(7, 'Juntak', '085925103680'),
(8, 'Hapizh', '085925103687'),
(9, 'Anissa', '085925103697'),
(10, 'Theo', '085925103695'),
(11, 'Bagas', '085925103695'),
(12, 'Rangga', '085925103615'),
(13, 'Billy', '085925103612'),
(14, 'Indro', '085925103605'),
(15, 'Usman', '085925103777'),
(16, 'Britney', '085925103875'),
(17, 'Syuhada', '085925103877'),
(19, 'Gairent', '085925103995'),
(21, 'denny', '085925103277');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setoran`
--
ALTER TABLE `setoran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
