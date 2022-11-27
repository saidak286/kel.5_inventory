-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 05:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinventaris_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `jenis_barang_id` int(11) NOT NULL,
  `kondisi` text DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama`, `transaksi_id`, `jenis_barang_id`, `kondisi`, `stok`) VALUES
(1, 'BR001', 'Tabung Oksigen', 1, 1, 'baik dan bisa dipakai', 5),
(2, 'BR002', 'Honda CB100', 2, 2, 'aki habis', 2),
(3, 'BR003', 'Timbangan', 3, 1, 'baik dan bisa dipakai', 7);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Manager'),
(2, 'Asisten Manager'),
(3, 'Admin'),
(4, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis`) VALUES
(1, 'Alkes'),
(2, 'Motor');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `telepon` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `jabatan_id`, `gender`, `tmp_lahir`, `tgl_lahir`, `alamat`, `telepon`, `foto`) VALUES
(1, '11325', 'Dimas Nugraha', 1, 'L', 'Jakarta', '1994-08-17', 'Jl.Melati 1', '+62-857-8822-3344', NULL),
(2, '11525', 'Amanda Adellia', 2, 'P', 'Depok', '1997-10-14', 'Jl.Rambutan 1', '+62-896-4566-7162', NULL),
(3, '11713', 'Chika Febriani', 3, 'P', 'Jakarta', '1996-09-20', 'Jl.Tole Iskandar', '+62-851-1102-9803', NULL),
(4, '11349', 'Heru Kurniawan', 4, 'L', 'Bogor', '1994-06-16', 'Jl.Industri 2', '+62-815-0052-1322', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_trans` varchar(45) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `tanggal` varchar(45) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_trans`, `pegawai_id`, `nama_barang`, `tanggal`, `jumlah`, `status`, `catatan`) VALUES
(1, 'AJ0001JKT1', 3, 'Tabung Oksigen', '2015-07-10', 5, 'masuk', NULL),
(2, 'AJ0002JKT1', 3, 'Honda CB100', '2015-09-29', 2, 'masuk', NULL),
(3, 'AJ0003JKT1', 3, 'Timbangan', '2015-12-20', 7, 'masuk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` enum('admin','manager','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang_UNIQUE` (`kode_barang`),
  ADD KEY `fk_barang_gudang_jenis_barang1_idx` (`jenis_barang_id`),
  ADD KEY `fk_barang_gudang_transaksi1_idx` (`transaksi_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`),
  ADD KEY `fk_pegawai_jabatan1_idx` (`jabatan_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_trans_UNIQUE` (`kode_trans`),
  ADD KEY `fk_transaksi_pegawai1_idx` (`pegawai_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_gudang_jenis_barang1` FOREIGN KEY (`jenis_barang_id`) REFERENCES `jenis_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_gudang_transaksi1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_jabatan1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_pegawai1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
