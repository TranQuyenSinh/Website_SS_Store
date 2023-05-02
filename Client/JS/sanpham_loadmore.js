(function () {
  var start = 0;
  var limit = 10;
  var btnLoadMore = document.querySelector(".sanpham_loadmore");
  var loadMoreContainer = document.querySelector(".suggest_container");
  var dieukien = document.querySelector(".dieukiensql_loadmore");
  var sql;

  btnLoadMore.addEventListener("click", function () {
    if (dieukien != null) {
      sql = `select * from SanPham ${dieukien.value} LIMIT ${start} , ${limit}`;
    } else {
      sql = `select * from SanPham LIMIT ${start} , ${limit}`;
    }
    $.ajax({
      url: "loadmore.php",
      method: "POST",
      data: { sql: sql },
      dataType: "JSON",
      success: function (data) {
        if (data.length > 0) {
          for (var i = 0; i < data.length; i++) {
            // format số tiền đúng định dạng ###.###.### đ
            var formatedDonGia = formatMoney(data[i].DonGia);
            var html = `  <a href="index.php?do=sanpham&id=${data[i].MaSP}">
                            <div class="suggest_item">
                                <img src="../images/sanpham/${data[i].HinhAnh}" class="suggest_item_img" />
                                <p class="suggest_item_p">${data[i].TenSP}</p>
                                <div class="suggest_item_text">
                                    <p class="suggest_item_price">${formatedDonGia}</p>
                                    <p class="suggest_item_amount">đã bán ${data[i].SoLuongDaBan}</p>
                                </div>
                            </div> 
                        </a>
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
