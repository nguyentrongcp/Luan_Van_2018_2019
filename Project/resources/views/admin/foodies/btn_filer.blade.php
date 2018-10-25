<div class="ui floating green labeled icon dropdown button">
    <i class="filter icon"></i>
    <span class="text">Bộ lọc</span>
    <div class="menu">
        <form action="{{route('foody_filter')}}" method="post">
            {{csrf_field()}}
            <div class="header">
                Chọn loại thực đơn
            </div>
            <div class="divider"></div>
            <select class="ui search dropdown no-margin-left" name="type-id" id="type-id">
                <option class="item" value="all">Tất cả</option>
                @foreach(\App\FoodyType::all() as $foodyType)
                    <option class="item" value="{{$foodyType->id}}">{{$foodyType->name}}</option>
                @endforeach
            </select>
            <div class="header">
                <i class="tags icon"></i>
                Trạng thái
            </div>
            <div class="divider"></div>
            <select class="ui search dropdown no-margin-left" name="status-id" id="status-id">
                <option class="item" value="all">Tất cả</option>
                <option class="item" value="1">Đang bán</option>
                <option class="item" value="0">Tạm hết</option>
            </select>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lọc</strong></button>
            </div>
        </form>
    </div>
</div>