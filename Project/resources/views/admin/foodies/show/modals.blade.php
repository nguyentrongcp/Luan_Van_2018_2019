{{--modal cost history--}}
<div class="ui mini vertical flip modal" id="cost-history-modal">
    <i class="close icon"></i>
    <div class="content">
        <h3 class="ui dividing header">Lịch sử giá</h3>
        <table class="ui very compact striped table">
            <thead>
            <tr>
                <th>Ngày cập nhật</th>
                <th>Giá thành</th>
            </tr>
            </thead>
            <tbody>
            @foreach($costFoodys as $costFoody)
                <tr>
                    <td>{{ $costFoody->cost_updated_at }}</td>
                    <td>
                        @if ($costFoody->active)
                            <strong class="red-text">{{ number_format($costFoody->currentCost()) }} đ</strong>
                        @else
                            {{ number_format($costFoody->cost) }} đ
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{--Modal update cost--}}

<div class="ui mini vertical flip modal" id="cost-update-modal">
    <i class="close icon"></i>
    <div class="content">
        <h3 class="ui dividing header">Cập nhật giá mới</h3>
        <form action="{{ route('foody_change_cost', [$id]) }}" method="post" class="ui form" id="form-cost">
            {{ csrf_field() }}

            <div class="field">
                <input type="text" id="foody_cost" name="foody-cost" placeholder="Nhập giá mới">
            </div>
            <div class="field">
                <span class="help-text"><i>Chỉ nhập <strong>số</strong>,
                        dấu <strong>phẩy</strong>,
                        dấu <strong>chấm</strong>
                        hoặc <strong>khoảng trắng</strong></i></span>
                <div class="ui basic segment right aligned no-margin no-padding">
                    <button class="ui blue small button">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $('#form-cost').form({
            fields: {
                foody_cost: {
                    rules: [
                        {type: 'empty', prompt: 'Không được bỏ trống'},
                        {type: 'regExp[/^[,.\s0-9]+$/igm]', prompt: 'Sai định dạng'}
                    ]
                }
            },
            inline: true
        })
    </script>
@endpush