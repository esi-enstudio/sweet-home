@if(isset($featuredListings))

    <section>
        <div class="container-3 pt-115px pb-[75px] modal-container">
            <!-- section heading -->
            <div class="text-center mb-50px">
                <p
                    class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-0.5 px-5 rounded-full inline-block font-semibold"
                >
                    <span class="leading-1.3">Properties</span>
                </p>

                <h2
                    class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold"
                >
                    <span class="leading-1.3">Featured Listings </span>
                </h2>
            </div>

            <div class="featured-apartments swiper-container relative">
                <!-- apartment cards  -->
                <div class="swiper featured-apartments-slider static">
                    <div class="swiper-wrapper">
                        <!-- card -->
                        @forelse($featuredListings as $listing)
                            <div class="swiper-slide mb-65px px-15px">
                                <div class="group border border-border-color-13 shadow-box-shadow-4">
                                    <!-- card thumbs -->
                                    <div class="relative leading-1">
                                        <a href="{{ route('single.property', $listing->slug) }}"
                                            class="overflow-hidden">
                                            <img
                                                src="{{ $listing->thumbnail && Storage::disk('public')->exists($listing->thumbnail)
                                                     ? Storage::url($listing->thumbnail)
                                                     : asset('assets/img/default-property-img.jpg') }}"
                                                alt="{{ $listing->title }}"
                                            >
                                        </a>

                                        <div class="absolute w-full left-0 bottom-0 px-15px pb-15px lg:px-30px bg-transparent bg-gradient-color-5">
                                            <div class="text-sm text-white flex justify-between items-center">
                                                <a href="{{ route('single.property', $listing->slug) }}" class="hover:text-secondary-color">
                                                    <i class="flaticon-pin"></i>
                                                    {{ \Illuminate\Support\Str::limit($listing?->address, 25) }}
                                                </a>

                                                <ul class="flex gap-10px">
                                                    <li>
                                                        <a
                                                            class="w-30px lg:w-42px h-30px flex justify-center items-center bg-transparent lg:bg-white lg:bg-opacity-35 hover:text-secondary-color"
                                                            href="{{ route('single.property', $listing->slug) }}"
                                                        >
                                                            <i class="fas fa-camera pr-1 leading-1"></i>
                                                            {{ $listing?->images_count }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            class="w-30px lg:w-42px h-30px flex justify-center items-center bg-transparent lg:bg-white lg:bg-opacity-35 hover:text-secondary-color"
                                                            href="{{ route('single.property', $listing->slug) }}"
                                                        >
                                                            <i class="fas fa-film pr-1 leading-1"></i>
                                                            {{ $listing?->videos_count }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        @if($listing?->listing_type == 'rent')
                                            <div class="text-xs sm:text-13px text-white px-10px py-1 sm:px-15px sm:pt-3px sm:pb-0 bg-green uppercase font-semibold absolute top-[15px] right-[18px] rounded-full">
                                                <span class="leading-5 sm:leading-25px block">
                                                    {{ $listing?->listing_type }}
                                                </span>
                                            </div>
                                        @elseif($listing?->listing_type == 'buy')
                                            <div class="text-xs sm:text-13px text-white px-10px py-1 sm:px-15px sm:pt-3px sm:pb-0 bg-orange uppercase font-semibold absolute top-[15px] right-[18px] rounded-full">
                                                <span class="leading-5 sm:leading-25px block">
                                                    {{ $listing?->listing_type }}
                                                </span>
                                            </div>
                                        @elseif($listing?->listing_type == 'sell')
                                            <div class="text-xs sm:text-13px text-white px-10px py-1 sm:px-15px sm:pt-3px sm:pb-0 bg-secondary-color uppercase font-semibold absolute top-[15px] right-[18px] rounded-full">
                                                <span class="leading-5 sm:leading-25px block">
                                                    {{ $listing?->listing_type }}
                                                </span>
                                            </div>
                                        @endif

                                    </div>

                                    <!-- card body -->
                                    <div class="px-5 pt-4 lg:px-30px lg:pt-5">
                                        <h5 class="text-lg text-secondary-color font-semibold mb-5px">
                                            @php
                                                $monthlyRent = number_format($listing?->rent_amount)
                                            @endphp
                                            <span class="leading-1.8">BDT {{ $monthlyRent }}</span>
                                            <label class="text-sm font-normal">/Month</label>
                                        </h5>
                                        <h4 class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px">
                                            <a
                                                href="{{ route('single.property', $listing->slug) }}"
                                                class="hover:text-secondary-color leading-1.3"
                                            >
                                                {{ \Illuminate\Support\Str::limit($listing?->title, 25) }}
                                            </a>
                                        </h4>
                                        <p class="text-sm mb-15px">
                                            <span class="leading-1.8">
                                                {{ \Illuminate\Support\Str::limit($listing?->description, 90) }}
                                            </span>
                                        </p>

{{--                                        <ul class="flex flex-wrap gap-15px py-4">--}}
                                        <ul class="flex justify-between gap-15px py-4">
                                            <li
                                                class="text-sm pr-4 border-r border-primary-color border-opacity-20"
                                            >
                                                <p class="leading-1.8 font-bold">
                                                    {{ $listing?->bedrooms }}<i class="flaticon-bed ml-1"></i>
                                                </p>
                                                <p class="leading-1.8">Beds</p>
                                            </li>
                                            <li
                                                class="text-sm pr-4 border-r border-primary-color border-opacity-20"
                                            >
                                                <p class="leading-1.8 font-bold">
                                                    {{ $listing?->bathrooms }}<i class="flaticon-clean ml-1"></i>
                                                </p>
                                                <p class="leading-1.8">Baths</p>
                                            </li>

                                            <li class="text-sm">
                                                <p class="leading-1.8 font-bold">
                                                    {{ $listing?->total_area }}<i class="flaticon-square-shape-design-interface-tool-symbol ml-1"></i>
                                                </p>
                                                <p class="leading-1.8">sq Ft</p>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- cart footer -->
                                    <div class="p-5 lg:p-30px lg:pt-5 border-t border-border-color-1">
                                        <div class="flex flex-wrap-reverse items-center justify-between gap-y-5">
                                            <div class="flex gap-x-3">
                                                <a href="#" class="w-10 h-10">
                                                    <img
                                                        class="w-full h-full rounded-100%"
                                                        src="{{ $listing->user->avatar_url && Storage::disk('public')->exists($listing->user->avatar_url)
                                                             ? Storage::url($listing->user->avatar_url)
                                                             : asset('assets/img/default-user-avatar.png') }}"
                                                        alt="{{ $listing->title }}"
                                                    >
                                                </a>

                                                <div>
                                                    <h4 class="text-sm font-semibold text-heading-color mb-0">
                                                        <a class="leading-1.3 hover:text-secondary-color" href="#">
                                                            {{ $listing->user->name }}
                                                        </a>
                                                    </h4>
                                                    @php
                                                        $array = explode('_', $listing->user->roles->first()?->name);
                                                        $str = implode(' ', $array);
                                                        $roleName = \Illuminate\Support\Str::title($str);
                                                    @endphp
                                                    <span class="text-xs"> {{ $roleName }} </span>
                                                </div>
                                            </div>
                                            <ul class="flex gap-x-2">
                                                <li>
                                                    <livewire:extra.wishlist-button
                                                        :property="$listing"
                                                        :wire:key="'wishlist-btn-' . $listing->id"
                                                    />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No featured data found.</p>
                        @endforelse
                    </div>

                    <!-- pagination -->
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal !-bottom-[6px]"></div>

                    <!--  navigation -->
                    <div class="hidden 3xl:block">
                        <div class="swiper-button-next z-1">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div class="swiper-button-prev z-1">
                            <i class="fas fa-arrow-left"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
