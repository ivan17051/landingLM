-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for leadme
CREATE DATABASE IF NOT EXISTS `leadme` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `leadme`;

-- Dumping structure for table leadme.fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `idfasilitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.fasilitas: ~8 rows (approximately)
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(1, 'Indoor', NULL);
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(2, 'Outdoor', NULL);
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(3, 'Parkir Gratis', NULL);
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(4, 'Snack', NULL);
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(5, 'Makananan', NULL);
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(6, 'Minuman', NULL);
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(7, 'Kursi Standar', NULL);
INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
	(8, 'Kursi Premium', NULL);
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;

-- Dumping structure for table leadme.fasilitastiket
CREATE TABLE IF NOT EXISTS `fasilitastiket` (
  `fasilitas_idfasilitas` int(11) NOT NULL,
  `tiket_idtiket` int(11) NOT NULL,
  PRIMARY KEY (`fasilitas_idfasilitas`,`tiket_idtiket`),
  KEY `fk_fasilitas_has_tiket_tiket1_idx` (`tiket_idtiket`),
  KEY `fk_fasilitas_has_tiket_fasilitas1_idx` (`fasilitas_idfasilitas`),
  CONSTRAINT `fk_fasilitas_has_tiket_fasilitas1` FOREIGN KEY (`fasilitas_idfasilitas`) REFERENCES `fasilitas` (`idfasilitas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fasilitas_has_tiket_tiket1` FOREIGN KEY (`tiket_idtiket`) REFERENCES `tiket` (`idtiket`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.fasilitastiket: ~0 rows (approximately)
/*!40000 ALTER TABLE `fasilitastiket` DISABLE KEYS */;
/*!40000 ALTER TABLE `fasilitastiket` ENABLE KEYS */;

-- Dumping structure for table leadme.foto
CREATE TABLE IF NOT EXISTS `foto` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `namafile` varchar(45) DEFAULT NULL,
  `penayangan` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfoto`),
  KEY `fk_foto_penayangan1_idx` (`penayangan`),
  CONSTRAINT `fk_foto_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.foto: ~0 rows (approximately)
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;

-- Dumping structure for table leadme.paroki
CREATE TABLE IF NOT EXISTS `paroki` (
  `idparoki` int(11) NOT NULL AUTO_INCREMENT,
  `namaParoki` varchar(250) DEFAULT NULL,
  `kevikepan` varchar(100) DEFAULT NULL,
  `keuskupan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idparoki`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.paroki: ~46 rows (approximately)
/*!40000 ALTER TABLE `paroki` DISABLE KEYS */;
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(1, 'Kelahiran Santa Perawan Maria Surabaya (Kepanjen - KELSAPA)', 'Surabaya Utara', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(2, 'Kristus Raja Surabaya (Ketabang - KR)', 'Surabaya Utara', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(3, 'Santo Mikael Surabaya (Perak - SANMIK)', 'Surabaya Utara', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(4, 'St Vincentius A Paulo (Widodaren - SVAP)', 'Surabaya Utara', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(5, 'Santo Marinus Yohanes Surabaya (Kenjeran - STMY)', 'Surabaya Utara', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(6, 'Ratu Pencinta Damai Surabaya (Pogot - RPD)', 'Surabaya Utara', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(7, 'Santa Maria Tak Bercela Surabaya (Ngagel - SMTB)', 'Surabaya Utara', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(8, 'Aloysius Gonzaga Suarabaya (Satelit - ALGON)', 'Surabaya Barat', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(9, 'Redeptor Mundi Surabaya (Dukuh Kupang - RM)', 'Surabaya Barat', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(10, 'Santo Yakobus Surabaya', 'Surabaya Barat', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(11, 'Santo Yusuf Surabaya (Karang Pilang)', 'Surabaya Barat', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(12, 'Sakramen Maha Kudus Surabaya (Pagesangan - SMK)', 'Surabaya Barat', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(13, 'Santo Stefanus Surabaya (Tandes)', 'Surabaya Barat', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(14, 'Hati Kudus Yesus Surabaya (Katedral - Polisi Istimewa - HKY)', 'Surabaya Selatan', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(15, 'Yohanes Pemandi Surabaya (Wonokromo - YOPEM)', 'Surabaya Selatan', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(16, 'Roh Kudus Surabaya (Gunung Anyar - RK)', 'Surabaya Selatan', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(17, 'Gembala Yang Baik Surabaya (Jemur - GYB)', 'Surabaya Selatan', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(18, 'Salib Suci Surabaya (Tropodo)', 'Surabaya Selatan', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(19, 'Santa Maria Annuntiata Sidoarjo (Sidokumpul - SMA)', 'Surabaya Selatan', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(20, 'Santo Paulus Surabaya (Juanda)', 'Surabaya Selatan', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(21, 'Santo Monika Sidoarjo (Krian)', 'Mojokerto', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(22, 'Santa Maria Jombang', 'Mojokerto', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(23, 'Santo Yosef Mojokerto', 'Mojokerto', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(24, 'Santa Perawan Maria Gresik', 'Mojokerto', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(25, 'Santo Vincentius A Paulo Kediri', 'Kediri', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(26, 'Santo Yosef Kediri', 'Kediri', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(27, 'Santo Mateus Pare', 'Kediri', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(28, 'Santo Paulus Nganjuk', 'Kediri', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(29, 'Santo Pius X Blora', 'Blora', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(30, 'Santo Paulus Bojonegoro', 'Blora', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(31, 'Santo Petrus Tuban', 'Blora', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(32, 'Santo Willibrodus Cepu', 'Blora', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(33, 'Santo Petrus Paulus Rembang', 'Blora', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(34, 'Santo Cornelius Madiun', 'Madiun', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(35, 'Mater Dei Madiun ', 'Madiun', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(36, 'Regina Pacis Magetan', 'Madiun', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(37, 'Santa Maria Ponorogo ', 'Madiun', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(38, 'Santo Hilarius Klepu', 'Madiun', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(39, 'Santo Yosef Ngawi', 'Madiun', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(40, 'Kristus Raja Ngrambe', 'Madiun', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(41, 'Santo Yusuf Blitar', 'Blitar', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(42, 'Santa Maria Blitar', 'Blitar', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(43, 'Santo Petrus Dan Paulus Wlingi', 'Blitar', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(44, 'Santa Maria Dengan Tidak Bernoda Asal Tulungagung', 'Blitar', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(45, 'Santo Fransiskus Asisi Resapombo', 'Blitar', 'Surabaya');
INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
	(46, 'Santo Fransiskus Asisi Mojorejo', 'Blitar', 'Surabaya');
/*!40000 ALTER TABLE `paroki` ENABLE KEYS */;

-- Dumping structure for table leadme.penayangan
CREATE TABLE IF NOT EXISTS `penayangan` (
  `idpenayangan` int(11) NOT NULL AUTO_INCREMENT,
  `penyelenggara` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `embedLink` varchar(300) DEFAULT NULL,
  `paroki` int(11) NOT NULL,
  `jual` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpenayangan`),
  KEY `fk_penayangan_penyelenggara1_idx` (`penyelenggara`),
  KEY `fk_penayangan_paroki1_idx` (`paroki`),
  CONSTRAINT `fk_penayangan_paroki1` FOREIGN KEY (`paroki`) REFERENCES `paroki` (`idparoki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_penayangan_penyelenggara1` FOREIGN KEY (`penyelenggara`) REFERENCES `penyelenggara` (`idpenyelenggara`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.penayangan: ~0 rows (approximately)
/*!40000 ALTER TABLE `penayangan` DISABLE KEYS */;
INSERT INTO `penayangan` (`idpenayangan`, `penyelenggara`, `tanggal`, `keterangan`, `nama`, `alamat`, `embedLink`, `paroki`, `jual`) VALUES
	(1, 1, '2022-11-24 18:30:00', 'Penayangan FIlm Outdoor Dengan Layar Lebar Dan Cahaya Bintang', 'Lapangan Maria Ratu Damai', 'Jalan Pogot Baru no 77-79 Surabaya', 'https://www.google.com/maps/place/Gereja+Katolik+Ratu+Pencinta+Damai/@-7.2325175,112.7629786,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd7f9a84ecc0aaf:0xe0fa5dc16289bddd!8m2!3d-7.2325228!4d112.7651673', 6, 0);
/*!40000 ALTER TABLE `penayangan` ENABLE KEYS */;

-- Dumping structure for table leadme.penyelenggara
CREATE TABLE IF NOT EXISTS `penyelenggara` (
  `idpenyelenggara` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `namaContactPerson` varchar(45) DEFAULT NULL,
  `noTelpContactPerson` varchar(45) DEFAULT NULL,
  `saldoPenyelenggara` int(11) DEFAULT NULL,
  `saldoLeadme` int(11) DEFAULT NULL,
  `hpptiket` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpenyelenggara`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.penyelenggara: ~0 rows (approximately)
/*!40000 ALTER TABLE `penyelenggara` DISABLE KEYS */;
INSERT INTO `penyelenggara` (`idpenyelenggara`, `nama`, `namaContactPerson`, `noTelpContactPerson`, `saldoPenyelenggara`, `saldoLeadme`, `hpptiket`) VALUES
	(1, 'OMK RPD', 'Bagas', '09123456789', 0, 0, 15000);
/*!40000 ALTER TABLE `penyelenggara` ENABLE KEYS */;

-- Dumping structure for table leadme.promo
CREATE TABLE IF NOT EXISTS `promo` (
  `idPromo` int(11) NOT NULL,
  `kodePromo` varchar(45) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `terpakai` int(11) DEFAULT NULL,
  `minimumQuantity` int(11) DEFAULT NULL,
  `minimumTotal` int(11) DEFAULT NULL,
  `potonganPersen` int(11) DEFAULT NULL,
  `maksimumPotongan` int(11) DEFAULT NULL,
  `maksimalPenggunaanUser` int(11) DEFAULT NULL,
  `bisaDigabung` int(11) DEFAULT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT NULL,
  `penanggung` varchar(45) DEFAULT NULL,
  `penayangan` int(11) DEFAULT NULL,
  `paroki` int(11) DEFAULT NULL,
  `tiket` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPromo`),
  KEY `fk_promo_penayangan1_idx` (`penayangan`),
  KEY `fk_promo_paroki1_idx` (`paroki`),
  KEY `fk_promo_tiket1_idx` (`tiket`),
  CONSTRAINT `fk_promo_paroki1` FOREIGN KEY (`paroki`) REFERENCES `paroki` (`idparoki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_promo_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_promo_tiket1` FOREIGN KEY (`tiket`) REFERENCES `tiket` (`idtiket`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.promo: ~0 rows (approximately)
/*!40000 ALTER TABLE `promo` DISABLE KEYS */;
/*!40000 ALTER TABLE `promo` ENABLE KEYS */;

-- Dumping structure for table leadme.promodipakai
CREATE TABLE IF NOT EXISTS `promodipakai` (
  `Promo` int(11) NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `nominalDiskon` int(11) DEFAULT NULL,
  PRIMARY KEY (`Promo`,`transaksi`),
  KEY `fk_Promo_has_transaksi_transaksi1_idx` (`transaksi`),
  KEY `fk_Promo_has_transaksi_Promo1_idx` (`Promo`),
  CONSTRAINT `fk_Promo_has_transaksi_Promo1` FOREIGN KEY (`Promo`) REFERENCES `promo` (`idPromo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Promo_has_transaksi_transaksi1` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.promodipakai: ~0 rows (approximately)
/*!40000 ALTER TABLE `promodipakai` DISABLE KEYS */;
/*!40000 ALTER TABLE `promodipakai` ENABLE KEYS */;

-- Dumping structure for table leadme.riwayatuang
CREATE TABLE IF NOT EXISTS `riwayatuang` (
  `idRiwayatUang` int(11) NOT NULL,
  `penyelenggara` int(11) NOT NULL,
  `transaksi` varchar(20) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `inOut` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRiwayatUang`),
  KEY `fk_RiwayatUang_penyelenggara1_idx` (`penyelenggara`),
  KEY `fk_RiwayatUang_transaksi1_idx` (`transaksi`),
  CONSTRAINT `fk_RiwayatUang_penyelenggara1` FOREIGN KEY (`penyelenggara`) REFERENCES `penyelenggara` (`idpenyelenggara`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_RiwayatUang_transaksi1` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.riwayatuang: ~0 rows (approximately)
/*!40000 ALTER TABLE `riwayatuang` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayatuang` ENABLE KEYS */;

-- Dumping structure for table leadme.tiket
CREATE TABLE IF NOT EXISTS `tiket` (
  `idtiket` int(11) NOT NULL AUTO_INCREMENT,
  `penayangan` int(11) NOT NULL,
  `namaTiket` varchar(45) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `terjual` int(11) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idtiket`),
  KEY `fk_tiket_penayangan1_idx` (`penayangan`),
  CONSTRAINT `fk_tiket_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.tiket: ~2 rows (approximately)
/*!40000 ALTER TABLE `tiket` DISABLE KEYS */;
INSERT INTO `tiket` (`idtiket`, `penayangan`, `namaTiket`, `harga`, `jumlah`, `terjual`, `deskripsi`) VALUES
	(1, 1, 'Bronze', 15000, 100, 0, 'Tiket Paling Murah');
INSERT INTO `tiket` (`idtiket`, `penayangan`, `namaTiket`, `harga`, `jumlah`, `terjual`, `deskripsi`) VALUES
	(2, 1, 'Gold', 25000, 25, 0, 'Tiket Termahal');
/*!40000 ALTER TABLE `tiket` ENABLE KEYS */;

-- Dumping structure for table leadme.tiketdetail
CREATE TABLE IF NOT EXISTS `tiketdetail` (
  `tiket` int(11) NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`tiket`,`transaksi`),
  KEY `fk_tiket_has_transaksi_transaksi1_idx` (`transaksi`),
  KEY `fk_tiket_has_transaksi_tiket1_idx` (`tiket`),
  CONSTRAINT `fk_tiket_has_transaksi_tiket1` FOREIGN KEY (`tiket`) REFERENCES `tiket` (`idtiket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tiket_has_transaksi_transaksi1` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.tiketdetail: ~0 rows (approximately)
/*!40000 ALTER TABLE `tiketdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiketdetail` ENABLE KEYS */;

-- Dumping structure for table leadme.tiketfinal
CREATE TABLE IF NOT EXISTS `tiketfinal` (
  `idtiketFinal` varchar(20) NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `tanggalWaktuCetak` datetime DEFAULT NULL,
  `tanggalKehadiran` datetime DEFAULT NULL,
  `penayangan` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `qrCode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idtiketFinal`),
  KEY `fk_tiketFinal_transaksi1_idx` (`transaksi`),
  KEY `fk_tiketFinal_penayangan1_idx` (`penayangan`),
  CONSTRAINT `fk_tiketFinal_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tiketFinal_transaksi1` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.tiketfinal: ~0 rows (approximately)
/*!40000 ALTER TABLE `tiketfinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiketfinal` ENABLE KEYS */;

-- Dumping structure for table leadme.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` varchar(20) NOT NULL,
  `paymentLinkId` varchar(100) DEFAULT NULL,
  `tanggalWaktu` datetime DEFAULT NULL,
  `donasi` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `metode` varchar(45) DEFAULT NULL,
  `bookingCode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtransaksi`),
  KEY `fk_transaksi_user1_idx` (`user`),
  CONSTRAINT `fk_transaksi_user1` FOREIGN KEY (`user`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.transaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table leadme.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `noTelp` varchar(45) DEFAULT NULL,
  `hakAkses` varchar(45) DEFAULT NULL,
  `paroki` int(11) NOT NULL,
  `penyelenggara` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_user_paroki1_idx` (`paroki`),
  KEY `fk_user_penyelenggara1_idx` (`penyelenggara`),
  CONSTRAINT `fk_user_paroki1` FOREIGN KEY (`paroki`) REFERENCES `paroki` (`idparoki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_penyelenggara1` FOREIGN KEY (`penyelenggara`) REFERENCES `penyelenggara` (`idpenyelenggara`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table leadme.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `password`, `nama`, `noTelp`, `hakAkses`, `paroki`, `penyelenggara`) VALUES
	(1, 'admin@leadme.com', '$2y$10$59JL9DCF8Kbn99rfja33zeNb/D2ZAr09t.EFysTsVuRwSyIGILFQm', 'Admin', NULL, 'admin', 1, NULL);
INSERT INTO `user` (`id`, `email`, `password`, `nama`, `noTelp`, `hakAkses`, `paroki`, `penyelenggara`) VALUES
	(2, 'ivan@mail.com', '$2y$10$.yKUd/gM4XOCmoUivdG63uChu5B1SnOoRt1wJ.YyY2joArmwlo8v6', 'Ivan', NULL, 'guest', 2, 1);
INSERT INTO `user` (`id`, `email`, `password`, `nama`, `noTelp`, `hakAkses`, `paroki`, `penyelenggara`) VALUES
	(3, 'ivan2@mail.com', '$2y$10$c1D0HeQucdETbcVkr2GtR.5lSnSBBJMyB/zM/FnUKIwpBln0uDPd.', 'Ivan Penyelenggara', NULL, 'penyelenggara', 1, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
