@extends('layouts.appemprendedor')

@section('titulo', 'Nuevo Registro')

@section('content')

<section class="section">

    <div class="container">

        <div class="columns is-centered">

            <div class="column is-10-tablet is-8-desktop">

                <div class="box">

                    <h1 class="title mb-5">

                        Crear Producto o Servicio

                    </h1>

                    <form 
                        method="POST"
                        action="{{ route('emprendedor.guardarProducto') }}"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        <!-- NEGOCIO -->
                        <div class="field">

                            <label class="label">
                                Negocio
                            </label>

                            <div class="control">

                                <div class="select is-fullwidth">

                                    <select name="negocio_id" required>

                                        <option value="">
                                            Selecciona un negocio
                                        </option>

                                        @foreach($negocios as $negocio)

                                            <option value="{{ $negocio->id }}">

                                                {{ $negocio->nombre }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- CATEGORIA -->
                        <div class="field">

                            <label class="label">
                                Categoría
                            </label>

                            <div class="control">

                                <div class="select is-fullwidth">

                                    <select name="categoria_id" required>

                                        <option value="">
                                            Selecciona una categoría
                                        </option>

                                        @foreach($categorias as $categoria)

                                            <option value="{{ $categoria->id }}">

                                                {{ $categoria->nombre_categoria }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- NOMBRE -->
                        <div class="field">

                            <label class="label">
                                Nombre
                            </label>

                            <div class="control">

                                <input 
                                    type="text"
                                    name="nombre"
                                    class="input"
                                    required
                                >

                            </div>

                        </div>

                        <!-- TIPO -->
                        <div class="field">

                            <label class="label">
                                Tipo
                            </label>

                            <div class="control">

                                <div class="select is-fullwidth">

                                    <select name="tipo" required>

                                        <option value="Producto">
                                            Producto
                                        </option>

                                        <option value="Servicio">
                                            Servicio
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- DESCRIPCION -->
                        <div class="field">

                            <label class="label">
                                Descripción
                            </label>

                            <div class="control">

                                <textarea 
                                    name="descripcion"
                                    class="textarea"
                                    required
                                ></textarea>

                            </div>

                        </div>

                        <!-- PRECIO -->
                        <div class="field">

                            <label class="label">
                                Precio
                            </label>

                            <div class="control">

                                <input 
                                    type="number"
                                    step="0.01"
                                    name="precio"
                                    class="input"
                                    required
                                >

                            </div>

                        </div>

                        <!-- IMAGEN -->
                        <div class="field">

                            <label class="label">
                                Imagen
                            </label>

                            <div class="control">

                                <input 
                                    type="file"
                                    name="imagen"
                                    class="input"
                                >

                            </div>

                        </div>

                        <!-- BOTON -->
                        <div class="field mt-5">

                            <button 
                                type="submit"
                                class="button is-primary is-fullwidth"
                            >

                                Guardar

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection