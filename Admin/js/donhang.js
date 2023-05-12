function timeAgo(timestamp) {
    const currentTime = Math.floor(Date.now() / 1000);

    const timeDiff = currentTime - new Date(timestamp).getTime() / 1000;

    const timeDiffInSeconds = parseInt(timeDiff);

    let timeAgoStr;
    if (timeDiffInSeconds < 60) {
        timeAgoStr = "1 minute ago";
    } else if (timeDiffInSeconds < 3600) {
        const minutesAgo = Math.round(timeDiffInSeconds / 60);
        timeAgoStr = `${minutesAgo} minutes ago`;
    } else if (timeDiffInSeconds < 86400) {
        const hoursAgo = Math.round(timeDiffInSeconds / 3600);
        timeAgoStr = `${hoursAgo} hours ago`;
    } else {
        const daysAgo = Math.round(timeDiffInSeconds / 86400);
        timeAgoStr = `${daysAgo} days ago`;
    }

    return timeAgoStr;
}
function LoadDonHang(dieukien = 1, order = "ORDER BY TrangThai") {
    var sql = "SELECT * FROM `donhang` WHERE " + dieukien + " " + order;
    $.ajax({
        type: "post",
        url: "loaddata.php",
        data: { sql: sql },
        dataType: "JSON",
        success: function (response) {
            html = `
                <h4 style="margin: 12px 0 4px;font-size: 22px;">Đơn hàng</h4>
                <hr>
            `;
            response.forEach((donhang) => {
                var trangthaidonhang = "";
                var nextAction = "";
                switch (donhang.TrangThai) {
                    case '0':
                        trangthaidonhang = "Chờ xác nhận";
                        nextAction = "Đã xác nhận";
                        break;
                    case '1':
                        trangthaidonhang = "Đang giao hàng";
                        nextAction = "Đã giao";
                        break;
                    case '2':
                        trangthaidonhang = "Đã giao";
                        break;
                    case '3':
                        trangthaidonhang = "Đã hủy";
                        break;
                }
                var time = timeAgo(new Date(donhang.Time).getTime());
                html += `
                <div class="donhang_item">
                    <div class="donhang_info">
                        <input type="hidden" name="madonhang" value="${donhang.MaDonHang}">
                        <div class="khachhang_info tenkhachhang">${donhang.TenKhachHang} #${donhang.MaDonHang}</div>
                        <div class="khachhang_info">- Điện thoại: ${donhang.DienThoai}</div>
                        <div class="khachhang_info">- Địa chỉ: ${donhang.DiaChi}</div>
                        <div class="khachhang_info">- ${donhang.GhiChu}</div>
                        <div class="donhang_time">${time}</div>
                        <hr>
                        <div class="khachhang_info">${trangthaidonhang}</div>
                    </div>
                    <i class="fas fa-angle-right"></i>`;
        
                if (nextAction != '')
                    html+= `
                    <!-- overlay -->
                    <div class="donhang_overlay">
                        <button class="primary-button trangthaiBtn"><i class="fas fa-check"></i>${nextAction}</button>
                        <button class="secondary-button huydonBtn"><i class="fas fa-trash"></i>Hủy đơn</button>
                    </div>`;
                html+='</div>';
            });
            $(".donhang").html(html);
        },
        error: function (error) {
            console.log("ERROR: ", error);
        },
    });
}
function LoadChiTietDonHang(madonhang) {
    var sql = `SELECT ct.MaCTDH, sp.TenSP, sp.HinhAnh, ct.DonGia, ct.SoLuong, ct.ThanhTien 
    FROM donhang dh, chitietdonhang ct, sanpham sp
    WHERE dh.MaDonHang = ${madonhang} AND dh.MaDonHang = ct.MaDonHang AND ct.MaSP = sp.MaSP`;
    $.ajax({
        type: "post",
        url: "loaddata.php",
        data: { sql: sql },
        dataType: "JSON",
        success: function (response) {
            $('.chitiet h4').text('Chi tiết đơn hàng #'+madonhang);
            var html = '';
            response.forEach((chitiet) => {
                var formatedDonGia = parseInt(chitiet.DonGia).toLocaleString("vi-VN", {style: "currency",currency: "VND"});
                var formatedThanhTien = parseInt(chitiet.ThanhTien).toLocaleString("vi-VN", {style: "currency",currency: "VND"});
                html+=`
                    <tr>
                        <input type="hidden" name="mactdh" value="${chitiet.MaCTDH}">
                        <td>${chitiet.TenSP}</td>
                        <td><img src="../../images/sanpham/${chitiet.HinhAnh}" alt=""></td>
                        <td>${formatedDonGia}</td>
                        <td>${chitiet.SoLuong}</td>
                        <td>${formatedThanhTien}</td>
                        <td>
                            <button style="background:rgb(230, 78, 78);" class="submit-button">Xóa</button>
                        </td>
                    </tr>
                `;
            });
            $(".chitiet_content").html(html);
        },
        error: function (error) {
            console.log("ERROR: ", error);
        },
    });
}

$(document).ready(function () {
    LoadDonHang();
    
    $(document).on('click', '.donhang_item', function(e) {
        e.preventDefault();
        var madonhang = $(this).find('input[name=madonhang]').val();
        LoadChiTietDonHang(madonhang);
    });
    
});
