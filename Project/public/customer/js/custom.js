$(document).ready(function(){
    $('.tabs').tabs();
    $('.modal').modal();
    $('.slider').slider();
    // $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();

    $('.sidenav').sidenav({
        edge: 'right',
    });
    $('.dropdown-trigger').dropdown();

    $('.collapsible').collapsible();

    $('select').formSelect();
    $('.cards.hoverable .image').dimmer({
        on: 'hover'
    });
    $('.pushpin').pushpin();
    $('#navbar-second').pushpin({
        top: 236,
    });
    $('#foody-navbar').pushpin({
        top: 236,
        onPositionChange: function (status) {
            if (status === 'pinned') {
                $('#show-foody').addClass('special');
            }
            else {
                $('#show-foody').removeClass('special');
            }
        }
    });
    $(window).bind("pageshow", function(event) {
        if (event.originalEvent.persisted) {
            window.location.reload();
        }
    });
});

// $('#dropdown-cart').on('click', function () {
//     $('#dropdown-cart').animate( { width: '452px'}, 500)
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function setTimer(time) {
    var timer = setInterval(function () {
        if (time === -1) {
            $('#otp-timer').text('');
            clearInterval(timer);
            $('#otp-text').html("Bạn chưa nhận được mã? <a href=\"#\">Thử lại</a>");
        }
        else {
            $('#otp-timer').text(time + 's');
            time--;
        }
    }, 1000);
}
