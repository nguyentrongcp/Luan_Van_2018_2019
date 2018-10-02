<div class="col s12 m3 l3 hide-on-small-only foody-navbar">
    <div class="row">
        <h6><b>Sắp xếp</b></h6>
        <div class="divider" style="margin-bottom: 5px"></div>

        <div class="col s12 navbar-index">
            <a class="waves-effect waves-purple btn white black-text btn-fluid">
                Giá tăng dần
                <i class="material-icons left">arrow_upward</i>
            </a>
        </div>

        <div class="col s12 navbar-index">
            <button class="waves-effect waves-purple btn white black-text btn-fluid">
                Giá giảm dần
                Giá tăng dần
                <i class="material-icons left">arrow_downward</i>
            </button>
        </div>
    </div>

    @foreach($foody_types as $foody_type)
        <div class="row">
            <h6><b>{{ $foody_type->name }}</b></h6>
            <div class="divider"></div>
            <div class="col s12 navbar-index">
                <button class="waves-effect waves-purple btn white black-text btn-fluid">
                    Xem tất cả
                    <i class="material-icons right">chevron_right</i>
                </button>
            </div>
            @foreach(\App\FoodyType::where('foody_type_id', $foody_type->id)->get() as $foody_type_child)
                <div class="col s12 navbar-index">
                    <button class="waves-effect waves-purple btn white black-text btn-fluid">
                        {{ $foody_type_child->name }}
                        <i class="material-icons right">chevron_right</i>
                    </button>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<style>
    .navbar-index {
        padding: 5px 5px 0 10px !important;
    }

    .navbar-index .btn {
        text-transform: unset;
        color: #666 !important;
        text-align: left;
    }
    .foody-navbar {
        padding-right: 10px !important;
        padding-top: 10px !important;
    }
    .foody-navbar .row {
        margin: 0 0 20px 0;
    }
    .divider {
        margin-bottom: 5px;
    }
</style>