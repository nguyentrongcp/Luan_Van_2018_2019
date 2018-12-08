$(document).ready(function(){
    $('.tabs').tabs();
    $('.modal').modal();
    $('.slider').slider();
    $('.tooltipped').tooltip();
    $('.scrollspy').scrollSpy();
    // $('.dropdown').dropdown();

    $('.sidenav').sidenav({
        edge: 'right',
    });

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

function setLoader(text = 'Đang xử lý') {
    $('body').append("<div id='loader-container' style='background-color: #000;" +
        "position: fixed; opacity: 0.8; top: 0; left: 0; height: 100vh; width: 100vw; z-index: 1003'></div>");
    $('#loader-container').append('<div id="loader" class="ui segment" >\n' +
        '  <div class="ui active dimmer">\n' +
        '    <div class="ui text loader">' + text + '</div>\n' +
        '  </div>\n' +
        '  <p></p>\n' +
        '</div>');
}

function closeLoader() {
    $('#loader-container').remove();
}

function setDimmer(element1, element2 = null) {
    $('body').append("<div id='dimmer-container' style='background-color: #000;" +
        "position: fixed; opacity: 0.8; top: 0; left: 0; height: 100vh; width: 100vw; z-index: 999'></div>");
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

function getFoodyByType(type_id, sort_id, url) {
    $.ajax({
        type: 'get',
        url: url,
        data: {
            type_id: type_id,
            sort_id: sort_id
        },
        success: function (data) {
            window.location.href = data;
        }
    });
}

function updateCart() {
    $('.cart-update').off('click');
    $('.cart-update').on('click', function () {
        let element = this;
        let count = 1;
        let id = $(element).attr('data-id');
        if ($(element).attr('data-qty') === 'minus-' + id) {
            count = -1;
        }
        if ($(element).attr('data-qty') === 'add') {
            count = $('#add-cart-qty').val();
            if (count < 1) {
                count = 0;
            }
        }
        if (count === 0) {
            $('#add-cart-qty').val('1');
            M.toast({
                html: "<i class='material-icons red-text left'>error_outline</i>Số lượng không hợp lệ!",
                displayLength: 2000
            });
        }
        else {
            $.ajax({
                type: "post",
                url: "/customer/update_shopping_cart",
                data: {
                    foody_id: id,
                    count: count
                },
                success: function (data) {
                    console.log(data.status);
                    if (data.status !== 'error' && data.status !== 'full' && data.status !== 'max') {
                        $('#cart-qty').text(data.total_count);
                        $('#cart-total-cost').html(data.total_cost + '<sup>đ</sup>');
                        if (data.status === 'updated') {
                            $('#cart-qty-' + id).text(data.count);
                            $('#cart-cost-' + id).html(data.cost + '<sup>đ</sup>');
                            $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
                                "</span>)");
                            updatePayment(data.total_cost,data.count,data.cost,data.cost_simple);
                        }
                        else if (data.status === 'deleted') {
                            $('#' + id).remove();
                            $('#cart-added-home-' + id).text('');
                            if (data.total_count === 0) {
                                $('#cart-body').append("<div id=\"cart-empty\" class=\"row center-align\">\n" +
                                    "                Giỏ hàng trống\n" +
                                    "            </div>");
                                $('#cart-payment').addClass('disabled');
                            }
                            removePayment(data.total_cost,id,data.cost);
                        }
                        else {
                            if (data.role === 'new') {
                                $('#cart-body').empty();
                            }
                            $('#cart-body').append(data.cart_body);
                            $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
                                "</span>)");
                            $('#cart-payment').removeClass('disabled');
                            updateCart();
                        }
                    }
                    else if (data.status === 'full') {
                        M.Toast.dismissAll();
                        M.toast({
                            html: "Rất tiếc, nguyên liệu không đủ" +
                                "<i style='margin: 0 5px' class=\"far fa-frown\"></i>" +
                                "Số lượng tối đa bạn của thể đặt hiện tại là " + data.qty,
                            displayLength: 5000,
                        });
                    }
                    else if (data.status === 'max') {
                        M.Toast.dismissAll();
                        M.toast({
                            html: "<i class='material-icons left red-text'>error_outline</i> " +
                                "Số lượng tối đa bạn được mua là 100",
                            displayLength: 4000,
                        });
                    }
                }
            })
        }
    });
}

function updatePayment(total_cost, count, cost, cost_simple) {
    $('#payment-table-amount').text(count);
    $('#payment-table-cost').html(cost_simple + '<sup>đ</sup>');
    $('#payment-table-total').html(cost + '<sup>đ</sup>');
    $('#payment-table-total-cost').html(total_cost + '<sup>đ</sup>');
    $('#foody-cost').html(total_cost + '<sup>đ</sup>');
    $('#foody-cost').attr('data-cost',total_cost);
    if (typeof $('#transport-fee').attr('data-cost') !== 'undefined') {
        getFee();
    }
}

function removePayment(total_cost, id) {
    $('#payment-table-row-' + id).remove();
    $('#payment-table-total-cost').html(total_cost + '<sup>đ</sup>');
    $('#foody-cost').html(total_cost + '<sup>đ</sup>');
    $('#foody-cost').attr('data-cost',total_cost);
    if (typeof $('#transport-fee').attr('data-cost') !== 'undefined') {
        getFee();
    }
}


// upload image preview
