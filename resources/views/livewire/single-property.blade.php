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
                    <!-- Related Properties -->
                    <x-single-property.related-properties :properties="$this->relatedProperties" />
                </div>


                <!-- সাইডবার (ডান অংশ) -->
                <div class="lg:col-start-9 lg:col-span-4 pt-60px lg:pt-0">

                    <!-- owner details -->
                    <x-single-property.sidebar.owner-info :owner="$property->user" />
                    <!-- Drop Message For Inquiry -->
                    @livewire('property-inquiry-form', ['property' => $property], key($property->id))
                    <x-single-property.booking-form :propertyId="$property->id" />

                    {{-- পুনরায় ব্যবহারযোগ্য সাইডবার উইজেট --}}
                    <x-single-property.sidebar.top-rated-properties />
                    <x-single-property.sidebar.top-categories />
                    <x-single-property.sidebar.popular-properties />
                    <x-single-property.sidebar.latest-blogs />
                    <x-single-property.sidebar.popular-tags />







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

                    <!-- Latest Blogs -->
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
