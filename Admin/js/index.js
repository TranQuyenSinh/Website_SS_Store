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

// chuyển tab
function switchTab(listitem, page) {
    $('.sidebar li').removeClass("selected");
    $(listitem).addClass("selected");
    $(".content_title").text($(listitem).find("p").text());
    
	$(".main_content").load(page)
}

$(document).ready(function () {
	// mở menu đăng xuất
    $(".user_info").click(function (e) {
        $(".user_info .option").toggleClass("show");
    });

    

    // load lần đầu
    switchTab($(".sidebar li").first(), 'home.php');
});
