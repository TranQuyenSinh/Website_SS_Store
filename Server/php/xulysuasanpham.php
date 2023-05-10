<?php
    include_once 'connect.php';
    include_once 'uploadImage.php';

    $image_path = "../../images/sanpham/";

    $masp = $_POST['masp'];
    $maloaisp = $_POST['maloaisanpham'];
    $tensp = $_POST['tensanpham'];
    $dongia = $_POST['dongia'];
    $mota = $_POST['noidung'];
    $tonkho = $_POST['soluongtonkho'];
    $time = date('Y_m_d_H_i_s');

    // chỉnh sửa hình ảnh
    if (isset($_FILES['hinhanh']['name'])) {
        // xóa ảnh cũ
        $sp = $connect->query("select HinhAnh from sanpham where MaSP = $masp")->fetch_array(MYSQLI_ASSOC);
        if ($sp['HinhAnh']!=null) {
            unlink("../../images/sanpham/{$sp['HinhAnh']}");
        }
        // update ảnh mới
        $image_name = uploadImage($_FILES['hinhanh'], $time, $image_path);
        $connect->query("update sanpham set HinhAnh = '$image_name' where MaSP = $masp");
    }


