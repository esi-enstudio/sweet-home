<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Quarter - Real Estate HTML Template</title>
    <link
        rel="shortcut icon"
        href="{{ asset('assets/img/favicon.png') }}"
        type="image/x-icon"
    >
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons.css') }}" >
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" >
</head>
<body>

<!-- main body start -->
<main>
    <!-- 404 section -->
    <section>
        <div class="container py-30">
            <div class="mb-30px">
                <img
                    src="{{ asset('assets/img/others/error-1.png') }}"
                    alt=""
                    class="max-w-full"
                >
            </div>
            <div class="text-center">
                <h4 class="text-xl lg:text-3xl xl:text-6xl font-bold text-heading-color mb-15px">
                    <span class="leading-1.3 md:leading-1.3 lg:leading-1.3 xl:leading-1.3">Page Not Found!</span>
                </h4>

                <p class="text-sm lg:text-base">
                    <span class="leading-1.8 lg:leading-1.8">Oops! The page you are looking for does not exist. It might have been moved or deleted.</span>
                </p>

                <div class="mt-50px">
                    <h5 class="capitalize inline-block text-sm md:text-base text-primary-color hover:text-white hover:bg-secondary-color relative group whitespace-nowrap font-normal transition-all duration-300 shadow-box-shadow-3">
                        <a
                            href="{{ route('home') }}"
                            class="relative z-10 px-5 md:px-25px lg:px-10 py-10px md:py-3 lg:py-17px group-hover:text-white leading-23px">
                            <i class="fas fa-long-arrow-alt-left"></i> BACK TO HOME</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>
</main>

</body>
</html>
