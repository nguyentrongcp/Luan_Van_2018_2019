<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="select-all">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th>Họ tên</th>
            <th class="text-center">SĐT</th>
            <th>Email</th>
            <th>Tài khoản</th>
            <th>Phân quyền</th>
            <th class="collapsing">Sửa</th>
            <th class="text-center">Đổi MK</th>

        </tr>
        </thead>
        <tbody>
        @foreach($employees as $stt => $employee)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="employee-id[]" value="{{$employee->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td>
                    {{$employee->name}}
                </td>
                <td class="text-center">
                    {{$employee->phone}}
                </td>
                <td>
                    {{$employee->email}}
                </td>
                <td>
                    {{$employee->username}}
                </td>
                <td class="text-info header">{{\App\Role::find($employee->role_id)->name}}</td>
                <td class="collapsing">
                    <a href="#" class="ui tiny green icon label a-decoration"
                        onclick="$('{{"#update-employee-modal-" . $employee->id}}').modal('show')">
                        <i class="pencil alternate fitted icon"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="#" class="ui tiny blue icon label"
                       onclick="$('{{ "#modal-reset-pwd-" . $employee->id }}').modal('show')">
                        <i class="sync icon fitted"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($employees, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $employees->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>