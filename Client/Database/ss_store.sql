-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2023 at 05:06 AM
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
  `MaSanPham` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `SoSao` tinyint(4) NOT NULL,
  `BinhLuan` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(39, 'Trần Quyền Sinh', 'tranquyensinh', '202cb962ac59075b964b07152d234b70', 'Nữ', '0815845288', '5M2, Đăng Dung, Mỹ Long, Long Xuyên, An Giang', '39.jpg'),
(40, 'Huỳnh Sang', 'hsang123', '202cb962ac59075b964b07152d234b70', 'Nam', '0815845288', 'Mỹ Long, Long Xưyên, An Giang', '40.jpg');

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
(1, 'Chuột Rapoo V300W Black', 890000, '<a href=\"#\">cc</a>\r\n<h3 style=\"color:red;\">Màu đỏ h3</h3>', 109, 25, 'thumbchuot_8d6a6542a294458aaa68df8b560121d1_large.webp', 3),
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
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
