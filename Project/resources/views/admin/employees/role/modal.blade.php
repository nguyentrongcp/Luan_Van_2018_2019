<!-- Modal add sales offs-->
<div class="ui mini-50 vertical flip modal" id="create-role-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm phân quyền</div>
    <div class="content">
        <form action="{{ route('role.store') }}" class="ui form" method="post">

            {{ csrf_field() }}
            <div class="field">
                <label for="percent">Tên phân quyền</label>
                <input type="text" name="name" maxlength="100" value="Nhân viên quản lý">
            </div>
            <div class="field">
                <label>Chọn phân quyền</label>
                <select name="role[]" multiple class="ui selection dropdown">
                    @foreach(\App\Functions::all() as $function)
                        <option value="{{ $function->id }}">{{ $function->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>
<!--End modal-->

<!-- Modal edit sales offs-->
@foreach($roles as $role)
    <div class="ui mini-50 vertical flip modal" id="edit-role-modal-{{ $role->id }}">
        <i class="close icon"></i>
        <div class="blue header">Chỉnh sửa phân quyền</div>
        <div class="content">
            <form action="{{ route('role.update', [$role->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="field">
                    <label for="percent">Tên phân quyền</label>
                    <input type="text" name="name" maxlength="100" value="{{ $role->name }}">
                </div>

                @php
                    $value = [];
                    foreach(\App\EmployeeRole::where('role_id', $role->id)->get() as $role_detail) {
                        $value[] = $role_detail->function->id;
                    }
                    $value = implode(',', $value);
                @endphp

                <div class="field">
                    <label>Chọn phân quyền</label>
                    <div class="ui multiple selection dropdown">
                        <input name="role" type="hidden" value="{{ $value }}">
                        <i class="dropdown icon"></i>
                        <div class="default text">Chọn phân quyền</div>
                        <div class="menu">
                            @foreach(\App\Functions::all() as $function)
                                <div class="item" data-value="{{ $function->id }}">{{ $function->name }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
<!--  End Modal -->





