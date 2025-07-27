<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11">
    <h4 class="text-lg font-semibold text-heading-color mb-25px">
        <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">
            Search Blogs
        </span>
    </h4>
    <form wire:submit.prevent="performSearch">
        <div class="flex items-center">
            <input
                wire:model="search"
                type="text"
                placeholder="Search your keyword..."
                class="flex-grow text-paragraph-color text-sm font-semibold bg-section-bg-1 px-5 outline-none border-2 border-r-0 border-border-color-9 focus:border focus:border-secondary-color h-60px placeholder:text-heading-color block rounded-none"
            >
            <button
                type="submit"
                class="flex-shrink-0 text-sm lg:text-base h-60px w-14 flex items-center justify-center text-white bg-secondary-color hover:bg-primary-color"
            >
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>
