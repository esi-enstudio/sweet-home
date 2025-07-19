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
                                <div
                                    class="group border border-border-color-13 shadow-box-shadow-4"
                                >
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
                                    <div
                                        class="p-5 lg:p-30px lg:pt-5 border-t border-border-color-1"
                                    >
                                        <div
                                            class="flex flex-wrap-reverse items-center justify-between gap-y-5"
                                        >
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
                                                    <h4
                                                        class="text-sm font-semibold text-heading-color mb-0"
                                                    >
                                                        <a
                                                            class="leading-1.3 hover:text-secondary-color"
                                                            href="#"
                                                        >
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
                                                    <button
                                                        class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                        data-modal-index="1"
                                                    >
                                                        <i class="flaticon-expand leading-1"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button
                                                        class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                        data-modal-index="2"
                                                    >
                                                        <i class="flaticon-heart-1 leading-1"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <a
                                                        href="product-details.html"
                                                        class="w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                    ><i class="flaticon-add leading-1"></i
                                                        ></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="swiper-slide mb-65px px-15px">
                                <div
                                    class="group border border-border-color-13 shadow-box-shadow-4"
                                >
                                    <!-- card thumbs -->
                                    <div class="relative leading-1">
                                        <a
                                            href="#"
                                            class="overflow-hidden"
                                        >
                                            <img
                                                src="{{ asset('assets/img/product-3/1.jpg') }}"
                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                alt=""
                                            >
                                        </a>
                                        <div
                                            class="absolute w-full left-0 bottom-0 px-15px pb-15px lg:px-30px bg-transparent bg-gradient-color-5"
                                        >
                                            <div
                                                class="text-sm text-white flex justify-between items-center"
                                            >
                                                <a
                                                    href="locations.html"
                                                    class="hover:text-secondary-color"
                                                ><i class="flaticon-pin"></i> Belmont Gardens,
                                                    Chicago</a
                                                >
                                                <ul class="flex gap-10px">
                                                    <li>
                                                        <a
                                                            class="w-30px lg:w-42px h-30px flex justify-center items-center bg-transparent lg:bg-white lg:bg-opacity-35 hover:text-secondary-color"
                                                            href="product-details.html"
                                                        ><i class="fas fa-camera pr-1 leading-1"></i>
                                                            4</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            class="w-30px lg:w-42px h-30px flex justify-center items-center bg-transparent lg:bg-white lg:bg-opacity-35 hover:text-secondary-color"
                                                            href="product-details.html"
                                                        ><i class="fas fa-film pr-1 leading-1"></i> 2</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div
                                            class="text-xs sm:text-13px text-white px-10px py-1 sm:px-15px sm:pt-3px sm:pb-0 bg-green uppercase font-semibold absolute top-[15px] right-[18px]"
                                        >
                        <span class="leading-5 sm:leading-25px block"
                        >for rent</span
                        >
                                        </div>
                                    </div>
                                    <!-- card body -->
                                    <div class="px-5 pt-4 lg:px-30px lg:pt-5">
                                        <h5
                                            class="text-lg text-secondary-color font-semibold mb-5px"
                                        >
                                            <span class="leading-1.8">$34,900</span>
                                            <label class="text-sm font-normal">/Month</label>
                                        </h5>
                                        <h4
                                            class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px"
                                        >
                                            <a
                                                href="product-details.html"
                                                class="hover:text-secondary-color leading-1.3"
                                            >New Apartment Nice View</a
                                            >
                                        </h4>
                                        <p class="text-sm mb-15px">
                        <span class="leading-1.8"
                        >Beautiful Huge 1 Family House In Heart Of
                          <br >Westbury. Newly Renovated With New Wood</span
                        >
                                        </p>

                                        <ul class="flex flex-wrap gap-15px py-4">
                                            <li
                                                class="text-sm pr-4 border-r border-primary-color border-opacity-20"
                                            >
                                                <p class="leading-1.8 font-bold">
                                                    3<i class="flaticon-bed ml-1"></i>
                                                </p>
                                                <p class="leading-1.8">Bedrooms</p>
                                            </li>
                                            <li
                                                class="text-sm pr-4 border-r border-primary-color border-opacity-20"
                                            >
                                                <p class="leading-1.8 font-bold">
                                                    2<i class="flaticon-clean ml-1"></i>
                                                </p>
                                                <p class="leading-1.8">Bedrooms</p>
                                            </li>

                                            <li class="text-sm">
                                                <p class="leading-1.8 font-bold">
                                                    3450<i
                                                        class="flaticon-square-shape-design-interface-tool-symbol ml-1"
                                                    ></i>
                                                </p>
                                                <p class="leading-1.8">square Ft</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- cart footer -->
                                    <div
                                        class="p-5 lg:p-30px lg:pt-5 border-t border-border-color-1"
                                    >
                                        <div
                                            class="flex flex-wrap-reverse items-center justify-between gap-y-5"
                                        >
                                            <div class="flex gap-x-3">
                                                <a href="team-details.html" class="w-10 h-10"
                                                ><img
                                                        src="{{ asset('assets/img/blog/author.jpg') }}"
                                                        alt=""
                                                        class="w-full h-full rounded-100%"
                                                    ></a>
                                                <div>
                                                    <h4
                                                        class="text-sm font-semibold text-heading-color mb-0"
                                                    >
                                                        <a
                                                            class="leading-1.3 hover:text-secondary-color"
                                                            href="team-details.html"
                                                        >William Seklo</a
                                                        >
                                                    </h4>
                                                    <span class="text-xs"> Estate Agents </span>
                                                </div>
                                            </div>
                                            <ul class="flex gap-x-2">
                                                <li>
                                                    <button
                                                        class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                        data-modal-index="1"
                                                    >
                                                        <i class="flaticon-expand leading-1"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button
                                                        class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                        data-modal-index="2"
                                                    >
                                                        <i class="flaticon-heart-1 leading-1"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <a
                                                        href="product-details.html"
                                                        class="w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                    ><i class="flaticon-add leading-1"></i
                                                        ></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- pagination -->
                    <div
                        class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal !-bottom-[6px]"
                    >

                    </div>
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

            <!-- modals -->
            <!-- modal apartment details-->
            <div
                class="modal hidden fixed top-0 left-0 w-full h-full z-xxl transition-all duration-500 bg-lightBlack opacity-0 overflow-y-auto"
            >
                <div
                    class="modal-close fixed md:absolute top-0 left-0 w-full h-full z-xsmall cursor-zoom-out"
                ></div>
                <div
                    class="modal-content transition-all duration-500 -translate-y-20 sm:max-w-500px lg:max-w-980px m-2 mt-150px sm:mx-auto relative z-small rounded-lg"
                >
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-x-30px p-30px bg-white relative"
                    >
                        <div>
                            <img src="{{ asset('assets/img/product/4.png') }}" class="w-full" alt="" >
                        </div>

                        <!-- card body -->
                        <div class="pl-25px">
                            <div class="absolute right-4 top-4">
                                <button
                                    class="modal-close w-10 h-10 leading-10 text-center bg-section-bg-1 text-black text-25px inline-block"
                                >
                                    <span>×</span>
                                </button>
                            </div>
                            <ul class="flex items-center mb-5px">
                                <li>
                                    <a
                                        href="#"
                                        class="text-xs text-ratings hover:text-secondary-color"
                                    ><i class="fas fa-star leading-1.8"></i
                                        ></a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-xs text-ratings hover:text-secondary-color"
                                    ><i class="fas fa-star leading-1.8"></i
                                        ></a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-xs text-ratings hover:text-secondary-color"
                                    ><i class="fas fa-star leading-1.8"></i
                                        ></a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-xs text-ratings hover:text-secondary-color"
                                    ><i class="fas fa-star-half-alt leading-1.8"></i
                                        ></a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-xs text-ratings hover:text-secondary-color"
                                    ><i class="far fa-star leading-1.8"></i
                                        ></a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-xs text-ratings hover:text-secondary-color"
                                    >
                                        ( 95 Reviews )</a
                                    >
                                </li>
                            </ul>

                            <h4
                                class="text-22px md:text-2xl font-bold text-heading-color mb-0"
                            >
                                <a
                                    href="product-details.html"
                                    class="leading-1.3 hover:text-secondary-color"
                                >3 Rooms Manhattan</a
                                >
                            </h4>
                            <p
                                class="text-34px md:text-50px text-secondary-color font-semibold mb-5 pb-0 border-b border-border-color-12 border-opacity-25 leading-1.2"
                            >
                                <span>$34,900</span>
                                <del
                                    class="text-26px md:text-40px leading-1.2 opacity-60 pl-1"
                                >$36,500</del
                                >
                            </p>
                            <p class="text-sm lg:text-base mb-9 md:mb-10">
                    <span class="leading-1.8"
                    >Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      Dignissimos repellendus repudiandae incidunt quidem
                      pariatur expedita, quo quis modi tempore non.</span
                    >
                            </p>

                            <ul
                                class="flex flex-wrap gap-5 pb-5 mb-5 border-b border-border-color-12 border-opacity-25"
                            >
                                <li class="text-sm">
                                    <button
                                        class="modal-open leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                        data-modal-index="3"
                                    >
                                        <i class="far fa-heart px-0.5"></i> Add to Wishlist
                                    </button>
                                </li>

                                <li class="text-sm">
                                    <button
                                        class="leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                    >
                                        <i class="fas fa-exchange-alt px-0.5"></i> Compare
                                    </button>
                                </li>
                            </ul>
                            <!-- social area -->
                            <ul class="flex gap-x-[18px] items-center">
                                <li>
                                    <p class="text-sm lg:text-base">
                                        <span class="leading-1.8">Share</span>
                                    </p>
                                </li>
                                <li>
                                    <a
                                        href="https://www.facebook.com/"
                                        class="text-sm lg:text-base hover:text-secondary-color"
                                    >
                                        <i class="fab fa-facebook-f leading-1.8"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://x.com/"
                                        class="text-sm lg:text-base hover:text-secondary-color"
                                    >
                                        <i class="fab fa-twitter leading-1.8"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/"
                                        class="text-sm lg:text-base hover:text-secondary-color"
                                    >
                                        <i class="fab fa-linkedin leading-1.8"></i>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/"
                                        class="text-sm lg:text-base hover:text-secondary-color"
                                    >
                                        <i class="fab fa-instagram leading-1.8"></i>
                                    </a>
                                </li>
                            </ul>

                            <!-- action -->
                            <div class="text-end">
                                <a
                                    href="product-details.html"
                                    class="text-xs hover:text-secondary-color underline hover:underline"
                                >
                                    <span class="leading-1.8">View Details</span></a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal  wishlist 1-->
            <div
                class="modal hidden fixed top-0 left-0 w-full h-full z-xxl transition-all duration-500 bg-lightBlack opacity-0 overflow-y-auto"
            >
                <div
                    class="modal-close fixed md:absolute top-0 left-0 w-full h-full z-xsmall cursor-zoom-out"
                ></div>

                <div
                    class="modal-content transition-all duration-500 -translate-y-20 max-w-500px m-2 mt-150px sm:mx-auto relative z-small p-30px bg-white"
                >
                    <div class="flex">
                        <div class="w-125px mr-5 flex-shrink-0">
                            <img src="{{ asset('assets/img/product/4.png') }}" class="w-full" alt="" >
                        </div>

                        <!-- card body -->
                        <div class="pl-25px">
                            <div class="absolute right-4 top-4">
                                <button
                                    class="modal-close w-10 h-10 leading-10 text-center bg-black bg-opacity-5 text-black text-25px inline-block"
                                >
                                    <span>×</span>
                                </button>
                            </div>

                            <h4
                                class="text-base lg:text-lg font-bold text-heading-color mb-10px"
                            >
                                <a
                                    href="product-details.html"
                                    class="leading-1.3 hover:text-secondary-color"
                                >3 Rooms Manhattan</a
                                >
                            </h4>

                            <p
                                class="text-sm lg:text-base mb-5 md:mb-6  "
                            >
                                <i class="fa fa-check-circle leading-1 text-green float-left clear-both pr-1.5 mt-1.5"></i>
                                Successfully added to your Wishlist
                            </p>
                            <!-- action -->
                            <div>
                                <h5
                                    class="capitalize text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block"
                                >
                      <span
                          class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"
                      ></span>
                                    <a
                                        href="wishlist.html"
                                        class="relative z-10 px-5 py-5px group-hover:text-heading-color leading-23px"
                                    >View Wishlist</a
                                    >
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal  wishlist 2-->
            <div
                class="modal hidden fixed top-0 left-0 w-full h-full z-xxl transition-all duration-500 bg-lightBlack opacity-0 overflow-y-auto"
            >
                <div
                    class="modal-close fixed md:absolute top-0 left-0 w-full h-full z-xsmall cursor-zoom-out"
                ></div>

                <div
                    class="modal-content transition-all duration-500 -translate-y-20 max-w-500px m-2 mt-150px sm:mx-auto relative z-small p-30px bg-white"
                >
                    <div class="flex">
                        <div class="w-125px mr-5 flex-shrink-0">
                            <img src="{{ asset('assets/img/product/4.png') }}" class="w-full" alt="" >
                        </div>

                        <!-- card body -->
                        <div class="pl-25px">
                            <div class="absolute right-4 top-4">
                                <button
                                    class="modal-close w-10 h-10 leading-10 text-center bg-black bg-opacity-5 text-black text-25px inline-block"
                                >
                                    <span>×</span>
                                </button>
                            </div>

                            <h4
                                class="text-base lg:text-lg font-bold text-heading-color mb-10px"
                            >
                                <a
                                    href="product-details.html"
                                    class="leading-1.3 hover:text-secondary-color"
                                >3 Rooms Manhattan</a
                                >
                            </h4>

                            <p
                                class="text-sm lg:text-base mb-5 md:mb-6  "
                            >
                                <i class="fa fa-check-circle leading-1 text-green float-left clear-both pr-1.5 mt-1.5"></i>
                                Successfully added to your Wishlist
                            </p>
                            <!-- action -->
                            <div>
                                <h5
                                    class="capitalize text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block"
                                >
                      <span
                          class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"
                      ></span>
                                    <a
                                        href="wishlist.html"
                                        class="relative z-10 px-5 py-5px group-hover:text-heading-color leading-23px"
                                    >View Wishlist</a
                                    >
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endif
