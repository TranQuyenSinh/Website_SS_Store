<?php
include_once 'connect.php';
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "select * from sanpham where MaSP = $id";

    $result = $connect->query($sql);

    if ($result) {
        $sp = $result->fetch_array(MYSQLI_ASSOC);
    } else {
        die("<h3>Sản phẩm không tồn tại1</h3>");
        exit();
    }
} else {
    die("<h3>Sản phẩm không tồn tại2</h3>");
    exit();
}
?>
<link rel="stylesheet" type="text/css" href="../css/sanpham.css" />
<div class="product">
    <div class="product_left">
        <?php
        echo "<img src='../images/sanpham/{$sp['HinhAnh']}' class='product_left_img' alt='error' />";
        ?>
    </div>
    <div class="product_right">
        <h1 class="product_right_title">
            <?php
                echo $sp["TenSP"];
            ?>
        </h1>
        <div class="product_right_stats">
            <p class="product_right_rating">
                <?php
                    echo "Đánh giá: 150";
                ?>
            </p>
            <p class="product_right_sold">
                <?php
                    echo "Đã bán: {$sp['SoLuongDaBan']}";
                ?>
            </p>
        </div>
        <div class="product_right_price">
            <p>
                <?php
                    echo number_format($sp['DonGia']) . "đ";
                ?>
            </p>
        </div>
        <label>Số lượng:</label>
        <div class="product_right_add-to-cart">
            <div class="add-to-cart_cal">
                <button class="add-to-cart_minus change-quantity-button">-</button>
                <input type="text" value="1" class="add-to-cart_text" />
                <button class="add-to-cart_plus change-quantity-button">+</button>
            </div>

            <button class="add-to-cart_buy primary-button">Mua ngay</button>
            <button class="add-to-cart_add secondary-button">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
<div class="description-container">
    <label>Mô tả sản phẩm:</label>
    <p class="description">
        <?php
            echo $sp['mota'];
        ?>
</div>

<div class="comments">
    <label for="comment">Nhận xét của bạn:</label>
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea>

    <input type="submit" value="Gửi" />
    <div class="comment">
        <div class="comment_info">
            <img src="https://cf.shopee.vn/file/sg-11134004-23030-r2qczd17ggov16_tn" alt="Avatar" class="comment_avatar" />
            <p class="comment_name">Nguyễn Văn A:</p>
        </div>

        <p class="comment_content">Sản phẩm rất tốt, tôi rất hài lòng.</p>
    </div>
    <div class="comment">
        <div class="comment_info">
            <img src="https://cf.shopee.vn/file/sg-11134004-23030-4je6x99s3govb6_tn" alt="Avatar" class="comment_avatar" />
            <p class="comment_name">Trần Thị B :</p>
        </div>

        <p class="comment_content">
            Tôi chưa sử dụng sản phẩm này nhưng nghe đồn nó rất tuyệt vời.Tôi
            chưa sử dụng sản phẩm này nhưng nghe đồn nó rất tuyệt vời.Tôi chưa
            sử dụng sản phẩm này nhưng nghe đồn nó rất tuyệt vời.Tôi chưa sử
            dụng sản phẩm này nhưng nghe đồn nó rất tuyệt vời.
        </p>
    </div>
</div>
<div class="suggest">
    <div class="suggest_title">
        <p class="suggest_title_p">Sản phẩm tương tự</p>
    </div>
    <div class="suggest_container">
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
        <div class="suggest_item">
            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-22100-ummk8gf6yeivd0" class="suggest_item_img" />
            <p class="suggest_item_p">
                Set 3 Túi Dung My Phâm Trong Suôt, Túi Du Lich Trong Suôt.
            </p>
            <div class="suggest_item_text">
                <p class="suggest_item_price">100.000đ</p>
                <p class="suggest_item_amount">đã bán 25</p>
            </div>
        </div>
    </div>
    <div class="suggest_item_footer">
        <p>Xem thêm</p>
    </div>
</div>