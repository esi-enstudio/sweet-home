<div>
    <div class="mt-50px">
        <h4
            class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px"
        >
            {{ $comments->total() }} Comments
        </h4>

        {{-- কমেন্টের তালিকা --}}
        <ul class="mb-20px">
            @forelse($comments as $comment)
                {{-- প্রতিটি কমেন্ট আইটেমকে একটি আলাদা কম্পোনেন্টে রাখা ভালো অভ্যাস --}}
                <li wire:key="comment-{{ $comment->id }}" class="flex flex-col md:flex-row gap-x-30px gap-y-5 pb-30px">
                    <div class="flex-shrink-0">
                        <img
                            src="{{ $comment->user->avatar_url && Storage::disk('public')->exists($comment->user->avatar_url) ? Storage::url($comment->user->avatar_url) : asset('assets/img/default-user-avatar.png') }}"
                            alt="{{ $comment->user->name }}"
                            class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                        >
                    </div>

                    <div class="relative">
                        <h4 class="text-lg text-heading-color font-semibold mb-5px">
                            <a href="#" class="leading-1.3">{{ $comment->name }}</a>
                        </h4>

                        <h6 class="text-13px text-secondary-color font-bold mb-10px">
                        <span class="leading-1.3">
                            {{ $comment->created_at->format('F d, Y') }}
                        </span>
                        </h6>

                        <p class="text-sm mb-5 md:mb-0">
                        <span class="leading-1.8">
                            {{ $comment->comment }}
                        </span>
                        </p>

                        <p wire:click="startReply({{ $comment->id }})" class="text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block">
                        <span class="leading-9 md:leading-9">
                            <i class="icon-reply-1 mr-1"></i>
                            Reply
                        </span>
                        </p>

                        {{-- রিপ্লাই ফর্ম (শুধুমাত্র যখন এই কমেন্টের রিপ্লাই দেওয়া হচ্ছে) --}}
                        @if($replyingTo === $comment->id)
                            <form wire:submit.prevent="submitReply" class="mt-4 ml-10">
                                <input wire:model="replyComment" class="form-control" placeholder="Write a reply...">

                                @guest
                                    <input wire:model="replyName" type="text" placeholder="Your Name">
                                    <input wire:model="replyEmail" type="email" placeholder="Your Email">
                                @endguest

                                <button type="submit" class="btn btn-primary mt-2">
                                    Submit Reply
                                </button>

                                <button type="button" wire:click="cancelReply" class="btn btn-secondary mt-2">Cancel</button>
                            </form>
                        @endif

                    </div>
                </li>

                {{-- রিপ্লাইয়ের তালিকা (নেস্টেড লুপ) --}}
                @if($comment->replies->isNotEmpty())
                    <ul class="mt-4 ml-10">
                        @foreach($comment->replies as $reply)
                            <li wire:key="reply-{{ $reply->id }}" class="flex flex-col md:flex-row gap-x-30px gap-y-5 py-30px border-t border-border-color-12 ml-0 md:ml-[70px]">
                                <div class="flex-shrink-0">
                                    <img
                                        src="{{ $reply->user->avatar_url && Storage::disk('public')->exists($reply->user->avatar_url) ? Storage::url($reply->user->avatar_url) : asset('assets/img/default-user-avatar.png') }}"
                                        alt="{{ $reply->user->name }}"
                                        class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                                    >
                                </div>

                                <div class="relative">
                                    <h4 class="text-lg text-heading-color font-semibold mb-5px">
                                        <a href="#" class="leading-1.3">
                                            {{ $reply->user->name }}
                                        </a>
                                    </h4>

                                    <h6 class="text-13px text-secondary-color font-bold mb-10px">
                                        <span class="leading-1.3">
                                            {{ $reply->created_at->format('F d, Y') }}
                                        </span>
                                    </h6>

                                    <p class="text-sm mb-5 md:mb-0">
                                        <span class="leading-1.8">
                                            {{ $reply->comment }}
                                        </span>
                                    </p>
                                    <p
                                        class="text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block"
                                    >
                                        <span class="leading-9 md:leading-9">
                                            <i class="icon-reply-1 mr-1"></i>
                                            Reply
                                        </span>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @empty
                <p>No comments yet.</p>
            @endforelse
        </ul>

        {{ $comments->onEachSide(0)->links('vendor.pagination.custom-pagination') }}
    </div>

    <hr class="my-50px border-b border-border-color-12 opacity-25">

    {{-- টপ-লেভেল কমেন্ট করার ফর্ম --}}
    <div>
        @if(session('comment_success'))
            <div class="alert-success">{{ session('comment_success') }}</div>
        @else
            <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
                Post Comment
            </h4>

            <form
                wire:submit.prevent="submitComment"
                class="form-primary bg-white-5 shadow-box-shadow-2 px-25px pt-10 pb-50px md:p-50px md:pt-10">
                @if($errors->any())
                    <ul class="mb-3">
                        @foreach($errors->all() as $error)
                            <li class="text-secondary-color font-semibold">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="grid gap-30px mb-35px">
                    @guest
                    <!-- name -->
                    <div class="relative">
                        <input
                            wire:model="name"
                            type="text"
                            placeholder="Type your name...."
                            class="text-paragraph-color pl-5 pr-50px outline-none border-2 bg-white h-65px block w-full rounded-none transition-none @error('name') focus:border-secondary-color border-secondary-color @else focus:border-0 border-white-5 @enderror"
                        >
                        <span class="absolute top-1/2 -translate-y-1/2 right-4">
                            <i class="fas fa-user text-sm lg:text-base text-secondary-color font-bold"></i>
                        </span>
                    </div>

                    <!-- phone -->
                    <div class="relative">
                        <input
                            wire:model="phone"
                            type="number"
                            placeholder="Type your website...."
                            class="text-paragraph-color pl-5 pr-50px outline-none border-2 bg-white h-65px block w-full rounded-none transition-none @error('phone') focus:border-secondary-color border-secondary-color @else focus:border-0 border-white-5 @enderror"
                        >
                        <span class="absolute top-1/2 -translate-y-1/2 right-4">
                            <i class="fas fa-phone text-sm lg:text-base text-secondary-color font-bold"></i>
                        </span>
                    </div>

                    <!-- email -->
                    <div class="relative">
                        <input
                            wire:model="email"
                            type="email"
                            placeholder="Type your email...."
                            class="text-paragraph-color pl-5 pr-50px outline-none border-2 bg-white h-65px block w-full rounded-none transition-none @error('email') focus:border-secondary-color border-secondary-color @else focus:border-0 border-white-5 @enderror"
                        >
                        <span class="absolute top-1/2 -translate-y-1/2 right-4">
                            <i class="fas fa-envelope text-sm lg:text-base text-secondary-color font-bold"></i>
                        </span>
                    </div>
                    @endguest

                    <!-- message -->
                    <div class="relative mb-2">
                        <textarea wire:model="comment" placeholder="Type your comments...." class="min-h-[150px] text-paragraph-color bg-white pl-5 pr-50px py-15px outline-none border-2 h-65px block w-full rounded-none transition-none @error('comment') focus:border-secondary-color border-secondary-color @else focus:border-0 border-white-5 @enderror"></textarea>

                        <span class="absolute top-[30px] -translate-y-1/2 right-4">
                        <i class="fas fa-pencil text-sm lg:text-base text-secondary-color font-bold"></i>
                    </span>
                    </div>

                </div>

                <!-- submit button -->
                <div>
                    <h5
                        class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0"
                    >
                        <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black -z-1 group-hover:w-0 transition-all duration-300"></span>
                        <button
                            type="submit"
                            class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-heading-color leading-23px uppercase"
                        >
                            <i class="far fa-comments"></i> Post Comment
                        </button>
                    </h5>
                </div>
            </form>
        @endif
    </div>
</div>
