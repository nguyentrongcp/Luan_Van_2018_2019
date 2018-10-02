<body>

    @php
        use Illuminate\Support\Facades\Auth;
    @endphp

    @include('customer.layouts.partials.navbar')

    <div class="container">
        @yield('content')
    </div>

</body>