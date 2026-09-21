@extends('layouts.app')

@section('titulo', $negocio->nombre)

@section('content')

{{-- HERO --}}
<section class="border-b border-gray-800 bg-gradient-to-br from-teal-900/60 via-gray-900 to-gray-900">
    <div class="mx-auto max-w-7xl px-4 py-12 md:py-16">
        <div class="flex flex-col items-center gap-8 md:flex-row">

            {{-- LOGO --}}
            <div class="shrink-0 md:w-1/4 md:text-center">
                <img
                    src="{{ $negocio->ruta_logo
                        ? asset($negocio->ruta_logo)
                        : 'https://via.placeholder.com/150x150?text=Logo' }}"
                    alt="Logo de {{ $negocio->nombre }}"
                    class="mx-auto h-32 w-32 rounded-full border-2 border-gray-700 object-cover"
                >
            </div>

            {{-- INFORMACION --}}
            <div class="flex-1 text-center md:text-left">

                <h1 class="text-3xl font-bold text-white md:text-4xl">
                    {{ $negocio->nombre }}
                </h1>

                <p class="mt-2 text-lg text-gray-300">
                    {{ $negocio->descripcion }}
                </p>

                @if($negocio->ubicacion)
                    <p class="mt-3 text-gray-400">
                        📍 {{ $negocio->ubicacion }}
                    </p>
                @endif

                <div class="mt-5 flex flex-wrap justify-center gap-2 md:justify-start">

                    @if($negocio->enlace_whatsapp)
                        <a
                            href="{{ $negocio->enlace_whatsapp }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-2 rounded-md bg-green-600 px-4 py-2 font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 focus:ring-offset-gray-900"
                        >
                            <i class="fa-brands fa-whatsapp"></i> WhatsApp
                        </a>
                    @endif

                    @if($negocio->url_facebook)
                        <a
                            href="{{ $negocio->url_facebook }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-gray-900"
                        >
                            <i class="fa-brands fa-facebook"></i> Facebook
                        </a>
                    @endif

                    @if($negocio->url_instagram)
                        <a
                            href="{{ $negocio->url_instagram }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-2 rounded-md bg-red-600 px-4 py-2 font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-gray-900"
                        >
                            <i class="fa-brands fa-instagram"></i> Instagram
                        </a>
                    @endif

                    @if($negocio->url_tiktok)
                        <a
                            href="{{ $negocio->url_tiktok }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-2 rounded-md border border-gray-600 bg-gray-950 px-4 py-2 font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900"
                        >
                            <i class="fa-brands fa-tiktok"></i> TikTok
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>

{{-- PRODUCTOS Y SERVICIOS --}}
<div class="mx-auto max-w-7xl px-4 py-12">

    <h2 class="mb-6 text-2xl font-semibold text-white md:text-3xl">
        Productos y Servicios
    </h2>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

        @forelse($productos as $producto)

            <div class="flex flex-col overflow-hidden rounded-xl border border-gray-800 bg-gray-900">

                {{-- IMAGEN --}}
                <div class="aspect-[4/3] bg-gray-800">
                    <img
                        src="{{ $producto->ruta_imagen
                            ? asset($producto->ruta_imagen)
                            : 'https://via.placeholder.com/400x300?text=Sin+Imagen' }}"
                        alt="{{ $producto->nombre }}"
                        class="h-full w-full object-cover"
                    >
                </div>

                {{-- CONTENIDO --}}
                <div class="flex flex-1 flex-col p-5">

                    <h4 class="text-lg font-semibold text-white">
                        {{ $producto->nombre }}
                    </h4>

                    <div class="mt-3 flex flex-wrap gap-2">

                        <span class="rounded-full bg-teal-500/20 px-2.5 py-0.5 text-xs font-medium text-teal-300">
                            {{ $producto->tipo }}
                        </span>

                        @if($producto->nombre_categoria)
                            <span class="rounded-full bg-sky-500/15 px-2.5 py-0.5 text-xs font-medium text-sky-300">
                                {{ $producto->nombre_categoria }}
                            </span>
                        @endif

                    </div>

                    <p class="mt-3 flex-1 text-gray-400">
                        {{ $producto->descripcion }}
                    </p>

                    <p class="mt-4 text-xl font-semibold text-emerald-400">
                        ${{ number_format($producto->precio, 2) }}
                    </p>

                </div>
            </div>

        @empty

            <div class="col-span-full rounded-lg border border-amber-500/30 bg-amber-500/10 px-4 py-3 text-amber-200">
                Este negocio aún no tiene productos o servicios registrados.
            </div>

        @endforelse

    </div>
</div>

@endsection