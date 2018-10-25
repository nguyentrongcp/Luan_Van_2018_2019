<!-- Modal add sales offs-->
<div class="ui mini-50 vertical flip modal" id="create-foodies-sales-offs-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới khuyến mãi</div>
    <div class="content">
        <form action="{{ route('sales_offs_details.store') }}" class="ui form" method="post">

            {{ csrf_field() }}
            <input type="hidden" name="sales-offs-id" value="{{$id}}">
            <div class="field">
                <label for="sales-offs-name">Thực đơn khuyến mãi</label>
                <select name="foody-id[]" multiple="" class="ui fluid dropdown" id="multi-select">
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
<!--End modal-->
