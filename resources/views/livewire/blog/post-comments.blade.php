<div class="mt-50px">
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
        {{ $totalComments }} Comments
    </h4>

    <ul class="mb-20px">
        @foreach($comments as $comment)
            <li wire:key="{{ $comment->id }}" class="flex flex-col md:flex-row gap-x-30px gap-y-5 py-30px border-t border-border-color-12 ml-0 md:ml-[70px]">

                <div class="flex-shrink-0">
                    <img src="{{ $comment->user->avatar_url && Storage::disk('public')->exists($comment->user->avatar_url) ? Storage::url($comment->user->avatar_url) : asset('assets/img/default-user-avatar.png') }}" alt="" class="w-20 h-20 md:w-100px md:h-100px rounded-100%">
                </div>

                <div class="w-full">
                    <h4 class="text-lg text-heading-color font-semibold mb-5px">
                        <a href="#" class="leading-1.3">{{ $comment->user->name }}</a>
                    </h4>
                    <h6 class="text-13px text-secondary-color font-bold mb-10px">
                        <span class="leading-1.3">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </h6>

                    <p class="text-sm mb-5 md:mb-0">
                        <span class="leading-1.8">
                            @if($comment->parent)
                                <a href="#" class="font-semibold text-blue-500 mr-1">@ {{ $comment->parent->user->name }}</a>
                            @endif
                            {{ $comment->comment }}
                        </span>
                    </p>

                    <button wire:click="toggleReplyForm" class="text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap rounded-[25px] box-border md:box-border inline-block">
                        <span class="leading-9 md:leading-9">
                            <i class="icon-reply-1 mr-1"></i>
                        </span>
                    </button>

                    {{-- রিঅ্যাকশন বাটন --}}
                    <div class="flex space-x-2">
                        <button wire:click="addReaction('like')">👍 {{ $comment->reactions->where('type', 'like')->count() }}</button>
                        <button wire:click="addReaction('love')">❤️ {{ $comment->reactions->where('type', 'love')->count() }}</button>
                    </div>
                </div>
            </li>

        @endforeach
    </ul>
</div>

{{-- রিপ্লাই ফর্ম --}}
@if($showReplyForm)
    <div class="mt-2">
        <textarea wire:model="replyText" class="form-input w-full" placeholder="Write a reply..."></textarea>
        <button wire:click="postReply" class="btn ...">Post Reply</button>
        <button wire:click="toggleReplyForm" class="btn-secondary ...">Cancel</button>
    </div>
@endif

{{-- Load More বাটন --}}
@if($perPage < $totalComments)
    <div class="text-center mt-4">
        <button wire:click="loadMore" class="btn ...">Load More Comments</button>
    </div>
@endif

<hr class="my-50px border-b border-border-color-12 opacity-25">
