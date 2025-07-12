<main
    x-data="propertyViewTracker(@js($property->slug))"
    x-init="startTimer()"
>
    <!-- banner section -->
    <section>
        {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::random(10)) }}
        {{-- ব্যানার এবং ব্রেডক্রাম্ব সেকশন --}}
        <x-single-property.banner :title="$property->title" />
    </section>

    {{-- মিডিয়া স্লাইডার (প্রধান ছবি) --}}
    <x-single-property.media-slider :property="$property" />

    <!-- প্রধান কন্টেন্ট (বাম অংশ) -->
    <section>
        <div class="container modal-container property-tab pt-70px pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px">
                <!-- details body -->
                <div class="lg:col-start-1 lg:col-span-8">
                    <!--  featured//rent//date//comments//title//address -->
                    <x-single-property.header :property="$property" />
                    <!-- Description -->
                    <x-single-property.description :description="$property->description" />
                    <!-- Property Information -->
                    <x-single-property.property-info :property="$property" />
                    <!-- Space and Overviews-->
                    <x-single-property.space-overview :spaces="$property->spaceOverviews" />
                    <!-- Gallery -->
                    <x-single-property.gallery :property="$property" />
                    <!-- Amenities -->
                    <x-single-property.amenities :amenities="$property->amenities" />
                    <!-- Location -->
                    <x-single-property.location-map :lat="$property->latitude" :lng="$property->longitude" />
                    <!-- Floor Plans -->
                    <x-single-property.floor-plans :floorPlans="$property->floorPlans" />
                    <!-- Property Video -->
                    <x-single-property.video :property="$property" />
                    <!-- Customer Reviews -->
                    <livewire:property-reviews :property="$property"/>
                    <!-- Related Properties -->
                    <x-single-property.related-properties :properties="$this->relatedProperties" />
                </div>


                <!-- সাইডবার (ডান অংশ) -->
                <div class="lg:col-start-9 lg:col-span-4 pt-60px lg:pt-0">

                    <!-- owner details -->
                    <x-single-property.sidebar.owner-info :owner="$property->user" />

                    <!-- Drop Message For Inquiry -->
                    @livewire('property-inquiry-form', ['property' => $property], key($property->id))

                    <!-- Top Rated Properties -->
                    @livewire('single-property.top-rated-properties-widget')

                    <!-- Top Categories-->
                    @livewire('single-property.top-categories-widget')

                    <!-- Popular Properties-->
                    @livewire('single-property.popular-properties-widget')

                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
    <script>
        function propertyViewTracker(propertySlug) {
            return {
                propertySlug: propertySlug,
                timeoutId: null,

                startTimer() {
                    // ১০ সেকেন্ডের (10000 মিলিসেকেন্ড) টাইমার সেট করুন
                    this.timeoutId = setTimeout(() => {
                        this.trackView();
                    }, 20000);

                    // ব্যবহারকারী পেজটি ত্যাগ করলে টাইমার বন্ধ করুন
                    window.addEventListener('beforeunload', () => {
                        clearTimeout(this.timeoutId);
                    });
                },

                trackView() {
                    // API-তে AJAX (fetch) রিকোয়েস্ট পাঠান
                    fetch(`/properties/${this.propertySlug}/track-view`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('View tracking response:', data.message);
                        })
                        .catch(error => {
                            console.error('Error tracking view:', error);
                        });
                }
            };
        }
    </script>
@endpush
