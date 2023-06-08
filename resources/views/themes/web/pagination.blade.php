<div class="pagination d-flex justify-content-between">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <a class="btn btn-outline-secondary disabled" aria-disabled="true">&larr; Sebelumnya</a>
    @else
        <a class="btn btn-outline-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr; Sebelumnya</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="btn btn-outline-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next">Selanjutnya &rarr;</a></li>
    @else
        <a class="btn btn-outline-secondary disabled" aria-disabled="true">Selanjutnya &rarr;</a>
    @endif
</div>
