<?php
session_start();
ob_start();
include_once 'connect.php';
include_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e5296c717e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <div class="header_container">
            <a href="index.php">
                <img src="../images/logo2.png" class="header_logo" />
            </a>
            <div class="header_search">
                <input type="text" placeholder="Search..." class="header_search_bar" />
                <div class="header_search_icons">
                    <a href="/">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </div>
            </div>
            <?php
            // đã login
            if (isset($_SESSION['MaKhachHang'])) {
                if (isset($_SESSION['Avatar']) && $_SESSION['Avatar']!="") 
                    $avatar_path = "../images/avatar_khachhang/{$_SESSION['Avatar']}";
                else
                    $avatar_path = "../images/avatar_khachhang/0.jpg";
                echo "
                        <div class='header_cart'>
                            <a href='https://'>
                                <i class='fa-solid fa-cart-shopping'> </i>
                            </a>
                        </div>
                        <div class='header_user'>
                            <img src='$avatar_path' />
                            <p>{$_SESSION['TenHienThi']}</p>
                            <div class='header_user_menu_option'>
                                <a href='index.php?do=profile'>
                                    <div class='header_user_menu_option_1'>
                                        Profile
                                    </div>
                                </a>
                                <a href='dangxuat.php'>
                                    <div class='header_user_menu_option_1'>
                                        Đăng xuất
                                    </div>
                                </a>
                            </div>
                        </div>
                        ";
            } else {
                echo "
                    <div class='header_user'>
                        <img src='https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg' />
        
                        <div class='header_user_menu_option'>
                            <a href='index.php?do=dangnhap'>
                                <div class='header_user_menu_option_1'>
                                    Đăng nhập
                                </div>
                            </a>
                            <a href='index.php?do=dangky'>
                                <div class='header_user_menu_option_1'>
                                    Đăng ký
                                </div>
                            </a>
                        </div>
                    </div>
                    ";
            }
            ?>


        </div>
    </div>
    <div class="container">
        <?php
        $do = isset($_GET['do']) ? $_GET['do'] : 'home';
        include $do . '.php';
        ?>
    </div>
    <footer>
        <p>Bản quyền © 2023 Shop Online. Đã đăng ký bản quyền.</p>
    </footer>

</body>

</html>