<div class="col s12 m3 l3 hide-on-small-only foody-navbar" id="foody-navbar">
    <div class="row">
        <h6><b>Sắp xếp</b></h6>
        <div class="divider"></div>

        <div class="col s12 navbar-index">
            <a class="waves-effect waves-purple btn white black-text btn-fluid">
                Giá tăng dần
                <i class="material-icons left">arrow_upward</i>
            </a>
        </div>

        <div class="col s12 navbar-index">
            <button class="waves-effect waves-purple btn white black-text btn-fluid">
                Giá giảm dần
                <i class="material-icons left">arrow_downward</i>
            </button>
        </div>
    </div>


    <div class="row">
        <h6><b>Ẩm thực</b></h6>
        <div class="divider"></div>
        <div class="col s12 navbar-index">
            <a id="foody-type-all" class="waves-effect waves-purple btn white black-text btn-fluid foody-type">
                Xem tất cả
                <i class="material-icons right">chevron_right</i>
            </a>
        </div>
        @foreach($foody_types as $foody_type)
            <div class="col s12 navbar-index">
                <a id="{{ $foody_type->slug }}"
                   class="waves-effect waves-purple btn white black-text btn-fluid foody-type">
                    {{ $foody_type->name }}
                    <i class="material-icons right">chevron_right</i>
                </a>
            </div>
        @endforeach
    </div>
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
        /*margin-bottom: 5px;*/
    }

    .btn.active {
        color: white !important;
        background-color: purple !important;
    }
</style>