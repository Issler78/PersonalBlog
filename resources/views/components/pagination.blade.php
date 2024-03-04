@php
    $queryParameters = isset($appends) && gettype($appends) == "array" ? '&' . http_build_query($appends) : '';
@endphp
<div class="d-flex justify-content-end">
@if (isset($paginator))
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->isFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.previous') !!}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="?page={{ $paginator->getNumberPreviousPage() }}{{ $queryParameters }}" rel="prev">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            @if (!$paginator->isLastPage())
                <li class="page-item">
                    <a class="page-link" href="?page={{ $paginator->getNumberNextPage() }}{{ $queryParameters }}" rel="next">{!! __('pagination.next') !!}</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.next') !!}</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
</div>