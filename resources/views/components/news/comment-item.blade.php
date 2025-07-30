@props(['comment', 'level'])

<li wire:key="{{ $comment->id }}" class="{{ $level > 0 ? 'ml-0 md:ml-[70px]' : 'flex flex-col md:flex-row gap-x-30px gap-y-5 py-30px border-t border-border-color-12' }}">

    <div class="flex-shrink-0">
        <img
            src="{{ $comment->user->avatar_url && Storage::disk('public')->exists($comment->user->avatar_url) ? Storage::url($comment->user->avatar_url) : asset('assets/img/default-user-avatar.png') }}"
            alt="{{ $comment->user->name }}"
            class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
        >
    </div>

    <div class="relative">
        <h4 class="text-lg text-heading-color font-semibold mb-5px">
            <a href="#" class="leading-1.3">{{ $comment->user->name }}</a>
        </h4>

        <h6 class="text-13px text-secondary-color font-bold mb-10px">
            <span class="leading-1.3">{{ $comment->created_at->format('F d, Y') }}</span>
        </h6>

        <p class="text-sm mb-5 md:mb-0">
            <span class="leading-1.8">{{ $comment->comment }}</span>
        </p>

        <button
            wire:click="$parent.dispatch('setReplyTo', { commentId: {{ $comment->id }}, name: '{{ $comment->user->name }}' })"
            class="text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block">
            <span class="leading-9 md:leading-9">
                <i class="icon-reply-1 mr-1"></i>
            </span>
        </button>

        <button wire:click="$parent.toggleReaction({{ $comment->id }})">
            ❤️ {{ $comment->reactions->count() }}
        </button>
    </div>

    {{-- রিপ্লাইগুলো দেখানোর জন্য নিজেকেই আবার কল করা হচ্ছে --}}
    @if($comment->replies->isNotEmpty())
        <ul>
            @foreach($comment->replies as $reply)
                <x-blog.comment-item :comment="$reply" :level="$level + 1" />
            @endforeach
        </ul>
    @endif
</li>
