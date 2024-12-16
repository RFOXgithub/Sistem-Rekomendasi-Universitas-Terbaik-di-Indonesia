-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 12:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp_spk_rfox`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahp_data`
--

CREATE TABLE `ahp_data` (
  `id` int(11) NOT NULL,
  `matrix` text NOT NULL,
  `normalized_matrix` text NOT NULL,
  `weights` text NOT NULL,
  `cr` float NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ahp_data`
--

INSERT INTO `ahp_data` (`id`, `matrix`, `normalized_matrix`, `weights`, `cr`, `created_at`) VALUES
(36, '[[1,\"1\",\"1\"],[1,1,\"1\"],[1,1,1]]', '[[0.3333333333333333,0.3333333333333333,0.3333333333333333],[0.3333333333333333,0.3333333333333333,0.3333333333333333],[0.3333333333333333,0.3333333333333333,0.3333333333333333],[0.3333333333333333,0.3333333333333333,0.3333333333333333],[0.3333333333333333,0.3333333333333333,0.3333333333333333],[0.3333333333333333,0.3333333333333333,0.3333333333333333]]', '[0.3333333333333333,0.3333333333333333,-0.3333333333333333]', 0.0001, '2024-12-17 00:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_universitas` varchar(255) NOT NULL,
  `akreditasi` int(11) NOT NULL,
  `fasilitas` int(11) NOT NULL,
  `biaya_perkuliahan` int(11) NOT NULL,
  `s_value` float DEFAULT NULL,
  `v_value` float DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_universitas`, `akreditasi`, `fasilitas`, `biaya_perkuliahan`, `s_value`, `v_value`, `ranking`) VALUES
(1, 'Universitas Indonesia', 4, 5, 20000000, 0.01, 0.101567, 4),
(2, 'Institut Teknologi Bandung', 4, 5, 12500000, 0.0116961, 0.118793, 3),
(3, 'Universitas Padjadjaran', 4, 4, 18000000, 0.009615, 0.0976564, 5),
(4, 'Universitas Brawijaya', 4, 4, 33739000, 0.00779823, 0.079204, 10),
(5, 'Universitas Gadjah Mada', 4, 5, 24700000, 0.00932061, 0.0946664, 6),
(6, 'Universitas Airlangga', 4, 4, 25000000, 0.00861774, 0.0875275, 8),
(7, 'Institut Teknologi Sepuluh Nopember', 4, 5, 12500000, 0.0116961, 0.118793, 2),
(8, 'Universitas Bina Nusantara', 4, 3, 22400000, 0.00812165, 0.0824889, 9),
(9, 'Universitas Diponegoro', 4, 4, 22000000, 0.00899289, 0.0913378, 7),
(10, 'Institut Pertanian Bogor', 4, 5, 10000000, 0.0125992, 0.127966, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `jenis_kriteria` varchar(52) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` int(52) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `jenis_kriteria`, `nama_kriteria`, `bobot`, `modified_date`) VALUES
(1, 'Cost', 'Akreditasi', 1, '2024-12-16 16:09:09'),
(2, 'Cost', 'Fasilitas', 0, '2024-12-16 16:09:09'),
(3, 'Benefit', 'Biaya Perkuliahan', 0, '2024-12-16 16:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `nilai_sub_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(100) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `nilai_sub_kriteria`, `nama_sub_kriteria`, `id_kriteria`) VALUES
(1, 4, 'Akreditasi Unggul/A', 1),
(2, 3, 'Akreditasi Baik Sekali/B', 1),
(3, 2, 'Akreditasi Baik/C', 1),
(4, 1, 'Tidak Terakreditasi', 1),
(5, 5, 'Sangat Lengkap', 2),
(6, 4, 'Lengkap', 2),
(7, 3, 'Cukup Lengkap', 2),
(8, 2, 'Kurang Lengkap', 2),
(9, 1, 'Sangat Tidak Lengkap', 2),
(10, 1, 'Nilai Max UKT Termahal', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahp_data`
--
ALTER TABLE `ahp_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahp_data`
--
ALTER TABLE `ahp_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
