(function () {
  var start = 0;
  var limit = 10;
  const btnLoadMore = document.querySelector(".sanpham_loadmore");
  const loadMoreContainer = document.querySelector(".suggest_container");
  const dieukien = document.querySelector(".dieukiensql_loadmore");
  const orderSelect = document.querySelector(".filter-box select");
  var order = "order by " + orderSelect.value;
  var sql;

  orderSelect.addEventListener("change", function () {
    order = "order by " + orderSelect.value;
    // reset lại kết quả tìm kiếm
    start = 0;
    loadMoreContainer.innerHTML = "";
    btnLoadMore.style.display = "block";
    btnLoadMore.click();
  });

  btnLoadMore.addEventListener("click", function () {
    sql = `select * from SanPham ${dieukien.value} ${order} LIMIT ${start} , ${limit}`;
    $.ajax({
      url: "loadmore.php",
      method: "POST",
      data: { sql: sql },
      dataType: "JSON",
      success: function (data) {
        console.log(data);
        if (data.length > 0) {
          for (var i = 0; i < data.length; i++) {
            // format số tiền đúng định dạng ###.###.### đ
            var formatedDonGia = formatMoney(data[i].DonGia);
            var html = `  <a href="index.php?do=sanpham&id=${data[i].MaSP}">
                              <div class="suggest_item">
                                  <img src="../../images/sanpham/${data[i].HinhAnh}" class="suggest_item_img" />
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
        } else if (loadMoreContainer.querySelector('.suggest_item') != null) {
          // nếu hết sản phẩm để load thì ẩn nút load more
          btnLoadMore.style.display = "none";
        } else {
          btnLoadMore.style.display = "none";
          loadMoreContainer.innerHTML= "<h3 style='color:#d80000;'>Không tìm thấy sản phẩm nào phù hợp</h3>"
        }
      },
    });
  });
  btnLoadMore.click();
})();
