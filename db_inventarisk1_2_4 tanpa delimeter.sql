-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 06:58 AM
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
-- Database: `db_inventarisk1.2,4`
--









-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` INT(11) NOT NULL,
  `id_type_barang` INT(11) NOT NULL,
  `merek_barang` VARCHAR(50) NOT NULL,
  `Spesifikasi` VARCHAR(255) NOT NULL,
  `Sumber` VARCHAR(255) NOT NULL,
  `Lokasi_barang` VARCHAR(2) NOT NULL,
  `Kondisi_barang` VARCHAR(15) NOT NULL,
  `tanggal_input` DATE NOT NULL,
  `status` ENUM('Normal', 'Danger', 'PO') NOT NULL DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_type_barang`, `merek_barang`, `Spesifikasi`, `Sumber`, `Lokasi_barang`, `Kondisi_barang`, `tanggal_input`, `status`) VALUES
(166, '1', '17x19mm', 'KUNCI PAS', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(167, '2', '14x17mm', 'KUNCI PAS', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(168, '3', '12x14mm', 'KUNCI PAS', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(169, '4', '10x12mm', 'KUNCI PAS', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(170, '5', '8x9mm', 'KUNCI PAS', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(171, '6', '22x24mm', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(172, '7', '19x21mm', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(173, '8', '14x17mm', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(174, '9', '12x14mm', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(175, '10', '10x12mm', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(176, '11', '12x14mm. S', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(177, '12', '10x12mm. S', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(178, '13', '8x10mm. S', 'KUNCI RING', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(179, '14', '24mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(180, '15', '23mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(181, '16', '22mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(182, '17', '21mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(183, '18', '19mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(184, '19', '17mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(185, '20', '14mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(186, '21', '12mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(187, '22', '10mm', 'KUNCI SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(188, '23', '300mm', 'SAMBUNGAN', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(189, '24', '150mm. S', 'SAMBUNGAN', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(190, '25', '150mm. B', 'SAMBUNGAN', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(191, '26', '75mm', 'SAMBUNGAN', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(192, '27', '380mm', 'STANG SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(193, '28', '180mm', 'KUNCI KOTREK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(194, '29', '200mm', 'STANG LUNCUR', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(195, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(196, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(197, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(198, '33', '320mm', 'PALU', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(199, '34', '21mm', 'KUNCI RODA', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(200, '35', '150mm', 'OBENG (-)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(201, '36', '100mm', 'OBENG (-)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(202, '37', '75mm', 'OBENG (-)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(203, '38', '35mm', 'OBENG (-)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(204, '39', '50mm. S', 'OBENG (-)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(205, '40', '150mm', 'OBENG (+)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(206, '41', '100mm', 'OBENG (+)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(207, '42', '75mm', 'OBENG (+)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(208, '43', '35mm', 'OBENG (+)', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(209, '44', '200mm', 'OBENG MAGNIT', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(210, '45', '150/10mm', 'OBENG SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(211, '46', '150/8mm', 'OBENG SOK', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(212, '47', '20mm', 'TANG KOMBINASI', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(213, '48', '160mm', 'TANG LANCIP', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(214, '49', '250mm', 'KUNCI INGGRIS', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(215, '50', '180mm', 'PEMBERSIH GASKET', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(216, '51', '220mm', 'BATANG KUNINGAN', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(217, '52', '20.8mm', 'KUNCI BUSI', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(218, '53', '16mm', 'KUNCI BUSI', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(219, '54', '0,8~1,1mm', 'FILLER BUSI', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(220, '55', '0,08~0,5mm', 'FILLER KLEP', 'Deny', '17', '1', '2024-11-06', 'Normal'),
(221, '56', '0', 'SUMBAT VAKUM', 'Deny', '17', '1', '2024-11-06', 'Normal'),

(222, '1', '17x19mm', 'KUNCI PAS', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(223, '2', '14x17mm', 'KUNCI PAS', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(224, '3', '12x14mm', 'KUNCI PAS', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(225, '4', '10x12mm', 'KUNCI PAS', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(226, '5', '8x9mm', 'KUNCI PAS', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(227, '6', '22x24mm', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(228, '7', '19x21mm', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(229, '8', '14x17mm', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(230, '9', '12x14mm', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(231, '10', '10x12mm', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(232, '11', '12x14mm. S', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(233, '12', '10x12mm. S', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(234, '13', '8x10mm. S', 'KUNCI RING', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(235, '14', '24mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(236, '15', '23mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(237, '16', '22mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(238, '17', '21mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(239, '18', '19mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(240, '19', '17mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(241, '20', '14mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(242, '21', '12mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(243, '22', '10mm', 'KUNCI SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(244, '23', '300mm', 'SAMBUNGAN', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(245, '24', '150mm. S', 'SAMBUNGAN', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(246, '25', '150mm. B', 'SAMBUNGAN', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(247, '26', '75mm', 'SAMBUNGAN', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(248, '27', '380mm', 'STANG SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(249, '28', '180mm', 'KUNCI KOTREK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(250, '29', '200mm', 'STANG LUNCUR', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(251, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(252, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(253, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(254, '33', '320mm', 'PALU', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(255, '34', '21mm', 'KUNCI RODA', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(256, '35', '150mm', 'OBENG (-)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(257, '36', '100mm', 'OBENG (-)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(258, '37', '75mm', 'OBENG (-)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(259, '38', '35mm', 'OBENG (-)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(260, '39', '50mm. S', 'OBENG (-)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(261, '40', '150mm', 'OBENG (+)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(262, '41', '100mm', 'OBENG (+)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(263, '42', '75mm', 'OBENG (+)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(264, '43', '35mm', 'OBENG (+)', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(265, '44', '200mm', 'OBENG MAGNIT', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(266, '45', '150/10mm', 'OBENG SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(267, '46', '150/8mm', 'OBENG SOK', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(268, '47', '20mm', 'TANG KOMBINASI', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(269, '48', '160mm', 'TANG LANCIP', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(270, '49', '250mm', 'KUNCI INGGRIS', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(271, '50', '180mm', 'PEMBERSIH GASKET', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(272, '51', '220mm', 'BATANG KUNINGAN', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(273, '52', '20.8mm', 'KUNCI BUSI', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(274, '53', '16mm', 'KUNCI BUSI', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(275, '54', '0,8~1,1mm', 'FILLER BUSI', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(276, '55', '0,08~0,5mm', 'FILLER KLEP', 'Deny', '18', '1', '2024-11-06', 'Normal'),
(277, '56', '0', 'SUMBAT VAKUM', 'Deny', '18', '1', '2024-11-06', 'Normal'),

(278, '1', '17x19mm', 'KUNCI PAS', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(279, '2', '14x17mm', 'KUNCI PAS', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(280, '3', '12x14mm', 'KUNCI PAS', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(281, '4', '10x12mm', 'KUNCI PAS', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(282, '5', '8x9mm', 'KUNCI PAS', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(283, '6', '22x24mm', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(284, '7', '19x21mm', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(285, '8', '14x17mm', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(286, '9', '12x14mm', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(287, '10', '10x12mm', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(288, '11', '12x14mm. S', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(289, '12', '10x12mm. S', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(290, '13', '8x10mm. S', 'KUNCI RING', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(291, '14', '24mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(292, '15', '23mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(293, '16', '22mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(294, '17', '21mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(295, '18', '19mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(296, '19', '17mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(297, '20', '14mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(298, '21', '12mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(299, '22', '10mm', 'KUNCI SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(300, '23', '300mm', 'SAMBUNGAN', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(301, '24', '150mm. S', 'SAMBUNGAN', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(302, '25', '150mm. B', 'SAMBUNGAN', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(303, '26', '75mm', 'SAMBUNGAN', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(304, '27', '380mm', 'STANG SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(305, '28', '180mm', 'KUNCI KOTREK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(306, '29', '200mm', 'STANG LUNCUR', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(307, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(308, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(309, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(310, '33', '320mm', 'PALU', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(311, '34', '21mm', 'KUNCI RODA', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(312, '35', '150mm', 'OBENG (-)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(313, '36', '100mm', 'OBENG (-)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(314, '37', '75mm', 'OBENG (-)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(315, '38', '35mm', 'OBENG (-)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(316, '39', '50mm. S', 'OBENG (-)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(317, '40', '150mm', 'OBENG (+)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(318, '41', '100mm', 'OBENG (+)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(319, '42', '75mm', 'OBENG (+)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(320, '43', '35mm', 'OBENG (+)', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(321, '44', '200mm', 'OBENG MAGNIT', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(322, '45', '150/10mm', 'OBENG SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(323, '46', '150/8mm', 'OBENG SOK', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(324, '47', '20mm', 'TANG KOMBINASI', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(325, '48', '160mm', 'TANG LANCIP', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(326, '49', '250mm', 'KUNCI INGGRIS', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(327, '50', '180mm', 'PEMBERSIH GASKET', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(328, '51', '220mm', 'BATANG KUNINGAN', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(329, '52', '20.8mm', 'KUNCI BUSI', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(330, '53', '16mm', 'KUNCI BUSI', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(331, '54', '0,8~1,1mm', 'FILLER BUSI', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(332, '55', '0,08~0,5mm', 'FILLER KLEP', 'Deny', '19', '1', '2024-11-06', 'Normal'),
(333, '56', '0', 'SUMBAT VAKUM', 'Deny', '19', '1', '2024-11-06', 'Normal'),

(334, '1', '17x19mm', 'KUNCI PAS', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(335, '2', '14x17mm', 'KUNCI PAS', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(336, '3', '12x14mm', 'KUNCI PAS', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(337, '4', '10x12mm', 'KUNCI PAS', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(338, '5', '8x9mm', 'KUNCI PAS', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(339, '6', '22x24mm', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(340, '7', '19x21mm', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(341, '8', '14x17mm', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(342, '9', '12x14mm', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(343, '10', '10x12mm', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(344, '11', '12x14mm. S', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(345, '12', '10x12mm. S', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(346, '13', '8x10mm. S', 'KUNCI RING', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(347, '14', '24mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(348, '15', '23mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(349, '16', '22mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(350, '17', '21mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(351, '18', '19mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(352, '19', '17mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(353, '20', '14mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(354, '21', '12mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(355, '22', '10mm', 'KUNCI SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(356, '23', '300mm', 'SAMBUNGAN', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(357, '24', '150mm. S', 'SAMBUNGAN', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(358, '25', '150mm. B', 'SAMBUNGAN', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(359, '26', '75mm', 'SAMBUNGAN', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(360, '27', '380mm', 'STANG SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(361, '28', '180mm', 'KUNCI KOTREK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(362, '29', '200mm', 'STANG LUNCUR', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(363, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(364, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(365, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(366, '33', '320mm', 'PALU', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(367, '34', '21mm', 'KUNCI RODA', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(368, '35', '150mm', 'OBENG (-)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(369, '36', '100mm', 'OBENG (-)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(370, '37', '75mm', 'OBENG (-)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(371, '38', '35mm', 'OBENG (-)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(372, '39', '50mm. S', 'OBENG (-)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(373, '40', '150mm', 'OBENG (+)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(374, '41', '100mm', 'OBENG (+)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(375, '42', '75mm', 'OBENG (+)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(376, '43', '35mm', 'OBENG (+)', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(377, '44', '200mm', 'OBENG MAGNIT', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(378, '45', '150/10mm', 'OBENG SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(379, '46', '150/8mm', 'OBENG SOK', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(380, '47', '20mm', 'TANG KOMBINASI', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(381, '48', '160mm', 'TANG LANCIP', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(382, '49', '250mm', 'KUNCI INGGRIS', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(383, '50', '180mm', 'PEMBERSIH GASKET', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(384, '51', '220mm', 'BATANG KUNINGAN', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(385, '52', '20.8mm', 'KUNCI BUSI', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(386, '53', '16mm', 'KUNCI BUSI', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(387, '54', '0,8~1,1mm', 'FILLER BUSI', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(388, '55', '0,08~0,5mm', 'FILLER KLEP', 'Deny', '20', '1', '2024-11-06', 'Normal'),
(389, '56', '0', 'SUMBAT VAKUM', 'Deny', '20', '1', '2024-11-06', 'Normal'),

(390, '1', '17x19mm', 'KUNCI PAS', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(391, '2', '14x17mm', 'KUNCI PAS', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(392, '3', '12x14mm', 'KUNCI PAS', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(393, '4', '10x12mm', 'KUNCI PAS', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(394, '5', '8x9mm', 'KUNCI PAS', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(395, '6', '22x24mm', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(396, '7', '19x21mm', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(397, '8', '14x17mm', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(398, '9', '12x14mm', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(399, '10', '10x12mm', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(400, '11', '12x14mm. S', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(401, '12', '10x12mm. S', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(402, '13', '8x10mm. S', 'KUNCI RING', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(403, '14', '24mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(404, '15', '23mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(405, '16', '22mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(406, '17', '21mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(407, '18', '19mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(408, '19', '17mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(409, '20', '14mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(410, '21', '12mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(411, '22', '10mm', 'KUNCI SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(412, '23', '300mm', 'SAMBUNGAN', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(413, '24', '150mm. S', 'SAMBUNGAN', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(414, '25', '150mm. B', 'SAMBUNGAN', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(415, '26', '75mm', 'SAMBUNGAN', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(416, '27', '380mm', 'STANG SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(417, '28', '180mm', 'KUNCI KOTREK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(418, '29', '200mm', 'STANG LUNCUR', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(419, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(420, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(421, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(422, '33', '320mm', 'PALU', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(423, '34', '21mm', 'KUNCI RODA', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(424, '35', '150mm', 'OBENG (-)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(425, '36', '100mm', 'OBENG (-)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(426, '37', '75mm', 'OBENG (-)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(427, '38', '35mm', 'OBENG (-)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(428, '39', '50mm. S', 'OBENG (-)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(429, '40', '150mm', 'OBENG (+)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(430, '41', '100mm', 'OBENG (+)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(431, '42', '75mm', 'OBENG (+)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(432, '43', '35mm', 'OBENG (+)', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(433, '44', '200mm', 'OBENG MAGNIT', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(434, '45', '150/10mm', 'OBENG SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(435, '46', '150/8mm', 'OBENG SOK', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(436, '47', '20mm', 'TANG KOMBINASI', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(437, '48', '160mm', 'TANG LANCIP', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(438, '49', '250mm', 'KUNCI INGGRIS', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(439, '50', '180mm', 'PEMBERSIH GASKET', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(440, '51', '220mm', 'BATANG KUNINGAN', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(441, '52', '20.8mm', 'KUNCI BUSI', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(442, '53', '16mm', 'KUNCI BUSI', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(443, '54', '0,8~1,1mm', 'FILLER BUSI', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(444, '55', '0,08~0,5mm', 'FILLER KLEP', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),
(445, '56', '0', 'SUMBAT VAKUM', 'Hamdani', '21', '1', '2024-11-06', 'Normal'),

(446, '1', '17x19mm', 'KUNCI PAS', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(447, '2', '14x17mm', 'KUNCI PAS', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(448, '3', '12x14mm', 'KUNCI PAS', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(449, '4', '10x12mm', 'KUNCI PAS', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(450, '5', '8x9mm', 'KUNCI PAS', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(451, '6', '22x24mm', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(452, '7', '19x21mm', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(453, '8', '14x17mm', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(454, '9', '12x14mm', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(455, '10', '10x12mm', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(456, '11', '12x14mm. S', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(457, '12', '10x12mm. S', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(458, '13', '8x10mm. S', 'KUNCI RING', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(459, '14', '24mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(460, '15', '23mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(461, '16', '22mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(462, '17', '21mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(463, '18', '19mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(464, '19', '17mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(465, '20', '14mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(466, '21', '12mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(467, '22', '10mm', 'KUNCI SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(468, '23', '300mm', 'SAMBUNGAN', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(469, '24', '150mm. S', 'SAMBUNGAN', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(470, '25', '150mm. B', 'SAMBUNGAN', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(471, '26', '75mm', 'SAMBUNGAN', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(472, '27', '380mm', 'STANG SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(473, '28', '180mm', 'KUNCI KOTREK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(474, '29', '200mm', 'STANG LUNCUR', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(475, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(476, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(477, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(478, '33', '320mm', 'PALU', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(479, '34', '21mm', 'KUNCI RODA', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(480, '35', '150mm', 'OBENG (-)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(481, '36', '100mm', 'OBENG (-)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(482, '37', '75mm', 'OBENG (-)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(483, '38', '35mm', 'OBENG (-)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(484, '39', '50mm. S', 'OBENG (-)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(485, '40', '150mm', 'OBENG (+)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(486, '41', '100mm', 'OBENG (+)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(487, '42', '75mm', 'OBENG (+)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(488, '43', '35mm', 'OBENG (+)', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(489, '44', '200mm', 'OBENG MAGNIT', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(490, '45', '150/10mm', 'OBENG SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(491, '46', '150/8mm', 'OBENG SOK', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(492, '47', '20mm', 'TANG KOMBINASI', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(493, '48', '160mm', 'TANG LANCIP', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(494, '49', '250mm', 'KUNCI INGGRIS', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(495, '50', '180mm', 'PEMBERSIH GASKET', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(496, '51', '220mm', 'BATANG KUNINGAN', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(497, '52', '20.8mm', 'KUNCI BUSI', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(498, '53', '16mm', 'KUNCI BUSI', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(499, '54', '0,8~1,1mm', 'FILLER BUSI', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(500, '55', '0,08~0,5mm', 'FILLER KLEP', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),
(501, '56', '0', 'SUMBAT VAKUM', 'Hamdani', '22', '1', '2024-11-06', 'Normal'),

(502, '1', '17x19mm', 'KUNCI PAS', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(503, '2', '14x17mm', 'KUNCI PAS', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(504, '3', '12x14mm', 'KUNCI PAS', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(505, '4', '10x12mm', 'KUNCI PAS', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(506, '5', '8x9mm', 'KUNCI PAS', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(507, '6', '22x24mm', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(508, '7', '19x21mm', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(509, '8', '14x17mm', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(510, '9', '12x14mm', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(511, '10', '10x12mm', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(512, '11', '12x14mm. S', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(513, '12', '10x12mm. S', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(514, '13', '8x10mm. S', 'KUNCI RING', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(515, '14', '24mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(516, '15', '23mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(517, '16', '22mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(518, '17', '21mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(519, '18', '19mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(520, '19', '17mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(521, '20', '14mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(522, '21', '12mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(523, '22', '10mm', 'KUNCI SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(524, '23', '300mm', 'SAMBUNGAN', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(525, '24', '150mm. S', 'SAMBUNGAN', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(526, '25', '150mm. B', 'SAMBUNGAN', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(527, '26', '75mm', 'SAMBUNGAN', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(528, '27', '380mm', 'STANG SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(529, '28', '180mm', 'KUNCI KOTREK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(530, '29', '200mm', 'STANG LUNCUR', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(531, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(532, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(533, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(534, '33', '320mm', 'PALU', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(535, '34', '21mm', 'KUNCI RODA', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(536, '35', '150mm', 'OBENG (-)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(537, '36', '100mm', 'OBENG (-)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(538, '37', '75mm', 'OBENG (-)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(539, '38', '35mm', 'OBENG (-)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(540, '39', '50mm. S', 'OBENG (-)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(541, '40', '150mm', 'OBENG (+)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(542, '41', '100mm', 'OBENG (+)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(543, '42', '75mm', 'OBENG (+)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(544, '43', '35mm', 'OBENG (+)', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(545, '44', '200mm', 'OBENG MAGNIT', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(546, '45', '150/10mm', 'OBENG SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(547, '46', '150/8mm', 'OBENG SOK', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(548, '47', '20mm', 'TANG KOMBINASI', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(549, '48', '160mm', 'TANG LANCIP', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(550, '49', '250mm', 'KUNCI INGGRIS', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(551, '50', '180mm', 'PEMBERSIH GASKET', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(552, '51', '220mm', 'BATANG KUNINGAN', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(553, '52', '20.8mm', 'KUNCI BUSI', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(554, '53', '16mm', 'KUNCI BUSI', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(555, '54', '0,8~1,1mm', 'FILLER BUSI', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(556, '55', '0,08~0,5mm', 'FILLER KLEP', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),
(557, '56', '0', 'SUMBAT VAKUM', 'Hamdani', '23', '1', '2024-11-06', 'Normal'),

(558, '1', '17x19mm', 'KUNCI PAS', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(559, '2', '14x17mm', 'KUNCI PAS', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(560, '3', '12x14mm', 'KUNCI PAS', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(561, '4', '10x12mm', 'KUNCI PAS', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(562, '5', '8x9mm', 'KUNCI PAS', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(563, '6', '22x24mm', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(564, '7', '19x21mm', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(565, '8', '14x17mm', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(566, '9', '12x14mm', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(567, '10', '10x12mm', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(568, '11', '12x14mm. S', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(569, '12', '10x12mm. S', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(570, '13', '8x10mm. S', 'KUNCI RING', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(571, '14', '24mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(572, '15', '23mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(573, '16', '22mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(574, '17', '21mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(575, '18', '19mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(576, '19', '17mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(577, '20', '14mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(578, '21', '12mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(579, '22', '10mm', 'KUNCI SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(580, '23', '300mm', 'SAMBUNGAN', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(581, '24', '150mm. S', 'SAMBUNGAN', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(582, '25', '150mm. B', 'SAMBUNGAN', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(583, '26', '75mm', 'SAMBUNGAN', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(584, '27', '380mm', 'STANG SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(585, '28', '180mm', 'KUNCI KOTREK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(586, '29', '200mm', 'STANG LUNCUR', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(587, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(588, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(589, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(590, '33', '320mm', 'PALU', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(591, '34', '21mm', 'KUNCI RODA', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(592, '35', '150mm', 'OBENG (-)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(593, '36', '100mm', 'OBENG (-)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(594, '37', '75mm', 'OBENG (-)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(595, '38', '35mm', 'OBENG (-)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(596, '39', '50mm. S', 'OBENG (-)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(597, '40', '150mm', 'OBENG (+)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(598, '41', '100mm', 'OBENG (+)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(599, '42', '75mm', 'OBENG (+)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(600, '43', '35mm', 'OBENG (+)', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(601, '44', '200mm', 'OBENG MAGNIT', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(602, '45', '150/10mm', 'OBENG SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(603, '46', '150/8mm', 'OBENG SOK', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(604, '47', '20mm', 'TANG KOMBINASI', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(605, '48', '160mm', 'TANG LANCIP', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(606, '49', '250mm', 'KUNCI INGGRIS', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(607, '50', '180mm', 'PEMBERSIH GASKET', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(608, '51', '220mm', 'BATANG KUNINGAN', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(609, '52', '20.8mm', 'KUNCI BUSI', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(610, '53', '16mm', 'KUNCI BUSI', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(611, '54', '0,8~1,1mm', 'FILLER BUSI', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(612, '55', '0,08~0,5mm', 'FILLER KLEP', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),
(613, '56', '0', 'SUMBAT VAKUM', 'Hamdani', '24', '1', '2024-11-06', 'Normal'),

(614, '1', '17x19mm', 'KUNCI PAS', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(615, '2', '14x17mm', 'KUNCI PAS', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(616, '3', '12x14mm', 'KUNCI PAS', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(617, '4', '10x12mm', 'KUNCI PAS', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(618, '5', '8x9mm', 'KUNCI PAS', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(619, '6', '22x24mm', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(620, '7', '19x21mm', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(621, '8', '14x17mm', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(622, '9', '12x14mm', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(623, '10', '10x12mm', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(624, '11', '12x14mm. S', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(625, '12', '10x12mm. S', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(626, '13', '8x10mm. S', 'KUNCI RING', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(627, '14', '24mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(628, '15', '23mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(629, '16', '22mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(630, '17', '21mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(631, '18', '19mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(632, '19', '17mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(633, '20', '14mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(634, '21', '12mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(635, '22', '10mm', 'KUNCI SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(636, '23', '300mm', 'SAMBUNGAN', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(637, '24', '150mm. S', 'SAMBUNGAN', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(638, '25', '150mm. B', 'SAMBUNGAN', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(639, '26', '75mm', 'SAMBUNGAN', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(640, '27', '380mm', 'STANG SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(641, '28', '180mm', 'KUNCI KOTREK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(642, '29', '200mm', 'STANG LUNCUR', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(643, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(644, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(645, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(646, '33', '320mm', 'PALU', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(647, '34', '21mm', 'KUNCI RODA', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(648, '35', '150mm', 'OBENG (-)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(649, '36', '100mm', 'OBENG (-)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(650, '37', '75mm', 'OBENG (-)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(651, '38', '35mm', 'OBENG (-)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(652, '39', '50mm. S', 'OBENG (-)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(653, '40', '150mm', 'OBENG (+)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(654, '41', '100mm', 'OBENG (+)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(655, '42', '75mm', 'OBENG (+)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(656, '43', '35mm', 'OBENG (+)', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(657, '44', '200mm', 'OBENG MAGNIT', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(658, '45', '150/10mm', 'OBENG SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(659, '46', '150/8mm', 'OBENG SOK', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(660, '47', '20mm', 'TANG KOMBINASI', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(661, '48', '160mm', 'TANG LANCIP', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(662, '49', '250mm', 'KUNCI INGGRIS', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(663, '50', '180mm', 'PEMUTAR BAUT', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(664, '51', '220mm', 'BATANG KUNINGAN', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(665, '52', '20.8mm', 'KUNCI BUSI', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(666, '53', '16mm', 'KUNCI BUSI', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(667, '54', '0,8~1,1mm', 'FILLER BUSI', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(668, '55', '0,08~0,5mm', 'FILLER KLEP', 'Saepul', '25', '1', '2024-11-06', 'Normal'),
(669, '56', '0', 'SUMBAT VAKUM', 'Saepul', '25', '1', '2024-11-06', 'Normal'),

(670, '1', '17x19mm', 'KUNCI PAS', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(671, '2', '14x17mm', 'KUNCI PAS', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(672, '3', '12x14mm', 'KUNCI PAS', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(673, '4', '10x12mm', 'KUNCI PAS', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(674, '5', '8x9mm', 'KUNCI PAS', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(675, '6', '22x24mm', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(676, '7', '19x21mm', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(677, '8', '14x17mm', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(678, '9', '12x14mm', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(679, '10', '10x12mm', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(680, '11', '12x14mm. S', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(681, '12', '10x12mm. S', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(682, '13', '8x10mm. S', 'KUNCI RING', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(683, '14', '24mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(684, '15', '23mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(685, '16', '22mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(686, '17', '21mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(687, '18', '19mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(688, '19', '17mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(689, '20', '14mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(690, '21', '12mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(691, '22', '10mm', 'KUNCI SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(692, '23', '300mm', 'SAMBUNGAN', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(693, '24', '150mm. S', 'SAMBUNGAN', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(694, '25', '150mm. B', 'SAMBUNGAN', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(695, '26', '75mm', 'SAMBUNGAN', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(696, '27', '380mm', 'STANG SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(697, '28', '180mm', 'KUNCI KOTREK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(698, '29', '200mm', 'STANG LUNCUR', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(699, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(700, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(701, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(702, '33', '320mm', 'PALU', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(703, '34', '21mm', 'KUNCI RODA', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(704, '35', '150mm', 'OBENG (-)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(705, '36', '100mm', 'OBENG (-)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(706, '37', '75mm', 'OBENG (-)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(707, '38', '35mm', 'OBENG (-)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(708, '39', '50mm. S', 'OBENG (-)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(709, '40', '150mm', 'OBENG (+)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(710, '41', '100mm', 'OBENG (+)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(711, '42', '75mm', 'OBENG (+)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(712, '43', '35mm', 'OBENG (+)', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(713, '44', '200mm', 'OBENG MAGNIT', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(714, '45', '150/10mm', 'OBENG SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(715, '46', '150/8mm', 'OBENG SOK', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(716, '47', '20mm', 'TANG KOMBINASI', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(717, '48', '160mm', 'TANG LANCIP', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(718, '49', '250mm', 'KUNCI INGGRIS', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(719, '50', '180mm', 'PEMUTAR BAUT', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(720, '51', '220mm', 'BATANG KUNINGAN', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(721, '52', '20.8mm', 'KUNCI BUSI', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(722, '53', '16mm', 'KUNCI BUSI', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(723, '54', '0,8~1,1mm', 'FILLER BUSI', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(724, '55', '0,08~0,5mm', 'FILLER KLEP', 'Saepul', '26', '1', '2024-11-06', 'Normal'),
(725, '56', '0', 'SUMBAT VAKUM', 'Saepul', '26', '1', '2024-11-06', 'Normal'),

(726, '1', '17x19mm', 'KUNCI PAS', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(727, '2', '14x17mm', 'KUNCI PAS', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(728, '3', '12x14mm', 'KUNCI PAS', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(729, '4', '10x12mm', 'KUNCI PAS', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(730, '5', '8x9mm', 'KUNCI PAS', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(731, '6', '22x24mm', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(732, '7', '19x21mm', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(733, '8', '14x17mm', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(734, '9', '12x14mm', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(735, '10', '10x12mm', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(736, '11', '12x14mm. S', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(737, '12', '10x12mm. S', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(738, '13', '8x10mm. S', 'KUNCI RING', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(739, '14', '24mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(740, '15', '23mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(741, '16', '22mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(742, '17', '21mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(743, '18', '19mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(744, '19', '17mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(745, '20', '14mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(746, '21', '12mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(747, '22', '10mm', 'KUNCI SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(748, '23', '300mm', 'SAMBUNGAN', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(749, '24', '150mm. S', 'SAMBUNGAN', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(750, '25', '150mm. B', 'SAMBUNGAN', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(751, '26', '75mm', 'SAMBUNGAN', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(752, '27', '380mm', 'STANG SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(753, '28', '180mm', 'KUNCI KOTREK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(754, '29', '200mm', 'STANG LUNCUR', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(755, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(756, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(757, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(758, '33', '320mm', 'PALU', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(759, '34', '21mm', 'KUNCI RODA', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(760, '35', '150mm', 'OBENG (-)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(761, '36', '100mm', 'OBENG (-)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(762, '37', '75mm', 'OBENG (-)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(763, '38', '35mm', 'OBENG (-)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(764, '39', '50mm. S', 'OBENG (-)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(765, '40', '150mm', 'OBENG (+)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(766, '41', '100mm', 'OBENG (+)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(767, '42', '75mm', 'OBENG (+)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(768, '43', '35mm', 'OBENG (+)', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(769, '44', '200mm', 'OBENG MAGNIT', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(770, '45', '150/10mm', 'OBENG SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(771, '46', '150/8mm', 'OBENG SOK', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(772, '47', '20mm', 'TANG KOMBINASI', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(773, '48', '160mm', 'TANG LANCIP', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(774, '49', '250mm', 'KUNCI INGGRIS', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(775, '50', '180mm', 'PEMUTAR BAUT', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(776, '51', '220mm', 'BATANG KUNINGAN', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(777, '52', '20.8mm', 'KUNCI BUSI', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(778, '53', '16mm', 'KUNCI BUSI', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(779, '54', '0,8~1,1mm', 'FILLER BUSI', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(780, '55', '0,08~0,5mm', 'FILLER KLEP', 'Saepul', '27', '1', '2024-11-06', 'Normal'),
(781, '56', '0', 'SUMBAT VAKUM', 'Saepul', '27', '1', '2024-11-06', 'Normal'),

(782, '1', '17x19mm', 'KUNCI PAS', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(783, '2', '14x17mm', 'KUNCI PAS', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(784, '3', '12x14mm', 'KUNCI PAS', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(785, '4', '10x12mm', 'KUNCI PAS', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(786, '5', '8x9mm', 'KUNCI PAS', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(787, '6', '22x24mm', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(788, '7', '19x21mm', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(789, '8', '14x17mm', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(790, '9', '12x14mm', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(791, '10', '10x12mm', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(792, '11', '12x14mm. S', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(793, '12', '10x12mm. S', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(794, '13', '8x10mm. S', 'KUNCI RING', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(795, '14', '24mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(796, '15', '23mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(797, '16', '22mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(798, '17', '21mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(799, '18', '19mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(800, '19', '17mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(801, '20', '14mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(802, '21', '12mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(803, '22', '10mm', 'KUNCI SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(804, '23', '300mm', 'SAMBUNGAN', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(805, '24', '150mm. S', 'SAMBUNGAN', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(806, '25', '150mm. B', 'SAMBUNGAN', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(807, '26', '75mm', 'SAMBUNGAN', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(808, '27', '380mm', 'STANG SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(809, '28', '180mm', 'KUNCI KOTREK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(810, '29', '200mm', 'STANG LUNCUR', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(811, '30', '9,5mm', 'SAMBUNGAN FLEKSIBEL', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(812, '31', '12,7x9,5mm', 'SOK ADAPTOR 1', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(813, '32', '9,5x12,7mm', 'SOK ADAPTOR 2', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(814, '33', '320mm', 'PALU', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(815, '34', '21mm', 'KUNCI RODA', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(816, '35', '150mm', 'OBENG (-)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(817, '36', '100mm', 'OBENG (-)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(818, '37', '75mm', 'OBENG (-)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(819, '38', '35mm', 'OBENG (-)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(820, '39', '50mm. S', 'OBENG (-)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(821, '40', '150mm', 'OBENG (+)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(822, '41', '100mm', 'OBENG (+)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(823, '42', '75mm', 'OBENG (+)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(824, '43', '35mm', 'OBENG (+)', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(825, '44', '200mm', 'OBENG MAGNIT', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(826, '45', '150/10mm', 'OBENG SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(827, '46', '150/8mm', 'OBENG SOK', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(828, '47', '20mm', 'TANG KOMBINASI', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(829, '48', '160mm', 'TANG LANCIP', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(830, '49', '250mm', 'KUNCI INGGRIS', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(831, '50', '180mm', 'PEMUTAR BAUT', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(832, '51', '220mm', 'BATANG KUNINGAN', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(833, '52', '20.8mm', 'KUNCI BUSI', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(834, '53', '16mm', 'KUNCI BUSI', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(835, '54', '0,8~1,1mm', 'FILLER BUSI', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(836, '55', '0,08~0,5mm', 'FILLER KLEP', 'Saepul', '28', '1', '2024-11-06', 'Normal'),
(837, '56', '0', 'SUMBAT VAKUM', 'Saepul', '28', '1', '2024-11-06', 'Normal');

--

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_barang`
--

CREATE TABLE `kondisi_barang` (
  `id_kondisi` int(11) NOT NULL,
  `Kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kondisi_barang`
--

INSERT INTO `kondisi_barang` (`id_kondisi`, `Kondisi`) VALUES
(1, 'BAGUS'),
(2, 'RUSAK'),
(3, 'HILANG');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_barang`
--

CREATE TABLE `lokasi_barang` (
  `id_lokasi` int(11) NOT NULL,
  `Lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_barang`
--

INSERT INTO `lokasi_barang` (`id_lokasi`, `Lokasi`) VALUES
(17, 'Deny 01'),
(18, 'Deny 02'),
(19, 'Deny 03'),
(20, 'Deny 04'),
(21, 'Hamdani 01'),
(22, 'Hamdani 02'),
(23, 'Hamdani 03'),
(24, 'Hamdani 04'),
(25, 'Saepul 01'),
(26, 'Saepul 02'),
(27, 'Saepul 03'),
(28, 'Saepul 04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Admin Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`permission_id`, `role_id`, `page_name`, `action_name`) VALUES
(1, 1, 'barang', 'list'),
(2, 1, 'barang', 'view'),
(3, 1, 'barang', 'add'),
(4, 1, 'barang', 'edit'),
(5, 1, 'barang', 'editfield'),
(6, 1, 'barang', 'delete'),
(7, 1, 'barang', 'import_data'),
(8, 1, 'kondisi_barang', 'list'),
(9, 1, 'kondisi_barang', 'view'),
(10, 1, 'kondisi_barang', 'add'),
(11, 1, 'kondisi_barang', 'edit'),
(12, 1, 'kondisi_barang', 'editfield'),
(13, 1, 'kondisi_barang', 'delete'),
(14, 1, 'kondisi_barang', 'import_data'),
(15, 1, 'lokasi_barang', 'list'),
(16, 1, 'lokasi_barang', 'view'),
(17, 1, 'lokasi_barang', 'add'),
(18, 1, 'lokasi_barang', 'edit'),
(19, 1, 'lokasi_barang', 'editfield'),
(20, 1, 'lokasi_barang', 'delete'),
(21, 1, 'lokasi_barang', 'import_data'),
(22, 1, 'type_barang', 'list'),
(23, 1, 'type_barang', 'view'),
(24, 1, 'type_barang', 'add'),
(25, 1, 'type_barang', 'edit'),
(26, 1, 'type_barang', 'editfield'),
(27, 1, 'type_barang', 'delete'),
(28, 1, 'type_barang', 'import_data'),
(29, 1, 'user', 'list'),
(30, 1, 'user', 'view'),
(31, 1, 'user', 'add'),
(32, 1, 'user', 'edit'),
(33, 1, 'user', 'editfield'),
(34, 1, 'user', 'delete'),
(35, 1, 'user', 'import_data'),
(36, 1, 'user', 'accountedit'),
(37, 1, 'user', 'accountview'),
(38, 1, 'role_permissions', 'list'),
(39, 1, 'role_permissions', 'view'),
(40, 1, 'role_permissions', 'add'),
(41, 1, 'role_permissions', 'edit'),
(42, 1, 'role_permissions', 'editfield'),
(43, 1, 'role_permissions', 'delete'),
(44, 1, 'roles', 'list'),
(45, 1, 'roles', 'view'),
(46, 1, 'roles', 'add'),
(47, 1, 'roles', 'edit'),
(48, 1, 'roles', 'editfield'),
(49, 1, 'roles', 'delete'),
(50, 2, 'barang', 'list'),
(51, 2, 'barang', 'view'),
(52, 2, 'barang', 'add'),
(53, 2, 'barang', 'edit'),
(54, 2, 'barang', 'editfield'),
(55, 2, 'type_barang', 'list'),
(56, 2, 'type_barang', 'view'),
(57, 2, 'type_barang', 'add'),
(58, 2, 'type_barang', 'edit'),
(59, 2, 'type_barang', 'editfield'),
(60, 2, 'user', 'accountedit'),
(61, 2, 'user', 'accountview'),
(62, 3, 'surat_masuk', 'list'),
(63, 3, 'surat_masuk', 'view'),
(64, 3, 'surat_masuk', 'edit'),
(65, 3, 'surat_masuk', 'add'),
(66, 3, 'surat_masuk', 'editfield'),
(67, 3, 'surat_keluar', 'list'),
(68, 3, 'surat_keluar', 'view'),
(69, 3, 'surat_keluar', 'edit'),
(70, 3, 'surat_keluar', 'add'),
(71, 3, 'surat_keluar', 'editfield'),
(72, 3, 'surat_masuk', 'import_data'),
(73, 3, 'surat_masuk', 'delete'),
(74, 1, 'barang', 'change_status'),
(75, 3, 'surat_keluar', 'change_status'),
(76, 3, 'surat_keluar', 'delete'),
(77, 1, 'barang', 'perbaiki');


-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `No_Agenda` int(15) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `Tujuan_surat` varchar(255) NOT NULL,
  `Nomor_surat` varchar(255) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `file_surat` varchar(500) NOT NULL,
  `status` enum('dikembalikan','belum dikembalikan') NOT NULL DEFAULT 'belum dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `No_Agenda` int(15) NOT NULL,
  `Nomor_Surat` varchar(255) NOT NULL,
  `Tanggal_surat` date NOT NULL,
  `tanggal_terima` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Asal_surat` varchar(255) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `file_surat` varchar(500) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `status` enum('dikembalikan','belum dikembalikan') NOT NULL DEFAULT 'belum dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--
--
-- Table structure for table `type_barang`
--

CREATE TABLE `type_barang` (
  `id_type_barang` INT(11) NOT NULL,
  `Sumber` VARCHAR(255) NOT NULL,
  `nama_barang` VARCHAR(255) NOT NULL,
  `stok` INT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Menambahkan data tanpa mengisi stok
INSERT INTO `type_barang` (`id_type_barang`,`Sumber`, `nama_barang`, `stok`) VALUES
(1, 'KUNCI PAS','09032-1C160', NULL),
(2, 'KUNCI PAS','09032-1C150', NULL),
(3, 'KUNCI PAS','09032-1C140', NULL),
(4, 'KUNCI PAS','09032-1C130', NULL),
(5, 'KUNCI PAS','09032-1C110', NULL),
(6, 'KUNCI RING','09031-1C170', NULL),
(7, 'KUNCI RING','09031-1C150', NULL),
(8, 'KUNCI RING','09031-1C130', NULL),
(9, 'KUNCI RING','09031-1C120', NULL),
(10, 'KUNCI RING','09031-1C110', NULL),
(11, 'KUNCI RING','09031-1C530', NULL),
(12, 'KUNCI RING','09031-1C510', NULL),
(13, 'KUNCI RING','09031-1C500', NULL),
(14, 'KUNCI SOK','09011-2C550', NULL),
(15, 'KUNCI SOK','09011-2C540', NULL),
(16, 'KUNCI SOK','09011-2C530', NULL),
(17, 'KUNCI SOK','09011-2C520', NULL),
(18, 'KUNCI SOK','09011-1C530', NULL),
(19, 'KUNCI SOK','09011-1C520', NULL),
(20, 'KUNCI SOK','09011-1C510', NULL),
(21, 'KUNCI SOK','09011-1C120', NULL),
(22, 'KUNCI SOK','09011-1C110', NULL),
(23, 'SAMBUNGAN','09012-1C130', NULL),
(24, 'SAMBUNGAN','09012-1C120', NULL),
(25, 'SAMBUNGAN','09012-1C310', NULL),
(26, 'SAMBUNGAN','09012-1C100', NULL),
(27, 'STANG SOK','09021-2C110', NULL),
(28, 'KUNCI KOTREK','09021-1C100', NULL),
(29, 'STANG LUNCUR','09021-3C100', NULL),
(30, 'SAMBUNGAN FLEKSIBEL','09022-3C200', NULL),
(31, 'SOK ADAPTOR 1','09022-3C110', NULL),
(32, 'SOK ADAPTOR 2','09022-3C100', NULL),
(33, 'PALU','09051-1C100', NULL),
(34, 'KUNCI RODA','09150-40010', NULL),
(35, 'OBENG (-)','09041-1C530', NULL),
(36, 'OBENG (-)','09041-1C520', NULL),
(37, 'OBENG (-)','09041-1C510', NULL),
(38, 'OBENG (-)','09041-1C500', NULL),
(39, 'OBENG (-)','09041-1C550', NULL),
(40, 'OBENG (+)','09041-1C531', NULL),
(41, 'OBENG (+)','09041-1C120', NULL),
(42, 'OBENG (+)','09041-1C110', NULL),
(43, 'OBENG (+)','09041-1C100', NULL),
(44, 'OBENG MAGNIT','09053-1C100', NULL),
(45, 'OBENG SOK','09041-2C130', NULL),
(46, 'OBENG SOK','09041-2C120', NULL),
(47, 'TANG KOMBINASI','09042-1C210', NULL),
(48, 'TANG LANCIP','09042-1C300', NULL),
(49, 'KUNCI INGGRIS','09042-1C100', NULL),
(50, 'PEMBERSIH GASKET','09052-1C110', NULL),
(51, 'BATANG KUNINGAN','09051-1C200', NULL),
(52, 'KUNCI BUSI','09045-38162', NULL),
(53, 'KUNCI BUSI','09045-3C210', NULL),
(54, 'FILLER BUSI','09071-1C100', NULL),
(55, 'FILLER KLEP','09071-1C210', NULL),
(56, 'SUMBAT VAKUM','09053-1C220', NULL);

UPDATE type_barang 
SET stok = 0 
WHERE stok IS NULL;




-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2023-04-01 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `photo`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `user_role_id`) VALUES
(1, 'admin', '$2y$10$/by2TQ5HVo58pFBopTCVt.xqrM31lUlDPE3EaoA4Tgnn/cSn648oC', 'admin', 'admin@gmail.com', NULL, NULL, NULL, '2024-11-02 09:48:55', 'cd3000ec83e57469ae4b3a1e5ec5b041', 1),
(2, 'user', '$2y$10$jfL6c8Cucgn8BB/vfBI8eec0fAqOxXttzqNC42VOOVtYE.aehbwxe', 'user', 'user@gmail.com', NULL, NULL, NULL, '2023-04-01 00:00:00', NULL, 2),
(3, 'admin gudang', '$2y$10$zP8ILhN7SejDa5HCMKbPvODYE2t7x5asi3RQRmIyzGlUnLsWr32tu', 'admin gudang', 'admingudang@gmail.com', NULL, NULL, NULL, '2023-04-01 00:00:00', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `lokasi_barang`
--
ALTER TABLE `lokasi_barang`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`No_Agenda`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`No_Agenda`);

--
-- Indexes for table `type_barang`
--
ALTER TABLE `type_barang`
  ADD PRIMARY KEY (`id_type_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lokasi_barang`
--
ALTER TABLE `lokasi_barang`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `No_Agenda` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `No_Agenda` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `type_barang`
--
ALTER TABLE `type_barang`
  MODIFY `id_type_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
