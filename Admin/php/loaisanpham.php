<?php
include_once 'connect.php';
?>
<link rel="stylesheet" href="../css/data_table.css">

<div class="container_add">
    <a href="#">
        <div for="action-icon" class="action-icon add">
            <p>Thêm</p>
        </div>
    </a>
</div>
<table>
    <thead>
        <tr>
            <th>Mã loại sản phẩm</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="listsanpham">
        <?php
        include_once 'load_listloaisp.php';
        ?>
    </tbody>
</table>

<div class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 style="margin-bottom: 12px;">Thêm sản phẩm</h2>
        <form>
            <input type="hidden" name="txtMaLoaiSP">
            <input type="text" id="tenloaisp" name="txtTenLoaiSP" placeholder="Tên loại sản phẩm"><br><br>
            <label for="hinhanh">Hình ảnh:</label>
            <input type="file" id="hinhanh" name="hinhanh">
            <img src="../images/no_product_image.jpg" alt="" class="previewImg">
            <button type="submit" class="submit-button">Lưu</button>
        </form>
    </div>
</div>
<script src="../js/loaisanpham.js"></script>