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
    <?php
    echo $sp['mota'];
    ?>
</div>

<div class="comments">
    <div class="review-box">
        <h3>Đánh giá của bạn</h3>
        <form action="">
            <div class="star-rating">
                <input type="radio" name="rating" id="star-1" value="1" />
                <label class="start" for="star-1"></label>
                <input type="radio" name="rating" id="star-2" value="2" />
                <label class="start" for="star-2"></label>
                <input type="radio" name="rating" id="star-3" value="3" />
                <label class="start" for="star-3"></label>
                <input type="radio" name="rating" id="star-4" value="4" />
                <label class="start" for="star-4"></label>
                <input type="radio" name="rating" id="star-5" value="5" />
                <label class="start" for="star-5"></label>
            </div>
            <textarea placeholder="Nhập đánh giá của bạn vào đây"></textarea>
            <button type="submit">Gửi đánh giá</button>
        </form>
    </div>

    <div class="comment">
        <div class="comment_info">
            <img src="https://cf.shopee.vn/file/sg-11134004-23030-r2qczd17ggov16_tn" alt="Avatar" class="comment_avatar" />
            <p class="comment_name">Nguyễn Văn A :</p>
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
            <p class="suggest_title_p">Gợi ý hôm nay</p>
        </div>
        <div class="suggest_container">

        </div>
        <div class="suggest_item_footer">
            <p>Xem thêm</p>
        </div>
    </div>
<script src="../js/sanpham.js"></script>
<script src="../JS/index_loadmore.js"></script>