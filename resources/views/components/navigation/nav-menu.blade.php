<nav x-data="{ 
    open: false,
    isDesktop: window.innerWidth >= 768
}" 
x-init="window.addEventListener('resize', () => { isDesktop = window.innerWidth >= 768 })"
class="bg-white shadow relative z-50" wire:ignore>
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex items-center h-16">
        <x-logo />
        
        <!-- Desktop nav links - controlled by Alpine -->
        <div x-show="isDesktop" class="flex gap-x-1 ml-4">
            <x-navigation.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('consultations') }}" :active="request()->routeIs('consultations')">Consultations</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('carbon-calculator') }}" :active="request()->routeIs('carbon-calculator')">Carbon</x-navigation.nav-link>
        </div>
  
        <!-- Mobile Hamburger - controlled by Alpine -->
        <div x-show="!isDesktop" class="ml-auto">
          <button @click="open = !open" class="p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  
    <!-- Mobile Sidebar -->
    <div x-show="open" x-cloak class="fixed inset-0 flex z-50">
      <div class="fixed inset-0" @click="open = false"></div>
      <aside class="relative bg-white w-64 h-full shadow-md p-6" @click.away="open = false">
        <button @click="open = false" class="mb-4 text-sm">✕ Close</button>
        <nav class="flex flex-col space-y-4">
            <x-navigation.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('consultations') }}" :active="request()->routeIs('consultations')">Consultations</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('carbon-calculator') }}" :active="request()->routeIs('carbon-calculator')">Carbon</x-navigation.nav-link>
        </nav>
      </aside>
    </div>
  </nav>