<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Oscar René Domínguez">
    
    <title>@yield('titulo', 'Autenticación')</title>

    <!-- FontAwesome (Iconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Tailwind / Vite (CSS y JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CSS adicional por vista -->
    @yield('css')
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-center">

    <!-- CONTENIDO PRINCIPAL -->
    <main class="w-full">
        @yield('content')
    </main>

    <!-- jQuery (Requerido para interacción de scripts) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts adicionales por vista -->
    @yield('scripts')

</body>
</html>