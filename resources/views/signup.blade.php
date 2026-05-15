@extends('layouts.log')

@section('titulo', 'Registro')

@section('content')

<section class="section">

    <div class="container">

        <div class="columns is-centered">

            <div class="column is-11-mobile is-8-tablet is-6-desktop">

                <div class="box p-6">

                    <h1 class="title has-text-centered mb-5">
                        Crear Cuenta
                    </h1>

                    <form method="POST" action="{{ route('catalogo.registro') }}">

                        @csrf

                        <!-- NOMBRE -->
                        <div class="field">

                            <label class="label">
                                Nombre Completo
                            </label>

                            <div class="control has-icons-left">

                                <input 
                                    class="input @error('nombre') is-danger @enderror"
                                    type="text"
                                    name="nombre"
                                    placeholder="Ingresa tu nombre"
                                    value="{{ old('nombre') }}"
                                    required
                                >

                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>

                            </div>

                            @error('nombre')

                                <p class="help is-danger">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        <!-- CORREO -->
                        <div class="field">

                            <label class="label">
                                Correo Electrónico
                            </label>

                            <div class="control has-icons-left">

                                <input 
                                    class="input @error('correo_electronico') is-danger @enderror"
                                    type="email"
                                    name="correo_electronico"
                                    placeholder="correo@ejemplo.com"
                                    value="{{ old('correo_electronico') }}"
                                    required
                                >

                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>

                            </div>

                            @error('correo_electronico')

                                <p class="help is-danger">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        <!-- CONTRASEÑA -->
                        <div class="field">

                            <label class="label">
                                Contraseña
                            </label>

                            <div class="control has-icons-left">

                                <input 
                                    class="input @error('contrasena') is-danger @enderror"
                                    type="password"
                                    name="contrasena"
                                    placeholder="********"
                                    required
                                >

                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>

                            </div>

                            @error('contrasena')

                                <p class="help is-danger">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        <!-- CONFIRMAR CONTRASEÑA -->
                        <div class="field">

                            <label class="label">
                                Confirmar Contraseña
                            </label>

                            <div class="control has-icons-left">

                                <input 
                                    class="input"
                                    type="password"
                                    name="contrasena_confirmation"
                                    placeholder="********"
                                    required
                                >

                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>

                            </div>

                        </div>

                        <!-- TERMINOS -->
                        <div class="field">

                            <div class="control">

                                <label class="checkbox">

                                    <input type="checkbox" required>

                                    Acepto los términos y condiciones

                                </label>

                            </div>

                        </div>

                        <!-- BOTON -->
                        <div class="field mt-5">

                            <div class="control">

                                <button type="submit" class="button is-primary is-fullwidth">

                                    <span class="icon">
                                        <i class="fas fa-user-plus"></i>
                                    </span>

                                    <span>
                                        Registrarse
                                    </span>

                                </button>

                            </div>

                        </div>

                    </form>

                    <!-- LOGIN -->
                    <div class="has-text-centered mt-5">

                        <p>

                            ¿Ya tienes cuenta?

                            <a href="{{ route('emprendedor.login') }}">

                                Inicia sesión

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection