<div class="container px-4 mx-auto px-2">

    <!-- breadcrumb -->
    <div class="container px-4 py-4 flex items-center gap-3">
        <a href="{{ route('home') }}" class="text-lime-500 text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-left ltr:hidden"></i>
            <i class="fa-solid fa-chevron-right rtl:hidden"></i>
        </span>
        <p class="text-gray-600 font-medium">{{ __('front.item') }}</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            <img src="{{ $item->image() }}" alt="product" class="w-full object-cover max-h-100 rounded-md">
            {{-- <div class="grid grid-cols-5 gap-4 mt-4">
                <img src="../assets/images/products/product2.jpg" alt="product2"
                    class="w-full cursor-pointer border border-lime-600">
                <img src="../assets/images/products/product3.jpg" alt="product2" class="w-full cursor-pointer border">
                <img src="../assets/images/products/product4.jpg" alt="product2" class="w-full cursor-pointer border">
                <img src="../assets/images/products/product5.jpg" alt="product2" class="w-full cursor-pointer border">
                <img src="../assets/images/products/product6.jpg" alt="product2" class="w-full cursor-pointer border">
            </div> --}}
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $item->title }}</h2>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>{{ __('front.availability') }}: </span>
                    @if ($item->stock == 'in_stock')
                        <span class="text-green-600">{{ __('front.in_stock') }}</span>
                    @else
                        <span class="text-red-600">{{ __('front.out_of_stock') }}</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">{{ __('front.condition') }}: </span>
                    <span class="text-gray-600">{{ __('front.' . $item->condition) }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">{{ __('front.type') }}: </span>
                    <span class="text-gray-600">{{ __('front.' . $item->type) }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">{{ __('front.city') }}: </span>
                    <span class="text-gray-600">{{ $item->city->name }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">{{ __('front.category') }}: </span>
                    <span class="text-gray-600">{{ $item->category->title }}</span>
                </p>
                @if ($item->subcategory)
                    <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">{{ __('front.subcategory') }}: </span>
                        <span class="text-gray-600">{{ $item->subcategory->title }}</span>
                    </p>
                @endif
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-lime-600 font-semibold">{{ $item->currency->code }} {{ $item->price }}</p>
                {{-- <p class="text-base text-gray-400 line-through">$55.00</p> --}}
            </div>

            <div class="bg-gray-200 p-4 rounded-md mt-4">
                {{ $item->user->name }}
            </div>

            <div class="mt-6 flex gap-3 pb-5">
                <a href="#"
                    class="bg-lime-600 border border-lime-600 text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-lime-600 transition">
                    <i class="far fa-comment"></i> {{ __('front.chat') }}
                </a>
                <a href="#"
                    class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-lime-600 transition">
                    <i class="fas fa-ad"></i> {{ __('front.promote') }}
                </a>
                <a href="#"
                    class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-lime-600 transition">
                    <i class="far fa-handshake"></i> {{ __('front.ask_support') }}
                </a>
            </div>
        </div>
    </div>
    <!-- ./product-detail -->

    <!-- description -->
    <div class="container pb-16">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">
            {{ __('front.description') }}
        </h3>
        <div class="w-3/5 pt-6">
            <x-content>
                {!! $item->description !!}
            </x-content>
        </div>
    </div>
    <!-- ./description -->
</div>

<script>
</script>
