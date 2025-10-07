<x-layout>
    <div class="min-h-screen flex flex-col">
        <!-- Hero Section - Full Width -->
        <div class="relative -mx-4 sm:-mx-6 lg:-mx-20 xl:-mx-32">
            <div class="bg-gradient-to-r from-primary to-secondary overflow-hidden">
                <div class="absolute inset-0 opacity-20">
                    <img src="{{ asset('images/lightning-logo.png') }}"
                         alt="Hero Image"
                         class="absolute right-0 top-0 w-[400px] h-[400px] lg:w-[700px] lg:h-[700px] object-contain">
                </div>

                <div class="relative max-w-7xl mx-auto px-6 lg:px-20 xl:px-32 pt-12 pb-32 lg:pt-12">
                    <div class="lg:w-2/3">
                        <x-home.hero-section />
                    </div>
                </div>

                <div class="absolute bottom-0 left-0 right-0">
                    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                        <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z" fill="#F9FAFB"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Grey Background Container -->
        <div class="-mx-4 sm:-mx-6 lg:-mx-20 xl:-mx-32 bg-gray-50">
            <!-- Stats Section -->
            <div class="relative -mt-20 z-10 pb-16 px-4 sm:px-6 lg:px-8">
                <x-home.stats />
            </div>
        </div>

        <!-- Mission Statement Section - Full Width -->
        <div class="-mx-4 sm:-mx-6 lg:-mx-20 xl:-mx-32">
            <div class="py-24 lg:py-32 bg-gradient-to-r from-primary to-secondary">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div class="flex justify-center mb-8">
                        <div class="bg-white p-6 rounded-2xl shadow-xl">
                            <x-logo class="w-20 h-20" />
                        </div>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                        Powering Your Future with Clean Energy
                    </h2>
                    <p class="text-lg text-white/90 leading-relaxed max-w-3xl mx-auto">
                        There are many variations of passages of Lorem Ipsum available
                        but the majority have suffered alteration in some form.
                    </p>
                </div>
            </div>
        </div>

        <!-- Services Section - Full Width -->
        <div class="-mx-4 sm:-mx-6 lg:-mx-20 xl:-mx-32">
            <div class="py-24 lg:py-32 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <div class="inline-flex items-center gap-3 bg-primary text-white px-8 py-4 rounded-full shadow-lg mb-6">
                            <h2 class="text-2xl lg:text-3xl font-bold">
                                Book a Consultation
                            </h2>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                            </svg>
                        </div>
                        <p class="text-gray-600 text-lg max-w-2xl md:mx-auto mx-1">
                            Choose the service that best fits your energy needs
                        </p>
                    </div>

                    <div class="max-w-2xl md:mx-auto mx-2">
                        <x-home.services />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom CTA Section - Full Width -->
        <div class="-mx-4 sm:-mx-6 lg:-mx-20 xl:-mx-32">
            <div class="py-20 bg-white border-t border-gray-200">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                        Ready to Get Started?
                    </h3>
                    <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                        There are many variations of passages of Lorem Ipsum available
                        but the majority have suffered alteration in some form.
                    </p>
                    <a href="/consultations"
                       class="inline-flex items-center gap-2 bg-primary hover:bg-secondary text-white px-8 py-4 rounded-lg transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Schedule Your Consultation
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>