<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11">

    <h4 class="text-lg font-semibold text-heading-color mb-25px">
        <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">
            Top Categories
        </span>
    </h4>

    <ul>
        @foreach($this->categories as $category)
            <li>
                <a
                    {{-- blog.index হলো আপনার BlogPage কম্পোনেন্টের রাউটের নাম --}}
                    href="{{ route('blog.index', ['category' => $category->slug]) }}"
                    class="text-sm font-bold flex justify-between items-center group mt-15px">
                    <span class="leading-1.8">{{ $category->name }}</span>
                    <span class="leading-1.8 group-hover:text-paragraph-color">
                        ({{ $category->posts_count }})
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
