@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true" style="color: #ffffff !important; font-size: 1.4rem !important; font-weight: 700 !important;">&lt;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important; border-color: #667eea !important; color: #ffffff !important; font-size: 1.4rem !important; font-weight: 700 !important;">&lt;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important; border-color: #667eea !important; color: #ffffff !important; font-size: 1.4rem !important; font-weight: 700 !important;">&gt;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true" style="color: #ffffff !important; font-size: 1.4rem !important; font-weight: 700 !important;">&gt;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
