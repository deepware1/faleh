<div class="container mx-auto px-2">
    <div class="w-full lg:w-large lg:mx-auto px-4 md:px-6 lg:px-0 xl:w-feLarge">
        <div class="bg-feAchromatic-50 dark_bg-feAchromatic-900 rounded-lg w-auto sm:w-[556px] sm:mt-32 lg:mt-36 mt-28 mb-16 mx-auto py-4">
            <div class="flex justify-center items-center">
                <p class="text-feSecondary-800 dark_text-feSecondary-300 sm:text-2xl text-xl font-semibold mb-4 font-medium"> ☀ Weather </p>
            </div>
            <div class="w-full flex flex-col">
                <div class="px-10 flex py-1 flex justify-center items-center"><svg class="m-15" xmlns="http://www.w3.org/2000/svg" height="2em" fill="#4d8c30" viewBox="0 0 384 512">
                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"></path>
                    </svg>
                    <h1 textcolor="text-fePrimary-500" class="ps-5">city : {{ $this->weather['sys']['country'] }}</h1> , <h2>{{ $this->weather['name'] }}</h2>
                </div>
                <div class="p-10 py-3 flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 320 512" fill="#4d8c30" class="m-15">
                        <path d="M160 64c-26.5 0-48 21.5-48 48V276.5c0 17.3-7.1 31.9-15.3 42.5C86.2 332.6 80 349.5 80 368c0 44.2 35.8 80 80 80s80-35.8 80-80c0-18.5-6.2-35.4-16.7-48.9c-8.2-10.6-15.3-25.2-15.3-42.5V112c0-26.5-21.5-48-48-48zM48 112C48 50.2 98.1 0 160 0s112 50.1 112 112V276.5c0 .1 .1 .3 .2 .6c.2 .6 .8 1.6 1.7 2.8c18.9 24.4 30.1 55 30.1 88.1c0 79.5-64.5 144-144 144S16 447.5 16 368c0-33.2 11.2-63.8 30.1-88.1c.9-1.2 1.5-2.2 1.7-2.8c.1-.3 .2-.5 .2-.6V112zM208 368c0 26.5-21.5 48-48 48s-48-21.5-48-48c0-20.9 13.4-38.7 32-45.3V144c0-8.8 7.2-16 16-16s16 7.2 16 16V322.7c18.6 6.6 32 24.4 32 45.3z"></path>
                    </svg>
                    <h2 class="ps-5">temp : {{ $this->weather['main']['temp'] }} ° </h2><span class="unit position-relative top-5">C</span>
                </div>
                <div class="px-10 py-3 flex justify-center items-cente">
                    <h2>press : {{ $this->weather['main']['pressure'] }}</h2>
                </div>
                <div class="px-10 py-1 flex justify-center items-center">
                    <h2>humidity : {{ $this->weather['main']['humidity'] }} %</h2>
                </div>
            </div>
        </div>
    </div>
</div>