<div class="bg-white shadow rounded overflow-hidden group">
    <div class="relative">
        <a href="{{ route('items') }}">
            <img src="{{ $item->image() }}" alt="{{ $item->title }}" class="w-full">
        </a>
        {{-- <div
            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
            <a href="#"
                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                title="view product">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <a href="#"
                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                title="add to wishlist">
                <i class="fa-solid fa-heart"></i>
            </a>
        </div> --}}
    </div>
    <div class="pt-4 pb-3 px-4">
        <a href="#">
            <h4 class="font-medium mb-2 text-gray-800 hover:text-primary transition">
                {{ $item->title }}
            </h4>
        </a>
        <div class="flex items-baseline mb-1 space-x-2">
            <p class="text-base text-primary text-lime-700 font-semibold">
                {{ $item->price . ' ' . $item->currency->code }}</p>
            {{-- <p class="text-sm text-gray-400 line-through">$55.90</p> --}}
        </div>
        <div class="flex items-center">
            <i class="fa-solid fa-location-dot text-gray-500"></i>
            <div class="text-xs text-gray-500 ltr:ml-3 rtl:mr-3">
                {{ $item->city->name }}
            </div>
        </div>
    </div>
</div>
