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
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.5/keen-slider.min.css"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        .navigation-wrapper {
            position: relative;
        }

        .dots {
            display: flex;
            padding: 10px 0;
            justify-content: center;
            position: relative;
            top: -45px;
        }

        .dot {
            border: none;
            width: 10px;
            height: 10px;
            background: #c5c5c5;
            border-radius: 50%;
            margin: 0 5px;
            padding: 5px;
            cursor: pointer;
        }

        .dot:focus {
            outline: none;
        }

        .dot--active {
            background: #fff;
            width: 30px;
            border-radius: 4px;
        }

        .arrow {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            fill: #fff;
            cursor: pointer;
            background: #fff;
            padding: 5px;
            border-radius: 50%;
        }

        .arrow--left {
            background-size: 20px;
            background-repeat: no-repeat;
            background-position: center;
            left: 4px;
            fill: "#fff";
            background-image: url("data:image/svg+xml, %3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' %3E%3Cpath d='M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z' %3E%3C/path%3E%3C/svg%3E");
        }

        .arrow--right {
            background-size: 20px;
            background-repeat: no-repeat;
            background-position: center;
            left: auto;
            right: 4px;
            background-image: url("data:image/svg+xml, %3Csvg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' %3E%3Cpath d='M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z'%3E%3C/path%3E%3C/svg%3E");
        }

        .arrow--disabled.arrow--left {
            background-image: url("data:image/svg+xml, %3Csvg xmlns='http://www.w3.org/2000/svg' fill='grey' viewBox='0 0 24 24' %3E%3Cpath d='M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z' %3E%3C/path%3E%3C/svg%3E");
        }

        .arrow--disabled.arrow--right {
            background-image: url("data:image/svg+xml, %3Csvg xmlns='http://www.w3.org/2000/svg' fill='grey' viewBox='0 0 24 24' %3E%3Cpath d='M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z'%3E%3C/path%3E%3C/svg%3E");
        }

        .cpy-60{
            padding-top: 60px;
            padding-bottom: 60px;
        }

        .custom-flex{
            display: flex;
            align-items: center;
        }

        .footer-paragraph{
            font-size: 24px;
            width: 60%;
            margin-right: 25px;
        }

        .footer-image img{
            width:420px;
            height: 200px;
            border-radius: 5px;
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
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.8.5/keen-slider.min.js"></script>
    <script>
        function navigation(slider) {
            let wrapper, dots, arrowLeft, arrowRight

            function markup(remove) {
                wrapperMarkup(remove)
                dotMarkup(remove)
                arrowMarkup(remove)
            }

            function removeElement(elment) {
                elment.parentNode.removeChild(elment)
            }
            function createDiv(className) {
                var div = document.createElement("div")
                var classNames = className.split(" ")
                classNames.forEach((name) => div.classList.add(name))
                return div
            }

            function arrowMarkup(remove) {
                if (remove) {
                    removeElement(arrowLeft)
                    removeElement(arrowRight)
                    return
                }
                arrowLeft = createDiv("arrow arrow--left")
                arrowLeft.addEventListener("click", () => slider.prev())
                arrowRight = createDiv("arrow arrow--right")
                arrowRight.addEventListener("click", () => slider.next())

                wrapper.appendChild(arrowLeft)
                wrapper.appendChild(arrowRight)
            }

            function wrapperMarkup(remove) {
                if (remove) {
                    var parent = wrapper.parentNode
                    while (wrapper.firstChild)
                        parent.insertBefore(wrapper.firstChild, wrapper)
                    removeElement(wrapper)
                    return
                }
                wrapper = createDiv("navigation-wrapper")
                slider.container.parentNode.appendChild(wrapper)
                wrapper.appendChild(slider.container)
            }

            function dotMarkup(remove) {
                if (remove) {
                    removeElement(dots)
                    return
                }
                dots = createDiv("dots")
                slider.track.details.slides.forEach((_e, idx) => {
                    var dot = createDiv("dot")
                    dot.addEventListener("click", () => slider.moveToIdx(idx))
                    dots.appendChild(dot)
                })
                wrapper.appendChild(dots)
            }

            function updateClasses() {
                var slide = slider.track.details.rel
                slide === 0
                    ? arrowLeft.classList.add("arrow--disabled")
                    : arrowLeft.classList.remove("arrow--disabled")
                slide === slider.track.details.slides.length - 1
                    ? arrowRight.classList.add("arrow--disabled")
                    : arrowRight.classList.remove("arrow--disabled")
                Array.from(dots.children).forEach(function (dot, idx) {
                    idx === slide
                        ? dot.classList.add("dot--active")
                        : dot.classList.remove("dot--active")
                })
            }

            slider.on("created", () => {
                markup()
                updateClasses()
            })
            slider.on("optionsChanged", () => {
                console.log(2)
                markup(true)
                markup()
                updateClasses()
            })
            slider.on("slideChanged", () => {
                updateClasses()
            })
            slider.on("destroyed", () => {
                markup(true)
            })
        }

        var slider = new KeenSlider("#my-keen-slider", {}, [navigation])

    </script>
    <script>
        const theme = localStorage.getItem('theme')

{{--        if ((theme === 'dark') || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
{{--            document.documentElement.classList.add('dark')--}}
{{--        }--}}

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


</body>

</html>
