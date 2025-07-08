<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11">
    <h4 class="text-lg font-semibold text-heading-color mb-25px">
        <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">Top Rated Properties</span>
    </h4>

    @if($this->topProperties->isNotEmpty())
        <ul>
            @foreach($this->topProperties as $key => $property)
                <li class="pb-25px mb-25px border-b border-white-4">
                    <div class="flex gap-x-15px xl:gap-x-5">
                        <div class="w-70px xl:w-90px flex-shrink-0">
                            <a href="{{ route('single.property', $property->slug) }}">
                                <img
                                    src="{{ $property->thumbnail && Storage::disk('public')->exists($property->thumbnail) ? Storage::url($property->thumbnail) : asset('assets/img/default-property-img.jpg') }}"
                                    alt="{{ $property->title }}"
                                >
                            </a>
                        </div>

                        <div>
                            <x-star-rating :rating="$property->average_rating" class="text-10px mb-5px leading-1" />

                            <h6 class="text-sm font-medium mb-1">
                                <a href="{{ route('single.property', $property->slug) }}" class="leading-1.3">
                                    {{ Str::limit($property->title, 25) }}
                                </a>
                            </h6>

                            <p class="text-sm font-bold text-secondary-color">
                                <span class="leading-1.8">
                                    BDT {{ number_format($property->rent_amount) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No top rated properties to show right now.</p>
    @endif
</div>
