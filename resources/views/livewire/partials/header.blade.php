<header>
    <!-- header top -->
    <div class="bg-section-bg-6">
        <div class="container text-white text-13px md:text-sm font-bold">
            <div class="flex justify-center md:justify-between items-center flex-wrap md:flex-nowrap">
                <div class="flex justify-center md:block pt-2 md:pt-0">
                    <ul class="basis-full md:basis-auto flex gap-6 lg:gap-9 items-center">
                        <li>
                            <a class="hover:text-secondary-color"
                               href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you">
                                <i class="icon-mail text-secondary-color font-bold mr-0.5"></i>
                                {{ app(\App\Settings\GeneralSettings::class)?->site_email }}
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-secondary-color" href="#">
                                <i class="icon-placeholder text-secondary-color font-bold mr-0.5"></i>
                                Define address
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="basis-full md:basis-auto flex justify-center md:block py-5px md:py-0">
                    <ul class="text flex items-center gap-15px">
                        <li>
                            <a href="https://www.facebook.com/" title="Facebook">
                                <i class="fab fa-facebook-f font-bold"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.x.com/" title="Twitter">
                                <i class="fab fa-twitter font-bold"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/" title="Instagram">
                                <i class="fab fa-instagram font-bold"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.dribbble.com/" title="Dribbble">
                                <i class="fab fa-dribbble font-bold"></i>
                            </a>
                        </li>

                        @auth
                            <li>
                                <a target="_blank" href="{{ route('filament.user.resources.properties.create') }}" class="px-4 md:px-5 py-0.5 md:py-10px ml-2 lg:ml-5 bg-secondary-color inline-block bg-opacity-100 hover:bg-opacity-60 hover:text-white">
                                    Add Listing
                                </a>
                            </li>
                        @endauth

                        @guest
                            <li>
                                <a target="_blank" href="{{ route('filament.user.auth.login') }}" class="px-4 md:px-5 py-0.5 md:py-10px ml-2 lg:ml-5 bg-secondary-color inline-block bg-opacity-100 hover:bg-opacity-60 hover:text-white">
                                    Add Listing
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- navbar main -->
    <div class="sticky-header z-xl bg-white transition-all duration-700">
        <div class="container flex flex-col md:flex-row justify-center md:justify-between items-center relative py-21px">
            <!-- logo area -->
            <div class="mt-10px mb-22px md:mt-0 md:mb-0 leading-1">
                <a href="{{ route('home') }}">
                    <img src="{{ Storage::url(app(\App\Settings\GeneralSettings::class)->header_logo) }}"
                         alt="Sweet Home Logo">
                </a>
            </div>

            <!-- navigation menus area -->
            <nav class="flex-grow hidden xl:block">
                <ul class="flex items-center justify-center gap-15px xl:gap-5">
                    <!-- Home -->
                    <li class="relative group">
                        <a href="{{ route('home') }}" class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px">
                            Home
                        </a>
                    </li>

                    <!-- Inspiration -->
                    <li class="relative group">
                        <a href="{{ route('inspiration') }}" class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px">
                            Our Inspiration
                        </a>
                    </li>

                    <!-- Property -->
                    <li class="relative group">
                        <a href="{{ route('properties') }}" class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px">
                            Properties
                        </a>
                    </li>

                    <!-- News -->
                    <li class="relative group">
                        <a href="#" class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px">
                            News
                        </a>
                    </li>

                    <!-- ContactPage -->
                    <li>
                        <a href="{{ route('contact') }}" class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- header right -->
            <div>
                <ul class="flex items-center gap-5">
                    <li class="group relative">
                        <button
                            class="text-heading-color flex justify-center items-center text-secondary-color transition-all duration-300">
                            <i class="fa-regular fa-user font-bold text-2xl"></i>
                        </button>
                        <!-- dropdown -->
                        <ul class="py-10px w-150px shadow-box-shadow-4 absolute left-0 top-full opacity-0 invisible translate-y-4 bg-white transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-xl">
                            <li>
                                <a class="whitespace-nowrap px-15px py-5px" href="{{ route('filament.user.auth.login') }}" target="_blank">Sign in</a>
                            </li>
                            <li>
                                <a class="whitespace-nowrap px-15px py-5px" href="{{ route('filament.user.auth.register') }}" target="_blank">Register</a>
                            </li>
                            <li>
                                <a class="whitespace-nowrap px-15px py-5px" href="{{ route('filament.user.pages.dashboard') }}" target="_blank">My Account</a>
                            </li>
                            <li>
                                <a class="whitespace-nowrap px-15px py-5px" href="#" target="_blank">Wishlist</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        @livewire('extra.header-wishlist-counter')
                    </li>

                    <li class="block xl:hidden">
                        <div class="show-drawer d-xl-none h-50px w-50px text-heading-color shadow-box-shadow-1 flex justify-center items-center transition-all duration-300 relative">
                            <a href="#ltn__utilize-drawer " class="utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- wishlist sidebar -->
    @livewire('extra.wishlist-sidebar')

    <!-- mobile menu -->
    <div class="drawer-container mobile-menu-container">
        <div class="drawer-overlay fixed top-0 left-0 w-full h-full bg-black -z-1 close-drawer opacity-0 transition-all duration-300 invisible cursor-zoom-out block xl:hidden"></div>

        <div class="drawer mobile-menu fixed top-0 -left-[300px] xs:-left-[400px] px-5 xs:px-10 py-50px w-300px xs:w-100 h-full transition-all duration-500 shadow-dropdown-secodary bg-whiteColor z-high block xl:hidden bg-white">
            <div class="pr-15px overflow-auto h-full">
                <!-- mobile menu wrapper -->
                <div>
                    <!-- mobile logo area -->
                    <div class="flex justify-between items-center border-b border-border-primary pt-3px pb-10px mb-25px">
                        <div>
                            <a href="{{ route('home') }}">
                                <img src="{{ Storage::url(app(\App\Settings\GeneralSettings::class)->header_logo) }}" alt="Sweet Home Logo" >
                            </a>
                        </div>
                        <div>
                            <button class="close-drawer text-black text-3xl px-15px py-2">
                                ×
                            </button>
                        </div>
                    </div>

                    <!-- search input  -->
{{--                    <div class="mb-50px">--}}
{{--                        <form class="w-full relative">--}}
{{--                            <input--}}
{{--                                type="text"--}}
{{--                                placeholder="Search..."--}}
{{--                                class="text-sm text-paragraph-color pl-5 pr-50px placeholder:text-paragraph-color outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none"--}}
{{--                            >--}}
{{--                            <button--}}
{{--                                type="submit"--}}
{{--                                class="absolute top-1/2 -translate-y-1/2 right-7 text-heading-color"--}}
{{--                            >--}}
{{--                                <i class="icon-search text-lg font-bold"></i>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}

                    <!-- mobile menu -->
                    <div class="border-b border-border-primary dark:border-borderColor-dark pb-8">
                        <ul class="accordion-container">
                            <!-- home -->
                            <li class="mt-4">
                                <a href="{{ route('home') }}" class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5">
                                    home
                                </a>
                            </li>

                            <!-- inspiration -->
                            <li class="mt-4">
                                <a href="{{ route('inspiration') }}" class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5">
                                    Our Inspiration
                                </a>
                            </li>

                            <!-- properties -->
                            <li class="mt-4">
                                <a href="{{ route('properties') }}" class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5">
                                    properties
                                </a>
                            </li>

                            <!-- news -->
                            <li class="mt-4">
                                <a href="#" class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5">
                                    news
                                </a>
                            </li>

                            <!-- contact -->
                            <li class="mt-4">
                                <a href="{{ route('contact') }}" class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5">
                                    contact
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- my account -->
                    <div>
                        <ul class="mb-30px pb-5 pt-5px border-b border-border-primary">
                            <li class="group mt-4">
                                <!-- accordion header -->
                                <a href="{{ route('filament.user.pages.dashboard') }}"
                                   class="text-sm lg:text-base"
                                    target="_blank">
                                    <span class="inline-block h-50px w-50px border-2 border-border-color-1 text-center leading-50px mr-3">
                                        <i class="far fa-user"></i>
                                    </span>
                                    My Account
                                </a>
                            </li>

                            <li class="group mt-4">
                                <!-- accordion header -->
                                <a href="#" class="text-sm lg:text-base">
                                    <span class="inline-block h-50px w-50px border-2 border-border-color-1 text-center leading-50px mr-3">
                                        <i class="far fa-heart"></i><sup class="pl-0.5">3</sup>
                                    </span>
                                    Wishlist
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Mobile menu social area -->
                    <div>
                        <ul class="flex gap-3 items-center pt-4">
                            <li>
                                <a
                                    class="h-10 w-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white text-center text-sm lg:text-base"
                                    href="https://www.facebook.com/"
                                ><i class="fab fa-facebook-f leading-10"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    class="h-10 w-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white text-center text-sm lg:text-base"
                                    href="https://www.twiter.com/"
                                ><i class="fab fab fa-twitter leading-10"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    class="h-10 w-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white text-center text-sm lg:text-base"
                                    href="https://www.linkedin.com/"
                                ><i class="fab fa-linkedin leading-10"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    class="h-10 w-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white text-center text-sm lg:text-base"
                                    href="https://www.instagram.com/"
                                ><i class="fab fa-instagram leading-10"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
