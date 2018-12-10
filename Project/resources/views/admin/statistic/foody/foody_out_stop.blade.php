
<div class="ui bottom attached tab segment" data-tab="third">
        <div class="column">
            <h5 class="ui dividing header no-margin-bottom">Món ăn tạm hết hàng</h5>
            <table class="ui table celled striped compact" id="product-out-table">
                <thead>
                <tr><th class="collapsing">STT</th><th>Tên món ăn</th></tr>
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

    </script>
@endpush