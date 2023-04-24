<link rel="stylesheet" href="../css/dangky.css">
<form action="xulydangnhap.php" method="POST" class="form">
    <h2>Đăng nhập</h2>
    <div class="form_section">
        <label for="username" class="form_label">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" />
        <span class="error_msg"></span>
    </div>
    <div class="form_section">
        <label class="form_label" for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" />
        <span class="error_msg"></span>
    </div>
    <div class="buttons">
        <input type="submit" value="Đăng nhập" name="btnSubmit" />
    </div>
</form>