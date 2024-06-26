@extends('templates.master')
@section('contenido-pagina')
<div class="row mb-3">
  <div class="col-lg-6"><h2 class="text-info">Autos disponibles para arrendar 1</h2></div>
  <div class="col-lg-6 d-flex justify-content-end">
    <a href="{{route('arriendos.gestionar')}}" class="btn text-white btn-info align-self-center me-2" type='success'>Gestionar arriendos</a>
    <a href="{{route('arriendos.ver')}}" class="btn text-white btn-dark align-self-center" type='success'>Ver historial de arriendos</a>
  </div>

</div>
<hr class="bg-info border-info" style="height: 2px;">

<div class="row">
  @foreach($vehiculos as $vehiculo)
      <div class="col-md-4 mb-3">
          <div class="card border-info h-100 text-dark">
            <div class="card-header bg-info text-white">
              <b>{{$vehiculo->patente}}</b>
            </div>
              <div style="position: relative;">
                  <img src="{{ Storage::url('public/'.$vehiculo->imagen) }}" class="card-img-top w-100 h-100 rounded-0" style="object-fit: cover;" alt="...">
              </div>
              <div class="card-body">
                  <h4 class="card-title">{{ $vehiculo->nombre }}</h4>
                  <h6 class="card-subtitle mb-2">{{ $vehiculo->marca }} | {{$vehiculo->modelo}} | {{$vehiculo->tipo->nombre}} </h6>
                  <p class="card-text">{{ $vehiculo->descripcion }}</p>
              </div>
              <a href="{{ route('arriendos.create', $vehiculo->patente) }}" class="btn btn-info text-white m-2">Arrendar</a>
          </div>
      </div>
  @endforeach
</div>
  @endsection