@isset($recent)
    @unless ($recent->isEmpty())
        <div
            class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{ __('Recent Posts') }}</h5>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($recent as $post)
                        <li class="py-3 sm:py-4">
                            <a href="{{ route('post', $post->slug) }}" class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    @if ($post->image() !== null)
                                        <img alt="{{ $post->title }}" src="{{ $post->image() }}"
                                            class="w-8 h-8 rounded-full" />
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $post->title ?? '' }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ optional($post->published_at)->diffForHumans() ?? '' }}
                                    </p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endunless

@endisset
