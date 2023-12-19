<div class="container mx-auto px-4">
    <div class="w-full lg:w-large lg:mx-auto px-4 md:px-6 lg:px-0 xl:w-feLarge">
        <!-- Story Container -->
        <div class="bg-feAchromatic-50 dark_bg-feAchromatic-900 rounded-lg w-auto sm:w-[556px] sm:mt-32 lg:mt-36 mt-28 mb-16 mx-auto py-4">
            <!-- Story Content -->
            <div class="w-full flex flex-col items-center">
                <!-- Story Image -->
                <img src="{{ url('path_to_your_agriculture_story_image.jpg') }}" alt="Agriculture Story Image" class="max-w-full h-auto rounded-lg mb-4" />

                <!-- Story Title -->
                <h1 class="text-2xl text-fePrimary-500 font-semibold mb-2">
                    {{ $story->title }}
                </h1>

                <!-- Story Description -->
                <p class="text-feSecondary-800 dark_text-feSecondary-300 text-base mb-4">
                    {{ $story->description }}
                </p>
            </div>
        </div>
    </div>
</div>
