-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2010 at 05:38 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopdochoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthdnhap`
--

CREATE TABLE IF NOT EXISTS `cthdnhap` (
  `SoHDN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SoHDN`,`MaDoChoi`),
  KEY `MaDoChoi` (`MaDoChoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cthdnhap`
--


-- --------------------------------------------------------

--
-- Table structure for table `cthdxuat`
--

CREATE TABLE IF NOT EXISTS `cthdxuat` (
  `SoHDX` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SoHDX`,`MaDoChoi`),
  KEY `MaDoChoi` (`MaDoChoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cthdxuat`
--


-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc` (
  `MaDM` int(11) NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` int(11) NOT NULL,
  PRIMARY KEY (`MaDM`),
  KEY `MaLoai` (`MaLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `danhmuc`
--


-- --------------------------------------------------------

--
-- Table structure for table `dochoi`
--

CREATE TABLE IF NOT EXISTS `dochoi` (
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenDoChoi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `MaNSX` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGiaNhap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DonGiaBan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaDoChoi`),
  KEY `MaLoai` (`MaLoai`,`MaNSX`),
  KEY `MaNSX` (`MaNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dochoi`
--


-- --------------------------------------------------------

--
-- Table structure for table `hdnhap`
--

CREATE TABLE IF NOT EXISTS `hdnhap` (
  `SoHDN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgayNhap` date NOT NULL,
  `MaNSX` int(11) NOT NULL,
  `GhiChu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KiemTra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SoHDN`),
  KEY `MaNSX` (`MaNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hdnhap`
--


-- --------------------------------------------------------

--
-- Table structure for table `hdxuat`
--

CREATE TABLE IF NOT EXISTS `hdxuat` (
  `SoHDX` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgayXuat` date NOT NULL,
  `MaKH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KiemTra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SoHDX`),
  KEY `MaKH` (`MaKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hdxuat`
--


-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--


-- --------------------------------------------------------

--
-- Table structure for table `loaidochoi`
--

CREATE TABLE IF NOT EXISTS `loaidochoi` (
  `MaLoai` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `loaidochoi`
--

INSERT INTO `loaidochoi` (`MaLoai`, `TenLoai`) VALUES
(1, 'Toys on SALE'),
(2, 'Toys by Stuff'),
(3, 'Animals & Wildlife'),
(4, 'Arts & Crafts'),
(5, 'Video & Music'),
(6, 'Bath Toys'),
(7, 'Building Blocks'),
(8, 'Classic & Retro'),
(9, 'Vehicles'),
(10, 'Games'),
(11, 'Outdoor Toys');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `MaNSX` int(11) NOT NULL AUTO_INCREMENT,
  `TenNSX` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nhasanxuat`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthdnhap`
--
ALTER TABLE `cthdnhap`
  ADD CONSTRAINT `cthdnhap_ibfk_1` FOREIGN KEY (`SoHDN`) REFERENCES `hdnhap` (`SoHDN`),
  ADD CONSTRAINT `cthdnhap_ibfk_2` FOREIGN KEY (`MaDoChoi`) REFERENCES `dochoi` (`MaDoChoi`);

--
-- Constraints for table `cthdxuat`
--
ALTER TABLE `cthdxuat`
  ADD CONSTRAINT `cthdxuat_ibfk_1` FOREIGN KEY (`SoHDX`) REFERENCES `hdxuat` (`SoHDX`),
  ADD CONSTRAINT `cthdxuat_ibfk_2` FOREIGN KEY (`MaDoChoi`) REFERENCES `dochoi` (`MaDoChoi`);

--
-- Constraints for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `danhmuc_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaidochoi` (`MaLoai`);

--
-- Constraints for table `dochoi`
--
ALTER TABLE `dochoi`
  ADD CONSTRAINT `dochoi_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaidochoi` (`MaLoai`),
  ADD CONSTRAINT `dochoi_ibfk_2` FOREIGN KEY (`MaNSX`) REFERENCES `nhasanxuat` (`MaNSX`);

--
-- Constraints for table `hdnhap`
--
ALTER TABLE `hdnhap`
  ADD CONSTRAINT `hdnhap_ibfk_1` FOREIGN KEY (`MaNSX`) REFERENCES `nhasanxuat` (`MaNSX`);

--
-- Constraints for table `hdxuat`
--
ALTER TABLE `hdxuat`
  ADD CONSTRAINT `hdxuat_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);
