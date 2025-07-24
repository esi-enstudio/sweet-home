<main>
    <!-- ব্যানার সেকশন -->
    <section>
        <!-- banner section -->
        <div
            style="background-image: url('{{ asset('assets/img/bg/14.jpg') }}')"
            class="w-full bg-no-repeat bg-cover bg-center relative z-0 after:w-full after:h-full after:absolute after:top-0 after:left-0 after:bg-white after:bg-opacity-30 after:-z-1">
            <div class="container py-110px">
                <h1 class="text-2xl sm:text-3xl md:text-26px lg:text-3xl xl:text-4xl font-bold text-heading-color mb-15px">
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">{{ $page->title }}</span>
                </h1>
                <ul class="breadcrumb flex gap-30px items-center text-sm lg:text-base font-bold pt-4">
                    <li class="home relative leading-1.8 lg:leading-1.8">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-home text-secondary-color"></i> Home
                        </a>
                    </li>
                    <li class="leading-1.8 lg:leading-1.8 text-heading-color">
                        {{ $page->title }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- টার্মস কন্টেন্ট সেকশন -->
    <section class="py-10">
        <div class="container">
            <div class="prose max-w-full lg:prose-lg">

                <p class="lead">সর্বশেষ আপডেট: {{ \Carbon\Carbon::parse($page->updated_at)->translatedFormat('d F, Y') }}</p>

                {!! $page->content !!}

            </div>
        </div>
    </section>
</main>
