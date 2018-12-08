<div class="ui basic segment no-padding table-responsive">
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
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $stt => $employee)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="employee-ids[]" value="{{$employee->id}}">
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