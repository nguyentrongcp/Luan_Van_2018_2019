<div style="display: inline-block;" class="rating-component">
    @php

        $star = floatval(str_replace(',', '.', $slot));
        $floor = floor($star);
        $off_star= 5 - ceil($star);
    @endphp

    @for ($i = 0; $i < $floor; $i++)
                <i class="fa fa-star star-rating"></i>
    @endfor

    @if ($star - $floor > 0)
                <i class="fa fa fa-star-half-o star-rating"></i>
    @endif
    @for ($i = 0; $i < $off_star; $i++)
                <i class="fa fa-star-o star-rating"></i>
    @endfor
</div>