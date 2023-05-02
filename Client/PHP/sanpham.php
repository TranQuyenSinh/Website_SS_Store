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
$_SESSION['currentPage'] = "index.php?do=sanpham&id=$id";
?>
<link rel="stylesheet" type="text/css" href="../css/sanpham.css" />
<input type="hidden" value="<?php echo $sp['MaSP']; ?>" class="product_id">
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
                <button class="add-to-cart_quantity">-</button>
                <input type="text" value="1" class="add-to-cart_text" />
                <button class="add-to-cart_quantity">+</button>
            </div>
            <button class="add-to-cart_buy primary-button">Mua ngay</button>
            <button class="add-to-cart_add secondary-button">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
<div class="description-container">
    <?php
    echo "<h2 class='description_title'>Đánh giá chi tiết {$sp['TenSP']}</h2>";
    echo $sp['mota'];
    ?>
</div>

<div class="comments">
    <?php
    if (isset($_SESSION['MaKhachHang'])) {
        echo "
            <div class='review-box'>
                <h3>Đánh giá của bạn</h3>
                <form action='xulybinhluan.php' method='POST'>
                    <div class='star-rating'>
                        <input type='radio' name='rating' id='star-5' value='5' checked />
                        <label for='star-5'></label>
                        <input type='radio' name='rating' id='star-4' value='4' />
                        <label for='star-4'></label>
                        <input type='radio' name='rating' id='star-3' value='3' />
                        <label for='star-3'></label>
                        <input type='radio' name='rating' id='star-2' value='2' />
                        <label for='star-2'></label>
                        <input type='radio' name='rating' id='star-1' value='1' />
                        <label for='star-1'></label>
                    </div>
                    <input type='text' value='{$sp['MaSP']}' name='MaSP' hidden>
                    <textarea name='BinhLuan' placeholder='Nhập đánh giá của bạn vào đây'></textarea>
                    <button type='submit' class=' submit-button'>Gửi đánh giá</button>
                </form>
            </div>
            ";
    } else {
        echo "<h3>Hãy đăng nhập để cho chúng tôi biết ý kiến của bạn.</h3><br>";
        echo "<a href='index.php?do=dangnhap'><button class=' submit-button'>Đăng nhập</button></a>";
    }
    ?>

    <div class="comments-container"></div>
    <button MaSP="<?php echo $sp["MaSP"];  ?>" class=" loadmore-button binhluan_loadmore">Xem thêm bình luận</button>
</div>
<div class="suggest">
    <div class="suggest_title">
        <p class="suggest_title_p">Sản phẩm liên quan</p>
    </div>
    <div class="suggest_container">

    </div>
    <button class=" loadmore-button sanpham_loadmore">
        Xem thêm
    </button>
    <input type="hidden" class="dieukiensql_loadmore" value="where MaLoaiSP = <?php echo $sp['MaLoaiSP']; ?>">

</div>
<script src="../js/sanpham.js"></script>
<script src="../JS/sanpham_loadmore.js"></script>
<script src="../JS/binhluan_loadmore.js"></script>