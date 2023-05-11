<?php
include_once "connect.php";
include_once "uploadImage.php";

$action = $_POST['action'];

switch ($action) {
    case 'add':
        $tenloaisp = $_POST['txtTenLoaiSP'];
        $hinhanh = uploadImage($_FILES['hinhanh'], time(), "../../images/loaisp/");
        $connect->query("INSERT INTO `loaisanpham`(`TenLoaiSP`, `HinhAnh`) VALUES ('$tenloaisp','$hinhanh')");
        break;
    case 'update':
        $maloaisp = $_POST['txtMaLoaiSP'];
        $tenloaisp = $_POST['txtTenLoaiSP'];
        $sql_update = "UPDATE `loaisanpham` SET `TenLoaiSP`='$tenloaisp' WHERE `MaLoaiSP` = $maloaisp";
        // có update hình ảnh
        if ($_FILES['hinhanh']['name'] != '') {
            $hinhanh = uploadImage($_FILES['hinhanh'], time(), "../../images/loaisp/");
            $sql_update = "UPDATE `loaisanpham` SET `TenLoaiSP`='$tenloaisp',`HinhAnh`='$hinhanh' WHERE `MaLoaiSP` = $maloaisp";
        }
        $connect->query($sql_update);
        break;
    case 'delete':
        $maloaisp =  $_POST['maloaisp'];
        $sql_delete = "DELETE FROM `loaisanpham` WHERE MaLoaiSP = $maloaisp";
        $connect->query($sql_delete);
        break;
}
if ($connect->error) 
    echo $connect->error;

$connect->close();
