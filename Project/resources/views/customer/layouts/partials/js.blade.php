@push('script')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('#dropdown-profile').dropdown({
                coverTrigger: false,
                alignment: 'right',
                constrainWidth: false
            });

            $('#dropdown-cart').dropdown({
                coverTrigger: false,
                alignment: 'right',
                constrainWidth: false,
                closeOnClick: false,
            });

            $('#dropdown-category').dropdown({
                coverTrigger: false
            });

        });

        function updateCart(type, id) {
            var count = '1';
            if (type.id === 'cart-minus-' + id) {
                count = '-1';
            }
            if (type.id === 'cart-plus-' + id) {
                count = type.text();
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/customer/update_shopping_cart",
                data: {
                    foody_id: id,
                    count: count
                },
                success: function (data) {
                    $('#cart-count').text(data.total_count);
                    $('#cart-total-cost').html(data.total_cost + '<sup>đ</sup>')
                    if (data.status === 'updated') {
                        $('#cart-count-' + id).text(data.count);
                        $('#cart-cost-' + id).html(data.cost + '<sup>đ</sup>');
                        $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
                        "</span>)");
                    }
                    else if (data.status === 'deleted') {
                        $('#' + id).remove();
                        $('#cart-added-home-' + id).text('');
                    }
                    else {

                    }
                }
            })
        }
    </script>
@endpush