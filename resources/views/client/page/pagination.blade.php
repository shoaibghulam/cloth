
    @if ($paginator->hasPages())
            <ul class="pagination-btns flex-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li><a href="#" class="single-btn prev-btn disabled">|<i
                    class="zmdi zmdi-chevron-left"></i> </a></li>
                    {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li> --}}
                @else
                <li><a href="{{ $paginator->previousPageUrl() }}" class="single-btn prev-btn "><i
                    class="zmdi zmdi-chevron-left"></i> </a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                    <li class="active" disabled><a href="#" class="single-btn">{{$page}}</a></li>
                    
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                          <li class="active"><a href="#" class="single-btn">{{$page}}</a></li>
                            @else
                            <li><a href="{{ $url }}" class="single-btn">{{ $page }}</a></li>

                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
                {{-- <li><a href="{{ $paginator->nextPageUrl() }}" class="single-btn">{{ $page }}</a></li>

                    <li class="page-item">
                        <button type="button" dusk="nextPage" class="page-link" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</button>
                    </li> --}}
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        
    @endif

