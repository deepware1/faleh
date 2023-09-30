<article class="mt-6" itemscope itemtype="https://schema.org/Movie">
    <div>
        <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="{{ $post->image() }}" alt="">

        <div class="mt-8">
            <span class="text-lime-500 uppercase tracking-wider">Article</span>

            <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white truncate">
                {!! $post->title !!}
            </h1>

            <p class="mt-2 text-gray-500 dark:text-gray-400">
                {!! $post->description !!}
            </p>

            <div class="flex items-center justify-between mt-4">
                <div>
                    <a href="#" class="flex items-center gap-2 text-lg font-medium text-gray-700 dark:text-gray-300 hover:underline hover:text-gray-500">
                        <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="hidden object-cover w-8 h-8 rounded-full sm:block">
                        <div>
                            <p>{{ $post->author->name ?? '' }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ optional($post->published_at)->toFormattedDateString() ?? '' }}</p>
                        </div>
                    </a>
                </div>

                <a href="{{ route('post',$post->slug) }}" class="inline-block text-lime-500 underline hover:text-lime-400">Read more</a>
            </div>

        </div>
    </div>
</article>
