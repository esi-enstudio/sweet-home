@props(['property'])

<div>
    <div class="flex items-center justify-between">
        <ul class="flex flex-wrap gap-x-15px md:gap-x-35px gap-y-15px items-center mb-30px">
            <li>
                <ul class="flex gap-x-15px md:gap-x-30px items-center">
                    @if($property->is_featured)
                        <li>
                        <span class="leading-1.8 md:leading-1.8 text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-secondary-color hover:bg-primary-color hover:text-white font-semibold">
                            Featured
                        </span>
                        </li>
                    @elseif($property->is_spotlight)
                        <li>
                        <span class="leading-1.8 md:leading-1.8 text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-secondary-color hover:bg-primary-color hover:text-white font-semibold">
                            Spotlight
                        </span>
                        </li>
                    @elseif($property->is_featured_showcase)
                        <li>
                        <span class="leading-1.8 md:leading-1.8 text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-secondary-color hover:bg-primary-color hover:text-white font-semibold">
                            Featured Showcase
                        </span>
                        </li>
                    @elseif($property->is_hero_featured)
                        <li>
                        <span class="leading-1.8 md:leading-1.8 text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-secondary-color hover:bg-primary-color hover:text-white font-semibold">
                            Hero Featured
                        </span>
                        </li>
                    @endif

                    @if($property->listing_type)
                        <li>
                            <span class="leading-1.8 md:leading-1.8 text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-orange font-semibold hover:text-white">
                                {{ $property->listing_type }}
                            </span>
                        </li>
                    @endif

                </ul>
            </li>

            <li>
                <ul class="flex gap-x-15px md:gap-x-30px items-center">
                    <li>
                        <p class="text-xs md:text-sm font-semibold">
                        <span class="leading-1.8 md:leading-1.8">
                            <i class="far fa-calendar-alt text-secondary-color mr-5px"></i>
                            {{ $property->created_at->format('F d, Y') }}
                        </span>
                        </p>
                    </li>
                    <li>
                        <a class="text-xs md:text-sm font-semibold" href="#">
                        <span class="leading-1.8 md:leading-1.8">
                            <i class="far fa-star text-secondary-color mr-5px"></i>
                            {{ $property->reviews_count ?? 0 }}
                        </span>
                        </a>
                    </li>

                    <li>
                        <a class="text-xs md:text-sm font-semibold" href="#">
                        <span class="leading-1.8 md:leading-1.8">
                            <i class="far fa-eye text-secondary-color mr-5px"></i>
                            {{ $property->views_count }}
                        </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="flex flex-wrap gap-x-15px md:gap-x-35px gap-y-15px items-center mb-30px">
            <li>
                <ul class="flex gap-x-15px md:gap-x-30px items-center">
                    <li>
                        <p class="font-bold text-2xl">
                        <span class="leading-1.8 md:leading-1.8">
                            BDT
                            {{ number_format($property->rent_amount) }}
                        </span>
                        </p>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Title -->
    <h4 class="text-2xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px">
        <span class="leading-1.3 lg:leading-1.3 xl:leading-1.3">
            {{ $property->title }}
        </span>
    </h4>

    <p class="text-sm">
        <span class="leading-1.8">
            <i class="flaticon-pin text-secondary-color"></i>
            {{ $property->address }}
        </span>
    </p>
</div>
