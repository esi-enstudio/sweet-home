@props(['property'])

<div>
    <div class="news-slider-container swiper-container relative">
        <!-- product details -->
        <div class="swiper product-details-slider static">
            <div class="swiper-wrapper mb-10">
                <!-- card -->
                @forelse($property->media as $mediaItem)
                    <div class="swiper-slide cursor-default">
                        <a
                            href="{{ asset('storage/' . $mediaItem->path) }}"
                            class="glightbox overflow-hidden"
                            data-width="118vh"
                        >
                            <img
                                class="hover:scale-110 transition-all duration-700"
                                src="{{ asset('storage/'. $mediaItem->path) }}"
                                alt="{{ $property->title }}"
                            >
                        </a>
                    </div>
                @empty
                @endforelse
            </div>

            <!-- pagination -->
            <div
                class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal !-bottom-[6px] block lg:hidden"
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
            <!--  navigation -->
            <div class="hidden lg:block">
                <div class="swiper-button-next bg-white z-1">
                    <i class="fas fa-arrow-right" ></i>
                </div>
                <div class="swiper-button-prev bg-white z-1">
                    <i class="fas fa-arrow-left" ></i>
                </div>
            </div>
        </div>
    </div>
</div>
