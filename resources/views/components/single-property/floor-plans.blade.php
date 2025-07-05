@props(['floorPlans'])

@if($floorPlans->isNotEmpty())
    <div>
        <h4
            class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px"
        >
            Floor Plans
        </h4>

        {{-- Alpine.js কম্পোনেন্ট শুরু হচ্ছে --}}
        {{-- x-data="{ activeTab: '{{ $floorPlans->first()->id }}' }" --}}
        {{-- ডিফল্টভাবে প্রথম ফ্লোর প্ল্যানটি অ্যাক্টিভ থাকবে --}}
        <div
            x-data="{ activeTab: @js($floorPlans->first()->id) }"
            class="tab plan-tab mb-60px">

            {{-- ট্যাব বাটন (Links) --}}
            <div
                class="tab-links flex flex-wrap items-center gap-x-5 lg:gap-x-30px xl:gap-x-50px gap-y-10px text-sm lg:text-lg xl:text-xl text-heading-color mb-50px"
            >
                @foreach($floorPlans as $plan)
                    <button
                        {{-- activeTab এর মান পরিবর্তন করার জন্য @click --}}
                        @click="activeTab = @js($plan->id)"
                        {{-- activeTab এর মানের উপর ভিত্তি করে 'active' ক্লাস যোগ করা হচ্ছে --}}

                        :class="{ 'active': activeTab === @js($plan->id) }"

                        class="p-1px border-b-2 border-transparent font-semibold relative leading-1.2 after:w-10px after:h-10px after:border-3px after:border-white after:bg-transparent after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:translate-y-1/2 after:z-10 after:rounded-100%"
                    >
                        {{ $plan->name }}
                    </button>
                @endforeach
            </div>

            {{-- ট্যাব কন্টেন্ট --}}
            <div class="tab-contents">
                @foreach($floorPlans as $plan)
                    {{-- activeTab এর মানের উপর ভিত্তি করে কন্টেন্ট দেখানো বা লুকানো হচ্ছে --}}
                    <div x-show="activeTab === @js($plan->id)" x-transition class="tab-content-item">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px gap-y-50px">

                            {{-- বাম অংশ: ছবি --}}
                            <div class="lg:col-start-1 lg:col-span-7">
                                <img
                                    src="{{ asset('storage/' . $plan->image_path) }}"
                                    class="w-full"
                                    alt="{{ $plan->name }}"
                                >
                            </div>

                            {{-- ডান অংশ: বর্ণনা --}}
                            <div class="lg:col-start-8 lg:col-span-5">
                                <h6
                                    class="text-xl md:text-22px lg:text-26px xl:text-3xl font-bold text-heading-color mb-15px leading-1.3"
                                >
                                    <span class="leading-1.3">{{ $plan->name }}</span>
                                </h6>
                                <p class="text-sm lg:text-base">
                                <span class="leading-1.8">
                                    {{ $plan->description }}
                                </span>
                                </p>
                            </div>
                        </div>

                        {{-- নিচের তথ্যের টেবিল --}}
                        <div class="px-10 py-5 bg-section-bg-1 grid grid-cols-1 lg:grid-cols-2 gap-x-30px gap-y-10px mt-50px">
                            <div>
                                <ul class="flex flex-col gap-y-10px items-stretch">
                                    <li
                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"
                                    >
                                        <ul class="flex justify-between items-center">
                                            <li class="leading-1.8 pr-10px bg-section-bg-1">
                                                Total Area
                                            </li>

                                            <li
                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"
                                            >
                                                {{ $plan->total_area }} Sq. Ft
                                            </li>
                                        </ul>
                                    </li>

{{--                                    <li--}}
{{--                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-section-bg-1">--}}
{{--                                                Bedroom--}}
{{--                                            </li>--}}

{{--                                            <li--}}
{{--                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"--}}
{{--                                            >--}}
{{--                                                150 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
{{--                            <div>--}}
{{--                                <ul class="flex flex-col gap-y-10px items-stretch">--}}
{{--                                    <li--}}
{{--                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-section-bg-1">--}}
{{--                                                Belcony/Pets--}}
{{--                                            </li>--}}

{{--                                            <li--}}
{{--                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"--}}
{{--                                            >--}}
{{--                                                Allowed--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}

{{--                                    <li--}}
{{--                                        class="text-sm font-semibold relative z-0 before:w-full before:h-1 before:border-b before:border-dashed before:border-color-1 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:-z-1"--}}
{{--                                    >--}}
{{--                                        <ul class="flex justify-between items-center">--}}
{{--                                            <li class="leading-1.8 pr-10px bg-section-bg-1">--}}
{{--                                                Lounge--}}
{{--                                            </li>--}}

{{--                                            <li--}}
{{--                                                class="text-sm lg:text-base leading-1.8 pl-10px bg-section-bg-1"--}}
{{--                                            >--}}
{{--                                                650 Sq. Ft--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
