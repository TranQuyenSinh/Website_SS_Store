-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2023 at 11:13 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `MaDanhGia` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `SoSao` tinyint(4) NOT NULL,
  `BinhLuan` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`MaDanhGia`, `MaSP`, `MaKhachHang`, `SoSao`, `BinhLuan`, `time`) VALUES
(7, 1, 39, 5, 'câm dmm', '2023-04-30 11:06:52'),
(8, 1, 42, 1, 'tệ vl', '2023-04-30 11:06:31'),
(9, 1, 40, 3, 'war ko mấy chú', '2023-04-30 11:09:45'),
(10, 1, 41, 5, 'sang đã hài, t đã cười', '2023-04-30 11:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(10) NOT NULL,
  `TenHienThi` text COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` text COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` text COLLATE utf8_unicode_ci,
  `DienThoai` text COLLATE utf8_unicode_ci,
  `DiaChi` text COLLATE utf8_unicode_ci,
  `Avatar` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenHienThi`, `TenDangNhap`, `MatKhau`, `GioiTinh`, `DienThoai`, `DiaChi`, `Avatar`) VALUES
(39, 'Trần Quyền Sinh', 'tranquyensinh', '202cb962ac59075b964b07152d234b70', 'Nam', '0815845288', '5M2, Đăng Dung, Mỹ Long, Long Xuyên, An Giang', '39.jpg'),
(40, 'Huỳnh Sang', 'hsang123', '202cb962ac59075b964b07152d234b70', 'Nam', '0815845288', 'Mỹ Long, Long Xưyên, An Giang', '40.jpg'),
(41, 'Phước Tài', 'ptai123', '202cb962ac59075b964b07152d234b70', 'Nam', '', '', '41.jpg'),
(42, 'Hồ Minh Nguyên', 'hmnguyen', '202cb962ac59075b964b07152d234b70', 'Nam', '0956478367', 'Mỹ Bình', '42.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSP` int(10) NOT NULL,
  `TenLoaiSP` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSP`, `TenLoaiSP`, `HinhAnh`) VALUES
(1, 'Chuột', 'chuot.png'),
(2, 'Laptop', 'laptop.png'),
(3, 'Bàn phím', 'banphim.png'),
(4, 'Tai nghe', 'tainghe.png');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(10) NOT NULL,
  `TenDangNhap` text COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `TenHienThi` text COLLATE utf8_unicode_ci NOT NULL,
  `VaiTro` tinyint(10) NOT NULL COMMENT '0: user, 1:admin',
  `DaKhoa` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(10) NOT NULL,
  `TenSP` text COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` int(50) NOT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `TonKho` int(50) NOT NULL,
  `SoLuongDaBan` int(11) NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiSP` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `DonGia`, `mota`, `TonKho`, `SoLuongDaBan`, `HinhAnh`, `MaLoaiSP`) VALUES
(1, 'Chuột Rapoo V300W Black', 890000, '<h2 class=\"description_title\">Đánh giá chi tiết chuột Rapoo Black</h2>\r\n<p>Rapoo V300W Black chuột gaming không dây sở hữu thiết kế độc đáo, form cầm đối xứng tạo cảm giác thoải mái suốt thời gian dài. Được tích hợp công nghệ kết nối hiện đại với tốc độ phản hồi 1ms/giây, hiệu suất truyền tải lên đến 10m mang đến cho bạn những trải nghiệm làm việc & giải trí ấn tượng.</p>\r\n<h3 class=\"description_title\">Thiết kế độc đáo, form cầm đối xứng</h3>\r\n<img class=\"description_image\" src=\"https://file.hstatic.net/1000026716/file/gearvn-chuot-rapoo-v300w-black_190052f732c84f78b34bec4dde5514cd_grande.png\" alt=\"\">\r\n<p>Rapoo V300W dòng chuột máy tính chơi game sở hữu thiết kế độc đáo cùng tông màu đầy “Huyền bí” GEARVN tin chắc đây sẽ là một trong những phụ kiện chơi game bạn đang tìm kiếm.</p>\r\n<img class=\"description_image\" src=\"https://file.hstatic.net/1000026716/file/gearvn-chuot-rapoo-v300w-black-1_505b0f1edb0946b598f3de85d50753fb_grande.png\" alt=\"\">\r\n<p>Để tạo cho người cảm giác thoải mái khi sử dụng trong thời gian dài cùng những pha xử lý chính xác, Rapoo V300W Black được thiết kế với Form cầm đối xứng ôm sát lòng bàn tay cho bạn cảm giác cầm chuột thoải mái nhất. Tông màu đen chủ đạo kết hợp cùng những chi tiết góc cạnh được gia công tỉ mỉ cùng phần logo chữ V trên thân được tích hợp led tất cả tạo nên tổng thể vô cùng hầm hố, đậm chất gaming.</p>\r\n<h3 class=\"description_title\">Công nghệ không dây V+</h3>\r\n<img class=\"description_image\" src=\"https://file.hstatic.net/1000026716/file/gearvn-chuot-rapoo-v300w-black-2_c3714625fbcb45058d0bc5536085be21_grande.png\" alt=\"\">\r\n<p>V300W chuột chơi game RGB được tích hợp chế độ kép có dây và không dây thuận tiện sử dụng ở bất kỳ đâu. Đặc biệt, khi kết nối ở chế độ chuột không dây bạn sẽ được trải nghiệm công nghệ Wireless tiên tiến nhất từ Rapoo với độ trễ 1ms/giây, cùng phạm vi kết nối lên đến 10m</p>\r\n<h3 class=\"description_title\">Tích hợp 9 nút bấm thông minh</h3>\r\n<img class=\"description_image\" src=\"https://file.hstatic.net/1000026716/file/gearvn-chuot-rapoo-v300w-black-3_4633637d26774563a0f18b8d54c65793_grande.png\" alt=\"\">\r\n<p>Tích hợp 9 nút bấm thông minh được bố trí dọc thân chuột giúp Rapoo V300W Black tăng thêm trải nghiệm và phấn khởi trong từ cú click chuột khi chơi game. Nhờ đó những thao tác của bạn sẽ được xử lý một cách chính xác và nhanh chóng.</p>\r\n<h3 class=\"description_title\">Trang bị công nghệ LED RGB </h3>\r\n<img class=\"description_image\" src=\"https://file.hstatic.net/1000026716/file/gearvn-chuot-rapoo-v300w-black-4_f43d9f84f4e8471ea34d5adec4048e01_grande.png\" alt=\"\">\r\n<p>Điều làm Rapoo V300W Black thêm phần nổi bật trong phân khúc chuột gaming dưới 1 triệu chính là được tích hợp hệ thống LED RGB ở các khu vực khác nhau. Nhờ vào hiệu ứng chiếu sáng độc đáo, bạn hoàn toàn có thể tạo nên không gian chơi game đa sắc màu RGB khi kết hợp cùng bàn phím máy tính, tai nghe chơi game,...</p>\r\n<h3 class=\"description_title\">Sử dụng Switch bấm Omron</h3>\r\n<p>Sử dụng Switch bấm Omron tuổi thọ lên đến 20 triệu lần nhấn được kiểm tra nghiêm ngặt bởi nên người chơi hoàn toàn có thể yên tâm về chất lượng và hiệu quả khi sử dụng.</p>\r\n\r\n', 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(2, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, '<img src=\"../images/sanpham/thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp\" class=\"product_left_img\" alt=\"error\">', 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(3, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(4, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(5, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(6, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(7, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(8, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(9, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
(10, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(11, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(12, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(13, 'best seller', 1790000, NULL, 233, 999, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(14, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(15, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(16, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(17, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(18, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(19, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(20, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(21, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(22, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(23, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(24, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(25, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(26, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(27, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(28, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(29, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(30, 'Tai nghe SteelSeries Arctis Nova 1 White', 1790000, NULL, 233, 99, 'thumbtainghe-recovered-recovered_7e457f00ed8740afa352ee77b19310ff_large.webp', 4),
(31, 'Chuột Rapoo V300W Black', 890000, NULL, 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MaDanhGia`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSP`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoiDung` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
