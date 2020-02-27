-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 03:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `username`, `password`, `nama`, `no_telp`, `alamat`) VALUES
(1, 'choaz', '123', 'Choaz Bone Randa Lembang', '081229332129', 'Jl. Seruni no. 6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `no_identitas`, `nama`, `alamat`, `no_telp`) VALUES
(1, '111040499', 'Rehuel Paskahrio Handono', 'Jl.Diponegoro no.83', '087719930775'),
(2, '133120100', 'Maya A', 'Jl. nakula no.4', '081327171778'),
(3, '6720171180', 'Choaz Bone Randa Lembang', 'Jl. Seruni', '0812345678'),
(4, '8776456', 'Hallo', 'Rumah', '02145789546');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identitas`
--

INSERT INTO `tb_identitas` (`id_user`, `nama`, `umur`) VALUES
(1, 'Duan', '20'),
(2, 'Rehuel', '21'),
(3, 'Coaz', '19'),
(4, 'Henry', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id`, `nama`, `harga`) VALUES
(1, 'Motor Matic', 5000),
(2, 'Motor Manual', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_motor`
--

CREATE TABLE `tb_motor` (
  `plat_motor` varchar(10) NOT NULL,
  `jenis_motor` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_motor`
--

INSERT INTO `tb_motor` (`plat_motor`, `jenis_motor`, `status`) VALUES
('123qsad', 1, 0),
('AA2341Z', 1, 1),
('H 3649 P', 2, 0),
('R12345H', 1, 0),
('R3116PH', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `plat_motor` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_customer`, `plat_motor`, `jam_mulai`, `jam_akhir`, `harga`, `status`) VALUES
(4, 1, 'R3116PH', '12:00:00', '15:00:00', 55000, 0),
(5, 1, 'AA2341Z', '12:00:00', '15:00:00', 50000, 0),
(7, 1, '123qsad', '12:00:00', '15:00:00', 50000, 0),
(8, 1, '123qsad', '12:00:00', '15:00:00', 50000, 0),
(9, 2, '123qsad', '12:00:00', '15:00:00', 50000, 0),
(10, 2, '123qsad', '13:00:00', '14:00:00', 5000, 0),
(19, 1, '123qsad', '15:00:00', '16:00:00', 5000, 0),
(20, 1, '123qsad', '12:00:00', '15:00:00', 15000, 0),
(21, 2, 'AA2341Z', '13:00:00', NULL, NULL, 1),
(22, 1, 'R12345H', '12:00:00', '15:00:00', 15000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_motor`
--
ALTER TABLE `tb_motor`
  ADD PRIMARY KEY (`plat_motor`),
  ADD KEY `jenis_motor` (`jenis_motor`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `plat_motor` (`plat_motor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_motor`
--
ALTER TABLE `tb_motor`
  ADD CONSTRAINT `tb_motor_ibfk_1` FOREIGN KEY (`jenis_motor`) REFERENCES `tb_jenis` (`id`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`plat_motor`) REFERENCES `tb_motor` (`plat_motor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
