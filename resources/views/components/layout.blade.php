<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rosla</title>
    <link rel="icon" href="https://placehold.co/600x400/21C55D/FFF" type="image/x-icon">

    {{-- Tailwind --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- Flat Pickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Alpine Js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css' , 'resources/js/app.js'])

    @livewireStyles

</head>
<body>
    <nav>
        <x-navigation.nav-menu />
    </nav>

    <section class="lg:px-[210px]">
        {{ $slot }}
    </section>

    @livewireScripts

</body>
</html>
