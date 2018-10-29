@include('customer.layouts.partials.header')

@section('title', 'fastfoody.vn - Thức ăn nhanh, ngon, tiện lợi')

<body>

    <div id="background-index"></div>
    <div class="index-container">
        <div class="row">
            <div id="type-container" class="col s12 m12 l5 type-container">
                <div class="col s12">
                    <div class="til white-text">Có {{ count($foodies) }} món ăn và nước uống đang chờ bạn</div>
                    <div class="input-field col s12" id="search-row">
                        <input id="search" type="text" placeholder="Tìm kiếm món ăn, nước uống, đơn hàng...">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    </div>
                    <a class="waves-effect waves-light ui large label">Tất cả</a>
                    @foreach($foody_types as $foody_type)
                        <a class="waves-effect waves-light ui large label">{{ $foody_type->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="col s12 m12 l7 index-info-container right">
                <div class="index-row index-news">
                    <div class="til truncate">
                    <span>
                        Tin tức và khuyến mãi
                    </span>
                        <a href="#">
                            Xem tất cả
                        </a>
                    </div>
                    <div class="divider"></div>
                    <div class="index-news-content">
                        <div class="news-row">
                            <div class="news-image">
                                <img src="{{ asset('/customer/image/background_index.jpg') }}">
                            </div><div class="news-content">
                                <div class="til truncate">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="cont truncate-twolines">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="time">
                                    {{ date('d-m-Y H:i:s') }}
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="news-row">
                            <div class="news-image">
                                <img src="{{ asset('/customer/image/background_index.jpg') }}">
                            </div><div class="news-content">
                                <div class="til truncate">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="cont truncate-twolines">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="time">
                                    {{ date('d-m-Y H:i:s') }}
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="news-row">
                            <div class="news-image">
                                <img src="{{ asset('/customer/image/background_index.jpg') }}">
                            </div><div class="news-content">
                                <div class="til truncate">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="cont truncate-twolines">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="time">
                                    {{ date('d-m-Y H:i:s') }}
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="news-row">
                            <div class="news-image">
                                <img src="{{ asset('/customer/image/background_index.jpg') }}">
                            </div><div class="news-content">
                                <div class="til truncate">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="cont truncate-twolines">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="time">
                                    {{ date('d-m-Y H:i:s') }}
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="news-row">
                            <div class="news-image">
                                <img src="{{ asset('/customer/image/background_index.jpg') }}">
                            </div><div class="news-content">
                                <div class="til truncate">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="cont truncate-twolines">
                                    Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                                </div>
                                <div class="time">
                                    {{ date('d-m-Y H:i:s') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="index-row index-foody-container">
                    <div class="til truncate">
                    <span>
                        Ẩm thực đang hot
                    </span>
                        <a href="#">
                            Xem tất cả
                        </a>
                    </div>
                    <div class="divider"></div>
                    <div class="index-foody">
                        @for($i=2; $i<=7; $i++)
                            @php $foody = \App\Foody::find($i); @endphp
                            <div class="foody-row col s4">
                                <div class="z-depth-1 hoverable">
                                    <a href="#">
                                        <div class="foody-image">
                                            <img src="{{ asset($foody->avatar) }}">
                                        </div>
                                        <div class="foody-content">
                                            <div class="foody-name truncate">
                                                {{ $foody->name }}
                                            </div>
                                            <div class="foody-type truncate">
                                                {{ $foody->foodyType->name }}
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="foody-cost center-align">
                                            {{ number_format($foody->getSaleCost()) }}<sup>đ</sup>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <div class="index-row index-guide">
                    <div class="til truncate center-align">
                        <span>
                            Sử dụng <span class="teal-text">Fastfoody.vn</span> rất dễ dàng
                        </span>
                    </div>
                    <div class="col s12 index-guide-content">
                        <div class="col s4 guide-col">
                            <label class="ui circular large label guide-step">1</label>
                            <div class="col s12 center-align guide-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div class="col s12 center-align guide-text">
                                Chọn món ăn hoặc nước uống
                            </div>
                        </div>
                        <div class="col s4 guide-col">
                            <label class="ui circular large label guide-step">2</label>
                            <div class="col s12 center-align guide-icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                            <div class="col s12 center-align guide-text">
                                Thêm vào giỏ hàng
                            </div>
                        </div>
                        <div class="col s4 guide-col">
                            <label class="ui circular large label guide-step">3</label>
                            <div class="col s12 center-align guide-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="col s12 center-align guide-text">
                                Thanh toán và giao hàng tận nơi
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>




    @include('customer.layouts.components.search-result')
    @include('customer.index.style')
    @include('customer.index.js')

</body>

@include('customer.layouts.partials.footer')