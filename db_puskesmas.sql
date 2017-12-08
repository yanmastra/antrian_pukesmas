-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_puskesmas
DROP DATABASE IF EXISTS `db_puskesmas`;
CREATE DATABASE IF NOT EXISTS `db_puskesmas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_puskesmas`;

-- Dumping structure for view db_puskesmas.antrian_aktif
DROP VIEW IF EXISTS `antrian_aktif`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `antrian_aktif` (
	`Username` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Nomor Antrian` VARCHAR(16) NOT NULL COLLATE 'latin1_swedish_ci',
	`Nama Lengkap` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`NIK` CHAR(16) NOT NULL COLLATE 'latin1_swedish_ci',
	`Keluhan` TINYTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`Tanggal Masuk` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_puskesmas.antrian_tidak_datang
DROP VIEW IF EXISTS `antrian_tidak_datang`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `antrian_tidak_datang` (
	`id_antrian` VARCHAR(16) NOT NULL COLLATE 'latin1_swedish_ci',
	`pasien` CHAR(16) NOT NULL COLLATE 'latin1_swedish_ci',
	`keluhan` TINYTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`tanggal_masuk` DATETIME NOT NULL,
	`status` ENUM('ngantre','keluar','tidak datang') NOT NULL COLLATE 'latin1_swedish_ci',
	`tanggal_keluar` DATETIME NULL,
	`pegawai` CHAR(16) NULL COLLATE 'latin1_swedish_ci',
	`no_telp` VARCHAR(14) NULL COLLATE 'latin1_swedish_ci',
	`nama_lengkap` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for table db_puskesmas.dt_antrian
DROP TABLE IF EXISTS `dt_antrian`;
CREATE TABLE IF NOT EXISTS `dt_antrian` (
  `id_antrian` varchar(16) NOT NULL,
  `pasien` char(16) NOT NULL,
  `keluhan` tinytext NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('ngantre','keluar','tidak datang') NOT NULL DEFAULT 'ngantre',
  `tanggal_keluar` datetime DEFAULT NULL,
  `pegawai` char(16) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_antrian`),
  KEY `FK_dt_antrian_dt_pasien` (`pasien`),
  KEY `FK_dt_antrian_dt_pegawai` (`pegawai`),
  CONSTRAINT `FK_dt_antrian_dt_pasien` FOREIGN KEY (`pasien`) REFERENCES `dt_pasien` (`nik`),
  CONSTRAINT `FK_dt_antrian_dt_pegawai` FOREIGN KEY (`pegawai`) REFERENCES `dt_pegawai` (`no_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_puskesmas.dt_antrian: ~9 rows (approximately)
DELETE FROM `dt_antrian`;
/*!40000 ALTER TABLE `dt_antrian` DISABLE KEYS */;
INSERT INTO `dt_antrian` (`id_antrian`, `pasien`, `keluhan`, `tanggal_masuk`, `status`, `tanggal_keluar`, `pegawai`, `no_telp`) VALUES
	('201712010001', '45645764567456', 'sjkdbkbksjd sjdhbs sdhjcgys shjdgc ', '2017-12-08 22:22:33', 'tidak datang', '2017-12-02 13:02:27', '1293991', '87349827'),
	('201712010002', '45645764567456', 'adkbjshbd sdbhsjdjsh sjdhgu sdhjfguys ', '2017-11-30 22:53:49', 'keluar', '2017-12-08 06:59:17', '1293991', '87687578578'),
	('201712020001', '45645764567456', 'ksdjhfkbhsiufb', '2017-12-02 11:25:47', 'keluar', '2017-12-08 07:04:37', '1293991', '345345'),
	('201712020002', '45645764567456', 'sdjbfkjsbfdsdjbk sdbfs ', '2017-12-02 11:43:33', 'keluar', '2017-12-08 07:06:36', '1293991', '345346384768'),
	('201712020003', '9283479862398496', 'swfhisuf sdjfhuydf sjkdkhfuyf skjdbuy ', '2017-12-08 12:24:43', 'tidak datang', NULL, NULL, '982349823'),
	('201712020004', '2389798126', 'kjehfiguif sjdhbfyuf skdhfuie ', '2017-12-02 12:34:16', 'ngantre', '2017-12-08 06:30:30', NULL, '23847289364'),
	('201712040001', '45645764567456', 'Meriang singkaruan', '2017-12-04 23:46:25', 'ngantre', '2017-12-08 06:30:40', NULL, ''),
	('201712050001', '45645764567456', 'Kebus dingin aduh-aduh', '2017-12-05 11:15:04', 'ngantre', '2017-12-08 06:30:44', NULL, '4'),
	('201712050002', '9283479862398496', 'Meriang singkaruan', '2017-12-05 11:15:51', 'ngantre', '2017-12-08 06:36:00', NULL, '4');
/*!40000 ALTER TABLE `dt_antrian` ENABLE KEYS */;

-- Dumping structure for table db_puskesmas.dt_pasien
DROP TABLE IF EXISTS `dt_pasien`;
CREATE TABLE IF NOT EXISTS `dt_pasien` (
  `username` varchar(50) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_telp` char(14) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `nik_UNIQUE` (`nik`),
  KEY `FK_dt_pasien_user` (`username`),
  CONSTRAINT `FK_dt_pasien_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_puskesmas.dt_pasien: ~3 rows (approximately)
DELETE FROM `dt_pasien`;
/*!40000 ALTER TABLE `dt_pasien` DISABLE KEYS */;
INSERT INTO `dt_pasien` (`username`, `nik`, `nama_lengkap`, `tgl_lahir`, `tempat_lahir`, `alamat`, `no_telp`) VALUES
	('adip', '9283479862398496', 'Adi Parmawan', '0000-00-00', 'skdjhcgsgd', 'sdjhcbsdbcgsdigisdic sjdjcbsdgic sdjcbsbdgiuc sdjbcsbdc sjhdbch', '2325345622'),
	('adiparmawan2', '45645764567456', 'Adi Parmawan 2', '0000-00-00', 'sdkhghsjgdu', 'skdjhfshdfkhsdihfihdf sjdhfbksgdifu sdjfbsbdfi sdjfbsbdifgsd fsjdbfb', '2353456346'),
	('wirnat', '2389798126', 'Wiranatha', '0000-00-00', 'Karangasem', 'Karangasem Selat', '9863876234');
/*!40000 ALTER TABLE `dt_pasien` ENABLE KEYS */;

-- Dumping structure for table db_puskesmas.dt_pegawai
DROP TABLE IF EXISTS `dt_pegawai`;
CREATE TABLE IF NOT EXISTS `dt_pegawai` (
  `username` varchar(60) NOT NULL,
  `no_pegawai` char(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telp` char(14) NOT NULL,
  PRIMARY KEY (`no_pegawai`,`username`),
  KEY `FK_dt_pegawai_user` (`username`),
  CONSTRAINT `FK_dt_pegawai_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_puskesmas.dt_pegawai: ~1 rows (approximately)
DELETE FROM `dt_pegawai`;
/*!40000 ALTER TABLE `dt_pegawai` DISABLE KEYS */;
INSERT INTO `dt_pegawai` (`username`, `no_pegawai`, `nama_lengkap`, `tempat_lahir`, `alamat`, `jenis_kelamin`, `no_telp`) VALUES
	('adi', '1293991', 'Adi Parmawan', 'Ungasan', 'Ungasan', 'Laki-laki', '298787');
/*!40000 ALTER TABLE `dt_pegawai` ENABLE KEYS */;

-- Dumping structure for view db_puskesmas.riwayat_antrian
DROP VIEW IF EXISTS `riwayat_antrian`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `riwayat_antrian` (
	`Username Pasien` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Nomor Antrian` VARCHAR(16) NOT NULL COLLATE 'latin1_swedish_ci',
	`Nama Lengkap` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Keluhan` TINYTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`Tanggal Keluar` DATETIME NULL,
	`Alamat` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci',
	`Nama Pegawai` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`Username Pegawai` VARCHAR(60) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for table db_puskesmas.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(60) NOT NULL,
  `password` tinytext NOT NULL,
  `type` enum('pegawai','pasien') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_puskesmas.user: ~4 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`, `type`) VALUES
	('adi', '12345', 'pegawai'),
	('adip', '1234567', 'pasien'),
	('adiparmawan2', '12345678', 'pasien'),
	('wirnat', '1234567890', 'pasien');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view db_puskesmas.antrian_aktif
