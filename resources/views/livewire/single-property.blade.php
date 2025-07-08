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

                    <!-- Top Rated Properties -->
                    @livewire('single-property.top-rated-properties-widget')

                    <!-- Top Categories-->
                    @livewire('single-property.top-categories-widget')

                    <!-- Popular Properties-->
                    @livewire('single-property.popular-properties-widget')




                    <x-single-property.sidebar.top-categories />
                    <x-single-property.sidebar.popular-properties />
                    <x-single-property.sidebar.latest-blogs />
                    <x-single-property.sidebar.popular-tags />
















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
