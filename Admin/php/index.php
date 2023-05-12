<?php
session_start();
ob_start();
if (!isset($_SESSION["MaNguoiDung"])) {
    Header("location: dangnhap.php");
}
include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
</head>

<body>
    <div class="sidebar">
        <h3 class="shop_title">SS Store</h3>
        <hr>
        <ul>
            <li page="home">
                <a href="#">
                    <i class="fas fa-star"></i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li page="donhang">
                <a href="#">
                    <i class="fas fa-check"></i>
                    <p>Quản lý đơn hàng</p>
                </a>
            </li>
            <li page="sanpham">
                <a href="#">
                    <i class="fas fa-box"></i>
                    <p>Quản lý sản phẩm</p>
                </a>
            </li>
            <li page="loaisanpham">
                <a href="#">
                    <i class="fab fa-microsoft"></i>
                    <p>Quản lý loại sản phẩm</p>
                </a>
            </li>
            <hr>
            <li page="nguoidung">
                <a href="#">
                    <i class="fas fa-users"></i>
                    <p>Quản lý người dùng</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="content">
            <!-- Header -->
            <div class="content_header">
                <h3 class="content_title"></h3>
                <div class="user_info">
                    <img src="../../images/avatar_khachhang/0.jpg" alt="">
                    <p>
                        <?php
                            echo $_SESSION['TenHienThi'];
                        ?>
                    </p>
                    <a href="xulydangxuat.php" class="option">Đăng xuất</a>
                </div>
            </div>
            <!-- End Header -->

            <!-- Insert content $do here -->
            <div class="main_content">

            </div>
        </div>

        <footer>
            <i class="fas fa-bars"></i>
            <p>Bản quyền © 2023 Shop Online. Đã đăng ký bản quyền.</p>
        </footer>
    </div>
</body>

</html>