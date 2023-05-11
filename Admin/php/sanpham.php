<?php
    include_once 'connect.php';
?>
<link rel="stylesheet" href="../css/data_table.css">
<script src="../js/sanpham.js"></script>
<div class="container_add">
    <div class="header_search">
        <input type="text" placeholder="Search..." class="header_search_bar" />
        <div class="header_search_icons">
            <a href="#">
            <i class="fas fa-search"></i>
            </a>
        </div>
    </div>
    <a href="#">
        <div for="action-icon" class="action-icon add">
            <p>Thêm</p>
        </div>
    </a>
</div>
<table>
    <thead>
        <tr>
            <th>Loại sản phẩm</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng tồn kho</th>
            <th>Số lượng đã bán</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="listsanpham">
        <?php
            include_once 'load_listsp.php';
        ?>
    </tbody>
</table>

