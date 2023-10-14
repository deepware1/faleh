<div class="divide-y divide-gray-200 space-y-5">
    @if (isset($categories))
        <div>
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">
                {{ __('front.category') }}
            </h3>
            <select wire:model.live="category" @isset($isSub) disabled @endisset
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500">
                <option value="all">{{ __('front.all') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    @endif

    @if (isset($subCategories))
        <div>
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">
                {{ __('front.subcategory') }}
            </h3>
            <select wire:model.live="subCategory" @isset($isSub) disabled @endisset
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500">
                <option value="all">{{ __('front.all') }}</option>

                @foreach ($subCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    @endif


    {{-- <div class="pt-4">
        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Brands</h3>
        <div class="space-y-2">
            <div class="flex items-center">
                <input type="checkbox" name="brand-1" id="brand-1"
                    class="text-lime-500 focus:ring-0 rounded-sm cursor-pointer">
                <label for="brand-1" class="text-gray-600 ltr:ml-3 rtl:mr-3 cusror-pointer">Cooking Color</label>
                <div class="ltr:ml-auto rtl:mr-auto text-gray-600 text-sm">(15)</div>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="brand-2" id="brand-2"
                    class="text-lime-500 focus:ring-0 rounded-sm cursor-pointer">
                <label for="brand-2" class="text-gray-600 ltr:ml-3 rtl:mr-3 cusror-pointer">Magniflex</label>
                <div class="ltr:ml-auto rtl:mr-auto text-gray-600 text-sm">(9)</div>
            </div>
        </div>
    </div> --}}

    <div class="pt-4">
        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">
            {{ __('front.price') }}
        </h3>
        <div class="mt-4 flex items-center">
            <input type="text" wire:model.live="priceMin"
                class="w-full border-gray-300 focus:border-lime-600 rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                placeholder="{{ __('front.min') }}">
            <span class="mx-3 text-gray-500">-</span>
            <input type="text" wire:model.live="priceMax"
                class="w-full border-gray-300 focus:border-lime-600 rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                placeholder="{{ __('front.max') }}">
        </div>
    </div>

    {{-- <div class="pt-4">
        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Color</h3>
        <div class="flex items-center gap-2">
            <div class="color-selector">
                <input type="radio" name="color" id="red" class="hidden">
                <label for="red" class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                    style="background-color: #fc3d57;"></label>
            </div>
            <div class="color-selector">
                <input type="radio" name="color" id="black" class="hidden">
                <label for="black" class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                    style="background-color: #000;"></label>
            </div>
        </div>
    </div> --}}

</div>
