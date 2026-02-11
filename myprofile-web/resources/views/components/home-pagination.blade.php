@props([
    'paginator',
    'target',
])

@php
    $pageName = $paginator->getPageName();
@endphp

<div class="d-flex justify-content-center gap-2 mt-3">

    {{-- PREV --}}
    <button
        type="button"
        class="btn btn-light btn-sm home-pagination"
        data-target="{{ $target }}"
        data-url="{{ request()->fullUrlWithQuery([
            $pageName => max(1, $paginator->currentPage() - 1)
        ]) }}"
        @disabled($paginator->onFirstPage())
    >
        ‹
    </button>

    {{-- NEXT --}}
    <button
        type="button"
        class="btn btn-light btn-sm home-pagination"
        data-target="{{ $target }}"
        data-url="{{ request()->fullUrlWithQuery([
            $pageName => $paginator->currentPage() + 1
        ]) }}"
        @disabled(!$paginator->hasMorePages())
    >
        ›
    </button>

</div>
