<link rel="stylesheet" href="../css/donhang.css">
<script src="../js/donhang.js"></script>
<div class="header_container">
    <div class="search-box">
        <span>Bộ lọc:</span>
        <div class="filter-box">
            <select name="time">
                <option value="0">Hôm nay</option>
                <option value="1">Tháng này</option>
                <option value="2">Tất cả</option>
            </select>
            <select name="trangthai">
                <option value="0">Chờ xác nhận</option>
                <option value="1">Đang giao</option>
                <option value="2">Đã giao</option>
                <option value="3">Đã hủy</option>
            </select>
            <button class="submit-button">Lọc</button>
        </div>
    </div>
    <div class="header_search">
        <input type="text" placeholder="Mã đơn hàng..." class="header_search_bar" />
        <div class="header_search_icons">
            <a href="#">
                <i class="fas fa-search"></i>
            </a>
        </div>
    </div>
</div>

<div class="donhang_container">
    <div class="donhang">
        <!-- load đơn hàng here -->
    </div>
    <div class="chitiet">
        <h4 style="margin: 12px 0 4px;font-size: 22px;"></h4>
        <hr>
        <table>
            <tr>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
            <hr>
            <tbody class="chitiet_content">
                <!-- load chitiet here -->
            </tbody>
        </table>
    </div>
</div>