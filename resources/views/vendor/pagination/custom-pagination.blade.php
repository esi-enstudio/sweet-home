@if ($paginator->hasPages())
    <ul class="flex flex-wrap items-center gap-x-10px gap-y-4 justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-gray-400 bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 rounded-100% font-bold cursor-not-allowed">
                    <i class="fas fa-angle-double-left"></i>
                </span>
            </li>
        @else
            <li>
                <button type="button" wire:click="previousPage" rel="prev" class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold">
                    <i class="fas fa-angle-double-left"></i>
                </button>
            </li>
        @endif

        {{-- ################################# --}}
        {{-- #   ডিফল্ট এবং শক্তিশালী লুপ     # --}}
        {{-- ################################# --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true">
                    <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 rounded-100% font-bold">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page">
                            <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-white bg-secondary-color w-10 h-10 md:w-50px md:h-50px border-2 border-secondary-color rounded-100% font-bold">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <button type="button" wire:click="gotoPage({{ $page }})" class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold">
                                {{ $page }}
                            </button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button type="button" wire:click="nextPage" rel="next" class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold">
                    <i class="fas fa-angle-double-right"></i>
                </button>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-gray-400 bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 rounded-100% font-bold cursor-not-allowed">
                    <i class="fas fa-angle-double-right"></i>
                </span>
            </li>
        @endif
    </ul>
@endif







{{--@if ($paginator->hasPages())--}}
{{--    <ul class="flex flex-wrap items-center gap-x-10px gap-y-4 justify-center">--}}
{{--        --}}{{-- Previous Page Link --}}
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li class="disabled" aria-disabled="true">--}}
{{--                <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-gray-400 bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 rounded-100% font-bold cursor-not-allowed">--}}
{{--                    <i class="fas fa-angle-double-left"></i>--}}
{{--                </span>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li>--}}
{{--                <button type="button" wire:click="previousPage" rel="prev" class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold">--}}
{{--                    <i class="fas fa-angle-double-left"></i>--}}
{{--                </button>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        --}}{{-- ################################# --}}
{{--        --}}{{-- #    এখানে মূল লজিকটি শুরু     # --}}
{{--        --}}{{-- ################################# --}}
{{--        @php--}}
{{--            // ভ্যারিয়েবলগুলো ডিফাইন করা হচ্ছে--}}
{{--            $startRange = 1;--}}
{{--            $endRange = 2; // শুরুতে কতগুলো পেজ নম্বর দেখাবে--}}
{{--            $lastPage = $paginator->lastPage();--}}
{{--            $currentPage = $paginator->currentPage();--}}

{{--            // শেষ পেজের আগের পেজগুলো দেখানোর জন্য--}}
{{--            $startOfEndRange = max($lastPage, $endRange + 1);--}}
{{--        @endphp--}}

{{--        --}}{{-- প্রথম কয়েকটি পেজ (1, 2, 3...) --}}
{{--        @for ($i = $startRange; $i <= min($endRange, $lastPage); $i++)--}}
{{--            @if ($i == $currentPage)--}}
{{--                <li class="active" aria-current="page">--}}
{{--                    <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-white bg-secondary-color w-10 h-10 md:w-50px md:h-50px border-2 border-secondary-color rounded-100% font-bold">{{ $i }}</span>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li>--}}
{{--                    <button type="button" wire:click="gotoPage({{ $i }})" class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold">--}}
{{--                        {{ $i }}--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        @endfor--}}

{{--        --}}{{-- "Three Dots" Separator --}}
{{--        @if ($startOfEndRange > $endRange + 1)--}}
{{--            <li class="disabled" aria-disabled="true">--}}
{{--                <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 rounded-100% font-bold">...</span>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        --}}{{-- শেষের পেজগুলো দেখানো (12, 13) --}}
{{--        @for ($i = $startOfEndRange; $i <= $lastPage; $i++)--}}
{{--            @if ($i > $endRange) --}}{{-- নিশ্চিত করা হচ্ছে যে নম্বরগুলো পুনরাবৃত্তি না হয় --}}
{{--            @if ($i == $currentPage)--}}
{{--                <li class="active" aria-current="page">--}}
{{--                    <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-white bg-secondary-color w-10 h-10 md:w-50px md:h-50px border-2 border-secondary-color rounded-100% font-bold">{{ $i }}</span>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li>--}}
{{--                    <button type="button" wire:click="gotoPage({{ $i }})" class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold">--}}
{{--                        {{ $i }}--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--            @endif--}}
{{--        @endfor--}}

{{--        --}}{{-- ################################# --}}
{{--        --}}{{-- #      এখানে মূল লজিকটি শেষ       # --}}
{{--        --}}{{-- ################################# --}}

{{--        --}}{{-- Next Page Link --}}
{{--        @if ($paginator->hasMorePages())--}}
{{--            <li>--}}
{{--                <button type="button" wire:click="nextPage" rel="next" class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold">--}}
{{--                    <i class="fas fa-angle-double-right"></i>--}}
{{--                </button>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="disabled" aria-disabled="true">--}}
{{--                <span class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-gray-400 bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 rounded-100% font-bold cursor-not-allowed">--}}
{{--                    <i class="fas fa-angle-double-right"></i>--}}
{{--                </span>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--@endif--}}
