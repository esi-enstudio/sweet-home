<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11">
    <h4 class="text-lg font-semibold text-heading-color mb-25px">
        <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">Top Categories</span>
    </h4>

    @if($this->categories->isNotEmpty())
        <ul>
            @foreach($this->categories as $category)
                <li>
                    <a
                        href="{{ route('properties', ['selectedTypes' => [$category->id]]) }}"
                        class="text-sm font-bold flex justify-between items-center group mt-15px">
                        <span class="leading-1.8">{{ $category->name }}</span>
                        <span class="leading-1.8 group-hover:text-paragraph-color">({{ $category->properties_count }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-sm text-gray-500">No categories to show.</p>
    @endif
</div>
