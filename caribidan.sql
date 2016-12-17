-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 15 Des 2016 pada 03.50
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caribidan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bidan`
--

CREATE TABLE `data_bidan` (
  `id_ktp` int(16) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tempat` varchar(45) NOT NULL,
  `lat` varchar(45) NOT NULL,
  `lng` varchar(45) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(45) NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_bidan`
--

INSERT INTO `data_bidan` (`id_ktp`, `nama`, `tempat`, `lat`, `lng`, `alamat`, `tgl_lahir`, `agama`, `no_hp`, `jenis_kelamin`, `email`, `password`, `status`, `foto`) VALUES
(12345, 'Bayu', 'Malang', '-7.964602699999999', '112.6282833', 'Jln', '1999-03-03', 'Islam', '085755375035', 'Perempuan', 'admin', '123', 1, 'file_1481255877.jpg'),
(14650011, 'Muhammad Hilmi H.', 'Malang', '-7.9524166', '112.6459544', 'Jln Sumbersari', '1996-11-15', 'Islam', '089662254718', 'Laki-laki', 'hilmihafid@gmail.com', '_bismillah99', 1, 'file_1481041981.jpg'),
(14650014, 'Bayu Andriawan', 'Malang', '-7.951692599999999', '112.6394583', 'Jln Sumbersari', '1996-05-06', 'Islam', '085755375035', 'Laki-laki', 'bayu@gmail.com', 'bayu123', 1, 'file_1481248930.jpg'),
(14650015, 'Siska Puspitaningsih', 'Malang', '-7.960514', '112.625578', 'Jln Gajayana', '1995-05-11', 'Islam', '085755375035', 'Perempuan', 'siska@gmail.com', '123', 1, 'file_1481255048.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_dan_saran`
--

CREATE TABLE `kritik_dan_saran` (
  `nomor` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` bigint(20) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritik_dan_saran`
--

INSERT INTO `kritik_dan_saran` (`nomor`, `nama`, `email`, `no_telp`, `pesan`) VALUES
(1, 'Hilmi', 'hilmihafid@gmail.com', 85755375035, 'Bagus!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(10) NOT NULL,
  `id_ktp` int(16) NOT NULL,
  `ijazah` varchar(200) DEFAULT NULL,
  `surat_magang` varchar(200) DEFAULT NULL,
  `surat_izin` varchar(200) DEFAULT NULL,
  `sertifikatapn` varchar(200) DEFAULT NULL,
  `seertifikatctu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_ktp`, `ijazah`, `surat_magang`, `surat_izin`, `sertifikatapn`, `seertifikatctu`) VALUES
(2, 14650011, 'file_1481246770.jpg', NULL, NULL, NULL, NULL),
(3, 14650014, 'file_1481248961.jpg', NULL, NULL, NULL, NULL),
(4, 14650015, 'file_1481255084.jpg', NULL, NULL, NULL, NULL),
(5, 12345, 'file_1481255895.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admin`
--

CREATE TABLE `super_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `super_admin`
--

INSERT INTO `super_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bidan`
--
ALTER TABLE `data_bidan`
  ADD PRIMARY KEY (`id_ktp`),
  ADD KEY `id_ktp` (`id_ktp`);

--
-- Indexes for table `kritik_dan_saran`
--
ALTER TABLE `kritik_dan_saran`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_ktp` (`id_ktp`),
  ADD KEY `id_lampiran` (`id_lampiran`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kritik_dan_saran`
--
ALTER TABLE `kritik_dan_saran`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lampiran`
--
ALTER TABLE `lampiran`
  ADD CONSTRAINT `lampiran_ibfk_1` FOREIGN KEY (`id_ktp`) REFERENCES `data_bidan` (`id_ktp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
