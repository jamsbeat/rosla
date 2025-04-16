<div class="px-[210px] py-6">
    <div class="flex justify-between items-center">
        <!-- Left Nav -->
        <div class="flex items-center gap-x-3">
            <x-logo />
            <x-navigation.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="">Home</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('consultations') }}" :active="request()->routeIs('consultations')">Consultations</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('carbon-calculator') }}" :active="request()->routeIs('carbon-calculator')">Carbon Calculator</x-navigation.nav-link>
        </div>

        <!-- Right Nav -->
        @auth
        <div class="flex items-center justify-end gap-x-3 h-full">

            <div x-data="{ dropdownOpen: false }" class="relative flex items-center h-full gap-x-3">
                

                <x-navigation.nav-link @click="dropdownOpen=true" class="flex items-center h-full cursor-pointer">{{ Auth::user()->name }}</x-navigation.nav-link>
                <div x-show="dropdownOpen"
                    @click.away="dropdownOpen=false"
                    x-transition:enter="ease-out duration-200"
                    x-transition:enter-start="-translate-y-2"
                    x-transition:enter-end="translate-y-0"
                    class="absolute top-0 z-50 w-[137px] mt-12 -translate-x-1/2 left-1/2 bg-white shadow rounded">
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
        <div class="flex items-center gap-x-3"> <!-- Changed: added items-center and gap-x-3 -->
            <x-navigation.nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-navigation.nav-link>
        </div>
        @endguest
    </div>
</div>
