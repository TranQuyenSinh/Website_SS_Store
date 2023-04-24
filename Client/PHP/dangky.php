<link rel="stylesheet" href="../css/dangky.css">
<form action="xulydangky.php" method="POST" class="form">
	<h2>Đăng ký</h2>
	<div class="form_section">
		<label for="fullname" class="form_label">Tên hiển thị:</label>
		<input type="text" id="fullname" name="fullname" />
		<span class="error_msg"></span>
	</div>
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
	<div class="form_section">
		<label class="form_label" for="password">Nhập lại mật khẩu:</label>
		<input type="password" id="repassword" name="repassword" />
		<span class="error_msg"></span>
	</div>
	<div class="buttons">
		<input type="submit" value="Đăng ký" name="btnSubmit" />
	</div>
</form>
<script src="../JS/KiemTraTaiKhoanDangKy.js"></script>