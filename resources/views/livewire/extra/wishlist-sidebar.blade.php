<div class="drawer-container cart-container">
    <div
        class="drawer-overlay fixed top-0 left-0 w-full h-full bg-black -z-1 close-drawer opacity-0 transition-all duration-300 invisible cursor-zoom-out"></div>

    <div class="drawer cart fixed top-0 -right-[300px] xs:-right-[400px] pl-30px pr-10px py-5 w-300px xs:w-100 h-full transition-all duration-500 shadow-dropdown-secodary bg-whiteColor z-high bg-white">
        <div class="h-full">
            <!-- wishlist wrapper -->
            <div class="h-full overflow-y-auto pr-5">
                <!-- wishlist top -->
                <div class="flex justify-between items-center border-b border-border-primary pt-3px pb-3 mb-25px">
                    <div>
                        <span class="text-sm md:text-base font-bold">Wishlist</span>
                    </div>
                    <div>
                        <button class="close-drawer text-black text-3xl px-15px py-2">
                            ×
                        </button>
                    </div>
                </div>

                <!-- wishlist items -->
                <div class="max-h-[calc(100%-(360px))] cart-items overflow-y-auto">
                    <ul>
                        @forelse($this->wishlist as $item)
                            <li class="accordion pl-10px pt-5 mb-5 flex gap-15px">
                                <div class="relative">
                                    <a href="{{ route('single.property', $item->property->slug) }}" >
                                        <img
                                            src="{{ $item->property->thumbnail && Storage::disk('public')->exists($item->property->thumbnail) ? Storage::url($item->property->thumbnail) : asset('assets/img/default-property-img.jpg') }}"
                                            alt="{{ $item->property->title }}"
                                            class="w-20 inline-block"
                                        >
                                    </a>

                                    <button
                                        wire:click="removeFromWishlist({{ $item->id }})"
                                        wire:loading.attr="disabled"
                                        title="Remove from wishlist"
                                        class="w-5 h-5 shadow-box-shadow-3 text-center text-10px bg-white hover:bg-secondary-color hover:text-white rounded-full absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 transition-all duration-300 cursor-pointer"
                                    >
                                        <i class="icon-cancel leading-5"></i>
                                    </button>
                                </div>

                                <div>
                                    <h6 class="text-sm md:text-15px lg:text-base mb-5px">
                                        <a
                                            href="{{ route('single.property', $item->property->slug) }}"
                                            class="leading-23px text-heading-color hover:text-secondary-color font-medium"
                                        >
                                            {{ \Illuminate\Support\Str::limit($item->property->title, 22) }}
                                        </a>
                                    </h6>
                                    <div class="text-sm lg:text-base">
                                        <span class="leading-22px">
                                            BDT {{ number_format($item->property->rent_amount) }}
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="accordion pl-10px pt-5 mb-5 flex gap-15px">
                                <div>
                                    <h6 class="text-sm md:text-15px lg:text-base mb-5px">
                                        No wishlist data found.
                                    </h6>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
