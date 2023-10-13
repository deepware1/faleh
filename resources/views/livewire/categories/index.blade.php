<div class="container mx-auto">
    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Categories</h2>
        <div class="grid grid-cols-4 gap-3">
            @foreach ($categories as $category)
                <livewire:shared.category :category="$category">
            @endforeach
        </div>
    </div>
    <!-- ./categories -->
</div>
