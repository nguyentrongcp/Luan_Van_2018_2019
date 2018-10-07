@push('script')
    <script>

        function like(like) {
            var id = like.id;
            var foody_id = $('#' + id).attr('data-target');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/customer/like",
                data: {
                    foody_id: foody_id
                },
                error: function () {
                    $('#login-modal').modal('open');
                },
                success: function (data) {
                    $('#i-' + id).toggleClass('active');
                    $('#a-' + id).text(data.text);
                    $('#liked-' + foody_id).text(data.number_of_liked)
                }
            })
        }

        function favorite(favorite) {
            var id = favorite.id;
            var foody_id = $('#' + id).attr('data-target');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/customer/favorite",
                data: {
                    foody_id: foody_id
                },
                error: function() {
                    $('#login-modal').modal('open');
                },
                success: function (data) {
                    $('#i-' + id).toggleClass('active');
                    $('#a-' + id).text(data);
                }
            })
        }

        function addCart(foody) {
            var foody_id = $('#' + foody.id).attr('data-target');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/customer/add_shopping_cart",
                data: {
                    foody_id: foody_id
                },
                success: function (data) {
                    if (data.status === 200) {
                        $('#cart-count').text(data.count);
                        $('#cart-added-home-' + foody_id).text(data.added_count);
                    }
                    else {
                        M.Toast.dismissAll();
                        M.toast({
                            html: 'Số lượng đã đạt tối đa!'
                        });
                    }
                }
            })
        }

    </script>
@endpush