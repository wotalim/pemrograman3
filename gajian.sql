-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2018 at 11:49 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `kehadiran` varchar(10) NOT NULL,
  `datang` time NOT NULL,
  `pulang` time NOT NULL,
  `tgl_absensi` date NOT NULL,
  `telat` int(4) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nip`, `kehadiran`, `datang`, `pulang`, `tgl_absensi`, `telat`, `keterangan`) VALUES
(1, 1001, 'Hadir', '09:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(2, 1003, 'Hadir', '08:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(3, 1003, 'Hadir', '08:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(4, 1003, 'Hadir', '09:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(5, 1003, 'Hadir', '09:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(6, 1003, 'Hadir', '09:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(7, 1002, 'Hadir', '09:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(8, 1002, 'Hadir', '09:00:00', '00:00:00', '2018-10-06', 1, 'Hadir'),
(9, 1002, 'Hadir', '09:00:00', '00:00:00', '2018-10-06', 0, 'Hadir'),
(10, 1003, 'Hadir', '09:05:00', '16:00:00', '2018-10-06', 65, 'Hadir'),
(11, 1001, 'Izin', '00:00:00', '00:00:00', '2018-10-07', 0, 'Sakit'),
(12, 1003, 'Hadir', '09:00:00', '16:00:00', '2018-10-07', 60, 'Hadir'),
(13, 1003, 'Hadir', '09:25:00', '16:15:00', '2018-10-09', 85, 'Hadir'),
(14, 1002, 'Izin', '00:00:00', '00:00:00', '2018-10-09', 0, 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(126) DEFAULT NULL,
  `description` text,
  `color` varchar(24) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` varchar(64) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `description`, `color`, `start_date`, `end_date`, `create_at`, `create_by`, `modified_at`, `modified_by`) VALUES
(1, 'Kucinglah', 'kucing itu mpuss', '#109b59', '2018-10-10', '2018-10-13', '2018-10-08 12:00:00', 'mpuss', NULL, NULL),
(2, 'mpuss', 'mpuss iku kucing', '#2c9ed7', '2018-10-23', NULL, '2018-10-10 00:00:00', NULL, NULL, NULL),
(3, 'kucing ku', 'blah', '#ffce41', '2018-10-25', NULL, '2018-10-10 18:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  `gapok` int(12) NOT NULL,
  `tgl_ganti` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gapok`, `tgl_ganti`) VALUES
(1, 'Boss Office Boy', 5000000, '2018-09-20'),
(2, 'Karyawan 1', 2000000, '2018-08-20'),
(3, 'Karyawan2', 1500000, '2018-08-20'),
(4, 'Direktur', 6000000, '2018-08-20'),
(5, 'Sekretaris', 5000000, '2018-08-20'),
(6, 'ob', 1000000, '2018-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tunjangan`
--

CREATE TABLE `jenis_tunjangan` (
  `id_jenis_tunjangan` int(11) NOT NULL,
  `nama_jenis_tunjangan` varchar(50) NOT NULL,
  `besar_tunjangan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tunjangan`
--

INSERT INTO `jenis_tunjangan` (`id_jenis_tunjangan`, `nama_jenis_tunjangan`, `besar_tunjangan`) VALUES
(1, 'Makan1', 50000),
(2, 'Lembur', 50000),
(3, 'Transportasi', 50000),
(4, 'Pendidikan Anak', 150000),
(5, 'Tunjangan Hari Raya', 750000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `jk` varchar(12) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `role` int(10) NOT NULL,
  `absen_terakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_depan`, `nama_belakang`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat_karyawan`, `telp`, `foto`, `email`, `password`, `id_jabatan`, `role`, `absen_terakhir`) VALUES
(1001, 'Ghofar', 'Admin', 'Laki-Laki', 'Jogja', '1989-04-12', 'Jogjakarta', '081220428005', 'ganteng.jpg', 'coba@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, '2018-10-07'),
(1002, 'Susi', 'Susanti', 'Perempuan', 'Malang', '1965-06-06', 'Depan rumah', '0855555554', 'Susi Susanti.jpg', 'susi@yahoo.com', '7fa8282ad93047a4d6fe6111c93b308a', 4, 0, '2018-10-09'),
(1003, 'Udin', 'Shihabuddin', 'Laki-Laki', 'Bandung', '1985-06-02', 'Bandung', '0855555555', 'Udin.jpeg', 'cheppy_sahari@yahoo.com', 'fcea920f7412b5da7be0cf42b8c93759', 5, 0, '2018-10-09'),
(1004, 'Mochammad', 'Ghofarru', 'Laki-Laki', 'Malang', '1990-02-21', 'Jl. Demak, Dampit City', '081220428005', 'Abdullahs.jpeg', 'muach@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, 1, '0000-00-00'),
(1005, 'budi', 'doremi', 'Laki-Laki', 'rumah sakit', '2018-11-07', 'jl raya', '14022', '', 'doremi@gmail.com', '', 3, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan_jabatan`
--

CREATE TABLE `tunjangan_jabatan` (
  `id_tunjangan_jabatan` int(11) NOT NULL,
  `id_jenis_tunjangan` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `besar_tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tunjangan_jabatan`
--

INSERT INTO `tunjangan_jabatan` (`id_tunjangan_jabatan`, `id_jenis_tunjangan`, `nip`, `besar_tunjangan`) VALUES
(6, 1, 1001, 200000),
(7, 1, 1002, 200000),
(8, 1, 1003, 150000),
(9, 3, 1001, 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_tunjangan`
--
ALTER TABLE `jenis_tunjangan`
  ADD PRIMARY KEY (`id_jenis_tunjangan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tunjangan_jabatan`
--
ALTER TABLE `tunjangan_jabatan`
  ADD PRIMARY KEY (`id_tunjangan_jabatan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jenis_tunjangan` (`id_jenis_tunjangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_tunjangan`
--
ALTER TABLE `jenis_tunjangan`
  MODIFY `id_jenis_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `tunjangan_jabatan`
--
ALTER TABLE `tunjangan_jabatan`
  MODIFY `id_tunjangan_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `nip` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON UPDATE CASCADE;

--
-- Constraints for table `tunjangan_jabatan`
--
ALTER TABLE `tunjangan_jabatan`
  ADD CONSTRAINT `tunjangan_jabatan_ibfk_1` FOREIGN KEY (`id_jenis_tunjangan`) REFERENCES `jenis_tunjangan` (`id_jenis_tunjangan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tunjangan_jabatan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
