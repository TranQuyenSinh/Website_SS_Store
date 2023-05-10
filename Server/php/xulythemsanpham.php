<?php
include_once 'connect.php';
include_once 'uploadImage.php';
$image_path = "../../images/sanpham/";

$maloaisp = $_POST['maloaisanpham'];
$tensp = $_POST['tensanpham'];
$dongia = $_POST['dongia'];
$mota = $_POST['noidung'];
$hinhanh = $_FILES['hinhanh'];
$tonkho = $_POST['soluongtonkho'];

$time = date('Y_m_d_H_i_s');

$hinhanh_name = uploadImage($hinhanh, $time, $image_path);
$sql_themsp = "INSERT INTO `sanpham`( `TenSP`, `DonGia`, `mota`, `TonKho`, `SoLuongDaBan`, `HinhAnh`, `MaLoaiSP`) VALUES ('$tensp',$dongia,'$mota',$tonkho,0,'$hinhanh_name',$maloaisp)";

$list = $connect->query($sql_themsp);
