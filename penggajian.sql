-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 04:22 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
`id_absensi` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `kehadiran` varchar(10) NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL,
  `tgl_absensi` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nip`, `kehadiran`, `waktu_masuk`, `waktu_keluar`, `tgl_absensi`) VALUES
(1, 12345, 'Hadir', '08:00:00', '19:00:00', '2014-06-02'),
(2, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-02'),
(3, 12345, 'Hadir', '08:00:00', '19:00:00', '2014-06-03'),
(5, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-03'),
(6, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-04'),
(7, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-04'),
(8, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-05'),
(9, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-05'),
(10, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-06'),
(11, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-06'),
(12, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-07'),
(13, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-07'),
(14, 12345, 'Sakit', '08:00:00', '16:00:00', '2014-06-09'),
(15, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-09'),
(16, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-10'),
(17, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-10'),
(18, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-11'),
(19, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-11'),
(20, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-12'),
(21, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-12'),
(22, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-13'),
(23, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-13'),
(24, 12345, 'Ijin', '08:00:00', '16:00:00', '2014-06-14'),
(25, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-14'),
(26, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-16'),
(27, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-16'),
(28, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-17'),
(29, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-17'),
(30, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-18'),
(31, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-18'),
(32, 12345, '', '08:00:00', '16:00:00', '2014-06-19'),
(33, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-19'),
(34, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-20'),
(35, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-20'),
(36, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-21'),
(37, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-21'),
(38, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-22'),
(39, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-22'),
(40, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-23'),
(41, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-23'),
(42, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-24'),
(43, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-24'),
(44, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-25'),
(45, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-25'),
(46, 12345, 'Cuti', '08:00:00', '16:00:00', '2014-06-26'),
(47, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-26'),
(48, 12345, 'Cuti', '08:00:00', '16:00:00', '2014-06-27'),
(49, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-27'),
(50, 12345, 'Cuti', '08:00:00', '16:00:00', '2014-06-28'),
(51, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-28'),
(52, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-29'),
(53, 1234567, 'Hadir', '08:00:00', '16:00:00', '2014-06-30'),
(54, 12345, 'Hadir', '08:00:00', '16:00:00', '2014-06-30'),
(55, 12345, '', '07:00:00', '20:00:00', '2014-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  `gapok` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gapok`) VALUES
(1, 'Staff Keuangan', 5000000),
(2, 'Staff Personalia', 2000000),
(3, 'Staff Operator', 1500000),
(4, 'Direktur', 6000000),
(5, 'Sekretaris', 5000000),
(6, 'ob', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tunjangan`
--

CREATE TABLE IF NOT EXISTS `jenis_tunjangan` (
`id_jenis_tunjangan` int(11) NOT NULL,
  `nama_jenis_tunjangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tunjangan`
--

INSERT INTO `jenis_tunjangan` (`id_jenis_tunjangan`, `nama_jenis_tunjangan`) VALUES
(1, 'Anak'),
(2, 'Istri'),
(3, 'Transportasi');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`nip` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jk` varchar(12) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1234568 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_karyawan`, `jk`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat_karyawan`, `telp`, `email`, `password`, `foto`, `id_jabatan`) VALUES
(12345, 'Abdullahs', 'Laki-laki', 'Jogja', '1989-04-12', 'Islam', '<p>Ngayogjakarto</p>', '081220428004', 'coba@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'file/foto_karyawan/default_user.png', 1),
(1111111, 'Dr. Ir. Oviyan Patra, MT.', 'Laki-laki', 'Bandung', '1965-06-06', 'Islam', '<p>Bandung</p>', '0855555554', 'cheppy_sahari@yahoo.com', '7fa8282ad93047a4d6fe6111c93b308a', 'file/foto_karyawan/1111111.jpg', 1),
(1234567, 'Udin', 'Laki-laki', 'Bandung', '1985-06-02', 'Islam', '<p>Bandung</p>', '0855555555', 'cheppy_sahari@yahoo.com', 'fcea920f7412b5da7be0cf42b8c93759', 'file/foto_karyawan/1234567.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan_jabatan`
--

CREATE TABLE IF NOT EXISTS `tunjangan_jabatan` (
`id_tunjangan_jabatan` int(11) NOT NULL,
  `id_jenis_tunjangan` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `besar_tunjangan` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tunjangan_jabatan`
--

INSERT INTO `tunjangan_jabatan` (`id_tunjangan_jabatan`, `id_jenis_tunjangan`, `nip`, `besar_tunjangan`) VALUES
(6, 1, 12345, 200000),
(7, 1, 1111111, 200000),
(8, 1, 1234567, 150000),
(9, 3, 12345, 50000),
(10, 3, 1234567, 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
 ADD PRIMARY KEY (`id_absensi`), ADD KEY `nip` (`nip`);

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
 ADD PRIMARY KEY (`nip`), ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tunjangan_jabatan`
--
ALTER TABLE `tunjangan_jabatan`
 ADD PRIMARY KEY (`id_tunjangan_jabatan`), ADD KEY `nip` (`nip`), ADD KEY `id_jenis_tunjangan` (`id_jenis_tunjangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jenis_tunjangan`
--
ALTER TABLE `jenis_tunjangan`
MODIFY `id_jenis_tunjangan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1234568;
--
-- AUTO_INCREMENT for table `tunjangan_jabatan`
--
ALTER TABLE `tunjangan_jabatan`
MODIFY `id_tunjangan_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
ADD CONSTRAINT `tunjangan_jabatan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
