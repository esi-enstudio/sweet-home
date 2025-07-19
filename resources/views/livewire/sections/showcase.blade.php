@if(isset($showcaseProperty))
    @php
        $title = \Illuminate\Support\Str::limit($showcaseProperty?->title, 40);
        $description = \Illuminate\Support\Str::limit($showcaseProperty?->description, 190);
    @endphp

    <section>
        <div class="container pt-30 pb-90px">
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-y-5 lg:gap-30px items-center"
            >
                <!-- featured showcase left -->
                <div class="mb-5">
                    <div class="mb-30px">
                        <p
                            class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-1px px-5 rounded-full inline-block font-semibold"
                        >
                            <span class="leading-1.3">{{ app(\App\Settings\HomepageSettings::class)->featured_showcase_section_title }}</span>
                        </p>
                        <h2
                            class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold mb-15px"
                        >
                            <span class="leading-1.3">{{ $title }}</span>
                        </h2>
                        <p class="text-sm lg:text-base max-w-500px">
                            {{ $description }}
                        </p>
                    </div>
                    <ul class="space-y-4 pb-4">
                        @forelse($showcaseProperty->amenities as $amenity)
                            <li class="text-sm lg:text-base flex items-center">
                                <span class="w-15px h-0.5 bg-secondary-color opacity-50 inline-block mr-15px"></span>
                                <span class="leading-1.8">{{ $amenity->name }}</span>
                            </li>
                        @empty
                            <li class="text-sm lg:text-base flex items-center">
                                <span class="w-15px h-0.5 bg-secondary-color opacity-50 inline-block mr-15px"></span>
                                <span class="leading-1.8">No data set</span>
                            </li>
                        @endforelse
                    </ul>

                    <ul class="flex gap-x-15px py-4">
                        <li class="text-sm pr-4 border-r border-primary-color border-opacity-20">
                            <p class="leading-1.8 font-bold">
                                {{ $showcaseProperty->bedrooms }}
                                <i class="flaticon-bed ml-1"></i>
                            </p>
                            <p class="leading-1.8">Bed</p>
                        </li>
                        <li class="text-sm pr-4 border-r border-primary-color border-opacity-20">
                            <p class="leading-1.8 font-bold">
                                {{ $showcaseProperty->bathrooms }}
                                <i class="flaticon-clean ml-1"></i>
                            </p>
                            <p class="leading-1.8">Bath</p>
                        </li>
                        <li class="text-sm pr-4 border-r border-primary-color border-opacity-20">
                            <p class="leading-1.8 font-bold">
                                {{ $showcaseProperty->balconies }}
                                <i class="fi fi-ts-balcony ml-1"></i>
                            </p>
                            <p class="leading-1.8">Balconies</p>
                        </li>
                        <li class="text-sm">
                            <p class="leading-1.8 font-bold">
                                {{ $showcaseProperty->total_area }}
                                <i class="flaticon-square-shape-design-interface-tool-symbol ml-1"></i>
                            </p>
                            <p class="leading-1.8">sq Ft</p>
                        </li>
                    </ul>

                    <div>
                        <ul class="flex gap-15px pt-4">
                            @foreach($showcaseProperty->media->where('type','image')->take(3) as $media)
                                <li>
                                    <a class="w-[180px] h-[128px] glightbox2" href="{{ \Illuminate\Support\Facades\Storage::url($media->path) }}" data-glightbox="type:image;">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($media->path) }}" alt="{{ $media->caption }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- featured showcase right -->
                <div class="lg:ml-30px relative mb-10 lg:mb-0">
                    @php
                        $path = $showcaseProperty->media->firstWhere('type','showcase')?->showcase_image_path;
                    @endphp

                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::url($path) }}"
                        alt="{{ $showcaseProperty->title }}"
                        class="max-w-full"
                    >

                </div>
            </div>
        </div>
    </section>
