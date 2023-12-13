<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('filament-panels::layout.direction') ?? 'ltr' }}"
    class="antialiased filament js-focus-visible">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">

    <!-- Seo Tags -->
    <x-seo::meta />
    <!-- Seo Tags -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=KoHo:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,600;1,700&display=swap"
        rel="stylesheet">

    @livewireStyles
    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <style>
        [x-cloak] {
            display: none !important;
        }

        .slider-container {
            position: relative;
            overflow: hidden;
            width: 75%;
            margin-right: 2%;
        }

        .slider-track {
            display: flex;
            transition: transform 0.3s ease-in-out;
        }

        .slider-item {
            flex: 0 0 100%;
        }

        .slider-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            font-size: 2rem;
            color: #fff;
            padding: 8px;
            border-radius: 50%;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s ease-in-out;
        }

        .slider-arrow:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .slider-arrow i {
            margin: 0;
        }

        .slider-prev {
            left: 0;
        }

        .slider-next {
            right: 0;
        }

        .ad-box {
            margin-top: 20px; /* Adjust the margin as needed */
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-white font-family-karla">
    <livewire:shared.header-section />

    {{ $slot }}

    <livewire:shared.footer-section />

    @stack('scripts')
    @livewireScripts


    @livewire('notifications')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        const theme = localStorage.getItem('theme')

        if ((theme === 'dark') || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        }

        var searchInput = document.getElementById("search-navbar");
        searchInput.addEventListener("keyup", (event) => {
        if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            window.location.href = `/search/items/${searchInput.value}`;
            }
        })

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        // JavaScript to handle slider movement
        let currentIndex = 0;
        const sliderTrack = document.getElementById('sliderTrack');
        const slides = document.querySelectorAll('.slider-item');

        function moveSlider(index) {
            const translateValue = `-${index * 100}%`;
            sliderTrack.style.transform = `translateX(${translateValue})`;
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            moveSlider(currentIndex);
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            moveSlider(currentIndex);
        }
    </script>

</body>

</html>
