<h4 class="ui header">
    <label class="label-fixed" for="">Chọn ngày: </label>
    <div class="ui mini input">
        <input type="date" value="{{ date('Y-m-d') }}" id="specific-day" name="specific-day">
    </div>
</h4>

<div class="ui segment" id="form-statistics">
    <div class="ui tiny three statistics">
        <div class="statistic">
            <div class="value">
                <i class="dolly yellow circular icon"></i>
                <span id="total-buying\">0</span>đ
            </div>
            <div class="label">
                Tổng chi
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="shipping fast green circular icon"></i>
                <span id="total-revenue">0</span>đ
            </div>
            <div class="label">
                Tổng thu
            </div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="bottom right corner blue chart line circular icon"></i>
                <span id="redundant">0 </span>đ
            </div>
            <div class="label">
                Hiệu số
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $('.ui.input').change(function () {
            let get_date = $('#specific-day').val();
            $.ajax({
                type: 'get',
                url: '{{ route('statistic.today') }}',
                data: {
                    revenue_date: get_date
                },
                success: function (data) {
                    // console.log(data);
                    $('#form-statistics').empty();
                    $('#form-statistics').html(data);
                }
            })
        })
    </script>
@endpush