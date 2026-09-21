<nav class="border-b border-gray-800 bg-gray-900" role="navigation" aria-label="main navigation">
    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between px-4 py-3">

        {{-- Logo --}}
        <a href="/" class="flex items-center">
            <img src="{{ asset('storage/Logo.png') }}"
                 class="h-10 w-auto"
                 alt="Logo">
        </a>

        {{-- Botón hamburguesa (solo móvil) --}}
        <button type="button"
                id="navbar-burger"
                class="inline-flex h-10 w-10 items-center justify-center rounded-md text-gray-400 hover:bg-gray-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-600 md:hidden"
                aria-label="menu"
                aria-controls="navbarBasicExample"
                aria-expanded="false">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        {{-- Menú --}}
        <div id="navbarBasicExample"
             class="hidden w-full flex-col gap-2 pt-3 md:flex md:w-auto md:flex-1 md:flex-row md:items-center md:justify-between md:pt-0">

            {{-- Enlaces --}}
            <div class="flex flex-col md:ml-6 md:flex-row md:items-center md:gap-1">
                <a class="flex items-center gap-2 rounded-md px-3 py-2 text-gray-300 hover:bg-gray-800 hover:text-white"
                   href="{{ route('emprendedor.dashboard') }}">
                    <i class="fa-solid fa-table-columns"></i> Dashboard
                </a>
                <a class="flex items-center gap-2 rounded-md px-3 py-2 text-gray-300 hover:bg-gray-800 hover:text-white"
                   href="{{ route('emprendedor.crearNuevo') }}">
                    <i class="fa-solid fa-plus"></i> Crear Producto
                </a>
                <a class="flex items-center gap-2 rounded-md px-3 py-2 text-gray-300 hover:bg-gray-800 hover:text-white"
                   href="{{ route('emprendedor.perfil') }}">
                    <i class="fa-solid fa-user"></i> Mi perfil
                </a>
            </div>

            {{-- Cerrar sesión --}}
            <form method="POST" action="{{ route('emprendedor.logout') }}" class="px-3 py-2 md:p-0">
                @csrf
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-md bg-red-600 px-4 py-2 font-semibold text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-gray-900">
                    <i class="fa-solid fa-door-open"></i> Salir
                </button>
            </form>
        </div>
    </div>
</nav>

<script>
    // Toggle del menú en móvil
    (function () {
        const burger = document.getElementById('navbar-burger');
        const menu = document.getElementById('navbarBasicExample');

        burger.addEventListener('click', function () {
            const open = menu.classList.toggle('hidden') === false;
            menu.classList.toggle('flex', open);
            burger.setAttribute('aria-expanded', open);
        });
    })();
</script>