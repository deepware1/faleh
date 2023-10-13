<div class="container mx-auto">
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Search for {{$keyword}}</h2>
        <form method="get">
        <input type="text" id="search-page-input"
                        class=" form-control block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"
                        placeholder="Search..." wire:model.live="keyword"/>
        </form>
        <div class="grid grid-cols-1 mt-4 md:grid-cols-4 gap-6">
            @foreach ($items as $item)
                <livewire:shared.item :item="$item" />
            @endforeach
        </div>
    </div>
</div>
