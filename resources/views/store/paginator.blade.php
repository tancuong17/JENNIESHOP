@if ($paginator->hasPages())
    <div class="pagination-container">
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == 1 && $paginator->currentPage() > 3)
                        <div class="pagination">
                            <a href="./{{ $quantity }}/?page=1"><span>1</a>
                        </div>
                        @if ($paginator->currentPage() != 4)
                            <p>...</p>
                        @endif
                    @endif
                    @if ($page == $paginator->currentPage()|| $paginator->currentPage() - 2 == $page || $paginator->currentPage() - 1 == $page || $paginator->currentPage() + 1 == $page || $paginator->currentPage() + 2 == $page)
                        <div class="pagination @if ($page == $paginator->currentPage()) pagination-active @endif">
                            <a href="{{ $url }}"><span>{{ $page }}</a>
                        </div>
                    @endif
                    @if ($page == $paginator->lastPage() && $paginator->currentPage() != $paginator->lastPage() && $paginator->currentPage() != $paginator->lastPage() - 1  && $paginator->currentPage() != $paginator->lastPage() - 2)
                        @if ($paginator->lastPage() - $paginator->currentPage() > 3)
                            <p>...</p>
                        @endif
                        <div class="pagination">
                            <a href="./{{ $quantity }}/?page={{ $paginator->lastPage() }}"><span>{{ $paginator->lastPage() }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
@endif