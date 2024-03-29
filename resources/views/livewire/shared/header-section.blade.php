<div>
    <nav class="w-full py-1 bg-lime-600 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <nav>
                <div class="flex items-center md:order-2">
                    @if (app()->getLocale() == 'ar')
                        <button type="button" data-dropdown-toggle="language-dropdown-menu"
                                class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-white dark:text-white rounded-lg cursor-pointe dark:hover:text-white">
                            <img class="w-5 h-5 ml-2 rounded-full" src="{{ url('images/flags/egypt.svg') }}">
                            عربي
                        </button>
                    @else
                        <button type="button" data-dropdown-toggle="language-dropdown-menu"
                                class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-white dark:text-white rounded-lg cursor-pointe dark:hover:text-white">
                            <img class="w-5 h-5 mr-2 rounded-full" src="{{ url('images/flags/english-us.svg') }}">
                            English
                        </button>
                    @endif
                    <!-- Dropdown -->
                    <div
                        class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                        id="language-dropdown-menu">
                        <ul class="py-2 font-medium" role="none">
                            @if (app()->getLocale() == 'ar')
                                <li>
                                    <a href="{{ route('locale', 'en') }}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                        <div class="inline-flex items-center">
                                            <img class="h-3.5 w-3.5 rounded-full ml-2"
                                                 src="{{ url('images/flags/english-us.svg') }}">
                                            English
                                        </div>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('locale', 'ar') }}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                       role="menuitem">
                                        <div class="inline-flex items-center">
                                            <img class="h-3.5 w-3.5 rounded-full mr-2"
                                                 src="{{ url('images/flags/egypt.svg') }}">
                                            عربى
                                        </div>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="flex items-center text-lg no-underline text-white">
                <a class="pl-4" href="https://www.facebook.com/Falehplatform">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-4" href="https://www.instagram.com/Falehplatform">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-4" href="https://twitter.com/Falehplatform">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-4" href="https://www.tiktok.com/falehplatform/">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a class="pl-4" href="https://www.youtube.com/channel/Falehplatform">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </nav>

    <nav class="bg-white border-gray-200 dark:bg-gray-900 relative">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ url('images/panner-logo.jpg') }}" class="h-8 mr-3" alt="Faleh Logo"/>
            </a>
            <div class="flex md:order-2">
                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>

                    <input type="text" id="search-navbar"
                           class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"
                           placeholder="{{ __('front.search') }}...">
                </div>
                @if ($user)
                    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                            class="flex mx-3 text-sm w-8 h-8 bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                             src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar"
                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ $user->name }}</div>
                            <div class="font-medium truncate">{{ $user->email }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="{{ route('user.profile') }}"
                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{ __('front.profile') }}
                                </a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <form class="space-y-4 md:space-y-6" wire:submit.prevent="logoutUser">
                                <button type="submit"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    {{ __('front.signout') }}</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="ml-2 text-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
                        {{ __('front.login') }}
                    </a>
                @endif
                <a href="{{ route('item.create') }}"
                   class="ml-2 text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
                    {{ __('front.submit_ad') }}
                </a>
                <button data-collapse-toggle="navbar-search" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="search-navbar"
                           class="block w-full p-2 pl-10 text-sm searchtext-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"
                           placeholder="{{ __('front.search') }}...">
                </div>
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('home') }}"
                           class="block py-2 pl-3 pr-4 rtl:ml-7 text-white bg-lime-700 rounded md:bg-transparent md:text-lime-700 md:p-0 md:dark:text-lime-500"
                           aria-current="page">{{ __('front.home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('categories') }}"
                           class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-700 md:p-0 md:dark:hover:text-lime-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('front.categories') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}"
                           class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-700 md:p-0 md:dark:hover:text-lime-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('front.blog') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.us') }}"
                           class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-700 md:p-0 md:dark:hover:text-lime-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('front.contact') }}
                        </a>
                    </li>
                    <li>
                        <a title="{{ __('front.weather') }}" href="{{ route('weather') }}"
                           class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-700 md:p-0 md:dark:hover:text-lime-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <i class="fas fa-cloud-sun" style="font-size: 25px;"></i>
                        </a>
                    </li>

                    <li>
                        <a title="{{ __('front.story') }}" href=""
                           class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-700 md:p-0 md:dark:hover:text-lime-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <i data-tooltip-style="قصة وحكاية" class="fa-solid fa-chalkboard-user" style="font-size: 25px;"></i>
                        </a>
                    </li>

                    <li>
                        <a title="{{ __('front.agri_information') }}" href="{{ route('weather') }}"
                           class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-lime-700 md:p-0 md:dark:hover:text-lime-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            <i class="fa-solid fa-circle-info" style="font-size: 25px;"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="bg-slate-100 dark:bg-slate-700 shadow-md relative">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 ltr:mr-6 rtl:ml-6 text-sm">
                    @foreach ($categories as $category)
                        <li class="rtl:ml-8 ltr:mr-8">
                            <a href="{{ route('subcategories', $category->slug) }}"
                               class="text-gray-900 dark:text-white hover:underline">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    @if (Route::is('home'))
        <header>
            <!-- Container for Slider and Ad Boxes -->

            <div class="grid grid-cols-4 gap-4 mt-4 overflow-hidden px-4">
                <!-- First column (1/4 width) -->
                <div class="col-span-1">
                    <div class="mb-4">
                        <img src="https://i.pinimg.com/736x/37/14/d9/3714d9c7f52d0d0e7e173ab1eb87d9ba.jpg" alt="Ad 1"
                             class="w-full h-[350px] rounded-3xl" height="350" style="height: 350px">
                        <!-- Your Ad Content for Box 1 -->
                    </div>
                    <!-- Ad Box 1 -->

                    <!-- Ad Box 2 -->
                    <div class="mb-4">
                        <img src="https://i.pinimg.com/736x/37/14/d9/3714d9c7f52d0d0e7e173ab1eb87d9ba.jpg" alt="Ad 2"
                             class="w-full h-[22em] rounded-3xl" height="350" style="350px">
                        <!-- Your Ad Content for Box 2 -->
                    </div>
                </div>

                <!-- Second column (3/4 width) -->
                <div class="col-span-3 grid grid-row-2 gap-4">
