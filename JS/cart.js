const checkboxes = document.querySelectorAll(".item-checkbox");
const totalPriceElement = document.querySelector(".total");

let totalPrice = 0;

// Hàm tính tổng giá trị của các mặt hàng đã chọn
function calculateTotalPrice() {
	totalPrice = 0;

	checkboxes.forEach((checkbox) => {
		if (checkbox.checked) {
			const container = checkbox.closest("tr");

			const price = parseFloat(
				container.querySelector(".price").innerText.replace("$", "")
			);

			const quantity = parseInt(
				container.querySelector(".add-to-cart_text").value
			);

			totalPrice += price * quantity;
		}
	});

	totalPriceElement.innerText = `Tổng tiền: $${totalPrice.toFixed(2)}`;
}

// Gán sự kiện click vào các button tăng/giảm số lượng item
const plusButtons = document.querySelectorAll(".add-to-cart_plus");
plusButtons.forEach((button) => {
	button.addEventListener("click", () => {
		const quantityInput =
			button.parentElement.querySelector(".add-to-cart_text");

		quantityInput.value = parseInt(quantityInput.value) + 1;

		calculateTotalPrice();
	});
});

const minusButtons = document.querySelectorAll(".add-to-cart_minus");
minusButtons.forEach((button) => {
	button.addEventListener("click", () => {
		const quantityInput =
			button.parentElement.querySelector(".add-to-cart_text");

		quantityInput.value = Math.max(1, parseInt(quantityInput.value) - 1);

		calculateTotalPrice();
	});
});

// Gán sự kiện click vào tất cả các input checkbox item
checkboxes.forEach((checkbox) => {
	checkbox.addEventListener("click", calculateTotalPrice);
});
