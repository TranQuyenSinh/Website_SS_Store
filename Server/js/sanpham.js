function xoaSP(idsp) {
    if (confirm("Bạn có chắc muốn xóa không?")) {
        $.post("xulyxoasanpham.php", { idsp: idsp }, function (resp) {
            // refresh lại table
            $(".listsanpham").load("load_listsp.php");
        }).fail(function (xhr, status, error) {
            console.log(error);
        });
    }
}
function suaSP(idsp) {
    $('.main_content').load("suasanpham.php", {idsp:idsp});
}

// xóa, sửa xog quay về page sản phẩm
function loadPage(page) {
    $('.main_content').load(page);
}
$(document).ready(function () {
    // tìm kiếm sp
    $(".header_search_icons").click(function (e) {
        e.preventDefault();
        var search_text = $("input.header_search_bar").val();
        let sql = `SELECT MaSP, TenSP, DonGia,TonKho, SoLuongDaBan, TenLoaiSP 
                    FROM sanpham sp, loaisanpham lsp 
                    WHERE sp.MaLoaiSP = lsp.MaLoaiSP and sp.TenSP like '%${search_text}%'`;

        $.ajax({
            url: "loaddata.php",
            method: "POST",
            data: { sql: sql },
            dataType: "JSON",
            success: function (data) {
                var html = "";
                for (var i = 0; i < data.length; i++) {
                    var formatedDonGia = parseInt(
                        data[i].DonGia
                    ).toLocaleString("vi-VN", {
                        style: "currency",
                        currency: "VND",
                    });
                    html =
                        html +
                        `  
                    <tr>
                        <td>${data[i].TenLoaiSP}</td>
                        <td>${data[i].MaSP}</td>
                        <td>${data[i].TenSP}</td>
                        <td>${formatedDonGia} đ</td>
                        <td>${data[i].TonKho}</td>
                        <td>${data[i].SoLuongDaBan}</td>
                        <td class='action-icons'>
                            <div class='action-icon-container'>
                                <a href='#'>
                                    <div for='action-icon' class='action-icon update'>
                                        <p>Sửa</p>
                                    </div>
                                </a>
                            </div>
                            <div class='action-icon-container'>
                                <a href='#'>
                                    <div for='action-icon' class='action-icon delete'>
                                        <p>Xóa</p>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                    `;
                    // chèn vào HTML
                }
                $(".listsanpham").html(html);
            },
        });
    });

    // thêm sp
    $(".action-icon.add").click(function (e) {
        e.preventDefault();
        $(".main_content").load("themsanpham.php");
    });
    
});
