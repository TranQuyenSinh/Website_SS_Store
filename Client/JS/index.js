function ShowPreviewImage(file_input, img_output) {
  // Lấy file được chọn
  const selectedFile = file_input.files[0];
  //Tạo một đối tượng FileReader
  const reader = new FileReader();
  reader.onload = function(event) {
      // Cập nhật thuộc tính src của phần tử avatar
      //img_output.src = event.target.result;
      $(img_output).attr('src', event.target.result);
  };
  // Đọc nội dung của file được chọn
  reader.readAsDataURL(selectedFile);
}
$(document).ready(function () {
  // format đơn giá VND
  // 120000 => return 120.000
  

  const searchBtn = document.querySelector(".header_search_icons");
  const searchTxt = document.querySelector(".header_search_bar");
  searchBtn.addEventListener("click", function () {
    window.location.href = "index.php?do=timkiem&text=" + searchTxt.value;
  });
});
