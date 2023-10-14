 <div class="container mx-auto px-2">
     <!-- wrapper -->
     <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

         <!-- sidebar -->
         <div class="col-span-3">
             <div class="px-4 py-3 shadow flex items-center gap-4">
                 <div class="flex-shrink-0">
                     <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="profile" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                 </div>
                 <div class="flex-grow">
                     <p class="text-gray-600">Hello,</p>
                     <h4 class="text-gray-800 font-medium">{{ $user->name }}</h4>
                 </div>
             </div>

             <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                 <div class="space-y-1 pl-8">
                     <a href="#" class="relative text-primary block font-medium capitalize transition">
                         <span class="absolute -left-8 top-0 text-base">
                             <i class="fa-regular fa-address-card"></i>
                         </span>
                         Manage account
                     </a>

                 </div>



                 <div class="space-y-1 pl-8 pt-4">
                     <form class="space-y-4 md:space-y-6" wire:submit.prevent="logoutUser">
                         <button type="submit" class="relative hover:text-primary block font-medium capitalize transition">
                             <span class="absolute -left-8 top-0 text-base">
                                 <i class="fa-solid fa-right-from-bracket"></i>
                             </span>
                             {{ __('front.signout') }}
                         </button>

                     </form>

                 </div>

             </div>
         </div>
         <!-- ./sidebar -->

         <!-- info -->
         <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
             <h4 class="text-lg font-medium capitalize mb-4">
                 Profile information
             </h4>
             <form wire:submit.prevent="changePassword">
                 <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
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
                     <div class="-mx-3 md:flex mb-6">
                         <div class="md:w-full px-3">
                             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="name">
                                 name
                             </label>
                             <input wire:model="name" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="name" id="name" type="text" value="{{ $user->name }}">
                             @error('name')
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
                             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="email">
                                 email
                             </label>
                             <input wire:model="email" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="email" id="email" type="email" value="{{ $user->email }}">
                             @error('email')
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
                             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="phone">
                                 phone
                             </label>
                             <input wire:model="phone" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="phone" id="phone" type="text" value="{{ $user->phone }}">
                             @error('phone')
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
                             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="name">
                                 about
                             </label>
                             <input wire:model="about" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="about" id="about" type="text" value="{{ $user->about }}">
                             @error('about')
                             <div>
                                 <span class="text-red-500 text-xs italic">
                                     {{ $message }}
                                 </span>
                             </div>
                             @enderror
                         </div>
                     </div>
                     <div class="-mx-3 md:flex mb-6">
                         <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="old_password">
                                 old password
                             </label>
                             <input wire:model="old_password" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="old_password" name="old_password" type="password" placeholder="***">
                             @error('old_password')
                             <div>
                                 <span class="text-red-500 text-xs italic">
                                     {{ $message }}
                                 </span>
                             </div>
                             @enderror
                         </div>
                         <div class="md:w-1/3 px-3">
                             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="new_password">
                                 new password
                             </label>
                             <input wire:model="new_password" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="new_password" id="new_password" type="password" placeholder="*****">
                             @error('new_password')
                             <div>
                                 <span class="text-red-500 text-xs italic">
                                     {{ $message }}
                                 </span>
                             </div>
                             @enderror
                         </div>
                         <div class="md:w-1/3 px-3">
                             <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="new_password_confirmation">
                                 confirem new password
                             </label>
                             <input wire:model="new_password_confirmation" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" name="new_password_confirmation" id="new_password_confirmation" type="password" placeholder="*****">
                             @error('new_password_confirmation')
                             <div>
                                 <span class="text-red-500 text-xs italic">
                                     {{ $message }}
                                 </span>
                             </div>
                             @enderror
                         </div>
                     </div>
                     <div class="-mx-3 md:flex mt-2">
                         <div class="md:w-50 px-3">
                             <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full">
                                 edit
                             </button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
         <!-- ./info -->

     </div>

 </div>