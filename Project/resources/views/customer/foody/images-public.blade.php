<div class="row white section scrollspy">
    <div class="col s12 content">
        <span class="content-header">Hình ảnh từ cộng đồng</span>
        <div class="divider" style="margin-bottom: 10px"></div>

        @foreach($images as $key => $image)
            @php
                $count = count($images);
                $margin = '2px';
                $hide = '';
                if ($key % 4 == 0) {
                    $margin = '0';
                }
                if ($count > 4 && $count < 9) {
                    $count = (integer)($count / 2);
                }
                if ($count > 8) {
                    $count = 4;
                }
                $width = 'calc((100% - '.($count - 1).' * 2px) / '.$count.')';
                if ($key > 10) {
                    $hide = 'hide';
                }
            @endphp
            @if($key == 11)
                <div class="foody-images" onclick="openViewer($('img.foody-images'), {{ $key }})"
                     style="width: {{ $width }}; margin: 0 0 2px {{ $margin }};
                             background-color: #b0bec5 !important;">
                    <i class="material-icons">photo_library</i>
                </div>
            @endif

            <img class="foody-images {{ $hide }}" onclick="openViewer($('img.foody-images'), {{ $key }})"
                 style="width: {{ $width }}; margin: 0 0 2px {{ $margin }}" src="{{ asset($image->link) }}">

        @endforeach
    </div>
</div>