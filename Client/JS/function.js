function formatMoney(money) {
    return parseInt(money).toLocaleString("vi-VN", {
      style: "currency",
      currency: "VND",
    });
  }