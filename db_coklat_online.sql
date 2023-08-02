-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 18.53
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
  `id_login` int(11) NOT NULL,
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

INSERT INTO `booking` (`id_booking`, `id_login`, `kode_booking`, `id_coklat`, `nama`, `alamat`, `no_tlp`, `jumlah`, `total_harga`, `konfirmasi_pembayaran`, `tgl_input`, `bukti`) VALUES
(168, 19, '1690993539', 19, 'a', 's', '999', 1, 300000, 'belum bayar', '23-08-02', ''),
(169, 19, '1690993554', 19, 'tes', 'tes', '000', 1, 300000, 'belum bayar', '23-08-02', ''),
(170, 19, '1690993594', 19, 'tes', 'tes', '889', 1, 300000, 'belum bayar', '23-08-02', ''),
(171, 19, '1690993617', 19, 'tes', 'tes', '889', 1, 300000, 'belum bayar', '23-08-02', ''),
(172, 19, '1690993658', 19, 'janco', 'janco', '0987654321', 1, 300000, 'sedang di proses', '23-08-02', '1690993694.png'),
(173, 19, '1690993773', 18, 'akmal', 'akmal', '9098765432', 2, 600000, 'belum bayar', '23-08-02', ''),
(174, 19, '1690993984', 18, 'fff`f', 'ff', '0987654', 1, 300000, 'belum bayar', '23-08-02', ''),
(175, 19, '1690994640', 15, 'hh', 'cendrawasih', '78787', 0, 0, 'belum bayar', '23-08-02', '');

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
(18, 'admin', '$2y$10$61Ddh2m4FoaGSAOEe464zupcaOvZcOwZGwIkYmYM0A80V7rT7yHQu', 'admin'),
(19, 'najwar', '$2y$10$FgKO2Fu7Xtkq2EbVqlhOzuDtPeM5A8oaX/eBrI4lvsBV1Tbx7sPle', 'pengguna');

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
(5, 'najwar', '898989', 'wasih09@gmail.com', 'ioioioioiooooi');

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT untuk tabel `coklat`
--
ALTER TABLE `coklat`
  MODIFY `id_coklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
