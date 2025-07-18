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
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">{{ $settings['banner_title'] ?? 'ContactPage Us' }}</span>
                </h1>
                <ul class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4">
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="{{ route('home') }}"><i class="fas fa-home text-secondary-color"></i> Home</a>
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        {{ $settings['banner_title'] ?? 'ContactPage' }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- icons section -->
    @if(!empty($settings['contact_cards']))
        <section>
            <div class="container pt-30 pb-5">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-30px">
                    <!-- card -->
                    @foreach($settings['contact_cards'] as $card)
                        <div class="px-30px py-50px border-2 border-border-color-11 text-center flex flex-col items-center">
                            <div class="mb-35px">
                                <img src="{{ asset('storage/' . $card['icon']) }}" alt="{{ $card['title'] }}" >
                            </div>
                            <div>
                                <h2 class="text-lg md:text-xl lg:text-22px xl:text-2xl text-heading-color font-bold mb-15px">
                                    <span class="leading-1.3"> {{ $card['title'] }} </span>
                                </h2>

                                <p class="text-sm lg:text-base">
                                <span class="leading-1.8">
                                    {!! $card['details'] !!}
                                </span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- contact section -->
    <section>
        <div class="container pb-140px lg:pb-40">
            <!-- details form -->
            <div class="relative -bottom-[100px] z-10">
                <form wire:submit.prevent="submitForm" class="form-primary bg-white shadow-box-shadow-2 px-25px pt-10 pb-50px md:p-50px md:pt-10">
                    @if(session('success'))
                        <div class="p-5 mb-5 font-semibold rounded-lg" style="background-color: #beffc9">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
                        {{ $settings['form_title'] ?? 'Get A Quote' }}
                    </h4>

                    @if($errors->any())
                        <ul style="background-color: #ffe3de" class="mb-5 p-5 rounded-lg font-semibold">
                            @foreach($errors->all() as $error)
                                <li class="text-secondary-color">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-30px">
                        <!-- name -->
                        <div class="relative">
                            <input
                                wire:model="name"
                                type="text"
                                placeholder="Enter your name"
                                class="text-paragraph-color pl-5 pr-50px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:opacity-60 placeholder:text-sm placeholder:text-paragraph-color"
                            >
                            <span class="absolute top-1/2 -translate-y-1/2 right-4">
                                <i class="fas fa-user text-sm lg:text-base text-secondary-color font-bold"></i>
                            </span>

                        </div>

                        <!-- email -->
                        <div class="relative">
                            <input
                                wire:model="email"
                                type="email"
                                placeholder="Enter email address"
                                class="text-paragraph-color pl-5 pr-50px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:opacity-60 placeholder:text-sm placeholder:text-paragraph-color"
                            >
                            <span class="absolute top-1/2 -translate-y-1/2 right-4">
                                <i class="fas fa-envelope text-sm lg:text-base text-secondary-color font-bold"></i>
                            </span>
                        </div>

                        <!-- number -->
                        <div class="relative">
                            <input
                                wire:model="phone"
                                type="number"
                                placeholder="Enter phone number"
                                class="text-paragraph-color pl-5 pr-50px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:opacity-60 placeholder:text-sm placeholder:text-paragraph-color"
                            >
                            <span class="absolute top-1/2 -translate-y-1/2 right-4">
                                <i class="fas fa-phone text-sm lg:text-base text-secondary-color font-bold"></i>
                            </span>
                        </div>

                        <!-- type select -->
                        <div class="relative" wire:ignore>
                            <select wire:model="service_type" class="selectize boerder-2 border-border-color-9 text-[14px] leading-60px h-65px">
                                <option value="Select Service Type" data-display="Select">
                                    Select Service Type
                                </option>
                                <option value="Property Management ">
                                    Property Management
                                </option>
                                <option value="Mortgage Service ">Mortgage Service</option>
                                <option value="Consulting Service">
                                    Consulting Service
                                </option>
                                <option value="Home Buying">Home Buying</option>
                                <option value="Home Selling">Home Selling</option>
                                <option value="Escrow Services">Escrow Services</option>
                            </select>
                        </div>

                        <!-- message -->
                        <div class="relative md:col-start-1 md:col-span-2 mb-35px">
                  <textarea
                      wire:model="message"
                      placeholder="Enter message"
                      class="min-h-[150px] text-paragraph-color pl-5 pr-50px py-15px outline-none border-2 border-border-color-9 focus:border focus:border-secondary-color h-65px block w-full rounded-none placeholder:opacity-60 placeholder:text-sm placeholder:text-paragraph-color"
                  ></textarea>
                            <span class="absolute top-[30px] -translate-y-1/2 right-4">
                                <i class="fas fa-pencil text-sm lg:text-base text-secondary-color font-bold"></i>
                            </span>
                        </div>
                    </div>

                    <!-- submit button -->
                    <div class="pb-5">
                        <h5 class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0">
                            <span class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black -z-1 group-hover:w-0 transition-all duration-300"></span>
                            <button
                                type="submit"
                                class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-heading-color leading-23px uppercase"
                            >
                                <span wire:loading.remove>Get a Free Service</span>
                                <span wire:loading>Sending...</span>
                            </button>
                        </h5>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
