-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2010 at 05:24 AM
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
  `ThanhTien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
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
  `ThanhTien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SoHDX`,`MaDoChoi`),
  KEY `MaDoChoi` (`MaDoChoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cthdxuat`
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
  `DonGia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThongTin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoLuotXem` int(11) DEFAULT '0',
  PRIMARY KEY (`MaDoChoi`),
  KEY `MaLoai` (`MaLoai`),
  KEY `fk_dochoi_nhasanxuat1` (`MaNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dochoi`
--

INSERT INTO `dochoi` (`MaDoChoi`, `TenDoChoi`, `MaLoai`, `MaNSX`, `DonGia`, `ThongTin`, `HinhAnh`, `SoLuotXem`) VALUES
('SP001', 'Bộ ghép Ngôi nhà nhỏ ', 1, 0, '450000 VNĐ', 'Trò chơi phổ biến tại Châu Âu khiến nhiều người say mê. Bé có thể cùng các bạn dùng những chi tiết gỗ để ghép nên những ngôi nhà trang trại xinh xắn. Bộ sản phẩm đòi hỏi bé phải có óc tưởng tượng và tư duy. Chất liệu gỗ sồi nhập từ Đức, tiêu chuẩn xu', 'SP001.jpg', 13),
('SP002', 'Xe đạp cho bé  ', 1, 0, '790000 VNĐ ', 'Chiếc xe đạp nhỏ xinh xắn giúp bé tích cực vận động, tập đi xe đạp. Sản phẩm phù hợp cho trẻ từ 4 tuổi trở lên. Kích thước 85x54x11cm. (Veesano - Đồ chơi gỗ, đồ chơi thông minh, đồ chơi trí tuệ, đồ chơi giáo dục, đồ chơi an toàn).', 'SP002.jpg', 2),
('SP003', 'Phấn viết chữ đẹp Veesano ', 1, 0, '4500 VNĐ', 'Phấn dành cho bé không ảnh hưởng đến sức khoe bé', 'SP003.jpg', 23),
('SP004', 'Bảng tập viết chữ đẹp Veesano ', 1, 0, '17000 VNĐ ', 'Đẹp', 'SP004.jpg', 6),
('SP005', 'Ghế ngồi của bé ', 1, 0, '180000 VNĐ', 'Chiếc ghế ngồi xinh xắn cho bé ngồi chơi, ngồi học, ngồi ăn cùng gia đình, kích thước 28.5cm x 28.5cm x 26cm (cao 49 cm), có 4 màu cho bé lựa chọn: đỏ, cam, xanh lá cây, xanh da trời. Gỗ thông vân sáng bóng nhẵn, mịn, kết cấu chắc chắn, tháo lắp di c', 'SP005.jpg', 15),
('SP006', 'Chọn quần áo cho gấu ', 1, 0, '68000 VNĐ ', NULL, 'SP006.jpg', 3),
('SP007', 'Lắp ráp nhà búp bê ', 1, 0, '365000 VNĐ', 'Bộ nhà BenHo. Giúp trẻ sáng tạo trong cách bày biện, thiết kế không gian sống theo trí tưởng tượng của Bé. Quan trọng hơn, ngôi nhà nhỏ này giúp bé có tình yêu thương gia đình, luôn hướng về ngôi nhà nhỏ thân thương của mình.', 'SP07.jpg', 10),
('SP008', 'Con gỗ - Gọt bút ', 1, 0, '20000 VNĐ ', 'Với sản phẩm nghộ nghĩnh này bé không những có thể tự mình gọt bút chì một cách hào hứng mà còn là một món quà cho những giờ học thật lý thú', 'SP008.jpg', 0),
('SP009', 'Bộ mô hình phòng ngủ ', 1, 0, '140000 VNĐ', 'Giúp trẻ sáng tạo trong cách bày biện, thiết kế không gian sống theo trí tưởng tượng của Bé, bé sẽ bày biện căn phòng ngủ của mình thật xinh xắn, gọn gàng như trong truyện cổ tích với: giường, tủ quần áo, bàn trang điểm, đèn ngủ..Đây cũng là bộ sản p', 'SP009.jpg', 6),
('SP010', 'Bộ mô hình phòng khách ', 1, 0, '140000 VNĐ ', 'Giúp trẻ sáng tạo trong cách bày biện, thiết kế không gian sống theo trí tưởng tượng của bé, bé sẽ bày biện phòng khách nhà mình thật gọn gàng để tiếp khách với bộ bàn ghế, tivi, đèn cây. Đây cũng là bộ sản phẩm giúp bé có tình yêu thương và gắn bó v', 'SP010.jpg', 22);

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE IF NOT EXISTS `giamgia` (
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ThoiHan` date DEFAULT NULL,
  PRIMARY KEY (`MaDoChoi`),
  KEY `fk_giamgia_dochoi1` (`MaDoChoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giamgia`
--


-- --------------------------------------------------------

--
-- Table structure for table `hdnhap`
--

CREATE TABLE IF NOT EXISTS `hdnhap` (
  `SoHDN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NgayNhap` date NOT NULL,
  `GhiChu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KiemTra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SoHDN`)
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
  `TenTaiKhoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KiemTra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SoHDX`),
  KEY `MaNSX` (`TenTaiKhoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hdxuat`
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
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
  `TenTaiKhoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenNguoiDung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TenTaiKhoan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`MaNSX`, `TenNSX`, `DiaChi`, `DienThoai`, `Email`) VALUES
(1, 'Veesano', 'Châu Âu ', '', ''),
(2, 'Bé Nhỏ', 'Quận 10, HCM , Việt Nam', '083.7980001', 'benho@yahoo.com');

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
-- Constraints for table `dochoi`
--
ALTER TABLE `dochoi`
  ADD CONSTRAINT `fk_dochoi_nhasanxuat1` FOREIGN KEY (`MaNSX`) REFERENCES `nhasanxuat` (`MaNSX`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dochoi_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaidochoi` (`MaLoai`);

--
-- Constraints for table `giamgia`
--
ALTER TABLE `giamgia`
  ADD CONSTRAINT `fk_giamgia_dochoi1` FOREIGN KEY (`MaDoChoi`) REFERENCES `dochoi` (`MaDoChoi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hdxuat`
--
ALTER TABLE `hdxuat`
  ADD CONSTRAINT `hdxuat_ibfk_1` FOREIGN KEY (`TenTaiKhoan`) REFERENCES `nguoidung` (`TenTaiKhoan`);
