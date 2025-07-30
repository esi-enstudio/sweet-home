<main>
    <!-- banner section -->
    <section>
        <!-- banner section -->
        <div
            style="background-image: url('{{ asset('assets/img/bg/14.jpg') }}')"
            class="w-full bg-no-repeat bg-cover bg-center relative z-0 after:w-full after:h-full after:absolute after:top-0 after:left-0 after:bg-white after:bg-opacity-30 after:-z-1">
            <div class="container py-110px">
                <h1
                    class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px"
                >
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">Useful Articles</span>
                </h1>
                <ul
                    class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4"
                >
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="{{ route('home') }}"
                        ><i class="fas fa-home text-secondary-color"></i> Home</a
                        >
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        News
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- news grid section -->
    <section>
        <div class="container modal-container property-tab pt-30 pb-140px lg:pb-30">

            @if($this->posts->total() > 0)
                <form wire:submit.prevent class="mb-30px">
                    <div class="flex items-center">
                        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search your keyword..." class="flex-grow text-paragraph-color text-sm font-semibold bg-section-bg-1 px-5 outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-60px placeholder:text-heading-color block rounded-none">
                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-30px gap-y-50px mb-50px">

                    <!-- card -->
                    @foreach($this->posts as $post)
                        <div wire:key="blog-post-{{ $post->id }}" class="group">
                        <!-- card thumbs -->
                        <div class="relative leading-1">
                            <a href="{{ route('news.show', $post->slug) }}" class="overflow-hidden">
                                <img
                                    src="{{ $post->featured_image && Storage::disk('public')->exists($post->featured_image) ? Storage::url($post->featured_image) : '' }}"
                                    class="w-full group-hover:scale-110 transition-all duration-700"
                                    alt="{{ $post->title }}"
                                >
                            </a>
                        </div>

                        <!-- card body -->
                        <div class="p-30px shadow-box-shadow-4">
                            <ul class="mb-15px flex gap-x-25px items-center">
                                <li class="text-xs md:text-sm font-semibold">
                                    <a
                                        href="{{ route('news.index', ['user' => $post->user->slug]) }}"
                                        class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                    >
                                        <i class="far fa-user text-secondary-color"></i>
                                        {{ $post->user?->name }}
                                    </a>
                                </li>

                                <li class="text-xs md:text-sm font-semibold">
                                    <a
                                        href="{{ route('news.index', ['category' => $post->category->slug]) }}"
                                        class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                    >
                                        <i class="fas fa-tags text-secondary-color"></i>
                                        {{ $post->category?->name }}
                                    </a>
                                </li>
                            </ul>

                            <h4 class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color">
                                <a
                                    href="{{ route('news.show', $post->slug) }}"
                                    class="hover:text-secondary-color leading-1.3">
                                    {{ Str::limit($post->title, 45) }}
                                </a>
                            </h4>

                            <div class="pt-5 mt-5 lg:pt-5 border-t border-border-color-1">
                                <ul class="flex justify-between items-center">
                                    <li class="text-xs md:text-sm font-semibold">
                                        <p class="leading-1.8 flex gap-5px items-center">
                                            <i class="far fa-calendar-alt text-secondary-color"></i>
                                            {{ $post->published_at->format('F d, Y') }}
                                        </p>
                                    </li>

                                    <li class="text-xs md:text-sm font-semibold">
                                        <a
                                            href="{{ route('news.show', $post->slug) }}"
                                            class="leading-1.8 text-secondary-color uppercase"
                                        >
                                            Read more
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p>No news found.</p>
            @endif

            <!-- pagination -->
            <div class="flex justify-center pt-4">
                {{ $this->posts->onEachSide(0)->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </section>
</main>
