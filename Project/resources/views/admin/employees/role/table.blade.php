<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="select-all">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing center aligned">STT</th>
            <th>Vai trò</th>
            <th>Các phân quyền</th>
            <th class="center aligned collapsing">Sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $stt => $role)
            @if($role->id != 1)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="role-id[]" value="{{$role->id}}">
                    </div>

                </td>
                <td class="center aligned">{{$stt}}</td>
                <td>
                    {{ $role->name }}
                </td>
                <td>
                    @foreach(\App\EmployeeRole::where('role_id', $role->id)->get() as $function)
                        <span class="ui small label" style="margin: 3px 0">{{ $function->function->name }}</span>
                    @endforeach
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label"
                       onclick="$('{{"#edit-role-modal-" . $role->id}}').modal('show')">
                        <i class="edit icon fitted"></i>
                    </a>
                </td>
                {{--<td class="text-center">--}}
                    {{--<a href="#" class="ui tiny blue icon label"--}}
                       {{--onclick="$('{{ "#modal-reset-pwd-" . $employee->id }}').modal('show')">--}}
                        {{--<i class="sync icon fitted"></i>--}}
                    {{--</a>--}}
                {{--</td>--}}
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    @if (method_exists($roles, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $roles->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>