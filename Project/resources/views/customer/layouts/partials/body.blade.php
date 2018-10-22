<body>

    @php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Request;
        use Gloudemans\Shoppingcart\Facades\Cart;
    @endphp

    @include('customer.layouts.partials.navbar.navbar')

    <div class="container">
        @yield('content')
    </div>

</body>