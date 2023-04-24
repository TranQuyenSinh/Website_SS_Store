<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 500px;
            border: 1px solid silver;
            box-shadow: 3px 3px 3px silver;
            height: 200px;
            margin: 25px auto;
            text-align: center;
            border-radius: 20px;
            background: #01aed1;
            color: white;
            font-weight: bold;
        }

        .container p {
            font-size: 26px;
            margin-top: 54px;
        }

        .container a {
            text-decoration: none;
            color: #ffffff;
            border: 2px solid #3cff0e;
            padding: 10px 20px;
            margin-top: 21px;
            display: inline-block;
            transition: all 0.2s ease-in-out;
        }

        .container a:hover {
            color: white;
            background: #18f452;
            color: #3e3d3d;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include_once 'connect.php';

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlKiemTra = "SELECT * FROM `khachhang` WHERE `TenDangNhap` = '$username'";
    if ($connect->query($sqlKiemTra)) {
        $password = md5($password);
        $sql_them = "INSERT INTO `khachhang`( `TenHienThi`, `TenDangNhap`, `MatKhau`) VALUES ('$fullname', '$username', '$password')";

        if ($connect->query($sql_them)) {
            $sql_get_khachhang_vuathem = "SELECT * FROM `khachhang` WHERE TenDangNhap = '$username' AND MatKhau = '$password'";
            $list = $connect->query($sql_get_khachhang_vuathem);

            if ($list) {
                $row = $list->fetch_array(MYSQLI_ASSOC);
                // đăng ký session
                $_SESSION['MaKhachHang'] = $row['MaKhachHang'];
                $_SESSION['TenHienThi'] = $row['TenHienThi'];
                echo "
                <div class='container'>
                    <p>Đăng ký thành công</p>
                    <a href='index.php'>Trang chủ</a>
                </div>
        ";
            }
        }
    } else {
        echo "
            <div class='container'>
                <p>Lỗi: trùng tên đăng nhập, đăng ký thất bại</p>
                <a href='index.php?do=dangky'>Đăng ký lại</a>
            </div>
        ";
    }


    ?>
</body>

</html>