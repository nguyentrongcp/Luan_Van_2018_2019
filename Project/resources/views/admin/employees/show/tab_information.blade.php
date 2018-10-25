<div class="ui bottom attached tab segment active" data-tab="first">
    <form action="" class="ui form static">
        <div class="ui padded grid">
            <div class="eight wide column">
                <div class="inline field">
                    <label class="label-fixed">Họ tên</label>
                    <div class="static-input">{{ $employee->name }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Địa chỉ</label>
                    <div class="static-input">{{ $employee->address }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Email</label>
                    <div class="static-input">{{$employee->email}}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Số điện thoại</label>
                    <div class="static-input">{{$employee->phone}}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Tài khoản</label>
                    <div class="static-input">{{$employee->username}}</div>
                </div>
            </div>
            <div class="eight wide column">
                <div class="inline field">
                    <label for="">Phân quyền:</label>
                    <div class="static-input">
                        <label for="role" class="label-fixed">
                            {{\App\Role::find($employee->id)->name}}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

