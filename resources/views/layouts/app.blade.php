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
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons.css') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-thin-straight/css/uicons-thin-straight.css'>
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ui-widget.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>

<livewire:partials.header/>

{{ $slot }}

<livewire:partials.footer/>

<button
    class="scroll-up w-30px h-30px lg:w-10 lg:h-10 lg:text-xl bg-section-bg-1 text-heading-color hover:bg-secondary-color hover:text-white rotate-[45deg] shadow-box-shadow-3 fixed bottom-[50px] lg:bottom-[70px] right-[3%] flex justify-center items-center z-xl"
>
    <i class="fa fa-angle-up leading-1 -rotate-[45deg] inline-block"></i>
</button>


<script src="{{ asset('assets/js/stickyHeader.js') }}"></script>
<script src="{{ asset('assets/js/accordion.js') }}"></script>
<script src="{{ asset('assets/js/service.js') }}"></script>
<script src="{{ asset('assets/js/nice-select2.js') }}"></script>
<script src="{{ asset('assets/js/search.js') }}"></script>
<script src="{{ asset('assets/js/drawer.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/silder.js') }}"></script>
<script src="{{ asset('assets/js/counterup.js') }}"></script>
<script src="{{ asset('assets/js/modal.js') }}"></script>
<script src="{{ asset('assets/js/tabs.js') }}"></script>

<script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollUp.js') }}"></script>
<script src="{{ asset('assets/js/smoothScroll.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/filter.js') }}"></script>
<script src="{{ asset('assets/js/nice_checkbox.js') }}"></script>
<script src="{{ asset('assets/js/count.js') }}"></script>
<script src="{{ asset('assets/js/maplace.js') }}"></script>

<script src="{{ asset('assets/js/ui-widget.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
