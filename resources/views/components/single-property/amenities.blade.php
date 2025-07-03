@props(['amenities'])

<div>
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
        Amenities
    </h4>

    <div class="mb-60px">
        <ul class="grid grid-cols-3 gap-3">
            @foreach($amenities as $amenity)
                <li class="text-sm font-bold">
                    <label
                        for="amenity-{{ $amenity->id }}"
                        class="checkbox-item leading-1.8 group flex items-center cursor-pointer">
                        <input
                            type="checkbox"
                            id="amenity-{{ $amenity->id }}"
                            class="hidden"
                            checked
                        >
                        <span class="checkmark w-4 h-4 bg-white group-hover:bg-secondary-color border border-border-color-16 transition-all duration-300 relative z-0 after:absolute after:left-1 after:top-0 after:w-[5px] after:h-10px after:rotate-[45deg] after:border after:border-t-0 after:opacity-0 after:border-l-0 after:border-white mr-15px inline-block leading-1"></span>
                        {{ $amenity->name }}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
