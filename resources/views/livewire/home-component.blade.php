<main>
    <!-- banner section -->
    <section>
        <!-- hero section -->
        @include('livewire.sections.hero', ['heroProperties' => $this->heroProperties])

        <!-- pinned select area  -->
        @livewire('property-search-form')

    </section>

    <!-- spotlight section -->
    @include('livewire.sections.spotlight', ['spotlightProperty' => $this->spotlightProperty])

    <!-- counter section -->
    @livewire('counter-widget')

    <!-- featured showcase section -->
    @include('livewire.sections.showcase', ['showcaseProperty' => $this->showcaseProperty])

    <!-- services section -->
    @include('livewire.sections.service')

    <!-- featured apartments section -->
    @include('livewire.sections.featured-listings', ['featuredListings' => $this->featuredListings])

    <!--  apartment plan section -->
{{--    <section>--}}
{{--        <div class="container pb-30">--}}
{{--            <!-- section heading -->--}}
{{--            <div class="text-center mb-50px">--}}
{{--                <p--}}
{{--                    class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-0.5 px-5 rounded-full inline-block font-semibold"--}}
{{--                >--}}
{{--                    <span class="leading-1.3">Apartment Sketch</span>--}}
{{--                </p>--}}
{{--                <h2--}}
{{--                    class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold"--}}
{{--                >--}}
{{--                    <span class="leading-1.3">Apartments Plan </span>--}}
{{--                </h2>--}}
{{--            </div>--}}
{{--            <!-- plan tab -->--}}
{{--            <div class="tab plan-tab">--}}
{{--                <div--}}
{{--                    class="tab-links flex flex-wrap items-center justify-center gap-x-5 lg:gap-x-30px xl:gap-x-50px gap-y-10px text-sm lg:text-lg xl:text-xl text-heading-color mb-50px"--}}
{{--                >--}}
{{--                    <button--}}
{{--                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"--}}
{{--                    >--}}
{{--                        The Studio--}}
{{--                    </button>--}}

{{--                    <button--}}
{{--                        class="active p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"--}}
{{--                    >--}}
{{--                        Deluxe Portion--}}
{{--                    </button>--}}

{{--                    <button--}}
{{--                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"--}}
{{--                    >--}}
{{--                        Penthouse--}}
{{--                    </button>--}}

{{--                    <button--}}
{{--                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"--}}
{{--                    >--}}
{{--                        Top Garden--}}
{{--                    </button>--}}

{{--                    <button--}}
{{--                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"--}}
{{--                    >--}}
{{--                        Double Height--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <div class="tab-contents">--}}
{{--                    <!-- content 1 -->--}}
{{--                    <div class="hidden opacity-0">--}}
{{--                        <div--}}
{{--                            class="grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-50px"--}}
{{--                        >--}}
{{--                            <div class="p-30px md:p-70px bg-secondary-color">--}}
{{--                                <h6--}}
{{--                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-white mb-15px leading-1.3"--}}
{{--                                >--}}
{{--                                    <span class="leading-1.3"> The Studio </span>--}}
{{--                                </h6>--}}
{{--                                <p class="text-sm lg:text-base text-white mb-10">--}}
{{--                      <span class="leading-1.8"--}}
{{--                      >Enimad minim veniam quis nostrud exercitation ullamco--}}
{{--                        laboris. Lorem ipsum dolor sit amet cons aetetur--}}
{{--                        adipisicing elit sedo eiusmod tempor.Incididunt labore--}}
{{--                        et dolore magna aliqua. sed ayd minim veniam.</span--}}
{{--                      >--}}
{{--                                </p>--}}
{{--                                <ul class="flex flex-col gap-y-10px items-stretch">--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Total Area--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                2800 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bedroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                150 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bathroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                45 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Belcony/Pets--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                Allowed--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Lounge--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                650 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <img--}}
{{--                                    src="{{ asset('assets/img/others/10.png') }}"--}}
{{--                                    class="w-full"--}}
{{--                                    alt="#"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- content 2 -->--}}
{{--                    <div class="opacity-100">--}}
{{--                        <div--}}
{{--                            class="grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-50px"--}}
{{--                        >--}}
{{--                            <div class="p-30px md:p-70px bg-secondary-color">--}}
{{--                                <h6--}}
{{--                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-white mb-15px leading-1.3"--}}
{{--                                >--}}
{{--                                    <span class="leading-1.3"> Deluxe Portion </span>--}}
{{--                                </h6>--}}
{{--                                <p class="text-sm lg:text-base text-white mb-10">--}}
{{--                      <span class="leading-1.8"--}}
{{--                      >Enimad minim veniam quis nostrud exercitation ullamco--}}
{{--                        laboris. Lorem ipsum dolor sit amet cons aetetur--}}
{{--                        adipisicing elit sedo eiusmod tempor.Incididunt labore--}}
{{--                        et dolore magna aliqua. sed ayd minim veniam.</span--}}
{{--                      >--}}
{{--                                </p>--}}
{{--                                <ul class="flex flex-col gap-y-10px items-stretch">--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Total Area--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                2800 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bedroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                150 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bathroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                45 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Belcony/Pets--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                Allowed--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Lounge--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                650 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <img--}}
{{--                                    src="{{ asset('assets/img/others/10.png') }}"--}}
{{--                                    class="w-full"--}}
{{--                                    alt="#"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- content 3 -->--}}
{{--                    <div class="hidden opacity-0">--}}
{{--                        <div--}}
{{--                            class="grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-50px"--}}
{{--                        >--}}
{{--                            <div class="p-30px md:p-70px bg-secondary-color">--}}
{{--                                <h6--}}
{{--                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-white mb-15px leading-1.3"--}}
{{--                                >--}}
{{--                                    <span class="leading-1.3"> Penthouse </span>--}}
{{--                                </h6>--}}
{{--                                <p class="text-sm lg:text-base text-white mb-10">--}}
{{--                      <span class="leading-1.8"--}}
{{--                      >Enimad minim veniam quis nostrud exercitation ullamco--}}
{{--                        laboris. Lorem ipsum dolor sit amet cons aetetur--}}
{{--                        adipisicing elit sedo eiusmod tempor.Incididunt labore--}}
{{--                        et dolore magna aliqua. sed ayd minim veniam.</span--}}
{{--                      >--}}
{{--                                </p>--}}
{{--                                <ul class="flex flex-col gap-y-10px items-stretch">--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Total Area--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                2800 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bedroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                150 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bathroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                45 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Belcony/Pets--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                Allowed--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Lounge--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                650 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <img--}}
{{--                                    src="{{ asset('assets/img/others/10.png') }}"--}}
{{--                                    class="w-full"--}}
{{--                                    alt="#"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- content 4 -->--}}
{{--                    <div class="hidden opacity-0">--}}
{{--                        <div--}}
{{--                            class="grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-50px"--}}
{{--                        >--}}
{{--                            <div class="p-30px md:p-70px bg-secondary-color">--}}
{{--                                <h6--}}
{{--                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-white mb-15px leading-1.3"--}}
{{--                                >--}}
{{--                                    <span class="leading-1.3"> Top Garden </span>--}}
{{--                                </h6>--}}
{{--                                <p class="text-sm lg:text-base text-white mb-10">--}}
{{--                      <span class="leading-1.8"--}}
{{--                      >Enimad minim veniam quis nostrud exercitation ullamco--}}
{{--                        laboris. Lorem ipsum dolor sit amet cons aetetur--}}
{{--                        adipisicing elit sedo eiusmod tempor.Incididunt labore--}}
{{--                        et dolore magna aliqua. sed ayd minim veniam.</span--}}
{{--                      >--}}
{{--                                </p>--}}
{{--                                <ul class="flex flex-col gap-y-10px items-stretch">--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Total Area--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                2800 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bedroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                150 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bathroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                45 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Belcony/Pets--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                Allowed--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Lounge--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                650 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <img--}}
{{--                                    src="{{ asset('assets/img/others/10.png') }}"--}}
{{--                                    class="w-full"--}}
{{--                                    alt="#"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- content 5 -->--}}
{{--                    <div class="hidden opacity-0">--}}
{{--                        <div--}}
{{--                            class="grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-50px"--}}
{{--                        >--}}
{{--                            <div class="p-30px md:p-70px bg-secondary-color">--}}
{{--                                <h6--}}
{{--                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-white mb-15px leading-1.3"--}}
{{--                                >--}}
{{--                                    <span class="leading-1.3"> Double Height </span>--}}
{{--                                </h6>--}}
{{--                                <p class="text-sm lg:text-base text-white mb-10">--}}
{{--                      <span class="leading-1.8"--}}
{{--                      >Enimad minim veniam quis nostrud exercitation ullamco--}}
{{--                        laboris. Lorem ipsum dolor sit amet cons aetetur--}}
{{--                        adipisicing elit sedo eiusmod tempor.Incididunt labore--}}
{{--                        et dolore magna aliqua. sed ayd minim veniam.</span--}}
{{--                      >--}}
{{--                                </p>--}}
{{--                                <ul class="flex flex-col gap-y-10px items-stretch">--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Total Area--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                2800 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bedroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                150 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Bathroom--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                45 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Belcony/Pets--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                Allowed--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li--}}
{{--                                        class="text-sm md:text-base text-white font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-white before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-secondary-color">--}}
{{--                                                Lounge--}}
{{--                                            </li>--}}

{{--                                            <li class="leading-1.8 pl-10px bg-secondary-color">--}}
{{--                                                650 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <img--}}
{{--                                    src="{{ asset('assets/img/others/10.png') }}"--}}
{{--                                    class="w-full"--}}
{{--                                    alt="#"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!--  fixed popup-->
    <div
        style="background-image: url('{{ asset('assets/img/bg/19.jpg') }}')"
        class="w-full min-h-80 md:min-h-350px flex items-center justify-center bg-cover bg-center bg-no-repeat bg-fixed relative z-0"
    >
        <div
            class="w-full h-full bg-black bg-opacity-30 absolute top-0 left-0 -z-1"
        ></div>
        <a
            class="glightbox2 w-50px h-50px lg:w-20 lg:h-20 text-center lg:text-lg text-secondary-color shadow-box-shadow-2 rounded-full bg-white flex items-center justify-center animate-pulse1"
            href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&amp;showinfo=0"
            data-glightbox="type: video;"
        >
            <i class="icon-play"></i>
        </a>
    </div>

    <!-- amenities section -->
    @include('livewire.sections.amenity-card', ['buildingAmenities' => $this->buildingAmenities])

    <!-- testimonials section -->
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

                <div
                    class="testimonials-slider-container swiper-container relative -mx-15px"
                >
                    <!-- apartment cards  -->
                    <div class="swiper testimonials-slider static">
                        <div class="swiper-wrapper">
                            <!-- card 1 -->
                            <div class="swiper-slide mb-65px lg:mb-50px px-15px">
                                <div
                                    class="pt-25px pb-10 px-35px group border border-border-color-13 shadow-box-shadow-4 rounded-10px bg-white cursor-default relative"
                                >
                                    <!-- card body -->
                                    <div>
                                        <p class="text-sm md:text-base mb-5 md:mb-6 xl:mb-27px">
                          <span
                              class="text-3xl mr-0.5 translate-y-2 inline-block"
                          ><i
                                  class="flaticon-left-quote-1 group-hover:text-secondary-color transition-all duration-300"
                              ></i
                              ></span>
                                            <span class="leading-1.8">
                            Precious ipsum dolor sit amet consectetur
                            adipisicing elit, sed dos mod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips um dolor sit amet,
                            consecte</span
                                            >
                                        </p>
                                    </div>
                                    <!-- cart footer -->
                                    <div>
                                        <div>
                                            <div
                                                class="flex flex-wrap md:flex-nowrap gap-x-15px gap-y-10px items-center"
                                            >
                                                <div class="w-60px h-60px flex-shrink-0">
                                                    <img
                                                        src="{{ asset('assets/img/testimonial/1.jpg') }}"
                                                        alt=""
                                                        class="w-full h-full rounded-100%"
                                                    >
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base lg:text-lg font-semibold text-heading-color mb-0"
                                                    >
                                <span
                                    class="leading-1.3 hover:text-secondary-color"
                                >Jacob William</span
                                >
                                                    </h4>

                                                    <span class="text-sm uppercase">
                                Selling Agents
                              </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="hover-line absolute bottom-0 left-0 w-0 group-hover:w-full h-1 bg-secondary-color transition-all duration-300 block"
                                    ></span>
                                </div>
                            </div>
                            <!-- card 2 -->
                            <div class="swiper-slide mb-65px px-15px">
                                <div
                                    class="pt-25px pb-10 px-35px group border border-border-color-13 shadow-box-shadow-4 rounded-10px bg-white cursor-default relative"
                                >
                                    <!-- card body -->
                                    <div>
                                        <p class="text-sm md:text-base mb-5 md:mb-6 xl:mb-27px">
                          <span
                              class="text-3xl mr-0.5 translate-y-2 inline-block"
                          ><i
                                  class="flaticon-left-quote-1 group-hover:text-secondary-color transition-all duration-300"
                              ></i
                              ></span>
                                            <span class="leading-1.8">
                            Precious ipsum dolor sit amet consectetur
                            adipisicing elit, sed dos mod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips um dolor sit amet,
                            consecte</span
                                            >
                                        </p>
                                    </div>
                                    <!-- cart footer -->
                                    <div>
                                        <div>
                                            <div class="flex gap-x-15px gap-y-10px items-center">
                                                <div class="w-60px h-60px flex-shrink-0">
                                                    <img
                                                        src="{{ asset('assets/img/testimonial/2.jpg') }}"
                                                        alt=""
                                                        class="w-full h-full rounded-100%"
                                                    >
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base lg:text-lg font-semibold text-heading-color mb-0"
                                                    >
                                <span
                                    class="leading-1.3 hover:text-secondary-color"
                                >Kelian Anderson</span
                                >
                                                    </h4>

                                                    <span class="text-sm uppercase">
                                Selling Agents
                              </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="hover-line absolute bottom-0 left-0 w-0 group-hover:w-full h-1 bg-secondary-color transition-all duration-300 block"
                                    ></span>
                                </div>
                            </div>
                            <!-- card 3 -->
                            <div class="swiper-slide mb-65px lg:mb-50px px-15px">
                                <div
                                    class="pt-25px pb-10 px-35px group border border-border-color-13 shadow-box-shadow-4 rounded-10px bg-white cursor-default relative"
                                >
                                    <!-- card body -->
                                    <div>
                                        <p class="text-sm md:text-base mb-5 md:mb-6 xl:mb-27px">
                          <span
                              class="text-3xl mr-0.5 translate-y-2 inline-block"
                          ><i
                                  class="flaticon-left-quote-1 group-hover:text-secondary-color transition-all duration-300"
                              ></i
                              ></span>
                                            <span class="leading-1.8">
                            Precious ipsum dolor sit amet consectetur
                            adipisicing elit, sed dos mod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips um dolor sit amet,
                            consecte</span
                                            >
                                        </p>
                                    </div>
                                    <!-- cart footer -->
                                    <div>
                                        <div>
                                            <div class="flex gap-x-15px gap-y-10px items-center">
                                                <div class="w-60px h-60px flex-shrink-0">
                                                    <img
                                                        src="{{ asset('assets/img/testimonial/3.jpg') }}"
                                                        alt=""
                                                        class="w-full h-full rounded-100%"
                                                    >
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base lg:text-lg font-semibold text-heading-color mb-0"
                                                    >
                                <span
                                    class="leading-1.3 hover:text-secondary-color"
                                >Adam Joseph</span
                                >
                                                    </h4>

                                                    <span class="text-sm uppercase">
                                Selling Agents
                              </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="hover-line absolute bottom-0 left-0 w-0 group-hover:w-full h-1 bg-secondary-color transition-all duration-300 block"
                                    ></span>
                                </div>
                            </div>
                            <!-- card 4 -->
                            <div class="swiper-slide mb-65px lg:mb-50px px-15px">
                                <div
                                    class="pt-25px pb-10 px-35px group border border-border-color-13 shadow-box-shadow-4 rounded-10px bg-white cursor-default relative"
                                >
                                    <!-- card body -->
                                    <div>
                                        <p class="text-sm md:text-base mb-5 md:mb-6 xl:mb-27px">
                          <span
                              class="text-3xl mr-0.5 translate-y-2 inline-block"
                          ><i
                                  class="flaticon-left-quote-1 group-hover:text-secondary-color transition-all duration-300"
                              ></i
                              ></span>
                                            <span class="leading-1.8">
                            Precious ipsum dolor sit amet consectetur
                            adipisicing elit, sed dos mod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad min
                            veniam, quis nostrud Precious ips um dolor sit amet,
                            consecte</span
                                            >
                                        </p>
                                    </div>
                                    <!-- cart footer -->
                                    <div>
                                        <div>
                                            <div class="flex gap-x-15px gap-y-10px items-center">
                                                <div class="w-60px h-60px flex-shrink-0">
                                                    <img
                                                        src="{{ asset('assets/img/testimonial/4.jpg') }}"
                                                        alt=""
                                                        class="w-full h-full rounded-100%"
                                                    >
                                                </div>
                                                <div>
                                                    <h4
                                                        class="text-base lg:text-lg font-semibold text-heading-color mb-0"
                                                    >
                                <span
                                    class="leading-1.3 hover:text-secondary-color"
                                >James Carter</span
                                >
                                                    </h4>

                                                    <span class="text-sm uppercase">
                                Selling Agents
                              </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="hover-line absolute bottom-0 left-0 w-0 group-hover:w-full h-1 bg-secondary-color transition-all duration-300 block"
                                    ></span>
                                </div>
                            </div>
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
            </div>
        </div>
    </section>

    <!-- news section -->
    <section>
        <div>
            <div class="container pb-70px">
                <!-- section heading -->
                <div class="text-center mb-50px">
                    <p
                        class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-0.5 px-5 rounded-full inline-block font-semibold"
                    >
                        <span class="leading-1.3">News & Blogs</span>
                    </p>
                    <h2
                        class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold"
                    >
                        <span class="leading-1.3">Leatest News Feeds </span>
                    </h2>
                </div>

                <div
                    class="news-slider-container swiper-container relative -mx-15px"
                >
                    <!-- apartment cards  -->
                    <div class="swiper news-slider static">
                        <div class="swiper-wrapper">
                            <!-- card 1 -->
                            <div
                                class="swiper-slide mb-65px xl:mb-50px px-15px cursor-default"
                            >
                                <div class="group">
                                    <!-- card thumbs -->
                                    <div class="relative leading-1">
                                        <a
                                            href="blog-details.html"
                                            class="overflow-hidden"
                                        >
                                            <img
                                                src="{{ asset('assets/img/blog/1.jpg') }}"
                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                alt=""
                                            >
                                        </a>
                                    </div>
                                    <!-- card body -->
                                    <div class="p-30px shadow-box-shadow-4">
                                        <ul class="mb-15px flex gap-x-25px items-center">
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="far fa-user text-secondary-color"></i>
                                                    by: Admin</a
                                                >
                                            </li>
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="fas fa-tags text-secondary-color"></i>
                                                    Room</a
                                                >
                                            </li>
                                        </ul>
                                        <h4
                                            class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color"
                                        >
                                            <a
                                                href="blog-details.html"
                                                class="hover:text-secondary-color leading-1.3"
                                            >10 Brilliant Ways To Decorate Your Home</a
                                            >
                                        </h4>
                                        <div
                                            class="pt-5 mt-5 lg:pt-5 border-t border-border-color-1"
                                        >
                                            <ul class="flex justify-between items-center">
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <p class="leading-1.8 flex gap-5px items-center">
                                                        <i
                                                            class="far fa-calendar-alt text-secondary-color"
                                                        ></i>
                                                        June 24, 2024
                                                    </p>
                                                </li>
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <a
                                                        href="blog-details.html"
                                                        class="leading-1.8 text-secondary-color uppercase"
                                                    >
                                                        Read more</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card 2 -->
                            <div
                                class="swiper-slide mb-65px xl:mb-50px px-15px cursor-default"
                            >
                                <div class="group">
                                    <!-- card thumbs -->
                                    <div class="relative leading-1">
                                        <a
                                            href="blog-details.html"
                                            class="overflow-hidden"
                                        >
                                            <img
                                                src="{{ asset('assets/img/blog/2.jpg') }}"
                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                alt=""
                                            >
                                        </a>
                                    </div>
                                    <!-- card body -->
                                    <div class="p-30px shadow-box-shadow-4">
                                        <ul class="mb-15px flex gap-x-25px items-center">
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="far fa-user text-secondary-color"></i>
                                                    by: Admin</a
                                                >
                                            </li>
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="fas fa-tags text-secondary-color"></i>
                                                    Interior</a
                                                >
                                            </li>
                                        </ul>
                                        <h4
                                            class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color"
                                        >
                                            <a
                                                href="blog-details.html"
                                                class="hover:text-secondary-color leading-1.3"
                                            >The Most Inspiring Interior Design Of 2024</a
                                            >
                                        </h4>
                                        <div
                                            class="pt-5 mt-5 lg:pt-5 border-t border-border-color-1"
                                        >
                                            <ul class="flex justify-between items-center">
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <p class="leading-1.8 flex gap-5px items-center">
                                                        <i
                                                            class="far fa-calendar-alt text-secondary-color"
                                                        ></i>
                                                        June 21, 2024
                                                    </p>
                                                </li>
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <a
                                                        href="blog-details.html"
                                                        class="leading-1.8 text-secondary-color uppercase"
                                                    >
                                                        Read more</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card 3 -->
                            <div
                                class="swiper-slide mb-65px xl:mb-50px px-15px cursor-default"
                            >
                                <div class="group">
                                    <!-- card thumbs -->
                                    <div class="relative leading-1">
                                        <a
                                            href="blog-details.html"
                                            class="overflow-hidden"
                                        >
                                            <img
                                                src="{{ asset('assets/img/blog/3.jpg') }}"
                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                alt=""
                                            >
                                        </a>
                                    </div>
                                    <!-- card body -->
                                    <div class="p-30px shadow-box-shadow-4">
                                        <ul class="mb-15px flex gap-x-25px items-center">
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="far fa-user text-secondary-color"></i>
                                                    by: Admin</a
                                                >
                                            </li>
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="fas fa-tags text-secondary-color"></i>
                                                    Estate</a
                                                >
                                            </li>
                                        </ul>
                                        <h4
                                            class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color"
                                        >
                                            <a
                                                href="blog-details.html"
                                                class="hover:text-secondary-color leading-1.3"
                                            >Recent Commercial Real Estate Transactions</a
                                            >
                                        </h4>
                                        <div
                                            class="pt-5 mt-5 lg:pt-5 border-t border-border-color-1"
                                        >
                                            <ul class="flex justify-between items-center">
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <p class="leading-1.8 flex gap-5px items-center">
                                                        <i
                                                            class="far fa-calendar-alt text-secondary-color"
                                                        ></i>
                                                        June 22, 2024
                                                    </p>
                                                </li>
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <a
                                                        href="blog-details.html"
                                                        class="leading-1.8 text-secondary-color uppercase"
                                                    >
                                                        Read more</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card 4 -->
                            <div
                                class="swiper-slide mb-65px xl:mb-50px px-15px cursor-default"
                            >
                                <div class="group">
                                    <!-- card thumbs -->
                                    <div class="relative leading-1">
                                        <a
                                            href="blog-details.html"
                                            class="overflow-hidden"
                                        >
                                            <img
                                                src="{{ asset('assets/img/blog/4.jpg') }}"
                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                alt=""
                                            >
                                        </a>
                                    </div>
                                    <!-- card body -->
                                    <div class="p-30px shadow-box-shadow-4">
                                        <ul class="mb-15px flex gap-x-25px items-center">
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="far fa-user text-secondary-color"></i>
                                                    by: Admin</a
                                                >
                                            </li>
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="fas fa-tags text-secondary-color"></i>
                                                    Room</a
                                                >
                                            </li>
                                        </ul>
                                        <h4
                                            class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color"
                                        >
                                            <a
                                                href="blog-details.html"
                                                class="hover:text-secondary-color leading-1.3"
                                            >Renovating a Living Room? Experts Share Their
                                                Secrets</a
                                            >
                                        </h4>
                                        <div
                                            class="pt-5 mt-5 lg:pt-5 border-t border-border-color-1"
                                        >
                                            <ul class="flex justify-between items-center">
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <p class="leading-1.8 flex gap-5px items-center">
                                                        <i
                                                            class="far fa-calendar-alt text-secondary-color"
                                                        ></i>
                                                        June 24, 2024
                                                    </p>
                                                </li>
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <a
                                                        href="blog-details.html"
                                                        class="leading-1.8 text-secondary-color uppercase"
                                                    >
                                                        Read more</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card 5 -->
                            <div
                                class="swiper-slide mb-65px xl:mb-50px px-15px cursor-default"
                            >
                                <div class="group">
                                    <!-- card thumbs -->
                                    <div class="relative leading-1">
                                        <a
                                            href="blog-details.html"
                                            class="overflow-hidden"
                                        >
                                            <img
                                                src="{{ asset('assets/img/blog/5.jpg') }}"
                                                class="w-full group-hover:scale-110 transition-all duration-700"
                                                alt=""
                                            >
                                        </a>
                                    </div>
                                    <!-- card body -->
                                    <div class="p-30px shadow-box-shadow-4">
                                        <ul class="mb-15px flex gap-x-25px items-center">
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="far fa-user text-secondary-color"></i>
                                                    by: Admin</a
                                                >
                                            </li>
                                            <li class="text-xs md:text-sm font-semibold">
                                                <a
                                                    href="#"
                                                    class="leading-1.8 hover:text-secondary-color flex gap-5px items-center"
                                                ><i class="fas fa-tags text-secondary-color"></i>
                                                    Trends</a
                                                >
                                            </li>
                                        </ul>
                                        <h4
                                            class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color"
                                        >
                                            <a
                                                href="blog-details.html"
                                                class="hover:text-secondary-color leading-1.3"
                                            >7 home trends that will shape your house in 2024</a
                                            >
                                        </h4>
                                        <div
                                            class="pt-5 mt-5 lg:pt-5 border-t border-border-color-1"
                                        >
                                            <ul class="flex justify-between items-center">
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <p class="leading-1.8 flex gap-5px items-center">
                                                        <i
                                                            class="far fa-calendar-alt text-secondary-color"
                                                        ></i>
                                                        June 24, 2024
                                                    </p>
                                                </li>
                                                <li class="text-xs md:text-sm font-semibold">
                                                    <a
                                                        href="blog-details.html"
                                                        class="leading-1.8 text-secondary-color uppercase"
                                                    >
                                                        Read more</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- pagination -->
                        <div
                            class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal !-bottom-[6px] block xl:hidden"
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
                        <div class="hidden xl:block">
                            <div class="swiper-button-next bg-white z-1">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <div class="swiper-button-prev bg-white z-1">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
