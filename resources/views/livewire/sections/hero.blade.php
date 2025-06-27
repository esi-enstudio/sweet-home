{{--{{ dd($heroProperties) }}--}}
@if(isset($heroProperties))
    <div class="hero hero-primary overflow-hidden relative z-10">
    <!-- Swiper -->
    <div class="hero-slider-container swiper-container relative">
        <div class="swiper primary-slider">
            <div class="swiper-wrapper">
                <!-- Hero 1 -->
                @forelse($heroProperties as $property)
                    <div class="swiper-slide relative z-0 py-100px 4xl:min-h-[780px] overflow-hidden flex items-center bg-section-bg-1">
                    <div class="container w-full">
                        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-30px">
                            <!-- banner Left -->

                            <div class="slide-animation">
                                <p class="text-sm md:text-15px lg:text-base text-heading-color font-bold mb-5 animated">
                                    <i class="fas fa-home text-secondary-color"></i>
                                    {{ $property->propertyType->name }}
                                </p>
                                <h1
                                    class="text-3xl md:text-40px lg:text-50px 4xl:text-65px leading-30px md:leading-10 lg:leading-50px 4xl:leading-65px font-bold mb-5 animated"
                                    title="{{ $property->title }}">
                                    <span class="leading-30px md:leading-10 lg:leading-50px 4xl:leading-65px">
                                        {{ \Illuminate\Support\Str::limit($property->title, 25) }}
                                      </span>
                                </h1>

                                <p class="text-sm lg:text-base mb-5 max-w-450px pl-15px xl:pl-30px border-l border-border-color-14 animated">
                                    <span class="leading-25px lg:leading-1.8">
                                        {{ \Illuminate\Support\Str::limit($property->address, 50) }}
                                    </span>
                                </p>
                                <div class="mt-5 lg:mt-10 mb-30px xl:mb-0 animated">
                                    <h5 class="capitalize text-sm md:text-base text-white relative group whitespace-nowrap font-normal transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block mr-15px">
                                        <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-primary-color z-1 group-hover:w-0 transition-all duration-300"></span>

                                        <a
                                            href="{{ route('listing.details', $property->id) }}"
                                            class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-heading-color leading-23px">
                                            See Detail's
                                        </a>
                                    </h5>

                                    @if($property->media->contains('type','video_url'))

                                        @php
                                            $videoPath = $property->media->firstWhere('type','video_url')->path;
                                        @endphp

                                        <div class="inline-block">
                                            <div>
                                                <a
                                                    class="glightbox w-60px h-60px text-center text-sm lg:text-base text-secondary-color shadow-box-shadow-2 rounded-full bg-white flex items-center justify-center"
                                                    href="{{ $videoPath }}"
                                                    data-glightbox="type: video;">
                                                    <i class="icon-play ltn__secondary-color"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <!-- banner right -->
                            <div class="4xl:absolute right-[60px] xl:right-[150px] bottom-[100px] 4xl:h-[70%] 4xl:w-[45%]">
                                <img
                                    class="4xl:h-full 4xl:ml-auto"
                                    src="{{ Storage::url($property->thumbnail) }}"
                                    alt="{{ $property->title }}"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <!-- Hero 2 -->
                    <div class="swiper-slide relative z-0 py-100px 4xl:min-h-[780px] overflow-hidden flex items-center bg-section-bg-1">
                        <div class="container w-full">
                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                <!-- banner Left -->
                                <div
                                    class="lg:col-start-2 lg:col-span-1 flex flex-col items-end text-end slide-animation"
                                >
                                    <p
                                        class="text-sm md:text-15px lg:text-base text-heading-color font-bold mb-5 animated"
                                    >
                                        <i class="fas fa-home text-secondary-color"></i>
                                        Real Estate Company
                                    </p>
                                    <h1
                                        class="text-3xl md:text-40px lg:text-50px 4xl:text-65px leading-30px md:leading-10 lg:leading-50px 4xl:leading-65px font-bold mb-5 animated"
                                    >
                          <span
                              class="leading-30px md:leading-10 lg:leading-50px 4xl:leading-65px"
                          >
                            Want Place An Advertise <br >
                            of Your House
                          </span>
                                    </h1>
                                    <p
                                        class="text-sm lg:text-base mb-5 max-w-450px pr-15px xl:pr-30px border-r border-border-color-14 animated"
                                    >
                          <span class="leading-25px lg:leading-1.8">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt ut labore.
                          </span>
                                    </p>
                                    <div class="lg:mt-5 mb-30px xl:mb-0 animated">
                                        <h5
                                            class="capitalize text-sm md:text-base text-white relative group whitespace-nowrap font-normal transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block mr-15px"
                                        >
                            <span
                                class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-primary-color z-1 group-hover:w-0 transition-all duration-300"
                            ></span>
                                            <a
                                                href="#"
                                                class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-heading-color leading-23px"
                                            >Call Now</a
                                            >
                                        </h5>
                                        <h5
                                            class="capitalize inline-block text-sm md:text-base text-primary-color hover:text-white hover:bg-primary-color relative group whitespace-nowrap font-normal transition-all duration-300 shadow-box-shadow-3"
                                        >
                            <span
                                class="inline-block absolute top-0 right-0 w-full h-full bg-white group-hover:bg-secondary-color z-1 group-hover:w-0 transition-all duration-300"
                            ></span>
                                            <a
                                                href="#"
                                                class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-white leading-23px"
                                            >LEARN MORE</a
                                            >
                                        </h5>
                                    </div>
                                </div>
                                <!-- banner right -->
                                <div
                                    class="lg:row-start-1 lg:row-span-1 lg:col-start-1 lg:col-span-1"
                                >
                                    <div
                                        class="4xl:absolute left-[60px] xl:left-[150px] bottom-[100px] 4xl:h-[70%] 4xl:w-[45%]"
                                    >
                                        <img
                                            class="4xl:h-full 4xl:ml-auto"
                                            src="{{ asset('assets/img/slider/21.png') }}"
                                            alt=""
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="hidden xl:block">
                <div class="swiper-button-next">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="fas fa-arrow-left"></i>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">

            </div>
        </div>
    </div>
</div>
@endif
