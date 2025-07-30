<div>
    <hr class="my-50px border-b border-border-color-12 opacity-25">

    <!-- Post Comment -->
    <div>
        <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
            Post Comment
        </h4>

        <form wire:submit.prevent="postComment" class="form-primary bg-white-5 shadow-box-shadow-2 px-25px pt-10 pb-50px md:p-50px md:pt-10">
            <div class="grid gap-30px">
                <!-- message -->
                <div class="relative mb-2">
                    @if($replyToName)
                        <p>Replying to {{ $replyToName }} <button wire:click.prevent="$set('parentCommentId', null); $set('replyToName', null); $set('comment', '')" type="button">×</button></p>
                    @endif

                        <div
                            class="flex items-center">
                            <input
                                wire:model="comment"
                                type="text"
                                placeholder="Type your comments...."
                                class="flex-grow text-paragraph-color text-sm font-semibold bg-section-bg-1 px-5 outline-none border-2 border-r-0 border-border-color-9 focus:border focus:border-secondary-color h-60px placeholder:text-heading-color block rounded-none">

                            <button type="submit" class="flex-shrink-0 text-sm lg:text-base h-60px w-14 flex items-center justify-center text-white bg-secondary-color hover:bg-primary-color">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    @error('comment') <span class="font-semibold text-secondary-color">{{ $message }}</span> @enderror
                </div>
            </div>
        </form>
    </div>
</div>
