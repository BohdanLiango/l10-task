@if ($paginator->hasPages())
    <div class="flex justify-center mt-8">
        @if ($paginator->onFirstPage())
            <button class="bg-gray-500 hover:bg-blue-600 text-white py-2 px-4 rounded mr-2">Previous</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mr-2">Previous</a>
        @endif
        <span class="bg-gray-300 text-gray-700 py-2 px-4 rounded">
        @if($paginator->firstItem())
                {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}
            @else
                {{ $paginator->count() }}
            @endif
            of {{ $paginator->total() }} results
        </span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded ml-2">Next</a>
        @else
            <button class="bg-gray-500 hover:bg-blue-600 text-white py-2 px-4 rounded ml-2">Next</button>
        @endif
    </div>
@endif
