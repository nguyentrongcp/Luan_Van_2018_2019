<!doctype html>

<html>

    <head>
        <title>test</title>
    </head>

    <body>

        <a href="#" id="get_location">Get location</a>
        <a href="#" id="show_location">Get location</a>
        <div id="maps">
            <iframe id="google_map" width="500" height="400" frameborder="0" scrolling="no" marginheight="0"
                    marginwidth="0" src="https://maps.google.co.uk?output=embed"></iframe>
        </div>

        <script src="{{ asset('/customer/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('/customer/js/geoPosition.js') }}" type="text/javascript" charset="utf-8"></script>
        <script>

            // let location = '';
            let c = function(pos) {
                let lat = pos.coords.latitude,
                    long = pos.coords.longitude,
                    coords = lat + ', ' + long;
                // location = coords;
                $('#google_map').attr('src', 'https://maps.google.co.uk/?q=' + coords + '&z=60&output=embed');
            };

            let e = function(error) {
                if (error.code === 1) {
                    // location = '';
                }
            };

            $('#get_location').on('click', function () {
                navigator.geolocation.getCurrentPosition(c,e);
                return false;
            });
            $('#show_location').on('click', function () {
                // alert(location);
            });
        </script>

    </body>

</html>