DROP VIEW IF EXISTS `antrian_aktif`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `antrian_aktif`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `antrian_aktif` AS SELECT 
dt_pasien.username AS 'Username',
id_antrian AS 'Nomor Antrian', 
nama_lengkap AS 'Nama Lengkap', 
nik AS 'NIK', 
keluhan AS 'Keluhan',
tanggal_masuk AS 'Tanggal Masuk'
FROM dt_antrian INNER JOIN dt_pasien ON dt_antrian.pasien = dt_pasien.nik
WHERE dt_antrian.`status` = 'ngantre'
ORDER BY id_antrian ASC ;

-- Dumping structure for view db_puskesmas.antrian_tidak_datang
DROP VIEW IF EXISTS `antrian_tidak_datang`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `antrian_tidak_datang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `antrian_tidak_datang` AS SELECT 
dt_antrian.*,
dt_pasien.nama_lengkap, 
dt_pasien.alamat
FROM dt_pasien INNER JOIN dt_antrian ON dt_antrian.pasien = dt_pasien.nik 
WHERE dt_antrian.`status` = 'tidak datang' 
ORDER BY dt_antrian.tanggal_masuk ASC ;

-- Dumping structure for view db_puskesmas.riwayat_antrian
DROP VIEW IF EXISTS `riwayat_antrian`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `riwayat_antrian`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `riwayat_antrian` AS SELECT 
dt_pasien.username AS 'Username Pasien',
dt_antrian.id_antrian AS 'Nomor Antrian', 
dt_pasien.nama_lengkap AS 'Nama Lengkap', 
dt_antrian.keluhan AS 'Keluhan', 
dt_antrian.tanggal_keluar AS 'Tanggal Keluar', 
dt_pasien.alamat AS 'Alamat',
dt_pegawai.nama_lengkap AS 'Nama Pegawai', 
dt_pegawai.username AS 'Username Pegawai'
FROM dt_pasien INNER JOIN dt_antrian ON dt_antrian.pasien = dt_pasien.nik 
INNER JOIN dt_pegawai ON dt_antrian.pegawai = dt_pegawai.no_pegawai
WHERE dt_antrian.`status` = 'keluar'
ORDER BY dt_antrian.tanggal_keluar ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
