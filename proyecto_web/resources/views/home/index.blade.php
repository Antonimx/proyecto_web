@extends('templates.master')

@section('contenido-pagina')

<div class="row">
    <div class="text-body-secondary text-center ">
        <h3 class="text-info">Bienvenido al sistema de arriendo de autos</h3>
    </div>
</div>
<hr class="bg-info border-info" style="height: 2px;">
<div class="row">
    <!-- usuario -->
    <div class="col-12 col-md-6 col-lg-3 mb-3 border-info">
        <div>
            <div class="card text-dark border-info" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Usuario</h5>
                  <p class="card-text">Gestione los usuarios</p>
                  <a href="{{route('usuarios.index')}}" class="btn btn-info text-white">Ir a usuarios</a>
                </div>
              </div>
        </div>
    </div>
    <!-- cliente -->
    <div class="col-12 col-md-6 col-lg-3 mb-3 border-info">
        <div>
            <div class="card text-dark border-info" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Cliente</h5>
                  <p class="card-text">Gestione a sus clientes</p>
                  <a href="{{route('clientes.index')}}" class="btn btn-info text-white">Ir a clientes</a>
                </div>
              </div>
        </div>
    </div>
    <!-- arriendo -->
    <div class="col-12 col-md-6 col-lg-3 mb-3 border-info">
        <div> 
            <div class="card text-dark border-info" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Arriendo</h5>
                  <p class="card-text">Gestione sus arriendos</p>
                  <a href="{{route('arriendos.index')}}" class="btn btn-info text-white">Arrendar</a>
                </div>
              </div>
        </div>
    </div>
    <!-- vehiculo -->
    <div class="col-12 col-md-6 col-lg-3 mb-3 ">
        <div>
            <div class="card text-dark border-info" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Vehiculos</h5>
                  <p class="card-text">Gestione sus vehiculos</p>
                  <a href="{{route('vehiculos.index')}}" class="btn btn-info text-white">Ir a vehículos</a>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center border-info">
    <img src="imgs/miku.png" alt="">
</div>



@endsection
