$(document).ready(function () {
  // format đơn giá VND
  // 120000 => return 120.000
  

  const searchBtn = document.querySelector(".header_search_icons");
  const searchTxt = document.querySelector(".header_search_bar");
  searchBtn.addEventListener("click", function () {
    window.location.href = "index.php?do=timkiem&text=" + searchTxt.value;
  });
});
