@props(['lat','lng','zoom' => 16])

@if($lat && $lng)
    <div>
        <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
            Location
        </h4>

        <div
            class="h-360px mb-60px"
            id="propertyMap"
            data-latitude="{{ $lat }}"
            data-longitude="{{ $lng }}"
            data-zoom="{{ $zoom }}"
        >
            {{-- ম্যাপ লোড হওয়ার আগে একটি লোডিং মেসেজ দেখানো যেতে পারে --}}
            <div class="flex items-center justify-center h-full bg-gray-200">
                <p>Loading map...</p>
            </div>
        </div>
    </div>
@endif

{{-- Google Maps API স্ক্রিপ্টটি একবারই লোড করা হবে --}}
{{-- @push('scripts') একটি ভালো উপায়, অথবা সরাসরি এখানেও রাখা যায় --}}
@once
    @push('scripts')
        <script>
            function initMap() {
                const mapElement = document.getElementById('propertyMap');

                if (!mapElement) {
                    return;
                }

                // data-* অ্যাট্রিবিউট থেকে ডেটা গ্রহণ করুন
                const lat = parseFloat(mapElement.dataset.latitude);
                const lng = parseFloat(mapElement.dataset.longitude);
                const zoom = parseInt(mapElement.dataset.zoom);

                const propertyLocation = { lat: lat, lng: lng };

                // ম্যাপ অবজেক্ট তৈরি করুন
                const map = new google.maps.Map(mapElement, {
                    zoom: zoom,
                    center: propertyLocation,
                    // আপনি চাইলে আরও অনেক অপশন কাস্টমাইজ করতে পারেন
                    // mapTypeId: 'satellite',
                    // disableDefaultUI: true,
                });

                // ম্যাপে একটি মার্কার যোগ করুন
                new google.maps.Marker({
                    position: propertyLocation,
                    map: map,
                    title: "Property Location",
                    // আপনি চাইলে কাস্টম আইকনও ব্যবহার করতে পারেন
                    // icon: '/path/to/custom-marker.png'
                });
            }
        </script>

        {{-- Google Maps API স্ক্রিপ্ট --}}
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&callback=initMap"></script>
    @endpush
@endonce
