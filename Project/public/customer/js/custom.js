$(document).ready(function(){
    $('.tabs').tabs();
    $('.slider').slider();
    // $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();

    $('.sidenav').sidenav({
        edge: 'right',
    });

    $('.collapsible').collapsible();

    $('select').formSelect();

});

function setTimer(time) {
    var timer = setInterval(function () {
        if (time === -1) {
            $('#otp-timer').text('');
            clearInterval(timer);
            $('#otp-text').html("Bạn chưa nhận được mã? <a href=\"#\">Thử lại</a>");
        }
        else {
            $('#otp-timer').text(time);
            time--;
        }
    }, 1000);
}
