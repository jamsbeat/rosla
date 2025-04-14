<x-layout>
    <div class="min-h-screen flex flex-col">
        <!-- Hero Section -->
        <div class="absolute bg-gradient-to-r from-primary to-secondary left-0 w-screen h-[454px]"></div>
        <div class="mb-[72px] relative">
            <div class="w-1/2">
                <x-home.hero-section />
            </div>
        </div>


        <!-- Logo Section -->
        <div class="flex-grow flex items-center justify-center pt-24 pb-24">
            <div class="text-center grid grid-cols-1 place-items-center gap-6">
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
        <div class="mb-12">
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