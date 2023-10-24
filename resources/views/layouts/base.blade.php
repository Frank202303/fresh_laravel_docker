<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-partials.head />
</head>

<body>
    <x-partials.nav />
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    {{-- footer must be put in the BODY --}}
    <x-partials.footer />

    @livewireScripts
</body>


</html>
