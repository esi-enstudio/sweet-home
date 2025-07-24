<footer>
    <div class="pt-187px pb-5 px-15px 3xl:px-[2%] 4xl:px-[5%] mt-95px bg-section-bg-2 text-sm lg:text-base text-white relative">
        <div class="px-15px">
            <!-- footer top -->
            <div class="container w-full absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <div class="px-25px lg:px-60px py-50px bg-secondary-color text-white flex justify-center lg:justify-between items-center flex-col lg:flex-row gap-y-30px lg:gap-0 sm:whitespace-nowrap">
                    <div>
                        <h5 class="text-xl md:text-26px lg:text-3xl xl:text-4xl text-white font-bold mb-15px">
                            <span class="leading-1.3">Looking for a dream home?</span>
                        </h5>

                        <p class="text-white leading-1.8">
                            We can help you realize your dream of a new home
                        </p>
                    </div>

                    <div>
                        <h5 class="capitalize inline-block text-sm md:text-base text-primary-color hover:text-white hover:bg-primary-color relative group whitespace-nowrap font-normal transition-all duration-300 shadow-box-shadow-3 mb-0">
                            <span class="inline-block absolute top-0 right-0 w-full h-full bg-white group-hover:bg-secondary-color z-1 group-hover:w-0 transition-all duration-300"></span>

                            <a href="{{ route('properties') }}" class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-white leading-23px">Explore Properties <i class="icon-next"></i></a>
                        </h5>
                    </div>
                </div>
            </div>

            <!-- footer main -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-12 gap-x-30px text-sm lg:text-base text-white">

                <!-- footer about-->
                <div class="xl:col-start-1 xl:col-span-3 mb-60px lg:pr-35px">
                    <div class="mb-15px">
                        <a href="{{ route('home') }}">
                            <img src="{{ Storage::url(app(\App\Settings\GeneralSettings::class)->footer_logo) }}" alt="" >
                        </a>
                        <p class="leading-1.8 mb-5 lg:mb-25px text-white">
                            {{ app(\App\Settings\FooterSettings::class)->about_section_paragraph }}
                        </p>

                        <ul class="space-y-2">
                            <li>
                                <p class="leading-1.8 text-white flex">
                                    <i class="icon-placeholder mr-15px mt-1"></i>
                                    <span>
                                        {{ app(\App\Settings\FooterSettings::class)->address }}
                                    </span>
                                </p>
                            </li>
                            <li>
                                <a href="tel:{{ app(\App\Settings\FooterSettings::class)->contact_number }}" class="leading-1.8 flex">
                                    <i class="icon-call mr-15px mt-1"></i>
                                    <span>
                                        {{ app(\App\Settings\FooterSettings::class)->contact_number }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ app(\App\Settings\FooterSettings::class)->email }}" class="leading-1.8 flex">
                                    <i class="icon-mail mr-15px mt-1"></i>
                                    <span>
                                        {{ app(\App\Settings\FooterSettings::class)->email }}
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <ul class="flex items-center gap-x-5 mt-5">
                            @foreach(app(\App\Settings\FooterSettings::class)->social_links as $platform => $url)

                                {{-- Facebook --}}
                                @if($platform == 'facebook')
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="{{ $url }}" target="_blank">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- X-Twitter --}}
                                @if($platform == 'x-twitter')
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="{{ $url }}" target="_blank">
                                            <i class="fa-brands fa-x-twitter"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- LinkedIn --}}
                                @if($platform == 'linkedin')
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="{{ $url }}" target="_blank">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Instagram --}}
                                @if($platform == 'instagram')
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="{{ $url }}" target="_blank">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Youtube --}}
                                @if($platform == 'youtube')
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="{{ $url }}" target="_blank">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- TikTok --}}
                                @if($platform == 'tiktok')
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="{{ $url }}" target="_blank">
                                            <i class="fa-brands fa-tiktok"></i>
                                        </a>
                                    </li>
                                @endif

                                {{-- Threads --}}
                                @if($platform == 'threads')
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="{{ $url }}" target="_blank">
                                            <i class="fa-brands fa-threads"></i>
                                        </a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>


                <!-- footer company-->
                <div class="xl:col-start-4 xl:col-span-2 mb-60px">
                    <h3 class="text-22px font-bold mb-25px text-white">
                        <span class="leading-1.3"> Company </span>
                    </h3>

                    <ul class="space-y-[15px]">
                        <li>
                            <a
                                href="about.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                About</a
                            >
                        </li>
                        <li>
                            <a
                                href="blog.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Blog</a
                            >
                        </li>
                        <li>
                            <a
                                href="shop.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                All Products</a
                            >
                        </li>
                        <li>
                            <a
                                href="locations.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Locations Map</a
                            >
                        </li>
                        <li>
                            <a
                                href="faq.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                FAQ</a
                            >
                        </li>
                        <li>
                            <a
                                href="contact.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Contact us</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- footer services-->
                <div class="xl:col-start-6 xl:col-span-2 mb-60px">
                    <h3 class="text-22px font-bold mb-25px text-white">
                        <span class="leading-1.3"> Services </span>
                    </h3>
                    <ul class="space-y-[15px]">
                        <li>
                            <a
                                href="order-tracking.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Order tracking</a
                            >
                        </li>
                        <li>
                            <a
                                href="wishlist.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Wish List</a
                            >
                        </li>
                        <li>
                            <a
                                href="login.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Login</a
                            >
                        </li>
                        <li>
                            <a
                                href="account.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                My account</a
                            >
                        </li>
                        <li>
                            <a
                                href="about.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Terms & Conditions</a
                            >
                        </li>
                        <li>
                            <a
                                href="about.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Promotional Offers</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- footer customer care-->
                <div class="xl:col-start-8 xl:col-span-2 mb-60px">
                    <h3 class="text-22px font-bold mb-25px text-white">
                        <span class="leading-1.3"> Customer Care </span>
                    </h3>
                    <ul class="space-y-[15px]">
                        <li>
                            <a
                                href="login.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Login</a
                            >
                        </li>
                        <li>
                            <a
                                href="account.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                My account</a
                            >
                        </li>
                        <li>
                            <a
                                href="wishlist.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Wish List</a
                            >
                        </li>
                        <li>
                            <a
                                href="order-tracking.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Order tracking</a
                            >
                        </li>
                        <li>
                            <a
                                href="faq.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                FAQ</a
                            >
                        </li>
                        <li>
                            <a
                                href="contact.html"
                                class="hover:text-secondary-color -translate-x-5 hover:translate-x-0 group leading-1.8"
                            ><span
                                    class="text-secondary-color pr-15px opacity-0 group-hover:opacity-100 transition-all duration-300"
                                >//</span
                                >
                                Contact us</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- footer newsletter-->
                <div class="xl:col-start-10 xl:col-span-3 mb-60px">
                    <h3 class="text-22px font-bold mb-25px text-white">
                        <span class="leading-1.3"> Newsletter </span>
                    </h3>
                    <p class="leading-1.8 mb-5 lg:mb-25px text-white">
                        Subscribe to our weekly Newsletter and receive updates via
                        email.
                    </p>

                    <!-- subscription input  -->
                    <div>
                        <form class="w-full relative">
                            <input
                                type="text"
                                placeholder="Email*"
                                class="w-full text-sm text-paragraph-color pl-5 pr-50px placeholder:text-paragraph-color outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block rounded-none"
                            >
                            <button
                                type="submit"
                                class="absolute top-0 right-0 h-full px-18px text-white bg-secondary-color hover:bg-primary-color"
                            >
                                <i class="fas fa-location-arrow text-lg font-bold"></i>
                            </button>
                        </form>
                    </div>
                    <!-- payment methods -->
                    <div>
                        <h3
                            class="text-base lg:text-lg font-bold mt-30px mb-15px text-white"
                        >
                            <span class="leading-1.3"> We Accept </span>
                        </h3>
                        <img
                            src="{{ asset('assets/img/icons/payment-4.png') }}"
                            alt="Payment Image"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer copyright -->
    <div class="py-25px px-15px 3xl:px-[2%] 4xl:px-[5%] bg-section-bg-7 text-sm lg:text-base text-white">
        <div class="px-15px">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div>
                    <p class="leading-1.8 text-center lg:text-start text-white">
                        {{ app(\App\Settings\FooterSettings::class)->copyright }} {{ date('Y') }}
                    </p>
                </div>

                <ul class="flex gap-x-25px items-center justify-center lg:justify-end capitalize font-semibold font-poppins text-sm">
                    <li>
                        <a href="{{ route('legal.page', 'terms-and-conditions') }}" target="_blank" class="leading-1.8">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="{{ route('legal.page', 'privacy-policy') }}" target="_blank" class="leading-1.8">Privacy & Policy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
