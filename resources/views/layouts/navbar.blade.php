<nav class="bg-slate-900 text-slate-100 shadow-md border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            <!-- BRAND / LOGO -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('storage/Logo.png') }}" 
                         class="h-10 w-auto object-contain" 
                         alt="Logo">
                </a>
            </div>

            <!-- BOTÓN HAMBURGUESA (MÓVIL) -->
            <div class="flex md:hidden">
                <button type="button" 
                        id="mobile-menu-btn"
                        class="text-slate-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 p-2 rounded-md"
                        aria-controls="mobile-menu" 
                        aria-expanded="false">
                    <span class="sr-only">Abrir menú principal</span>
                    <i class="fa-solid fa-bars text-xl" id="menu-icon"></i>
                </button>
            </div>

            <!-- ENLACES Y BOTONES (ESCRITORIO) -->
            <div class="hidden md:flex md:items-center md:justify-between flex-1 ml-10">
                <!-- ENLACES DE NAVEGACIÓN -->
                <div class="flex space-x-4">
                    <a href="{{ route('inicio') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-house"></i>
                        <span>Inicio</span>
                    </a>
                    <a href="{{ route('catalogo.productos') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-wallet"></i>
                        <span>Productos</span>
                    </a>
                    <a href="{{ route('catalogo.servicios') }}" 
                       class="px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-hammer"></i>
                        <span>Servicios</span>
                    </a>
                </div>

                <!-- BOTONES DE ACCIÓN -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('catalogo.registro') }}" 
                       class="bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm px-4 py-2 rounded-lg shadow-sm transition-colors duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span>Registrarse</span>
                    </a>
                    <a href="{{ route('emprendedor.login.auth') }}" 
                       class="border border-slate-600 hover:border-slate-400 text-slate-200 hover:text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <i class="fa-solid fa-user"></i>
                        <span>Iniciar Sesión</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- MENÚ DESPLEGABLE (MÓVIL) -->
    <div class="hidden md:hidden bg-slate-900 border-t border-slate-800 px-2 pt-2 pb-4 space-y-1" id="mobile-menu">
        <a href="{{ route('inicio') }}" 
           class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-house w-5"></i>
            <span>Inicio</span>
        </a>
        <a href="{{ route('catalogo.productos') }}" 
           class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-wallet w-5"></i>
            <span>Productos</span>
        </a>
        <a href="{{ route('catalogo.servicios') }}" 
           class="block px-3 py-2 rounded-md text-base font-medium text-slate-300 hover:text-white hover:bg-slate-800 transition-colors flex items-center gap-2">
            <i class="fa-solid fa-hammer w-5"></i>
            <span>Servicios</span>
        </a>

        <div class="pt-4 border-t border-slate-800 flex flex-col space-y-2 px-1">
            <a href="{{ route('catalogo.registro') }}" 
               class="w-full justify-center bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm px-4 py-2.5 rounded-lg shadow-sm transition-colors duration-200 flex items-center gap-2">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                <span>Registrarse</span>
            </a>
            <a href="{{ route('emprendedor.login.auth') }}" 
               class="w-full justify-center border border-slate-600 hover:border-slate-400 text-slate-200 hover:text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors duration-200 flex items-center gap-2">
                <i class="fa-solid fa-user"></i>
                <span>Iniciar Sesión</span>
            </a>
        </div>
    </div>
</nav>

<!-- SCRIPT JS PARA INTERACCIÓN DEL MENÚ MÓVIL -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');

        if (btn && menu) {
            btn.addEventListener('click', function() {
                menu.classList.toggle('hidden');
                
                const isExpanded = menu.classList.contains('hidden');
                btn.setAttribute('aria-expanded', !isExpanded);

                if (!isExpanded) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-xmark');
                } else {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                }
            });
        }
    });
</script>