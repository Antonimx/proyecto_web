@extends('templates.master')
@section('contenido-pagina')
<x-titulo-gestion urlVolver="home.index" titulo="Gestión de vehículos" urlBoton="tipos.index" textoBoton="Tipos de vehículos"/>


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
              <div class="card-footer d-flex justify-content-between align-items-center">
                <div>
                  <div class="text-body-secondary card-subtitle">{{$vehiculo->nombreEstado()}}</div>              
                </div>
                <div>
                  <a href="{{ route('vehiculos.edit', $vehiculo->patente) }}" class="btn btn-info text-white btn-sm "><i class="material-icons text-white">mode_edit</i></a>  
                  <span data-bs-toggle="tooltip" data-bs-title="Borrar Charla">
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#borrarModal{{$vehiculo->patente}}">
                          <span class="material-icons text-white">delete</span>
                      </a>
                  </span>   
                </div>
              </div>
          </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="borrarModal{{$vehiculo->patente}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="borrarModal{{$vehiculo->patente}}Label">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('vehiculos.destroy')}}" method="POST">
                @csrf
                
                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
  @endforeach
</div>
  @endsection