<div class="row-span-1 overflow-hidden" style="height: 450px">
                    <div id="my-keen-slider" class="keen-slider overflow-hidden rounded-3xl" style="height: 450px">
                        <div class="keen-slider__slide"> <img src="https://i.pinimg.com/736x/37/14/d9/3714d9c7f52d0d0e7e173ab1eb87d9ba.jpg" alt="Ad 2"
                                                                            class="w-full h-350"></div>
                        <div class="keen-slider__slide"> <img src="https://i.pinimg.com/736x/37/14/d9/3714d9c7f52d0d0e7e173ab1eb87d9ba.jpg" alt="Ad 2"
                                                                            class="w-full h-350 "></div>
                        <div class="keen-slider__slide"> <img src="https://i.pinimg.com/736x/37/14/d9/3714d9c7f52d0d0e7e173ab1eb87d9ba.jpg" alt="Ad 2"
                                                                            class="w-full h-350 "></div>
                        <div class="keen-slider__slide"> <img src="https://i.pinimg.com/736x/37/14/d9/3714d9c7f52d0d0e7e173ab1eb87d9ba.jpg" alt="Ad 2"
                                                                            class="w-full h-350"></div>
                    </div>
</div>
                    <div class="mb-4 w-full row-span-1 ">
                        <img src="https://i.pinimg.com/736x/37/14/d9/3714d9c7f52d0d0e7e173ab1eb87d9ba.jpg" alt="Ad 2"
                             class="w-full h-350 rounded-3xl object-cover" style="height: 150px">
                        <!-- Your Ad Content for Box 2 -->
                    </div>
                </div>
            </div>
        </header>
        {{--        <header class="w-full mx-auto h-100 items-center overflow-hidden">--}}
        {{--        <img class="-z-50 object-cover w-full h-full" src="{{ url('images/slider.jpg') }}">--}}
        {{--    </header>--}}
    @endif
</div>
