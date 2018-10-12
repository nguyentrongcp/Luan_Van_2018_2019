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
            $.ajax({
                type: "post",
                url: "/customer/add_shopping_cart",
                data: {
                    foody_id: foody_id
                },
                success: function (data) {
                    if (data.status === 200) {
                        $('#cart-count').text(data.count);
                        $('#cart-added-home-' + foody_id).html(data.added_text);
                    }
                    else {
                        M.Toast.dismissAll();
                        M.toast({
                            html: "<i class='material-icons red-text left'>error_outline</i><span>" +
                                "Số lượng đã đạt tối đa!</span>",
                            classes: 'message'
                        });
                    }
                }
            })
        }
        
        function showFoodyByType(foody_type) {
            var foody_sort_id = $('.foody-sort.active').id;
            $.ajax({
                type: "post",
                url: "/customer/show_foody",
                data: {
                    foody_type_id: foody_type.id,
                    foody_sort_id: foody_sort_id,
                    type: 'type'
                },
                success: function (data) {
                    $('#show-foody').empty();
                    $('#show-foody').html(data);
                    $('.foody-type').removeClass('active');
                    $(foody_type).addClass('active');
                }
            })
        }
        
        function showFoodyBySort(foody_sort) {
            var foody_type_id = $('.foody-type.active')[0].id;
            $.ajax({
                type: "post",
                url: "/customer/show_foody",
                data: {
                    foody_sort_id: foody_sort.id,
                    foody_type_id: foody_type_id,
                    type: 'sort'
                },
                success: function (data) {
                    console.log(data);
                    $('#show-foody').empty();
                    $('#show-foody').html(data);
                    $('.foody-sort').removeClass('active');
                    $(foody_sort).addClass('active');
                }
            })
        }

    </script>
@endpush