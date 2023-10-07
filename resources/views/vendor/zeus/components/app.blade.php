<x-layouts.app>
    @if (isset($header) || isset($breadcrumbs))
        <div class="bg-gray-100 dark:bg-gray-800">
            <div class="container mx-auto py-2 px-3">

                @if (isset($header))
                    <div class=" font-semibold text-xl text-gray-600 dark:text-gray-100">
                        {{ $header }}
                    </div>
                @endif

                @if (isset($breadcrumbs))
                    <nav class="text-gray-400 font-bold my-2" aria-label="Breadcrumb">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center">
                                <a href="{{ url('/') }}">{{ __('Blog') }}</a>
                                @svg('heroicon-m-arrow-small-right', 'fill-current w-4 h-4 mx-3 rtl:rotate-180')
                            </li>
                            {{ $breadcrumbs }}
                        </ol>
                    </nav>
                @endif

            </div>
        </div>
    @endif

    <div class="container mx-auto my-1">
        {{ $slot }}
    </div>
</x-layouts.app>
