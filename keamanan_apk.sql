-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2022 pada 18.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keamanan_apk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `no_user` varchar(12) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `join_login` datetime NOT NULL,
  `data_login` datetime NOT NULL,
  `keluar_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `no_user`, `password_user`, `join_login`, `data_login`, `keluar_login`) VALUES
(15, 'iqbal hario syahputra', 'ihariosyahputra16@gmail.com', '012345665', '5c2fb951458b57e8e049d48a55cdddad', '2022-09-12 15:14:00', '2022-09-13 21:11:00', '2022-09-13 20:32:00'),
(16, 'Dini Oktaf', 'dini@gmail.com', '', '20f2c963a0bc322a6a7e4adb38b18e0d', '2022-09-13 15:24:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'I LOVE YOU INDONESIA', 'admin@gmail.com', '0857311', '827ccb0eea8a706c4c34a16891f84e7b', '2022-09-13 19:00:00', '2022-09-16 22:09:00', '2022-09-16 22:11:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
