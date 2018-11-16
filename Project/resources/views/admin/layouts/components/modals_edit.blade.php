<div class="ui mini-40 vertical flip modal" id="modal-edit-info">
    <div class="blue header">Chỉnh sửa thông tin</div>
    <div class="content">
        <form action="{{ route('change_info', [\App\Admin::adminId()]) }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label>Tên nhân viên</label>
                <input type="text" value="{{ \App\Admin::adminName() }}" name="employee-name"
                       maxlength="50" required>
            </div>

            <div class="field">
                <label>Số điện thoại</label>
                <input type="text" value="{{ \App\Admin::adminPhone() }}" name="employee-phone"
                       maxlength="11" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>