@extends('layouts.log')

@section('titulo', 'Iniciar Sesión')

@section('content')

<section class="section">

    <div class="container">

        <div class="columns is-centered">

            <div class="column is-11-mobile is-8-tablet is-5-desktop">

                <div class="box p-6">

                    <!-- TITULO -->
                    <h1 class="title has-text-centered mb-5">

                        Iniciar Sesión

                    </h1>

                    <!-- MENSAJE SUCCESS -->
                    @if(session('success'))

                        <div class="notification is-success is-light">

                            {{ session('success') }}

                        </div>

                    @endif

                    <!-- FORMULARIO -->
                    <form method="POST" action="{{ route('emprendedor.login.auth') }}">

                        @csrf

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

                        <!-- RECORDAR -->
                        <div class="field">

                            <div class="control">

                                <label class="checkbox">

                                    <input type="checkbox" name="recordarme">

                                    Recordarme

                                </label>

                            </div>

                        </div>

                        <!-- BOTON -->
                        <div class="field mt-5">

                            <div class="control">

                                <button 
                                    type="submit"
                                    class="button is-primary is-fullwidth"
                                >

                                    <span class="icon">

                                        <i class="fas fa-sign-in-alt"></i>

                                    </span>

                                    <span>

                                        Ingresar

                                    </span>

                                </button>

                            </div>

                        </div>

                    </form>

                    <!-- REGISTRO -->
                    <div class="has-text-centered mt-5">

                        <p>

                            ¿No tienes cuenta?

                            <a href="{{ route('catalogo.registro.form') }}">

                                Crear cuenta

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection