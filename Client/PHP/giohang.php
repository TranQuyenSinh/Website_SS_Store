<?php
$_SESSION['currentPage'] = "index.php?do=giohang";
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cart = $_SESSION['cart'];
?>
    <link rel="stylesheet" href="../CSS/cart.css" />
    <h1>Giỏ hàng của bạn</h1>
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th></th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th>Xóa sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tongtien = 0;
            foreach ($cart as $id => $sanpham) {
                $dongia = $sanpham['DonGia'];
                $soluong = $sanpham['SoLuong'];
                $thanhtien = $dongia * $soluong;
                $tongtien+=$thanhtien;
                echo "
                    <tr>
                    <td><img src='../images/sanpham/{$sanpham['HinhAnh']}' alt='{$sanpham['TenSP']}' class='productImage'></td>
                    <td>{$sanpham['TenSP']}</td>
                    <td>
                        <div class='add-to-cart_cal'>
                            <a href='xulygiohang.php?do=minus&id=$id&soluong=1'><button class='add-to-cart_quantity add-to-cart_minus'>-</button></a>
                            <input type='text' value='$soluong' class='add-to-cart_text' />
                            <a href='xulygiohang.php?do=plus&id=$id&soluong=1'><button class='add-to-cart_quantity add-to-cart_plus'>+</button></a>
                        </div>
                    </td>
                    <td class='price'>" . number_format($dongia) . " đ</td>
                    <td class='totalPrice'>" . number_format($thanhtien) . " đ</td>
                    <td class='deleteProduct'><a href='xulygiohang.php?do=delete&id=$id'>X</a></td>
                </tr>
            ";
            }
            ?>
        </tbody>
    </table>
    <div class="buy-container">
        <div class="total">
            <?php
                echo "Tổng tiền: ". number_format($tongtien). ' đ';
            ?>
        </div>
        <a href="index.php?do=thanhtoan"><button class="buy-button">Mua hàng</button></a>
    </div>
<?php
} else {
    echo "<h3>Không có sản phẩm nào trong giỏ hàng</h3>";
}
?>