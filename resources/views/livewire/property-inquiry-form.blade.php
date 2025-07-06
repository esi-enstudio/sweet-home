<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11">
    <h4 class="text-lg font-semibold text-heading-color mb-25px">
        <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">Drop Message For Inquiry</span>
    </h4>

    <form wire:submit.prevent="submitInquiry">
        <div class="grid gap-30px mb-10">
            <!-- name -->
            <div class="relative">
                <input
                    wire:model="name"
                    type="text"
                    placeholder="Your Name*"
                    class="text-paragraph-color px-5 py-15px outline-none border-2 @error('name') border-red-500 @else border-border-color-9 @enderror focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                >
                @error('name') <span class="text-secondary-color font-semibold text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- phone -->
            <div class="relative">
                <input
                    wire:model="phone"
                    type="text"
                    placeholder="Your phone number*"
                    class="text-paragraph-color px-5 py-15px outline-none border-2 @error('phone') border-red-500 @else border-border-color-9 @enderror focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                >
                @error('phone') <span class="text-secondary-color font-semibold text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- message -->
            <div class="relative">
                      <textarea
                          wire:model="message"
                          placeholder="Write Message..."
                          class="min-h-[150px] text-paragraph-color px-5 py-15px outline-none border-2 @error('message') border-red-500 @else border-border-color-9 @enderror focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:text-sm placeholder:text-paragraph-color"
                      ></textarea>
                @error('message') <span class="text-secondary-color font-semibold text-sm mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- submit button -->
        <div>
            <h5
                class="uppercase text-sm md:text-base text-white bg-secondary-color hover:bg-primary-color relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0"
            >
                <button
                    type="submit"
                    class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-white leading-23px uppercase"
                >
                    <span wire:loading.remove wire:target="submitInquiry">
                        Send Message
                    </span>
                    <span wire:loading wire:target="submitInquiry">
                        Sending...
                    </span>
                </button>
            </h5>
        </div>
    </form>
</div>
