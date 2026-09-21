<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('titulo', 'Panel Emprendedor')</title>

    <!-- FontAwesome (Iconos para botones y secciones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Vite (CSS y JS compilados) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CSS adicional por vista -->
    @yield('css')
</head>
<body class="bg-light text-dark min-h-screen flex flex-col">

    <!-- NAVBAR EMPRENDEDOR -->
    @include('layouts.navbaremprendedor')

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- jQuery (Necesario para los scripts $.on('click') de tus vistas) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap 5 JS Bundle (Necesario para los modales y alertas) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts adicionales por vista -->
    @yield('scripts')

</body>
</html>