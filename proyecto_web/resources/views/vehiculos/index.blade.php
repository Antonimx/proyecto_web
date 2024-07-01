@extends('templates.master')
@section('contenido-pagina')
<div class="row">
  <div class="col-lg-7">
      <div class="row d-flex justify-content-start">
          <div class="col-lg-1 pe-0 ">
              <a href="{{ route('home.index') }}" class="btn btn-outline-dark btn-sm pb-0" data-bs-toggle="tooltip" data-bs-title="Volver">
                  <span class="material-icons">arrow_back</span>
              </a>
          </div>
          <div class="col-lg-11 ps-0">
              <h3 class="text-info ms-2">Gestión de vehículos.</h3>
          </div>
      </div>
      
  </div>
  @if(Gate::allows('admin-gestion'))
  <div class="col-lg-5 d-flex justify-content-end">
    <a href="{{route('tipos.index')}}" class="btn text-white btn-info align-self-center me-2" type='success'>Tipos de vehículos</a>
    <a href="{{route('vehiculos.create')}}" class="btn text-white btn-secondary align-self-center" type='success'>Agregar nuevo vehículo</a>
  </div>
  @endif
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
                  <img src="{{ Storage::url($vehiculo->imagen) }}" class="card-img-top w-100 h-100 rounded-0" style="object-fit: cover;" alt="...">
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
                  <a class="btn btn-dark text-white btn-sm " data-bs-toggle="modal" title="Actualizar estado del vehículo" data-bs-target="#estadoModal{{$vehiculo->patente}}""><i class="material-icons text-white">autorenew</i></a>  
                  @if(Gate::allows('admin-gestion'))
                  <a href="{{ route('vehiculos.edit', $vehiculo->patente) }}" class="btn btn-secondary text-white btn-sm " data-bs-toggle="tooltip" title="Editar datos"><i class="material-icons text-white">mode_edit</i></a>  
                  <a class="btn btn-danger text-white btn-sm " data-bs-toggle="modal" data-bs-target="#borrarModal{{$vehiculo->patente}}" title="Borrar vehículo"><i class="material-icons text-white">delete</i></a>  
                  @endif
                </div>
              </div>
          </div>
      </div>
      <!-- Modal \\Los : antes de los campos en Blade son usados para pasar variables dinámicamente desde el controlador a la vista en componentes de Blade-->
      <x-modal-borrado 
        :url="'vehiculos.destroy'"
        :id="$vehiculo->patente" 
        :nombre="$vehiculo->nombre" 
        :textoBoton="'Borrar Vehículo'" 
      />

      {{-- MODAL ESTADO --}}
      <div class="modal fade" id="estadoModal{{$vehiculo->patente}}" tabindex="-1" aria-labelledby="Modal{{$vehiculo->patente}}" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-dark text-bold" id="estadoModal{{$vehiculo->patente}}Label">Actualizar estado de {{$vehiculo->nombre}}.</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('vehiculos.updateEstado',$vehiculo->patente)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="estado" id="estado_de_baja" value="0">
                  <label class="form-check-label" for="estado_de_baja">
                    De baja
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="estado" id="estado_mantenimiento" value="3">
                  <label class="form-check-label" for="estado_mantenimiento">
                    En mantenimiento
                  </label>
                </div>
                <div class="d-flex mt-3 justify-content-between "> 
                  <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-secondary text-white">Confirmar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
      {{-- /MODAL ESTADO --}}
  @endforeach
</div> 

@endsection
