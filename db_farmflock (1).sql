-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2024 at 06:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfarmflock`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alasan_ditolak`
--

CREATE TABLE `tbl_alasan_ditolak` (
  `id_alasan_ditolak` int(11) NOT NULL,
  `keterangan_ditolak` text NOT NULL,
  `id_pengajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antrian_pelatihan`
--

CREATE TABLE `tbl_antrian_pelatihan` (
  `id_antrian_pelatihan` int(11) NOT NULL,
  `jenis_pelatihan` varchar(125) NOT NULL,
  `id_status_antrian_pelatihan` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id_desa` int(11) NOT NULL,
  `desa` varchar(125) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id_desa`, `desa`, `id_kecamatan`) VALUES
(1, 'Sumbersari', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinas_peternakan`
--

CREATE TABLE `tbl_dinas_peternakan` (
  `id_dinas` int(11) NOT NULL,
  `email_dinas` varchar(125) NOT NULL,
  `password_dinas` varchar(64) NOT NULL,
  `foto_dinas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dinas_peternakan`
--

INSERT INTO `tbl_dinas_peternakan` (`id_dinas`, `email_dinas`, `password_dinas`, `foto_dinas`) VALUES
(1, 'dptrjember@gmail.com', 'RahasiaNegara024', 'fotodinas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pengajuan`
--

CREATE TABLE `tbl_jenis_pengajuan` (
  `id_jenis_pengajuan` int(11) NOT NULL,
  `jenis_pengajuan` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_pengajuan`
--

INSERT INTO `tbl_jenis_pengajuan` (`id_jenis_pengajuan`, `jenis_pengajuan`) VALUES
(1, 'Kunjungan'),
(2, 'Pelatihan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_penyakit`
--

CREATE TABLE `tbl_jenis_penyakit` (
  `id_jenis_penyakit` int(11) NOT NULL,
  `jenis_penyakit` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_penyakit`
--

INSERT INTO `tbl_jenis_penyakit` (`id_jenis_penyakit`, `jenis_penyakit`) VALUES
(2, '(LSD) Lumpy Skin Disease'),
(1, 'PMK (Penyakit Mulut dan Kuku)'),
(3, 'Septichaemia Epizootica (SE)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_persetujuan`
--

CREATE TABLE `tbl_jenis_persetujuan` (
  `id_jenis_persetujuan` int(11) NOT NULL,
  `jenis_persetujuan` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_persetujuan`
--

INSERT INTO `tbl_jenis_persetujuan` (`id_jenis_persetujuan`, `jenis_persetujuan`) VALUES
(1, 'Belum Disetujui'),
(2, 'Disetujui'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Sumbersari');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `id_tingkat_keparahan` int(11) NOT NULL,
  `bukti_kunjungan` varchar(125) DEFAULT NULL,
  `laporan_kunjungan` text DEFAULT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_ptl` int(11) NOT NULL,
  `id_status_berjalan` int(11) NOT NULL,
  `id_jenis_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelatihan`
--

CREATE TABLE `tbl_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `judul_pelatihan` varchar(255) NOT NULL,
  `deskripsi_pelatihan` text NOT NULL,
  `tempat_pelatihan` varchar(255) NOT NULL,
  `tanggal_pelatihan` date NOT NULL,
  `waktu_pelatihan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bukti_pelatihan` varchar(255) DEFAULT NULL,
  `laporan_pelatihan` text DEFAULT NULL,
  `id_desa` int(11) NOT NULL,
  `id_status_berjalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `deskripsi_pengajuan` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `waktu_pengajuan` time NOT NULL,
  `id_jenis_pengajuan` int(11) NOT NULL,
  `id_peternak` int(11) NOT NULL,
  `id_jenis_persetujuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `deskripsi_pengajuan`, `tanggal_pengajuan`, `waktu_pengajuan`, `id_jenis_pengajuan`, `id_peternak`, `id_jenis_persetujuan`) VALUES
(15, 'Sapi saya mengalami gejala struk sehingga dia tidak dapat berdiri sendiri karena bukan makhluk individu seperti manusia, hidungnya mengeluarkan banyak ingus dan perlu ditangani dengan segera, mohon bantuannya.', '2024-04-16', '11:18:30', 1, 1, 1),
(17, 'Sapi saya terkena radang, tolong kesini ceffat', '2024-04-16', '14:11:46', 2, 1, 1),
(18, 'Coba lagi', '2024-04-16', '14:22:36', 1, 2, 1),
(19, 'Tes 123', '2024-04-16', '21:05:06', 2, 1, 1),
(20, 'asdfghjkl;', '2024-04-16', '21:08:08', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peternak`
--

CREATE TABLE `tbl_peternak` (
  `id_peternak` int(11) NOT NULL,
  `nama_peternak` varchar(125) NOT NULL,
  `nik_peternak` varchar(18) NOT NULL,
  `email_peternak` varchar(125) NOT NULL,
  `username_peternak` varchar(64) NOT NULL,
  `password_peternak` varchar(64) NOT NULL,
  `no_telp_peternak` varchar(13) NOT NULL,
  `foto_peternak` varchar(255) DEFAULT NULL,
  `id_status_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peternak`
--

INSERT INTO `tbl_peternak` (`id_peternak`, `nama_peternak`, `nik_peternak`, `email_peternak`, `username_peternak`, `password_peternak`, `no_telp_peternak`, `foto_peternak`, `id_status_aktif`) VALUES
(1, 'Toni Sapto', '3515062501770002', 'tonisapto@gmail.com', 'toni_sapto25', 'Toni2501*', '083102678834', 'fototoni.jpg', 1),
(2, 'Supardi Santoso', '3515062501570001', 'supardisantoso@gmail.com', 'supardi21', 'Suppp123', '087656782354', 'fotosupardi.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peternakan`
--

CREATE TABLE `tbl_peternakan` (
  `id_peternakan` int(11) NOT NULL,
  `nama_peternakan` varchar(125) NOT NULL,
  `jalan_peternakan` varchar(255) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_peternak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peternakan`
--

INSERT INTO `tbl_peternakan` (`id_peternakan`, `nama_peternakan`, `jalan_peternakan`, `id_desa`, `id_peternak`) VALUES
(1, 'Farm Town', 'Jl. Kalimantan 2 No.100', 1, 1),
(2, 'Sapi Gemilang Kuat', 'Jl. Jawa 2B No.32', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ptl`
--

CREATE TABLE `tbl_ptl` (
  `id_ptl` int(11) NOT NULL,
  `nama_ptl` varchar(125) NOT NULL,
  `nik_ptl` varchar(18) NOT NULL,
  `email_ptl` varchar(125) NOT NULL,
  `username_ptl` varchar(64) NOT NULL,
  `password_ptl` varchar(64) NOT NULL,
  `no_telp_ptl` varchar(13) NOT NULL,
  `foto_ptl` varchar(255) DEFAULT NULL,
  `id_status_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ptl`
--

INSERT INTO `tbl_ptl` (`id_ptl`, `nama_ptl`, `nik_ptl`, `email_ptl`, `username_ptl`, `password_ptl`, `no_telp_ptl`, `foto_ptl`, `id_status_aktif`) VALUES
(1, 'Agus Prihandi', '3515062202910001', 'agusprihandi22@gmail.com', 'agusprihandi_', 'Handi2202#', '083198761234', 'fotoagus.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_aktif`
--

CREATE TABLE `tbl_status_aktif` (
  `id_status_aktif` int(11) NOT NULL,
  `status_aktif` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_aktif`
--

INSERT INTO `tbl_status_aktif` (`id_status_aktif`, `status_aktif`) VALUES
(1, 'Aktif'),
(2, 'Non Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_antrian_pelatihan`
--

CREATE TABLE `tbl_status_antrian_pelatihan` (
  `id_status_antrian_pelatihan` int(11) NOT NULL,
  `status_antrian_pelatihan` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_antrian_pelatihan`
--

INSERT INTO `tbl_status_antrian_pelatihan` (`id_status_antrian_pelatihan`, `status_antrian_pelatihan`) VALUES
(1, 'Dalam Antrian'),
(2, 'Sudah Dibuatkan Pelatiha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_berjalan`
--

CREATE TABLE `tbl_status_berjalan` (
  `id_status_berjalan` int(11) NOT NULL,
  `status_berjalan` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_berjalan`
--

INSERT INTO `tbl_status_berjalan` (`id_status_berjalan`, `status_berjalan`) VALUES
(2, 'Berjalan'),
(1, 'Dalam Antrian'),
(3, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tingkat_keparahan`
--

CREATE TABLE `tbl_tingkat_keparahan` (
  `id_tingkat_keparahan` int(11) NOT NULL,
  `tingkat_keparahan` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tingkat_keparahan`
--

INSERT INTO `tbl_tingkat_keparahan` (`id_tingkat_keparahan`, `tingkat_keparahan`) VALUES
(3, 'Berat'),
(1, 'Ringan'),
(2, 'Sedang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alasan_ditolak`
--
ALTER TABLE `tbl_alasan_ditolak`
  ADD PRIMARY KEY (`id_alasan_ditolak`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `tbl_antrian_pelatihan`
--
ALTER TABLE `tbl_antrian_pelatihan`
  ADD PRIMARY KEY (`id_antrian_pelatihan`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_status_antrian_pelatihan` (`id_status_antrian_pelatihan`);

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD UNIQUE KEY `desa` (`desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `tbl_dinas_peternakan`
--
ALTER TABLE `tbl_dinas_peternakan`
  ADD PRIMARY KEY (`id_dinas`),
  ADD UNIQUE KEY `email_dinas` (`email_dinas`);

--
-- Indexes for table `tbl_jenis_pengajuan`
--
ALTER TABLE `tbl_jenis_pengajuan`
  ADD PRIMARY KEY (`id_jenis_pengajuan`),
  ADD UNIQUE KEY `jenis_pengajuan` (`jenis_pengajuan`);

--
-- Indexes for table `tbl_jenis_penyakit`
--
ALTER TABLE `tbl_jenis_penyakit`
  ADD PRIMARY KEY (`id_jenis_penyakit`),
  ADD UNIQUE KEY `jenis_penyakit` (`jenis_penyakit`);

--
-- Indexes for table `tbl_jenis_persetujuan`
--
ALTER TABLE `tbl_jenis_persetujuan`
  ADD PRIMARY KEY (`id_jenis_persetujuan`),
  ADD UNIQUE KEY `jenis_persetujuan` (`jenis_persetujuan`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD UNIQUE KEY `kecamatan` (`kecamatan`);

--
-- Indexes for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `id_tingkat_keparahan` (`id_tingkat_keparahan`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_status_berjalan` (`id_status_berjalan`),
  ADD KEY `id_ptl` (`id_ptl`),
  ADD KEY `id_jenis_penyakit` (`id_jenis_penyakit`);

--
-- Indexes for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_status_berjalan` (`id_status_berjalan`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_jenis_pengajuan` (`id_jenis_pengajuan`),
  ADD KEY `id_jenis_persetujuan` (`id_jenis_persetujuan`),
  ADD KEY `id_peternak` (`id_peternak`);

--
-- Indexes for table `tbl_peternak`
--
ALTER TABLE `tbl_peternak`
  ADD PRIMARY KEY (`id_peternak`),
  ADD UNIQUE KEY `nik_peternak` (`nik_peternak`,`email_peternak`,`username_peternak`,`no_telp_peternak`),
  ADD KEY `id_status_aktif` (`id_status_aktif`);

--
-- Indexes for table `tbl_peternakan`
--
ALTER TABLE `tbl_peternakan`
  ADD PRIMARY KEY (`id_peternakan`),
  ADD UNIQUE KEY `id_peternak` (`id_peternak`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indexes for table `tbl_ptl`
--
ALTER TABLE `tbl_ptl`
  ADD PRIMARY KEY (`id_ptl`),
  ADD UNIQUE KEY `nik_ptl` (`nik_ptl`,`email_ptl`,`username_ptl`,`no_telp_ptl`),
  ADD KEY `id_status_aktif` (`id_status_aktif`);

--
-- Indexes for table `tbl_status_aktif`
--
ALTER TABLE `tbl_status_aktif`
  ADD PRIMARY KEY (`id_status_aktif`),
  ADD UNIQUE KEY `status_aktif` (`status_aktif`);

--
-- Indexes for table `tbl_status_antrian_pelatihan`
--
ALTER TABLE `tbl_status_antrian_pelatihan`
  ADD PRIMARY KEY (`id_status_antrian_pelatihan`),
  ADD UNIQUE KEY `status_antrian_pelatihan` (`status_antrian_pelatihan`);

--
-- Indexes for table `tbl_status_berjalan`
--
ALTER TABLE `tbl_status_berjalan`
  ADD PRIMARY KEY (`id_status_berjalan`),
  ADD UNIQUE KEY `status_berjalan` (`status_berjalan`);

--
-- Indexes for table `tbl_tingkat_keparahan`
--
ALTER TABLE `tbl_tingkat_keparahan`
  ADD PRIMARY KEY (`id_tingkat_keparahan`),
  ADD UNIQUE KEY `tingkat_keparahan` (`tingkat_keparahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alasan_ditolak`
--
ALTER TABLE `tbl_alasan_ditolak`
  MODIFY `id_alasan_ditolak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_antrian_pelatihan`
--
ALTER TABLE `tbl_antrian_pelatihan`
  MODIFY `id_antrian_pelatihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dinas_peternakan`
--
ALTER TABLE `tbl_dinas_peternakan`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jenis_pengajuan`
--
ALTER TABLE `tbl_jenis_pengajuan`
  MODIFY `id_jenis_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jenis_penyakit`
--
ALTER TABLE `tbl_jenis_penyakit`
  MODIFY `id_jenis_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jenis_persetujuan`
--
ALTER TABLE `tbl_jenis_persetujuan`
  MODIFY `id_jenis_persetujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_peternak`
--
ALTER TABLE `tbl_peternak`
  MODIFY `id_peternak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_peternakan`
--
ALTER TABLE `tbl_peternakan`
  MODIFY `id_peternakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_aktif`
--
ALTER TABLE `tbl_status_aktif`
  MODIFY `id_status_aktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_antrian_pelatihan`
--
ALTER TABLE `tbl_status_antrian_pelatihan`
  MODIFY `id_status_antrian_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_berjalan`
--
ALTER TABLE `tbl_status_berjalan`
  MODIFY `id_status_berjalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tingkat_keparahan`
--
ALTER TABLE `tbl_tingkat_keparahan`
  MODIFY `id_tingkat_keparahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_alasan_ditolak`
--
ALTER TABLE `tbl_alasan_ditolak`
  ADD CONSTRAINT `tbl_alasan_ditolak_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `tbl_pengajuan` (`id_pengajuan`);

--
-- Constraints for table `tbl_antrian_pelatihan`
--
ALTER TABLE `tbl_antrian_pelatihan`
  ADD CONSTRAINT `tbl_antrian_pelatihan_ibfk_1` FOREIGN KEY (`id_status_antrian_pelatihan`) REFERENCES `tbl_status_antrian_pelatihan` (`id_status_antrian_pelatihan`),
  ADD CONSTRAINT `tbl_antrian_pelatihan_ibfk_2` FOREIGN KEY (`id_desa`) REFERENCES `tbl_desa` (`id_desa`),
  ADD CONSTRAINT `tbl_antrian_pelatihan_ibfk_3` FOREIGN KEY (`id_pengajuan`) REFERENCES `tbl_pengajuan` (`id_pengajuan`),
  ADD CONSTRAINT `tbl_antrian_pelatihan_ibfk_4` FOREIGN KEY (`id_status_antrian_pelatihan`) REFERENCES `tbl_status_antrian_pelatihan` (`id_status_antrian_pelatihan`);

--
-- Constraints for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD CONSTRAINT `tbl_desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `tbl_kecamatan` (`id_kecamatan`);

--
-- Constraints for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD CONSTRAINT `tbl_kunjungan_ibfk_1` FOREIGN KEY (`id_tingkat_keparahan`) REFERENCES `tbl_tingkat_keparahan` (`id_tingkat_keparahan`),
  ADD CONSTRAINT `tbl_kunjungan_ibfk_2` FOREIGN KEY (`id_pengajuan`) REFERENCES `tbl_pengajuan` (`id_pengajuan`),
  ADD CONSTRAINT `tbl_kunjungan_ibfk_3` FOREIGN KEY (`id_status_berjalan`) REFERENCES `tbl_status_berjalan` (`id_status_berjalan`),
  ADD CONSTRAINT `tbl_kunjungan_ibfk_4` FOREIGN KEY (`id_ptl`) REFERENCES `tbl_ptl` (`id_ptl`),
  ADD CONSTRAINT `tbl_kunjungan_ibfk_5` FOREIGN KEY (`id_jenis_penyakit`) REFERENCES `tbl_jenis_penyakit` (`id_jenis_penyakit`);

--
-- Constraints for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  ADD CONSTRAINT `tbl_pelatihan_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `tbl_desa` (`id_desa`),
  ADD CONSTRAINT `tbl_pelatihan_ibfk_2` FOREIGN KEY (`id_status_berjalan`) REFERENCES `tbl_status_berjalan` (`id_status_berjalan`);

--
-- Constraints for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD CONSTRAINT `tbl_pengajuan_ibfk_1` FOREIGN KEY (`id_jenis_pengajuan`) REFERENCES `tbl_jenis_pengajuan` (`id_jenis_pengajuan`),
  ADD CONSTRAINT `tbl_pengajuan_ibfk_2` FOREIGN KEY (`id_jenis_persetujuan`) REFERENCES `tbl_jenis_persetujuan` (`id_jenis_persetujuan`),
  ADD CONSTRAINT `tbl_pengajuan_ibfk_3` FOREIGN KEY (`id_peternak`) REFERENCES `tbl_peternak` (`id_peternak`);

--
-- Constraints for table `tbl_peternak`
--
ALTER TABLE `tbl_peternak`
  ADD CONSTRAINT `tbl_peternak_ibfk_1` FOREIGN KEY (`id_status_aktif`) REFERENCES `tbl_status_aktif` (`id_status_aktif`);

--
-- Constraints for table `tbl_peternakan`
--
ALTER TABLE `tbl_peternakan`
  ADD CONSTRAINT `tbl_peternakan_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `tbl_desa` (`id_desa`),
  ADD CONSTRAINT `tbl_peternakan_ibfk_3` FOREIGN KEY (`id_peternak`) REFERENCES `tbl_peternak` (`id_peternak`);

--
-- Constraints for table `tbl_ptl`
--
ALTER TABLE `tbl_ptl`
  ADD CONSTRAINT `tbl_ptl_ibfk_1` FOREIGN KEY (`id_status_aktif`) REFERENCES `tbl_status_aktif` (`id_status_aktif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
