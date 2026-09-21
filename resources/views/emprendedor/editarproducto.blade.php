@extends('layouts.appemprendedor')

@section('titulo', 'Editar Registro')

@section('content')

<section class="py-8 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">

    <div class="bg-slate-800/80 rounded-xl shadow-xl border border-slate-700/60 p-6 sm:p-8 backdrop-blur-sm">

        <h1 class="text-2xl font-bold text-slate-100 mb-6 border-b border-slate-700/60 pb-4">
            Editar Registro
        </h1>

        <form 
            method="POST"
            action="{{ route('emprendedor.actualizarProducto', $producto->id) }}"
            class="space-y-5"
        >

            @csrf

            <!-- NEGOCIO -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Negocio
                </label>

                <select 
                    name="negocio_id"
                    class="w-full rounded-lg border border-slate-600 bg-slate-900/90 px-3.5 py-2.5 text-slate-100 shadow-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 text-sm transition-colors cursor-pointer"
                >
                    @foreach($negocios as $negocio)
                        <option 
                            value="{{ $negocio->id }}"
                            class="bg-slate-900 text-slate-100"
                            {{ $producto->negocio_id == $negocio->id ? 'selected' : '' }}
                        >
                            {{ $negocio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- CATEGORIA -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Categoría
                </label>

                <select 
                    name="categoria_id"
                    class="w-full rounded-lg border border-slate-600 bg-slate-900/90 px-3.5 py-2.5 text-slate-100 shadow-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 text-sm transition-colors cursor-pointer"
                >
                    @foreach($categorias as $categoria)
                        <option 
                            value="{{ $categoria->id }}"
                            class="bg-slate-900 text-slate-100"
                            {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}
                        >
                            {{ $categoria->nombre_categoria }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- NOMBRE -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Nombre
                </label>

                <input 
                    type="text"
                    name="nombre"
                    value="{{ $producto->nombre }}"
                    class="w-full rounded-lg border border-slate-600 bg-slate-900/90 px-3.5 py-2.5 text-slate-100 placeholder-slate-500 shadow-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 text-sm transition-colors"
                >
            </div>

            <!-- TIPO -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Tipo
                </label>

                <select 
                    name="tipo"
                    class="w-full rounded-lg border border-slate-600 bg-slate-900/90 px-3.5 py-2.5 text-slate-100 shadow-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 text-sm transition-colors cursor-pointer"
                >
                    <option 
                        value="Producto"
                        class="bg-slate-900 text-slate-100"
                        {{ $producto->tipo == 'Producto' ? 'selected' : '' }}
                    >
                        Producto
                    </option>

                    <option 
                        value="Servicio"
                        class="bg-slate-900 text-slate-100"
                        {{ $producto->tipo == 'Servicio' ? 'selected' : '' }}
                    >
                        Servicio
                    </option>
                </select>
            </div>

            <!-- DESCRIPCION -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Descripción
                </label>

                <textarea 
                    name="descripcion"
                    rows="4"
                    class="w-full rounded-lg border border-slate-600 bg-slate-900/90 px-3.5 py-2.5 text-slate-100 placeholder-slate-500 shadow-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 text-sm transition-colors resize-y"
                >{{ $producto->descripcion }}</textarea>
            </div>

            <!-- PRECIO -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-1.5">
                    Precio
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 text-sm">$</span>
                    <input 
                        type="number"
                        step="0.01"
                        name="precio"
                        value="{{ $producto->precio }}"
                        class="w-full rounded-lg border border-slate-600 bg-slate-900/90 pl-8 pr-3.5 py-2.5 text-slate-100 placeholder-slate-500 shadow-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30 text-sm transition-colors"
                    >
                </div>
            </div>

            <!-- BOTON Y ACCIONES -->
            <div class="pt-2">
                <button 
                    type="submit"
                    class="w-full sm:w-auto px-6 py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm rounded-lg shadow-md transition-colors duration-200 cursor-pointer"
                >
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</section>

@endsection