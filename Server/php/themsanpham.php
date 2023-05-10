<link rel="stylesheet" href="../css/themsanpham.css">
<i class="fas fa-arrow-left backpage_icon" onclick="loadPage('sanpham.php')"></i>
<h1>Thêm sản phẩm</h1>
<form action="xulythemsanpham.php" method="POST" enctype="multipart/form-data">

    <label for="maloaisanpham">Mã loại sản phẩm:</label>
    <select id="maloaisanpham" name="maloaisanpham">
        <option value="">Chọn mã loại sản phẩm</option>
        <?php
        include_once 'connect.php';
        $sql_loaisp = "SELECT * FROM `loaisanpham`";
        $list_loaisp = $connect->query($sql_loaisp);
        if ($list_loaisp) {
            while ($loaisp = $list_loaisp->fetch_array(MYSQLI_ASSOC)) {
                echo "<option value='{$loaisp['MaLoaiSP']}'>{$loaisp['TenLoaiSP']}</option>";
            }
        }
        ?>
    </select>

    <label for="tensanpham">Tên sản phẩm:</label>
    <input type="text" id="tensanpham" name="tensanpham" />

    <label for="dongia">Đơn giá:</label>
    <input type="number" id="dongia" name="dongia" />

    <label for="mota">Mô tả:</label>
    <textarea id="noidung" name="noidung"></textarea>
    <label for="hinhanh">Hình ảnh:</label>
    <input type="file" id="hinhanh" name="hinhanh" />
    <img src="" alt="" class="previewImg">

    <label for="soluongtonkho">Số lượng tồn kho:</label>
    <input type="text" id="soluongtonkho" name="soluongtonkho" />

    <button type="submit">Thêm sản phẩm</button>
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