@props(['property'])

<div>
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
        Property Information
    </h4>

    <div class="flex flex-col md:flex-row bg-section-bg-1 mb-60px">
        <ul class="px-30px md:px-50px py-5 md:pt-30px md:pb-10 md:border-r md:border-border-color-7">
            @if($property->property_id)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Property ID:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->property_id }}</span>
                    </p>
                </li>
            @endif

            @if($property->is_available)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Available:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color capitalize">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->is_available ? 'Yes' : 'No' }}</span>
                    </p>
                </li>
            @endif

            @if($property->total_area)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Total Area:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->total_area }} sqft</span>
                    </p>
                </li>
            @endif

            @if($property->bedrooms)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Beds:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->bedrooms }}</span>
                    </p>
                </li>
            @endif

            @if($property->bathrooms)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Baths</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->bathrooms }}</span>
                    </p>
                </li>
            @endif

            @if($property->balconies)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Balconies</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->balconies }}</span>
                    </p>
                </li>
            @endif

            @if($property->security_deposit)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Security Deposit:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color capitalize">
                        <span class="leading-1.8 lg:leading-1.8">BDT {{ number_format($property->security_deposit) }}</span>
                    </p>
                </li>
            @endif
        </ul>

        <ul class="px-30px md:px-50px py-5 md:pt-30px md:pb-10">
            @if($property->available_from)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Available From:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color capitalize">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->available_from->format('F d, Y')  }}</span>
                    </p>
                </li>
            @endif

            @if($property->year_built)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Year Built:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->year_built }}</span>
                    </p>
                </li>
            @endif

            @if($property->floor_number)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Floor:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color">
                        <span class="leading-1.8 lg:leading-1.8">
                            {{ $property->floor_number }}
                        </span>
                    </p>
                </li>
            @endif

            @if($property->facing)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Facing:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color capitalize">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->facing }}</span>
                    </p>
                </li>
            @endif

            @if($property->rent_negotiable)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Negotiable:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color capitalize">
                        <span class="leading-1.8 lg:leading-1.8">{{ $property->rent_negotiable }}</span>
                    </p>
                </li>
            @endif

            @if($property->service_charge)
                <li class="text-sm mt-4 font-semibold">
                    <span class="leading-1.8 min-w-[110px] inline-block flex-shrink-0">Service Charge:</span>

                    <p class="text-sm lg:text-base inline-block text-heading-color capitalize">
                        <span class="leading-1.8 lg:leading-1.8">BDT {{ number_format($property->service_charge) }}</span>
                    </p>
                </li>
            @endif
        </ul>
    </div>
</div>
