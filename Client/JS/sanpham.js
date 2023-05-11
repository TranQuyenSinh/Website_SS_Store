const minusButton = document.querySelectorAll(".add-to-cart_quantity")[0];
const plusButton = document.querySelectorAll(".add-to-cart_quantity")[1];
const soluongInput = document.querySelector(".add-to-cart_text");
const addToCartBtn = document.querySelector(".add-to-cart_add");
const buyBtn = document.querySelector(".add-to-cart_buy");
const maSP = document.querySelector(".product_id").value;


// Gán sự kiện click cho nút -
minusButton.addEventListener("click", function () {
  // số lượng mua tối thiểu phải là 1
  if (parseInt(soluongInput.value) > 1) {
    soluongInput.value = parseInt(soluongInput.value) - 1;
  }
});

// Gán sự kiện click cho nút +
plusButton.addEventListener("click", function () {
  // số lượng mua tối đa là 10 sản phẩm
  if (parseInt(soluongInput.value) < 10)
    soluongInput.value = parseInt(soluongInput.value) + 1;
});

addToCartBtn.addEventListener("click", function () {
	window.location.href = 'xulygiohang.php?do=add&id='+maSP+'&soluong='+soluongInput.value;
});
