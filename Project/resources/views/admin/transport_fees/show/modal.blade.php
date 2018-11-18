<!-- Modal add districts-->
<div class="ui mini-40 vertical flip modal" id="add-transport-fees-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới Quận/Huyện</div>
    <div class="content">
        <form action="{{ route('transport_fees.store') }}" class="ui form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="district-id" value="{{$id}}">
            <div class="field">
                <label for="district-name">Tên phường/xã</label>
                <input type="text" id="ward_name" name="ward-name" value="Hưng Lợi{{rand(1,100)}}" required>
            </div>
            <div class="field">
                <label for="district-name">Phí </label>
                <input type="number" id="fee" name="fee" value="{{10000}}" required>
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>
<!--End modal-->

{{--<!-- Modal edit districts-->--}}
@foreach(\App\TransportFee::all() as $transportFee)
    <div class="ui mini vertical flip modal" id="{{ "update-transport-fees-modal-". $transportFee->id }}">
        <i class="close icon"></i>
        <div class="blue header">Sửa tên quận/huyện</div>
        <div class="content">
            <form action="{{ route('transport_fees.update', [$transportFee->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="district-id" value="{{$id}}">
                <div class="field">
                    <label for="sales-offs-name">Tên quận/huyện</label>
                    <input type="text" id="ward_name" name="ward-name" value="{{$transportFee->district}}" required>
                </div>
                <div class="field">
                    <label for="district-name">Phí </label>
                    <input type="number" id="fee" name="fee" value="{{$transportFee->cost}}" required>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
{{--<!--  End Modal -->--}}




