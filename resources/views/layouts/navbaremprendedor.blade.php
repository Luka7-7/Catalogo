<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">


  <a class="navbar-item" href="/">
    <img src="{{ asset('storage/Logo.png') }}" 
         class="is-logo-custom" 
         alt="Logo">
</a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

<div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
        <a class="navbar-item" href="{{ route('emprendedor.dashboard') }}">
           <i class="fa-solid fa-table-columns"></i> Dashboard
        </a>
        <a class="navbar-item" href="{{ route('emprendedor.crearNuevo') }}">
            <i class="fa-solid fa-plus"></i> Crear Producto
        </a>
        <a class="navbar-item" href="{{ route('emprendedor.perfil') }}">
            <i class="fa-solid fa-user"></i> Mi perfil
        </a>
    </div>
</div>

<div class="navbar-end">

    <div class="navbar-item">

        <form 
            method="POST"
            action="{{ route('emprendedor.logout') }}"
        >

            @csrf

            <button class="button is-danger" type="submit">

                <strong>
                    <i class="fa-solid fa-door-open"></i> Salir
                </strong>

            </button>

        </form>

    </div>

</div>
  </div>
</nav>