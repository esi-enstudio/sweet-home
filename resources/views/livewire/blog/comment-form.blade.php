@auth
    <div>
        <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
            Post Comment
        </h4>

        <form wire:submit.prevent="postComment" class="form-primary bg-white-5 shadow-box-shadow-2 px-25px pt-10 pb-50px md:p-50px md:pt-10">
            <div class="grid gap-30px mb-35px">
                <!-- message -->
                <div class="relative mb-2">
                <textarea wire:model="comment"
                          placeholder="Write a {{ $parentId ? 'reply' : 'comment' }}..."
                          class="min-h-[150px] text-paragraph-color bg-white pl-5 pr-50px py-15px outline-none border-2 focus:border-0 border-white-5 h-65px block w-full rounded-none transition-none"></textarea>
                    <span class="absolute top-[30px] -translate-y-1/2 right-4">
                    <i class="fas fa-pencil text-sm lg:text-base text-secondary-color font-bold"></i>
                </span>
                </div>
                @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- submit button -->
            <div>
                <h5 class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0">
                    <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black -z-1 group-hover:w-0 transition-all duration-300"></span>

                    <button type="submit" class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-heading-color leading-23px uppercase">
                        <i class="far fa-comments"></i>
                        Post {{ $parentId ? 'Reply' : 'Comment' }}
                    </button>
                </h5>
            </div>
        </form>
    </div>
@else
    <p>Please <a href="{{ route('filament.user.auth.login') }}">login</a> to post a comment.</p>
@endauth


