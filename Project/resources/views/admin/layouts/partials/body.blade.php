<body>
@include ('admin.layouts.partials.navbar')
@include('admin.layouts.partials.sidebar')

<div class="ui basic segment" id="main-container" style="margin-left: 220px">

    @yield('content')

</div>

@include('admin.layouts.components.scrolltop_button')
</body>