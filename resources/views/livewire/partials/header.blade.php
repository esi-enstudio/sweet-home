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
                                <a target="_blank" href="{{ route('filament.admin.resources.properties.create') }}" class="px-4 md:px-5 py-0.5 md:py-10px ml-2 lg:ml-5 bg-secondary-color inline-block bg-opacity-100 hover:bg-opacity-60 hover:text-white">
                                    Add Listing
                                </a>
                            </li>
                        @endauth

                        @guest
                            <li>
                                <a href="#" class="px-4 md:px-5 py-0.5 md:py-10px ml-2 lg:ml-5 bg-secondary-color inline-block bg-opacity-100 hover:bg-opacity-60 hover:text-white">
                                    Sign in to Add Listing
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
                        <a
                                href="{{ route('home') }}"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px">
                            Home
                        </a>
                    </li>

                    <!-- About -->
                    <li class="relative group">
                        <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px">
                            About
                        </a>
                    </li>

                    <!-- Property -->
                    <li class="relative group">
                        <a
                                href="{{ route('properties') }}"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                        >
                            Property
                        </a>
                    </li>

                    <!-- News -->
                    <li class="relative group">
                        <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                        >
                            News
                        </a>
                    </li>

                    <!-- Contact -->
                    <li>
                        <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                        >
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- header right -->
            <div>
                <ul class="flex items-center gap-10px">
                    <li class="group relative">
                        <a
                                href="#"
                                class="h-50px w-50px text-heading-color shadow-box-shadow-1 flex justify-center items-center hover:bg-secondary-color hover:text-white transition-all duration-300"
                        >
                            <i class="icon-user font-bold text-lg"></i>
                        </a>
                        <!-- dropdown -->
                        <ul
                            class="py-10px w-150px shadow-box-shadow-4 absolute right-0 top-full opacity-0 invisible translate-y-4 bg-white transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-xl">
                            <li>
                                <a
                                    class="whitespace-nowrap px-15px py-5px"
                                    target="_blank"
                                    href="{{ route('filament.admin.auth.login') }}">Sign in</a>
                            </li>

                            <li>
                                <a
                                    class="whitespace-nowrap px-15px py-5px"
                                    target="_blank"
                                    href="{{ route('filament.admin.auth.register') }}">Register</a>
                            </li>

                            <li>
                                <a
                                    class="whitespace-nowrap px-15px py-5px"
                                    target="_blank"
                                    href="{{ route('filament.admin.pages.dashboard') }}">My Account</a>
                            </li>

                            <li>
                                <a
                                    class="whitespace-nowrap px-15px py-5px"
                                    target="_blank"
                                    href="#">Wishlist</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- mobile menu -->
    <div class="drawer-container mobile-menu-container">
        <div
                class="drawer-overlay fixed top-0 left-0 w-full h-full bg-black -z-1 close-drawer opacity-0 transition-all duration-300 invisible cursor-zoom-out block xl:hidden"
        ></div>
        <div
                class="drawer mobile-menu fixed top-0 -left-[300px] xs:-left-[400px] px-5 xs:px-10 py-50px w-300px xs:w-100 h-full transition-all duration-500 shadow-dropdown-secodary bg-whiteColor z-high block xl:hidden bg-white"
        >
            <div class="pr-15px overflow-auto h-full">
                <!-- mobile menu wrapper -->
                <div>
                    <!-- mobile logo area -->
                    <div
                            class="flex justify-between items-center border-b border-border-primary pt-3px pb-10px mb-25px"
                    >
                        <div>
                            <a href="index.html">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div>
                            <button class="close-drawer text-black text-3xl px-15px py-2">
                                ×
                            </button>
                        </div>
                    </div>

                    <!-- search input  -->
                    <div class="mb-50px">
                        <form class="w-full relative">
                            <input
                                    type="text"
                                    placeholder="Search..."
                                    class="text-sm text-paragraph-color pl-5 pr-50px placeholder:text-paragraph-color outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none"
                            >
                            <button
                                    type="submit"
                                    class="absolute top-1/2 -translate-y-1/2 right-7 text-heading-color"
                            >
                                <i class="icon-search text-lg font-bold"></i>
                            </button>
                        </form>
                    </div>

                    <!-- mobile menu accordions -->
                    <div
                            class="border-b border-border-primary dark:border-borderColor-dark pb-8"
                    >
                        <ul class="accordion-container">
                            <li class="accordion mt-4">
                                <!-- accordion header -->
                                <div
                                        class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5"
                                >
                                    Home
                                    <button class="px-3 h-full">
                        <span
                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75"
                        ></span
                        ><span
                                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75 rotate-90 -mt-[2px] transition-all duration-500"
                                        ></span>
                                    </button>
                                </div>
                                <!-- accordion content -->
                                <div
                                        class="accordion-content h-0 overflow-hidden transition-all duration-500"
                                >
                                    <div class="content-wrapper pl-15px">
                                        <ul>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 01</a
                                                >
                                            </li>
                                            <li class="accordion mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-2.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 02</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-3.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 03</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-4.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 04</a
                                                >
                                            </li>
                                            <li class="mt-4 relative">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-5.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                ><span
                                                            class="text-10px uppercase text-white bg-secondary-color px-3px absolute -left-2 -top-3 rounded-sm"
                                                    >video</span
                                                    >
                                                    Home Style 05</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-6.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 06</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-7.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 07</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-8.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 08</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-9.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 09</a
                                                >
                                            </li>
                                            <li class="mt-4 relative">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-10.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                ><span
                                                            class="text-10px uppercase text-white bg-secondary-color px-3px absolute -left-2 -top-3 rounded-sm"
                                                    >map</span
                                                    >
                                                    Home Style 10</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="index-11.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Home Style 11</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion mt-4">
                                <!-- accordion header -->
                                <div
                                        class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5"
                                >
                                    About
                                    <button class="px-3 h-full">
                        <span
                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75"
                        ></span
                        ><span
                                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75 rotate-90 -mt-[2px] transition-all duration-500"
                                        ></span>
                                    </button>
                                </div>
                                <!-- accordion content -->
                                <div
                                        class="accordion-content h-0 overflow-hidden transition-all duration-500"
                                >
                                    <div class="content-wrapper pl-15px">
                                        <ul>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="about.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >About1</a
                                                >
                                            </li>
                                            <li class="accordion mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="service.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Services</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="service-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Service Details</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="portfolio.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Portfolio</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="portfolio-2.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >
                                                    Portfolio - 02</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="portfolio-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Portfolio Details</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="team.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Team</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="team-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Team Details</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="faq.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >FAQ</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="locations.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Google Map Locations</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion mt-4">
                                <!-- accordion header -->
                                <div
                                        class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5"
                                >
                                    Property
                                    <button class="px-3 h-full">
                        <span
                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75"
                        ></span
                        ><span
                                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75 rotate-90 -mt-[2px] transition-all duration-500"
                                        ></span>
                                    </button>
                                </div>
                                <!-- accordion content -->
                                <div
                                        class="accordion-content h-0 overflow-hidden transition-all duration-500"
                                >
                                    <div class="content-wrapper pl-15px">
                                        <ul>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="shop.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Property Grid</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="shop-list.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Property List</a
                                                >
                                            </li>
                                            <li class="accordion mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="shop-grid.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Property No Sidebar</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="shop-left-sidebar.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Property Left sidebar</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="shop-right-sidebar.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Property right sidebar</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="product-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >
                                                    Property details
                                                </a>
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="cart.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Cart</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="wishlist.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Wishlist</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="checkout.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Checkout</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="order-tracking.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Order Tracking</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="account.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >My Account</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a href="login.html" class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color">Sign inn</a>
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="register.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Register</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion mt-4">
                                <!-- accordion header -->
                                <div
                                        class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5"
                                >
                                    News
                                    <button class="px-3 h-full">
                        <span
                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75"
                        ></span
                        ><span
                                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75 rotate-90 -mt-[2px] transition-all duration-500"
                                        ></span>
                                    </button>
                                </div>
                                <!-- accordion content -->
                                <div
                                        class="accordion-content h-0 overflow-hidden transition-all duration-500"
                                >
                                    <div class="content-wrapper pl-15px">
                                        <ul>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="blog.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >News</a
                                                >
                                            </li>
                                            <li class="accordion mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="blog-grid.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >News Grid</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="blog-left-sidebar.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >News Left sidebar</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="blog-right-sidebar.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >News Right sidebar</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="blog-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >
                                                    News details</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion mt-4">
                                <!-- accordion header -->
                                <div
                                        class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5"
                                >
                                    Pages
                                    <button class="px-3 h-full">
                        <span
                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75"
                        ></span
                        ><span
                                                class="w-[10px] h-0.5 bg-gray1 block dark:bg-whiteColor bg-opacity-75 rotate-90 -mt-[2px] transition-all duration-500"
                                        ></span>
                                    </button>
                                </div>
                                <!-- accordion content -->
                                <div
                                        class="accordion-content h-0 overflow-hidden transition-all duration-500"
                                >
                                    <div class="content-wrapper pl-15px">
                                        <ul>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="about.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >About</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="service.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Services</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="service-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Service Details</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="portfolio.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Portfolio</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="portfolio-2.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >
                                                    Portfolio - 02</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="portfolio-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Portfolio Details</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="team.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Team</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="team-details.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Team Details</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="faq.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >FAQ</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="history.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >History</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="add-listing.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Add Listing</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="locations.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Google Map Locations</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="404.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >404</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="contact.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Contact</a
                                                >
                                            </li>
                                            <li class="mt-4">
                                                <!-- accordion header -->

                                                <a
                                                        href="coming-soon.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                >Coming Soon</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-4">
                                <!-- accordion header -->
                                <a
                                        href="contact.html"
                                        class="accordion-controller flex items-center justify-between cursor-pointer hover:text-secondary-color uppercase text-sm lg:text-base py-2 lg:py-2.5"
                                >
                                    CONTACT</a
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- my account -->
                    <div>
                        <ul class="mb-30px pb-5 pt-5px border-b border-border-primary">
                            <li class="group mt-4">
                                <!-- accordion header -->
                                <a href="account.html" class="text-sm lg:text-base">
                      <span
                              class="inline-block h-50px w-50px border-2 border-border-color-1 text-center leading-50px mr-3"
                      >
                        <i class="far fa-user"></i>
                      </span>
                                    My Account
                                </a>
                            </li>
                            <li class="group mt-4">
                                <!-- accordion header -->
                                <a
                                        href="wishlist.html#"
                                        class="text-sm lg:text-base"
                                >
                      <span
                              class="inline-block h-50px w-50px border-2 border-border-color-1 text-center leading-50px mr-3"
                      >
                        <i class="far fa-heart"></i><sup class="pl-0.5">3</sup>
                      </span>
                                    Wishlist
                                </a>
                            </li>
                            <li class="group mt-4">
                                <!-- accordion header -->
                                <a href="cart.html" class="text-sm lg:text-base">
                      <span
                              class="inline-block h-50px w-50px border-2 border-border-color-1 text-center leading-50px mr-3"
                      >
                        <i class="fas fa-shopping-cart"></i>
                        <sup>5</sup>
                      </span>
                                    Shoping Cart
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
