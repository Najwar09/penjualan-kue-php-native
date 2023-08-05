-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2023 pada 02.45
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
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_login`, `kode_booking`, `nama`, `alamat`, `no_tlp`, `total_harga`, `konfirmasi_pembayaran`, `bukti`) VALUES
(190, 19, '1691178330', 'najwar', 'najwar', '123', 1200000, 'Pembayaran di terima', '1691178351.jpg'),
(191, 19, '1691179555', 'iqra', 'daya', '78787', 600000, 'Pembayaran di terima', '1691179582.png'),
(192, 20, '1691180194', 'lili', 'lili', '3232', 2100000, 'sedang di proses', '1691180228.jpg'),
(193, 19, '1691184102', 'ofsaidfoaio', 'oasifoa', '909090', 989898, 'sedang di proses', '1691184122.jpg'),
(194, 19, '1691190978', 'sultan', 'andara', '9849842', 45000000, 'Pembayaran di terima', '1691191002.jpg');

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
(15, 'coklat kacang', 300000, 76, 'kue baru', 'tersedia', '1690469004.png'),
(19, 'kue kering', 300000, 400, 'barukka', 'tersedia', '1690469324.jfif'),
(21, 'kue enak', 2100, 6, 'enak sekali', 'tersedia', '1691183012.png'),
(23, 'pepe', 54321, 1, 'ndak enak sekali', 'tersedia', '1691190761.png');

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
(29, 19, 1691178330, 19, '1690469324.jfif', 'kue kering', 300000, 4, 1200000),
(30, 18, 1691179555, 19, '1690469070.png', 'kue kering', 300000, 1, 300000),
(31, 15, 1691179555, 19, '1690469004.png', 'coklat kacang', 300000, 1, 300000),
(32, 18, 1691180194, 20, '1690469070.png', 'kue kering', 300000, 7, 2100000),
(33, 23, 1691184102, 19, '1691184057.png', 'fasdfasdlkl', 989898, 1, 989898),
(34, 19, 1691190978, 19, '1690469324.jfif', 'kue kering', 300000, 150, 45000000);

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
(20, 'lili', '$2y$10$S4UvSCOTYm0ZJI2zApoFMOgilra5L8NNLtzgCG7O0sXlYWnpt1Evm', 'pengguna');

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT untuk tabel `coklat`
--
ALTER TABLE `coklat`
  MODIFY `id_coklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
