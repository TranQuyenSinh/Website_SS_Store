<?php
session_start();
include_once 'connect.php';
// xử lý avatar
if (isset($_FILES['avatar'])) {
	$type = $_FILES['avatar']['type'];
	if ($type == 'image/jpeg' || $type == 'image/jpg' || $type == 'image/png') {
		$file_name = $_FILES['avatar']['name'];
		$tmp_path = $_FILES['avatar']['tmp_name'];
		// khách hàng đã có avatar trước kia rồi, => đổi avatar
		if (file_exists("../images/avatar_khachhang/{$_SESSION['Avatar']}")) {
			// xóa avatar cũ
			unlink("../images/avatar_khachhang/{$_SESSION['Avatar']}");
		}
		// sau đó upload lại avatar mới
		preg_match('/(\.[jpg|jpeg|png]{3,4})$/i', $file_name, $matches);
		$phan_mo_rong = strtolower($matches[1]);
		move_uploaded_file($tmp_path, "../images/avatar_khachhang/{$_SESSION['MaKhachHang']}$phan_mo_rong");
		// đăng ký session
		$_SESSION['Avatar'] = $_SESSION['MaKhachHang'].$phan_mo_rong;

	} else {
		// xử lý không phải định dạng hình ảnh
	}
}
// xử lý info
$fullname = $_POST['txtFullName'];
$gioitinh = $_POST['gender'];
$dienthoai = $_POST['txtDienThoai'];
$diachi = $_POST['txtDiaChi'];



$sql = "UPDATE `khachhang` SET `TenHienThi`='$fullname',`GioiTinh`='$gioitinh',`DienThoai`='$dienthoai',`DiaChi`='$diachi',`Avatar`='{$_SESSION['Avatar']}' WHERE `MaKhachHang` = {$_SESSION['MaKhachHang']}";
$result = $connect->query($sql);

// đăng ký lại session
$_SESSION['TenHienThi'] = $fullname;
$_SESSION['GioiTinh'] = $gioitinh;
$_SESSION['DienThoai'] = $dienthoai;
$_SESSION['DiaChi'] = $diachi;

Header("Location: index.php?do=profile");
?>