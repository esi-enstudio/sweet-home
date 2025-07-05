@if($buildingAmenities->isNotEmpty())
    <section>
        <div class="container pt-115px pb-90px">
            <!-- section heading -->
            <div class="text-center mb-50px">
                <p
                    class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-0.5 px-5 rounded-full inline-block font-semibold"
                >
                    <span class="leading-1.3">
                        {{ app(\App\Settings\HomepageSettings::class)->amenity_section_name }}
                    </span>
                </p>
                <h2
                    class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold"
                >
                    <span class="leading-1.3">
                        {{ app(\App\Settings\HomepageSettings::class)->amenity_section_title }}
                    </span>
                </h2>
            </div>

            <div class="flex flex-wrap items-center justify-center -mx-15px px-7px md:px-0">
                <!-- card -->
                @forelse($buildingAmenities as $amenity)
                    <div class="basis-1/2 md:basis-1/3 lg:basis-1/4 px-2 md:px-15px mb-50px">
                        <a
                            href="{{ route('amenity.properties', ['amenity' => $amenity->slug]) }}"
                            class="pt-10 pb-35px px-15px md:px-5 xl:px-30px bg-white hover:bg-secondary-color transition-all duration-300 shadow-box-shadow-4 rounded-10px flex flex-col items-center group relative">

                        <span class="block w-60px md:w-20 xl:w-100px h-60px md:h-20 xl:h-100px text-25px md:text-3xl xl:text-45px bg-section-bg-5 rounded-100% transition-all duration-300 group-hover:bg-white text-secondary-color mb-5 text-center leading-1">
                            <i class="{{ $amenity->icon_class }} leading-65px md:leading-90px xl:leading-110px"></i>
                        </span>

                            <span class="block text-13px md:text-lg xl:text-22px transition-all duration-300 text-heading-color group-hover:text-white mb-10px font-poppins font-semibold leading-1.8 capitalize">
                                {{ $amenity->name }}
                            </span>

                            <span class="text-lg w-45px h-45px border border-border-color-8 shadow-box-shadow-2 rounded-100% bg-white group-hover:text-secondary-color transition-all duration-300 text-center block absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                            <i class="flaticon-right-arrow leading-12"></i>
                        </span>
                        </a>
                    </div>
                @empty
                    <div
                        class="basis-1/2 md:basis-1/3 lg:basis-1/4 px-2 md:px-15px mb-50px"
                    >
                        <a
                            href="shop.html"
                            class="pt-10 pb-35px px-15px md:px-5 xl:px-30px bg-white hover:bg-secondary-color transition-all duration-300 shadow-box-shadow-4 rounded-10px flex flex-col items-center group relative"
                        >
                <span
                    class="block w-60px md:w-20 xl:w-100px h-60px md:h-20 xl:h-100px text-25px md:text-3xl xl:text-45px bg-section-bg-5 rounded-100% transition-all duration-300 group-hover:bg-white text-secondary-color mb-5 text-center leading-1"
                >
                  <i
                      class="flaticon-car leading-65px md:leading-90px xl:leading-110px"
                  ></i>
                </span>
                            <span
                                class="block text-13px md:text-lg xl:text-22px transition-all duration-300 text-heading-color group-hover:text-white mb-10px font-poppins font-semibold leading-1.8 capitalize"
                            >
                  Parking Space
                </span>

                            <span
                                class="text-lg w-45px h-45px border border-border-color-8 shadow-box-shadow-2 rounded-100% bg-white group-hover:text-secondary-color transition-all duration-300 text-center block absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2"
                            >
                  <i class="flaticon-right-arrow leading-12"></i>
                </span>
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endif
