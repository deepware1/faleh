<section class="container mx-auto py-16 font-poppins dark:bg-gray-800">
    <div class="px-4 mx-auto">
        <div class="flex flex-wrap mb-24 -mx-4">
            <div class="w-full px-4 mb-8 md:w-1/2 md:mb-0">
                <div class="sticky top-0 overflow-hidden ">
                    <div class="relative mb-6 lg:mb-10 ">

                        <img class="object-contain w-full lg:h-full" src="{{ $item->image() }}" alt="">

                    </div>

                </div>
            </div>
            <div class="w-full px-4 md:w-1/2">
                <div class="lg:pl-20">
                    <div class="mb-6 ">

                        <h2
                            class="max-w-xl mt-6 mb-6 text-xl font-semibold leading-loose tracking-wide text-gray-700 md:text-2xl dark:text-gray-300">
                            {{ $item->title }}
                        </h2>

                        <p class="inline-block text-2xl font-semibold text-gray-700 dark:text-gray-400 ">
                            <span>{{ $item->price }} {{ $item->currency->code }}</span>
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="mb-2 text-lg font-bold text-gray-700 dark:text-gray-400">Item Details :</h2>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-xl">
                            <div class="p-3 lg:p-5 ">
                                <div class="p-2 rounded-xl lg:p-6 dark:bg-gray-800 bg-gray-50">
                                    <div class="flex flex-wrap justify-center gap-x-10 gap-y-4">
                                        <div class="w-full mb-4 md:w-2/5">
                                            <div class="flex ">
                                                <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-diagram-3 w-7 h-7" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <div>
                                                    <p
                                                        class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Type
                                                    </p>
                                                    <h2
                                                        class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                        {{ $item->type }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mb-4 md:w-2/5">
                                            <div class="flex ">
                                                <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-gpu-card w-7 h-7" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z">
                                                        </path>
                                                        <path
                                                            d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5Zm5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0Z">
                                                        </path>
                                                        <path
                                                            d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5v-1Zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5Z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <div>
                                                    <p
                                                        class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Condition
                                                    </p>
                                                    <h2
                                                        class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                        {{ $item->condition }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mb-4 lg:mb-0 md:w-2/5">
                                            <div class="flex ">
                                                <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                    <svg width="30" height="30" viewBox="0 0 48 48"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="6" y="20" width="8" height="14" fill="none"
                                                            stroke="#333" stroke-width="1" stroke-linejoin="round" />
                                                        <rect x="20" y="14" width="8" height="26" fill="none"
                                                            stroke="#333" stroke-width="1" stroke-linejoin="round" />
                                                        <path d="M24 44V40" stroke="#333" stroke-width="1"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <rect x="34" y="12" width="8" height="9" fill="none"
                                                            stroke="#333" stroke-width="1" stroke-linejoin="round" />
                                                        <path d="M10 20V10" stroke="#333" stroke-width="1"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M38 34V21" stroke="#333" stroke-width="1"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M38 12V4" stroke="#333" stroke-width="1"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <div>
                                                    <p
                                                        class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Availability
                                                    </p>
                                                    <h2
                                                        class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                        {{ $item->stock == 'in_stock' ? 'In Stock' : 'Out Of Stock' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full mb-4 lg:mb-0 md:w-2/5">
                                            <div class="flex ">
                                                <span class="mr-3 text-gray-500 dark:text-gray-400">
                                                    <svg class="mr-2 block h-5 w-5 align-middle text-gray-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                            class=""></path>
                                                    </svg>
                                                </span>
                                                <div>
                                                    <p
                                                        class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        Location
                                                    </p>
                                                    <h2
                                                        class="text-base font-semibold text-gray-700 dark:text-gray-400">
                                                        {{ $item->country->name }} ,{{ $item->city->name }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6 mb-6 border-t border-b border-gray-200 dark:border-gray-700">
                        <h2 class="mb-2 text-lg font-bold text-gray-700 dark:text-gray-400">Description :</h2>

                        <span>{{ strip_tags($item->description) }}</span>
                    </div>
                    <div class="mb-6 "></div>
                    <div class="flex flex-wrap items-center mb-6">

                        <a href="#"
                            class="w-full px-4 py-3 text-center text-blue-600 bg-blue-100 border border-blue-600 dark:hover:bg-gray-900 dark:text-gray-400 dark:border-gray-700 dark:bg-gray-700 hover:bg-blue-600 hover:text-gray-100 lg:w-1/2 rounded-xl">
                            Promote
                        </a>

                    </div>
                    <div class="flex gap-4 mb-6">
                        <a href="#"
                            class="w-full px-4 py-3 text-center text-gray-100 bg-blue-600 border border-transparent dark:border-gray-700 hover:border-blue-500 hover:text-blue-700 hover:bg-blue-100 dark:text-gray-400 dark:bg-gray-700 dark:hover:bg-gray-900 rounded-xl">
                            Ask For Support Item</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
