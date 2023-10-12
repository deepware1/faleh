<div class="container mx-auto">
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Promoted Items</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($promotedItems as $item)
                <livewire:shared.item :item="$item" />
            @endforeach
        </div>
    </div>
</div>
