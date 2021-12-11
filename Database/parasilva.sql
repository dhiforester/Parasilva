-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2021 at 06:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parasilva`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `akses` varchar(25) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama`, `email`, `kontak`, `password`, `akses`) VALUES
(1, 'Solihul Hadi', 'dhiforester@gmail.com', '089601154726', 'solihulhadi1412', 'Admin'),
(2, 'aditya Amindespranadi', 'klinikutamasamara@gmail.com', '+62 813-1376-6281', 'klinikutamasamara', 'Client'),
(3, 'Lili Hamduli', 'hamdulih71@gmail.com', '+62 821-2835-8771', 'hamdulih71', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `name_project` varchar(50) NOT NULL,
  `url_demo` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_akses`, `tanggal`, `name_project`, `url_demo`, `deskripsi`) VALUES
(1, 2, '2021-12-11', 'Bridging Antrian Online', 'https://parasilva.tech/samara', 'Proses bridging antrian online klinik'),
(2, 3, '2021-12-01', 'My Math E-Learning', 'mymath.tech', 'Membangun aplikasi e-learning berbasis mobile');

-- --------------------------------------------------------

--
-- Table structure for table `project_progres`
--

DROP TABLE IF EXISTS `project_progres`;
CREATE TABLE IF NOT EXISTS `project_progres` (
  `id_project_progres` int(10) NOT NULL AUTO_INCREMENT,
  `id_project` int(10) NOT NULL,
  `id_akses` int(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_project_progres`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_progres`
--

INSERT INTO `project_progres` (`id_project_progres`, `id_project`, `id_akses`, `tanggal`, `deskripsi`) VALUES
(1, 1, 1, '2021-12-11 22:31', 'Commit version control pertama kali');

-- --------------------------------------------------------

--
-- Table structure for table `setting_info`
--

DROP TABLE IF EXISTS `setting_info`;
CREATE TABLE IF NOT EXISTS `setting_info` (
  `id_setting_info` int(10) NOT NULL AUTO_INCREMENT,
  `judul_web` varchar(50) NOT NULL,
  `keyword` text NOT NULL,
  `deskripsi` text NOT NULL,
  `pendiri` varchar(50) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `header_logo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_setting_info`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_info`
--

INSERT INTO `setting_info` (`id_setting_info`, `judul_web`, `keyword`, `deskripsi`, `pendiri`, `favicon`, `header_logo`) VALUES
(1, 'Parasilva Technology', 'web, developer, web developer, website, PHP, Javascript, CSS, web Developer, developer web dari kuningan, kabupaten kuningan, cirebon, kota cirebon', 'Salah satu pengembang aplikasi lokal, Pengembang aplikasi berbasis web, mobile dan dekstop. Menerima jasa pembuatan aplikasi web, mobile dan dekstop.', 'Solihul Hadi', 'favicon.png', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `setting_laman`
--

DROP TABLE IF EXISTS `setting_laman`;
CREATE TABLE IF NOT EXISTS `setting_laman` (
  `id_setting_laman` int(20) NOT NULL AUTO_INCREMENT,
  `tentang` text NOT NULL,
  `kontak_lokasi` text NOT NULL,
  `qna` text NOT NULL,
  `sla` text NOT NULL,
  `kebijakan_pivasi` text NOT NULL,
  PRIMARY KEY (`id_setting_laman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_medsos`
--

DROP TABLE IF EXISTS `setting_medsos`;
CREATE TABLE IF NOT EXISTS `setting_medsos` (
  `id_setting_medsos` int(10) NOT NULL AUTO_INCREMENT,
  `nama_medsos` varchar(50) NOT NULL,
  `url_medsos` varchar(100) NOT NULL,
  `icon_medsos` varchar(50) NOT NULL,
  PRIMARY KEY (`id_setting_medsos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
