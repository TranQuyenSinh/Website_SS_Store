$(document).ready(function () {
    // click các card trong home
    $('.card_container a.donhang_card').click(function (e) { 
        e.preventDefault();
        let page = $(this).attr('page');
        switchTab($('.sidebar li:nth-child(2)'), page);

    });
});
