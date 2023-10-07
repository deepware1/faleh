<a href="{{ route('tags', [$category->type, $category->slug]) }}">
    <span class="bg-lime-100 text-lime-800 text-sm font-medium mr-2 px-2.5 py-1 rounded dark:bg-lime-900 dark:text-lime-300">
        {{ $category->name ?? '' }}
    </span>
</a>
