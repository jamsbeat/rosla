<x-layout>
    <div class="min-h-screen flex flex-col">
        <!-- Hero Section -->
        <div class="absolute bg-gradient-to-r from-primary to-secondary left-0 w-screen h-[454px] overflow-hidden">
            <img src="{{ asset('images/lightning-logo.png') }}"
                 alt="Hero Image"
                 class="absolute right-4 -top-2 w-[600px] h-[600px]">
        </div>
        <div class="mb-[72px] relative">
            <div class="w-1/2">
                <x-home.hero-section />
            </div>
        </div>


        <!-- Logo Section -->
        <div class="flex-grow flex items-center justify-center py-[70px]">
            <div class="text-center grid grid-cols-1 place-items-center gap-6 p-[77px] rounded-xl">
                <div class="flex justify-center w-full">
                    <x-logo class="rounded-full w-24 h-24 bg-secondary"
                    />
                </div>
                <p class="max-w-2xl mx-auto text-gray-600 font-semibold">
                    There are many variations of passages of Lorem Ipsum available
                    but the majority have suffered alteration in some form.
                </p>
            </div>
        </div>

        <!-- Services Section -->
        <div class="mb-[143px] mt-6">
            <x-home.services />
        </div>

        <!-- Bottom Text -->
        <div class="text-center mt-16">
            <p class="max-w-2xl mx-auto text-gray-600">
                There are many variations of passages of Lorem Ipsum available
                but the majority have suffered alteration in some form.
            </p>
        </div>
    </div>
</x-layout>