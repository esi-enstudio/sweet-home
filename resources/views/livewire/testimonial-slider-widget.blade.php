<section>
    <div class="bg-[url('../img/bg/20.jpg')] bg-top bg-no-repeat">
        <div class="container pt-115px pb-55px">
            <!-- section heading -->
            <div class="text-center mb-50px">
                <p
                    class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-0.5 px-5 rounded-full inline-block font-semibold"
                >
                    <span class="leading-1.3">Our Testimonial</span>
                </p>
                <h2
                    class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold"
                >
                    <span class="leading-1.3">Clients Feedback </span>
                </h2>
            </div>

            @if($this->testimonials->isNotEmpty())
                <div
                    x-data="{
                    initTestimonialSwiper: function() {
                        new Swiper(this.$refs.testimonialSlider, {
                            loop: true,
                            spaceBetween: 30,
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            breakpoints: {
                                640: { slidesPerView: 1 },
                                768: { slidesPerView: 2 },
                                1024: { slidesPerView: 3 },
                            }
                        });
                    }
                }"
                    x-init="initTestimonialSwiper()"
                    class="testimonials-slider-container swiper-container relative -mx-15px"
                >
                <!-- apartment cards  -->
                <div class="swiper testimonials-slider static">
                    <div class="swiper-wrapper">
                        <!-- card -->
                        @foreach($this->testimonials as $testimonial)
                            <div class="swiper-slide mb-65px lg:mb-50px px-15px">
                            <div class="pt-25px pb-10 px-35px group border border-border-color-13 shadow-box-shadow-4 rounded-10px bg-white cursor-default relative">
                                <!-- card body -->
                                <div>
                                    <p class="text-sm md:text-base mb-5 md:mb-6 xl:mb-27px">
                                        <span class="text-3xl mr-0.5 translate-y-2 inline-block">
                                            <i class="flaticon-left-quote-1 group-hover:text-secondary-color transition-all duration-300"></i>
                                        </span>

                                        <span class="leading-1.8">
                                            {{ Str::limit($testimonial->feedback_text, 312) }}
                                        </span>
                                    </p>
                                </div>

                                <!-- cart footer -->
                                <div>
                                    <div>
                                        <div
                                            class="flex flex-wrap md:flex-nowrap gap-x-15px gap-y-10px items-center">
                                            <div class="w-60px h-60px flex-shrink-0">
                                                <img
                                                    src="{{ $testimonial->client_image && Storage::disk('public')->exists($testimonial->client_image)
                                                                         ? Storage::url($testimonial->client_image)
                                                                         : asset('assets/img/default-user-avatar.png') }}"
                                                    alt="{{ $testimonial->client_name }}"
                                                    class="w-full h-full rounded-100%"
                                                >
                                            </div>
                                            <div>
                                                <h4 class="text-base lg:text-lg font-semibold text-heading-color mb-0">
                                                    <span class="leading-1.3 hover:text-secondary-color">{{ $testimonial->client_name }}</span>
                                                </h4>

                                                <span class="text-sm uppercase">{{ $testimonial->client_designation }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span
                                    class="hover-line absolute bottom-0 left-0 w-0 group-hover:w-full h-1 bg-secondary-color transition-all duration-300 block"></span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- pagination -->
                    <div
                        class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal !-bottom-[6px] block lg:hidden"
                    >

                    </div>
                    <!--  navigation -->
                    <div class="hidden lg:block">
                        <div class="swiper-button-next bg-white z-1">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div class="swiper-button-prev bg-white z-1">
                            <i class="fas fa-arrow-left"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
