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
              >Property Left sidebar</span
              >
                </h1>
                <ul
                    class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4"
                >
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="index.html"
                        ><i class="fas fa-home text-secondary-color"></i> Home</a
                        >
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        Property Left sidebar
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- poperty section -->
    <section>
        <div class="container modal-container tab property-tab py-30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px">
                <!-- poperty body -->
                <div class="lg:col-start-5 lg:col-span-8">
                    <!-- filter top -->
                    <div
                        class="mb-50px flex flex-col md:flex-row flex-wrap items-start md:items-center gap-y-4"
                    >
                        <ul class="flex flex-wrap items-center gap-y-3 tab-links">
                            <li class="text-3xl pr-25px active">
                                <button
                                    class="text-paragraph-color hover:text-secondary-color"
                                >
                                    <i class="fas fa-th-large"></i>
                                </button>
                            </li>
                            <li class="text-3xl pr-30px">
                                <button
                                    class="text-paragraph-color hover:text-secondary-color"
                                >
                                    <i class="fas fa-list"></i>
                                </button>
                            </li>
                        </ul>
                        <ul
                            class="flex flex-col md:flex-row flex-wrap items-start md:items-center gap-y-3"
                        >
                            <li class="pr-30px">
                                <form class="form-primary property-form">
                                    <select class="selectize">
                                        <option data-display="Select" value="Default Sorting">
                                            Default Sorting
                                        </option>
                                        <option value="Sort by popularity">
                                            Sort by popularity
                                        </option>
                                        <option value="Sort by new arrivals">
                                            Sort by new arrivals
                                        </option>
                                        <option value="Sort by price: low to high">
                                            Sort by price: low to high
                                        </option>
                                        <option value="Sort by price: high to low">
                                            Sort by price: high to low
                                        </option>
                                    </select>
                                </form>
                            </li>
                            <li class="pr-30px">
                                <form class="form-primary property-form">
                                    <select class="selectize">
                                        <option data-display="Select" value="Per Page: 12">
                                            Per Page: 12
                                        </option>
                                        <option value="Per Page: 20">Per Page: 20</option>
                                        <option value="Per Page: 30">Per Page: 30</option>
                                        <option value="Per Page: 50">Per Page: 50</option>
                                        <option value="Per Page: 100">Per Page: 100</option>
                                    </select>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-contents">
                        <!-- content 1 -->
                        <div>
                            <!-- search area  -->
                            <form class="mb-30px">
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
                            <!-- property cards -->
                            <div class="-mx-15px">
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
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
                                    <!-- card 3 -->
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
                                                        src="{{ asset('assets/img/product-3/3.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>

                                                <div class="absolute top-10 lg:top-5 right-[30px]">
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
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
                                    <!-- card 4 -->
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
                                                        src="{{ asset('assets/img/product-3/4.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>

                                                <div class="absolute top-10 lg:top-5 right-[30px]">
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
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
                                    <!-- card 5 -->
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
                                                        src="{{ asset('assets/img/product-3/5.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>

                                                <div class="absolute top-10 lg:top-5 right-[30px]">
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
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
                                    <!-- card 6 -->
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
                                                        src="{{ asset('assets/img/product-3/6.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>

                                                <div class="absolute top-10 lg:top-5 right-[30px]">
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
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
                                </div>
                            </div>
                        </div>
                        <!-- content 2 -->
                        <div class="hidden">
                            <!-- search area  -->
                            <form class="mb-30px">
                                <div class="flex items-center">
                                    <input
                                        type="text"
                                        placeholder="Search your keyword..."
                                        class="flex-grow text-paragraph-color text-sm font-semibold bg-section-bg-1 px-5 outline-none border-2 border-r-0 border-border-color-9 focus:border focus:border-secondary-color h-60px block rounded-none"
                                    >
                                    <button
                                        type="submit"
                                        class="flex-shrink-0 text-sm lg:text-base h-60px w-14 flex items-center justify-center text-white bg-secondary-color hover:bg-primary-color"
                                    >
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- property cards -->
                            <div>
                                <!-- card 1 -->
                                <div class="mb-50px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4 p-30px md:pb-22px flex flex-wrap"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1 basis-full md:basis-2/5">
                                            <div>
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden leading-1"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/1.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="basis-full md:basis-3/5 pt-25px md:pt-0">
                                            <div class="pl-0 md:pl-30px">
                                                <div
                                                    class="flex justify-between items-center gap-x-15px"
                                                >
                                                    <p
                                                        class="text-secondary-color font-semibold mb-15px uppercase"
                                                    >
                                                        <span class="leading-25px">For Rent</span>
                                                    </p>

                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                </div>
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>

                                                <!-- card footer -->
                                                <div
                                                    class="flex justify-between items-center flex-wrap-reverse gap-y-15px"
                                                >
                                                    <!-- author -->
                                                    <div class="flex items-center gap-15px">
                                                        <div>
                                                            <!-- avatar -->
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-sm font-semibold mb-1">
                                                                <a
                                                                    href="team-details.html"
                                                                    class="leading-1.3"
                                                                >William Seklo</a
                                                                >
                                                            </h3>
                                                            <p class="text-[12px]">Estate Agents</p>
                                                        </div>
                                                    </div>
                                                    <!-- quick action -->
                                                    <div
                                                        class="flex gap-x-2 relative leading-1 transition-all duration-300"
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 2 -->
                                <div class="mb-50px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4 p-30px md:pb-22px flex flex-wrap"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1 basis-full md:basis-2/5">
                                            <div>
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden leading-1"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/2.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="basis-full md:basis-3/5 pt-25px md:pt-0">
                                            <div class="pl-0 md:pl-30px">
                                                <div
                                                    class="flex justify-between items-center gap-x-15px"
                                                >
                                                    <p
                                                        class="text-secondary-color font-semibold mb-15px uppercase"
                                                    >
                                                        <span class="leading-25px">For Rent</span>
                                                    </p>

                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                </div>
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>

                                                <!-- card footer -->
                                                <div
                                                    class="flex justify-between items-center flex-wrap-reverse gap-y-15px"
                                                >
                                                    <!-- author -->
                                                    <div class="flex items-center gap-15px">
                                                        <div>
                                                            <!-- avatar -->
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-sm font-semibold mb-1">
                                                                <a
                                                                    href="team-details.html"
                                                                    class="leading-1.3"
                                                                >William Seklo</a
                                                                >
                                                            </h3>
                                                            <p class="text-[12px]">Estate Agents</p>
                                                        </div>
                                                    </div>
                                                    <!-- quick action -->
                                                    <div
                                                        class="flex gap-x-2 relative leading-1 transition-all duration-300"
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 3 -->
                                <div class="mb-50px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4 p-30px md:pb-22px flex flex-wrap"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1 basis-full md:basis-2/5">
                                            <div>
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden leading-1"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/3.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="basis-full md:basis-3/5 pt-25px md:pt-0">
                                            <div class="pl-0 md:pl-30px">
                                                <div
                                                    class="flex justify-between items-center gap-x-15px"
                                                >
                                                    <p
                                                        class="text-secondary-color font-semibold mb-15px uppercase"
                                                    >
                                                        <span class="leading-25px">For Rent</span>
                                                    </p>

                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                </div>
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>

                                                <!-- card footer -->
                                                <div
                                                    class="flex justify-between items-center flex-wrap-reverse gap-y-15px"
                                                >
                                                    <!-- author -->
                                                    <div class="flex items-center gap-15px">
                                                        <div>
                                                            <!-- avatar -->
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-sm font-semibold mb-1">
                                                                <a
                                                                    href="team-details.html"
                                                                    class="leading-1.3"
                                                                >William Seklo</a
                                                                >
                                                            </h3>
                                                            <p class="text-[12px]">Estate Agents</p>
                                                        </div>
                                                    </div>
                                                    <!-- quick action -->
                                                    <div
                                                        class="flex gap-x-2 relative leading-1 transition-all duration-300"
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 4 -->
                                <div class="mb-50px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4 p-30px md:pb-22px flex flex-wrap"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1 basis-full md:basis-2/5">
                                            <div>
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden leading-1"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/4.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="basis-full md:basis-3/5 pt-25px md:pt-0">
                                            <div class="pl-0 md:pl-30px">
                                                <div
                                                    class="flex justify-between items-center gap-x-15px"
                                                >
                                                    <p
                                                        class="text-secondary-color font-semibold mb-15px uppercase"
                                                    >
                                                        <span class="leading-25px">For Rent</span>
                                                    </p>

                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                </div>
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>

                                                <!-- card footer -->
                                                <div
                                                    class="flex justify-between items-center flex-wrap-reverse gap-y-15px"
                                                >
                                                    <!-- author -->
                                                    <div class="flex items-center gap-15px">
                                                        <div>
                                                            <!-- avatar -->
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-sm font-semibold mb-1">
                                                                <a
                                                                    href="team-details.html"
                                                                    class="leading-1.3"
                                                                >William Seklo</a
                                                                >
                                                            </h3>
                                                            <p class="text-[12px]">Estate Agents</p>
                                                        </div>
                                                    </div>
                                                    <!-- quick action -->
                                                    <div
                                                        class="flex gap-x-2 relative leading-1 transition-all duration-300"
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 5 -->
                                <div class="mb-50px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4 p-30px md:pb-22px flex flex-wrap"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1 basis-full md:basis-2/5">
                                            <div>
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden leading-1"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/5.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="basis-full md:basis-3/5 pt-25px md:pt-0">
                                            <div class="pl-0 md:pl-30px">
                                                <div
                                                    class="flex justify-between items-center gap-x-15px"
                                                >
                                                    <p
                                                        class="text-secondary-color font-semibold mb-15px uppercase"
                                                    >
                                                        <span class="leading-25px">For Rent</span>
                                                    </p>

                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                </div>
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>

                                                <!-- card footer -->
                                                <div
                                                    class="flex justify-between items-center flex-wrap-reverse gap-y-15px"
                                                >
                                                    <!-- author -->
                                                    <div class="flex items-center gap-15px">
                                                        <div>
                                                            <!-- avatar -->
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-sm font-semibold mb-1">
                                                                <a
                                                                    href="team-details.html"
                                                                    class="leading-1.3"
                                                                >William Seklo</a
                                                                >
                                                            </h3>
                                                            <p class="text-[12px]">Estate Agents</p>
                                                        </div>
                                                    </div>
                                                    <!-- quick action -->
                                                    <div
                                                        class="flex gap-x-2 relative leading-1 transition-all duration-300"
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card 6 -->
                                <div class="mb-50px">
                                    <div
                                        class="group border border-border-color-13 shadow-box-shadow-4 p-30px md:pb-22px flex flex-wrap"
                                    >
                                        <!-- card thumbs -->
                                        <div class="relative leading-1 basis-full md:basis-2/5">
                                            <div>
                                                <a
                                                    href="product-details.html"
                                                    class="overflow-hidden leading-1"
                                                >
                                                    <img
                                                        src="{{ asset('assets/img/product-3/6.jpg') }}"
                                                        class="w-full group-hover:scale-110 transition-all duration-700"
                                                        alt=""
                                                    >
                                                </a>
                                            </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="basis-full md:basis-3/5 pt-25px md:pt-0">
                                            <div class="pl-0 md:pl-30px">
                                                <div
                                                    class="flex justify-between items-center gap-x-15px"
                                                >
                                                    <p
                                                        class="text-secondary-color font-semibold mb-15px uppercase"
                                                    >
                                                        <span class="leading-25px">For Rent</span>
                                                    </p>

                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                </div>
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
                                                            3450
                                                            <span class="font-normal">Square Ft</span>
                                                        </p>
                                                    </li>
                                                </ul>

                                                <!-- card footer -->
                                                <div
                                                    class="flex justify-between items-center flex-wrap-reverse gap-y-15px"
                                                >
                                                    <!-- author -->
                                                    <div class="flex items-center gap-15px">
                                                        <div>
                                                            <!-- avatar -->
                                                            <a
                                                                href="team-details.html"
                                                                class="w-50px h-50px"
                                                            ><img
                                                                    src="{{ asset('assets/img/blog/author.jpg') }}"
                                                                    alt=""
                                                                    class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                                                ></a>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-sm font-semibold mb-1">
                                                                <a
                                                                    href="team-details.html"
                                                                    class="leading-1.3"
                                                                >William Seklo</a
                                                                >
                                                            </h3>
                                                            <p class="text-[12px]">Estate Agents</p>
                                                        </div>
                                                    </div>
                                                    <!-- quick action -->
                                                    <div
                                                        class="flex gap-x-2 relative leading-1 transition-all duration-300"
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- property paginations -->

                    <div class="flex justify-center mt-4">
                        <ul
                            class="flex flex-wrap items-center gap-x-10px gap-y-4 justify-center"
                        >
                            <li>
                                <a
                                    href="#"
                                    class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold"
                                ><i class="fas fa-angle-double-left"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold"
                                >1</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-white bg-secondary-color w-10 h-10 md:w-50px md:h-50px border-2 border-secondary-color transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold"
                                >2</a
                                >
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold"
                                >3</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold"
                                >...</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold"
                                >10</a
                                >
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="flex items-center justify-center flex-shrink-0 text-sm lg:text-base text-paragraph-color bg-white w-10 h-10 md:w-50px md:h-50px border-2 border-border-color-11 transition-all duration-300 hover:bg-secondary-color hover:text-white hover:border-secondary-color rounded-100% font-bold"
                                ><i class="fas fa-angle-double-right"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- sidebar -->
                <div
                    class="lg:row-start-1 lg:col-start-1 lg:col-span-4 pt-100px lg:pt-0"
                >
                    <!-- sidebar heading -->
                    <div>
                        <h4
                            class="mb-10px text-lg md:text-xl lg:text-22px xl:text-2xl text-heading-color font-bold"
                        >
                  <span class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                  >Advance Information</span
                  >
                        </h4>
                        <p class="mb-30px text-[12.25px] lg:text-sm">
                  <span class="lg:leading-1 8">
                    About 9,620 results (0.62 seconds)
                  </span>
                        </p>
                    </div>
                    <!-- sidebar filter -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px border-2 border-border-color-11"
                    >
                        <!-- type filter -->
                        <div
                            class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25"
                        >
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Property Type</span>
                            </h5>
                            <ul class="flex flex-col gap-y-15px">
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="house-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="house-type"
                                            class="hidden"
                                            checked
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        House
                                    </label>
                                    <span class="leading-1.8">3,924 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="sigle-family-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="sigle-family-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Single Family
                                    </label>
                                    <span class="leading-1.8">3,610 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="apartment-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="apartment-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Apartment
                                    </label>
                                    <span class="leading-1.8">2,912 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="office-villa-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="office-villa-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Office Villa
                                    </label>
                                    <span class="leading-1.8">2,687 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="luxary-home-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="luxary-home-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Luxary Home
                                    </label>
                                    <span class="leading-1.8">1,853 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="studio-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="studio-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Studio
                                    </label>
                                    <span class="leading-1.8">893 </span>
                                </li>
                            </ul>
                        </div>
                        <!-- amenities filter -->
                        <div
                            class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25"
                        >
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Amenities</span>
                            </h5>
                            <ul class="flex flex-col gap-y-15px">
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
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
                                        Dishwasher
                                    </label>
                                    <span class="leading-1.8">3,924 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="floor-coverings-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="floor-coverings-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Floor Coverings
                                    </label>
                                    <span class="leading-1.8">3,610 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="internet-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="internet-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Internet
                                    </label>
                                    <span class="leading-1.8">2,912 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="build-wardrobes-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="build-wardrobes-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Build Wardrobes
                                    </label>
                                    <span class="leading-1.8">2,687 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="supermarket-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="supermarket-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Supermarket
                                    </label>
                                    <span class="leading-1.8">1,853 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="kids-zone-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="kids-zone-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Kids Zone
                                    </label>
                                    <span class="leading-1.8">893 </span>
                                </li>
                            </ul>
                        </div>
                        <!-- price Renge filter -->
                        <div
                            class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25"
                        >
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Price Renge</span>
                            </h5>
                            <ul class="flex flex-col gap-y-15px">
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="low-budget-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="low-budget-type"
                                            class="hidden"
                                            checked
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Low Budget
                                    </label>
                                    <span class="leading-1.8">$5,000 - $10,000 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="medium-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="medium-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Medium
                                    </label>
                                    <span class="leading-1.8">$10,000 - $30,000 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="high-budget-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="high-budget-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        High Budget
                                    </label>
                                    <span class="leading-1.8">$30,000 Up </span>
                                </li>
                            </ul>
                        </div>
                        <!-- price Renge filter -->
                        <div
                            class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25"
                        >
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Filter By Price</span>
                            </h5>
                            <!-- .range -->
                            <div>
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit" value="Your range:" >
                                        <input
                                            type="text"
                                            class="amount"
                                            name="price"
                                            placeholder="Add Your Price"
                                        >
                                    </div>
                                    <div class="slider-range"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Bed/bath filter -->
                        <div
                            class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25"
                        >
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Bed/bath</span>
                            </h5>
                            <ul class="flex flex-col gap-y-15px">
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="single-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="single-type"
                                            class="hidden"
                                            checked
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Single
                                    </label>
                                    <span class="leading-1.8">3,924 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="double-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="double-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Double
                                    </label>
                                    <span class="leading-1.8">3,610 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="up-to-3-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="up-to-3-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Up To 3
                                    </label>
                                    <span class="leading-1.8">2,912 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="up-to-5-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="up-to-5-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Up To 3
                                    </label>
                                    <span class="leading-1.8">2,687 </span>
                                </li>
                            </ul>
                        </div>
                        <!-- catagory filter -->
                        <div>
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Catagory</span>
                            </h5>
                            <ul class="flex flex-col gap-y-15px">
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="buying-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="buying-type"
                                            class="hidden"
                                            checked
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Buying
                                    </label>
                                    <span class="leading-1.8">3,924 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="renting-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="renting-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Renting
                                    </label>
                                    <span class="leading-1.8">3,610 </span>
                                </li>
                                <li
                                    class="text-sm font-bold flex justify-between items-center"
                                >
                                    <label
                                        for="selling-type"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    ><input
                                            type="checkbox"
                                            id="selling-type"
                                            class="hidden"
                                        >
                                        <span
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        ></span>
                                        Selling
                                    </label>
                                    <span class="leading-1.8">2,912 </span>
                                </li>
                            </ul>
                        </div>
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
                                    ><i class="fas fa-star-half-alt leading-1.8"></i
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
                                class="text-34px md:text-50px text-secondary-color font-semibold mb-0 pb-0  leading-1.2"
                            >
                                <span>$149.00</span>
                                <del
                                    class="text-26px md:text-40px leading-1.2 opacity-60 pl-1"
                                >$165.00</del
                                >
                            </p>
                            <!-- categories -->
                            <div class="py-5 border-y border-border-color-12 mb-30px">
                                <ul class="flex gap-x-10px items-center font-semibold">
                                    <li class="text-sm leading-1.8 font-normal"><span class="text-heading-color w-[95px] leading-1.8 ">
                        Categories:
                      </span></li>
                                    <li class="text-sm leading-1.8"><a href="#" class=" leading-1.8">
                                            Parts,
                                        </a></li>
                                    <li class="text-sm leading-1.8"><a href="#" class=" leading-1.8">
                                            Car,
                                        </a></li>
                                    <li class="text-sm leading-1.8"><a href="#" class=" leading-1.8">
                                            Seat,
                                        </a></li>
                                    <li class="text-sm leading-1.8"><a href="#" class=" leading-1.8">
                                            Cover
                                        </a></li>
                                </ul>
                            </div>

                            <!-- action -->
                            <div class="flex items-center gap-4 mb-4">
                                <form class="w-140px h-65px border-2 border-border-color-11 text-xl font-bold text-heading-color flex count-container">
                                    <div class="mincount basis-[42px] h-full flex items-center justify-center flex-shrink-0 border-r-2 border-border-color-11 cursor-pointer">
                                        -
                                    </div>
                                    <div class="flex-grow h-full">
                                        <input type="text" value="02" class="text-base text-paragraph-color outline-none border border-transparent focus:border focus:border-secondary-color h-full w-full rounded-none flex items-center text-center">
                                    </div>
                                    <div class="maxcount basis-[42px] h-full flex items-center justify-center flex-shrink-0 border-l-2 border-border-color-11 cursor-pointer">
                                        +
                                    </div>
                                </form>

                                <div >
                                    <h5 class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block">
                                        <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"></span>
                                        <a href="#" class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-heading-color leading-23px"><i class="fas fa-shopping-cart"></i> ADD TO CART</a>
                                    </h5>
                                </div>
                            </div>

                            <ul
                                class="flex flex-wrap gap-5 pb-5 mb-5 border-b border-border-color-12 border-opacity-25"
                            >
                                <li class="text-sm">
                                    <button
                                        class="modal-open leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                        data-modal-index="3"
                                    >
                                        <i class="far fa-heart px-0.5"></i> Add to Wishlist
                                    </button>
                                </li>

                                <li class="text-sm">
                                    <button
                                        class="leading-1.8 font-semibold hover:text-secondary-color transition-all duration-300"
                                    >
                                        <i class="fas fa-exchange-alt px-0.5"></i> Compare
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
    </section>
</main>
