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
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">
                        {{ $post->title }}
                    </span>
                </h1>

                <ul
                    class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4"
                >
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="{{ route('home') }}"
                        ><i class="fas fa-home text-secondary-color"></i> Home</a>
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        Blog Details
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- News Details section -->
    <section>
        <div class="container modal-container property-tab pt-30 pb-140px lg:pb-30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-x-30px">
                <!-- news main content -->
                <div class="lg:col-start-1 lg:col-span-8">
                    <div class="px-5 md:px-50px py-50px border-2 border-border-color-11">
                        <div>
                            <ul class="mb-5">
                                <li>
                                    {{-- ক্যাটাগরি --}}
                                    <a
                                        class="text-xs md:text-sm uppercase text-white px-15px pt-5px pb-0.5 bg-secondary-color hover:bg-primary-color hover:text-white font-semibold"
                                        href="#"
                                    >
                                        <span class="leading-1.8 md:leading-1.8">
                                            {{ $post->category->name }}
                                        </span>
                                    </a>
                                </li>
                            </ul>

                            <h1 class="text-2xl md:text-3xl font-semibold text-heading-color mb-5">
                                <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">{{ $post->title }}</span>
                            </h1>
                            <ul class="flex gap-x-15px md:gap-x-30px items-center mb-5">
                                <li>
                                    <div>
                                        <a href="team-details.html" class="flex items-center gap-10px text-xs md:text-sm font-semibold">
                                            <img
                                                src="{{ $post->user->avatar_url && Storage::disk('public')->exists($post->user->avatar_url)
                                                                         ? Storage::url($post->user->avatar_url)
                                                                         : asset('assets/img/default-user-avatar.png') }}"
                                                alt="{{ $post->title }}"
                                                class="w-full h-full rounded-100% border-3px border-border-color-1 transition-all duration-300"
                                            >
                                            <span>By: {{ $post->user->name }}</span>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <p class="text-xs md:text-sm font-semibold">
                                        <span class="leading-1.8 md:leading-1.8">
                                            <i class="far fa-calendar-alt text-secondary-color mr-5px"></i>
                                            {{ $post->published_at->format('F d, Y') }}
                                        </span>
                                    </p>
                                </li>

                                <li>
                                    <a class="text-xs md:text-sm font-semibold" href="#">
                                        <span class="leading-1.8 md:leading-1.8">
                                            <i class="far fa-comments text-secondary-color mr-5px"></i>
                                            {{ $post->comments->count() }} Comments
                                        </span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Description -->
                            {!! $post->content !!}

                            

                            <!-- thumbnail -->
                            <div class="leading1">
                                <img
                                    src="assets/img/blog/31.jpg"
                                    class="w-full -mb-1"
                                    alt=""
                                >
                            </div>

                            <!-- tags and social -->
                            <div
                                class="flex flex-col lg:flex-row lg:justify-between mt-20"
                            >
                                <!-- tags -->
                                <div>
                                    <h4
                                        class="text-17px md:text-lg lg:text-xl font-bold text-heading-color mb-15px"
                                    >
                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                        >Releted Tags</span
                        >
                                    </h4>
                                    <ul
                                        class="flex gap-10px flex-wrap items-center font-poppins"
                                    >
                                        <li>
                                            <a
                                                href="#"
                                                class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                            >POPULAR
                                            </a>
                                        </li>

                                        <li>
                                            <a
                                                href="#"
                                                class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                            >
                                                DESGIN
                                            </a>
                                        </li>

                                        <li>
                                            <a
                                                href="#"
                                                class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                            >UX
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- social -->
                                <div>
                                    <h4
                                        class="text-17px md:text-lg lg:text-xl font-bold text-heading-color mb-15px mt-30px lg:mt-0"
                                    >
                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                        >Social Share</span
                        >
                                    </h4>
                                    <ul
                                        class="text-sm lg:text-base flex gap-18px justify-center items-center text-color-1"
                                    >
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://www.facebook.com/"
                                            ><i class="fab fa-facebook-f"></i
                                                ></a>
                                        </li>
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://x.com/"
                                            ><i class="fab fa-twitter"></i
                                                ></a>
                                        </li>
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://www.linkedin.com/"
                                            ><i class="fab fa-linkedin"></i
                                                ></a>
                                        </li>
                                        <li class="leading-1.8 lg:leading-1.8">
                                            <a href="https://www.youtube.com/"
                                            ><i class="fab fa-youtube"></i
                                                ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr
                                class="my-50px border-b border-border-color-12 opacity-25"
                            >
                            <!-- navigation -->

                            <div
                                class="grid grid-cols-1 lg:grid-cols-2 relative z-0 after:content-['\e958'] after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:text-3xl after:font-icomoon after:z-1 after:text-secondary-color"
                            >
                                <!-- prev blog -->
                                <div>
                                    <h4
                                        class="text-sm md:text-15px lg:text-base font-bold text-secondary-color mb-3"
                                    >
                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                        >Prev Post</span
                        >
                                    </h4>
                                    <h4
                                        class="text-lg lg:text-2xl font-semibold text-heading-color"
                                    >
                                        <a
                                            href="#"
                                            class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                                        >Tips On Minimalist</a
                                        >
                                    </h4>
                                </div>
                                <!-- next  blog -->
                                <div class="text-end">
                                    <h4
                                        class="text-sm md:text-15px lg:text-base font-bold text-secondary-color mb-3"
                                    >
                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                        >Next Post</span
                        >
                                    </h4>
                                    <h4
                                        class="text-lg lg:text-2xl font-semibold text-heading-color"
                                    >
                                        <a
                                            href="#"
                                            class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                                        >Less Is More</a
                                        >
                                    </h4>
                                </div>
                            </div>
                            <hr
                                class="my-50px border-0 border-b border-border-color-12 opacity-25"
                            >

                            <!-- related blogs -->

                            <div>
                                <h4
                                    class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px"
                                >
                                    Related Post
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-30px mb-20">
                                    <!-- card 1 -->
                                    <div class="group shadow-box-shadow-5">
                                        <!-- card thumbs -->
                                        <div class="relative leading-1">
                                            <a href="blog-details.html" class="overflow-hidden">
                                                <img
                                                    src="assets/img/blog/blog-details/11.jpg"
                                                    class="w-full transition-all duration-700"
                                                    alt=""
                                                >
                                            </a>
                                        </div>
                                        <!-- card body -->
                                        <div class="px-5 md:pl-35px md:pr-30px pt-35px pb-30px">
                                            <p
                                                class="text-xs md:text-sm mb-5 text-secondary-color"
                                            >
                            <span class="leading-1.8 md:leading-1.8"
                            ><i
                                    class="far fa-calendar-alt text-secondary-color mr-5px"
                                ></i>
                              June 22, 2024</span
                            >
                                            </p>
                                            <h4
                                                class="text-xl font-semibold text-heading-color mb-5"
                                            >
                                                <a
                                                    href="blog-details.html"
                                                    class="hover:text-secondary-color leading-1.3"
                                                >A series of iOS 7 inspire vector icons sense.
                                                </a>
                                            </h4>
                                            <p class="text-sm">
                            <span class="leading-1.8 lg:leading-1.8"
                            >Lorem ipsum dolor sit amet, conse ctet ur
                              adipisicing elit, sed doing.</span
                            >
                                            </p>
                                        </div>
                                    </div>
                                    <!-- card 2 -->
                                    <div class="group shadow-box-shadow-5">
                                        <!-- card thumbs -->
                                        <div class="relative leading-1">
                                            <a href="blog-details.html" class="overflow-hidden">
                                                <img
                                                    src="assets/img/blog/blog-details/12.jpg"
                                                    class="w-full transition-all duration-700"
                                                    alt=""
                                                >
                                            </a>
                                        </div>
                                        <!-- card body -->
                                        <div class="px-5 md:pl-35px md:pr-30px pt-35px pb-30px">
                                            <p
                                                class="text-xs md:text-sm mb-5 text-secondary-color"
                                            >
                            <span class="leading-1.8 md:leading-1.8"
                            ><i
                                    class="far fa-calendar-alt text-secondary-color mr-5px"
                                ></i>
                              June 22, 2024</span
                            >
                                            </p>
                                            <h4
                                                class="text-xl font-semibold text-heading-color mb-5"
                                            >
                                                <a
                                                    href="blog-details.html"
                                                    class="hover:text-secondary-color leading-1.3"
                                                >A series of iOS 7 inspire vector icons sense.
                                                </a>
                                            </h4>
                                            <p class="text-sm">
                            <span class="leading-1.8 lg:leading-1.8"
                            >Lorem ipsum dolor sit amet, conse ctet ur
                              adipisicing elit, sed doing.</span
                            >
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- author -->
                            <div
                                class="flex flex-col md:flex-row p-10 px-5 md:px-10 border-2 border-border-color-11"
                            >
                                <div
                                    class="mr-0 md:mr-10 lg:mr-30px xl:mr-10 mb-30px md:mb-0 flex-shrink-0"
                                >
                                    <img
                                        src="assets/img/blog/author.jpg"
                                        class="max-full w-100px md:w-[180px] lg:w-[120px] xl:w-[180px]"
                                        alt=""
                                    >
                                </div>
                                <div>
                                    <h6 class="text-sm text-secondary-color font-bold mb-0">
                                        <span class="leading-1.3">Written by</span>
                                    </h6>
                                    <h2
                                        class="text-xl md:text-22px lg:text-26px xl:text-3xl text-heading-color font-bold mb-10px"
                                    >
                        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3"
                        >Rosalina D. William
                        </span>
                                    </h2>

                                    <p class="text-sm flex items-center gap-4 mt-2">
                        <span class="leading-1.8"
                        >Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation is enougn for today.</span
                        >
                                    </p>
                                </div>
                            </div>

                            <!-- Comments -->
                            <div class="mt-50px">
                                <h4
                                    class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px"
                                >
                                    03 Comments
                                </h4>
                                <ul class="mb-20px">
                                    <li
                                        class="flex flex-col md:flex-row gap-x-30px gap-y-5 pb-30px"
                                    >
                                        <div class="flex-shrink-0">
                                            <img
                                                src="assets/img/testimonial/1.jpg"
                                                alt=""
                                                class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                                            >
                                        </div>
                                        <div class="relative">
                                            <h4
                                                class="text-lg text-heading-color font-semibold mb-5px"
                                            >
                                                <a href="#" class="leading-1.3">Adam Smit</a>
                                            </h4>
                                            <h6
                                                class="text-13px text-secondary-color font-bold mb-10px"
                                            >
                                                <span class="leading-1.3">20th May 2024</span>
                                            </h6>

                                            <p class="text-sm mb-5 md:mb-0">
                            <span class="leading-1.8"
                            >Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Doloribus, omnis fugit corporis
                              iste magnam ratione.</span
                            >
                                            </p>
                                            <p
                                                class="text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block"
                                            >
                            <span class="leading-9 md:leading-9"
                            ><i class="icon-reply-1 mr-1"></i> Reply</span
                            >
                                            </p>
                                        </div>
                                    </li>
                                    <li
                                        class="flex flex-col md:flex-row gap-x-30px gap-y-5 py-30px border-t border-border-color-12 ml-0 md:ml-[70px]"
                                    >
                                        <div class="flex-shrink-0">
                                            <img
                                                src="assets/img/testimonial/3.jpg"
                                                alt=""
                                                class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                                            >
                                        </div>
                                        <div class="relative">
                                            <h4
                                                class="text-lg text-heading-color font-semibold mb-5px"
                                            >
                                                <a href="#" class="leading-1.3">Jhone Doe</a>
                                            </h4>
                                            <h6
                                                class="text-13px text-secondary-color font-bold mb-10px"
                                            >
                                                <span class="leading-1.3">20th May 2024</span>
                                            </h6>

                                            <p class="text-sm mb-5 md:mb-0">
                            <span class="leading-1.8"
                            >Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Doloribus, omnis fugit corporis
                              iste magnam ratione.</span
                            >
                                            </p>
                                            <p
                                                class="text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block"
                                            >
                            <span class="leading-9 md:leading-9"
                            ><i class="icon-reply-1 mr-1"></i> Reply</span
                            >
                                            </p>
                                        </div>
                                    </li>
                                    <li
                                        class="flex flex-col md:flex-row gap-x-30px gap-y-5 py-30px border-t border-border-color-12"
                                    >
                                        <div class="flex-shrink-0">
                                            <img
                                                src="assets/img/testimonial/4.jpg"
                                                alt=""
                                                class="w-20 h-20 md:w-100px md:h-100px rounded-100%"
                                            >
                                        </div>
                                        <div class="relative">
                                            <h4
                                                class="text-lg text-heading-color font-semibold mb-5px"
                                            >
                                                <a href="#" class="leading-1.3">Arnold Jack</a>
                                            </h4>
                                            <h6
                                                class="text-13px text-secondary-color font-bold mb-10px"
                                            >
                                                <span class="leading-1.3">20th May 2024</span>
                                            </h6>

                                            <p class="text-sm mb-5 md:mb-0">
                            <span class="leading-1.8"
                            >Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit. Doloribus, omnis fugit corporis
                              iste magnam ratione.</span
                            >
                                            </p>
                                            <p
                                                class="text-xs md:text-sm font-bold h-10 px-25px border-2 border-border-color-11 hover:border-secondary-color transition-all duration-300 text-nowrap md:absolute md:top-0 md:right-0 rounded-[25px] box-border md:box-border inline-block"
                                            >
                            <span class="leading-9 md:leading-9"
                            ><i class="icon-reply-1 mr-1"></i> Reply</span
                            >
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr
                                class="my-50px border-b border-border-color-12 opacity-25"
                            >

                            <!-- Post Comment -->
                            <div>
                                <h4
                                    class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px"
                                >
                                    Post Comment
                                </h4>

                                <form
                                    class="form-primary bg-white-5 shadow-box-shadow-2 px-25px pt-10 pb-50px md:p-50px md:pt-10"
                                >
                                    <div class="grid gap-30px mb-35px">
                                        <!-- message -->
                                        <div class="relative mb-2">
                          <textarea


                              placeholder="Type your comments...."
                              class="min-h-[150px] text-paragraph-color bg-white pl-5 pr-50px py-15px outline-none border-2 focus:border-0 border-white-5 h-65px block w-full rounded-none transition-none"
                          ></textarea>
                                            <span
                                                class="absolute top-[30px] -translate-y-1/2 right-4"
                                            >
                            <i
                                class="fas fa-pencil text-sm lg:text-base text-secondary-color font-bold"
                            ></i>
                          </span>
                                        </div>
                                        <!-- name -->
                                        <div class="relative">
                                            <input
                                                type="text"
                                                placeholder="Type your name...."
                                                class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none"
                                            >
                                            <span
                                                class="absolute top-1/2 -translate-y-1/2 right-4"
                                            >
                            <i
                                class="fas fa-user text-sm lg:text-base text-secondary-color font-bold"
                            ></i>
                          </span>
                                        </div>
                                        <!-- email -->
                                        <div class="relative">
                                            <input
                                                type="text"
                                                placeholder="Type your email...."
                                                class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none"
                                            >
                                            <span
                                                class="absolute top-1/2 -translate-y-1/2 right-4"
                                            >
                            <i
                                class="fas fa-envelope text-sm lg:text-base text-secondary-color font-bold"
                            ></i>
                          </span>
                                        </div>

                                        <!-- website -->
                                        <div class="relative">
                                            <input
                                                type="text"
                                                placeholder="Type your website...."
                                                class="text-paragraph-color pl-5 pr-50px outline-none border-2 focus:border-0 bg-white border-white-5 h-65px block w-full rounded-none transition-none"
                                            >
                                            <span
                                                class="absolute top-1/2 -translate-y-1/2 right-4"
                                            >
                            <i
                                class="fas fa-globe text-sm lg:text-base text-secondary-color font-bold"
                            ></i>
                          </span>
                                        </div>
                                    </div>
                                    <!-- agree -->
                                    <div class="text-sm mb-35px">
                                        <input
                                            type="checkbox"
                                            id="agree"
                                            class="float-left clear-both mt-0.5"
                                        >
                                        <label for="agree" class="text-sm ml-1">
                                            Save my name, email, and website in this browser for
                                            the next time I comment.
                                        </label>
                                    </div>

                                    <!-- submit button -->

                                    <div>
                                        <h5
                                            class="uppercase text-sm md:text-base text-white relative group whitespace-nowrap font-normal mb-0 transition-all duration-300 border border-secondary-color hover:border-heading-color inline-block z-0"
                                        >
                          <span
                              class="inline-block absolute top-0 right-0 w-full h-full bg-secondary-color group-hover:bg-black -z-1 group-hover:w-0 transition-all duration-300"
                          ></span>
                                            <button
                                                type="submit"
                                                class="relative z-1 px-5 md:px-25px lg:px-10 py-10px md:py-15px lg:py-17px group-hover:text-heading-color leading-23px uppercase"
                                            >
                                                <i class="far fa-comments"></i> Post Comment
                                            </button>
                                        </h5>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- sidebar -->
                <div class="lg:col-start-9 lg:col-span-4 pt-100px lg:pt-0">
                    <!-- author details -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <div class="flex flex-col items-center text-center">
                            <div class="mb-25px">
                                <img
                                    src="assets/img/team/4.jpg"
                                    alt=""
                                    class="w-140px h-140px rounded-100%"
                                >
                            </div>
                            <h4 class="mb-15px lg:text-lg text-heading-color font-bold">
                    <span class="leading-1.3 lg:leading-1.3"
                    >Rosalina D. Willaimson</span
                    >
                            </h4>
                            <p class="text-[12.25px] lg:text-sm">
                                <span class="lg:leading-1 8"> Traveller/Photographer </span>
                            </p>
                            <div>
                                <ul class="text-xs text-ratings flex items-center mb-10px">
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="#"><i class="far fa-star"></i></a>
                                    </li>
                                    <li class="pt-2"><a href="#"> ( 1 Reviews )</a></li>
                                </ul>
                            </div>
                            <p class="text-sm mb-22px hyphens-none">
                    <span class="leading-1.8"
                    >Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                      Veritatis distinctio, odio, eligendi suscipit
                      reprehenderit atque.</span
                    >
                            </p>
                            <ul
                                class="text-sm lg:text-base flex gap-18px justify-center items-center text-color-1"
                            >
                                <li class="leading-1.8 lg:leading-1.8">
                                    <a href="https://www.facebook.com/"
                                    ><i class="fab fa-facebook-f"></i
                                        ></a>
                                </li>
                                <li class="leading-1.8 lg:leading-1.8">
                                    <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="leading-1.8 lg:leading-1.8">
                                    <a href="https://www.linkedin.com/"
                                    ><i class="fab fa-linkedin"></i
                                        ></a>
                                </li>
                                <li class="leading-1.8 lg:leading-1.8">
                                    <a href="https://www.youtube.com/"
                                    ><i class="fab fa-youtube"></i
                                        ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Search Objects -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Search Objects</span
                  >
                        </h4>
                        <form>
                            <div class="flex items-center">
                                <input
                                    type="text"
                                    placeholder="Search your keyword..."
                                    class="flex-grow text-paragraph-color text-sm font-semibold bg-section-bg-1 px-5 outline-none border-2 border-r-0 border-border-color-9 focus:border focus:border-secondary-color h-60px placeholder:text-heading-color block rounded-none"
                                >
                                <button
                                    type="submit"
                                    class="flex-shrink-0 text-sm lg:text-base h-60px w-14 flex items-center justify-center text-white bg-secondary-color hover:bg-primary-color"
                                >
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Top Rated Product -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Top Rated Product</span
                  >
                        </h4>
                        <ul>
                            <li class="pb-25px mb-25px border-b border-white-4">
                                <div class="flex gap-x-15px xl:gap-x-5">
                                    <div class="w-70px xl:w-90px flex-shrink-0">
                                        <a href="product-details.html"
                                        ><img src="assets/img/product/1.png" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <ul
                                            class="text-10px text-ratings flex items-center mb-5px leading-1"
                                        >
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                        </ul>

                                        <h6 class="text-sm font-medium mb-1">
                                            <a href="product-details.html" class="leading-1.3"
                                            >Luxury House In Greenville</a
                                            >
                                        </h6>
                                        <p class="text-sm font-bold text-secondary-color">
                                            <span class="leading-1.8">$30,000.00 </span>
                                            <del class="text-11px opacity-60 ml-1"
                                            >$35,000.00</del
                                            >
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="pb-25px mb-25px border-b border-white-4">
                                <div class="flex gap-x-15px xl:gap-x-5">
                                    <div class="w-70px xl:w-90px flex-shrink-0">
                                        <a href="product-details.html"
                                        ><img src="assets/img/product/2.png" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <ul
                                            class="text-10px text-ratings flex items-center mb-5px leading-1"
                                        >
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                        </ul>

                                        <h6 class="text-sm font-medium mb-1">
                                            <a href="product-details.html" class="leading-1.3"
                                            >Apartment with Subunits</a
                                            >
                                        </h6>
                                        <p class="text-sm font-bold text-secondary-color">
                                            <span class="leading-1.8">$30,000.00 </span>
                                            <del class="text-11px opacity-60 ml-1"
                                            >$35,000.00</del
                                            >
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-x-15px xl:gap-x-5">
                                    <div class="w-70px xl:w-90px flex-shrink-0">
                                        <a href="product-details.html"
                                        ><img src="assets/img/product/3.png" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <ul
                                            class="text-10px text-ratings flex items-center mb-5px leading-1"
                                        >
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-star-half-alt"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="far fa-star"></i></a>
                                            </li>
                                        </ul>

                                        <h6 class="text-sm font-medium mb-1">
                                            <a href="product-details.html" class="leading-1.3"
                                            >3 Rooms Manhattan</a
                                            >
                                        </h6>
                                        <p class="text-sm font-bold text-secondary-color">
                                            <span class="leading-1.8">$30,000.00 </span>
                                            <del class="text-11px opacity-60 ml-1"
                                            >$35,000.00</del
                                            >
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Top Categories-->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Top Categories</span
                  >
                        </h4>
                        <ul>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Apartments</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(26)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Picture Stodio</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(30)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Office</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(71)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Luxary Vilas</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(56)
                      </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="text-sm font-bold flex justify-between items-center group mt-15px"
                                >
                                    <span class="leading-1.8">Duplex House</span>
                                    <span class="leading-1.8 group-hover:text-paragraph-color"
                                    >(60)
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Popular Properties-->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Popular Properties</span
                  >
                        </h4>

                        <div
                            class="news-slider-container swiper-container relative -mx-15px"
                        >
                            <!-- apartment cards  -->
                            <div class="swiper popular-properties-slider static">
                                <div class="swiper-wrapper">
                                    <!-- card 1 -->
                                    <div class="swiper-slide mb-50px cursor-default">
                                        <div class="apart-card px-15px">
                                            <div
                                                class="group border border-border-color-13 shadow-box-shadow-4"
                                            >
                                                <!-- card thumbs -->
                                                <div class="relative leading-1">
                                                    <a
                                                        href="product-details.html"
                                                        class="overflow-hidden"
                                                    >
                                                        <img
                                                            src="assets/img/product-3/6.jpg"
                                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                                            alt=""
                                                        >
                                                    </a>

                                                    <div
                                                        class="absolute top-10 lg:top-5 right-[30px]"
                                                    >
                                                        <a
                                                            href="team-details.html"
                                                            class="w-50px h-50px"
                                                        ><img
                                                                src="assets/img/blog/author.jpg"
                                                                alt=""
                                                                class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                            ></a>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="p-25px">
                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold mb-5px"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                    <h4
                                                        class="text-base font-semibold text-heading-color mb-15px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="hover:text-secondary-color leading-1.3"
                                                        >New Apartment Nice View</a
                                                        >
                                                    </h4>

                                                    <div class="text-xs">
                                                        <a
                                                            href="locations.html"
                                                            class="hover:text-secondary-color"
                                                        ><i
                                                                class="flaticon-pin text-secondary-color mr-0.5"
                                                            ></i>
                                                            Belmont Gardens, Chicago</a
                                                        >
                                                    </div>

                                                    <ul class="flex flex-wrap gap-15px pt-4">
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3 <span class="font-normal">Bed</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                2 <span class="font-normal">Bath</span>
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3450
                                                                <span class="font-normal">Square Ft</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card 2 -->
                                    <div class="swiper-slide mb-50px cursor-default">
                                        <div class="apart-card px-15px">
                                            <div
                                                class="group border border-border-color-13 shadow-box-shadow-4"
                                            >
                                                <!-- card thumbs -->
                                                <div class="relative leading-1">
                                                    <a
                                                        href="product-details.html"
                                                        class="overflow-hidden"
                                                    >
                                                        <img
                                                            src="assets/img/product-3/4.jpg"
                                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                                            alt=""
                                                        >
                                                    </a>

                                                    <div
                                                        class="absolute top-10 lg:top-5 right-[30px]"
                                                    >
                                                        <a
                                                            href="team-details.html"
                                                            class="w-50px h-50px"
                                                        ><img
                                                                src="assets/img/blog/author.jpg"
                                                                alt=""
                                                                class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                            ></a>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="p-25px">
                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold mb-5px"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                    <h4
                                                        class="text-base font-semibold text-heading-color mb-15px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="hover:text-secondary-color leading-1.3"
                                                        >New Apartment Nice View</a
                                                        >
                                                    </h4>

                                                    <div class="text-xs">
                                                        <a
                                                            href="locations.html"
                                                            class="hover:text-secondary-color"
                                                        ><i
                                                                class="flaticon-pin text-secondary-color mr-0.5"
                                                            ></i>
                                                            Belmont Gardens, Chicago</a
                                                        >
                                                    </div>

                                                    <ul class="flex flex-wrap gap-15px pt-4">
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3 <span class="font-normal">Bed</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                2 <span class="font-normal">Bath</span>
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3450
                                                                <span class="font-normal">Square Ft</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card 3 -->
                                    <div class="swiper-slide mb-50px cursor-default">
                                        <div class="apart-card px-15px">
                                            <div
                                                class="group border border-border-color-13 shadow-box-shadow-4"
                                            >
                                                <!-- card thumbs -->
                                                <div class="relative leading-1">
                                                    <a
                                                        href="product-details.html"
                                                        class="overflow-hidden"
                                                    >
                                                        <img
                                                            src="assets/img/product-3/5.jpg"
                                                            class="w-full group-hover:scale-110 transition-all duration-700"
                                                            alt=""
                                                        >
                                                    </a>

                                                    <div
                                                        class="absolute top-10 lg:top-5 right-[30px]"
                                                    >
                                                        <a
                                                            href="team-details.html"
                                                            class="w-50px h-50px"
                                                        ><img
                                                                src="assets/img/blog/author.jpg"
                                                                alt=""
                                                                class="w-full h-full rounded-100% group-hover:scale-110 border-3px border-border-color-1 transition-all duration-300"
                                                            ></a>
                                                    </div>
                                                </div>
                                                <!-- card body -->
                                                <div class="p-25px">
                                                    <h5
                                                        class="text-lg text-secondary-color font-semibold mb-5px"
                                                    >
                                                        <span class="leading-1.8">$34,900</span>
                                                        <label class="text-sm font-normal"
                                                        >/Month</label
                                                        >
                                                    </h5>
                                                    <h4
                                                        class="text-base font-semibold text-heading-color mb-15px"
                                                    >
                                                        <a
                                                            href="product-details.html"
                                                            class="hover:text-secondary-color leading-1.3"
                                                        >New Apartment Nice View</a
                                                        >
                                                    </h4>

                                                    <div class="text-xs">
                                                        <a
                                                            href="locations.html"
                                                            class="hover:text-secondary-color"
                                                        ><i
                                                                class="flaticon-pin text-secondary-color mr-0.5"
                                                            ></i>
                                                            Belmont Gardens, Chicago</a
                                                        >
                                                    </div>

                                                    <ul class="flex flex-wrap gap-15px pt-4">
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3 <span class="font-normal">Bed</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                2 <span class="font-normal">Bath</span>
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <p class="leading-1.8 font-bold text-xs">
                                                                3450
                                                                <span class="font-normal">Square Ft</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- pagination -->
                                <div
                                    class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal !-bottom-[6px] block"
                                >
                      <span
                          class="swiper-pagination-bullet"
                          tabindex="0"
                          role="button"
                          aria-label="Go to slide 1"
                      ></span
                      ><span
                                        class="swiper-pagination-bullet swiper-pagination-bullet-active"
                                        tabindex="0"
                                        role="button"
                                        aria-label="Go to slide 2"
                                        aria-current="true"
                                    ></span
                                    ><span
                                        class="swiper-pagination-bullet"
                                        tabindex="0"
                                        role="button"
                                        aria-label="Go to slide 3"
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Leatest Blogs -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Leatest Blogs</span
                  >
                        </h4>
                        <ul>
                            <li class="pb-5 mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/5.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pb-5 mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/6.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pb-5 mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/7.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-x-5">
                                    <div class="w-20 flex-shrink-0">
                                        <a href="blog-details.html"
                                        ><img src="assets/img/team/8.jpg" alt=""
                                            ></a>
                                    </div>

                                    <div>
                                        <h6 class="text-sm font-medium mb-5px">
                                            <a href="blog-details.html" class="leading-1.3"
                                            >Lorem ipsum dolor sit cing elit, sed do.</a
                                            >
                                        </h6>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Twitter Feeds -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Twitter Feeds</span
                  >
                        </h4>

                        <ul class="text-sm lg:text-base">
                            <li class="pb-30px mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="flex-shrink-0">
                                        <a
                                            href="blog-details.html"
                                            class="leading-1.8 lg:leading-11.8 text-secondary-color"
                                        >
                                            <i class="fab fa-twitter"></i
                                            ></a>
                                    </div>

                                    <div>
                                        <div class="mb-2">
                                            <p class="leading-1.3 lg:leading-1.3">
                                                Carsafe - #Gutenberg ready @wordpress Theme for Car
                                                Service, Auto Parts, Car Dealer available on <br >
                                                @website
                                            </p>
                                            <a
                                                href="blog-details.html"
                                                class="leading-1.3 lg:leading-1.3 text-secondary-color"
                                            >https://website.net</a
                                            >
                                        </div>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pb-30px mb-30px border-b border-border-color-1">
                                <div class="flex gap-x-5">
                                    <div class="flex-shrink-0">
                                        <a
                                            href="blog-details.html"
                                            class="leading-1.8 lg:leading-11.8 text-secondary-color"
                                        >
                                            <i class="fab fa-twitter"></i
                                            ></a>
                                    </div>

                                    <div>
                                        <div class="mb-2">
                                            <p class="leading-1.3 lg:leading-1.3">
                                                Carsafe - #Gutenberg ready @wordpress Theme for Car
                                                Service, Auto Parts, Car Dealer available on <br >
                                                @website
                                            </p>
                                            <a
                                                href="blog-details.html"
                                                class="leading-1.3 lg:leading-1.3 text-secondary-color"
                                            >https://website.net</a
                                            >
                                        </div>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-x-5">
                                    <div class="flex-shrink-0">
                                        <a
                                            href="blog-details.html"
                                            class="leading-1.8 lg:leading-11.8 text-secondary-color"
                                        >
                                            <i class="fab fa-twitter"></i
                                            ></a>
                                    </div>

                                    <div>
                                        <div class="mb-2">
                                            <p class="leading-1.3 lg:leading-1.3">
                                                Carsafe - #Gutenberg ready @wordpress Theme for Car
                                                Service, Auto Parts, Car Dealer available on <br >
                                                @website
                                            </p>
                                            <a
                                                href="blog-details.html"
                                                class="leading-1.3 lg:leading-1.3 text-secondary-color"
                                            >https://website.net</a
                                            >
                                        </div>
                                        <div
                                            class="text-xs md:text-sm font-semibold text-secondary-color"
                                        >
                                            <a href="#" class="leading-1.8 md:leading-1.8"
                                            ><i class="far fa-calendar-alt"></i> June 22,
                                                2024</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Follow Us -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-25px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Follow Us</span
                  >
                        </h4>
                        <ul class="flex gap-x-15px pt-4">
                            <li>
                                <a
                                    href="https://www.facebook.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-facebook-f"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="https://x.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-twitter"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="https://www.linkedin.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-linkedin"></i
                                    ></a>
                            </li>
                            <li>
                                <a
                                    href="https://www.instagram.com/"
                                    class="text-sm lg:text-base w-10 h-10 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center"
                                ><i class="fab fa-instagram"></i
                                    ></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Popular Tags -->
                    <div
                        class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px border-2 border-border-color-11"
                    >
                        <h4 class="text-lg font-semibold text-heading-color mb-30px">
                  <span
                      class="leading-1.3 pl-10px border-l-2 border-secondary-color"
                  >Popular Tags</span
                  >
                        </h4>
                        <ul class="flex gap-10px flex-wrap items-center font-poppins">
                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >POPULAR
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    DESGIN
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >UX
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    USABILITY
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    DEVELOP
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    ICON
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >CAR
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    SERVICE
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    REPAIRS
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >
                                    AUTO PARTS
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >OIL
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >DEALER
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >OIL CHANGE
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                                >BODY COLOR
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
