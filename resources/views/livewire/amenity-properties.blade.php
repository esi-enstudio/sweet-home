<main>
    <!-- banner section -->
    <section>
        <!-- banner section -->
        <div
            style="background-image: url('{{ asset('assets/img/bg/14.jpg') }}')"
            class="w-full bg-no-repeat bg-cover bg-center relative z-0 after:w-full after:h-full after:absolute after:top-0 after:left-0 after:bg-white after:bg-opacity-30 after:-z-1"
        >
            <div class="container py-110px">
                <h1 class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px">
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">
                        Properties with: {{ $amenity->name }}
                    </span>
                </h1>
                <ul
                    class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4"
                >
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-home text-secondary-color"></i> Home
                        </a>
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        {{ $amenity->name }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- property section -->
    <section>
        <div class="container modal-container tab property-tab py-30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px">
                <!-- property body -->
                <div class="lg:col-start-1 lg:col-span-8">
                    <!-- filter top -->
                    <div wire:ignore class="mb-50px flex flex-col md:flex-row flex-wrap items-start md:items-center gap-y-4">
                        <ul class="flex flex-col md:flex-row flex-wrap items-start md:items-center gap-y-3">
                            <li class="pr-30px">
                                <form class="form-primary property-form">
                                    <select wire:model.live="sortBy" class="selectize">
                                        <option value="newest">Sort by new arrivals</option>
                                        <option value="price_asc">Sort by price: low to high</option>
                                        <option value="price_desc">Sort by price: high to low</option>
                                        {{-- <option value="popularity">Sort by popularity</option> --}}
                                    </select>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-contents">
                        <div>
                            <!-- search area  -->
                            <form class="mb-30px" wire:submit.prevent>
                                <div class="flex items-center">
                                    <input
                                        wire:model.live.debounce.500ms="search"
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
                                <!-- card -->
                                @forelse($this->properties as $property)
                                    <div wire:key="property-{{ $property->slug }}" class="mb-50px">
                                        <div class="group border border-border-color-13 shadow-box-shadow-4 p-30px md:pb-22px flex flex-wrap">
                                            <!-- card thumbs -->
                                            <div class="relative leading-1 basis-full md:basis-2/5">
                                                <div>
                                                    <a
                                                        href="{{ route('single.property', $property->slug) }}"
                                                        class="overflow-hidden leading-1"
                                                    >
                                                        <img
                                                            src="{{ $property->thumbnail && Storage::disk('public')->exists($property->thumbnail)
                                                                ? Storage::url($property->thumbnail)
                                                                : asset('assets/img/default-property-img.jpg') }}"
                                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                                            alt="{{ $property->title }}"
                                                        >
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- card body -->
                                            <div class="basis-full md:basis-3/5 pt-25px md:pt-0">
                                                <div class="pl-0 md:pl-30px">
                                                    <div class="flex justify-between items-center gap-x-15px">
                                                        @if($property?->listing_type == 'rent')
                                                            <p class="text-secondary-color font-semibold mb-15px uppercase rounded-full">
                                                                <span class="leading-25px">{{ $property?->listing_type }}</span>
                                                            </p>
                                                        @elseif($property?->listing_type == 'buy')
                                                            <p class="text-green font-semibold mb-15px uppercase rounded-full">
                                                                <span class="leading-25px">{{ $property?->listing_type }}</span>
                                                            </p>
                                                        @elseif($property?->listing_type == 'sell')
                                                            <p class="text-secondary-color font-semibold mb-15px uppercase rounded-full">
                                                                <span class="leading-25px">{{ $property?->listing_type }}</span>
                                                            </p>
                                                        @endif

                                                        <h5 class="text-lg text-secondary-color font-semibold">
                                                            <span class="leading-1.8">BDT {{ number_format($property->rent_amount) }}</span>
                                                            <label class="text-sm font-normal">/Month</label>
                                                        </h5>
                                                    </div>

                                                    <h4 class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px">
                                                        <a
                                                            href="{{ route('single.property', $property->slug) }}"
                                                            class="hover:text-secondary-color leading-1.3">
                                                            {{ $property->title }}
                                                        </a>
                                                    </h4>

                                                    <div class="text-sm">
                                                        <a
                                                            href="locations.html"
                                                            class="hover:text-secondary-color">
                                                            <i class="flaticon-pin text-secondary-color mr-0.5"></i>
                                                            {{ $property->address }}
                                                        </a>
                                                    </div>

                                                    <ul class="flex flex-wrap gap-15px pt-4 pb-5">
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-sm">
                                                                {{ $property->bedrooms }} <span class="font-normal">Bed</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-sm">
                                                                {{ $property->bathrooms }} <span class="font-normal">Bath</span>
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <p class="leading-1.8 font-bold text-sm">
                                                                {{ $property->total_area }}
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
                                                                >
                                                                    <img
                                                                        src="{{ $property->user->avatar_url && Storage::disk('public')->exists($property->user->avatar_url)
                                                                         ? Storage::url($property->user->avatar_url)
                                                                         : asset('assets/img/default-user-avatar.png') }}"
                                                                        alt="{{ $property->title }}"
                                                                        class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                                                    >
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <h3 class="text-sm font-semibold mb-1">
                                                                    <a
                                                                        href="team-details.html"
                                                                        class="leading-1.3"
                                                                    >
                                                                        {{$property->user->name}}</a>
                                                                </h3>

                                                                @php
                                                                    $array = explode('_', $property->user->roles->first()?->name);
                                                                    $str = implode(' ', $array);
                                                                    $roleName = \Illuminate\Support\Str::title($str);
                                                                @endphp

                                                                <p class="text-[12px]">{{ $roleName }}</p>

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
                                @empty
                                    <p class="text-center">No properties match your criteria. Try adjusting your filters.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- property pagination's -->
                    <div class="flex justify-center mt-4">
                        {{ $this->properties->onEachSide(0)->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>

                <!-- sidebar -->
                <div class="lg:col-start-9 lg:col-span-4 pt-100px lg:pt-0">
                    <!-- sidebar heading -->
                    <div>
                        <h4
                            class="mb-10px text-lg md:text-xl lg:text-22px xl:text-2xl text-heading-color font-bold"
                        >
                  <span class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                  >Advance Filtering</span
                  >
                        </h4>
                        <p class="mb-30px text-[12.25px] lg:text-sm">
                  <span class="lg:leading-1 8">
                    About
                      {{ number_format($this->totalResults) }}
                      results
                      ({{ number_format($this->queryTime, 4) }} seconds)
                  </span>
                        </p>
                    </div>

                    <!-- sidebar filter -->
                    <div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px border-2 border-border-color-11">

                        <!-- property type filter -->
                        <div
                            class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25"
                        >
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Property Type</span>
                            </h5>

                            <ul class="flex flex-col gap-y-15px">
                                @forelse($this->sidebarData['propertyTypes'] as $type)
                                    <li class="text-sm font-bold flex justify-between items-center">
                                        <label
                                            for="type-{{ $type->id }}"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer">
                                            <input
                                                wire:model.live="selectedTypes"
                                                id="type-{{ $type->id }}"
                                                value="{{ $type->id }}"
                                                type="checkbox"
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            >
                                            {{ $type->name }}
                                        </label>
                                        <span class="leading-1.8">
                                            {{ $type->properties_count }}
                                        </span>
                                    </li>
                                @empty
                                    <p>No property type found.</p>
                                @endforelse
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
                                @forelse($this->sidebarData['amenities'] as $amenity)
                                    <li class="text-sm font-bold flex justify-between items-center">
                                        <label
                                            for="amenity-{{ $amenity->id }}"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer">
                                            <input
                                                wire:model.live="selectedAmenities"
                                                id="amenity-{{ $amenity->id }}"
                                                value="{{ $amenity->id }}"
                                                type="checkbox"
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            >
                                            {{ $amenity->name }}
                                        </label>
                                        <span class="leading-1.8">
                                            {{ $amenity->properties_count }}
                                        </span>
                                    </li>
                                @empty
                                    <li class="text-sm font-bold flex justify-between items-center">
                                        <label
                                            for="floor-coverings-type"
                                            class="checkbox-item leading-1.8 group flex items-center cursor-pointer">
                                            <span
                                                class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                            ></span>
                                            No amenity found.
                                        </label>
                                    </li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Bedroom/Bathroom/Balconies filter -->
                        <div wire:ignore class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25">
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Bedroom</span>
                            </h5>
                            <form class="form-primary property-form">
                                <select wire:model.live="bedrooms" class="selectize">
                                    <option value="">Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </form>
                        </div>

                        <div wire:ignore class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25">
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Bathroom</span>
                            </h5>
                            <form class="form-primary property-form">
                                <select wire:model.live="bathrooms" class="selectize">
                                    <option value="">Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </form>
                        </div>

                        <div wire:ignore class="pb-35px mb-35px border-b border-border-color-12 border-opacity-25">
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Balconies</span>
                            </h5>
                            <form class="form-primary property-form">
                                <select wire:model.live="balconies" class="selectize">
                                    <option value="">Any</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </form>
                        </div>

                        <!-- listing type -->
                        <div>
                            <h5 class="mb-25px text-lg text-heading-color font-semibold">
                                <span class="leading-1.3">Listing Type</span>
                            </h5>
                            <ul class="flex flex-col gap-y-15px">
                                <li class="text-sm font-bold flex justify-between items-center">
                                    <label
                                        for="buy"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    >
                                        <input
                                            wire:model.live="selectedListingTypes"
                                            value="buy"
                                            type="checkbox"
                                            id="buy"
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        >
                                        Buy
                                    </label>
                                    <span class="leading-1.8">N/A</span>
                                </li>
                                <li class="text-sm font-bold flex justify-between items-center">
                                    <label
                                        for="rent"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    >
                                        <input
                                            wire:model.live="selectedListingTypes"
                                            value="rent"
                                            type="checkbox"
                                            id="rent"
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        >
                                        Rent
                                    </label>
                                    <span class="leading-1.8">N/A</span>
                                </li>
                                <li class="text-sm font-bold flex justify-between items-center">
                                    <label
                                        for="sell"
                                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer"
                                    >
                                        <input
                                            wire:model.live="selectedListingTypes"
                                            value="sell"
                                            type="checkbox"
                                            id="sell"
                                            class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"
                                        >
                                        Sell
                                    </label>
                                    <span class="leading-1.8">N/A</span>
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
                                src="assets/img/product/4.png"
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

            <!-- modal wishlist 1-->
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
                            <img src="assets/img/product/4.png" class="w-full" alt="" >
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

            <!-- modal wishlist 2-->
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
                            <img src="assets/img/product/4.png" class="w-full" alt="" >
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

