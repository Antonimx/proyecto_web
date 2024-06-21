@extends('templates.master')
@section('contenido-pagina')
<div class="row mb-3">
  <div class="col-lg-8"><h2 class="text-info">Autos disponibles para arrendar</h2></div>
  <div class="col-lg-4 d-flex justify-content-end"><a href="{{route('arriendos.gestionar')}}" class="btn text-white btn-info align-self-center" type='success'>Gestionar arriendos.</a></div>
</div>
<hr class="bg-info border-info" style="height: 2px;">

<div class="row">
    @foreach($vehiculos as $vehiculo)
    <div class="col">
        <div>
            <div class="card bg-white text-dark h-100 border-info" style="">
                <img src="{{$vehiculo->imagen}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$vehiculo->nombre}}</h5>
                  <p class="card-text">{{$vehiculo->descripcion}}</p>
                  <a href="{{ route('arriendos.create', $vehiculo->patente) }}" class="btn btn-info text-white">Arrendar</a>

                </div>
              </div>
        </div>
    </div>
    @endforeach
  </div>
  @endsection