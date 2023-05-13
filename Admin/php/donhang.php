<link rel="stylesheet" href="../css/donhang.css">
<script src="../js/donhang.js"></script>
<div class="header_container">
    <div class="search-box">
        <span>Bộ lọc:</span>
        <div class="filter-box">
            <select name="time">
                <option value="0">Thời gian</option>
                <option value="1">Hôm nay</option>
                <option value="2">Tháng này</option>
            </select>
            <select name="trangthai">
                <option value="0">Trạng thái</option>
                <option value="1" 
                <?php
                    if (isset($_GET['do']) && $_GET['do'] == 'donchuaduyet')
                        echo "selected";
                ?>>Chờ xác nhận</option>
                <option value="2" 
                <?php
                    if (isset($_GET['do']) && $_GET['do'] == 'dondanggiao')
                        echo "selected";
                ?>
                >Đang giao</option>
                <option value="3">Đã giao</option>
                <option value="4">Đã hủy</option>
            </select>

            <button class="submit-button locBtn">Lọc</button>
        </div>
    </div>
    <div class="header_search">
        <input type="number" placeholder="Mã đơn hàng..." class="header_search_bar" />
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
            </tr>
            <hr>
            <tbody class="chitiet_content">
                <!-- load chitiet here -->
            </tbody>
        </table>
    </div>
</div>