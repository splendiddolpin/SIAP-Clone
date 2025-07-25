-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 09:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kel10ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `NIP` varchar(100) NOT NULL,
  `nama_dept` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`NIP`, `nama_dept`, `email`, `alamat`, `no_telp`, `username`, `foto`) VALUES
('19283738447', 'fathur', 'fathur123@gmail.com', 'Jlaan mboh', '086427686422', 'fathur', 'bag.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(100) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `email_undip` varchar(100) NOT NULL,
  `email_pribadi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `nama_dosen`, `email_undip`, `email_pribadi`, `alamat`, `no_telp`, `username`, `foto`) VALUES
('192783864', 'Kuiky Ganteng', 'kuikyganteng@lecturer.undip.ac.id', 'kuikyganteng@gmail.com', 'jalan sak karepmu', '08661863812631', 'kuiky', 'mahasiswa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `NIM` varchar(100) NOT NULL,
  `smt` int(11) NOT NULL,
  `jml_sks` int(11) NOT NULL,
  `file_irs` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '-',
  `validasi` varchar(100) NOT NULL DEFAULT 'Belum Divalidasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irs`
--

INSERT INTO `irs` (`NIM`, `smt`, `jml_sks`, `file_irs`, `status`, `validasi`) VALUES
('24060120140001', 1, 22, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140001', 2, 21, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140001', 3, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140001', 4, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140001', 5, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140001', 6, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140001', 7, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140002', 1, 21, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140002', 2, 22, 'Dataset.pdf', 'Aktif', 'Belum Divalidasi'),
('24060120140002', 3, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140002', 4, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140002', 5, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140002', 6, 24, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140002', 7, 23, '', 'Aktif', 'Belum Divalidasi'),
('24060120140002', 8, 21, '1.1. Web Platform (2).pdf', 'Aktif', 'Belum Divalidasi'),
('24060120140002', 9, 19, '', 'Aktif', 'Belum Divalidasi'),
('24060120140001', 8, 0, NULL, 'Aktif', 'Belum Divalidasi'),
('24060120140002', 10, 15, '1.1. Web Platform (2).pdf', 'Aktif', 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `NIM` varchar(100) NOT NULL,
  `smt` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '-',
  `jml_sks` int(11) NOT NULL,
  `ips` varchar(100) NOT NULL DEFAULT '-',
  `jml_sksk` int(11) NOT NULL,
  `ipk` varchar(100) NOT NULL DEFAULT '-',
  `file_khs` varchar(255) DEFAULT NULL,
  `validasi` varchar(100) NOT NULL DEFAULT 'Belum Divalidasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`NIM`, `smt`, `status`, `jml_sks`, `ips`, `jml_sksk`, `ipk`, `file_khs`, `validasi`) VALUES
('24060120140001', 1, 'Aktif', 22, '3,7', 22, '3,7', 'Dataset.pdf', 'Belum Divalidasi'),
('24060120140001', 2, 'Aktif', 21, '3,7', 43, '3,7', 'Prak1-Introduction to Machine Learning and Google Colab.pdf', 'Belum Divalidasi'),
('24060120140001', 3, 'Aktif', 24, '3,7', 67, '3,7', NULL, 'Belum Divalidasi'),
('24060120140001', 4, 'Aktif', 24, '3,7', 91, '3,7', NULL, 'Belum Divalidasi'),
('24060120140001', 5, 'Aktif', 24, '3,7', 115, '3,7', NULL, 'Belum Divalidasi'),
('24060120140001', 6, 'Aktif', 24, '3,7', 139, '3,7', NULL, 'Belum Divalidasi'),
('24060120140001', 7, 'Aktif', 24, '3,7', 163, '3,7', NULL, 'Belum Divalidasi'),
('24060120140002', 1, 'Aktif', 21, '3,8', 21, '3,8', 'P2_10_PPLC.pdf', 'Belum Divalidasi'),
('24060120140002', 2, 'Aktif', 22, '3,8', 43, '3,8', '', 'Belum Divalidasi'),
('24060120140002', 3, 'Aktif', 24, '3,8', 67, '3,8', '', 'Belum Divalidasi'),
('24060120140002', 4, 'Aktif', 24, '3,8', 91, '3,8', '', 'Belum Divalidasi'),
('24060120140002', 5, 'Aktif', 24, '3,8', 115, '3,8', '', 'Belum Divalidasi'),
('24060120140002', 6, 'Aktif', 24, '3,8', 139, '3,8', '', 'Belum Divalidasi'),
('24060120140002', 7, 'Aktif', 23, '3,8', 162, '3,8', '', 'Belum Divalidasi'),
('24060120140002', 8, 'Aktif', 21, '3.8', 183, '3.7', NULL, 'Belum Divalidasi'),
('24060120140002', 9, 'Aktif', 19, '3.8', 202, '3.8', NULL, 'Belum Divalidasi'),
('24060120140002', 10, 'Aktif', 15, '-', 217, '-', NULL, 'Belum Divalidasi'),
('24060120140001', 8, 'Aktif', 0, '-', 163, '-', NULL, 'Belum Divalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `kota_kab`
--

CREATE TABLE `kota_kab` (
  `kode_kota_kab` int(100) NOT NULL,
  `nama_kota_kab` varchar(100) NOT NULL,
  `kode_prov` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota_kab`
--

INSERT INTO `kota_kab` (`kode_kota_kab`, `nama_kota_kab`, `kode_prov`) VALUES
(1, 'Kabupaten Aceh Barat', 1),
(2, 'Kabupaten Aceh Barat Daya', 1),
(3, 'Kabupaten Aceh Besar', 1),
(4, 'Kabupaten Aceh Jaya', 1),
(5, 'Kabupaten Aceh Selatan', 1),
(6, 'Kabupaten Aceh Singkil', 1),
(7, 'Kabupaten Aceh Tamiang', 1),
(8, 'Kabupaten Aceh Tengah', 1),
(9, 'Kabupaten Aceh Tenggara', 1),
(10, 'Kabupaten Aceh Timur', 1),
(11, 'Kabupaten Aceh Utara', 1),
(12, 'Kabupaten Bener Meriah', 1),
(13, 'Kabupaten Bireuen', 1),
(14, 'Kabupaten Gayo Lues', 1),
(15, 'Kabupaten Nagan Raya', 1),
(16, 'Kabupaten Pidie', 1),
(17, 'Kabupaten Pidie Jaya', 1),
(18, 'Kabupaten Simeulue', 1),
(19, 'Kota Banda Aceh', 1),
(20, 'Kota Langsa', 1),
(21, 'Kota Lhokseumawe', 1),
(22, 'Kota Sabang', 1),
(23, 'Kota Subulussalam', 1),
(24, 'Kabupaten Asahan', 2),
(25, 'Kabupaten Batubara', 2),
(26, 'Kabupaten Dairi', 2),
(27, 'Kabupaten Deli Serdang', 2),
(28, 'Kabupaten Humbang Hasundutan', 2),
(29, 'Kabupaten Karo', 2),
(30, 'Kabupaten Labuhanbatu', 2),
(31, 'Kabupaten Labuhanbatu Selatan', 2),
(32, 'Kabupaten Labuhanbatu Utara', 2),
(33, 'Kabupaten Langkat', 2),
(34, 'Kabupaten Mandailing Natal', 2),
(35, 'Kabupaten Nias', 2),
(36, 'Kabupaten Nias Barat', 2),
(37, 'Kabupaten Nias Selatan', 2),
(38, 'Kabupaten Nias Utara', 2),
(39, 'Kabupaten Padang Lawas', 2),
(40, 'Kabupaten Padang Lawas Utara', 2),
(41, 'Kabupaten Pakpak Bharat', 2),
(42, 'Kabupaten Samosir', 2),
(43, 'Kabupaten Serdang Bedagai', 2),
(44, 'Kabupaten Simalungun', 2),
(45, 'Kabupaten Tapanuli Selatan', 2),
(46, 'Kabupaten Tapanuli Tengah', 2),
(47, 'Kabupaten Tapanuli Utara', 2),
(48, 'Kabupaten Toba Samosir', 2),
(49, 'Kota Binjai', 2),
(50, 'Kota Gunungsitoli', 2),
(51, 'Kota Medan', 2),
(52, 'Kota Padangsidempuan', 2),
(53, 'Kota Pematangsiantar', 2),
(54, 'Kota Sibolga', 2),
(55, 'Kota Tanjungbalai', 2),
(56, 'Kota Tebing Tinggi', 2),
(57, 'Kabupaten Agam', 3),
(58, 'Kabupaten Dharmasraya', 3),
(59, 'Kabupaten Kepulauan Mentawai', 3),
(60, 'Kabupaten Lima Puluh Kota', 3),
(61, 'Kabupaten Padang Pariaman', 3),
(62, 'Kabupaten Pasaman', 3),
(63, 'Kabupaten Pasaman Barat', 3),
(64, 'Kabupaten Pesisir Selatan', 3),
(65, 'Kabupaten Sijunjung', 3),
(66, 'Kabupaten Solok', 3),
(67, 'Kabupaten Solok Selatan', 3),
(68, 'Kabupaten Tanah Datar', 3),
(69, 'Kota Bukittinggi', 3),
(70, 'Kota Padang', 3),
(71, 'Kota Padangpanjang', 3),
(72, 'Kota Pariaman', 3),
(73, 'Kota Payakumbuh', 3),
(74, 'Kota Sawahlunto', 3),
(75, 'Kota Solok', 3),
(76, 'Kabupaten Bengkalis', 4),
(77, 'Kabupaten Indragiri Hilir', 4),
(78, 'Kabupaten Indragiri Hulu', 4),
(79, 'Kabupaten Kampar', 4),
(80, 'Kabupaten Kepulauan Meranti', 4),
(81, 'Kabupaten Kuantan Singingi', 4),
(82, 'Kabupaten Pelalawan', 4),
(83, 'Kabupaten Rokan Hilir', 4),
(84, 'Kabupaten Rokan Hulu', 4),
(85, 'Kabupaten Siak', 4),
(86, 'Kota Dumai', 4),
(87, 'Kota Pekanbaru', 4),
(88, 'Kabupaten Batanghari', 5),
(89, 'Kabupaten Bungo', 5),
(90, 'Kabupaten Kerinci', 5),
(91, 'Kabupaten Merangin', 5),
(92, 'Kabupaten Muaro Jambi', 5),
(93, 'Kabupaten Sarolangun', 5),
(94, 'Kabupaten Tanjung Jabung Barat', 5),
(95, 'Kabupaten Tanjung Jabung Timur', 5),
(96, 'Kabupaten Tebo', 5),
(97, 'Kota Jambi', 5),
(98, 'Kota Sungai Penuh', 5),
(99, 'Kabupaten Banyuasin', 6),
(100, 'Kabupaten Empat Lawang', 6),
(101, 'Kabupaten Lahat', 6),
(102, 'Kabupaten Muara Enim', 6),
(103, 'Kabupaten Musi Banyuasin', 6),
(104, 'Kabupaten Musi Rawas', 6),
(105, 'Kabupaten Musi Rawas Utara', 6),
(106, 'Kabupaten Ogan Ilir', 6),
(107, 'Kabupaten Ogan Komering Ilir', 6),
(108, 'Kabupaten Ogan Komering Ulu', 6),
(109, 'Kabupaten Ogan Komering Ulu Selatan', 6),
(110, 'Kabupaten Ogan Komering Ulu Timur', 6),
(111, 'Kabupaten Penukal Abab Lematang Ilir', 6),
(112, 'Kota Lubuklinggau', 6),
(113, 'Kota Pagar Alam', 6),
(114, 'Kota Palembang', 6),
(115, 'Kota Prabumulih', 6),
(116, 'Kabupaten Bengkulu Selatan', 7),
(117, 'Kabupaten Bengkulu Tengah', 7),
(118, 'Kabupaten Bengkulu Utara', 7),
(119, 'Kabupaten Kaur', 7),
(120, 'Kabupaten Kepahiang', 7),
(121, 'Kabupaten Lebong', 7),
(122, 'Kabupaten Mukomuko', 7),
(123, 'Kabupaten Rejang Lebong', 7),
(124, 'Kabupaten Seluma', 7),
(125, 'Kota Bengkulu', 7),
(126, 'Kabupaten Lampung Tengah', 8),
(127, 'Kabupaten Lampung Utara', 8),
(128, 'Kabupaten Lampung Selatan', 8),
(129, 'Kabupaten Lampung Barat', 8),
(130, 'Kabupaten Lampung Timur', 8),
(131, 'Kabupaten Mesuji', 8),
(132, 'Kabupaten Pesawaran', 8),
(133, 'Kabupaten Pesisir Barat', 8),
(134, 'Kabupaten Pringsewu', 8),
(135, 'Kabupaten Tulang Bawang', 8),
(136, 'Kabupaten Tulang Bawang Barat', 8),
(137, 'Kabupaten Tanggamus', 8),
(138, 'Kabupaten Way Kanan', 8),
(139, 'Kota Bandar Lampung', 8),
(140, 'Kota Metro', 8),
(141, 'Kabupaten Bangka', 9),
(142, 'Kabupaten Bangka Barat', 9),
(143, 'Kabupaten Bangka Selatan', 9),
(144, 'Kabupaten Bangka Tengah', 9),
(145, 'Kabupaten Belitung', 9),
(146, 'Kabupaten Belitung Timur', 9),
(147, 'Kota Pangkal Pinang', 9),
(148, 'Kabupaten Bintan', 10),
(149, 'Kabupaten Karimun', 10),
(150, 'Kabupaten Kepulauan Anambas', 10),
(151, 'Kabupaten Lingga', 10),
(152, 'Kabupaten Natuna', 10),
(153, 'Kota Batam', 10),
(154, 'Kota Tanjung Pinang', 10),
(155, 'Kota Administrasi Jakarta Barat', 11),
(156, 'Kota Administrasi Jakarta Pusat', 11),
(157, 'Kota Administrasi Jakarta Selatan', 11),
(158, 'Kota Administrasi Jakarta Timur', 11),
(159, 'Kota Administrasi Jakarta Utara', 11),
(160, 'Kabupaten Administrasi Kepulauan Seribu', 11),
(161, 'Kabupaten Bandung', 12),
(162, 'Kabupaten Bandung Barat', 12),
(163, 'Kabupaten Bekasi', 12),
(164, 'Kabupaten Bogor', 12),
(165, 'Kabupaten Ciamis', 12),
(166, 'Kabupaten Cianjur', 12),
(167, 'Kabupaten Cirebon', 12),
(168, 'Kabupaten Garut', 12),
(169, 'Kabupaten Indramayu', 12),
(170, 'Kabupaten Karawang', 12),
(171, 'Kabupaten Kuningan', 12),
(172, 'Kabupaten Majalengka', 12),
(173, 'Kabupaten Pangandaran', 12),
(174, 'Kabupaten Purwakarta', 12),
(175, 'Kabupaten Subang', 12),
(176, 'Kabupaten Sukabumi', 12),
(177, 'Kabupaten Sumedang', 12),
(178, 'Kabupaten Tasikmalaya', 12),
(179, 'Kota Bandung', 12),
(180, 'Kota Banjar', 12),
(181, 'Kota Bekasi', 12),
(182, 'Kota Bogor', 12),
(183, 'Kota Cimahi', 12),
(184, 'Kota Cirebon', 12),
(185, 'Kota Depok', 12),
(186, 'Kota Sukabumi', 12),
(187, 'Kota Tasikmalaya', 12),
(188, 'Kabupaten Banjarnegara', 13),
(189, 'Kabupaten Banyumas', 13),
(190, 'Kabupaten Batang', 13),
(191, 'Kabupaten Blora', 13),
(192, 'Kabupaten Boyolali', 13),
(193, 'Kabupaten Brebes', 13),
(194, 'Kabupaten Cilacap', 13),
(195, 'Kabupaten Demak', 13),
(196, 'Kabupaten Grobogan', 13),
(197, 'Kabupaten Jepara', 13),
(198, 'Kabupaten Karanganyar', 13),
(199, 'Kabupaten Kebumen', 13),
(200, 'Kabupaten Kendal', 13),
(201, 'Kabupaten Klaten', 13),
(202, 'Kabupaten Kudus', 13),
(203, 'Kabupaten Magelang', 13),
(204, 'Kabupaten Pati', 13),
(205, 'Kabupaten Pekalongan', 13),
(206, 'Kabupaten Pemalang', 13),
(207, 'Kabupaten Purbalingga', 13),
(208, 'Kabupaten Purworejo', 13),
(209, 'Kabupaten Rembang', 13),
(210, 'Kabupaten Semarang', 13),
(211, 'Kabupaten Sragen', 13),
(212, 'Kabupaten Sukoharjo', 13),
(213, 'Kabupaten Tegal', 13),
(214, 'Kabupaten Temanggung', 13),
(215, 'Kabupaten Wonogiri', 13),
(216, 'Kabupaten Wonosobo', 13),
(217, 'Kota Magelang', 13),
(218, 'Kota Pekalongan', 13),
(219, 'Kota Salatiga', 13),
(220, 'Kota Semarang', 13),
(221, 'Kota Surakarta', 13),
(222, 'Kota Tegal', 13),
(223, 'Kabupaten Bantul', 14),
(224, 'Kabupaten Gunungkidul', 14),
(225, 'Kabupaten Kulon Progo', 14),
(226, 'Kabupaten Sleman', 14),
(227, 'Kota Yogyakarta', 14),
(228, 'Kabupaten Bangkalan', 15),
(229, 'Kabupaten Banyuwangi', 15),
(230, 'Kabupaten Blitar', 15),
(231, 'Kabupaten Bojonegoro', 15),
(232, 'Kabupaten Bondowoso', 15),
(233, 'Kabupaten Gresik', 15),
(234, 'Kabupaten Jember', 15),
(235, 'Kabupaten Jombang', 15),
(236, 'Kabupaten Kediri', 15),
(237, 'Kabupaten Lamongan', 15),
(238, 'Kabupaten Lumajang', 15),
(239, 'Kabupaten Madiun', 15),
(240, 'Kabupaten Magetan', 15),
(241, 'Kabupaten Malang', 15),
(242, 'Kabupaten Mojokerto', 15),
(243, 'Kabupaten Nganjuk', 15),
(244, 'Kabupaten Ngawi', 15),
(245, 'Kabupaten Pacitan', 15),
(246, 'Kabupaten Pamekasan', 15),
(247, 'Kabupaten Pasuruan', 15),
(248, 'Kabupaten Ponorogo', 15),
(249, 'Kabupaten Probolinggo', 15),
(250, 'Kabupaten Sampang', 15),
(251, 'Kabupaten Sidoarjo', 15),
(252, 'Kabupaten Situbondo', 15),
(253, 'Kabupaten Sumenep', 15),
(254, 'Kabupaten Trenggalek', 15),
(255, 'Kabupaten Tuban', 15),
(256, 'Kabupaten Tulungagung', 15),
(257, 'Kota Batu', 15),
(258, 'Kota Blitar', 15),
(259, 'Kota Kediri', 15),
(260, 'Kota Madiun', 15),
(261, 'Kota Malang', 15),
(262, 'Kota Mojokerto', 15),
(263, 'Kota Pasuruan', 15),
(264, 'Kota Probolinggo', 15),
(265, 'Kota Surabaya', 15),
(266, 'Kabupaten Lebak', 16),
(267, 'Kabupaten Pandeglang', 16),
(268, 'Kabupaten Serang', 16),
(269, 'Kabupaten Tangerang', 16),
(270, 'Kota Cilegon', 16),
(271, 'Kota Serang', 16),
(272, 'Kota Tangerang', 16),
(273, 'Kota Tangerang Selatan', 16),
(274, 'Kabupaten Badung', 17),
(275, 'Kabupaten Bangli', 17),
(276, 'Kabupaten Buleleng', 17),
(277, 'Kabupaten Gianyar', 17),
(278, 'Kabupaten Jembrana', 17),
(279, 'Kabupaten Karangasem', 17),
(280, 'Kabupaten Klungkung', 17),
(281, 'Kabupaten Tabanan', 17),
(282, 'Kota Denpasar', 17),
(283, 'Kabupaten Bima', 18),
(284, 'Kabupaten Dompu', 18),
(285, 'Kabupaten Lombok Barat', 18),
(286, 'Kabupaten Lombok Tengah', 18),
(287, 'Kabupaten Lombok Timur', 18),
(288, 'Kabupaten Lombok Utara', 18),
(289, 'Kabupaten Sumbawa', 18),
(290, 'Kabupaten Sumbawa Barat', 18),
(291, 'Kota Bima', 18),
(292, 'Kota Mataram', 18),
(293, 'Kabupaten Alor', 19),
(294, 'Kabupaten Belu', 19),
(295, 'Kabupaten Ende', 19),
(296, 'Kabupaten Flores Timur', 19),
(297, 'Kabupaten Kupang', 19),
(298, 'Kabupaten Lembata', 19),
(299, 'Kabupaten Malaka', 19),
(300, 'Kabupaten Manggarai', 19),
(301, 'Kabupaten Manggarai Barat', 19),
(302, 'Kabupaten Manggarai Timur', 19),
(303, 'Kabupaten Ngada', 19),
(304, 'Kabupaten Nagekeo', 19),
(305, 'Kabupaten Rote Ndao', 19),
(306, 'Kabupaten Sabu Raijua', 19),
(307, 'Kabupaten Sikka', 19),
(308, 'Kabupaten Sumba Barat', 19),
(309, 'Kabupaten Sumba Barat Daya', 19),
(310, 'Kabupaten Sumba Tengah', 19),
(311, 'Kabupaten Sumba Timur', 19),
(312, 'Kabupaten Timor Tengah Selatan', 19),
(313, 'Kabupaten Timor Tengah Utara', 19),
(314, 'Kota Kupang', 19),
(315, 'Kabupaten Bengkayang', 20),
(316, 'Kabupaten Kapuas Hulu', 20),
(317, 'Kabupaten Kayong Utara', 20),
(318, 'Kabupaten Ketapang', 20),
(319, 'Kabupaten Kubu Raya', 20),
(320, 'Kabupaten Landak', 20),
(321, 'Kabupaten Melawi', 20),
(322, 'Kabupaten Mempawah', 20),
(323, 'Kabupaten Sambas', 20),
(324, 'Kabupaten Sanggau', 20),
(325, 'Kabupaten Sekadau', 20),
(326, 'Kabupaten Sintang', 20),
(327, 'Kota Pontianak', 20),
(328, 'Kota Singkawang', 20),
(329, 'Kabupaten Barito Selatan', 21),
(330, 'Kabupaten Barito Timur', 21),
(331, 'Kabupaten Barito Utara', 21),
(332, 'Kabupaten Gunung Mas', 21),
(333, 'Kabupaten Kapuas', 21),
(334, 'Kabupaten Katingan', 21),
(335, 'Kabupaten Kotawaringin Barat', 21),
(336, 'Kabupaten Kotawaringin Timur', 21),
(337, 'Kabupaten Lamandau', 21),
(338, 'Kabupaten Murung Raya', 21),
(339, 'Kabupaten Pulang Pisau', 21),
(340, 'Kabupaten Sukamara', 21),
(341, 'Kabupaten Seruyan', 21),
(342, 'Kota Palangka Raya', 21),
(343, 'Kabupaten Balangan', 22),
(344, 'Kabupaten Banjar', 22),
(345, 'Kabupaten Barito Kuala', 22),
(346, 'Kabupaten Hulu Sungai Selatan', 22),
(347, 'Kabupaten Hulu Sungai Tengah', 22),
(348, 'Kabupaten Hulu Sungai Utara', 22),
(349, 'Kabupaten Kotabaru', 22),
(350, 'Kabupaten Tabalong', 22),
(351, 'Kabupaten Tanah Bumbu', 22),
(352, 'Kabupaten Tanah Laut', 22),
(353, 'Kabupaten Tapin', 22),
(354, 'Kota Banjarbaru', 22),
(355, 'Kota Banjarmasin', 22),
(356, 'Kabupaten Berau', 23),
(357, 'Kabupaten Kutai Barat', 23),
(358, 'Kabupaten Kutai Kartanegara', 23),
(359, 'Kabupaten Kutai Timur', 23),
(360, 'Kabupaten Mahakam Ulu', 23),
(361, 'Kabupaten Paser', 23),
(362, 'Kabupaten Penajam Paser Utara', 23),
(363, 'Kota Balikpapan', 23),
(364, 'Kota Bontang', 23),
(365, 'Kota Samarinda', 23),
(366, 'Kabupaten Bulungan', 24),
(367, 'Kabupaten Malinau', 24),
(368, 'Kabupaten Nunukan', 24),
(369, 'Kabupaten Tana Tidung', 24),
(370, 'Kota Tarakan', 24),
(371, 'Kabupaten Bolaang Mongondow', 25),
(372, 'Kabupaten Bolaang Mongondow Selatan', 25),
(373, 'Kabupaten Bolaang Mongondow Timur', 25),
(374, 'Kabupaten Bolaang Mongondow Utara', 25),
(375, 'Kabupaten Kepulauan Sangihe', 25),
(376, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 25),
(377, 'Kabupaten Kepulauan Talaud', 25),
(378, 'Kabupaten Minahasa', 25),
(379, 'Kabupaten Minahasa Selatan', 25),
(380, 'Kabupaten Minahasa Tenggara', 25),
(381, 'Kabupaten Minahasa Utara', 25),
(382, 'Kota Bitung', 25),
(383, 'Kota Kotamobagu', 25),
(384, 'Kota Manado', 25),
(385, 'Kota Tomohon', 25),
(386, 'Kabupaten Banggai', 26),
(387, 'Kabupaten Banggai Kepulauan', 26),
(388, 'Kabupaten Banggai Laut', 26),
(389, 'Kabupaten Buol', 26),
(390, 'Kabupaten Donggala', 26),
(391, 'Kabupaten Morowali', 26),
(392, 'Kabupaten Morowali Utara', 26),
(393, 'Kabupaten Parigi Moutong', 26),
(394, 'Kabupaten Poso', 26),
(395, 'Kabupaten Sigi', 26),
(396, 'Kabupaten Tojo Una-Una', 26),
(397, 'Kabupaten Toli-Toli', 26),
(398, 'Kota Palu', 26),
(399, 'Kabupaten Bantaeng', 27),
(400, 'Kabupaten Barru', 27),
(401, 'Kabupaten Bone', 27),
(402, 'Kabupaten Bulukumba', 27),
(403, 'Kabupaten Enrekang', 27),
(404, 'Kabupaten Gowa', 27),
(405, 'Kabupaten Jeneponto', 27),
(406, 'Kabupaten Kepulauan Selayar', 27),
(407, 'Kabupaten Luwu', 27),
(408, 'Kabupaten Luwu Timur', 27),
(409, 'Kabupaten Luwu Utara', 27),
(410, 'Kabupaten Maros', 27),
(411, 'Kabupaten Pangkajene dan Kepulauan', 27),
(412, 'Kabupaten Pinrang', 27),
(413, 'Kabupaten Sidenreng Rappang', 27),
(414, 'Kabupaten Sinjai', 27),
(415, 'Kabupaten Soppeng', 27),
(416, 'Kabupaten Takalar', 27),
(417, 'Kabupaten Tana Toraja', 27),
(418, 'Kabupaten Toraja Utara', 27),
(419, 'Kabupaten Wajo', 27),
(420, 'Kota Makassar', 27),
(421, 'Kota Palopo', 27),
(422, 'Kota Parepare', 27),
(423, 'Kabupaten Bombana', 28),
(424, 'Kabupaten Buton', 28),
(425, 'Kabupaten Buton Selatan', 28),
(426, 'Kabupaten Buton Tengah', 28),
(427, 'Kabupaten Buton Utara', 28),
(428, 'Kabupaten Kolaka', 28),
(429, 'Kabupaten Kolaka Timur', 28),
(430, 'Kabupaten Kolaka Utara', 28),
(431, 'Kabupaten Konawe', 28),
(432, 'Kabupaten Konawe Kepulauan', 28),
(433, 'Kabupaten Konawe Selatan', 28),
(434, 'Kabupaten Konawe Utara', 28),
(435, 'Kabupaten Muna', 28),
(436, 'Kabupaten Muna Barat', 28),
(437, 'Kabupaten Wakatobi', 28),
(438, 'Kota Bau-Bau', 28),
(439, 'Kota Kendari', 28),
(440, 'Kabupaten Boalemo', 29),
(441, 'Kabupaten Bone Bolango', 29),
(442, 'Kabupaten Gorontalo', 29),
(443, 'Kabupaten Gorontalo Utara', 29),
(444, 'Kabupaten Pohuwato', 29),
(445, 'Kota Gorontalo', 29),
(446, 'Kabupaten Majene', 30),
(447, 'Kabupaten Mamasa', 30),
(448, 'Kabupaten Mamuju', 30),
(449, 'Kabupaten Mamuju Tengah', 30),
(450, 'Kabupaten Mamuju Utara', 30),
(451, 'Kabupaten Polewali Mandar', 30),
(452, 'Kota Mamuju', 30),
(453, 'Kabupaten Buru', 31),
(454, 'Kabupaten Buru Selatan', 31),
(455, 'Kabupaten Kepulauan Aru', 31),
(456, 'Kabupaten Maluku Barat Daya', 31),
(457, 'Kabupaten Maluku Tengah', 31),
(458, 'Kabupaten Maluku Tenggara', 31),
(459, 'Kabupaten Maluku Tenggara Barat', 31),
(460, 'Kabupaten Seram Bagian Barat', 31),
(461, 'Kabupaten Seram Bagian Timur', 31),
(462, 'Kota Ambon', 31),
(463, 'Kota Tual', 31),
(464, 'Kabupaten Halmahera Barat', 32),
(465, 'Kabupaten Halmahera Tengah', 32),
(466, 'Kabupaten Halmahera Utara', 32),
(467, 'Kabupaten Halmahera Selatan', 32),
(468, 'Kabupaten Kepulauan Sula', 32),
(469, 'Kabupaten Halmahera Timur', 32),
(470, 'Kabupaten Pulau Morotai', 32),
(471, 'Kabupaten Pulau Taliabu', 32),
(472, 'Kota Ternate', 32),
(473, 'Kota Tidore Kepulauan', 32),
(474, 'Kabupaten Asmat', 33),
(475, 'Kabupaten Biak Numfor', 33),
(476, 'Kabupaten Boven Digoel', 33),
(477, 'Kabupaten Deiyai', 33),
(478, 'Kabupaten Dogiyai', 33),
(479, 'Kabupaten Intan Jaya', 33),
(480, 'Kabupaten Jayapura', 33),
(481, 'Kabupaten Jayawijaya', 33),
(482, 'Kabupaten Keerom', 33),
(483, 'Kabupaten Kepulauan Yapen', 33),
(484, 'Kabupaten Lanny Jaya', 33),
(485, 'Kabupaten Mamberamo Raya', 33),
(486, 'Kabupaten Mamberamo Tengah', 33),
(487, 'Kabupaten Mappi', 33),
(488, 'Kabupaten Merauke', 33),
(489, 'Kabupaten Mimika', 33),
(490, 'Kabupaten Nabire', 33),
(491, 'Kabupaten Nduga', 33),
(492, 'Kabupaten Paniai', 33),
(493, 'Kabupaten Pegunungan Bintang', 33),
(494, 'Kabupaten Puncak', 33),
(495, 'Kabupaten Puncak Jaya', 33),
(496, 'Kabupaten Sarmi', 33),
(497, 'Kabupaten Supiori', 33),
(498, 'Kabupaten Tolikara', 33),
(499, 'Kabupaten Waropen', 33),
(500, 'Kabupaten Yahukimo', 33),
(501, 'Kabupaten Yalimo', 33),
(502, 'Kota Jayapura', 33),
(503, 'Kabupaten Fakfak', 34),
(504, 'Kabupaten Kaimana', 34),
(505, 'Kabupaten Manokwari', 34),
(506, 'Kabupaten Manokwari Selatan', 34),
(507, 'Kabupaten Maybrat', 34),
(508, 'Kabupaten Pegunungan Arfak', 34),
(509, 'Kabupaten Raja Ampat', 34),
(510, 'Kabupaten Sorong', 34),
(511, 'Kabupaten Sorong Selatan', 34),
(512, 'Kabupaten Tambrauw', 34),
(513, 'Kabupaten Teluk Bintuni', 34),
(514, 'Kabupaten Teluk Wondama', 34);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(100) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jalur_masuk` varchar(100) NOT NULL,
  `kode_kota_kab` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `NIP_doswal` varchar(100) DEFAULT NULL,
  `NIP_dospem_pkl` varchar(100) DEFAULT NULL,
  `NIP_dospem_skripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `nama_mhs`, `email`, `alamat`, `no_telp`, `angkatan`, `status`, `foto`, `jalur_masuk`, `kode_kota_kab`, `username`, `NIP_doswal`, `NIP_dospem_pkl`, `NIP_dospem_skripsi`) VALUES
('12345', 'test mhs', 'test@students.undip.ac.id', 'jl. test', '1251375423', '2023', 'Aktif', '', 'SBMNTPTN', 8, 'test', '192783864', '192783864', '192783864'),
('24060120140001', 'Ahmad Isa', 'ahmadisa@students.undip.ac.id', 'Jln. Kaki', '085552718777', '2020', 'Aktif', 'mahasiswa.jpg', 'SBMPTN', 189, 'ahmadisa', '192783864', '192783864', '192783864'),
('24060120140002', 'sheva', 'sheva123@gmail.com', 'jln gatau', '083748393974', '2020', 'Aktif', 'moona.jpg', 'SNMPTN', 220, 'sheva', '192783864', '192783864', '192783864');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `NIP` varchar(100) NOT NULL,
  `nama_op` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`NIP`, `nama_op`, `email`, `no_telp`, `alamat`, `username`, `foto`) VALUES
('19456778', 'Beni', 'Beni123@gmail.com', '087452575275425', 'jln jalan', 'beni', 'sus.png');

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `NIM` varchar(100) NOT NULL,
  `smt` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nilai_pkl` varchar(100) DEFAULT NULL,
  `berita_acara` varchar(100) DEFAULT NULL,
  `file_pkl` varchar(100) DEFAULT NULL,
  `instansi` varchar(100) NOT NULL,
  `lama_pkl` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `tgl_sidang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`NIM`, `smt`, `status`, `nilai_pkl`, `berita_acara`, `file_pkl`, `instansi`, `lama_pkl`, `bagian`, `tgl_sidang`) VALUES
('24060120140001', 5, 'Lulus', 'A', 'Gtaau', '', 'PT PLN Indonesia', '4 (Empat) Bulan', 'Departemen Keuangan', '2022-12-30'),
('24060120140002', 6, 'Lulus', 'SSS', 'Gtaau', '1.1. Web Platform (2).pdf', 'PT PLN Amerika', '5 (Lima) Bulan', 'Departemen Keuangan', '2022-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `kode_prov` int(100) NOT NULL,
  `nama_prov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`kode_prov`, `nama_prov`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Jambi'),
(6, 'Sumatera Selatan'),
(7, 'Bengkulu'),
(8, 'Lampung'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Kepulauan Riau'),
(11, 'DKI Jakarta'),
(12, 'Jawa Barat'),
(13, 'Jawa Tengah'),
(14, 'DI Yogyakarta'),
(15, 'Jawa Timur'),
(16, 'Banten'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Sulawesi Tengah'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tenggara'),
(29, 'Gorontalo'),
(30, 'Sulawesi Barat'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `NIM` varchar(100) NOT NULL,
  `smt` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '-',
  `nilai_skripsi` varchar(100) NOT NULL DEFAULT '-',
  `tgl_sidang` date NOT NULL,
  `berita_acara` varchar(100) DEFAULT NULL,
  `dospem` varchar(100) NOT NULL DEFAULT '-',
  `file_skripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`NIM`, `smt`, `status`, `nilai_skripsi`, `tgl_sidang`, `berita_acara`, `dospem`, `file_skripsi`) VALUES
('24060120140001', 7, 'Lulus', 'A', '2022-12-30', NULL, 'Naruto Uzumaki S.Hokage', NULL),
('24060120140002', 7, 'Belum Lulus', 'A', '2022-12-29', NULL, 'Moona Hoshinova S.Hololive', 'PBP-BAB 1 setelah UTS.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('ahmadisa', 'isa123', 'mahasiswa'),
('beni', 'beni123', 'op'),
('fathur', 'fathur123', 'dept'),
('kuiky', 'kuiky123', 'dosen'),
('sheva', 'sheva123', 'mahasiswa'),
('test', 'test123', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `kota_kab`
--
ALTER TABLE `kota_kab`
  ADD PRIMARY KEY (`kode_kota_kab`),
  ADD KEY `kode_prov` (`kode_prov`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `kode_kota_kab` (`kode_kota_kab`,`username`),
  ADD KEY `username` (`username`),
  ADD KEY `NIP_doswal` (`NIP_doswal`),
  ADD KEY `NIP_dospem_pkl` (`NIP_dospem_pkl`),
  ADD KEY `NIP_dospem_skripsi` (`NIP_dospem_skripsi`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`kode_prov`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departemen`
--
ALTER TABLE `departemen`
  ADD CONSTRAINT `departemen_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `irs`
--
ALTER TABLE `irs`
  ADD CONSTRAINT `irs_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);

--
-- Constraints for table `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);

--
-- Constraints for table `kota_kab`
--
ALTER TABLE `kota_kab`
  ADD CONSTRAINT `kota_kab_ibfk_1` FOREIGN KEY (`kode_prov`) REFERENCES `provinsi` (`kode_prov`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kode_kota_kab`) REFERENCES `kota_kab` (`kode_kota_kab`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`NIP_doswal`) REFERENCES `dosen` (`NIP`),
  ADD CONSTRAINT `mahasiswa_ibfk_4` FOREIGN KEY (`NIP_dospem_pkl`) REFERENCES `dosen` (`NIP`),
  ADD CONSTRAINT `mahasiswa_ibfk_5` FOREIGN KEY (`NIP_dospem_skripsi`) REFERENCES `dosen` (`NIP`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `pkl`
--
ALTER TABLE `pkl`
  ADD CONSTRAINT `pkl_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
