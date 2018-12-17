-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 04:19 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `pertanyaan`, `jawaban`) VALUES
(1, 'admin', 'admin', 'admin@demo.com', 'Hewan anda?', 'Kucing');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE IF NOT EXISTS `alamat` (
  `kode_alamat` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_rumah` varchar(10) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  PRIMARY KEY (`kode_alamat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`kode_alamat`, `alamat`, `no_rumah`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`) VALUES
('ALM00009', '', '', '', '', '', '', '', ''),
('ALM00010', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_penilaian`
--

CREATE TABLE IF NOT EXISTS `employee_penilaian` (
  `id` varchar(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nilai` int(3) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `nik` bigint(20) NOT NULL,
  `enterprise_begin` date NOT NULL,
  `enterprise_last` date NOT NULL,
  `kode_perusahaan` varchar(11) NOT NULL,
  `kode_area` varchar(11) NOT NULL,
  `kode_unit` varchar(11) NOT NULL,
  `kode_grup` varchar(11) NOT NULL,
  `kode_pekerjaan` varchar(11) NOT NULL,
  `kode_posisi` varchar(11) NOT NULL,
  `kode_tingkat` varchar(11) NOT NULL,
  `staff_date` date NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `kode_unit` (`kode_unit`),
  KEY `kode_tingkat` (`kode_tingkat`),
  KEY `kode_posisi` (`kode_posisi`),
  KEY `kode_perusahaan` (`kode_perusahaan`),
  KEY `kode_pekerjaan` (`kode_pekerjaan`),
  KEY `kode_grup` (`kode_grup`),
  KEY `kode_area` (`kode_area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mt_employee`
--

CREATE TABLE IF NOT EXISTS `mt_employee` (
  `nik` bigint(20) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kode_alamat` varchar(11) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `karyawan_ibfk_1` (`kode_alamat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_area`
--

CREATE TABLE IF NOT EXISTS `m_area` (
  `kode_area` varchar(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_alamat` varchar(11) NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_area`),
  KEY `kode_alamat` (`kode_alamat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_area`
--

INSERT INTO `m_area` (`kode_area`, `deskripsi`, `kode_alamat`, `id`) VALUES
('a', 'as', 'ALM00010', '36839923813'),
('bkj', 'j', 'ALM00009', '77291297776');

--
-- Triggers `m_area`
--
DROP TRIGGER IF EXISTS `ubah_area`;
DELIMITER //
CREATE TRIGGER `ubah_area` AFTER DELETE ON `m_area`
 FOR EACH ROW begin
	update master set kode_area = '' WHERE kode_area = old.kode_area;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_grup`
--

CREATE TABLE IF NOT EXISTS `m_grup` (
  `kode_grup` varchar(11) NOT NULL,
  `nama_grup` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_grup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `m_grup`
--
DROP TRIGGER IF EXISTS `ubah_grup`;
DELIMITER //
CREATE TRIGGER `ubah_grup` AFTER DELETE ON `m_grup`
 FOR EACH ROW begin
	update master set kode_grup = '' WHERE kode_grup = old.kode_grup;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_navigasi`
--

CREATE TABLE IF NOT EXISTS `m_navigasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master` varchar(20) NOT NULL,
  `nama_navigasi` varchar(30) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `m_navigasi`
--

INSERT INTO `m_navigasi` (`id`, `master`, `nama_navigasi`, `id_parent`, `class`) VALUES
(1, 'area', 'Area', 1, 'fa fa-map-marker'),
(2, 'group', 'Group', 1, 'fa fa-group'),
(3, 'job', 'Job', 1, 'fa fa-briefcase'),
(4, 'company', 'Company', 1, 'fa fa-building-o'),
(5, 'position', 'Position', 1, 'fa fa-briefcase'),
(6, 'program', 'Program', 1, 'fa fa-calendar'),
(7, 'level', 'Level', 1, 'fa fa-bar-chart-o'),
(8, 'unit', 'Unit', 1, 'fa fa-building-o'),
(9, 'role', 'Role', 1, 'fa fa-gears'),
(10, 'user', 'User', 1, 'fa fa-user'),
(11, 'point', 'Point', 1, 'fa fa-star'),
(12, 'employee', 'Employee', 2, 'fa fa-address-card'),
(13, 'employee_point ', 'Point', 2, 'fa fa-trophy'),
(14, 'employee_grade', 'Grade ', 2, 'fa fa-bar-chart-o'),
(15, 'employee_promotion', 'Promotion', 2, 'fa fa-legal'),
(16, 'employee_program', 'Program', 2, 'fa fa-suitcase'),
(17, 'upload', 'Upload', 3, 'fa fa-upload'),
(18, 'download', 'Download', 3, 'fa fa-download');

-- --------------------------------------------------------

--
-- Table structure for table `m_navigasi_parent`
--

CREATE TABLE IF NOT EXISTS `m_navigasi_parent` (
  `id_parent` int(11) NOT NULL AUTO_INCREMENT,
  `parent` varchar(30) NOT NULL,
  PRIMARY KEY (`id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `m_navigasi_parent`
--

INSERT INTO `m_navigasi_parent` (`id_parent`, `parent`) VALUES
(1, 'FORM'),
(2, 'TRAINING'),
(3, 'EXTRAS');

-- --------------------------------------------------------

--
-- Table structure for table `m_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `m_pekerjaan` (
  `kode_pekerjaan` varchar(11) NOT NULL,
  `nama_pekerjaan` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `m_pekerjaan`
--
DROP TRIGGER IF EXISTS `ubah_pekerjaan`;
DELIMITER //
CREATE TRIGGER `ubah_pekerjaan` AFTER DELETE ON `m_pekerjaan`
 FOR EACH ROW begin
	update master set kode_pekerjaan = '' WHERE kode_pekerjaan = old.kode_pekerjaan;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_penilaian`
--

CREATE TABLE IF NOT EXISTS `m_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `a` int(3) NOT NULL,
  `b` int(3) NOT NULL,
  `c` int(3) NOT NULL,
  `d` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_perusahaan`
--

CREATE TABLE IF NOT EXISTS `m_perusahaan` (
  `kode_perusahaan` varchar(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_alamat` varchar(11) NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_perusahaan`),
  KEY `kode_alamat` (`kode_alamat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `m_perusahaan`
--
DROP TRIGGER IF EXISTS `ubah_perusahaan`;
DELIMITER //
CREATE TRIGGER `ubah_perusahaan` AFTER DELETE ON `m_perusahaan`
 FOR EACH ROW begin
	update master set kode_perusahaan = '' WHERE kode_perusahaan = old.kode_perusahaan;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_posisi`
--

CREATE TABLE IF NOT EXISTS `m_posisi` (
  `kode_posisi` varchar(11) NOT NULL,
  `nama_posisi` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_posisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `m_posisi`
--
DROP TRIGGER IF EXISTS `ubah_posisi`;
DELIMITER //
CREATE TRIGGER `ubah_posisi` AFTER DELETE ON `m_posisi`
 FOR EACH ROW begin
	update master set kode_posisi = '' WHERE kode_posisi = old.kode_posisi;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_program`
--

CREATE TABLE IF NOT EXISTS `m_program` (
  `kode_program` varchar(11) NOT NULL,
  `nama_program` varchar(30) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_role`
--

CREATE TABLE IF NOT EXISTS `m_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_role` varchar(2) NOT NULL,
  `master` varchar(20) NOT NULL,
  `tambah` int(1) NOT NULL,
  `lihat` int(1) NOT NULL,
  `edit` int(1) NOT NULL,
  `hapus` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_role` (`kode_role`),
  KEY `kode_role_2` (`kode_role`),
  KEY `master` (`master`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_tingkat`
--

CREATE TABLE IF NOT EXISTS `m_tingkat` (
  `kode_tingkat` varchar(11) NOT NULL,
  `nama_tingkat` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_tingkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `m_tingkat`
--
DROP TRIGGER IF EXISTS `ubah_tingkat`;
DELIMITER //
CREATE TRIGGER `ubah_tingkat` AFTER DELETE ON `m_tingkat`
 FOR EACH ROW begin
	update master set kode_tingkat = '' WHERE kode_tingkat = old.kode_tingkat;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `m_unit`
--

CREATE TABLE IF NOT EXISTS `m_unit` (
  `kode_unit` varchar(11) NOT NULL,
  `nama_unit` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `id` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `m_unit`
--
DROP TRIGGER IF EXISTS `ubah_unit`;
DELIMITER //
CREATE TRIGGER `ubah_unit` AFTER DELETE ON `m_unit`
 FOR EACH ROW begin
update master set kode_unit = '' where kode_unit = old.kode_unit;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `program_karyawan`
--

CREATE TABLE IF NOT EXISTS `program_karyawan` (
  `id_program` varchar(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `kode_program` varchar(11) NOT NULL,
  PRIMARY KEY (`id_program`),
  KEY `kode_program` (`kode_program`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `kode_user` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `kode_role` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`kode_user`),
  KEY `kode_role` (`kode_role`),
  KEY `kode_role_2` (`kode_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(15) NOT NULL,
  `akses_role` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_user` (`kode_user`),
  KEY `akses_role` (`akses_role`),
  KEY `akses_role_2` (`akses_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=964 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master`
--
ALTER TABLE `master`
  ADD CONSTRAINT `master_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `mt_employee` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mt_employee`
--
ALTER TABLE `mt_employee`
  ADD CONSTRAINT `mt_employee_ibfk_1` FOREIGN KEY (`kode_alamat`) REFERENCES `alamat` (`kode_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_area`
--
ALTER TABLE `m_area`
  ADD CONSTRAINT `m_area_ibfk_1` FOREIGN KEY (`kode_alamat`) REFERENCES `alamat` (`kode_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  ADD CONSTRAINT `m_perusahaan_ibfk_1` FOREIGN KEY (`kode_alamat`) REFERENCES `alamat` (`kode_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_karyawan`
--
ALTER TABLE `program_karyawan`
  ADD CONSTRAINT `program_karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `mt_employee` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`kode_user`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `add_year` ON SCHEDULE EVERY 1 YEAR STARTS '2019-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `db_gama`.`m_penilaian` (`id`, `tahun`, `a`, `b`, `c`, `d`) VALUES (NULL, YEAR(CURDATE()) ,0,0,0,0)$$

CREATE DEFINER=`root`@`localhost` EVENT `delete_point_null` ON SCHEDULE EVERY 1 SECOND STARTS '2018-05-30 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE from employee_penilaian WHERE nik = 0$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
