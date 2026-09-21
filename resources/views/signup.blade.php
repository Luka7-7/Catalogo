@extends('layouts.log')

@section('titulo', 'Registro')

@section('content')

<section class="px-4 py-12">

    <div class="mx-auto w-full max-w-xl">

        <div class="rounded-xl border border-gray-800 bg-gray-900 p-6 shadow-lg md:p-8">

            <h1 class="mb-6 text-center text-3xl font-bold text-white">
                Crear Cuenta
            </h1>

            <form method="POST" action="{{ route('catalogo.registro') }}" class="space-y-5">

                @csrf

                {{-- NOMBRE --}}
                <div>
                    <label for="nombre" class="mb-1 block text-sm font-medium text-gray-300">
                        Nombre Completo
                    </label>

                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex w-10 items-center justify-center text-gray-500">
                            <i class="fas fa-user"></i>
                        </span>

                        <input
                            id="nombre"
                            class="w-full rounded-md border bg-gray-800 py-2 pl-10 pr-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-1 @error('nombre') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-gray-700 focus:border-teal-500 focus:ring-teal-500 @enderror"
                            type="text"
                            name="nombre"
                            placeholder="Ingresa tu nombre"
                            value="{{ old('nombre') }}"
                            autocomplete="name"
                            required
                        >
                    </div>

                    @error('nombre')
                        <p class="mt-1 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- CORREO --}}
                <div>
                    <label for="correo_electronico" class="mb-1 block text-sm font-medium text-gray-300">
                        Correo Electrónico
                    </label>

                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex w-10 items-center justify-center text-gray-500">
                            <i class="fas fa-envelope"></i>
                        </span>

                        <input
                            id="correo_electronico"
                            class="w-full rounded-md border bg-gray-800 py-2 pl-10 pr-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-1 @error('correo_electronico') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-gray-700 focus:border-teal-500 focus:ring-teal-500 @enderror"
                            type="email"
                            name="correo_electronico"
                            placeholder="correo@ejemplo.com"
                            value="{{ old('correo_electronico') }}"
                            autocomplete="email"
                            required
                        >
                    </div>

                    @error('correo_electronico')
                        <p class="mt-1 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- CONTRASEÑA --}}
                <div>
                    <label for="contrasena" class="mb-1 block text-sm font-medium text-gray-300">
                        Contraseña
                    </label>

                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex w-10 items-center justify-center text-gray-500">
                            <i class="fas fa-lock"></i>
                        </span>

                        <input
                            id="contrasena"
                            class="w-full rounded-md border bg-gray-800 py-2 pl-10 pr-3 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-1 @error('contrasena') border-red-500 focus:border-red-500 focus:ring-red-500 @else border-gray-700 focus:border-teal-500 focus:ring-teal-500 @enderror"
                            type="password"
                            name="contrasena"
                            placeholder="********"
                            autocomplete="new-password"
                            required
                        >
                    </div>

                    @error('contrasena')
                        <p class="mt-1 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- CONFIRMAR CONTRASEÑA --}}
                <div>
                    <label for="contrasena_confirmation" class="mb-1 block text-sm font-medium text-gray-300">
                        Confirmar Contraseña
                    </label>

                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex w-10 items-center justify-center text-gray-500">
                            <i class="fas fa-lock"></i>
                        </span>

                        <input
                            id="contrasena_confirmation"
                            class="w-full rounded-md border border-gray-700 bg-gray-800 py-2 pl-10 pr-3 text-gray-100 placeholder-gray-500 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500"
                            type="password"
                            name="contrasena_confirmation"
                            placeholder="********"
                            autocomplete="new-password"
                            required
                        >
                    </div>
                </div>

                {{-- TERMINOS --}}
                <div>
                    <label class="flex cursor-pointer items-center gap-2 text-gray-300">
                        <input
                            type="checkbox"
                            class="h-4 w-4 rounded border-gray-600 bg-gray-800 accent-teal-500"
                            required
                        >
                        Acepto los términos y condiciones
                    </label>
                </div>

                {{-- BOTON --}}
                <div class="pt-2">
                    <button
                        type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-md bg-teal-500 px-4 py-2.5 font-semibold text-gray-950 hover:bg-teal-400 focus:outline-none focus:ring-2 focus:ring-teal-300 focus:ring-offset-2 focus:ring-offset-gray-900"
                    >
                        <i class="fas fa-user-plus"></i>
                        <span>Registrarse</span>
                    </button>
                </div>

            </form>

            {{-- LOGIN --}}
            <p class="mt-6 text-center text-gray-400">
                ¿Ya tienes cuenta?
                <a href="{{ route('emprendedor.login') }}" class="font-medium text-teal-300 hover:text-teal-200 hover:underline">
                    Inicia sesión
                </a>
            </p>

        </div>

    </div>

</section>

@endsection