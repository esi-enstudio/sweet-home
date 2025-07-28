<main
    x-data="newsViewTracker(@js($post->slug))"
    x-init="startTimer()"
>
    <!-- banner section -->
    <section>
        <!-- banner section -->
        <div
            style="background-image: url('{{ asset('assets/img/bg/14.jpg') }}')"
            class="w-full bg-no-repeat bg-cover bg-center relative z-0 after:w-full after:h-full after:absolute after:top-0 after:left-0 after:bg-white after:bg-opacity-30 after:-z-1"
        >
            <div class="container py-110px">
                <h1 class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px">
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">
                        {{ $post->title }}
                    </span>
                </h1>

                <ul
                    class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4"
                >
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="{{ route('home') }}"
                        ><i class="fas fa-home text-secondary-color"></i> Home</a>
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        Blog Details
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- News Details section -->
    <section>
        <div class="container modal-container property-tab pt-30 pb-140px lg:pb-30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px">
                <!-- news main content -->
                <div class="lg:col-start-1 lg:col-span-8">
                    <!-- thumbnail -->
                    <div class="leading1">
                        <img
                            src="{{ $post->featured_image && Storage::disk('public')->exists($post->featured_image) ? Storage::url($post->featured_image) : '' }}"
                            class="w-full -mb-1 rounded-lg"
                            alt="{{ $post->title }}"
                        >
                    </div>

                    <div class="px-5 md:px-50px py-50px border-2 border-border-color-11">
                        <div>
                            <ul class="mb-5">
                                <li>
                                    {{-- ক্যাটাগরি --}}
                                    <a
                                        class="text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-secondary-color hover:bg-primary-color hover:text-white font-semibold"
                                        href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                                    >
                                        <span class="leading-1.8 md:leading-1.8">
                                            {{ $post->category->name }}
                                        </span>
                                    </a>
                                </li>
                            </ul>

                            <h1 class="text-2xl md:text-3xl font-semibold text-heading-color mb-5">
                                <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">{{ $post->title }}</span>
                            </h1>

                            <ul class="flex gap-x-15px md:gap-x-30px items-center mb-5">
                                <li>
                                    <div>
                                        <a href="{{ route('blog.index', ['user' => $post->user->slug]) }}" class="flex items-center gap-10px text-xs md:text-sm font-semibold">
                                            <img
                                                src="{{ $post->user->avatar_url && Storage::disk('public')->exists($post->user->avatar_url)
                                                                         ? Storage::url($post->user->avatar_url)
                                                                         : asset('assets/img/default-user-avatar.png') }}"
                                                alt="{{ $post->title }}"
                                                class="flex-shrink-0 w-30px h-30px rounded-100%"
                                            >
                                            <span>{{ $post->user->name }}</span>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <p class="text-xs md:text-sm font-semibold">
                                        <span class="leading-1.8 md:leading-1.8">
                                            <i class="far fa-calendar-alt text-secondary-color mr-5px"></i>
                                            {{ $post->published_at->format('F d, Y') }}
                                        </span>
                                    </p>
                                </li>

                                <li>
                                    <a class="text-xs md:text-sm font-semibold" href="#">
                                        <span class="leading-1.8 md:leading-1.8">
                                            <i class="far fa-comments text-secondary-color mr-5px"></i>
                                            {{ $post->comments->count() }}
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a class="text-xs md:text-sm font-semibold" href="#">
                                        <span class="leading-1.8 md:leading-1.8">
                                            <i class="far fa-eye text-secondary-color mr-5px"></i>
                                            {{ $post->views_count }}
                                        </span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Description -->
                            {!! $post->content !!}

                            <!-- tags and social -->
                            <div class="flex flex-col lg:flex-row lg:justify-between mt-20">
                                <!-- tags -->
                                <div>
                                    <h4 class="text-17px md:text-lg lg:text-xl font-bold text-heading-color mb-15px">
                                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">Releted Tags</span>
                                    </h4>

                                    <ul class="flex gap-10px flex-wrap items-center font-poppins">
                                        @forelse($post->tags as $tag)
                                        <li>
                                            <a
                                                href="#"
                                                class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                            >
                                                {{ $tag->name }}
                                            </a>
                                        </li>
                                        @empty
                                            <p>No tags found.</p>
                                        @endforelse
                                    </ul>
                                </div>

                                <!-- social -->
                                <div>
                                    <h4 class="text-17px md:text-lg lg:text-xl font-bold text-heading-color mb-15px mt-30px lg:mt-0">
                                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">Social Share</span>
                                    </h4>

                                    <ul class="text-sm lg:text-base flex gap-18px justify-center items-center text-color-1">
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://www.facebook.com/"
                                            ><i class="fab fa-facebook-f"></i
                                                ></a>
                                        </li>
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://x.com/"
                                            ><i class="fab fa-twitter"></i
                                                ></a>
                                        </li>
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://www.linkedin.com/"
                                            ><i class="fab fa-linkedin"></i
                                                ></a>
                                        </li>
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://www.youtube.com/"
                                            ><i class="fab fa-youtube"></i
                                                ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr class="my-50px border-b border-border-color-12 opacity-25">

                            <!-- navigation -->
                            <div
                                class="grid grid-cols-1 lg:grid-cols-2 relative z-0 after:content-['\e958'] after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:text-3xl after:font-icomoon after:z-1 after:text-secondary-color"
                            >
                                <!-- prev blog -->
                                <div>
                                    @if($this->previousPost)
                                        <h4 class="text-sm md:text-15px lg:text-base font-bold text-secondary-color mb-3">
                                            <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">Prev Post</span>
                                        </h4>

                                        <h4 class="text-lg lg:text-2xl font-semibold text-heading-color">
                                            <a
                                                href="{{ route('blog.show', $this->previousPost->slug) }}"
                                                class="leading-1.3 md:leading-1.3 xl:leading-1.3">
                                                {{ \Illuminate\Support\Str::limit($this->previousPost->title, 20) }}
                                            </a>
                                        </h4>
                                    @endif
                                </div>

                                <!-- next  blog -->
                                <div class="text-end">
                                    @if($this->nextPost)
                                        <h4 class="text-sm md:text-15px lg:text-base font-bold text-secondary-color mb-3">
                                            <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">Next Post</span>
                                        </h4>

                                        <h4 class="text-lg lg:text-2xl font-semibold text-heading-color">
                                            <a
                                                href="{{ route('blog.show', $this->nextPost->slug) }}"
                                                class="leading-1.3 md:leading-1.3 xl:leading-1.3">
                                                {{ \Illuminate\Support\Str::limit($this->nextPost->title, 20) }}
                                            </a>
                                        </h4>
                                    @endif
                                </div>
                            </div>

                            <hr class="my-50px border-0 border-b border-border-color-12 opacity-25">

                            <!-- related blogs -->
                            <div>
                                <h4
                                    class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px"
                                >
                                    Related Post
                                </h4>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-30px mb-20">
                                    <!-- card -->
                                    @foreach($this->relatedPosts as $relatedPost)
                                        <x-blog.post-card :post="$relatedPost" />
                                    @endforeach
                                </div>
                            </div>

                            <!-- author -->
                            <div class="flex flex-col md:flex-row p-10 px-5 md:px-10 border-2 border-border-color-11">
                                <div class="mr-0 md:mr-10 lg:mr-30px xl:mr-10 mb-30px md:mb-0 flex-shrink-0">
                                    <img
                                        src="{{ $post->user->avatar_url && Storage::disk('public')->exists($post->user->avatar_url)
                                                                         ? Storage::url($post->user->avatar_url)
                                                                         : asset('assets/img/default-user-avatar.png') }}"
                                        class="max-full w-100px md:w-[180px] lg:w-[120px] xl:w-[180px] rounded-lg"
                                        alt="{{ $post->user->name }}"
                                    >
                                </div>

                                <div>
                                    <h6 class="text-sm text-secondary-color font-bold mb-0">
                                        <span class="leading-1.3">Written by</span>
                                    </h6>
                                    <h2
                                        class="text-xl md:text-22px lg:text-26px xl:text-3xl text-heading-color font-bold mb-10px"
                                    >
                                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">{{ $post->user->name }}</span>
                                    </h2>

                                    <p class="text-sm flex items-center gap-4 mt-2">
                                        <span class="leading-1.8">
                                            {{ $post->user->bio }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <!-- Comments -->
                            <livewire:blog.comments :post="$post" :wire:key="$post->id"/>

                        </div>
                    </div>
                </div>

                <!-- sidebar -->
                <div class="lg:col-start-9 lg:col-span-4 pt-100px lg:pt-0">
                    <!-- author details -->
                    <x-blog.sidebar.author-details :author="$post->user" />

                    <!-- Top Rated Properties -->
                    <livewire:single-property.top-rated-properties-widget />

                    <!-- Top Categories-->
                    <livewire:blog.sidebar-post-categories />

                    <!-- Popular Properties-->
                    <livewire:single-property.popular-properties-widget />

                    <!-- Latest Blogs -->
                    <livewire:blog.sidebar-latest-blogs :exclude="$post->id"/>

                    <!-- Twitter Feeds -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Twitter Feeds</span
                  >
                        </h4>

                        <ul class="text-sm lg:text-base">
                            <li class="pb-30px mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="flex-shrink-0">
                                        <a
                                            href="blog-details.html"
                                            class="leading-1.8 lg:leading-11.8 text-secondary-color"
                                        >
                                            <i class="fab fa-twitter"></i
                                            ></a>
                                    </div>

                                    <div>
                                        <div class="mb-2">
                                            <p class="leading-1.3 lg:leading-1.3">
                                                Carsafe - #Gutenberg ready @wordpress Theme for Car
                                                Service, Auto Parts, Car Dealer available on <br >
                                                @website
                                            </p>
                                            <a
                                                href="blog-details.html"
                                                class="leading-1.3 lg:leading-1.3 text-secondary-color"
                                            >https://website.net</a
                                            >
                                        </div>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pb-30px mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="flex-shrink-0">
                                        <a
                                            href="blog-details.html"
                                            class="leading-1.8 lg:leading-11.8 text-secondary-color"
                                        >
                                            <i class="fab fa-twitter"></i
                                            ></a>
                                    </div>

                                    <div>
                                        <div class="mb-2">
                                            <p class="leading-1.3 lg:leading-1.3">
                                                Carsafe - #Gutenberg ready @wordpress Theme for Car
                                                Service, Auto Parts, Car Dealer available on <br >
                                                @website
                                            </p>
                                            <a
                                                href="blog-details.html"
                                                class="leading-1.3 lg:leading-1.3 text-secondary-color"
                                            >https://website.net</a
                                            >
                                        </div>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-x-5">
                                    <div class="flex-shrink-0">
                                        <a
                                            href="blog-details.html"
                                            class="leading-1.8 lg:leading-11.8 text-secondary-color"
                                        >
                                            <i class="fab fa-twitter"></i
                                            ></a>
                                    </div>

                                    <div>
                                        <div class="mb-2">
                                            <p class="leading-1.3 lg:leading-1.3">
                                                Carsafe - #Gutenberg ready @wordpress Theme for Car
                                                Service, Auto Parts, Car Dealer available on <br >
                                                @website
                                            </p>
                                            <a
                                                href="blog-details.html"
                                                class="leading-1.3 lg:leading-1.3 text-secondary-color"
                                            >https://website.net</a
                                            >
                                        </div>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Follow Us -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Follow Us</span
                  >
                        </h4>
                        <ul class="flex gap-x-15px pt-4">
                            <li>
                                <a
                                    href="https://www.facebook.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-facebook-f"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="https://x.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-twitter"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="https://www.linkedin.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="https://www.instagram.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>

                    <!-- Popular Tags -->
                    <livewire:blog.sidebar-popular-tags />
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
    <script>
        function newsViewTracker(postSlug) {
            return {
                postSlug: postSlug,
                timeoutId: null,

                startTimer() {
                    // ১০ সেকেন্ডের (10000 মিলিসেকেন্ড) টাইমার সেট করুন
                    this.timeoutId = setTimeout(() => {
                        this.trackView();
                    }, 20000);

                    // ব্যবহারকারী পেজটি ত্যাগ করলে টাইমার বন্ধ করুন
                    window.addEventListener('beforeunload', () => {
                        clearTimeout(this.timeoutId);
                    });
                },

                trackView() {
                    // API-তে AJAX (fetch) রিকোয়েস্ট পাঠান
                    fetch(`/news/${this.postSlug}/track-view`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('View tracking response:', data.message);
                        })
                        .catch(error => {
                            console.error('Error tracking view:', error);
                        });
                }
            };
        }
    </script>
@endpush
