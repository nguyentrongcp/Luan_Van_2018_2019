<div class="row white">
    <div class="col s12 content">
        <span class="content-header">Cùng loại</span>
        <div class="divider" style="margin-bottom: 10px"></div>

        <div class="row">
            <div class="row">
                <div class="col s4 m3 l3">
                    <img class="responsive-img" src="{{ $foody->avatar }}">
                </div>
                <div class="col s8 involve-foody-name">
                    <a href="#" class="truncate">{{ $foody->name }}</a>
                    <span class="cost">{{ number_format($foody->currentCost()) }}<sup>đ</sup></span>
                </div>
                <div class="col s1 hide-on-small-only involve-foody-action right-align">
                    <a href="#" class="ui small label"><i class="ui plus icon"></i></a>
                </div>
            </div>
            <a class="s12 hide-on-med-and-up ui attached button waves-effect waves-light" style="margin-bottom: 5px">
                <i class="cart plus icon"></i>Thêm vào giỏ hàng
            </a>
        </div>

        <div class="divider" style="margin-bottom: 5px !important;"></div>

        <div class="row">
            <div class="row">
                <div class="col s4 m3 l3">
                    <img class="responsive-img" src="{{ $foody->avatar }}">
                </div>
                <div class="col s8 involve-foody-name">
                    <span class="col s12"><a href="#" class="truncate">{{ $foody->name }}</a></span>
                    <span class="cost">{{ number_format($foody->currentCost()) }}<sup>đ</sup></span>
                </div>
                <div class="col s1 hide-on-small-only involve-foody-action right-align">
                    <a href="#" class="ui small label"><i class="ui plus icon"></i></a>
                </div>
            </div>
            <a class="s12 hide-on-med-and-up ui attached button waves-effect waves-light" style="margin-bottom: 5px">
                <i class="cart plus icon"></i>Thêm vào giỏ hàng
            </a>
        </div>

    </div>


    <div class="col s12 involve-footer">
        <a href="#" class="ui attached teal button waves-effect waves-light">
            Xem tất cả
        </a>
    </div>
</div>