-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 04:27 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukt`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `npm` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tahun_masuk` int(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jml_ukt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama_mhs`, `jenis_kelamin`, `tahun_masuk`, `jurusan`, `jml_ukt`) VALUES
(190102014, 'Umriyah Fatchur Rahma', 'Perempuan', 2019, 'Teknik Informatika', '4.200.000'),
(190102016, 'Adre Bagus Satria', 'Laki-laki', 2019, 'Teknik Informatika', '4.000.000'),
(190102017, 'Lina Nur Hasanah', 'Perempuan', 2019, 'Teknik Informatika', '4.500.000'),
(190202056, 'Nadza Nur Sholehah', 'Perempuan', 2019, 'Teknik Informatika', '4.200.000');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `npm` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `tahun_masuk` int(25) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`npm`, `nama_mhs`, `tahun_masuk`, `jurusan`, `semester`, `tanggal`, `bukti`) VALUES
(190102016, 'Adre Bagus Satria', 2019, 'Teknik Informatika', 'Semester 1', '2021-04-23', 'buku.png'),
(190102017, 'Lina Nur Hasanah', 2019, 'Teknik Informatika', 'Semester 2', '2021-04-23', 'buku.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'mahasiswa', 'mahasiswa', 'mahasiswa'),
(3, 'adre', 'adre', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE IF NOT EXISTS `validasi` (
  `npm` int(11) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi`
--

INSERT INTO `validasi` (`npm`, `pesan`) VALUES
(190102016, 'Diterima'),
(190102017, 'Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`npm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
