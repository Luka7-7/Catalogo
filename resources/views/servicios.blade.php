@extends('layouts.app')

@section('titulo', 'Servicios')

@section('content')

{{-- HERO --}}
<section class="mb-10 border-b border-gray-800 bg-gradient-to-br from-teal-900/60 via-gray-900 to-gray-900">
    <div class="mx-auto max-w-7xl px-4 py-12">
        <h1 class="flex items-center justify-center text-center text-3xl font-bold text-white md:text-4xl">
            Catálogo de Servicios
        </h1>
    </div>
</section>

<div class="mx-auto max-w-7xl px-4 pb-12">

    <div class="flex flex-col gap-8 md:flex-row">

        {{-- ASIDE --}}
        <aside class="md:w-1/4 md:shrink-0">

            <nav class="rounded-xl border border-gray-800 bg-gray-900 p-4 md:sticky md:top-6" aria-label="Servicios">

                <p class="mb-2 px-3 text-sm font-semibold text-gray-400">
                    Servicios
                </p>

                <ul class="space-y-1">

                    <li>
                        <a
                            href="{{ route('catalogo.servicios') }}"
                            class="block rounded-md px-3 py-2 {{ !$categoriaActual ? 'bg-teal-500/20 font-medium text-teal-300' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}"
                            @if(!$categoriaActual) aria-current="page" @endif
                        >
                            Todas
                        </a>
                    </li>

                    @foreach($categorias as $categoria)
                        <li>
                            <a
                                href="{{ route('catalogo.servicios', ['categoria' => $categoria->id]) }}"
                                class="block rounded-md px-3 py-2 {{ $categoriaActual == $categoria->id ? 'bg-teal-500/20 font-medium text-teal-300' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}"
                                @if($categoriaActual == $categoria->id) aria-current="page" @endif
                            >
                                {{ $categoria->nombre_categoria }}
                            </a>
                        </li>
                    @endforeach

                </ul>

            </nav>

        </aside>

        {{-- SERVICIOS --}}
        <div class="flex-1">

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                @forelse($productos as $producto)

                    <x-card
                        :title="$producto->nombre"
                        :image="$producto->ruta_imagen ?? 'https://via.placeholder.com/400x300?text=Sin+Imagen'"
                    >

                        <div class="flex items-center justify-between gap-2">

                            <span class="rounded-full bg-sky-500/15 px-2.5 py-0.5 text-xs font-medium text-sky-300">
                                {{ $producto->tipo }}
                            </span>

                            <span class="text-lg font-bold text-emerald-400">
                                ${{ number_format($producto->precio, 2) }}
                            </span>

                        </div>

                        <p class="mt-3 text-sm text-gray-400">
                            {{ \Illuminate\Support\Str::limit($producto->descripcion, 80) }}
                        </p>

                        <div class="mt-4">
                            <a
                                href="{{ route('catalogo.detalleNegocio', $producto->id) }}"
                                class="block w-full rounded-md border border-teal-500 px-4 py-2 text-center font-medium text-teal-300 hover:bg-teal-500 hover:text-gray-950 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-offset-2 focus:ring-offset-gray-900"
                            >
                                Ver Detalles
                            </a>
                        </div>

                    </x-card>

                @empty

                    <div class="col-span-full rounded-lg border border-amber-500/30 bg-amber-500/10 px-4 py-8 text-center text-amber-200">
                        <p class="text-xl font-semibold">
                            No se encontraron productos
                        </p>
                        <p class="mt-1">
                            Vuelve más tarde o revisa tus filtros.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection