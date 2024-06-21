@extends('templates.master')

@section('contenido-pagina')

<div class="row">
    <div class="text-body-secondary text-center">
        <h3>Bienvenido al sistema de arriendo de autos</h3>
    </div>
</div>
<hr>
<div class="row">
    <!-- usuario -->

      
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Usuario</h5>
                  <p class="card-text">Gestione los usuarios</p>
                  <a href="{{route('usuarios.index')}}" class="btn btn-secondary">Ingresar a usuario</a>
                </div>
              </div>
        </div>
    </div>
    <!-- cliente -->
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Cliente</h5>
                  <p class="card-text">Gestione a sus clientes</p>
                  <a href="{{route('clientes.index')}}" class="btn btn-primary">Ingresar a cliente</a>
                </div>
              </div>
        </div>
    </div>
    <!-- arriendo -->
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Arriendo</h5>
                  <p class="card-text">Gestione sus arriendos</p>
                  <a href="{{route('arriendos.index')}}" class="btn btn-primary">Arrendar</a>
                </div>
              </div>
        </div>
    </div>
    <!-- vehiculo -->
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Vehiculos</h5>
                  <p class="card-text">Gestione sus vehiculos</p>
                  <a href="{{route('vehiculos.index')}}" class="btn btn-primary">Ingresar a vehiculos</a>
                </div>
              </div>
        </div>
    </div>

    <!-- config -->
    {{-- <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
        <div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/cards_portada/configuracion.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Configuración</h5>
                    <div class="btn-group d-flex">
                        <a class="btn btn-outline-success" href="#">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
