@if(Request::is('home'))
    <ul id="m-home-nav-container" class="dropdown-content">
        <li>
            <span class="m-home-nav-title">Sắp xếp</span>
        </li>
        <li class="divider"></li>
        <li>
            <a data-filter="default" class="foody-sort waves-effect waves-light active">
                Mặc định
                <i class="material-icons right">clear_all</i>
            </a>
        </li>
        <li>
            <a data-filter="asc" class="foody-sort waves-effect waves-teal">
                Giá tăng dần
                <i class="material-icons right">arrow_upward</i>
            </a>
        </li>
        <li>
            <a data-filter="desc" class="foody-sort waves-effect waves-teal">
                Giá giảm dần
                <i class="material-icons right">arrow_downward</i>
            </a>
        </li>
        <li>
            <a data-filter="vote" class="foody-sort waves-effect waves-teal">
                Đánh giá cao
                <i class="material-icons right">star</i>
            </a>
        </li>
        <li>
            <a data-filter="like" class="foody-sort waves-effect waves-teal">
                Yêu thích nhất
                <i class="material-icons right">favorite</i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <span class="m-home-nav-title">Ẩm thực</span>
        </li>
        <li class="divider"></li>
        <li>
            <a data-filter="all" class="foody-type waves-effect waves-light active">
                Xem tất cả
                <i class="material-icons right">chevron_right</i>
            </a>
        </li>
        @foreach($foody_types as $foody_type)
            <li>
                <a data-filter="{{ $foody_type->id }}" class="foody-type waves-effect waves-teal">
                    {{ $foody_type->name }}
                    <i class="material-icons right">chevron_right</i>
                </a>
            </li>
        @endforeach
    </ul>
@endif