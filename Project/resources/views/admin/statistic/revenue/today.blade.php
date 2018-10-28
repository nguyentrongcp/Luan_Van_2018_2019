
<h4 class="ui header">
    <label class="label-fixed" for="">Chọn ngày: </label>
    <div class="ui mini input">
        <input type="date" id="specific-day" name="specific-day" value="">
    </div>
</h4>

<div class="ui segment" id="form-statistics">
    <div class="ui tiny three statistics">
        <div class="statistic">
            <div class="value">
                <i class="dolly yellow circular icon"></i>
                <span id="total-buying">0</span>đ
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
                <span id="redundant">0</span>đ
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
            var get_date = $('#specific-day').val();
            $.ajax({
                type: 'post',
                url: '/statistic/getdate',
                data: {
                    revenue_date: get_date
                },
                success: function (data) {
                    console.log(data);
                }
            })
        })
    </script>
@endpush