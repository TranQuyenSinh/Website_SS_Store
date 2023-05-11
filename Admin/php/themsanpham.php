<link rel="stylesheet" href="../css/themsanpham.css">
<i class="fas fa-arrow-left backpage_icon" onclick="loadPage('sanpham.php')"></i>
<h1>Thêm sản phẩm</h1>
<form class="formthemsanpham" action="#" method="" enctype="multipart/form-data">

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
    <input type="number" id="soluongtonkho" name="soluongtonkho" />

    <button type="submit">Thêm sản phẩm</button>
</form>
<script src="../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('noidung', {
        filebrowserUploadUrl: 'ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
    // preview image
    $('input[type=file]').change(function(e) {
        var preview_img = document.querySelector('.previewImg');
        ShowPreviewImage(this, preview_img);
    });
    // submit
    $('.formthemsanpham').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        var nd = CKEDITOR.instances.noidung.getData()
        console.log("content: ",nd);
        formData.set('noidung', nd)
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "xulythemsanpham.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.main_content').load("sanpham.php");
            },
            error: function(e) {
                console.log("ERROR : ", e);
            }
        });

    });
</script>