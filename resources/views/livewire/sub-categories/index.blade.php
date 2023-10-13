<div class="container mx-auto">
    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Sub Categories of {{ $category->title }}</h2>
        <div class="grid grid-cols-4 gap-3">
            @foreach ($subCategories as $category)
                <livewire:shared.category :category="$category" :isSub=true>
            @endforeach
        </div>
    </div>
    <!-- ./categories -->
</div>
