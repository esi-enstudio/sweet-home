@props(['properties'])

<div>
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
        Related Properties
    </h4>
    <div class="-mx-15px modal-container">
        <div class="grid grid-cols-1 sm:grid-cols-2">
            <!-- card -->
            @foreach($properties as $property)
                <div class="apart-card mb-50px px-15px">
                    <div
                        class="group border border-border-color-13 shadow-box-shadow-4"
                    >
                        <!-- card thumbs -->
                        <div class="relative leading-1">
                            <a
                                href="{{ route('single.property', $property->slug) }}"
                                class="overflow-hidden"
                            >
                                <img
                                    src="{{ $property->thumbnail && Storage::disk('public')->exists($property->thumbnail)
                                        ? Storage::url($property->thumbnail)
                                        : asset('assets/img/default-property-img.jpg') }}"
                                    class="w-full group-hover:scale-110 transition-all duration-700"
                                    alt="{{ $property->title }}"
                                >
                            </a>

                            <div class="absolute top-10 lg:top-5 right-[30px]">
                                <a href="#" class="w-50px h-50px">
                                    <img
                                        src="{{ $property->user->avatar_url && Storage::disk('public')->exists($property->user->avatar_url)
                                             ? Storage::url($property->user->avatar_url)
                                             : asset('assets/img/default-user-avatar.png') }}"
                                        alt="{{ $property->user->name }}"
                                        class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                    >
                                </a>
                            </div>
                        </div>

                        <!-- card body -->
                        <div class="px-5 pt-30px lg:px-30px">
                            <p class="text-secondary-color font-semibold mb-15px uppercase">
                                <span class="leading-25px">{{ $property?->listing_type }}</span>
                            </p>
                            <h4 class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px">
                                <a href="{{ route('single.property', $property->slug) }}" class="hover:text-secondary-color leading-1.3">
                                    {{ \Illuminate\Support\Str::limit($property->title, 26) }}
                                </a>
                            </h4>

                            <div class="text-sm">
                                <a href="#" class="hover:text-secondary-color">
                                    <i class="flaticon-pin text-secondary-color mr-0.5"></i>
                                    {{ \Illuminate\Support\Str::limit($property->address, 36) }}
                                </a>
                            </div>

                            <ul class="flex flex-wrap gap-15px pt-4 pb-5">
                                <li>
                                    <p class="leading-1.8 font-bold text-sm">
                                        {{ $property->bedrooms }} <span class="font-normal">Bed</span>
                                    </p>
                                </li>
                                <li>
                                    <p class="leading-1.8 font-bold text-sm">
                                        {{ $property->bathrooms }} <span class="font-normal">Bath</span>
                                    </p>
                                </li>

                                <li>
                                    <p class="leading-1.8 font-bold text-sm">
                                        {{ $property->total_area }} <span class="font-normal">Square Ft</span>
                                    </p>
                                </li>
                            </ul>

                            <div class="card-quick-area flex gap-x-2 pb-30px leading-1 transition-all duration-300">
                                <ul class="flex gap-x-2">
                                    <li>
                                        <livewire:extra.wishlist-button
                                            :property="$property"
                                            :wire:key="'wishlist-btn-' . $property->id"
                                        />
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- cart footer -->
                        <div class="p-5 lg:px-30px border-t border-border-color-1">
                            <h5 class="text-lg text-secondary-color font-semibold mb-5px">
                                <span class="leading-1.8">BDT {{ number_format($property->rent_amount) }}</span>
                                <label class="text-sm font-normal">/Month</label>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach


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
                            <img
                                src="assets/img/product/4.png"
                                class="w-full"
                                alt=""
                            >
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
                                    ><i
                                            class="fas fa-star-half-alt leading-1.8"
                                        ></i
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
                              >Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Dignissimos repellendus
                                repudiandae incidunt quidem pariatur expedita,
                                quo quis modi tempore non.</span
                              >
                            </p>

                            <ul
                                class="flex flex-wrap gap-5 pb-5 mb-5 border-b border-border-color-12 border-opacity-25"
                            >
                                <li class="text-sm">
                                    <button
                                        data-modal-index="3"
                                        class="modal-open leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                    >
                                        <i class="far fa-heart px-0.5"></i> Add to
                                        Wishlist
                                    </button>
                                </li>

                                <li class="text-sm">
                                    <button
                                        class="leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                    >
                                        <i class="fas fa-exchange-alt px-0.5"></i>
                                        Compare
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
                            <img src="assets/img/product/4.png" class="w-full" alt="" >
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
                            <img src="assets/img/product/4.png" class="w-full" alt="" >
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
                                <h5 class="capitalize text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block">
                                                      <span
                                                          class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"></span>
                                    <a href="wishlist.html"
                                       class="relative z-10 px-5 py-5px group-hover:text-heading-color leading-23px">
                                        View Wishlist</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
