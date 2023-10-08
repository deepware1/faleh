<!-- footer -->
<footer class="bg-white pt-16 pb-12 border-t border-gray-100">
    <div class="container mx-auto grid grid-cols-1 ">
        <div class="col-span-1 space-y-4">
            <div class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" alt="logo" class="w-30">
                <h2 class="ml-2 text-xl font-bold">Faleh</h2>
            </div>
            <div class="mr-2">
                <p class="text-gray-500">
                    This is a small description about faleh.
                </p>
            </div>
        </div>

        <div class="col-span-2 grid grid-cols-2 gap-4">
            <div class="grid grid-cols-2 gap-4 md:gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Compay</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">About</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Terms & Conditions</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Blog</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                        <!-- <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a> -->
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                    <div class="mt-4 space-y-4">
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analitycs</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Pages</h3>
                    <div class="mt-4 space-y-4">
                        @foreach (App\Models\Post::where('post_type', 'page')->get() as $page)
                            <a href="#"
                                class="text-base text-gray-500 hover:text-gray-900 block">{{ $page->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ./footer -->
