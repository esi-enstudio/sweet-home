<button
    wire:click.prevent="toggleWishlist"
    class="flex items-center justify-center text-center hover:secondary-color text-xl font-bold">

    <i class="{{ $isWishlisted ? 'fas fa-heart text-secondary-color' : 'fa-regular fa-heart hover:text-secondary-color' }}"></i>
</button>
