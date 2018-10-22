$(document).ready(function(){
    $('.tabs').tabs();
    $('.modal').modal();
    $('.slider').slider();
    // $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();
    $('.materialboxed').materialbox();
    $('.scrollspy').scrollSpy();

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
    $('.carousel').carousel();
    $('#navbar-second').pushpin({
        top: 300 - $('#navbar-second').height(),
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
});

if(!!window.performance && window.performance.navigation.type === 2)
{
    console.log('Reloading');
    window.location.reload();
}

// $(window).on('pageshow', function () {
//     location.reload();
// });

// $(window).bind("pageshow", function(event) {
//     if (event.originalEvent.persisted) {
//         window.location.reload();
//     }
// });

// $('#dropdown-cart').on('click', function () {
//     $('#dropdown-cart').animate( { width: '452px'}, 500)
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getWidth() {
    $('body').append("<div id='test-width' style='width: 100vw'></div>");
    let width = $('#test-width').width();
    $('body').remove("#test-width");
    return width;
}

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




// upload image preview
