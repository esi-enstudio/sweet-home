<button
    class="show-drawer flex justify-center items-center text-secondary-color transition-all duration-300">

    <i class="fa-regular fa-heart font-bold text-2xl"></i>

    {{-- শুধুমাত্র কাউন্ট ০-এর বেশি হলেই সংখ্যাটি দেখানো হবে --}}
    @if($wishlistCount > 0)
        <sup class="ml-1 text-sm font-semibold">{{ $wishlistCount }}</sup>
    @endif
</button>
