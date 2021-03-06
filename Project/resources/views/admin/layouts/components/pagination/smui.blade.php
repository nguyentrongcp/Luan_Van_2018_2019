@if ($paginator->hasPages())
    <div class="ui tiny pagination menu">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon item disabled"> <i class="left chevron icon"></i> </a>
        @else
            <a class="icon item" href="{{ $paginator->previousPageUrl() }}" rel="prev"> <i class="left chevron icon"></i> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    {{--@php dd(\Illuminate\Support\Facades\Request::url()); @endphp--}}
                    @if ($page == $paginator->currentPage())
                        <a style="border-bottom: 2px solid #2185d0" class="item active" href="{{ $url }}"><strong>{{ $page }}</strong></a>
                    @else
                        <a class="item" href="{{ $url }}"><strong>{{ $page }}</strong></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next"> <i class="right chevron icon"></i> </a>
        @else
            <a class="icon item disabled"> <i class="right chevron icon"></i> </a>
        @endif
    </div>
@endif
