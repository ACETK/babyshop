-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2010 at 07:46 PM
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
-- Table structure for table `dochoi`
--

CREATE TABLE IF NOT EXISTS `dochoi` (
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenDoChoi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `MaNSX` int(11) NOT NULL,
  `DonGia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThongTin` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoLuotXem` int(11) DEFAULT '0',
  `NgayNhap` date NOT NULL,
  `TinhTrang` tinyint(4) NOT NULL DEFAULT '0',
  `SoLuong` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaDoChoi`),
  KEY `MaLoai` (`MaLoai`),
  KEY `MaNSX` (`MaNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dochoi`
--

INSERT INTO `dochoi` (`MaDoChoi`, `TenDoChoi`, `MaLoai`, `MaNSX`, `DonGia`, `ThongTin`, `HinhAnh`, `SoLuotXem`, `NgayNhap`, `TinhTrang`, `SoLuong`) VALUES
('SP0000', 'Ghế nằm ăn rung', 9, 4, '1279000', 'Ghế rung nhè nhẹ để vỗ về bé. Ghế có 3 món đồ chơi gắn trên thành, Có thể tháo rời. Cần pin (chưa bao gồm trong sản phẩm). Dành cho bé từ sơ sinh trở đi.', 'SP0000.jpg', 0, '2010-05-05', 0, 0),
('SP0001', 'Vòm san hô cá', 6, 7, '310000', 'Vòm san hô cá là đồ chơi yêu thích của bé. Mô tả đặc trưng “chơi và phát triển” cùng với chuyển động động lực. Món đồ chơi Lamaze này có khóa cho phép để đồ chơi chắc chắn trên bất kỳ bề mặt nào, làm cho bữa ăn của bé thêm vui! ', 'SP0001.gif', 0, '2010-05-05', 0, 0),
('SP0002', 'Treo nôi có nhạc, đèn', 6, 6, '850000', 'Giấc ngủ rất quan trọng với trẻ thơ. Trẻ sẽ dễ dàng đi vào giấc ngủ nhờ những giấc mơ trong màn chiếu động điều khiển được từ xa. Thật vậy, nhờ ánh sáng chiếu êm dịu, âm nhạc nhẹ nhàng, trẻ sẽ từ từ đi vào thế giới của những giấc mơ. Điểm nổi bật của', 'SP0002.jpg', 0, '2010-05-05', 0, 0),
('SP0003', 'Đàn hình tổ chim', 6, 6, '388000', 'Chơi nhạc với Lamaze ! Tám thanh nhạc rực rỡ sắc màu làm mái cho ngôi nhà chim xinh đẹp. Khuyến khích bé chơi nhạc độc lập, hoặc cùng chơi với bố, mẹ hay người trông trẻ !  Đàn hình tổ chim có đầy đủ nốt nhạc mà em bé có thể chơi bằng phím bấm vừa ta', 'SP0003.gif', 0, '2010-05-05', 0, 0),
('SP0004', 'Bộ gõ nhạc nhỏ', 6, 6, '145000', 'Mô tả sản phẩm: Bé gõ lên đàn để nghe nhiều âm thanh với cung bậc khác nhau. ', 'SP0004.jpg', 0, '2010-05-05', 0, 0),
('SP0005', 'Voi con Eddie', 6, 6, '388000', 'Đồ chơi bằng vải lông có nhạc hiện đại nhất trong Bộ sưu tập giai điệu Lamaze .Giai điệu voi con Eddie cho phép bé chơi nhạc tại vòi và ghi âm/chơi lại tại chân. Đồ chơi có kèm theo sách nhạc để dạy bé một chút âm nhạc cơ bản. Bé sẽ yêu thích mẫu kẻ ', 'SP0005.gif', 0, '2010-05-05', 0, 0),
('SP0006', 'Xếp hình vạn hoa', 5, 5, '235000', 'Bộ xếp hình này cực kỳ đặc biệt bổ ích cho óc sáng tạo của bé. Nó bao gồm 1 cái lõi hình lục giác và 28 mảnh gỗ có 6 hình dạng & màu sắc khác nhau. Đây là dạng đồ chơi sáng-tạo-mở, tức là bé có thể ghép hình thế nào cũng được, ghép tất cả với nhau, h', 'SP0006.jpg', 0, '2010-05-05', 0, 0),
('SP0007', 'Tập làm nhà xây dựng', 3, 4, '757440', 'The Build ''n Play Bins are part of the brand new LP Builders Line. These great storage bins take a classic, popular building format to a whole new level by incorporating fun toddler activities into the play. All new block design is just perfect for l', 'SP0007.jpg', 0, '2010-05-05', 0, 0),
('SP0008', 'Khối xếp hình lâu đài', 3, 5, '565000', 'Khối xếp hình lâu đài. Kích cỡ : 30 x 42 x 6 cm. 12 x 17 x 2 1/2 in.', 'SP0008.jpg', 0, '2010-05-05', 0, 0),
('SP0009', 'Bé học xem giờ', 8, 5, '115000', 'Cái đồng hồ học xem giờ này có các vạch đếm rõ ràng để bé xác định được sổ phút trong một giờ, trong nửa giờ, trong một khắc (15 phút). Ngoài ra giúp bé hiểu về phân số một cách cơ bản. ', 'SP0009.jpg', 0, '2010-05-05', 0, 0),
('SP0010', 'Đếm hạt đâu', 8, 4, '205000', 'Đồ chơi này gồm 15 hạt và 5 màu khác nhau, được chia thành 5 cột thứ tự từ 1 đến 5. Dạy cho trẻ tập đếm và nhận biết được các màu sắc năng động, thông minh hơn. Dành cho trẻ em từ 2 tuổi trở lên ', 'SP0010.jpg', 0, '2010-05-10', 0, 0),
('SP0011', 'Xe tập đi đa năng', 9, 4, '1140000', 'Your baby will have hours of fun gobbling up Fisher-Price Peek-a-Blocks with this adorable hippo walker that converts to a ride-on as baby grows. Pull the yellow seat up to form a push bar, and then press it back down to let the riding fun begin. Push the hippo friend along,... read more', 'SP0011.jpg', 0, '2010-05-10', 0, 0),
('SP0012', 'Xe sư tử tập đi', 9, 4, '1614050', 'Không khác như có một người bạn của bé, bé có thể dựa vào, đặc biệt là khi bé đang tập đi! Đầu tiên xe sư tử sẵn sàng để bé bước đi tưng bước chắc chắn, khuyến khích và tán thưởng bé bằng đèn, âm thanh, và nhạc nhẹ. Sau khi bé đã đi được tưng bước thành thạo, bé có thể ngồi trên lưng sư tử và cho sử tử chạy. Được thiết kế với cơ sở bánh xe to rộng để hỗ trợ vững chắc khi em bé tập đi hay ngồi trên yên xe! Với chế độ chuyển on / off và điều chỉnh âm lượng ta có thể để cho bé chơi ở chế độ yên tĩn', 'SP0012.jpg', 0, '2010-05-10', 0, 0),
('SP0013', 'Xe đẩy siêu tiện lợi', 9, 6, '4231500', 'One hand fold, manoeuvrable - Fits 2 infant car seats for Travel System - Back seat for newborn - Front seat from 6 months - Child tray in the back - Sportive handle with 2 handgrips - Large drop down shopping basket - Parents storage and cupholder - 4 positions recline(back seat), 2 positions recline (front seat', 'SP0013.jpg', 0, '2010-05-10', 0, 0),
('SP0014', 'Xe đẩy Graco-Mirage Plus', 9, 6, '2976000', 'Xe đẩy siêu nhẹ thuận tiện cho bạn & bé đi du lịch, để trên xe ô tô, máy bay. + Xe đẩy gấp gọn bằng 1 tay. + Xe đẩy có 3 chế độ ngồi, có chế độ nằm 150 độ cho bé từ 6 tháng tuổi. + Bánh xe có khoá an toàn, dễ dàng để mọi nơi.', 'SP0014.jpg', 0, '2010-05-10', 0, 0),
('SP0015', 'Cuộc chiến ngoài vũ trụ', 3, 4, '1729000', 'Bé có thể tạo cho mình nhiều loại xe khác nhau nhiều loại máy khác nhau tạo ra một cuộc chiến không gian. Giúp bé yêu thích khả năng sáng tạo yêu thích khoa học. ', 'SP0015.jpg', 0, '2010-05-10', 0, 0),
('SP0016', 'Ngôi nhà xinh xắn', 3, 2, '1429000', 'Bé có thể tạo cho mình một ngôi nhà xinh xắn từ những mảnh ghép đa sắc. Giúp be sáng tạo hơn trong kiến trúc sư. Bé có thể tạo nên những ngôi nhà khác nhau trong nhiều mảnh ghép.Giúp bé có khả năng trở thành nhà kiến trúc sau này. ', 'SP0016.jpg', 0, '2010-05-10', 0, 0),
('SP0017', 'Phi cơ Lego', 3, 2, '379000', NULL, 'SP0017.jpg', 0, '2010-05-10', 0, 0),
('SP0018', 'Xếp hình xe tải', 3, 2, '499000', 'Bộ sản phẩm rất tiện lợi. Nó gồm những nhiều mảnh ghép khác nhau tạo được rất nhiều mô hìnhxe tải. Tạo cho bé có khả năng tư duy sáng tạo trong lúc chơi. Lúc chơi xong bé có thể gom lại và bỏ vào thùng cất giữ gọn gàng ngăn nắp. ', 'SP0018.jpg', 0, '2010-05-12', 0, 0),
('SP0019', 'Cũi em bé có bánh và màn che', 9, 4, '2021000', 'Cũi rộng, an toàn, chắc chắn. Cũi dùng cho em bé chơi hoặc ngủ. Gồm có cửa kéo khoá dễ dàng. Cũi có bánh xe & phanh an toàn. Cũi gấp gọn dễ dàng khi không sử dụng. Cũi có 2 màu (da cam hoặc xanh) ', 'SP0019.jpg', 0, '2010-05-12', 0, 0),
('SP0020', 'dsf', 1, 2, '5435345', 'gfdggfd', 'SP0020.jpg', 0, '2010-08-13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE IF NOT EXISTS `giamgia` (
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Banner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaDoChoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giamgia`
--


-- --------------------------------------------------------

--
-- Table structure for table `hdnhap`
--

CREATE TABLE IF NOT EXISTS `hdnhap` (
  `MaHDNhap` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgayNhap` date NOT NULL,
  `GhiChu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaHDNhap`,`MaDoChoi`),
  KEY `MaDoChoi` (`MaDoChoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hdnhap`
--

INSERT INTO `hdnhap` (`MaHDNhap`, `MaDoChoi`, `SoLuong`, `ThanhTien`, `NgayNhap`, `GhiChu`) VALUES
('HD01', 'SP0000', 32525, '', '0000-00-00', NULL),
('vfdsgs', 'SP0010', 0, '', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hdxuat`
--

CREATE TABLE IF NOT EXISTS `hdxuat` (
  `MaHDXuat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaDoChoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgayNhap` date NOT NULL,
  `TenTaiKhoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaHDXuat`,`MaDoChoi`),
  KEY `MaDoChoi` (`MaDoChoi`),
  KEY `TenTaiKhoan` (`TenTaiKhoan`)
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
  `TinhTrang` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `loaidochoi`
--

INSERT INTO `loaidochoi` (`MaLoai`, `TenLoai`, `TinhTrang`) VALUES
(1, 'Đồ dùng - Dụng cụ', 0),
(2, 'Búp bê - Thú nhồi bông', 0),
(3, 'Mô hình lắp ráp', 0),
(4, 'Đồ chơi ngoài trời', 0),
(5, 'Đồ chơi trí tuệ', 0),
(6, 'Có âm thanh - hình ảnh', 0),
(7, 'Đồ chơi kỹ năng - phản xạ', 0),
(8, 'Đồ chơi giáo dục', 0),
(9, 'Nôi cũi - ghế ăn - xe đẩy', 0),
(10, 'Các loại đồ chơi khác...', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

CREATE TABLE IF NOT EXISTS `loaitaikhoan` (
  `MaLoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoai`, `TenLoai`) VALUES
('admin', 'Quản Trị Website'),
('user', 'Khách Hàng');

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
  `TinhTrang` tinyint(4) NOT NULL DEFAULT '0',
  `MaLoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TenTaiKhoan`),
  KEY `MaLoai` (`MaLoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`TenTaiKhoan`, `TenNguoiDung`, `MatKhau`, `NgaySinh`, `GioiTinh`, `DiaChi`, `DienThoai`, `Email`, `TinhTrang`, `MaLoai`) VALUES
('admin', 'Nguyen Minh Hieu', '22222', '0000-00-00', 'Nữ', 'bbbbbbbbbbbbbb', '465664646', 'aaaaaaâ', 0, 'user'),
('hjjgj', 'âsđsf', '666666', '2010-08-26', 'Nam', 'gdfggfđgf', '543535434', '54355345', 0, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `MaNSX` int(11) NOT NULL AUTO_INCREMENT,
  `TenNSX` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TinhTrang` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaNSX`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`MaNSX`, `TenNSX`, `DiaChi`, `DienThoai`, `Email`, `TinhTrang`) VALUES
(2, 'BENHO', 'không biết', '083000có', 'email@email.email', 1),
(4, 'Fisher Price', 'Nước ngoài', '086954521365896', 'fisher_price@fmail.com', 0),
(5, 'Farlin', '', '', 'Farlin@gmail.info', 0),
(6, 'Chicco', NULL, NULL, NULL, 0),
(7, 'Matrioshka', NULL, NULL, NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dochoi`
--
ALTER TABLE `dochoi`
  ADD CONSTRAINT `dochoi_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaidochoi` (`MaLoai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dochoi_ibfk_2` FOREIGN KEY (`MaNSX`) REFERENCES `nhasanxuat` (`MaNSX`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `giamgia`
--
ALTER TABLE `giamgia`
  ADD CONSTRAINT `giamgia_ibfk_1` FOREIGN KEY (`MaDoChoi`) REFERENCES `dochoi` (`MaDoChoi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hdnhap`
--
ALTER TABLE `hdnhap`
  ADD CONSTRAINT `hdnhap_ibfk_1` FOREIGN KEY (`MaDoChoi`) REFERENCES `dochoi` (`MaDoChoi`);

--
-- Constraints for table `hdxuat`
--
ALTER TABLE `hdxuat`
  ADD CONSTRAINT `hdxuat_ibfk_2` FOREIGN KEY (`TenTaiKhoan`) REFERENCES `nguoidung` (`TenTaiKhoan`),
  ADD CONSTRAINT `hdxuat_ibfk_1` FOREIGN KEY (`MaDoChoi`) REFERENCES `dochoi` (`MaDoChoi`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaitaikhoan` (`MaLoai`);
