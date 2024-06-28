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
  <div class="col-lg-5 d-flex justify-content-end">
    <a href="{{route('tipos.index')}}" class="btn text-white btn-info align-self-center me-2" type='success'>Tipos de vehículos</a>
    <a href="{{route('vehiculos.create')}}" class="btn text-white btn-secondary align-self-center" type='success'>Agregar nuevo vehículo</a>
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
                  <a href="{{ route('vehiculos.edit', $vehiculo->patente) }}" class="btn btn-secondary text-white btn-sm "><i class="material-icons text-white">mode_edit</i></a>  
                  <span data-bs-toggle="tooltip" data-bs-title="Borrar Vehiculo">
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#borrarModal{{$vehiculo->patente}}">
                          <span class="material-icons text-white">delete</span>
                    </a>
                  </span>   
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
  @endforeach
</div> 

@endsection
