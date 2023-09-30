<div class="w-full bg-white shadow flex flex-col my-4 p-6">
    <p class="text-xl font-semibold pb-5">{{ __('Search') }}</p>
    <p class="pb-2">
    <form method="GET">
        <input class="w-full px-3 py-1.5 rounded" type="text" name="search" id="search"
            value="{{ request()->get('search') }}">
        <button type="submit" href="#"
            class="w-full bg-lime-800 text-white font-bold text-sm uppercase rounded hover:bg-lime-700 flex items-center justify-center px-2 py-3 mt-4">
            Search Now
        </button>
    </form>
    </p>
</div>
