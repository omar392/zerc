@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
                <li>
                    <a href="#">Prev</a>
                </li>
            @else

                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">Prev</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li>
                                <a>{{ $page }}</a>
                            </li>
                        @else

                            <li>
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())

                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li>
                    <a>Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
