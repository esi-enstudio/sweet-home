@props([
    'rating' => 0,
    'maxRating' => 5,
    'interactive' => true,
])

<div
    x-data="{
        // Livewire-এর সাথে বাইন্ড করার জন্য rating প্রোপার্টি
        // .live মডিফায়ার ব্যবহার করা হচ্ছে যাতে ফ্রন্ট-এন্ডে পরিবর্তন সাথে সাথে সার্ভারে যায়
        rating: @if($attributes->wire('model')->value()) @entangle($attributes->wire('model')).live @else {{ $rating }} @endif,

        // শুধুমাত্র হোভারের অবস্থা দেখানোর জন্য একটি আলাদা ভ্যারিয়েবল
        hoverRating: 0,

        // মাউসের অবস্থান ট্র্যাক করার জন্য (বাম না ডান অর্ধেক)
        isHalf: false,

        // প্রদর্শনের জন্য চূড়ান্ত রেটিং গণনা করার ফাংশন
        displayRating() {
            // যদি হোভার করা হয়, তাহলে হোভার রেটিং দেখাও
            if (this.hoverRating > 0) {
                return this.isHalf ? this.hoverRating - 0.5 : this.hoverRating;
            }
            // অন্যথায়, Livewire থেকে আসা আসল রেটিং দেখাও
            return this.rating;
        },

        // রেটিং সেট করার ফাংশন
        setRating() {
            if (!{{ $interactive ? 'true' : 'false' }}) return;

            let newRating = this.isHalf ? this.hoverRating - 0.5 : this.hoverRating;

            if (this.rating === newRating) {
                this.rating = 0; // একই রেটিংয়ে আবার ক্লিক করলে রিসেট
            } else {
                this.rating = newRating;
            }
        }
    }"
    class="flex items-center text-xl"
    @if($interactive) @mouseleave="hoverRating = 0; isHalf = false" @endif
    {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    @for ($i = 1; $i <= $maxRating; $i++)
        <div
            class="relative {{ $interactive ? 'cursor-pointer' : '' }}"
            @if($interactive) @mouseenter="hoverRating = {{ $i }}" @endif
        >
            {{-- ভরাট স্টার আইকন, যা আংশিকভাবে দেখানো হবে --}}
            <i
                class="fas fa-star text-yellow-400"
                {{-- ডিসপ্লে লজিক --}}
                x-show="displayRating() >= {{ $i - 0.5 }}"
                {{-- ক্লিপিং লজিক --}}
                :class="{
                    'clip-half': displayRating() < {{ $i }}
                }"
            ></i>

            {{-- খালি স্টার আইকন, যা ভরাট স্টারের নিচে বা উপরে থাকবে --}}
            <i
                class="far fa-star text-gray-400"
                x-show="displayRating() < {{ $i - 0.5 }}"
            ></i>

            {{-- ক্লিকের জন্য অদৃশ্য অংশ --}}
            @if($interactive)
                <div class="absolute top-0 left-0 w-1/2 h-full" @mouseenter="isHalf = true" @mouseleave="isHalf = false" @click="setRating()"></div>
                <div class="absolute top-0 right-0 w-1/2 h-full" @mouseenter="isHalf = false" @click="setRating()"></div>
            @endif
        </div>
    @endfor

    {{-- CSS স্টাইল যা অর্ধেক স্টার দেখানোর জন্য প্রয়োজন --}}
    @once
        <style>
            .clip-half {
                clip-path: polygon(0 0, 50% 0, 50% 100%, 0% 100%);
            }
        </style>
    @endonce
</div>
