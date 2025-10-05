<div x-data="{ currentTab: 'tab1' }" class="w-full">
    <!-- Tab Buttons -->
    <div class="flex justify-center gap-2 mb-8 bg-white p-2 rounded-xl shadow-lg">
        <button @click="currentTab = 'tab1'"
                :class="{ 'bg-primary text-white shadow-lg': currentTab === 'tab1', 'text-gray-600 hover:text-gray-900 hover:bg-gray-50': currentTab !== 'tab1' }"
                class="flex-1 py-3 px-6 rounded-lg font-semibold cursor-pointer transition-all duration-300 text-base lg:text-lg">
            Solar
        </button>
        <button @click="currentTab = 'tab2'"
                :class="{ 'bg-primary text-white shadow-lg': currentTab === 'tab2', 'text-gray-600 hover:text-gray-900 hover:bg-gray-50': currentTab !== 'tab2' }"
                class="flex-1 py-3 px-6 rounded-lg font-semibold cursor-pointer transition-all duration-300 text-base lg:text-lg">
            EV
        </button>
        <button @click="currentTab = 'tab3'"
                :class="{ 'bg-primary text-white shadow-lg': currentTab === 'tab3', 'text-gray-600 hover:text-gray-900 hover:bg-gray-50': currentTab !== 'tab3' }"
                class="flex-1 py-3 px-6 rounded-lg font-semibold cursor-pointer transition-all duration-300 text-base lg:text-lg">
            Smart
        </button>
    </div>

    <!-- Tab Content -->
    <div>
        <div x-show="currentTab === 'tab1'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-cloak
             class="bg-white rounded-2xl shadow-xl p-10 lg:p-12 border border-gray-100">
            <div class="flex flex-col items-center text-center space-y-6">
                <div class="bg-secondary w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-solar-panel text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    Solar Panel Installation
                </h3>
                <p class="text-gray-600 text-base lg:text-lg leading-relaxed max-w-xl">
                    Consultation for residential or commercial solar panel systems
                </p>
            </div>
        </div>

        <div x-show="currentTab === 'tab2'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-cloak
             class="bg-white rounded-2xl shadow-xl p-10 lg:p-12 border border-gray-100">
            <div class="flex flex-col items-center text-center space-y-6">
                <div class="bg-secondary w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-charging-station text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    EV Charging Station
                </h3>
                <p class="text-gray-600 text-base lg:text-lg leading-relaxed max-w-xl">
                    Setup and installation of electric vehicle charging solutions
                </p>
            </div>
        </div>

        <div x-show="currentTab === 'tab3'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-cloak
             class="bg-white rounded-2xl shadow-xl p-10 lg:p-12 border border-gray-100">
            <div class="flex flex-col items-center text-center space-y-6">
                <div class="bg-secondary w-20 h-20 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-home text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    Smart Home Energy
                </h3>
                <p class="text-gray-600 text-base lg:text-lg leading-relaxed max-w-xl">
                    Energy efficiency and smart home management systems
                </p>
            </div>
        </div>
    </div>
</div>

<style>[x-cloak] { display: none !important; }</style>