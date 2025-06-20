<div>
    <header>
        <!-- header top -->
        <div class="bg-section-bg-6">
            <div class="container text-white text-13px md:text-sm font-bold">
                <div
                    class="flex justify-center md:justify-between items-center flex-wrap md:flex-nowrap"
                >
                    <div class="flex justify-center md:block pt-2 md:pt-0">
                        <ul
                            class="basis-full md:basis-auto flex gap-6 lg:gap-9 items-center"
                        >
                            <li>
                                <a
                                    class="hover:text-secondary-color"
                                    href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"
                                ><i
                                        class="icon-mail text-secondary-color font-bold mr-0.5"
                                    ></i>
                                    info@webmail.com</a
                                >
                            </li>
                            <li>
                                <a class="hover:text-secondary-color" href="locations.html"
                                ><i
                                        class="icon-placeholder text-secondary-color font-bold mr-0.5"
                                    ></i>
                                    15/A, Nest Tower, NYC</a
                                >
                            </li>
                        </ul>
                    </div>

                    <div
                        class="basis-full md:basis-auto flex justify-center md:block py-5px md:py-0"
                    >
                        <ul class="text flex items-center gap-15px">
                            <li>
                                <a href="https://www.facebook.com/" title="Facebook"
                                ><i class="fab fa-facebook-f font-bold"></i
                                    ></a>
                            </li>
                            <li>
                                <a href="https://www.x.com/" title="Twitter"
                                ><i class="fab fa-twitter font-bold"></i
                                    ></a>
                            </li>

                            <li>
                                <a href="https://www.instagram.com/" title="Instagram"
                                ><i class="fab fa-instagram font-bold"></i
                                    ></a>
                            </li>
                            <li>
                                <a href="https://www.dribbble.com/" title="Dribbble"
                                ><i class="fab fa-dribbble font-bold"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="add-listing.html"
                                    class="px-4 md:px-5 py-0.5 md:py-10px ml-2 lg:ml-5 bg-secondary-color inline-block bg-opacity-100 hover:bg-opacity-60 hover:text-white"
                                >Add Listing</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar main -->
        <div class="sticky-header z-xl bg-white transition-all duration-700">
            <div
                class="container flex flex-col md:flex-row justify-center md:justify-between items-center relative py-21px"
            >
                <!-- logo area -->
                <div class="mt-10px mb-22px md:mt-0 md:mb-0 leading-1">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="" >
                    </a>
                </div>
                <nav class="flex-grow hidden xl:block">
                    <ul class="flex items-center justify-center gap-15px xl:gap-5">
                        <!-- item 1 -->
                        <li class="relative group">
                            <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                            >Home <span class="text-sm font-extrabold -ml-0.5">+</span></a
                            >
                            <!-- dropdown -->
                            <ul
                                class="py-15px border-t-[5px] border-secondary-color bg-white w-dropdown shadow-box-shadow-4 absolute left-0 top-full opacity-0 invisible translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-xl"
                            >
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="{{ route('home') }}"
                                    >Home Style 01</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-1.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-2.html"
                                    >Home Style 02</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-2.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-3.html"
                                    >Home Style 03</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-3.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-4.html"
                                    >Home Style 04</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-4.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2 relative"
                                        href="index-5.html"
                                    ><span
                                            class="text-10px uppercase text-white bg-secondary-color px-3px absolute left-5 -top-1 rounded-sm"
                                        >video</span
                                        >
                                        Home Style 05</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-5.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-6.html"
                                    >Home Style 06</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-6.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-7.html"
                                    >Home Style 07</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-7.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-8.html"
                                    >Home Style 08</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-8.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-9.html"
                                    >Home Style 09</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-9.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2 relative"
                                        href="index-10.html"
                                    ><span
                                            class="text-10px uppercase text-white bg-secondary-color px-3px absolute left-5 -top-1 rounded-sm"
                                        >map</span
                                        >
                                        Home Style 10</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-10.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                                <li class="group/nested relative">
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="index-11.html"
                                    >Home Style 11</a
                                    >
                                    <img
                                        src="{{ asset('assets/img/home-demos/home-11.jpg') }}"
                                        alt="#"
                                        class="w-130px absolute -bottom-2 -right-3 shadow-box-shadow-3 opacity-0 translate-y-1 invisible transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0"
                                    >
                                </li>
                            </ul>
                        </li>
                        <!-- item 2 -->
                        <li class="relative group">
                            <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                            >About
                                <span class="text-sm font-extrabold -ml-0.5">+</span></a
                            >
                            <!-- dropdown -->
                            <ul
                                class="py-15px border-t-[5px] border-secondary-color bg-white w-dropdown shadow-box-shadow-4 absolute left-0 top-full opacity-0 invisible translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-xl"
                            >
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="about.html"
                                    >About</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="service.html"
                                    >Services</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="service-details.html"
                                    >Service Details</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="portfolio.html"
                                    >Portfolio</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="portfolio-2.html"
                                    >Portfolio - 02</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="portfolio-details.html"
                                    >Portfolio Details</a
                                    >
                                </li>
                                <li>
                                    <a class="whitespace-nowrap px-30px py-2" href="team.html"
                                    >Team</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="team-details.html"
                                    >Team Details</a
                                    >
                                </li>
                                <li>
                                    <a class="whitespace-nowrap px-30px py-2" href="faq.html"
                                    >FAQ</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="locations.html"
                                    >Google Map Locations</a
                                    >
                                </li>
                            </ul>
                        </li>

                        <!-- item 3 -->
                        <li class="relative group">
                            <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                            >Property
                                <span class="text-sm font-extrabold -ml-0.5">+</span></a
                            >
                            <!-- dropdown -->
                            <ul
                                class="py-15px border-t-[5px] border-secondary-color bg-white w-dropdown shadow-box-shadow-4 absolute left-0 top-full opacity-0 invisible translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-xl"
                            >
                                <li>
                                    <a class="whitespace-nowrap px-30px py-2" href="shop.html"
                                    >Property Grid</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="shop-list.html"
                                    >Property List</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="shop-grid.html"
                                    >Property No Sidebar</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="shop-left-sidebar.html"
                                    >Property Left sidebar</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="shop-right-sidebar.html"
                                    >Property right sidebar</a
                                    >
                                </li>

                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="product-details.html"
                                    >Property details
                                    </a>
                                </li>
                                <li class="relative group/nested">
                                    <a class="whitespace-nowrap px-30px py-2" href="#"
                                    >Other Pages
                                        <span
                                            class="absolute top-1/2 -translate-y-1/2 right-3 group-hover/nested:text-secondary-color"
                                        >&gt;&gt;</span
                                        >
                                    </a>
                                    <!-- dropdown -->
                                    <ul
                                        class="py-15px border-t-[5px] border-secondary-color w-dropdown shadow-box-shadow-4 absolute left-full top-0 opacity-0 invisible translate-y-[5px] transition-all duration-300 group-hover/nested:opacity-100 group-hover/nested:visible group-hover/nested:translate-y-0 bg-white"
                                    >
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-30px py-2"
                                                href="cart.html"
                                            >Cart</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-30px py-2"
                                                href="wishlist.html"
                                            >Wishlist</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-30px py-2"
                                                href="checkout.html"
                                            >Checkout</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-30px py-2"
                                                href="order-tracking.html"
                                            >Order Tracking</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-30px py-2"
                                                href="account.html"
                                            >My Account</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-30px py-2"
                                                href="login.html"
                                            >Sign in</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-30px py-2"
                                                href="register.html"
                                            >Register</a
                                            >
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- item 4 -->
                        <li class="relative group">
                            <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                            >News <span class="text-sm font-extrabold -ml-0.5">+</span></a
                            >
                            <!-- dropdown -->
                            <ul
                                class="py-15px border-t-[5px] border-secondary-color bg-white w-dropdown shadow-box-shadow-4 absolute left-0 top-full opacity-0 invisible translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-xl"
                            >
                                <li>
                                    <a class="whitespace-nowrap px-30px py-2" href="blog.html"
                                    >News</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="blog-grid.html"
                                    >News Grid</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="blog-left-sidebar.html"
                                    >News Left sidebar</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="blog-right-sidebar.html"
                                    >News Right sidebar</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-30px py-2"
                                        href="blog-details.html"
                                    >News details</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <!-- item 5 -->
                        <li class="group">
                            <a
                                href="#"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                            >Pages
                                <span class="text-sm font-extrabold -ml-0.5">+</span></a
                            >
                            <!-- dropdown -->
                            <ul
                                class="container w-full px-0 py-15px border-t-[5px] border-secondary-color bg-white shadow-box-shadow-4 absolute left-0 top-full opacity-0 invisible translate-y-4 transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:-translate-y-4 grid grid-cols-4 z-xl"
                            >
                                <li class="pr-3 pt-3 pl-30px">
                                    <ul>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-10px py-6px bg-section-bg-1 border-b !border-dashed border-border-dashed w-full"
                                                href="#"
                                            >Inner Pages</a
                                            >
                                        </li>
                                        <li>
                                            <ul class="py-15px">
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="portfolio.html"
                                                    >Portfolio</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="portfolio-2.html"
                                                    >Portfolio - 02</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="portfolio-details.html"
                                                    >Portfolio Details</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="team.html"
                                                    >Team</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="team-details.html"
                                                    >Team Details</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="faq.html"
                                                    >FAQ</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pr-3 pt-3 pl-30px">
                                    <ul>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-10px py-6px bg-section-bg-1 border-b !border-dashed border-border-dashed w-full"
                                                href="#"
                                            >Inner Pages</a
                                            >
                                        </li>
                                        <li>
                                            <ul class="py-15px">
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="history.html"
                                                    >History</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="add-listing.html"
                                                    >Add Listing</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="locations.html"
                                                    >Google Map Locations</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="404.html"
                                                    >404</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="contact.html"
                                                    >Contact</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="coming-soon.html"
                                                    >Coming Soon</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pr-3 pt-3 pl-30px">
                                    <ul>
                                        <li>
                                            <a
                                                class="whitespace-nowrap px-10px py-6px bg-section-bg-1 border-b !border-dashed border-border-dashed w-full"
                                                href="#"
                                            >Shop Pages</a
                                            >
                                        </li>
                                        <li>
                                            <ul class="py-15px">
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="shop.html"
                                                    >Shop</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="shop-left-sidebar.html"
                                                    >Shop Left sidebar</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="shop-right-sidebar.html"
                                                    >Shop right sidebar</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="shop-grid.html"
                                                    >Shop Grid</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="product-details.html"
                                                    >Shop details
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        class="whitespace-nowrap px-10px py-2"
                                                        href="cart.html"
                                                    >Cart</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pr-3 pt-3 pl-30px">
                                    <a
                                        class="whitespace-nowrap p-10px bg-section-bg-1 border-b !border-dashed border-border-dashed w-full"
                                        href="shop.html"
                                    ><img
                                            src="assets/img/banner/menu-banner-1.jpg"
                                            alt=""
                                            class="w-full inline-block"
                                        ></a>
                                </li>
                            </ul>
                        </li>
                        <!-- item 6 -->
                        <li>
                            <a
                                href="contact.html"
                                class="text-lg xl:text-15px 2xl:text-lg text-heading-color hover:text-secondary-color font-semibold whitespace-nowrap pl-10px py-22px"
                            >Contact
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- header right -->
                <div>
                    <ul class="flex items-center gap-10px">
                        <li class="relative search-form-container">
                            <button
                                class="search-toggle h-50px w-50px text-heading-color shadow-box-shadow-1 flex justify-center items-center hover:bg-secondary-color hover:text-white transition-all duration-300"
                            >
                                <i class="icon-search for-search-show font-bold"></i>
                                <i class="icon-cancel for-search-close font-bold hidden"></i>
                            </button>
                            <div
                                class="search-form h-0 overflow-hidden absolute right-0 top-full mt-15px transition-all duration-300 shadow-box-shadow-3 z-xl bg-white"
                            >
                                <form class="w-80 p-15px relative">
                                    <input
                                        type="text"
                                        placeholder="Search here..."
                                        class="text-sm text-paragraph-color pl-5 pr-50px placeholder:text-paragraph-color outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-60px block w-full rounded-none"
                                    >
                                    <button
                                        type="submit"
                                        class="absolute top-1/2 -translate-y-1/2 right-7 text-heading-color"
                                    >
                                        <i class="icon-search text-lg font-bold"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                        <li class="group relative">
                            <a
                                href="#"
                                class="h-50px w-50px text-heading-color shadow-box-shadow-1 flex justify-center items-center hover:bg-secondary-color hover:text-white transition-all duration-300"
                            >
                                <i class="icon-user font-bold text-lg"></i>
                            </a>
                            <!-- dropdown -->
                            <ul
                                class="py-10px w-150px shadow-box-shadow-4 absolute right-0 top-full opacity-0 invisible translate-y-4 bg-white transition-all duration-300 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 z-xl"
                            >
                                <li>
                                    <a
                                        class="whitespace-nowrap px-15px py-5px"
                                        href="login.html"
                                    >Sign in</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-15px py-5px"
                                        href="register.html"
                                    >Register</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-15px py-5px"
                                        href="account.html"
                                    >My Account</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="whitespace-nowrap px-15px py-5px"
                                        href="wishlist.html"
                                    >Wishlist</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button
                                class="show-drawer h-50px w-50px text-heading-color shadow-box-shadow-1 flex justify-center items-center hover:bg-secondary-color hover:text-white transition-all duration-300"
                            >
                                <i class="icon-shopping-cart font-bold text-lg"></i>
                                <sup class="ml-1 text-sm font-semibold">2</sup>
                            </button>
                        </li>
                        <li class="block xl:hidden">
                            <div
                                class="show-drawer d-xl-none h-50px w-50px text-heading-color shadow-box-shadow-1 flex justify-center items-center transition-all duration-300 relative"
                            >
                                <a href="#ltn__utilize-drawer " class="utilize-toggle">
                                    <svg viewBox="0 0 800 600">
                                        <path
                                            d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                            id="top"
                                        ></path>
                                        <path d="M300,320 L540,320" id="middle"></path>
                                        <path
                                            d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                            id="bottom"
                                            transform="translate(480, 320) scale(1, -1) translate(-480, -318) "
                                        ></path>
                                    </svg>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- cart sidebar -->
        <div class="drawer-container cart-container">
            <div
                class="drawer-overlay fixed top-0 left-0 w-full h-full bg-black -z-1 close-drawer opacity-0 transition-all duration-300 invisible cursor-zoom-out"
            ></div>
            <div
                class="drawer cart fixed top-0 -right-[300px] xs:-right-[400px] pl-30px pr-10px py-5 w-300px xs:w-100 h-full transition-all duration-500 shadow-dropdown-secodary bg-whiteColor z-high bg-white"
            >
                <div class="h-full">
                    <!-- cart wrapper -->
                    <div class="h-full overflow-y-auto pr-5">
                        <!-- cart top -->
                        <div
                            class="flex justify-between items-center border-b border-border-primary pt-3px pb-3 mb-25px"
                        >
                            <div>
                                <span class="text-sm md:text-base font-bold">Cart</span>
                            </div>
                            <div>
                                <button class="close-drawer text-black text-3xl px-15px py-2">
                                    ×
                                </button>
                            </div>
                        </div>

                        <!-- cart items -->
                        <div
                            class="max-h-[calc(100%-(360px))] cart-items overflow-y-auto"
                        >
                            <ul>
                                <li class="accordion pl-10px pt-5 mb-5 flex gap-15px">
                                    <div>
                                        <a href="product-details.html" class="relative">
                                            <img
                                                src="assets/img/product/1.png"
                                                alt=""
                                                class="w-20 inline-block"
                                            >
                                            <span
                                                class="w-5 h-5 shadow-box-shadow-3 text-center text-10px bg-white hover:bg-secondary-color hover:text-white rounded-full absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 transition-all duration-300 cursor-pointer"
                                            >
                          <i class="icon-cancel leading-5"></i>
                        </span>
                                        </a>
                                    </div>
                                    <div>
                                        <h6 class="text-sm md:text-15px lg:text-base mb-5px">
                                            <a
                                                href="product-details.html"
                                                class="leading-23px text-heading-color hover:text-secondary-color font-medium"
                                            >
                                                Wheel Bearing Retainer
                                            </a>
                                        </h6>
                                        <div class="text-sm lg:text-base">
                                            <span class="leading-22px">1 x $65.00</span>
                                        </div>
                                    </div>
                                </li>

                                <li
                                    class="border-t border-border-color-1 accordion pl-10px pt-5 mb-5 flex gap-15px"
                                >
                                    <div>
                                        <a href="product-details.html" class="relative">
                                            <img
                                                src="assets/img/product/2.png"
                                                alt=""
                                                class="w-20 inline-block"
                                            >
                                            <span
                                                class="w-5 h-5 shadow-box-shadow-3 text-center text-10px bg-white hover:bg-secondary-color hover:text-white rounded-full absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 transition-all duration-300 cursor-pointer"
                                            >
                          <i class="icon-cancel leading-5"></i>
                        </span>
                                        </a>
                                    </div>
                                    <div>
                                        <h6 class="text-sm md:text-15px lg:text-base mb-5px">
                                            <a
                                                href="product-details.html"
                                                class="leading-23px text-heading-color hover:text-secondary-color font-medium"
                                            >
                                                3 Rooms Manhattan
                                            </a>
                                        </h6>
                                        <div class="text-sm lg:text-base">
                                            <span class="leading-22px">1 x $85.00</span>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="border-t border-border-color-1 accordion pl-10px pt-5 mb-5 flex gap-15px"
                                >
                                    <div>
                                        <a href="product-details.html" class="relative">
                                            <img
                                                src="assets/img/product/3.png"
                                                alt=""
                                                class="w-20 inline-block"
                                            >
                                            <span
                                                class="w-5 h-5 shadow-box-shadow-3 text-center text-10px bg-white hover:bg-secondary-color hover:text-white rounded-full absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 transition-all duration-300 cursor-pointer"
                                            >
                          <i class="icon-cancel leading-5"></i>
                        </span>
                                        </a>
                                    </div>
                                    <div>
                                        <h6 class="text-sm md:text-15px lg:text-base mb-5px">
                                            <a
                                                href="product-details.html"
                                                class="leading-23px text-heading-color hover:text-secondary-color font-medium"
                                            >
                                                OE Replica Wheels
                                            </a>
                                        </h6>
                                        <div class="text-sm lg:text-base">
                                            <span class="leading-22px">1 x $92.00</span>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="border-t border-border-color-1 accordion pl-10px pt-5 mb-5 flex gap-15px"
                                >
                                    <div>
                                        <a href="product-details.html" class="relative">
                                            <img
                                                src="assets/img/product/4.png"
                                                alt=""
                                                class="w-20 inline-block"
                                            >
                                            <span
                                                class="w-5 h-5 shadow-box-shadow-3 text-center text-10px bg-white hover:bg-secondary-color hover:text-white rounded-full absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 transition-all duration-300 cursor-pointer"
                                            >
                          <i class="icon-cancel leading-5"></i>
                        </span>
                                        </a>
                                    </div>
                                    <div>
                                        <h6 class="text-sm md:text-15px lg:text-base mb-5px">
                                            <a
                                                href="product-details.html"
                                                class="leading-23px text-heading-color hover:text-secondary-color font-medium"
                                            >
                                                Shock Mount Insulator
                                            </a>
                                        </h6>
                                        <div class="text-sm lg:text-base">
                                            <span class="leading-22px">1 x $68.00</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Total price -->
                        <div class="py-5 mt-25px border-y border-border-color-1">
                            <h6
                                class="lg:text-lg text-heading-color font-bold flex justify-between items-center mb-0"
                            >
                                <span>Subtotal: </span>
                                <span class="text-secondary-color">$310.00</span>
                            </h6>
                        </div>

                        <!-- action area -->
                        <div class="pt-25px pb-15px flex justify-between">
                            <h5
                                class="uppercase text-sm text-white relative group whitespace-nowrap font-normal transition-all duration-300 border border-secondary-color hover:border-heading-color"
                            >
                  <span
                      class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"
                  ></span>
                                <a
                                    href="cart.html"
                                    class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-heading-color leading-23px"
                                >view cart</a
                                >
                            </h5>
                            <h5
                                class="uppercase text-sm text-white relative group whitespace-nowrap font-normal transition-all duration-300 border border-black hover:border-secondary-color"
                            >
                  <span
                      class="inline-block absolute top-0 left-0 w-full h-full bg-black group-hover:bg-secondary-color z-1 group-hover:w-0 transition-all duration-300"
                  ></span>
                                <a
                                    href="checkout.html"
                                    class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-secondary-color leading-23px"
                                >checkout</a
                                >
                            </h5>
                        </div>

                        <div class="text-sm">
                            <p class="leading-15px mb-0">
                                Free Shipping on All Orders Over $100!
                            </p>
                        </div>
                    </div>
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
                                <a href="{{ route('home') }}">
                                    <img src="assets/img/logo.png" alt="" >
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
                                                        href="{{ route('home') }}"
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

                                                    <a
                                                        href="login.html"
                                                        class="!leading-22px text-darkdeep1 text-sm lg:text-base hover:text-secondary-color"
                                                    >Sign in</a
                                                    >
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
                                    <a href="wishlist.html#" class="text-sm lg:text-base">
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

    <main>
        <!-- banner section -->
        <section>
            <!-- banner section -->
            <div
                class="w-full bg-[url('../img/bg/14.html')] bg-no-repeat bg-cover bg-center relative z-0 after:w-full after:h-full after:absolute after:top-0 after:left-0 after:bg-white after:bg-opacity-30 after:-z-1"
            >
                <div class="container py-110px">
                    <h1
                        class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px"
                    >
              <span
                  class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3"
              >Property details</span
              >
                    </h1>
                    <ul
                        class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4"
                    >
                        <li class="home relative leading-1.8 lg:leading-1.8">
                            <a href="{{ route('home') }}"
                            ><i class="fas fa-home text-secondary-color"></i> Home</a
                            >
                        </li>
                        <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                            Property details
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- details slider -->
        <div>
            <div class="news-slider-container swiper-container relative">
                <!-- product details -->
                <div class="swiper product-details-slider static">
                    <div class="swiper-wrapper mb-10">
                        <!-- card 1 -->
                        @forelse($property->media->gallery as $media)
                            <div class="swiper-slide cursor-default">
                                <a
                                    href="{{ asset('storage/' . $media) }}"
                                    class="glightbox overflow-hidden"
                                    data-width="118vh"
                                >
                                    <img
                                        class="hover:scale-110 transition-all duration-700"
                                        width="1904"
                                        height="1006"
                                        src="{{ asset('storage/' . $media) }}"
                                        alt="Gallery Images"
                                    >
                                </a>
                            </div>

                        @empty
                            <p>No image found.</p>
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
        <!-- product details section -->
        <section>
            <div class="container modal-container property-tab pt-70px pb-20">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px">
                    <!-- details body -->
                    <div class="lg:col-start-1 lg:col-span-8">
                        <!--  top -->
                        <ul
                            class="flex flex-wrap gap-x-15px md:gap-x-35px gap-y-15px items-center mb-30px"
                        >
                            <li>
                                <ul class="flex gap-x-15px md:gap-x-30px items-center">
                                    <li>
                                        <a
                                            class="text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-secondary-color hover:bg-primary-color hover:text-white font-semibold"
                                            href="#"
                                        ><span class="leading-1.8 md:leading-1.8"
                                            >Featured</span
                                            ></a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-orange font-semibold hover:text-white"
                                            href="#"
                                        ><span class="leading-1.8 md:leading-1.8"
                                            >For Rent</span
                                            ></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="flex gap-x-15px md:gap-x-30px items-center">
                                    <li>
                                        <p class="text-xs md:text-sm font-semibold">
                        <span class="leading-1.8 md:leading-1.8"
                        ><i
                                class="far fa-calendar-alt text-secondary-color mr-5px"
                            ></i>
                          May 19, 2024</span
                        >
                                        </p>
                                    </li>
                                    <li>
                                        <a class="text-xs md:text-sm font-semibold" href="#"
                                        ><span class="leading-1.8 md:leading-1.8"
                                            ><i
                                                    class="far fa-comments text-secondary-color mr-5px"
                                                ></i>
                          35 Comments</span
                                            ></a
                                        >
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <!-- main -->
                        <div>
                            <h4
                                class="text-2xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px"
                            >
                  <span class="leading-1.3 lg:leading-1.3 xl:leading-1.3"
                  >Diamond Manor Apartment</span
                  >
                            </h4>
                            <p class="text-sm">
                  <span class="leading-1.8"
                  ><i class="flaticon-pin text-secondary-color"></i> Belmont
                    Gardens, Chicago</span
                  >
                            </p>
                            <!-- Description -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Description
                            </h4>
                            <p class="text-sm lg:text-base my-5">
                  <span class="leading-1.8 lg:leading-1.8"
                  >Massa tempor nec feugiat nisl pretium. Egestas fringilla
                    phasellus faucibus scelerisque eleifend donec Porta nibh
                    venenatis cras sed felis eget velit aliquet. Neque volutpat
                    ac tincidunt vitae semper quis lectus. Turpis in eu mi
                    bibendum neque egestas congue quisque. Sed elementum tempus
                    egestas sed sed risus pretium quam. Dignissim sodales ut eu
                    sem. Nibh mauris cursus mattis molestee iaculis at erat
                    pellentesque. Id interdum velit laoreet id donec ultrices
                    tincidunt.</span
                  >
                            </p>

                            <p class="text-sm lg:text-base my-5">
                  <span class="leading-1.8 lg:leading-1.8"
                  >To the left is the modern kitchen with central island,
                    leading through to the unique breakfast family room which
                    feature glass walls and doors out onto the garden and access
                    to the separate utility room.</span
                  >
                            </p>
                            <!-- Property Detail -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Property Detail
                            </h4>
                            <div class="flex flex-col md:flex-row bg-section-bg-1 mb-60px">
                                <ul
                                    class="px-30px md:px-50px py-5 md:pt-30px md:pb-10 md:border-r md:border-border-color-7"
                                >
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Property ID:</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                                            <span class="leading-1.8 lg:leading-1.8"> HZ29</span>
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Home Area:
                      </span>
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                        <span class="leading-1.8 lg:leading-1.8">
                          120 sqft</span
                        >
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Rooms:</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                                            <span class="leading-1.8 lg:leading-1.8"> 7</span>
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Baths</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                                            <span class="leading-1.8 lg:leading-1.8"> 2</span>
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Year built:</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                                            <span class="leading-1.8 lg:leading-1.8"> 1992</span>
                                        </p>
                                    </li>
                                </ul>
                                <ul class="px-30px md:px-50px py-5 md:pt-30px md:pb-10">
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Lot Area:</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                                            <span class="leading-1.8 lg:leading-1.8"> HZ29</span>
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Lot dimensions:
                      </span>
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                        <span class="leading-1.8 lg:leading-1.8">
                          120 sqft</span
                        >
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Beds:</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                                            <span class="leading-1.8 lg:leading-1.8"> 7</span>
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Price:</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                                            <span class="leading-1.8 lg:leading-1.8"> 2</span>
                                        </p>
                                    </li>
                                    <li class="text-sm mt-4 font-semibold">
                      <span
                          class="leading-1.8 min-w-[110px] inline-block flex-shrink-0"
                      >Property Status:</span
                      >
                                        <p
                                            class="text-sm lg:text-base inline-block text-heading-color"
                                        >
                        <span class="leading-1.8 lg:leading-1.8">
                          For Sale</span
                        >
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <!-- Facts and Features-->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Facts and Features
                            </h4>

                            <ul class="flex flex-wrap mb-45px">
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Living Room</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Garage</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Dining Area</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Bedroom</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Bathroom</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Gym Area</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Garden</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5"
                                    >
                                        <i
                                            class="flaticon-double-bed text-22px text-secondary-color"
                                        ></i>
                                    </div>
                                    <div>
                                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                                            <span class="leading-1.3"> Parking</span>
                                        </h6>
                                        <p class="text-[12.25px] lg:text-sm">
                                            <span class="lg:leading-1.8"> 20 x 16 sq feet </span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <!-- Gallery -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                From Our Gallery
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-30px mb-60px">
                                <div class="md:cols-start-1 md:col-span-1 leading-1">
                                    <a
                                        href="{{ asset('assets/img/others/14.jpg') }}"
                                        class="glightbox w-full leading-1 md:h-full"
                                    >
                                        <img
                                            src="{{ asset('assets/img/others/14.jpg') }}"
                                            alt=""
                                            class="w-full md:h-full"
                                        >
                                    </a>
                                </div>

                                <div
                                    class="md:cols-start-1 md:col-span-1 md:row-start-2 md:row-sapn-1 leading-1"
                                >
                                    <a
                                        href="{{ asset('assets/img/others/15.jpg') }}"
                                        class="glightbox w-full leading-1"
                                    >
                                        <img
                                            src="{{ asset('assets/img/others/15.jpg') }}"
                                            alt=""
                                            class="w-full"
                                        >
                                    </a>
                                </div>
                                <div
                                    class="md:cols-start-2 md:col-span-1 md:row-start-1 md:row-span-2 leading-1"
                                >
                                    <a
                                        href="{{ asset('assets/img/others/16.jpg') }}"
                                        class="glightbox w-full leading-1 md:h-full"
                                        data-width="56vh"
                                    >
                                        <img
                                            src="{{ asset('assets/img/others/16.jpg') }}"
                                            alt=""
                                            class="w-full md:h-full"
                                        >
                                    </a>
                                </div>
                            </div>

                            <!-- Amenities -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Amenities
                            </h4>
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-60px gap-y-15px"
                            >
                                <ul class="flex flex-col gap-y-15px">
                                    <li class="text-sm font-bold">
                                        <label
                                            for="dishwasher-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="dishwasher-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Air Conditioning
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="floor-coverings-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="floor-coverings-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Gym
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="internet-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="internet-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Microwave
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="build-wardrobes-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="build-wardrobes-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Swimming Pool
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="supermarket-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="supermarket-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Swimming Pool
                                        </label>
                                    </li>
                                </ul>
                                <ul class="flex flex-col gap-y-15px">
                                    <li class="text-sm font-bold">
                                        <label
                                            for="kids-zone-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="kids-zone-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            gap-y-15px
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="recreation-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="recreation-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Recreation
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="microwave-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="microwave-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Microwave
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="basketball-cout-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="basketball-cout-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Basketball Cout
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="fireplace-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="fireplace-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Fireplace
                                        </label>
                                    </li>
                                </ul>
                                <ul class="flex flex-col gap-y-15px">
                                    <li class="text-sm font-bold">
                                        <label
                                            for="refrigerator-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="refrigerator-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Refrigerator
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="window-coverings-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="window-coverings-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Window Coverings
                                        </label>
                                    </li>

                                    <li class="text-sm font-bold">
                                        <label
                                            for="washer-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="washer-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Washer
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="24x7-security-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="24x7-security-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            24x7 Security
                                        </label>
                                    </li>
                                    <li class="text-sm font-bold">
                                        <label
                                            for="indoor-game-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                        ><input
                                                type="checkbox"
                                                id="indoor-game-type"
                                                class="hidden"
                                                checked
                                            >
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            Indoor Game
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <!-- Location -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Location
                            </h4>
                            <div class="h-360px mb-60px">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7%3A0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd"

                                    style="height:100%;width:100%;border:0px;"

                                    allowfullscreen=""
                                    aria-hidden="false"
                                    tabindex="0"
                                ></iframe>
                            </div>

                            <!-- Floor Plans -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Floor Plans
                            </h4>
                            <div class="tab plan-tab mb-60px">
                                <div
                                    class="tab-links flex flex-wrap items-center gap-x-5 lg:gap-x-30px xl:gap-x-50px gap-y-10px text-sm lg:text-lg xl:text-xl text-heading-color mb-50px"
                                >
                                    <button
                                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"
                                    >
                                        First Floor
                                    </button>

                                    <button
                                        class="active p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"
                                    >
                                        Second Floor
                                    </button>

                                    <button
                                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"
                                    >
                                        Third Floor
                                    </button>

                                    <button
                                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"
                                    >
                                        Top Garden
                                    </button>
                                </div>

                                <div class="tab-contents">
                                    <!-- content 1 -->
                                    <div class="hidden opacity-0">
                                        <div
                                            class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-50px"
                                        >
                                            <div class="lg:col-start-1 lg:col-span-7">
                                                <img
                                                    src="{{ asset('assets/img/others/10.png') }}"
                                                    class="w-full"
                                                    alt="#"
                                                >
                                            </div>
                                            <div class="lg:col-start-8 lg:col-span-5">
                                                <h6
                                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-heading-color mb-15px leading-1.3"
                                                >
                                                    <span class="leading-1.3"> First Floor </span>
                                                </h6>
                                                <p class="text-sm lg:text-base">
                            <span class="leading-1.8"
                            >Enimad minim veniam quis nostrud exercitation
                              ullamco laboris. Lorem ipsum dolor sit amet cons
                              aetetur adipisicing elit sedo eiusmod
                              tempor.Incididunt labore et dolore magna aliqua.
                              sed ayd minim veniam.</span
                            >
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-10 py-5 bg-section-bg-1 grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-10px mt-50px"
                                        >
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Total Area
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                2800 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Bedroom
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                150 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Belcony/Pets
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                Allowed
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Lounge
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                650 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content 2 -->
                                    <div>
                                        <div
                                            class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-50px"
                                        >
                                            <div class="lg:col-start-1 lg:col-span-7">
                                                <img
                                                    src="{{ asset('assets/img/others/10.png') }}"
                                                    class="w-full"
                                                    alt="#"
                                                >
                                            </div>
                                            <div class="lg:col-start-8 lg:col-span-5">
                                                <h6
                                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-heading-color mb-15px leading-1.3"
                                                >
                                                    <span class="leading-1.3"> Second Floor </span>
                                                </h6>
                                                <p class="text-sm lg:text-base">
                            <span class="leading-1.8"
                            >Enimad minim veniam quis nostrud exercitation
                              ullamco laboris. Lorem ipsum dolor sit amet cons
                              aetetur adipisicing elit sedo eiusmod
                              tempor.Incididunt labore et dolore magna aliqua.
                              sed ayd minim veniam.</span
                            >
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-10 py-5 bg-section-bg-1 grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-10px mt-50px"
                                        >
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Total Area
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                2800 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Bedroom
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                150 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Belcony/Pets
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                Allowed
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Lounge
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                650 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content 3 -->
                                    <div class="hidden opacity-0">
                                        <div
                                            class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-50px"
                                        >
                                            <div class="lg:col-start-1 lg:col-span-7">
                                                <img
                                                    src="{{ asset('assets/img/others/10.png') }}"
                                                    class="w-full"
                                                    alt="#"
                                                >
                                            </div>
                                            <div class="lg:col-start-8 lg:col-span-5">
                                                <h6
                                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-heading-color mb-15px leading-1.3"
                                                >
                                                    <span class="leading-1.3"> Thired Floor </span>
                                                </h6>
                                                <p class="text-sm lg:text-base">
                            <span class="leading-1.8"
                            >Enimad minim veniam quis nostrud exercitation
                              ullamco laboris. Lorem ipsum dolor sit amet cons
                              aetetur adipisicing elit sedo eiusmod
                              tempor.Incididunt labore et dolore magna aliqua.
                              sed ayd minim veniam.</span
                            >
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-10 py-5 bg-section-bg-1 grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-10px mt-50px"
                                        >
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Total Area
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                2800 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Bedroom
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                150 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Belcony/Pets
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                Allowed
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Lounge
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                650 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content 4 -->
                                    <div class="hidden opacity-0">
                                        <div
                                            class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-50px"
                                        >
                                            <div class="lg:col-start-1 lg:col-span-7">
                                                <img
                                                    src="{{ asset('assets/img/others/10.png') }}"
                                                    class="w-full"
                                                    alt="#"
                                                >
                                            </div>
                                            <div class="lg:col-start-8 lg:col-span-5">
                                                <h6
                                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-heading-color mb-15px leading-1.3"
                                                >
                                                    <span class="leading-1.3"> Top Garden </span>
                                                </h6>
                                                <p class="text-sm lg:text-base">
                            <span class="leading-1.8"
                            >Enimad minim veniam quis nostrud exercitation
                              ullamco laboris. Lorem ipsum dolor sit amet cons
                              aetetur adipisicing elit sedo eiusmod
                              tempor.Incididunt labore et dolore magna aliqua.
                              sed ayd minim veniam.</span
                            >
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="px-10 py-5 bg-section-bg-1 grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-10px mt-50px"
                                        >
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Total Area
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                2800 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Bedroom
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                150 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <ul class="flex flex-col gap-y-10px items-stretch">
                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Belcony/Pets
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                Allowed
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li
                                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                                    >
                                                        <ul class="flex justify-between items-center">
                                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                                Lounge
                                                            </li>

                                                            <li
                                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                                            >
                                                                650 Sq. Ft
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Property Video -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Property Video
                            </h4>
                            <div class="mb-60px">
                                <div
                                    class="relative z-0 after:w-full after:h-full after:absolute after:left-0 after:top-0 after:bg-primary-color after:opacity-40 after:z-1 w-full h-auto lg:h-[450px] xl:h-[500px] min-h-80 md:min-h-[350px] bg-[url('../img/others/5.html')] bg-center bg-no-repeat bg-cover"
                                >
                                    <div
                                        class="absolute left-0 top-0 flex justify-center items-center h-full w-full z-10"
                                    >
                                        <a
                                            class="glightbox3 w-50px h-50px lg:w-20 lg:h-20 text-center text-sm lg:text-base text-secondary-color shadow-box-shadow-2 rounded-100% bg-white flex items-center justify-center"
                                            href="https://www.youtube.com/embed/eWUxqVFBq74?autoplay=1&amp;showinfo=0"
                                            data-glightbox="type: video;"
                                        >
                                            <i class="icon-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Customer Reviews -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Customer Reviews
                            </h4>
                            <div>
                                <ul class="text-xs text-ratings flex items-center">
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="far fa-star"></i></a>
                                    </li>
                                    <li class="pt-2"><a href="#"> ( 95 Reviews )</a></li>
                                </ul>
                            </div>
                            <hr
                                class="my-50px border-t border-border-color-11 opacity-40"
                            >
                            <!-- reviews -->
                            <ul class="mb-20px">
                                <li
                                    class="flex flex-col md:flex-row gap-x-30px gap-y-5 pb-30px"
                                >
                                    <div class="flex-shrink-0">
                                        <img
                                            src="{{ asset('assets/img/testimonial/1.jpg') }}"
                                            alt=""
                                            class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                                        >
                                    </div>
                                    <div class="relative">
                                        <h4
                                            class="text-lg text-heading-color font-semibold mb-5px"
                                        >
                                            <a href="#" class="leading-1.3">Adam Smit</a>
                                        </h4>
                                        <div>
                                            <ul
                                                class="text-xs text-ratings flex items-center pt-22px md:pt-0 mb-10px"
                                            >
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="far fa-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="text-sm mb-5 md:mb-0">
                        <span class="leading-1.8"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit. Doloribus, omnis fugit corporis iste magnam
                          ratione.</span
                        >
                                        </p>
                                        <p
                                            class="text-xs md:text-sm mb-5 md:mb-0 font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block"
                                        >
                        <span class="leading-9 md:leading-9"
                        >September 3, 2024</span
                        >
                                        </p>
                                    </div>
                                </li>
                                <li
                                    class="flex flex-col md:flex-row gap-x-30px gap-y-5 py-30px border-t border-border-color-12"
                                >
                                    <div class="flex-shrink-0">
                                        <img
                                            src="{{ asset('assets/img/testimonial/3.jpg') }}"
                                            alt=""
                                            class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                                        >
                                    </div>
                                    <div class="relative">
                                        <h4
                                            class="text-lg text-heading-color font-semibold mb-5px"
                                        >
                                            <a href="#" class="leading-1.3">Jhone Doe</a>
                                        </h4>
                                        <div>
                                            <ul
                                                class="text-xs text-ratings flex items-center pt-22px md:pt-0 mb-10px"
                                            >
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="far fa-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="text-sm mb-5 md:mb-0">
                        <span class="leading-1.8"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit. Doloribus, omnis fugit corporis iste magnam
                          ratione.</span
                        >
                                        </p>
                                        <p
                                            class="text-xs md:text-sm mb-5 md:mb-0 font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block"
                                        >
                        <span class="leading-9 md:leading-9"
                        >September 3, 2024</span
                        >
                                        </p>
                                    </div>
                                </li>
                                <li
                                    class="flex flex-col md:flex-row gap-x-30px gap-y-5 py-30px border-t border-border-color-12"
                                >
                                    <div class="flex-shrink-0">
                                        <img
                                            src="{{ asset('assets/img/testimonial/2.jpg') }}"
                                            alt=""
                                            class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                                        >
                                    </div>
                                    <div class="relative">
                                        <h4
                                            class="text-lg text-heading-color font-semibold mb-5px"
                                        >
                                            <a href="#" class="leading-1.3">Arnold Jack</a>
                                        </h4>
                                        <div>
                                            <ul
                                                class="text-xs text-ratings flex items-center pt-22px md:pt-0 mb-10px"
                                            >
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                </li>
                                                <li class="pt-2">
                                                    <a href="#"><i class="far fa-star"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="text-sm mb-5 md:mb-0">
                        <span class="leading-1.8"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit. Doloribus, omnis fugit corporis iste magnam
                          ratione.</span
                        >
                                        </p>
                                        <p
                                            class="text-xs md:text-sm mb-5 md:mb-0 font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block"
                                        >
                        <span class="leading-9 md:leading-9"
                        >September 3, 2024</span
                        >
                                        </p>
                                    </div>
                                </li>
                            </ul>

                            <!-- add reviews -->
                            <form
                                class="form-primary bg-white-5 shadow-box-shadow-2 px-25px pt-10 pb-50px md:p-50px md:pt-10 mt-5 mb-60px"
                            >
                                <h4
                                    class="text-17px md:text-lg lg:text-xl font-bold text-heading-color mb-5"
                                >
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3">
                      Add a Review</span
                    >
                                </h4>
                                <div class="flex gap-15px items-center mb-30px">
                                    <h5
                                        class="text-sm md:text-15px lg:text-base font-bold text-heading-color mb-0"
                                    >
                      <span class="leading-1.3 md:leading-1.3 lg:leading-1.3">
                        Your Ratings:</span
                      >
                                    </h5>
                                    <ul class="text-xs text-ratings flex items-center">
                                        <li>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="grid gap-30px mb-35px">
                                    <!-- message -->
                                    <div class="relative mb-2">
                      <textarea


                          placeholder="Enter message"
                          class="min-h-[150px] text-paragraph-color bg-white pl-5 pr-50px py-15px outline-none border-2 focus:border-0 border-white-5 h-65px block w-full rounded-none transition-none"
                      ></textarea>
                                        <span
                                            class="absolute top-[30px] -translate-y-1/2 right-4"
                                        >
                        <i
                            class="fas fa-pencil text-sm lg:text-base text-secondary-color font-bold"
                        ></i>
                      </span>
                                    </div>
                                    <!-- name -->
                                    <div class="relative">
                                        <input
                                            type="text"
                                            placeholder="Type your name...."
                                            class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none"
                                        >
                                        <span class="absolute top-1/2 -translate-y-1/2 right-4">
                        <i
                            class="fas fa-user text-sm lg:text-base text-secondary-color font-bold"
                        ></i>
                      </span>
                                    </div>
                                    <!-- email -->
                                    <div class="relative">
                                        <input
                                            type="text"
                                            placeholder="Type your email...."
                                            class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none"
                                        >
                                        <span class="absolute top-1/2 -translate-y-1/2 right-4">
                        <i
                            class="fas fa-envelope text-sm lg:text-base text-secondary-color font-bold"
                        ></i>
                      </span>
                                    </div>

                                    <!-- website -->
                                    <div class="relative">
                                        <input
                                            type="text"
                                            placeholder="Type your website...."
                                            class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none"
                                        >
                                        <span class="absolute top-1/2 -translate-y-1/2 right-4">
                        <i
                            class="fas fa-globe text-sm lg:text-base text-secondary-color font-bold"
                        ></i>
                      </span>
                                    </div>
                                </div>
                                <!-- agree -->
                                <div class="text-sm flex items-center mb-35px">
                                    <input type="checkbox" id="agree" >
                                    <label for="agree" class="text-sm ml-1">
                                        Save my name, email, and website in this browser for the
                                        next time I comment.
                                    </label>
                                </div>

                                <!-- submit button -->

                                <div>
                                    <h5
                                        class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0"
                                    >
                      <span
                          class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black -z-1 group-hover:w-0 transition-all duration-300"
                      ></span>
                                        <button
                                            type="submit"
                                            class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-heading-color leading-23px uppercase"
                                        >
                                            Submit
                                        </button>
                                    </h5>
                                </div>
                            </form>

                            <!-- Related Properties -->
                            <h4
                                class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
                            >
                                Related Properties
                            </h4>
                            <div class="-mx-15px modal-container">
                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <!-- card 1 -->
                                    <div class="apart-card mb-50px px-15px">
                                        <div
                                            class="group border border-border-color-13 shadow-box-shadow-4"
                                        >
                                            <!-- card thumbs -->
                                            <div class="relative leading-1">
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/1.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>

                                                <div class="absolute top-10 lg:top-5 right-[30px]">
                                                    <a href="team-details.html" class="w-50px h-50px"
                                                    ><img
                                                            src="{{ asset('assets/img/blog/author.jpg') }}"
                                                            alt=""
                                                            class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                        ></a>
                                                </div>
                                            </div>
                                            <!-- card body -->
                                            <div class="px-5 pt-30px lg:px-30px">
                                                <p
                                                    class="text-secondary-color font-semibold mb-15px uppercase"
                                                >
                                                    <span class="leading-25px">For Rent</span>
                                                </p>
                                                <h4
                                                    class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px"
                                                >
                                                    <a
                                                        href="product-details.html"
                                                        class="hover:text-secondary-color leading-1.3"
                                                    >New Apartment Nice View</a
                                                    >
                                                </h4>

                                                <div class="text-sm">
                                                    <a
                                                        href="locations.html"
                                                        class="hover:text-secondary-color"
                                                    ><i
                                                            class="flaticon-pin text-secondary-color mr-0.5"
                                                        ></i>
                                                        Belmont Gardens, Chicago</a
                                                    >
                                                </div>

                                                <ul class="flex flex-wrap gap-15px pt-4 pb-5">
                                                    <li>
                                                        <p class="leading-1.8 font-bold text-sm">
                                                            3 <span class="font-normal">Bed</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p class="leading-1.8 font-bold text-sm">
                                                            2 <span class="font-normal">Bath</span>
                                                        </p>
                                                    </li>

                                                    <li>
                                                        <p class="leading-1.8 font-bold text-sm">
                                                            3450 <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>
                                                <div
                                                    class="card-quick-area flex gap-x-2 pb-30px leading-1 transition-all duration-300"
                                                >
                                                    <ul class="flex gap-x-2">
                                                        <li>
                                                            <button
                                                                data-modal-index="1"
                                                                class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                            >
                                                                <i class="flaticon-expand leading-1"></i>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button
                                                                data-modal-index="2"
                                                                class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                            >
                                                                <i class="flaticon-heart-1 leading-1"></i>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="product-details.html"
                                                                class="w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                            ><i class="flaticon-add leading-1"></i
                                                                ></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- cart footer -->
                                            <div
                                                class="p-5 lg:px-30px border-t border-border-color-1"
                                            >
                                                <h5
                                                    class="text-lg text-secondary-color font-semibold mb-5px"
                                                >
                                                    <span class="leading-1.8">$34,900</span>
                                                    <label class="text-sm font-normal">/Month</label>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card 2 -->
                                    <div class="apart-card mb-50px px-15px">
                                        <div
                                            class="group border border-border-color-13 shadow-box-shadow-4"
                                        >
                                            <!-- card thumbs -->
                                            <div class="relative leading-1">
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/2.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>

                                                <div class="absolute top-10 lg:top-5 right-[30px]">
                                                    <a href="team-details.html" class="w-50px h-50px"
                                                    ><img
                                                            src="{{ asset('assets/img/blog/author.jpg') }}"
                                                            alt=""
                                                            class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                        ></a>
                                                </div>
                                            </div>
                                            <!-- card body -->
                                            <div class="px-5 pt-30px lg:px-30px">
                                                <p
                                                    class="text-secondary-color font-semibold mb-15px uppercase"
                                                >
                                                    <span class="leading-25px">For Sale</span>
                                                </p>
                                                <h4
                                                    class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px"
                                                >
                                                    <a
                                                        href="product-details.html"
                                                        class="hover:text-secondary-color leading-1.3"
                                                    >New Apartment Nice View</a
                                                    >
                                                </h4>

                                                <div class="text-sm">
                                                    <a
                                                        href="locations.html"
                                                        class="hover:text-secondary-color"
                                                    ><i
                                                            class="flaticon-pin text-secondary-color mr-0.5"
                                                        ></i>
                                                        Belmont Gardens, Chicago</a
                                                    >
                                                </div>

                                                <ul class="flex flex-wrap gap-15px pt-4 pb-5">
                                                    <li>
                                                        <p class="leading-1.8 font-bold text-sm">
                                                            3 <span class="font-normal">Bed</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p class="leading-1.8 font-bold text-sm">
                                                            2 <span class="font-normal">Bath</span>
                                                        </p>
                                                    </li>

                                                    <li>
                                                        <p class="leading-1.8 font-bold text-sm">
                                                            3450 <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>
                                                <div
                                                    class="card-quick-area flex gap-x-2 pb-30px leading-1 transition-all duration-300"
                                                >
                                                    <ul class="flex gap-x-2">
                                                        <li>
                                                            <button
                                                                data-modal-index="1"
                                                                class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                            >
                                                                <i class="flaticon-expand leading-1"></i>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button
                                                                data-modal-index="2"
                                                                class="modal-open w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                            >
                                                                <i class="flaticon-heart-1 leading-1"></i>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="product-details.html"
                                                                class="w-9 h-9 flex items-center justify-center bg-section-bg-1 text-center hover:bg-secondary-color hover:text-white font-bold"
                                                            ><i class="flaticon-add leading-1"></i
                                                                ></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- cart footer -->
                                            <div
                                                class="p-5 lg:px-30px border-t border-border-color-1"
                                            >
                                                <h5
                                                    class="text-lg text-secondary-color font-semibold mb-5px"
                                                >
                                                    <span class="leading-1.8">$34,900</span>
                                                    <label class="text-sm font-normal">/Month</label>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modals -->
                                    <!-- modal apartment details-->
                                    <div
                                        class="modal hidden fixed top-0 left-0 w-full h-full z-xxl transition-all duration-500 bg-lightBlack opacity-0 overflow-y-auto"
                                    >
                                        <div
                                            class="modal-close fixed md:absolute top-0 left-0 w-full h-full z-xsmall cursor-zoom-out"
                                        ></div>
                                        <div
                                            class="modal-content transition-all duration-500 -translate-y-20 sm:max-w-500px lg:max-w-980px m-2 mt-150px sm:mx-auto relative z-small rounded-lg"
                                        >
                                            <div
                                                class="grid grid-cols-1 lg:grid-cols-2 gap-x-30px p-30px bg-white relative"
                                            >
                                                <div>
                                                    <img
                                                        src="{{ asset('assets/img/product/4.png') }}"
                                                        class="w-full"
                                                        alt=""
                                                    >
                                                </div>

                                                <!-- card body -->
                                                <div class="pl-25px">
                                                    <div class="absolute right-4 top-4">
                                                        <button
                                                            class="modal-close w-10 h-10 leading-10 text-center bg-section-bg-1 text-black text-25px inline-block"
                                                        >
                                                            <span>×</span>
                                                        </button>
                                                    </div>
                                                    <ul class="flex items-center mb-5px">
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="text-xs text-ratings hover:text-secondary-color"
                                                            ><i class="fas fa-star leading-1.8"></i
                                                                ></a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="text-xs text-ratings hover:text-secondary-color"
                                                            ><i class="fas fa-star leading-1.8"></i
                                                                ></a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="text-xs text-ratings hover:text-secondary-color"
                                                            ><i class="fas fa-star leading-1.8"></i
                                                                ></a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="text-xs text-ratings hover:text-secondary-color"
                                                            ><i
                                                                    class="fas fa-star-half-alt leading-1.8"
                                                                ></i
                                                                ></a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="text-xs text-ratings hover:text-secondary-color"
                                                            ><i class="far fa-star leading-1.8"></i
                                                                ></a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="text-xs text-ratings hover:text-secondary-color"
                                                            >
                                                                ( 95 Reviews )</a
                                                            >
                                                        </li>
                                                    </ul>

                                                    <h4
                                                        class="text-22px md:text-2xl font-bold text-heading-color mb-0"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="leading-1.3 hover:text-secondary-color"
                                                        >3 Rooms Manhattan</a
                                                        >
                                                    </h4>
                                                    <p
                                                        class="text-34px md:text-50px text-secondary-color font-semibold mb-5 pb-0 border-b border-border-color-12 border-opacity-25 leading-1.2"
                                                    >
                                                        <span>$34,900</span>
                                                        <del
                                                            class="text-26px md:text-40px leading-1.2 opacity-60 pl-1"
                                                        >$36,500</del
                                                        >
                                                    </p>
                                                    <p class="text-sm lg:text-base mb-9 md:mb-10">
                              <span class="leading-1.8"
                              >Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Dignissimos repellendus
                                repudiandae incidunt quidem pariatur expedita,
                                quo quis modi tempore non.</span
                              >
                                                    </p>

                                                    <ul
                                                        class="flex flex-wrap gap-5 pb-5 mb-5 border-b border-border-color-12 border-opacity-25"
                                                    >
                                                        <li class="text-sm">
                                                            <button
                                                                data-modal-index="3"
                                                                class="modal-open leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                                            >
                                                                <i class="far fa-heart px-0.5"></i> Add to
                                                                Wishlist
                                                            </button>
                                                        </li>

                                                        <li class="text-sm">
                                                            <button
                                                                class="leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                                            >
                                                                <i class="fas fa-exchange-alt px-0.5"></i>
                                                                Compare
                                                            </button>
                                                        </li>
                                                    </ul>
                                                    <!-- social area -->
                                                    <ul class="flex gap-x-[18px] items-center">
                                                        <li>
                                                            <p class="text-sm lg:text-base">
                                                                <span class="leading-1.8">Share</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="https://www.facebook.com/"
                                                                class="text-sm lg:text-base hover:text-secondary-color"
                                                            >
                                                                <i class="fab fa-facebook-f leading-1.8"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="https://x.com/"
                                                                class="text-sm lg:text-base hover:text-secondary-color"
                                                            >
                                                                <i class="fab fa-twitter leading-1.8"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="https://www.linkedin.com/"
                                                                class="text-sm lg:text-base hover:text-secondary-color"
                                                            >
                                                                <i class="fab fa-linkedin leading-1.8"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="https://www.instagram.com/"
                                                                class="text-sm lg:text-base hover:text-secondary-color"
                                                            >
                                                                <i class="fab fa-instagram leading-1.8"></i>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <!-- action -->
                                                    <div class="text-end">
                                                        <a
                                                            href="product-details.html"
                                                            class="text-xs hover:text-secondary-color underline hover:underline"
                                                        >
                                                            <span class="leading-1.8">View Details</span></a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal  wishlist 1-->
                                    <div
                                        class="modal hidden fixed top-0 left-0 w-full h-full z-xxl transition-all duration-500 bg-lightBlack opacity-0 overflow-y-auto"
                                    >
                                        <div
                                            class="modal-close fixed md:absolute top-0 left-0 w-full h-full z-xsmall cursor-zoom-out"
                                        ></div>

                                        <div
                                            class="modal-content transition-all duration-500 -translate-y-20 max-w-500px m-2 mt-150px sm:mx-auto relative z-small p-30px bg-white"
                                        >
                                            <div class="flex">
                                                <div class="w-125px mr-5 flex-shrink-0">
                                                    <img src="{{ asset('assets/img/product/4.png') }}" class="w-full" alt="" >
                                                </div>

                                                <!-- card body -->
                                                <div class="pl-25px">
                                                    <div class="absolute right-4 top-4">
                                                        <button
                                                            class="modal-close w-10 h-10 leading-10 text-center bg-black bg-opacity-5 text-black text-25px inline-block"
                                                        >
                                                            <span>×</span>
                                                        </button>
                                                    </div>

                                                    <h4
                                                        class="text-base lg:text-lg font-bold text-heading-color mb-10px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="leading-1.3 hover:text-secondary-color"
                                                        >3 Rooms Manhattan</a
                                                        >
                                                    </h4>

                                                    <p
                                                        class="text-sm lg:text-base mb-5 md:mb-6  "
                                                    >
                                                        <i class="fa fa-check-circle leading-1 text-green float-left clear-both pr-1.5 mt-1.5"></i>
                                                        Successfully added to your Wishlist
                                                    </p>
                                                    <!-- action -->
                                                    <div>
                                                        <h5
                                                            class="capitalize text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block"
                                                        >
                    <span
                        class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"
                    ></span>
                                                            <a
                                                                href="wishlist.html"
                                                                class="relative z-10 px-5 py-5px group-hover:text-heading-color leading-23px"
                                                            >View Wishlist</a
                                                            >
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal  wishlist 2-->
                                    <div
                                        class="modal hidden fixed top-0 left-0 w-full h-full z-xxl transition-all duration-500 bg-lightBlack opacity-0 overflow-y-auto"
                                    >
                                        <div
                                            class="modal-close fixed md:absolute top-0 left-0 w-full h-full z-xsmall cursor-zoom-out"
                                        ></div>

                                        <div
                                            class="modal-content transition-all duration-500 -translate-y-20 max-w-500px m-2 mt-150px sm:mx-auto relative z-small p-30px bg-white"
                                        >
                                            <div class="flex">
                                                <div class="w-125px mr-5 flex-shrink-0">
                                                    <img src="{{ asset('assets/img/product/4.png') }}" class="w-full" alt="" >
                                                </div>

                                                <!-- card body -->
                                                <div class="pl-25px">
                                                    <div class="absolute right-4 top-4">
                                                        <button
                                                            class="modal-close w-10 h-10 leading-10 text-center bg-black bg-opacity-5 text-black text-25px inline-block"
                                                        >
                                                            <span>×</span>
                                                        </button>
                                                    </div>

                                                    <h4
                                                        class="text-base lg:text-lg font-bold text-heading-color mb-10px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="leading-1.3 hover:text-secondary-color"
                                                        >3 Rooms Manhattan</a
                                                        >
                                                    </h4>

                                                    <p
                                                        class="text-sm lg:text-base mb-5 md:mb-6  "
                                                    >
                                                        <i class="fa fa-check-circle leading-1 text-green float-left clear-both pr-1.5 mt-1.5"></i>
                                                        Successfully added to your Wishlist
                                                    </p>
                                                    <!-- action -->
                                                    <div>
                                                        <h5
                                                            class="capitalize text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block"
                                                        >
                              <span
                                  class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"
                              ></span>
                                                            <a
                                                                href="wishlist.html"
                                                                class="relative z-10 px-5 py-5px group-hover:text-heading-color leading-23px"
                                                            >View Wishlist</a
                                                            >
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="lg:col-start-9 lg:col-span-4 pt-60px lg:pt-0">
                        <!-- author details -->
                        <div
                            class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                        >
                            <div class="flex flex-col items-center text-center">
                                <div class="mb-25px">
                                    <img
                                        src="{{ asset('assets/img/team/4.jpg') }}"
                                        alt=""
                                        class="w-140px h-140px rounded-100%"
                                    >
                                </div>
                                <h4 class="mb-15px lg:text-lg text-heading-color font-bold">
                    <span class="leading-1.3 lg:leading-1.3"
                    >Rosalina D. Willaimson</span
                    >
                                </h4>
                                <p class="text-[12.25px] lg:text-sm">
                                    <span class="lg:leading-1 8"> Traveller/Photographer </span>
                                </p>
                                <div>
                                    <ul class="text-xs text-ratings flex items-center mb-10px">
                                        <li class="pt-2">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                        <li class="pt-2">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                        <li class="pt-2">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </li>
                                        <li class="pt-2">
                                            <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                        </li>
                                        <li class="pt-2">
                                            <a href="#"><i class="far fa-star"></i></a>
                                        </li>
                                        <li class="pt-2"><a href="#"> ( 1 Reviews )</a></li>
                                    </ul>
                                </div>
                                <p class="text-sm mb-22px hyphens-none">
                    <span class="leading-1.8"
                    >Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      Veritatis distinctio, odio, eligendi suscipit
                      reprehenderit atque.</span
                    >
                                </p>
                                <ul
                                    class="text-sm lg:text-base flex gap-18px justify-center items-center text-color-1"
                                >
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="https://www.facebook.com/"
                                        ><i class="fab fa-facebook-f"></i
                                            ></a>
                                    </li>
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="https://www.linkedin.com/"
                                        ><i class="fab fa-linkedin"></i
                                            ></a>
                                    </li>
                                    <li class="leading-1.8 lg:leading-1.8">
                                        <a href="https://www.youtube.com/"
                                        ><i class="fab fa-youtube"></i
                                            ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Search Objects -->
                        <div
                            class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                        >
                            <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Search Objects</span
                  >
                            </h4>
                            <form>
                                <div class="flex items-center">
                                    <input
                                        type="text"
                                        placeholder="Search your keyword..."
                                        class="flex-grow text-paragraph-color text-sm font-semibold bg-section-bg-1 px-5 outline-none border-2 border-r-0 border-border-color-9 focus:border focus:border-secondary-color h-60px placeholder:text-heading-color block rounded-none"
                                    >
                                    <button
                                        type="submit"
                                        class="flex-shrink-0 text-sm lg:text-base h-60px w-14 flex items-center justify-center text-white bg-secondary-color hover:bg-primary-color"
                                    >
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Drop Messege For Book -->

                        <div
                            class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                        >
                            <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Drop Messege For Book</span
                  >
                            </h4>

                            <form>
                                <div class="grid gap-30px mb-10">
                                    <!-- name -->
                                    <div class="relative">
                                        <input
                                            type="text"
                                            placeholder="Your Name*"
                                            class="text-paragraph-color px-5 py-15px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                                        >
                                    </div>
                                    <!-- email -->
                                    <div class="relative">
                                        <input
                                            type="text"
                                            placeholder="Your e-Mail*"
                                            class="text-paragraph-color px-5 py-15px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                                        >
                                    </div>
                                    <!-- message -->
                                    <div class="relative">
                      <textarea


                          placeholder="Write Message..."
                          class="min-h-[150px] text-paragraph-color px-5 py-15px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                      ></textarea>
                                    </div>
                                </div>

                                <!-- submit button -->

                                <div>
                                    <h5
                                        class="uppercase text-sm md:text-base text-white bg-secondary-color hover:bg-primary-color relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0"
                                    >
                                        <button
                                            type="submit"
                                            class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-white leading-23px uppercase"
                                        >
                                            Send Messege
                                        </button>
                                    </h5>
                                </div>
                            </form>
                        </div>
                        <!-- Top Rated Product -->
                        <div
                            class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                        >
                            <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Top Rated Product</span
                  >
                            </h4>
                            <ul>
                                <li class="pb-25px mb-25px border-b border-white-4">
                                    <div class="flex gap-x-15px xl:gap-x-5">
                                        <div class="w-70px xl:w-90px flex-shrink-0">
                                            <a href="product-details.html"
                                            ><img src="{{ asset('assets/img/product/1.png') }}" alt=""
                                                ></a>
                                        </div>

                                        <div>
                                            <ul
                                                class="text-10px text-ratings flex items-center mb-5px leading-1"
                                            >
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                            </ul>

                                            <h6 class="text-sm font-medium mb-1">
                                                <a href="product-details.html" class="leading-1.3"
                                                >Luxury House In Greenville</a
                                                >
                                            </h6>
                                            <p class="text-sm font-bold text-secondary-color">
                                                <span class="leading-1.8">$30,000.00 </span>
                                                <del class="text-11px opacity-60 ml-1"
                                                >$35,000.00</del
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="pb-25px mb-25px border-b border-white-4">
                                    <div class="flex gap-x-15px xl:gap-x-5">
                                        <div class="w-70px xl:w-90px flex-shrink-0">
                                            <a href="product-details.html"
                                            ><img src="{{ asset('assets/img/product/2.png') }}" alt=""
                                                ></a>
                                        </div>

                                        <div>
                                            <ul
                                                class="text-10px text-ratings flex items-center mb-5px leading-1"
                                            >
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                            </ul>

                                            <h6 class="text-sm font-medium mb-1">
                                                <a href="product-details.html" class="leading-1.3"
                                                >Apartment with Subunits</a
                                                >
                                            </h6>
                                            <p class="text-sm font-bold text-secondary-color">
                                                <span class="leading-1.8">$30,000.00 </span>
                                                <del class="text-11px opacity-60 ml-1"
                                                >$35,000.00</del
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex gap-x-15px xl:gap-x-5">
                                        <div class="w-70px xl:w-90px flex-shrink-0">
                                            <a href="product-details.html"
                                            ><img src="{{ asset('assets/img/product/3.png') }}" alt=""
                                                ></a>
                                        </div>

                                        <div>
                                            <ul
                                                class="text-10px text-ratings flex items-center mb-5px leading-1"
                                            >
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="far fa-star"></i></a>
                                                </li>
                                            </ul>

                                            <h6 class="text-sm font-medium mb-1">
                                                <a href="product-details.html" class="leading-1.3"
                                                >3 Rooms Manhattan</a
                                                >
                                            </h6>
                                            <p class="text-sm font-bold text-secondary-color">
                                                <span class="leading-1.8">$30,000.00 </span>
                                                <del class="text-11px opacity-60 ml-1"
                                                >$35,000.00</del
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Top Categories-->
                        <div
                            class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                        >
                            <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Top Categories</span
                  >
                            </h4>
                            <ul>
                                <li>
                                    <a
                                        href="#"
                                        class="text-sm font-bold flex justify-between items-center group mt-15px"
                                    >
                                        <span class="leading-1.8">Apartments</span>
                                        <span class="leading-1.8 group-hover:text-paragraph-color"
                                        >(26)
                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-sm font-bold flex justify-between items-center group mt-15px"
                                    >
                                        <span class="leading-1.8">Picture Stodio</span>
                                        <span class="leading-1.8 group-hover:text-paragraph-color"
                                        >(30)
                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-sm font-bold flex justify-between items-center group mt-15px"
                                    >
                                        <span class="leading-1.8">Office</span>
                                        <span class="leading-1.8 group-hover:text-paragraph-color"
                                        >(71)
                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-sm font-bold flex justify-between items-center group mt-15px"
                                    >
                                        <span class="leading-1.8">Luxary Vilas</span>
                                        <span class="leading-1.8 group-hover:text-paragraph-color"
                                        >(56)
                      </span>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="text-sm font-bold flex justify-between items-center group mt-15px"
                                    >
                                        <span class="leading-1.8">Duplex House</span>
                                        <span class="leading-1.8 group-hover:text-paragraph-color"
                                        >(60)
                      </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Popular Properties-->
                        <div
                            class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                        >
                            <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Popular Properties</span
                  >
                            </h4>

                            <div
                                class="news-slider-container swiper-container relative -mx-15px"
                            >
                                <!-- apartment cards  -->
                                <div class="swiper popular-properties-slider static">
                                    <div class="swiper-wrapper">
                                        <!-- card 1 -->
                                        <div class="swiper-slide mb-50px cursor-default">
                                            <div class="apart-card px-15px">
                                                <div
                                                    class="group border border-border-color-13 shadow-box-shadow-4"
                                                >
                                                    <!-- card thumbs -->
                                                    <div class="relative leading-1">
                                                        <a
                                                            href="product-details.html"
                                                            class="overflow-hidden"
                                                        >
                                                            <img
                                                                src="{{ asset('assets/img/product-3/6.jpg') }}"
                                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                                alt=""
                                                            >
                                                        </a>

                                                        <div
                                                            class="absolute top-10 lg:top-5 right-[30px]"
                                                        >
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <!-- card body -->
                                                    <div class="p-25px">
                                                        <h5
                                                            class="text-lg text-secondary-color font-semibold mb-5px"
                                                        >
                                                            <span class="leading-1.8">$34,900</span>
                                                            <label class="text-sm font-normal"
                                                            >/Month</label
                                                            >
                                                        </h5>
                                                        <h4
                                                            class="text-base font-semibold text-heading-color mb-15px"
                                                        >
                                                            <a
                                                                href="product-details.html"
                                                                class="hover:text-secondary-color leading-1.3"
                                                            >New Apartment Nice View</a
                                                            >
                                                        </h4>

                                                        <div class="text-xs">
                                                            <a
                                                                href="locations.html"
                                                                class="hover:text-secondary-color"
                                                            ><i
                                                                    class="flaticon-pin text-secondary-color mr-0.5"
                                                                ></i>
                                                                Belmont Gardens, Chicago</a
                                                            >
                                                        </div>

                                                        <ul class="flex flex-wrap gap-15px pt-4">
                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    3 <span class="font-normal">Bed</span>
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    2 <span class="font-normal">Bath</span>
                                                                </p>
                                                            </li>

                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    3450
                                                                    <span class="font-normal">Square Ft</span>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card 2 -->
                                        <div class="swiper-slide mb-50px cursor-default">
                                            <div class="apart-card px-15px">
                                                <div
                                                    class="group border border-border-color-13 shadow-box-shadow-4"
                                                >
                                                    <!-- card thumbs -->
                                                    <div class="relative leading-1">
                                                        <a
                                                            href="product-details.html"
                                                            class="overflow-hidden"
                                                        >
                                                            <img
                                                                src="{{ asset('assets/img/product-3/4.jpg') }}"
                                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                                alt=""
                                                            >
                                                        </a>

                                                        <div
                                                            class="absolute top-10 lg:top-5 right-[30px]"
                                                        >
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <!-- card body -->
                                                    <div class="p-25px">
                                                        <h5
                                                            class="text-lg text-secondary-color font-semibold mb-5px"
                                                        >
                                                            <span class="leading-1.8">$34,900</span>
                                                            <label class="text-sm font-normal"
                                                            >/Month</label
                                                            >
                                                        </h5>
                                                        <h4
                                                            class="text-base font-semibold text-heading-color mb-15px"
                                                        >
                                                            <a
                                                                href="product-details.html"
                                                                class="hover:text-secondary-color leading-1.3"
                                                            >New Apartment Nice View</a
                                                            >
                                                        </h4>

                                                        <div class="text-xs">
                                                            <a
                                                                href="locations.html"
                                                                class="hover:text-secondary-color"
                                                            ><i
                                                                    class="flaticon-pin text-secondary-color mr-0.5"
                                                                ></i>
                                                                Belmont Gardens, Chicago</a
                                                            >
                                                        </div>

                                                        <ul class="flex flex-wrap gap-15px pt-4">
                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    3 <span class="font-normal">Bed</span>
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    2 <span class="font-normal">Bath</span>
                                                                </p>
                                                            </li>

                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    3450
                                                                    <span class="font-normal">Square Ft</span>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card 3 -->
                                        <div class="swiper-slide mb-50px cursor-default">
                                            <div class="apart-card px-15px">
                                                <div
                                                    class="group border border-border-color-13 shadow-box-shadow-4"
                                                >
                                                    <!-- card thumbs -->
                                                    <div class="relative leading-1">
                                                        <a
                                                            href="product-details.html"
                                                            class="overflow-hidden"
                                                        >
                                                            <img
                                                                src="{{ asset('assets/img/product-3/5.jpg') }}"
                                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                                alt=""
                                                            >
                                                        </a>

                                                        <div
                                                            class="absolute top-10 lg:top-5 right-[30px]"
                                                        >
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                    </div>
                                                    <!-- card body -->
                                                    <div class="p-25px">
                                                        <h5
                                                            class="text-lg text-secondary-color font-semibold mb-5px"
                                                        >
                                                            <span class="leading-1.8">$34,900</span>
                                                            <label class="text-sm font-normal"
                                                            >/Month</label
                                                            >
                                                        </h5>
                                                        <h4
                                                            class="text-base font-semibold text-heading-color mb-15px"
                                                        >
                                                            <a
                                                                href="product-details.html"
                                                                class="hover:text-secondary-color leading-1.3"
                                                            >New Apartment Nice View</a
                                                            >
                                                        </h4>

                                                        <div class="text-xs">
                                                            <a
                                                                href="locations.html"
                                                                class="hover:text-secondary-color"
                                                            ><i
                                                                    class="flaticon-pin text-secondary-color mr-0.5"
                                                                ></i>
                                                                Belmont Gardens, Chicago</a
                                                            >
                                                        </div>

                                                        <ul class="flex flex-wrap gap-15px pt-4">
                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    3 <span class="font-normal">Bed</span>
                                                                </p>
                                                            </li>
                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    2 <span class="font-normal">Bath</span>
                                                                </p>
                                                            </li>

                                                            <li>
                                                                <p class="leading-1.8 font-bold text-xs">
                                                                    3450
                                                                    <span class="font-normal">Square Ft</span>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                        </div>

                        <!-- Leatest Blogs -->
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
                                            ><img src="{{ asset('assets/img/team/5.jpg') }}" alt=""
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
                                            ><img src="{{ asset('assets/img/team/6.jpg') }}" alt=""
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
                                            ><img src="{{ asset('assets/img/team/7.jpg') }}" alt=""
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
                                            ><img src="{{ asset('assets/img/team/8.jpg') }}" alt=""
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
</div>
