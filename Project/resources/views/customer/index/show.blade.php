<div class="col s12 m9 l9 foody-col">
    <div class="row"></div>
    @foreach($foodys as $foody)
        <div class="col s12 m4 l3 foody-card">
            <div class="card hoverable">
                <div class="card-image">
                    {{--650 x 350--}}
                    <img class="materialboxed" src="{{ $foody->avatar }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light red tooltipped"
                       data-position="top" data-tooltip="Thêm vào giỏ hàng">
                        <i class="material-icons">add_shopping_cart</i>
                    </a>
                </div>
                <div class="card-content">
                    <div class="row">
                        <a href="#">
                            <p class="truncate black-text tooltipped" data-position="top"
                               data-tooltip="{{ $foody->name }}">
                                <b>{{ $foody->name }}</b></p></a>
                    </div>
                    <div class="row">
                        <span>
                            <span class="old-cost">1,000,000</span>
                            <sup>đ</sup>
                        </span>
                        <b class="red-text">145,000<sup>đ</sup></b>
                        <span class="ui small label red">- 60%</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    .foody-card .card {
        margin-bottom: 10px;
        margin-left: 5px;
    }
</style>

@push('script')
    <script>
        $('.ui.rating')
            .rating()
        ;
    </script>
@endpush