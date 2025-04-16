<div x-data="{ currentTab: 'tab1' }" class="w-full max-w-md mx-auto">
    <!-- Tab Buttons -->
    <div class="flex justify-between">
      <button @click="currentTab = 'tab1'" :class="{ 'border-primary text-primary ring-2 ring-offset-2 ring-primary bg-secondary/10': currentTab === 'tab1', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !== 'tab1' }" class="py-2 px-4 border-b-2 border-primary font-medium cursor-pointer transition-all duration-200 ease-in-out">Solar</button>
      <button @click="currentTab = 'tab2'" :class="{ 'border-primary text-primary ring-2 ring-offset-2 ring-primary bg-secondary/10': currentTab === 'tab2', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !== 'tab2' }" class="py-2 px-4 border-b-2 border-primary font-medium cursor-pointer transition-all duration-200 ease-in-out">EV</button>
      <button @click="currentTab = 'tab3'" :class="{ 'border-primary text-primary ring-2 ring-offset-2 ring-primary bg-secondary/10': currentTab === 'tab3', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !== 'tab3' }" class="py-2 px-4 border-b-2 border-primary font-medium cursor-pointer transition-all duration-200 ease-in-out">Smart</button>
    </div>
    <!-- Tab Content -->
    <div class="mt-8">
        <div class="bg-white/10 p-8 rounded-md shadow ring-3 ring-primary">
            <div x-show="currentTab === 'tab1'" x-cloak>
                <div class="bg-secondary w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Solar Panel Installation</h3>
                <p class="text-gray-600">
                    Consultation for residential or commercial solar panel systems
                </p>
            </div>
            <div x-show="currentTab === 'tab2'" x-cloak>
                <div class="bg-secondary w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-bolt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">EV Charging Station</h3>
                <p class="text-gray-600">
                    Setup and installation of electric vehicle charging solutions
                </p>
            </div>
            <div x-show="currentTab === 'tab3'" x-cloak>
                <div class="bg-secondary w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-th-large text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Smart Home Energy</h3>
                <p class="text-gray-600">
                    Energy efficiency and smart home management systems
                </p>
            </div>
        </div>
    </div>
  </div>
  <style>[x-cloak] { display: none !important; }</style>




