@extends('layouts.appemprendedor')

@section('titulo', 'Mi Perfil')

@section('content')

<div class="container py-4">

    {{-- ALERTAS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- PERFIL --}}
    <div class="card shadow border-0 mb-4">
        <div class="card-body">
            <div class="row">

                {{-- DATOS PERSONALES --}}
                <div class="col-md-6 border-end">
                    <h3 class="mb-4">
                        <i class="fa-solid fa-user me-2"></i>
                        Datos Personales
                    </h3>

                    <form method="POST" action="{{ route('emprendedor.actualizarPerfil') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nombre" 
                                value="{{ old('nombre', $usuario->nombre ?? '') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo Electrónico</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                name="correo_electronico" 
                                value="{{ old('correo_electronico', $usuario->email ?? '') }}"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            Guardar Datos
                        </button>
                    </form>

                    <hr class="my-4">

                    {{-- PASSWORD --}}
                    <form method="POST" action="{{ route('emprendedor.actualizarPassword') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nueva Contraseña</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="contrasena" 
                                placeholder="Nueva contraseña"
                            >
                        </div>

                        <button type="submit" class="btn btn-warning">
                            <i class="fa-solid fa-lock me-2"></i>
                            Actualizar Contraseña
                        </button>
                    </form>
                </div>

                {{-- REDES SOCIALES --}}
                <div class="col-md-6">
                    <h3 class="mb-4">
                        <i class="fa-solid fa-share-nodes me-2"></i>
                        Redes Sociales
                    </h3>

                    <form method="POST" action="{{ route('emprendedor.actualizarRedes') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">WhatsApp</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="enlace_whatsapp" 
                                value="{{ old('enlace_whatsapp', $negocio->enlace_whatsapp ?? '') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Facebook</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="url_facebook" 
                                value="{{ old('url_facebook', $negocio->url_facebook ?? '') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Instagram</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="url_instagram" 
                                value="{{ old('url_instagram', $negocio->url_instagram ?? '') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">TikTok</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="url_tiktok" 
                                value="{{ old('url_tiktok', $negocio->url_tiktok ?? '') }}"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            Guardar Redes Sociales
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- NEGOCIOS --}}
    <div class="card shadow border-0">
        <div class="card-body">
            <h3 class="mb-4">
                <i class="fa-solid fa-store me-2"></i>
                Mis Negocios
            </h3>

            <div class="row">
                @forelse($negocios as $item)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            @if(!empty($item->ruta_logo))
                                <img 
                                    src="{{ asset($item->ruta_logo) }}" 
                                    class="card-img-top" 
                                    style="height:220px; object-fit:cover;" 
                                    alt="{{ $item->nombre }}"
                                >
                            @else
                                <img 
                                    src="https://placehold.co/400x220?text=Negocio" 
                                    class="card-img-top" 
                                    style="height:220px; object-fit:cover;" 
                                    alt="Sin imagen"
                                >
                            @endif

                            <div class="card-body">
                                <h4 class="card-title">{{ $item->nombre }}</h4>

                                @if(!empty($item->categoria))
                                    <span class="badge bg-primary mb-3">{{ $item->categoria }}</span>
                                @endif

                                <p class="text-muted">
                                    {{ \Illuminate\Support\Str::limit($item->descripcion ?? '', 120) }}
                                </p>

                                @if(!empty($item->ubicacion))
                                    <p class="small">
                                        <i class="fa-solid fa-location-dot me-1"></i>
                                        {{ $item->ubicacion }}
                                    </p>
                                @endif
                            </div>

                            <div class="card-footer bg-secondary border-0">
                                {{-- SE AGREGA data-categoria AQUI --}}
                                <button 
                                    type="button" 
                                    class="btn btn-warning w-100 btn-editar-negocio" 
                                    data-id="{{ $item->id }}" 
                                    data-nombre="{{ $item->nombre }}" 
                                    data-categoria="{{ $item->categoria }}" 
                                    data-descripcion="{{ $item->descripcion }}" 
                                    data-ubicacion="{{ $item->ubicacion }}"
                                >
                                    <i class="fa-solid fa-pen me-1"></i>
                                    Editar
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No tienes negocios registrados.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>

{{-- MODAL --}}
<div class="modal fade" id="modalNegocio" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{-- SE AGREGA enctype PARA PERMITIR CARGA DE IMÁGENES/LOGOS --}}
            <form method="POST" action="{{ route('emprendedor.actualizarNegocio') }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Editar Negocio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="negocio_id">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="negocio_nombre" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Categoría</label>
                        <input type="text" class="form-control" name="categoria" id="negocio_categoria">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ubicación</label>
                        <input type="text" class="form-control" name="ubicacion" id="negocio_ubicacion">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Logo / Imagen del Negocio</label>
                        <input type="file" class="form-control" name="logo" accept="image/*">
                        <small class="text-muted">Deja este campo vacío si no deseas cambiar el logo actual.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Descripción</label>
                        <textarea class="form-control" rows="5" name="descripcion" id="negocio_descripcion"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function(){

    var modalNegocio = new bootstrap.Modal(
        document.getElementById('modalNegocio')
    );

    $(document).on('click', '.btn-editar-negocio', function(){
        var btn = $(this);

        $('#negocio_id').val(btn.data('id'));
        $('#negocio_nombre').val(btn.data('nombre'));
        $('#negocio_categoria').val(btn.data('categoria'));
        $('#negocio_ubicacion').val(btn.data('ubicacion'));
        $('#negocio_descripcion').val(btn.data('descripcion'));

        modalNegocio.show();
    });

});
</script>
@endsection