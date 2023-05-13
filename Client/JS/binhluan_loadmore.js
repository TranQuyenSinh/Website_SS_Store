(function () {
  var start = 0;
  var limit = 3;
  var btnLoadMore = document.querySelector(".binhluan_loadmore");
  var loadMoreContainer = document.querySelector(".comments-container");
  var maSP = btnLoadMore.getAttribute("MaSP");
  var sql;

  btnLoadMore.addEventListener("click", function () {
    sql = `select * from DanhGia dg, KhachHang kh where dg.MaKhachHang = kh.MaKhachHang and MaSP = ${maSP} order by time desc LIMIT ${start} , ${limit}`;
    $.ajax({
      url: "loadmore.php",
      method: "POST",
      data: { sql: sql },
      dataType: "JSON",
      success: function (data) {
        if (data.length > 0) {
          for (var i = 0; i < data.length; i++) {
            var avatar = data[i].Avatar;
            if (avatar == null) {
              avatar = "0.jpg";
            }
            var html = ` <div class='comment'>
                            <img src='../../images/avatar_khachhang/${avatar}' alt='Avatar' class='comment_avatar' />
                            <div class='comment_info'>
                                <p class='comment_name'>${data[i].TenHienThi}</p>
                                <div class='star-rating'>`;
            for (var x = 5; x >= 1; x--) {
              html += `
                                    <input type='radio' ${
                                      x == data[i].SoSao ? "checked" : ""} name='${data[i].MaDanhGia}' id='${data[i].MaDanhGia}-${x}' value='${x}' disabled/>
                                    <label class='disabled' for='${data[i].MaDanhGia}-${x}'></label>`;
            }
            html += `           </div>
                                <p class='comment_content'>${data[i].BinhLuan}.</p>
                            </div>
                        </div>
                        `;
            // chèn vào HTML
            loadMoreContainer.insertAdjacentHTML("beforeend", html);
            // tạo hiệu ứng xuất hiên từ từ
            const newItem = loadMoreContainer.lastElementChild;
            newItem.classList.add("transition");
            setTimeout(() => {
              newItem.classList.add("show");
            }, 1);
          }
          start += limit;
        } else {
          // nếu hết sản phẩm để load thì ẩn nút load more
          btnLoadMore.style.display = "none";
        }
      },
    });
  });
  btnLoadMore.click();
})();
