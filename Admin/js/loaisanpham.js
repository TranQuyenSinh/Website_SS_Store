var action;
function showDelete(maloaisp) {
    action = "delete";
    if (confirm("Bạn có chắc muốn xóa không?")) {
        processData(maloaisp);
    }
}
function showModalUpdate(maloaisp) {
    action = "update";
    // show modal
    $(".modal").css("display", "block");
    // lấy data đưa lên form
    var sql = "select * from LoaiSanPham where MaLoaiSP = " + maloaisp;
    $.post(
        "loaddata.php",
        { sql: sql },
        function (data, textStatus, jqXHR) {
            $(".modal-content input[name=txtMaLoaiSP]").val(data[0].MaLoaiSP);
            $(".modal-content input[name=txtTenLoaiSP]").val(data[0].TenLoaiSP);
            $(".modal-content img").attr(
                "src",
                "../../images/loaisp/" + data[0].HinhAnh
            );
        },
        "JSON"
    );
}

// hàm gọi php xử lý loại sản phẩm
// action: add, update, delete
// update => lấy id từ input hidden của form
// delete => lấy id từ  inline html
function processData(maloaisp) {
    var form = document.querySelector(".modal form");
    var formdata = new FormData(form);
    formdata.append("action", action);
    if (maloaisp != null) formdata.append("maloaisp", maloaisp);
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "xulyloaisanpham.php",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (data) {
            $('.modal').hide();
            $(".listsanpham").load("load_listloaisp.php");
        },
        error: function (e) {
            console.log("ERROR : ", e);
        },
    });
}




// xóa, sửa xog quay về page sản phẩm
function loadPage(page) {
    $(".main_content").load(page);
}
$(document).ready(function () {

    // xử lý phần modal
    // show modal khi click thêm
    $(".action-icon.add").click(function (e) {
        console.log(1234);
        e.preventDefault();
        // show form
        $(".modal").css("display", "block");
        // reset form
        $(".modal-content input[name=txtMaLoaiSP]").val('');
        $(".modal-content input[name='txtTenLoaiSP']").val('');
        $(".modal-content input[type='file']").val('');
        $(".modal-content img").attr("src", "../images/no_product_image.jpg");
        action = "add";
    });

    // đóng modal
    $(".modal .close")
        .add(".modal")
        .click(function (e) {
            e.preventDefault();
            $(".modal").hide();
        });

    $(".modal-content").click(function (e) {
        // ngăn sự kiện click trong form
        // ảnh hưởng đến sự kiện click modal bên ngoài
        // làm tắt form
        e.stopPropagation();
    });

    $(".modal input[type=file]").change(function (e) {
        ShowPreviewImage(this, $(".previewImg"));
    });

    $(".modal form").submit(function (e) {
        e.preventDefault();
        processData();
    });
    
});
