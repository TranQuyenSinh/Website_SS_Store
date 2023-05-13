<link rel="stylesheet" href="../css/modal.css">
<?php
session_start();
include_once "connect.php";

$tenkhachhang = $_POST['txtFullName'];
$sodienthoai = $_POST['txtDienThoai'];
$ward = isset($_POST['ls_ward']) ? $_POST['ls_ward'] : '';
$district = isset($_POST['ls_district']) ? $_POST['ls_district'] : '';
$province = isset($_POST['ls_province']) ? $_POST['ls_province'] : '';
$diachi = $_POST['txtDiaChi'] . "/" . $ward . "/" . $district . "/" . $province;
$ghichu = $_POST['txtGhiChu'];
date_default_timezone_set("Asia/Ho_Chi_Minh");
$time = date('Y-m-d H:i:s');
$cart = $_SESSION['cart'];

$tongtien = 0;
foreach ($cart as $id => $sanpham) {
    $tongtien += $sanpham['DonGia'] * $sanpham['SoLuong'];
}

$sql_themdonhang = "INSERT INTO `donhang`(`TenKhachHang`, `DienThoai`, `DiaChi`, `GhiChu`, `TongTien`, `Time`, `TrangThai`) VALUES ('$tenkhachhang','$sodienthoai','$diachi','$ghichu','$tongtien','$time',0)";
$result = $connect->query($sql_themdonhang);
if ($result) {
    $sql_laymadonhang = "SELECT `MaDonHang` FROM `donhang` WHERE `Time` = '$time'";
    $result = $connect->query($sql_laymadonhang);
    if ($result) {
        $madonhang = $result->fetch_array(MYSQLI_ASSOC)['MaDonHang'];
        foreach ($cart as $id => $sanpham) {
            $soluong = $sanpham['SoLuong'];
            $dongia = $sanpham['DonGia'];
            $thanhtien = $soluong * $dongia;

            $sql_themchitietdonhang = "INSERT INTO `chitietdonhang`(`MaDonHang`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES ($madonhang,$id,$soluong,$dongia,$thanhtien)";
            $connect->query($sql_themchitietdonhang);
        }

        unset($_SESSION['cart']);
        echo "
                <div class='modal-wrapper'>
                    <div class='modal'>
                        <h1>Đặt hàng thành công!</h1>
                        <a href='index.php?do=home'><button class='modal_button'>Quay về trang chủ</button></a>
                    </div>
                </div>
                ";
    }
}

$connect->close();
?>