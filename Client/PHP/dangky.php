<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/dangky.css">
	<script src="https://kit.fontawesome.com/e5296c717e.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<!-- Ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../JS/KiemTraTaiKhoanDangKy.js"></script>
</head>

<body>
	<?php
	include_once 'connect.php';
	include_once 'header.php';
	?>
	<form action="xulydangky.php" method="POST" class="form">
		<h2>Đăng ký</h2>
		<div class="form_section">
			<label for="fullname" class="form_label">Tên hiển thị:</label>
			<input type="text" id="fullname" name="fullname" />
			<span  class="error_msg"></span>
		</div>
		<div class="form_section">
			<label for="username" class="form_label">Tên đăng nhập:</label>
			<input type="text" id="username" name="username" />
			<span  class="error_msg"></span>
		</div>
		<div class="form_section">
			<label class="form_label" for="password">Mật khẩu:</label>
			<input type="password" id="password" name="password" />
			<span  class="error_msg"></span>
		</div>
		<div class="form_section">
			<label class="form_label" for="password">Nhập lại mật khẩu:</label>
			<input type="password" id="repassword" name="repassword" />
			<span  class="error_msg"></span>
		</div>
		<div class="buttons">
			<input type="submit" value="Đăng ký" name="btnSubmit" />
		</div>
	</form>
	<footer>
		<p>Bản quyền © 2023 Shop Online. Đã đăng ký bản quyền.</p>
	</footer>
</body>

</html>