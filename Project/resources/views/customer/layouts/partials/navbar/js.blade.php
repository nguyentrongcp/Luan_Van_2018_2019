@push('script')
    <script>
        $(document).ready(function(){
            $('#dropdown-cart').dropdown({
                coverTrigger: false,
                alignment: 'right',
                constrainWidth: false,
                closeOnClick: false,
                inDuration: 500,
                outDuration: 500,
                onOpenStart: function () {
                    $('#dropdown-cart').addClass('teal');
                    $('#cart-quantity').addClass('white black-text');
                },
                onCloseEnd: function () {
                    $('#dropdown-cart').removeClass('teal');
                    $('#cart-quantity').removeClass('white black-text');
                }
            });

            $('.nav-search').on('click', function () {
                $('#navbar-search').removeClass('hide');
                console.log(getWidth());
                if (getWidth() <= 600) {
                    $('.m-nav-col').addClass('hide');
                    $('#search').focus();
                    $('#navbar-search').css({
                        'width': '100vw',
                        'left': '-10px'
                    });
                }
                else {
                    $('#search').focus();
                }
            });
            $('#search').focusout(function () {
                $('#navbar-search').addClass('hide');
            });
        });
    </script>
@endpush