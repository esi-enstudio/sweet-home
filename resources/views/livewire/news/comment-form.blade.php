<div>
    <hr class="my-50px border-b border-border-color-12 opacity-25">

    <!-- Post Comment -->
    <div>
        <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
            Post Comment
        </h4>

        @if($replyToName)
            <p>Replying to {{ $replyToName }}
                <button
                    wire:click.prevent="cancelReply"
                    type="button"
                    class="text-secondary-color font-semibold"
                >
                    &times; Cancel
                </button>
            </p>
        @endif

        <form
            wire:submit.prevent="postComment"
            @focus-comment-form.window="$nextTick(() => $refs.commentTextarea.focus())"
            class="form-primary shadow-box-shadow-2"
        >
            <div class="grid gap-30px">
                <!-- message -->
                <div class="w-full">
                    <div class="flex items-center">
                        <textarea
                            wire:model="comment"
                            x-ref="commentTextarea"
                            placeholder="Type your comments...."
                            class="text-paragraph-color bg-white pl-5 pr-50px py-15px outline-none border-2 focus:border-0 border-white-5 h-65px block w-full rounded-none transition-none"></textarea>

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
