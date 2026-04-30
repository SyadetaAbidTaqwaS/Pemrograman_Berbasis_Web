-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2026 at 09:07 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_iphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID` int NOT NULL,
  `Nama_Barang` varchar(255) NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Tahun_Produksi` int NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID`, `Nama_Barang`, `Supplier`, `Tahun_Produksi`, `Harga`, `stok`) VALUES
(1, 'iPhone 11', 'iBox', 2019, 6500000.00, 10),
(2, 'iPhone 12', 'Digimap', 2020, 8500000.00, 8),
(3, 'iPhone 13', 'Erafone', 2021, 10500000.00, 6),
(4, 'iPhone 14 Pro', 'Apple Authorized', 2022, 13000000.00, 4),
(5, 'iPhone 14 Pro Max', 'iBox', 2022, 14500000.00, 4),
(6, 'iPhone 15 ', 'Digimap', 2023, 13500000.00, 5),
(7, 'iPhone 16 ', 'iBox', 2024, 15000000.00, 7),
(8, 'iPhone 16 Pro', 'iBox', 2024, 17000000.00, 5),
(9, 'iPhone 17', 'Digimap', 2025, 19000000.00, 8),
(10, 'iPhone 17 Pro ', 'iBox', 2025, 22500000.00, 20),
(11, 'iPhone 17 Pro Max', 'iBox', 2025, 26000000.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `Pesanan_ID` int NOT NULL,
  `Barang_ID` int NOT NULL,
  `Kuantitas` int NOT NULL,
  `Harga_Per_Satuan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`Pesanan_ID`, `Barang_ID`, `Kuantitas`, `Harga_Per_Satuan`) VALUES
(1, 1, 1, 6500000.00),
(2, 2, 2, 8500000.00),
(3, 4, 1, 15000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID` int NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID`, `Nama`, `Alamat`, `Email`, `Telepon`) VALUES
(1, 'Andi Saputra', 'Karawang', 'andi@email.com', '081234567890'),
(2, 'Budi Santoso', 'Bekasi', 'budi@email.com', '082345678901'),
(3, 'Ipan Gunawan', 'Karawang', 'ipan@gmail.com', '082215676617'),
(4, 'Nafhan Haqiqi', 'Karawang', 'nafhan@gmail.com', '081245789634');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID` int NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `KataSandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID`, `Nama`, `KataSandi`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `ID` int NOT NULL,
  `Tanggal_Pesanan` date NOT NULL,
  `Pelanggan_ID` int NOT NULL,
  `Total_Harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`ID`, `Tanggal_Pesanan`, `Pelanggan_ID`, `Total_Harga`) VALUES
(1, '2026-04-25', 1, 6500000.00),
(2, '2026-04-26', 2, 17000000.00),
(3, '2026-04-28', 3, 15000000.00),
(4, '2026-04-29', 4, 78000000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD KEY `FK_Pesanan_Detail` (`Pesanan_ID`),
  ADD KEY `FK_Barang_Detail` (`Barang_ID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Pelanggan` (`Pelanggan_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `FK_Barang_Detail` FOREIGN KEY (`Barang_ID`) REFERENCES `barang` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Pesanan_Detail` FOREIGN KEY (`Pesanan_ID`) REFERENCES `pesanan` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `FK_Pelanggan` FOREIGN KEY (`Pelanggan_ID`) REFERENCES `pelanggan` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
