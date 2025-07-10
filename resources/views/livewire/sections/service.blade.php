<section class="bg-section-bg-1">
    <div class="container pt-30 pb-90px">
        <!-- section heading -->
        <div class="text-center mb-50px">
            <p
                class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-0.5 px-5 rounded-full inline-block font-semibold"
            >
                <span class="leading-1.3">{{ app(\App\Settings\HomepageSettings::class)->our_service_section_name }}</span>
            </p>
            <h2
                class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold"
            >
                <span class="leading-1.3">{{ app(\App\Settings\HomepageSettings::class)->our_service_section_title }}</span>
            </h2>
        </div>

        <!-- services cards  -->
        <div class="service-cards flex flex-wrap justify-center items-center text-center -mx-15px">
            <!-- card -->
            @if(!empty(app(\App\Settings\HomepageSettings::class)->services))
                @foreach(app(\App\Settings\HomepageSettings::class)->services as $service)
{{--                    {{ dd($service) }}--}}
{{--                    {{ dd(generate_link_from_settings($service)) }}--}}
                    <div class="service-card basis-full sm:basis-1/2 lg:basis-1/3 px-15px mb-30px">
                        <div class="border border-border-color-1 shadow-box-shadow-1 bg-white relative py-10 pb-35px px-30px transition-all duration-300">
                            <div class="text-center mb-5">
                                <img
                                    src="{{ $service['icon'] && Storage::disk('public')->exists($service['icon']) ? Storage::url($service['icon']) : asset('assets/img/icons/icon-img/21.png') }}"
                                    width="30%"
                                    alt="{{ $service['title'] }}"
                                    class="inline-block"
                                >
                            </div>

                            <h6 class="text-lg md:text-xl lg:text-22px xl:text-2xl text-heading-color font-bold">
                                <a class="hover:text-secondary-color leading-1.3 mb-1" href="{{ generate_link_from_settings($service) }}">
                                    {{ $service['title'] }}
                                </a>
                            </h6>

                            <p class="text-sm mb-25px">
                                <span class="leading-1.8">
                                    {{ $service['description'] }}
                                </span>
                            </p>

                            <div class="text-sm text-color-1 font-bold">
                                <a class="find-service hover:text-secondary-color flex items-center justify-center" href="{{ generate_link_from_settings($service) }}">
                                    {{ $service['button_text'] }}
                                    <i class="flaticon-right-arrow inline-block leading-1"></i>
                                </a>
                            </div>

                            <span class="hover-line absolute bottom-0 left-0 w-0 h-1 bg-secondary-color transition-all duration-300 block"></span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
