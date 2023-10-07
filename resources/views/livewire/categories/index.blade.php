<div class="container mx-auto">
    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Categories</h2>
        <div class="grid grid-cols-4 gap-3">
            @foreach ($categories as $category)
                <div class="relative rounded-sm overflow-hidden group">
                    <img src="{{ $category->image() }}" alt="{{ $category->title }}" class="w-full">
                    <a href="{{ route('subcategories', $category->slug) }}"
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                        {{ $category->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./categories -->
</div>
