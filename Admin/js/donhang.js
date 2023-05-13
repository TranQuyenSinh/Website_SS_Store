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
    if (dieukien == "") dieukien = 1;
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
                var background = "";
                switch (donhang.TrangThai) {
                    case "0":
                        trangthaidonhang = "Chờ xác nhận";
                        nextAction = "Đã xác nhận";
                        background = "#047df252";
                        break;
                    case "1":
                        trangthaidonhang = "Đang giao hàng";
                        nextAction = "Đã giao";
                        background = "#edf20478";
                        break;
                    case "2":
                        trangthaidonhang = "Đã giao";
                        background = "#42bf0654";
                        break;
                    case "3":
                        trangthaidonhang = "Đã hủy";
                        background = "#ce390052";
                        break;
                }
                var time = timeAgo(new Date(donhang.Time).getTime());
                html += `
                <div onclick="LoadChiTietDonHang(${donhang.MaDonHang})" class="donhang_item" style="background-color: ${background}">
                    <div class="donhang_info">
                        <input type="hidden" name="madonhang" value="${donhang.MaDonHang}">
                        <input type="hidden" name="trangthai" value="${donhang.TrangThai}">
                        <div class="khachhang_info tenkhachhang">${donhang.TenKhachHang} #${donhang.MaDonHang}</div>
                        <div class="khachhang_info">- Điện thoại: ${donhang.DienThoai}</div>
                        <div class="khachhang_info">- Địa chỉ: ${donhang.DiaChi}</div>
                        <div class="khachhang_info">- ${donhang.GhiChu}</div>
                        <div class="donhang_time">${time}</div>
                        <hr>
                        <div class="khachhang_info">${trangthaidonhang}</div>
                    </div>
                    <i class="fas fa-angle-right"></i>`;

                if (nextAction != "")
                    html += `
                    <!-- overlay -->
                    <div class="donhang_overlay">
                        <button onclick="updateProcess(event, ${donhang.MaDonHang})" class="primary-button trangthaiBtn"><i class="fas fa-check"></i>${nextAction}</button>
                        <button onclick="deleteProcess(event, ${donhang.MaDonHang})" class="secondary-button huydonBtn"><i class="fas fa-trash"></i>Hủy đơn</button>
                    </div>`;
                html += "</div>";
            });
            $(".donhang").html(html);
        },
        error: function (error) {
            console.log("ERROR: ", error);
        },
    });
}
// Show chi tiết đơn hàng
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
            $(".chitiet h4").text("Chi tiết đơn hàng #" + madonhang);
            var html = "";
            var tongtrigia = 0;
            response.forEach((chitiet) => {
                var formatedDonGia = parseInt(chitiet.DonGia).toLocaleString(
                    "vi-VN",
                    { style: "currency", currency: "VND" }
                );
                var formatedThanhTien = parseInt(
                    chitiet.ThanhTien
                ).toLocaleString("vi-VN", {
                    style: "currency",
                    currency: "VND",
                });
                tongtrigia += parseInt(chitiet.ThanhTien);
                html += `
                    <tr>
                        <input type="hidden" name="mactdh" value="${chitiet.MaCTDH}">
                        <td>${chitiet.TenSP}</td>
                        <td><img src="../../images/sanpham/${chitiet.HinhAnh}" alt=""></td>
                        <td>${formatedDonGia}</td>
                        <td>${chitiet.SoLuong}</td>
                        <td>${formatedThanhTien}</td>
                    </tr>
                `;
            });
            // thêm tổng trị giá cuối bảng
            tongtrigia = tongtrigia.toLocaleString("vi-VN", {
                style: "currency",
                currency: "VND",
            });
            html += `
            <tr>
                <td style="font-weight: bold;text-align: center;" colspan="5">Tổng trị giá: ${tongtrigia}</td>
            </tr>
            `;
            $(".chitiet_content").html(html);
        },
        error: function (error) {
            console.log("ERROR: ", error);
        },
    });
}
function GetDieuKienLoc() {
    var time = $(".filter-box select[name=time]").val();
    var trangthai = $(".filter-box select[name=trangthai]").val();

    var dieukien = "";
    switch (time) {
        case "1":
            dieukien += "day(Time) = day(Now())";
            break;
        case "2":
            dieukien += "month(Time) = month(Now())";
            break;
        default:
            dieukien += "1";
    }
    dieukien += " AND ";
    switch (trangthai) {
        case "1":
            dieukien += "TrangThai = 0";
            break;
        case "2":
            dieukien += "TrangThai = 1";
            break;
        case "3":
            dieukien += "TrangThai = 2";
            break;
        case "4":
            dieukien += "TrangThai = 3";
            break;
        default:
            dieukien += "1";
    }
    return dieukien;
}
function UpdateTrangThaiDonHang(madonhang, action) {
    var sql = "";
    if (action == "update") {
        sql =
            "UPDATE `donhang` SET `TrangThai`=`TrangThai`+1 WHERE `MaDonHang` = " +
            madonhang;
    } else if (action == "delete") {
        sql =
            "UPDATE `donhang` SET `TrangThai`= 3 WHERE `MaDonHang` = " +
            madonhang;
    }
    $.post(
        "update_delete_data.php",
        { sql: sql },
        function (data, textStatus, jqXHR) {
            var dieukien = GetDieuKienLoc();
            LoadDonHang(dieukien);
        }
    );
}
function updateProcess(event, madonhang) {
    event.stopPropagation();
    UpdateTrangThaiDonHang(madonhang, "update");
}
// hủy đơn hàng
function deleteProcess(event, madonhang) {
    event.stopPropagation();
    if (confirm(`Xác nhận muốn xóa đơn hàng #${madonhang}?`))
        UpdateTrangThaiDonHang(madonhang, "delete");
}

$(document).ready(function () {
    // tìm kiếm đơn hàng bằng mã đơn hàng
    $(".header_search_icons").click(function (e) {
        e.preventDefault();
        var madonhang_search = $(".header_search_bar").val();
        // nếu ko nhập gì thì điều kiện luôn đúng
        var dieukientim =
            madonhang_search == "" ? "1" : "MaDonHang = " + madonhang_search;

        LoadDonHang(dieukientim);
    });

    // lọc đơn hàng
    $(".locBtn").click(function (e) {
        e.preventDefault();
        var dieukien = GetDieuKienLoc();
        LoadDonHang(dieukien);
    });

    $(".locBtn").click();
});
