<?php
	$_SESSION['currentPage'] = "index.php?do=thanhtoan";
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) 
		$cart = $_SESSION['cart'];
?>
<link rel="stylesheet" href="../css/thanhtoan.css">
<form action="xulydonhang.php" name="form" method="POST" class="form">
	<h1 class="form_title">Thông tin giao hàng</h1>
	<?php
		if (!isset($_SESSION['MaKhachHang'])) 
			echo "Bạn đã có tài khoản? <a href='index.php?do=dangnhap'>Đăng nhập</a>";
	?>
	<div class="form_section">
		<?php
		$tenhienthi = isset($_SESSION['TenHienThi']) ? $_SESSION['TenHienThi'] : "";
		echo "<input type='text' id='fullname' placeholder='Họ và tên' name='txtFullName' value='$tenhienthi' />";
		?>
		<span class="error_msg"></span>
	</div>
	<div class="form_section">
		<?php
		$dienthoai = isset($_SESSION['DienThoai']) ? $_SESSION['DienThoai'] : "";
		echo "<input type='text' id='dienthoai' placeholder='Số diện thoại' name='txtDienThoai' value='$dienthoai' />";
		?>
		<span class="error_msg"></span>
	</div>
	<div class="form_section">
		<?php
		$diachi = isset($_SESSION['DiaChi']) ? $_SESSION['DiaChi'] : "";
		echo "<input type='text' id='diachi' placeholder='Địa chỉ' name='txtDiaChi' value='$diachi' />";
		?>
		<br>
		<select name="ls_province"></select>
		<select name="ls_district"></select>
		<select name="ls_ward"></select>
		<span class="error_msg"></span>
	</div>
	<input type="text" name="txtGhiChu" id="GhiChu" value="" placeholder="Ghi chú">
	<button type="submit" name="btnSubmit" class="submit-button">Hoàn tất đơn hàng</button>

</form>

<div class="cart_container">
	<?php
		$tongtien = 0;
		foreach ($cart as $id => $sanpham) {
			$dongia = $sanpham['DonGia'];
			$soluong = $sanpham['SoLuong'];
			$thanhtien = $dongia * $soluong;
			$tongtien+=$thanhtien;

			echo "
				<div class='cart_item'>
					<img src='../images/sanpham/{$sanpham['HinhAnh']}' alt='{$sanpham['TenSP']}'>
					<div class='item_info'>
						<div class='item_name'>{$sanpham['TenSP']}</div>
						<div class='item_amount'>Số lưọng: $soluong</div>
					</div>
					<div class='item_price'>".number_format($dongia)." đ</div>
				</div>
			";
		}
		echo "
			<hr>
			<div class='total'>
				<span>Tổng cộng</span>
				<span>".number_format($tongtien)." đ</span>
			</div>
		";
	?>
	

</div>
<!-- Script select địa chỉ -->
<script src="../JS/vietnamlocalselector.js"></script>
<script>
	var localpicker = new LocalPicker({
		province: "ls_province",
		district: "ls_district",
		ward: "ls_ward"
	});
</script>