
<div class="ui bottom attached tab segment" data-tab="third">
    <h5 class="ui header right aligned">
        <span class="pointer"
              onclick="showExportMultiple(
                  'Thong ke san pham het hang/ngung kinh doanh',
                  'San pham het hang',
                  outProductCols, outProductRows,
                  'San pham ngung kinh doanh',
                  outProductCols, stopProductRows
              )">
            <i class="file pdf outline red icon fitted"></i>
            PDF
        </span>
    </h5>
        <div class="column">
            <h5 class="ui dividing header no-margin-bottom">Thực đơn tạm hết hàng</h5>
            <table class="ui table celled striped compact" id="product-out-table">
                <thead>
                <tr><th class="collapsing">STT</th><th>Tên thực đơn</th></tr>
                </thead>
                <tbody>
                @foreach($outFoodies as $idx => $outFoodies)
                    <tr>
                        <td class="center aligned">{{ $idx + 1 }}</td>
                        <td>
                            <img src="{{ asset($outFoodies->avatar) }}" class="ui mini image spaced">
                            <a class="a-decoration" href="{{ route('foodies.show', [$outFoodies->id]) }}">
                                {{ $outFoodies->name }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


    </div>
</div>

@push('script')
    <script>
        bindDataTable('product-out-table', true);
        bindDataTable('product-stop-table', true);

        let outProductCols = ['STT', 'Ten san pham'];
        let stopProductRows = [], outProductRows = [];

        {{--let outProducts = JSON.parse('{!! $outProducts !!}');--}}
        {{--let stopProducts = JSON.parse('{!! $stopProducts !!}');--}}
        outProducts.forEach((p, i) => {
            outProductRows.push([i+1, toAscii(p.ten_san_pham)]);
        });
        stopProducts.forEach((p, i) => {
            stopProductRows.push([i+1, toAscii(p.ten_san_pham)]);
        });
    </script>
@endpush