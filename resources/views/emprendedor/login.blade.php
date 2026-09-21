@extends('layouts.log')

@section('titulo', 'Iniciar Sesión')

@section('content')

<section class="min-h-[calc(100vh-4rem)] w-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <!-- Tarjeta centrada con mx-auto -->
    <div class="w-full max-w-md mx-auto bg-slate-800/80 rounded-xl shadow-2xl border border-slate-700/60 p-6 sm:p-8 backdrop-blur-sm">

        <!-- TITULO -->
        <h1 class="text-2xl font-bold text-center text-slate-100 mb-6 border-b border-slate-700/60 pb-4">
            Iniciar Sesión
        </h1>

        <!-- MENSAJE SUCCESS -->
        @if(session('success'))
            <div class="mb-5 rounded-lg bg-emerald-500/10 border border-emerald-500/30 p-4 text-sm text-emerald-400">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORMULARIO -->
        <form method="POST" action="{{ route('emprendedor.login.auth') }}" class="space-y-5">

            @csrf

            <!-- CORREO -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Correo Electrónico
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                        <i class="fas fa-envelope"></i>
                    </span>

                    <input 
                        type="email"
                        name="correo_electronico"
                        placeholder="correo@ejemplo.com"
                        value="{{ old('correo_electronico') }}"
                        required
                        class="w-full rounded-lg border bg-slate-900/90 pl-10 pr-3.5 py-2.5 text-slate-100 placeholder-slate-500 shadow-xs text-sm transition-colors focus:outline-none focus:ring-2 @error('correo_electronico') border-red-500 focus:border-red-500 focus:ring-red-500/30 @else border-slate-600 focus:border-blue-500 focus:ring-blue-500/30 @enderror"
                    >
                </div>

                @error('correo_electronico')
                    <p class="mt-1.5 text-xs text-red-400 font-medium">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- CONTRASEÑA -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Contraseña
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                        <i class="fas fa-lock"></i>
                    </span>

                    <input 
                        type="password"
                        name="contrasena"
                        placeholder="********"
                        required
                        class="w-full rounded-lg border bg-slate-900/90 pl-10 pr-3.5 py-2.5 text-slate-100 placeholder-slate-500 shadow-xs text-sm transition-colors focus:outline-none focus:ring-2 @error('contrasena') border-red-500 focus:border-red-500 focus:ring-red-500/30 @else border-slate-600 focus:border-blue-500 focus:ring-blue-500/30 @enderror"
                    >
                </div>

                @error('contrasena')
                    <p class="mt-1.5 text-xs text-red-400 font-medium">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- RECORDAR -->
            <div class="flex items-center">
                <label class="inline-flex items-center gap-2 cursor-pointer text-sm text-slate-300 hover:text-slate-200">
                    <input 
                        type="checkbox" 
                        name="recordarme"
                        class="w-4 h-4 rounded border-slate-600 bg-slate-900 text-blue-600 focus:ring-blue-500/30 focus:ring-2 focus:ring-offset-0 cursor-pointer"
                    >
                    <span>Recordarme</span>
                </label>
            </div>

            <!-- BOTON -->
            <div class="pt-2">
                <button 
                    type="submit"
                    class="w-full inline-flex justify-center items-center gap-2 px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm rounded-lg shadow-md transition-colors duration-200 cursor-pointer"
                >
                    <i class="fas fa-sign-in-alt text-xs"></i>
                    <span>Ingresar</span>
                </button>
            </div>

        </form>

        <!-- REGISTRO -->
        <div class="text-center mt-6 pt-5 border-t border-slate-700/60">
            <p class="text-sm text-slate-400">
                ¿No tienes cuenta?
                <a 
                    href="{{ route('catalogo.registro.form') }}" 
                    class="font-semibold text-blue-400 hover:text-blue-300 transition-colors ml-1"
                >
                    Crear cuenta
                </a>
            </p>
        </div>

    </div>

</section>

@endsection