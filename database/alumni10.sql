-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2021 pada 11.42
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni10`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_admin`
--

INSERT INTO `tabel_admin` (`id`, `nama`, `email`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_alumni`
--

CREATE TABLE `tabel_alumni` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_daftar` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_alumni`
--

INSERT INTO `tabel_alumni` (`id`, `nisn`, `nama`, `jk`, `tahun_masuk`, `tahun_lulus`, `no_telp`, `alamat`, `email`, `tgl_lahir`, `tempat_lahir`, `foto`, `tgl_daftar`, `password`, `username`) VALUES
(34, 1234567, 'Bayu Saputra P', 'Pria', 2016, 2019, '087653636765', 'Jalan Apel', 'putra@gmail.com', '2004-02-02', 'Jakarta', 'putra.png', 1597846597, '5e0c5a0bf82decdd43b2150b622c66c5', 'bayu'),
(35, 12345, 'Putri', 'Wanita', 2015, 2018, '0865252526', 'Jalan Nanas', 'putri@gmail.com', '2004-02-02', 'Medan', 'default.jpg', 1597846989, '81dc9bdb52d04dc20036dbd8313ed055', 'putri'),
(37, 123456, 'Ari', 'Pria', 2015, 2018, '08242534252', 'Jalan Durian', 'ari@gmail.com', '2005-02-03', 'Tanjungpinang', 'ari22.png', 1597849303, '81dc9bdb52d04dc20036dbd8313ed055', 'ari22'),
(38, 121232, 'Lisa', 'Wanita', 2017, 2020, '0854345452', 'Jalan Markisa', 'lisa@yahoo.com', '2006-11-06', 'Bandung', 'lisa.png', 1597849825, '81dc9bdb52d04dc20036dbd8313ed055', 'lisa'),
(39, 342312, 'Sabrina', 'Wanita', 2014, 2017, '08423434565', 'Jalan Jambu', 'sabrina@gmail.com', '2003-12-05', 'Banten', 'sabrin4.png', 1597850098, '81dc9bdb52d04dc20036dbd8313ed055', 'sabrin4'),
(40, 2324221, 'Gilang', 'Pria', 2015, 2018, '08524345423', 'Jalan Kentang', 'gilang@gmail.com', '2003-02-12', 'Sleman', 'gilang.png', 1597850816, '81dc9bdb52d04dc20036dbd8313ed055', 'gilang'),
(41, 4323241, 'Agus Suragus', 'Pria', 2015, 2017, '0853252636', 'Jalan Kentang', 'agus@gmail.com', '2002-11-08', 'Semarang', '4gus.png', 1597850984, '81dc9bdb52d04dc20036dbd8313ed055', '4gus'),
(42, 123768, 'Fika', 'Wanita', 2015, 2018, '085424252424', 'Jalan Cempedak', 'fika@gmail.com', '2003-11-05', 'Bogor', 'fika.png', 1597910418, '827ccb0eea8a706c4c34a16891f84e7b', 'fika'),
(43, 1343454, 'Joko', 'Pria', 2017, 2020, '085425242524', 'Jalan Manggis', 'joko@gmail.com', '2004-02-01', 'Batam', 'default.jpg', 1598110483, '827ccb0eea8a706c4c34a16891f84e7b', 'joko'),
(46, 1234578, 'Oji', 'Pria', 2015, 2018, '083837', 'Jalan Nangka', 'oji@gmail.com', '2020-09-19', 'Medan', 'oji234.png', 1600914252, '827ccb0eea8a706c4c34a16891f84e7b', 'oji234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pesan`
--

CREATE TABLE `tabel_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_pesan`
--

INSERT INTO `tabel_pesan` (`id`, `nama`, `email`, `pesan`, `jam`, `status`) VALUES
(23, 'Lia', 'lia@yahoo.com', 'Terima kasih\r\n', '2020-08-18 15:38:07', 1),
(24, 'Dewi', 'dewi@gmail.com', 'Halo', '2020-08-19 14:44:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_alumni`
--
ALTER TABLE `tabel_alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_pesan`
--
ALTER TABLE `tabel_pesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_alumni`
--
ALTER TABLE `tabel_alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tabel_pesan`
--
ALTER TABLE `tabel_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