@else
    <section>
        <div class="container pt-30 pb-90px">
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-y-5 lg:gap-30px items-center"
            >
                <!-- featured showcase left -->
                <div class="mb-5">
                    <div class="mb-30px">
                        <p
                            class="text-sm md:text-15px lg:text-base text-secondary-color bg-secondary-color bg-opacity-10 capitalize mb-15px py-1px px-5 rounded-full inline-block font-semibold"
                        >
                            <span class="leading-1.3">featured showcase</span>
                        </p>
                        <h2
                            class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-44px text-heading-color font-bold mb-15px"
                        >
                            <span class="leading-1.3"> Today Sells Properties </span>
                        </h2>
                        <p class="text-sm lg:text-base max-w-500px">
                            Houzez allow you to design unlimited panels and real estate
                            custom forms to capture leads and keep record of all
                            information
                        </p>
                    </div>
                    <ul class="space-y-4 pb-4">
                        <li class="text-sm lg:text-base flex items-center">
                  <span
                      class="w-15px h-0.5 bg-secondary-color opacity-50 inline-block mr-15px"
                  ></span>
                            <span class="leading-1.8">Live Music Cocerts at Luviana</span>
                        </li>
                        <li class="text-sm lg:text-base flex items-center">
                  <span
                      class="w-15px h-0.5 bg-secondary-color opacity-50 inline-block mr-15px"
                  ></span>
                            <span class="leading-1.8"
                            >Our SecretIsland Boat Tour is Just for You</span
                            >
                        </li>
                        <li class="text-sm lg:text-base flex items-center">
                  <span
                      class="w-15px h-0.5 bg-secondary-color opacity-50 inline-block mr-15px"
                  ></span>
                            <span class="leading-1.8">Live Music Cocerts at Luviana</span>
                        </li>
                        <li class="text-sm lg:text-base flex items-center">
                  <span
                      class="w-15px h-0.5 bg-secondary-color opacity-50 inline-block mr-15px"
                  ></span>
                            <span class="leading-1.8">Live Music Cocerts at Luviana</span>
                        </li>
                    </ul>

                    <ul class="flex gap-x-15px py-4">
                        <li
                            class="text-sm pr-4 border-r border-primary-color border-opacity-20"
                        >
                            <p class="leading-1.8 font-bold">
                                3<i class="flaticon-bed ml-1"></i>
                            </p>
                            <p class="leading-1.8">Bedrooms</p>
                        </li>
                        <li
                            class="text-sm pr-4 border-r border-primary-color border-opacity-20"
                        >
                            <p class="leading-1.8 font-bold">
                                2<i class="flaticon-clean ml-1"></i>
                            </p>
                            <p class="leading-1.8">Bathrooms</p>
                        </li>
                        <li
                            class="text-sm pr-4 border-r border-primary-color border-opacity-20"
                        >
                            <p class="leading-1.8 font-bold">
                                2<i class="flaticon-car ml-1"></i>
                            </p>
                            <p class="leading-1.8">Balconies</p>
                        </li>
                        <li class="text-sm">
                            <p class="leading-1.8 font-bold">
                                3450<i
                                    class="flaticon-square-shape-design-interface-tool-symbol ml-1"
                                ></i>
                            </p>
                            <p class="leading-1.8">square Ft</p>
                        </li>
                    </ul>

                    <div>
                        <ul class="flex gap-15px pt-4">
                            <li>
                                <a class="glightbox2" href="assets/img/img-slide/11.jpg" data-glightbox="type:image;"><img src="assets/img/img-slide/11.jpg" alt=""></a>
                            </li>
                            <li>
                                <a class="glightbox2" href="assets/img/img-slide/12.jpg"><img src="assets/img/img-slide/12.jpg" alt=""></a>
                            </li>
                            <li>
                                <a class="glightbox2" href="assets/img/img-slide/13.jpg"><img src="assets/img/img-slide/13.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- featured showcase right -->
                <div class="lg:ml-30px relative mb-10 lg:mb-0">
                    <img src="{{ asset('assets/img/others/9.png') }}" alt="" class="max-w-full" >
                </div>
            </div>
        </div>
    </section>
@endif
