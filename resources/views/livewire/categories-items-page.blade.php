<div class="container mx-auto py-16">
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Items</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($items as $item)
                <livewire:shared.item :item="$item" />
            @endforeach
        </div>

        <div class="max-w-sm mx-auto mt-4">
            {{ $items->links() }}
        </div>
    </div>
</div>
