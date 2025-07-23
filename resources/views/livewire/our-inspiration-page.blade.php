<main>
    <!-- banner section -->
    <section>
        <!-- banner section -->
        <div
            style="background-image: url('{{ asset('assets/img/bg/14.jpg') }}')"
            class="w-full bg-no-repeat bg-cover bg-center relative z-0 after:w-full after:h-full after:absolute after:top-0 after:left-0 after:bg-white after:bg-opacity-30 after:-z-1"
        >
            <div class="container py-110px">
                <h1 class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px">
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">Our Inspiration</span>
                </h1>

                <ul class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4">
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-home text-secondary-color"></i> Home</a>
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        Inspiration
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- team section -->
    <section>
        <div class="container pt-30 pb-90px">
            @if($this->inspirationMembers->isNotEmpty())
                <div class="service-cards flex flex-wrap justify-center items-center text-center -mx-15px">
                    <!-- card -->
                    @foreach($this->inspirationMembers as $member)
                        <div class="service-card basis-full sm:basis-1/2 lg:basis-1/3 px-15px mb-30px">
                        <div class="border border-white-6 hover:shadow-box-shadow-1 bg-white relative transition-all duration-300">
                            {{-- সদস্যের ছবি --}}
                            <div class="text-center mb-5">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="inline-block w-full">
                                @else
                                    {{-- একটি ডিফল্ট ছবি --}}
                                    <img src="https://via.placeholder.com/400x400.png?text=No+Image" alt="{{ $member->name }}" class="inline-block w-full">
                                @endif
                            </div>

                            <div class="text-center px-15px py-25px">
                                {{-- সদস্যের নাম --}}
                                <h6 class="text-17px md:text-lg lg:text-xl text-heading-color font-bold mb-15px">
                                    <a class="hover:text-secondary-color leading-1.3 md:leading-1.3 lg:leading-1.3" href="#">
                                        {{ $member->name }}
                                    </a>
                                </h6>

                                {{-- সদস্যের পদবি --}}
                                <h6 class="text-sm md:text-15px lg:text-base font-bold mb-15px">
                                    <span class="text-secondary-color leading-1.3 md:leading-1.3 lg:leading-1.3">
                                        {{ $member->title }}
                                    </span>
                                </h6>

                                <!-- social links -->
                                @if(!empty($member->social_links))
                                    <ul class="text-sm lg:text-base flex gap-15px justify-center items-center">

                                        {{-- Facebook --}}
                                        @if(isset($member->social_links['facebook']))
                                            <li class="leading-1.8 lg:leading-1.8">
                                                <a href="{{ $member->social_links['facebook'] }}" target="_blank">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- X-Twitter --}}
                                        @if(isset($member->social_links['x-twitter']))
                                            <li class="leading-1.8 lg:leading-1.8">
                                                <a href="{{ $member->social_links['x-twitter'] }}" target="_blank">
                                                    <i class="fa-brands fa-x-twitter"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- LinkedIn --}}
                                        @if(isset($member->social_links['linkedin']))
                                            <li class="leading-1.8 lg:leading-1.8">
                                                <a href="{{ $member->social_links['linkedin'] }}" target="_blank">
                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Instagram --}}
                                        @if(isset($member->social_links['instagram']))
                                            <li class="leading-1.8 lg:leading-1.8">
                                                <a href="{{ $member->social_links['instagram'] }}" target="_blank">
                                                    <i class="fa-brands fa-instagram"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Youtube --}}
                                        @if(isset($member->social_links['youtube']))
                                            <li class="leading-1.8 lg:leading-1.8">
                                                <a href="{{ $member->social_links['youtube'] }}" target="_blank">
                                                    <i class="fa-brands fa-youtube"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- TikTok --}}
                                        @if(isset($member->social_links['tiktok']))
                                            <li class="leading-1.8 lg:leading-1.8">
                                                <a href="{{ $member->social_links['tiktok'] }}" target="_blank">
                                                    <i class="fa-brands fa-tiktok"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Threads --}}
                                        @if(isset($member->social_links['threads']))
                                            <li class="leading-1.8 lg:leading-1.8">
                                                <a href="{{ $member->social_links['threads'] }}" target="_blank">
                                                    <i class="fa-brands fa-threads"></i>
                                                </a>
                                            </li>
                                        @endif

                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- --- "Load More" বাটন এবং লোডিং ইন্ডিকেটর --- --}}
                @if($perPage < $totalMembers)
                    <div class="text-center mt-4">
                        <button type="submit" wire:click="loadMore" wire:loading.attr="disabled" class="lg:text-base text-white bg-secondary-color hover:bg-primary-color px-5 py-3 rounded-lg">
                            <span wire:loading.remove wire:target="loadMore">
                                Load More
                            </span>
                                    <span wire:loading wire:target="loadMore">
                                Loading...
                            </span>
                        </button>
                    </div>
                @endif
            @else
                <div class="text-center">
                    <p>No inspiration members to show at the moment.</p>
                </div>
            @endif
        </div>
    </section>
</main>
