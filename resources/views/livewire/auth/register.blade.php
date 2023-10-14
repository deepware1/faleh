<section class="bg-gray-50 dark:bg-gray-900 py-16">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                @if (session()->has('message'))
                    <p class="mt-2 text-sm text-green-600 dark:text-green-500">
                        <span class="font-medium"></span>
                        {{ session('message') }}
                    </p>
                @endif
                @if (session()->has('error'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ session('error') }}</p>
                @endif
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    {{ __('front.register_page.title') }}
                </h1>
                <form class="space-y-4 md:space-y-6" wire:submit="registerStore">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('front.register_page.name') }}
                        </label>
                        <input type="name" name="name" id="name" wire:model="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-lime-600 focus:border-lime-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"
                            placeholder="Mohamed Ali" required="">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                                {{ $message }}</p></span>
                        @enderror

                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('front.register_page.email') }}
                        </label>
                        <input type="email" name="email" id="email" wire:model="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-lime-600 focus:border-lime-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"
                            placeholder="name@company.com" required="">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                                {{ $message }}</p></span>
                        @enderror

                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('front.register_page.password') }}
                        </label>
                        <input type="password" name="password" id="password" wire:model="password"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-lime-600 focus:border-lime-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"
                            required="">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                                {{ $message }}</p></span>
                        @enderror

                    </div>
                    <div>
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('front.register_page.confirm_password') }}
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            wire:model="password_confirmation" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-lime-600 focus:border-lime-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"
                            required="">
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                                {{ $message }}</p></span>
                        @enderror

                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-lime-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-lime-600 dark:ring-offset-gray-800"
                                required="">
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                                {{ __('front.register_page.i_accept') }}
                                <a class="font-medium text-lime-600 hover:underline dark:text-lime-500" href="#">
                                    {{ __('front.register_page.terms') }}
                                </a>
                            </label>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-lime-600 hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
                        {{ __('front.register_page.create_account') }}
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        {{ __('front.register_page.have_account') }}
                        <a href="{{ route('login') }}"
                            class="font-medium text-lime-600 hover:underline dark:text-lime-500">
                            {{ __('front.register_page.login_here') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
