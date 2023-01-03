-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 10:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nomor_plat` varchar(10) NOT NULL,
  `type_mobil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_hp`, `alamat`, `nomor_plat`, `type_mobil`) VALUES
(24, 'Elsa', '081222111222', 'Pucakwangi', 'K 445 QQ', 'SUV'),
(27, 'Karin', '081999777888', 'Ngagel', 'K 121 UY', 'Jazz'),
(28, 'Sinta', '089787767787', 'Pati', 'K 111 KL', 'Sedan'),
(29, 'Yudha', '089111222333', 'Dukuhseti', 'K 123 OP', 'Pickup'),
(31, 'Usman', '089789878987', 'Tayu', 'K 123 TT', 'MPV'),
(34, 'Rian', '089789111222', 'Kajen', 'K 876 FA', 'Pickup'),
(35, 'Yulia', '087777666555', 'Gunugwungkal', 'K 456 YU', 'SUV'),
(36, 'Toni', '08777766999', 'Dukuhseti', 'K 888 AA', 'Innova'),
(37, 'Omar', '089111222333', 'Kejen', 'K 251 YY', 'Innova'),
(38, 'Zahra', '089777666555', 'Solo', 'K 254 AS', 'Jazz'),
(39, 'Hamdan', '081222000111', 'Winong', 'K 232 QQ', 'MPV');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_service`
--

CREATE TABLE `jenis_service` (
  `id_jenis_service` int(1) NOT NULL,
  `jenis_service` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_service`
--

INSERT INTO `jenis_service` (`id_jenis_service`, `jenis_service`, `biaya`) VALUES
(2, 'service Body', 35000),
(5, 'service Menyeluruh', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `no_antrian` varchar(20) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_jenis_service` int(1) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `jam_pendaftaran` time NOT NULL,
  `total_biaya` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `no_antrian`, `id_customer`, `id_jenis_service`, `tgl_pendaftaran`, `jam_pendaftaran`, `total_biaya`, `status`) VALUES
(22, '2022-09-05/1', 21, 5, '2022-09-05', '13:16:00', 45000, 'Lunas'),
(24, '2022-09-05/3', 23, 2, '2022-09-05', '13:21:00', 35000, 'Lunas'),
(25, '2022-09-05/4', 24, 5, '2022-09-05', '13:24:00', 45000, 'Lunas'),
(27, '2022-09-05/6', 26, 5, '2022-09-05', '13:26:00', 45000, 'Lunas'),
(28, '2022-09-05/7', 27, 5, '2022-09-05', '13:50:00', 45000, 'Lunas'),
(31, '2022-09-05/6', 28, 5, '2022-09-05', '13:40:00', 45000, 'Lunas'),
(32, '2022-09-05/7', 29, 2, '2022-09-05', '13:43:00', 35000, 'Lunas'),
(34, '2022-09-05/9', 31, 5, '2022-09-05', '13:55:00', 45000, 'Lunas'),
(37, '2022-09-05/12', 34, 2, '2022-09-05', '14:10:00', 35000, 'Lunas'),
(38, '2022-09-05/10', 35, 5, '2022-09-05', '14:30:00', 45000, 'Lunas'),
(39, '2022-09-05/11', 36, 5, '2022-09-05', '14:35:00', 0, 'Batal'),
(40, '2022-09-05/12', 37, 5, '2022-09-05', '14:47:00', 45000, 'Dalam Pengerjaan'),
(41, '2022-09-05/13', 38, 5, '2022-09-05', '14:50:00', 45000, 'Dalam Pengerjaan'),
(42, '2022-09-05/14', 39, 5, '2022-09-05', '15:00:00', 45000, 'Dalam Pengerjaan');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(150) NOT NULL,
  `kebersihan` int(3) NOT NULL,
  `keramahan` int(3) NOT NULL,
  `ketelitian` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `nama`, `email`, `pesan`, `kebersihan`, `keramahan`, `ketelitian`) VALUES
(1, 'Adit', 'aditwijaya@gmail.com', 'Pelayanannya sangat baik dan memuaskan', 90, 80, 90),
(2, 'erdiman', 'erdiman@gmail.com', 'sangat puas', 90, 90, 90);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembali` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` tinyint(1) NOT NULL,
  `nama_mekanik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pendaftaran`, `no_nota`, `tanggal`, `bayar`, `kembali`, `total`, `status`, `id_user`, `nama_mekanik`) VALUES
(17, 22, 'C002', '2022-09-05', 50000, 5000, 45000, 'Lunas', 1, 'Agos'),
(18, 28, 'C003', '2022-09-05', 100000, 55000, 45000, 'Lunas', 1, 'Agos'),
(19, 27, 'C004', '2022-09-05', 100000, 55000, 45000, 'Lunas', 1, 'Dedi'),
(20, 25, 'C005', '2022-09-05', 50000, 5000, 45000, 'Lunas', 1, 'Dedi'),
(21, 24, 'C006', '2022-09-05', 50000, 15000, 35000, 'Lunas', 1, 'Agos'),
(22, 31, 'C007', '2022-09-05', 100000, 55000, 45000, 'Lunas', 1, 'Dedi'),
(23, 32, 'C008', '2022-09-05', 50000, 15000, 35000, 'Lunas', 1, 'Agos'),
(24, 37, 'C009', '2022-09-05', 50000, 15000, 35000, 'Lunas', 1, 'Dedi'),
(25, 34, 'C010', '2022-09-05', 100000, 55000, 45000, 'Lunas', 1, 'Agos'),
(27, 38, 'C011', '2022-09-05', 50000, 5000, 45000, 'Lunas', 1, 'Agos');

-- --------------------------------------------------------

--
-- Table structure for table `type_mobil`
--

CREATE TABLE `type_mobil` (
  `id_type_mobil` int(2) NOT NULL,
  `type_mobil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_mobil`
--

INSERT INTO `type_mobil` (`id_type_mobil`, `type_mobil`) VALUES
(1, 'Avanza'),
(2, 'Innova'),
(4, 'Jazz'),
(5, 'SUV'),
(6, 'MPV'),
(7, 'Sedan'),
(8, 'Off Road'),
(9, 'Pickup'),
(10, 'Sports Car');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Jl. Bangau Sakti', '081111222333', 1),
(2, 'rianto', '058e9643ee9b7658a6b5f83c87f3ab5a', 'Rianto ', 'Pati', '081222112223', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `jenis_service`
--
ALTER TABLE `jenis_service`
  ADD PRIMARY KEY (`id_jenis_service`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `type_mobil`
--
ALTER TABLE `type_mobil`
  ADD PRIMARY KEY (`id_type_mobil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jenis_service`
--
ALTER TABLE `jenis_service`
  MODIFY `id_jenis_service` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `type_mobil`
--
ALTER TABLE `type_mobil`
  MODIFY `id_type_mobil` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
