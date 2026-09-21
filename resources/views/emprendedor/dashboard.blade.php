@extends('layouts.appemprendedor')

@section('titulo', 'Dashboard')

@section('content')

<section class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

    <!-- ENCABEZADO DE SECCIÓN -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h1 class="text-3xl font-bold text-slate-100 tracking-tight">
            Mi Dashboard
        </h1>

        <a 
            href="{{ route('emprendedor.crearNuevo') }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm rounded-lg shadow-md transition-colors duration-200"
        >
            <i class="fas font-solid fa-plus mr-2 text-xs"></i>
            Nuevo Registro
        </a>
    </div>

    <!-- TABLA PRODUCTOS -->
    <div class="bg-slate-800/80 rounded-xl shadow-xl border border-slate-700/60 p-6 mb-8 overflow-hidden backdrop-blur-sm">
        
        <h2 class="text-xl font-bold text-slate-100 mb-4">
            Productos
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-700 bg-slate-900/60 text-slate-300 uppercase text-xs font-semibold tracking-wider">
                        <th class="py-3.5 px-4">ID</th>
                        <th class="py-3.5 px-4">Nombre</th>
                        <th class="py-3.5 px-4">Categoría</th>
                        <th class="py-3.5 px-4">Negocio</th>
                        <th class="py-3.5 px-4">Precio</th>
                        <th class="py-3.5 px-4">Estado</th>
                        <th class="py-3.5 px-4 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-700/60">
                    @forelse($productos as $producto)
                        <tr class="hover:bg-slate-700/40 transition-colors">
                            <td class="py-3 px-4 font-medium text-slate-300">{{ $producto->id }}</td>
                            <td class="py-3 px-4 text-slate-100 font-semibold">{{ $producto->nombre }}</td>
                            <td class="py-3 px-4 text-slate-300">{{ $producto->nombre_categoria }}</td>
                            <td class="py-3 px-4 text-slate-300">{{ $producto->negocio }}</td>
                            <td class="py-3 px-4 font-medium text-slate-100">
                                ${{ number_format($producto->precio, 2) }}
                            </td>
                            <td class="py-3 px-4">
                                @if($producto->esta_activo)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-950/80 text-emerald-400 border border-emerald-800/50">
                                        Activo
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-950/80 text-rose-400 border border-rose-800/50">
                                        Inactivo
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a 
                                        href="{{ route('emprendedor.editarProducto', $producto->id) }}"
                                        class="px-3 py-1.5 bg-amber-600 hover:bg-amber-500 text-white font-medium text-xs rounded shadow-xs transition-colors"
                                    >
                                        Editar
                                    </a>

                                    <form 
                                        method="POST"
                                        action="{{ route('emprendedor.eliminarProducto', $producto->id) }}"
                                        onsubmit="return confirm('¿Eliminar este registro?')"
                                        class="inline"
                                    >
                                        @csrf
                                        <button 
                                            type="submit"
                                            class="px-3 py-1.5 bg-rose-600 hover:bg-rose-500 text-white font-medium text-xs rounded shadow-xs transition-colors cursor-pointer"
                                        >
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-6 text-center text-slate-400 font-medium">
                                No tienes productos registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <!-- TABLA SERVICIOS -->
    <div class="bg-slate-800/80 rounded-xl shadow-xl border border-slate-700/60 p-6 overflow-hidden backdrop-blur-sm">

        <h2 class="text-xl font-bold text-slate-100 mb-4">
            Servicios
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-700 bg-slate-900/60 text-slate-300 uppercase text-xs font-semibold tracking-wider">
                        <th class="py-3.5 px-4">ID</th>
                        <th class="py-3.5 px-4">Nombre</th>
                        <th class="py-3.5 px-4">Categoría</th>
                        <th class="py-3.5 px-4">Negocio</th>
                        <th class="py-3.5 px-4">Precio</th>
                        <th class="py-3.5 px-4">Estado</th>
                        <th class="py-3.5 px-4 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-700/60">
                    @forelse($servicios as $servicio)
                        <tr class="hover:bg-slate-700/40 transition-colors">
                            <td class="py-3 px-4 font-medium text-slate-300">{{ $servicio->id }}</td>
                            <td class="py-3 px-4 text-slate-100 font-semibold">{{ $servicio->nombre }}</td>
                            <td class="py-3 px-4 text-slate-300">{{ $servicio->nombre_categoria }}</td>
                            <td class="py-3 px-4 text-slate-300">{{ $servicio->negocio }}</td>
                            <td class="py-3 px-4 font-medium text-slate-100">
                                ${{ number_format($servicio->precio, 2) }}
                            </td>
                            <td class="py-3 px-4">
                                @if($servicio->esta_activo)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-950/80 text-emerald-400 border border-emerald-800/50">
                                        Activo
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-950/80 text-rose-400 border border-rose-800/50">
                                        Inactivo
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a 
                                        href="{{ route('emprendedor.editarProducto', $servicio->id) }}"
                                        class="px-3 py-1.5 bg-amber-600 hover:bg-amber-500 text-white font-medium text-xs rounded shadow-xs transition-colors"
                                    >
                                        Editar
                                    </a>

                                    <form 
                                        method="POST"
                                        action="{{ route('emprendedor.eliminarProducto', $servicio->id) }}"
                                        onsubmit="return confirm('¿Eliminar este registro?')"
                                        class="inline"
                                    >
                                        @csrf
                                        <button 
                                            type="submit"
                                            class="px-3 py-1.5 bg-rose-600 hover:bg-rose-500 text-white font-medium text-xs rounded shadow-xs transition-colors cursor-pointer"
                                        >
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-6 text-center text-slate-400 font-medium">
                                No tienes servicios registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</section>

@endsection