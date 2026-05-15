@extends('layouts.appemprendedor')

@section('titulo', 'Editar Registro')

@section('content')

<section class="section">

    <div class="container">

        <div class="columns is-centered">

            <div class="column is-8">

                <div class="box">

                    <h1 class="title mb-5">

                        Editar Registro

                    </h1>

                    <form 
                        method="POST"
                        action="{{ route('emprendedor.actualizarProducto', $producto->id) }}"
                    >

                        @csrf

                        <!-- NEGOCIO -->
                        <div class="field">

                            <label class="label">
                                Negocio
                            </label>

                            <div class="select is-fullwidth">

                                <select name="negocio_id">

                                    @foreach($negocios as $negocio)

                                        <option 
                                            value="{{ $negocio->id }}"
                                            {{ $producto->negocio_id == $negocio->id ? 'selected' : '' }}
                                        >

                                            {{ $negocio->nombre }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <!-- CATEGORIA -->
                        <div class="field">

                            <label class="label">
                                Categoría
                            </label>

                            <div class="select is-fullwidth">

                                <select name="categoria_id">

                                    @foreach($categorias as $categoria)

                                        <option 
                                            value="{{ $categoria->id }}"
                                            {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}
                                        >

                                            {{ $categoria->nombre_categoria }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <!-- NOMBRE -->
                        <div class="field">

                            <label class="label">
                                Nombre
                            </label>

                            <input 
                                type="text"
                                name="nombre"
                                class="input"
                                value="{{ $producto->nombre }}"
                            >

                        </div>

                        <!-- TIPO -->
                        <div class="field">

                            <label class="label">
                                Tipo
                            </label>

                            <div class="select is-fullwidth">

                                <select name="tipo">

                                    <option 
                                        value="Producto"
                                        {{ $producto->tipo == 'Producto' ? 'selected' : '' }}
                                    >
                                        Producto
                                    </option>

                                    <option 
                                        value="Servicio"
                                        {{ $producto->tipo == 'Servicio' ? 'selected' : '' }}
                                    >
                                        Servicio
                                    </option>

                                </select>

                            </div>

                        </div>

                        <!-- DESCRIPCION -->
                        <div class="field">

                            <label class="label">
                                Descripción
                            </label>

                            <textarea 
                                name="descripcion"
                                class="textarea"
                            >{{ $producto->descripcion }}</textarea>

                        </div>

                        <!-- PRECIO -->
                        <div class="field">

                            <label class="label">
                                Precio
                            </label>

                            <input 
                                type="number"
                                step="0.01"
                                name="precio"
                                class="input"
                                value="{{ $producto->precio }}"
                            >

                        </div>

                        <!-- BOTON -->
                        <button 
                            type="submit"
                            class="button is-primary is-fullwidth"
                        >

                            Actualizar

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection