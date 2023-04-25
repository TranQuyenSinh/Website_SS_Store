<link rel="stylesheet" href="../css/profile.css" />
<div class="form_container">
	<div class="avatar">
		<img src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg" alt="avatar" />
		<input type="file" id="imagefile" name="imagefile" accept=".png, .jpg, .jpeg">
	</div>
	<div class="info">
		<h1>Hồ sơ của tôi :</h1>
		<form action="xulyprofile.php" method="POST" class="form">
			<div class="form_section">
				<label for="fullname" class="form_label">Họ tên:</label>
				<input type="text" id="fullname" name="txtFullName" />
				<span class="error_msg"></span>
			</div>
			<div class="form_section">
				<label for="username" class="form_label">Ngày sinh:</label>
				<input type="text" id="username" name="txtNgaySinh" />
				<span class="error_msg"></span>
			</div>
			<div class="form_section">
				<label for="username" class="form_label">Giới tính:</label>
				<input type="radio" id="male" name="gender" value="nam" />
				<label for="male">Nam</label>
				<input type="radio" id="female" name="gender" value="nữ" />
				<label for="female">Nữ</label><br />
				<span class="error_msg"></span>
			</div>
			<div class="form_section">
				<label class="form_label" for="diachi">Địa chỉ:</label>
				<input type="text" id="diachi" name="txtDiaChi" />
				<span class="error_msg"></span>
			</div>
			<div class="form_section">
				<label class="form_label" for="dienthoai">Điện thoại:</label>
				<input type="text" id="dienthoai" name="txtDienThoai" />
				<span class="error_msg"></span>
			</div>
			<div class="buttons">
				<button type="submit" value="Lưu" name="btnSubmit">Lưu</button>
			</div>
		</form>
	</div>
</div>


<script>
	const avatarInput = document.getElementById("imagefile");
	const avatarPreview = document.querySelector(".avatar img");
	avatarInput.addEventListener("change", function() {
		// Lấy file được chọn
		const selectedFile = this.files[0];
		// Tạo một đối tượng FileReader
		const reader = new FileReader();
		reader.onload = function(event) {
			// Cập nhật thuộc tính src của phần tử avatar
			avatarPreview.src = event.target.result;
		};
		// Đọc nội dung của file được chọn
		reader.readAsDataURL(selectedFile);
	});
</script>