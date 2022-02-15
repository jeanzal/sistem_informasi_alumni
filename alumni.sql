-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 15.54
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id_alumni` int(11) NOT NULL,
  `nama_alumni` varchar(50) NOT NULL,
  `jenkel` varchar(30) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_alumni`
--

INSERT INTO `tb_alumni` (`id_alumni`, `nama_alumni`, `jenkel`, `id_jurusan`, `id_angkatan`, `asal`, `level`, `username`, `password`) VALUES
(7, 'Admin', 'Laki-laki', 2, 6, 'Nias', 1, 'admin', 'admin'),
(9, 'Linda', 'Perempuan', 6, 7, 'Jogja', 2, 'linda', 'linda'),
(10, 'Elean', 'Perempuan', 7, 8, 'Jambi', 2, 'elean', 'elean'),
(11, 'Pray', 'Laki-laki', 2, 8, 'Nias', 2, 'pray', 'pray'),
(12, 'Jean', 'Laki-laki', 1, 6, 'Nias', 2, 'jean', 'jean'),
(13, 'Dewi', 'Perempuan', 3, 7, 'Jakarta', 2, 'dewi', 'dewi'),
(14, 'Robert', 'Laki-laki', 6, 8, 'Papua', 2, 'robert', 'robert'),
(15, 'Engki', 'Laki-laki', 5, 6, 'Bandung', 2, 'engki', 'engki'),
(16, 'Dono', 'Laki-laki', 5, 7, 'Jawa', 2, 'dono', 'dono'),
(17, 'Intan', 'Perempuan', 8, 10, 'Cilacap', 2, 'intan', 'intan'),
(18, 'Nimo', 'Perempuan', 8, 8, 'Bali', 2, 'nimo', 'nimo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_angkatan`
--

CREATE TABLE `tb_angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `angkatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_angkatan`
--

INSERT INTO `tb_angkatan` (`id_angkatan`, `angkatan`) VALUES
(1, 2012),
(2, 2013),
(3, 2013),
(4, 2014),
(5, 2015),
(6, 2016),
(7, 2017),
(8, 2018),
(9, 2019),
(10, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Sipil'),
(2, 'Informatika'),
(3, 'Ekonomi Manajemen'),
(4, 'Fisika'),
(5, 'Akutansi'),
(6, 'Farmasi'),
(7, 'Musik Gereja'),
(8, 'PAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `nama`, `komentar`) VALUES
(4, 'Jean', 'sangat bagus'),
(5, 'Fendi', 'Bagus Sekali'),
(6, 'Titus', 'Good\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_angkatan` (`id_angkatan`);

--
-- Indeks untuk tabel `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_alumni`
--
ALTER TABLE `tb_alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD CONSTRAINT `tb_alumni_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `tb_alumni_ibfk_2` FOREIGN KEY (`id_angkatan`) REFERENCES `tb_angkatan` (`id_angkatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
