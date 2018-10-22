@push('script')
    <script>
        $(document).ready(function(){
            $('#dro-cart-btn').dropdown({
                alignment: 'right',
                // constrainWidth: false,
                coverTrigger: false,
                closeOnClick: false,
                inDuration: 500,
                outDuration: 500,
                onOpenStart: function () {
                    $('#dro-cart-btn').addClass('teal');
                    $('#cart-quantity').addClass('white black-text');
                    // var calc = $(window).width() * 98 / 100 - 200 + 'px';
                    // $('#navbar-menu').addClass('hide');
                    // $('.nav-cart').animate({'margin-left': calc}, 100);
                },
                onCloseEnd: function () {
                    $('#dro-cart-btn').removeClass('teal');
                    $('#cart-quantity').removeClass('white black-text');
                    // var calc = $(window).width() * 49 / 100 - 155 + 'px';
                    // $('.nav-cart').animate({'margin-left': calc}, 100);
                    // $('#navbar-menu').removeClass('hide');
                }
            });
        });
    </script>
@endpush