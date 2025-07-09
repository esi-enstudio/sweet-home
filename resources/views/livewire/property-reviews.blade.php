<div>
    {{-- Customer Reviews হেডার এবং গড় রেটিং --}}
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
        Customer Reviews
    </h4>

    @if($this->reviewSummary['total'] > 0)
    <div class="flex items-center gap-1 font-semibold">
        <x-star-rating :rating="$this->reviewSummary['average']" />
        <p class="text-ratings">
            <a href="#"> ( {{ $this->reviewSummary['total'] }} Reviews )</a>
        </p>
    </div>
    @endif

    <hr class="my-50px border-t border-border-color-11 opacity-40">

    <!-- reviews -->
    <ul class="mb-20px">
        @forelse($this->reviews as $review)
            <li class="flex gap-x-30px gap-y-5 pb-30px @if(!$loop->iteration > 1) border-t border-border-color-12 @endif">
                {{-- বাম অংশ: প্রোফাইল ছবি --}}
                <div class="flex-shrink-0">
                    @if($review->user && $review->user->avatar_url)
                        <img src="{{ Storage::url($review->user->avatar_url) }}" alt="{{ $review->name }}" class="w-20 h-20 md:w-100px md:h-100px rounded-100%">
                    @else
                        <div class="w-16 h-16 md:w-24 md:h-24 bg-red-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl md:text-4xl font-bold text-red-500">{{ strtoupper(substr($review->name, 0, 1)) }}</span>
                        </div>
                    @endif
                </div>

                {{-- ডান অংশ: রিভিউয়ের সম্পূর্ণ কন্টেন্ট --}}
                <div class="flex-grow">
                    {{-- উপরের অংশ: নাম এবং তারিখ --}}
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 leading-tight mb-5px">{{ $review->name }}</h4>
                            <div>
                                <x-star-rating :rating="$review->rating" class="text-xs pt-22px md:pt-0 mb-10px" />
                            </div>
                        </div>
                        <p class="text-xs md:text-sm mb-5 md:mb-0 font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap rounded-[25px] box-border md:box-border inline-block">
                            <span class="leading-9 md:leading-9">{{ $review->created_at->format('F d, Y') }}</span>
                        </p>
                    </div>

                    {{-- নিচের অংশ: কমেন্ট --}}
                    <div>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ $review->comment }}
                        </p>
                    </div>
                </div>
            </li>
        @empty
            <p>No reviews yet. Be the first one to review!</p>
        @endforelse
    </ul>

    {{-- "Load More" বাটন এবং লোডিং ইন্ডিকেটর --}}
    @if ($this->reviews->hasMorePages())
        <div class="text-center mt-4">
            <button wire:click="loadMore" wire:loading.attr="disabled" class="btn btn-primary">
                <span wire:loading.remove wire:target="loadMore">
                    Load More Reviews
                </span>
                <span wire:loading wire:target="loadMore">
                    Loading...
                </span>
            </button>
        </div>
    @endif



    <!-- add reviews -->
    @auth
        @if(session('review_success'))
            <div class="text-green-sw">{{ session('review_success') }}</div>
        @elseif(session('review_error'))
            <div class="text-secondary-color">{{ session('review_error') }}</div>
        @elseif($hasAlreadyReviewed)
            <div class="text-warning-sw">You have already submitted a review for this property.</div>
        @else
        <form wire:submit.prevent="submitReview" class="form-primary bg-white-5 shadow-box-shadow-2 px-25px pt-10 pb-50px md:p-50px md:pt-10 mt-5 mb-60px">
            <h4 class="text-17px md:text-lg lg:text-xl font-bold text-heading-color mb-5">
                <span class="leading-1.3 md:leading-1.3 lg:leading-1.3">
                  Add a Review</span
                >
            </h4>

            <div class="flex gap-15px items-center mb-30px">
                <h5 class="text-sm md:text-15px lg:text-base font-bold text-heading-color mb-0">
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3">
                        Your Ratings:
                    </span>
                </h5>

                <div class="text-ratings flex items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        <button type="button" wire:click="$set('rating', {{ $i }})">
                            <i class="{{ $i <= $rating ? 'fas fa-star text-yellow-400' : 'far fa-star text-gray-400' }}"></i>
                        </button>
                    @endfor
                </div>

                {{-- নির্বাচিত রেটিং দেখানোর জন্য (ঐচ্ছিক) --}}
                <span x-data="{ rating: @entangle('rating') }" x-text="rating > 0 ? rating.toFixed(1) + ' stars' : ''" class="ml-2 text-sm text-gray-500"></span>

                @error('rating') <span class="text-secondary-color font-semibold">{{ $message }}</span> @enderror
            </div>

            <div class="grid gap-30px mb-35px">
                <!-- name -->
                <div class="relative">
                    <input
                        wire:model="name"
                        @if(Auth::check()) readonly @endif
                        type="text"
                        placeholder="Type your name...."
                        class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none">
                    @error('name') <span class="text-secondary-color font-semibold">{{ $message }}</span> @enderror

                    <span class="absolute top-1/2 -translate-y-1/2 right-4">
                        <i class="fas fa-user text-sm lg:text-base text-secondary-color font-bold"></i>
                    </span>
                </div>

                <!-- phone -->
                <div class="relative">
                    <input
                        wire:model="phone"
                        @if(Auth::check()) readonly @endif
                        type="text"
                        placeholder="Type your phone number...."
                        class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none">
                    @error('phone') <span class="text-secondary-color font-semibold">{{ $message }}</span> @enderror

                    <span class="absolute top-1/2 -translate-y-1/2 right-4">
                        <i class="fas fa-phone text-sm lg:text-base text-secondary-color font-bold"></i>
                    </span>
                </div>

                <!-- email -->
                <div class="relative">
                    <input
                        wire:model="email"
                        @if(Auth::check()) readonly @endif
                        type="email"
                        placeholder="Type your email...."
                        class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none">
                    @error('email') <span class="text-secondary-color font-semibold">{{ $message }}</span> @enderror

                    <span class="absolute top-1/2 -translate-y-1/2 right-4">
                        <i class="fas fa-envelope text-sm lg:text-base text-secondary-color font-bold"></i>
                    </span>
                </div>

                <!-- message -->
                <div class="relative mb-2">
                    <textarea
                          wire:model="comment"
                          placeholder="Enter message"
                          class="min-h-[150px] text-paragraph-color bg-white pl-5 pr-50px py-15px outline-none border-2 focus:border-0 border-white-5 h-65px block w-full rounded-none transition-none"></textarea>
                    @error('comment') <span class="text-secondary-color font-semibold">{{ $message }}</span> @enderror

                    <span class="absolute top-[30px] -translate-y-1/2 right-4">
                        <i class="fas fa-pencil text-sm lg:text-base text-secondary-color font-bold"></i>
                    </span>
                </div>
            </div>

            <!-- submit button -->
            <div>
                <h5 class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0">
                    <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black -z-1 group-hover:w-0 transition-all duration-300"></span>

                    <button
                        type="submit"
                        class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-heading-color leading-23px uppercase"
                    >
                        Submit Review
                    </button>
                </h5>
            </div>
        </form>
        @endif
    @else
        <div class="bg-indigo-600 border-l-4 border-yellow-500 text-yellow-700 pl-5 mt-5" role="alert">
            <p>You must be <a target="_blank" href="{{ route('filament.admin.auth.login') }}" class="font-bold underline">logged in</a> to submit a review.</p>
        </div>
    @endauth
</div>
