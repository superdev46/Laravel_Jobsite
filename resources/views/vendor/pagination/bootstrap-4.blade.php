@if ($paginator->hasPages())
<ul class="">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="pagination-arrow disabled"><a class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
    @else
    <li class="pagination-arrow"><a class="ripple-effect" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="page-item disabled"><span class="ripple-effect">{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item"><a class="ripple-effect current-page">{{ $page }}</a></li>
    @else
    <li class="page-item"><a class="ripple-effect" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="pagination-arrow"><a class="ripple-effect" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
    @else
    <li class="pagination-arrow disabled"><a class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
    @endif
</ul>
@endif
