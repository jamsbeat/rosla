<x-layout>
    <div class="min-h-screen flex flex-col">
        <!-- Hero Section -->
        <div class="absolute bg-gradient-to-r from-primary to-secondary left-0 w-screen h-[300px] sm:h-[454px] overflow-hidden">
            <img src="{{ asset('images/lightning-logo.png') }}"
                 alt="Hero Image"
                 class="absolute right-0 sm:right-4 -top-2 w-[300px] h-[300px] sm:w-[600px] sm:h-[600px] opacity-30 sm:opacity-100">
        </div>
        <div class="mb-12 sm:mb-[72px] sm:mt-24 relative px-4 sm:px-0">
            <div class="w-full sm:w-1/2">
                <x-home.hero-section />
            </div>
        </div>

        <!-- Stats Section - NEW -->
        <div class="relative z-10 -mt-8 sm:mt-56 px-4">
            <x-home.stats />
        </div>

        <div class="bw-screen flex items-center justify-center py-12 md:py-[126px] -mx-4 md:-mx-[1492px]">
            <div class="text-center bg-gradient-to-r from-primary to-secondary md:w-screen md:h-[454px] md:py-[406px] py-24 flex flex-col items-center justify-center gap-6">
                <div class="flex justify-center w-full">
                    <x-logo class="rounded-full w-24 h-24 bg-white" />
                </div>
                <p class="max-w-2xl mx-auto text-gray-600 font-semibold text-base">
                    There are many variations of passages of Lorem Ipsum available
                    but the majority have suffered alteration in some form.
                </p>
            </div>
        </div>


        <!-- Services Section -->
        <div class="mb-12 md:mt-[143px] mt-6 px-4">
            <x-home.services />
        </div>

        <!-- Bottom Text -->
        <div class="text-center mt-8 sm:mt-16 px-4 pb-8">
            <p class="max-w-2xl mx-auto text-gray-600 text-sm sm:text-base">
                There are many variations of passages of Lorem Ipsum available
                but the majority have suffered alteration in some form.
            </p>
        </div>
    </div>
</x-layout>