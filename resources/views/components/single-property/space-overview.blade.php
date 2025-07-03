@props(['spaces'])

@if(count($spaces) > 0)
    <div>
        <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
            Space and Overviews
        </h4>

        <ul class="flex flex-wrap mb-45px">
            @foreach($spaces as $space)
                <li class="text-sm pt-4 pb-10px pr-6 flex items-center gap-4">
                    <div class="w-10 h-10 flex items-center justify-center flex-shrink-0 bg-section-bg-5">
                        <i class="flaticon-double-bed text-22px text-secondary-color"></i>
                    </div>

                    <div>
                        <h6 class="text-sm text-heading-color font-normal mb-0.5">
                            <span class="leading-1.3">{{ $space->name }}</span>
                        </h6>

                        <p class="text-[12.25px] lg:text-sm">
                            <span class="lg:leading-1.8">{{ intval($space->pivot->length) . ' x ' . intval($space->pivot->width) }} sq feet </span>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif
