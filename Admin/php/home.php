<?php
    include_once "connect.php";
?>
<link rel="stylesheet" href="../css/home.css">  
<script src="../js/home.js"></script>
<div class="card_container">
    <a href="#" class="card donhang_card" page="donhang.php?do=donchuaduyet">
        <i class="fas fa-file-invoice-dollar" style="color:#F3BB45;"></i>
        <div class="card_info">
            <span>Số đơn hàng chưa duyệt</span>
            <span>
                <?php
                    $sql_donhang_chuaduyet = "SELECT count(*) as 'SoLuongDonChuaDuyet' FROM `donhang` where TrangThai = 0";
                    echo $connect->query($sql_donhang_chuaduyet)->fetch_array(MYSQLI_ASSOC)['SoLuongDonChuaDuyet'];
                ?>
            </span>
        </div>
    </a>

    <a href="#" class="card donhang_card" page="donhang.php?do=dondanggiao">
        <i class="fas fa-motorcycle" style="color:#6681af;"></i>
        <div class="card_info">
            <span>Số đơn hàng đang giao</span>
            <span>
                <?php
                    $sql_donhang_danggiao = "SELECT count(*) as 'SoLuongDonDangGiao' FROM `donhang` where TrangThai = 1";
                    echo $connect->query($sql_donhang_danggiao)->fetch_array(MYSQLI_ASSOC)['SoLuongDonDangGiao'];
                ?>
            </span>
        </div>
    </a>

    <a href="#" class="card donhang_card" page="donhang.php">
        <i class="fas fa-copy" style="color:#9d6dba;"></i>
        <div class="card_info">
            <span>Tổng số đơn hàng tháng này</span>
            <span>
                <?php
                    $sql_donhang_count = "SELECT count(*) as 'SoLuongDon' FROM `donhang` where month(Time) = month(now())";
                    echo $connect->query($sql_donhang_count)->fetch_array(MYSQLI_ASSOC)['SoLuongDon'];
                ?>
            </span>
        </div>
    </a>

    <a href="#" class="card">
        <i class="fas fa-wallet" style="color:#7AC29A;"></i>
        <div class="card_info">
            <span>Doanh thu tháng này</span>
            <span>
                <?php
                    $sql_doanhthu_thang = "SELECT SUM(TongTien) as 'doanhthu' FROM donhang WHERE TrangThai = 2 and month(Time) = month(now())";
                    $doanhthu = $connect->query($sql_doanhthu_thang)->fetch_array(MYSQLI_ASSOC)['doanhthu'];
                    echo ($doanhthu != "" ? number_format($doanhthu):0) . " đ" ;
                ?>
            </span>
        </div>
    </a>
</div>