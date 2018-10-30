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

    $(".number-only").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
    $('.phone-format').each(function () {
        $(this).text(phoneFormat($(this).text()));
    });

});

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
    $('body').append("<div id='dimmer-container' style='background-color: #000;" +
        "position: fixed; opacity: 0.8; top: 0; height: 100vh; width: 100vw; z-index: 999'></div>");
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

function phoneFormat(phone) {
    return phone.substring(0, phone.length - 6) + ' ' + phone.substr(phone.length - 6, 3) + ' ' +
        phone.substr(phone.length - 3, 3);
}

function getFoodyByType(id, url) {
    $.ajax({
        type: 'get',
        url: url,
        data: {
            type_id: id
        },
        success: function (data) {
            window.location.href = data;
        }
    });
}


// upload image preview
