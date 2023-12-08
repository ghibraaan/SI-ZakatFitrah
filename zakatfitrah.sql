-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 04:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakatfitrah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `id_zakat` int(11) NOT NULL,
  `nama_kk` varchar(255) DEFAULT NULL,
  `jumlah_tanggungan` int(255) DEFAULT NULL,
  `jenis_bayar` varchar(10) DEFAULT NULL,
  `jumlah_tanggunganyangdibayar` int(255) DEFAULT NULL,
  `bayar_beras` int(255) DEFAULT NULL,
  `bayar_uang` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayarzakat`
--

INSERT INTO `bayarzakat` (`id_zakat`, `nama_kk`, `jumlah_tanggungan`, `jenis_bayar`, `jumlah_tanggunganyangdibayar`, `bayar_beras`, `bayar_uang`) VALUES
(1, 'Muhammad Ghibran AL Khamaeni', 3, 'Uang', 3, 0, 90000),
(2, 'Dwiningtyas Dhea Fatmaningrum', 1, 'Beras', 1, 3, 0),
(3, 'Raka Gede Surya Kencana', 1, 'Beras', 1, 3, 0),
(4, 'Muhammad Reza', 1, 'Uang', 1, 0, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi_zakat`
--

CREATE TABLE `distribusi_zakat` (
  `id_distribusi` int(5) NOT NULL,
  `nama_muzakki` varchar(100) DEFAULT NULL,
  `jumlah_tanggungan` int(10) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribusi_zakat`
--

INSERT INTO `distribusi_zakat` (`id_distribusi`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
(1, 'Muhammad Ghibran AL Khamaeni', 3, 'Warga Tetap'),
(2, 'Dwiningtyas Dhea Fatmaningrum', 1, 'Warga Tetap'),
(3, 'Raka Gede Surya Kencana', 1, 'Warga Tetap'),
(4, 'Livia Agni Putri Sekar Lestari', 2, 'Warga Tetap'),
(6, 'Faisal Akbar', 2, 'Warga Kontrakan'),
(7, 'Muhammad Reza', 1, 'Warga Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_mustahik`
--

CREATE TABLE `kategori_mustahik` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `jumlah_hak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_mustahik`
--

INSERT INTO `kategori_mustahik` (`id_kategori`, `nama_kategori`, `jumlah_hak`) VALUES
(1, 'Fakir', '16'),
(2, 'Miskin', '8'),
(3, 'Mampu', '4'),
(4, 'Amil Zakat', '4'),
(5, 'Mualaf', '4'),
(6, 'Fi Sabilillah', '3'),
(7, 'Ibnu Sabil', '4');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `id_mustahiklainnya` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `hak` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik_lainnya`
--

INSERT INTO `mustahik_lainnya` (`id_mustahiklainnya`, `nama`, `kategori`, `hak`) VALUES
(1, 'Radit', 'Amil Zakat', 4),
(2, 'Raya', 'Mualaf', 4),
(3, 'Marco Parama', 'Mualaf', 4),
(4, 'Ikhsan', 'Fi Sabilillah', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `id_mustahikwarga` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `hak` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`id_mustahikwarga`, `nama`, `kategori`, `hak`) VALUES
(1, 'Ahmad Nur Cahyadi', 'Miskin', 8),
(2, 'Ivan', 'Fakir', 16),
(3, 'Bachtiar', 'Mampu', 4),
(4, 'Muhammad Adib', 'Fakir', 16);

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int(5) NOT NULL,
  `nama_muzakki` varchar(100) NOT NULL,
  `jumlah_tanggungan` int(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
(1, 'Muhammad Ghibran AL Khamaeni', 3, 'Warga Tetap'),
(2, 'Dwiningtyas Dhea Fatmaningrum', 1, 'Warga Tetap'),
(3, 'Raka Gede Surya Kencana', 1, 'Warga Tetap'),
(4, 'Livia Agni Putri Sekar Lestari', 2, 'Warga Tetap'),
(5, 'Ahmad Nur Cahyadi', 1, 'Warga Kontrakan'),
(6, 'Faisal Akbar', 2, 'Warga Kontrakan'),
(7, 'Muhammad Reza', 1, 'Warga Tetap'),
(8, 'Ivan', 3, 'Warga Tetap'),
(9, 'Bachtiar', 2, 'Warga Kontrakan'),
(10, 'Muhammad Adib', 1, 'Warga Kontrakan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_zakat`
--

CREATE TABLE `pembayaran_zakat` (
  `id_bayar` int(5) NOT NULL,
  `nama_muzakki` varchar(100) DEFAULT NULL,
  `jumlah_tanggungan` int(10) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_zakat`
--

INSERT INTO `pembayaran_zakat` (`id_bayar`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
(4, 'Livia Agni Putri Sekar Lestari', 2, 'Warga Tetap'),
(5, 'Ahmad Nur Cahyadi', 1, 'Warga Kontrakan'),
(6, 'Faisal Akbar', 2, 'Warga Kontrakan'),
(8, 'Ivan', 3, 'Warga Tetap'),
(9, 'Bachtiar', 2, 'Warga Kontrakan'),
(10, 'Muhammad Adib', 1, 'Warga Kontrakan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`) VALUES
(1234, 'Muhammad Ghibran AL Khamaeni', 'ghibran_al', 'pass321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- Indexes for table `distribusi_zakat`
--
ALTER TABLE `distribusi_zakat`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indexes for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`id_mustahiklainnya`);

--
-- Indexes for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`id_mustahikwarga`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `pembayaran_zakat`
--
ALTER TABLE `pembayaran_zakat`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `id_zakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distribusi_zakat`
--
ALTER TABLE `distribusi_zakat`
  MODIFY `id_distribusi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `id_mustahiklainnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `id_mustahikwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran_zakat`
--
ALTER TABLE `pembayaran_zakat`
  MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
