@if(isset($spotlightProperty))
    <section>
        {{ dd($spotlightProperty) }}
    <div class="container pt-30 pb-90px">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-30px">
            <!-- spotlight left -->
            <div class="lg:mr-30px relative mb-10 lg:mb-0">
                <img src="{{ asset('assets/img/others/7.png') }}" alt="" class="max-w-full" >
                <div class="absolute left-[10px] bottom-[70px] w-150px md:w-300px">
                    <div class="relative">
                        <img src="{{ asset('assets/img/others/8.png') }}" alt="" class="w-full" >
                        <div class="absolute left-0 top-0 w-full h-full flex items-center justify-center">
                            <a
                                class="glightbox2 w-50px h-50px lg:w-20 lg:h-20 text-center lg:text-lg text-secondary-color shadow-box-shadow-2 rounded-full bg-white flex items-center justify-center animate-pulse1"
                                href="https://www.youtube.com/embed/tlThdr3O5Qo"
                                data-glightbox="type: video;"
                            >
                                <i class="icon-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- spotlight right -->
            <div>
                <div class="mb-5">
                    <p class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-1px px-5 rounded-full inline-block font-semibold">
                        <span class="leading-1.3">spotlight</span>
                    </p>

                    <h2 class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold mb-15px">
                            <span class="leading-1.3">
                                The Leading Real Estate Rental Marketplace
                            </span>
                    </h2>

                    <p class="text-sm lg:text-base max-w-500px">
                            <span class="leading-1.8 lg:leading-1.8">
                                Over 39,000 people work for us in more than 70 countries all over the breadth of global coverage, combined with specialist services
                            </span>
                    </p>
                </div>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4 pt-4">
                    <li class="text-sm lg:text-base flex items-center">
                        <i class="flaticon-home-2 text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                        <span class="leading-1.8">Smart Home Design</span>
                    </li>
                    <li class="text-sm lg:text-base flex items-center">
                        <i class="flaticon-mountain text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                        <span class="leading-1.8">Beautiful Scene Around</span>
                    </li>
                    <li class="text-sm lg:text-base flex items-center">
                        <i class="flaticon-heart text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                        <span class="leading-1.8">Exceptional Lifestyle</span>
                    </li>
                    <li class="text-sm lg:text-base flex items-center">
                        <i class="flaticon-secure text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                        <span class="leading-1.8">Complete 24/7 Security</span>
                    </li>
                </ul>

                <div class="bg-secondary-color bg-opacity-5 mt-30px mb-10">
                    <p class="text-sm lg:text-base p-5 border-l-4 border-secondary-color">
                            <span class="leading-1.8">
                                "Enimad minim veniam quis nostrud exercitation <br > llamco laboris. Lorem ipsum dolor sit amet"
                            </span>
                    </p>
                </div>
                <div>
                    <h5 class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block">
                        <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"></span>
                        <a
                            href="service.html"
                            class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-heading-color leading-23px">
                            OUR SERVICES
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>
@else
    <section>
        <div class="container pt-30 pb-90px">
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-30px">
                <!-- spotlight left -->
                <div class="lg:mr-30px relative mb-10 lg:mb-0">
                    <img src="{{ asset('assets/img/others/7.png') }}" alt="" class="max-w-full" >
                    <div class="absolute left-[10px] bottom-[70px] w-150px md:w-300px">
                        <div class="relative">
                            <img src="{{ asset('assets/img/others/8.png') }}" alt="" class="w-full" >
                            <div class="absolute left-0 top-0 w-full h-full flex items-center justify-center">
                                <a
                                    class="glightbox2 w-50px h-50px lg:w-20 lg:h-20 text-center lg:text-lg text-secondary-color shadow-box-shadow-2 rounded-full bg-white flex items-center justify-center animate-pulse1"
                                    href="https://www.youtube.com/embed/tlThdr3O5Qo"
                                    data-glightbox="type: video;"
                                >
                                    <i class="icon-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- spotlight right -->
                <div>
                    <div class="mb-5">
                        <p class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-1px px-5 rounded-full inline-block font-semibold">
                            <span class="leading-1.3">spotlight</span>
                        </p>

                        <h2 class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold mb-15px">
                            <span class="leading-1.3">
                                Call For An Advertisement
                            </span>
                        </h2>

                        <p class="text-sm lg:text-base max-w-500px">
                            <span class="leading-1.8 lg:leading-1.8">
                                Over 39,000 people work for us in more than 70 countries all over the breadth of global coverage, combined with specialist services
                            </span>
                        </p>
                    </div>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-4 pt-4">
                        <li class="text-sm lg:text-base flex items-center">
                            <i class="flaticon-home-2 text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                            <span class="leading-1.8">Smart Home Design</span>
                        </li>
                        <li class="text-sm lg:text-base flex items-center">
                            <i class="flaticon-mountain text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                            <span class="leading-1.8">Beautiful Scene Around</span>
                        </li>
                        <li class="text-sm lg:text-base flex items-center">
                            <i class="flaticon-heart text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                            <span class="leading-1.8">Exceptional Lifestyle</span>
                        </li>
                        <li class="text-sm lg:text-base flex items-center">
                            <i class="flaticon-secure text-xl text-secondary-color bg-color-6 w-45px h-45px flex items-center justify-center mr-25px rounded-100%"></i>
                            <span class="leading-1.8">Complete 24/7 Security</span>
                        </li>
                    </ul>

                    <div class="bg-secondary-color bg-opacity-5 mt-30px mb-10">
                        <p class="text-sm lg:text-base p-5 border-l-4 border-secondary-color">
                            <span class="leading-1.8">
                                "Enimad minim veniam quis nostrud exercitation <br > llamco laboris. Lorem ipsum dolor sit amet"
                            </span>
                        </p>
                    </div>
                    <div>
                        <h5 class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block">
                            <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"></span>
                            <a
                                href="#"
                                class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-heading-color leading-23px">
                                Call Now
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
