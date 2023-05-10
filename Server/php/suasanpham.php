<?php
include_once 'connect.php';
$idsp = $_POST['idsp'];
$result = $connect->query("select * from sanpham where MaSP = $idsp");
$sp = $result->fetch_array(MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="../css/themsanpham.css">
<i class="fas fa-arrow-left backpage_icon" onclick="loadPage('sanpham.php')"></i>
<h1>Sửa sản phẩm</h1>
<form action="xulysuasanpham.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="masp" value="<?php echo $sp['MaSP'];   ?>">
    <label for="maloaisanpham">Loại sản phẩm:</label>
    <select id="maloaisanpham" name="maloaisanpham">
        <option value="">Chọn mã loại sản phẩm</option>

        <?php
        $sql_loaisp = "SELECT * FROM `loaisanpham`";
        $list_loaisp = $connect->query($sql_loaisp);
        if ($list_loaisp) {
            while ($loaisp = $list_loaisp->fetch_array(MYSQLI_ASSOC)) {
                $selected = $loaisp['MaLoaiSP'] == $sp['MaLoaiSP']? "selected":"";
                echo "<option $selected value='{$loaisp['MaLoaiSP']}'>{$loaisp['TenLoaiSP']}</option>";
            }
        }
        ?>

    </select>

    <label for="tensanpham">Tên sản phẩm:</label>
    <input type="text" id="tensanpham" name="tensanpham" value="<?php echo $sp['TenSP']; ?>" />  

    <label for="dongia">Đơn giá:</label>
    <input type="number" id="dongia" name="dongia" value="<?php echo $sp['DonGia']; ?>" />

    <label for="mota">Mô tả:</label>
    <textarea id="noidung" name="noidung" value="<?php echo $sp['mota']; ?>" ></textarea>  

    <label for="hinhanh">Hình ảnh:</label>
    <input type="file" id="hinhanh" name="hinhanh" />
    <img src="../../images/sanpham/<?php echo $sp['HinhAnh']; ?>" alt="" class="previewImg">  

    <label for="soluongtonkho">Số lượng tồn kho:</label>
    <input type="text" id="soluongtonkho" name="soluongtonkho" value="<?php echo $sp['TonKho']; ?>" />

    <button type="submit">Sửa sản phẩm</button>
</form>
<script src="../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('noidung', {
        filebrowserUploadUrl: 'ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
    $('input[type=file]').change(function(e) {
        console.log(123);
        preview_img = document.querySelector('.previewImg');
        ShowPreviewImage(this, preview_img);
    });
</script>