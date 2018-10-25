@extends('admin.layouts.master')

@section('title', 'Tin tức')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing center aligned">Quản lý tin tức</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('news.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <a href="{{ route('news.create') }}" class="ui small blue button">
                <i class="plus icon"></i>Thêm mới
            </a>

            <div class="ui divider small-td-margin hidden"></div>

            <table class="ui table celled compact center aligned">
                <thead>
                <tr>
                    <th class="collapsing">
                        <div class="ui checkbox" id="select-all-news">
                            <input type="checkbox">
                        </div>
                    </th>
                    <th class="collapsing">STT</th>
                    <th>Tiêu đề</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $stt => $new)

                    <tr>
                        <td>
                            <div class="ui child checkbox">
                                <input type="checkbox" name="news-id[]" value="{{ $new->id }}">
                            </div>
                        </td>
                        <td>{{ $stt + 1 }}</td>
                        <td class="left aligned">{{ $new->title }}</td>
                        <td class="collapsing">{{$new->date }}</td>
                        <td>
                            <a href="{{ route('news.show', [$new->id]) }}" class="ui small blue label a-decoration">
                                <i class="eye open fitted icon"></i>
                            </a>
                            <a href="{{ route('news.edit', [$new->id]) }}" class="ui small green label a-decoration">
                                <i class="edit open fitted icon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>

    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('select-all-news');
    </script>
@endpush