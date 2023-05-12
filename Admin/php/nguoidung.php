<?php
include_once "connect.php";
$sql = "SELECT * FROM `nguoidung` WHERE VaiTro = 1";
$listadmin = $connect->query($sql);

$sql = "SELECT * FROM `nguoidung` WHERE VaiTro = 0";
$listuser = $connect->query($sql);
?>
<link rel="stylesheet" href="../css/nguoidung.css">
<script src="../js/nguoidung.js"></script>
<h1>Administrator</h1>
<hr>
<div class="card_container">
    <div class="card_add">
        + Thêm
    </div>
    <?php
    while ($admin = $listadmin->fetch_array(MYSQLI_ASSOC)) {
        echo "
            <div class='nguoidung_card'>
                <img src='../../images/avatar_khachhang/0.jpg' alt=''>
                <div class='nguoidung_info'>
                    <p class='nguoidung_fullname'>{$admin['TenHienThi']}</p>
                    <p class='nguoidung_status'>Tình trạng: 
                        " . ($admin['DaKhoa'] == 0 ? "<i style='color: #24a624;' class='fas fa-circle'></i>" : "<i style='color: #4a3c3c;' class='fas fa-lock'></i>") . "
                    </p>
                </div>
            </div>
            ";
    }
    ?>
</div>
<h1>User</h1>
<hr>
<div class="card_container">
    <div class="card_add">
        + Thêm
    </div>
    <?php
        while ($user = $listuser->fetch_array(MYSQLI_ASSOC)) {
            echo "
            <div class='nguoidung_card'>
                <input type='hidden' name='manguoidung' value='{$user['MaNguoiDung']}'>
                <img src='../../images/avatar_khachhang/0.jpg' alt=''>
                <div class='nguoidung_info'>
                    <p class='nguoidung_fullname'>{$user['TenHienThi']}</p>
                    <p class='nguoidung_status'>Tình trạng: 
                        ".($user['DaKhoa'] == 0 ? "<i style='color: #24a624;' class='fas fa-circle'></i>":"<i style='color: #4a3c3c;' class='fas fa-lock'></i>")."
                    </p>
                </div>
                <div class='nguoidung_card_overlay'>
                    <button class='suaBtn'>Sửa</button>
                    <button class='xoaBtn'>Xóa</button>
                </div>
            </div>
            ";
        }
    ?>
</div>

<div class="modal_overlay">
    <div class="modal">
        <h2>Thông tin tài khoản</h2>
        <span class="close">&times;</span>
        <form action="">
            <label for="" class="error_text" style="color:red;"></label>
            <input type="text" name="txtTenHienThi" placeholder="Họ và tên"><br>
            <input type="text" name="txtTenDangNhap" placeholder="Tên đăng nhập"><br>
            <input type="text" name="txtMatKhau" placeholder="Mật khẩu"><br>
            <label for="khoa">Khóa: </label>
            <input type="checkbox" id="khoa" name="chkKhoa"><br>
            <button type="submit" class="submit-button">Lưu</button>
        </form>
    </div>
</div>