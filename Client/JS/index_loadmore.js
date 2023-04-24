var start = 0;

var btnLoadMore = document.querySelector(".suggest_item_footer");
var loadMoreContainer = document.querySelector(".suggest_container");

btnLoadMore.addEventListener("click", function () {
  $.ajax({
    url: "index_loadmore.php",
    method: "POST",
    data: { start: start },
    dataType: "JSON",
    success: function (data) {
      if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
          // format số tiền đúng định dạng ###.###.### đ
          var formatedDonGia = parseInt(data[i].DonGia).toLocaleString(
            "vi-VN",
            { style: "currency", currency: "VND" }
          );
          var html = `  <a href="sanpham.php/?id=${data[i].MaSP}">
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
          loadMoreContainer.insertAdjacentHTML("beforeend", html);
          const newItem = loadMoreContainer.lastElementChild;
          newItem.classList.add("transition");
          setTimeout(() => {
            newItem.classList.add("show");
          }, 1);
        }
        start += 10;
      } else {
        btnLoadMore.style.display = "none";
      }
    },
  });
});
btnLoadMore.click();

const scrollableContainer = document.querySelector('.top_container');
scrollableContainer.addEventListener('wheel', (event) => {
  if (event.deltaY !== 0) {
    event.preventDefault();
    scrollableContainer.scrollLeft += event.deltaY;
  }
});
