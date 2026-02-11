@if ($paginator->hasPages())
<nav aria-label="Pagination">
    <ul class="pagination pagination-sm justify-content-center mb-0">

        {{-- PREVIOUS --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link" aria-hidden="true">‹</span>
            </li>
        @else
            <li class="page-item">
                <a
                    class="page-link"
                    href="{{ $paginator->previousPageUrl() }}"
                    rel="prev"
                    aria-label="Previous"
                >
                    ‹
                </a>
            </li>
        @endif

        {{-- NEXT --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a
                    class="page-link"
                    href="{{ $paginator->nextPageUrl() }}"
                    rel="next"
                    aria-label="Next"
                >
                    ›
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link" aria-hidden="true">›</span>
            </li>
        @endif

    </ul>
</nav>
@endif