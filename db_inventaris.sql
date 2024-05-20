-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 04.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_databarang`
--

CREATE TABLE `tb_databarang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_databarang`
--

INSERT INTO `tb_databarang` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah`, `kondisi`, `keterangan`, `gambar`) VALUES
(2, '123', '12', 1050, 'Baik', '12312', '664721d370b28.png'),
(3, '123', '1', 1, 'Baik', '123123', '66472500eb498.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tanggal_pinjam` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `tanggal_pengembalian` varchar(100) NOT NULL DEFAULT 'Belum dikembalikan',
  `kondisi_setelah` varchar(50) NOT NULL DEFAULT '-',
  `jumlah_pinjaman` int(11) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `keterangan_pinjaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(2, 'Vincen', 'vincen', '$2y$10$WD7CFRcCCr4s9GnAVbMgs.dpBM1iRXouXfko5TQxeBBlcsETGAhqS', 'Operator'),
(3, 'admin', 'admin', '$2y$10$bPd5SvvH/jeo6VYnZ7/EXehbcySA0KfRNzo02ou0YXexOFyqSudxu', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_databarang`
--
ALTER TABLE `tb_databarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_databarang`
--
ALTER TABLE `tb_databarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
