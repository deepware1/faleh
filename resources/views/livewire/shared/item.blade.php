<div class="bg-white shadow rounded overflow-hidden group">
    <div class="relative">
        <img src="{{ $item->image() }}" alt="product 1" class="w-full">
        <div
            class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
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
        </div>
    </div>
    <div class="pt-4 pb-3 px-4">
        <a href="#">
            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                {{ $item->title }}
            </h4>
        </a>
        <div class="flex items-baseline mb-1 space-x-2">
            <p class="text-xl text-primary font-semibold">
                {{ $item->price . ' ' . $item->currency->code }}</p>
            {{-- <p class="text-sm text-gray-400 line-through">$55.90</p> --}}
        </div>
        <div class="flex items-center">
            <div class="flex gap-1 text-sm text-yellow-400">
                @for ($i = 0; $i < 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                @endfor
            </div>
            {{-- <div class="text-xs text-gray-500 ml-3">(150)</div> --}}
        </div>
    </div>
    <a href="#"
        class="block w-full py-1 text-center text-white bg-lime-700 border border-lime-700 rounded-b hover:bg-transparent hover:text-lime-700 transition">Add
        to cart</a>
</div>
