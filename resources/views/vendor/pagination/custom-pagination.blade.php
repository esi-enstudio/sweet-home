@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- এটি disabled বাটন --}}
            <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-gray-400 bg-white w-auto h-10 md:h-50px px-4 border-2 border-border-color-11 rounded-md font-bold cursor-not-allowed">
                « Previous
            </span>
        @else
            {{-- এটি enabled বাটন --}}
            <button
                type="button"
                {{-- এখানে পরিবর্তন করা হয়েছে --}}
                wire:click="setPage('{{ $paginator->previousCursor()->encode() }}', 'page')"
                wire:loading.attr="disabled"
                class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-auto h-10 md:h-50px px-4 border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-md font-bold"
            >
                « Previous
            </button>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- এটি enabled বাটন --}}
            <button
                type="button"
                {{-- এখানে পরিবর্তন করা হয়েছে --}}
                wire:click="setPage('{{ $paginator->nextCursor()->encode() }}', 'page')"
                wire:loading.attr="disabled"
                class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-auto h-10 md:h-50px px-4 border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-md font-bold"
            >
                Next »
            </button>
        @else
            {{-- এটি disabled বাটন --}}
            <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-gray-400 bg-white w-auto h-10 md:h-50px px-4 border-2 border-border-color-11 rounded-md font-bold cursor-not-allowed">
                Next »
            </span>
        @endif
    </nav>
@endif
