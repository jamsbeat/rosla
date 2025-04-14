<div class="px-[210px] py-6">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-x-3">
            <x-logo />

            <x-navigation.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('consultations') }}" :active="request()->routeIs('consultations')">Consultations</x-navigation.nav-link>
            <x-navigation.nav-link href="{{ route('carbon-calculator') }}" :active="request()->routeIs('carbon-calculator')">Carbon Calculator</x-navigation.nav-link>

        </div>

        @auth
            <x-navigation.nav-logout />
        @endauth

        @guest
            <div>
                <x-navigation.nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-navigation.nav-link>
                <x-navigation.nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-navigation.nav-link>
            </div>
        @endguest
    </div>
</div>
