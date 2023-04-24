<div class="content">
    <div class="banner-container">
        <div class="banner-slides">
            <?php
            $dir = '../images/banner';
            $first = True;
            $banner_count = 0;
            // Lấy danh sách tất cả các tập tin và thư mục trong thư mục
            $fileList = scandir($dir);

            foreach ($fileList as $file) {
                // nếu không phải file(folder) thì bỏ qua
                if (!is_file($dir . '/' . $file))
                    continue;
                if ($first == True) {
                    echo "
                                    <img
                                        src='../images/banner/$file'
                                        class='slide active'
                                    />
                                ";
                    $first = False;
                } else {
                    echo "
                                    <img
                                        src='../images/banner/$file'
                                        class='slide'
                                    />
                                ";
                }
                $banner_count++;
            }
            ?>
        </div>
        <div class="dots">
            <?php
            for ($i = 0; $i < $banner_count; $i++) {
                if ($i == 0)
                    echo "<span class='dot active'></span>";
                else
                    echo "<span class='dot'></span>";
            }
            ?>
        </div>
    </div>
    <div class="category">
        <div class="category_title">
            <p>Danh mục</p>
        </div>
        <div class="category_container">
            <?php
            $sql = "select * from loaisanpham";
            $list_loaisp = $connect->query($sql);
            while ($row = $list_loaisp->fetch_array(MYSQLI_ASSOC)) {
                echo "
                                    <div class='category_item'>
                                    <img
                                        src='../images/loaisp/{$row['HinhAnh']}'
                                        class='category_img'
                                    />
                                    <p class='category_p'>" . $row['TenLoaiSP'] . "</p>
                                </div>
                                ";
            }
            ?>

        </div>
    </div>
    <div class="top">
        <div class="top_title">
            <p>Best seller</p>
        </div>
        <div class="top_container">
            <?php
            $limit = 20;
            $sql = "select * from SanPham order by SoLuongDaBan Desc LIMIT $limit";
            $list = $connect->query($sql);
            while ($row = $list->fetch_array(MYSQLI_ASSOC)) {
                echo "
                                <a href='#'>
                                    <div class='top_item'>
                                        <div class='top_item_img'>
                                            <img
                                            src='../images/sanpham/{$row['HinhAnh']}'
                                            />
                                        </div>
                                        <p class='top_item_p'>{$row['TenSP']}</p>
                                        <div class='top_item_text'>
                                            <p class='top_item_price'>" . number_format($row['DonGia']) . " đ" . "</p>
                                            <p class='top_item_amount'>Đã bán {$row['SoLuongDaBan']}</p>
                                        </div>
                                    </div>
                                </a>
                                ";
            }
            ?>
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
</div>
<script src="../js/index.js"></script>
<script src="../JS/index_loadmore.js"></script>