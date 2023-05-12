<?php
include_once "connect.php";
include_once "return_error.php";


$action = $_POST['action'];
$tenhienthi = $_POST['txtTenHienThi'];
$matkhau = trim($_POST['txtMatKhau']);
$dakhoa = isset($_POST['chkKhoa']) ? 1 : 0;

switch ($action) {
    case 'add':
        $tendangnhap = trim($_POST['txtTenDangNhap']);
        if ($tendangnhap == "" || $matkhau == "" || $tenhienthi == "") {
            return_error('Các trường không được bỏ trống');
        }
        // check username đã tồn tại chưa
        $sql = "select * from nguoidung where TenDangNhap = '$tendangnhap'";
        $result = $connect->query($sql);
        if (mysqli_num_rows($result) != 0) {
            return_error('Tên đăng nhập đã tồn tại');
        }

        $vaitro = $_POST['vaitro'];
        $sql = "insert nguoidung(TenDangNhap, MatKhau, TenHienThi, DaKhoa, VaiTro)
                values ('$tendangnhap', '" . md5($matkhau) . "', '$tenhienthi', $dakhoa, $vaitro)";
        $connect->query($sql);
        break;
    case 'update':
        if ($tenhienthi == "") {
            return_error('Các trường không được bỏ trống');
        }

        $manguoidung = $_POST['manguoidung'];
        $sql_thaydoimatkhau = $matkhau == "" ? "" : ",MatKhau = '" . md5($matkhau) . "' ";
        $sql = "update nguoidung set TenHienThi = '$tenhienthi',   DaKhoa = $dakhoa " . $sql_thaydoimatkhau . "where MaNguoiDung = $manguoidung";
        $connect->query($sql);
        break;
    case 'delete':
        $manguoidung = $_POST['manguoidung'];
        $sql = "delete from nguoidung where MaNguoiDung = $manguoidung";
        $connect->query($sql);
        break;
    default:
        if ($connect->error) {
            return_error("Error: ", $connect->error);
        }
}
