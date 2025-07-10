<form wire:submit.prevent="searchProperties">
    <div class="container mt-30 4xl:-mt-65px relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-30px lg:gap-4 xl:gap-30px py-10 px-25px md:p-10 shadow-box-shadow-1 border border-border-color-1 bg-white">
            {{-- Tenant Type --}}
            <div wire:ignore>
                <select wire:model.live="selectedTenant" class="selectize">
                    <option value="" data-display="Select">
                        Tenant Type
                    </option>
                    @foreach($this->formOptions['tenants'] as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Listing Type --}}
            <div wire:ignore>
                <select wire:model.live="selectedListing" class="selectize">
                    <option value="" data-display="Select">Listing Type</option>
                    @foreach($this->formOptions['listingTypes'] as $listingType)
                        <option value="{{ $listingType }}">{{ ucfirst($listingType) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Property Type --}}
            <div wire:ignore>
                <select wire:model.live="selectedType" class="selectize">
                    <option value="" data-display="Select">Property Type</option>
                    @foreach($this->formOptions['propertyTypes'] as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Submit Button --}}
            <div class="text-center">
                <h5 class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block">
                    <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black hover:bg-primary-cogroup-lor z-1 group-hover:w-0 transition-all duration-300"></span>

                    <button
                        type="submit"
                        class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-heading-color leading-23px @if($this->isSearchDisabled) bg-gray-400 disabled:cursor-not-allowed opacity-25 @endif"
                        {{-- isSearchDisabled true হলে বাটনটি ডিজেবল হবে --}}
                        @disabled($this->isSearchDisabled)
                    >
                        <div wire:loading.remove wire:target="searchProperties">
                            Find Now
                        </div>
                        <div wire:loading wire:target="searchProperties">
                            Finding...
                        </div>
                    </button>
                </h5>
            </div>
        </div>
    </div>
</form>
