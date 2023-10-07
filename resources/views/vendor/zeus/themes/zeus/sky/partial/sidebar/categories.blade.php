@isset($tags)
    @unless ($tags->isEmpty())
        <div
            class="w-full mb-3 max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{ __('Categories') }}</h5>
            </div>
            <ul>
                @foreach ($tags as $tag)
                    <li class="px-1 py-4 border-b border-t border-white hover:border-primary-600 transition duration-300">
                        <a href="{{ route('tags', ['category', $tag->slug]) }}"
                            class="flex items-center text-gray-600 cursor-pointer">
                            {{ $tag->name }}
                            <span class="text-gray-500 ltr:ml-auto rtl:mr-auto">{{ $tag->posts_published_count }} <span
                                    class="text-xs">Post</span></span>
                            <i class='text-gray-500 bx bx-right-arrow-alt ltr:ml-1 rtl:mr-1'></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endunless
@endisset
