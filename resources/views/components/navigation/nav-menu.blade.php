<nav x-data="{
    open: false,
    isDesktop: window.innerWidth >= 768
}"
x-init="window.addEventListener('resize', () => { isDesktop = window.innerWidth >= 768 })"
class="bg-white shadow relative z-50" wire:ignore>
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <a href="/">
                <x-logo />
            </a>
            <!-- Desktop nav links - controlled by Alpine -->
            <div x-show="isDesktop" class="flex gap-x-1 ml-4">
                <x-navigation.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navigation.nav-link>
                <x-navigation.nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-navigation.nav-link>
                <x-navigation.nav-link href="{{ route('consultations') }}" :active="request()->routeIs('consultations')">Consultations</x-navigation.nav-link>
                <x-navigation.nav-link href="{{ route('carbon-calculator') }}" :active="request()->routeIs('carbon-calculator')">Carbon</x-navigation.nav-link>
            </div>

            <!-- Right Nav - Desktop Only -->
            <div x-show="isDesktop">
                @auth
                <div class="flex items-center gap-x-1 ml-auto">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <x-navigation.nav-link @click="dropdownOpen=true" class="cursor-pointer">{{ Auth::user()->name }}</x-navigation.nav-link>
                        <div x-show="dropdownOpen"
                            @click.away="dropdownOpen=false"
                            x-transition:enter="ease-out duration-200"
                            x-transition:enter-start="-translate-y-2"
                            x-transition:enter-end="translate-y-0"
                            class="absolute top-full z-50 w-[137px] mt-2 right-0 bg-white shadow rounded">
                            <div class="flex justify-end pr-1 flex-col px-3 py-2">
                                <a href="/profile" class="text-primary text-start cursor-pointer font-medium hover:underline
                                hover:text-primary dark:hover:text-primary hover:border-primary dark:hover:border-primary focus:outline-none focus:text-primary dark:focus:primary focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out">Profile</a>
                                @if(Auth::user() && Auth::user()->is_admin)
                                <a href="/admin" class="text-primary text-start cursor-pointer font-medium hover:underline
                                hover:text-primary dark:hover:text-primary hover:border-primary dark:hover:border-primary focus:outline-none focus:text-primary dark:focus:primary focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out">Admin</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <a href="{{ route('logout') }}" :active="request()->routeIs('logout')" class="text-primary text-start cursor-pointer font-medium hover:underline
                                        hover:text-primary dark:hover:text-primary hover:border-primary dark:hover:border-primary focus:outline-none focus:text-primary dark:focus:primary focus:border-primary dark:focus:border-primary transition duration-150 ease-in-out" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Logout
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth

                @guest
                <div class="flex items-center gap-x-1 ml-auto">
                    <x-navigation.nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-navigation.nav-link>
                    <x-navigation.nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-navigation.nav-link>
                </div>
                @endguest
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
    <div x-show="open"
         x-cloak
         class="fixed inset-0 flex z-50"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
      <!-- Backdrop -->
      <div class="fixed inset-0" @click="open = false"></div>

      <!-- Sidebar -->
      <aside class="relative bg-white w-80 h-full shadow-2xl ml-auto overflow-y-auto"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             @click.away="open = false">

        <!-- Header -->
        <div class="flex items-center justify-between p-6 border-b border-green-100">
          <h2 class="text-xl font-semibold text-primary">Menu</h2>
          <button @click="open = false"
                  class="p-2 rounded-lg hover:bg-green-50 transition-colors duration-200">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <!-- Navigation Links -->
        <nav class="flex flex-col p-6 space-y-1 flex-1">
          <a href="{{ route('home') }}" class="py-3 px-4 rounded-lg text-gray-700 hover:bg-green-50 hover:text-primary transition-colors duration-200 {{ request()->routeIs('home') ? 'bg-green-50 font-semibold text-primary' : '' }}">Home</a>
          <a href="{{ route('about') }}" class="py-3 px-4 rounded-lg text-gray-700 hover:bg-green-50 hover:text-primary transition-colors duration-200 {{ request()->routeIs('about') ? 'bg-green-50 font-semibold text-primary' : '' }}">About</a>
          <a href="{{ route('consultations') }}" class="py-3 px-4 rounded-lg text-gray-700 hover:bg-green-50 hover:text-primary transition-colors duration-200 {{ request()->routeIs('consultations') ? 'bg-green-50 font-semibold text-primary' : '' }}">Consultations</a>
          <a href="{{ route('carbon-calculator') }}" class="py-3 px-4 rounded-lg text-gray-700 hover:bg-green-50 hover:text-primary transition-colors duration-200 {{ request()->routeIs('carbon-calculator') ? 'bg-green-50 font-semibold text-primary' : '' }}">Carbon</a>
        </nav>

        <!-- User Section -->
        @auth
        <div class="mt-auto p-6 border-t border-green-100">
          <div class="flex flex-col space-y-1">
            <div class="text-base font-semibold text-primary mb-3 px-4">{{ Auth::user()->name }}</div>
            <a href="/profile" class="py-3 px-4 text-gray-700 hover:bg-green-50 hover:text-primary rounded-lg transition-colors duration-200">Profile</a>
            @if(Auth::user() && Auth::user()->is_admin)
            <a href="/admin" class="py-3 px-4 text-gray-700 hover:bg-green-50 hover:text-primary rounded-lg transition-colors duration-200">Admin</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left py-3 px-4 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                Logout
              </button>
            </form>
          </div>
        </div>
        @endauth

        @guest
        <div class="mt-auto p-6 border-t border-gray-200">
          <div class="flex flex-col space-y-3">
            <a href="{{ route('login') }}" class="py-3 px-4 text-center bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors duration-200 font-medium shadow-sm">Login</a>
            <a href="{{ route('register') }}" class="py-3 px-4 text-center border-2 border-primary text-primary rounded-lg hover:bg-primary/5 transition-colors duration-200 font-medium">Register</a>
          </div>
        </div>
        @endguest
      </aside>
    </div>
  </nav>