<!-- Modal add sales offs-->
<div class="ui mini-50 vertical modal" id="create-foodies-sales-offs-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm ẩm thực khuyến mãi</div>
    <div class="scrolling content">
        <form action="{{ route('sales_offs_details.store') }}" class="ui form" method="post">

            {{ csrf_field() }}
            <input type="hidden" name="sales-offs-id" value="{{$id}}">
            <div class="field">
                <label for="sales-offs-name">Thực đơn khuyến mãi</label>
                <select name="foody-id[]" multiple="" class="ui fluid search dropdown foody-name" id="multi-select">
                    @foreach(\App\Foody::all() as $foody)
                        <option value="{{$foody->id}}">{{$foody->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $('#multi-select').change(function () {
            $('#create-foodies-sales-offs-modal').modal('refresh');
        })
    </script>
@endpush
<!--End modal-->
