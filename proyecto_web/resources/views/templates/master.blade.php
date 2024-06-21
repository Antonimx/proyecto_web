<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página con Navbar de Bootstrap</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/custom-bs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cambiar contrasena</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cerrar sesion</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    {{-- / NAVBAR --}}

    {{-- CONTENIDO PAGINA --}}
    <div class="container p-2 bg-light rounded">
        @yield('contenido-pagina')
    </div>
    {{-- /CONTENIDO PAGINA --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html