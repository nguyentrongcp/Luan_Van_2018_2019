<div class="ui floating green labeled icon dropdown button">
    <i class="filter icon"></i>
    <span class="text">Bộ lọc</span>
    <div class="menu">
        <form action="{{route('foody_filter')}}" method="post">
            {{csrf_field()}}
            <div class="header">
                Chọn loại thực đơn
            </div>
            <select class="ui search dropdown no-margin-left" name="name-type-filter" id="name-type-filter">
                <option value="all">Tất cả</option>
                @foreach($foodyTypes as $foodyType)
                    <option value="{{$foodyType->id}}">{{$foodyType->name}}</option>
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
            {{--<a class="item" href="{{route('foody_filter',['all'])}}">--}}
            {{--<div class="ui default empty circular"></div>--}}
            {{--Tất cả--}}
            {{--</a>--}}
            {{--<a class="item" href="{{route('foody_filter',[1])}}">--}}
            {{--<div class="ui default empty circular radio"></div>--}}
            {{--Đang bán--}}
            {{--</a>--}}
            {{--<a class="item" href="{{route('foody_filter',[0])}}">--}}
            {{--<div class="ui default empty circular radio"></div>--}}
            {{--Tạm hết--}}
            {{--</a>--}}
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lọc</strong></button>
            </div>
        </form>

    </div>
</div>