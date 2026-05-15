@extends('layouts.app')

@section('titulo', $negocio->nombre)

@section('content')

<section class="hero is-primary is-bold">

    <div class="hero-body">

        <div class="container">

            <div class="columns is-vcentered">

                {{-- LOGO --}}
                <div class="column is-3 has-text-centered">

                    @if($negocio->ruta_logo)

                        <figure class="image is-128x128 is-inline-block">

                            <img
                                src="{{ asset($negocio->ruta_logo) }}"
                                class="is-rounded"
                            >

                        </figure>

                    @else

                        <figure class="image is-128x128 is-inline-block">

                            <img
                                src="https://via.placeholder.com/150x150?text=Logo"
                                class="is-rounded"
                            >

                        </figure>

                    @endif

                </div>

                {{-- INFORMACION --}}
                <div class="column">

                    <h1 class="title">
                        {{ $negocio->nombre }}
                    </h1>

                    <p class="subtitle">
                        {{ $negocio->descripcion }}
                    </p>

                    @if($negocio->ubicacion)

                        <p class="mb-3">

                            📍 {{ $negocio->ubicacion }}

                        </p>

                    @endif

                    <div class="buttons mt-4">

                        @if($negocio->enlace_whatsapp)

                            <a
                                href="{{ $negocio->enlace_whatsapp }}"
                                target="_blank"
                                class="button is-success"
                            >
                               <i class="fa-brands fa-whatsapp"></i> WhatsApp
                            </a>

                        @endif

                        @if($negocio->url_facebook)

                            <a
                                href="{{ $negocio->url_facebook }}"
                                target="_blank"
                                class="button is-link"
                            >
                                <i class="fa-brands fa-facebook"></i>Facebook
                            </a>

                        @endif

                        @if($negocio->url_instagram)

                            <a
                                href="{{ $negocio->url_instagram }}"
                                target="_blank"
                                class="button is-danger"
                            >
                                <i class="fa-brands fa-instagram"></i> Instagram
                            </a>

                        @endif

                        @if($negocio->url_tiktok)

                            <a
                                href="{{ $negocio->url_tiktok }}"
                                target="_blank"
                                class="button is-dark"
                            >
                                TikTok
                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<div class="container py-6">

    <h2 class="title is-3 mb-5">

        Productos y Servicios

    </h2>

    <div class="columns is-multiline">

        @forelse($productos as $producto)

            <div class="column is-12-mobile is-6-tablet is-4-desktop">

                <div class="card">

                    {{-- IMAGEN --}}
                    <div class="card-image">

                        <figure class="image is-4by3">

                            <img
                                src="{{ $producto->ruta_imagen 
                                    ? asset($producto->ruta_imagen)
                                    : 'https://via.placeholder.com/400x300?text=Sin+Imagen' }}"
                            >

                        </figure>

                    </div>

                    {{-- CONTENIDO --}}
                    <div class="card-content">

                        <h4 class="title is-5">
                            {{ $producto->nombre }}
                        </h4>

                        <div class="mb-3">

                            <span class="tag is-primary">
                                {{ $producto->tipo }}
                            </span>

                            @if($producto->nombre_categoria)

                                <span class="tag is-info is-light">
                                    {{ $producto->nombre_categoria }}
                                </span>

                            @endif

                        </div>

                        <p class="mb-4">
                            {{ $producto->descripcion }}
                        </p>

                        <h4 class="has-text-success">

                            ${{ number_format($producto->precio, 2) }}

                        </h4>

                    </div>

                </div>

            </div>

        @empty

            <div class="column is-12">

                <div class="notification is-warning">

                    Este negocio aún no tiene productos o servicios registrados.

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection