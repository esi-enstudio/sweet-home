@props(['properties'])

<div>
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
        Related Properties
    </h4>
    <div class="-mx-15px modal-container">
        <div class="grid grid-cols-1 sm:grid-cols-2">
            <!-- card -->
            @foreach($properties as $property)
                <div class="apart-card mb-50px px-15px">
                    <div
                        class="group border border-border-color-13 shadow-box-shadow-4"
                    >
                        <!-- card thumbs -->
                        <div class="relative leading-1">
                            <a
                                href="{{ route('single.property', $property->slug) }}"
                                class="overflow-hidden"
                            >
                                <img
                                    src="{{ $property->thumbnail && Storage::disk('public')->exists($property->thumbnail)
                                        ? Storage::url($property->thumbnail)
                                        : asset('assets/img/default-property-img.jpg') }}"
                                    class="w-full group-hover:scale-110 transition-all duration-700"
                                    alt="{{ $property->title }}"
                                >
                            </a>

                            <div class="absolute top-10 lg:top-5 right-[30px]">
                                <a href="#" class="w-50px h-50px">
                                    <img
                                        src="{{ $property->user->avatar_url && Storage::disk('public')->exists($property->user->avatar_url)
                                             ? Storage::url($property->user->avatar_url)
                                             : asset('assets/img/default-user-avatar.png') }}"
                                        alt="{{ $property->user->name }}"
                                        class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                    >
                                </a>
                            </div>
                        </div>

                        <!-- card body -->
                        <div class="px-5 pt-30px lg:px-30px">
                            <p class="text-secondary-color font-semibold mb-15px uppercase">
                                <span class="leading-25px">{{ $property?->listing_type }}</span>
                            </p>
                            <h4 class="text-lg md:text-xl lg:text-22px font-semibold text-heading-color mb-15px">
                                <a href="{{ route('single.property', $property->slug) }}" class="hover:text-secondary-color leading-1.3">
                                    {{ \Illuminate\Support\Str::limit($property->title, 26) }}
                                </a>
                            </h4>

                            <div class="text-sm">
                                <a href="#" class="hover:text-secondary-color">
                                    <i class="flaticon-pin text-secondary-color mr-0.5"></i>
                                    {{ \Illuminate\Support\Str::limit($property->address, 36) }}
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
                                        {{ $property->total_area }} <span class="font-normal">Square Ft</span>
                                    </p>
                                </li>
                            </ul>

                            <div class="card-quick-area flex gap-x-2 pb-30px leading-1 transition-all duration-300">
                                <ul class="flex gap-x-2">
                                    <li>
                                        <livewire:extra.wishlist-button
                                            :property="$property"
                                            :wire:key="'wishlist-btn-' . $property->id"
                                        />
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- cart footer -->
                        <div class="p-5 lg:px-30px border-t border-border-color-1">
                            <h5 class="text-lg text-secondary-color font-semibold mb-5px">
                                <span class="leading-1.8">BDT {{ number_format($property->rent_amount) }}</span>
                                <label class="text-sm font-normal">/Month</label>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
