
<div class="ui bottom attached tab segment" data-tab="second">
    <h5 class="ui header right aligned">
    </h5>
    <div class="column">
        <h5 class="ui dividing header no-margin-bottom">Món ăn đang khuyến mãi</h5>
        <table class="ui table celled striped compact" id="product-out-table">
            <thead>
            <tr><th class="collapsing center aligned">STT</th><th>Tên món ăn</th>
                <th class="center aligned">Giảm giá</th></tr>
            </thead>
            <tbody>
            @foreach($saleOffFoodies as $idx => $saleOffFoody)
                <tr>
                    <td class="center aligned">{{ $idx + 1 }}</td>
                    <td>
                        <img src="{{ asset($saleOffFoody->avatar) }}" class="ui mini image spaced">
                        <a class="a-decoration" href="{{ route('foodies.show', [$saleOffFoody->id]) }}">
                            {{ $saleOffFoody->name }}
                        </a>
                    </td>
                    <td class="center aligned"><span class="ui red small label">{{$saleOffFoody->percent}}%</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
</div>

@push('script')
    <script>

    </script>
@endpush