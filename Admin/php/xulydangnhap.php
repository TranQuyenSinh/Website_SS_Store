<?php
session_start();
include_once 'connect.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $sql = "SELECT * FROM NguoiDung WHERE TenDangNhap = '$username' AND MatKhau = '$password'";
    $data = $connect->query($sql);
    if ($connect->error) {
        echo $connect->error;
        die();
    }
    if (mysqli_num_rows($data) <= 0) {
        echo ("Tên đăng nhập, mật khẩu không chính xác!");
        die();
    }
    $row = $data->fetch_array(MYSQLI_ASSOC);
    if ($row['DaKhoa'] != 0) {
        echo ("Tài khoản của bạn đã bị khóa, vui lòng liên hệ quản trị viên!");
        die();
    }

    // Đăng ký SESSION
    $_SESSION['MaNguoiDung'] = $row['MaNguoiDung'];
    $_SESSION['TenHienThi'] = $row['TenHienThi'];
    $_SESSION['VaiTro'] = $row['VaiTro'];
    Header("Location: index.php");
}
