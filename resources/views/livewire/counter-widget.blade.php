<section class="bg-section-bg-1">
    <div class="container pt-30 pb-70px">
        <div class="text-center counter grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-30px mb-45px -mt-3">
            <!-- count 1 -->
            <div>
                <div class="text-65px text-secondary-color">
                    <i class="flaticon-office leading-1"></i>
                </div>
                <h5 class="text-3xl md:text-4xl lg:text-42px text-heading-color font-bold mb-10px">
                    <span class="leading-1.3" data-countup-number="{{ $this->stats['available_listings'] }}"></span>
                </h5>
                <p class="text-sm lg:text-base font-bold">
                    <span class="leading-1.8">Available Listings</span>
                </p>
            </div>

            <!-- count 2 -->
            <div>
                <div class="text-65px text-secondary-color">
                    <i class="fi fi-ts-hand-key leading-1"></i>
                </div>
                <h5 class="text-3xl md:text-4xl lg:text-42px text-heading-color font-bold mb-10px">
                    <span class="leading-1.3" data-countup-number="{{ $this->stats['rental_properties'] }}"></span>
                </h5>
                <p class="text-sm lg:text-base font-bold">
                    <span class="leading-1.8">Rental Properties</span>
                </p>
            </div>

            <!-- count 3 -->
            <div>
                <div class="text-65px text-secondary-color">
                    <i class="fi fi-ts-comment-smile leading-1"></i>
                </div>
                <h5 class="text-3xl md:text-4xl lg:text-42px text-heading-color font-bold mb-10px">
                    <span class="leading-1.3" data-countup-number="{{ $this->stats['users'] }}"></span>
                </h5>
                <p class="text-sm lg:text-base font-bold">
                    <span class="leading-1.8">Registered Users</span>
                </p>
            </div>

            <!-- count 4 -->
            <div>
                <div class="text-65px text-secondary-color">
                    <i class="fi fi-ts-category leading-1"></i>
                </div>
                <h5 class="text-3xl md:text-4xl lg:text-42px text-heading-color font-bold mb-10px">
                    <span class="leading-1.3" data-countup-number="{{ $this->stats['property_types'] }}"></span>
                </h5>
                <p class="text-sm lg:text-base font-bold">
                    <span class="leading-1.8">Property Types</span>
                </p>
            </div>

        </div>
    </div>
</section>
