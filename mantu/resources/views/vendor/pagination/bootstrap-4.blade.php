@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled d-none d-md-inline" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span
                                    class="page-link">{{ $page }}</span></li>
                        @else
                            @if ($page == 1 || $page == $paginator->lastPage() || abs($page - $paginator->currentPage()) < 2)
                                <li class="page-item d-none d-md-inline"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif

                            {{-- Show first and last page on small screens --}}
                            @if ($page == 1 || $page == $paginator->lastPage())
                                <li class="page-item d-md-none"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

    {{-- Input for specific page navigation --}}
    <div class="d-flex justify-content-center">
        <form action="{{ url()->current() }}" method="GET">
            <div class="input-group">
                <input type="number" name="page" class="form-control" min="1"
                    max="{{ $paginator->lastPage() }}" placeholder="Halaman" style="width: calc(1ch + 12ch)">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>
@endif
