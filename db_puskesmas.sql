/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `db_puskesmas`;
CREATE DATABASE IF NOT EXISTS `db_puskesmas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_puskesmas2`;

DROP TABLE IF EXISTS `dt_antrian`;
CREATE TABLE IF NOT EXISTS `dt_antrian` (
  `id_antrian` varchar(20) NOT NULL,
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

DELETE FROM `dt_antrian`;
/*!40000 ALTER TABLE `dt_antrian` DISABLE KEYS */;
INSERT INTO `dt_antrian` (`id_antrian`, `pasien`, `keluhan`, `tanggal_masuk`, `status`, `tanggal_keluar`, `pegawai`, `no_telp`) VALUES
	('20171208000504', '9283479862398496', 'ketug-ketug bayune ulian sakit hati', '2017-12-08 19:46:54', 'keluar', '2017-12-08 19:50:27', '1293991', '14045'),
	('20171208000505', '2389798126', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-08 19:46:56', 'keluar', '2017-12-08 19:50:28', '1293991', '14045'),
	('20171208000506', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-08 19:46:58', 'keluar', '2017-12-08 19:50:29', '1293991', '14025'),
	('20171208000604', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-08 20:09:49', 'keluar', '2017-12-08 20:10:42', '1293991', '14045'),
	('20171209000104', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 00:31:33', 'keluar', '2017-12-09 00:32:10', '1293991', '14045'),
	('20171209000502', '45645764567456', 'Meriang singkaruan', '2017-12-09 00:34:41', 'keluar', '2017-12-09 00:35:08', '1293991', '14045'),
	('20171209000503', '235356346', 'Kebus dingin aduh-aduh', '2017-12-09 00:34:47', 'keluar', '2017-12-09 00:40:16', '1293991', '14045'),
	('20171209000601', '2389798126', 'ketug-ketug bayune ulian sakit hati', '2017-12-09 00:40:32', 'keluar', '2017-12-09 00:40:53', '1293991', '123456'),
	('20171209000602', '23535634693874', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 00:40:46', 'keluar', '2017-12-09 00:40:54', '1293991', '14045'),
	('201712090007', '23535634693874', 'Hbcx', '2017-12-09 01:11:59', 'keluar', '2017-12-09 01:12:22', '1293991', ''),
	('20171209000701', '2389798126', 'Meriang singkaruan, keneh uyang ngenehin iluh', '2017-12-09 01:10:40', 'keluar', '2017-12-09 01:10:55', '1293991', '13243546');
/*!40000 ALTER TABLE `dt_antrian` ENABLE KEYS */;

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

DELETE FROM `dt_pasien`;
/*!40000 ALTER TABLE `dt_pasien` DISABLE KEYS */;
INSERT INTO `dt_pasien` (`username`, `nik`, `nama_lengkap`, `tgl_lahir`, `tempat_lahir`, `alamat`, `no_telp`) VALUES
	('adip', '9283479862398496', 'Adi Parmawan', '0000-00-00', 'skdjhcgsgd', 'sdjhcbsdbcgsdigisdic sjdjcbsdgic sdjcbsbdgiuc sdjbcsbdc sjhdbch', '2325345622'),
	('adiparmawan2', '45645764567456', 'Adi Parmawan 2', '0000-00-00', 'sdkhghsjgdu', 'skdjhfshdfkhsdihfihdf sjdhfbksgdifu sdjfbsbdfi sdjfbsbdifgsd fsjdbfb', '2353456346'),
	('wirnat', '2389798126', 'Wiranatha', '0000-00-00', 'Karangasem', 'Karangasem Selat', '9863876234'),
	('yanmastra', '23535634693874', 'Wayan Mastra', '1998-09-16', 'Ketewel', 'skjdfkjshdkfhk', '083119304230'),
	('yogadar', '235356346', 'Yoga Dharma', '1998-12-16', 'Ungasan', 'xvbdfb sdbashjdg ajshdguyasd jahsgdyud kajshdiuad ajshgdad aisudb', '912852');
/*!40000 ALTER TABLE `dt_pasien` ENABLE KEYS */;

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

DELETE FROM `dt_pegawai`;
/*!40000 ALTER TABLE `dt_pegawai` DISABLE KEYS */;
INSERT INTO `dt_pegawai` (`username`, `no_pegawai`, `nama_lengkap`, `tempat_lahir`, `alamat`, `jenis_kelamin`, `no_telp`) VALUES
	('adi', '1293991', 'Adi Parmawan', 'Ungasan', 'Ungasan', 'Laki-laki', '298787');
/*!40000 ALTER TABLE `dt_pegawai` ENABLE KEYS */;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(60) NOT NULL,
  `password` tinytext NOT NULL,
  `type` enum('pegawai','pasien') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `password`, `type`) VALUES
	('adi', '12345', 'pegawai'),
	('adip', '1234567', 'pasien'),
	('adiparmawan2', '12345678', 'pasien'),
	('wirnat', '1234567890', 'pasien'),
	('yanmastra', '1234567890', 'pasien'),
	('yogadar', '123', 'pasien');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

DROP VIEW IF EXISTS `antrian_aktif`;
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

DROP VIEW IF EXISTS `riwayat_antrian`;
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
