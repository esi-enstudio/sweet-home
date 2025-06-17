<div class="mt-8">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customer Reviews</h2>

    {{-- রিভিউ দেওয়ার ফর্ম --}}
    @auth
        @if ($hasReviewed)
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                <p class="font-bold">Thank you!</p>
                <p>You have already submitted a review for this property.</p>
            </div>
        @else
            <div class="mt-6" x-data="{ rating: @entangle('rating'), hoverRating: 0 }">
                <h3 class="text-lg font-medium text-gray-900">Write a review</h3>

                @if (session('success'))
                    <div class="my-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="my-4 p-3 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
                @endif

                <form wire:submit.prevent="saveReview" class="mt-4 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Your Rating</label>
                        <div class="mt-1 flex items-center" @mouseleave="hoverRating = 0">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg @click="rating = {{ $i }}"
                                     @mouseenter="hoverRating = {{ $i }}"
                                     :class="{
                                         'text-yellow-400': hoverRating >= {{ $i }} || rating >= {{ $i }},
                                         'text-gray-300': hoverRating < {{ $i }} && rating < {{ $i }}
                                     }"
                                     class="h-8 w-8 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        @error('rating') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Your Comment</label>
                        <textarea wire:model="comment" id="comment" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        @error('comment') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                        Submit Review
                    </button>
                </form>
            </div>
        @endif
    @else
        <div class="mt-4">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a> to write a review.
        </div>
    @endauth

    {{-- আগের রিভিউগুলোর তালিকা --}}
    <div class="mt-10">
        <h3 class="text-lg font-medium text-gray-900">Existing Reviews ({{ $reviews->count() }})</h3>
        <div class="mt-4 space-y-6">
            @forelse ($reviews as $review)
                <div class="p-4 border rounded-md">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="h-5 w-5 {{ $review->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <p class="ml-3 text-sm font-medium text-gray-700">{{ $review->user->name }}</p>
                    </div>
                    <p class="mt-2 text-gray-600">{{ $review->comment }}</p>
                    <p class="mt-2 text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-gray-500">No reviews yet. Be the first to write one!</p>
            @endforelse
        </div>
    </div>
</div>
