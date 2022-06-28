-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2021 pada 03.38
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penyewaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_pesan`
--

CREATE TABLE `det_pesan` (
  `no_pesan` int(11) NOT NULL,
  `kd_ruang` varchar(50) NOT NULL,
  `tgl_dipesan` date NOT NULL,
  `lama` tinyint(4) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `det_pesan`
--

INSERT INTO `det_pesan` (`no_pesan`, `kd_ruang`, `tgl_dipesan`, `lama`, `harga_sewa`, `jumlah_harga`) VALUES
(68, 'Arema Fc Official', '2021-09-17', 5, 30000000, 150000000),
(69, 'Lab KPPI', '2021-09-23', 5, 45000000, 225000000),
(70, '', '0000-00-00', 0, 0, 225),
(71, 'Lab KPPI', '2021-10-06', 2, 45000000, 90000000),
(72, 'Lab RPL', '2021-09-13', 2, 3000000, 6000000),
(73, 'Lab KPPI', '2021-09-18', 2, 45000000, 90000000),
(74, 'dindan', '2021-10-14', 5, 2312323, 11561615),
(75, 'Lab RPL', '2021-10-12', 5, 2000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `kd_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(100) NOT NULL,
  `alamat_gedung` varchar(100) NOT NULL,
  `gambar_gedung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`kd_gedung`, `nama_gedung`, `alamat_gedung`, `gambar_gedung`) VALUES
(38, '', '', ''),
(42, 'Gedung Mahardika', 'Jalan Jalan', '1638202912_20210820_062232.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelunasan`
--

CREATE TABLE `pelunasan` (
  `id_pelunasan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `uang` varchar(30) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelunasan`
--

INSERT INTO `pelunasan` (`id_pelunasan`, `id_user`, `tgl_pesan`, `uang`, `no_rekening`, `status`) VALUES
(1, 4, '2021-10-14', '100000000', '34523454534', '1'),
(4, 7, '2021-10-03', '2000000', '34523454534', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `no_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `uang` varchar(20) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`no_pesan`, `id_user`, `tgl_pesan`, `uang`, `no_rekening`, `status`) VALUES
(1, 7, '2021-09-15', '2000000', '34523454534', '1'),
(2, 7, '2021-10-10', '2000000', '34523454534', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `kd_ruang` int(11) NOT NULL,
  `kd_gedung` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `cont_person` int(20) NOT NULL,
  `tlp_person` int(15) NOT NULL,
  `tarif_biasa` int(20) NOT NULL,
  `tarif_kerjasama` int(20) NOT NULL,
  `gambar_ruang` blob NOT NULL,
  `fasilitas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`kd_ruang`, `kd_gedung`, `nama_ruangan`, `cont_person`, `tlp_person`, `tarif_biasa`, `tarif_kerjasama`, `gambar_ruang`, `fasilitas`) VALUES
(75, 40, 'Lab RPL', 8912345, 2147483647, 2000000, 100000, 0x313434313633383531305f6675726e697475722d6d656a612e6a7067, 'Kamar Mandi Dan Ac'),
(76, 42, 'MM', 8912345, 8867376, 5000000, 5000000, 0x3938303335393431345f6675726e697475722d6b757273692e6a7067, 'Ac Dan lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat_user` varchar(100) NOT NULL,
  `tlp_user` varchar(15) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `komunitas` varchar(100) NOT NULL,
  `alamat_komunitas` varchar(100) NOT NULL,
  `tlp_komunitas` varchar(15) NOT NULL,
  `email_komunitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `tlp_user`, `email_user`, `password`, `komunitas`, `alamat_komunitas`, `tlp_komunitas`, `email_komunitas`) VALUES
(4, 'Admin', 'Jepara', '0891243454', 'adminruang@gmail.com', 'admin123', '', 'Jepara', '089123434', 'adminruang@gmail.com'),
(7, 'Dindan Romadhoni', 'Rajekwesi', '081391760471', 'dindanahmad024@gmail.com', 'dindan123', 'Dindan Pedia', 'Rajekwesi', '081391760471', 'dindanpedia@gmail.com'),
(13, 'Dindan Romadhoni', 'Rajekwesi', '081023456', 'adminruang@gmail.com', 'dindan123kopiko', 'Dindan Pedia', 'Rajekwesi', '089483764354', 'dindanpedia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `det_pesan`
--
ALTER TABLE `det_pesan`
  ADD PRIMARY KEY (`no_pesan`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`kd_gedung`);

--
-- Indeks untuk tabel `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`id_pelunasan`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`no_pesan`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kd_ruang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `det_pesan`
--
ALTER TABLE `det_pesan`
  MODIFY `no_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `kd_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pelunasan`
--
ALTER TABLE `pelunasan`
  MODIFY `id_pelunasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `no_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `kd_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
