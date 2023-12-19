<!-- footer -->
<footer class="bg-slate-900  border-t border-gray-100">
    <div class="bg-white mb-4 cpy-60">
        <div class="container px-4 mx-auto">
            <div class="custom-flex">
                <!-- Logo Image -->
                <div class="footer-image">
                    <img src="{{ url('images/panner-logo.jpg') }}" class="h-8 mr-3" alt="Faleh Logo" />
                </div>

                <!-- Text Description -->
                <div class="footer-paragraph mr-2">
                    <p class="text-gray-500">
                        {{ __('front.footer.description') }}
                    </p>
                </div>

            </div>
        </div>
    </div>


    <div class="container px-4 mx-auto grid grid-cols-1 ">
        <div class="col-span-2 grid grid-cols-2 gap-4">
            <div class="grid grid-cols-2 gap-4 md:gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider">
                        {{ __('front.footer.app') }}
                    </h3>
                    <div class="mt-4 space-y-4">
                        <a href="{{ route('home') }}" class="text-base text-gray-500 hover:text-white block">
                            {{ __('front.home') }}
                        </a>
                        <a href="{{ route('categories') }}" class="text-base text-gray-500 hover:text-white block">
                            {{ __('front.categories') }}
                        </a>
                        <a href="{{ route('items') }}" class="text-base text-gray-500 hover:text-white block">
                            {{ __('front.footer.items') }}
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider">
                        {{ __('front.footer.company') }}
                    </h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-white block">
                            {{ __('front.footer.about') }}
                        </a>
                        <a href="{{ route('blogs') }}" class="text-base text-gray-500 hover:text-white block">
                            {{ __('front.footer.blog') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider">
                        {{ __('front.footer.pages') }}
                    </h3>
                    <div class="mt-4 space-y-4">
                        @foreach (App\Models\Post::where('post_type', 'page')->get() as $page)
                            <a href="{{ route('new-page', $page->slug) }}"
                                class="text-base text-gray-500 hover:text-white block">{{ $page->title }}</a>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider">
                        {{ __('front.footer.follow_us') }}
                    </h3>
                    <div class="flex items-center mt-4 text-lg no-underline text-white">
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
                    <div class="flex items-center content-center mt-4 text-lg no-underline">
                        <a class="pl-4" href="https://www.facebook.com/Falehplatform">
                            <img class="max-h-24" src="{{ url('images/get_on_apple_store_white.png') }}"/>
                        </a>
                        <a class="pl-4" href="https://www.facebook.com/Falehplatform">
                            <img class="max-h-24" src="{{ url('images/get_on_google_play_white.png') }}"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ./footer -->
