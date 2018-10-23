<div class="col s12 m3 l3 hide-on-small-only" id="home-nav-container">
    <div class="row">
        <h6><b>Sắp xếp</b></h6>
        <div class="divider"></div>

        <div class="col s12 home-nav">
            <a onclick="showFoodyBySort(this)" id="default" class="foody-sort waves-effect waves-teal btn white black-text btn-fluid active">
                Mặc định
                <i class="material-icons left">clear_all</i>
            </a>
        </div>

        <div class="col s12 home-nav">
            <a onclick="showFoodyBySort(this)" id="asc" class="foody-sort waves-effect waves-teal btn white black-text btn-fluid">
                Giá tăng dần
                <i class="material-icons left">arrow_upward</i>
            </a>
        </div>

        <div class="col s12 home-nav">
            <a onclick="showFoodyBySort(this)" id="desc" class="foody-sort waves-effect waves-teal btn white black-text btn-fluid">
                Giá giảm dần
                <i class="material-icons left">arrow_downward</i>
            </a>
        </div>
    </div>


    <div class="row">
        <h6><b>Ẩm thực</b></h6>
        <div class="divider"></div>
        <div class="col s12 home-nav">
            <a id="all" onclick="showFoodyByType(this)" class="waves-effect waves-teal btn white black-text btn-fluid foody-type active">
                Xem tất cả
                <i class="material-icons right">chevron_right</i>
            </a>
        </div>
        @foreach($foody_types as $foody_type)
            <div class="col s12 home-nav">
                <a id="{{ $foody_type->id }}" onclick="showFoodyByType(this)"
                   class="waves-effect waves-teal btn white black-text btn-fluid foody-type">
                    <span class="truncate left" style="max-width: calc(100% - 35px)">{{ $foody_type->name }}</span>
                    <i class="material-icons right">chevron_right</i>
                </a>
            </div>
        @endforeach
    </div>
</div>