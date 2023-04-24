<?php
session_start();
include_once 'connect.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $sql = "SELECT * FROM khachhang WHERE TenDangNhap = '$username' AND MatKhau = '$password'";

    $data = $connect->query($sql);

    $row = $data->fetch_array(MYSQLI_ASSOC);
    if ($row) {
            // Đăng ký SESSION
            $_SESSION['MaKhachHang'] = $row['MaKhachHang'];
            $_SESSION['TenHienThi'] = $row['TenHienThi'];
            Header("Location: index.php");
        } 
    else {
        echo("Tên đăng nhập hoặc mật khẩu không chính xác!");
    }
}
