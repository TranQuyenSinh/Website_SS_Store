// format đơn giá VND
// 120000 => return 120.000
function formatMoney(money) {
	return parseInt(money).toLocaleString(
		"vi-VN",
		{ style: "currency", currency: "VND" }
	  );
}
