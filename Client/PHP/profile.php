<link rel="stylesheet" href="../css/profile.css" />
<div class="form_container">
	<form action="xulyprofile.php" name="form" method="POST" class="form" enctype="multipart/form-data">
		<div class="avatar">
			<?php
				if ($_SESSION['Avatar'] != "") {
					$img_src = "../images/avatar_khachhang/{$_SESSION['Avatar']}";
				}else {
					$img_src = "../images/avatar_khachhang/0.jpg";
				}
				echo "<img src='{$img_src}' alt='avatar'/>";
			?>
			
			<input type="file" id="imagefile"  name='avatar' name="imagefile" accept=".png, .jpg, .jpeg">
		</div>
		<div class="info">
			<h1>Hồ sơ của tôi:</h1>

			<div class="form_section">
				<label for="fullname" class="form_label">Họ tên:</label>
				<?php
				echo "<input type='text' id='fullname' name='txtFullName' value='{$_SESSION['TenHienThi']}' />";
				?>
				<span class="error_msg"></span>
			</div>
			<div class="form_section">
				<label for="username" class="form_label">Giới tính:</label>
				<?php
				if (isset($_SESSION['GioiTinh']))
					$check = $_SESSION['GioiTinh'] == 'Nam' ? true : false;
				else
					$check = true; // mặc định là nam

				if ($check) {
					echo "
						<input type='radio' id='male' checked name='gender' value='Nam' />
						<label for='male'>Nam</label>
						<input type='radio' id='female' name='gender' value='Nữ' />
						<label for='female'>Nữ</label><br />
					";
				} else {
					echo "
						<input type='radio' id='male' name='gender' value='Nam' />
						<label for='male'>Nam</label>
						<input type='radio' id='female' checked name='gender' value='Nữ' />
						<label for='female'>Nữ</label><br />
					";
				}

				?>
				<span class="error_msg"></span>
			</div>
			<div class="form_section">
				<label class="form_label" for="diachi">Địa chỉ:</label>
				<?php
				echo "<input type='text' id='diachi' name='txtDiaChi' value='{$_SESSION['DiaChi']}' />";
				?>
				<span class="error_msg"></span>
			</div>
			<div class="form_section">
				<label class="form_label" for="dienthoai">Điện thoại:</label>
				<?php
				echo "<input type='text' id='dienthoai' name='txtDienThoai' value='{$_SESSION['DienThoai']}' />";
				?>
				<span class="error_msg"></span>
			</div>
			<div class="buttons">
				<button type="submit" value="Lưu" name="btnSubmit">Lưu</button>
			</div>

		</div>
	</form>
</div>
<?php

// nếu chưa login thì chuyển về trang login
if (!isset($_SESSION['MaKhachHang'])) {
	Header("Location: index.php?do=dangnhap");
}


?>

<script>
	function ShowPreviewImage(file_input) {
		
			// Lấy file được chọn
			const selectedFile = file_input.files[0];
			//Tạo một đối tượng FileReader
			const reader = new FileReader();
			reader.onload = function(event) {
				// Cập nhật thuộc tính src của phần tử avatar
				document.querySelector('.avatar img').src = event.target.result;
			};
			// Đọc nội dung của file được chọn
			reader.readAsDataURL(selectedFile);
		
	}

	document.querySelector("input[type='file']").onchange = function() {
		ShowPreviewImage(this);
	}
</script>