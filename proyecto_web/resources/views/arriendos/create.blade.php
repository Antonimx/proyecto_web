@extends('templates.master')

@section('contenido-pagina')

{{-- CARD AUTO --}}
<row>
  <div class="card border-info mb-3 text-dark">
      <div class="row g-0">
          <div class="col-md-4">
              <div style="position: relative;">
                  <img src="{{ Storage::url('public/'.$vehiculo->imagen) }}" class="img-fluid rounded-start w-100 h-100" style="object-fit: cover;" id="imagenCard">
              </div>
          </div>
          <div class="col-md-8">
              <div class="card-body">
                  <h5 class="card-title m-0">{{ $vehiculo->nombre }}</h5>
                  <hr class="bg-info border-info" style="height: 2px;">
                  <p class="card-text">
                      {{ $vehiculo->descripcion }}
                      <ul>
                          <li><b>Marca:</b> {{ $vehiculo->marca }}</li>
                          <li><b>Modelo:</b> {{ $vehiculo->modelo }}</li>
                          <li><b>Tipo:</b> {{ $vehiculo->tipo->nombre }}</li>
                      </ul>
                  </p>
              </div>
          </div>
      </div>
  </div>
</row>
{{-- /CARD AUTO --}}

{{-- FORM PARA ARRENDAR --}}
<row class="">
  <form class="border border-info bg-white p-2 rounded text-dark" method="POST" action="{{route('arriendos.store')}}" enctype="multipart/form-data" id="formArriendo">
    @csrf
    <input type="hidden" name="imagen_inicio" id="imagenInput">
    <div class="input-group mb-3">
      <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownCliente">
        Seleccione cliente
      </button>
      <ul class="dropdown-menu">
        @foreach($clientes as $cliente)
          <li><a class="dropdown-item" href="#" onclick="selectCliente('{{$cliente->rut}}')">{{$cliente->rut}} {{$cliente->nombre}}</a></li>
        @endforeach
      </ul>
      <input type="text" class="form-control" aria-label="Text input with dropdown button" id="clienteSeleccionado" name="rut">
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="fecha" class="form-label text-dark">Fecha de arriendo</label>
          <input type="date" id="fecha" name="fecha_inicio" class="form-control">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mb-3">
          <label for="patente" class="form-label">Patente</label>
          <input type="text" class="form-control" id="patente" name="patente" value="{{$vehiculo->patente}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col d-flex justify-content-start">
        <a href="{{ route('arriendos.index') }}" class="btn btn-danger text-white">Cancelar</a>
      </div>
      <div class="col d-flex justify-content-end">
        <button type="submit" class="btn text-white btn-info">Arrendar</button>
      </div>
    </div>
  </form>
</row>

<script>
  function selectCliente(cliente) {
    document.getElementById('clienteSeleccionado').value = cliente;
  }

  document.getElementById('formArriendo').addEventListener('submit', function(event) {
    const imagenSrc = document.getElementById('imagenCard').src;
    const relativePath = imagenSrc.replace(window.location.origin + '/', '');
    document.getElementById('imagenInput').value = relativePath;
  });

</script>
{{-- /FORMULARIO --}}
@endsection
