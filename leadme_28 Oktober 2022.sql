-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2022 pada 20.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leadme`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `idfasilitas` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`idfasilitas`, `nama`, `icon`) VALUES
(1, 'Indoor', NULL),
(2, 'Outdoor', NULL),
(3, 'Parkir Gratis', NULL),
(4, 'Snack', NULL),
(5, 'Makananan', NULL),
(6, 'Minuman', NULL),
(7, 'Kursi Standar', NULL),
(8, 'Kursi Premium', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitastiket`
--

CREATE TABLE `fasilitastiket` (
  `fasilitas_idfasilitas` int(11) NOT NULL,
  `tiket_idtiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fasilitastiket`
--

INSERT INTO `fasilitastiket` (`fasilitas_idfasilitas`, `tiket_idtiket`) VALUES
(1, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `idfoto` int(11) NOT NULL,
  `namafile` varchar(45) DEFAULT NULL,
  `penayangan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`idfoto`, `namafile`, `penayangan`) VALUES
(1, 'c1.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paroki`
--

CREATE TABLE `paroki` (
  `idparoki` int(11) NOT NULL,
  `namaParoki` varchar(250) DEFAULT NULL,
  `kevikepan` varchar(100) DEFAULT NULL,
  `keuskupan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `paroki`
--

INSERT INTO `paroki` (`idparoki`, `namaParoki`, `kevikepan`, `keuskupan`) VALUES
(1, 'Kelahiran Santa Perawan Maria Surabaya (Kepanjen - KELSAPA)', 'Surabaya Utara', 'Surabaya'),
(2, 'Kristus Raja Surabaya (Ketabang - KR)', 'Surabaya Utara', 'Surabaya'),
(3, 'Santo Mikael Surabaya (Perak - SANMIK)', 'Surabaya Utara', 'Surabaya'),
(4, 'St Vincentius A Paulo (Widodaren - SVAP)', 'Surabaya Utara', 'Surabaya'),
(5, 'Santo Marinus Yohanes Surabaya (Kenjeran - STMY)', 'Surabaya Utara', 'Surabaya'),
(6, 'Ratu Pencinta Damai Surabaya (Pogot - RPD)', 'Surabaya Utara', 'Surabaya'),
(7, 'Santa Maria Tak Bercela Surabaya (Ngagel - SMTB)', 'Surabaya Utara', 'Surabaya'),
(8, 'Aloysius Gonzaga Suarabaya (Satelit - ALGON)', 'Surabaya Barat', 'Surabaya'),
(9, 'Redeptor Mundi Surabaya (Dukuh Kupang - RM)', 'Surabaya Barat', 'Surabaya'),
(10, 'Santo Yakobus Surabaya', 'Surabaya Barat', 'Surabaya'),
(11, 'Santo Yusuf Surabaya (Karang Pilang)', 'Surabaya Barat', 'Surabaya'),
(12, 'Sakramen Maha Kudus Surabaya (Pagesangan - SMK)', 'Surabaya Barat', 'Surabaya'),
(13, 'Santo Stefanus Surabaya (Tandes)', 'Surabaya Barat', 'Surabaya'),
(14, 'Hati Kudus Yesus Surabaya (Katedral - Polisi Istimewa - HKY)', 'Surabaya Selatan', 'Surabaya'),
(15, 'Yohanes Pemandi Surabaya (Wonokromo - YOPEM)', 'Surabaya Selatan', 'Surabaya'),
(16, 'Roh Kudus Surabaya (Gunung Anyar - RK)', 'Surabaya Selatan', 'Surabaya'),
(17, 'Gembala Yang Baik Surabaya (Jemur - GYB)', 'Surabaya Selatan', 'Surabaya'),
(18, 'Salib Suci Surabaya (Tropodo)', 'Surabaya Selatan', 'Surabaya'),
(19, 'Santa Maria Annuntiata Sidoarjo (Sidokumpul - SMA)', 'Surabaya Selatan', 'Surabaya'),
(20, 'Santo Paulus Surabaya (Juanda)', 'Surabaya Selatan', 'Surabaya'),
(21, 'Santo Monika Sidoarjo (Krian)', 'Mojokerto', 'Surabaya'),
(22, 'Santa Maria Jombang', 'Mojokerto', 'Surabaya'),
(23, 'Santo Yosef Mojokerto', 'Mojokerto', 'Surabaya'),
(24, 'Santa Perawan Maria Gresik', 'Mojokerto', 'Surabaya'),
(25, 'Santo Vincentius A Paulo Kediri', 'Kediri', 'Surabaya'),
(26, 'Santo Yosef Kediri', 'Kediri', 'Surabaya'),
(27, 'Santo Mateus Pare', 'Kediri', 'Surabaya'),
(28, 'Santo Paulus Nganjuk', 'Kediri', 'Surabaya'),
(29, 'Santo Pius X Blora', 'Blora', 'Surabaya'),
(30, 'Santo Paulus Bojonegoro', 'Blora', 'Surabaya'),
(31, 'Santo Petrus Tuban', 'Blora', 'Surabaya'),
(32, 'Santo Willibrodus Cepu', 'Blora', 'Surabaya'),
(33, 'Santo Petrus Paulus Rembang', 'Blora', 'Surabaya'),
(34, 'Santo Cornelius Madiun', 'Madiun', 'Surabaya'),
(35, 'Mater Dei Madiun ', 'Madiun', 'Surabaya'),
(36, 'Regina Pacis Magetan', 'Madiun', 'Surabaya'),
(37, 'Santa Maria Ponorogo ', 'Madiun', 'Surabaya'),
(38, 'Santo Hilarius Klepu', 'Madiun', 'Surabaya'),
(39, 'Santo Yosef Ngawi', 'Madiun', 'Surabaya'),
(40, 'Kristus Raja Ngrambe', 'Madiun', 'Surabaya'),
(41, 'Santo Yusuf Blitar', 'Blitar', 'Surabaya'),
(42, 'Santa Maria Blitar', 'Blitar', 'Surabaya'),
(43, 'Santo Petrus Dan Paulus Wlingi', 'Blitar', 'Surabaya'),
(44, 'Santa Maria Dengan Tidak Bernoda Asal Tulungagung', 'Blitar', 'Surabaya'),
(45, 'Santo Fransiskus Asisi Resapombo', 'Blitar', 'Surabaya'),
(46, 'Santo Fransiskus Asisi Mojorejo', 'Blitar', 'Surabaya'),
(48, 'TIM LEADME', 'Surabaya Utara', 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penayangan`
--

CREATE TABLE `penayangan` (
  `idpenayangan` int(11) NOT NULL,
  `penyelenggara` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `embedLink` varchar(300) DEFAULT NULL,
  `paroki` int(11) NOT NULL,
  `jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penayangan`
--

INSERT INTO `penayangan` (`idpenayangan`, `penyelenggara`, `tanggal`, `keterangan`, `nama`, `alamat`, `embedLink`, `paroki`, `jual`) VALUES
(1, 1, '2022-11-24 18:30:00', 'Penayangan FIlm Outdoor Dengan Layar Lebar Dan Cahaya Bintang', 'Lapangan Maria Ratu Damai', 'Jalan Pogot Baru no 77-79 Surabaya', 'https://www.google.com/maps/place/Gereja+Katolik+Ratu+Pencinta+Damai/@-7.2325175,112.7629786,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd7f9a84ecc0aaf:0xe0fa5dc16289bddd!8m2!3d-7.2325228!4d112.7651673', 6, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyelenggara`
--

CREATE TABLE `penyelenggara` (
  `idpenyelenggara` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `namaContactPerson` varchar(45) DEFAULT NULL,
  `noTelpContactPerson` varchar(45) DEFAULT NULL,
  `saldoPenyelenggara` int(11) DEFAULT NULL,
  `saldoLeadme` int(11) DEFAULT NULL,
  `hpptiket` int(11) DEFAULT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penyelenggara`
--

INSERT INTO `penyelenggara` (`idpenyelenggara`, `nama`, `namaContactPerson`, `noTelpContactPerson`, `saldoPenyelenggara`, `saldoLeadme`, `hpptiket`, `logo`) VALUES
(1, 'OMK RPD', 'Bagas', '09123456789', 0, 0, 15000, 'lg2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
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
  `tiket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promodipakai`
--

CREATE TABLE `promodipakai` (
  `Promo` int(11) NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `nominalDiskon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayatuang`
--

CREATE TABLE `riwayatuang` (
  `idRiwayatUang` int(11) NOT NULL,
  `penyelenggara` int(11) NOT NULL,
  `transaksi` varchar(20) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `inOut` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `idtiket` int(11) NOT NULL,
  `penayangan` int(11) NOT NULL,
  `namaTiket` varchar(45) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `terjual` int(11) DEFAULT NULL,
  `pending` int(6) NOT NULL DEFAULT 0,
  `deskripsi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`idtiket`, `penayangan`, `namaTiket`, `harga`, `jumlah`, `terjual`, `pending`, `deskripsi`) VALUES
(1, 1, 'Bronze', 15000, 100, 0, 5, 'Tiket Paling Murah'),
(2, 1, 'Gold', 25000, 0, 0, 0, 'Tiket Termahal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiketdetail`
--

CREATE TABLE `tiketdetail` (
  `tiket` int(11) NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiketfinal`
--

CREATE TABLE `tiketfinal` (
  `idtiketFinal` int(20) NOT NULL,
  `tiketOnline` varchar(60) DEFAULT NULL,
  `transaksi` varchar(20) DEFAULT NULL,
  `namaTiket` varchar(45) DEFAULT NULL,
  `harga` int(30) DEFAULT NULL,
  `tanggalWaktuOffline` datetime DEFAULT NULL,
  `tanggalWaktuOnline` datetime DEFAULT NULL,
  `tanggalKehadiran` datetime DEFAULT NULL,
  `penayangan` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `qrCode` varchar(200) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `tiketOffline` varchar(20) DEFAULT NULL,
  `qrOffline` varchar(200) DEFAULT NULL,
  `pemesan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `noTelp` varchar(50) DEFAULT NULL,
  `paroki` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tiketfinal`
--

INSERT INTO `tiketfinal` (`idtiketFinal`, `tiketOnline`, `transaksi`, `namaTiket`, `harga`, `tanggalWaktuOffline`, `tanggalWaktuOnline`, `tanggalKehadiran`, `penayangan`, `status`, `qrCode`, `warna`, `tiketOffline`, `qrOffline`, `pemesan`, `email`, `noTelp`, `paroki`) VALUES
(1, 'BA10001', '27102022085047', 'Bronze', 15000, '2022-10-13 22:06:39', '2022-10-05 22:06:39', NULL, 1, NULL, '32432432554563445345345', 'BIRU', 'AE1000000000', '343242343242334242', 'Stefanus Shanny K', '21stefsk@gmail.com', '9888282212', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` varchar(20) NOT NULL,
  `paymentLinkId` varchar(100) DEFAULT NULL,
  `tanggalWaktu` datetime DEFAULT current_timestamp(),
  `batasBayar` datetime DEFAULT NULL,
  `waktuBayar` datetime DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `donasi` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `metode` varchar(45) DEFAULT NULL,
  `tiket` int(5) NOT NULL DEFAULT 0,
  `jumlah` int(5) NOT NULL DEFAULT 0,
  `pembeli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `paymentLinkId`, `tanggalWaktu`, `batasBayar`, `waktuBayar`, `harga`, `donasi`, `diskon`, `total`, `status`, `user`, `metode`, `tiket`, `jumlah`, `pembeli`) VALUES
('27102022085047', NULL, '2022-10-27 15:50:47', NULL, NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4'),
('27102022085509', NULL, '2022-10-27 15:55:09', NULL, NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4'),
('27102022091035', NULL, '2022-10-27 16:10:35', '2022-10-27 11:10:35', NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4'),
('27102022091134', NULL, '2022-10-27 16:11:34', '2022-10-27 11:11:34', NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4'),
('27102022091314', NULL, '2022-10-27 16:13:14', '2022-10-27 11:13:14', NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4'),
('27102022091335', NULL, '2022-10-27 16:13:35', '2022-10-27 11:13:35', NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4'),
('27102022091346', NULL, '2022-10-27 16:13:46', '2022-10-27 11:13:46', NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4'),
('27102022091457', NULL, '2022-10-27 16:14:57', '2022-10-27 11:14:57', NULL, NULL, 0, NULL, 75000, 'BELUM DIBAYAR', NULL, NULL, 1, 5, '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `noTelp` varchar(45) DEFAULT NULL,
  `hakAkses` varchar(45) DEFAULT NULL,
  `paroki` int(11) NOT NULL,
  `penyelenggara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `noTelp`, `hakAkses`, `paroki`, `penyelenggara`) VALUES
(1, 'admin@leadme.com', '$2y$10$59JL9DCF8Kbn99rfja33zeNb/D2ZAr09t.EFysTsVuRwSyIGILFQm', 'Admin', NULL, 'admin', 1, NULL),
(2, 'ivan@mail.com', '$2y$10$.yKUd/gM4XOCmoUivdG63uChu5B1SnOoRt1wJ.YyY2joArmwlo8v6', 'Ivan', NULL, 'guest', 2, 1),
(3, 'ivan2@mail.com', '$2y$10$c1D0HeQucdETbcVkr2GtR.5lSnSBBJMyB/zM/FnUKIwpBln0uDPd.', 'Ivan Penyelenggara', NULL, 'penyelenggara', 1, 1),
(4, '21stefsk@gmail.com', '$2y$10$3kBJgXn5YrZ7bn8XlcZOpuzE0zN1jm.ZMLXiObuBJ0gxOgCJqXfCG', 'Steranus Shanny K', '0812345678', 'guest', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`idfasilitas`);

--
-- Indeks untuk tabel `fasilitastiket`
--
ALTER TABLE `fasilitastiket`
  ADD PRIMARY KEY (`fasilitas_idfasilitas`,`tiket_idtiket`),
  ADD KEY `fk_fasilitas_has_tiket_tiket1_idx` (`tiket_idtiket`),
  ADD KEY `fk_fasilitas_has_tiket_fasilitas1_idx` (`fasilitas_idfasilitas`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idfoto`),
  ADD KEY `fk_foto_penayangan1_idx` (`penayangan`);

--
-- Indeks untuk tabel `paroki`
--
ALTER TABLE `paroki`
  ADD PRIMARY KEY (`idparoki`);

--
-- Indeks untuk tabel `penayangan`
--
ALTER TABLE `penayangan`
  ADD PRIMARY KEY (`idpenayangan`),
  ADD KEY `fk_penayangan_penyelenggara1_idx` (`penyelenggara`),
  ADD KEY `fk_penayangan_paroki1_idx` (`paroki`);

--
-- Indeks untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD PRIMARY KEY (`idpenyelenggara`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`idPromo`),
  ADD KEY `fk_promo_penayangan1_idx` (`penayangan`),
  ADD KEY `fk_promo_paroki1_idx` (`paroki`),
  ADD KEY `fk_promo_tiket1_idx` (`tiket`);

--
-- Indeks untuk tabel `promodipakai`
--
ALTER TABLE `promodipakai`
  ADD PRIMARY KEY (`Promo`,`transaksi`),
  ADD KEY `fk_Promo_has_transaksi_transaksi1_idx` (`transaksi`),
  ADD KEY `fk_Promo_has_transaksi_Promo1_idx` (`Promo`);

--
-- Indeks untuk tabel `riwayatuang`
--
ALTER TABLE `riwayatuang`
  ADD PRIMARY KEY (`idRiwayatUang`),
  ADD KEY `fk_RiwayatUang_penyelenggara1_idx` (`penyelenggara`),
  ADD KEY `fk_RiwayatUang_transaksi1_idx` (`transaksi`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`idtiket`),
  ADD KEY `fk_tiket_penayangan1_idx` (`penayangan`);

--
-- Indeks untuk tabel `tiketdetail`
--
ALTER TABLE `tiketdetail`
  ADD PRIMARY KEY (`tiket`,`transaksi`),
  ADD KEY `fk_tiket_has_transaksi_transaksi1_idx` (`transaksi`),
  ADD KEY `fk_tiket_has_transaksi_tiket1_idx` (`tiket`);

--
-- Indeks untuk tabel `tiketfinal`
--
ALTER TABLE `tiketfinal`
  ADD PRIMARY KEY (`idtiketFinal`),
  ADD KEY `fk_tiketFinal_transaksi1_idx` (`transaksi`),
  ADD KEY `fk_tiketFinal_penayangan1_idx` (`penayangan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `fk_transaksi_user1_idx` (`user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_paroki1_idx` (`paroki`),
  ADD KEY `fk_user_penyelenggara1_idx` (`penyelenggara`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `idfasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `idfoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paroki`
--
ALTER TABLE `paroki`
  MODIFY `idparoki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `penayangan`
--
ALTER TABLE `penayangan`
  MODIFY `idpenayangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  MODIFY `idpenyelenggara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `idtiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tiketfinal`
--
ALTER TABLE `tiketfinal`
  MODIFY `idtiketFinal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitastiket`
--
ALTER TABLE `fasilitastiket`
  ADD CONSTRAINT `fk_fasilitas_has_tiket_fasilitas1` FOREIGN KEY (`fasilitas_idfasilitas`) REFERENCES `fasilitas` (`idfasilitas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fasilitas_has_tiket_tiket1` FOREIGN KEY (`tiket_idtiket`) REFERENCES `tiket` (`idtiket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_foto_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `penayangan`
--
ALTER TABLE `penayangan`
  ADD CONSTRAINT `fk_penayangan_paroki1` FOREIGN KEY (`paroki`) REFERENCES `paroki` (`idparoki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penayangan_penyelenggara1` FOREIGN KEY (`penyelenggara`) REFERENCES `penyelenggara` (`idpenyelenggara`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `fk_promo_paroki1` FOREIGN KEY (`paroki`) REFERENCES `paroki` (`idparoki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_promo_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_promo_tiket1` FOREIGN KEY (`tiket`) REFERENCES `tiket` (`idtiket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `promodipakai`
--
ALTER TABLE `promodipakai`
  ADD CONSTRAINT `fk_Promo_has_transaksi_Promo1` FOREIGN KEY (`Promo`) REFERENCES `promo` (`idPromo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Promo_has_transaksi_transaksi1` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `riwayatuang`
--
ALTER TABLE `riwayatuang`
  ADD CONSTRAINT `fk_RiwayatUang_penyelenggara1` FOREIGN KEY (`penyelenggara`) REFERENCES `penyelenggara` (`idpenyelenggara`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RiwayatUang_transaksi1` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `fk_tiket_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tiketdetail`
--
ALTER TABLE `tiketdetail`
  ADD CONSTRAINT `fk_tiket_has_transaksi_tiket1` FOREIGN KEY (`tiket`) REFERENCES `tiket` (`idtiket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tiket_has_transaksi_transaksi1` FOREIGN KEY (`transaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tiketfinal`
--
ALTER TABLE `tiketfinal`
  ADD CONSTRAINT `fk_tiketFinal_penayangan1` FOREIGN KEY (`penayangan`) REFERENCES `penayangan` (`idpenayangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_paroki1` FOREIGN KEY (`paroki`) REFERENCES `paroki` (`idparoki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_penyelenggara1` FOREIGN KEY (`penyelenggara`) REFERENCES `penyelenggara` (`idpenyelenggara`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
