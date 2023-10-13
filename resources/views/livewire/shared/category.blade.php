@php
    $href = $isSub ? route('items') : route('subcategories', $category->slug);
@endphp

<div class="relative rounded-sm overflow-hidden group">
    <img src="{{ $category->image() }}" alt="{{ $category->title }}" class="w-full max-h-48 object-cover">
    <a href="{{ $href }}"
        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
        {{ $category->title }}
    </a>
</div>
