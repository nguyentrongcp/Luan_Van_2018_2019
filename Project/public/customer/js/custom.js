$(document).ready(function(){
    $('.tabs').tabs();
    $('.modal').modal();
    $('.slider').slider();
    $('.tooltipped').tooltip();
    $('.scrollspy').scrollSpy();

    $('.sidenav').sidenav({
        edge: 'right',
    });
    // $('.dropdown-trigger').dropdown();

    $('.collapsible').collapsible();

    $('select').formSelect();
    // $('.cards.hoverable .image').dimmer({
    //     on: 'hover'
    // });
    $('.pushpin').pushpin();
    $('.carousel').carousel();
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
    $('#test-width').remove();
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

function setDimmer(element1, element2 = null) {
    $('body').append("<div id='dimmer-container' style='background-color: rgba(0,0,0,0.8);" +
        "position: fixed; top: 0; height: 100vh; width: 100vw; z-index: 999'></div>");
    $(element1).addClass('dimmer');

    if (element2 !== null) {
        $(element2).addClass('dimmer');
    }
}
function closeDimmer(element1, element2 = null) {
    $('#dimmer-container').remove();
    $(element1).removeClass('dimmer');

    if (element2 !== null) {
        $(element2).removeClass('dimmer');
    }
}


// upload image preview
