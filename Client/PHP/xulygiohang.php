<?php
include_once 'connect.php';

$id = $_GET['id'];
$soluong = $_GET['soluong'];
$do = $_GET['do'];

session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
switch ($do) {
    case 'add':
        // sp đã có trong cart => tăng số lượng
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['SoLuong'] += $soluong;
        } else {
            $sql = "select * from sanpham where MaSP = $id";
            $result = $connect->query($sql);
            if ($result) {
                $sp = $result->fetch_array(MYSQLI_ASSOC);
                $_SESSION['cart'][$id]['TenSP'] = $sp['TenSP'];
                $_SESSION['cart'][$id]['DonGia'] = $sp['DonGia'];
                $_SESSION['cart'][$id]['HinhAnh'] = $sp['HinhAnh'];
                $_SESSION['cart'][$id]['SoLuong'] = $soluong;
            }
        }
        break;
    case 'plus':
        if ($_SESSION['cart'][$id]['SoLuong'] < 10)
            $_SESSION['cart'][$id]['SoLuong']++;
        break;
    case 'minus':
        if ($_SESSION['cart'][$id]['SoLuong'] > 0)
            $_SESSION['cart'][$id]['SoLuong']--;
        break;
    case 'delete':
        unset($_SESSION['cart'][$id]);
        break;
}

header("location: " . $_SESSION['currentPage']);
