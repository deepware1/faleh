<div class="mx-auto">
    <!-- categories -->
    <div class="container mx-auto py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">
            {{ __('front.categories') }}
        </h2>
        <div class="grid grid-cols-4 gap-3">
            @foreach ($categories as $category)
                <livewire:shared.category :category="$category">
            @endforeach
        </div>
    </div>
    <!-- ./categories -->

    @include('livewire.home.parts.features')

    @include('livewire.home.parts.newArrivalsItems')

    @include('livewire.home.parts.featuredItems')

    @include('livewire.home.parts.promotedItems')


</div>
