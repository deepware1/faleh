@push('styles')
<style>
  .active__desc p {
    opacity: 1 !important;
    margin-top: 24px;
    color: #0044DD;
    font-size: 12px;
    font-family: Poppins;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
  }

  .tox .tox-tinymce {
    height: 200px !important;
  }

  .tox .tox-toolbar-overlord .tox-toolbar:not(.tox-toolbar--scrolling):first-child,
  .tox .tox-toolbar-overlord .tox-toolbar__primary {
    background-position: center top 39px;
    display: flex;
    justify-content: space-between;
  }

  .tox .tox-edit-area__iframe {
    background-color: #F4F4F4 !important;
    border: 0;
    box-sizing: border-box;
    flex: 1;
    height: 100%;
    position: absolute;
    width: 100%;
  }

  .test-container {
    background-color: #ffffff;
    width: 100%;
    height: 160px;
    border: 2px solid #D1D5DB;
    border-radius: 12px;
    margin-top: 1.5em;
  }

  .options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 48px;
    padding-inline: 17px;
  }

  .options button {
    height: 15px;
    width: 15px;
    border: none;
    background-color: #ffffff;
    outline: none;
    color: #020929;
  }

  .options i {
    transform: scale(1.5);
  }

  .format-options,
  .undo-redo {
    gap: 30px;
    align-items: center;
  }

  /* .input-wrapper {
                            display: flex;
                            align-items: center;
                            gap: 8px;
                        } */

  #text-input {
    background: #F4F4F4;
    height: 112px;
    padding: 12px;
    font-family: var(--ff-inter) !important;
    font-weight: 600;
    font-size: 14px;
    color: #33383F;
    overflow: auto;
    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px;
    transform: translateY(-4px);
  }

  .tox-notifications-container {
    display: none;
  }
</style>
@endpush
<div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12  shadow-xl mb-24">
  @if (session()->has('message'))
  <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium"></span>
    {{ session('message') }}
  </p>
  @endif
  @if (session()->has('error'))
  <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
    {{ session('error') }}
  </p>
  @endif
  <form wire:submit.prevent="submitAD">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
            Title
          </label>
          <input wire:model="title" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="title" id="title" type="text" placeholder="item title">
          @error('title')
          <div>
            <span class="text-red-500 text-xs italic">
              {{ $message }}
            </span>
          </div>
          @enderror
        </div>

      </div>
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="price">
            Price
          </label>
          <input wire:model="price" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="price" name="price" type="text" placeholder="15000">
          @error('price')
          <div>
            <span class="text-red-500 text-xs italic">
              {{ $message }}
            </span>
          </div>
          @enderror
        </div>
        <div class="md:w-1/2 px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="contact_number">
            Contact Number
          </label>
          <input wire:model="contact_number" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="contact_number" id="contact_number" type="text" placeholder="+0211111111111">
          @error('contact_number')
          <div>
            <span class="text-red-500 text-xs italic">
              {{ $message }}
            </span>
          </div>
          @enderror
        </div>
      </div>
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3" wire:ignore>
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="description">
            Description
          </label>
          <textarea wire:model="description" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3 h-24" name="description" id="description" placeholder="DESCRIPTION"></textarea>
          @error('description')
          <div>
            <span class="text-red-500 text-xs italic">
              {{ $message }}
            </span>
          </div>
          @enderror
        </div>
      </div>
      <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="location">
            Categories
          </label>
          <div>
            <select wire:model.live="category" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="category" id="category">
              <option value=""></option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
            @error('category')
            <div>
              <span class="text-red-500 text-xs italic">
                {{ $message }}
              </span>
            </div>
            @enderror
          </div>
        </div>
        <div class="md:w-1/2 px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="sub_category">
            Sub Categories
          </label>
          <div>
            <select wire:model.live="sub_category" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="sub_category" id="sub_category">
              <option value=""></option>
              @foreach ($subCategories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
            @error('sub_category')
            <div>
              <span class="text-red-500 text-xs italic">
                {{ $message }}
              </span>
            </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="country">
            Country
          </label>
          <div>
            <select wire:model.live="country" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="country" id="country">
              <option value=""></option>
              @foreach ($countries as $country)
              <option value="{{ $country->id }}">{{ $country->name }}</option>
              @endforeach
            </select>
            @error('country')
            <div>
              <span class="text-red-500 text-xs italic">
                {{ $message }}
              </span>
            </div>
            @enderror
          </div>
        </div>
        <div class="md:w-1/2 px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="city">
            City
          </label>
          <div>
            <select wire:model.live="city" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="city" id="city">
              <option value=""></option>
              @foreach ($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
            @error('city')
            <div>
              <span class="text-red-500 text-xs italic">
                {{ $message }}
              </span>
            </div>
            @enderror
          </div>
        </div>

        <div class="md:w-1/2 px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="currency">
            Currency
          </label>
          <div>
            <select wire:model="currency" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="currency" id="currency">
              <option value=""></option>
              @foreach ($currencies as $currency)
              <option value="{{ $currency->id }}">{{ $currency->name }}</option>
              @endforeach
            </select>
            @error('currency')
            <div>
              <span class="text-red-500 text-xs italic">
                {{ $message }}
              </span>
            </div>
            @enderror
          </div>
        </div>

      </div>
      <div class="-mx-3 md:flex mb-2">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="type">
            Type
          </label>
          <div>
            <select wire:model="type" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="type" id="type">
              <option value=""></option>
              <option value="sell">Sell</option>
              <option value="rent">Rent</option>
            </select>
            @error('type')
            <div>
              <span class="text-red-500 text-xs italic">
                {{ $message }}
              </span>
            </div>
            @enderror
          </div>
        </div>
        <div class="md:w-1/2 px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="condition">
            Condition
          </label>
          <div>
            <select wire:model="condition" class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" name="condition" id="condition">
              <option value=""></option>
              <option value="new">New</option>
              <option value="used">Used</option>
            </select>
            @error('condition')
            <div>
              <span class="text-red-500 text-xs italic">
                {{ $message }}
              </span>
            </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="image_file">
            Image
          </label>
          <input wire:model="image_file" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="image_file" id="image_file" type="file">
          @error('image_file')
          <div>
            <span class="text-red-500 text-xs italic">
              {{ $message }}
            </span>
          </div>
          @enderror
        </div>
      </div>
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-full px-3">
          <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="image_url">
            Or Image Url
          </label>
          <input wire:model="image_url" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="image_url" id="image_url" type="url">
          @error('image_url')
          <div>
            <span class="text-red-500 text-xs italic">
              {{ $message }}
            </span>
          </div>
          @enderror
        </div>
      </div>
      <div class="-mx-3 md:flex mt-2">
        <div class="md:w-full px-3">
          <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
            {{ __('front.submit_ad') }}
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

@push('scripts')


<script src="https://cdn.tiny.cloud/1/n2i3juz02ixfep7p3e2uvn0p8ky1ugcinx6reps1u4l9noqw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#description',
    setup: function(editor) {
      editor.on('init change', function() {
        editor.save();
      });
      editor.on('change', function(e) {
        @this.set('description', editor.getContent());
      });
    },
    plugins: 'anchor autolink emoticons link lists linkchecker',
    toolbar: 'bold italic underline emoticons link bullist align   | undo redo',
    menubar: false,
    statusbar: false,
    height: "300"
  });
</script>
@endpush