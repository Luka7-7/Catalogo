@extends('layouts.app')
@section('titulo', 'Productos')
@section('content')
<section class="hero is-primary is-bold mb-6">
    <div class="hero-body">
        <div class="container">

            <h1 class="title align-items-center is-flex is-justify-content-center">
                Catálogo de Productos
            </h1>

        </div>
    </div>
</section>
<div class="container">

    <div class="columns">

        <!-- ASIDE -->
        <aside class="column is-3">

            <div class="menu categoria-menu">

                <p class="menu-label">
                    Categorías
                </p>

                <ul class="menu-list">

                    <li>

                        <a 
                            href="{{ route('catalogo.productos') }}"
                            class="{{ !$categoriaActual ? 'is-active' : '' }}"
                        >
                            Todas
                        </a>

                    </li>

                    @foreach($categorias as $categoria)

                        <li>

                            <a 
                                href="{{ route('catalogo.productos', ['categoria' => $categoria->id]) }}"
                                class="{{ $categoriaActual == $categoria->id ? 'is-active' : '' }}"
                            >

                                {{ $categoria->nombre_categoria }}

                            </a>

                        </li>

                    @endforeach

                </ul>

            </div>

        </aside>

        <!-- PRODUCTOS -->
        <div class="column is-9">

            <div class="columns is-multiline">

                @forelse($productos as $producto)

                    <div class="column is-12-mobile is-6-tablet is-4-desktop">

                        <x-card 
                            :title="$producto->nombre"
                            :image="$producto->ruta_imagen ?? 'https://via.placeholder.com/400x300?text=Sin+Imagen'"
                        >

                            <div class="is-flex is-justify-content-between is-align-items-center">

                                <span class="tag is-info is-light">
                                    {{ $producto->tipo }}
                                </span>

                                <span class="has-text-weight-bold is-size-5">
                                    ${{ number_format($producto->precio, 2) }}
                                </span>

                            </div>

                            <p class="mt-3 is-size-6 has-text-grey">
                                {{ \Illuminate\Support\Str::limit($producto->descripcion, 80) }}
                            </p>

                            <footer class="card-footer mt-4" style="border-top: none;">

                                <a href="{{ route('catalogo.detalleNegocio', $producto->id) }}" class="button is-primary is-fullwidth is-outlined">
                                    Ver Detalles
                                </a>

                            </footer>

                        </x-card>

                    </div>

                @empty

                    <div class="column is-12 has-text-centered">

                        <div class="notification is-warning is-light">

                            <p class="title is-4">
                                No se encontraron productos
                            </p>

                            <p>
                                Vuelve más tarde o revisa tus filtros.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection