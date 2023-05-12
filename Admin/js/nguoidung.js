$(document).ready(function () {
    function resetForm() {
        $(".modal form")[0].reset();
        $(".error_text").text("");
        modal.find("input[name=txtTenDangNhap]").prop('disabled', false);
    }
    function postProcess() {
        const form = document.querySelector(".modal form");
        var formData = new FormData(form);

        formData.append("action", action);
        if (action == "add") {
            formData.append("vaitro", vaitro);
        } else if (action == "update" || action == "delete") {
            formData.append("manguoidung", manguoidung);
        }

        $.ajax({
            type: "post",
            url: "xulynguoidung.php",
            data: formData,
            enctype: "multipart/form-data",
            processData: false,
            contentType: false,
            success: function (data) {
                $(".main_content").load("nguoidung.php");
            },
            error: function (error) {
                $(".error_text").text(error.responseText);
            },
        });
    }

    var vaitro;
    var action;
    var manguoidung;
    const modal = $(".modal_overlay");

    // thêm admin
    $(".card_add")
        .first()
        .click(function (e) {
            e.preventDefault();
            action = "add";
            vaitro = 1;
            modal.css("display", "flex");
            resetForm();
        });

    // thêm user
    $(".card_add")
        .last()
        .click(function (e) {
            e.preventDefault();
            action = "add";
            vaitro = 0;
            modal.css("display", "flex");
            resetForm();
        });

    // sửa user
    $(".nguoidung_card_overlay .suaBtn").click(function (e) {
        e.preventDefault();
        action = "update";
        manguoidung = $(this)
            .closest(".nguoidung_card")
            .find("input[name=manguoidung]")
            .val();

        modal.css("display", "flex");
        resetForm();
        let sql =
            "select TenHienThi, TenDangNhap, DaKhoa from nguoidung where manguoidung = " +
            manguoidung;
        $.post(
            "loaddata.php",
            { sql: sql },
            function (data, textStatus, jqXHR) {
                modal.find("input[name=txtTenHienThi]").val(data[0].TenHienThi);
                modal
                    .find("input[name=txtTenDangNhap]")
                    .val(data[0].TenDangNhap).prop('disabled', true);
                let khoa = false;
                if (data[0].DaKhoa == 1) {
                    khoa = true;
                }
                modal.find("input[name=chkKhoa]").prop("checked", khoa);
            },
            "JSON"
        );
    });

    // xóa user
    $(".nguoidung_card_overlay .xoaBtn").click(function (e) {
        e.preventDefault();
        if (confirm("Bạn có chắc muốn xóa người dùng này?")) {
            action = "delete";
            manguoidung = $(this)
                .closest(".nguoidung_card")
                .find("input[name=manguoidung]")
                .val();
            postProcess();
        }
    });

    // submit thêm, sửa user
    $(".modal form").submit(function (e) {
        e.preventDefault();
        postProcess();
    });

    $(".close")
        .add(".modal_overlay")
        .click(function (e) {
            e.preventDefault();
            modal.css("display", "none");
        });
    $(".modal").click(function (e) {
        e.stopPropagation();
    });
});
