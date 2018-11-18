<div class="ui mini-50 vertical flip modal" id="add-employee-role-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm phân quyền mới</div>
    <div class="content">
        <form action="" class="ui form" method="post">
            {{ csrf_field() }}
            <div class="field">
                <label for="role">Tên công việc</label>
                <input type="text" id="start_date" name="start-date" value="Kế toán {{rand(1,100)}}" required>
            </div>
            <div class="field">
                <label for="function">Chức năng</label>
                <select name="function[]" id="function" class="ui fluid dropdown" id="multi-select">
                    @foreach(\App\Functions::all() as $function)
                        <option value="{{$function->id}}">{{$function->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>