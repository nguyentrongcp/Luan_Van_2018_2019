<!-- Modal add sales offs-->
<div class="ui mini-50 vertical modal" id="create-foodies-sales-offs-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm món ăn cho khuyến mãi</div>
    <div class="scrolling content" style="min-height: 310px">
        <form action="{{ route('sales_offs_details.store') }}" class="ui form" id="sales-form" method="post">

            {{ csrf_field() }}
            <input type="hidden" name="sales-offs-id" value="{{$id}}">
            <div class="field">
                <label>Loại món ăn</label>
                <select class="ui selection dropdown" name="type" id="select-type">
                    @foreach(\App\FoodyType::all() as $foody_type)
                        <option value="{{ $foody_type->id }}">{{ $foody_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field" id>
                <label for="sales-offs-name">Tên món ăn</label>
                <select name="foody-id[]" multiple="" class="ui fluid search dropdown foody-name" id="select-foody">
                    <option value="">Tất cả</option>
                </select>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="field">
            <button form="sales-form" type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
        </div>
    </div>
</div>

@push('script')
    <script>
        getFoody($('#select-type').val());

        $('#select-type').change(function () {
            let id = $(this).val();
            getFoody(id);
        });

        function getFoody(id) {
            $.ajax({
                type: 'get',
                url: '{{ route('admin.sales.get.foody') }}',
                data: {
                    type_id: id,
                    sales_id: '{{ $id }}'
                },
                success: function (data) {
                    $('#select-foody').empty();
                    $.each(data, function (key, value) {
                        $('#select-foody').append(new Option(value.name, value.id));
                    });
                }
            })
        }
    </script>
@endpush
<!--End modal-->
