-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 08:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_farmflock`
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
  `id_jenis_pelatihan` int(11) NOT NULL,
  `id_status_antrian_pelatihan` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_antrian_pelatihan`
--

INSERT INTO `tbl_antrian_pelatihan` (`id_antrian_pelatihan`, `id_jenis_pelatihan`, `id_status_antrian_pelatihan`, `id_pengajuan`, `id_desa`) VALUES
(15, 4, 2, 38, 1),
(16, 4, 2, 39, 1),
(17, 4, 2, 40, 1),
(18, 4, 2, 41, 1),
(19, 4, 2, 42, 1),
(20, 4, 2, 43, 1),
(21, 4, 2, 44, 1),
(22, 4, 2, 45, 1),
(23, 4, 2, 46, 1),
(24, 4, 2, 47, 1),
(26, 4, 2, 48, 1),
(27, 4, 2, 49, 1),
(28, 4, 2, 50, 1),
(29, 4, 2, 51, 1),
(30, 4, 2, 52, 1),
(31, 4, 1, 53, 3),
(32, 4, 1, 55, 3),
(33, 3, 1, 54, 1);

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
(1, 'Sumbersari', 1),
(2, 'Antirogo', 1),
(3, 'Karangrejo', 1),
(4, 'Kebonsari', 1),
(5, 'Keranjingan', 1),
(6, 'Tegal Gede', 1),
(7, 'Wirolegi', 1),
(8, 'Darungan', 2),
(9, 'Klatakan', 2),
(10, 'Kramat Sukoharjo', 2),
(11, 'Patemon', 2),
(12, 'Manggisan', 2),
(13, 'Selodakon', 2),
(14, 'Tanggul Kulon', 2),
(15, 'Tanggul Wetan', 2),
(16, 'Ajung', 3),
(17, 'Klompangan', 3),
(18, 'Mangaran', 3),
(19, 'Pancakarya', 3),
(20, 'Rowo Indah', 3),
(21, 'Sukamakmur', 3),
(22, 'Wirowongso', 3),
(23, 'Ambulu', 4),
(24, 'Andongsari', 4),
(25, 'Karang Anyar', 4),
(26, 'Pontang', 4),
(27, 'Sabrang', 4),
(28, 'Sumberrejo', 4),
(29, 'Tegalsari', 4),
(30, 'Arjasa', 5),
(31, 'Biting', 5),
(32, 'Candijati', 5),
(33, 'Darsono', 5),
(34, 'Kamal', 5),
(35, 'Kemuninglor', 5),
(36, 'Bagorejo', 6),
(37, 'Gumukmas', 6),
(38, 'Karang Rejo', 6),
(39, 'Kepanjen', 6),
(40, 'Mayangan', 6),
(41, 'Menampu', 6),
(42, 'Purwosari', 6),
(43, 'Tembokrejo', 6),
(44, 'Jelbuk', 7),
(45, 'Panduman', 7),
(46, 'Suco Pangepok', 7),
(47, 'Suger Kidul', 7),
(48, 'Suko Jember', 7),
(49, 'Sukowiryo', 7),
(50, 'Cangkring', 8),
(51, 'Jatimulyo', 8),
(52, 'Jatisari', 8),
(53, 'Jenggawah', 8),
(54, 'Kemuning Sari Kidul', 8),
(55, 'Kartonegoro', 8),
(56, 'Seruni', 8),
(57, 'Wonojati', 8),
(58, 'Ajung Kalisat', 9),
(59, 'Gambiran', 9),
(60, 'Glagahwero', 9),
(61, 'Gumuksari', 9),
(62, 'Kalisat', 9),
(63, 'Patempuran', 9),
(64, 'Plalangan', 9),
(65, 'Sebanen', 9),
(66, 'Sukoreno', 9),
(67, 'Sumber Jeruk', 9),
(68, 'Sumber Kalong', 9),
(69, 'Sumber Ketempah', 9),
(70, 'Jember Kidul', 10),
(71, 'Kaliwates', 10),
(72, 'Kebon Agung', 10),
(73, 'Kepatihan', 10),
(74, 'Mangli', 10),
(75, 'Sempusari', 10),
(76, 'Tegal Besar', 10),
(77, 'Karang Paiton', 11),
(78, 'Ledokombo', 11),
(79, 'Lembengan', 11),
(80, 'Slateng', 11),
(81, 'Sukogidri', 11),
(82, 'Sumber Anget', 11),
(83, 'Sumber Bulus', 11),
(84, 'Sumber Lesung', 11),
(85, 'Sumber Salak', 11),
(86, 'Suren', 11),
(87, 'Mayang', 12),
(88, 'Mrawan', 12),
(89, 'Seputih', 12),
(90, 'Sidomukti', 12),
(91, 'Sumber Kejayan', 12),
(92, 'Tegal Waru', 12),
(93, 'Tegalrejo', 12),
(94, 'Karangkedawung', 13),
(95, 'Kawangrejo', 13),
(96, 'Lampeji', 13),
(97, 'Lengkong', 13),
(98, 'Mumbulsari', 13),
(99, 'Suco', 13),
(100, 'Tamansari', 13),
(101, 'Bedadung', 14),
(102, 'Jatian', 14),
(103, 'Kertosari', 14),
(104, 'Pakusari', 14),
(105, 'Patemon Pakusari', 14),
(106, 'Subo', 14),
(107, 'Sumber Pinang', 14),
(108, 'Banjar Sengon', 15),
(109, 'Baratan', 15),
(110, 'Bintoro', 15),
(111, 'Gebang', 15),
(112, 'Jember Lor', 15),
(113, 'Jumerto', 15),
(114, 'Patrang', 15),
(115, 'Slawu', 15),
(116, 'Garahan', 16),
(117, 'Harjomulyo', 16),
(118, 'Karangharjo', 16),
(119, 'Mulyorejo', 16),
(120, 'Pace', 16),
(121, 'Sempolan', 16),
(122, 'Sidomulyo', 16),
(123, 'Silo', 16),
(124, 'Sumberjati', 16),
(125, 'Dukuh Mencek', 17),
(126, 'Jubung', 17),
(127, 'Karangpring', 17),
(128, 'Kelungkung', 17),
(129, 'Sukorambi', 17),
(130, 'Arjasa Sukowono', 18),
(131, 'Balet Baru', 18),
(132, 'Dawuhan Mangli', 18),
(133, 'Mojogeni', 18),
(134, 'Pocangan', 18),
(135, 'Sukokerto', 18),
(136, 'Sukorejo', 18),
(137, 'Sukosari', 18),
(138, 'Sukowono', 18),
(139, 'Sumber Wringin', 18),
(140, 'Sumberdanti', 18),
(141, 'Sumberwaru', 18),
(142, 'Cumedak', 19),
(143, 'Gunung Malang', 19),
(144, 'Jambe Arum', 19),
(145, 'Plereyan', 19),
(146, 'Pringgondani', 19),
(147, 'Randu Agung', 19),
(148, 'Rowosari', 19),
(149, 'Sumber Pakem', 19),
(150, 'Sumberjambe', 19),
(151, 'Andongrejo', 21),
(152, 'Curahnongko', 21),
(153, 'Curahtakir', 21),
(154, 'Pondokrejo', 21),
(155, 'Sanenrejo', 21),
(156, 'Sidodadi', 21),
(157, 'Tempurejo', 21),
(158, 'Wonoasri', 21),
(169, 'Gadingrejo', 22),
(170, 'Gunungsari', 22),
(171, 'Mundurejo', 22),
(172, 'Paleran', 22),
(173, 'Sidorejo', 22),
(174, 'Sukoreno Umbulsari', 22),
(175, 'Tanjungsari', 22),
(176, 'Tegal Wangi', 22),
(177, 'Umbulrejo', 22),
(178, 'Umbulsari', 22),
(179, 'Balung Kidul', 23),
(180, 'Balung Kulon', 23),
(181, 'Balung Lor', 23),
(182, 'Curahlele', 23),
(183, 'Gumelar', 23),
(184, 'Karang Duren', 23),
(185, 'Karang Semanding', 23),
(186, 'Tutul', 23),
(187, 'Badean', 24),
(188, 'Bangsalsari', 24),
(189, 'Banjarsari', 24),
(190, 'Curah Kalong', 24),
(191, 'Gambirono', 24),
(192, 'Karangsono', 24),
(193, 'Langkap', 24),
(194, 'Petung', 24),
(195, 'Sukorejo Bangsalsari', 24),
(196, 'Tisnogambar', 24),
(197, 'Tugusari', 24),
(198, 'Jombang', 25),
(199, 'Keting', 25),
(200, 'Ngampelrejo', 25),
(201, 'Padomasan', 25),
(202, 'Wringin Agung', 25),
(203, 'Cakru', 26),
(204, 'Kencong', 26),
(205, 'Kraton', 26),
(206, 'Paseban', 26),
(214, 'Glagahwero Panti', 27),
(215, 'Kemiri', 27),
(216, 'Kemungsari Lor', 27),
(217, 'Pakis', 27),
(218, 'Panti', 27),
(219, 'Serut', 27),
(220, 'Suci', 27),
(221, 'Bagon', 28),
(222, 'Grenden', 28),
(223, 'Jambearum', 28),
(224, 'Kasiyan', 28),
(225, 'Kasiyan Timur', 28),
(226, 'Mlokorejo', 28),
(227, 'Mojomulyo', 28),
(228, 'Mojosari', 28),
(229, 'Puger Kulon', 28),
(230, 'Puger Wetan', 28),
(231, 'Wonosari', 28),
(232, 'Wringin Telu', 28),
(233, 'Curahmalang', 29),
(234, 'Gugut', 29),
(235, 'Kaliwining', 29),
(236, 'Nogosari', 29),
(237, 'Pecoro', 29),
(238, 'Rambigundam', 29),
(239, 'Rambipuji', 29),
(240, 'Rowotamtu', 29),
(241, 'Gelang', 30),
(242, 'Jambesari', 30),
(243, 'Jamintoro', 30),
(244, 'Jatiroto', 30),
(245, 'Kaliglagah', 30),
(246, 'Karang Bayat', 30),
(247, 'Pringgowirawan', 30),
(248, 'Rowo Tengah', 30),
(249, 'Sumber Agung', 30),
(250, 'Yosorati', 30),
(258, 'Ampel', 31),
(259, 'Dukuh Dempok', 31),
(260, 'Glundengan', 31),
(261, 'Kesilir', 31),
(262, 'Lojejer', 31),
(263, 'Tamansari Wuluhan', 31),
(264, 'Tanjung Rejo', 31),
(271, 'Pondokdalem', 20),
(272, 'Pondokjoyo', 20),
(273, 'Rejoagung', 20),
(274, 'Semboro', 20),
(275, 'Sidomekar', 20),
(276, 'Sidomulyo Semboro', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinas_peternakan`
--

CREATE TABLE `tbl_dinas_peternakan` (
  `id_dinas` int(11) NOT NULL,
  `email_dinas` varchar(125) NOT NULL,
  `password_dinas` varchar(64) NOT NULL,
  `foto_dinas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dinas_peternakan`
--

INSERT INTO `tbl_dinas_peternakan` (`id_dinas`, `email_dinas`, `password_dinas`, `foto_dinas`) VALUES
(1, 'dptrjember@gmail.com', 'Dinas123*', '664f96cbea0dc_1042_blob');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hewan`
--

CREATE TABLE `tbl_hewan` (
  `id_hewan` int(11) NOT NULL,
  `hewan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hewan`
--

INSERT INTO `tbl_hewan` (`id_hewan`, `hewan`) VALUES
(2, 'Domba'),
(3, 'Kambing'),
(4, 'Kerbau'),
(1, 'Sapi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hewan_peternakan`
--

CREATE TABLE `tbl_hewan_peternakan` (
  `id_hewan_peternakan` int(11) NOT NULL,
  `id_peternakan` int(11) NOT NULL,
  `id_jenis_hewan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hewan_peternakan`
--

INSERT INTO `tbl_hewan_peternakan` (`id_hewan_peternakan`, `id_peternakan`, `id_jenis_hewan`, `jumlah`) VALUES
(1, 1, 12, 10),
(2, 4, 43, 7),
(3, 4, 44, 10),
(4, 4, 31, 5),
(5, 4, 25, 2),
(6, 4, 19, 10),
(7, 4, 32, 20),
(8, 4, 24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_hewan`
--

CREATE TABLE `tbl_jenis_hewan` (
  `id_jenis_hewan` int(11) NOT NULL,
  `jenis_hewan` varchar(125) NOT NULL,
  `id_hewan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_hewan`
--

INSERT INTO `tbl_jenis_hewan` (`id_jenis_hewan`, `jenis_hewan`, `id_hewan`) VALUES
(12, 'Brahman', 1),
(13, 'Simental', 1),
(14, 'Limosin', 1),
(15, 'Brahman Cross', 1),
(16, 'Ongole', 1),
(17, 'Peranakan Ongole (PO)', 1),
(18, 'Bali', 1),
(19, 'Madura', 1),
(20, 'Aceh', 1),
(21, 'Angus', 1),
(22, 'Brangus', 1),
(24, 'Perah', 1),
(25, 'Murrah', 4),
(26, 'Swamp', 4),
(27, 'Sungai', 4),
(28, 'Kalang', 4),
(29, 'Kereman', 4),
(30, 'Kuning', 4),
(31, 'Kacang', 3),
(32, 'Etawa', 3),
(33, 'Peranakan Etawa (PE)', 3),
(34, 'Jawarandu', 3),
(35, 'Boer', 3),
(36, 'Saanen', 3),
(37, 'Gembrong', 3),
(38, 'Boerawa', 3),
(39, 'Muara', 3),
(40, 'Kosta', 3),
(41, 'Marica', 3),
(42, 'Samosir', 3),
(43, 'Garut', 2),
(44, 'Gembel', 2),
(45, 'Ekor Tebal', 2),
(46, 'Texel', 2),
(47, 'Merino', 2),
(48, 'Suffolk', 2),
(49, 'Dorper', 2),
(50, 'Awassi', 2),
(51, 'Van Rooy', 2),
(52, 'Gibas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pelatihan`
--

CREATE TABLE `tbl_jenis_pelatihan` (
  `id_jenis_pelatihan` int(11) NOT NULL,
  `jenis_pelatihan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_pelatihan`
--

INSERT INTO `tbl_jenis_pelatihan` (`id_jenis_pelatihan`, `jenis_pelatihan`) VALUES
(4, 'Penanganan Hewan Pasca Beranak'),
(1, 'Pencegahan & Penanganan PMK'),
(2, 'Takar Ransum Pakan Ternak'),
(3, 'Vaksinasi');

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
(2, 'Lumpy Skin Disease (LSD)'),
(1, 'Penyakit Mulut dan Kuku (PMK)'),
(4, 'Radang Ambing (Masitis)'),
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
(3, 'Ajung'),
(4, 'Ambulu'),
(5, 'Arjasa'),
(23, 'Balung'),
(24, 'Bangsalsari'),
(6, 'Gumuk Mas'),
(7, 'Jelbuk'),
(8, 'Jenggawah'),
(25, 'Jombang'),
(9, 'Kalisat'),
(10, 'Kaliwates'),
(26, 'Kencong'),
(11, 'Ledokombo'),
(12, 'Mayang'),
(13, 'Mumbulsari'),
(14, 'Pakusari'),
(27, 'Panti'),
(15, 'Patrang'),
(28, 'Puger'),
(29, 'Rambipuji'),
(20, 'Semboro'),
(16, 'Silo'),
(17, 'Sukorambi'),
(18, 'Sukowono'),
(30, 'Sumber Baru'),
(19, 'Sumber Jambe'),
(1, 'Sumber Sari'),
(2, 'Tanggul'),
(21, 'Tempurejo'),
(22, 'Umbulsari'),
(31, 'Wuluhan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `id_tingkat_keparahan` int(11) NOT NULL,
  `bukti_kunjungan` text DEFAULT NULL,
  `laporan_kunjungan` text DEFAULT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_ptl` int(11) NOT NULL,
  `id_status_berjalan` int(11) NOT NULL,
  `id_jenis_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kunjungan`
--

INSERT INTO `tbl_kunjungan` (`id_kunjungan`, `id_tingkat_keparahan`, `bukti_kunjungan`, `laporan_kunjungan`, `id_pengajuan`, `id_ptl`, `id_status_berjalan`, `id_jenis_penyakit`) VALUES
(9, 1, '6649cad0a523a_1734_sapipmk.jpg', 'sapinya udah gpp', 31, 2, 3, 3),
(10, 3, '663bb0bf90f46_8721_KTMNw.jpg', 'Tes', 32, 1, 3, 1),
(12, 2, '664ef7dd94333_7419_sapipmk.jpg', 'Sapinya kena pmk, tapi gpp kok', 33, 2, 2, 2),
(13, 3, NULL, NULL, 34, 1, 1, 1),
(14, 1, NULL, NULL, 36, 1, 1, 4),
(15, 1, NULL, NULL, 37, 1, 1, 2);

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
  `waktu_pelatihan` time NOT NULL,
  `bukti_pelatihan` text DEFAULT NULL,
  `laporan_pelatihan` text DEFAULT NULL,
  `id_desa` int(11) NOT NULL,
  `id_status_berjalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelatihan`
--

INSERT INTO `tbl_pelatihan` (`id_pelatihan`, `judul_pelatihan`, `deskripsi_pelatihan`, `tempat_pelatihan`, `tanggal_pelatihan`, `waktu_pelatihan`, `bukti_pelatihan`, `laporan_pelatihan`, `id_desa`, `id_status_berjalan`) VALUES
(7, 'Penanganan Hewan Pasca Beranak', 'bajdsklhgjbfndslgbcsmaxmlkkhjbd sdasldjb', 'Balai Desa', '2024-05-10', '10:30:00', '663df79f15612_1513_Pert1_4.jpg', 'Tes', 1, 3),
(9, 'tes', 'tes', 'tes', '2024-05-23', '17:50:00', NULL, NULL, 3, 1),
(10, 'tes', 'tes', 'tes', '2024-05-23', '17:50:00', NULL, NULL, 1, 1),
(11, 'Pelatihan X', 'a', 'a', '2024-05-22', '10:15:00', '664eefb4048c4_3467_logodinas.png', 'akuu', 1, 2),
(12, 'Pelatihan X', 'a', 'a', '2024-05-22', '05:20:00', NULL, NULL, 1, 1),
(13, 'Pelatihan X', 'a', 'a', '2024-05-22', '05:20:00', NULL, NULL, 1, 1);

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
(31, 'Sapi saya sakit pak', '2024-05-05', '13:22:10', 1, 1, 2),
(32, 'Sapi PMK', '2024-05-05', '14:29:41', 1, 1, 2),
(33, 'Sapi Struk', '2024-05-05', '14:29:55', 1, 1, 2),
(34, 'tes', '2024-05-05', '14:51:26', 1, 1, 2),
(36, 'a', '2024-05-06', '13:58:23', 1, 2, 2),
(37, '-', '2024-05-06', '15:19:55', 1, 1, 2),
(38, 'Tes', '2024-05-10', '15:15:01', 2, 1, 2),
(39, 'Tes', '2024-05-10', '15:15:05', 2, 1, 2),
(40, 'Tes', '2024-05-10', '15:15:08', 2, 1, 2),
(41, 'Tes', '2024-05-10', '15:15:11', 2, 1, 2),
(42, 'Tes', '2024-05-10', '15:15:15', 2, 1, 2),
(43, 'Tes', '2024-05-10', '15:15:20', 2, 1, 2),
(44, 'Tes', '2024-05-10', '15:15:33', 2, 1, 2),
(45, 'Tes', '2024-05-10', '15:15:37', 2, 1, 2),
(46, 'Tes', '2024-05-10', '15:15:40', 2, 1, 2),
(47, 'Tes', '2024-05-10', '15:22:49', 2, 1, 2),
(48, 'Tes', '2024-05-10', '15:22:52', 2, 1, 2),
(49, 'Tes', '2024-05-10', '15:22:56', 2, 1, 2),
(50, 'Tes', '2024-05-10', '15:23:00', 2, 1, 2),
(51, 'Tes', '2024-05-10', '15:23:03', 2, 1, 2),
(52, 'Tes', '2024-05-10', '15:23:06', 2, 1, 2),
(53, 'tes', '2024-05-19', '16:48:49', 2, 2, 2),
(54, 'Adain pelatihan anak sapi', '2024-05-20', '23:42:23', 2, 1, 2),
(55, 'Adain pelatihan sapi biar bisa balet', '2024-05-20', '23:44:38', 2, 2, 2),
(56, 'tes', '2024-05-25', '21:59:11', 1, 2, 1),
(57, 'tes', '2024-05-25', '21:59:17', 2, 2, 1);

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
  `foto_peternak` text DEFAULT NULL,
  `id_status_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peternak`
--

INSERT INTO `tbl_peternak` (`id_peternak`, `nama_peternak`, `nik_peternak`, `email_peternak`, `username_peternak`, `password_peternak`, `no_telp_peternak`, `foto_peternak`, `id_status_aktif`) VALUES
(1, 'Toni Sapto', '3515062501770002', 'tonisapto@gmail.com', 'toni_sapto25', 'Toni2501*', '083102678834', 'fototoni.jpg', 1),
(2, 'Supardi Santoso', '3515062501570001', 'supardisantoso@gmail.com', 'supardi21', 'Suppp123', '087656782353', '6651eacd6a16f_8656_blob', 1),
(3, 'Astoni Zaka', '3515062501770003', 'astonizaka@gmail.com', 'astonizaka11', 'Aston123*', '083102678934', NULL, 1),
(5, 'Kastono Marson', '3515060501740002', 'kastonomarson@gmail.com', 'kastono_', 'Kastono123*', '083127171267', NULL, 1),
(6, 'Samiaji Argo', '3517661902730001', 'samiajiargo@gmail.com', 'samiaji_', 'Samiaji123*', '081356278356', NULL, 1),
(7, 'a', '1234567891234567', 'agusprihandi22@gmail.com', 'toni_sapto22', 'Sella123*', '081332098765', NULL, 1),
(8, 'Ramadhan', '3515066728937461', 'ramadhani@gmail.com', 'ramadhan12_', 'Rahmad123*', '081332987167', NULL, 1),
(9, 'Bayu Laksono', '3515066787234001', 'bayulaksono@gmail.com', 'bayyyuuuhh', 'Bayu123*', '083278369182', NULL, 1),
(10, 'Kartono', '3515087901740001', 'kartono@gmail.com', 'kartono12', 'Kartono123*', '083267836455', NULL, 1),
(11, 'Mashada Ali', '3515066701890001', 'mashadaali@gmail.com', 'mashadaaa', 'Mashada123*', '081356277733', NULL, 1);

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
(1, 'Farm Town', 'Jl. Kalimantan 2 No.100', 16, 1),
(4, 'Sapi Gemilang Kuat', 'Jl. Jawa 2B No.31', 3, 2),
(5, 'Sapi Gemilang Kuad', 'Jl. Jawa 2B No.32', 19, 3);

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
  `foto_ptl` text DEFAULT NULL,
  `id_status_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ptl`
--

INSERT INTO `tbl_ptl` (`id_ptl`, `nama_ptl`, `nik_ptl`, `email_ptl`, `username_ptl`, `password_ptl`, `no_telp_ptl`, `foto_ptl`, `id_status_aktif`) VALUES
(1, 'Agus Prihandi', '3515062202910001', 'agusprihandi23@gmail.com', 'agusprihandi_', 'Agus123*', '083198761233', 'fotoagus.jpg', 1),
(2, 'Hendra Pratama', '3515061203890002', 'hendrapratama12@gmail.com', 'hendrapr12', 'Hendra1203*', '083188763134', 'ppptl.png', 1),
(12, 'Agustus Glob', '3515062202980001', 'agusgloby@gmail.com', 'aguspglobb', 'Agus123*', '083198761234', NULL, 1);

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
(2, 'Sudah Dibuatkan');

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
  ADD KEY `id_status_antrian_pelatihan` (`id_status_antrian_pelatihan`),
  ADD KEY `id_jenis_pelatihan` (`id_jenis_pelatihan`) USING BTREE;

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
-- Indexes for table `tbl_hewan`
--
ALTER TABLE `tbl_hewan`
  ADD PRIMARY KEY (`id_hewan`),
  ADD UNIQUE KEY `hewan` (`hewan`);

--
-- Indexes for table `tbl_hewan_peternakan`
--
ALTER TABLE `tbl_hewan_peternakan`
  ADD PRIMARY KEY (`id_hewan_peternakan`),
  ADD KEY `id_jenis_hewan` (`id_jenis_hewan`),
  ADD KEY `id_peternakan` (`id_peternakan`);

--
-- Indexes for table `tbl_jenis_hewan`
--
ALTER TABLE `tbl_jenis_hewan`
  ADD PRIMARY KEY (`id_jenis_hewan`),
  ADD UNIQUE KEY `jenis_hewan` (`jenis_hewan`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indexes for table `tbl_jenis_pelatihan`
--
ALTER TABLE `tbl_jenis_pelatihan`
  ADD PRIMARY KEY (`id_jenis_pelatihan`),
  ADD UNIQUE KEY `jenis_pelatihan` (`jenis_pelatihan`);

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
  MODIFY `id_alasan_ditolak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_antrian_pelatihan`
--
ALTER TABLE `tbl_antrian_pelatihan`
  MODIFY `id_antrian_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `tbl_dinas_peternakan`
--
ALTER TABLE `tbl_dinas_peternakan`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hewan`
--
ALTER TABLE `tbl_hewan`
  MODIFY `id_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_hewan_peternakan`
--
ALTER TABLE `tbl_hewan_peternakan`
  MODIFY `id_hewan_peternakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jenis_hewan`
--
ALTER TABLE `tbl_jenis_hewan`
  MODIFY `id_jenis_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_jenis_pelatihan`
--
ALTER TABLE `tbl_jenis_pelatihan`
  MODIFY `id_jenis_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jenis_pengajuan`
--
ALTER TABLE `tbl_jenis_pengajuan`
  MODIFY `id_jenis_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jenis_penyakit`
--
ALTER TABLE `tbl_jenis_penyakit`
  MODIFY `id_jenis_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jenis_persetujuan`
--
ALTER TABLE `tbl_jenis_persetujuan`
  MODIFY `id_jenis_persetujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_peternak`
--
ALTER TABLE `tbl_peternak`
  MODIFY `id_peternak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_peternakan`
--
ALTER TABLE `tbl_peternakan`
  MODIFY `id_peternakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ptl`
--
ALTER TABLE `tbl_ptl`
  MODIFY `id_ptl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `tbl_antrian_pelatihan_ibfk_4` FOREIGN KEY (`id_status_antrian_pelatihan`) REFERENCES `tbl_status_antrian_pelatihan` (`id_status_antrian_pelatihan`),
  ADD CONSTRAINT `tbl_antrian_pelatihan_ibfk_5` FOREIGN KEY (`id_jenis_pelatihan`) REFERENCES `tbl_jenis_pelatihan` (`id_jenis_pelatihan`);

--
-- Constraints for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD CONSTRAINT `tbl_desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `tbl_kecamatan` (`id_kecamatan`);

--
-- Constraints for table `tbl_hewan_peternakan`
--
ALTER TABLE `tbl_hewan_peternakan`
  ADD CONSTRAINT `tbl_hewan_peternakan_ibfk_1` FOREIGN KEY (`id_jenis_hewan`) REFERENCES `tbl_jenis_hewan` (`id_jenis_hewan`),
  ADD CONSTRAINT `tbl_hewan_peternakan_ibfk_2` FOREIGN KEY (`id_peternakan`) REFERENCES `tbl_peternakan` (`id_peternakan`);

--
-- Constraints for table `tbl_jenis_hewan`
--
ALTER TABLE `tbl_jenis_hewan`
  ADD CONSTRAINT `tbl_jenis_hewan_ibfk_1` FOREIGN KEY (`id_hewan`) REFERENCES `tbl_hewan` (`id_hewan`);

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
