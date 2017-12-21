-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
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
	`Nomor Antrian` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`Nama Lengkap` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`NIK` CHAR(16) NOT NULL COLLATE 'latin1_swedish_ci',
	`Keluhan` TINYTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`Tanggal Masuk` DATETIME NOT NULL,
	`Status` ENUM('ngantre','keluar','tidak datang','ditolak') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_puskesmas.antrian_aktif_json
DROP VIEW IF EXISTS `antrian_aktif_json`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `antrian_aktif_json` (
	`username` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`no_antrian` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_lengkap` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`nik` CHAR(16) NOT NULL COLLATE 'latin1_swedish_ci',
	`keluhan` TINYTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`tgl_masuk` DATETIME NOT NULL,
	`status` ENUM('ngantre','keluar','tidak datang','ditolak') NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for table db_puskesmas.dt_antrian
DROP TABLE IF EXISTS `dt_antrian`;
CREATE TABLE IF NOT EXISTS `dt_antrian` (
  `id_antrian` varchar(20) NOT NULL,
  `pasien` char(16) NOT NULL,
  `keluhan` tinytext NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('ngantre','keluar','tidak datang','ditolak') NOT NULL DEFAULT 'ngantre',
  `tanggal_keluar` datetime DEFAULT NULL,
  `pegawai` char(16) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_antrian`),
  KEY `FK_dt_antrian_dt_pasien` (`pasien`),
  KEY `FK_dt_antrian_dt_pegawai` (`pegawai`),
  CONSTRAINT `FK_dt_antrian_dt_pasien` FOREIGN KEY (`pasien`) REFERENCES `dt_pasien` (`nik`),
  CONSTRAINT `FK_dt_antrian_dt_pegawai` FOREIGN KEY (`pegawai`) REFERENCES `dt_pegawai` (`no_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_puskesmas.dt_antrian: ~33 rows (approximately)
DELETE FROM `dt_antrian`;
/*!40000 ALTER TABLE `dt_antrian` DISABLE KEYS */;
INSERT INTO `dt_antrian` (`id_antrian`, `pasien`, `keluhan`, `tanggal_masuk`, `status`, `tanggal_keluar`, `pegawai`, `no_telp`) VALUES
	('20171208000505', '2389798126', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-08 19:46:56', 'keluar', '2017-12-09 19:37:06', '1293991', '14045'),
	('20171208000506', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-08 19:46:58', 'keluar', '2017-12-09 19:37:07', '1293991', '14025'),
	('20171208000604', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-08 20:09:49', 'keluar', '2017-12-09 19:37:09', '1293991', '14045'),
	('20171209000104', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 00:31:33', 'keluar', '2017-12-09 19:37:09', '1293991', '14045'),
	('20171209000502', '45645764567456', 'Meriang singkaruan', '2017-12-09 00:34:41', 'keluar', '2017-12-09 19:37:10', '1293991', '14045'),
	('20171209000503', '235356346', 'Kebus dingin aduh-aduh', '2017-12-09 00:34:47', 'keluar', '2017-12-09 19:37:12', '1293991', '14045'),
	('20171209000601', '2389798126', 'ketug-ketug bayune ulian sakit hati', '2017-12-09 00:40:32', 'keluar', '2017-12-09 19:37:13', '1293991', '123456'),
	('20171209000602', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 00:40:46', 'keluar', '2017-12-09 19:37:14', '1293991', '14045'),
	('201712090007', '23535634693874', 'Hbcx', '2017-12-09 01:11:59', 'keluar', '2017-12-09 20:01:20', '1293991', ''),
	('20171209000701', '2389798126', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 01:10:40', 'keluar', '2017-12-09 20:01:21', '1293991', '13243546'),
	('201712090008', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 17:45:37', 'keluar', '2017-12-09 20:01:22', '1293991', '145234'),
	('201712090009', '235356346', 'Kebus dingin aduh-aduh', '2017-12-09 18:07:45', 'keluar', '2017-12-09 20:01:23', '1293991', '12345'),
	('20171209000902', '9283479862398496', 'ketug-ketug bayune ulian sakit hati', '2017-12-09 19:33:50', 'keluar', '2017-12-09 19:35:46', '1293991', '14045'),
	('20171209001401', '2389798126', 'Meriang singkaruan', '2017-12-09 22:44:00', 'keluar', '2017-12-09 22:44:54', '1293991', '12345'),
	('20171209001402', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 22:44:03', 'keluar', '2017-12-09 22:44:57', '1293991', '1234'),
	('20171209001403', '45645764567456', 'Kebus dingin aduh-aduh', '2017-12-09 22:44:07', 'keluar', '2017-12-09 22:44:58', '1293991', '1234567'),
	('201712100001', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-10 00:06:45', 'keluar', '2017-12-10 00:07:22', '1293991', '123'),
	('2017121000010', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-10 14:56:33', 'keluar', NULL, '1293991', '152876876'),
	('201712100001002', '23535634693874', 'Meriang singkaruan', '2017-12-10 14:40:07', 'keluar', NULL, '1293991', '1345'),
	('201712100003', '23535634693874', 'Kebus dingin aduh-aduh', '2017-12-10 11:04:13', 'keluar', '2017-12-10 11:09:31', '1293991', '1234'),
	('20171210000501', '235356346', 'Meriang singkaruan', '2017-12-10 11:08:00', 'keluar', '2017-12-10 11:09:32', '1293991', '123456'),
	('20171210000502', '2389798126', 'Kebus dingin aduh-aduh', '2017-12-10 11:09:22', 'keluar', '2017-12-10 11:09:33', '1293991', '123456'),
	('201712100006', '1809371', 'Impotensi', '2017-12-10 11:53:02', 'keluar', '2017-12-10 11:54:23', '1293991', '0895386898095'),
	('20171210000602', '213546534225', 'sakit jiwa', '2017-12-10 11:53:54', 'keluar', '2017-12-10 11:54:25', '1293991', '081337631970'),
	('201712100007', '1809371', 'kanker penis', '2017-12-10 13:03:51', 'keluar', '2017-12-10 13:25:17', '1293991', '0895387918313'),
	('20171210000901', '1809371', 'w', '2017-12-10 14:23:20', 'keluar', '2017-12-10 14:35:39', '1293991', '12'),
	('201712100011', '1809371', 'c.... kenyang', '2017-12-10 15:30:54', 'keluar', NULL, '1293991', ''),
	('201712100012', '1809371', 'Nyem nyemen', '2017-12-10 15:32:55', 'keluar', '2017-12-10 15:33:08', '1293991', ''),
	('201712180001', '23535634693874', 'mnbvcdfghjkl mnbvcx jhgftdry jhgvfdrttrtyu jhghcfty', '2017-12-18 16:02:31', 'keluar', '2017-12-18 09:18:39', '1293991', '87654323456789'),
	('201712180002', '23535634693874', 'drtfgyuhjkknbvcxe', '2017-12-18 16:22:22', 'keluar', '2017-12-18 09:22:31', '1293991', '3456789987654'),
	('201712180003', '23535634693874', 'mnbhvgcfdxsdftgh mnjbhvgtcrdxesrtvb mnubyvtfrdesdrftgb', '2017-12-18 16:24:18', 'keluar', '2017-12-18 09:25:35', '1293991', '09876543234567'),
	('201712180004', '23535634693874', 'njiubvgycftcryvgubhnij98765434567890', '2017-12-18 17:43:47', 'keluar', '2017-12-18 10:43:53', '1293991', '9876543456789'),
	('201712210002', '23535634693874', 'Tidak enak badan..', '2017-12-21 11:29:22', 'keluar', '2017-12-21 04:31:31', '1293991', '968648'),
	('201712210003', '23535634693874', 'Sjvsjsbs ', '2017-12-21 13:06:39', 'keluar', '2017-12-21 06:08:00', '1293991', '546484'),
	('201712210004', '213546534225', 'Capek pingin pulang', '2017-12-21 13:07:34', 'keluar', '2017-12-21 06:07:53', '1293991', '14045'),
	('201712210005', '1809371', 'sakit jiwa', '2017-12-21 13:08:18', 'keluar', '2017-12-21 06:08:32', '1293991', ''),
	('201712210007', '23535634693874', 'Navsnzzb', '2017-12-21 13:08:37', 'keluar', '2017-12-21 06:39:20', '1293991', '865468'),
	('20171221000702', '213546534225', 'Pingin cepet sarjana', '2017-12-21 06:09:06', 'keluar', '2017-12-21 06:09:21', '1293991', '11116666'),
	('201712210008', '213546534225', 'Kebelet nikah', '2017-12-21 13:09:54', 'keluar', '2017-12-21 06:42:32', '1293991', '455668');
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

-- Dumping data for table db_puskesmas.dt_pasien: ~7 rows (approximately)
DELETE FROM `dt_pasien`;
/*!40000 ALTER TABLE `dt_pasien` DISABLE KEYS */;
INSERT INTO `dt_pasien` (`username`, `nik`, `nama_lengkap`, `tgl_lahir`, `tempat_lahir`, `alamat`, `no_telp`) VALUES
	('adip', '9283479862398496', 'Adi Parmawan', '0000-00-00', 'skdjhcgsgd', 'sdjhcbsdbcgsdigisdic sjdjcbsdgic sdjcbsbdgiuc sdjbcsbdc sjhdbch', '2325345622'),
	('adiparmawan2', '45645764567456', 'Adi Parmawan 2', '0000-00-00', 'sdkhghsjgdu', 'skdjhfshdfkhsdihfihdf sjdhfbksgdifu sdjfbsbdfi sdjfbsbdifgsd fsjdbfb', '2353456346'),
	('fikri', '872638', 'fikri', '2018-04-14', 'jkbghj', 'mnbsadjh', '87987'),
	('wira', '1809371', 'wiranatha', '1998-09-10', 'denpasar', 'denpasar', '0895386898095'),
	('wirnat', '2389798126', 'Wiranatha', '0000-00-00', 'Karangasem', 'Karangasem Selat', '9863876234'),
	('yanmastra', '23535634693874', 'Wayan Mastra', '1998-09-16', 'Ketewel', 'skjdfkjshdkfhk', '083119304230'),
	('yogadar', '235356346', 'Yoga Dharma', '1998-12-16', 'Ungasan', 'xvbdfb sdbashjdg ajshdguyasd jahsgdyud kajshdiuad ajshgdad aisudb', '912852'),
	('yogadharma', '213546534225', 'dgdhseagh', '2017-11-28', 'gsDHsDH', 'jlnbll', '098018408');
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
  `tgl_bekerja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`),
  UNIQUE KEY `no_pegawai` (`no_pegawai`),
  KEY `FK_dt_pegawai_user` (`username`),
  CONSTRAINT `FK_dt_pegawai_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_puskesmas.dt_pegawai: ~0 rows (approximately)
DELETE FROM `dt_pegawai`;
/*!40000 ALTER TABLE `dt_pegawai` DISABLE KEYS */;
INSERT INTO `dt_pegawai` (`username`, `no_pegawai`, `nama_lengkap`, `tempat_lahir`, `alamat`, `jenis_kelamin`, `no_telp`, `tgl_bekerja`) VALUES
	('adi', '1293991', 'Adi Parmawan', 'Ungasan', 'Ungasan', 'Laki-laki', '298787', '2017-12-10 11:25:46');
/*!40000 ALTER TABLE `dt_pegawai` ENABLE KEYS */;

-- Dumping structure for view db_puskesmas.riwayat_antrian
DROP VIEW IF EXISTS `riwayat_antrian`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `riwayat_antrian` (
	`Username Pasien` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`Nomor Antrian` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
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

-- Dumping data for table db_puskesmas.user: ~8 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`, `type`) VALUES
	('adi', '12345', 'pegawai'),
	('adip', '1234567', 'pasien'),
	('adiparmawan2', '12345678', 'pasien'),
	('fikri', '123', 'pasien'),
	('wira', 'wiranatha', 'pasien'),
	('wirnat', '1234567890', 'pasien'),
	('yanmastra', '1234567890', 'pasien'),
	('yogadar', '123', 'pasien'),
	('yogadharma', '1234', 'pasien');
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
tanggal_masuk AS 'Tanggal Masuk',
`status` AS 'Status'
FROM dt_antrian INNER JOIN dt_pasien ON dt_antrian.pasien = dt_pasien.nik
WHERE dt_antrian.`status` = 'ngantre' OR dt_antrian.`status` = 'tidak datang'
ORDER BY id_antrian ASC ;

-- Dumping structure for view db_puskesmas.antrian_aktif_json
DROP VIEW IF EXISTS `antrian_aktif_json`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `antrian_aktif_json`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `antrian_aktif_json` AS SELECT 
dt_pasien.username AS 'username',
id_antrian AS 'no_antrian', 
nama_lengkap AS 'nama_lengkap', 
nik AS 'nik', 
keluhan AS 'keluhan',
tanggal_masuk AS 'tgl_masuk',
`status` AS 'status'
FROM dt_antrian INNER JOIN dt_pasien ON dt_antrian.pasien = dt_pasien.nik
WHERE dt_antrian.`status` = 'ngantre' OR dt_antrian.`status` = 'tidak datang' 
OR dt_antrian.`status` = 'ditolak'
ORDER BY id_antrian ASC ;

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
ORDER BY dt_antrian.tanggal_keluar DESC ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
