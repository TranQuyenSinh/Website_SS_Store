<?php
session_start();
include_once 'connect.php';
// xử lý avatar
if ($_FILES['avatar']['tmp_name'] != "") {
	$target_file = "../images/avatar_khachhang/{$_SESSION['MaKhachHang']}";
	$fileType = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
	// kiểm tra nếu đã tồn tại thì xóa file cũ
	if (file_exists("$target_file.$fileType")) {
		unlink($target_file . ".jpg");
	}
	// kiểm tra định dạng file
	if ($fileType != 'jpeg' && $fileType != 'jpg' && $fileType != 'png') {
		echo "<h3 style='color:red;'>Lưu thất bại: Chỉ được lưu ảnh dạng .png, .jpg, .jpeg</h3>";
		exit();
	}

	move_uploaded_file($_FILES['avatar']['tmp_name'], "$target_file.$fileType");
	// đăng ký session
	$_SESSION['Avatar'] = $_SESSION['MaKhachHang'] . "." . $fileType;
	$sql = "update `khachhang` SET `Avatar`='{$_SESSION['Avatar']}' WHERE `MaKhachHang` = {$_SESSION['MaKhachHang']}";
	$list = $connect->query($sql);

}

// xử lý info
$fullname = $_POST['txtFullName'];
$gioitinh = $_POST['gender'];
$dienthoai = $_POST['txtDienThoai'];
$diachi = $_POST['txtDiaChi'];

$sql = "UPDATE `khachhang` SET `TenHienThi`='$fullname',`GioiTinh`='$gioitinh',`DienThoai`='$dienthoai',`DiaChi`='$diachi' WHERE `MaKhachHang` = {$_SESSION['MaKhachHang']}";
$result = $connect->query($sql);

// đăng ký lại session
$_SESSION['TenHienThi'] = $fullname;
$_SESSION['GioiTinh'] = $gioitinh;
$_SESSION['DienThoai'] = $dienthoai;
$_SESSION['DiaChi'] = $diachi;

Header("Location: index.php?do=profile");
