<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    @yield('css')
    {{-- Cambiado llaves por paréntesis --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbaremprendedor')


    @yield('content')
    @yield('scripts')
</body>
</html>