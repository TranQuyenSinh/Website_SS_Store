<?php
    include_once 'connect.php';

    $fullname = $_POST['fullname'];
    $username =$_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);
    $sql_them = "INSERT INTO `khachhang`( `TenHienThi`, `TenDangNhap`, `MatKhau`) VALUES ('$fullname', '$username', '$password')";
    $themnd = $connect->query($sql_them);
    
    if($themnd)
        echo 'Đăng ký thành công!';
    else {
        echo 'Lỗi: '.$themnd;
    }
?>