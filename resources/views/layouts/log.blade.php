<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Oscar René Domínguez ">
    <title>@yield('titulo')</title>
    @yield('css')
    {{-- Cambiado llaves por paréntesis --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


    @yield('content')
    @yield('scripts')
</body>
</html>