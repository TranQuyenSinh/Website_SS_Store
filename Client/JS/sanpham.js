// Lấy phần tử HTML
const minusButton = document.querySelector(".add-to-cart_minus");
const plusButton = document.querySelector(".add-to-cart_plus");
const inputElement = document.querySelector(".add-to-cart_text");

// Gán sự kiện click cho nút -
minusButton.addEventListener("click", function () {
	// Thay đổi giá trị trong phần tử input
	if (parseInt(inputElement.value) > 1) {
		inputElement.value = parseInt(inputElement.value) - 1;
	}
});

// Gán sự kiện click cho nút +
plusButton.addEventListener("click", function () {
	// Thay đổi giá trị trong phần tử input
	inputElement.value = parseInt(inputElement.value) + 1;
});
