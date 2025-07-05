<main>
{{--    {{ $property->media }}--}}
    <!-- banner section -->
    <section>
        {{-- ব্যানার এবং ব্রেডক্রাম্ব সেকশন --}}
        <x-single-property.banner :title="$property->title" />
    </section>

    {{-- মিডিয়া স্লাইডার (প্রধান ছবি) --}}
    <x-single-property.media-slider :property="$property" />

    <!-- প্রধান কন্টেন্ট (বাম অংশ) -->
    <section>
        <div class="container modal-container property-tab pt-70px pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px">
                <!-- details body -->
                <div class="lg:col-start-1 lg:col-span-8">
                    <!--  featured//rent//date//comments//title//address -->
                    <x-single-property.header :property="$property" />
                    <!-- Description -->
                    <x-single-property.description :description="$property->description" />
                    <!-- Property Information -->
                    <x-single-property.property-info :property="$property" />
                    <!-- Space and Overviews-->
                    <x-single-property.space-overview :spaces="$property->spaceOverviews" />
                    <!-- Gallery -->
                    <x-single-property.gallery :property="$property" />
                    <!-- Amenities -->
                    <x-single-property.amenities :amenities="$property->amenities" />
                    <!-- Location -->
                    <x-single-property.location-map :lat="$property->latitude" :lng="$property->longitude" />
                    <!-- Floor Plans -->
                    <x-single-property.floor-plans :floorPlans="$property->floorPlans" />
                    <!-- Property Video -->
                    <x-single-property.video :property="$property" />
                    <!-- Customer Reviews -->
                    <livewire:property-reviews :property="$property"/>
{{--                    <x-single-property.customer-reviews :reviews="$property->reviews" :propertyId="$property->id" />--}}
                    <x-single-property.related-properties :properties="$this->relatedProperties" />






                        <!-- Related Properties -->
                        <h4
                            class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                        >
                            Related Properties
                        </h4>
                        <div class="-mx-15px modal-container">
                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <!-- card 1 -->
                                <div class="apart-card mb-50px px-15px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1">
                                            <a
                                                href="product-details.html"
                                                class="overflow-hidden"
                                            >
                                                <img
                                                    src="assets/img/product-3/1.jpg"
                                                    class="w-full group-hover:scale-110 transition-all duration-700"
                                                    alt=""
                                                >
                                            </a>

                                            <div class="absolute top-10 lg:top-5 right-[30px]">
                                                <a href="team-details.html" class="w-50px h-50px"
                                                ><img
                                                        src="assets/img/blog/author.jpg"
                                                        alt=""
                                                        class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                    ></a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="px-5 pt-30px lg:px-30px">
                                            <p
                                                class="text-secondary-color font-semibold mb-15px uppercase"
                                            >
                                                <span class="leading-25px">For Rent</span>
                                            </p>
                                            <h4
                                                class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px"
                                            >
                                                <a
                                                    href="product-details.html"
                                                    class="hover:text-secondary-color leading-1.3"
                                                >New Apartment Nice View</a
                                                >
                                            </h4>

                                            <div class="text-sm">
                                                <a
                                                    href="locations.html"
                                                    class="hover:text-secondary-color"
                                                ><i
                                                        class="flaticon-pin text-secondary-color mr-0.5"
                                                    ></i>
                                                    Belmont Gardens, Chicago</a
                                                >
                                            </div>

                                            <ul class="flex flex-wrap gap-15px pt-4 pb-5">
                                                <li>
                                                    <p class="leading-1.8 font-bold text-sm">
                                                        3 <span class="font-normal">Bed</span>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="leading-1.8 font-bold text-sm">
                                                        2 <span class="font-normal">Bath</span>
                                                    </p>
                                                </li>

                                                <li>
                                                    <p class="leading-1.8 font-bold text-sm">
                                                        3450 <span class="font-normal">Square Ft</span>
                                                    </p>
                                                </li>
                                            </ul>
                                            <div
                                                class="card-quick-area flex gap-x-2 pb-30px leading-1 transition-all duration-300"
                                            >
                                                <ul class="flex gap-x-2">
                                                    <li>
                                                        <button
                                                            data-modal-index="1"
                                                            class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                        >
                                                            <i class="flaticon-expand leading-1"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            data-modal-index="2"
                                                            class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
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
                                        <!-- cart footer -->
                                        <div
                                            class="p-5 lg:px-30px border-t border-border-color-1"
                                        >
                                            <h5
                                                class="text-lg text-secondary-color font-semibold mb-5px"
                                            >
                                                <span class="leading-1.8">$34,900</span>
                                                <label class="text-sm font-normal">/Month</label>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 2 -->
                                <div class="apart-card mb-50px px-15px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1">
                                            <a
                                                href="product-details.html"
                                                class="overflow-hidden"
                                            >
                                                <img
                                                    src="assets/img/product-3/2.jpg"
                                                    class="w-full group-hover:scale-110 transition-all duration-700"
                                                    alt=""
                                                >
                                            </a>

                                            <div class="absolute top-10 lg:top-5 right-[30px]">
                                                <a href="team-details.html" class="w-50px h-50px"
                                                ><img
                                                        src="assets/img/blog/author.jpg"
                                                        alt=""
                                                        class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                    ></a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="px-5 pt-30px lg:px-30px">
                                            <p
                                                class="text-secondary-color font-semibold mb-15px uppercase"
                                            >
                                                <span class="leading-25px">For Sale</span>
                                            </p>
                                            <h4
                                                class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px"
                                            >
                                                <a
                                                    href="product-details.html"
                                                    class="hover:text-secondary-color leading-1.3"
                                                >New Apartment Nice View</a
                                                >
                                            </h4>

                                            <div class="text-sm">
                                                <a
                                                    href="locations.html"
                                                    class="hover:text-secondary-color"
                                                ><i
                                                        class="flaticon-pin text-secondary-color mr-0.5"
                                                    ></i>
                                                    Belmont Gardens, Chicago</a
                                                >
                                            </div>

                                            <ul class="flex flex-wrap gap-15px pt-4 pb-5">
                                                <li>
                                                    <p class="leading-1.8 font-bold text-sm">
                                                        3 <span class="font-normal">Bed</span>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="leading-1.8 font-bold text-sm">
                                                        2 <span class="font-normal">Bath</span>
                                                    </p>
                                                </li>

                                                <li>
                                                    <p class="leading-1.8 font-bold text-sm">
                                                        3450 <span class="font-normal">Square Ft</span>
                                                    </p>
                                                </li>
                                            </ul>
                                            <div
                                                class="card-quick-area flex gap-x-2 pb-30px leading-1 transition-all duration-300"
                                            >
                                                <ul class="flex gap-x-2">
                                                    <li>
                                                        <button
                                                            data-modal-index="1"
                                                            class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                        >
                                                            <i class="flaticon-expand leading-1"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button
                                                            data-modal-index="2"
                                                            class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
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
                                        <!-- cart footer -->
                                        <div
                                            class="p-5 lg:px-30px border-t border-border-color-1"
                                        >
                                            <h5
                                                class="text-lg text-secondary-color font-semibold mb-5px"
                                            >
                                                <span class="leading-1.8">$34,900</span>
                                                <label class="text-sm font-normal">/Month</label>
                                            </h5>
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
                        </div>
                </div>


                <!-- সাইডবার (ডান অংশ) -->
                <div class="lg:col-start-9 lg:col-span-4 pt-60px lg:pt-0">

                    <x-single-property.owner-info :agent="$property->user" />
                    <x-single-property.booking-form :propertyId="$property->id" />

                    {{-- পুনরায় ব্যবহারযোগ্য সাইডবার উইজেট --}}
                    <x-single-property.sidebar.top-rated-properties />
                    <x-single-property.sidebar.top-categories />
                    <x-single-property.sidebar.popular-properties />
                    <x-single-property.sidebar.latest-blogs />
                    <x-single-property.sidebar.popular-tags />

                    <!-- author details -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <div class="flex flex-col items-center text-center">
                            <div class="mb-25px">
                                <img
                                    src="assets/img/team/4.jpg"
                                    alt=""
                                    class="w-140px h-140px rounded-100%"
                                >
                            </div>
                            <h4 class="mb-15px lg:text-lg text-heading-color font-bold">
                    <span class="leading-1.3 lg:leading-1.3"
                    >Rosalina D. Willaimson</span
                    >
                            </h4>
                            <p class="text-[12.25px] lg:text-sm">
                                <span class="lg:leading-1 8"> Traveller/Photographer </span>
                            </p>
                            <div>
                                <ul class="text-xs text-ratings flex items-center mb-10px">
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="far fa-star"></i></a>
                                    </li>
                                    <li class="pt-2"><a href="#"> ( 1 Reviews )</a></li>
                                </ul>
                            </div>
                            <p class="text-sm mb-22px hyphens-none">
                    <span class="leading-1.8"
                    >Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      Veritatis distinctio, odio, eligendi suscipit
                      reprehenderit atque.</span
                    >
                            </p>
                            <ul
                                class="text-sm lg:text-base flex gap-18px justify-center items-center text-color-1"
                            >
                                <li class="leading-1.8 lg:leading-1.8">
                                    <a href="https://www.facebook.com/"
                                    ><i class="fab fa-facebook-f"></i
                                        ></a>
                                </li>
                                <li class="leading-1.8 lg:leading-1.8">
                                    <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
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

                    <!-- Drop Messege For Book -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Drop Messege For Book</span
                  >
                        </h4>

                        <form>
                            <div class="grid gap-30px mb-10">
                                <!-- name -->
                                <div class="relative">
                                    <input
                                        type="text"
                                        placeholder="Your Name*"
                                        class="text-paragraph-color px-5 py-15px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                                    >
                                </div>
                                <!-- email -->
                                <div class="relative">
                                    <input
                                        type="text"
                                        placeholder="Your e-Mail*"
                                        class="text-paragraph-color px-5 py-15px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                                    >
                                </div>
                                <!-- message -->
                                <div class="relative">
                      <textarea


                          placeholder="Write Message..."
                          class="min-h-[150px] text-paragraph-color px-5 py-15px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                      ></textarea>
                                </div>
                            </div>

                            <!-- submit button -->

                            <div>
                                <h5
                                    class="uppercase text-sm md:text-base text-white bg-secondary-color hover:bg-primary-color relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0"
                                >
                                    <button
                                        type="submit"
                                        class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-white leading-23px uppercase"
                                    >
                                        Send Messege
                                    </button>
                                </h5>
                            </div>
                        </form>
                    </div>

                    <!-- Top Rated Properties -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Top Rated Properties</span
                  >
                        </h4>
                        <ul>
                            <li class="pb-25px mb-25px border-b border-white-4">
                                <div class="flex gap-x-15px xl:gap-x-5">
                                    <div class="w-70px xl:w-90px flex-shrink-0">
                                        <a href="product-details.html"
                                        ><img src="assets/img/product/1.png" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <ul
                                            class="text-10px text-ratings flex items-center mb-5px leading-1"
                                        >
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                        </ul>

                                        <h6 class="text-sm font-medium mb-1">
                                            <a href="product-details.html" class="leading-1.3"
                                            >Luxury House In Greenville</a
                                            >
                                        </h6>
                                        <p class="text-sm font-bold text-secondary-color">
                                            <span class="leading-1.8">$30,000.00 </span>
                                            <del class="text-11px opacity-60 ml-1"
                                            >$35,000.00</del
                                            >
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="pb-25px mb-25px border-b border-white-4">
                                <div class="flex gap-x-15px xl:gap-x-5">
                                    <div class="w-70px xl:w-90px flex-shrink-0">
                                        <a href="product-details.html"
                                        ><img src="assets/img/product/2.png" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <ul
                                            class="text-10px text-ratings flex items-center mb-5px leading-1"
                                        >
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                        </ul>

                                        <h6 class="text-sm font-medium mb-1">
                                            <a href="product-details.html" class="leading-1.3"
                                            >Apartment with Subunits</a
                                            >
                                        </h6>
                                        <p class="text-sm font-bold text-secondary-color">
                                            <span class="leading-1.8">$30,000.00 </span>
                                            <del class="text-11px opacity-60 ml-1"
                                            >$35,000.00</del
                                            >
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-x-15px xl:gap-x-5">
                                    <div class="w-70px xl:w-90px flex-shrink-0">
                                        <a href="product-details.html"
                                        ><img src="assets/img/product/3.png" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <ul
                                            class="text-10px text-ratings flex items-center mb-5px leading-1"
                                        >
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="far fa-star"></i></a>
                                            </li>
                                        </ul>

                                        <h6 class="text-sm font-medium mb-1">
                                            <a href="product-details.html" class="leading-1.3"
                                            >3 Rooms Manhattan</a
                                            >
                                        </h6>
                                        <p class="text-sm font-bold text-secondary-color">
                                            <span class="leading-1.8">$30,000.00 </span>
                                            <del class="text-11px opacity-60 ml-1"
                                            >$35,000.00</del
                                            >
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Top Categories-->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Top Categories</span
                  >
                        </h4>
                        <ul>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Apartments</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(26)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Picture Stodio</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(30)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Office</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(71)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Luxary Vilas</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(56)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Duplex House</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(60)
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Popular Properties-->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Popular Properties</span
                  >
                        </h4>

                        <div
                            class="news-slider-container swiper-container relative -mx-15px"
                        >
                            <!-- apartment cards  -->
                            <div class="swiper popular-properties-slider static">
                                <div class="swiper-wrapper">
                                    <!-- card 1 -->
                                    <div class="swiper-slide mb-50px cursor-default">
                                        <div class="apart-card px-15px">
                                            <div
                                                class="group border border-border-color-13 shadow-box-shadow-4"
                                            >
                                                <!-- card thumbs -->
                                                <div class="relative leading-1">
                                                    <a
                                                        href="product-details.html"
                                                        class="overflow-hidden"
                                                    >
                                                        <img
                                                            src="assets/img/product-3/6.jpg"
                                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                                            alt=""
                                                        >
                                                    </a>

                                                    <div
                                                        class="absolute top-10 lg:top-5 right-[30px]"
                                                    >
                                                        <a
                                                            href="team-details.html"
                                                            class="w-50px h-50px"
                                                        ><img
                                                                src="assets/img/blog/author.jpg"
                                                                alt=""
                                                                class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                            ></a>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="p-25px">
                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold mb-5px"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                    <h4
                                                        class="text-base font-semibold text-heading-color mb-15px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="hover:text-secondary-color leading-1.3"
                                                        >New Apartment Nice View</a
                                                        >
                                                    </h4>

                                                    <div class="text-xs">
                                                        <a
                                                            href="locations.html"
                                                            class="hover:text-secondary-color"
                                                        ><i
                                                                class="flaticon-pin text-secondary-color mr-0.5"
                                                            ></i>
                                                            Belmont Gardens, Chicago</a
                                                        >
                                                    </div>

                                                    <ul class="flex flex-wrap gap-15px pt-4">
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3 <span class="font-normal">Bed</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                2 <span class="font-normal">Bath</span>
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3450
                                                                <span class="font-normal">Square Ft</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card 2 -->
                                    <div class="swiper-slide mb-50px cursor-default">
                                        <div class="apart-card px-15px">
                                            <div
                                                class="group border border-border-color-13 shadow-box-shadow-4"
                                            >
                                                <!-- card thumbs -->
                                                <div class="relative leading-1">
                                                    <a
                                                        href="product-details.html"
                                                        class="overflow-hidden"
                                                    >
                                                        <img
                                                            src="assets/img/product-3/4.jpg"
                                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                                            alt=""
                                                        >
                                                    </a>

                                                    <div
                                                        class="absolute top-10 lg:top-5 right-[30px]"
                                                    >
                                                        <a
                                                            href="team-details.html"
                                                            class="w-50px h-50px"
                                                        ><img
                                                                src="assets/img/blog/author.jpg"
                                                                alt=""
                                                                class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                            ></a>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="p-25px">
                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold mb-5px"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                    <h4
                                                        class="text-base font-semibold text-heading-color mb-15px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="hover:text-secondary-color leading-1.3"
                                                        >New Apartment Nice View</a
                                                        >
                                                    </h4>

                                                    <div class="text-xs">
                                                        <a
                                                            href="locations.html"
                                                            class="hover:text-secondary-color"
                                                        ><i
                                                                class="flaticon-pin text-secondary-color mr-0.5"
                                                            ></i>
                                                            Belmont Gardens, Chicago</a
                                                        >
                                                    </div>

                                                    <ul class="flex flex-wrap gap-15px pt-4">
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3 <span class="font-normal">Bed</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                2 <span class="font-normal">Bath</span>
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3450
                                                                <span class="font-normal">Square Ft</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card 3 -->
                                    <div class="swiper-slide mb-50px cursor-default">
                                        <div class="apart-card px-15px">
                                            <div
                                                class="group border border-border-color-13 shadow-box-shadow-4"
                                            >
                                                <!-- card thumbs -->
                                                <div class="relative leading-1">
                                                    <a
                                                        href="product-details.html"
                                                        class="overflow-hidden"
                                                    >
                                                        <img
                                                            src="assets/img/product-3/5.jpg"
                                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                                            alt=""
                                                        >
                                                    </a>

                                                    <div
                                                        class="absolute top-10 lg:top-5 right-[30px]"
                                                    >
                                                        <a
                                                            href="team-details.html"
                                                            class="w-50px h-50px"
                                                        ><img
                                                                src="assets/img/blog/author.jpg"
                                                                alt=""
                                                                class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                            ></a>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="p-25px">
                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold mb-5px"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                    <h4
                                                        class="text-base font-semibold text-heading-color mb-15px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="hover:text-secondary-color leading-1.3"
                                                        >New Apartment Nice View</a
                                                        >
                                                    </h4>

                                                    <div class="text-xs">
                                                        <a
                                                            href="locations.html"
                                                            class="hover:text-secondary-color"
                                                        ><i
                                                                class="flaticon-pin text-secondary-color mr-0.5"
                                                            ></i>
                                                            Belmont Gardens, Chicago</a
                                                        >
                                                    </div>

                                                    <ul class="flex flex-wrap gap-15px pt-4">
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3 <span class="font-normal">Bed</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                2 <span class="font-normal">Bath</span>
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3450
                                                                <span class="font-normal">Square Ft</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- pagination -->
                                <div
                                    class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal !-bottom-[6px] block"
                                >
                      <span
                          class="swiper-pagination-bullet"
                          tabindex="0"
                          role="button"
                          aria-label="Go to slide 1"
                      ></span
                      ><span
                                        class="swiper-pagination-bullet swiper-pagination-bullet-active"
                                        tabindex="0"
                                        role="button"
                                        aria-label="Go to slide 2"
                                        aria-current="true"
                                    ></span
                                    ><span
                                        class="swiper-pagination-bullet"
                                        tabindex="0"
                                        role="button"
                                        aria-label="Go to slide 3"
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Leatest Blogs -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Leatest Blogs</span
                  >
                        </h4>
                        <ul>
                            <li class="pb-5 mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/5.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
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
                            <li class="pb-5 mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/6.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
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
                            <li class="pb-5 mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/7.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
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
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/8.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
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
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-30px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Popular Tags</span
                  >
                        </h4>
                        <ul class="flex gap-10px flex-wrap items-center font-poppins">
                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >POPULAR
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    DESGIN
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >UX
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    USABILITY
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    DEVELOP
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    ICON
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >CAR
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    SERVICE
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    REPAIRS
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    AUTO PARTS
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >OIL
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >DEALER
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >OIL CHANGE
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >BODY COLOR
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
