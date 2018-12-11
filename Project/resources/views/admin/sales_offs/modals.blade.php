<!-- Modal add sales offs-->
<div class="ui mini-50 vertical flip modal" id="create-sales-offs-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới khuyến mãi</div>
    <div class="content">
        <form action="{{ route('sales_offs.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="sales-offs-name">Tên khuyến mãi</label>
                <input type="text" id="sales_offs_name" name="sales-offs-name" value="KM Noel" required>
            </div>
            <div class="field">
                <label for="percent">Ngày bắt đầu</label>
                <input type="date" id="start_date" name="start-date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required>
            </div>
            <div class="field">
                <label for="percent">Ngày kết thúc</label>
                <input type="date" id="end_date" name="end-date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d',strtotime('+1 day'))}}" required>
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>
<!--End modal-->

<!-- Modal edit sales offs-->
@foreach($salesOffs as $salesOff)
    <div class="ui mini-50 vertical flip modal" id="{{ "update-sales-offs-modal-" . $salesOff->id }}">
        <i class="close icon"></i>
        <div class="blue header">Sửa tên khuyến mãi</div>
        <div class="content">
            <form action="{{ route('sales_offs.update', [$salesOff->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="sales-offs-name">Tên khuyến mãi</label>
                    <input type="text" id="sales_offs_name" name="sales-offs-name" value="{{$salesOff->name}}" required>
                </div>
                <div class="field">
                    <label for="percent">Ngày bắt đầu</label>
                    <input type="date" id="start_date" name="start-date" min="{{date('Y-m-d')}}" value="{{$salesOff->start_date}}" required>
                </div>
                <div class="field">
                    <label for="percent">Ngày kết thúc</label>
                    <input type="date" id="end_date" name="end-date" min="{{date('Y-m-d',strtotime('+1 day'))}}" value="{{$salesOff->end_date}}" required>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
<!--  End Modal -->
@push('script')
    <script>
        function checkDate(form) {
            let start = $(form).find('[name="start-date"]').val();
            let end = $(form).find('[name="end-date"]').val();
            if (start < end)
                return true;

            $.toast({
                heading: 'Ngày không hợp lệ',
                text: 'Ngày kết thúc phải lớn hơn ngày bắt đầu!',
                icon: 'error',
                loader: false,
                position: "top-center"
            });

            return false;
        }
    </script>
@endpush



