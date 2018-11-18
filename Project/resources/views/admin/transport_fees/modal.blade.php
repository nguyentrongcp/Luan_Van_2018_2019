<!-- Modal add districts-->
<div class="ui mini vertical flip modal" id="add-district-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới Quận/Huyện</div>
    <div class="content">
        <form action="{{ route('district.store') }}" class="ui form" method="post">
            {{ csrf_field() }}
            <div class="field">
                <label for="district-name">Tên quận/huyện</label>
                <input type="text" id="district_name" name="district-name" value="Ninh Kiều{{rand(1,100)}}" required>
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>
<!--End modal-->

{{--<!-- Modal edit districts-->--}}
@foreach(\App\District::all() as $district)
    <div class="ui mini vertical flip modal" id="{{ "update-district-modal-". $district->id }}">
        <i class="close icon"></i>
        <div class="blue header">Sửa tên quận/huyện</div>
        <div class="content">
            <form action="{{ route('district.update', [$district->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="field">
                    <label for="sales-offs-name">Tên quận/huyện</label>
                    <input type="text" id="district_name" name="district-name" value="{{$district->district}}" required>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
{{--<!--  End Modal -->--}}




