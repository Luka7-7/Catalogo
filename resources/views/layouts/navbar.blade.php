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
        <a class="navbar-item" href="{{ route('inicio') }}">
           <i class="fa-regular fa-house"></i> Inicio
        </a>
        <a class="navbar-item" href="{{ route('catalogo.productos') }}">
           <i class="fa-solid fa-wallet"></i> Productos
        </a>
        <a class="navbar-item" href="{{ route('catalogo.servicios') }}">
            <i class="fa-solid fa-hammer"></i> Servicios
        </a>
    </div>
</div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="{{ route('catalogo.registro') }}">
            <strong><i class="fa-solid fa-arrow-right-to-bracket"></i> Registrarse</strong>
          </a>
          <a class="button is-light" href="{{ route('emprendedor.login.auth') }}">
            <i class="fa-solid fa-user"></i> Iniciar Sesión
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>