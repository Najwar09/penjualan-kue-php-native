-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2023 pada 18.56
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
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `konfirmasi_pembayaran` varchar(50) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_login`, `kode_booking`, `nama`, `alamat`, `no_tlp`, `total_harga`, `konfirmasi_pembayaran`, `bukti`, `tanggal`) VALUES
(198, 21, '1691507904', 'najwar', 'najwar', '899899', 3300000, 'sedang di proses', '1691507920.jpg', '0000-00-00'),
(199, 21, '1691509754', 'arnold', 'arnold', '98988', 6300000, 'sedang di proses', '1691509800.png', '2023-08-08'),
(200, 20, '1691513590', 'lili', 'sdfsdk', '909', 600000, 'sedang di proses', '1691513613.jpg', '2023-08-08');

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
(15, 'coklat kacang', 300000, 35, 'kue baru', 'tersedia', '1690469004.png'),
(19, 'kue kering', 300000, 120, 'barukka', 'tersedia', '1690469324.jfif'),
(21, 'kue enak', 2100, 0, 'enak sekali', 'habis', '1691183012.png'),
(23, 'pepe', 54321, 0, 'ndak enak sekali', 'habis', '1691190761.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_coklat` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_coklat`, `id_booking`, `id_login`, `gambar`, `nama`, `harga`, `jumlah`, `subtotal`) VALUES
(46, 19, 1691507904, 21, '1690469324.jfif', 'kue kering', 300000, 5, 1500000),
(47, 15, 1691507904, 21, '1690469004.png', 'coklat kacang', 300000, 6, 1800000),
(48, 19, 1691509488, 21, '1690469324.jfif', 'kue kering', 300000, 3, 900000),
(49, 15, 1691509488, 21, '1690469004.png', 'coklat kacang', 300000, 4, 1200000),
(50, 19, 1691509754, 21, '1690469324.jfif', 'kue kering', 300000, 18, 5400000),
(51, 15, 1691509754, 21, '1690469004.png', 'coklat kacang', 300000, 3, 900000),
(52, 15, 1691513590, 20, '1690469004.png', 'coklat kacang', 300000, 2, 600000);

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
(18, 'admin', '$2y$10$aj1SINy00CSXCftQ1HHyOOCafu5IuhVEYu10Rn.CFvZ1n8rPPpPUW', 'admin'),
(19, 'ramadhan', '$2y$10$cHWcZGiUs1805CmMfV9yj.V5CnWsdDwfTA4TVkXIP2Z49NVXTIxzS', 'pengguna'),
(20, 'lili', '$2y$10$S4UvSCOTYm0ZJI2zApoFMOgilra5L8NNLtzgCG7O0sXlYWnpt1Evm', 'pengguna'),
(21, 'najwar', '$2y$10$cq.7dlxNO.6HyyiLHzDt/.dxfe1Q2uaqRYaJkbtIPbtWJ0Pn6prsW', 'pengguna');

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
(3, 'madne', '4989', 'mande@gmail.com', 'asdfsladkfdas');

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
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `coklat`
--
ALTER TABLE `coklat`
  MODIFY `id_coklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
