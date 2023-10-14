<div class="mt-6 container mx-auto px-2 md:px-4">
    <!-- breadcrumb -->
    <div class="py-4 flex items-center gap-3">
        <a href="{{ route('home') }}" class="text-lime-500 text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-left ltr:hidden"></i>
            <i class="fa-solid fa-chevron-right rtl:hidden"></i>
        </span>
        <p class="text-gray-600 font-medium">
            {{ $post->title }}
        </p>
    </div>
    <!-- ./breadcrumb -->

    @if ($post->image())
        <img alt="{{ $post->title }}" src="{{ $post->image() }}"
            class="my-10 w-full aspect-video shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover" />
    @endif

    <div class="bg-white dark:bg-gray-800 pb-6 ">
        <div class="flex flex-col items-start justify-start gap-4">
            <div>
                <a href="#" class="text-2xl font-bold text-gray-700 dark:text-gray-100 hover:underline">
                    {{ $post->title ?? '' }}
                </a>
                <p class="mt-2 text-gray-600 dark:text-gray-200">
                    {{ $post->description ?? '' }}
                </p>
            </div>
        </div>

        <div class="mt-6 lg:mt-12 ltr:text-left [&>*]:bg-gray-300">
            <x-content>
                {!! $post->getContent() !!}
            </x-content>
        </div>

    </div>
</div>
