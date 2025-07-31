@props(['comment', 'level', 'loop' => null])

@php
    // --- কন্ডিশনাল ক্লাস নির্ধারণের নতুন এবং উন্নত লজিক ---

    // বেস ক্লাস, যা সব li-এর জন্য প্রযোজ্য
    $liBaseClasses = 'flex flex-col md:flex-row gap-x-30px gap-y-5';

    // ডিফল্ট স্টাইলিং ক্লাস
    $liStylingClasses = 'pb-30px';

    // যদি এটি একটি রিপ্লাই হয়
    if ($level > 0) {
        // রিপ্লাইয়ের জন্য ক্লাসগুলো সেট করুন
        $liStylingClasses = 'py-30px border-t border-border-color-12 ml-0 md:ml-[70px]';
    }
    // যদি এটি একটি মূল কমেন্ট হয় এবং loop ভ্যারিয়েবলটি পাস করা হয়ে থাকে
    elseif ($level === 0 && isset($loop)) {
        // যদি এটি প্রথম মূল কমেন্ট না হয় (অর্থাৎ, দ্বিতীয় বা তার পরের)
        if (!$loop->first) {
            // তাহলে উপরের বর্ডারটি যোগ করুন
            $liStylingClasses = 'pt-30px border-t border-border-color-12 pb-30px';
        }
    }

    // 최종 ক্লাস স্ট্রিং
    $liClasses = $liBaseClasses . ' ' . $liStylingClasses;
@endphp



<li wire:key="comment-{{ $comment->id }}" class="{{ $liClasses }}">
    <div class="flex-shrink-0">
        <img src="{{ $comment->user->avatar_url && Storage::disk('public')->exists($comment->user->avatar_url) ? Storage::url($comment->user->avatar_url) : asset('assets/img/default-user-avatar.png') }}"
             alt="{{ $comment->user->name }}" class="w-20 h-20 md:w-100px md:h-100px rounded-100%">
    </div>

    <div class="w-full">
        <div class="flex items-center justify-between">
            <h4 class="text-lg text-heading-color font-semibold mb-5px">
                <a href="#" class="leading-1.3">{{ $comment->user->name }}</a>
            </h4>

            @auth
                <button
                    wire:click="$parent.dispatch('setReplyTo', { commentId: {{ $comment->id }}, name: '{{ $comment->user->name }}' })"
                    class="text-xs hidden md:block md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap rounded-[25px] box-border md:box-border inline-block">
                    <span class="leading-9 md:leading-9"><i class="icon-reply-1 mr-1"></i></span>
                </button>
            @endauth
        </div>

        <h6 class="text-13px text-secondary-color font-bold mb-10px">
            <span class="leading-1.3">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
        </h6>

        <p class="text-sm mb-5 md:mb-0">
            <span class="leading-1.8">{{ $comment->comment }}</span>
        </p>

        <button
            wire:click="$dispatch('reactionToggled', { commentId: {{ $comment->id }} })"
            class="block"
        >
            ❤️ {{ $comment->reactions->count() }}
        </button>

        @auth
            <button
                wire:click="$parent.dispatch('setReplyTo', { commentId: {{ $comment->id }}, name: '{{ $comment->user->name }}' })"
                class="block md:hidden text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap rounded-[25px] box-border md:box-border inline-block mt-5">
                <span class="leading-9 md:leading-9"><i class="icon-reply-1 mr-1"></i></span>
            </button>
        @endauth
    </div>
</li>

{{-- --- রিকার্শন: রিপ্লাইগুলো রেন্ডার করা --- --}}
@if($comment->replies->isNotEmpty())
    {{-- প্রতিটি রিপ্লাইয়ের জন্য এই কম্পোনেন্টটি নিজেকেই আবার কল করছে --}}
    @foreach($comment->replies as $reply)
        {{-- লেভেল ১ বাড়িয়ে দেওয়া হচ্ছে, যাতে রিপ্লাইগুলো সঠিক স্টাইল পায় --}}
        <x-news.comment-item :comment="$reply" :level="$level + 1" />
    @endforeach
@endif
