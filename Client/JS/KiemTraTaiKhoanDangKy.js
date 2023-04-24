$(document).ready(function () {
  function checkExistUsername(username) {
    return $.ajax({
      url: "KiemTraUsername.php",
      method: "POST",
      data: { username: username },
      dataType: "JSON",
      success: function (data) {
        // trùng username
        if (data[0] != null) {
          return true;
        } else {
          return false;
        }
      },
    });
  }
  function checkForm() {
    if (
      fullname.val() == "" ||
      username.val() == "" ||
      password.val() == "" ||
      repassword.val() == ""
    ) {
      alert("Không được bỏ trống các trường");
      return false;
    }
    if ($('#username').hasClass('invalid')) {
      alert("Trùng tên đăng nhập");
      return false;
    }
    if (username.val().length <= 6) {
      alert("Tên đăng nhập phải trên 6 ký tự");
      return false;
    }
    if (password.val() != repassword.val()) {
      alert("Mật khẩu nhập lại không khớp");
      return false;
    }
    return true;
  }
  const fullname = $("#fullname");
  const username = $("#username");
  const btnSubmit = $("input[name='btnSubmit']");
  const password = $("input[name='password']");
  const repassword = $("input[name='repassword']");

  // kiểm tra username
  username.on("change", function () {
    checkExistUsername(username.val().trim()).then((exist) => {
      if (exist[0] != null) {
        username
          .siblings(".error_msg")
          .first()
          .text("Tên đăng nhập đã tồn tại");
        username.addClass("invalid");
      } else {
        username.removeClass("invalid");
      }
    });
  });
  btnSubmit.click(function (e) {
    if (!checkForm()) {
      e.preventDefault();
    }
  });
  repassword.change(function (e) {
    if (repassword.val() != password.val()) {
      repassword
        .siblings(".error_msg")
        .first()
        .text("Mật khẩu nhập lại không khớp");
      repassword.addClass("invalid");
    } else {
      repassword.removeClass("invalid");
    }
  });
});
