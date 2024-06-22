<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página con Navbar de Bootstrap</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/custom-bs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>

  
<body class="bg-light">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link @if(Route::current()->getName() == 'home.index') active @endif " aria-current="page" href="{{route('home.index')}}">Inicio</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link @if(Route::current()->getName() == 'usuarios.index' ||
                        Route::current()->getName() == 'usuarios.edit' ||
                        Route::current()->getName() == 'usuarios.create') active @endif " aria-current="page" href="{{route('usuarios.index')}} ">Usuarios</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link @if(Route::current()->getName() == 'clientes.index' ||
                        Route::current()->getName() == 'clientes.create' ||
                        Route::current()->getName() == 'clientes.edit' ||
                        Route::current()->getName() == 'clientes.arriendos') active @endif " aria-current="page" href="{{route('clientes.index')}} ">Clientes</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link @if(Route::current()->getName() == 'vehiculos.index' ||
                        Route::current()->getName() == 'vehiculos.create' ||
                        Route::current()->getName() == 'vehiculos.edit' ||
                        Route::current()->getName() == 'tipos.index' ||
                        Route::current()->getName() == 'tipos.edit' ||
                        Route::current()->getName() == 'tipos.create' ) active @endif dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Vehiculos
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item @if(Route::current()->getName() == 'tipos.index') active @endif" href="{{route('tipos.index')}}">Tipos de vehiculos</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link @if(Route::current()->getName() == 'arriendos.index' ||
                        Route::current()->getName() == 'arriendos.create') active @endif dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Arriendos
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item @if(Route::current()->getName() == 'arriendos.index') active @endif" href="{{route('arriendos.index')}}">Arrendar un auto</a></li>
                          <li><a class="dropdown-item @if(Route::current()->getName() == 'arriendos.gestionar') active @endif" href="{{route('arriendos.gestionar')}}">Gestionar arriendos</a></li>
                      </ul>
                  </li>
              </ul>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="manageUsuarioDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          @auth
                          {{ Auth::user()->nombre }} <i class="material-icons">person</i>
                          @endauth
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark bg-dark" aria-labelledby="manageUsuarioDropdown">
                          <li><a class="dropdown-item" href="#">Administrar cuenta</a></li>
                          <li><a class="dropdown-item" href="{{ route('usuarios.logout') }}">Cerrar sesión</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
    {{-- / NAVBAR --}}

    {{-- CONTENIDO PAGINA --}}
    <div class="container p-3 bg-light rounded">
        @yield('contenido-pagina')
    </div>
    {{-- /CONTENIDO PAGINA --}}


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html