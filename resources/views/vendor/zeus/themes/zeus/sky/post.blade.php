<div class="container mx-auto flex flex-wrap py-6">

    <x-slot name="breadcrumbs">
        <li class="flex items-center">
            <a href="{{ route('blogs') }}">{{ __('Posts') }}</a>
            @svg('iconpark-rightsmall-o', 'fill-current w-4 h-4 mx-3 rtl:rotate-180')
        </li>
        <li class="flex items-center">
            {{ $post->title }}
        </li>
    </x-slot>

    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ $post->image() }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-lime-700 text-sm font-bold uppercase pb-4">Article</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{ $post->title }}
                </a>
                <p href="#" class="text-sm pb-8">
                    By
                    <a href="#" class="font-semibold hover:text-gray-800">
                        {{ $post->author->name ?? '' }}
                    </a>,
                    Published on {{ optional($post->published_at)->toFormattedDateString() ?? '' }}
                </p>

                <div>
                    {!! $post->getContent() !!}
                </div>

                <div class="mt-4">

                    @unless ($post->tags->isEmpty())
                        @each($skyTheme . '.partial.category', $post->tags->where('type', 'category'), 'category')
                    @endunless
                </div>
            </div>
        </article>

        {{-- <div class="w-full flex pt-6">
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-lime-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                    Previous</p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-lime-800 font-bold flex items-center justify-end">Next <i
                        class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
        </div> --}}

        {{-- Author --}}
        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}"
                    class="rounded-full shadow h-32 w-32">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">{{ $post->author->name ?? '' }}</p>
                {{-- <p class="pt-2">{{ $post->author->email }}</p> --}}
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-lime-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        @include('zeus::themes.zeus.sky.partial.sidebar')

    </aside>

</div>
{{-- <div class="mt-6 container mx-auto px-2 md:px-4">
    <x-slot name="header">
        <span class="capitalize">{{ $post->title }} 1111</span>
    </x-slot>

    <x-slot name="breadcrumbs">
        <li class="flex items-center">
            <a href="{{ route('blogs') }}">{{ __('Posts') }}</a>
            @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3 rtl:rotate-180')
        </li>
        <li class="flex items-center">
            {{ $post->title }}
        </li>
    </x-slot>

    @if ($post->image() !== null)
        <img alt="{{ $post->title }}" src="{{ $post->image() }}" class="my-10 w-full h-full shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/>
    @endif

    <div class="bg-white dark:bg-gray-800 rounded-[2rem] rounded-tl-none shadow-md px-10 pb-6">
        <div class="flex items-center justify-between">
            <span class="font-light text-gray-600 dark:text-gray-200">{{ optional($post->published_at)->diffForHumans() ?? '' }}</span>
            <div>
                @unless ($post->tags->isEmpty())
                    @each($skyTheme.'.partial.category', $post->tags->where('type','category'), 'category')
                @endunless
            </div>
        </div>

        <div class="flex flex-col items-start justify-start gap-4">
            <div>
                <a href="#" class="text-2xl font-bold text-gray-700 dark:text-gray-100 hover:underline">
                    {{ $post->title ?? '' }}
                </a>
                <p class="mt-2 text-gray-600 dark:text-gray-200">
                    {{ $post->description ?? '' }}
                </p>
                <div>
                    @unless ($post->tags->isEmpty())
                        @foreach ($post->tags->where('type', 'tag') as $tag)
                            @include($skyTheme.'.partial.tag')
                        @endforeach
                    @endunless
                </div>
            </div>
            <a href="#" class="flex items-center gap-2">
                <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="object-cover w-10 h-10 rounded-full sm:block">
                <h1 class="font-bold text-gray-700 dark:text-gray-100 hover:underline">{{ $post->author->name ?? '' }}</h1>
            </a>
        </div>

        <div class="mt-6 lg:mt-12 prose dark:prose-invert max-w-none">
            {!! $post->getContent() !!}
        </div>
    </div>

    @if ($related->isNotEmpty())
        <div class="py-6 flex flex-col mt-4 gap-4">
            <h1 class="text-xl font-bold text-gray-700 dark:text-gray-100 md:text-2xl">{{ __('Related Posts') }}</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($related as $post)
                    @include($skyTheme.'.partial.related')
                @endforeach
            </div>
        </div>
    @endif
</div>
 --}}
