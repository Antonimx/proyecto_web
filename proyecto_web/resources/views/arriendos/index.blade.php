@extends('templates.master')
@section('contenido-pagina')
<x-titulo-gestion :urlVolver="'home.index'" :titulo="'Autos disponibles para arrendar'" :boton="true" :urlBoton="'arriendos.gestionar'" :textoBoton="'Gestionar arriendos'"/>


<div class="row">
  @foreach($vehiculos as $vehiculo)
      <div class="col-md-4 mb-3">
          <div class="card border-info h-100 text-dark">
            <div class="card-header bg-info text-white">
              <b>{{$vehiculo->patente}}</b>
            </div>
              <div style="position: relative;">
                  <img src="{{ Storage::url($vehiculo->imagen) }}" class="card-img-top w-100 h-100 rounded-0" style="object-fit: cover;" alt="...">
              </div>
              <div class="card-body">
                  <h4 class="card-title">{{ $vehiculo->nombre }}</h4>
                  <h6 class="card-subtitle mb-2">{{ $vehiculo->marca }} | {{$vehiculo->modelo}} | {{$vehiculo->tipo->nombre}} </h6>
                  <p class="card-text">{{ $vehiculo->descripcion }}</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <div>
                  <div class="text-body-secondary card-subtitle">${{$vehiculo->tipo->valor}}</div>              
                </div>
                <div>
                  <a href="{{ route('arriendos.create',$vehiculo->patente)}}" class="btn btn-secondary text-white d-flex align-items-center">Arrendar</a>  
                </div>
              </div>
          </div>
      </div>
  @endforeach
</div>
  @endsection