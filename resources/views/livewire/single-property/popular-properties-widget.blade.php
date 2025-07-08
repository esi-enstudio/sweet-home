<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11">
    <h4 class="text-lg font-semibold text-heading-color mb-25px">
        <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">Popular Properties</span>
    </h4>

    @if($this->popularProperties->isNotEmpty())
        <div class="news-slider-container swiper-container relative -mx-15px">
            <!-- apartment cards  -->
            <div class="swiper popular-properties-slider static">
                <div class="swiper-wrapper">
                    <!-- card -->
                    @foreach($this->popularProperties as $property)
                        <div class="swiper-slide mb-50px cursor-default">
                            <div class="apart-card px-15px">
                            <div class="group border border-border-color-13 shadow-box-shadow-4">
                                <!-- card thumbs -->
                                <div class="relative leading-1">
                                    <a href="{{ route('single.property', $property->slug) }}"
                                        class="overflow-hidden">
                                        <img
                                            src="{{ $property->thumbnail && Storage::disk('public')->exists($property->thumbnail)
                                                                ? Storage::url($property->thumbnail)
                                                                : asset('assets/img/default-property-img.jpg') }}"
                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                            alt=""
                                        >
                                    </a>

                                    <div class="absolute top-10 lg:top-5 right-[30px]">
                                        <a href="team-details.html" class="w-50px h-50px">
                                            <img src="{{ $property->user->avatar_url && Storage::disk('public')->exists($property->user->avatar_url)
                                                                         ? Storage::url($property->user->avatar_url)
                                                                         : asset('assets/img/default-user-avatar.png') }}"
                                                alt="{{ $property->user->name ?? '' }}"
                                                class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300">
                                        </a>
                                    </div>
                                </div>
                                <!-- card body -->
                                <div class="p-25px">
                                    <h5
                                        class="text-lg text-secondary-color font-semibold mb-5px"
                                    >
                                        <span class="leading-1.8">BDT {{ number_format($property->rent_amount) }}</span>
                                        <label class="text-sm font-normal"
                                        >/Month</label
                                        >
                                    </h5>
                                    <h4
                                        class="text-base font-semibold text-heading-color mb-15px">
                                        <a
                                            href="{{ route('single.property', $property->slug) }}"
                                            class="hover:text-secondary-color leading-1.3">
                                            {{ Str::limit($property->title, 25) }}
                                        </a>
                                    </h4>

                                    <div class="text-xs">
                                        <a
                                            href="locations.html"
                                            class="hover:text-secondary-color">
                                            <i class="flaticon-pin text-secondary-color mr-0.5"></i>
                                            {{ Str::limit($property->address, 30) }}
                                        </a>
                                    </div>

                                    <ul class="flex flex-wrap gap-15px pt-4">
                                        <li>
                                            <p class="leading-1.8 font-bold text-xs">
                                                {{ $property->bedrooms }} <span class="font-normal">Bed</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="leading-1.8 font-bold text-xs">
                                                {{ $property->bathrooms }} <span class="font-normal">Bath</span>
                                            </p>
                                        </li>

                                        <li>
                                            <p class="leading-1.8 font-bold text-xs">
                                                {{ $property->total_area }}
                                                <span class="font-normal">Square Ft</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
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
    @endif
</div>
