<?php
    include_once "connect.php";
?>
<link rel="stylesheet" href="../css/home.css">  
<div class="card_container">
    <a href="#" class="card">
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