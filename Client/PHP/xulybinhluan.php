<?php
session_start();
include_once 'connect.php';

$sosao = $_POST['rating'];
$binhluan = $_POST['BinhLuan'];
$masp = $_POST['MaSP'];
$time = date('Y-m-d H:i:s');
$makhachhang = $_SESSION['MaKhachHang'];

// Kiểm tra xem khách hàng này đã đánh giá sản phẩm này chưa
$sql_check = "SELECT * FROM `danhgia` WHERE MaSP = '$masp' and MaKhachHang = '$makhachhang'";
$result = $connect->query($sql_check);
if (mysqli_num_rows($result) > 0) {
    // đã đánh giá rồi => update lại đánh giá cũ 
    $sql = "UPDATE `danhgia` SET `SoSao`=$sosao,`BinhLuan`='$binhluan',`time`='$time' WHERE `MaSP`='$masp' and `MaKhachHang`='$makhachhang'";
}else {
    $sql = "INSERT INTO `danhgia`(`MaSP`, `MaKhachHang`, `SoSao`, `BinhLuan`, `time`) VALUES ('$masp','$makhachhang', $sosao, '$binhluan', '$time' )";
}

if ($connect->query($sql)) {
    Header("Location: ".$_SESSION['currentPage']);
}else {
    echo $connect->error;
}
