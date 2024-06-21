<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página con Navbar de Bootstrap</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/custom-bs.min.css') }}">

</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    {{-- / NAVBAR --}}

    {{-- CONTENIDO PAGINA --}}
    <div class="w-100 my-3 bg-white rounded">
        <div class="p-3 pt-1">@yield('contenido-pagina')</div>  
    </div>
    {{-- /CONTENIDO PAGINA --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html