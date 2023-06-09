<?php
if (isset($_GET['text'])) {
    $search_text = strtolower(trim($_GET['text']));
    $dieukien = "where TenSP like '%$search_text%'";
} else if (isset($_GET['MaLoaiSP'])) {
    $maloaisp = $_GET['MaLoaiSP'];
    $tenloaisp = $_GET['TenLoaiSP'];
    $dieukien = "where MaLoaiSP = $maloaisp";
}
?>
<link rel="stylesheet" href="../CSS/timkiem.css">
<h2 style="margin-right: auto; margin-top:12px;">
    <?php
        if (isset($search_text)) 
            echo "Kết quả tìm kiếm: $search_text";
        else
            echo $tenloaisp;
    ?>
</h2>
<div class="search-box">
    <span>Bộ lọc:</span>
    <div class="filter-box">
        <select>
            <option value="SoLuongDaBan Desc">Bán chạy</option>
            <option value="DonGia">Giá: Thấp đến cao</option>
            <option value="DonGia Desc">Giá: Cao đến thấp</option>
        </select>
    </div>
</div>

<div class="suggest">
    <div class="suggest_container">

    </div>
    <button class="loadmore-button sanpham_loadmore">Xem thêm</button>
    <input type="hidden" class="dieukiensql_loadmore" value="<?php echo $dieukien; ?>">
</div>
<script src="../js/timkiem.js"></script>