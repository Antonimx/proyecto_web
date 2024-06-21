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
    
    {{-- / NAVBAR --}}

    {{-- CONTENIDO PAGINA --}}
    <div class="w-100 my-3 bg-white rounded">
        <div class="p-3 pt-1">@yield('contenido-pagina')</div>  
    </div>
    {{-- /CONTENIDO PAGINA --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html