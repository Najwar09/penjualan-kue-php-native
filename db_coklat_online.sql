-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2023 pada 06.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_coklat_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `id_coklat` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `konfirmasi_pembayaran` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `kode_booking`, `id_coklat`, `nama`, `alamat`, `no_tlp`, `jumlah`, `total_harga`, `konfirmasi_pembayaran`, `tgl_input`, `bukti`) VALUES
(157, '1690571714', 19, 'tes', 'tes', '909090', 1, 300000, 'Pembayaran di terima', '23-07-28', '1690571750.jpg'),
(158, '1690571785', 18, 'najwar', 'najwar', '7878788', 4, 1200000, 'sedang di proses', '23-07-28', '1690571801.png'),
(159, '1690571818', 15, 'ramadhan', 'ramadhan', '9898898', 8, 2400000, 'sedang di proses', '23-07-28', '1690571830.png'),
(160, '1690572430', 15, 'tes2', 'tes2', '7878878', 1, 300000, 'Pembayaran di terima', '23-07-28', '1690572442.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coklat`
--

CREATE TABLE `coklat` (
  `id_coklat` int(11) NOT NULL,
  `nama_coklat` varchar(100) NOT NULL,
  `harga` int(255) NOT NULL,
  `stok` int(5) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coklat`
--

INSERT INTO `coklat` (`id_coklat`, `nama_coklat`, `harga`, `stok`, `deskripsi`, `status`, `gambar`) VALUES
(15, 'coklat kacang', 300000, 1, 'kue baru', 'tersedia', '1690469004.png'),
(18, 'kue kering', 300000, 1, 'barukka', 'tersedia', '1690469070.png'),
(19, 'kue kering', 300000, 554, 'barukka', 'tersedia', '1690469324.jfif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level`) VALUES
(4, 'najwar', '6286cc4af4d55c106f58bfab973d9ee5', 'pengguna'),
(7, 'bahar', '4ae47e149782b7133b0c41b92717846f', 'admin'),
(14, 'mande', '$2y$10$DFfx0QCvQIOi7CaalRl4w.gpVejbb0XDpMvTpBe0T5pBPYS/NOeCy', 'pengguna'),
(15, 'tes', '$2y$10$KE/bLe2ESxITByZKO/sLduPKr7QGp6MiYMQL7THB46LqkrH7GsraS', 'pengguna'),
(16, 'ninja', '$2y$10$DYjbJ9zlHZb6o6bEH0nCUeV0gDGqdvWMYG7UDWZG3yuS9qOd5HyCG', 'pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `nomor`, `email`, `pesan`) VALUES
(1, 'najwar', '049309403', 'wasih09@gmail.com', 'selamat datang di toko kue online kami'),
(2, 'najwar', '049309403', 'wasih09@gmail.com', 'selamat datang di toko kue online kami'),
(3, 'madne', '4989', 'mande@gmail.com', 'asdfsladkfdas'),
(4, 'bahar', '787877', 'wasih09@gmail.com', 'botto');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `coklat`
--
ALTER TABLE `coklat`
  ADD PRIMARY KEY (`id_coklat`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `coklat`
--
ALTER TABLE `coklat`
  MODIFY `id_coklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
