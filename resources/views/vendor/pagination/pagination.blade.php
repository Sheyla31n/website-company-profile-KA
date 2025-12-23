@if ($paginator->hasPages())
    <div class="pagination flex justify-center items-center gap-3 mt-10 text-gray-600 px-5 select-none">

        {{-- PREV --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 rounded text-gray-400 cursor-not-allowed">
                Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded hover:bg-gray-200">
                Prev
            </a>
        @endif

        {{-- PAGE NUMBERS --}}
        @foreach ($elements as $element)
            {{-- DOTS --}}
            @if (is_string($element))
                <span class="px-3 py-1">…</span>
            @endif

            {{-- LINKS --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 rounded bg-black text-white font-semibold">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 rounded hover:bg-gray-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- NEXT --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded hover:bg-gray-200">
                Next
            </a>
        @else
            <span class="px-3 py-1 rounded text-gray-400 cursor-not-allowed">
                Next
            </span>
        @endif

    </div>
@endif
