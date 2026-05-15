@extends('layouts.appemprendedor')

@section('titulo', 'Dashboard')

@section('content')

<section class="section">

    <div class="container">

        <div class="is-flex is-justify-content-space-between is-align-items-center mb-6">

            <h1 class="title">
                Mi Dashboard
            </h1>

            <a 
                href="{{ route('emprendedor.crearNuevo') }}"
                class="button is-primary"
            >
                Nuevo Registro
            </a>

        </div>

        <!-- PRODUCTOS -->
        <div class="box mb-6">

            <h2 class="title is-4 mb-4">
                Productos
            </h2>

            <div class="table-container">

                <table class="table is-fullwidth is-striped is-hoverable">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Negocio</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($productos as $producto)

                            <tr>

                                <td>{{ $producto->id }}</td>

                                <td>{{ $producto->nombre }}</td>

                                <td>{{ $producto->nombre_categoria }}</td>

                                <td>{{ $producto->negocio }}</td>

                                <td>
                                    ${{ number_format($producto->precio, 2) }}
                                </td>

                                <td>

                                    @if($producto->esta_activo)

                                        <span class="tag is-success">
                                            Activo
                                        </span>

                                    @else

                                        <span class="tag is-danger">
                                            Inactivo
                                        </span>

                                    @endif

                                </td>
                                <td>

                                    <div class="buttons are-small">

                                        <!-- EDITAR -->
                                        <a 
                                            href="{{ route('emprendedor.editarProducto', $producto->id) }}"
                                            class="button is-warning"
                                        >

                                            Editar

                                        </a>

                                        <!-- ELIMINAR -->
                                        <form 
                                            method="POST"
                                            action="{{ route('emprendedor.eliminarProducto', $producto->id) }}"
                                            onsubmit="return confirm('¿Eliminar este registro?')"
                                        >

                                            @csrf

                                            <button 
                                                type="submit"
                                                class="button is-danger"
                                            >

                                                Eliminar

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="has-text-centered">

                                    No tienes productos registrados

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- SERVICIOS -->
        <div class="box">

            <h2 class="title is-4 mb-4">
                Servicios
            </h2>

            <div class="table-container">

                <table class="table is-fullwidth is-striped is-hoverable">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Negocio</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($servicios as $servicio)

                            <tr>

                                <td>{{ $servicio->id }}</td>

                                <td>{{ $servicio->nombre }}</td>

                                <td>{{ $servicio->nombre_categoria }}</td>

                                <td>{{ $servicio->negocio }}</td>

                                <td>
                                    ${{ number_format($servicio->precio, 2) }}
                                </td>

                                <td>

                                    @if($servicio->esta_activo)

                                        <span class="tag is-success">
                                            Activo
                                        </span>

                                    @else

                                        <span class="tag is-danger">
                                            Inactivo
                                        </span>

                                    @endif

                                </td>
                                <td>

                                    <div class="buttons are-small">

                                        <a 
                                            href="{{ route('emprendedor.editarProducto', $servicio->id) }}"
                                            class="button is-warning"
                                        >

                                            Editar

                                        </a>

                                        <form 
                                            method="POST"
                                            action="{{ route('emprendedor.eliminarProducto', $servicio->id) }}"
                                            onsubmit="return confirm('¿Eliminar este registro?')"
                                        >

                                            @csrf

                                            <button 
                                                type="submit"
                                                class="button is-danger"
                                            >

                                                Eliminar

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="has-text-centered">

                                    No tienes servicios registrados

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection